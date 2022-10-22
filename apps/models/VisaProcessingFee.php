<?php

namespace GlobalVisa\Models;

class VisaProcessingFee extends BaseModel
{

    /**
     *
     * @var integer
     */
    protected $processing_id;

    /**
     *
     * @var string
     */
    protected $processing_name;

    /**
     *
     * @var double
     */
    protected $processing_fee;

    /**
     *
     * @var integer
     */
    protected $processing_order;

    /**
     *
     * @var string
     */
    protected $processing_active;

    /**
     *
     * @var integer
     */
    protected $processing_date;

    /**
     *
     * @var integer
     */
    protected $processing_purpose_id;

    /**
     * Method to set the value of field processing_id
     *
     * @param integer $processing_id
     * @return $this
     */
    public function setProcessingId($processing_id)
    {
        $this->processing_id = $processing_id;

        return $this;
    }

    /**
     * Method to set the value of field processing_name
     *
     * @param string $processing_name
     * @return $this
     */
    public function setProcessingName($processing_name)
    {
        $this->processing_name = $processing_name;

        return $this;
    }

    /**
     * Method to set the value of field processing_fee
     *
     * @param double $processing_fee
     * @return $this
     */
    public function setProcessingFee($processing_fee)
    {
        $this->processing_fee = $processing_fee;

        return $this;
    }

    /**
     * Method to set the value of field processing_order
     *
     * @param integer $processing_order
     * @return $this
     */
    public function setProcessingOrder($processing_order)
    {
        $this->processing_order = $processing_order;

        return $this;
    }

    /**
     * Method to set the value of field processing_active
     *
     * @param string $processing_active
     * @return $this
     */
    public function setProcessingActive($processing_active)
    {
        $this->processing_active = $processing_active;

        return $this;
    }

    /**
     * Method to set the value of field processing_date
     *
     * @param integer $processing_date
     * @return $this
     */
    public function setProcessingDate($processing_date)
    {
        $this->processing_date = $processing_date;

        return $this;
    }

    /**
     * Method to set the value of field processing_purpose_id
     *
     * @param integer $processing_purpose_id
     * @return $this
     */
    public function setProcessingPurposeId($processing_purpose_id)
    {
        $this->processing_purpose_id = $processing_purpose_id;

        return $this;
    }

    /**
     * Returns the value of field processing_id
     *
     * @return integer
     */
    public function getProcessingId()
    {
        return $this->processing_id;
    }

    /**
     * Returns the value of field processing_name
     *
     * @return string
     */
    public function getProcessingName()
    {
        return $this->processing_name;
    }

    /**
     * Returns the value of field processing_fee
     *
     * @return double
     */
    public function getProcessingFee()
    {
        return $this->processing_fee;
    }

    /**
     * Returns the value of field processing_order
     *
     * @return integer
     */
    public function getProcessingOrder()
    {
        return $this->processing_order;
    }

    /**
     * Returns the value of field processing_active
     *
     * @return string
     */
    public function getProcessingActive()
    {
        return $this->processing_active;
    }

    /**
     * Returns the value of field processing_date
     *
     * @return integer
     */
    public function getProcessingDate()
    {
        return $this->processing_date;
    }

    /**
     * Returns the value of field processing_purpose_id
     *
     * @return integer
     */
    public function getProcessingPurposeId()
    {
        return $this->processing_purpose_id;
    }

    public function getSource()
    {
        return 'visa_processing_fee';
    }

}
