<?php

namespace GlobalVisa\Models;

class VisaReceipt extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    protected $receipt_id;

    /**
     *
     * @var integer
     */
    protected $receipt_order_id;

    /**
     *
     * @var integer
     */
    protected $receipt_pay_date;

    /**
     *
     * @var string
     */
    protected $receipt_pay_method;

    /**
     *
     * @var double
     */
    protected $receipt_total;

    /**
     *
     * @var string
     */
    protected $receipt_transation_id;

    /**
     *
     * @var string
     */
    protected $receipt_transation_date;

    /**
     *
     * @var string
     */
    protected $receipt_creditcard;
	
	/**
     *
     * @var string
     */
    protected $receipt_creditcard2;

    /**
     *
     * @var string
     */
    protected $receipt_creditname;
    /**
     *
     * @var string
     */
    protected $receipt_currency;

    /**
     *
     * @var double
     */
    protected $receipt_exrate;

    /**
     *
     * @var integer
     */
    protected $receipt_exrate_date;

    /**
     * Method to set the value of field receipt_id
     *
     * @param integer $receipt_id
     * @return $this
     */
    public function setReceiptId($receipt_id)
    {
        $this->receipt_id = $receipt_id;

        return $this;
    }

    /**
     * Method to set the value of field receipt_order_id
     *
     * @param integer $receipt_order_id
     * @return $this
     */
    public function setReceiptOrderId($receipt_order_id)
    {
        $this->receipt_order_id = $receipt_order_id;

        return $this;
    }

    /**
     * Method to set the value of field receipt_pay_date
     *
     * @param integer $receipt_pay_date
     * @return $this
     */
    public function setReceiptPayDate($receipt_pay_date)
    {
        $this->receipt_pay_date = $receipt_pay_date;

        return $this;
    }

    /**
     * Method to set the value of field receipt_pay_method
     *
     * @param string $receipt_pay_method
     * @return $this
     */
    public function setReceiptPayMethod($receipt_pay_method)
    {
        $this->receipt_pay_method = $receipt_pay_method;

        return $this;
    }

    /**
     * Method to set the value of field receipt_total
     *
     * @param double $receipt_total
     * @return $this
     */
    public function setReceiptTotal($receipt_total)
    {
        $this->receipt_total = $receipt_total;

        return $this;
    }

    /**
     * Method to set the value of field receipt_transation_id
     *
     * @param string $receipt_transation_id
     * @return $this
     */
    public function setReceiptTransationId($receipt_transation_id)
    {
        $this->receipt_transation_id = $receipt_transation_id;

        return $this;
    }

    /**
     * Method to set the value of field receipt_transation_date
     *
     * @param string $receipt_transation_date
     * @return $this
     */
    public function setReceiptTransationDate($receipt_transation_date)
    {
        $this->receipt_transation_date = $receipt_transation_date;

        return $this;
    }

    /**
     * Method to set the value of field receipt_creditcard
     *
     * @param string $receipt_creditcard
     * @return $this
     */
    public function setReceiptCreditcard($receipt_creditcard)
    {
        $this->receipt_creditcard = $receipt_creditcard;

        return $this;
    }
	
	/**
     * Method to set the value of field receipt_creditcard2
     *
     * @param string $receipt_creditcard2
     * @return $this
     */
    public function setReceiptCreditcard2($receipt_creditcard2)
    {
        $this->receipt_creditcard2 = $receipt_creditcard2;

        return $this;
    }

    /**
     * Method to set the value of field receipt_creditname
     *
     * @param string $receipt_creditname
     * @return $this
     */
    public function setReceiptCreditname($receipt_creditname)
    {
        $this->receipt_creditname = $receipt_creditname;

        return $this;
    }
    /**
     * Method to set the value of field receipt_currency
     *
     * @param string $receipt_currency
     * @return $this
     */
    public function setReceiptCurrency($receipt_currency)
    {
        $this->receipt_currency = $receipt_currency;

        return $this;
    }

    /**
     * Method to set the value of field receipt_exrate
     *
     * @param double $receipt_exrate
     * @return $this
     */
    public function setReceiptExrate($receipt_exrate)
    {
        $this->receipt_exrate = $receipt_exrate;

        return $this;
    }

    /**
     * Method to set the value of field receipt_exrate_date
     *
     * @param integer $receipt_exrate_date
     * @return $this
     */
    public function setReceiptExrateDate($receipt_exrate_date)
    {
        $this->receipt_exrate_date = $receipt_exrate_date;

        return $this;
    }
    /**
     * Returns the value of field receipt_id
     *
     * @return integer
     */
    public function getReceiptId()
    {
        return $this->receipt_id;
    }

    /**
     * Returns the value of field receipt_order_id
     *
     * @return integer
     */
    public function getReceiptOrderId()
    {
        return $this->receipt_order_id;
    }

    /**
     * Returns the value of field receipt_pay_date
     *
     * @return integer
     */
    public function getReceiptPayDate()
    {
        return $this->receipt_pay_date;
    }

    /**
     * Returns the value of field receipt_pay_method
     *
     * @return string
     */
    public function getReceiptPayMethod()
    {
        return $this->receipt_pay_method;
    }

    /**
     * Returns the value of field receipt_total
     *
     * @return double
     */
    public function getReceiptTotal()
    {
        return $this->receipt_total;
    }

    /**
     * Returns the value of field receipt_transation_id
     *
     * @return string
     */
    public function getReceiptTransationId()
    {
        return $this->receipt_transation_id;
    }

    /**
     * Returns the value of field receipt_transation_date
     *
     * @return string
     */
    public function getReceiptTransationDate()
    {
        return $this->receipt_transation_date;
    }

    /**
     * Returns the value of field receipt_creditcard
     *
     * @return string
     */
    public function getReceiptCreditcard()
    {
        return $this->receipt_creditcard;
    }
	
	/**
     * Returns the value of field receipt_creditcard2
     *
     * @return string
     */
    public function getReceiptCreditcard2()
    {
        return $this->receipt_creditcard2;
    }

    /**
     * Returns the value of field receipt_creditname
     *
     * @return string
     */
    public function getReceiptCreditname()
    {
        return $this->receipt_creditname;
    }
    /**
     * Returns the value of field receipt_currency
     *
     * @return string
     */
    public function getReceiptCurrency()
    {
        return $this->receipt_currency;
    }

    /**
     * Returns the value of field receipt_exrate
     *
     * @return double
     */
    public function getReceiptExrate()
    {
        return $this->receipt_exrate;
    }

    /**
     * Returns the value of field receipt_exrate_date
     *
     * @return integer
     */
    public function getReceiptExrateDate()
    {
        return $this->receipt_exrate_date;
    }
    public function getSource()
    {
        return 'visa_receipt';
    }

}
