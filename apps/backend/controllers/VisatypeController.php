<?php

namespace GlobalVisa\Backend\Controllers;

use GlobalVisa\Models\NewVisaType;
use GlobalVisa\Models\VisaLanguage;
use Phalcon\Paginator\Adapter\Model as PaginatorModel;
use GlobalVisa\Repositories\VisaType;
use GlobalVisa\Utils\Validator;

class VisatypeController extends ControllerBase
{
    public function indexAction()
    {

        $arrival_id = $this->request->get("slcArrivalCountry");
        if(is_null($arrival_id)){
            $arrival_id = [];
        }
        $list_type = $this->getParameter($arrival_id);
        $country_code = VisaType::getArrival($arrival_id);
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
        $data = array('type_id' => -1, 'type_active' => 'Y', 'type_order' => 1, 'type_arrival_id' => '');
        $messages = array();
        if ($this->request->isPost()) {
            $data = array(
                'type_group_name' => $this->request->getPost("txtGroupName", array('string', 'trim')),
                'type_name' => $this->request->getPost("txtName", array('string', 'trim')),
                'type_arrival_id' => trim($this->request->getPost("slcArrival")),
                'type_active' => $this->request->getPost("radActive"),
                'type_order' => $this->request->getPost("txtOrder", array('string', 'trim')),
                'type_description' => trim($this->request->getPost("txtDescription")),
                'type_document_requirement' => trim($this->request->getPost("txtDocumentRequirement")),
            );
            if (empty($data['type_group_name'])) {
                $messages['type_group_name'] = "Group Type field is required.";
            }
            if (empty($data['type_name'])) {
                $messages['type_name'] = "Name field is required.";
            }
            if (empty($data['type_arrival_id'])) {
                $messages['type_arrival_id'] = "Arrival field is required.";
            }
            if (empty($data['type_active'])) {
                $messages['type_active'] = "Active field is required.";
            }
            if (empty($data["type_order"])) {
                $messages["type_order"] = "Order field is required.";
            } elseif (!is_numeric($data['type_order'])) {
                $messages["type_order"] = "Order  is number.";
            }
            if (empty($data['type_description'])) {
                $messages['type_description'] = "Description field is required.";
            }
            if (count($messages) == 0) {
                $new_type = new NewVisaType();
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
                $this->response->redirect("/visatype");
                return;
            }
        }
        $country_code = VisaType::getArrival($data['type_arrival_id']);
        $messages["status"] = "border-red";
        $data['mode'] = 'create';
        $this->view->setVars(array(
            'title' => 'Create Visa Type',
            'formData' => $data,
            'messages' => $messages,
            'select_arrival' => $country_code,
        ));
    }

    public function editAction()
    {
        $id = $this->request->get('id');
        $data = array('type_arrival_id' => '');
        $type_model = VisaType::findFirstById($id);
        if (empty($type_model)) {
            return $this->response->redirect('notfound');
        }
        $data_post = $type_model->toArray();
        $data['type_arrival_id'] = $data_post['type_arrival_id'];
        $messages = array();
        if ($this->request->isPost()) {
            $data_post['type_group_name'] = $this->request->getPost("txtGroupName", array('string', 'trim'));
            $data_post['type_name'] = $this->request->getPost("txtName", array('string', 'trim'));
            $data_post['type_arrival_id'] = trim($this->request->getPost("slcArrival"));
            $data_post['type_active'] = $this->request->getPost("radActive");
            $data_post['type_order'] = $this->request->getPost("txtOrder", array('string', 'trim'));
            $data_post['type_description'] = trim($this->request->getPost("txtDescription"));
            $data_post['type_document_requirement'] = trim($this->request->getPost("txtDocumentRequirement"));
            var_dump($data_post);
            if (empty($data_post['type_group_name'])) {
                $messages['type_group_name'] = "Group Type field is required.";
            }
            if (empty($data_post['type_name'])) {
                $messages['type_name'] = "Name field is required.";
            }
            if (empty($data_post['type_arrival_id'])) {
                $messages['type_arrival_id'] = "Arrival field is required.";
            }
            if (empty($data_post['type_active'])) {
                $messages['type_active'] = "Active field is required.";
            }
            if (empty($data_post["type_order"])) {
                $messages["type_order"] = "Order field is required.";
            } elseif (!is_numeric($data_post['type_order'])) {
                $messages["type_order"] = "Order  is number.";
            }
            if (empty($data_post['type_description'])) {
                $messages['type_description'] = "Description field is required.";
            }
            if (empty($messages)) {
                $type_model = VisaType::findFirstById($id);
                $result = $type_model->update($data_post);
                if ($result) {
                    $data['type_arrival_id'] = $data_post['type_arrival_id'];
                    $messages = array(
                        'message' => ucfirst(" Update Visa Type success"),
                        'typeMessage' => "success",
                    );
                } else {
                    $messages = array(
                        'message' => "Update Visa Type fail",
                        'typeMessage' => "error",
                    );
                }
            }
        }

        $formData = array(
            'type_id' => $type_model->getTypeId(),
            'type_group_name' => $type_model->getTypeGroupName(),
            'type_name' => $type_model->getTypeName(),
            'type_arrival_id' => $type_model->getTypeArrivalId(),
            'type_description' => $type_model->getTypeDescription(),
            'type_document_requirement' => $type_model->getTypeDocumentRequirement(),
            'type_order' => $type_model->getTypeOrder(),
            'type_active' => $type_model->getTypeActive()
        );

        $messages['status'] = 'border-red';
        $country_code = VisaType::getArrival($data['type_arrival_id']);
        $this->view->setVars([
            'formData' => $formData,
            'messages' => $messages,
            'select_arrival' => $country_code,
        ]);

    }

    private function getParameter($arrival_id)
    {
        $keyword = trim($this->request->get("txtSearch"));
        $arrParameter = [];
        $sql = "SELECT m.type_id,m.type_name,m.type_group_name,m.type_group_name,m.type_active,m.type_order, c.country_name FROM 
        GlobalVisa\Models\NewVisaType AS m 
        INNER JOIN GlobalVisa\Models\NewArrival AS a  ON m.type_arrival_id = a.arrival_id
        INNER JOIN GlobalVisa\Models\NewCountry AS c ON a.arrival_country_code = c.country_code WHERE 1 ";
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
                $item = VisaType::findFirstById($id);
                if ($item) {
                    if ($item->delete() === false) {
                        $message_delete = 'Can\'t delete the Visa Type ID = ' . $item->getTypeId();
                        $msg_result['status'] = 'error';
                        $msg_result['msg'] .= $message_delete;
                    } else {
                        $count_delete++;
                        VisaType::deleteById($id);
                    }
                }
            }
        }
        if ($count_delete > 0) {
            $message_delete = 'Delete ' . $count_delete . ' Visa Type successfully' . "<br>";
            $msg_result['status'] = 'success';
            $msg_result['msg'] .= $message_delete;
        }
        $this->session->set('msg_result', $msg_result);
        return $this->response->redirect('/visatype');
    }

}