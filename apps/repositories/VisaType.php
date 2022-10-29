<?php

namespace GlobalVisa\Repositories;

use GlobalVisa\Models\NewVisaType;
use Phalcon\Di;
use Phalcon\Mvc\User\Component;

class VisaType extends Component
{
    public static function findFirstById($id) {
        return NewVisaType::findFirst([
            'type_id = :id:',
            'bind' => ['id'=> $id]
        ]);
    }
    public static function getIdDefaultByArrival($id)
    {
        $type = NewVisaType::findFirst([
            'type_arrival_id = :id:',
            'bind' => ['id'=> $id]
        ]);
        if($type){
            $id = $type->getTypeId();
        }
        return $id;

    }
    public static function getCombobox($ids)
    {
        $list_type = NewVisaType::find("type_active='Y'");
        $arrID = explode(',',$ids);
        $output = '';
        foreach ($list_type as $type) {
            $selected = '';
            if (in_array($type->getTypeId(),$arrID)) {
                $selected = 'selected';
            }
            $output .= "<option " . $selected . " value='" . $type->getTypeId(). "'>" . $type->getTypeName() . "</option>";
        }
        return $output;
    }

    public static function getArrival($inputslc)
    {
        $modelsManager = Di::getDefault()->get('modelsManager');
        $sql = "SELECT a.arrival_id, c.country_name, c.country_code  FROM GlobalVisa\Models\NewArrival a INNER JOIN GlobalVisa\Models\NewCountry c
          ON a.arrival_country_code = c.country_code WHERE a.arrival_active = 'Y' AND c.country_active = 'Y' ORDER BY c.country_name";
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
    public static  function deleteById($id){
    $arr = self::findFirstById($id);
    foreach ($arr as $val){
        $val->delete();
    }
}
}