<?php

namespace GlobalVisa\Repositories;

use GlobalVisa\Models\NewPort;
use Phalcon\Mvc\User\Component;
use Phalcon\Di;

class Port extends Component
{
    public static function findFirstById($id) {
        return NewPort::findFirst([
            'port_id = :id:',
            'bind' => ['id'=> $id]
        ]);
    }
    public static function getIdDefault()
    {
        $id = 0;
        $port = NewPort::findFirst("port_active='Y'");
        if($port){
            $id = $port->getPortId();
        }
        return $id;
    }
    public static function getArrival($inputslc)
    {
        $modelsManager = Di::getDefault()->get('modelsManager');
        $sql = "SELECT a.arrival_id , c.country_name FROM
        GlobalVisa\Models\NewArrival a
           INNER JOIN GlobalVisa\Models\NewCountry c
          ON c.country_code = a.arrival_country_code
           WHERE c.country_active = 'Y' ORDER BY c.country_name";
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