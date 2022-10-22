<?php

namespace GlobalVisa\Models;

class VisaHoliday extends BaseModel
{

    /**
     *
     * @var integer
     */
    protected $holiday_id;

    /**
     *
     * @var integer
     */
    protected $holiday_date;

    /**
     *
     * @var integer
     */
    protected $holiday_arrival_country_id;

    /**
     * Method to set the value of field holiday_id
     *
     * @param integer $holiday_id
     * @return $this
     */
    public function setHolidayId($holiday_id)
    {
        $this->holiday_id = $holiday_id;

        return $this;
    }

    /**
     * Method to set the value of field holiday_date
     *
     * @param integer $holiday_date
     * @return $this
     */
    public function setHolidayDate($holiday_date)
    {
        $this->holiday_date = $holiday_date;

        return $this;
    }

    /**
     * Method to set the value of field holiday_arrival_country_id
     *
     * @param integer $holiday_arrival_country_id
     * @return $this
     */
    public function setHolidayArrivalCountryId($holiday_arrival_country_id)
    {
        $this->holiday_arrival_country_id = $holiday_arrival_country_id;

        return $this;
    }

    /**
     * Returns the value of field holiday_id
     *
     * @return integer
     */
    public function getHolidayId()
    {
        return $this->holiday_id;
    }

    /**
     * Returns the value of field holiday_date
     *
     * @return integer
     */
    public function getHolidayDate()
    {
        return $this->holiday_date;
    }

    /**
     * Returns the value of field holiday_arrival_country_id
     *
     * @return integer
     */
    public function getHolidayArrivalCountryId()
    {
        return $this->holiday_arrival_country_id;
    }

    public function getSource()
    {
        return 'visa_holiday';
    }

}
