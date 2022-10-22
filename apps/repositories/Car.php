<?php

namespace GlobalVisa\Repositories;

use GlobalVisa\Models\VisaCar;
use Phalcon\Mvc\User\Component;

class Car extends Component
{
    public static function findFirstById($id) {
        return VisaCar::findFirst([
            'car_id = :id:',
            'bind' => ['id'=> $id]
        ]);
    }

}