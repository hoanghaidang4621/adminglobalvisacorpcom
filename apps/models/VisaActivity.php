<?php

namespace GlobalVisa\Models;

use GlobalVisa\Utils\UserAgent;

class VisaActivity extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     * @Primary
     * @Identity
     * @Column(type="integer", length=11, nullable=false)
     */
    protected $act_id;

    /**
     *
     * @var string
     * @Column(type="string", length=255, nullable=false)
     */
    protected $act_controller;

    /**
     *
     * @var string
     * @Column(type="string", length=255, nullable=false)
     */
    protected $act_action;

    /**
     *
     * @var integer
     * @Column(type="integer", length=11, nullable=false)
     */
    protected $act_create_date;

    /**
     *
     * @var integer
     * @Column(type="integer", length=11, nullable=false)
     */
    protected $act_action_id;

    /**
     *
     * @var integer
     * @Column(type="integer", length=11, nullable=true)
     */
    protected $act_user_id;

    /**
     *
     * @var string
     * @Column(type="string", length=255, nullable=false)
     */
    protected $act_ip;

    /**
     *
     * @var string
     * @Column(type="string", length=255, nullable=true)
     */
    protected $act_location;

    /**
     *
     * @var string
     * @Column(type="string", length=255, nullable=true)
     */
    protected $act_computer_screen;

    /**
     *
     * @var string
     * @Column(type="string", length=255, nullable=true)
     */
    protected $act_browser_window_size;

    /**
     *
     * @var string
     * @Column(type="string", length=255, nullable=true)
     */
    protected $act_hardware_type;

    /**
     *
     * @var string
     * @Column(type="string", length=255, nullable=true)
     */
    protected $act_operating_system_name;

    /**
     *
     * @var string
     * @Column(type="string", length=255, nullable=true)
     */
    protected $act_software_sub_type;

    /**
     *
     * @var string
     * @Column(type="string", length=255, nullable=true)
     */
    protected $act_simple_sub_description_string;

    /**
     *
     * @var string
     * @Column(type="string", length=255, nullable=true)
     */
    protected $act_simple_browser_string;

    /**
     *
     * @var string
     * @Column(type="string", length=255, nullable=true)
     */
    protected $act_browser_version;

    /**
     *
     * @var string
     * @Column(type="string", length=255, nullable=true)
     */
    protected $act_software_type;

    /**
     *
     * @var string
     * @Column(type="string", length=255, nullable=true)
     */
    protected $act_extra_info;

    /**
     *
     * @var string
     * @Column(type="string", length=255, nullable=true)
     */
    protected $act_operating_platform;

    /**
     *
     * @var string
     * @Column(type="string", length=255, nullable=true)
     */
    protected $act_extra_info_table;

    /**
     *
     * @var string
     * @Column(type="string", length=255, nullable=true)
     */
    protected $act_layout_engine_name;

    /**
     *
     * @var string
     * @Column(type="string", length=255, nullable=true)
     */
    protected $act_operating_system_flavour_code;

    /**
     *
     * @var string
     * @Column(type="string", length=255, nullable=true)
     */
    protected $act_detected_addons;

    /**
     *
     * @var string
     * @Column(type="string", length=255, nullable=true)
     */
    protected $act_operating_system_flavour;

    /**
     *
     * @var string
     * @Column(type="string", length=255, nullable=true)
     */
    protected $act_operating_system_frameworks;

    /**
     *
     * @var string
     * @Column(type="string", length=255, nullable=true)
     */
    protected $act_browser_name_code;

    /**
     *
     * @var string
     * @Column(type="string", length=255, nullable=true)
     */
    protected $act_simple_minor;

    /**
     *
     * @var string
     * @Column(type="string", length=255, nullable=true)
     */
    protected $act_operating_system_version;

    /**
     *
     * @var string
     * @Column(type="string", length=255, nullable=true)
     */
    protected $act_simple_operating_platform_string;

    /**
     *
     * @var string
     * @Column(type="string", length=255, nullable=true)
     */
    protected $is_abusive;

    /**
     *
     * @var string
     * @Column(type="string", length=255, nullable=true)
     */
    protected $act_simple_medium;

    /**
     *
     * @var string
     * @Column(type="string", length=255, nullable=true)
     */
    protected $act_layout_engine_version;

    /**
     *
     * @var string
     * @Column(type="string", length=255, nullable=true)
     */
    protected $act_browser_capabilities;

    /**
     *
     * @var string
     * @Column(type="string", length=255, nullable=true)
     */
    protected $act_operating_platform_vendor_name;

    /**
     *
     * @var string
     * @Column(type="string", length=255, nullable=true)
     */
    protected $act_operating_system;

    /**
     *
     * @var string
     * @Column(type="string", length=255, nullable=true)
     */
    protected $act_hardware_architecture;

    /**
     *
     * @var string
     * @Column(type="string", length=255, nullable=true)
     */
    protected $act_operating_system_version_full;

    /**
     *
     * @var string
     * @Column(type="string", length=255, nullable=true)
     */
    protected $act_operating_platform_code;

    /**
     *
     * @var string
     * @Column(type="string", length=255, nullable=true)
     */
    protected $act_browser_name;

    /**
     *
     * @var string
     * @Column(type="string", length=255, nullable=true)
     */
    protected $act_operating_system_name_code;

    /**
     *
     * @var string
     * @Column(type="string", length=255, nullable=true)
     */
    protected $act_user_agent;

    /**
     *
     * @var string
     * @Column(type="string", length=255, nullable=true)
     */
    protected $act_simple_major;

    /**
     *
     * @var string
     * @Column(type="string", length=255, nullable=true)
     */
    protected $act_browser_version_full;

    /**
     *
     * @var string
     * @Column(type="string", length=255, nullable=true)
     */
    protected $act_browser;

    /**
     * @param userAgentInfo $userAgentInfo
     */
    public function setWithAgentInfo($userAgentInfo = null)
    {
        if (isset($userAgentInfo)) {
            $userAgents = UserAgent::getDbKeys();
            $arrayKeys = UserAgent::getDbArrayKeys();
            foreach ($userAgents as $userAgent) {
                $fieldName = 'act_' . strtolower($userAgent);
                if (in_array($userAgent, $arrayKeys)) {
                    $this->$fieldName = json_encode($userAgentInfo->$userAgent);
                } else {
                    $this->$fieldName = $userAgentInfo->$userAgent;
                }
            }
        }
    }

    /**
     * Method to set the value of field act_id
     *
     * @param integer $act_id
     * @return $this
     */
    public function setActId($act_id)
    {
        $this->act_id = $act_id;

        return $this;
    }

    /**
     * Method to set the value of field act_controller
     *
     * @param string $act_controller
     * @return $this
     */
    public function setActController($act_controller)
    {
        $this->act_controller = $act_controller;

        return $this;
    }

    /**
     * Method to set the value of field act_action
     *
     * @param string $act_action
     * @return $this
     */
    public function setActAction($act_action)
    {
        $this->act_action = $act_action;

        return $this;
    }

    /**
     * Method to set the value of field act_create_date
     *
     * @param integer $act_create_date
     * @return $this
     */
    public function setActCreateDate($act_create_date)
    {
        $this->act_create_date = $act_create_date;

        return $this;
    }

    /**
     * Method to set the value of field act_action_id
     *
     * @param integer $act_action_id
     * @return $this
     */
    public function setActActionId($act_action_id)
    {
        $this->act_action_id = $act_action_id;

        return $this;
    }

    /**
     * Method to set the value of field act_user_id
     *
     * @param integer $act_user_id
     * @return $this
     */
    public function setActUserId($act_user_id)
    {
        $this->act_user_id = $act_user_id;

        return $this;
    }

    /**
     * Method to set the value of field act_ip
     *
     * @param string $act_ip
     * @return $this
     */
    public function setActIp($act_ip)
    {
        $this->act_ip = $act_ip;

        return $this;
    }

    /**
     * Method to set the value of field act_location
     *
     * @param string $act_location
     * @return $this
     */
    public function setActLocation($act_location)
    {
        $this->act_location = $act_location;

        return $this;
    }

    /**
     * Method to set the value of field act_computer_screen
     *
     * @param string $act_computer_screen
     * @return $this
     */
    public function setActComputerScreen($act_computer_screen)
    {
        $this->act_computer_screen = $act_computer_screen;

        return $this;
    }

    /**
     * Method to set the value of field act_browser_window_size
     *
     * @param string $act_browser_window_size
     * @return $this
     */
    public function setActBrowserWindowSize($act_browser_window_size)
    {
        $this->act_browser_window_size = $act_browser_window_size;

        return $this;
    }

    /**
     * Method to set the value of field act_hardware_type
     *
     * @param string $act_hardware_type
     * @return $this
     */
    public function setActHardwareType($act_hardware_type)
    {
        $this->act_hardware_type = $act_hardware_type;

        return $this;
    }

    /**
     * Method to set the value of field act_operating_system_name
     *
     * @param string $act_operating_system_name
     * @return $this
     */
    public function setActOperatingSystemName($act_operating_system_name)
    {
        $this->act_operating_system_name = $act_operating_system_name;

        return $this;
    }

    /**
     * Method to set the value of field act_software_sub_type
     *
     * @param string $act_software_sub_type
     * @return $this
     */
    public function setActSoftwareSubType($act_software_sub_type)
    {
        $this->act_software_sub_type = $act_software_sub_type;

        return $this;
    }

    /**
     * Method to set the value of field act_simple_sub_description_string
     *
     * @param string $act_simple_sub_description_string
     * @return $this
     */
    public function setActSimpleSubDescriptionString($act_simple_sub_description_string)
    {
        $this->act_simple_sub_description_string = $act_simple_sub_description_string;

        return $this;
    }

    /**
     * Method to set the value of field act_simple_browser_string
     *
     * @param string $act_simple_browser_string
     * @return $this
     */
    public function setActSimpleBrowserString($act_simple_browser_string)
    {
        $this->act_simple_browser_string = $act_simple_browser_string;

        return $this;
    }

    /**
     * Method to set the value of field act_browser_version
     *
     * @param string $act_browser_version
     * @return $this
     */
    public function setActBrowserVersion($act_browser_version)
    {
        $this->act_browser_version = $act_browser_version;

        return $this;
    }

    /**
     * Method to set the value of field act_software_type
     *
     * @param string $act_software_type
     * @return $this
     */
    public function setActSoftwareType($act_software_type)
    {
        $this->act_software_type = $act_software_type;

        return $this;
    }

    /**
     * Method to set the value of field act_extra_info
     *
     * @param string $act_extra_info
     * @return $this
     */
    public function setActExtraInfo($act_extra_info)
    {
        $this->act_extra_info = $act_extra_info;

        return $this;
    }

    /**
     * Method to set the value of field act_operating_platform
     *
     * @param string $act_operating_platform
     * @return $this
     */
    public function setActOperatingPlatform($act_operating_platform)
    {
        $this->act_operating_platform = $act_operating_platform;

        return $this;
    }

    /**
     * Method to set the value of field act_extra_info_table
     *
     * @param string $act_extra_info_table
     * @return $this
     */
    public function setActExtraInfoTable($act_extra_info_table)
    {
        $this->act_extra_info_table = $act_extra_info_table;

        return $this;
    }

    /**
     * Method to set the value of field act_layout_engine_name
     *
     * @param string $act_layout_engine_name
     * @return $this
     */
    public function setActLayoutEngineName($act_layout_engine_name)
    {
        $this->act_layout_engine_name = $act_layout_engine_name;

        return $this;
    }

    /**
     * Method to set the value of field act_operating_system_flavour_code
     *
     * @param string $act_operating_system_flavour_code
     * @return $this
     */
    public function setActOperatingSystemFlavourCode($act_operating_system_flavour_code)
    {
        $this->act_operating_system_flavour_code = $act_operating_system_flavour_code;

        return $this;
    }

    /**
     * Method to set the value of field act_detected_addons
     *
     * @param string $act_detected_addons
     * @return $this
     */
    public function setActDetectedAddons($act_detected_addons)
    {
        $this->act_detected_addons = $act_detected_addons;

        return $this;
    }

    /**
     * Method to set the value of field act_operating_system_flavour
     *
     * @param string $act_operating_system_flavour
     * @return $this
     */
    public function setActOperatingSystemFlavour($act_operating_system_flavour)
    {
        $this->act_operating_system_flavour = $act_operating_system_flavour;

        return $this;
    }

    /**
     * Method to set the value of field act_operating_system_frameworks
     *
     * @param string $act_operating_system_frameworks
     * @return $this
     */
    public function setActOperatingSystemFrameworks($act_operating_system_frameworks)
    {
        $this->act_operating_system_frameworks = $act_operating_system_frameworks;

        return $this;
    }

    /**
     * Method to set the value of field act_browser_name_code
     *
     * @param string $act_browser_name_code
     * @return $this
     */
    public function setActBrowserNameCode($act_browser_name_code)
    {
        $this->act_browser_name_code = $act_browser_name_code;

        return $this;
    }

    /**
     * Method to set the value of field act_simple_minor
     *
     * @param string $act_simple_minor
     * @return $this
     */
    public function setActSimpleMinor($act_simple_minor)
    {
        $this->act_simple_minor = $act_simple_minor;

        return $this;
    }

    /**
     * Method to set the value of field act_operating_system_version
     *
     * @param string $act_operating_system_version
     * @return $this
     */
    public function setActOperatingSystemVersion($act_operating_system_version)
    {
        $this->act_operating_system_version = $act_operating_system_version;

        return $this;
    }

    /**
     * Method to set the value of field act_simple_operating_platform_string
     *
     * @param string $act_simple_operating_platform_string
     * @return $this
     */
    public function setActSimpleOperatingPlatformString($act_simple_operating_platform_string)
    {
        $this->act_simple_operating_platform_string = $act_simple_operating_platform_string;

        return $this;
    }

    /**
     * Method to set the value of field is_abusive
     *
     * @param string $is_abusive
     * @return $this
     */
    public function setIsAbusive($is_abusive)
    {
        $this->is_abusive = $is_abusive;

        return $this;
    }

    /**
     * Method to set the value of field act_simple_medium
     *
     * @param string $act_simple_medium
     * @return $this
     */
    public function setActSimpleMedium($act_simple_medium)
    {
        $this->act_simple_medium = $act_simple_medium;

        return $this;
    }

    /**
     * Method to set the value of field act_layout_engine_version
     *
     * @param string $act_layout_engine_version
     * @return $this
     */
    public function setActLayoutEngineVersion($act_layout_engine_version)
    {
        $this->act_layout_engine_version = $act_layout_engine_version;

        return $this;
    }

    /**
     * Method to set the value of field act_browser_capabilities
     *
     * @param string $act_browser_capabilities
     * @return $this
     */
    public function setActBrowserCapabilities($act_browser_capabilities)
    {
        $this->act_browser_capabilities = $act_browser_capabilities;

        return $this;
    }

    /**
     * Method to set the value of field act_operating_platform_vendor_name
     *
     * @param string $act_operating_platform_vendor_name
     * @return $this
     */
    public function setActOperatingPlatformVendorName($act_operating_platform_vendor_name)
    {
        $this->act_operating_platform_vendor_name = $act_operating_platform_vendor_name;

        return $this;
    }

    /**
     * Method to set the value of field act_operating_system
     *
     * @param string $act_operating_system
     * @return $this
     */
    public function setActOperatingSystem($act_operating_system)
    {
        $this->act_operating_system = $act_operating_system;

        return $this;
    }

    /**
     * Method to set the value of field act_hardware_architecture
     *
     * @param string $act_hardware_architecture
     * @return $this
     */
    public function setActHardwareArchitecture($act_hardware_architecture)
    {
        $this->act_hardware_architecture = $act_hardware_architecture;

        return $this;
    }

    /**
     * Method to set the value of field act_operating_system_version_full
     *
     * @param string $act_operating_system_version_full
     * @return $this
     */
    public function setActOperatingSystemVersionFull($act_operating_system_version_full)
    {
        $this->act_operating_system_version_full = $act_operating_system_version_full;

        return $this;
    }

    /**
     * Method to set the value of field act_operating_platform_code
     *
     * @param string $act_operating_platform_code
     * @return $this
     */
    public function setActOperatingPlatformCode($act_operating_platform_code)
    {
        $this->act_operating_platform_code = $act_operating_platform_code;

        return $this;
    }

    /**
     * Method to set the value of field act_browser_name
     *
     * @param string $act_browser_name
     * @return $this
     */
    public function setActBrowserName($act_browser_name)
    {
        $this->act_browser_name = $act_browser_name;

        return $this;
    }

    /**
     * Method to set the value of field act_operating_system_name_code
     *
     * @param string $act_operating_system_name_code
     * @return $this
     */
    public function setActOperatingSystemNameCode($act_operating_system_name_code)
    {
        $this->act_operating_system_name_code = $act_operating_system_name_code;

        return $this;
    }

    /**
     * Method to set the value of field act_user_agent
     *
     * @param string $act_user_agent
     * @return $this
     */
    public function setActUserAgent($act_user_agent)
    {
        $this->act_user_agent = $act_user_agent;

        return $this;
    }

    /**
     * Method to set the value of field act_simple_major
     *
     * @param string $act_simple_major
     * @return $this
     */
    public function setActSimpleMajor($act_simple_major)
    {
        $this->act_simple_major = $act_simple_major;

        return $this;
    }

    /**
     * Method to set the value of field act_browser_version_full
     *
     * @param string $act_browser_version_full
     * @return $this
     */
    public function setActBrowserVersionFull($act_browser_version_full)
    {
        $this->act_browser_version_full = $act_browser_version_full;

        return $this;
    }

    /**
     * Method to set the value of field act_browser
     *
     * @param string $act_browser
     * @return $this
     */
    public function setActBrowser($act_browser)
    {
        $this->act_browser = $act_browser;

        return $this;
    }

    /**
     * Returns the value of field act_id
     *
     * @return integer
     */
    public function getActId()
    {
        return $this->act_id;
    }

    /**
     * Returns the value of field act_controller
     *
     * @return string
     */
    public function getActController()
    {
        return $this->act_controller;
    }

    /**
     * Returns the value of field act_action
     *
     * @return string
     */
    public function getActAction()
    {
        return $this->act_action;
    }

    /**
     * Returns the value of field act_create_date
     *
     * @return integer
     */
    public function getActCreateDate()
    {
        return $this->act_create_date;
    }

    /**
     * Returns the value of field act_action_id
     *
     * @return integer
     */
    public function getActActionId()
    {
        return $this->act_action_id;
    }

    /**
     * Returns the value of field act_user_id
     *
     * @return integer
     */
    public function getActUserId()
    {
        return $this->act_user_id;
    }

    /**
     * Returns the value of field act_ip
     *
     * @return string
     */
    public function getActIp()
    {
        return $this->act_ip;
    }

    /**
     * Returns the value of field act_location
     *
     * @return string
     */
    public function getActLocation()
    {
        return $this->act_location;
    }

    /**
     * Returns the value of field act_computer_screen
     *
     * @return string
     */
    public function getActComputerScreen()
    {
        return $this->act_computer_screen;
    }

    /**
     * Returns the value of field act_browser_window_size
     *
     * @return string
     */
    public function getActBrowserWindowSize()
    {
        return $this->act_browser_window_size;
    }

    /**
     * Returns the value of field act_hardware_type
     *
     * @return string
     */
    public function getActHardwareType()
    {
        return $this->act_hardware_type;
    }

    /**
     * Returns the value of field act_operating_system_name
     *
     * @return string
     */
    public function getActOperatingSystemName()
    {
        return $this->act_operating_system_name;
    }

    /**
     * Returns the value of field act_software_sub_type
     *
     * @return string
     */
    public function getActSoftwareSubType()
    {
        return $this->act_software_sub_type;
    }

    /**
     * Returns the value of field act_simple_sub_description_string
     *
     * @return string
     */
    public function getActSimpleSubDescriptionString()
    {
        return $this->act_simple_sub_description_string;
    }

    /**
     * Returns the value of field act_simple_browser_string
     *
     * @return string
     */
    public function getActSimpleBrowserString()
    {
        return $this->act_simple_browser_string;
    }

    /**
     * Returns the value of field act_browser_version
     *
     * @return string
     */
    public function getActBrowserVersion()
    {
        return $this->act_browser_version;
    }

    /**
     * Returns the value of field act_software_type
     *
     * @return string
     */
    public function getActSoftwareType()
    {
        return $this->act_software_type;
    }

    /**
     * Returns the value of field act_extra_info
     *
     * @return string
     */
    public function getActExtraInfo()
    {
        return $this->act_extra_info;
    }

    /**
     * Returns the value of field act_operating_platform
     *
     * @return string
     */
    public function getActOperatingPlatform()
    {
        return $this->act_operating_platform;
    }

    /**
     * Returns the value of field act_extra_info_table
     *
     * @return string
     */
    public function getActExtraInfoTable()
    {
        return $this->act_extra_info_table;
    }

    /**
     * Returns the value of field act_layout_engine_name
     *
     * @return string
     */
    public function getActLayoutEngineName()
    {
        return $this->act_layout_engine_name;
    }

    /**
     * Returns the value of field act_operating_system_flavour_code
     *
     * @return string
     */
    public function getActOperatingSystemFlavourCode()
    {
        return $this->act_operating_system_flavour_code;
    }

    /**
     * Returns the value of field act_detected_addons
     *
     * @return string
     */
    public function getActDetectedAddons()
    {
        return $this->act_detected_addons;
    }

    /**
     * Returns the value of field act_operating_system_flavour
     *
     * @return string
     */
    public function getActOperatingSystemFlavour()
    {
        return $this->act_operating_system_flavour;
    }

    /**
     * Returns the value of field act_operating_system_frameworks
     *
     * @return string
     */
    public function getActOperatingSystemFrameworks()
    {
        return $this->act_operating_system_frameworks;
    }

    /**
     * Returns the value of field act_browser_name_code
     *
     * @return string
     */
    public function getActBrowserNameCode()
    {
        return $this->act_browser_name_code;
    }

    /**
     * Returns the value of field act_simple_minor
     *
     * @return string
     */
    public function getActSimpleMinor()
    {
        return $this->act_simple_minor;
    }

    /**
     * Returns the value of field act_operating_system_version
     *
     * @return string
     */
    public function getActOperatingSystemVersion()
    {
        return $this->act_operating_system_version;
    }

    /**
     * Returns the value of field act_simple_operating_platform_string
     *
     * @return string
     */
    public function getActSimpleOperatingPlatformString()
    {
        return $this->act_simple_operating_platform_string;
    }

    /**
     * Returns the value of field is_abusive
     *
     * @return string
     */
    public function getIsAbusive()
    {
        return $this->is_abusive;
    }

    /**
     * Returns the value of field act_simple_medium
     *
     * @return string
     */
    public function getActSimpleMedium()
    {
        return $this->act_simple_medium;
    }

    /**
     * Returns the value of field act_layout_engine_version
     *
     * @return string
     */
    public function getActLayoutEngineVersion()
    {
        return $this->act_layout_engine_version;
    }

    /**
     * Returns the value of field act_browser_capabilities
     *
     * @return string
     */
    public function getActBrowserCapabilities()
    {
        return $this->act_browser_capabilities;
    }

    /**
     * Returns the value of field act_operating_platform_vendor_name
     *
     * @return string
     */
    public function getActOperatingPlatformVendorName()
    {
        return $this->act_operating_platform_vendor_name;
    }

    /**
     * Returns the value of field act_operating_system
     *
     * @return string
     */
    public function getActOperatingSystem()
    {
        return $this->act_operating_system;
    }

    /**
     * Returns the value of field act_hardware_architecture
     *
     * @return string
     */
    public function getActHardwareArchitecture()
    {
        return $this->act_hardware_architecture;
    }

    /**
     * Returns the value of field act_operating_system_version_full
     *
     * @return string
     */
    public function getActOperatingSystemVersionFull()
    {
        return $this->act_operating_system_version_full;
    }

    /**
     * Returns the value of field act_operating_platform_code
     *
     * @return string
     */
    public function getActOperatingPlatformCode()
    {
        return $this->act_operating_platform_code;
    }

    /**
     * Returns the value of field act_browser_name
     *
     * @return string
     */
    public function getActBrowserName()
    {
        return $this->act_browser_name;
    }

    /**
     * Returns the value of field act_operating_system_name_code
     *
     * @return string
     */
    public function getActOperatingSystemNameCode()
    {
        return $this->act_operating_system_name_code;
    }

    /**
     * Returns the value of field act_user_agent
     *
     * @return string
     */
    public function getActUserAgent()
    {
        return $this->act_user_agent;
    }

    /**
     * Returns the value of field act_simple_major
     *
     * @return string
     */
    public function getActSimpleMajor()
    {
        return $this->act_simple_major;
    }

    /**
     * Returns the value of field act_browser_version_full
     *
     * @return string
     */
    public function getActBrowserVersionFull()
    {
        return $this->act_browser_version_full;
    }

    /**
     * Returns the value of field act_browser
     *
     * @return string
     */
    public function getActBrowser()
    {
        return $this->act_browser;
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'visa_activity';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return VisaActivity[]|VisaActivity
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return VisaActivity
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
