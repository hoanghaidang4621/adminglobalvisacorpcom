<?php

namespace GlobalVisa\Models;

class NewCountryFee extends BaseModel
{

    /**
     *
     * @var string
     * @Primary
     * @Column(type="string", length=5, nullable=false)
     */
    protected $country_code;

    /**
     *
     * @var integer
     * @Primary
     * @Column(type="integer", length=11, nullable=false)
     */
    protected $visa_type_id;

    /**
     *
     * @var double
     * @Column(type="double", nullable=false)
     */
    protected $visa_fee;

    /**
     * Method to set the value of field country_code
     *
     * @param string $country_code
     * @return $this
     */
    public function setCountryCode($country_code)
    {
        $this->country_code = $country_code;

        return $this;
    }

    /**
     * Method to set the value of field visa_type_id
     *
     * @param integer $visa_type_id
     * @return $this
     */
    public function setVisaTypeId($visa_type_id)
    {
        $this->visa_type_id = $visa_type_id;

        return $this;
    }

    /**
     * Method to set the value of field visa_fee
     *
     * @param double $visa_fee
     * @return $this
     */
    public function setVisaFee($visa_fee)
    {
        $this->visa_fee = $visa_fee;

        return $this;
    }

    /**
     * Returns the value of field country_code
     *
     * @return string
     */
    public function getCountryCode()
    {
        return $this->country_code;
    }

    /**
     * Returns the value of field visa_type_id
     *
     * @return integer
     */
    public function getVisaTypeId()
    {
        return $this->visa_type_id;
    }

    /**
     * Returns the value of field visa_fee
     *
     * @return double
     */
    public function getVisaFee()
    {
        return $this->visa_fee;
    }

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSchema("globalvisacorp_com_v2");
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'new_country_fee';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return NewCountryFee[]|NewCountryFee
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return NewCountryFee
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
