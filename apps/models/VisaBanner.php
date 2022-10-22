<?php
namespace GlobalVisa\Models;

class VisaBanner extends BaseModel
{

    /**
     *
     * @var integer
     */
    protected $banner_id;

    /**
     *
     * @var string
     */
    protected $banner_title;

    /**
     *
     * @var string
     */
    protected $banner_content;

    /**
     *
     * @var string
     */
    protected $banner_link;

    /**
     *
     * @var integer
     */
    protected $banner_order;

    /**
     *
     * @var string
     */
    protected $banner_active;

    /**
     *
     * @var string
     */
    protected $banner_image;

    /**
     * Method to set the value of field banner_id
     *
     * @param integer $banner_id
     * @return $this
     */
    public function setBannerId($banner_id)
    {
        $this->banner_id = $banner_id;

        return $this;
    }

    /**
     * Method to set the value of field banner_title
     *
     * @param string $banner_title
     * @return $this
     */
    public function setBannerTitle($banner_title)
    {
        $this->banner_title = $banner_title;

        return $this;
    }

    /**
     * Method to set the value of field banner_content
     *
     * @param string $banner_content
     * @return $this
     */
    public function setBannerContent($banner_content)
    {
        $this->banner_content = $banner_content;

        return $this;
    }

    /**
     * Method to set the value of field banner_link
     *
     * @param string $banner_link
     * @return $this
     */
    public function setBannerLink($banner_link)
    {
        $this->banner_link = $banner_link;

        return $this;
    }

    /**
     * Method to set the value of field banner_order
     *
     * @param integer $banner_order
     * @return $this
     */
    public function setBannerOrder($banner_order)
    {
        $this->banner_order = $banner_order;

        return $this;
    }

    /**
     * Method to set the value of field banner_active
     *
     * @param string $banner_active
     * @return $this
     */
    public function setBannerActive($banner_active)
    {
        $this->banner_active = $banner_active;

        return $this;
    }

    /**
     * Method to set the value of field banner_image
     *
     * @param string $banner_image
     * @return $this
     */
    public function setBannerImage($banner_image)
    {
        $this->banner_image = $banner_image;

        return $this;
    }

    /**
     * Returns the value of field banner_id
     *
     * @return integer
     */
    public function getBannerId()
    {
        return $this->banner_id;
    }

    /**
     * Returns the value of field banner_title
     *
     * @return string
     */
    public function getBannerTitle()
    {
        return $this->banner_title;
    }

    /**
     * Returns the value of field banner_content
     *
     * @return string
     */
    public function getBannerContent()
    {
        return $this->banner_content;
    }

    /**
     * Returns the value of field banner_link
     *
     * @return string
     */
    public function getBannerLink()
    {
        return $this->banner_link;
    }

    /**
     * Returns the value of field banner_order
     *
     * @return integer
     */
    public function getBannerOrder()
    {
        return $this->banner_order;
    }

    /**
     * Returns the value of field banner_active
     *
     * @return string
     */
    public function getBannerActive()
    {
        return $this->banner_active;
    }

    /**
     * Returns the value of field banner_image
     *
     * @return string
     */
    public function getBannerImage()
    {
        return $this->banner_image;
    }

}
