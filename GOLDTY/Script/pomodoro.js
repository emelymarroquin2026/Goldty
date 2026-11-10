let timer;
let timeLeft;
let isRunning = false;
let sessionCount = 0;
let isBreak = false;

let pomodoroMinutes = 25;
let shortBreakMinutes = 5;
let secondPomodoroMinutes = 25;
let longBreakMinutes = 15;

function updateDisplay() {
  const minutes = Math.floor(timeLeft / 60);
  const seconds = timeLeft % 60;
  document.getElementById("timer").textContent = `${String(minutes).padStart(2, '0')}:${String(seconds).padStart(2, '0')}`;
}

function startTimer() {
  if (isRunning) return;
  isRunning = true;

  if (!timeLeft) {
    if (!isBreak) {
      timeLeft = sessionCount === 0 ? pomodoroMinutes * 60 : secondPomodoroMinutes * 60;
    } else {
      timeLeft = sessionCount === 2 ? longBreakMinutes * 60 : shortBreakMinutes * 60;
    }
  }

  timer = setInterval(() => {
    timeLeft--;
    updateDisplay();

    if (timeLeft <= 0) {
      clearInterval(timer);
      isRunning = false;

      if (!isBreak) {
        sessionCount++;
        alert("¡Pomodoro terminado! Toma un descanso.");
      } else {
        alert("¡Descanso terminado! Hora de trabajar.");
      }

      isBreak = !isBreak;

      if (sessionCount >= 3 && !isBreak) {
        sessionCount = 0;
      }

      updateSessionLabel();

      if (!isBreak) {
        timeLeft = sessionCount === 0 ? pomodoroMinutes * 60 : secondPomodoroMinutes * 60;
      } else {
        timeLeft = sessionCount === 2 ? longBreakMinutes * 60 : shortBreakMinutes * 60;
      }

      updateDisplay();
      startTimer();
    }
  }, 1000);
}

function resetTimer() {
  clearInterval(timer);
  isRunning = false;
  isBreak = false;
  sessionCount = 0;
  timeLeft = pomodoroMinutes * 60;
  updateSessionLabel();
  updateDisplay();
}

function updateSessionLabel() {
  const label = document.getElementById("session-label");

  if (isBreak) {
    label.textContent = sessionCount === 2 ? "Descanso largo" : "Descanso corto";
  } else {
    const numeroPomodoro = sessionCount === 0 ? 1 : 2;
    label.textContent = `Pomodoro #${numeroPomodoro}`;
  }
}

function applySettings() {
  pomodoroMinutes = parseInt(document.getElementById("pomodoroInput").value) || 25;
  shortBreakMinutes = parseInt(document.getElementById("shortBreakInput").value) || 5;
  secondPomodoroMinutes = parseInt(document.getElementById("secondPomodoroInput").value) || 25;
  longBreakMinutes = parseInt(document.getElementById("longBreakInput").value) || 15;

  resetTimer();
}

applySettings();

function updateSessionLabel() {
  const label = document.getElementById("session-label");
  label.textContent = "Temporizador Pomodoro";
}