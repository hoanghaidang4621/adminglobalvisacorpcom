<?php

namespace GlobalVisa\Models;

class VisaFastCheckFee extends BaseModel
{

    /**
     *
     * @var integer
     */
    protected $port_id;

    /**
     *
     * @var integer
     */
    protected $group_id;

    /**
     *
     * @var double
     */
    protected $fast_check_fee;

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
     * Method to set the value of field group_id
     *
     * @param integer $group_id
     * @return $this
     */
    public function setGroupId($group_id)
    {
        $this->group_id = $group_id;

        return $this;
    }

    /**
     * Method to set the value of field fast_check_fee
     *
     * @param double $fast_check_fee
     * @return $this
     */
    public function setFastCheckFee($fast_check_fee)
    {
        $this->fast_check_fee = $fast_check_fee;

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
     * Returns the value of field group_id
     *
     * @return integer
     */
    public function getGroupId()
    {
        return $this->group_id;
    }

    /**
     * Returns the value of field fast_check_fee
     *
     * @return double
     */
    public function getFastCheckFee()
    {
        return $this->fast_check_fee;
    }

    public function getSource()
    {
        return 'visa_fast_check_fee';
    }

}
