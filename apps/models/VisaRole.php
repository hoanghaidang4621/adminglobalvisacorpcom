<?php

namespace GlobalVisa\Models;

class VisaRole extends BaseModel
{

    /**
     *
     * @var integer
     */
    protected $role_id;

    /**
     *
     * @var string
     */
    protected $role_name;

    /**
     *
     * @var string
     */
    protected $role_actions;

    /**
     *
     * @var string
     */
    protected $role_function;

    /**
     *
     * @var string
     */
    protected $role_active;

    /**
     * Method to set the value of field role_id
     *
     * @param integer $role_id
     * @return $this
     */
    public function setRoleId($role_id)
    {
        $this->role_id = $role_id;

        return $this;
    }

    /**
     * Method to set the value of field role_name
     *
     * @param string $role_name
     * @return $this
     */
    public function setRoleName($role_name)
    {
        $this->role_name = $role_name;

        return $this;
    }

    /**
     * Method to set the value of field role_actions
     *
     * @param string $role_actions
     * @return $this
     */
    public function setRoleActions($role_actions)
    {
        $this->role_actions = $role_actions;

        return $this;
    }

    /**
     * Method to set the value of field role_function
     *
     * @param string $role_function
     * @return $this
     */
    public function setRoleFunction($role_function)
    {
        $this->role_function = $role_function;

        return $this;
    }

    /**
     * Method to set the value of field role_active
     *
     * @param string $role_active
     * @return $this
     */
    public function setRoleActive($role_active)
    {
        $this->role_active = $role_active;

        return $this;
    }

    /**
     * Returns the value of field role_id
     *
     * @return integer
     */
    public function getRoleId()
    {
        return $this->role_id;
    }

    /**
     * Returns the value of field role_name
     *
     * @return string
     */
    public function getRoleName()
    {
        return $this->role_name;
    }

    /**
     * Returns the value of field role_function
     *
     * @return string
     */
    public function getRoleFunction()
    {
        return $this->role_function;
    }

    /**
     * Returns the value of field role_actions
     *
     * @return string
     */
    public function getRoleActions()
    {
        return $this->role_actions;
    }


    /**
     * Returns the value of field role_active
     *
     * @return string
     */
    public function getRoleActive()
    {
        return $this->role_active;
    }

    public function getSource()
    {
        return 'visa_role';
    }
    public static function getFirstLoginById($name){
        return self::findFirst(array(
            'role_name = :role_name: AND role_active="Y"',
            'bind' => array('role_name' => $name)
        ));
    }
}
