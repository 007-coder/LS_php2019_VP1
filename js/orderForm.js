(function ($) {

  $(document).ready(function() {

    $('.order__form .orderAJAXResponce .close_btn').click(function(e) {
      $('.order__form .orderAJAXResponce').fadeOut('400');
    });  

    $('.order__form #order-form').submit(function(event) {
      event.preventDefault();

      var 
      ajaxUrl = $(this).attr('action'),
      action = $(this).find('input[name="action"]').val(),
      comment = $(this).find('textarea[name="comment"]').text(),
      name = $(this).find('input[name="name"]').val(),
      phone = $(this).find('input[name="phone"]').val(),
      email = $(this).find('input[name="email"]').val(),
      street = $(this).find('input[name="street"]').val(),
      home = $(this).find('input[name="home"]').val(),
      part = $(this).find('input[name="part"]').val(),
      appt = $(this).find('input[name="appt"]').val(),
      floor = $(this).find('input[name="floor"]').val(),
      payment = $(this).find('input[name="payment"]').val(),
      callback = $(this).find('input[name="callback"]').val(),

      //html elements
      resp = $(this).parent('.order__form').find('.orderAJAXResponce'),
      respH2 = $(this).parent('.order__form').find('.orderAJAXResponce .status-popup__message h2'),
      respH4 = $(this).parent('.order__form').find('.orderAJAXResponce .status-popup__message h4');

      respH2.html();
      respH4.html();
      

      $.post(
        ajaxUrl, 
        {
          engine: 'ajax',  
          action : action,      
          comment: comment,
          name: name,
          phone: phone,
          email: email,
          street: street,
          home: home,
          part: part,
          appt: appt,
          floor: floor,
          payment: payment,
          callback: callback 

        }, 

        function(data, textStatus, xhr) {
          data = JSON.parse(data);

          respH2.html(data.message);
          respH4.html(data.user_type);
          resp.fadeIn(400);

        });
      
      


    });


  });


})(jQuery);
