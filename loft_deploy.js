
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
    var duration = 10;

    // Single click hides until next page load
    $toggle.click(function(e) {


      // Was the meta key held down? Set cookie?
      if (e.metaKey) {
        $('.loft-deploy').fadeOut(function() {
          $('.loft-deploy').fadeIn(function() {
            $('.loft-deploy').fadeOut();
          });
        });

        // Cookie handling
        var c_name = 'loft_deploy';
        var expiry = new Date();
        var time = expiry.getTime();

        // Set a cookie if user asks us to
        time += duration * 60 * 1000;
        expiry.setTime(time);
        var c_value = $(this).attr('class').match(/hidden/);
        c_value = escape(c_value) + ((expiry === null) ? "" : "; expires=" + expiry.toGMTString());
        document.cookie = c_name + "=" + c_value;
      }
      else {
        $('.loft-deploy').fadeOut();
      }
      return false;
    });
  }

  /**
  * @} End of "defgroup loft_deploy".
  */

})(jQuery);
