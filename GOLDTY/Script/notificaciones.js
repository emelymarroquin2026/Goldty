if (!document.getElementById("alerta-tiempo")) {
    const barra = document.createElement("div");
    barra.id = "alerta-tiempo";
    barra.style.display = "none";
    barra.innerHTML = '⏳ ¡Tienes actividades que comienzan pronto! <button id="cerrar-alerta" style="margin-left:10px;background:none;border:none;color:white;font-weight:bold;cursor:pointer;">X</button>';
    document.body.appendChild(barra);

   
    const estilo = document.createElement("style");
    estilo.innerHTML = `
        #alerta-tiempo {
            background-color: #f7c03e;
            color: #fff;
            text-align: center;
            font-weight: bold;
            padding: 40px;
            position: fixed;
            top: 56px;
            left: 0;
            width: 100%;
            z-index: 999;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
            animation: slideDown 0.5s ease-out;
        }
        @keyframes slideDown {
            from { transform: translateY(-100%); }
            to { transform: translateY(0); }
        }
    `;
    document.head.appendChild(estilo);
}


function mostrarAviso(titulo, descripcion) {
    document.getElementById("alerta-tiempo").style.display = "block";

    // Reproducir sonido
    const audio = new Audio("sonido.mp3");
    audio.play();


    if (Notification.permission === "granted") {
        new Notification(titulo, {
            body: descripcion,
            icon: "img/newlogo.jpeg"
        });
    } else {
        alert(`${titulo}\n${descripcion}`);
    }
}


setInterval(() => {
    let actividades = JSON.parse(localStorage.getItem("actividades")) || [];
    let ahora = new Date();
    let hayAviso = false;

    actividades.forEach(actividad => {
        const fechaHora = new Date(`${actividad.fecha}T${actividad.hora}`);
        const tiempoRestante = fechaHora - ahora;

        if (!actividad.avisado && tiempoRestante > 0 && tiempoRestante <= 10 * 60000) {
            mostrarAviso(actividad.titulo, actividad.descripcion);
            actividad.avisado = true;
            hayAviso = true;
        }
    });

 
    localStorage.setItem("actividades", JSON.stringify(actividades));


    if (!hayAviso) {
        document.getElementById("alerta-tiempo").style.display = "none";
    }
}, 30000);


document.addEventListener("click", (e) => {
    if (e.target.id === "cerrar-alerta") {
        document.getElementById("alerta-tiempo").style.display = "none";
    }
});

function mostrarAviso(titulo, descripcion) {
    // Mostrar barra amarilla de aviso
    document.getElementById("alerta-tiempo").style.display = "block";


    const audio = new Audio("sonidos/mixkit-melodical-flute-music-notification-2310.wav");
    audio.play().catch(err => {
        console.warn("El navegador bloqueó la reproducción automática del sonido:", err);
    });


    if (Notification.permission === "granted") {
        new Notification(titulo, {
            body: descripcion,
            icon: "img/newlogo.jpeg"
        });
    } else {
        alert(`${titulo}\n${descripcion}`);
    }
}

document.addEventListener("DOMContentLoaded", () => {
    if (Notification.permission !== "granted") {
        Notification.requestPermission();
    }
});