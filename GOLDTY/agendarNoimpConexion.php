<?php
include("conexion.php");

session_start();
if (!isset($_SESSION['id'])) {
    header("Location: login.php");
    exit();
}

$id_usuario = $_SESSION['id']; 


if (isset($_POST['agendar'])) {
    if (
        strlen($_POST['titulo']) >= 1 &&
        strlen($_POST['descripcion']) >= 1 &&
        strlen($_POST['categoria']) >= 1 &&
        strlen($_POST['fecha']) >= 1 &&
        strlen($_POST['hora']) >= 1
    ) {
        $titulo = trim($_POST['titulo']);
        $descripcion = trim($_POST['descripcion']);
        $categoria = trim($_POST['categoria']);
        $fecha = trim($_POST['fecha']);
        $hora = trim($_POST['hora']);
        $completada = isset($_POST['completada']) ? 1 : 0;


        $consulta = "INSERT INTO actividad_Noimp (titulo, descripcion, id_categoria, fecha, hora, completada, id_usuario)
                     VALUES ('$titulo', '$descripcion', '$categoria', '$fecha', '$hora', '$completada', '$id_usuario')";

        $resultado = mysqli_query($conexion, $consulta);

        if ($resultado) {
            header("Location: verNoimp.php");
            exit;
        } else {
            echo '<h3 class="error">❌ Ocurrió un error al guardar los datos.</h3>';
        }
    } else {
        echo '<h3 class="error">⚠️ Llena todos los campos.</h3>';
    }
}
?>
