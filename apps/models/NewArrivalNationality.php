<?php

namespace GlobalVisa\Models;

class NewArrivalNationality extends BaseModel
{

    /**
     *
     * @var integer
     * @Primary
     * @Identity
     * @Column(type="integer", length=11, nullable=false)
     */
    protected $nationality_id;

    /**
     *
     * @var integer
     * @Column(type="integer", length=11, nullable=false)
     */
    protected $nationality_arrival_id;

    /**
     *
     * @var string
     * @Column(type="string", length=5, nullable=false)
     */
    protected $nationality_country_code;

    /**
     * Method to set the value of field nationality_id
     *
     * @param integer $nationality_id
     * @return $this
     */
    public function setNationalityId($nationality_id)
    {
        $this->nationality_id = $nationality_id;

        return $this;
    }

    /**
     * Method to set the value of field nationality_arrival_id
     *
     * @param integer $nationality_arrival_id
     * @return $this
     */
    public function setNationalityArrivalId($nationality_arrival_id)
    {
        $this->nationality_arrival_id = $nationality_arrival_id;

        return $this;
    }

    /**
     * Method to set the value of field nationality_country_code
     *
     * @param string $nationality_country_code
     * @return $this
     */
    public function setNationalityCountryCode($nationality_country_code)
    {
        $this->nationality_country_code = $nationality_country_code;

        return $this;
    }

    /**
     * Returns the value of field nationality_id
     *
     * @return integer
     */
    public function getNationalityId()
    {
        return $this->nationality_id;
    }

    /**
     * Returns the value of field nationality_arrival_id
     *
     * @return integer
     */
    public function getNationalityArrivalId()
    {
        return $this->nationality_arrival_id;
    }

    /**
     * Returns the value of field nationality_country_code
     *
     * @return string
     */
    public function getNationalityCountryCode()
    {
        return $this->nationality_country_code;
    }

    /**
     * Initialize method for model.
     */
//    public function initialize()
//    {
//        $this->setSchema("globalvisacorp_com_v2");
//    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'new_arrival_nationality';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return NewArrivalNationality[]|NewArrivalNationality
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return NewArrivalNationality
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
