<?php 
require '../controller/conexionbd.php';

$usuconsulta=$_SESSION['usuario_sesion'];

$consulRepVisita = $db -> query("SELECT v.fecha_visita,v.id_cliente,v.nomesporadico_visita,c.nom_cliente,c.tipo_cliente,mun.nom_municipio,
 cul.nom_cultivo, z.nom_zona ,v.id_usuario,v.sitzona_visita,v.sitcompetencia_visita,v.rvisita_visita 
		FROM visita v, cliente c, usuario u, cultivo cul, cliente_cultivo cc, municipio mun, cliente_municipio cm, zona z, cliente_zona cz 
		WHERE u.id_usuario <> '$usuconsulta'
		and v.id_usuario = u.id_usuario 
		and v.id_cliente=c.id_cliente 
		and c.id_cliente=cc.id_cliente 
		and cul.id_cultivo=cc.id_cultivo 
		and mun.id_municipio=cm.id_municipio 
		and c.id_cliente=cm.id_cliente 
		and z.id_zona=cz.id_zona 
		and c.id_cliente=cz.id_cliente
	
		and u.id_rol<>'2'
		GROUP BY v.id_visita") or die($db->error);
		/* determinar el número de filas del resultado */
		$numFilas = $consulRepVisita->num_rows;	

while ($res=$consulRepVisita->fetch_assoc()) {
	$numFilas = $res->num_rows;	
	echo'<div class="row">
	                    <div class="col-lg-3 col-md-6">
	                        <div class="panel panel-primary">
	                            <div class="panel-heading" id="tanjetaVisita">
	                                <!--<div class="row">
	                                    <div class="col-xs-3">
	                                        <i class="fa fa-comments fa-5x"></i>
	                                    </div>
	                                    <div class="col-xs-9 text-right">
	                                        <div class="huge">1</div>
	                                        <div>Visitas registradas en este mes!</div>
	                                    </div>
	                                </div>
	                            </div>
	                            <a href="#">
	                                <div class="panel-footer">
	                                    <span class="pull-left">View Details</span>
	                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
	                                    <div class="clearfix"></div>
	                                </div>
	                            </a>-->
	                        </div>
	                    </div>';
}


$consulRepVisita->close();
?>