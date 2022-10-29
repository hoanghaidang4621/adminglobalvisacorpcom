<?php

namespace GlobalVisa\Backend\Controllers;

use GlobalVisa\Models\NewGroupApplicant;
use GlobalVisa\Models\VisaLanguage;
use GlobalVisa\Models\VisaGroupApplicant;
use GlobalVisa\Models\VisaGroupApplicantLang;
use Phalcon\Paginator\Adapter\Model as PaginatorModel;
use GlobalVisa\Repositories\Language;
use GlobalVisa\Repositories\GroupApplicant;
use GlobalVisa\Repositories\GroupApplicantLang;
use GlobalVisa\Utils\Validator;
class GroupapplicantController extends ControllerBase
{
    public function indexAction()
    {
        $list_group = $this->getParameter();
        $current_page = $this->request->get('page');
        $validator = new Validator();
        if ($validator->validInt($current_page) == false || $current_page < 1)
            $current_page = 1;
        $paginator = new PaginatorModel(
            array(
                'data' => $list_group,
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
        $data = array('group_id' => -1, 'group_active' => 'Y');
        $messages = array();
        if ($this->request->isPost()) {
            $data = array(
                'group_name' => $this->request->getPost("txtName", array('string', 'trim')),
                'group_value' => $this->request->getPost("txtValue", array('string', 'trim')),
                'group_active' => $this->request->getPost("radActive"),
                'group_order' => $this->request->getPost("txtOrder", array('string', 'trim')),
            );
            var_dump($data);die();
            if (empty($data['group_name'])) {
                $messages['group_name'] = "Name field is required.";
            }
            if (empty($data["group_value"])) {
                $messages["group_value"] = "Value field is required.";
            } elseif (!is_numeric($data['group_value'])) {
                $messages["group_value"] = "Value  is number.";
            }
            if (empty($data["group_active"])) {
                $messages["group_order"] = "Active field is required.";
            }
            if (empty($data["group_order"])) {
                $messages["group_order"] = "Order field is required.";
            } elseif (!is_numeric($data['group_order'])) {
                $messages["group_order"] = "Order  is number.";
            }
            if (count($messages) == 0) {
                $new_group = new NewGroupApplicant();
                $message = "We can't store your info now:" . "<br/>";
                if ($new_group->save($data)) {
                    $message = 'Create the Group Apllicant ID: ' . $new_group->getGroupId() . ' success.';
                    $msg_result = array('status' => 'success', 'msg' => $message);
                } else {
                    foreach ($new_group->getMessages() as $msg) {
                        $message .= $msg . "<br/>";
                    }
                    $msg_result = array('status' => 'error', 'msg' => $message);
                }
                $this->session->set('msg_result', $msg_result);
                $this->response->redirect("/groupapplicant");
                return;
            }
        }
        $messages["status"] = "border-red";
        $data['mode'] = 'create';
        $this->view->setVars(array(
            'title' => 'Create Group Applicant',
            'formData' => $data,
            'messages' => $messages,
        ));
    }

    public function editAction()
    {
        $this->view->pick($this->controllerName . '/model');
        $id = $this->request->get('id');
        $checkID = new Validator();
        if (!$checkID->validInt($id)) {
            return $this->response->redirect('notfound');
        }
        $groupApplicant = GroupApplicant::findFirstById($id);
        if (empty($groupApplicant)) {
            return $this->response->redirect('notfound');
        }
        $data = $groupApplicant->toArray();
        $messages = array();
        if ($this->request->isPost()) {
            $data = array(
                'group_name' => $this->request->getPost("txtName", array('string', 'trim')),
                'group_value' => $this->request->getPost("txtValue", array('string', 'trim')),
                'group_order' => $this->request->getPost("txtOrder", array('string', 'trim')),
                'group_active' => $this->request->getPost("radActive", array('string', 'trim'))
            );


            if (empty($data['group_name'])) {
                $messages['group_name'] = "Name field is required.";
            }

            if (empty($data['group_value'])) {
                $messages['group_value'] = "Value field is required.";
            } elseif (!is_numeric($data['group_value'])) {
                $messages["group_value"] = "Value is number.";
            }

            if (empty($data['group_order'])) {
                $messages['group_order'] = "Order field is required.";
            } elseif (!is_numeric($data['group_order'])) {
                $messages["group_order"] = "Order is number.";
            }

            if (empty($data['group_active'])) {
                $messages['group_active'] = "Active field is required.";
            }

            if (count($messages) == 0) {
                $msg_result = array();
                if ($groupApplicant->update($data)) {
                    $msg_result = array('status' => 'success', 'msg' => 'Edit group applicant Success');
                } else {
                    $message = "We can't store your info now: \n";
                    foreach ($groupApplicant->getMessages() as $msg) {
                        $message .= $msg . "\n";
                    }
                    $msg_result['status'] = 'error';
                    $msg_result['msg'] = $message;
                }
                $this->session->set('msg_result', $msg_result);
                return $this->response->redirect("/groupapplicant");
            }
        }
        $messages["status"] = "border-red";
        $this->view->setVars(array(
            'title' => 'Edit Group Applicant',
            'formData' => $data,
            'messages' => $messages,
        ));
    }

    private function getParameter()
    {
        $keyword = trim($this->request->get("txtSearch"));
        $arrParameter = [];
        $sql = "SELECT * FROM GlobalVisa\Models\NewGroupApplicant AS m WHERE 1 ";
        if (!empty($keyword)) {
            $sql .= " AND m.group_id  = :keyword: OR m.group_name like CONCAT('%',:keyword:,'%') ";
            $arrParameter['keyword'] = $keyword;
            $this->dispatcher->setParam("txtSearch", $keyword);
        }

        $sql .= " ORDER BY m.group_id DESC";
        return $this->modelsManager->executeQuery($sql, $arrParameter);
    }

    public function deleteAction()
    {
        $items_checked = $this->request->getPost("item");
        if (!empty($items_checked)) {
            $msg_result = array();
            $tn_log = array();
            foreach ($items_checked as $id) {
                $group_applicant_item = GroupApplicant::findFirstById($id);
                if ($group_applicant_item) {
                    $msg_result = array();
                    if ($group_applicant_item->delete() === false) {
                        $message_delete = 'Can\'t delete the Arrival';
                        $msg_result['status'] = 'error';
                        $msg_result['msg'] = $message_delete;
                    } else {
                        $tn_log[$id] = $group_applicant_item->toArray();
                    }
                }
            }
        }
        if ($tn_log > 0) {
            $message_delete = 'Delete ' . count($tn_log) . ' Group Applicant successfully' . "<br>";
            $msg_result['status'] = 'success';
            $msg_result['msg'] .= $message_delete;
        }
        $this->session->set('msg_result', $msg_result);
        return $this->response->redirect('/groupapplicant');
    }

}