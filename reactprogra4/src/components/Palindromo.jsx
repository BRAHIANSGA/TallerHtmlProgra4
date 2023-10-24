import React, { useState } from 'react';

function Palindromo() {
  const [inputValue, setInputValue] = useState('');
  const [isPalindrome, setIsPalindrome] = useState(null);

  const handleInputChange = (e) => {
    setInputValue(e.target.value);
  };

  const checkPalindrome = () => {
    // Elimina espacios .
    const cleanedInput = inputValue.toLowerCase().replace(/\s/g, '');

    // la cadena es un palíndromo.
    const reversedInput = cleanedInput.split('').reverse().join('');
    const result = cleanedInput === reversedInput;

    setIsPalindrome(result);
  };

  return (
    <div>
      <h2>Verificador de Palíndromos</h2>
      <input
        type="text"
        placeholder="Ingresa una frase"
        value={inputValue}
        onChange={handleInputChange}
      />
      <button onClick={checkPalindrome}>Verificar Palíndromo</button>
      {isPalindrome !== null && (
        <p>
          {isPalindrome
            ? 'La frase es un palíndromo.'
            : 'La frase no es un palíndromo.'}
        </p>
      )}
    </div>
  );
}

export default Palindromo;
