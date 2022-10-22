<?php

namespace GlobalVisa\Models;
use Phalcon\Db\RawValue;
class VisaPurposeCountry extends BaseModel
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
    protected $country_id;

    /**
     *
     * @var integer
     */
    protected $visatype_id;

    /**
     *
     * @var string
     */
    protected $country_is_exception;

    /**
     *
     * @var string
     */
    protected $country_exception_note;

    /**
     *
     * @var double
     */
    protected $country_government_fee;

    /**
     *
     * @var double
     */
    protected $country_visa_type_note;

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
     * Method to set the value of field country_is_exception
     *
     * @param string $country_is_exception
     * @return $this
     */
    public function setCountryIsException($country_is_exception)
    {
        $this->country_is_exception = $country_is_exception;

        return $this;
    }

    /**
     * Method to set the value of field country_exception_note
     *
     * @param string $country_exception_note
     * @return $this
     */
    public function setCountryExceptionNote($country_exception_note)
    {
        $this->country_exception_note = $country_exception_note;

        return $this;
    }

    /**
     * Method to set the value of field country_government_fee
     *
     * @param double $country_government_fee
     * @return $this
     */
    public function setCountryGovernmentFee($country_government_fee)
    {
        $this->country_government_fee = $country_government_fee;

        return $this;
    }

    /**
     * Method to set the value of field country_government_fee
     *
     * @param double $country_government_fee
     * @return $this
     */
    public function setCountryVisaTypeNote($country_visa_type_note)
    {
        $this->country_visa_type_note = $country_visa_type_note;

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
     * Returns the value of field country_id
     *
     * @return integer
     */
    public function getCountryId()
    {
        return $this->country_id;
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
     * Returns the value of field country_is_exception
     *
     * @return string
     */
    public function getCountryIsException()
    {
        return $this->country_is_exception;
    }

    /**
     * Returns the value of field country_exception_note
     *
     * @return string
     */
    public function getCountryExceptionNote()
    {
        return $this->country_exception_note;
    }

    /**
     * Returns the value of field country_government_fee
     *
     * @return double
     */
    public function getCountryGovernmentFee()
    {
        return $this->country_government_fee;
    }

    /**
     * Returns the value of field country_government_fee
     *
     * @return double
     */
    public function getCountryVisaTypeNote()
    {
        return $this->country_visa_type_note;
    }
    public function getSource()
    {
        return 'visa_purpose_country';
    }
    public function beforeValidation()
    {
        if (empty($this->country_exception_note)) {
            $this->country_exception_note = new RawValue('\'\'');
        }
        if (empty($this->country_visa_type_note)) {
            $this->country_visa_type_note = new RawValue('\'\'');
        }
    }

}
