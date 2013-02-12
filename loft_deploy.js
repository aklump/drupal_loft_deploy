
/**
 * @file
 * The main javascript file for the loft_deploy module
 *
 * @ingroup loft_deploy
 * @{
 */

(function ($) {

  Drupal.loftDeploy = Drupal.loftDeploy || {};

  //Drupal.loftDeploy.someVariable = Drupal.loftDeploy.someVariable || {};
  //Drupal.loftDeploy.someVariable = value;

  //Drupal.loftDeploy.someFunction = function() {
  //
  //}

  /**
  * Core behavior for loft_deploy.
  */
  Drupal.behaviors.loftDeploy = Drupal.behaviors.loftDeploy || {};
  Drupal.behaviors.loftDeploy.attach = function (context, settings) {
    var $toggle = $('.loft-deploy .hide');
    $toggle.click(function() {
      $('.loft-deploy').fadeOut();
    });
  }

  /**
  * @} End of "defgroup loft_deploy".
  */

})(jQuery);
