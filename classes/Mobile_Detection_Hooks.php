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
 * Class Mobile_Detection_Hooks
 *
 * @copyright  Glen Langer 2013 <http://www.contao.glen-langer.de>
 * @author     Glen Langer (BugBuster)
 * @package    Mobiledetection
 */
class Mobile_Detection_Hooks extends \Frontend
{
   
    /**
     * Hook:  $GLOBALS['TL_HOOKS']['generatePage']
     * 
     * @param Database_Result $objPage
     * @param Database_Result $objLayout
     * @param PageRegular $objPageRegular
     */
    public function insertInsertTagMD( $objPage,  $objLayout,  $objPageRegular)
    {
        // set vary header for browsers to avoid caching in Proxies for different browsers
        header('Vary: User-Agent', false);
    
        // add mobiledetectioncss class to page css class
        $objPage->cssClass = $objPage->cssClass . ' {{cache_mobiledetectioncss}}';
    }
    
    /**
     * Hook:  $GLOBALS['TL_HOOKS']['replaceInsertTags']
     * 
     * @param  string $strTag
     * @return boolean|string
     */
    public function mobiledetectionReplaceInsertTags($strTag)
    {
    
        if($strTag != 'cache_mobiledetectioncss')
        {
            return false; // not for us
        }
        
        // Import Mobile_Detection
        //$this->import('MobileDetection\Mobile_Detection','Mobile_Detection'); 
        $this->Mobile_Detection = new \MobileDetection\Mobile_Detection();
        $DeviceType = $this->Mobile_Detection->getDeviceType();
        
        return $DeviceType;
        
    }
    
        
}

