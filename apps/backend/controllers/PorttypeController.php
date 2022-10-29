<?php

namespace GlobalVisa\Backend\Controllers;

use GlobalVisa\Models\NewPortType;
use GlobalVisa\Models\VisaLanguage;
use GlobalVisa\Models\VisaPortTypeLang;
use Phalcon\Paginator\Adapter\Model as PaginatorModel;
use GlobalVisa\Repositories\PortType;
use GlobalVisa\Repositories\PortTypeLang;
use GlobalVisa\Utils\Validator;
class PorttypeController extends ControllerBase
{
    public function indexAction()
    {
        $arrival_id = $this->request->get("slcArrivalCountry");
        if(is_null($arrival_id)){
            $arrival_id = [];
        }
        $list_type = $this->getParameter($arrival_id);
        $country_code = PortType::getArrival($arrival_id);
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
            'select_arrival_country' => $country_code,
        ));
    }

    public function createAction()
    {
        $this->view->pick($this->controllerName . '/model');
        $data = array('type_arrival_id' => '' , 'type_active' => 'Y');
        $messages = array();
        $getCountry = PortType::getArrival($data['type_arrival_id']);
        if ($this->request->isPost()) {
            $data = array(
                'type_name' => $this->request->getPost("txtName", array('string', 'trim')),
                'type_arrival_id' => $this->request->getPost("slcArrival"),
                'type_order' => $this->request->getPost("txtOrder", array('string', 'trim')),
                'type_active' => $this->request->getPost("radActive", array('string', 'trim')),
            );

            if (empty($data['type_name'])) {
                $messages['type_name'] = "Name field is required.";
            }
            if (empty($data['type_arrival_id'])) {
                $messages['type_arrival_id'] = "Arrival field is required.";
            }
            if (empty($data["type_order"])) {
                $messages["type_order"] = "Order field is required.";
            } elseif (!is_numeric($data['type_order'])) {
                $messages["type_order"] = "Order  is number.";
            }
            if (empty($data['type_active'])) {
                $messages['type_active'] = "Arrival field is required.";
            }
            if (count($messages) == 0) {
                $new_type = new NewPortType();
                $message = "We can't store your info now:" . "<br/>";
                if ($new_type->save($data)) {
                    $message = 'Create the Type ID: ' . $new_type->getTypeId() . ' success.';
                    $msg_result = array('status' => 'success', 'msg' => $message);
                } else {
                    foreach ($new_type->getMessages() as $msg) {
                        $message .= $msg . "<br/>";
                    }
                    $msg_result = array('status' => 'error', 'msg' => $message);
                }
                $this->session->set('msg_result', $msg_result);
                $this->response->redirect("/porttype");
                return;
            }
        }
        $messages["status"] = "border-red";
        $data['mode'] = 'create';
        $this->view->setVars(array(
            'title' => 'Add Port Type',
            'formData' => $data,
            'messages' => $messages,
            'select_arrival'=> $getCountry
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
        $arrival = PortType::findFirstById($id);
        if (empty($arrival)) {
            return $this->response->redirect('notfound');
        }
        $data = $arrival->toArray();
        $data['country_code'] = $data['type_arrival_id'];
        $messages = array();
        if ($this->request->isPost()) {

            $data = array(
                'type_name' => $this->request->getPost("txtName", array('string', 'trim')),
                'type_arrival_id' => $this->request->getPost("slcArrival"),
                'type_order' => $this->request->getPost("txtOrder", array('string', 'trim')),
                'type_active' => $this->request->getPost("radActive", array('string', 'trim')),
            );

            if (empty($data['type_name'])) {
                $messages['type_name'] = "Name field is required.";
            }
            if (empty($data['type_arrival_id'])) {
                $messages['type_arrival_id'] = "Arrival field is required.";
            }
            if (empty($data["type_order"])) {
                $messages["type_order"] = "Order field is required.";
            } elseif (!is_numeric($data['type_order'])) {
                $messages["type_order"] = "Order  is number.";
            }
            if (empty($data['type_active'])) {
                $messages['type_active'] = "Arrival field is required.";
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
                return $this->response->redirect("/porttype");
            }
        }
        $country_code = PortType::getArrival($data['country_code']);
        $messages["status"] = "border-red";

        $this->view->setVars(array(
            'title' => 'Edit Port Type',
            'formData' => $data,
            'messages' => $messages,
            'select_arrival' => $country_code,
        ));
    }

    private function getParameter($arrival_id)
    {
        $keyword = trim($this->request->get("txtSearch"));
        $arrParameter = [];
        $sql = "SELECT m.type_id,m.type_name,m.type_arrival_id,m.type_order,m.type_active,c.country_name
                FROM GlobalVisa\Models\NewPortType AS m 
                INNER JOIN GlobalVisa\Models\NewArrival AS a ON m.type_arrival_id = a.arrival_id
                 INNER JOIN GlobalVisa\Models\NewCountry AS c ON c.country_code = a.arrival_country_code WHERE 1";
        if (!empty($keyword)) {
            $sql .= " AND m.type_id  = :keyword: OR m.type_name like CONCAT('%',:keyword:,'%') ";
            $arrParameter['keyword'] = $keyword;
            $this->dispatcher->setParam("txtSearch", $keyword);
        }
        if (!empty($arrival_id)) {
            $sql .= " AND m.type_arrival_id  = :arrival_id: ";
            $arrParameter['arrival_id'] = $arrival_id;
            $this->dispatcher->setParam("slcArrivalCountry", $arrival_id);
        }
        $sql .= " ORDER BY m.type_id DESC";
        return $this->modelsManager->executeQuery($sql, $arrParameter);
    }

    public function deleteAction()
    {
        $items_checked = $this->request->getPost("item");
        if (!empty($items_checked)) {
            $msg_result = array();
            $count_delete = 0;
            foreach ($items_checked as $id) {
                $item = PortType::findFirstById($id);
                if ($item) {
                    if ($item->delete() === false) {
                        $message_delete = 'Can\'t delete the Port Type ID = ' . $item->getTypeId();
                        $msg_result['status'] = 'error';
                        $msg_result['msg'] .= $message_delete;
                    }else{
                        $count_delete ++;
                        PortTypeLang::deleteById($id);
                    }
                }
            }
        }
        if ($count_delete > 0) {
            $message_delete = 'Delete ' . $count_delete . ' Port Type successfully' . "<br>";
            $msg_result['status'] = 'success';
            $msg_result['msg'] .= $message_delete;
        }
        $this->session->set('msg_result', $msg_result);
        return $this->response->redirect('/porttype');
    }

}