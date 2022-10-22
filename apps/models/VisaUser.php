<?php

namespace GlobalVisa\Models;

class VisaUser extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    protected $user_id;

    /**
     *
     * @var integer
     */
    protected $user_insert_time;

    /**
     *
     * @var string
     */
    protected $user_is_subscribe;

    /**
     * Method to set the value of field user_id
     *
     * @param integer $user_id
     * @return $this
     */
    public function setUserId($user_id)
    {
        $this->user_id = $user_id;

        return $this;
    }

    /**
     * Method to set the value of field user_insert_time
     *
     * @param integer $user_insert_time
     * @return $this
     */
    public function setUserInsertTime($user_insert_time)
    {
        $this->user_insert_time = $user_insert_time;

        return $this;
    }

    /**
     * Method to set the value of field user_is_subscribe
     *
     * @param string $user_is_subscribe
     * @return $this
     */
    public function setUserIsSubscribe($user_is_subscribe)
    {
        $this->user_is_subscribe = $user_is_subscribe;

        return $this;
    }

    /**
     * Returns the value of field user_id
     *
     * @return integer
     */
    public function getUserId()
    {
        return $this->user_id;
    }

    /**
     * Returns the value of field user_insert_time
     *
     * @return integer
     */
    public function getUserInsertTime()
    {
        return $this->user_insert_time;
    }

    /**
     * Returns the value of field user_is_subscribe
     *
     * @return string
     */
    public function getUserIsSubscribe()
    {
        return $this->user_is_subscribe;
    }

    public function getSource()
    {
        return 'visa_user';
    }


}
