<?php

namespace GlobalVisa\Backend\Controllers;

use GlobalVisa\Models\NewExtraService;
use GlobalVisa\Models\VisaLanguage;
use GlobalVisa\Models\VisaExtraservice;
use GlobalVisa\Models\VisaExtraserviceLang;
use Phalcon\Paginator\Adapter\Model as PaginatorModel;
use GlobalVisa\Repositories\ExtraService;
use GlobalVisa\Utils\Validator;

class ExtraserviceController extends ControllerBase
{
    public function indexAction()
    {
        $group_id = $this->request->get("slcGroup");
        if(is_null($group_id)){
            $group_id = [];
        }
        $list_service = $this->getParameter($group_id);
        $getGroup = ExtraService::getGroup($group_id);
        $current_page = $this->request->get('page');
        $validator = new Validator();
        if ($validator->validInt($current_page) == false || $current_page < 1)
            $current_page = 1;
        $paginator = new PaginatorModel(
            array(
                'data' => $list_service,
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
            'group_extra_service' => $getGroup,
            'msg_result' => $msg_result,
            'msg_delete' => $msg_delete,
        ));
    }

    public function createAction()
    {
        $this->view->pick($this->controllerName . '/model');
        $data = array('service_id' => -1, 'service_active' => 'Y','service_order' => 1);
        $group_id = $this->request->get("slcGroup");
        if(is_null($group_id)){
            $group_id = [];
        }
        $getGroup = ExtraService::getGroup($group_id);
        $messages = array();
        if ($this->request->isPost()) {
            if(!isset($_POST['save'])){
                $this->view->disable();
                $this->response->redirect("notfound");
                return;
            }
            $data = array(
                'service_name' => $this->request->getPost("txtName", array('string', 'trim')),
                'service_active' => $this->request->getPost("radActive"),
                'service_order' => $this->request->getPost("txtOrder", array('string', 'trim')),
                'service_listed_price' => $this->request->getPost("txtListedPrice", array('string', 'trim')),
                'service_group_id' => $this->request->getPost("slcGroup"),
                'service_price' => $this->request->getPost("txtPrice", array('string', 'trim')),
                'service_discount' => $this->request->getPost("txtDiscount", array('string', 'trim')),
                'service_description' => trim($this->request->getPost("txtDescription")),
            );
            if (empty($data['service_name'])) {
                $messages['service_name'] = "Name field is required.";
            }
            if (empty($data["service_group_id"])) {
                $messages["service_group_id"] = "Group field is required.";
            } elseif (!is_numeric($data['service_group_id'])) {
                $messages["service_group_id"] = "Group  is number.";
            }
            if (empty($data["service_listed_price"])) {
                $messages["service_listed_price"] = "Listed Price field is required.";
            } elseif (!is_numeric($data['service_listed_price'])) {
                $messages["service_listed_price"] = "Listed Price  is number.";
            }
            if (empty($data["service_price"])) {
                $messages["service_price"] = "Price field is required.";
            } elseif (!is_numeric($data['service_price'])) {
                $messages["service_price"] = "Price  is number.";
            }
            if (empty($data["service_order"])) {
                $messages["service_order"] = "Order field is required.";
            } elseif (!is_numeric($data['service_order'])) {
                $messages["service_order"] = "Order  is number.";
            }
            if (count($messages) == 0) {
                $new_service = new NewExtraService();
                $message = "We can't store your info now:" . "<br/>";
                if ($new_service->save($data)) {
                    $message = 'Create the Extra Service ID: ' . $new_service->getServiceId() . ' success.';
                    $msg_result = array('status' => 'success', 'msg' => $message);
                } else {
                    foreach ($new_service->getMessages() as $msg) {
                        $message .= $msg . "<br/>";
                    }
                    $msg_result = array('status' => 'error', 'msg' => $message);
                }
                $this->session->set('msg_result', $msg_result);
                $this->response->redirect("/extraservice");
                return;
            }
        }
        $messages["status"] = "border-red";
        $data['mode'] = 'create';
        $this->view->setVars(array(
            'title' => 'Create extra service',
            'group_extra_service' => $getGroup,
            'formData' => $data,
            'messages' => $messages,
        ));
    }

