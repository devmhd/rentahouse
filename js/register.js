
function enableValidation(){

  $('#registrationForm input').tooltipster({
    trigger: 'custom',
    onlyOne: false,
    position: 'left'
  });


  $('#registrationForm').validate({
    errorPlacement: function (error, element) {

      var lastError = $(element).data('lastError'),
      newError = $(error).text();

      $(element).data('lastError', newError);

      if(newError !== '' && newError !== lastError){
        $(element).tooltipster('content', newError);
        $(element).tooltipster('show');
      }
    },
    success: function (label, element) {
      $(element).tooltipster('hide');
    },

    rules: {
      email: { required: true, email:true, remote: "service/checkemail"},
      password: {required: true, minlength: 6},
      password_repeat: { equalTo: "#password" },
      name: { required: true },
      contact: { required: true}
    }
  });


}



$(document).ready(function(){

	enableValidation();
});