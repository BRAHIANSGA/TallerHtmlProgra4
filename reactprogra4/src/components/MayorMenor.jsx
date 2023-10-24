import React, { useState } from 'react';

const MayorMenor = () => {
  const [numeros, setNumeros] = useState({ num1: 0, num2: 0, num3: 0 });

  const handleInputChange = (event) => {
    const { name, value } = event.target;
    setNumeros({ ...numeros, [name]: Number(value) });
  };

  const determinarMayor = () => {
    const { num1, num2, num3 } = numeros;
    return Math.max(num1, num2, num3);
  };

  const determinarMenor = () => {
    const { num1, num2, num3 } = numeros;
    return Math.min(num1, num2, num3);
  };

  const obtenerNegativos = () => {
    const { num1, num2, num3 } = numeros;
    return [num1, num2, num3].filter(num => num < 0);
  };

  return (
    <div>
      <h1>Determinar mayor, menor y negativos</h1>
      <input
        type="number"
        name="num1"
        value={numeros.num1}
        onChange={handleInputChange}
        placeholder="Número 1"
      />
      <input
        type="number"
        name="num2"
        value={numeros.num2}
        onChange={handleInputChange}
        placeholder="Número 2"
      />
      <input
        type="number"
        name="num3"
        value={numeros.num3}
        onChange={handleInputChange}
        placeholder="Número 3"
      />

      <button onClick={() => alert(`El número mayor es: ${determinarMayor()}`)}>
        Determinar Mayor
      </button>
      <button onClick={() => alert(`El número menor es: ${determinarMenor()}`)}>
        Determinar Menor
      </button>
      <button onClick={() => alert(`Números negativos: ${obtenerNegativos().join(', ')}`)}>
        Obtener Negativos
      </button>
    </div>
  );
};

export default MayorMenor;
