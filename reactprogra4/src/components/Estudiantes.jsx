import React, { useState } from 'react';
import ListarEstudiantes from './ListarEstudiantes';
import AgregarEstudiante from './AgregarEstudiante';

function Estudiantes() {
    const [estudiantes, setEstudiantes] = useState([]);

    const agregarEstudiante = (nuevoEstudiante) => {
      setEstudiantes([...estudiantes, nuevoEstudiante]);
    };
  
    const actualizarEstudiante = (estudianteActualizado) => {
        const nuevosEstudiantes = estudiantes.map((estudiante) =>
          estudiante.id === estudianteActualizado.id ? estudianteActualizado : estudiante
        );
        setEstudiantes(nuevosEstudiantes);
    };
  
    const eliminarEstudiante = (idEstudiante) => {
        const estudiantesActualizados = estudiantes.filter((estudiante) => estudiante.id !== idEstudiante);
        setEstudiantes(estudiantesActualizados);
    };
  
    return (
      <div>
        <h1>Gestión de Estudiantes</h1>
        <AgregarEstudiante agregarEstudiante={agregarEstudiante} />
        <ListarEstudiantes
          estudiantes={estudiantes}
          actualizarEstudiante={actualizarEstudiante}
          
          eliminarEstudiante={eliminarEstudiante}
        />
      </div>
    );
  }

export default Estudiantes;
