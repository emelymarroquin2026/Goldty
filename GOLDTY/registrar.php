<?php
session_start();
include("conexion.php");

if (isset($_POST['register'])) {
    if (
        strlen($_POST['name']) >= 1 &&
        strlen($_POST['age']) >= 1 &&
        strlen($_POST['ocupacion']) >= 1 &&
        strlen($_POST['email']) >= 1 &&
        strlen($_POST['password']) >= 1
    ) {
        $name = trim($_POST['name']);
        $age = trim($_POST['age']);
        $ocupacion = trim($_POST['ocupacion']);
        $email = trim($_POST['email']);
        $password = trim($_POST['password']);


        $verificarCorreo = "SELECT id_usuarios FROM usuarios WHERE correo = '$email'";
        $resultadoCorreo = mysqli_query($conexion, $verificarCorreo);

        if (mysqli_num_rows($resultadoCorreo) > 0) {
            echo "<h3 class='error'>El correo ya está registrado.</h3>";
        } else {

            $consulta = "INSERT INTO usuarios(nombre, edad, ocupacion, correo, contraseña) 
                         VALUES ('$name', '$age', '$ocupacion', '$email', '$password')";
            $resultado = mysqli_query($conexion, $consulta);

            if ($resultado) {
        
                $_SESSION['id'] = mysqli_insert_id($conexion);

                echo "<h3 class='success'>¡Registro exitoso! Redirigiendo...</h3>";
                header("Location: bienvenido.php"); 
                exit();
            } else {
                echo "<h3 class='error'>Ocurrió un error al registrar.</h3>";
            }
        }
    } else {
        echo "<h3 class='error'>Por favor completa todos los campos.</h3>";
    }
}
?>
