<?php

namespace GlobalVisa\Repositories;

use GlobalVisa\Models\VisaExtraService;
use Phalcon\Mvc\User\Component;

class ExtraService extends Component
{
    public static function findFirstById($id) {
        return VisaExtraService::findFirst([
            'service_id = :id:',
            'bind' => ['id'=> $id]
        ]);
    }

}