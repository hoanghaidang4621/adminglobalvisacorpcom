<?php

namespace GlobalVisa\Backend\Controllers;

use GlobalVisa\Models\NewGroupExtraService;
use GlobalVisa\Models\NewPortType;
use GlobalVisa\Models\VisaLanguage;
use GlobalVisa\Models\VisaPortTypeLang;
use GlobalVisa\Repositories\Groupextraservice;
use Phalcon\Paginator\Adapter\Model as PaginatorModel;
use GlobalVisa\Repositories\PortType;
use GlobalVisa\Repositories\PortTypeLang;
use GlobalVisa\Utils\Validator;

class GroupextraserviceController extends ControllerBase
{
    public function indexAction()
    {
        $arrival_id = $this->request->get("slcArrivalCountry");
        if(is_null($arrival_id)){
            $arrival_id = [];
        }
        $list = $this->getParameter($arrival_id);
        $combobox_arival = Groupextraservice::getArrival($arrival_id);
        $current_page = $this->request->get('page');
        $validator = new Validator();
        if ($validator->validInt($current_page) == false || $current_page < 1)
            $current_page = 1;
        $paginator = new PaginatorModel(
            array(
                'data' => $list,
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
            'select_arrival_country' => $combobox_arival,
        ));
    }

    public function createAction()
    {
        $this->view->pick($this->controllerName . '/model');
        $data = array('group_arrival_id' => '' , 'group_active' => 'Y');
        $messages = array();
        $getCountry = Groupextraservice::getArrival($data['group_arrival_id']);
        if ($this->request->isPost()) {
            $data = array(
                'group_name' => $this->request->getPost("txtName", array('string', 'trim')),
                'group_arrival_id' => $this->request->getPost("slcArrival"),
                'group_description' => $this->request->getPost("txtDescription", array('string', 'trim')),
                'group_order' => $this->request->getPost("txtOrder", array('string', 'trim')),
                'group_active' => $this->request->getPost("radActive", array('string', 'trim')),
            );
            if (empty($data['group_name'])) {
                $messages['group_name'] = "Name field is required.";
            }
            if (empty($data['group_arrival_id'])) {
                $messages['group_name'] = "Arrival field is required.";
            }
            if (empty($data["group_order"])) {
                $messages["group_order"] = "Order field is required.";
            } elseif (!is_numeric($data['group_order'])) {
                $messages["group_order"] = "Order  is number.";
            }
            if (empty($data['group_active'])) {
                $messages['group_active'] = "Arrival field is required.";
            }
            if (count($messages) == 0) {
                $new_group_extra_service = new NewGroupExtraService();
                $message = "We can't store your info now:" . "<br/>";
                if ($new_group_extra_service->save($data)) {
                    $message = 'Create the Group extra service ID: ' . $new_group_extra_service->getGroupId() . ' success.';
                    $msg_result = array('status' => 'success', 'msg' => $message);
                } else {
                    foreach ($new_group_extra_service->getMessages() as $msg) {
                        $message .= $msg . "<br/>";
                    }
                    $msg_result = array('status' => 'error', 'msg' => $message);
                }
                $this->session->set('msg_result', $msg_result);
                $this->response->redirect("/groupextraservice");
                return;
            }
        }
        $messages["status"] = "border-red";
        $data['mode'] = 'create';
        $this->view->setVars(array(
            'title' => 'Add Group Extra Service',
            'formData' => $data,
            'messages' => $messages,
            'select_arrival'=> $getCountry
        ));
    }

