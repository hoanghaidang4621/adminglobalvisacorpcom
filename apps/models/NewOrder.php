<?php

namespace GlobalVisa\Models;

class NewOrder extends \Phalcon\Mvc\Model
{
    const STATUS_SUCCESS = 'Success';
    const STATUS_FAIL = 'Fail';
    const STATUS_PENDING = 'Pending';
    const STATUS_CANCEL = 'Cancel';

//    public function initialize()
//    {
//        $this->belongsTo(
//            'order_arrival_country_id', "GlobalVisa\Models\NewArrival", "arrival_id",
//            array('alias' => 'arrivalCountry')
//        );
//
//    }
    /**
     *
     * @var integer
     * @Primary
     * @Identity
     * @Column(type="integer", length=20, nullable=false)
     */
    protected $order_id;

    /**
     *
     * @var integer
     * @Column(type="integer", length=20, nullable=false)
     */
    protected $order_user_id;

    /**
     *
     * @var integer
     * @Column(type="integer", length=11, nullable=false)
     */
    protected $order_arrival_id;

    /**
     *
     * @var integer
     * @Column(type="integer", length=11, nullable=false)
     */
    protected $order_group_id;

    /**
     *
     * @var integer
     * @Column(type="integer", length=11, nullable=true)
     */
    protected $order_arrival_port_type_id;

    /**
     *
     * @var integer
     * @Column(type="integer", length=11, nullable=true)
     */
    protected $order_arrival_port_id;

    /**
     *
     * @var integer
     * @Column(type="integer", length=11, nullable=false)
     */
    protected $order_departure_port_id;

    /**
     *
     * @var integer
     * @Column(type="integer", length=11, nullable=false)
     */
    protected $order_arrival_date;

    /**
     *
     * @var integer
     * @Column(type="integer", length=11, nullable=false)
     */
    protected $order_exit_date;

    /**
     *
     * @var integer
     * @Column(type="integer", length=11, nullable=false)
     */
    protected $order_register_date;

    /**
     *
     * @var string
     * @Column(type="string", nullable=true)
     */
    protected $order_special_request;

    /**
     *
     * @var string
     * @Column(type="string", length=255, nullable=true)
     */
    protected $order_flight_number;

    /**
     *
     * @var string
     * @Column(type="string", length=255, nullable=true)
     */
    protected $order_arrival_time;

    /**
     *
     * @var double
     * @Column(type="double", nullable=false)
     */
    protected $order_total;

    /**
     *
     * @var string
     * @Column(type="string", nullable=false)
     */
    protected $order_status;

    /**
     *
     * @var integer
     * @Column(type="integer", length=11, nullable=false)
     */
    protected $order_group_value;

    /**
     *
     * @var string
     * @Column(type="string", nullable=true)
     */
    protected $order_payment_method;

    /**
     *
     * @var string
     * @Column(type="string", length=255, nullable=true)
     */
    protected $order_cardtype;

    /**
     *
     * @var string
     * @Column(type="string", nullable=true)
     */
    protected $order_isenrolled3d;

    /**
     *
     * @var string
     * @Column(type="string", nullable=true)
     */
    protected $order_ispassed3d;

    /**
     *
     * @var string
     * @Column(type="string", nullable=true)
     */
    protected $order_fail_reason;

    /**
     *
     * @var integer
     * @Column(type="integer", length=11, nullable=true)
     */
    protected $order_email_time;

    /**
     *
     * @var string
     * @Column(type="string", length=255, nullable=true)
     */
    protected $order_user_disnote;

    /**
     *
     * @var double
     * @Column(type="double", nullable=true)
     */
    protected $order_user_disrate;

    /**
     *
     * @var double
     * @Column(type="double", nullable=true)
     */
    protected $order_user_discount;

    /**
     *
     * @var integer
     * @Column(type="integer", length=11, nullable=true)
     */
    protected $order_applyvisa_from;

    /**
     *
     * @var integer
     * @Column(type="integer", length=11, nullable=true)
     */
    protected $order_mission;

    /**
     *
     * @var double
     * @Column(type="double", nullable=true)
     */
    protected $order_promotion_percent;

