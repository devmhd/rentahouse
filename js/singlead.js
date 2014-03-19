 




function printPage(){
	var w = window.open();

	var headers =  $("#headers").html();
	var field= $("#field1").html();
	var field2= $("#field2").html();

	var html = "<!DOCTYPE HTML>";

	html+= "<html>";
	html+= "<head>";
	html+= "	<title>House Details</title>";
	html+= "	<link rel='stylesheet' type='text/css' href='../css/print.css'>";
	html+= "</head>";
	html+= "<body>";
	html+= "	<div >";
	html+= "		<h1 style='text-align:center'>Address</h1>";
	html+= "		<p style='text-align:center'>" + g_address + "</p>";
	html+= "	</div>";
	html+= "	<h2>Owner\'s Name</h2>";
	html+= "	<p>" + g_ownername + "</p>";
	html+= "";
	html+= "	<h2>Contact " + g_ownername + "</h2>";
	html+= "	<p>" + g_contact + "</p>";
	html+= "	<footer>";
	html+= "		<h4>Info taken from Rentahouse.com</h4> ";
	html+= "		<p>www.rentahouse.com</p>";
	html+= "	</footer>";
	html+= "</body>";
	html+= "</html>";

        //check to see if they are null so "undefined" doesnt print on the page. <br>s optional, just to give space
        if(headers != null) html += headers + "<br/><br/>";
        if(field != null) html += field + "<br/><br/>";
        if(field2 != null) html += field2 + "<br/><br/>";

        html += "</body>";
        w.document.write(html);
        w.window.print();
        w.document.close();
    };

    $(document).ready(function(){

    	$('.bxslider').bxSlider({
    		mode: 'fade',
    		captions: true,
    		adaptiveHeight: true
    	});

    	$("button").tooltip();

    	$('#orating').raty({ 
    		score: 3,
    		starOn: "../star-on.png",
    		starOff: "../star-off.png"
    	});

    	$('#wrating').raty({ 
    		score: 5,
    		starOn: "../star-on.png",
    		starOff: "../star-off.png"
    	});

    	$('#erating').raty({ 
    		score: 3,
    		starOn: "../star-on.png",
    		starOff: "../star-off.png"
    	});

    	$('#grating').raty({ 
    		score: 4,
    		starOn: "../star-on.png",
    		starOff: "../star-off.png"
    	});

    	$('#contactBtn').click(function(){
    		$('#ownerno').text(g_contact);
    	});

    	$('#btnPrintAddress').click(function(){
    		printPage();
    	});




    });


    var map;


    function initialize()
    {

      var mapProp = {
        disableDoubleClickZoom: false,
        center:new google.maps.LatLng(g_lat, g_lng),
        zoom:16,
        mapTypeId:google.maps.MapTypeId.ROADMAP
    };

    map=new google.maps.Map(document.getElementById("gmap_canvas"),mapProp);








    var marker1 = new google.maps.Marker({
        position: new google.maps.LatLng(g_lat, g_lng),
        title: g_title,
        map: map});



}


google.maps.event.addDomListener(window, 'load', initialize);

$('#mapModal').on('shown.bs.modal', function () {

    $('#gmap_canvas').width($('#mapModal').find('.modal-body .row').width());
    google.maps.event.trigger(map, "resize");
    map.panTo(new google.maps.LatLng(g_lat, g_lng));
});





