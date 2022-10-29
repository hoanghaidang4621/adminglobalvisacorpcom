<?php

namespace GlobalVisa\Repositories;

use GlobalVisa\Models\NewCountryFee;
use GlobalVisa\Models\NewGovernmentFee;
use GlobalVisa\Models\NewVisaType;
use GlobalVisa\Models\VisaGovernmentFee ;
use Phalcon\Mvc\User\Component;
use Phalcon\Di;

class CountryFee extends Component
{
    public static function findFirstById($visa_type_id,$country_code) {
        return NewCountryFee::findFirst([
            'visa_type_id  = :TypeID: AND country_code  = :Countrycode:',
            'bind' => ['TypeID' => $visa_type_id,'Countrycode' => $country_code]
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
    public static function findVisaTypeByArrival($type_arrival_id) {
        return NewVisaType::find([
            'type_arrival_id = :type_arrival_id:',
            'bind' => ['type_arrival_id' => $type_arrival_id]
        ]);
    }
    public static function getCountryFee($visa_type_id,$country_code){
        $result ="";
        $coufee = self::findFirstById($visa_type_id,$country_code);
        if($coufee){
            $result = $coufee->getVisaFee();
        }
        return $result;

    }
    public static  function  findCountryIsAccepted($arrival_id){
        $modelsManager = Di::getDefault()->get('modelsManager');
        $sql = "SELECT c.country_id , c.country_name ,c.country_code
        FROM GlobalVisa\Models\NewCountry AS c INNER JOIN
         GlobalVisa\Models\NewArrivalNationality as n 
         ON c.country_code = n.nationality_country_code
        WHERE n.nationality_arrival_id = :arrival_id: ";
        $arrParameter['arrival_id'] = $arrival_id;
        return $modelsManager->executeQuery($sql,$arrParameter);
    }

}