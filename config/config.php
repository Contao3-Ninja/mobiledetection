<?php 

/**
 * Contao Open Source CMS, Copyright (C) 2005-2013 Leo Feyer
 *
 * @copyright  Glen Langer 2013 <http://www.contao.glen-langer.de>
 * @author     Glen Langer (BugBuster)
 * @package    Mobiledetection
 * @license    LGPL
 * @filesource
 * @see	       https://github.com/BugBuster1701/mobiledetection
 */

/**
 * -------------------------------------------------------------------------
 * FRONT END MODULES
 * -------------------------------------------------------------------------
 *
 * List all fontend modules and their class names.
 *
 *   $GLOBALS['FE_MOD'] = array
 *   (
 *       'group_1' => array
 *       (
 *           'module_1' => 'Contentlass',
 *           'module_2' => 'Contentlass'
 *       )
 *   );
 *
 * Use function array_insert() to modify an existing CTE array.
 */

array_insert($GLOBALS['FE_MOD'], 4, array
(
    'MobileDetectionDemo' => array
    (
        'mobiledeviceinfo' => 'MobileDetection\ModuleDeviceInfo',
    )
));

/**
 * -------------------------------------------------------------------------
 * HOOKS
 * -------------------------------------------------------------------------
 */
$GLOBALS['TL_HOOKS']['generatePage'][]      = array('MobileDetection\Mobile_Detection_Hooks', 'insertInsertTagMD');
$GLOBALS['TL_HOOKS']['replaceInsertTags'][] = array('MobileDetection\Mobile_Detection_Hooks', 'mobiledetectionReplaceInsertTags');



