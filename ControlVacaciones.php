<!DOCTYPE html>
	<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Deposito</title>

	</head>
	<body id="top">
		<p>
			<?php
				//establecer la conexión
				//$conexion=oci_connect("Confi","ConfiA29","localhost/XE");
				include("abrir_conexion.php");
								//capturar la consulta
				//$sql = "select * from Empleado" ;
				$sql="Select * from Vacaciones";
				//preparar la sentencia
				//$consulta = oci_parse($conexion, $sql) ;
				$consulta=oci_parse($conexion,$sql);
				//Ejecutar la sentencia
				//$exec=oci_execute($consulta);
				$exec=oci_execute($consulta);
				// verifico si hubo resultados al ajecutar la consulta
				$resul = oci_fetch_array($consulta) ;
				//$resul = oci_fetch_array($consulta) ;

				if (/*$resul == 0 || */$resul==0)
					echo "No hay empleados registrados"  ;
				oci_close($conexion);
			?>
		</p>



						<h2>Control de vacaciones</h2>


						<form id="form1" name="form1" method="post" action="Busqueda.php">
							<table width="1000" border="0">
								<tr>
									<td align="center">No. Empleado</td>
									<td align="center">Fecha de Inicio</td>
									<td align="center">Número de Días</td>
									<td align="center">Editar</td>
									<td align="center">Eliminar</td>
								</tr>
						</tr>
								<?php
								while ($registro = oci_fetch_array($consulta)) {
								?>
									<tr>
										<td align="center"><?php echo $registro[0] ; ?> </td>
										<td align="center"><?php echo $registro[1] ; ?> </td>
										<td align="center"><?php echo $registro[2] ; ?></td>

										<td align="center">
											<label><input name="editar" id="editar" type="radio" value="<?php echo $registro[0] ; ?>" /></label>
										</td>
										<td align="center">
											<input  name="eliminar" type="checkbox" id="eliminar" value="<?php echo $registro[0] ; ?>" />
										</td>

									</tr>
								<?php
								}
								?>

								<tr>
									<td></td>
									<td></td>
								<td colspan="5" align="center"><input name="Submit" type="submit" id="Submit" value="Ejecutar" /></td>
							</tr>

							</table>
</form>

	</body>
</html>
