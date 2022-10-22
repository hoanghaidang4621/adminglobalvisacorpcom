<?php

namespace GlobalVisa\Models;

class VisaOrder extends \Phalcon\Mvc\Model
{
    public function initialize()
    {
//        $this->belongsTo(
//            'order_country_id', "GlobalVisa\Models\VisaArrivalCountry", "arrival_country_id",
//            array('alias' => 'arrivalCountry')
//        );
                $this->belongsTo(
            'order_arrival_country_id', "GlobalVisa\Models\VisaArrivalCountry", "arrival_country_id",
            array('alias' => 'arrivalCountry')
        );

    }

    /**
     *
     * @var integer
     */
    protected $order_id;

    /**
     *
     * @var integer
     */
    protected $order_user_id;

    /**
     *
     * @var integer
     */
    protected $order_arrival_country_id;

    /**
     *
     * @var integer
     */
    protected $order_group_id;

    /**
     *
     * @var integer
     */
    protected $order_purpose_id;

    /**
     *
     * @var integer
     */
    protected $order_visa_type_id;

    /**
     *
     * @var integer
     */
    protected $order_arrival_port_id;

    /**
     *
     * @var integer
     */
    protected $order_processing_id;

    /**
     *
     * @var integer
     */
    protected $order_car_id;

    /**
     *
     * @var double
     */
    protected $order_visa_fee;

    /**
     *
     * @var double
     */
    protected $order_purpose_fee;

    /**
     *
     * @var double
     */
    protected $order_processing_fee;

    /**
     *
     * @var double
     */
    protected $order_fast_check_fee;

    /**
     *
     * @var double
     */
    protected $order_pick_up_fee;

    /**
     *
     * @var integer
     */
    protected $order_arrival_date;

    /**
     *
     * @var integer
     */
    protected $order_exit_date;

    /**
     *
     * @var integer
     */
    protected $order_register_date;

    /**
     *
     * @var string
     */
    protected $order_special_request;

    /**
     *
     * @var string
     */
    protected $order_flight_number;

    /**
     *
     * @var string
     */
    protected $order_arrival_time;

    /**
     *
     * @var double
     */
    protected $order_total;

    /**
     *
     * @var string
     */
    protected $order_status;

    /**
     *
     * @var integer
     */
    protected $order_exception;

    /**
     *
     * @var integer
     */
    protected $order_group_value;

    /**
     *
     * @var double
     */
    protected $order_exception_fee;

    /**
     *
     * @var string
     */
    protected $order_payment_method;
    /**
     *
     * @var string
     */
    protected $order_cardtype;

    /**
     *
     * @var string
     */
    protected $order_isenrolled3d;

    /**
     *
     * @var string
     */
    protected $order_ispassed3d;
    /**
     *
     * @var string
     */
    protected $order_fail_reason;

    /**
     *
     * @var double
     */
    protected $order_total_government_fee;

    /**
     *
     * @var integer
     */
    protected $order_email_time;

    /**
     *
     * @var double
     */
    protected $order_stamping_fee;

    /**
     *
     * @var double
     */
    protected $order_exception_package_fee;

    /**
     *
     * @var string
     */
    protected $order_user_disnote;

    /**
     *
     * @var double
     */
    protected $order_user_disrate;

    /**
     *
     * @var double
     */
    protected $order_package_transaction_per;

    /**
     *
     * @var double
     */
    protected $order_package_fast_check_fee;

    /**
     *
     * @var double
     */
    protected $order_promotion_percent;

    /**
     *
     * @var string
     */
    protected $order_promotion_code;
    /**
     *
     * @var string
     */
    protected $order_currency;

    /**
     *
     * @var double
     */
    protected $order_exrate;

    /**
     *
     * @var integer
     */
    protected $order_exrate_date;
    /**
     *
     * @var double
     */
    protected $order_private_visa_fee;

    /**
     * Method to set the value of field order_id
     *
     * @param integer $order_id
     * @return $this
     */
    public function setOrderId($order_id)
    {
        $this->order_id = $order_id;

        return $this;
    }

    /**
     * Method to set the value of field order_user_id
     *
     * @param integer $order_user_id
     * @return $this
     */
    public function setOrderUserId($order_user_id)
    {
        $this->order_user_id = $order_user_id;

        return $this;
    }

    /**
     * Method to set the value of field order_arrival_country_id
     *
     * @param integer $order_arrival_country_id
     * @return $this
     */
    public function setOrderArrivalCountryId($order_arrival_country_id)
    {
        $this->order_arrival_country_id = $order_arrival_country_id;

        return $this;
    }

