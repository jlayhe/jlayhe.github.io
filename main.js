$(document).ready(function() {

  // Mobile navigation
  $('.js-menu-toggle').click(function() {
  	$('#menu').slideToggle();
  });

  // Smooth anchor
  $('.js-go-to').click(function(event) {
  event.preventDefault();
    var offset = 0;
    var $target = $($(this).attr('href'));

    $('html, body').animate({
        scrollTop: $target.offset().top + offset
    }, 2000);
  });

});
