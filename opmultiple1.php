<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html" charset="utf-8" />
<title>Control</title>
</head>

<body>
	<p>
	  <?php
	  
		//establecer la conexión
		$conexion=oci_connect("Confi","ConfiA29","localhost/XE");
		//capturar la consulta
		$sql = "select * from Empleado" ;
		//preparar la sentencia
		$consulta = oci_parse($conexion, $sql) ;
		//Ejecutar la sentencia
		$exec=oci_execute($consulta);
		
		// verifico si hubo resultados al ajecutar la consulta
		$resul = oci_fetch_array($consulta) ;
		if ($resul == 0)
			echo "No hay empleados registrados"  ;
		oci_close($conexion);
	?>
</p>
	<p>Lista de empleados </p>
	<form id="form1" name="form1" method="post" action="opmultiple2.php">
	  <table width="681" border="1">
        <tr>
          <td width="19">No. Empleado</td>
          <td width="200">Nombre</td>
         <!--td width="150"></td-->
          <td width="104">Apellidos</td>
          <td width="84">Añadir vacaciones</td>
          <!--td width="84">Eliminar</td-->
        </tr>
        <!-- Repetir fila en la tabla -->
        <?php
	  	while ($registro = oci_fetch_array($consulta)) {
	  ?>
        <tr>
          <td><?php echo $registro[0] ; ?> </td>
          <td><?php echo $registro[1] ; ?> </td>
          <td><?php echo $registro[2] ; ?></td>
          <td><label>
		  
		
            <input name="editar" id="editar" type="radio" value="<?php echo $registro[0] ; ?>" />

          </label></td>
        </tr>
        <?php
	  	}
	  ?>
        
      </table>
	 
      <input name="Submit" type="submit" id="Submit" value="Ejecutar"  />
	  <label></label>
	</form>
	
</body>
</html>