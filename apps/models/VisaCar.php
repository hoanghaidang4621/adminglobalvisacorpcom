<?php

namespace GlobalVisa\Models;

class VisaCar extends BaseModel
{

    /**
     *
     * @var integer
     */
    protected $car_id;

    /**
     *
     * @var string
     */
    protected $car_name;

    /**
     *
     * @var integer
     */
    protected $car_order;

    /**
     *
     * @var string
     */
    protected $car_active;

    /**
     * Method to set the value of field car_id
     *
     * @param integer $car_id
     * @return $this
     */
    public function setCarId($car_id)
    {
        $this->car_id = $car_id;

        return $this;
    }

    /**
     * Method to set the value of field car_name
     *
     * @param string $car_name
     * @return $this
     */
    public function setCarName($car_name)
    {
        $this->car_name = $car_name;

        return $this;
    }

    /**
     * Method to set the value of field car_order
     *
     * @param integer $car_order
     * @return $this
     */
    public function setCarOrder($car_order)
    {
        $this->car_order = $car_order;

        return $this;
    }

    /**
     * Method to set the value of field car_active
     *
     * @param string $car_active
     * @return $this
     */
    public function setCarActive($car_active)
    {
        $this->car_active = $car_active;

        return $this;
    }

    /**
     * Returns the value of field car_id
     *
     * @return integer
     */
    public function getCarId()
    {
        return $this->car_id;
    }

    /**
     * Returns the value of field car_name
     *
     * @return string
     */
    public function getCarName()
    {
        return $this->car_name;
    }

    /**
     * Returns the value of field car_order
     *
     * @return integer
     */
    public function getCarOrder()
    {
        return $this->car_order;
    }

    /**
     * Returns the value of field car_active
     *
     * @return string
     */
    public function getCarActive()
    {
        return $this->car_active;
    }

    public function getSource()
    {
        return 'visa_car';
    }

}
