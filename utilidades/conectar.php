<?php
/*
Conexion a la base de datos
Octubre 2021
Rodrigo Zarate Algecira
*/

$host="AQUIVAELHOST";
$usuario="AQUIVAELUSUARIO";
$basedd="AQUIVAELNOMBREDELABASEDEDATOS";
$clave="AQUIVALACLAVE";

$conexion = new mysqli($host, $usuario, $clave, $basedd);
/* check connection */
if (mysqli_connect_errno()) {
    printf("Error: %s\n", mysqli_connect_error());
    exit();
}
?>