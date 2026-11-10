<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>GOLDTY</title>
  <link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="style/style.css">
</head>
<body class="background">
  <!--NAVBAR-->
  
  <header class="goldty-header">
    <div class="nav-container">
      <div class="logo">
        <img src="IMG/newlogo.jpeg" alt="GOLDTY">
        <span class="name">GOLDTY</span>
      </div>
      <!-- Botón hamburguesa -->
  <button id="abrir" class="menu-toggle">☰</button>

<!-- Menú -->
  <nav class="main-nav" id="nav">
  <button id="cerrar" class="menu-close">✖</button>
  <ul class="listaC">
    <li>Inicio</li>
    <li>Sobre nosotros</li>
    <li>Funcionabilidad</li>
    <li>Contactanos</li>
  </ul>

  <!--Botones para cel-->

   <div class="cel-boton">
    <button class="login-button"><a href="login.php" style="color: #ffffff;">Iniciar Sesión</a></button> 
    <button class="login-button"><a href="register.php" style="color: #ffffff;">Registrarse</a></button>
  </div>
  </nav>

  <!--botones para compu-->
  
      <div class="header-actions">
        <button class="login-button"><a href="login.php" style="color: #ffffff;">Iniciar Sesión</a></button> 
        <button class="login-button"><a href="register.php" style="color: #ffffff;">Registrarse</a></button>
      </div>
    </div>
  </header>

<!--Img 1st-->
<!-- Video en autoplay, sin controles -->
<video width="100%" height="auto" autoplay muted loop>
  <source src="IMG/tabletvideo.mp4" type="video/mp4">
  Tu navegador no soporta videos HTML5.
</video>


<!--text-->

<div class="text_">
  <h2 id="goldty" style="text-align: center;">GOLDTY</h2>
  <p class="texto">En GOLDTY somos un equipo apasionado por la gestión productiva y eficaz de tu tiempo, creemos que la clave para conseguir tus objetivos y vivir una vida equilibrada es priorizar las cosas realmente importantes.
  </p>
</div>

<!--V & M-->

<div class="card-row">
  <div class="card" style="width: 18rem;">
    <img src="IMG/reminder-note-1-27.png" class="card-img" alt="...">
    <div class="card-body">
      <h5 class="card-title" style="text-align: center;">Misión</h5>
      <p class="card-text">En nuestra plataforma, ayudamos a las personas a clasificar, priorizar y gestionar sus actividades de manera simple y efectiva, para que puedan aprovechar mejor su tiempo y alcanzar sus objetivos.En nuestra plataforma, ayudamos a las personas a clasificar, priorizar y gestionar sus actividades de manera simple y efectiva, para que puedan aprovechar mejor su tiempo y alcanzar sus objetivos.</p>
    </div>
  </div>

  <div class="card" style="width: 18rem;">
    <img src="IMG/time-91.png" class="card-img" alt="...">
    <div class="card-body">
      <h5 class="card-title" style="text-align: center;">Visión</h5>
      <p class="card-text">Nuestra visión es ser la herramienta principal para la gestión del tiempo, ayudando a millones de personas a lograr sus metas personales y profesionales.</p>
    </div>
  </div>
</div>

<!--Beneficios-->

<div class="text-b">
  <h2 id="beneficios" style="text-align: center;">Beneficios</h2>
  <p class="texto-b">GOLDTY te proporciona ventajas para tu comodidad y gestión del tiempo, nuestras principales ventajas son:</p>
</div>

<div class="beneficios mt-3 d-sm-block">
  <div class="row">
    <div class="card-container">
      <div class="card-b" style="width: 18rem;">
        <img src="IMG/user-interface 2.png" class="card-img-b" alt="...">
        <div class="card-body">
          <h5 class="card-title-b" style="text-align: center;">Interfaz</h5>
          <p class="card-text-b">GOLDTY tiene una interfaz más sencilla que otras plataformas, con botones intuitivos, ¡Y mucho más!</p>
        </div>
      </div>
    </div>

    <div class="col-md-6">
      <div class="card-b" style="width: 18rem;">
        <img src="IMG/time-57.png" class="card-img-b" alt-b="...">
        <div class="card-body-b">
          <h5 class="card-title-b" style="text-align: center;">Gestión</h5>
          <p class="card-text-b">Con GOLDTY, la gestión de tu tiempo es más fácil.</p>
        </div>
      </div>
    </div>

    <div class="col-md-6">
      <div class="card-b" style="width: 18rem;">
        <img src="IMG/reminder-note-1-27.png" class="card-img-b" alt="...">
        <div class="card-body-b">
          <h5 class="card-title-b" style="text-align: center;">Priorización</h5>
          <p class="card-text-b">Puede priorizar sus actividades en tres categorías: Urgente, Importante y No importante.</p>
        </div>
      </div>
    </div>

    <div class="col-md-6">
      <div class="card-b" style="width: 18rem;">
        <img src="IMG/checklist-59.png" class="card-img-b" alt="...">
        <div class="card-body-b">
          <h5 class="card-title-b" style="text-align: center;">Récords</h5>
          <p class="card-text-b">Puede revisar sus actividades anteriores.</p>
        </div>
      </div>
    </div>
  </div>
</div>

<!--img 2nd-->

<div class="body-img" >
    <img src="IMG/workspace.png" alt="" class="w-100 w-sm-75 w-md-50"> <!--falta img-->
</div>

<!--Try-->

<div class="register-invitation">
  <div class="register-text">
    <h3>¡Es tu turno de intentarlo!</h3>
    <p>¿No tienes una cuenta?</p>
    <div class="register-input">
      <input type="email" placeholder="erikaleal@outlook.com" disabled>
      <button class="signup-button"><a href="register.php" style="color: #fff8ff;">Registrarse</a></button>
    </div>
  </div>
</div>

<!--Como se usa-->

<div class="como-usar">
  <h3 class="como-usar-titulo">Como se usa</h3>
  <p class="como-usar-sub">Añadir tus actividades es facil! Aqui puedes encontrar como paso a paso:</p>

  <ol class="como-usar-pasos">
    <li><span class="pasos-numero">01</span> Escribe el titulo o nombre de tu actividad. </li>
    <li><span class="pasos-numero">02</span> Escribe una breve descripción de tu actividad. </li>
    <li><span class="pasos-numero">03</span> Selecciona la categoria de tu actividad como Estudio, Trabajo, Ocio, entre otras. </li>
    <li><span class="pasos-numero">04</span> Selecciona la fecha y la hora de tu actividad. </li>
    <li><span class="pasos-numero">05</span> Selecciona si ya esta completada o no. </li>
    <li><span class="pasos-numero">06</span> ¡Solo presiona "Listo" y eso es todo! </li>
  </ol>
</div>

<!--img new activities-->

<div class="new-img" >
    <img src="IMG/actU.png" alt="" class="w-100 w-sm-75 w-md-50">
</div>

<!--Try it now-->

<div class="text">
  <h2 id="goldty" style="text-align: center;">¡Pruebala ahora!</h2>
</div>

<?php include("footer.php");
?>

</body>
<script src="Script/index.js"></script>
</html>