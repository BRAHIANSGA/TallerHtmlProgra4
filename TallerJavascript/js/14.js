function muestraOculta(numero) {
    let contenidoID = 'contenidos_' + numero;
    let enlaceID = 'enlace_' + numero;
    let contenido = document.getElementById(contenidoID);
    let enlace = document.getElementById(enlaceID);

    if (contenido.style.display === 'none') {
        contenido.style.display = 'block';
        enlace.textContent = 'Ocultar contenidos';
    } else {
        contenido.style.display = 'none';
        enlace.textContent = 'Mostrar contenidos';
    }
}