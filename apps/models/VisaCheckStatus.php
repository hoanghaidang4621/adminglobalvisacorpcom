<?php

namespace GlobalVisa\Models;

class VisaCheckStatus extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    protected $check_id;

    /**
     *
     * @var string
     */
    protected $check_full_name;

    /**
     *
     * @var string
     */
    protected $check_passport;

    /**
     *
     * @var string
     */
    protected $check_email;

    /**
     *
     * @var string
     */
    protected $check_request;

    /**
     *
     * @var integer
     */
    protected $check_time;

    /**
     * Method to set the value of field check_id
     *
     * @param integer $check_id
     * @return $this
     */
    public function setCheckId($check_id)
    {
        $this->check_id = $check_id;

        return $this;
    }

    /**
     * Method to set the value of field check_full_name
     *
     * @param string $check_full_name
     * @return $this
     */
    public function setCheckFullName($check_full_name)
    {
        $this->check_full_name = $check_full_name;

        return $this;
    }

    /**
     * Method to set the value of field check_passport
     *
     * @param string $check_passport
     * @return $this
     */
    public function setCheckPassport($check_passport)
    {
        $this->check_passport = $check_passport;

        return $this;
    }

    /**
     * Method to set the value of field check_email
     *
     * @param string $check_email
     * @return $this
     */
    public function setCheckEmail($check_email)
    {
        $this->check_email = $check_email;

        return $this;
    }

    /**
     * Method to set the value of field check_request
     *
     * @param string $check_request
     * @return $this
     */
    public function setCheckRequest($check_request)
    {
        $this->check_request = $check_request;

        return $this;
    }

    /**
     * Method to set the value of field check_time
     *
     * @param integer $check_time
     * @return $this
     */
    public function setCheckTime($check_time)
    {
        $this->check_time = $check_time;

        return $this;
    }

    /**
     * Returns the value of field check_id
     *
     * @return integer
     */
    public function getCheckId()
    {
        return $this->check_id;
    }

    /**
     * Returns the value of field check_full_name
     *
     * @return string
     */
    public function getCheckFullName()
    {
        return $this->check_full_name;
    }

    /**
     * Returns the value of field check_passport
     *
     * @return string
     */
    public function getCheckPassport()
    {
        return $this->check_passport;
    }

    /**
     * Returns the value of field check_email
     *
     * @return string
     */
    public function getCheckEmail()
    {
        return $this->check_email;
    }

    /**
     * Returns the value of field check_request
     *
     * @return string
     */
    public function getCheckRequest()
    {
        return $this->check_request;
    }

    /**
     * Returns the value of field check_time
     *
     * @return integer
     */
    public function getCheckTime()
    {
        return $this->check_time;
    }

}
