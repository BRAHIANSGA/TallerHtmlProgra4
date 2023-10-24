import React, { useState } from 'react';

function Cadenas() {
  const [inputValue, setInputValue] = useState('');
  const [result, setResult] = useState('');

  const handleInputChange = (e) => {
    setInputValue(e.target.value);
    setResult('');
  };

  const checkCase = () => {
    const isLowerCase = /^[a-z]+$/.test(inputValue);
    const isUpperCase = /^[A-Z]+$/.test(inputValue);

    if (isLowerCase) {
      setResult('Todas las letras son minúsculas.');
    } else if (isUpperCase) {
      setResult('Todas las letras son mayúsculas.');
    } 
    
  };

  return (
    <div>
      <h2>Verificar Mayúsculas o Minúsculas</h2>
      <input
        type="text"
        placeholder="Ingresa una cadena"
        value={inputValue}
        onChange={handleInputChange}
      />
      <button onClick={checkCase}>Verificar</button>
      {result && <p>{result}</p>}
    </div>
  );
}

export default Cadenas;
