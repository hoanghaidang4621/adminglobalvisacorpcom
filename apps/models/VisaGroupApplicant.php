<?php

namespace GlobalVisa\Models;

class VisaGroupApplicant extends BaseModel
{

    /**
     *
     * @var integer
     */
    protected $group_id;

    /**
     *
     * @var string
     */
    protected $group_name;

    /**
     *
     * @var integer
     */
    protected $group_value;

    /**
     *
     * @var integer
     */
    protected $group_order;

    /**
     *
     * @var string
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
     * Method to set the value of field group_value
     *
     * @param integer $group_value
     * @return $this
     */
    public function setGroupValue($group_value)
    {
        $this->group_value = $group_value;

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
     * Returns the value of field group_name
     *
     * @return string
     */
    public function getGroupName()
    {
        return $this->group_name;
    }

    /**
     * Returns the value of field group_value
     *
     * @return integer
     */
    public function getGroupValue()
    {
        return $this->group_value;
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

    public function getSource()
    {
        return 'visa_group_applicant';
    }

}
