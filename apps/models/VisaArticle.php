<?php

namespace GlobalVisa\Models;

class VisaArticle extends BaseModel
{

    /**
     *
     * @var integer
     */
    protected $ar_id;

    /**
     *
     * @var string
     */
    protected $ar_name;

    /**
     *
     * @var integer
     */
    protected $ar_type_id;

    /**
     *
     * @var string
     */
    protected $ar_icon;

    /**
     *
     * @var string
     */
    protected $ar_title;

    /**
     *
     * @var string
     */
    protected $ar_meta_keyword;

    /**
     *
     * @var string
     */
    protected $ar_meta_description;

    /**
     *
     * @var string
     */
    protected $ar_active;

    /**
     *
     * @var string
     */
    protected $ar_content;

    /**
     *
     * @var string
     */
    protected $ar_keyword;

    /**
     *
     * @var integer
     */
    protected $ar_insert_time;

    /**
     *
     * @var integer
     */
    protected $ar_order;

    /**
     *
     * @var string
     */
    protected $ar_is_home;

    /**
     *
     * @var string
     */
    protected $ar_summary;

    /**
     *
     * @var integer
     */
    protected $ar_user_id;

    /**
     *
     * @var integer
     */
    protected $ar_country_id;


    public function initialize()
    {
        $this->hasMany("ar_id", "\GlobalVisa\Models\VisaAnswer", "answer_article_id", array(
            'alias' => 'answers'
        ));

        $this->belongsTo("ar_country_id", "\GlobalVisa\Models\VisaArrivalCountry", "arrival_country_id", array(
            'alias' => 'arrivalCountry'
        ));
    }

    /**
     * Method to set the value of field ar_id
     *
     * @param integer $ar_id
     * @return $this
     */
    public function setArId($ar_id)
    {
        $this->ar_id = $ar_id;

        return $this;
    }

    /**
     * Method to set the value of field ar_name
     *
     * @param string $ar_name
     * @return $this
     */
    public function setArName($ar_name)
    {
        $this->ar_name = $ar_name;

        return $this;
    }

    /**
     * Method to set the value of field ar_type_id
     *
     * @param integer $ar_type_id
     * @return $this
     */
    public function setArTypeId($ar_type_id)
    {
        $this->ar_type_id = $ar_type_id;

        return $this;
    }

    /**
     * Method to set the value of field ar_icon
     *
     * @param string $ar_icon
     * @return $this
     */
    public function setArIcon($ar_icon)
    {
        $this->ar_icon = $ar_icon;

        return $this;
    }

    /**
     * Method to set the value of field ar_title
     *
     * @param string $ar_title
     * @return $this
     */
    public function setArTitle($ar_title)
    {
        $this->ar_title = $ar_title;

        return $this;
    }

    /**
     * Method to set the value of field ar_meta_keyword
     *
     * @param string $ar_meta_keyword
     * @return $this
     */
    public function setArMetaKeyword($ar_meta_keyword)
    {
        $this->ar_meta_keyword = $ar_meta_keyword;

        return $this;
    }

    /**
     * Method to set the value of field ar_meta_description
     *
     * @param string $ar_meta_description
     * @return $this
     */
    public function setArMetaDescription($ar_meta_description)
    {
        $this->ar_meta_description = $ar_meta_description;

        return $this;
    }

    /**
     * Method to set the value of field ar_active
     *
     * @param string $ar_active
     * @return $this
     */
    public function setArActive($ar_active)
    {
        $this->ar_active = $ar_active;

        return $this;
    }

    /**
     * Method to set the value of field ar_content
     *
     * @param string $ar_content
     * @return $this
     */
    public function setArContent($ar_content)
    {
        $this->ar_content = $ar_content;

        return $this;
    }

    /**
     * Method to set the value of field ar_keyword
     *
     * @param string $ar_keyword
     * @return $this
     */
    public function setArKeyword($ar_keyword)
    {
        $this->ar_keyword = $ar_keyword;

        return $this;
    }

