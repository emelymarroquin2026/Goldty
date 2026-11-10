<?php
session_start();
include("conexion.php");

if (!isset($_SESSION['id'])) {
    header("Location: login.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_actividad_noimp = intval($_POST['id_actividad_noimp']);
    $id_usuario = intval($_SESSION['id']);
    $titulo = $conexion->real_escape_string(trim($_POST['titulo']));
    $descripcion = $conexion->real_escape_string(trim($_POST['descripcion']));
    $categoria = intval($_POST['categoria']);
    $fecha = $_POST['fecha'];
    $hora = $_POST['hora'];
    // Esta línea:
    $completada = isset($_POST['completada']) ? 1 : 0;

    $check_sql = "SELECT * FROM actividad_noimp WHERE id_actividad_noimp = $id_actividad_noimp AND id_usuario = $id_usuario";
    $check_res = $conexion->query($check_sql);

    if ($check_res && $check_res->num_rows > 0) {
        $update_sql = "UPDATE actividad_noimp
                       SET titulo='$titulo', descripcion='$descripcion', id_categoria=$categoria,
                           fecha='$fecha', hora='$hora', completada=$completada
                       WHERE id_actividad_noimp = $id_actividad_noimp AND id_usuario = $id_usuario";

        if ($conexion->query($update_sql)) {
            header("Location: descripcionNoimp.php?id=$id_actividad_noimp");
            exit();
        } else {
            echo "Error al actualizar la actividad.";
        }
    } else {
        echo "No tienes permiso para editar esta actividad.";
    }
} else {
    header("Location: verNoimp.php");
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
    $stmt = $conexion->prepare("UPDATE actividad_noimp SET titulo=?, descripcion=?, id_categoria=?, fecha=?, hora=?, completada=? WHERE id_actividad_noimp=? AND id_usuario=?");
    $stmt->bind_param("ssiisiii", $titulo, $descripcion, $id_categoria, $fecha, $hora, $completada, $id_actividad_noimp, $id_usuario);

    if ($stmt->execute()) {
        header("Location: descripcionNoimp.php");
        exit();
    } else {
        echo "Error al actualizar: " . $stmt->error;
    }

?>
