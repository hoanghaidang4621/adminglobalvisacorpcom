<?php

namespace GlobalVisa\Models;

class VisaPurposeVisatypeCountry extends BaseModel
{

    /**
     *
     * @var integer
     */
    protected $purpose_id;

    /**
     *
     * @var integer
     */
    protected $visatype_id;

    /**
     *
     * @var integer
     */
    protected $country_id;

    /**
     *
     * @var double
     */
    protected $visa_fee;

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
     * Method to set the value of field country_id
     *
     * @param integer $country_id
     * @return $this
     */
    public function setCountryId($country_id)
    {
        $this->country_id = $country_id;

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
     * Returns the value of field purpose_id
     *
     * @return integer
     */
    public function getPurposeId()
    {
        return $this->purpose_id;
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
     * Returns the value of field country_id
     *
     * @return integer
     */
    public function getCountryId()
    {
        return $this->country_id;
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
        return 'visa_purpose_visatype_country';
    }

}
