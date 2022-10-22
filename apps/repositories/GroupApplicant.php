<?php

namespace GlobalVisa\Repositories;

use GlobalVisa\Models\VisaGroupApplicant ;
use Phalcon\Mvc\User\Component;

class GroupApplicant extends Component
{
    public static function findFirstById($id) {
        return VisaGroupApplicant::findFirst([
            'group_id = :id:',
            'bind' => ['id'=> $id]
        ]);
    }

}