function mostrarCoordenadas(event) {
    const posX = event.clientX;
    const posY = event.clientY;

    let posicionVertical = posY < window.innerHeight / 2 ? 'arriba' : 'abajo';
    let posicionHorizontal = posX < window.innerWidth / 2 ? 'izquierda' : 'derecha';

    alert(`Posición vertical: ${posicionVertical}, Posición horizontal: ${posicionHorizontal}`);
}

document.addEventListener('click', mostrarCoordenadas);