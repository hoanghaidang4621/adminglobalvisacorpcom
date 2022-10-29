<?php

namespace GlobalVisa\Backend\Controllers;

use GlobalVisa\Models\NewArrival;
use GlobalVisa\Repositories\VisaType;
use Phalcon\Paginator\Adapter\Model as PaginatorModel;
use GlobalVisa\Repositories\Arrival;
use GlobalVisa\Utils\Validator;

class ArrivalController extends ControllerBase
{
    public function indexAction()
    {
        $list_type = $this->getParameter();
        $current_page = $this->request->get('page');
        $validator = new Validator();
        if ($validator->validInt($current_page) == false || $current_page < 1)
            $current_page = 1;
        $paginator = new PaginatorModel(
            array(
                'data' => $list_type,
                'limit' => 20,
                'page' => $current_page,
            )
        );
        $msg_result = array();
        if ($this->session->has('msg_result')) {
            $msg_result = $this->session->get('msg_result');
            $this->session->remove('msg_result');
        }
        $msg_delete = array();
        if ($this->session->has('msg_delete')) {
            $msg_delete = $this->session->get('msg_delete');
            $this->session->remove('msg_delete');
        }
        $this->view->setVars(array(
            'list_data' => $paginator->getPaginate(),
            'msg_result' => $msg_result,
            'msg_delete' => $msg_delete,
        ));
    }

    public function createAction()
    {
        $this->view->pick($this->controllerName . '/model');
        $data = array('arrival_active' => 'Y','country_code' => '');
        $messages = array();
        if ($this->request->isPost()) {

            $data = array(
                'arrival_country_code' => $this->request->getPost("slcCountry", array('string', 'trim')),
                'arrival_order' => $this->request->getPost("txtOrder", array('string', 'trim')),
                'arrival_active' => $this->request->getPost("radActive"),
                'arrival_country_timezone' => $this->request->getPost("txtTimeZone", array('string', 'trim'))
            );
            $check_exits = Arrival::findByCountryCode($data['arrival_country_code']);
            if (count($check_exits) == 1) {
                $messages['check_exits'] = "Arrival already exits.";
                $data['country_code'] = $data['arrival_country_code'];
            }
            if (empty($data['arrival_country_code'])) {
                $messages['arrival_country_code'] = "Country field is required.";
            }

            if (empty($data['arrival_order'])) {
                $messages['arrival_order'] = "Order field is required.";
            } elseif (!is_numeric($data['arrival_order'])) {
                $messages["arrival_order"] = "Order  is number.";
            }
            if (empty($data['arrival_active'])) {
                $messages['type_arrival_id'] = "Active field is required.";
            }

            if (empty($data["arrival_country_timezone"])) {
                $messages["arrival_country_timezone"] = "Timezone field is required.";
            } elseif ((int)$data['arrival_country_timezone'] >24 || (int)$data['arrival_country_timezone'] < 1) {
                $messages["arrival_country_timezone"] = "Timezone  is beetween 1-24.";
            }
            if (count($messages) == 0) {
                $new_type = new NewArrival();
                $message = "We can't store your info now:" . "<br/>";
                if ($new_type->save($data)) {
                    $message = 'Create the Type ID: ' . $new_type->getArrivalId() . ' success.';
                    $msg_result = array('status' => 'success', 'msg' => $message);
                } else {
                    foreach ($new_type->getMessages() as $msg) {
                        $message .= $msg . "<br/>";
                    }
                    $msg_result = array('status' => 'error', 'msg' => $message);
                }
                $this->session->set('msg_result', $msg_result);
                $this->response->redirect("/arrival");
                return;
            }
        }
        $country_code = Arrival::getCountry($data['country_code']);
        $messages["status"] = "border-red";
        $data['mode'] = 'create';
        $this->view->setVars(array(
            'title' => 'Create Arrival',
            'formData' => $data,
            'messages' => $messages,
            'select_country' => $country_code,
        ));
    }

