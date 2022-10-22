<?php

namespace GlobalVisa\Models;
use Phalcon\Db\RawValue;
class VisaOrderMember extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    protected $member_id;

    /**
     *
     * @var integer
     */
    protected $member_order_id;

    /**
     *
     * @var string
     */
    protected $member_name;

    /**
     *
     * @var integer
     */
    protected $member_country_id;

    /**
     *
     * @var string
     */
    protected $member_gender;

    /**
     *
     * @var integer
     */
    protected $member_birthday;

    /**
     *
     * @var string
     */
    protected $member_passport;

    /**
     *
     * @var integer
     */
    protected $member_visa_type_id;

    /**
     *
     * @var double
     */
    protected $member_visa_fee;

    /**
     *
     * @var string
     */
    protected $member_given_name;

    /**
     *
     * @var double
     */
    protected $member_stamping_fee;

    /**
     *
     * @var double
     */
    protected $member_government_fee;

    /**
     *
     * @var double
     */
    protected $member_government_fee_note;


    /**
     * Method to set the value of field member_id
     *
     * @param integer $member_id
     * @return $this
     */
    public function setMemberId($member_id)
    {
        $this->member_id = $member_id;

        return $this;
    }

    /**
     * Method to set the value of field member_order_id
     *
     * @param integer $member_order_id
     * @return $this
     */
    public function setMemberOrderId($member_order_id)
    {
        $this->member_order_id = $member_order_id;

        return $this;
    }

    /**
     * Method to set the value of field member_name
     *
     * @param string $member_name
     * @return $this
     */
    public function setMemberName($member_name)
    {
        $this->member_name = $member_name;

        return $this;
    }

    /**
     * Method to set the value of field member_country_id
     *
     * @param integer $member_country_id
     * @return $this
     */
    public function setMemberCountryId($member_country_id)
    {
        $this->member_country_id = $member_country_id;

        return $this;
    }

    /**
     * Method to set the value of field member_gender
     *
     * @param string $member_gender
     * @return $this
     */
    public function setMemberGender($member_gender)
    {
        $this->member_gender = $member_gender;

        return $this;
    }

    /**
     * Method to set the value of field member_birthday
     *
     * @param integer $member_birthday
     * @return $this
     */
    public function setMemberBirthday($member_birthday)
    {
        $this->member_birthday = $member_birthday;

        return $this;
    }

    /**
     * Method to set the value of field member_passport
     *
     * @param string $member_passport
     * @return $this
     */
    public function setMemberPassport($member_passport)
    {
        $this->member_passport = $member_passport;

        return $this;
    }

    /**
     * Method to set the value of field member_visa_type_id
     *
     * @param integer $member_visa_type_id
     * @return $this
     */
    public function setMemberVisaTypeId($member_visa_type_id)
    {
        $this->member_visa_type_id = $member_visa_type_id;

        return $this;
    }

    /**
     * Method to set the value of field member_visa_fee
     *
     * @param double $member_visa_fee
     * @return $this
     */
    public function setMemberVisaFee($member_visa_fee)
    {
        $this->member_visa_fee = $member_visa_fee;

        return $this;
    }

    /**
     * Method to set the value of field member_given_name
     *
     * @param string $member_given_name
     * @return $this
     */
    public function setMemberGivenName($member_given_name)
    {
        $this->member_given_name = $member_given_name;

        return $this;
    }

    /**
     * Method to set the value of field member_stamping_fee
     *
     * @param double $member_stamping_fee
     * @return $this
     */
    public function setMemberStampingFee($member_stamping_fee)
    {
        $this->member_stamping_fee = $member_stamping_fee;

        return $this;
    }

    /**
     * Method to set the value of field member_government_fee
     *
     * @param double $member_government_fee
     * @return $this
     */
    public function setMemberGovernmentFee($member_government_fee)
    {
        $this->member_government_fee = $member_government_fee;

        return $this;
    }

    /**
     * Method to set the value of field member_government_fee
     *
     * @param double $member_government_fee
     * @return $this
     */
    public function setMemberGovernmentFeeNote($member_government_fee_note)
    {
        $this->member_government_fee_note = $member_government_fee_note;

        return $this;
    }

    /**
     * Returns the value of field member_id
     *
     * @return integer
     */
    public function getMemberId()
    {
        return $this->member_id;
    }

    /**
     * Returns the value of field member_order_id
     *
     * @return integer
     */
    public function getMemberOrderId()
    {
        return $this->member_order_id;
    }

    /**
     * Returns the value of field member_name
     *
     * @return string
     */
    public function getMemberName()
    {
        return $this->member_name;
    }

    /**
     * Returns the value of field member_country_id
     *
     * @return integer
     */
    public function getMemberCountryId()
    {
        return $this->member_country_id;
    }

    /**
     * Returns the value of field member_gender
     *
     * @return string
     */
    public function getMemberGender()
    {
        return $this->member_gender;
    }

    /**
     * Returns the value of field member_birthday
     *
     * @return integer
     */
    public function getMemberBirthday()
    {
        return $this->member_birthday;
    }

    /**
     * Returns the value of field member_passport
     *
     * @return string
     */
    public function getMemberPassport()
    {
        return $this->member_passport;
    }

    /**
     * Returns the value of field member_visa_type_id
     *
     * @return integer
     */
    public function getMemberVisaTypeId()
    {
        return $this->member_visa_type_id;
    }

    /**
     * Returns the value of field member_visa_fee
     *
     * @return double
     */
    public function getMemberVisaFee()
    {
        return $this->member_visa_fee;
    }

    /**
     * Returns the value of field member_given_name
     *
     * @return string
     */
    public function getMemberGivenName()
    {
        return $this->member_given_name;
    }

    /**
     * Returns the value of field member_stamping_fee
     *
     * @return double
     */
    public function getMemberStampingFee()
    {
        return $this->member_stamping_fee;
    }

    /**
     * Returns the value of field member_government_fee
     *
     * @return double
     */
    public function getMemberGovernmentFee()
    {
        return $this->member_government_fee;
    }
    /**
     * Returns the value of field member_government_fee
     *
     * @return double
     */
    public function getMemberGovernmentFeeNote()
    {
        return $this->member_government_fee_note;
    }

    public function getSource()
    {
        return 'visa_order_member';
    }
    public function beforeValidation()
    {
        if (empty($this->member_government_fee_note)) {
            $this->member_government_fee_note = new RawValue('\'\'');
        }
    }

}