    /**
     * Method to set the value of field order_group_id
     *
     * @param integer $order_group_id
     * @return $this
     */
    public function setOrderGroupId($order_group_id)
    {
        $this->order_group_id = $order_group_id;

        return $this;
    }

    /**
     * Method to set the value of field order_purpose_id
     *
     * @param integer $order_purpose_id
     * @return $this
     */
    public function setOrderPurposeId($order_purpose_id)
    {
        $this->order_purpose_id = $order_purpose_id;

        return $this;
    }

    /**
     * Method to set the value of field order_visa_type_id
     *
     * @param integer $order_visa_type_id
     * @return $this
     */
    public function setOrderVisaTypeId($order_visa_type_id)
    {
        $this->order_visa_type_id = $order_visa_type_id;

        return $this;
    }

    /**
     * Method to set the value of field order_arrival_port_id
     *
     * @param integer $order_arrival_port_id
     * @return $this
     */
    public function setOrderArrivalPortId($order_arrival_port_id)
    {
        $this->order_arrival_port_id = $order_arrival_port_id;

        return $this;
    }

    /**
     * Method to set the value of field order_processing_id
     *
     * @param integer $order_processing_id
     * @return $this
     */
    public function setOrderProcessingId($order_processing_id)
    {
        $this->order_processing_id = $order_processing_id;

        return $this;
    }

    /**
     * Method to set the value of field order_car_id
     *
     * @param integer $order_car_id
     * @return $this
     */
    public function setOrderCarId($order_car_id)
    {
        $this->order_car_id = $order_car_id;

        return $this;
    }

    /**
     * Method to set the value of field order_visa_fee
     *
     * @param double $order_visa_fee
     * @return $this
     */
    public function setOrderVisaFee($order_visa_fee)
    {
        $this->order_visa_fee = $order_visa_fee;

        return $this;
    }

    /**
     * Method to set the value of field order_purpose_fee
     *
     * @param double $order_purpose_fee
     * @return $this
     */
    public function setOrderPurposeFee($order_purpose_fee)
    {
        $this->order_purpose_fee = $order_purpose_fee;

        return $this;
    }

    /**
     * Method to set the value of field order_processing_fee
     *
     * @param double $order_processing_fee
     * @return $this
     */
    public function setOrderProcessingFee($order_processing_fee)
    {
        $this->order_processing_fee = $order_processing_fee;

        return $this;
    }

    /**
     * Method to set the value of field order_fast_check_fee
     *
     * @param double $order_fast_check_fee
     * @return $this
     */
    public function setOrderFastCheckFee($order_fast_check_fee)
    {
        $this->order_fast_check_fee = $order_fast_check_fee;

        return $this;
    }

    /**
     * Method to set the value of field order_pick_up_fee
     *
     * @param double $order_pick_up_fee
     * @return $this
     */
    public function setOrderPickUpFee($order_pick_up_fee)
    {
        $this->order_pick_up_fee = $order_pick_up_fee;

        return $this;
    }

    /**
     * Method to set the value of field order_arrival_date
     *
     * @param integer $order_arrival_date
     * @return $this
     */
    public function setOrderArrivalDate($order_arrival_date)
    {
        $this->order_arrival_date = $order_arrival_date;

        return $this;
    }

    /**
     * Method to set the value of field order_exit_date
     *
     * @param integer $order_exit_date
     * @return $this
     */
    public function setOrderExitDate($order_exit_date)
    {
        $this->order_exit_date = $order_exit_date;

        return $this;
    }

    /**
     * Method to set the value of field order_register_date
     *
     * @param integer $order_register_date
     * @return $this
     */
    public function setOrderRegisterDate($order_register_date)
    {
        $this->order_register_date = $order_register_date;

        return $this;
    }

    /**
     * Method to set the value of field order_special_request
     *
     * @param string $order_special_request
     * @return $this
     */
    public function setOrderSpecialRequest($order_special_request)
    {
        $this->order_special_request = $order_special_request;

        return $this;
    }

    /**
     * Method to set the value of field order_flight_number
     *
     * @param string $order_flight_number
     * @return $this
     */
    public function setOrderFlightNumber($order_flight_number)
    {
        $this->order_flight_number = $order_flight_number;

        return $this;
    }

    /**
     * Method to set the value of field order_arrival_time
     *
     * @param string $order_arrival_time
     * @return $this
     */
    public function setOrderArrivalTime($order_arrival_time)
    {
        $this->order_arrival_time = $order_arrival_time;

        return $this;
    }

