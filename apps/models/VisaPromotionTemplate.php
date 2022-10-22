<?php

namespace GlobalVisa\Models;

class VisaPromotionTemplate extends BaseModel
{

    /**
     *
     * @var integer
     */
    protected $template_id;

    /**
     *
     * @var string
     */
    protected $template_title;

    /**
     *
     * @var string
     */
    protected $template_content;

    /**
     *
     * @var string
     */
    protected $template_test_email;

    /**
     *
     * @var integer
     */
    protected $template_create_date;

    /**
     * Method to set the value of field template_id
     *
     * @param integer $template_id
     * @return $this
     */
    public function setTemplateId($template_id)
    {
        $this->template_id = $template_id;

        return $this;
    }

    /**
     * Method to set the value of field template_title
     *
     * @param string $template_title
     * @return $this
     */
    public function setTemplateTitle($template_title)
    {
        $this->template_title = $template_title;

        return $this;
    }

    /**
     * Method to set the value of field template_content
     *
     * @param string $template_content
     * @return $this
     */
    public function setTemplateContent($template_content)
    {
        $this->template_content = $template_content;

        return $this;
    }

    /**
     * Method to set the value of field template_test_email
     *
     * @param string $template_test_email
     * @return $this
     */
    public function setTemplateTestEmail($template_test_email)
    {
        $this->template_test_email = $template_test_email;

        return $this;
    }

    /**
     * Method to set the value of field template_create_date
     *
     * @param integer $template_create_date
     * @return $this
     */
    public function setTemplateCreateDate($template_create_date)
    {
        $this->template_create_date = $template_create_date;

        return $this;
    }

    /**
     * Returns the value of field template_id
     *
     * @return integer
     */
    public function getTemplateId()
    {
        return $this->template_id;
    }

    /**
     * Returns the value of field template_title
     *
     * @return string
     */
    public function getTemplateTitle()
    {
        return $this->template_title;
    }

    /**
     * Returns the value of field template_content
     *
     * @return string
     */
    public function getTemplateContent()
    {
        return $this->template_content;
    }

    /**
     * Returns the value of field template_test_email
     *
     * @return string
     */
    public function getTemplateTestEmail()
    {
        return $this->template_test_email;
    }

    /**
     * Returns the value of field template_create_date
     *
     * @return integer
     */
    public function getTemplateCreateDate()
    {
        return $this->template_create_date;
    }

    public function getSource()
    {
        return 'visa_promotion_template';
    }

}
