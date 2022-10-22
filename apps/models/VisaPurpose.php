<?php

namespace GlobalVisa\Models;

class VisaPurpose extends BaseModel
{

    /**
     *
     * @var integer
     */
    protected $purpose_id;

    /**
     *
     * @var string
     */
    protected $purpose_name;

    /**
     *
     * @var string
     */
    protected $purpose_description;

    /**
     *
     * @var integer
     */
    protected $purpose_arrival_country_id;

    /**
     *
     * @var string
     */
    protected $purpose_has_private_letter;

    /**
     *
     * @var double
     */
    protected $purpose_private_letter_fee;

    /**
     *
     * @var integer
     */
    protected $purpose_apply_hour;

    /**
     *
     * @var integer
     */
    protected $purpose_apply_minute;

    /**
     *
     * @var string
     */
    protected $purpose_apply_except_holiday;

    /**
     *
     * @var string
     */
    protected $purpose_apply_except_saturday;

    /**
     *
     * @var string
     */
    protected $purpose_apply_except_sunday;

    /**
     *
     * @var string
     */
    protected $purpose_apply_check_arrival_date;

    /**
     *
     * @var string
     */
    protected $purpose_government_fee_type;

    /**
     *
     * @var double
     */
    protected $purpose_government_fee_fixed;

    /**
     *
     * @var integer
     */
    protected $purpose_order;

    /**
     *
     * @var string
     */
    protected $purpose_active;

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
     * Method to set the value of field purpose_name
     *
     * @param string $purpose_name
     * @return $this
     */
    public function setPurposeName($purpose_name)
    {
        $this->purpose_name = $purpose_name;

        return $this;
    }

    /**
     * Method to set the value of field purpose_description
     *
     * @param string $purpose_description
     * @return $this
     */
    public function setPurposeDescription($purpose_description)
    {
        $this->purpose_description = $purpose_description;

        return $this;
    }

    /**
     * Method to set the value of field purpose_arrival_country_id
     *
     * @param integer $purpose_arrival_country_id
     * @return $this
     */
    public function setPurposeArrivalCountryId($purpose_arrival_country_id)
    {
        $this->purpose_arrival_country_id = $purpose_arrival_country_id;

        return $this;
    }

    /**
     * Method to set the value of field purpose_has_private_letter
     *
     * @param string $purpose_has_private_letter
     * @return $this
     */
    public function setPurposeHasPrivateLetter($purpose_has_private_letter)
    {
        $this->purpose_has_private_letter = $purpose_has_private_letter;

        return $this;
    }

    /**
     * Method to set the value of field purpose_private_letter_fee
     *
     * @param double $purpose_private_letter_fee
     * @return $this
     */
    public function setPurposePrivateLetterFee($purpose_private_letter_fee)
    {
        $this->purpose_private_letter_fee = $purpose_private_letter_fee;

        return $this;
    }

    /**
     * Method to set the value of field purpose_apply_hour
     *
     * @param integer $purpose_apply_hour
     * @return $this
     */
    public function setPurposeApplyHour($purpose_apply_hour)
    {
        $this->purpose_apply_hour = $purpose_apply_hour;

        return $this;
    }

    /**
     * Method to set the value of field purpose_apply_minute
     *
     * @param integer $purpose_apply_minute
     * @return $this
     */
    public function setPurposeApplyMinute($purpose_apply_minute)
    {
        $this->purpose_apply_minute = $purpose_apply_minute;

        return $this;
    }

    /**
     * Method to set the value of field purpose_apply_except_holiday
     *
     * @param string $purpose_apply_except_holiday
     * @return $this
     */
    public function setPurposeApplyExceptHoliday($purpose_apply_except_holiday)
    {
        $this->purpose_apply_except_holiday = $purpose_apply_except_holiday;

        return $this;
    }

    /**
     * Method to set the value of field purpose_apply_except_saturday
     *
     * @param string $purpose_apply_except_saturday
     * @return $this
     */
    public function setPurposeApplyExceptSaturday($purpose_apply_except_saturday)
    {
        $this->purpose_apply_except_saturday = $purpose_apply_except_saturday;

        return $this;
    }

    /**
     * Method to set the value of field purpose_apply_except_sunday
     *
     * @param string $purpose_apply_except_sunday
     * @return $this
     */
    public function setPurposeApplyExceptSunday($purpose_apply_except_sunday)
    {
        $this->purpose_apply_except_sunday = $purpose_apply_except_sunday;

        return $this;
    }

