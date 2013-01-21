Contao Module MobileDetection
=============================

Contao 3 Module "Mobile-Detection", based on "http://mobiledetect.net/"

Helperclasses for developer. Demo frontend module is present.

Using
=====

You have two options:
* You're using the original class (Mobile_Detect).
* You're using the wrapper class (Mobile_Detection).

## Mobile_Detect (original class)
```php
include '<path>/Mobile_Detect.php';

$detect = new Mobile_Detect();
 
// Check for any mobile device.
if ($detect->isMobile())
 
// Check for any tablet.
if($detect->isTablet())
 
// Check for any mobile device, excluding tablets.
if ($detect->isMobile() && !$detect->isTablet())
```
For the full list of available methods check the ![demo.php](https://github.com/serbanghita/Mobile-Detect) file.

## Mobile_Detection (wrapper class)
```php
$this->import('\MobileDetection\Mobile_Detection','Mobile_Detection');

// Check device type
echo $this->Mobile_Detection->getDeviceType(); // phone|tablet|computer

// Check for any mobile device.
if ($this->Mobile_Detection->isMobile())

// Check for any tablet.
if ($this->Mobile_Detection->isTablet())

// Check mobile grade
echo $this->Mobile_Detection->getMobileGrade(); // A|B|C

// Check mobile rules
$arrRules = $this->Mobile_Detection->getMobileRules(); // result e.g. array('SamsungTablet','AndroidOS','Safari')
```
See demo module "MobileDetectionDemo".

