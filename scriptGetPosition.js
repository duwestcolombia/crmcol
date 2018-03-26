//En Javascript:
navigator.geolocation.getCurrentPosition(fn_ok, fn_error);

function fn_error(){

alert('Error');
}

function fn_ok(respuesta){

var lat = respuesta.coords.latitude;
var lon = respuesta.coords.longitude;

global="lat="+lat+'&lon='+lon;
var urlDestino = "http://localhost/webventasdw/pruebaGetPosition2.php?"+global;
//Esto genera: http://fredyfx.com/index.cshtml?lat=-8.1167518&lon=-79.0371252
alert(global);
window.open(urlDestino, '_self');
}