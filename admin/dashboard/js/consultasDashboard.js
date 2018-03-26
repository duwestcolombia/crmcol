$(document).ready(function() {
	$("#graf").hide();
  cargaRepVisita();
	cargaUsuActivos();
	myMap()
  //con esta propiedad se ejecuta esta funcion cada segundo
	/*setInterval(cargaRepVisita, 1000);*/
});

function cargaRepVisita(){
	var tabla= $.ajax({
		url:"../../php/admin/cargaRepVisitas.php",
		//traer los datos de forma plana
		dataType:'text',
		async:false
	}).responseText;
	document.getElementById("tab_repVisitas").innerHTML= tabla;
	
}

function cargaUsuActivos(){

	var tabla=$.ajax({

		url:"../../php/admin/cargaUsuActivos.php",

		dataType: 'text',
		async:false
	}).responseText;
	document.getElementById("tab_usuactivos").innerHTML= tabla;
}



function myMap() {
  
  var nomusuario=document.getElementById("nom_usuario").value;

  var map = new google.maps.Map(document.getElementById('map'), {
    center: {lat: -34.397, lng: 150.644},
    zoom: 6
  });
  var infoWindow = new google.maps.InfoWindow({
    map: map
  });

  // Try HTML5 geolocation.
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(function(position) {
      var pos = {
        lat: position.coords.latitude,
        lng: position.coords.longitude
      };

      infoWindow.setPosition(pos);
      infoWindow.setContent('Usuario Encontrado.' + pos);
      map.setCenter(pos);
    }, 
    function() {
      handleLocationError(true, infoWindow, map.getCenter());
    });
  } 
  else 
  {
    // Browser doesn't support Geolocation
    handleLocationError(false, infoWindow, map.getCenter());
  }
}

function handleLocationError(browserHasGeolocation, infoWindow, pos) {
  infoWindow.setPosition(pos);
  infoWindow.setContent(browserHasGeolocation ?
                        'Error: The Geolocation service failed.' :
                        'Error: Your browser doesn\'t support geolocation.');
}

