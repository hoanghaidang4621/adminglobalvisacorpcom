<?php
namespace GlobalVisa\Backend\Controllers;

use GlobalVisa\Models\NewPort;
use GlobalVisa\Repositories\Arrival;
use GlobalVisa\Repositories\Port;
use GlobalVisa\Models\VisaPort;
use GlobalVisa\Repositories\PortType;
use GlobalVisa\Utils\Validator;
use Phalcon\Paginator\Adapter\Model as PaginatorModel;

class PortController extends ControllerBase
{
    public function indexAction()
    {
        $port_type = trim($this->request->get("slcPortType"));
        $country = trim($this->request->get("slcCountry"));
        if(is_null($port_type)){
            $port_type = [];
        }
        if(is_null($country)){
            $country = [];
        }
        $current_page = $this->request->get('page');
        $validator = new Validator();
        if ($validator->validInt($current_page) == false || $current_page < 1)
            $current_page = 1;
        $list_port = $this->getParameter($port_type,$country) ;
        $paginator = new PaginatorModel(array(
            'data' => $list_port,
            'limit' => 20,
            'page' => $current_page,
        ));
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
        $select_port_type = PortType::getPortType($port_type);
        $select_arrival = Arrival::getCountry($country);
        $this->view->setVars(array(
            'list_port' => $paginator->getPaginate(),
            'select_port_type' => $select_port_type,
            'select_country' => $select_arrival,
        ));
    }


    public function createAction()
    {
        $this->view->pick($this->controllerName.'/model');
        $data = array('port' => '', 'arrival' => '' ,'type_active' => 'Y');
        if ($this->request->isPost()) {
            $messages = array();
            $data = array(
                'port_name' => $this->request->getPost("txtName", array('string', 'trim')),
                'port_type_id' => $this->request->getPost("slcType"),
                'port_from_country_code' => $this->request->getPost("slcCountry"),
                'port_order' => $this->request->getPost("txtOrder", array('string', 'trim')),
                'port_active' => $this->request->getPost("radActive"),
            );
            if ($data["port_name"] == '') {
                $messages["port_name"] = "Port name field is required.";
            }
            if (empty($data["port_type_id"])) {
                $messages["port_type_id"] = "Port type field is required.";
            }
            if (empty($data["port_from_country_code"])) {
                $messages["port_from_country_code"] = "Country field is required.";
            }
            if (empty($data['port_order'])) {
                $messages["order"] = "Order field is required.";
            } else if (!is_numeric($data["port_order"])) {
                $messages["order"] = "Order is not valid ";
            }
            if (empty($data["port_active"])) {
                $messages["port_active"] = "Active field is required.";
            }
            if (count($messages) == 0) {
                $msg_result = array();
                $new_Port = new NewPort();
                if ($new_Port->save($data)) {
                    $msg_result = array('status' => 'success', 'msg' => 'Create Port Success');
                } else {
                    $message = "We can't store your info now: \n";
                    foreach ($new_Port->getMessages() as $msg) {
                        $message .= $msg . "\n";
                    }
                    $msg_result['status'] = 'error';
                    $msg_result['msg'] = $message;
                }

                $this->session->set('msg_result', $msg_result);
                return $this->response->redirect("/port");
            }
        }
        $select_port_type = PortType::getPortType($data['port']);
        $select_arrival = Arrival::getCountry($data['arrival']);
        $messages["status"] = "border-red";
        $this->view->setVars([
            'title' => 'Create Port',
            'formData' => $data,
            'messages' => $messages,
            'select_port_type' => $select_port_type,
            'select_country' => $select_arrival,
        ]);
    }

