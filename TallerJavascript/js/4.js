let arreglo = [
    true,
    5,
    false,
    "hola",
    "adios",
    2
];

if (arreglo[3].length > arreglo[4].length) {
    alert("LA CADENA :" + arreglo[3] + " ES LA DE MAYOR TAMAÑO");

} else {
    alert("LA CADENA : " + arreglo[4] + " ES LA DE MAYOR TAMAÑO");

}
let bol1=(arreglo[0] || arreglo[2]);
let bol2=(arreglo[0] && arreglo[2]);
alert(" Operacion || ="+bol1);
alert(" Operacion && ="+bol2);
alert("LA SUMA DE 5 + 2 = "+(arreglo[1]+arreglo[5]));
alert("LA RESTA DE 5 - 2 = "+(arreglo[1]-arreglo[5]));
alert("LA MULTIPLICACION DE 5 * 2 = "+(arreglo[1]*arreglo[5]));
alert("LA DIVISION DE 5 / 2 = "+(arreglo[1]/arreglo[5]));
alert("LA RESIDUODE DE 5 % 2 = "+(arreglo[1]%arreglo[5]));

