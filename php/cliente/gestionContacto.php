<?php 
session_start();
require '../conexionbd.php';

$nom=$_POST['nom'];
$tel=$_POST['tel'];
$cel=$_POST['cel'];
$email=$_POST['email'];
$fcumple=$_POST['fcumple'];
$cliente=$_POST['cliente'];


$inserContacto=$db->query("INSERT INTO contacto(id_contacto, nom_contacto, tel_contacto, cel_contacto, email_contacto, fcumpleanos_contacto, id_cliente) 
	VALUES (NULL,'$nom','$tel','$cel','$email','$fcumple','$cliente')")or die('Error al agregar este contacto: '.$db->error);

if ($inserContacto) {
	echo '<div class="alert alert-info fade in">
       <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
       <strong>Contacto Agregado!</strong> Este contacto se agrego correctamente, puedes seguir agregando contactos o cerrar y continuar con la actualización.
        </div>';
}


?>