function calcularFactorial(numero) {
    if (numero < 0) {
      return 'El  números es negativo por favor recargue e introduzca un numero positivo';
    } else if (numero === 0 || numero === 1) {
      return 1;
    } else {
      let factorial = 1;
      for (let i = 2; i <= numero; i++) {
        factorial *= i;
      }
      return factorial;
    }
  }
  
  function calcularFactorialYMostrarResultado() {
    const numero = parseInt(prompt('Introduce un número para calcular su factorial:'));
  
    if (!isNaN(numero)) {
      const factorial = calcularFactorial(numero);
      alert(`El factorial de ${numero} es: ${factorial}`);
    } else {
      alert('Por favor, introduce un número válido.');
    }
  }
  
  calcularFactorialYMostrarResultado();
  