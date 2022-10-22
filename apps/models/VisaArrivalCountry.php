<?php

namespace GlobalVisa\Models;

class VisaArrivalCountry extends BaseModel
{

    /**
     *
     * @var integer
     */
    protected $arrival_country_id;

    /**
     *
     * @var string
     */
    protected $arrival_country_name;

    /**
     *
     * @var integer
     */
    protected $arrival_country_order;

    /**
     *
     * @var string
     */
    protected $arrival_country_active;

    /**
     *
     * @var string
     */
    protected $arrival_country_keyword;

    /**
     *
     * @var string
     */
    protected $arrival_country_logo;

    /**
     *
     * @var double
     */
    protected $arrival_country_timezone;

    /**
     *
     * @var string
     */
    protected $arrival_country_show_ports;

    /**
     *
     * @var string
     */
    protected $arrival_country_show_port_type;

    /**
     *
     * @var string
     */
    protected $arrival_country_port_type_description;

    /**
     *
     * @var string
     */
    protected $arrival_country_show_purpose;

    /**
     *
     * @var string
     */
    protected $arrival_country_has_extra_mail;

    /**
     *
     * @var string
     */
    protected $arrival_country_has_extra_mail_attachment;

    /**
     *
     * @var string
     */
    protected $arrival_title;

    /**
     *
     * @var string
     */
    protected $arrival_meta_keyword;

    /**
     *
     * @var string
     */
    protected $arrival_meta_description;

    /**
     *
     * @var string
     */
    protected $arrival_disclaimers;

    /**
     * Method to set the value of field arrival_country_id
     *
     * @param integer $arrival_country_id
     * @return $this
     */
    public function setArrivalCountryId($arrival_country_id)
    {
        $this->arrival_country_id = $arrival_country_id;

        return $this;
    }

    /**
     * Method to set the value of field arrival_country_name
     *
     * @param string $arrival_country_name
     * @return $this
     */
    public function setArrivalCountryName($arrival_country_name)
    {
        $this->arrival_country_name = $arrival_country_name;

        return $this;
    }

    /**
     * Method to set the value of field arrival_country_order
     *
     * @param integer $arrival_country_order
     * @return $this
     */
    public function setArrivalCountryOrder($arrival_country_order)
    {
        $this->arrival_country_order = $arrival_country_order;

        return $this;
    }

    /**
     * Method to set the value of field arrival_country_active
     *
     * @param string $arrival_country_active
     * @return $this
     */
    public function setArrivalCountryActive($arrival_country_active)
    {
        $this->arrival_country_active = $arrival_country_active;

        return $this;
    }

    /**
     * Method to set the value of field arrival_country_keyword
     *
     * @param string $arrival_country_keyword
     * @return $this
     */
    public function setArrivalCountryKeyword($arrival_country_keyword)
    {
        $this->arrival_country_keyword = $arrival_country_keyword;

        return $this;
    }

    /**
     * Method to set the value of field arrival_country_logo
     *
     * @param string $arrival_country_logo
     * @return $this
     */
    public function setArrivalCountryLogo($arrival_country_logo)
    {
        $this->arrival_country_logo = $arrival_country_logo;

        return $this;
    }

    /**
     * Method to set the value of field arrival_country_timezone
     *
     * @param double $arrival_country_timezone
     * @return $this
     */
    public function setArrivalCountryTimezone($arrival_country_timezone)
    {
        $this->arrival_country_timezone = $arrival_country_timezone;

        return $this;
    }

    /**
     * Method to set the value of field arrival_country_show_ports
     *
     * @param string $arrival_country_show_ports
     * @return $this
     */
    public function setArrivalCountryShowPorts($arrival_country_show_ports)
    {
        $this->arrival_country_show_ports = $arrival_country_show_ports;

        return $this;
    }

    /**
     * Method to set the value of field arrival_country_show_port_type
     *
     * @param string $arrival_country_show_port_type
     * @return $this
     */
    public function setArrivalCountryShowPortType($arrival_country_show_port_type)
    {
        $this->arrival_country_show_port_type = $arrival_country_show_port_type;

        return $this;
    }

    /**
     * Method to set the value of field arrival_country_port_type_description
     *
     * @param string $arrival_country_port_type_description
     * @return $this
     */
    public function setArrivalCountryPortTypeDescription($arrival_country_port_type_description)
    {
        $this->arrival_country_port_type_description = $arrival_country_port_type_description;

        return $this;
    }

    /**
     * Method to set the value of field arrival_country_show_purpose
     *
     * @param string $arrival_country_show_purpose
     * @return $this
     */
    public function setArrivalCountryShowPurpose($arrival_country_show_purpose)
    {
        $this->arrival_country_show_purpose = $arrival_country_show_purpose;

        return $this;
    }

    /**
     * Method to set the value of field arrival_country_has_extra_mail
     *
     * @param string $arrival_country_has_extra_mail
     * @return $this
     */
    public function setArrivalCountryHasExtraMail($arrival_country_has_extra_mail)
    {
        $this->arrival_country_has_extra_mail = $arrival_country_has_extra_mail;

        return $this;
    }