    public function editAction()
    {
        $this->view->pick($this->controllerName.'/model');
        $data = array('port' => '', 'arrival' => '' ,'type_active' => 'Y');
        $id = $this->request->get('id');
        $checkID = new Validator();
        if (!$checkID->validInt($id)) {
            return $this->response->redirect('notfound');
        }
        $port_model = Port::findFirstById($id);
        $model_data = $port_model->toArray();
        if (empty($port_model)) {
            return $this->response->redirect('notfound');
        }else{
            $data['port'] = $model_data['port_type_id'];
            $data['arrival'] = $model_data['port_from_country_code'];
            $data['type_active'] = $model_data['type_active'];
        }
        $input_data = $model_data;
        $messages = array();
        if ($this->request->isPost()) {
            $messages = array();
            $data = array(
                'port_name' => $this->request->getPost("txtName", array('string', 'trim')),
                'port_type_id' => $this->request->getPost("slcType"),
                'port_from_country_code' => $this->request->getPost("slcCountry"),
                'port_order' => $this->request->getPost("txtOrder", array('string', 'trim')),
                'port_active' => $this->request->getPost("radActive"),
            );
            if ($data["port_name"] == '') {
                $messages["port_name"] = "Port name field is required.";
            }
            if (empty($data["port_type_id"])) {
                $messages["port_type_id"] = "Port type field is required.";
            }
            if (empty($data["port_from_country_code"])) {
                $messages["port_from_country_code"] = "Country field is required.";
            }
            if (empty($data['port_order'])) {
                $messages["order"] = "Order field is required.";
            } else if (!is_numeric($data["port_order"])) {
                $messages["order"] = "Order is not valid ";
            }
            if (empty($data["port_active"])) {
                $messages["port_active"] = "Active field is required.";
            }
            if (count($messages) == 0) {
                $msg_result = array();
                if ($port_model->update($data)) {
                    $msg_result = array('status' => 'success', 'msg' => 'Edit Port Success');
                } else {
                    $message = "We can't store your info now: \n";
                    foreach ($port_model->getMessages() as $msg) {
                        $message .= $msg . "\n";
                    }
                    $msg_result['status'] = 'error';
                    $msg_result['msg'] = $message;
                }
                $this->session->set('msg_result', $msg_result);
                return $this->response->redirect("/port");
            }
        }
        $select_port_type = PortType::getPortType($data['port']);
        $select_arrival = Arrival::getCountry($data['arrival']);
        $messages["status"] = "border-red";
        $this->view->setVars([
            'formData' => $input_data,
            'messages' => $messages,
            'select_port_type' => $select_port_type,
            'select_country' => $select_arrival,
        ]);
    }

    public function deleteAction()
    {
        $port_checked = $this->request->getPost("item");
        if (!empty($port_checked)) {
            $tn_log = array();
            foreach ($port_checked as $id) {
                $port_item = Port::findFirstById($id);
                if ($port_item) {
                    $msg_result = array();
                    if ($port_item->delete() === false) {
                        $message_delete = 'Can\'t delete the Port Name = ' . $port_item->getPortName();
                        $msg_result['status'] = 'error';
                        $msg_result['msg'] = $message_delete;
                    } else {
                        $tn_log[$id] = $port_item->toArray();
                    }
                }
            }
            if (count($tn_log) > 0) {
                $message_delete = 'Delete ' . count($tn_log) . ' Port successfully.';
                $msg_result['status'] = 'success';
                $msg_result['msg'] = $message_delete;
            }
            $this->session->set('msg_result', $msg_result);
            return $this->response->redirect("/port");
        }
    }

    private function getParameter($port_type,$country)
    {

        $keyword = trim($this->request->get("txtSearch"));
        $arrParameter = [];
        $sql = "SELECT m.port_id ,m.port_name,m.port_order,m.port_active, a.type_name,a.type_id,c.country_name
                FROM GlobalVisa\Models\NewPort AS m 
                INNER JOIN GlobalVisa\Models\NewPortType AS a ON m.port_type_id = a.type_id
                 INNER JOIN GlobalVisa\Models\NewCountry AS c ON c.country_code = m.port_from_country_code WHERE 1";
        if (!empty($keyword)) {
            $sql .= " AND m.port_id  = :keyword: OR m.port_name like CONCAT('%',:keyword:,'%') ";
            $arrParameter['keyword'] = $keyword;
            $this->dispatcher->setParam("txtSearch", $keyword);
        }
        if (!empty($port_type)) {
            $sql .= " AND m.port_type_id  = :port_type: ";
            $arrParameter['port_type'] = $port_type;
            $this->dispatcher->setParam("slcPortType", $port_type);
        }
        if (!empty($country)) {
            $sql .= " AND m.port_from_country_code  = :country: ";
            $arrParameter['country'] = $country;
            $this->dispatcher->setParam("slcCountry", $country);
        }
        $sql .= " ORDER BY port_id DESC";
        return $this->modelsManager->executeQuery($sql, $arrParameter);
    }
}
