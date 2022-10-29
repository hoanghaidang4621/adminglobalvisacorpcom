<?php

namespace GlobalVisa\Repositories;

use GlobalVisa\Models\NewGroupApplicant;
use Phalcon\Mvc\User\Component;

class GroupApplicant extends Component
{
    public static function findFirstById($id) {
        return NewGroupApplicant::findFirst([
            'group_id = :id:',
            'bind' => ['id'=> $id]
        ]);
    }

}