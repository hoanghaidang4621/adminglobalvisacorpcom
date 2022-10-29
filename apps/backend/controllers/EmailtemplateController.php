<?php

namespace GlobalVisa\Backend\Controllers;

use GlobalVisa\Models\NewTemplateEmail;
use GlobalVisa\Models\VisaTemplateEmail;
use GlobalVisa\Models\VisaTemplateEmailLang;
use GlobalVisa\Repositories\EmailTemplate;
use GlobalVisa\Utils\Validator;
use Phalcon\Paginator\Adapter\NativeArray;

class EmailtemplateController extends ControllerBase
{
    public function indexAction()
    {
        $current_page = $this->request->getQuery('page');
        $data = $this->getParameter();
        $list_email_template =  $this->modelsManager->executeQuery($data['sql'], $data['para']);
        $result = array();
        if ($list_email_template && sizeof($list_email_template) > 0) {
            foreach ($list_email_template as $item) {
                $result[] = \Phalcon\Mvc\Model::cloneResult(new NewTemplateEmail(), $item->toArray());
            }
        }
        $paginator = new NativeArray(
            [
                'data' => $result,
                'limit' => 20,
                'page' => $current_page,
            ]
        );

        if ($this->session->has('msg_result')) {
            $msg_result = $this->session->get('msg_result');
            $this->session->remove('msg_result');
            $this->view->msg_result = $msg_result;
        }
        if ($this->session->has('msg_del')) {
            $msg_result = $this->session->get('msg_del');
            $this->session->remove('msg_del');
            $this->view->msg_del = $msg_result;
        };
        $this->view->setVars(array(
            'list_email_template' => $paginator->getPaginate(),
        ));
    }

    public function createAction()
    {
        $this->view->pick($this->controllerName.'/model');
        $data = array( 'email_status' => 'Y');
        if ($this->request->isPost()) {
            $data = array(
                'email_type' => $this->request->getPost("txtType", array('string', 'trim')),
                'email_subject' => $this->request->getPost("txtSubject", array('string', 'trim')),
                'email_pre_header' => $this->request->getPost("txtPreHeader"),
                'email_content' => $this->request->getPost("txtContent"),
                'email_status' => $this->request->getPost("radStatus"),
            );
            $messages = array();
            if (empty($data['email_type'])) {
                $messages['type'] = 'Type field is required.';
            }else if (EmailTemplate::checkKeyword($data["email_type"], -1)) {
                $messages["type"] = "Type field is exist.";
            }
            if (count($messages) == 0) {
                $new_emailTemplate = new NewTemplateEmail();
                $new_emailTemplate->setEmailType($data['email_type']);
                $new_emailTemplate->setEmailSubject($data['email_subject']);
                $new_emailTemplate->setEmailPreHeader($data['email_pre_header']);
                $new_emailTemplate->setEmailContent($data['email_content']);
                $new_emailTemplate->setEmailStatus($data['email_status']);
                if ($new_emailTemplate->save() === true) {
                    $msg_result = array('status' => 'success', 'msg' => 'Create Email Template Success');
                } else {
                    $msg_result = array('status' => 'error', 'msg' => 'Create Email Template Fail !');
                }
                $this->session->set('msg_result', $msg_result);
                return $this->response->redirect('/emailtemplate');
            }
        }
        $messages['status'] = 'border-red';
        $this->view->setVars(array(
            'formData' => $data,
            'messages' => $messages,
        ));
    }

    public function editAction()
    {
        $this->view->pick($this->controllerName.'/model');
        $id = $this->request->getQuery('id');
        $checkID = new Validator();
        if (!$checkID->validInt($id)) {
            var_dump(11);die();
            return $this->response->redirect('notfound');
        }

        $email_template_model = EmailTemplate::findFirstById($id);
        if (empty($email_template_model)) {
            var_dump(22);die();
            return $this->response->redirect('notfound');
        }
        $messages = array();
        $data_post = array(
            'email_type' => '',
            'email_subject' => '',
            'email_pre_header' => '',
            'email_content' => '',
            'email_status' => '',
        );
        if ($this->request->isPost()) {
            if (!isset($_POST['save'])) {
                $this->view->disable();
                $this->response->redirect("notfound");
                return;
            }
            $data_post['email_subject'] = $this->request->get("txtSubject", array('string', 'trim'));
            $data_post['email_pre_header'] = trim($this->request->get("txtPreHeader"));
            $data_post['email_content'] = trim($this->request->get("txtContent"));
            $data_post['email_type'] = $this->request->get("txtType", array('string', 'trim'));
            $data_post['email_status'] = $this->request->getPost('radStatus');
            if (empty($data_post['email_type'])) {
                $messages['type'] = 'Type field is required.';
            }else if (EmailTemplate::checkKeyword($data_post["email_type"], $id)) {
                $messages["type"] = "Type field is exist.";
            }
            if (empty($messages)) {
                $msg_result = array();
                if ($email_template_model->update($data_post)) {
                    $msg_result = array('status' => 'success', 'msg' => 'Edit Port Success');
                } else {
                    $message = "We can't store your info now: \n";
                    foreach ($email_template_model->getMessages() as $msg) {
                        $message .= $msg . "\n";
                    }
                    $msg_result['status'] = 'error';
                    $msg_result['msg'] = $message;
                }
                $this->session->set('msg_result', $msg_result);
                return $this->response->redirect("/emailtemplate");
            }
        }
        $formData = array(
            'email_id' => $email_template_model->getEmailId(),
            'email_type' => $email_template_model->getEmailType(),
            'email_subject' => $email_template_model->getEmailSubject(),
            'email_pre_header' => $email_template_model->getEmailPreHeader(),
            'email_content' => $email_template_model->getEmailContent(),
            'email_status' =>$email_template_model->getEmailStatus(),
        );
        $messages['status'] = 'border-red';
        $this->view->setVars(array(
            'formData' => $formData,
            'messages' => $messages,
        ));
    }

    public function deleteAction()
    {
        $email_template_checked = $this->request->getPost("item");
        $msg_result =array();
        if (!empty($email_template_checked)) {
            $total = 0;
            foreach ($email_template_checked as $id) {
                $email_template_item = EmailTemplate::findFirstById($id);
                if ($email_template_item) {
                    $msg_result = array();
                    if ($email_template_item->delete() === false) {
                        $message_delete = 'Can\'t delete the Port Name = ' . $email_template_item->getEmailType();
                        $msg_result['status'] = 'error';
                        $msg_result['msg'] = $message_delete;
                    } else {
                        $tn_log[$id] = $email_template_item->toArray();
                    }
                }
            }
            if (count($tn_log) > 0) {
                $message_delete = 'Delete ' . count($tn_log) . ' Email Template successfully.';
                $msg_result['status'] = 'success';
                $msg_result['msg'] = $message_delete;
            }
            $this->session->set('msg_result', $msg_result);
            return $this->response->redirect("/emailtemplate");
        }
    }
    private function getParameter()
    {
        $keyword = trim($this->request->get("txtSearch"));
        $arrParameter = array();
        $sql = "SELECT p.* FROM GlobalVisa\Models\NewTemplateEmail p WHERE 1";;
        if (!empty($keyword)) {
            $sql .= " AND email_id = :keyword: OR email_type like CONCAT('%',:keyword:,'%') OR email_subject like CONCAT('%',:keyword:,'%')";
            $arrParameter['keyword'] = $keyword;
            $this->dispatcher->setParam("txtSearch", $keyword);
        }
        $sql .= " ORDER BY p.email_id DESC";
        $data['para'] = $arrParameter;
        $data['sql'] = $sql;
        return $data;
    }
}
