<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 3/9/2021
 * Time: 5:04 PM
 */

namespace GlobalVisa\Repositories;
use GlobalVisa\Models\NewArrival;
use Phalcon\Mvc\User\Component;
use Phalcon\Di;

class Arrival extends Component
{

    public static function findByCountryCode($arrival_country_code)
    {
        return NewArrival::find(array(
            'arrival_country_code = :arrival_country_code:',
            'bind' => array('arrival_country_code' => $arrival_country_code),
        ));
    }
    public static function findByIdFirst($id)
    {
        return NewArrival::findFirst(array(
            'arrival_id = :id:',
            'bind' => array('id' => $id),
        ));
    }

    public static function getCountry($inputslc)
    {
        $modelsManager = Di::getDefault()->get('modelsManager');
        $sql = "SELECT * FROM GlobalVisa\Models\NewCountry  WHERE  country_active = 'Y' ORDER BY country_name";
        $data = $modelsManager->executeQuery($sql);
        $output="";
        if (!is_array($inputslc)){
            $inputslc = [$inputslc];
        }
        foreach ($data as $key => $value)
        {
            $selected ="";

            if (in_array($value->country_code,$inputslc)) {
                $selected = "selected='selected'";
            }
            $output.= "<option ".$selected." value='".$value->country_code."'>".$value->country_name."</option>";

        }
        return $output;
    }

    public static function getCountryByCode($input)
    {
        $modelsManager = Di::getDefault()->get('modelsManager');
        $sql = "SELECT * FROM GlobalVisa\Models\NewCountry  WHERE  country_code = " . $input;
        $data = $modelsManager->executeQuery($sql);

        return $data;
    }
}