function esPalindromo(frase) {
   
    const cadenaInvertida = frase.split('').reverse().join('');
    
    return caracteresAlfabeticos === cadenaInvertida;
  }
  
  function verificarPalindromo() {
    const frase = prompt('Introduce una frase para verificar si es un palíndromo:');
  
    if (!frase) {
      alert('Por favor, ingresa una frase.');
      return;
    }
  
    if (esPalindromo(frase)) {
      alert('La frase es un palíndromo.');
    } else {
      alert('La frase no es un palíndromo.');
    }
  }
  
  verificarPalindromo();