    /**
     * Method to set the value of field arrival_country_has_extra_mail_attachment
     *
     * @param string $arrival_country_has_extra_mail_attachment
     * @return $this
     */
    public function setArrivalCountryHasExtraMailAttachment($arrival_country_has_extra_mail_attachment)
    {
        $this->arrival_country_has_extra_mail_attachment = $arrival_country_has_extra_mail_attachment;

        return $this;
    }

    /**
     * Method to set the value of field arrival_title
     *
     * @param string $arrival_title
     * @return $this
     */
    public function setArrivalTitle($arrival_title)
    {
        $this->arrival_title = $arrival_title;

        return $this;
    }

    /**
     * Method to set the value of field arrival_meta_keyword
     *
     * @param string $arrival_meta_keyword
     * @return $this
     */
    public function setArrivalMetaKeyword($arrival_meta_keyword)
    {
        $this->arrival_meta_keyword = $arrival_meta_keyword;

        return $this;
    }

    /**
     * Method to set the value of field arrival_meta_description
     *
     * @param string $arrival_meta_description
     * @return $this
     */
    public function setArrivalMetaDescription($arrival_meta_description)
    {
        $this->arrival_meta_description = $arrival_meta_description;

        return $this;
    }

    /**
     * Method to set the value of field arrival_disclaimers
     *
     * @param string $arrival_disclaimers
     * @return $this
     */
    public function setArrivalDisclaimers($arrival_disclaimers)
    {
        $this->arrival_disclaimers = $arrival_disclaimers;

        return $this;
    }

    /**
     * Returns the value of field arrival_country_id
     *
     * @return integer
     */
    public function getArrivalCountryId()
    {
        return $this->arrival_country_id;
    }

    /**
     * Returns the value of field arrival_country_name
     *
     * @return string
     */
    public function getArrivalCountryName()
    {
        return $this->arrival_country_name;
    }

    /**
     * Returns the value of field arrival_country_order
     *
     * @return integer
     */
    public function getArrivalCountryOrder()
    {
        return $this->arrival_country_order;
    }

    /**
     * Returns the value of field arrival_country_active
     *
     * @return string
     */
    public function getArrivalCountryActive()
    {
        return $this->arrival_country_active;
    }

    /**
     * Returns the value of field arrival_country_keyword
     *
     * @return string
     */
    public function getArrivalCountryKeyword()
    {
        return $this->arrival_country_keyword;
    }

    /**
     * Returns the value of field arrival_country_logo
     *
     * @return string
     */
    public function getArrivalCountryLogo()
    {
        return $this->arrival_country_logo;
    }

    /**
     * Returns the value of field arrival_country_timezone
     *
     * @return double
     */
    public function getArrivalCountryTimezone()
    {
        return $this->arrival_country_timezone;
    }

    /**
     * Returns the value of field arrival_country_show_ports
     *
     * @return string
     */
    public function getArrivalCountryShowPorts()
    {
        return $this->arrival_country_show_ports;
    }

    /**
     * Returns the value of field arrival_country_show_port_type
     *
     * @return string
     */
    public function getArrivalCountryShowPortType()
    {
        return $this->arrival_country_show_port_type;
    }

    /**
     * Returns the value of field arrival_country_port_type_description
     *
     * @return string
     */
    public function getArrivalCountryPortTypeDescription()
    {
        return $this->arrival_country_port_type_description;
    }

    /**
     * Returns the value of field arrival_country_show_purpose
     *
     * @return string
     */
    public function getArrivalCountryShowPurpose()
    {
        return $this->arrival_country_show_purpose;
    }

    /**
     * Returns the value of field arrival_country_has_extra_mail
     *
     * @return string
     */
    public function getArrivalCountryHasExtraMail()
    {
        return $this->arrival_country_has_extra_mail;
    }

    /**
     * Returns the value of field arrival_country_has_extra_mail_attachment
     *
     * @return string
     */
    public function getArrivalCountryHasExtraMailAttachment()
    {
        return $this->arrival_country_has_extra_mail_attachment;
    }

    /**
     * Returns the value of field arrival_title
     *
     * @return string
     */
    public function getArrivalTitle()
    {
        return $this->arrival_title;
    }

    /**
     * Returns the value of field arrival_meta_keyword
     *
     * @return string
     */
    public function getArrivalMetaKeyword()
    {
        return $this->arrival_meta_keyword;
    }

    /**
     * Returns the value of field arrival_meta_description
     *
     * @return string
     */
    public function getArrivalMetaDescription()
    {
        return $this->arrival_meta_description;
    }

    /**
     * Returns the value of field arrival_disclaimers
     *
     * @return string
     */
    public function getArrivalDisclaimers()
    {
        return $this->arrival_disclaimers;
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'visa_arrival_country';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return VisaArrivalCountry[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return VisaArrivalCountry
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }


}
