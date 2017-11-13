<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
	<meta http-equiv="Content-Type" content="text/html" charset="utf-8" />
	<title>Agregar</title>
	</head>

	<body>
		<?php
			// Para Agregar

				// Obtenemos los valores del formulario

if (isset($_POST['no_empleado'])) {
	echo $_POST['no_empleado'];
}
       $no_empleado = $_POST['no_empleado'] ;
        $fecha = $_POST['fecha'] ;

				$dias = $_POST['dias'] ;




				// Abrimos la conexión con la base de datos
				//$conexion=oci_connect("Confi","ConfiA29","localhost/XE");

				include("abrir_conexion.php");
				// La consulta que actualizará el registro en la BD, se guarda en una variable...
				$sql = "insert into Vacaciones(NoEmpleado,FechaInicio, NodDias) values($no_empleado,'$fecha',$dias) " ;
echo $sql;
				// preparar la sentencia...
				$consulta=oci_parse($conexion, $sql) ;

$exce = oci_execute($consulta); //Faltaba poner esto
				// Cerramos la conexión con la BD
				oci_close($conexion);

				// Validamos que se haya hecho la inserción del registro en la BD
				if (!$consulta)
					echo "Error de actualización en la BD" ;
				else
				include('ControlVacaciones.php') ; // Si el registro se almacenó correctamente, regresará al formulario de registro...

		?>
	</body>
</html>
