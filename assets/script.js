jQuery(document).ready(function($) {

    $('.cp-cat-list_item').on('click', function() {
        $('.cp-cat-list_item').removeClass('active');
        $(this).addClass('active');
      
        $.ajax({
          type: 'POST',
          url: cp_filter.ajaxurl,
          dataType: 'html',
          data: {
            action: 'cp_filter',
            tax_term: $(this).data('slug'),
          },
          success: function(res) {
            $('#main .row').html(res);
          }
        })
      });

})