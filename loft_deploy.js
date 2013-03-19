
/**
 * @file
 * The main javascript file for the loft_deploy module
 *
 * @ingroup loft_deploy
 * @{
 */
$(document).ready(function() {
  var $toggle = $('.loft-deploy .hide');
  $toggle.click(function() {
    $('.loft-deploy').fadeOut();
  });
});
