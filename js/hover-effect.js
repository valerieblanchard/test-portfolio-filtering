/**
 * hover effect for touch device
 * add class .hover in html for anything you want to work with
 * function will add .hover_effect
 * https://stackoverflow.com/questions/2851663/how-do-i-simulate-a-hover-with-a-touch-in-touch-enabled-browsers
 *
 */
jQuery(document).ready(function($) {
  $('.hover').bind('touchstart touchend', function() {
      $(this).toggleClass('hover_effect');
  });
});