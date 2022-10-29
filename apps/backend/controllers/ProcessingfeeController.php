<?php

namespace GlobalVisa\Backend\Controllers;

use GlobalVisa\Models\NewProcessingFee;
use GlobalVisa\Models\VisaLanguage;
use GlobalVisa\Models\VisaProcessingFee;
use GlobalVisa\Models\VisaProcessingFeeLang;
use Phalcon\Paginator\Adapter\Model as PaginatorModel;
use GlobalVisa\Repositories\Language;
use GlobalVisa\Repositories\ProcessingFee;
use GlobalVisa\Repositories\ProcessingFeeLang;
use GlobalVisa\Utils\Validator;

class ProcessingfeeController extends ControllerBase
{
    public function indexAction()
    {
        $current_page = $this->request->get('page');
        $inputslc = $this->request->get('slcArrivalCountry');
        $list_processing_fee = $this->getParameter($inputslc);
        $visa_arrival = ProcessingFee::getArrival($inputslc);
        $validator = new Validator();
        if ($validator->validInt($current_page) == false || $current_page < 1)
            $current_page = 1;
        $paginator = new PaginatorModel(
            array(
                'data' => $list_processing_fee,
                'limit' => 2,
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
            'select_type_visa' => $visa_arrival ,
            'msg_result' => $msg_result,
            'msg_delete' => $msg_delete,
        ));
    }

    public function createAction()
    {
        $this->view->pick($this->controllerName . '/model');
        $inputslc = '';
        $data = array('processing_id' => -1, 'processing_active' => 'Y','processing_order' => 1);
        $visa_arrival = ProcessingFee::getArrival($inputslc);
        $messages = array();
        if ($this->request->isPost()) {
            $data = array(
                'processing_name' => $this->request->getPost("txtName", array('string', 'trim')),
                'processing_active' => $this->request->getPost("radActive"),
                'processing_order' => $this->request->getPost("txtOrder", array('string', 'trim')),
                'processing_fee' => $this->request->getPost("txtFee", array('string', 'trim')),
                'processing_arrival_id' => $this->request->getPost("slcArrival"),
                'processing_date' => $this->request->getPost("txtDate", array('string', 'trim')),
            );
            if (empty($data['processing_name'])) {
                $messages['processing_name'] = "Name field is required.";
            }
            if (empty($data["processing_fee"])) {
                $messages["processing_fee"] = "Fee field is required.";
            } elseif (!is_numeric($data['processing_fee'])) {
                $messages["processing_fee"] = "Fee  is number.";
            }
            if (empty($data["processing_date"])) {
                $messages["processing_date"] = "Date field is required.";
            } elseif (!is_numeric($data['processing_date'])) {
                $messages["processing_date"] = "Date  is number.";
            }
            if (empty($data["processing_order"])) {
                $messages["processing_order"] = "Order field is required.";
            } elseif (!is_numeric($data['processing_order'])) {
                $messages["processing_order"] = "Order  is number.";
            }
            if (empty($data["processing_arrival_id"])) {
                $messages["processing_arrival_id"] = "Arrival field is required.";
            }
            if (count($messages) == 0) {
                $new_processing = new NewProcessingFee();
                $message = "We can't store your info now:" . "<br/>";
                if ($new_processing->save($data)) {
                    $message = 'Create the Processing Fee ID: ' . $new_processing->getProcessingId() . ' success.';
                    $msg_result = array('status' => 'success', 'msg' => $message);
                } else {
                    foreach ($new_processing->getMessages() as $msg) {
                        $message .= $msg . "<br/>";
                    }
                    $msg_result = array('status' => 'error', 'msg' => $message);
                }
                $this->session->set('msg_result', $msg_result);
                $this->response->redirect("/processingfee");
                return;
            }
        }
        $messages["status"] = "border-red";
        $data['mode'] = 'create';
        $this->view->setVars(array(
            'title' => 'Create Car',
            'formData' => $data,
            'messages' => $messages,
            'select_type_visa' => $visa_arrival,
        ));
    }

