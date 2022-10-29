<?php

namespace GlobalVisa\Backend\Controllers;

use GlobalVisa\Models\NewCountry;
use GlobalVisa\Models\VisaCountry;
use GlobalVisa\Models\VisaCountryLang;
use GlobalVisa\Repositories\Country;
use GlobalVisa\Repositories\CountryLang;
use GlobalVisa\Repositories\Language;
use GlobalVisa\Utils\Validator;
use Phalcon\Paginator\Adapter\NativeArray;
use Phalcon\Paginator\Adapter\Model as PaginatorModel;

class CountryController extends ControllerBase
{
    public function indexAction()
    {

        $current_page = $this->request->getQuery('page');
        $keyword = $this->request->get('txtSearch', array('string', 'trim'));
        $data = $this->getParameter($keyword);

        $validator = new Validator();
        if ($validator->validInt($current_page) == false || $current_page < 1)
            $current_page = 1;
        $paginator = new PaginatorModel(
            array(
                'data' => $data,
                'limit' => 20,
                'page' => $current_page,
            )
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
            'list_country' => $paginator->getPaginate(),
        ));
    }

    public function createAction()
    {
        $this->view->pick($this->controllerName . '/model');
        $data = array('country_active' => 'Y','country_order' => 1);
        if ($this->request->isPost()) {
            $data = array(
                'country_code' => $this->request->getPost("txtCode", array('string', 'trim')),
                'country_name' => $this->request->getPost("txtName", array('string', 'trim')),
                'country_order' => $this->request->getPost("txtOrder", array('string', 'trim')),
                'country_active' => $this->request->getPost("radActive"),
            );
            $messages = array();
            if (empty($data['country_code'])) {
                $messages['country_code'] = 'Code field is required.';
            }
            if (strlen($data['country_code']) > 5 || strlen($data['country_code']) < 2){
                $messages['country_code'] = 'Code should be 2-5 characters.';
            }
            $check_exits = Country::findByCountryCode($data['country_code']);
            if (count($check_exits) == 1) {
                $messages['country_code'] = "Country code already exits.";
            }
            if (empty($data['country_name'])) {
                $messages['country_name'] = 'Name field is required.';
            }
            if (empty($data['country_order'])) {
                $messages['country_order'] = "Order field is required.";
            } else if (!is_numeric($data['country_order'])) {
                $messages['country_order'] = "Order is not valid";
            }

            if (count($messages) == 0) {
                $new_country = new NewCountry();
                $message = "We can't store your info now:" . "<br/>";
                if ($new_country->save($data)) {
                    $message = 'Create the Country Code: ' . $new_country->getCountryCode() . ' success.';
                    $msg_result = array('status' => 'success', 'msg' => $message);
                } else {
                    foreach ($new_country->getMessages() as $msg) {
                        $message .= $msg . "<br/>";
                    }
                    $msg_result = array('status' => 'error', 'msg' => $message);
                }
                $this->session->set('msg_result', $msg_result);
                $this->response->redirect("/country");
                return;
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
        $this->view->pick($this->controllerName . '/model');
        $id_country = $this->request->getQuery('id');
        $checkID = new Validator();
        if (!$checkID->validInt($id_country)) {
            return $this->response->redirect('notfound');
        }
        $country_model = Country::findFirstById($id_country);
        if (empty($country_model)) {
            return $this->response->redirect('notfound');
        }
        $formData = $country_model->toArray();
        $messages = array();
        if ($this->request->isPost()) {

            $data = array(
                'country_code' => $this->request->getPost("txtCode", array('string', 'trim')),
                'country_name' => $this->request->getPost("txtName", array('string', 'trim')),
                'country_order' => $this->request->getPost("txtOrder", array('string', 'trim')),
                'country_active' => $this->request->getPost("radActive"),
            );
            $messages = array();
            if (empty($data['country_code'])) {
                $messages['country_code'] = 'Code field is required.';
            }
            if (strlen($data['country_code']) > 5 || strlen($data['country_code']) < 2){
                $messages['country_code'] = 'Code should be 2-5 characters.';
            }

            $check_exits = Country::findByCountryCode($data['country_code']);
            $remove = $check_exits->toArray();
             if (($remove[0]['country_code'] == $data['country_code']) == false) {
                 if (count($check_exits) == 1) {
                     $messages['country_code'] = "Country code already exits.";
                 }
             }
             if (empty($data['country_name'])) {
                $messages['country_name'] = 'Name field is required.';
            }
            if (empty($data['country_order'])) {
                $messages['country_order'] = "Order field is required.";
            } else if (!is_numeric($data['country_order'])) {
                $messages['country_order'] = "Order is not valid";
            }

            if (count($messages) == 0) {
                $msg_result = array();
                if ($country_model->update($data)) {
                    $msg_result = array('status' => 'success', 'msg' => 'Edit Country Success');
                } else {
                    $message = "We can't store your info now: \n";
                    foreach ($country_model->getMessages() as $msg) {
                        $message .= $msg . "\n";
                    }
                    $msg_result['status'] = 'error';
                    $msg_result['msg'] = $message;
                }
                $this->session->set('msg_result', $msg_result);
                return $this->response->redirect("/country");
            }
        }

        $messages["status"] = "border-red";
        $this->view->setVars(array(
            'formData' => $formData,
            'messages' => $messages,
        ));
    }

    public function deleteAction()
    {
        $country_checked = $this->request->getPost("item");
        $msg_result =array();
        if (!empty($country_checked)) {
            $total = 0;
            foreach ($country_checked as $country_id) {
                $country_item = Country::findFirstById($country_id);
                if ($country_item) {
                    if ($country_item->delete() === false) {
                        $message_delete = 'Can\'t delete the Country Name = ' . $country_item->getCountryName();
                        $msg_result['status'] = 'error';
                        $msg_result['msg'] = $message_delete;
                    } else {
                        $total ++;
                    }
                }
            }
            if ($total > 0) {
                if ($total == 1){
                    $message_delete = 'Delete ' . $total . ' Country successfully.';
                } else{
                    $message_delete = 'Delete ' . $total . ' Countries successfully.';
                }

                $msg_result['status'] = 'success';
                $msg_result['msg'] = $message_delete;
            }
            $this->session->set('msg_result', $msg_result);
            return $this->response->redirect("/country");
        }
    }


    private function getParameter($keyword)
    {
        $arrParameter = array();
        $sql = "SELECT p.* FROM GlobalVisa\Models\NewCountry p WHERE 1";
        if (!empty($keyword)) {
            $sql .= " AND country_id = :keyword: OR country_code = :keyword: OR country_name like CONCAT('%',:keyword:,'%')";
            $arrParameter['keyword'] = $keyword;
            $this->dispatcher->setParam("txtSearch", $keyword);
        }
        $sql .= " ORDER BY p.country_id DESC";
        $data['para'] = $arrParameter;
        $data['sql'] = $sql;
        return $this->modelsManager->executeQuery($data['sql'], $data['para']);
    }
}
