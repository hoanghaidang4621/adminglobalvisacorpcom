<?php

namespace GlobalVisa\Repositories;

use GlobalVisa\Models\NewCountry;
use Phalcon\Di;
use Phalcon\Mvc\User\Component;

class Country extends Component
{

    public static function findFirstById($id)
    {
        return NewCountry::findFirst(array(
            "country_id =:ID:",
            'bind' => array('ID' => $id)
        ));
    }
    public static function findByCountryCode($country_code)
    {
        return NewCountry::find(array(
            'country_code = :country_code:',
            'bind' => array('country_code' => $country_code),
        ));
    }

    //Function get String for type
    public static function getCombobox($countryId)
    {
        $list_country = VisaCountry::find(array(
            "country_value > 0",
            'order' => "country_name ASC"
        ));
        $string="";
        foreach($list_country as $country){
            $seleted="";
            if($country->getCountryId()==$countryId) {
                $seleted = 'selected="selected"';
            }
            $string.= '<option '.$seleted.' value="'.$country->getCountryId().'">'.$country->getCountryName().'</option>';
        }
        return $string;
    }
    public static function getNameById($id){
        $country = self::findFirstById($id);
        return ($country)?$country->getCountryName():"";
    }
}

