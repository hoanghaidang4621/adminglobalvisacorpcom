<?php

namespace GlobalVisa\Models;

class NewGovernmentFee extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     * @Primary
     * @Column(type="integer", length=10, nullable=false)
     */
    protected $fee_visatype_id;

    /**
     *
     * @var string
     * @Primary
     * @Column(type="string", length=5, nullable=false)
     */
    protected $fee_country_code;

    /**
     *
     * @var double
     * @Column(type="double", nullable=false)
     */
    protected $fee_value;

    /**
     *
     * @var string
     * @Column(type="string", length=255, nullable=true)
     */
    protected $fee_note;

    /**
     * Method to set the value of field fee_visatype_id
     *
     * @param integer $fee_visatype_id
     * @return $this
     */
    public function setFeeVisatypeId($fee_visatype_id)
    {
        $this->fee_visatype_id = $fee_visatype_id;

        return $this;
    }

    /**
     * Method to set the value of field fee_country_code
     *
     * @param string $fee_country_code
     * @return $this
     */
    public function setFeeCountryCode($fee_country_code)
    {
        $this->fee_country_code = $fee_country_code;

        return $this;
    }

    /**
     * Method to set the value of field fee_value
     *
     * @param double $fee_value
     * @return $this
     */
    public function setFeeValue($fee_value)
    {
        $this->fee_value = $fee_value;

        return $this;
    }

    /**
     * Method to set the value of field fee_note
     *
     * @param string $fee_note
     * @return $this
     */
    public function setFeeNote($fee_note)
    {
        $this->fee_note = $fee_note;

        return $this;
    }

    /**
     * Returns the value of field fee_visatype_id
     *
     * @return integer
     */
    public function getFeeVisatypeId()
    {
        return $this->fee_visatype_id;
    }

    /**
     * Returns the value of field fee_country_code
     *
     * @return string
     */
    public function getFeeCountryCode()
    {
        return $this->fee_country_code;
    }

    /**
     * Returns the value of field fee_value
     *
     * @return double
     */
    public function getFeeValue()
    {
        return $this->fee_value;
    }

    /**
     * Returns the value of field fee_note
     *
     * @return string
     */
    public function getFeeNote()
    {
        return $this->fee_note;
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
        return 'new_government_fee';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return NewGovernmentFee[]|NewGovernmentFee
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return NewGovernmentFee
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