    /**
     * Method to set the value of field purpose_apply_check_arrival_date
     *
     * @param string $purpose_apply_check_arrival_date
     * @return $this
     */
    public function setPurposeApplyCheckArrivalDate($purpose_apply_check_arrival_date)
    {
        $this->purpose_apply_check_arrival_date = $purpose_apply_check_arrival_date;

        return $this;
    }

    /**
     * Method to set the value of field purpose_government_fee_type
     *
     * @param string $purpose_government_fee_type
     * @return $this
     */
    public function setPurposeGovernmentFeeType($purpose_government_fee_type)
    {
        $this->purpose_government_fee_type = $purpose_government_fee_type;

        return $this;
    }

    /**
     * Method to set the value of field purpose_government_fee_fixed
     *
     * @param double $purpose_government_fee_fixed
     * @return $this
     */
    public function setPurposeGovernmentFeeFixed($purpose_government_fee_fixed)
    {
        $this->purpose_government_fee_fixed = $purpose_government_fee_fixed;

        return $this;
    }

    /**
     * Method to set the value of field purpose_order
     *
     * @param integer $purpose_order
     * @return $this
     */
    public function setPurposeOrder($purpose_order)
    {
        $this->purpose_order = $purpose_order;

        return $this;
    }

    /**
     * Method to set the value of field purpose_active
     *
     * @param string $purpose_active
     * @return $this
     */
    public function setPurposeActive($purpose_active)
    {
        $this->purpose_active = $purpose_active;

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
     * Returns the value of field purpose_name
     *
     * @return string
     */
    public function getPurposeName()
    {
        return $this->purpose_name;
    }

    /**
     * Returns the value of field purpose_description
     *
     * @return string
     */
    public function getPurposeDescription()
    {
        return $this->purpose_description;
    }

    /**
     * Returns the value of field purpose_arrival_country_id
     *
     * @return integer
     */
    public function getPurposeArrivalCountryId()
    {
        return $this->purpose_arrival_country_id;
    }

    /**
     * Returns the value of field purpose_has_private_letter
     *
     * @return string
     */
    public function getPurposeHasPrivateLetter()
    {
        return $this->purpose_has_private_letter;
    }

    /**
     * Returns the value of field purpose_private_letter_fee
     *
     * @return double
     */
    public function getPurposePrivateLetterFee()
    {
        return $this->purpose_private_letter_fee;
    }

    /**
     * Returns the value of field purpose_apply_hour
     *
     * @return integer
     */
    public function getPurposeApplyHour()
    {
        return $this->purpose_apply_hour;
    }

    /**
     * Returns the value of field purpose_apply_minute
     *
     * @return integer
     */
    public function getPurposeApplyMinute()
    {
        return $this->purpose_apply_minute;
    }

    /**
     * Returns the value of field purpose_apply_except_holiday
     *
     * @return string
     */
    public function getPurposeApplyExceptHoliday()
    {
        return $this->purpose_apply_except_holiday;
    }

    /**
     * Returns the value of field purpose_apply_except_saturday
     *
     * @return string
     */
    public function getPurposeApplyExceptSaturday()
    {
        return $this->purpose_apply_except_saturday;
    }

    /**
     * Returns the value of field purpose_apply_except_sunday
     *
     * @return string
     */
    public function getPurposeApplyExceptSunday()
    {
        return $this->purpose_apply_except_sunday;
    }

    /**
     * Returns the value of field purpose_apply_check_arrival_date
     *
     * @return string
     */
    public function getPurposeApplyCheckArrivalDate()
    {
        return $this->purpose_apply_check_arrival_date;
    }

    /**
     * Returns the value of field purpose_government_fee_type
     *
     * @return string
     */
    public function getPurposeGovernmentFeeType()
    {
        return $this->purpose_government_fee_type;
    }

    /**
     * Returns the value of field purpose_government_fee_fixed
     *
     * @return double
     */
    public function getPurposeGovernmentFeeFixed()
    {
        return $this->purpose_government_fee_fixed;
    }

    /**
     * Returns the value of field purpose_order
     *
     * @return integer
     */
    public function getPurposeOrder()
    {
        return $this->purpose_order;
    }

    /**
     * Returns the value of field purpose_active
     *
     * @return string
     */
    public function getPurposeActive()
    {
        return $this->purpose_active;
    }

    /**
     * Returns the value of field purpose_description
     *
     * @return string
     */
    public function getPurposeNameAndDescription()
    {
        $des="";
        if(strlen($this->purpose_description)>0)
            $des=" (".$this->purpose_description.")";
        return $this->purpose_name.$des;
    }

    public function getSource()
    {
        return 'visa_purpose';
    }

}
