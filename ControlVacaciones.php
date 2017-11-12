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
				$conexion=oci_connect("Confi","ConfiA29","localhost/XE");
				//capturar la consulta
				$sql = "select * from Empleado" ;
				$sql2='Select * from Vacaciones';
				//preparar la sentencia
				$consulta = oci_parse($conexion, $sql) ;
				$consulta2=oci_parse($conexion,$sql2);
				//Ejecutar la sentencia
				$exec=oci_execute($consulta);
				$exec=oci_execute($consulta2);
				// verifico si hubo resultados al ajecutar la consulta
				$resul2 = oci_fetch_array($consulta2) ;
				$resul = oci_fetch_array($consulta) ;
				
				if ($resul == 0 || $resul2==0)
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
								<?php
								while ($registro2 = oci_fetch_array($consulta2)) {
								?>
									<tr>
										<td align="center"><?php echo $registro2[0] ; ?> </td>
										<td align="center"><?php echo $registro2[1] ; ?> </td>
										<td align="center"><?php echo $registro2[2] ; ?></td>

										<td align="center">
											<label><input name="editar" id="editar" type="radio" value="<?php echo $registro2[0] ; ?>" /></label>
										</td>
										<td align="center">
											<input  name="eliminar" type="checkbox" id="eliminar" value="<?php echo $registro2[0] ; ?>" />
										</td>
									</tr>
									
								<?php
								}
								?>
								<tr >
								<td colspan="5" align="center"><input name="Submit" type="submit" id="Submit" value="Ejecutar" /></td>
								</tr>
								
							</table>
					
		
	</body>
</html>