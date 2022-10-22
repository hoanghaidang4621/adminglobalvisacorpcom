<?php

namespace GlobalVisa\Models;

class VisaPromotion extends BaseModel
{

    /**
     *
     * @var integer
     */
    protected $promotion_id;

    /**
     *
     * @var string
     */
    protected $promotion_code;

    /**
     *
     * @var integer
     */
    protected $promotion_startdate;

    /**
     *
     * @var integer
     */
    protected $promotion_enddate;

    /**
     *
     * @var double
     */
    protected $promotion_percent;

    /**
     * Method to set the value of field promotion_id
     *
     * @param integer $promotion_id
     * @return $this
     */
    public function setPromotionId($promotion_id)
    {
        $this->promotion_id = $promotion_id;

        return $this;
    }

    /**
     * Method to set the value of field promotion_code
     *
     * @param string $promotion_code
     * @return $this
     */
    public function setPromotionCode($promotion_code)
    {
        $this->promotion_code = $promotion_code;

        return $this;
    }

    /**
     * Method to set the value of field promotion_startdate
     *
     * @param integer $promotion_startdate
     * @return $this
     */
    public function setPromotionStartdate($promotion_startdate)
    {
        $this->promotion_startdate = $promotion_startdate;

        return $this;
    }

    /**
     * Method to set the value of field promotion_enddate
     *
     * @param integer $promotion_enddate
     * @return $this
     */
    public function setPromotionEnddate($promotion_enddate)
    {
        $this->promotion_enddate = $promotion_enddate;

        return $this;
    }

    /**
     * Method to set the value of field promotion_percent
     *
     * @param double $promotion_percent
     * @return $this
     */
    public function setPromotionPercent($promotion_percent)
    {
        $this->promotion_percent = $promotion_percent;

        return $this;
    }

    /**
     * Returns the value of field promotion_id
     *
     * @return integer
     */
    public function getPromotionId()
    {
        return $this->promotion_id;
    }

    /**
     * Returns the value of field promotion_code
     *
     * @return string
     */
    public function getPromotionCode()
    {
        return $this->promotion_code;
    }

    /**
     * Returns the value of field promotion_startdate
     *
     * @return integer
     */
    public function getPromotionStartdate()
    {
        return $this->promotion_startdate;
    }

    /**
     * Returns the value of field promotion_enddate
     *
     * @return integer
     */
    public function getPromotionEnddate()
    {
        return $this->promotion_enddate;
    }

    /**
     * Returns the value of field promotion_percent
     *
     * @return double
     */
    public function getPromotionPercent()
    {
        return $this->promotion_percent;
    }

    public function getSource()
    {
        return 'visa_promotion';
    }

}
