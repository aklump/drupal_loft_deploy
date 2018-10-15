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
    if (!settings.loftDeploy) {
      return;
    }
    var $toggle = $('.loft-deploy .js-loft-deploy__hide');

    // Single click hides until next page load
    $toggle.once().click(function (e) {

      // Was the meta key held down? Set cookie?
      if (e.metaKey) {
        $('.loft-deploy').fadeOut(function () {
          $('.loft-deploy').fadeIn(function () {
            $('.loft-deploy').fadeOut();
          });
        });

        // Cookie handling
        var expiry = new Date(),
          time = expiry.getTime() + settings.loftDeploy.metaTimeout * 1000;
        expiry.setTime(time);

        $.cookie('loft_deploy', 'hidden', {
          expires: expiry
        });
      }
      else {
        $('.loft-deploy').fadeOut();
      }
      return false;
    });
  };
})(jQuery);
