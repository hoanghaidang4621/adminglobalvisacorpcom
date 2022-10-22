<?php

namespace GlobalVisa\Models;

class VisaVisaType extends BaseModel
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
    protected $type_code;

    /**
     *
     * @var integer
     */
    protected $type_order;

    /**
     *
     * @var double
     */
    protected $type_stamping_fee;

    /**
     *
     * @var integer
     */
    protected $type_arrival_country_id;

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
     * Method to set the value of field type_code
     *
     * @param string $type_code
     * @return $this
     */
    public function setTypeCode($type_code)
    {
        $this->type_code = $type_code;

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
     * Method to set the value of field type_stamping_fee
     *
     * @param double $type_stamping_fee
     * @return $this
     */
    public function setTypeStampingFee($type_stamping_fee)
    {
        $this->type_stamping_fee = $type_stamping_fee;

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
     * Returns the value of field type_code
     *
     * @return string
     */
    public function getTypeCode()
    {
        return $this->type_code;
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
     * Returns the value of field type_stamping_fee
     *
     * @return double
     */
    public function getTypeStampingFee()
    {
        return $this->type_stamping_fee;
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
        return 'visa_visa_type';
    }

}
