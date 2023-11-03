
jQuery( document ).ready(function() {
       // confirm delete
    $(document).on('click', '.actionDelete', function(e) {
        e.preventDefault();
        if (confirm('Are you sure ?')) {
            window.location = $(this).attr('href');
          } else {
            return false;
          }
    });
});
