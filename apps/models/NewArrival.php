<?php

namespace GlobalVisa\Models;

class NewArrival extends BaseModel
{

    /**
     *
     * @var integer
     * @Primary
     * @Identity
     * @Column(type="integer", length=11, nullable=false)
     */
    protected $arrival_id;

    /**
     *
     * @var string
     * @Column(type="string", length=5, nullable=false)
     */
    protected $arrival_country_code;

    /**
     *
     * @var integer
     * @Column(type="integer", length=11, nullable=false)
     */
    protected $arrival_order;

    /**
     *
     * @var string
     * @Column(type="string", nullable=false)
     */
    protected $arrival_active;

    /**
     *
     * @var double
     * @Column(type="double", length=4, nullable=false)
     */
    protected $arrival_country_timezone;

    /**
     * Method to set the value of field arrival_id
     *
     * @param integer $arrival_id
     * @return $this
     */
    public function setArrivalId($arrival_id)
    {
        $this->arrival_id = $arrival_id;

        return $this;
    }

    /**
     * Method to set the value of field arrival_country_code
     *
     * @param string $arrival_country_code
     * @return $this
     */
    public function setArrivalCountryCode($arrival_country_code)
    {
        $this->arrival_country_code = $arrival_country_code;

        return $this;
    }

    /**
     * Method to set the value of field arrival_order
     *
     * @param integer $arrival_order
     * @return $this
     */
    public function setArrivalOrder($arrival_order)
    {
        $this->arrival_order = $arrival_order;

        return $this;
    }

    /**
     * Method to set the value of field arrival_active
     *
     * @param string $arrival_active
     * @return $this
     */
    public function setArrivalActive($arrival_active)
    {
        $this->arrival_active = $arrival_active;

        return $this;
    }

    /**
     * Method to set the value of field arrival_country_timezone
     *
     * @param double $arrival_country_timezone
     * @return $this
     */
    public function setArrivalCountryTimezone($arrival_country_timezone)
    {
        $this->arrival_country_timezone = $arrival_country_timezone;

        return $this;
    }

    /**
     * Returns the value of field arrival_id
     *
     * @return integer
     */
    public function getArrivalId()
    {
        return $this->arrival_id;
    }

    /**
     * Returns the value of field arrival_country_code
     *
     * @return string
     */
    public function getArrivalCountryCode()
    {
        return $this->arrival_country_code;
    }

    /**
     * Returns the value of field arrival_order
     *
     * @return integer
     */
    public function getArrivalOrder()
    {
        return $this->arrival_order;
    }

    /**
     * Returns the value of field arrival_active
     *
     * @return string
     */
    public function getArrivalActive()
    {
        return $this->arrival_active;
    }

    /**
     * Returns the value of field arrival_country_timezone
     *
     * @return double
     */
    public function getArrivalCountryTimezone()
    {
        return $this->arrival_country_timezone;
    }

    /**
     * Initialize method for model.
     */
//    public function initialize()
//    {
//        $this->setSchema("globalvisacorp_com_v2");
//    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'new_arrival';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return NewArrival[]|NewArrival
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return NewArrival
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
