<?php

namespace GlobalVisa\Models;

class VisaPurposeVisatype extends BaseModel
{

    /**
     *
     * @var integer
     */
    protected $visatype_id;

    /**
     *
     * @var integer
     */
    protected $purpose_id;

    /**
     *
     * @var double
     */
    protected $purpose_fee;

    /**
     * Method to set the value of field visatype_id
     *
     * @param integer $visatype_id
     * @return $this
     */
    public function setVisatypeId($visatype_id)
    {
        $this->visatype_id = $visatype_id;

        return $this;
    }

    /**
     * Method to set the value of field purpose_id
     *
     * @param integer $purpose_id
     * @return $this
     */
    public function setPurposeId($purpose_id)
    {
        $this->purpose_id = $purpose_id;

        return $this;
    }

    /**
     * Method to set the value of field purpose_fee
     *
     * @param double $purpose_fee
     * @return $this
     */
    public function setPurposeFee($purpose_fee)
    {
        $this->purpose_fee = $purpose_fee;

        return $this;
    }

    /**
     * Returns the value of field visatype_id
     *
     * @return integer
     */
    public function getVisatypeId()
    {
        return $this->visatype_id;
    }

    /**
     * Returns the value of field purpose_id
     *
     * @return integer
     */
    public function getPurposeId()
    {
        return $this->purpose_id;
    }

    /**
     * Returns the value of field purpose_fee
     *
     * @return double
     */
    public function getPurposeFee()
    {
        return $this->purpose_fee;
    }

    public function getSource()
    {
        return 'visa_purpose_visatype';
    }

}