    public function editAction()
    {
        $this->view->pick($this->controllerName . '/model');
        $id = $this->request->get('id');
        $service_model = ExtraService::findFirstById($id);
        if(empty($service_model))
        {
            return $this->response->redirect('notfound');
        }
        $messages = array();

        if($this->request->isPost()) {
            if(!isset($_POST['save'])){
                $this->view->disable();
                $this->response->redirect("notfound");
                return;
            }
            $data = array(
                'service_name' => $this->request->getPost("txtName", array('string', 'trim')),
                'service_active' => $this->request->getPost("radActive"),
                'service_order' => $this->request->getPost("txtOrder", array('string', 'trim')),
                'service_listed_price' => $this->request->getPost("txtListedPrice", array('string', 'trim')),
                'service_group_id' => $this->request->getPost("slcGroup"),
                'service_price' => $this->request->getPost("txtPrice", array('string', 'trim')),
                'service_discount' => $this->request->getPost("txtDiscount", array('string', 'trim')),
                'service_description' => trim($this->request->getPost("txtDescription")),
            );
            if (empty($data['service_name'])) {
                $messages['service_name'] = "Name field is required.";
            }
            if (empty($data["service_group_id"])) {
                $messages["service_group_id"] = "Group field is required.";
            } elseif (!is_numeric($data['service_group_id'])) {
                $messages["service_group_id"] = "Group  is number.";
            }
            if (empty($data["service_listed_price"])) {
                $messages["service_listed_price"] = "Listed Price field is required.";
            } elseif (!is_numeric($data['service_listed_price'])) {
                $messages["service_listed_price"] = "Listed Price  is number.";
            }
            if (empty($data["service_price"])) {
                $messages["service_price"] = "Price field is required.";
            } elseif (!is_numeric($data['service_price'])) {
                $messages["service_price"] = "Price  is number.";
            }
            if (empty($data["service_order"])) {
                $messages["service_order"] = "Order field is required.";
            } elseif (!is_numeric($data['service_order'])) {
                $messages["service_order"] = "Order  is number.";
            }

            if (count($messages) == 0) {
                $msg_result = array();
                if ($service_model->update($data)) {
                    $msg_result = array('status' => 'success', 'msg' => 'Edit extra service Success');
                } else {
                    $message = "We can't store your info now: \n";
                    foreach ($service_model->getMessages() as $msg) {
                        $message .= $msg . "\n";
                    }
                    $msg_result['status'] = 'error';
                    $msg_result['msg'] = $message;
                }
                $this->session->set('msg_result', $msg_result);
                return $this->response->redirect("/extraservice");
            }
        }
        $formData = array(
            'service_name' => $service_model->getServiceName(),
            'service_id'=>$service_model->getServiceId(),
            'service_active' =>$service_model->getServiceActive(),
            'service_order' => $service_model->getServiceOrder(),
            'service_listed_price' => $service_model->getServiceListedPrice(),
            'service_price' => $service_model->getServicePrice(),
            'service_group_id' => $service_model->getServiceGroupId(),
            'service_discount' =>$service_model->getServiceDiscount(),
            'service_description'  =>$service_model->getServiceDescription(),
        );
        $getGroup = ExtraService::getGroup($formData['service_group_id']);
        $messages['status'] = 'border-red';
        $this->view->setVars([
            'formData' => $formData,
            'group_extra_service' => $getGroup,
            'messages' => $messages,
        ]);

    }
    private function getParameter($group_id)
    {
        $keyword = trim($this->request->get("txtSearch"));
        $arrParameter = [];
        $sql = "SELECT * FROM GlobalVisa\Models\NewExtraService AS m WHERE 1 ";
        if (!empty($keyword)) {
            $sql .= " AND m.service_id  = :keyword: OR m.service_name like CONCAT('%',:keyword:,'%') ";
            $arrParameter['keyword'] = $keyword;
            $this->dispatcher->setParam("txtSearch", $keyword);
        }
        if (!empty($group_id)) {
            $sql .= " AND m.service_group_id  = :id:";
            $arrParameter['id'] = $group_id;
            $this->dispatcher->setParam("slcGroup", $group_id);
        }

        $sql .= " ORDER BY m.service_id DESC";
        return $this->modelsManager->executeQuery($sql, $arrParameter);
    }

    public function deleteAction()
    {
        $items_checked = $this->request->getPost("item");
        if (!empty($items_checked)) {
            $msg_result = array();
            $count_delete = 0;
            foreach ($items_checked as $id) {
                $item = Extraservice::findFirstById($id);
                if ($item) {
                    if ($item->delete() === false) {
                        $message_delete = 'Can\'t delete the Car ID = ' . $item->getServiceId();
                        $msg_result['status'] = 'error';
                        $msg_result['msg'] .= $message_delete;
                    }else{
                        $count_delete ++;
                    }
                }
            }
        }
        if ($count_delete > 0) {
            $message_delete = 'Delete ' . $count_delete . ' ExtraService successfully' . "<br>";
            $msg_result['status'] = 'success';
            $msg_result['msg'] .= $message_delete;
        }
        $this->session->set('msg_result', $msg_result);
        return $this->response->redirect('/extraservice');
    }

}