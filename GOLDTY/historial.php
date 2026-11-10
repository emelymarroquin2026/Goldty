<?php
session_start();
include("conexion.php");

if (!isset($_SESSION['id'])) {
    header("Location: login.php");
    exit();
}

$id_usuario = $_SESSION['id'];

function mostrarActividades($conexion, $tabla, $tituloCategoria, $claseCategoria, $id_usuario, $id_columna) {
    $sql = "SELECT * FROM $tabla WHERE completada = 1 AND id_usuario = $id_usuario ORDER BY fecha DESC";
    $result = $conexion->query($sql);

    if ($result && $result->num_rows > 0) {
        echo "<div class='section-label $claseCategoria'>$tituloCategoria</div>";
        echo "<div class='task-list'>";
        while ($actividad = $result->fetch_assoc()) {
            $id_actividad = $actividad[$id_columna];
            $titulo = htmlspecialchars($actividad['titulo']);
            $fecha = date("d M Y", strtotime($actividad['fecha']));
            $hora = date("H:i", strtotime($actividad['hora']));

            $url = "descripcion.php?id=$id_actividad&tipo=$tabla";

            echo "<a href='$url' style='text-decoration: none; color: inherit;'>";
            echo "<div class='task'>";
            echo "<span class='task-title'>$titulo</span>";
            echo "<span class='time'> $fecha, $hora</span>";
            echo "</div>";
            echo "</a>";
        }
        echo "</div>";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Historial de Actividades</title>
  <link rel="stylesheet" href="style/historial.css">
</head>
<body>
  <div class="header">
    <button class="back-btn">
      <a href="homepage.php"><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-arrow-left-circle" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8m15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0m-4.5-.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5z" style="color: white;"/>
</svg></a>
    </button>
    <h1>GOLDTY</h1>
    <div class="logo">
      <img src="img/newlogo.jpeg" alt="GOLDTY" />
    </div>
  </div>

  <div class="container">
    <?php
      mostrarActividades($conexion, 'actividad_urge', 'URGENTE', 'urgent', $id_usuario, 'id_actividad_u');
      mostrarActividades($conexion, 'actividad_imp', 'IMPORTANTE', 'important', $id_usuario, 'id_actividad_imp');
      mostrarActividades($conexion, 'actividad_noimp', 'NO IMPORTANTE', 'not-important', $id_usuario, 'id_actividad_noimp');
    ?>
  </div>
</body>
</html>
