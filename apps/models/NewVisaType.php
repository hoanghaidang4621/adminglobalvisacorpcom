<?php

namespace GlobalVisa\Models;

class NewVisaType extends BaseModel
{

    /**
     *
     * @var integer
     * @Primary
     * @Identity
     * @Column(type="integer", length=11, nullable=false)
     */
    protected $type_id;

    /**
     *
     * @var string
     * @Column(type="string", length=255, nullable=false)
     */
    protected $type_group_name;

    /**
     *
     * @var string
     * @Column(type="string", length=255, nullable=false)
     */
    protected $type_name;

    /**
     *
     * @var integer
     * @Column(type="integer", length=11, nullable=false)
     */
    protected $type_arrival_id;

    /**
     *
     * @var string
     * @Column(type="string", nullable=false)
     */
    protected $type_description;

    /**
     *
     * @var string
     * @Column(type="string", nullable=true)
     */
    protected $type_document_requirement;

    /**
     *
     * @var integer
     * @Column(type="integer", length=11, nullable=true)
     */
    protected $type_order;

    /**
     *
     * @var string
     * @Column(type="string", nullable=false)
     */
    protected $type_active;

    /**
     * Method to set the value of field type_id
     *
     * @param integer $type_id
     * @return $this
     */
    public function setTypeId($type_id)
    {
        $this->type_id = $type_id;

        return $this;
    }

    /**
     * Method to set the value of field type_group_name
     *
     * @param string $type_group_name
     * @return $this
     */
    public function setTypeGroupName($type_group_name)
    {
        $this->type_group_name = $type_group_name;

        return $this;
    }

    /**
     * Method to set the value of field type_name
     *
     * @param string $type_name
     * @return $this
     */
    public function setTypeName($type_name)
    {
        $this->type_name = $type_name;

        return $this;
    }

    /**
     * Method to set the value of field type_arrival_id
     *
     * @param integer $type_arrival_id
     * @return $this
     */
    public function setTypeArrivalId($type_arrival_id)
    {
        $this->type_arrival_id = $type_arrival_id;

        return $this;
    }

    /**
     * Method to set the value of field type_description
     *
     * @param string $type_description
     * @return $this
     */
    public function setTypeDescription($type_description)
    {
        $this->type_description = $type_description;

        return $this;
    }

    /**
     * Method to set the value of field type_document_requirement
     *
     * @param string $type_document_requirement
     * @return $this
     */
    public function setTypeDocumentRequirement($type_document_requirement)
    {
        $this->type_document_requirement = $type_document_requirement;

        return $this;
    }

    /**
     * Method to set the value of field type_order
     *
     * @param integer $type_order
     * @return $this
     */
    public function setTypeOrder($type_order)
    {
        $this->type_order = $type_order;

        return $this;
    }

    /**
     * Method to set the value of field type_active
     *
     * @param string $type_active
     * @return $this
     */
    public function setTypeActive($type_active)
    {
        $this->type_active = $type_active;

        return $this;
    }

    /**
     * Returns the value of field type_id
     *
     * @return integer
     */
    public function getTypeId()
    {
        return $this->type_id;
    }

    /**
     * Returns the value of field type_group_name
     *
     * @return string
     */
    public function getTypeGroupName()
    {
        return $this->type_group_name;
    }

    /**
     * Returns the value of field type_name
     *
     * @return string
     */
    public function getTypeName()
    {
        return $this->type_name;
    }

    /**
     * Returns the value of field type_arrival_id
     *
     * @return integer
     */
    public function getTypeArrivalId()
    {
        return $this->type_arrival_id;
    }

    /**
     * Returns the value of field type_description
     *
     * @return string
     */
    public function getTypeDescription()
    {
        return $this->type_description;
    }

    /**
     * Returns the value of field type_document_requirement
     *
     * @return string
     */
    public function getTypeDocumentRequirement()
    {
        return $this->type_document_requirement;
    }

    /**
     * Returns the value of field type_order
     *
     * @return integer
     */
    public function getTypeOrder()
    {
        return $this->type_order;
    }

    /**
     * Returns the value of field type_active
     *
     * @return string
     */
    public function getTypeActive()
    {
        return $this->type_active;
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
        return 'new_visa_type';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return NewVisaType[]|NewVisaType
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return NewVisaType
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
