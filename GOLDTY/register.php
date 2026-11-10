<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <link rel="stylesheet" href="style/register.css">
</head>
<body>

<div class="header">
    <button class="back-btn">
      <a href="index.php"><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-arrow-left-circle" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8m15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0m-4.5-.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5z" style="color: white;"/>
</svg></a>
    </button>
    <h1>GOLDTY</h1>
    <div class="logo">
      <img src="img/newlogo.jpeg" alt="GOLDTY" />
    </div>
  </div>

<form method="POST">
    <div class="form-container">

    <h1 class="goldty">GOLDTY</h1><br>

    <h3>Registrate</h3><br>

    <div class="input-wrapper">
        <input type="text" name="name" placeholder="Nombre">
    </div>

    <div class="input-wrapper">
        <input type="text" name="age" placeholder="Edad">
    </div>

    <div class="input-wrapper">
        <input type="text" name="ocupacion" placeholder="Ocupación">
    </div>

    <div class="input-wrapper">
        <input type="email" name="email" placeholder="Email">
    </div>

    <div class="input-wrapper">
        <input type="password" name="password" placeholder="Contraseña">
    </div>

    <input class="btn" type="submit" value="Enviar" name="register" />

    <p class="no">¿Ya tienes una cuenta? <a href="login.php">Inicia Sesión ahora!</a></p>
</form>

<?php
    include("registrar.php")
?>

</body>
</html>