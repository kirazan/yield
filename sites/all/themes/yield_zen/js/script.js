/**
 * @file
 * A JavaScript file for the theme.
 *
 * In order for this JavaScript to be loaded on pages, see the instructions in
 * the README.txt next to this file.
 */

// JavaScript should be made compatible with libraries other than jQuery by
// wrapping it with an "anonymous closure". See:
// - https://drupal.org/node/1446420
// - http://www.adequatelygood.com/2010/3/JavaScript-Module-Pattern-In-Depth
(function ($, Drupal, window, document, undefined) {


// To understand behaviors, see https://drupal.org/node/756722#behaviors
Drupal.behaviors.my_custom_behavior = {
  attach: function(context, settings) {

    $(window).scroll(function(){
        if ($(this).scrollTop() > 0){
          $('body').addClass('fixed-menu');
        }
        else {
          if ($('body').hasClass('fixed-menu')) {
            $('body').removeClass('fixed-menu');
          }

        }
    });

    $(document).ready(function() {
      $('.tooltip-show').add();
      $('.tooltip-show').hide();
      $( ".land" ).mouseover(function(event) {
        $(this).mousemove(function( event ) {
          $('.tooltip-show').add();
          $('.tooltip-show').css({'top':event.pageY-50,'left':event.pageX-50, 'position':'absolute', 'border':'1px solid black', 'padding':'5px'});
          $('.tooltip-show').show();

        });
        $('.tooltip-show').append($(this).attr("title"));
      });
      $('.land').mouseout(function() {
            $('.tooltip-show').hide();
            $('.tooltip-show').empty();
      });
      $('.land').click(function() {
        $('.tooltip-show').hide();
        var container = document.getElementById( 'st-container' );
        $(container).addClass('st-effect-2');
        setTimeout( function() {
          $(container).addClass('st-menu-open');
        }, 25 );
      });
      $('#st-container').click(function() {
        if ($(this).hasClass('st-effect-2 st-menu-open')) {
            $(this).removeClass('st-effect-2 st-menu-open');
          }
      });
      

      $('#graph').click(function(e) {
        return false;
      });

    });


  }
};


})(jQuery, Drupal, this, this.document);
