<?php
include("conexion.php");

session_start();
if (!isset($_SESSION['id'])) {
    header("Location: login.php");
    exit();

}

$id_usuario = intval($_SESSION['id']);

$sql = "SELECT id_actividad_imp, titulo, fecha, hora, completada FROM actividad_imp WHERE id_usuario = $id_usuario ORDER BY fecha DESC, hora DESC";
$resultado = $conexion->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<title>Mis Actividades Importantes</title>
<link rel="stylesheet" href="style/verImp.css" />
</head>
<body>

<div class="container">

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

  <div class="urgent-box">Importante</div>

  <div class="task-list">
    <?php if ($resultado && $resultado->num_rows > 0): ?>
      <?php while ($act = $resultado->fetch_assoc()): ?>
        <div class="actividad-link">
          <a href="descripcionImp.php?id=<?php echo $act['id_actividad_imp']; ?>" style="flex-grow:1; text-decoration:none; color:inherit;">
            <span class="circle"></span>
            <div class="activity-content">
              <span class="titulo"><?php echo htmlspecialchars($act['titulo']); ?></span>
              <span class="fecha-hora"><?php echo date("d/m/Y H:i", strtotime($act['fecha'].' '.$act['hora'])); ?></span>
            </div>
          </a>
          <a href="editarImp.php?id=<?php echo $act['id_actividad_imp']; ?>" class="edit-btn"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
          <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325"/>
          </svg></a>
          <a class="delete-btn" href="eliminarImp.php?id=<?php echo $act['id_actividad_imp']; ?>" onclick="return confirm('¿Estás seguro de eliminar esta actividad?');"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
          <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z"/>
          <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z"/>
          </svg></a>

        </div>
      <?php endwhile; ?>
    <?php else: ?>
      <p>No tienes actividades urgentes aún.</p>
    <?php endif; ?>
  </div>

</div>
<script src="Scrip/notificaciones.js"></script>
</body>
</html>

