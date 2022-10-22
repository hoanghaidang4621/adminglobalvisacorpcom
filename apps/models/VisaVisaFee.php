<?php

namespace GlobalVisa\Models;

class VisaVisaFee extends BaseModel
{

    /**
     *
     * @var integer
     */
    protected $visa_type_id;

    /**
     *
     * @var integer
     */
    protected $group_id;

    /**
     *
     * @var double
     */
    protected $visa_fee;

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
     * Returns the value of field visa_type_id
     *
     * @return integer
     */
    public function getVisaTypeId()
    {
        return $this->visa_type_id;
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
     * Returns the value of field visa_fee
     *
     * @return double
     */
    public function getVisaFee()
    {
        return $this->visa_fee;
    }

    public function getSource()
    {
        return 'visa_visa_fee';
    }

}
