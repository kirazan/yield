(function ($) {
  Drupal.behaviors.ajax_example = {
    attach:function (context) {
 
      // If the site name is present set it to the username.
      if ($('#yield-table-body', context).length) {
        $.ajax({
          url: '/ajax/username',
          success: function(data) {
 
            // Change site name to current user name.
            $('#yield-table-body').html(data + '.com');
         }
        });
      }
    }
  }
})(jQuery);