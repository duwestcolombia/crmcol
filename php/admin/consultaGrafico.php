<?php 
session_start();
//validar si el usuario se Logeo, de lo contrario no lo deje ingresar
if(!$_SESSION)
{
	header("location:../ingreso.php");
}
require '../conexionbd.php';
//$tipcliente=$_GET['usu'];
$tipcliente=$_POST['usu'];

echo $tipcliente;


    $consultotal=$db->query("SELECT c.id_cliente, c.nom_cliente, c.tipo_cliente, cc.total_peconomico,cc.total_rpersonal FROM cliente c, cliente_calificacion cc Where c.id_cliente=cc.id_cliente and cc.id_usuario='$tipcliente' and cc.total_peconomico>0 and cc.total_rpersonal>0")or die($db->error);

    while ($obj = $consultotal->fetch_object()) {
        $arr[] = array(
            'x' => '-'.$obj->total_rpersonal,
            'y' => $obj->total_peconomico,
            
            'name' => utf8_encode($obj->nom_cliente),
            'idcliente' => $obj->id_cliente,
            'tcliente' => $obj->tipo_cliente,
                       
                       
            );
    }
    echo json_encode($arr,JSON_NUMERIC_CHECK);


    $db->close();
 

?>