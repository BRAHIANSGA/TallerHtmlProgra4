function Sumar() {
    var num1 = document.getElementById("number1").value;
    var num2 = document.getElementById("number2").value;
    var resultado = parseInt(num1) + parseInt(num2);
    document.getElementById("result").textContent = "El resultado es: " + resultado;

    
    
    console.log("El resultado es: " + resultado);
    window.alert("El resultado es: " + resultado);
    document.write("El resultado es: " + resultado);
}


function ContarVocales() {
    const vocales=/[áéíóú]/gi;
    let cadena=document.getElementById("textid").value;
    let resouesta=cadena.match(vocales);
    if(resouesta){
        document.getElementById("result2").textContent = "El resultado es: " + resouesta.length;
    }
    
}