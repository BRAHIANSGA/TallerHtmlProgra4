function mostrarCoordenadas(event) {
    let coordenadasDiv = document.getElementById('coordenadas');
    coordenadasDiv.innerHTML = 'Coordenadas del ratón: X=' + event.clientX + ', Y=' + event.clientY;
}


function mostrarTecla(event) {
    let teclaDiv = document.getElementById('teclaPresionada');
    teclaDiv.innerHTML = 'Tecla presionada: ' + event.key + ' (Código Unicode: ' + event.keyCode + ')';
}

// Capturar eventos de movimiento del ratón
document.addEventListener('mousemove', mostrarCoordenadas);

// Capturar eventos de teclado
document.addEventListener('keydown', mostrarTecla);