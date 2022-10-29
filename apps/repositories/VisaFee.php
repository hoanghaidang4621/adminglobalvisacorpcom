<?php

namespace GlobalVisa\Repositories;

use GlobalVisa\Models\NewArrival;
use GlobalVisa\Models\NewVisaFee;
use GlobalVisa\Models\NewVisaType;
use GlobalVisa\Models\VisaVisaFee ;
use Phalcon\Mvc\User\Component;
use Phalcon\Di;

class VisaFee extends Component
{
    public static function findFirstById($visa_type_id,$group_id) {
        return NewVisaFee::findFirst([
            'visa_type_id = :TypeID: AND group_id = :GroupID:',
            'bind' => ['TypeID' => $visa_type_id,'GroupID' => $group_id]
        ]);
    }
    public static function getTypeGroupFee($visa_type_id,$group_id){
        $result ="";
        $gafee = self::findFirstById($visa_type_id,$group_id);
        if($gafee){
            $result = $gafee->getVisaFee();
        }
        return $result;

    }

    public static function findVisaTypeByArrival($type_arrival_id) {
            return NewVisaType::find([
                'type_arrival_id = :type_arrival_id:',
                'bind' => ['type_arrival_id' => $type_arrival_id]
            ]);
    }
    public static function getArrival($inputslc)
    {
        $modelsManager = Di::getDefault()->get('modelsManager');
        $sql = "SELECT c.country_name , a.arrival_country_code , a.arrival_id FROM GlobalVisa\Models\NewArrival AS a
                INNER JOIN GlobalVisa\Models\NewCountry AS c ON a.arrival_country_code = c.country_code
                 WHERE  arrival_active = 'Y' ORDER BY arrival_id";
        $data = $modelsManager->executeQuery($sql);
        $output="";
        if (!is_array($inputslc)){
            $inputslc = [$inputslc];
        }
        foreach ($data as $key => $value)
        {
            $selected ="";

            if (in_array($value->arrival_country_code,$inputslc)) {
                $selected = "selected='selected'";
            }
            $output.= "<option ".$selected." value='".$value->arrival_country_code."'>".$value->country_name."</option>";

        }
        return $output;
    }
}