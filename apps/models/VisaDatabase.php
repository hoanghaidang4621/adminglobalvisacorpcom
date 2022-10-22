<?php

namespace GlobalVisa\Models;

class VisaDatabase extends BaseModel
{

    /**
     *
     * @var integer
     */
    protected $database_id;

    /**
     *
     * @var string
     */
    protected $database_host;

    /**
     *
     * @var string
     */
    protected $database_user;

    /**
     *
     * @var string
     */
    protected $database_pass;

    /**
     *
     * @var string
     */
    protected $database_name;

    /**
     *
     * @var integer
     */
    protected $database_site_id;

    /**
     *
     * @var string
     */
    protected $database_active;

    /**
     * Method to set the value of field database_id
     *
     * @param integer $database_id
     * @return $this
     */
    public function setDatabaseId($database_id)
    {
        $this->database_id = $database_id;

        return $this;
    }

    /**
     * Method to set the value of field database_host
     *
     * @param string $database_host
     * @return $this
     */
    public function setDatabaseHost($database_host)
    {
        $this->database_host = $database_host;

        return $this;
    }

    /**
     * Method to set the value of field database_user
     *
     * @param string $database_user
     * @return $this
     */
    public function setDatabaseUser($database_user)
    {
        $this->database_user = $database_user;

        return $this;
    }

    /**
     * Method to set the value of field database_pass
     *
     * @param string $database_pass
     * @return $this
     */
    public function setDatabasePass($database_pass)
    {
        $this->database_pass = $database_pass;

        return $this;
    }

    /**
     * Method to set the value of field database_name
     *
     * @param string $database_name
     * @return $this
     */
    public function setDatabaseName($database_name)
    {
        $this->database_name = $database_name;

        return $this;
    }

    /**
     * Method to set the value of field database_site_id
     *
     * @param integer $database_site_id
     * @return $this
     */
    public function setDatabaseSiteId($database_site_id)
    {
        $this->database_site_id = $database_site_id;

        return $this;
    }

    /**
     * Method to set the value of field database_active
     *
     * @param string $database_active
     * @return $this
     */
    public function setDatabaseActive($database_active)
    {
        $this->database_active = $database_active;

        return $this;
    }

    /**
     * Returns the value of field database_id
     *
     * @return integer
     */
    public function getDatabaseId()
    {
        return $this->database_id;
    }

    /**
     * Returns the value of field database_host
     *
     * @return string
     */
    public function getDatabaseHost()
    {
        return $this->database_host;
    }

    /**
     * Returns the value of field database_user
     *
     * @return string
     */
    public function getDatabaseUser()
    {
        return $this->database_user;
    }

    /**
     * Returns the value of field database_pass
     *
     * @return string
     */
    public function getDatabasePass()
    {
        return $this->database_pass;
    }

    /**
     * Returns the value of field database_name
     *
     * @return string
     */
    public function getDatabaseName()
    {
        return $this->database_name;
    }

    /**
     * Returns the value of field database_site_id
     *
     * @return integer
     */
    public function getDatabaseSiteId()
    {
        return $this->database_site_id;
    }

    /**
     * Returns the value of field database_active
     *
     * @return string
     */
    public function getDatabaseActive()
    {
        return $this->database_active;
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'visa_database';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return VisaDatabase[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return VisaDatabase
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }



}
