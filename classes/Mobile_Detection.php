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
	 * Current object instance (Singleton)
	 * @var Mobile_Detection
	 */
	protected static $objInstance;
    
	/**
	 * Initialize the object
	 */
	protected function __construct() 
	{
	    $this->import('Mobile_Detect','MD');
    }
	
	/**
	 * Prevent cloning of the object (Singleton)
	 */
	final private function __clone() {}
	
	/**
	 * Return the current object instance (Singleton)
	 * @return String
	 */
	public static function getInstance()
	{
	    if (!is_object(self::$objInstance))
	    {
	        self::$objInstance = new self();
	    }
	
	    return self::$objInstance;
	}



    /**
     * Check the type of the device
     * 
     * @return string    tablet|phone|computer
     */
    public function getDeviceType()
    {
        return ($this->MD->isMobile() ? ($this->MD->isTablet() ? 'tablet' : 'phone') : 'computer');
    }
    
    /**
     * Check if the device is mobile.
     * Returns true if any type of mobile device detected, including special ones
     * 
     * @return bool
     */
    public function isMobile()
    {
        return $this->MD->isMobile();
    }

    /**
     * Check if the device is a tablet.
     * Return true if any type of tablet device is detected.
     *
     * @return bool
     */
    public static function isTablet()
    {
        return $this->MD->isTablet();
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
        return $this->MD->{$name}();
    }
    
    /**
     * checkRules - Custom detection methods
     * 
     * @return    array    array(name => value, name => value, ...)
     * @example            array('Samsung', 'AndroidOS', 'Safari')
     */
    public function checkRules()
    {
        $arrReturn = array();
        foreach($this->MD->getRules() as $name => $regex)
        {
            $check = $this->MD->{'is'.$name}();
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
        return $this->MD->mobileGrade();
    }
    
}
