<?php

namespace GlobalVisa\Backend\Controllers;

use GlobalVisa\Models\NewArrival;

use GlobalVisa\Models\NewCountryFee;
use GlobalVisa\Models\NewGovernmentFee;
use GlobalVisa\Models\VisaCountry;
use GlobalVisa\Models\VisaGovernmentFee;
use GlobalVisa\Repositories\CountryFee;
use GlobalVisa\Repositories\GovernmentFee;
use GlobalVisa\Repositories\VisaType;

class CountryfeeController extends ControllerBase
{
    public function indexAction()
    {
        $type_id = trim($this->request->get("txtTypeID"));
        $arrival = array();
        $arrival['code'] = trim($this->request->get("slcArrival"));
        if($arrival['code'] == ''){
            $find_arrival = NewArrival::findFirst()->toArray();
            $arrival['id'] = $find_arrival['arrival_id'];
            $arrival['code'] = $find_arrival['arrival_country_code'];
        }else{
            $find_arrival = NewArrival::findFirst('arrival_country_code ="'.$arrival['code'].'"')->toArray();
            $arrival['id'] = $find_arrival['arrival_id'];
        }
        if($type_id == NULL){
            $type_id = VisaType::getIdDefaultByArrival($arrival['id']);
        }
        $select_arrival = CountryFee::getArrival( $arrival['code']);
        $msg_result = array();
        if ($this->session->has('msg_result')) {
            $msg_result = $this->session->get('msg_result');
            $this->session->remove('msg_result');
        }
        $list_type_visa = CountryFee::findVisaTypeByArrival($arrival['id']);
        if(empty($list_type_visa->toArray())) {
            $list_type_visa = [];
        }
        $list_country = CountryFee::findCountryIsAccepted($arrival['id']);
        $total =0;
        if ($this->request->isPost()) {
            foreach ($list_country as $country){
                $co_code = $country->country_code;
                $co_id = $country->country_id;
                $fee  = $this->request->get("txtFee".$co_id);
                $coufee = CountryFee::findFirstById($type_id,$co_code);
                if ($fee != NULL) {
                    if (!$coufee) {
                        $coufee = new NewCountryFee();
                        $coufee->setVisaTypeId($type_id);
                        $coufee->setCountryCode($co_code);
                    }
                    $coufee->setVisaFee($fee);
                    $result = $coufee->save();
                    if($result)$total ++;
                }else{
                    if($coufee){
                        $result = $coufee->delete();
                        if($result) $total ++;
                    }
                }
            }
            $msg_result['status'] = 'success ';
            $msg_result['msg'] = "Update $total records successfully";
            $this->session->set('msg_result', $msg_result);
            return $this->response->redirect('countryfee?slcArrival='.$arrival['code'].'&txtTypeID='.$type_id);
        }
        $this->view->setVars([
            'type_id' => $type_id,
            'list_type_visa' => $list_type_visa,
            'list_country' => $list_country,
            'msg_result' => $msg_result,
            'select_arrival_country'=>$select_arrival
        ]);
    }

}