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

$sql = "SELECT * FROM actividad_noimp
        WHERE id_actividad_noimp = $id_actividad_noimp AND id_usuario = $id_usuario";

$resultado = $conexion->query($sql);

if ($resultado && $resultado->num_rows > 0) {
    $actividad = $resultado->fetch_assoc();
} else {
    echo "Actividad no encontrada o no autorizada.";
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nuevo_estado = isset($_POST['completada']) ? 1 : 0;
    $id_act = isset($_POST['id_actividad_noimp']) ? intval($_POST['id_actividad_noimp']) : 0;

    if ($id_act && $id_act === $id_actividad_noimp) {
        $update_sql = "UPDATE actividad_noimp 
                       SET completada = $nuevo_estado 
                       WHERE id_actividad_noimp = $id_act AND id_usuario = $id_usuario";
        $conexion->query($update_sql);
    }

    header("Location: descripcionNoimp.php?id=$id_actividad_noimp");
    exit();
}



?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Descripción de tu Actividad Urgente</title>
  <link rel="stylesheet" href="style/descripcionNoimp.css">
</head>
<body>

  <div class="header">
    <button class="back-btn">
      <a href="verNoimp.php"><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-arrow-left-circle" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8m15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0m-4.5-.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5z" style="color: white;"/>
</svg></a>
    </button>
    <h1>GOLDTY</h1>
    <div class="logo">
      <img src="img/newlogo.jpeg" alt="GOLDTY" />
    </div>
  </div>


  <div class="actividad-detalle">
  <div class="actividad-header">
    <h2><?php echo htmlspecialchars($actividad['titulo']); ?></h2>
  </div>

  <div class="actividad-contenido">
    <p><strong>Descripción:</strong><br> <?php echo nl2br(htmlspecialchars($actividad['descripcion'])); ?></p>
    <p><strong>Fecha:</strong> <?php echo date("d/m/Y", strtotime($actividad['fecha'])); ?></p>
    <p><strong>Hora:</strong> <?php echo date("H:i", strtotime($actividad['hora'])); ?></p>
    <form method="POST" action="">
  <input type="hidden" name="id_actividad_noimp" value="<?php echo $id_actividad_noimp; ?>">
  <label class="form-switch">
    <input type="checkbox" name="completada" onchange="this.form.submit()" <?php if ($actividad['completada']) echo 'checked'; ?>>
    <i></i>
  </label>
</form>


  </div>
</div>
<script src="Scrip/notificaciones.js"></script>
</body>
</html>
