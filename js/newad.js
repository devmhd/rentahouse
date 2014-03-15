Number.prototype.formatMoney = function (decPlaces, thouSeparator, decSeparator) {
  var n = this,
  decPlaces = isNaN(decPlaces = Math.abs(decPlaces)) ? 2 : decPlaces,
  decSeparator = decSeparator === undefined ? "." : decSeparator,
  thouSeparator = thouSeparator === undefined ? "," : thouSeparator,
  sign = n < 0 ? "-" : "",
  i = parseInt(n = Math.abs(+n || 0).toFixed(decPlaces)) + "",
  j = (j = i.length) > 3 ? j % 3 : 0;
  return sign + (j ? i.substr(0, j) + thouSeparator : "") + i.substr(j).replace(/(\d{3})(?=\d)/g, "$1" + thouSeparator) + (decPlaces ? decSeparator + Math.abs(n - i).toFixed(decPlaces).slice(2) : "");
};





function handleFileSelect(evt) {
  var files = evt.target.files;

  for (var i = 0, f; f = files[i]; i++) {

    if (!f.type.match('image.*')) {
      alert("Only images are allowed");
      continue;
    }
    var reader = new FileReader();

    reader.onload = (function(theFile) {
      return function(e) {

        e.target.result

        

      };
    })(f);

    reader.readAsDataURL(f);
  }
}

//document.getElementById('fileinput').addEventListener('change', handleFileSelect, false);
//$('#fileinput').on('change', handleFileSelect);

$('#addBtn').click(function(){
  var html = "<div class='upload-gallery-single row'><div class='col-md-3'><img class='just-uploaded' src='"  + "'></div><div class='col-md-9'><input class='images' type='file' name='images[]' /><textarea name='img-desc[]' class='form-control' placeholder='Small description of the photo; eg. The spacious living room'></textarea><a class='remove-photo btn btn-sm btn-info' style='margin-top:10px' >Remove</a></div></div>";

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


var map;
var marker;
function initialize()
{
  var markerInitPos = new google.maps.LatLng(55.3, 44.5);
  var mapProp = {
    disableDoubleClickZoom: true,
    center:new google.maps.LatLng(23.8, 90.2),
    zoom:7,
    mapTypeId:google.maps.MapTypeId.ROADMAP
  };
  map=new google.maps.Map(document.getElementById("gmap_canvas"),mapProp);


  marker = new google.maps.Marker({
    position: markerInitPos,
    map: map
  });

  google.maps.event.addListener(map, 'dblclick', function(event) {
    placeMarker(event.latLng);
    $('#latInput').val(event.latLng.lat());
    $('#lngInput').val(event.latLng.lng());

    $('#gmap_canvas').tooltipster('content', "<h3 style='margin-top:5px'>DONE!</h3><p>You can change the location by double clicking on another location.</p>");

  });
}

google.maps.event.addDomListener(window, 'load', initialize);





function placeMarker(location) {

 marker.setPosition(location);

}


function decimate(element){
  element.blur(function(){
    var valstr = $(this).val();

    if(!isNaN(valstr)){
      var val = parseInt(valstr);
      val = val.formatMoney(2, ',', '.');
      $(this).val(val);
    }

  });
}

function enableValidation(){

  $('#theForm input[type="text"], input[type="date"], #theForm select, #theForm textarea').tooltipster({
    trigger: 'custom',
    onlyOne: false,
    position: 'bottom-left'
  });


  $.validator.addMethod("valueNotEquals", function(value, element, arg){
    return arg != value;
  }, "Please select one.");

  $('#theForm').validate({
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
      title: { required: true},
      region: { valueNotEquals: "none"},
      area: { valueNotEquals: "none"},
      neigh: { valueNotEquals: "none"},
      address: { required: true},
      n_bed: { valueNotEquals: "none"},
      n_bath: { valueNotEquals: "none"},
      n_living: { valueNotEquals: "none"},
      n_balcony: { valueNotEquals: "none"},
      n_dining: { valueNotEquals: "none"},
      sqft: { required: true, number: true},
      rent: { required: true, number: true},
      availabledate: { required: true},
      contactno: { required: true, number: true}
    }
  });


}

function interactiveMap(){

  $.get("service/districts", function(districtArray){

    var html = "<option value='none'>Select Region</option>";

    $.each(districtArray, function (index, district){
      html += "<option value='" + district.id + "'>" + district.name + "</option>";
    });

    $("#sel_region").html(html);





    $("#sel_region").change(function(){

      var region_id = $("#sel_region").val();

      $.get("service/area/" + region_id, function(areaArray){

        var html = "<option value='none'>Select Area</option>";

        $.each(areaArray, function (index, area){
          html += "<option value='" + area.id + "'>" + area.name + "</option>";
        });

        $("#sel_area").html(html);


        $("#sel_area").change(function(){
          var area_id = $("#sel_area").val();

          $.get("service/neighborhood/" + area_id, function(neighArray){

            var html = "<option value='none'>Select Neighborhood</option>";

            $.each(neighArray, function (index, neigh){
              html += "<option value='" + neigh.id + "'>" + neigh.name + "</option>";
            });

            $("#sel_neigh").html(html);


            $("#sel_neigh").change(function(){

              var neigh_id = $("#sel_neigh").val();

              $.each(neighArray, function (index, neigh){
                if(neigh.id == neigh_id){

                  console.log(neigh);
                  map.panTo(new google.maps.LatLng(parseFloat(neigh.lat), parseFloat(neigh.lng)));
                  map.setZoom(16);
                }
              });

            });



          });

          $.each(areaArray, function (index, area){
            if(area.id == area_id){

              console.log(area);
              map.panTo(new google.maps.LatLng(parseFloat(area.lat), parseFloat(area.lng)));
              map.setZoom(14);
            }
          });



        });



});

$.each(districtArray, function (index, district){
  if(district.id == region_id){


    map.panTo(new google.maps.LatLng(parseFloat(district.lat), parseFloat(district.lng)));
    map.setZoom(11);
  }
});

});

});

}


$(document).ready(function(){

  var container = $('#gmap_canvas').closest('.col-md-6');
  var width = container.width();
  $('#gmap_canvas').width(width);


  $('#gmap_canvas').tooltipster({
    content: "<h3 style='margin-top:5px'>Map Guide</h3><p><ol><li>Select <strong>Area, Region and Neighborhoor</strong> on the left.</li><li>Navigate to your house location.</li> <li>Then <strong>double click</strong> on the exact location of your house.</li></ol></p>",
    theme: 'tooltipster-shadow',
    contentAsHTML: true,
    arrow: false,
    offsetY: -10
  });


  interactiveMap();

  enableValidation();


});