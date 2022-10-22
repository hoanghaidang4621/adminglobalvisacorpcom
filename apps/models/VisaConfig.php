<?php

namespace GlobalVisa\Models;
use Phalcon\Db\RawValue;
class VisaConfig extends BaseModel
{
    /**
     *
     * @var string
     */
    protected $config_key;

    /**
     *
     * @var string
     */
    protected $config_content;

    /**
     * Method to set the value of field config_key
     *
     * @param string $config_key
     * @return $this
     */
    public function setConfigKey($config_key)
    {
        $this->config_key = $config_key;

        return $this;
    }

    /**
     * Method to set the value of field config_content
     *
     * @param string $config_content
     * @return $this
     */
    public function setConfigContent($config_content)
    {
        $this->config_content = $config_content;

        return $this;
    }

    /**
     * Returns the value of field config_key
     *
     * @return string
     */
    public function getConfigKey()
    {
        return $this->config_key;
    }

    /**
     * Returns the value of field config_content
     *
     * @return string
     */
    public function getConfigContent()
    {
        return $this->config_content;
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'visa_config';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return VisaConfig[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }
    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return VisaConfig
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }
    public function beforeValidation()
    {
        if (empty($this->config_key)) {
            $this->config_key = new RawValue('\'\'');
        }
        if (empty($this->config_content)) {
            $this->config_content = new RawValue('\'\'');
        }
    }

}