    /**
     * Method to set the value of field ar_insert_time
     *
     * @param integer $ar_insert_time
     * @return $this
     */
    public function setArInsertTime($ar_insert_time)
    {
        $this->ar_insert_time = $ar_insert_time;

        return $this;
    }

    /**
     * Method to set the value of field ar_order
     *
     * @param integer $ar_order
     * @return $this
     */
    public function setArOrder($ar_order)
    {
        $this->ar_order = $ar_order;

        return $this;
    }

    /**
     * Method to set the value of field ar_is_home
     *
     * @param string $ar_is_home
     * @return $this
     */
    public function setArIsHome($ar_is_home)
    {
        $this->ar_is_home = $ar_is_home;

        return $this;
    }

    /**
     * Method to set the value of field ar_summary
     *
     * @param string $ar_summary
     * @return $this
     */
    public function setArSummary($ar_summary)
    {
        $this->ar_summary = $ar_summary;

        return $this;
    }

    /**
     * Method to set the value of field ar_user_id
     *
     * @param integer $ar_user_id
     * @return $this
     */
    public function setArUserId($ar_user_id)
    {
        $this->ar_user_id = $ar_user_id;

        return $this;
    }

    /**
     * Method to set the value of field ar_country_id
     *
     * @param integer $ar_country_id
     * @return $this
     */
    public function setArCountryId($ar_country_id)
    {
        $this->ar_country_id = $ar_country_id;

        return $this;
    }

    /**
     * Returns the value of field ar_id
     *
     * @return integer
     */
    public function getArId()
    {
        return $this->ar_id;
    }

    /**
     * Returns the value of field ar_name
     *
     * @return string
     */
    public function getArName()
    {
        return $this->ar_name;
    }

    /**
     * Returns the value of field ar_type_id
     *
     * @return integer
     */
    public function getArTypeId()
    {
        return $this->ar_type_id;
    }

    /**
     * Returns the value of field ar_icon
     *
     * @return string
     */
    public function getArIcon()
    {
        return $this->ar_icon;
    }

    /**
     * Returns the value of field ar_title
     *
     * @return string
     */
    public function getArTitle()
    {
        return $this->ar_title;
    }

    /**
     * Returns the value of field ar_meta_keyword
     *
     * @return string
     */
    public function getArMetaKeyword()
    {
        return $this->ar_meta_keyword;
    }

    /**
     * Returns the value of field ar_meta_description
     *
     * @return string
     */
    public function getArMetaDescription()
    {
        return $this->ar_meta_description;
    }

    /**
     * Returns the value of field ar_active
     *
     * @return string
     */
    public function getArActive()
    {
        return $this->ar_active;
    }

    /**
     * Returns the value of field ar_content
     *
     * @return string
     */
    public function getArContent()
    {
        return $this->ar_content;
    }

    /**
     * Returns the value of field ar_keyword
     *
     * @return string
     */
    public function getArKeyword()
    {
        return $this->ar_keyword;
    }

    /**
     * Returns the value of field ar_insert_time
     *
     * @return integer
     */
    public function getArInsertTime()
    {
        return $this->ar_insert_time;
    }

    /**
     * Returns the value of field ar_order
     *
     * @return integer
     */
    public function getArOrder()
    {
        return $this->ar_order;
    }

    /**
     * Returns the value of field ar_is_home
     *
     * @return string
     */
    public function getArIsHome()
    {
        return $this->ar_is_home;
    }

    /**
     * Returns the value of field ar_summary
     *
     * @return string
     */
    public function getArSummary()
    {
        return $this->ar_summary;
    }

    /**
     * Returns the value of field ar_user_id
     *
     * @return integer
     */
    public function getArUserId()
    {
        return $this->ar_user_id;
    }

    /**
     * Returns the value of field ar_country_id
     *
     * @return integer
     */
    public function getArCountryId()
    {
        return $this->ar_country_id;
    }

    public function getSource()
    {
        return 'visa_article';
    }


}
