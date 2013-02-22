SUMMARY: This module helps visually distinguish dev, staging and production
websites by applying a colored border around both dev and staging websites.


REQUIREMENTS:
* Expecting to find settings.local.php

INSTALLATION:
* Download and unzip this module into your modules directory.
* Goto Administer > Site Building > Modules and enable this module.


CONFIGURATION:
* This is not just a "dev module" as such, you should enable this module on
  production; though you won't see any visual changes to production it will
  insure that when you dump your prod database and import it to dev or staging,
  that the module is enabled and can begin to make the visual distinctions on
  the dev and staging sites. This module has no measurable affect on a
  production website as it's been highly optimized for speed.
* If using settings.local.php format, the $site_role variable will inform this
  module of the role of the site.
* If not you should add the following to settings.php; take not that adding the
  $conf variable as shown here will override what you have in
  settings.local.php, if in fact you have anything there.
    @code
    // One of 'prod', 'staging', or 'dev'
    $conf['loft_deploy_site_role'] = 'staging';
    @endcode
* You may alter the title that is displayed at the bottom of the screen by
  adding the following to settings.local.php or settings.php, where the token
  '!site_role' will print the site role.
    @code
    $conf['loft_deploy_site_title'] = '!site_role'
    @endcode
* You may influence the css by adding, as an example
    @code
    $conf['loft_deploy_css_class'] = 'gitflow-develop';
    @endcode
* We've provided a fourth color if you add the class 'gitflow-master' in the
  included css.
* We've provided classes that support gitflow methodology: gitflow-master for
  all branches that begin master or hotfix; gitflow-develop for all classes that
  begin: develop, feature, and release
@endcode
* Now enjoy the module.


GOTCHAS:
* If your git branch changes, you need to dump the drupal cache to see the changes
  appear.

--------------------------------------------------------
CONTACT:
In the Loft Studios
Aaron Klump - Web Developer
PO Box 29294 Bellingham, WA 98228-1294
aim: theloft101
skype: intheloftstudios

http://www.InTheLoftStudios.com
