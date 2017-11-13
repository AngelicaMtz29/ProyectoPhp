<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html" charset="utf-8" />
<title>Modificar o Eliminar Empleado</title>
</head>

<body>
	<p>
	  <?php

		//Añadir métodos para

			$boton = $_POST['editar'] ;

			if ($boton == "Ejecutar") {
				$conexion = oci_connect("Confi", "ConfiA29", "localhost/XE");
		// Para Actualizar...
			// isset sirve para preguntar ¿si no está vacío?
				if (isset ($_POST['editar'])) {
				// se obtiene la información seleccionada del List/Menu
				$fechainicio = $_POST['editar'] ;
				//convertir lo que se ingresa a un tipo de datos date

				// se estructura la consulta
				$no_empleado=$_POST['editar'];
				$sql = "select * from Vacaciones where NoEmpleado=$no_empleado" ;
				//echo $sql;
				// se ejecuta la consulta
				$consulta = oci_parse ($conexion, $sql);
				//ejecutar la sentencia
				$exec=oci_execute($consulta);
				// El resultado de la consulta se guarda en un arreglo
				$registro = oci_fetch_array($consulta);


				if(!$consulta)
					echo "Error en la base de datos" ;
				oci_close($conexion);

	?>

				  <!-- Se crea un nuevo formulario en el que se colocará la información del producto seleccionado -->
				  <!-- nótese a dónde lleva el action de este formulario -->
			</p>
				<p>Editar información   </p>
				<form id="form1" name="form1" method="post" action="actualizarDatos.php">
			  <label>No. Empleado:

			  <!-- La información que tendrán los campos de este formulario, la obtenemos del arreglo en sus diferentes posiciones -->

			  <input name="no_empleado" type="text" id="no_empleado" value = "<?php echo $registro[0] ; ?>"  disabled />
			  </label>

			  <p>
			  <label>Fecha de inicio:
			  <input name="fechainicio" type="text" id="fechainicio"  value="<?php echo $registro[1] ; ?>" />
			  </label>
			  </p>
			  <p>
				<label>Número de días:
				<input name="dias" type="text" id="dias" value="<?php echo $registro[2] ; ?>"/>
				</label>
			  </p>
			  <p>
				<label>
				<input type="submit" name="Submit" value="Agregar" />
				</label>
			  </p>
			</form>
				<?php
							}

				?>

		<?php

		// Para Eliminar...

			if (isset ($_POST['eliminar'])) {
				$fechainicio = $_POST['eliminar'] ;

				foreach ($fechainicio as $op) {
					$sql = "delete from Vacaciones where FechaInicio = '$op'" ;
					$consulta = oci_parse ($conexion, $sql);
					//ejecutar la sentencia
					$exec=oci_execute($consulta);
				}

					oci_close($conexion);
					include('ControlVacaciones.php') ;
			}

		}else
			include('addVacaciones.php') ;




		?>


</body>
</html>
