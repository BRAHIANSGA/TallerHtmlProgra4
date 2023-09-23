function esNumeroCelularValido(numeroCelular) {

    return /^\d{10}$/.test(numeroCelular) && !/[a-zA-Z]/.test(numeroCelular);
}

function validarNumeroCelular() {

    const numeroCelular = prompt('Introduce tu número de celular (10 dígitos):');


    if (esNumeroCelularValido(numeroCelular)) {
        alert('El número de celular es válido.');
    } else {
        alert('El número de celular no es válido. Asegúrate de ingresar 10 dígitos numéricos.');
    }
}


validarNumeroCelular();