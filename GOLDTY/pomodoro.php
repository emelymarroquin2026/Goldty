<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Técnica Pomodoro</title>
  <link rel="stylesheet" href="style/pomodoro.css" />
</head>
<body>

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

  <header class="hero">
   
    <h1>Técnica Pomodoro</h1>
    <p>Divide y conquista tu tiempo con esta técnica efectiva de gestión.</p>
  </header>

  <section class="info">
    <h2>¿Cómo funciona?</h2>
    <p>
      La metodología es simple pero efectiva: consiste en dividir el tiempo de trabajo o estudio en bloques de <strong>25 minutos</strong>, conocidos como «pomodoros», seguidos de un breve descanso de <strong>5 minutos</strong>. Después de completar <strong>cuatro ciclos</strong>, se toma un descanso más largo, de entre <strong>15 y 30 minutos</strong>. Tambien puedes editar estos pomodoros a tu estilo, disminuir o aumentar, segun como quieras organizarte.
    </p>
  </section>

  <section class="timer-section">
    <h2 id="session-label">Temporizador Pomodoro</h2>

   
    <div class="custom-settings">
        <label>
            Pomodoro:
            <input type="number" id="pomodoroInput" value="25" min="1" />
        </label>
        <label>
            Descanso corto:
            <input type="number" id="shortBreakInput" value="5" min="1" />
        </label>
        <label>
            Pomodoro (2):
            <input type="number" id="secondPomodoroInput" value="25" min="1" />
        </label>
        <label>
            Descanso largo:
            <input type="number" id="longBreakInput" value="15" min="1" />
        </label>
        <button onclick="applySettings()">Aplicar ajustes</button>
    </div>


    <div id="timer">25:00</div>
    <div class="buttons">
        <button onclick="startTimer()">Iniciar</button>
        <button onclick="resetTimer()">Reiniciar</button>
    </div>

  </section>

  <footer>
    <p>Hecho con GOLDTY para mejorar tu productividad.</p>
  </footer>

  <script src="Script/pomodoro.js"></script>
</body>
</html>