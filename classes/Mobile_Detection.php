<?php

/**
 * Contao Open Source CMS, Copyright (C) 2005-2013 Leo Feyer
 *
 * Contao Module "Mobile Detection"
 *
 * @copyright  Glen Langer 2013 <http://www.contao.glen-langer.de>
 * @author     Glen Langer (BugBuster)
 * @package    Mobiledetection 
 * @license    LGPL 
 * @filesource
 * @see	       https://github.com/BugBuster1701/mobiledetection
 */

/**
 * Run in a custom namespace, so the class can be replaced
 */
namespace BugBuster\MobileDetection; 

/**
 * Class Mobile_Detection
 *
 * Cronjob for integrity check
 *
 * @copyright  Glen Langer 2013 <http://www.contao.glen-langer.de>
 * @author     Glen Langer (BugBuster)
 * @package    MobileDetection
 */
class Mobile_Detection extends \System
{
    /**
     * Current version of the classes.
     */
    const MOBILE_DETECTION_VERSION  = '1.1.0'; // Version of this class
    const MOBILE_DETECT_VERSION     = '2.5.3'; // Version of class Mobile_Detect

	/**
	 * Current object instance (Singleton)
	 * @var Mobile_Detection
	 */
	protected static $objInstance;
    
	/**
	 * Initialize the object
	 */
	protected function __construct() 
	{
	    parent::__construct();
	    $this->import('Mobile_Detect','MobileDetect');
    }
	
	/**
	 * Returns the version number
	 *
	 * @return string
	 * @access public
	 */
	public function getVersion()
	{
	    return self::MOBILE_DETECTION_VERSION;
	}

	public function getVersionVendor()
	{
	    return self::MOBILE_DETECT_VERSION;
	}

    /**
     * Check the type of the device
     * 
     * @return string    tablet|phone|computer
     */
    public function getDeviceType()
    {
        return ($this->MobileDetect->isMobile() ? ($this->MobileDetect->isTablet() ? 'tablet' : 'phone') : 'computer');
    }
    
    /**
     * Check if the device is mobile.
     * Returns true if any type of mobile device detected, including special ones
     * 
     * @return bool
     */
    public function isMobile()
    {
        return $this->MobileDetect->isMobile();
    }

    /**
     * Check if the device is a tablet.
     * Return true if any type of tablet device is detected.
     *
     * @return bool
     */
    public function isTablet()
    {
        return $this->MobileDetect->isTablet();
    }
    
    /**
     * Magic overloading method
     * @example isWhateverYouWant
     */
    public function __call($name, $arguments)
    {
        /*
        $this->MD->setDetectionType('mobile');
        $key = substr($name, 2);
        return $this->MD->matchUAAgainstKey($key);
        */
        return $this->MobileDetect->{$name}();
    }
    
    /**
     * getMobileRules - Custom detection methods, only on mobile devices
     * 
     * @return    array    array(name => value, name => value, ...)
     * @example            array('Samsung', 'AndroidOS', 'Safari')
     */
    public function getMobileRules()
    {
        $arrReturn = array();
        foreach($this->MobileDetect->getRules() as $name => $regex)
        {
            $check = $this->MobileDetect->{'is'.$name}();
            if($check)
            {
                array_push($arrReturn, $name);
            }
        }
        return $arrReturn;
    }
    
    /**
     * Get the mobile grade 
     * 
     * @return    string    A|B|C
     */
    public function getMobileGrade()
    {
        return $this->MobileDetect->mobileGrade();
    }
    
}
