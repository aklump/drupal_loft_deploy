##Summary
This module helps visually distinguish dev, staging and production
website roles by applying a colored border around non-production sites.
Additional visual feedback is provided including: the current git branch, and gitflow parent, when applicable.


##Requirements
* Expecting to find settings.local.php


##Installation
* Download and unzip this module into your modules directory.
* Goto Administer > Site Building > Modules and enable this module.


##Configuration
This is not just a "dev module" as such, you should enable this module on production; though you won't see any visual changes to production it will insure that when you dump your prod database and import it to dev or staging, that the module is enabled and can begin to make the visual distinctions on the dev and staging sites. This module has no measurable affect on a production website as it's been highly optimized for speed.

##Site Role / Border Color
* Each instance of your website is one of: production, staging or dev. The color of the border around the non-production sites informs you as to it's role.  There's one more distinction between a site role dev with master branch, and a site role dev with a develop branch; this adds a fourth color.

* Obviously, production instances will not have a border.

* If using settings.local.php format, the $site_role variable will inform this module of the role of the site.

* If not you should add the following to settings.php; take note that adding the `$conf variable` as shown here will override what you have in settings.local.php, if in fact you have anything there.  

* You will need to flush Drupal caches each time you change your site role.


##settings.php example
    
    // One of 'prod', 'staging', or 'dev'
    $conf['loft_deploy_site_role'] = 'staging';

##Default Colors

    SITE ROLE - GIT BRANCH - COLOR
    prod        n/a         n/a
    staging     n/a         green
    dev         master      pink
    dev         develop     aqua

##Info Title
At the bottom of the page, you will see a readout of information, the "title". By default this will display the site role, and the gitflow parent and current git branch, if you are using git.

Click this title to hide the visual border; CMD or CTRL click this to hide it for 10 minutes.

You may alter the title that is displayed at the bottom of the screen by   adding the following to settings.local.php or settings.php, where the token '!site_role' will print the site role.  Other tokens are: !git and !gitflow.
       

    $conf['loft_deploy_site_title'] = '!site_role - !git > !gitflow'


##Advanced Theming
Refer to `div.loft-deploy` and it's classes for css overriding.

You may influence the css classes on `div.loft-deploy` by adding, as an example:

    $conf['loft_deploy_css_class'] = 'my-cool-class';


##Gotchas
* If your site role changes, you may need to empty all caches to see the changes appear.

##Contact
In the Loft Studios  
Aaron Klump - Web Developer  
PO Box 29294 Bellingham, WA 98228-1294  
aim: theloft101  
skype: intheloftstudios  
<http://www.InTheLoftStudios.com>
