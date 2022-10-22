<?php

namespace GlobalVisa\Models;

class VisaPortType extends BaseModel
{

    /**
     *
     * @var integer
     */
    protected $type_id;

    /**
     *
     * @var string
     */
    protected $type_name;

    /**
     *
     * @var string
     */
    protected $type_name_description;

    /**
     *
     * @var string
     */
    protected $type_name2;

    /**
     *
     * @var string
     */
    protected $type_name2_description;

    /**
     *
     * @var string
     */
    protected $type_show_from_country;

    /**
     *
     * @var string
     */
    protected $type_from_country_description;

    /**
     *
     * @var integer
     */
    protected $type_arrival_country_id;

    /**
     *
     * @var string
     */
    protected $type_has_full_package;

    /**
     *
     * @var double
     */
    protected $type_full_package_transaction_per;

    /**
     *
     * @var double
     */
    protected $type_full_package_fast_check_fee;

    /**
     *
     * @var string
     */
    protected $type_has_fast_check;

    /**
     *
     * @var string
     */
    protected $type_has_car_pick;

    /**
     *
     * @var integer
     */
    protected $type_order;

    /**
     *
     * @var string
     */
    protected $type_active;

    /**
     * Method to set the value of field type_id
     *
     * @param integer $type_id
     * @return $this
     */
    public function setTypeId($type_id)
    {
        $this->type_id = $type_id;

        return $this;
    }

    /**
     * Method to set the value of field type_name
     *
     * @param string $type_name
     * @return $this
     */
    public function setTypeName($type_name)
    {
        $this->type_name = $type_name;

        return $this;
    }

    /**
     * Method to set the value of field type_name_description
     *
     * @param string $type_name_description
     * @return $this
     */
    public function setTypeNameDescription($type_name_description)
    {
        $this->type_name_description = $type_name_description;

        return $this;
    }

    /**
     * Method to set the value of field type_name2
     *
     * @param string $type_name2
     * @return $this
     */
    public function setTypeName2($type_name2)
    {
        $this->type_name2 = $type_name2;

        return $this;
    }

    /**
     * Method to set the value of field type_name2_description
     *
     * @param string $type_name2_description
     * @return $this
     */
    public function setTypeName2Description($type_name2_description)
    {
        $this->type_name2_description = $type_name2_description;

        return $this;
    }

    /**
     * Method to set the value of field type_show_from_country
     *
     * @param string $type_show_from_country
     * @return $this
     */
    public function setTypeShowFromCountry($type_show_from_country)
    {
        $this->type_show_from_country = $type_show_from_country;

        return $this;
    }

    /**
     * Method to set the value of field type_from_country_description
     *
     * @param string $type_from_country_description
     * @return $this
     */
    public function setTypeFromCountryDescription($type_from_country_description)
    {
        $this->type_from_country_description = $type_from_country_description;

        return $this;
    }

    /**
     * Method to set the value of field type_arrival_country_id
     *
     * @param integer $type_arrival_country_id
     * @return $this
     */
    public function setTypeArrivalCountryId($type_arrival_country_id)
    {
        $this->type_arrival_country_id = $type_arrival_country_id;

        return $this;
    }

    /**
     * Method to set the value of field type_has_full_package
     *
     * @param string $type_has_full_package
     * @return $this
     */
    public function setTypeHasFullPackage($type_has_full_package)
    {
        $this->type_has_full_package = $type_has_full_package;

        return $this;
    }

    /**
     * Method to set the value of field type_full_package_transaction_per
     *
     * @param double $type_full_package_transaction_per
     * @return $this
     */
    public function setTypeFullPackageTransactionPer($type_full_package_transaction_per)
    {
        $this->type_full_package_transaction_per = $type_full_package_transaction_per;

        return $this;
    }

    /**
     * Method to set the value of field type_full_package_fast_check_fee
     *
     * @param double $type_full_package_fast_check_fee
     * @return $this
     */
    public function setTypeFullPackageFastCheckFee($type_full_package_fast_check_fee)
    {
        $this->type_full_package_fast_check_fee = $type_full_package_fast_check_fee;

        return $this;
    }

    /**
     * Method to set the value of field type_has_fast_check
     *
     * @param string $type_has_fast_check
     * @return $this
     */
    public function setTypeHasFastCheck($type_has_fast_check)
    {
        $this->type_has_fast_check = $type_has_fast_check;

        return $this;
    }

    /**
     * Method to set the value of field type_has_car_pick
     *
     * @param string $type_has_car_pick
     * @return $this
     */
    public function setTypeHasCarPick($type_has_car_pick)
    {
        $this->type_has_car_pick = $type_has_car_pick;

        return $this;
    }

    /**
     * Method to set the value of field type_order
     *
     * @param integer $type_order
     * @return $this
     */
    public function setTypeOrder($type_order)
    {
        $this->type_order = $type_order;

        return $this;
    }

    /**
     * Method to set the value of field type_active
     *
     * @param string $type_active
     * @return $this
     */
    public function setTypeActive($type_active)
    {
        $this->type_active = $type_active;

        return $this;
    }

    /**
     * Returns the value of field type_id
     *
     * @return integer
     */
    public function getTypeId()
    {
        return $this->type_id;
    }

    /**
     * Returns the value of field type_name
     *
     * @return string
     */
    public function getTypeName()
    {
        return $this->type_name;
    }

    /**
     * Returns the value of field type_name_description
     *
     * @return string
     */
    public function getTypeNameDescription()
    {
        return $this->type_name_description;
    }

    /**
     * Returns the value of field type_name2
     *
     * @return string
     */
    public function getTypeName2()
    {
        return $this->type_name2;
    }

    /**
     * Returns the value of field type_name2_description
     *
     * @return string
     */
    public function getTypeName2Description()
    {
        return $this->type_name2_description;
    }

    /**
     * Returns the value of field type_show_from_country
     *
     * @return string
     */
    public function getTypeShowFromCountry()
    {
        return $this->type_show_from_country;
    }

    /**
     * Returns the value of field type_from_country_description
     *
     * @return string
     */
    public function getTypeFromCountryDescription()
    {
        return $this->type_from_country_description;
    }

    /**
     * Returns the value of field type_arrival_country_id
     *
     * @return integer
     */
    public function getTypeArrivalCountryId()
    {
        return $this->type_arrival_country_id;
    }

    /**
     * Returns the value of field type_has_full_package
     *
     * @return string
     */
    public function getTypeHasFullPackage()
    {
        return $this->type_has_full_package;
    }

    /**
     * Returns the value of field type_full_package_transaction_per
     *
     * @return double
     */
    public function getTypeFullPackageTransactionPer()
    {
        return $this->type_full_package_transaction_per;
    }

    /**
     * Returns the value of field type_full_package_fast_check_fee
     *
     * @return double
     */
    public function getTypeFullPackageFastCheckFee()
    {
        return $this->type_full_package_fast_check_fee;
    }

    /**
     * Returns the value of field type_has_fast_check
     *
     * @return string
     */
    public function getTypeHasFastCheck()
    {
        return $this->type_has_fast_check;
    }

    /**
     * Returns the value of field type_has_car_pick
     *
     * @return string
     */
    public function getTypeHasCarPick()
    {
        return $this->type_has_car_pick;
    }

    /**
     * Returns the value of field type_order
     *
     * @return integer
     */
    public function getTypeOrder()
    {
        return $this->type_order;
    }

    /**
     * Returns the value of field type_active
     *
     * @return string
     */
    public function getTypeActive()
    {
        return $this->type_active;
    }

    public function getSource()
    {
        return 'visa_port_type';
    }

}
