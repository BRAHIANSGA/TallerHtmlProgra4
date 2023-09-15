
function punto5() {
    let arra = [];

    arra.push(document.getElementById("1").value);
    arra.push(document.getElementById("2").value);
    arra.push(document.getElementById("3").value);
 

    arra.sort();
    let numeroMayorMenor="";
    let numNegativos="";
    for (let index = 0; index < 3; index++) {
        if (arra[index] < 0) {
            numNegativos += "El NUMERO: " + arra[index] + " ES NEGATIVO\n";
        }
        if (index == 2) {
            numeroMayorMenor += "El numero mayor es: " + arra[index] + "\n";
        }
        if (index == 0) {
            numeroMayorMenor += "El numero menor es:" + arra[index] + "\n";
        }
    }
    document.getElementById("mayorMenor").textContent = "El resultado es: " + numeroMayorMenor;
    document.getElementById("numNegativos").textContent = "El resultado es: " + numNegativos;

}