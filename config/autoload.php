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
	'BugBuster\MobileDetection\ModuleDeviceInfo'       => 'system/modules/mobiledetection/modules/ModuleDeviceInfo.php',

	// Classes
	'BugBuster\MobileDetection\Mobile_Detection'       => 'system/modules/mobiledetection/classes/Mobile_Detection.php',
	'BugBuster\MobileDetection\Mobile_Detection_Hooks' => 'system/modules/mobiledetection/classes/Mobile_Detection_Hooks.php',
));


/**
 * Register the templates
 */
TemplateLoader::addFiles(array
(
	'mod_mobiledetection_device_fe' => 'system/modules/mobiledetection/templates',
));
