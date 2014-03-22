
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



var map;
var bounds;

function initialize()
{

	var mapProp = {
		disableDoubleClickZoom: false,
		center:new google.maps.LatLng(23.8, 90.2),
		zoom:7,
		mapTypeId:google.maps.MapTypeId.ROADMAP
	};


	map=new google.maps.Map(document.getElementById("map_canvas"),mapProp);

	bounds = new google.maps.LatLngBounds();

	var infoWindows = [];
	var markers = [];

	jQuery.each(ads, function (index, ad){

		bounds.extend(new google.maps.LatLng(parseFloat(ad.lat), parseFloat(ad.lng)));
		var infowindow = new google.maps.InfoWindow({
		content: "<div class='col-md-12'><h4 style='margin-top:5px;margin-bottom:10px' class='row' id='markerheader'><big>" + parseInt(ad.rent).formatMoney(0, ',', '') + "</big> /mo</h4><div class='row' id='markeraddress'><span><big>" + parseInt(ad.sqft).formatMoney(0, ',', '') + "</big> sqft  |  <big>" + ad.n_bed + "</big> br  |  <big>" + ad.n_bath + "</big> ba </span></div></div>"
		});

		infoWindows.push(infowindow);

		var marker = new google.maps.Marker({
			position: new google.maps.LatLng(parseFloat(ad.lat), parseFloat(ad.lng)),
			title: 'Click for details',
			map: map});

		markers.push(marker);

		google.maps.event.addListener(markers[index], 'mouseover', function() {

			infoWindows[index].open(map,markers[index]);

		});

		google.maps.event.addListener(markers[index], 'mouseout', function() {

			infoWindows[index].close(map,markers[index]);

		});

		google.maps.event.addListener(markers[index], 'click', function() {

			window.location.assign(base_url + 'ad/' + ad.slug);

		});

	});



	

    

    if(ads.length === 1){
    	
    	map.panTo(bounds.getCenter());
    	map.setZoom(17);

    }else{
    	map.fitBounds(bounds);
    }

}

google.maps.event.addDomListener(window, 'load', initialize);





