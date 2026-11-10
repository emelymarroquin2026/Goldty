<?php
session_start();
include("conexion.php");

if (isset($_POST["login"])) {
    $email = $_POST["email"];
    $password = $_POST["password"];

    if (empty($email) || empty($password)) {
        echo '<div style="color:red;">LOS CAMPOS ESTÁN VACÍOS</div>';
    } else {
        $email = $conexion->real_escape_string($email);
        $password = $conexion->real_escape_string($password);

        $sql = $conexion->query("SELECT * FROM usuarios WHERE correo = '$email' AND contraseña = '$password'");

        if ($sql && $sql->num_rows > 0) {
            $usuario = $sql->fetch_assoc();
            $_SESSION['id'] = $usuario['id_usuarios'];
            header("Location: bienvenido.php");
            exit();
        } else {
            echo '<div style="color:red;">ACCESO DENEGADO: email o contraseña incorrectos</div>';
        }
    }
}
?>
