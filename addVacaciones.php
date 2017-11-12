<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html" charset="utf-8"  />
<title>Empleados</title>
</head>

<body>
	<p>
			<?php
			
				// Se verifica qué botón se va a utilizar
				
				
				$conexion=oci_connect("Confi","ConfiA29","localhost/XE");
					
							
					// Para mostrar el número del empleado...
					// isset sirve para preguntar ¿si no está vacío?
						if (isset ($_POST['Submit']))
							// se obtiene la información seleccionada del List/Menu
							$no_empleado = $_POST['editar'] ;
							// se estructura la consulta
							$sql = "select * from Empleado where NoEmpleado = $no_empleado" ;
							// se ejecuta la consulta
							$consulta = oci_parse($conexion,$sql) ;
							//Ejecutar la sentencia
							$exec=oci_execute($consulta);
							// El resultado de la consulta se guarda en un arreglo
							$registro = oci_fetch_array($consulta);
				
							if(!$consulta)
								echo "Error en la base de datos" ;		
							oci_close($conexion);	
			?>
	</p>
					<h2>Añadir información</h2>
						<form id="form1" name="form1" method="post" action="actualizarDatos.php">
								<p>
								  <label>No. Empleado
								  <input name="no_empleado" type="text" id="no_empleado" value = "<?php echo $registro[0] ; ?>" /> 
								  </label>
								</p>
							    <p>
								  <label>Fecha de inicio:
								  <input name="fecha" type="text" id="fecha"/>
								  </label>
							    </p>
							    <p>
								<label>Número de días:
								<input name="dias" type="text" id="dias"/>
								</label>
							    </p>
							    <p>
								<label>
								<input type="submit" name="agregar" id="agregar" value="Agregar" />
								</label>
							    </p>
						</form>

</body>
</html>