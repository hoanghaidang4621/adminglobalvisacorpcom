<?php

namespace GlobalVisa\Models;

class NewGroupExtraService extends BaseModel
{

    /**
     *
     * @var integer
     * @Primary
     * @Identity
     * @Column(type="integer", length=11, nullable=false)
     */
    protected $group_id;

    /**
     *
     * @var integer
     * @Column(type="integer", length=11, nullable=false)
     */
    protected $group_arrival_id;

    /**
     *
     * @var string
     * @Column(type="string", length=255, nullable=false)
     */
    protected $group_name;

    /**
     *
     * @var string
     * @Column(type="string", nullable=true)
     */
    protected $group_description;

    /**
     *
     * @var integer
     * @Column(type="integer", length=11, nullable=false)
     */
    protected $group_order;

    /**
     *
     * @var string
     * @Column(type="string", nullable=false)
     */
    protected $group_active;

    /**
     * Method to set the value of field group_id
     *
     * @param integer $group_id
     * @return $this
     */
    public function setGroupId($group_id)
    {
        $this->group_id = $group_id;

        return $this;
    }

    /**
     * Method to set the value of field group_arrival_id
     *
     * @param integer $group_arrival_id
     * @return $this
     */
    public function setGroupArrivalId($group_arrival_id)
    {
        $this->group_arrival_id = $group_arrival_id;

        return $this;
    }

    /**
     * Method to set the value of field group_name
     *
     * @param string $group_name
     * @return $this
     */
    public function setGroupName($group_name)
    {
        $this->group_name = $group_name;

        return $this;
    }

    /**
     * Method to set the value of field group_description
     *
     * @param string $group_description
     * @return $this
     */
    public function setGroupDescription($group_description)
    {
        $this->group_description = $group_description;

        return $this;
    }

    /**
     * Method to set the value of field group_order
     *
     * @param integer $group_order
     * @return $this
     */
    public function setGroupOrder($group_order)
    {
        $this->group_order = $group_order;

        return $this;
    }

    /**
     * Method to set the value of field group_active
     *
     * @param string $group_active
     * @return $this
     */
    public function setGroupActive($group_active)
    {
        $this->group_active = $group_active;

        return $this;
    }

    /**
     * Returns the value of field group_id
     *
     * @return integer
     */
    public function getGroupId()
    {
        return $this->group_id;
    }

    /**
     * Returns the value of field group_arrival_id
     *
     * @return integer
     */
    public function getGroupArrivalId()
    {
        return $this->group_arrival_id;
    }

    /**
     * Returns the value of field group_name
     *
     * @return string
     */
    public function getGroupName()
    {
        return $this->group_name;
    }

    /**
     * Returns the value of field group_description
     *
     * @return string
     */
    public function getGroupDescription()
    {
        return $this->group_description;
    }

    /**
     * Returns the value of field group_order
     *
     * @return integer
     */
    public function getGroupOrder()
    {
        return $this->group_order;
    }

    /**
     * Returns the value of field group_active
     *
     * @return string
     */
    public function getGroupActive()
    {
        return $this->group_active;
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
        return 'new_group_extra_service';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return NewGroupExtraService[]|NewGroupExtraService
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return NewGroupExtraService
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