    /**
     * Method to set the value of field order_total
     *
     * @param double $order_total
     * @return $this
     */
    public function setOrderTotal($order_total)
    {
        $this->order_total = $order_total;

        return $this;
    }

    /**
     * Method to set the value of field order_status
     *
     * @param string $order_status
     * @return $this
     */
    public function setOrderStatus($order_status)
    {
        $this->order_status = $order_status;

        return $this;
    }

    /**
     * Method to set the value of field order_exception
     *
     * @param integer $order_exception
     * @return $this
     */
    public function setOrderException($order_exception)
    {
        $this->order_exception = $order_exception;

        return $this;
    }

    /**
     * Method to set the value of field order_group_value
     *
     * @param integer $order_group_value
     * @return $this
     */
    public function setOrderGroupValue($order_group_value)
    {
        $this->order_group_value = $order_group_value;

        return $this;
    }

    /**
     * Method to set the value of field order_exception_fee
     *
     * @param double $order_exception_fee
     * @return $this
     */
    public function setOrderExceptionFee($order_exception_fee)
    {
        $this->order_exception_fee = $order_exception_fee;

        return $this;
    }

    /**
     * Method to set the value of field order_payment_method
     *
     * @param string $order_payment_method
     * @return $this
     */
    public function setOrderPaymentMethod($order_payment_method)
    {
        $this->order_payment_method = $order_payment_method;

        return $this;
    }
    /**
     * Method to set the value of field order_cardtype
     *
     * @param string $order_cardtype
     * @return $this
     */
    public function setOrderCardtype($order_cardtype)
    {
        $this->order_cardtype = $order_cardtype;

        return $this;
    }

    /**
     * Method to set the value of field order_isenrolled3d
     *
     * @param string $order_isenrolled3d
     * @return $this
     */
    public function setOrderIsenrolled3d($order_isenrolled3d)
    {
        $this->order_isenrolled3d = $order_isenrolled3d;

        return $this;
    }

    /**
     * Method to set the value of field order_ispassed3d
     *
     * @param string $order_ispassed3d
     * @return $this
     */
    public function setOrderIspassed3d($order_ispassed3d)
    {
        $this->order_ispassed3d = $order_ispassed3d;

        return $this;
    }
    /**
     * Method to set the value of field order_fail_reason
     *
     * @param string $order_fail_reason
     * @return $this
     */
    public function setOrderFailReason($order_fail_reason)
    {
        $this->order_fail_reason = $order_fail_reason;

        return $this;
    }

    /**
     * Method to set the value of field order_total_government_fee
     *
     * @param double $order_total_government_fee
     * @return $this
     */
    public function setOrderTotalGovernmentFee($order_total_government_fee)
    {
        $this->order_total_government_fee = $order_total_government_fee;

        return $this;
    }

    /**
     * Method to set the value of field order_email_time
     *
     * @param integer $order_email_time
     * @return $this
     */
    public function setOrderEmailTime($order_email_time)
    {
        $this->order_email_time = $order_email_time;

        return $this;
    }

    /**
     * Method to set the value of field order_stamping_fee
     *
     * @param double $order_stamping_fee
     * @return $this
     */
    public function setOrderStampingFee($order_stamping_fee)
    {
        $this->order_stamping_fee = $order_stamping_fee;

        return $this;
    }

    /**
     * Method to set the value of field order_exception_package_fee
     *
     * @param double $order_exception_package_fee
     * @return $this
     */
    public function setOrderExceptionPackageFee($order_exception_package_fee)
    {
        $this->order_exception_package_fee = $order_exception_package_fee;

        return $this;
    }

    /**
     * Method to set the value of field order_user_disnote
     *
     * @param string $order_user_disnote
     * @return $this
     */
    public function setOrderUserDisnote($order_user_disnote)
    {
        $this->order_user_disnote = $order_user_disnote;

        return $this;
    }

    /**
     * Method to set the value of field order_user_disrate
     *
     * @param double $order_user_disrate
     * @return $this
     */
    public function setOrderUserDisrate($order_user_disrate)
    {
        $this->order_user_disrate = $order_user_disrate;

        return $this;
    }

    /**
     * Method to set the value of field order_package_transaction_per
     *
     * @param double $order_package_transaction_per
     * @return $this
     */
    public function setOrderPackageTransactionPer($order_package_transaction_per)
    {
        $this->order_package_transaction_per = $order_package_transaction_per;

        return $this;
    }

    /**
     * Method to set the value of field order_package_fast_check_fee
     *
     * @param double $order_package_fast_check_fee
     * @return $this
     */
    public function setOrderPackageFastCheckFee($order_package_fast_check_fee)
    {
        $this->order_package_fast_check_fee = $order_package_fast_check_fee;

        return $this;
    }