    public function editAction()
    {
        $this->view->pick($this->controllerName . '/model');
        $data = array('group_arrival_id' => '');
        $id = $this->request->get('id');
        $checkID = new Validator();
        if (!$checkID->validInt($id)) {
            return $this->response->redirect('notfound');
        }
        $group_extra_service = Groupextraservice::findFirstById($id);
        if (empty($group_extra_service)) {
            return $this->response->redirect('notfound');
        }
        $data = $group_extra_service->toArray();
        $messages = array();
        if ($this->request->isPost()) {
            $data = array(
                'group_name' => $this->request->getPost("txtName", array('string', 'trim')),
                'group_arrival_id' => $this->request->getPost("slcArrival"),
                'group_description' => $this->request->getPost("txtDescription", array('string', 'trim')),
                'group_order' => $this->request->getPost("txtOrder", array('string', 'trim')),
                'group_active' => $this->request->getPost("radActive", array('string', 'trim')),
            );
            if (empty($data['group_name'])) {
                $messages['group_name'] = "Name field is required.";
            }
            if (empty($data['group_arrival_id'])) {
                $messages['group_name'] = "Arrival field is required.";
            }
            if (empty($data["group_order"])) {
                $messages["group_order"] = "Order field is required.";
            } elseif (!is_numeric($data['group_order'])) {
                $messages["group_order"] = "Order  is number.";
            }
            if (empty($data['group_active'])) {
                $messages['group_active'] = "Arrival field is required.";
            }
            if (count($messages) == 0) {
                $msg_result = array();
                if ($group_extra_service->update($data)) {
                    $msg_result = array('status' => 'success', 'msg' => 'Edit group extra service Success');
                } else {
                    $message = "We can't store your info now: \n";
                    foreach ($group_extra_service->getMessages() as $msg) {
                        $message .= $msg . "\n";
                    }
                    $msg_result['status'] = 'error';
                    $msg_result['msg'] = $message;
                }
                $this->session->set('msg_result', $msg_result);
                return $this->response->redirect("/groupextraservice");
            }
        }
        $country_code = PortType::getArrival($data['group_arrival_id']);
        $messages["status"] = "border-red";
        $this->view->setVars(array(
            'title' => 'Edit Group Extra Service',
            'formData' => $data,
            'messages' => $messages,
            'select_arrival' => $country_code,
        ));
    }

    private function getParameter($arrival_id)
    {
        $keyword = trim($this->request->get("txtSearch"));
        $arrParameter = [];
        $sql = "SELECT m.group_id ,m.group_name,m.group_description,m.group_order,m.group_active,c.country_name
                FROM GlobalVisa\Models\NewGroupExtraService AS m 
                INNER JOIN GlobalVisa\Models\NewArrival AS a ON m.group_arrival_id = a.arrival_id
                 INNER JOIN GlobalVisa\Models\NewCountry AS c ON c.country_code = a.arrival_country_code WHERE 1";
        if (!empty($keyword)) {
            $sql .= " AND m.group_id  = :keyword: OR m.group_name like CONCAT('%',:keyword:,'%') ";
            $arrParameter['keyword'] = $keyword;
            $this->dispatcher->setParam("txtSearch", $keyword);
        }
        if (!empty($arrival_id)) {
            $sql .= " AND m.group_arrival_id  = :arrival_id: ";
            $arrParameter['arrival_id'] = $arrival_id;
            $this->dispatcher->setParam("slcArrivalCountry", $arrival_id);
        }
        $sql .= " ORDER BY m.group_id DESC";
        return $this->modelsManager->executeQuery($sql, $arrParameter);
    }

    public function deleteAction()
    {
        $items_checked = $this->request->getPost("item");
        if (!empty($items_checked)) {
            $msg_result = array();
            $count_delete = 0;
            foreach ($items_checked as $id) {
                $item = Groupextraservice::findFirstById($id);
                if ($item) {
                    if ($item->delete() === false) {
                        $message_delete = 'Can\'t delete the Group Extra Service ID = ' . $item->getGroupId();
                        $msg_result['status'] = 'error';
                        $msg_result['msg'] .= $message_delete;
                    }else{
                        $count_delete ++;
                    }
                }
            }
        }
        if ($count_delete > 0) {
            $message_delete = 'Delete ' . $count_delete . ' Group extra service successfully' . "<br>";
            $msg_result['status'] = 'success';
            $msg_result['msg'] .= $message_delete;
        }
        $this->session->set('msg_result', $msg_result);
        return $this->response->redirect('/groupextraservice');
    }

}