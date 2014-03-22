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
    
      minrent: { number: true},
      maxrent: { number: true}

    }
  });


}

function interactiveMap(){

  $.get("service/districts", function(districtArray){

    var html = "<option value='all'>All Regions</option>";

    $.each(districtArray, function (index, district){
      html += "<option value='" + district.id + "'>" + district.name + "</option>";
    });

    $("#sel_region").html(html);

    $("#sel_region").change(function(){

      var region_id = $("#sel_region").val();

      $.get("service/area/" + region_id, function(areaArray){

        var html = "<option value='all'>All Areas</option>";

        $.each(areaArray, function (index, area){
          html += "<option value='" + area.id + "'>" + area.name + "</option>";
        });

        $("#sel_area").html(html);


        $("#sel_area").change(function(){
          var area_id = $("#sel_area").val();

          $.get("service/neighborhood/" + area_id, function(neighArray){

            var html = "<option value='all'>All Neighborhoods</option>";

            $.each(neighArray, function (index, neigh){
              html += "<option value='" + neigh.id + "'>" + neigh.name + "</option>";
            });

            $("#sel_neigh").html(html);


            



          });

         



        });



});



});

});

}


$(document).ready(function(){

 


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