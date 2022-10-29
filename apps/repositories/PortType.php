<?php

namespace GlobalVisa\Repositories;

use GlobalVisa\Models\NewPortType;
use Phalcon\Mvc\User\Component;
use Phalcon\Di;
class PortType extends Component
{
    public static function findFirstById($id) {
        return NewPortType::findFirst([
            'type_id = :id:',
            'bind' => ['id'=> $id]
        ]);
    }
//    public static function getCombobox($id)
//    {
//        $list_port_type = NewPortType::find();
//        $output = '';
//        foreach ($list_port_type as $port_type) {
//            $selected = '';
//            if ($port_type->getTypeId() == $id) {
//                $selected = 'selected';
//            }
//            $output .= "<option " . $selected . " value='" . $port_type->getTypeId(). "'>" . $port_type->getTypeName() . "</option>";
//
//        }
//        return $output;
//    }
    public static function getPortType($inputslc)
    {
        $modelsManager = Di::getDefault()->get('modelsManager');
        $sql = "SELECT p.type_id,p.type_name,p.type_arrival_id, p.type_order,p.type_active, c.country_name 
                FROM GlobalVisa\Models\NewPortType p
                INNER JOIN GlobalVisa\Models\NewArrival a
                ON p.type_arrival_id = a.arrival_id 
                 INNER JOIN GlobalVisa\Models\NewCountry c
                ON a.arrival_country_code = c.country_code 
                 WHERE  type_active = 'Y'";
        $data = $modelsManager->executeQuery($sql);
        $output="";
        if (!is_array($inputslc)){
            $inputslc = [$inputslc];
        }
        foreach ($data as $key => $value)
        {
            $selected ="";

            if (in_array($value->type_id,$inputslc)) {
                $selected = "selected='selected'";
            }
            $output.= "<option ".$selected." value='".$value->type_id."'>".$value->type_name."( ".$value->country_name.")</option>";

        }
        return $output;
    }
    public static function getNameById($id)
    {

        $result = self::findFirstById($id);
        return ($result) ? $result->getTypeName() : '';
    }

    public static function getArrival($inputslc)
    {
        $modelsManager = Di::getDefault()->get('modelsManager');
        $sql = "SELECT a.arrival_id, c.country_name, c.country_code  
        FROM GlobalVisa\Models\NewArrival a INNER JOIN GlobalVisa\Models\NewCountry c
          ON a.arrival_country_code = c.country_code WHERE a.arrival_active = 'Y' AND c.country_active = 'Y'";
        $data = $modelsManager->executeQuery($sql);
        $output="";
        if (!is_array($inputslc)){
            $inputslc = [$inputslc];
        }
        foreach ($data as $key => $value)
        {
            $selected ="";

            if (in_array($value->arrival_id,$inputslc)) {
                $selected = "selected='selected'";
            }
            $output.= "<option ".$selected." value='".$value->arrival_id."'>".$value->country_name."</option>";

        }
        return $output;
    }
}