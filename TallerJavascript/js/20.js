function realizarOperaciones() {
    let numero1 = parseFloat(document.getElementById('numero1').value);
    let numero2 = parseFloat(document.getElementById('numero2').value);

    if (isNaN(numero1) || isNaN(numero2)) {
        mostrarResultado('Por favor, ingresa números válidos.');
        return;
    }

    let resultado = '';

    resultado += 'Suma: ' + (numero1 + numero2) + '<br>';
    resultado += 'Resta: ' + (numero1 - numero2) + '<br>';
    resultado += 'Multiplicación: ' + (numero1 * numero2) + '<br>';

    if (numero2 !== 0) {
        resultado += 'División: ' + (numero1 / numero2) + '<br>';
    } else {
        resultado += 'División: No se puede dividir por 0<br>';
    }

    resultado += 'Potenciación: ' + Math.pow(numero1, numero2) + '<br>';

    if (numero2 >= 0) {
        resultado += 'Radicación: ' + Math.pow(numero1, 1 / numero2) + '<br>';
    } else {
        resultado += 'Radicación: No se puede calcular con un exponente negativo<br>';
    }

    if (numero1 > 0 && numero2 > 0) {
        resultado += 'Logaritmo: ' + Math.log(numero1) / Math.log(numero2) + '<br>';
    } else {
        resultado += 'Logaritmo: No se puede calcular con números no positivos o cero <br>';
    }

    mostrarResultado(resultado);
}

function mostrarResultado(resultado) {
    let resultadoDiv = document.getElementById('resultado');
    resultadoDiv.innerHTML = resultado;
}