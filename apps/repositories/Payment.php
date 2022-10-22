<?php

namespace GlobalVisa\Repositories;

use GlobalVisa\Models\VisaPayment;
use Phalcon\Mvc\User\Component;

class Payment extends Component
{
    public  static function findFirstById($id){
        return VisaPayment::findFirst(array(
            'payment_id = :payment_id: ',
            'bind' => array('payment_id' => $id)
        ));
    }
}