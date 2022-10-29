<?php

namespace GlobalVisa\Backend\Controllers;

use GlobalVisa\Models\NewArrival;
use GlobalVisa\Models\NewGroupApplicant;
use GlobalVisa\Models\NewVisaFee;
use GlobalVisa\Models\VisaCountry;
use GlobalVisa\Models\VisaCountryFee;
use GlobalVisa\Models\VisaVisaFee;
use GlobalVisa\Repositories\VisaFee;
use GlobalVisa\Repositories\VisaType;

class VisafeeController extends ControllerBase
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
        $select_arrival = VisaFee::getArrival( $arrival['code']);
        $msg_result = array();
        if ($this->session->has('msg_result')) {
            $msg_result = $this->session->get('msg_result');
            $this->session->remove('msg_result');
        }
        $list_type_visa = VisaFee::findVisaTypeByArrival($arrival['id']);
        if(empty($list_type_visa->toArray())) {
            $list_type_visa = [];
        }

	    $list_group_applicant = NewGroupApplicant::find("group_active='Y'");
	    $total =0;
        if ($this->request->isPost()) {
            foreach ($list_group_applicant as $group){
                $gaId = $group->getGroupId();
                $fee  = $this->request->get("txtGroup".$gaId);
                $visafee = VisaFee::findFirstById($type_id,$gaId);
                if ($fee != NULL) {
                    if (!$visafee) {
                        $visafee = new NewVisaFee();
                        $visafee->setVisaTypeId($type_id);
                        $visafee->setGroupId($gaId);
                    }
                    $visafee->setVisaFee($fee);
                    $result = $visafee->save();
                    if($result)$total ++;
                }else{
                    if($visafee){
                        $result = $visafee->delete();
                        if($result) $total ++;
                    }
                }
            }
            $msg_result['status'] = 'success ';
            $msg_result['msg'] = "Update $total records successfully";
            $this->session->set('msg_result', $msg_result);
            return $this->response->redirect('visafee?slcArrival='.$arrival['code'].'&txtTypeID='.$type_id);
        }
        $this->view->setVars([
            'type_id' => $type_id,
            'list_type_visa' => $list_type_visa,
            'list_group_applicant' => $list_group_applicant,
            'msg_result' => $msg_result,
            'select_arrival_country'=>$select_arrival
        ]);
    }
}