    public function editAction()
    {
        $this->view->pick($this->controllerName . '/model');
        $data = array('country_code' => '');
        $id = $this->request->get('id');
        $checkID = new Validator();
        if (!$checkID->validInt($id)) {
            return $this->response->redirect('notfound');
        }
        $arrival = Arrival::findByIdFirst($id);
        if (empty($arrival)) {
            return $this->response->redirect('notfound');
        }
        $model_data = $arrival->toArray();
        $data = $model_data;
        $data['country_code'] = $data['arrival_country_code'];
        $messages = array();
        if ($this->request->isPost()) {

            $data = array(
                'arrival_country_code' => $this->request->getPost("slcCountry", array('string', 'trim')),
                'arrival_order' => $this->request->getPost("txtOrder", array('string', 'trim')),
                'arrival_active' => $this->request->getPost("radActive"),
                'arrival_country_timezone' => $this->request->getPost("txtTimeZone", array('string', 'trim'))
            );
            $check_exits = Arrival::findByCountryCode($data['arrival_country_code']);
            $remove = $check_exits->toArray();

            if (($remove[0]['arrival_country_code'] == $model_data['arrival_country_code']) == false) {
                if (count($check_exits) == 1) {
                    $messages['check_exits'] = "Arrival already exits.";
                    $data['country_code'] = $data['arrival_country_code'];
                }
            }
            if (empty($data['arrival_order'])) {
                $messages['arrival_order'] = "Order field is required.";
            } elseif (!is_numeric($data['arrival_order'])) {
                $messages["arrival_order"] = "Order  is number.";
            }
            if (empty($data['arrival_active'])) {
                $messages['type_arrival_id'] = "Active field is required.";
            }
            if (empty($data["arrival_country_timezone"])) {
                $messages["arrival_country_timezone"] = "Timezone field is required.";
            } elseif ((int)$data['arrival_country_timezone'] >24 || (int)$data['arrival_country_timezone'] < 1) {
                $messages["arrival_country_timezone"] = "Timezone  is beetween 1-24.";
            }
            if (count($messages) == 0) {
                $msg_result = array();
                if ($arrival->update($data)) {
                    $msg_result = array('status' => 'success', 'msg' => 'Edit arrival Success');
                } else {
                    $message = "We can't store your info now: \n";
                    foreach ($arrival->getMessages() as $msg) {
                        $message .= $msg . "\n";
                    }
                    $msg_result['status'] = 'error';
                    $msg_result['msg'] = $message;
                }
                $this->session->set('msg_result', $msg_result);
                return $this->response->redirect("/arrival");
            }
        }
        $country_code = Arrival::getCountry($data['country_code']);
        $messages["status"] = "border-red";

        $this->view->setVars(array(
            'title' => 'Edit Arrival',
            'formData' => $data,
            'messages' => $messages,
            'select_country' => $country_code,
        ));
    }

    public function deleteAction()
    {
        $arrival_checked = $this->request->getPost("item");
        if (!empty($arrival_checked)) {
            $tn_log = array();
            foreach ($arrival_checked as $id) {
                $arrival_item = Arrival::findByIdFirst($id);
                if ($arrival_item) {
                    $msg_result = array();
                    if ($arrival_item->delete() === false) {
                        $message_delete = 'Can\'t delete the Arrival';
                        $msg_result['status'] = 'error';
                        $msg_result['msg'] = $message_delete;
                    } else {
                        $tn_log[$id] = $arrival_item->toArray();
                    }
                }
            }
            if (count($tn_log) > 0) {
                $message_delete = 'Delete ' . count($tn_log) . ' Arrival successfully.';
                $msg_result['status'] = 'success';
                $msg_result['msg'] = $message_delete;
            }
            $this->session->set('msg_result', $msg_result);
            return $this->response->redirect("/arrival");
        }
    }

    private function getParameter()
    {
        $keyword = trim($this->request->get("txtSearch"));
        $arrParameter = [];
        $sql = "SELECT a.arrival_id, a.arrival_country_timezone,a.arrival_order, a.arrival_active, a.arrival_country_code, c.country_name, c.country_code  
        FROM GlobalVisa\Models\NewArrival a 
        INNER JOIN GlobalVisa\Models\NewCountry c
          ON a.arrival_country_code = c.country_code";
        if (!empty($keyword)) {
            $sql .= " AND c.country_name like CONCAT('%',:keyword:,'%') ";
            $arrParameter['keyword'] = $keyword;
            $this->dispatcher->setParam("txtSearch", $keyword);
        }
        $sql .= " ORDER BY a.arrival_id DESC";

        return $this->modelsManager->executeQuery($sql, $arrParameter);
    }


}