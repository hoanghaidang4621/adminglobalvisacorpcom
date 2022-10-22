<?php

namespace GlobalVisa\Models;

class VisaPort extends BaseModel
{

    /**
     *
     * @var integer
     */
    protected $port_id;

    /**
     *
     * @var string
     */
    protected $port_name;

    /**
     *
     * @var integer
     */
    protected $port_type_id;

    /**
     *
     * @var integer
     */
    protected $port_from_country_id;

    /**
     *
     * @var integer
     */
    protected $port_order;

    /**
     *
     * @var string
     */
    protected $port_active;

    /**
     * Method to set the value of field port_id
     *
     * @param integer $port_id
     * @return $this
     */
    public function setPortId($port_id)
    {
        $this->port_id = $port_id;

        return $this;
    }

    /**
     * Method to set the value of field port_name
     *
     * @param string $port_name
     * @return $this
     */
    public function setPortName($port_name)
    {
        $this->port_name = $port_name;

        return $this;
    }

    /**
     * Method to set the value of field port_type_id
     *
     * @param integer $port_type_id
     * @return $this
     */
    public function setPortTypeId($port_type_id)
    {
        $this->port_type_id = $port_type_id;

        return $this;
    }

    /**
     * Method to set the value of field port_from_country_id
     *
     * @param integer $port_from_country_id
     * @return $this
     */
    public function setPortFromCountryId($port_from_country_id)
    {
        $this->port_from_country_id = $port_from_country_id;

        return $this;
    }

    /**
     * Method to set the value of field port_order
     *
     * @param integer $port_order
     * @return $this
     */
    public function setPortOrder($port_order)
    {
        $this->port_order = $port_order;

        return $this;
    }

    /**
     * Method to set the value of field port_active
     *
     * @param string $port_active
     * @return $this
     */
    public function setPortActive($port_active)
    {
        $this->port_active = $port_active;

        return $this;
    }

    /**
     * Returns the value of field port_id
     *
     * @return integer
     */
    public function getPortId()
    {
        return $this->port_id;
    }

    /**
     * Returns the value of field port_name
     *
     * @return string
     */
    public function getPortName()
    {
        return $this->port_name;
    }

    /**
     * Returns the value of field port_type_id
     *
     * @return integer
     */
    public function getPortTypeId()
    {
        return $this->port_type_id;
    }

    /**
     * Returns the value of field port_from_country_id
     *
     * @return integer
     */
    public function getPortFromCountryId()
    {
        return $this->port_from_country_id;
    }

    /**
     * Returns the value of field port_order
     *
     * @return integer
     */
    public function getPortOrder()
    {
        return $this->port_order;
    }

    /**
     * Returns the value of field port_active
     *
     * @return string
     */
    public function getPortActive()
    {
        return $this->port_active;
    }

    public function getSource()
    {
        return 'visa_port';
    }

}
