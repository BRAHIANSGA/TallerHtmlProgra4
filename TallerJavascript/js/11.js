
// Función para contar enlaces en un párrafo
function contarEnlaces(parrafo) {
    let enlaces = parrafo.getElementsByTagName('a');
    return enlaces.length;
}
//prueba
function contarEnlacesA(pruebaURL) {
    let enlaces = document.getElementsByTagName('a');
    let count = 0;
    for (let i = 0; i < enlaces.length; i++) {
        if (enlaces[i].getAttribute('href') === pruebaURL) {
            count++;
        }
    }
    return count;
}

// Función para obtener el penúltimo enlace en un párrafo
function obtenerPenultimoEnlace(parrafo) {
    let enlaces = parrafo.getElementsByTagName('a');
    if (enlaces.length >= 2) {
        return enlaces[enlaces.length - 2].getAttribute('href');
    } else {
        return null;
    }
}


function mostrarInformacion() {

    const elementEnlaces = document.getElementsByTagName('p');
    let numEnlaces = 0;

    for (let index = 0; index < elementEnlaces.length; index++) {
        let parrafo = elementEnlaces[index];
        numEnlaces += contarEnlaces(parrafo);
        console.log(numEnlaces);
    }
    let informacionDiv = document.getElementById('informacion');

    // Contar enlaces en el tercer párrafo
    let tercerParrafo = document.getElementsByTagName('p')[2];
    let enlacesTercerParrafo = contarEnlaces(tercerParrafo);

    // Obtener el penúltimo enlace en el tercer párrafo
    let penultimoEnlaceTercerParrafo = obtenerPenultimoEnlace(tercerParrafo);

    //  a http://prueba/
    let enlacesPrueba = contarEnlacesA('http://prueba');

    informacionDiv.innerHTML = 'Número de enlaces en la pagina: ' + numEnlaces + '<br>' +
        'Número de enlaces en el tercer párrafo: ' + enlacesTercerParrafo + '<br>' +
        'Enlace al penúltimo enlace del tercer párrafo: ' + penultimoEnlaceTercerParrafo + '<br>' +
        'Número de enlaces que apuntan a http://prueba/: ' + enlacesPrueba;
}
