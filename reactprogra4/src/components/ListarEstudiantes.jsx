import React, { useState } from 'react';
import ElementoEstudiante from './ElementoEstudiante';

function ListarEstudiantes({ estudiantes, actualizarEstudiante, eliminarEstudiante }) {
  const [busqueda, setBusqueda] = useState('');

  const handleBusqueda = (event) => {
    setBusqueda(event.target.value);
  };

  
  const estudiantesFiltrados = busqueda.trim() === '' ? estudiantes : estudiantes.filter((estudiante) =>
    Object.values(estudiante).some((campo) =>
      String(campo).toLowerCase().includes(busqueda.toLowerCase())
    )
  );

  return (
    <div>
      <h2>Lista de Estudiantes</h2>
      <input
        type="text"
        placeholder="Buscar estudiantes"
        value={busqueda}
        onChange={handleBusqueda}
      />
      <ul>
        {estudiantesFiltrados && estudiantesFiltrados.length > 0 ? (
          estudiantesFiltrados.map((estudiante) => (
            <ElementoEstudiante
              key={estudiante.id}
              estudiante={estudiante}
              actualizarEstudiante={actualizarEstudiante}
              eliminarEstudiante={eliminarEstudiante}
            />
          ))
        ) : (
          <li>No se encontraron estudiantes que coincidan con la búsqueda.</li>
        )}
      </ul>
    </div>
  );
}

export default ListarEstudiantes;
