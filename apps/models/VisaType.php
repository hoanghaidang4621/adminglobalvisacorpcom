<?php

namespace GlobalVisa\Models;

class VisaType extends BaseModel
{

    /**
     *
     * @var integer
     */
    protected $type_id;

    /**
     *
     * @var string
     */
    protected $type_name;

    /**
     *
     * @var string
     */
    protected $type_title;

    /**
     *
     * @var string
     */
    protected $type_icon;

    /**
     *
     * @var string
     */
    protected $type_meta_keyword;

    /**
     *
     * @var string
     */
    protected $type_meta_description;

    /**
     *
     * @var string
     */
    protected $type_active;

    /**
     *
     * @var string
     */
    protected $type_keyword;

    /**
     *
     * @var integer
     */
    protected $type_parent_id;

    /**
     *
     * @var integer
     */
    protected $type_country_id;

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
     * Method to set the value of field type_title
     *
     * @param string $type_title
     * @return $this
     */
    public function setTypeTitle($type_title)
    {
        $this->type_title = $type_title;

        return $this;
    }

    /**
     * Method to set the value of field type_icon
     *
     * @param string $type_icon
     * @return $this
     */
    public function setTypeIcon($type_icon)
    {
        $this->type_icon = $type_icon;

        return $this;
    }

    /**
     * Method to set the value of field type_meta_keyword
     *
     * @param string $type_meta_keyword
     * @return $this
     */
    public function setTypeMetaKeyword($type_meta_keyword)
    {
        $this->type_meta_keyword = $type_meta_keyword;

        return $this;
    }

    /**
     * Method to set the value of field type_meta_description
     *
     * @param string $type_meta_description
     * @return $this
     */
    public function setTypeMetaDescription($type_meta_description)
    {
        $this->type_meta_description = $type_meta_description;

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
     * Method to set the value of field type_keyword
     *
     * @param string $type_keyword
     * @return $this
     */
    public function setTypeKeyword($type_keyword)
    {
        $this->type_keyword = $type_keyword;

        return $this;
    }

    /**
     * Method to set the value of field type_parent_id
     *
     * @param integer $type_parent_id
     * @return $this
     */
    public function setTypeParentId($type_parent_id)
    {
        $this->type_parent_id = $type_parent_id;

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
     * Returns the value of field type_name
     *
     * @return string
     */
    public function getTypeName()
    {
        return $this->type_name;
    }

    /**
     * Returns the value of field type_title
     *
     * @return string
     */
    public function getTypeTitle()
    {
        return $this->type_title;
    }

    /**
     * Returns the value of field type_icon
     *
     * @return string
     */
    public function getTypeIcon()
    {
        return $this->type_icon;
    }

    /**
     * Returns the value of field type_meta_keyword
     *
     * @return string
     */
    public function getTypeMetaKeyword()
    {
        return $this->type_meta_keyword;
    }

    /**
     * Returns the value of field type_meta_description
     *
     * @return string
     */
    public function getTypeMetaDescription()
    {
        return $this->type_meta_description;
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
     * Returns the value of field type_keyword
     *
     * @return string
     */
    public function getTypeKeyword()
    {
        return $this->type_keyword;
    }

    /**
     * Returns the value of field type_parent_id
     *
     * @return integer
     */
    public function getTypeParentId()
    {
        return $this->type_parent_id;
    }

    /**
     * Method to set the value of field type_country_id
     *
     * @param integer $type_country_id
     * @return $this
     */
    public function setTypeCountryId($type_country_id)
    {
        $this->type_country_id = $type_country_id;

        return $this;
    }

    /**
     * Returns the value of field type_country_id
     *
     * @return integer
     */
    public function getTypeCountryId()
    {
        return $this->type_country_id;
    }

    public function getSource()
    {
        return 'visa_type';
    }

}
