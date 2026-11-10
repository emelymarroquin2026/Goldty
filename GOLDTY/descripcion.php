<?php
session_start();
include("conexion.php");

if (!isset($_SESSION['id'])) {
    header("Location: login.php");
    exit();
}

if (!isset($_GET['id']) || !isset($_GET['tipo'])) {
    echo "Parámetros inválidos.";
    exit();
}

$id_usuario = $_SESSION['id'];
$id = intval($_GET['id']);
$tipo = $_GET['tipo'];


$columnas_id = [
    'actividad_urge' => 'id_actividad_u',
    'actividad_imp' => 'id_actividad_imp',
    'actividad_noimp' => 'id_actividad_noimp'
];

if (!array_key_exists($tipo, $columnas_id)) {
    echo "Tabla no válida.";
    exit();
}

$columna_id = $columnas_id[$tipo];

// Consulta segura
$sql = "SELECT * FROM $tipo WHERE $columna_id = ? AND id_usuario = ?";
$stmt = $conexion->prepare($sql);
$stmt->bind_param("ii", $id, $id_usuario);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 0) {
    echo "Actividad no encontrada.";
    exit();
}

$actividad = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Descripción de Actividad</title>
  <link rel="stylesheet" href="style/descripcion.css">
</head>
<body>
  <div class="header">
    <button class="back-btn">
      <a href="historial.php"><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-arrow-left-circle" viewBox="0 0 16 16">
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
      <p><strong>Descripción:</strong></p>
      <p><?php echo nl2br(htmlspecialchars($actividad['descripcion'])); ?></p>
      <p><strong>Fecha:</strong> <?php echo date("d M Y", strtotime($actividad['fecha'])); ?></p>
      <p><strong>Hora:</strong> <?php echo date("H:i", strtotime($actividad['hora'])); ?></p>

    </div>
  </div>
<script src="Scrip/notificaciones.js"></script>
</body>
</html>