    public function editAction()
    {
        $this->view->pick($this->controllerName . '/model');
        $inputslc = '';
        $id = $this->request->get('id');
        $checkID = new Validator();
        if (!$checkID->validInt($id)) {
            return $this->response->redirect('notfound');
        }
        $processing_fee = NewProcessingFee::findFirst($id);
        $data = $processing_fee->toArray();
        $inputslc = $data['processing_arrival_id'];
        if (empty($processing_fee)) {
            return $this->response->redirect('notfound');
        }
        $visa_arrival = ProcessingFee::getArrival($inputslc);
        $messages = array();
        if ($this->request->isPost()) {
            $data = array(
                'processing_name' => $this->request->getPost("txtName", array('string', 'trim')),
                'processing_active' => $this->request->getPost("radActive"),
                'processing_order' => $this->request->getPost("txtOrder", array('string', 'trim')),
                'processing_fee' => $this->request->getPost("txtFee", array('string', 'trim')),
                'processing_arrival_id' => $this->request->getPost("slcArrival"),
                'processing_date' => $this->request->getPost("txtDate", array('string', 'trim')),
            );
            if (empty($data['processing_name'])) {
                $messages['processing_name'] = "Name field is required.";
            }
            if (empty($data["processing_fee"])) {
                $messages["processing_fee"] = "Fee field is required.";
            } elseif (!is_numeric($data['processing_fee'])) {
                $messages["processing_fee"] = "Fee  is number.";
            }
            if (empty($data["processing_date"])) {
                $messages["processing_date"] = "Date field is required.";
            } elseif (!is_numeric($data['processing_date'])) {
                $messages["processing_date"] = "Date  is number.";
            }
            if (empty($data["processing_order"])) {
                $messages["processing_order"] = "Order field is required.";
            } elseif (!is_numeric($data['processing_order'])) {
                $messages["processing_order"] = "Order  is number.";
            }
            if (empty($data["processing_arrival_id"])) {
                $messages["processing_arrival_id"] = "Arrival field is required.";
            }
            if (count($messages) == 0) {
                $msg_result = array();
                if ($processing_fee->update($data)) {
                    $msg_result = array('status' => 'success', 'msg' => 'Edit Processing Success');
                } else {
                    $message = "We can't store your info now: \n";
                    foreach ($processing_fee->getMessages() as $msg) {
                        $message .= $msg . "\n";
                    }
                    $msg_result['status'] = 'error';
                    $msg_result['msg'] = $message;
                }
                $this->session->set('msg_result', $msg_result);
                return $this->response->redirect("/processingfee");
            }
        }
        $messages["status"] = "border-red";

        $this->view->setVars(array(
            'title' => 'Create Car',
            'formData' => $data,
            'messages' => $messages,
            'select_type_visa' => $visa_arrival,
        ));
    }

    private function getParameter($inputslc)
    {
        $keyword = trim($this->request->get("txtSearch"));
        $arrParameter = [];
        $sql = "SELECT * FROM GlobalVisa\Models\NewProcessingFee AS m WHERE 1 ";
        if (!empty($keyword)) {
            $sql .= " AND m.processing_id  = :keyword: OR m.processing_name like CONCAT('%',:keyword:,'%')";
            $arrParameter['keyword'] = $keyword;
            $this->dispatcher->setParam("txtSearch", $keyword);
        }
        if (!empty($inputslc)) {
            $sql .= " AND m.processing_arrival_id  = :inputslc:";
            $arrParameter['inputslc'] = $inputslc;
            $this->dispatcher->setParam("slcArrivalCountry", $inputslc);
        }

        $sql .= " ORDER BY m.processing_id DESC";
        return $this->modelsManager->executeQuery($sql, $arrParameter);
    }

    public function deleteAction()
    {
        $items_checked = $this->request->getPost("item");
        if (!empty($items_checked)) {
            $msg_result = array();
            $count_delete = 0;
            foreach ($items_checked as $id) {
                $item = ProcessingFee::findFirstById($id);
                if ($item) {
                    if ($item->delete() === false) {
                        $message_delete = 'Can\'t delete the Car ID = ' . $item->getProcessingId();
                        $msg_result['status'] = 'error';
                        $msg_result['msg'] .= $message_delete;
                    }else{
                        $count_delete ++;
                        ProcessingFeeLang::deleteById($id);
                    }
                }
            }
        }
        if ($count_delete > 0) {
            $message_delete = 'Delete ' . $count_delete . ' Processing Fee successfully' . "<br>";
            $msg_result['status'] = 'success';
            $msg_result['msg'] .= $message_delete;
        }
        $this->session->set('msg_result', $msg_result);
        return $this->response->redirect('/processingfee');
    }

}