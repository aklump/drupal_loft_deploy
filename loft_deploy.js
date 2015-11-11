
/**
 * @file
 * The main javascript file for the loft_deploy module
 *
 * @ingroup loft_deploy
 * @{
 */

(function ($) {

  Drupal.loftDeploy = Drupal.loftDeploy || {};
  Drupal.behaviors.loftDeploy = Drupal.behaviors.loftDeploy || {};
  Drupal.behaviors.loftDeploy.attach = function (context, settings) {
    var $toggle = $('.loft-deploy .loft-deploy-hide-trigger');
    var duration = settings.loftDeploy.metaTimeout;

    // Single click hides until next page load
    $toggle.click(function(e) {
      var self = this;

      // Was the meta key held down? Set cookie?
      if (e.metaKey) {
        $('.loft-deploy').fadeOut(function() {
          $('.loft-deploy').fadeIn(function() {
            $('.loft-deploy').fadeOut();
          });
        });

        // Cookie handling
        var c_name = 'loft_deploy';
        var c_value = 'hidden';
        
        var expiry = new Date();
        var time = expiry.getTime();
        time += duration * 1000;
        expiry.setTime(time);

        $.cookie(c_name, c_value, {
          expires: expiry
        });

        console.log(c_name, c_value, expiry);
      }
      else {
        $('.loft-deploy').fadeOut();
      }
      return false;
    });
  };

  /**
  * @} End of "defgroup loft_deploy".
  */

})(jQuery);
