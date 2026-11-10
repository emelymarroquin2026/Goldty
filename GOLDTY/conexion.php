<?php
$conexion = new mysqli("localhost", "root", "", "db_goldty");

if ($conexion->connect_error) {
    die("Fallo de conexión: " . $conexion->connect_error);
}
?>