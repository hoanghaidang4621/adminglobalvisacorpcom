<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 3/9/2021
 * Time: 5:04 PM
 */

namespace GlobalVisa\Repositories;
use GlobalVisa\Models\NewArrival;
use GlobalVisa\Models\NewArrivalNationality;
use GlobalVisa\Models\NewCountry;
use Phalcon\Mvc\User\Component;
use Phalcon\Di;

class Arrivalnationality extends Component
{

    public static function findFirstById($id)
    {
        return NewArrival::findFirst(array(
            "arrival_id =:ID:",
            'bind' => array('ID' => $id)
        ));
    }
    public static function getCountry()
    {
        return NewCountry::find(array(
            'country_active = "Y" ORDER BY country_name',
        ));
    }
    public static function getArrivalNationality($id)
    {
        $modelsManager = Di::getDefault()->get('modelsManager');
        $sql = "SELECT n.nationality_country_code FROM GlobalVisa\Models\NewArrivalNationality AS n WHERE n.nationality_arrival_id = :id: ";
        $arrParameter['id'] = $id;
        return $modelsManager->executeQuery($sql,$arrParameter);

    }
    public static function getArrivalNationalityWithArray($id)
    {
        $modelsManager = Di::getDefault()->get('modelsManager');
        $sql = "SELECT n.nationality_country_code FROM GlobalVisa\Models\NewArrivalNationality AS n WHERE n.nationality_arrival_id = :id: ";
        $arrParameter['id'] = $id;
        $result =  $modelsManager->executeQuery($sql,$arrParameter);
        $arrResult = array_values(array_column($result->toArray(), 'nationality_country_code'));
        return $arrResult;
    }
    public static function deleteArrivalNationality($nationality_arrival_id , $nationality_country_code)
    {
         NewArrivalNationality::findFirst(
            [
                'nationality_arrival_id = :nationality_arrival_id:
                 AND nationality_country_code = :nationality_country_code:',
                'bind' => [
                    'nationality_arrival_id' => $nationality_arrival_id,
                    'nationality_country_code' => $nationality_country_code,
                ],
            ]
        )->delete();

    }

    public static function getArrival($inputslc)
    {
        $modelsManager = Di::getDefault()->get('modelsManager');
        $sql = "SELECT c.country_name , a.arrival_country_code FROM GlobalVisa\Models\NewArrival AS a
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
    public static function getDefaultArrival()
    {
        $result = array();
        $type = NewArrival::findFirst("arrival_active='Y'");
        if($type){
            $result['id'] = $type->getArrivalId();
            $result['code'] = $type->getArrivalCountryCode();
        }
        return $result;
    }
    public static function findArrival($country_code)
    {
        return NewArrival::findFirst(array(
            'conditions' => 'arrival_country_code = :arrival_country_code:',
            'bind' => array("arrival_country_code" => $country_code)
        ));
    }

}