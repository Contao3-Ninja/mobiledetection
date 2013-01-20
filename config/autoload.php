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
	// Modules
	'BugBuster\MobileDetection\ModuleDeviceInfo' => 'system/modules/mobiledetection/modules/ModuleDeviceInfo.php',

	// Classes
	'Mobile_Detect'                              => 'system/modules/mobiledetection/classes/Mobile_Detect.php',
	'BugBuster\MobileDetection\Mobile_Detection' => 'system/modules/mobiledetection/classes/Mobile_Detection.php',
));


/**
 * Register the templates
 */
TemplateLoader::addFiles(array
(
	'mod_mobiledetection_device_fe' => 'system/modules/mobiledetection/templates',
));
