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
      if($('.ajax-loaded-maps h2').text() == '1992'){
        $('.map-link').first().addClass('active');
      }
      $('.tooltip-show').add();
      $('.tooltip-show').hide();
      $( ".page-map .land" ).mouseover(function(event) {
        $(this).mousemove(function( event ) {
          $(this).css({'fill':'#ccc'})
          $('.tooltip-show').add();
          $('.tooltip-show').css({'top':event.pageY-50,'left':event.pageX-50, 'position':'absolute', 'border':'1px solid black', 'padding':'5px', 'background':'rgba(255,255,255,0.6)'});
          $('.tooltip-show').show();
        });
        $('.tooltip-show').append($(this).attr("title"));
      });
      $('.page-map .land').mouseout(function() {
        $(this).css({'fill':'#beeb9f'});
        $('.tooltip-show').hide();
        $('.tooltip-show').empty();
      });
      $('.page-map .land').click(function() {
        $(this).css({'fill':'#ccc'});
        var nid = $(this).attr('id');
        //console.log(nid);
        $.ajax({
            url: 'ajax/' + nid,
            success: function(data) {
                //console.log(data);
                $(".st-menu").html(data[1]['data']);
            }
        }); 
        $('.tooltip-show').hide();
        var container = document.getElementById( 'st-container' );
        $(container).addClass('st-effect-2');
        setTimeout( function() {
          $(container).addClass('st-menu-open');
        }, 25 );
      });
      $('.map-link').click(function() {
        $('.map-link').removeClass('active');
        $(this).addClass('active');
        var nid = $(this).attr('id');
        //console.log(nid);
        $('.ajax-loaded-maps .preloader').addClass('active');
        $.ajax({
            url: 'ajax-map/' + nid,
            success: function(data) {
                //console.log(data[1]['data']);
                $(".ajax-loaded-maps").html(data[1]['data']);
            }
        }); 
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