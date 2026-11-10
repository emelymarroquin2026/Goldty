<?php

include("conexion.php");
session_start();
if (!isset($_SESSION['id'])) {
    header("Location: login.php");
    exit();

}

// Suponemos que el usuario ya está logueado y su id está en sesión
$id_usuario = $_SESSION['id'];

$query = "SELECT Nombre, Edad, Ocupacion, Correo, foto FROM usuarios WHERE id_usuarios = ?";
$stmt = $conexion->prepare($query);
$stmt->bind_param("i", $id_usuario);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Perfil - GOLDTY</title>
<link rel="stylesheet" href="style/perfil.css">
</head>
<body>
  

<div class="perfil-container">

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
 
  
    <h1>Mi Perfil</h1>
    <div class="foto-perfil">
        <?php if ($user['foto']) { ?>
            <img src="uploads/<?php echo htmlspecialchars($user['foto']); ?>" alt="Foto de perfil">
        <?php } else { ?>
            <img src="img/default-user.png" alt="Foto por defecto">
        <?php } ?>
    </div>
    <div class="datos-perfil">
        <p><strong>Nombre:</strong> <?php echo htmlspecialchars($user['Nombre']); ?></p>
        <p><strong>Edad:</strong> <?php echo htmlspecialchars($user['Edad']); ?></p>
        <p><strong>Ocupación:</strong> <?php echo htmlspecialchars($user['Ocupacion']); ?></p>
        <p><strong>Correo:</strong> <?php echo htmlspecialchars($user['Correo']); ?></p>
    </div>
    <a href="editarPerfil.php" class="btn-editar">Editar Perfil</a>
</div>
</body>
</html>
