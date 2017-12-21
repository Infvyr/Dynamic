(function($){
  $(function(){
    $('.button-collapse').sideNav();
    $('.modal-trigger').leanModal({
      dismissible: true, // Modal can be dismissed by clicking outside of the modal
      opacity: .5, // Opacity of modal background
      in_duration: 300, // Transition in duration
      out_duration: 200, // Transition out duration
    }
  );

    $('.collapsible').collapsible({
      accordion : true
    });

    /* Slider call */
    $('.slider').slider({full_width: true});

    /* Calendar call */
    $('#calendar').datepicker({
        inline: true,
        firstDay: 1,
        showOtherMonths: true,
        dayNamesMin: ['Dum', 'Lun', 'Mar', 'Mie', 'Joi', 'Vin', 'Sîm']
    });

    /* to Top Button */
    //Check to see if the window is top if not then display button
    $(window).scroll(function(){
      if ($(this).scrollTop() > 400) {
        $('#toTop').fadeIn();
      } else {
        $('#toTop').fadeOut();
      }
    });

    //Click event to scroll to top
    $('#toTop').click(function(){
      $('html, body').animate({scrollTop : 0},800);
      return false;
    });

  $('.right li').click(function(){
    $('.right li').removeClass("active");
    $(this).addClass("active");
  });



  }); // end of document ready
})(jQuery); // end of jQuery name space

