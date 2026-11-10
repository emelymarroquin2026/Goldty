<?php
session_start();
include("conexion.php");

if (!isset($_SESSION['id'])) {
    header("Location: login.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_actividad_u = intval($_POST['id_actividad_u']);
    $id_usuario = intval($_SESSION['id']);
    $titulo = $conexion->real_escape_string(trim($_POST['titulo']));
    $descripcion = $conexion->real_escape_string(trim($_POST['descripcion']));
    $categoria = intval($_POST['categoria']);
    $fecha = $_POST['fecha'];
    $hora = $_POST['hora'];
    // Esta línea:
    $completada = isset($_POST['completada']) ? 1 : 0;

    $check_sql = "SELECT * FROM actividad_urge WHERE id_actividad_u = $id_actividad_u AND id_usuario = $id_usuario";
    $check_res = $conexion->query($check_sql);

    if ($check_res && $check_res->num_rows > 0) {
        $update_sql = "UPDATE actividad_urge
                       SET titulo='$titulo', descripcion='$descripcion', id_categoria=$categoria,
                           fecha='$fecha', hora='$hora', completada=$completada
                       WHERE id_actividad_u = $id_actividad_u AND id_usuario = $id_usuario";

        if ($conexion->query($update_sql)) {
            header("Location: descripcionUrg.php?id=$id_actividad_u");
            exit();
        } else {
            echo "Error al actualizar la actividad.";
        }
    } else {
        echo "No tienes permiso para editar esta actividad.";
    }
} else {
    header("Location: verUrg.php");
    exit();
}
['id'];
    
    $titulo = trim($_POST["titulo"]);
    $descripcion = trim($_POST["descripcion"]);
    $id_categoria = intval($_POST["id_categoria"]);
    $fecha = $_POST["fecha"];
    $hora = $_POST["hora"];
    $completada = isset($_POST["completada"]) ? 1 : 0;

    // Prepara y ejecuta el UPDATE
    $stmt = $conexion->prepare("UPDATE actividad_urge SET titulo=?, descripcion=?, id_categoria=?, fecha=?, hora=?, completada=? WHERE id_actividad_u=? AND id_usuario=?");
    $stmt->bind_param("ssiisiii", $titulo, $descripcion, $id_categoria, $fecha, $hora, $completada, $id_actividad_u, $id_usuario);

    if ($stmt->execute()) {
        header("Location: descripcionUrg.php");
        exit();
    } else {
        echo "Error al actualizar: " . $stmt->error;
    }

?>
