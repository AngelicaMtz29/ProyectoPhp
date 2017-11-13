<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html" charset="utf-8" />
<title>Documento sin t&iacute;tulo</title>
</head>

	<body>

			<?php

				// Se verifica qué botón se va a utilizar

				$boton = $_POST['Submit'] ;
				if ($boton == "Ejecutar") {
					//$conexion=oci_connect("Confi","ConfiA29","localhost/XE");
					include("abrir_conexion.php");
				// Para mostrar el número del empleado...
				// isset sirve para preguntar ¿si no está vacío?
					if (isset ($_POST['editar'])) {
						// se obtiene la información seleccionada del List/Menu
						$no_empleado = $_POST['editar'] ;
						// se estructura la consulta
						$con = "select * from Empleado where NoEmpleado = $no_empleado" ;
						// se ejecuta la consulta
						$consulta = oci_parse($conexion, $con) ;
						//Ejecutar la sentencia
						$exec=oci_execute($consulta);
						// El resultado de la consulta se guarda en un arreglo
						$registro = oci_fetch_array($consulta) ;

						if(!$consulta)
							echo "Error en la base de datos" ;
						oci_close($conexion);
			?>

						  <!-- Se crea un nuevo formulario en el que se colocará la información del producto seleccionado -->
						  <!-- nótese a dónde lleva el action de este formulario -->

						<p>Añadir vacaciones  </p>
							<form id="form1" name="form1" method="post" action="actualizarDatos.php">
								<p>
								  <label>No. Empleado:

								  <!-- La información que tendrán los campos de este formulario, la obtenemos del arreglo en sus diferentes posiciones -->
                    <!-- value = <?php //echo $registro[0] ; ?> disabled-->
								  <input name="no_empleado" type="number" id="no_empleado"  />
								  </label>
								</p>
							    <p>
								  <label>Fecha de inicio:
								  <input name="fecha" type="text" id="fecha"/>
								  </label>
							    </p>
							    <p>
								<label>Número de días:
								<input name="dias" type="number" id="dias"/>
								</label>
							    </p>
							    <p>
								<label>
								<input type="submit" name="agregar" id="agregar" value="Agregar" />
								</label>
							    </p>
							</form>


				<?php

					}
				}
				?>
	</body>
</html>
