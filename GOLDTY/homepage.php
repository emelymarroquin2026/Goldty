<?php include("conexion.php")
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Your Workspace on GOLDTY</title>
  <link rel="stylesheet" href="style/homepage.css"/>

<script src="https://kit.fontawesome.com/afa4b36741.js" crossorigin="anonymous"></script>
</head>
<body>
 

  <aside class="sidebar">
    <h2>MENU</h2>
    <ul>
      <li><span class="icon"><i class="fa-solid fa-user"></i></span><a href="perfil.php" style="color: white; text-decoration: none;">Perfil</a></li>
      <li><span class="icon"><i class="fa-solid fa-people-line"></i></span> <a href="sobreNosotros.php" style="color: white; text-decoration: none;">Sobre nosotros</a></li>
      <li><span class="icon"><i class="fa-solid fa-circle-info"></i></span><a href="aprendeMas.php" style="color: white; text-decoration: none;">Aprende más</a></li>
      <li><span class="icon"><i class="fa-solid fa-hourglass-half"></i></span><a href="pomodoro.php" style="color: white; text-decoration: none;">Tecnica de Pomodoro</a> </li>
      <li><span class="icon"><i class="fa-solid fa-business-time"></i></span><a href="historial.php" style="color: white; text-decoration: none;">Historial</a> </li>
      <li><span class="icon"><i class="fa-solid fa-right-from-bracket"></i></span><a href="cerrarsesion.php" style="color: white; text-decoration: none;">Cerrar sesión</a></li>
    </ul>
  </aside>

  <main class="main-content">
    <div class="header">
      <button class="menu-toggle" onclick="toggleMenu()">☰</button>
      <h1 class="title">Tu espacio de trabajo en <span class="highlight">GOLDTY</span></h1>
      <div class="header-placeholder"></div>
    </div>


    <section class="activities-section">
      <h2>ACTIVIDADES PENDIENTES</h2>
      <div class="activities-grid">
        <div class="activity-item">
          <a href="verUrg.php" class="activity-box urgent">VER ACTIVIDADES URGENTES</a>
        </div>
        <div class="activity-item">
          <a href="verImp.php" class="activity-box important">VER ACTIVIDADES IMPORTANTES</a>
        </div>
        <div class="activity-item">
          <a href="verNoimp.php" class="activity-box not-important">VER ACTIVIDADES NO IMPORTANTES</a>
        </div>
      </div>


      <h2>AÑADIR NUEVAS ACTIVIDADES</h2>
      <div class="activities-grid">
        <div class="activity-item">
          <a href="agendar.php" class="activity-box urgent"><i class="fa-solid fa-circle-plus"></i> AÑADIR ACTIVIDAD URGENTE</a>
        </div>
        <div class="activity-item">
          <a href="agendarImp.php" class="activity-box important"><i class="fa-solid fa-circle-plus"></i>AÑADIR ACTIVIDAD IMPORTANTE</a>
        </div>
        <div class="activity-item">
          <a href="agendarNoimp.php" class="activity-box not-important"><i class="fa-solid fa-circle-plus"></i>AÑADIR ACTIVIDAD NO IMPORTANTE</a>
        </div>
         
      </div>
     
    </section>
  </main>

<script src="Scrip/notificaciones.js"></script>

<script>
  function toggleMenu() {
    const sidebar = document.querySelector('.sidebar');
    sidebar.classList.toggle('active');
  }

  document.addEventListener('DOMContentLoaded', function () {
    const sidebar = document.querySelector('.sidebar');
    const menuButton = document.querySelector('.menu-toggle');

    // Cerrar el menú si haces clic fuera de él
    document.addEventListener('click', function (event) {
      const isClickInsideSidebar = sidebar.contains(event.target);
      const isClickOnMenuButton = menuButton.contains(event.target);

      if (!isClickInsideSidebar && !isClickOnMenuButton) {
        sidebar.classList.remove('active');
      }
    });
  });

 

</script>



</body>
</html>

