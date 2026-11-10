<?php
session_start();
include("conexion.php");

if (!isset($_SESSION['id'])) {
    header("Location: login.php");
    exit();
}


if (!isset($_GET['id'])) {
    echo "Actividad no encontrada.";
    exit();
}

$id_actividad_noimp = intval($_GET['id']);
$id_usuario = intval($_SESSION['id']);

$sql = "SELECT * FROM actividad_noimp WHERE id_actividad_noimp = $id_actividad_noimp AND id_usuario = $id_usuario";
$resultado = $conexion->query($sql);

if ($resultado && $resultado->num_rows > 0) {
  
    $delete_sql = "DELETE FROM actividad_noimp WHERE id_actividad_noimp = $id_actividad_noimp AND id_usuario = $id_usuario";
    if ($conexion->query($delete_sql)) {
        
        header("Location: verNoimp.php");
        exit();
    } else {
        echo "Error al eliminar la actividad.";
    }
} else {
    echo "No tienes permiso para eliminar esta actividad o no existe.";
}
?>
