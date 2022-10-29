<?php

namespace GlobalVisa\Backend\Controllers;

use GlobalVisa\Models\NewArrival;
use GlobalVisa\Models\NewArrivalNationality;
use GlobalVisa\Repositories\Arrivalnationality;


class ArrivalnationalityController extends ControllerBase
{
    public function indexAction()
    {
        $country_code = trim($this->request->get("slcArrival"));
        $arrival = array();
        if(empty($country_code)){
            $randomArrival =  Arrivalnationality::getDefaultArrival();
            $arrival['arrival_id'] = $randomArrival['id'];
        }else{
            $get_arrival_model =  Arrivalnationality::findArrival($country_code);
            if(!$get_arrival_model){
                return $this->response->redirect('notfound');
            }
            $arrival['arrival_id'] = $get_arrival_model->getArrivalId();
        }
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
        $country = Arrivalnationality::getCountry();
        $get_country_selected_in_arrival = Arrivalnationality::getArrivalNationality($arrival['arrival_id']);
        $list_insight_country_code_selected = array_values(array_column($get_country_selected_in_arrival->toArray(), 'nationality_country_code'));
        $getArrival = Arrivalnationality::getArrival($country_code);
        $this->view->setVars(array(
            'arrival_id' => $arrival['arrival_id'],
            'country' => $country,
            'select_arrival' => $getArrival,
            'msg_result' => $msg_result,
            'msg_delete' => $msg_delete,
            'list_insight_country_code_selected' => $list_insight_country_code_selected,
        ));
    }

    public function saveAction()
    {
        $messages = array();
        $tn_log = 0;
        if ($this->request->isPost()) {
            $data_input = array(
                'arr_country_code' => $this->request->getPost("dataInsightCountryCode"),
                'arrival_id' => $this->request->getPost("arrival_id"),
            );
            $arrival_country_code_selected = Arrivalnationality::findFirstById($data_input['arrival_id'])->getArrivalCountryCode();
            if($data_input['arr_country_code'] == null){
                $message_update = 'Removed all country';
                $msg_result['status'] = 'success';
                $msg_result['msg'] = $message_update;
                $this->session->set('msg_result', $msg_result);
                return $this->response->redirect("/arrivalnationality?slcArrival=".$arrival_country_code_selected);
            }
            $data_get = Arrivalnationality::getArrivalNationalityWithArray($data_input['arrival_id']);
            $compare_insert = array_diff($data_input['arr_country_code'] , $data_get );
            $compare_delete = array_diff( $data_get , $data_input['arr_country_code']);
            if(!empty($compare_insert)){
                foreach ($compare_insert as $val){
                    $arrival_nationality = new NewArrivalNationality();
                    $arrival_nationality->setNationalityCountryCode($val);
                    $arrival_nationality->setNationalityArrivalId($data_input['arrival_id']);
                    $arrival_nationality->save();
                    $tn_log ++;
                }
            }
            if(!empty($compare_delete)){
                foreach ($compare_delete as $val){
                    Arrivalnationality::deleteArrivalNationality($data_input['arrival_id'],$val);
                    $tn_log++;
                }
            }
        }
        if ($tn_log > 0) {
            $message_update = 'Update Arrival Nationality successfully.';
            $msg_result['status'] = 'success';
            $msg_result['msg'] = $message_update;
        }
        $this->session->set('msg_result', $msg_result);
        return $this->response->redirect("/arrivalnationality?slcArrival=".$arrival_country_code_selected);
    }


}