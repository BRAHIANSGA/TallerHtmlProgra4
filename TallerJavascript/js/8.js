


function esNumeroValido(numeroCelular) {

    return (!/[a-zA-Z]/.test(numeroCelular));
}


function numParImpar() {
    let n = prompt("Digite um número: ");

    if (esNumeroValido(n)) {
        if (n % 2 == 0) {
            alert(`El numero ${n} es un numero par.`);
        }else{
            alert(`El numero ${n} es un numero impar.`);
        }
    }else{
        alert("por favor ingrese un numero valido");
    }

}

numParImpar();