<?php

namespace GlobalVisa\Repositories;

use GlobalVisa\Models\NewExtraService;
use Phalcon\Mvc\User\Component;
use Phalcon\Di;

class ExtraService extends Component
{
    public static function findFirstById($id) {
        return NewExtraService::findFirst([
            'service_id = :id:',
            'bind' => ['id'=> $id]
        ]);
    }
    public static function getGroup($inputslc)
    {
        $modelsManager = Di::getDefault()->get('modelsManager');
        $sql = "SELECT a.group_id , a.group_name 
        FROM GlobalVisa\Models\NewGroupExtraService a  WHERE a.group_active = 'Y'";
        $data = $modelsManager->executeQuery($sql);
        $output="";
        if (!is_array($inputslc)){
            $inputslc = [$inputslc];
        }
        foreach ($data as $key => $value)
        {
            $selected ="";

            if (in_array($value->group_id,$inputslc)) {
                $selected = "selected='selected'";
            }
            $output.= "<option ".$selected." value='".$value->group_id."'>".$value->group_name."</option>";

        }
        return $output;
    }
}