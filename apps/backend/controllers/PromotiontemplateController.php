<?php

namespace GlobalVisa\Backend\Controllers;

use GlobalVisa\Models\VisaPromotionTemplate;
use GlobalVisa\Repositories\PromotionTemplate;
use GlobalVisa\Repositories\Language;
use GlobalVisa\Utils\Validator;
use Phalcon\Paginator\Adapter\NativeArray;

class PromotiontemplateController extends ControllerBase
{
    public function indexAction()
    {
        $current_page = $this->request->getQuery('page');
        $data = $this->getParameter();
        $list_promotion_template =  $this->modelsManager->executeQuery($data['sql'], $data['para']);
        $result = array();
        if ($list_promotion_template && sizeof($list_promotion_template) > 0) {
            foreach ($list_promotion_template as $item) {
                $result[] = \Phalcon\Mvc\Model::cloneResult(new VisaPromotionTemplate(), $item->toArray());
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
        }
        $this->view->setVars(array(
            'list_promotion_template' => $paginator->getPaginate()
        ));
    }

    public function createAction()
    {
        $this->view->pick($this->controllerName.'/model');
        $data = array('template_id' => -1);
        if ($this->request->isPost()) {
            $data = array(
                'template_title' => $this->request->getPost("txtTitle", array('string', 'trim')),
                'template_content' => trim($this->request->getPost("txtContent")),
            );
            $messages = array();
            if ($data["template_title"] == '') {
                $messages["title"] = "Title field is required.";
            }
            if (empty($data["template_content"])) {
                $messages["content"] = "Content field is required.";
            }
            if (count($messages) == 0) {

                $new_promotion_template = new VisaPromotionTemplate();
                $new_promotion_template->setTemplateTitle($data['template_title']);
                $new_promotion_template->setTemplateContent($data['template_content']);
                if ($new_promotion_template->save() === true) {
                    $msg_result = array('status' => 'success', 'msg' => 'Create Promotion Template Success');
                    $this->session->set('msg_result', $msg_result);
                } else {
                    $msg_result = array('status' => 'error', 'msg' => 'Create Promotion Template Fail !');
                    $this->session->set('msg_result', $msg_result);
                }
                return $this->response->redirect('/promotiontemplate');
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
            return $this->response->redirect('notfound');
        }
        $template_model = PromotionTemplate::findFirstById($id);
        if (empty($template_model)) {
            return $this->response->redirect('notfound');
        }
        $arr_translate = array();
        $messages = array();
        $data_post = array(
            'template_title' => '',
            'template_content' => '',
        );
        if ($this->request->isPost()) {
            $id = $this->request->get('id');
            $data_post['template_title'] = $this->request->get("txtTitle", array('string', 'trim'));
            $data_post['template_content'] = trim($this->request->get("txtContent"));
            if ($data_post["template_title"] == '') {
                $messages["title"] = "Title field is required.";
            }
            if (empty($data_post["template_content"])) {
                $messages["content"] = "Content field is required.";
            }
            if (empty($messages)) {
                $new_promotion_template = PromotionTemplate::findFirstById($id);
                $new_promotion_template->setTemplateTitle($data_post['template_title']);
                $new_promotion_template->setTemplateContent($data_post['template_content']);
                $result = $new_promotion_template->update();
                if ($result) {
                    $msg_result = array('status' => 'success', 'msg' => 'Update Promotion Template Success');
                    $this->session->set('msg_result', $msg_result);
                } else {
                    $msg_result = array('status' => 'error', 'msg' => 'Update Promotion Template Fail !');
                    $this->session->set('msg_result', $msg_result);
                }
                return $this->response->redirect('/promotiontemplate');
            }
        }
        $template_model = PromotionTemplate::findFirstById($id);
        $item = array(
            'template_id' => $template_model->getTemplateId(),
            'template_title' => $template_model->getTemplateTitle(),
            'template_content' => $template_model->getTemplateContent(),
        );

        $messages['status'] = 'border-red';
        $this->view->setVars(array(
            'formData' => $item,
            'messages' => $messages,
        ));
    }

    public function deleteAction()
    {
        $template_checked = $this->request->getPost("item");
        $msg_result =array();
        if (!empty($template_checked)) {
            $total = 0;
            foreach ($template_checked as $id) {
                    $template_item = PromotionTemplate::findFirstById($id);
                if ($template_item) {
                    if ($template_item->delete() === false) {
                        $message_delete = 'Can\'t delete the Promotion Template Title = ' . $template_item->getTemplateTitle();
                        $msg_result['status'] = 'error';
                        $msg_result['msg'] = $message_delete;
                    } else {
                        $total ++;
                    }
                }
            }
            if ($total > 0) {
                $message_delete = 'Delete ' . $total . ' Email Template successfully.';
                $msg_result['status'] = 'success';
                $msg_result['msg'] = $message_delete;
            }
            $this->session->set('msg_result', $msg_result);
            return $this->response->redirect("/promotiontemplate");
        }
    }
    private function getParameter()
    {
        $keyword = trim($this->request->get("txtSearch"));
        $validator = new Validator();
        $arrParameter = array();
        $sql = "SELECT p.* FROM GlobalVisa\Models\VisaPromotionTemplate p WHERE 1";;
        if (!empty($keyword)) {
            $sql .= " AND template_id = :keyword:  OR template_title like CONCAT('%',:keyword:,'%')";
            $arrParameter['keyword'] = $keyword;
            $this->dispatcher->setParam("txtSearch", $keyword);
        }
        $sql .= " ORDER BY p.template_id DESC";
        $data['para'] = $arrParameter;
        $data['sql'] = $sql;
        return $data;
    }
}
