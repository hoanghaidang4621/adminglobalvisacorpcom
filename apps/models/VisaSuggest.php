<?php

namespace GlobalVisa\Models;

class VisaSuggest extends BaseModel
{

    /**
     *
     * @var integer
     * @Primary
     * @Identity
     * @Column(type="integer", length=10, nullable=false)
     */
    protected $sug_id;

    /**
     *
     * @var string
     * @Column(type="string", length=255, nullable=true)
     */
    protected $sug_name;

    /**
     *
     * @var integer
     * @Column(type="integer", length=10, nullable=false)
     */
    protected $sug_count;

    /**
     * Method to set the value of field sug_id
     *
     * @param integer $sug_id
     * @return $this
     */
    public function setSugId($sug_id)
    {
        $this->sug_id = $sug_id;

        return $this;
    }

    /**
     * Method to set the value of field sug_name
     *
     * @param string $sug_name
     * @return $this
     */
    public function setSugName($sug_name)
    {
        $this->sug_name = $sug_name;

        return $this;
    }

    /**
     * Method to set the value of field sug_count
     *
     * @param integer $sug_count
     * @return $this
     */
    public function setSugCount($sug_count)
    {
        $this->sug_count = $sug_count;

        return $this;
    }

    /**
     * Returns the value of field sug_id
     *
     * @return integer
     */
    public function getSugId()
    {
        return $this->sug_id;
    }

    /**
     * Returns the value of field sug_name
     *
     * @return string
     */
    public function getSugName()
    {
        return $this->sug_name;
    }

    /**
     * Returns the value of field sug_count
     *
     * @return integer
     */
    public function getSugCount()
    {
        return $this->sug_count;
    }

    /**
     * Initialize method for model.
     */
//    public function initialize()
//    {
//        $this->setSchema("indianim");
//    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'visa_suggest';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return VisaSuggest[]|VisaSuggest
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return VisaSuggest
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
