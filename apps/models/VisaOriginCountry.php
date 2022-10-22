<?php

namespace GlobalVisa\Models;

class VisaOriginCountry extends BaseModel
{

    /**
     *
     * @var integer
     */
    protected $origin_country_id;

    /**
     *
     * @var string
     */
    protected $origin_country_code;

    /**
     *
     * @var string
     */
    protected $origin_country_name;

    /**
     *
     * @var integer
     */
    protected $origin_country_order;

    /**
     *
     * @var string
     */
    protected $origin_country_active;

    /**
     * Method to set the value of field origin_country_id
     *
     * @param integer $origin_country_id
     * @return $this
     */
    public function setOriginCountryId($origin_country_id)
    {
        $this->origin_country_id = $origin_country_id;

        return $this;
    }

    /**
     * Method to set the value of field origin_country_code
     *
     * @param string $origin_country_code
     * @return $this
     */
    public function setOriginCountryCode($origin_country_code)
    {
        $this->origin_country_code = $origin_country_code;

        return $this;
    }

    /**
     * Method to set the value of field origin_country_name
     *
     * @param string $origin_country_name
     * @return $this
     */
    public function setOriginCountryName($origin_country_name)
    {
        $this->origin_country_name = $origin_country_name;

        return $this;
    }

    /**
     * Method to set the value of field origin_country_order
     *
     * @param integer $origin_country_order
     * @return $this
     */
    public function setOriginCountryOrder($origin_country_order)
    {
        $this->origin_country_order = $origin_country_order;

        return $this;
    }

    /**
     * Method to set the value of field origin_country_active
     *
     * @param string $origin_country_active
     * @return $this
     */
    public function setOriginCountryActive($origin_country_active)
    {
        $this->origin_country_active = $origin_country_active;

        return $this;
    }

    /**
     * Returns the value of field origin_country_id
     *
     * @return integer
     */
    public function getOriginCountryId()
    {
        return $this->origin_country_id;
    }

    /**
     * Returns the value of field origin_country_code
     *
     * @return string
     */
    public function getOriginCountryCode()
    {
        return $this->origin_country_code;
    }

    /**
     * Returns the value of field origin_country_name
     *
     * @return string
     */
    public function getOriginCountryName()
    {
        return $this->origin_country_name;
    }

    /**
     * Returns the value of field origin_country_order
     *
     * @return integer
     */
    public function getOriginCountryOrder()
    {
        return $this->origin_country_order;
    }

    /**
     * Returns the value of field origin_country_active
     *
     * @return string
     */
    public function getOriginCountryActive()
    {
        return $this->origin_country_active;
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'visa_origin_country';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return VisaOriginCountry[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return VisaOriginCountry
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
