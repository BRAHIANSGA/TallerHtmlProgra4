
import React, { useState, useEffect } from 'react';

const Contador = () => {
  const [contador, setContador] = useState(0);

  const incrementarContador = () => {
    setContador(contador + 1);
  };

  const reiniciarContador = () => {
    setContador(0);
  };

  return (
    <div>
      <p>Contador: {contador}</p>
      <button onClick={incrementarContador}>Incrementar</button>
      <button onClick={reiniciarContador}>Reiniciar</button>
    </div>
  );
};

export default Contador;
