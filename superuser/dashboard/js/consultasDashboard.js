$(document).ready(function() {
	$("#graf").hide();
  cargaRepVisita();
	cargaUsuActivos();
	myMap();
  //cargaTarjetasDashboard();
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


/*var map;
function myMap() {

  var nomusuario=document.getElementById("nom_usuario").value;

  map = new google.maps.Map(document.getElementById('map'), {
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
      }/*, function(positionError)
      {
        switch (positionError.code)
        {
          case positionError.PERMISSION_DENIED:
            map.innerHTML = "No se ha permitido el acceso a la posición del usuario.";
          break;
          case positionError.POSITION_UNAVAILABLE:
            map.innerHTML = "No se ha podido acceder a la información de su posición.";
          break;
          case positionError.TIMEOUT:
            map.innerHTML = "El servicio ha tardado demasiado tiempo en responder.";
          break;
          default:
            map.innerHTML = "Error desconocido.";
        }
      }, {
      maximumAge: 75000,
      timeout: 15000
      });*/

    /*  infoWindow.setPosition(pos);
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
}*/

var x =document.getElementById("lbl_title");
function myMap(){
  if (navigator.geolocation) {
          navigator.geolocation.getCurrentPosition(showPosition, showError);
      } else { 
          x.innerHTML = "Geolocation is not supported by this browser.";
      }
}




  function showPosition(position) {
      lat = position.coords.latitude;
      lon = position.coords.longitude;
      latlon = new google.maps.LatLng(lat, lon)
      /*mapholder = document.getElementById('mapholder')
      mapholder.style.height = '250px';
      mapholder.style.width = '500px';*/

      var myOptions = {
      center:latlon,zoom:6,
      mapTypeId:google.maps.MapTypeId.ROADMAP,
      mapTypeControl:false,
      navigationControlOptions:{style:google.maps.NavigationControlStyle.SMALL}
      }
      
      var map = new google.maps.Map(document.getElementById("map"), myOptions);
      var marker = new google.maps.Marker({position:latlon,map:map,title:"You are here!"});
  }

  function showError(error) {
      switch(error.code) {
          case error.PERMISSION_DENIED:
              x.innerHTML = "User denied the request for Geolocation."
              break;
          case error.POSITION_UNAVAILABLE:
              x.innerHTML = "Location information is unavailable."
              break;
          case error.TIMEOUT:
              x.innerHTML = "The request to get user location timed out."
              break;
          case error.UNKNOWN_ERROR:
              x.innerHTML = "An unknown error occurred."
              break;
      }
  }



/*function cargaTarjetasDashboard(){
  var tajetaVisita= $.ajax({
    url:"../model/consulTarjetas.php",
    //traer los datos de forma plana
    dataType:'text',
    async:false
  }).responseText;
  document.getElementById("tanjetaVisita").innerHTML= tajetaVisita;
}*/