    /**
     * Method to set the value of field order_promotion_percent
     *
     * @param double $order_promotion_percent
     * @return $this
     */
    public function setOrderPromotionPercent($order_promotion_percent)
    {
        $this->order_promotion_percent = $order_promotion_percent;

        return $this;
    }

    /**
     * Method to set the value of field order_promotion_code
     *
     * @param string $order_promotion_code
     * @return $this
     */
    public function setOrderPromotionCode($order_promotion_code)
    {
        $this->order_promotion_code = $order_promotion_code;

        return $this;
    }

    /**
     * Method to set the value of field order_private_visa_fee
     *
     * @param double $order_private_visa_fee
     * @return $this
     */
    public function setOrderPrivateVisaFee($order_private_visa_fee)
    {
        $this->order_private_visa_fee = $order_private_visa_fee;

        return $this;
    }
    /**
     * Method to set the value of field order_currency
     *
     * @param string $order_currency
     * @return $this
     */
    public function setOrderCurrency($order_currency)
    {
        $this->order_currency = $order_currency;

        return $this;
    }

    /**
     * Method to set the value of field order_exrate
     *
     * @param double $order_exrate
     * @return $this
     */
    public function setOrderExrate($order_exrate)
    {
        $this->order_exrate = $order_exrate;

        return $this;
    }

    /**
     * Method to set the value of field order_exrate_date
     *
     * @param integer $order_exrate_date
     * @return $this
     */
    public function setOrderExrateDate($order_exrate_date)
    {
        $this->order_exrate_date = $order_exrate_date;

        return $this;
    }
    /**
     * Returns the value of field order_id
     *
     * @return integer
     */
    public function getOrderId()
    {
        return $this->order_id;
    }

    /**
     * Returns the value of field order_user_id
     *
     * @return integer
     */
    public function getOrderUserId()
    {
        return $this->order_user_id;
    }

    /**
     * Returns the value of field order_arrival_country_id
     *
     * @return integer
     */
    public function getOrderArrivalCountryId()
    {
        return $this->order_arrival_country_id;
    }

    /**
     * Returns the value of field order_group_id
     *
     * @return integer
     */
    public function getOrderGroupId()
    {
        return $this->order_group_id;
    }

    /**
     * Returns the value of field order_purpose_id
     *
     * @return integer
     */
    public function getOrderPurposeId()
    {
        return $this->order_purpose_id;
    }

    /**
     * Returns the value of field order_visa_type_id
     *
     * @return integer
     */
    public function getOrderVisaTypeId()
    {
        return $this->order_visa_type_id;
    }

    /**
     * Returns the value of field order_arrival_port_id
     *
     * @return integer
     */
    public function getOrderArrivalPortId()
    {
        return $this->order_arrival_port_id;
    }

    /**
     * Returns the value of field order_processing_id
     *
     * @return integer
     */
    public function getOrderProcessingId()
    {
        return $this->order_processing_id;
    }

    /**
     * Returns the value of field order_car_id
     *
     * @return integer
     */
    public function getOrderCarId()
    {
        return $this->order_car_id;
    }

    /**
     * Returns the value of field order_visa_fee
     *
     * @return double
     */
    public function getOrderVisaFee()
    {
        return $this->order_visa_fee;
    }

    /**
     * Returns the value of field order_purpose_fee
     *
     * @return double
     */
    public function getOrderPurposeFee()
    {
        return $this->order_purpose_fee;
    }

    /**
     * Returns the value of field order_processing_fee
     *
     * @return double
     */
    public function getOrderProcessingFee()
    {
        return $this->order_processing_fee;
    }

    /**
     * Returns the value of field order_fast_check_fee
     *
     * @return double
     */
    public function getOrderFastCheckFee()
    {
        return $this->order_fast_check_fee;
    }

    /**
     * Returns the value of field order_pick_up_fee
     *
     * @return double
     */
    public function getOrderPickUpFee()
    {
        return $this->order_pick_up_fee;
    }

    /**
     * Returns the value of field order_arrival_date
     *
     * @return integer
     */
    public function getOrderArrivalDate()
    {
        return $this->order_arrival_date;
    }

    /**
     * Returns the value of field order_exit_date
     *
     * @return integer
     */
    public function getOrderExitDate()
    {
        return $this->order_exit_date;
    }

    /**
     * Returns the value of field order_register_date
     *
     * @return integer
     */
    public function getOrderRegisterDate()
    {
        return $this->order_register_date;
    }

