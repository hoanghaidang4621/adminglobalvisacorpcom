<?php

namespace GlobalVisa\Models;

class VisaAnswer extends BaseModel
{

    /**
     *
     * @var integer
     */
    protected $answer_id;

    /**
     *
     * @var string
     */
    protected $answer_content;

    /**
     *
     * @var integer
     */
    protected $answer_user_id;

    /**
     *
     * @var integer
     */
    protected $answer_date_create;

    /**
     *
     * @var string
     */
    protected $answer_active;

    /**
     *
     * @var integer
     */
    protected $answer_article_id;

    /**
     *
     * @var string
     */
    protected $answer_user_name;

    /**
     *
     * @var string
     */
    protected $answer_user_email;


    public function initialize()
    {
        $this->belongsTo("answer_article_id", 'GlobalVisa\Models\VisaArticle', "ar_id", array(
            'alias' => 'article'
        ));
    }

    /**
     * Method to set the value of field answer_id
     *
     * @param integer $answer_id
     * @return $this
     */
    public function setAnswerId($answer_id)
    {
        $this->answer_id = $answer_id;

        return $this;
    }

    /**
     * Method to set the value of field answer_content
     *
     * @param string $answer_content
     * @return $this
     */
    public function setAnswerContent($answer_content)
    {
        $this->answer_content = $answer_content;

        return $this;
    }

    /**
     * Method to set the value of field answer_user_id
     *
     * @param integer $answer_user_id
     * @return $this
     */
    public function setAnswerUserId($answer_user_id)
    {
        $this->answer_user_id = $answer_user_id;

        return $this;
    }

    /**
     * Method to set the value of field answer_date_create
     *
     * @param integer $answer_date_create
     * @return $this
     */
    public function setAnswerDateCreate($answer_date_create)
    {
        $this->answer_date_create = $answer_date_create;

        return $this;
    }

    /**
     * Method to set the value of field answer_active
     *
     * @param string $answer_active
     * @return $this
     */
    public function setAnswerActive($answer_active)
    {
        $this->answer_active = $answer_active;

        return $this;
    }

    /**
     * Method to set the value of field answer_article_id
     *
     * @param integer $answer_article_id
     * @return $this
     */
    public function setAnswerArticleId($answer_article_id)
    {
        $this->answer_article_id = $answer_article_id;

        return $this;
    }

    /**
     * Method to set the value of field answer_user_name
     *
     * @param string $answer_user_name
     * @return $this
     */
    public function setAnswerUserName($answer_user_name)
    {
        $this->answer_user_name = $answer_user_name;

        return $this;
    }

    /**
     * Method to set the value of field answer_user_email
     *
     * @param string $answer_user_email
     * @return $this
     */
    public function setAnswerUserEmail($answer_user_email)
    {
        $this->answer_user_email = $answer_user_email;

        return $this;
    }

    /**
     * Returns the value of field answer_id
     *
     * @return integer
     */
    public function getAnswerId()
    {
        return $this->answer_id;
    }

    /**
     * Returns the value of field answer_content
     *
     * @return string
     */
    public function getAnswerContent()
    {
        return $this->answer_content;
    }

    /**
     * Returns the value of field answer_user_id
     *
     * @return integer
     */
    public function getAnswerUserId()
    {
        return $this->answer_user_id;
    }

    /**
     * Returns the value of field answer_date_create
     *
     * @return integer
     */
    public function getAnswerDateCreate()
    {
        return $this->answer_date_create;
    }

    /**
     * Returns the value of field answer_active
     *
     * @return string
     */
    public function getAnswerActive()
    {
        return $this->answer_active;
    }

    /**
     * Returns the value of field answer_article_id
     *
     * @return integer
     */
    public function getAnswerArticleId()
    {
        return $this->answer_article_id;
    }

    /**
     * Returns the value of field answer_user_name
     *
     * @return string
     */
    public function getAnswerUserName()
    {
        return $this->answer_user_name;
    }

    /**
     * Returns the value of field answer_user_email
     *
     * @return string
     */
    public function getAnswerUserEmail()
    {
        return $this->answer_user_email;
    }

    public function getSource()
    {
        return 'visa_answer';
    }

}
