<?php

namespace GlobalVisa\Models;

class VisaPayment extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    protected $payment_id;

    /**
     *
     * @var integer
     */
    protected $payment_user_id;

    /**
     *
     * @var double
     */
    protected $payment_amount;

    /**
     *
     * @var string
     */
    protected $payment_for;

    /**
     *
     * @var string
     */
    protected $payment_note;

    /**
     *
     * @var string
     */
    protected $payment_method;
    /**
     *
     * @var string
     */
    protected $payment_cardtype;

    /**
     *
     * @var string
     */
    protected $payment_isenrolled3d;

    /**
     *
     * @var string
     */
    protected $payment_ispassed3d;
    /**
     *
     * @var integer
     */
    protected $payment_insertdate;

    /**
     *
     * @var integer
     */
    protected $payment_date;

    /**
     *
     * @var string
     */
    protected $payment_status;

    /**
     *
     * @var string
     */
    protected $payment_transation_id;

    /**
     *
     * @var string
     */
    protected $payment_transation_date;

    /**
     *
     * @var string
     */
    protected $payment_creditcard;
	
	/**
     *
     * @var string
     */
    protected $payment_creditcard2;

    /**
     *
     * @var string
     */
    protected $payment_creditname;

    /**
     *
     * @var string
     */
    protected $payment_fail_reason;
    /**
     *
     * @var string
     */
    protected $payment_currency;

    /**
     *
     * @var float
     */
    protected $payment_exrate;

    /**
     *
     * @var int
     */
    protected $payment_exrate_date;
    /**
     * Method to set the value of field payment_id
     *
     * @param integer $payment_id
     * @return $this
     */
    public function setPaymentId($payment_id)
    {
        $this->payment_id = $payment_id;

        return $this;
    }

    /**
     * Method to set the value of field payment_user_id
     *
     * @param integer $payment_user_id
     * @return $this
     */
    public function setPaymentUserId($payment_user_id)
    {
        $this->payment_user_id = $payment_user_id;

        return $this;
    }

    /**
     * Method to set the value of field payment_amount
     *
     * @param double $payment_amount
     * @return $this
     */
    public function setPaymentAmount($payment_amount)
    {
        $this->payment_amount = $payment_amount;

        return $this;
    }

    /**
     * Method to set the value of field payment_for
     *
     * @param string $payment_for
     * @return $this
     */
    public function setPaymentFor($payment_for)
    {
        $this->payment_for = $payment_for;

        return $this;
    }

    /**
     * Method to set the value of field payment_note
     *
     * @param string $payment_note
     * @return $this
     */
    public function setPaymentNote($payment_note)
    {
        $this->payment_note = $payment_note;

        return $this;
    }

    /**
     * Method to set the value of field payment_method
     *
     * @param string $payment_method
     * @return $this
     */
    public function setPaymentMethod($payment_method)
    {
        $this->payment_method = $payment_method;

        return $this;
    }
    /**
     * Method to set the value of field payment_cardtype
     *
     * @param string $payment_cardtype
     * @return $this
     */
    public function setPaymentCardtype($payment_cardtype)
    {
        $this->payment_cardtype = $payment_cardtype;

        return $this;
    }

    /**
     * Method to set the value of field payment_isenrolled3d
     *
     * @param string $payment_isenrolled3d
     * @return $this
     */
    public function setPaymentIsenrolled3d($payment_isenrolled3d)
    {
        $this->payment_isenrolled3d = $payment_isenrolled3d;

        return $this;
    }

    /**
     * Method to set the value of field payment_ispassed3d
     *
     * @param string $payment_ispassed3d
     * @return $this
     */
    public function setPaymentIspassed3d($payment_ispassed3d)
    {
        $this->payment_ispassed3d = $payment_ispassed3d;

        return $this;
    }
    /**
     * Method to set the value of field payment_insertdate
     *
     * @param integer $payment_insertdate
     * @return $this
     */
    public function setPaymentInsertDate($payment_insertdate)
    {
        $this->payment_insertdate  = $payment_insertdate;

        return $this;
    }

    /**
     * Method to set the value of field payment_date
     *
     * @param integer $payment_date
     * @return $this
     */
    public function setPaymentDate($payment_date)
    {
        $this->payment_date = $payment_date;

        return $this;
    }

    /**
     * Method to set the value of field payment_status
     *
     * @param string $payment_status
     * @return $this
     */
    public function setPaymentStatus($payment_status)
    {
        $this->payment_status = $payment_status;

        return $this;
    }

    /**
     * Method to set the value of field payment_transation_id
     *
     * @param string $payment_transation_id
     * @return $this
     */
    public function setPaymentTransationId($payment_transation_id)
    {
        $this->payment_transation_id = $payment_transation_id;

        return $this;
    }

    /**
     * Method to set the value of field payment_transation_date
     *
     * @param string $payment_transation_date
     * @return $this
     */
    public function setPaymentTransationDate($payment_transation_date)
    {
        $this->payment_transation_date = $payment_transation_date;

        return $this;
    }

    /**
     * Method to set the value of field payment_creditcard
     *
     * @param string $payment_creditcard
     * @return $this
     */
    public function setPaymentCreditcard($payment_creditcard)
    {
        $this->payment_creditcard = $payment_creditcard;

        return $this;
    }
	
	/**
     * Method to set the value of field payment_creditcard2
     *
     * @param string $payment_creditcard2
     * @return $this
     */
    public function setPaymentCreditcard2($payment_creditcard2)
    {
        $this->payment_creditcard2 = $payment_creditcard2;

        return $this;
    }

    /**
     * Method to set the value of field payment_creditname
     *
     * @param string $payment_creditname
     * @return $this
     */
    public function setPaymentCreditname($payment_creditname)
    {
        $this->payment_creditname = $payment_creditname;

        return $this;
    }

    /**
     * Method to set the value of field payment_fail_reason
     *
     * @param string $payment_fail_reason
     * @return $this
     */
    public function setPaymentFailReason($payment_fail_reason)
    {
        $this->payment_fail_reason = $payment_fail_reason;

        return $this;
    }
    public function setPaymentCurrency($payment_currency)
    {
        $this->payment_currency = $payment_currency;

        return $this;
    }

    /**
     * Method to set the value of field payment_exrate
     *
     * @param float $payment_exrate
     * @return $this
     */
    public function setPaymentExrate($payment_exrate)
    {
        $this->payment_exrate = $payment_exrate;

        return $this;
    }

    /**
     * Method to set the value of field payment_exrate_date
     *
     * @param int $payment_exrate_date
     * @return $this
     */
    public function setPaymentExrateDate($payment_exrate_date)
    {
        $this->payment_exrate_date = $payment_exrate_date;

        return $this;
    }
    /**
     * Returns the value of field payment_id
     *
     * @return integer
     */
    public function getPaymentId()
    {
        return $this->payment_id;
    }

    /**
     * Returns the value of field payment_user_id
     *
     * @return integer
     */
    public function getPaymentUserId()
    {
        return $this->payment_user_id;
    }

    /**
     * Returns the value of field payment_amount
     *
     * @return double
     */
    public function getPaymentAmount()
    {
        return $this->payment_amount;
    }

    /**
     * Returns the value of field payment_for
     *
     * @return string
     */
    public function getPaymentFor()
    {
        return $this->payment_for;
    }

    /**
     * Returns the value of field payment_note
     *
     * @return string
     */
    public function getPaymentNote()
    {
        return $this->payment_note;
    }

    /**
     * Returns the value of field payment_method
     *
     * @return string
     */
    public function getPaymentMethod()
    {
        return $this->payment_method;
    }
    /**
     * Returns the value of field payment_cardtype
     *
     * @return string
     */
    public function getPaymentCardtype()
    {
        return $this->payment_cardtype;
    }

    /**
     * Returns the value of field payment_isenrolled3d
     *
     * @return string
     */
    public function getPaymentIsenrolled3d()
    {
        return $this->payment_isenrolled3d;
    }

    /**
     * Returns the value of field payment_ispassed3d
     *
     * @return string
     */
    public function getPaymentIspassed3d()
    {
        return $this->payment_ispassed3d;
    }
    /**
     * Returns the value of field payment_insertdate
     *
     * @return integer
     */
    public function getPaymentInsertDate()
    {
        return $this->payment_insertdate;
    }

    /**
     * Returns the value of field payment_date
     *
     * @return integer
     */
    public function getPaymentDate()
    {
        return $this->payment_date;
    }

    /**
     * Returns the value of field payment_status
     *
     * @return string
     */
    public function getPaymentStatus()
    {
        return $this->payment_status;
    }

    /**
     * Returns the value of field payment_transation_id
     *
     * @return string
     */
    public function getPaymentTransationId()
    {
        return $this->payment_transation_id;
    }

    /**
     * Returns the value of field payment_transation_date
     *
     * @return string
     */
    public function getPaymentTransationDate()
    {
        return $this->payment_transation_date;
    }

    /**
     * Returns the value of field payment_creditcard
     *
     * @return string
     */
    public function getPaymentCreditcard()
    {
        return $this->payment_creditcard;
    }
	
	/**
     * Returns the value of field payment_creditcard2
     *
     * @return string
     */
    public function getPaymentCreditcard2()
    {
        return $this->payment_creditcard2;
    }

    /**
     * Returns the value of field payment_creditname
     *
     * @return string
     */
    public function getPaymentCreditname()
    {
        return $this->payment_creditname;
    }

    /**
     * Returns the value of field payment_fail_reason
     *
     * @return string
     */
    public function getPaymentFailReason()
    {
        return $this->payment_fail_reason;
    }
    /**
     * Returns the value of field payment_currency
     *
     * @return string
     */
    public function getPaymentCurrency()
    {
        return $this->payment_currency;
    }

    /**
     * Returns the value of field payment_exrate
     *
     * @return float
     */
    public function getPaymentExrate()
    {
        return $this->payment_exrate;
    }

    /**
     * Returns the value of field payment_exrate_date
     *
     * @return int
     */
    public function getPaymentExrateDate()
    {
        return $this->payment_exrate_date;
    }
    public function getSource()
    {
        return 'visa_payment';
    }

}