    /**
     * Returns the value of field order_special_request
     *
     * @return string
     */
    public function getOrderSpecialRequest()
    {
        return $this->order_special_request;
    }

    /**
     * Returns the value of field order_flight_number
     *
     * @return string
     */
    public function getOrderFlightNumber()
    {
        return $this->order_flight_number;
    }

    /**
     * Returns the value of field order_arrival_time
     *
     * @return string
     */
    public function getOrderArrivalTime()
    {
        return $this->order_arrival_time;
    }

    /**
     * Returns the value of field order_total
     *
     * @return double
     */
    public function getOrderTotal()
    {
        return $this->order_total;
    }

    /**
     * Returns the value of field order_status
     *
     * @return string
     */
    public function getOrderStatus()
    {
        return $this->order_status;
    }

    /**
     * Returns the value of field order_exception
     *
     * @return integer
     */
    public function getOrderException()
    {
        return $this->order_exception;
    }

    /**
     * Returns the value of field order_group_value
     *
     * @return integer
     */
    public function getOrderGroupValue()
    {
        return $this->order_group_value;
    }

    /**
     * Returns the value of field order_exception_fee
     *
     * @return double
     */
    public function getOrderExceptionFee()
    {
        return $this->order_exception_fee;
    }

    /**
     * Returns the value of field order_payment_method
     *
     * @return string
     */
    public function getOrderPaymentMethod()
    {
        return $this->order_payment_method;
    }
    /**
     * Returns the value of field order_cardtype
     *
     * @return string
     */
    public function getOrderCardtype()
    {
        return $this->order_cardtype;
    }

    /**
     * Returns the value of field order_isenrolled3d
     *
     * @return string
     */
    public function getOrderIsenrolled3d()
    {
        return $this->order_isenrolled3d;
    }

    /**
     * Returns the value of field order_ispassed3d
     *
     * @return string
     */
    public function getOrderIspassed3d()
    {
        return $this->order_ispassed3d;
    }
    /**
     * Returns the value of field order_fail_reason
     *
     * @return string
     */
    public function getOrderFailReason()
    {
        return $this->order_fail_reason;
    }

    /**
     * Returns the value of field order_total_government_fee
     *
     * @return double
     */
    public function getOrderTotalGovernmentFee()
    {
        return $this->order_total_government_fee;
    }

    /**
     * Returns the value of field order_email_time
     *
     * @return integer
     */
    public function getOrderEmailTime()
    {
        return $this->order_email_time;
    }

    /**
     * Returns the value of field order_stamping_fee
     *
     * @return double
     */
    public function getOrderStampingFee()
    {
        return $this->order_stamping_fee;
    }

    /**
     * Returns the value of field order_exception_package_fee
     *
     * @return double
     */
    public function getOrderExceptionPackageFee()
    {
        return $this->order_exception_package_fee;
    }

    /**
     * Returns the value of field order_user_disnote
     *
     * @return string
     */
    public function getOrderUserDisnote()
    {
        return $this->order_user_disnote;
    }

    /**
     * Returns the value of field order_user_disrate
     *
     * @return double
     */
    public function getOrderUserDisrate()
    {
        return $this->order_user_disrate;
    }

    /**
     * Returns the value of field order_package_transaction_per
     *
     * @return double
     */
    public function getOrderPackageTransactionPer()
    {
        return $this->order_package_transaction_per;
    }

    /**
     * Returns the value of field order_package_fast_check_fee
     *
     * @return double
     */
    public function getOrderPackageFastCheckFee()
    {
        return $this->order_package_fast_check_fee;
    }

    /**
     * Returns the value of field order_promotion_percent
     *
     * @return double
     */
    public function getOrderPromotionPercent()
    {
        return $this->order_promotion_percent;
    }

    /**
     * Returns the value of field order_promotion_code
     *
     * @return string
     */
    public function getOrderPromotionCode()
    {
        return $this->order_promotion_code;
    }

    /**
     * Returns the value of field order_private_visa_fee
     *
     * @return double
     */
    public function getOrderPrivateVisaFee()
    {
        return $this->order_private_visa_fee;
    }
    /**
     * Returns the value of field receipt_currency
     *
     * @return string
     */
    public function getOrderCurrency()
    {
        return $this->order_currency;
    }

    /**
     * Returns the value of field order_exrate
     *
     * @return double
     */
    public function getOrderExrate()
    {
        return $this->order_exrate;
    }

    /**
     * Returns the value of field order_exrate_date
     *
     * @return integer
     */
    public function getOrderExrateDate()
    {
        return $this->order_exrate_date;
    }
    public function getSource()
    {
        return 'visa_order';
    }



}
