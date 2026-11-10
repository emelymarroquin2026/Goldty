<?php
include("conexion.php");
session_start();
if (!isset($_SESSION['id'])) {
    header("Location: login.php");
    exit();
}

$id_usuario = $_SESSION['id'];

// Obtener datos actuales para llenar el formulario
$query = "SELECT Nombre, Edad, Ocupacion, Correo, foto FROM usuarios WHERE id_usuarios = ?";
$stmt = $conexion->prepare($query);
$stmt->bind_param("i", $id_usuario);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Recibir datos del formulario
    $nombre = $_POST['nombre'];
    $edad = $_POST['edad'];
    $ocupacion = $_POST['ocupacion'];
    $correo = $_POST['correo'];

    // Manejar subida de foto
    $foto = $user['foto']; // Por defecto la actual

    if (!empty($_FILES['foto']['name'])) {
        $carpeta = 'uploads/'; // Ajusté a 'uploads/' por consistencia
        if (!is_dir($carpeta)) {
            mkdir($carpeta, 0755, true);
        }
        $nombreArchivo = basename($_FILES['foto']['name']);
        $rutaDestino = $carpeta . $nombreArchivo;

        // Validar tipo archivo (opcional)
        $ext = strtolower(pathinfo($nombreArchivo, PATHINFO_EXTENSION));
        $permitidas = ['jpg', 'jpeg', 'png', 'gif'];
        if (in_array($ext, $permitidas)) {
            if (move_uploaded_file($_FILES['foto']['tmp_name'], $rutaDestino)) {
                $foto = $nombreArchivo;
            } else {
                echo "<p>Error al subir la imagen.</p>";
            }
        } else {
            echo "<p>Tipo de archivo no permitido.</p>";
        }
    }

    // Actualizar datos en BD (sin cambiar contraseña)
    $update = "UPDATE usuarios SET Nombre=?, Edad=?, Ocupacion=?, Correo=?, foto=? WHERE id_usuarios=?";
    $stmt = $conexion->prepare($update);
    $stmt->bind_param("sisssi", $nombre, $edad, $ocupacion, $correo, $foto, $id_usuario);
    $stmt->execute();

    header('Location: perfil.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Editar Perfil - GOLDTY</title>
<link rel="stylesheet" href="style/editarPerfil.css">
</head>
<body>

  <div class="header">
    <button class="back-btn">
      <a href="perfil.php"><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-arrow-left-circle" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8m15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0m-4.5-.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5z" style="color: white;"/>
</svg></a>
    </button>
    <h1>GOLDTY</h1>
    <div class="logo">
      <img src="img/newlogo.jpeg" alt="GOLDTY" />
    </div>
  </div>

<div class="editar-perfil-container">
    <h1>Editar Perfil</h1>
    <form method="POST" enctype="multipart/form-data" class="form-editar-perfil">

        <!-- Foto avatar que al hacer clic abre selector de archivos -->
        <label for="foto">
            <img src="uploads/<?php echo htmlspecialchars($user['foto'] ?: 'default-avatar.png'); ?>" alt="Foto de perfil" class="foto-avatar">
        </label>
        <input type="file" name="foto" id="foto" accept="image/*">

        <label>Nombre:</label>
        <input type="text" name="nombre" value="<?php echo htmlspecialchars($user['Nombre']); ?>" required>

        <label>Edad:</label>
        <input type="number" name="edad" value="<?php echo htmlspecialchars($user['Edad']); ?>" required>

        <label>Ocupación:</label>
        <input type="text" name="ocupacion" value="<?php echo htmlspecialchars($user['Ocupacion']); ?>" required>

        <label>Correo:</label>
        <input type="email" name="correo" value="<?php echo htmlspecialchars($user['Correo']); ?>" required>

        <div class="buttons-container">
            <button type="submit" class="btn-guardar">Guardar Cambios</button>
            <a href="perfil.php" class="btn-cancelar">Cancelar</a>
        </div>
    </form>
</div>
</body>
</html>
