
<?php
/*header('Content-Type: text/html; charset=utf-8');
function my_error_handler($errno, $errstr, $errfile, $errline) {

}
set_error_handler("my_error_handler", E_WARNING);
*/
$conexion = oci_connect("eduardo","o200eya610l","localhost/XE");

if (!$conexion){
  $m = oci_error();
  echo "Conexión fallida " . $m["message"];
}
//restore_error_handler();


?>
