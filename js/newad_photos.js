
$(document).ready(function(){

  $('#addBtn').click(function(){
  var html = "<div class='upload-gallery-single row'><div class='col-md-3'><img class='just-uploaded' src='"  + "'></div><div class='col-md-9'><input class='images' type='file' name='images[]' /><textarea name='img-desc' class='form-control' placeholder='Small description of the photo; eg. The spacious living room'></textarea><a class='remove-photo btn btn-sm btn-info' style='margin-top:10px' >Remove</a></div></div>";

  $('.upload-gallery').append(html);

  $('.remove-photo').off('click');
  $('.remove-photo').on('click', function(){
    $(this).closest('.upload-gallery-single').remove();



  });

  $('.images').off('change');
  $('.images').on('change', function(evt){

    var imgtag = $(this).closest('.upload-gallery-single').find('img');

    var files = evt.target.files;

    for (var i = 0, f; f = files[i]; i++) {

      if (!f.type.match('image.*')) {
        alert("Only images are allowed");
        continue;
      }
      var reader = new FileReader();

      reader.onload = (function(theFile) {
        return function(e) {

          imgtag.attr('src', e.target.result);



        };
      })(f);

      reader.readAsDataURL(f);
    }
  });


});

});