    /**
     *
     * @var string
     * @Column(type="string", length=255, nullable=true)
     */
    protected $order_promotion_code;

    /**
     *
     * @var double
     * @Column(type="double", nullable=true)
     */
    protected $order_promotion_price;

    /**
     *
     * @var string
     * @Column(type="string", length=3, nullable=true)
     */
    protected $order_currency;

    /**
     *
     * @var double
     * @Column(type="double", nullable=true)
     */
    protected $order_exrate;

    /**
     *
     * @var integer
     * @Column(type="integer", length=11, nullable=true)
     */
    protected $order_exrate_date;

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
     * Method to set the value of field order_arrival_id
     *
     * @param integer $order_arrival_id
     * @return $this
     */
    public function setOrderArrivalId($order_arrival_id)
    {
        $this->order_arrival_id = $order_arrival_id;

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
     * Method to set the value of field order_arrival_port_type_id
     *
     * @param integer $order_arrival_port_type_id
     * @return $this
     */
    public function setOrderArrivalPortTypeId($order_arrival_port_type_id)
    {
        $this->order_arrival_port_type_id = $order_arrival_port_type_id;

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
     * Method to set the value of field order_departure_port_id
     *
     * @param integer $order_departure_port_id
     * @return $this
     */
    public function setOrderDeparturePortId($order_departure_port_id)
    {
        $this->order_departure_port_id = $order_departure_port_id;

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
     * Method to set the value of field order_user_discount
     *
     * @param double $order_user_discount
     * @return $this
     */
    public function setOrderUserDiscount($order_user_discount)
    {
        $this->order_user_discount = $order_user_discount;

        return $this;
    }

    /**
     * Method to set the value of field order_applyvisa_from
     *
     * @param integer $order_applyvisa_from
     * @return $this
     */
    public function setOrderApplyvisaFrom($order_applyvisa_from)
    {
        $this->order_applyvisa_from = $order_applyvisa_from;

        return $this;
    }

    /**
     * Method to set the value of field order_mission
     *
     * @param integer $order_mission
     * @return $this
     */
    public function setOrderMission($order_mission)
    {
        $this->order_mission = $order_mission;

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
     * Method to set the value of field order_promotion_price
     *
     * @param double $order_promotion_price
     * @return $this
     */
    public function setOrderPromotionPrice($order_promotion_price)
    {
        $this->order_promotion_price = $order_promotion_price;

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
     * Returns the value of field order_arrival_id
     *
     * @return integer
     */
    public function getOrderArrivalId()
    {
        return $this->order_arrival_id;
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
     * Returns the value of field order_arrival_port_type_id
     *
     * @return integer
     */
    public function getOrderArrivalPortTypeId()
    {
        return $this->order_arrival_port_type_id;
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
     * Returns the value of field order_departure_port_id
     *
     * @return integer
     */
    public function getOrderDeparturePortId()
    {
        return $this->order_departure_port_id;
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
     * Returns the value of field order_group_value
     *
     * @return integer
     */
    public function getOrderGroupValue()
    {
        return $this->order_group_value;
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
     * Returns the value of field order_email_time
     *
     * @return integer
     */
    public function getOrderEmailTime()
    {
        return $this->order_email_time;
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
     * Returns the value of field order_user_discount
     *
     * @return double
     */
    public function getOrderUserDiscount()
    {
        return $this->order_user_discount;
    }

    /**
     * Returns the value of field order_applyvisa_from
     *
     * @return integer
     */
    public function getOrderApplyvisaFrom()
    {
        return $this->order_applyvisa_from;
    }

    /**
     * Returns the value of field order_mission
     *
     * @return integer
     */
    public function getOrderMission()
    {
        return $this->order_mission;
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
     * Returns the value of field order_promotion_price
     *
     * @return double
     */
    public function getOrderPromotionPrice()
    {
        return $this->order_promotion_price;
    }

    /**
     * Returns the value of field order_currency
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

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSchema("globalvisacorp_com_v2");
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'new_order';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return NewOrder[]|NewOrder
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return NewOrder
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
