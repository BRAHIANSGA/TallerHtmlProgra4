import React, { useState } from 'react';

function AgregarEstudiante({ agregarEstudiante }) {
  const [nuevoEstudiante, setNuevoEstudiante] = useState({
    nombre: '',
    apellido: '',
    programa: '',
    documento: ''
  });

  const handleInputChange = (event) => {
    const { name, value } = event.target;
    setNuevoEstudiante({
      ...nuevoEstudiante,
      [name]: value
    });
  };

  const handleSubmit = (event) => {
    event.preventDefault();
    if (
      nuevoEstudiante.nombre.trim() !== '' &&
      nuevoEstudiante.apellido.trim() !== '' &&
      nuevoEstudiante.programa.trim() !== '' &&
      nuevoEstudiante.documento.trim() !== ''
    ) {
      agregarEstudiante({
        id: Date.now(),
        nombre: nuevoEstudiante.nombre,
        apellido: nuevoEstudiante.apellido,
        programa: nuevoEstudiante.programa,
        documento: nuevoEstudiante.documento
      });
      setNuevoEstudiante({
        nombre: '',
        apellido: '',
        programa: '',
        documento: ''
      });
    }
  };

  return (
    <form onSubmit={handleSubmit}>
      <input
        type="text"
        name="nombre"
        placeholder="Nombre del estudiante"
        value={nuevoEstudiante.nombre}
        onChange={handleInputChange}
      />
      <input
        type="text"
        name="apellido"
        placeholder="Apellido del estudiante"
        value={nuevoEstudiante.apellido}
        onChange={handleInputChange}
      />
      <input
        type="text"
        name="programa"
        placeholder="Programa del estudiante"
        value={nuevoEstudiante.programa}
        onChange={handleInputChange}
      />
      <input
        type="number"
        name="documento"
        placeholder="Documento del estudiante"
        value={nuevoEstudiante.documento}
        onChange={handleInputChange}
      />
      <button type="submit">Agregar Estudiante</button>
    </form>
  );
}

export default AgregarEstudiante;
