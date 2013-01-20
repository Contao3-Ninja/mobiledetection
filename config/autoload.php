<?php

/**
 * Contao Open Source CMS
 * 
 * Copyright (C) 2005-2013 Leo Feyer
 * 
 * @package Mobiledetection
 * @link    https://contao.org
 * @license http://www.gnu.org/licenses/lgpl-3.0.html LGPL
 */


/**
 * Register the namespaces
 */
ClassLoader::addNamespaces(array
(
	'BugBuster',
));


/**
 * Register the classes
 */
ClassLoader::addClasses(array
(
	// Classes
	'Mobile_Detect'                              => 'system/modules/mobiledetection/classes/Mobile_Detect.php',
	'BugBuster\MobileDetection\Mobile_Detection' => 'system/modules/mobiledetection/classes/Mobile_Detection.php',
));
