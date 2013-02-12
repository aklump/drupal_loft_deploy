SUMMARY: This module helps visually distinguish dev, staging and production
websites by applying a colored border around both dev and staging websites.


REQUIREMENTS:
* Expecting to find settings.local.php

INSTALLATION:
* Download and unzip this module into your modules directory.
* Goto Administer > Site Building > Modules and enable this module.


CONFIGURATION:
* If using settings.local.php format, the $site_role variable will inform this
  module of the role of the site.
* If not you should add the following to settings.php
@code
// One of 'prod', 'staging', or 'dev'
$conf['loft_deploy_site_role'] = 'staging';
@endcode
* Simply enable the module and site back.


--------------------------------------------------------
CONTACT:
In the Loft Studios
Aaron Klump - Web Developer
PO Box 29294 Bellingham, WA 98228-1294
aim: theloft101
skype: intheloftstudios

http://www.InTheLoftStudios.com
