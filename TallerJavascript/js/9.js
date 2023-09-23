function contieneMayusculas(cadena) {
    return /[A-Z]/.test(cadena);
  }
  
  function contieneMinusculas(cadena) {
    return /[a-z]/.test(cadena);
  }
  
  function determinarMayusculasOMinusculas() {
    const cadena = prompt('Introduce una cadena:');
  
    if (!cadena) {
      alert('Por favor, ingresa una cadena.');
      return;
    }
  
    const contieneMayus = contieneMayusculas(cadena);
    const contieneMinus = contieneMinusculas(cadena);
  
    if (contieneMayus && contieneMinus) {
      alert('');
    } else if (contieneMayus) {
      alert('Todas las letras de la cadena son mayúsculas.');
    } else if (contieneMinus) {
      alert('Todas las letras de la cadena son minúsculas.');
    } else {
      alert('La cadena no contiene letras.');
    }
  }
  
  determinarMayusculasOMinusculas();