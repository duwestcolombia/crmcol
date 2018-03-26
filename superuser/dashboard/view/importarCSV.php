<?php 

require '../controller/conexionbd.php';
require '../controller/conexionbdaudi.php';
//obtenemos el archivo .csv
$tipo = $_FILES['archivo']['type'];
 
$tamanio = $_FILES['archivo']['size'];
 
$archivotmp = $_FILES['archivo']['tmp_name'];

$op=$_POST['opcion'];
$tab=$_POST['tabla'];
date_default_timezone_set("America/Bogota");

 
//cargamos el archivo
$lineas = file($archivotmp);
 
switch ($op) {
  case 'insertar':
    switch ($tab) {
      case 'cliente':
        //inicializamos variable a 0, esto nos ayudará a indicarle que no lea la primera línea
        $i=0;

         
        //Recorremos el bucle para leer línea por línea
        foreach ($lineas as $linea_num => $linea)
        { 
           //abrimos bucle
           /*si es diferente a 0 significa que no se encuentra en la primera línea 
           (con los títulos de las columnas) y por lo tanto puede leerla*/
           if($i != 0) 
           { 
               //abrimos condición, solo entrará en la condición a partir de la segunda pasada del bucle.
               /* La funcion explode nos ayuda a delimitar los campos, por lo tanto irá 
               leyendo hasta que encuentre un ; */
               $datos = explode(";",$linea);

               $hoy=date("Y-m-d h:i:sa");
         
               //Almacenamos los datos que vamos leyendo en una variable
               $idcli = trim($datos[0]);
               $codcli = trim($datos[1]);
               $nomcli = trim($datos[2]);
               $tipcli = trim($datos[3]);
               $divcli = trim($datos[4]);
               $estacli = trim($datos[5]);

               //guardamos en base de datos la línea leida
               //mysql_query("INSERT INTO datos(nombre,edad,profesion) VALUES('$nombre','$edad','$profesion')");
            $res=$db->query("INSERT INTO cliente(id_cliente, cod_cliente, nom_cliente, tipo_cliente, division_cliente, estado_cliente) values('$idcli','$codcli','$nomcli','$tipcli','$divcli','$estacli')") or die($db->error);
            if ($res) {
             $dbaudi->query("INSERT INTO cliente(id_cliente, cod_cliente, nom_cliente, tipo_cliente, tiporeg_cliente, division_cliente, estado_cliente, freg_cliente, usureg_cliente) values('$idcli','$codcli','$nomcli','$tipcli','R','$divcli','$estacli','$hoy','dzambrano')") or die($db->error);
            }

               //cerramos condición
           }
         
           /*Cuando pase la primera pasada se incrementará nuestro valor y a la siguiente pasada ya 
           entraremos en la condición, de esta manera conseguimos que no lea la primera línea.*/
           $i++;
           //cerramos bucle
        }
        //$db->close();
        echo 'Cantidad de archivos ingresados, debe restar una fila correspondiente a los titulos '.$i;
        break;

      case 'cliente_municipio':
        //inicializamos variable a 0, esto nos ayudará a indicarle que no lea la primera línea
        $i=0;
         
        //Recorremos el bucle para leer línea por línea
        foreach ($lineas as $linea_num => $linea)
        { 
           //abrimos bucle
           /*si es diferente a 0 significa que no se encuentra en la primera línea 
           (con los títulos de las columnas) y por lo tanto puede leerla*/
           if($i != 0) 
           { 
               //abrimos condición, solo entrará en la condición a partir de la segunda pasada del bucle.
               /* La funcion explode nos ayuda a delimitar los campos, por lo tanto irá 
               leyendo hasta que encuentre un ; */
               $datos = explode(";",$linea);
         
               //Almacenamos los datos que vamos leyendo en una variable
               $idclimun = trim($datos[0]);
               $idcli = trim($datos[1]);
               $idmun = trim($datos[2]);
               $hectcli = trim($datos[3]);
               $hectsem = trim($datos[4]);
               $telcli = trim($datos[5]);
               $fcumplecli = trim($datos[6]);
               $emailcli = trim($datos[7]);
               $dircli = trim($datos[8]);
               $vtotcom = trim($datos[9]);
               $vtotcomnutri = trim($datos[10]);
               $idusu = trim($datos[11]);
               $contaccli = trim($datos[12]);
                /*echo ($idclimun." ".$idcli." ".$idmun." ".$hectcli." ".$hectsem." ".$telcli." ".$fcumplecli." ".$emailcli." ".$dircli." ".$vtotcom." ".$vtotcomnutri." ".$idusu." ".$contaccli);*/
               //guardamos en base de datos la línea leida
               //mysql_query("INSERT INTO datos(nombre,edad,profesion) VALUES('$nombre','$edad','$profesion')");
            $db->query("INSERT INTO cliente_municipio(id_clientemunicipio, id_cliente, id_municipio, hect_cliente, hectsemb_cliente, tel_cliente, fcumpleanos_cliente, email_cliente, direccion_cliente, vtotalcompras_cliente, vtotalcomprasnutri_cliente, id_usuario, contacto_cliente) values('$idclimun','$idcli','$idmun','$hectcli','$hectsem','$telcli','$fcumplecli','$emailcli','$dircli','$vtotcom','$vtotcomnutri','$idusu','$contaccli')") or die($db->error);
               //cerramos condición
           }
         
           /*Cuando pase la primera pasada se incrementará nuestro valor y a la siguiente pasada ya 
           entraremos en la condición, de esta manera conseguimos que no lea la primera línea.*/
           $i++;
           //cerramos bucle
        }
        //$db->close();
        echo 'Cantidad de archivos ingresados, debe restar una fila correspondiente a los titulos '.$i;
        break;

      case 'cliente_cultivo':
          //inicializamos variable a 0, esto nos ayudará a indicarle que no lea la primera línea
          $i=0;
           
          //Recorremos el bucle para leer línea por línea
          foreach ($lineas as $linea_num => $linea)
          { 
             //abrimos bucle
             /*si es diferente a 0 significa que no se encuentra en la primera línea 
             (con los títulos de las columnas) y por lo tanto puede leerla*/
             if($i != 0) 
             { 
                 //abrimos condición, solo entrará en la condición a partir de la segunda pasada del bucle.
                 /* La funcion explode nos ayuda a delimitar los campos, por lo tanto irá 
                 leyendo hasta que encuentre un ; */
                 $datos = explode(";",$linea);
           
                 //Almacenamos los datos que vamos leyendo en una variable
                 $idclicul = trim($datos[0]);
                 $idcli = trim($datos[1]);
                 $idcul = trim($datos[2]);
                 $nhectsem = trim($datos[3]);
                   

                 //guardamos en base de datos la línea leida
                 //mysql_query("INSERT INTO datos(nombre,edad,profesion) VALUES('$nombre','$edad','$profesion')");
              $db->query("INSERT INTO cliente_cultivo(id_clientecultivo, id_cliente, id_cultivo, nhectsembradas_clientecultivo) values('$idclicul','$idcli','$idcul','$nhectsem')") or die($db->error);
                 //cerramos condición
             }
           
             /*Cuando pase la primera pasada se incrementará nuestro valor y a la siguiente pasada ya 
             entraremos en la condición, de esta manera conseguimos que no lea la primera línea.*/
             $i++;
             //cerramos bucle
          }
          //$db->close();
          echo 'Cantidad de archivos ingresados, debe restar una fila correspondiente a los titulos '.$i;
        break;

      case 'cliente_calificacion':
              //inicializamos variable a 0, esto nos ayudará a indicarle que no lea la primera línea
              $i=0;
               
              //Recorremos el bucle para leer línea por línea
              foreach ($lineas as $linea_num => $linea)
              { 
                 //abrimos bucle
                 /*si es diferente a 0 significa que no se encuentra en la primera línea 
                 (con los títulos de las columnas) y por lo tanto puede leerla*/
                 if($i != 0) 
                 { 
                     //abrimos condición, solo entrará en la condición a partir de la segunda pasada del bucle.
                     /* La funcion explode nos ayuda a delimitar los campos, por lo tanto irá 
                     leyendo hasta que encuentre un ; */
                     $datos = explode(";",$linea);
               
                     //Almacenamos los datos que vamos leyendo en una variable
                     $idclical = trim($datos[0]);
                     $tamano = trim($datos[1]);
                     $creci = trim($datos[2]);
                     $finanza = trim($datos[3]);
                     $compt = trim($datos[4]);
                     $total = trim($datos[5]);
                     $conoci = trim($datos[6]);
                     $resp = trim($datos[7]);
                     $pps = trim($datos[8]);
                     $actitud = trim($datos[9]);
                     $total = trim($datos[10]);
                     $idcli = trim($datos[11]);
                     $idusu = trim($datos[12]);

                     //guardamos en base de datos la línea leida
                     //mysql_query("INSERT INTO datos(nombre,edad,profesion) VALUES('$nombre','$edad','$profesion')");
                  $db->query("INSERT INTO cliente_calificacion(id_clientecalificacion, tamano_peconomico, crecimi_peconomico, finanza_peconomico, compt_peconomico, total_peconomico, conoci_rpersonal, resp_rpersonal, pps_rpersonal, actitud_rpersonal, total_rpersonal, id_cliente, id_usuario) values('$idclical','$tamano','$creci','$finanza','$compt','$total','$conoci','$resp','$pps','$actitud','$total','$idcli','$idusu')") or die($db->error);
                     //cerramos condición
                 }
               
                 /*Cuando pase la primera pasada se incrementará nuestro valor y a la siguiente pasada ya 
                 entraremos en la condición, de esta manera conseguimos que no lea la primera línea.*/
                 $i++;
                 //cerramos bucle
              }
              //$db->close();
              echo 'Cantidad de archivos ingresados, debe restar una fila correspondiente a los titulos '.$i;
        break;
      case 'cliente_zona':
         //inicializamos variable a 0, esto nos ayudará a indicarle que no lea la primera línea
         $i=0;
          
         //Recorremos el bucle para leer línea por línea
         foreach ($lineas as $linea_num => $linea)
         { 
            //abrimos bucle
            /*si es diferente a 0 significa que no se encuentra en la primera línea 
            (con los títulos de las columnas) y por lo tanto puede leerla*/
            if($i != 0) 
            { 
                //abrimos condición, solo entrará en la condición a partir de la segunda pasada del bucle.
                /* La funcion explode nos ayuda a delimitar los campos, por lo tanto irá 
                leyendo hasta que encuentre un ; */
                $datos = explode(";",$linea);
          
                //Almacenamos los datos que vamos leyendo en una variable
                $idclizon = trim($datos[0]);
                $idcli = trim($datos[1]);
                $idzon = trim($datos[2]);

                //guardamos en base de datos la línea leida
                //mysql_query("INSERT INTO datos(nombre,edad,profesion) VALUES('$nombre','$edad','$profesion')");
             $db->query("INSERT INTO cliente_zona(id_clientezona, id_cliente, id_zona) values('$idclizon','$idcli','$idzon')") or die($db->error);
                //cerramos condición
            }
          
            /*Cuando pase la primera pasada se incrementará nuestro valor y a la siguiente pasada ya 
            entraremos en la condición, de esta manera conseguimos que no lea la primera línea.*/
            $i++;
            //cerramos bucle
         }
         //$db->close();
         echo 'Cantidad de archivos ingresados, debe restar una fila correspondiente a los titulos '.$i;
        break;       

      /*default:
        # code...
        break;*/
    }
  break;
  case 'actualizar':
      switch ($tab) {
        case 'cliente_municipio':
            //inicializamos variable a 0, esto nos ayudará a indicarle que no lea la primera línea
            $i=0;
             
            //Recorremos el bucle para leer línea por línea
            foreach ($lineas as $linea_num => $linea)
            { 
               //abrimos bucle
               /*si es diferente a 0 significa que no se encuentra en la primera línea 
               (con los títulos de las columnas) y por lo tanto puede leerla*/
               if($i != 0) 
               { 
                   //abrimos condición, solo entrará en la condición a partir de la segunda pasada del bucle.
                   /* La funcion explode nos ayuda a delimitar los campos, por lo tanto irá 
                   leyendo hasta que encuentre un ; */
                   $datos = explode(";",$linea);
             
                   //Almacenamos los datos que vamos leyendo en una variable
                   $idclimun = trim($datos[0]);
                   $idusu = trim($datos[1]);
                   /*$idclimun = trim($datos[0]);
                   $idcli = trim($datos[1]);
                   $idmun = trim($datos[2]);
                   $hectcli = trim($datos[3]);
                   $hectsem = trim($datos[4]);
                   $telcli = trim($datos[5]);
                   $fcumplecli = trim($datos[6]);
                   $emailcli = trim($datos[7]);
                   $dircli = trim($datos[8]);
                   $vtotcom = trim($datos[9]);
                   $vtotcomnutri = trim($datos[10]);
                   $idusu = trim($datos[11]);
                   $contaccli = trim($datos[12]);*/
                    
                    /*echo ($idclimun." ".$idcli." ".$idmun." ".$hectcli." ".$hectsem." ".$telcli." ".$fcumplecli." ".$emailcli." ".$dircli." ".$vtotcom." ".$vtotcomnutri." ".$idusu." ".$contaccli);*/
                   //guardamos en base de datos la línea leida
                   //mysql_query("INSERT INTO datos(nombre,edad,profesion) VALUES('$nombre','$edad','$profesion')");
                /*$db->query("UPDATE cliente_municipio SET id_cliente='$idcli',id_municipio='$idmun', hect_cliente='$hectcli', hectsemb_cliente='$hectsem', tel_cliente='$telcli', fcumpleanos_cliente='$fcumplecli', email_cliente='$emailcli', direccion_cliente='$dircli', vtotalcompras_cliente='$vtotcom', vtotalcomprasnutri_cliente='$vtotcomnutri', id_usuario='$idusu', contacto_cliente='$contaccli' WHERE id_clientemunicipio='$idclimun'") or die('Error al actualizar los clientes dentro de los municipios, consultar el error: '.$db->error);*/
                
                $db->query("UPDATE cliente_municipio SET id_usuario='$idusu' WHERE id_clientemunicipio='$idclimun'") or die('Error al actualizar los clientes dentro de los municipios, consultar el error: '.$db->error);
                /*echo ("UPDATE cliente_municipio SET id_usuario='$idusu' WHERE id_clientemunicipio='$idclimun'");*/      
 
                   //cerramos condición
               }
             
               /*Cuando pase la primera pasada se incrementará nuestro valor y a la siguiente pasada ya 
               entraremos en la condición, de esta manera conseguimos que no lea la primera línea.*/
               $i++;
               //cerramos bucle
            }
            //$db->close();
            echo 'Cantidad de archivos ingresados, debe restar una fila correspondiente a los titulos '.$i;
          break;
          case 'cliente_calificacion':
              //inicializamos variable a 0, esto nos ayudará a indicarle que no lea la primera línea
              $i=0;
               
              //Recorremos el bucle para leer línea por línea
              foreach ($lineas as $linea_num => $linea)
              { 
                 //abrimos bucle
                 /*si es diferente a 0 significa que no se encuentra en la primera línea 
                 (con los títulos de las columnas) y por lo tanto puede leerla*/
                 if($i != 0) 
                 { 
                     //abrimos condición, solo entrará en la condición a partir de la segunda pasada del bucle.
                     /* La funcion explode nos ayuda a delimitar los campos, por lo tanto irá 
                     leyendo hasta que encuentre un ; */
                     $datos = explode(";",$linea);
               
                     //Almacenamos los datos que vamos leyendo en una variable
                     $idclical = trim($datos[0]);
                     $idusu = trim($datos[1]);
                  
                  $db->query("UPDATE cliente_calificacion SET id_usuario='$idusu' WHERE id_clientecalificacion='$idclical'") or die('Error al actualizar los clientes dentro de las calificaciones, consultar el error: '.$db->error);
                  /*echo ("UPDATE cliente_municipio SET id_usuario='$idusu' WHERE id_clientemunicipio='$idclimun'");*/      
          
                     //cerramos condición
                 }
               
                 /*Cuando pase la primera pasada se incrementará nuestro valor y a la siguiente pasada ya 
                 entraremos en la condición, de esta manera conseguimos que no lea la primera línea.*/
                 $i++;
                 //cerramos bucle
              }
              //$db->close();
              echo 'Cantidad de archivos ingresados, debe restar una fila correspondiente a los titulos '.$i;
            break;
        
      }
  break;
  
  /*default:
    # code...
    break;*/
}

 ?>