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

$id_actividad_u = intval($_GET['id']);
$id_usuario = intval($_SESSION['id']);

$sql = "SELECT * FROM actividad_urge WHERE id_actividad_u = $id_actividad_u AND id_usuario = $id_usuario";
$resultado = $conexion->query($sql);

if ($resultado && $resultado->num_rows > 0) {
    $actividad = $resultado->fetch_assoc();
} else {
    echo "Actividad no encontrada o no tienes permiso.";
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Editar Actividad Urgente</title>
  <link rel="stylesheet" href="style/editar.css" />
</head>
<body>
  <div class="header">
    <button class="back-btn">
      <a href="verUrg.php"><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-arrow-left-circle" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8m15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0m-4.5-.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5z" style="color: white;"/>
</svg></a>
    </button>
    <h1>GOLDTY</h1>
    <div class="logo">
      <img src="img/newlogo.jpeg" alt="GOLDTY" />
    </div>
  </div>

  <main>
    <form class="forms" method="POST" action="actualizarUrg.php">
        <input type="hidden" name="id_actividad_u" value="<?php echo $actividad['id_actividad_u']; ?>">

        <div class="input-wrapper">
            <label>Titulo</label><br>
            <input type="text" name="titulo" value="<?php echo htmlspecialchars($actividad['titulo']); ?>"/>
        </div>

        <div class="input-wrapper">
            <label>Descripción</label><br>
            <textarea name="descripcion" placeholder="Escribe la descripción" value="<?php echo htmlspecialchars($actividad['descripcion']); ?>" "></textarea>
        </div>

        <div class="input-wrapper">
            <label>Categoria</label><br>
            <select name="categoria" required>
                <option value="">Selecciona la categoria</option>
                <?php
                $categorias = [
                  "1" => "Trabajo", "2" => "Estudio", "3" => "Ocio",
                  "4" => "Recreacion", "5" => "Deportiva",
                  "6" => "Relajación", "7" => "Otro"
                ];
                foreach ($categorias as $valor => $nombre) {
                    $selected = ($actividad['id_categoria'] == $valor) ? "selected" : "";
                    echo "<option value='$valor' $selected>$nombre</option>";
                }
                ?>
            </select>
        </div>

        <div class="input-wrapper">
            <label>Fecha y Hora</label><br>
            <div class="datetime">
                <input type="date" name="fecha" value="<?php echo $actividad['fecha']; ?>" required />
                <input type="time" name="hora" value="<?php echo $actividad['hora']; ?>" required />
            </div>
        </div>

        <div class="input-wrapper">
            <label>Completada</label><br>
            <label class="switch">
              <input type="checkbox" name="completada" <?php echo ($actividad['completada']) ? 'checked' : ''; ?>>
              <span class="slider"></span>
            </label>
        </div>

        <button type="submit" class="btn" name="actualizar"> Guardar Cambios</button>
    </form>
  </main>
</body>
</html>
