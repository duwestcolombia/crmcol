<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <title>Datos Dinamicos</title>
     <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js"></script>
    
     <link rel="stylesheet" type="text/css" href="estilo.css">
</head>
<body>
  <script type="text/javascript">
  $(document).ready(function(){
          var cuentaInputs = $('#datos').children().length;  //ID del div contenedor del Formulario
          $('#agregar').click(function(){ //ID del boton para agregar datos
           cuentaInputs++;
           $('<br class="fila'+cuentaInputs+'" /><label class="fila'+cuentaInputs+'" for="nombre'+cuentaInputs+'">Datos '+cuentaInputs+':</label>
             <input autocomplete="off" placeholder="Nombre" type="text" id="nombre'+cuentaInputs+'" required name="nombre[]" class="fila'+cuentaInputs+'" id="nombre">
             <!--Inputs de nombre, el name debe terminar con [] -->
             <input autocomplete="off" type="text" placeholder="Número" required name="telefono[]" class="fila'+cuentaInputs+'" id="nombre">
             <!--Inputs de telefono, el name debe terminar con [] -->
             <input autocomplete="off" type="text" placeholder="Direccion" required name="direccion[]" class="fila'+cuentaInputs+'" id="nombre">       
             <!--Inputs de direccion, el name debe terminar con [] -->                                                                                                                                                                     
                  ').appendTo('#inputs');//ID contenedor de los inputs
if (cuentaInputs==2) {
 $('<button class="add" type="button" id="eliminar"><i class="fa fa-minus"></i></button>').insertAfter('#agregar');
               // Si se crea un dato, agregamos el boton eliminar
             };
           });
          $('#eliminar').live("click", function(){//ID del boton eliminar
           $('.fila'+cuentaInputs).remove();
           cuentaInputs--;
           if (cuentaInputs==1) {
            $(this).remove();
          };
        });
        });
</script>
<div id="datos"><!-- Div contenedor del Formulario -->
     <form action="datos.php" method="post"><!-- Formulario -->
          <div id="inputs"><!-- Div contenedor de los inputs -->
          <!-- Mostramos el primer dato, todos los inputs deben terminar en [] -->
               <label>Datos 1: </label>
               <input autocomplete="off" id="nombre" placeholder="Nombre" required name="nombre[]" type="text">
               <input autocomplete="off" id="Número" placeholder="Número" required name="telefono[]" type="text">               
               <input autocomplete="off" id="direccion" placeholder="Direccion" required name="direccion[]" type="text">
          <!-- Fin del primer dato -->
          </div>
          <button class="add" type="button" id="agregar"><i class="fa fa-plus"></i></button><br><!-- Boton para agregar mas datos -->
          <button type="submit" name="datosForm">Enviar</button><!-- ID para confirmar si el formulario fue enviado -->
     </form>
</div>
</body>
</html>