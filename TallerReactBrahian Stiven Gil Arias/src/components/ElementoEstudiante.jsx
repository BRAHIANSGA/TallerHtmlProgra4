import React, { useState } from 'react';

function ElementoEstudiante({ estudiante, actualizarEstudiante, eliminarEstudiante }) {
  const [editando, setEditando] = useState(false);
  const [nombreActualizado, setNombreActualizado] = useState(estudiante.nombre);
  const [apellidoActualizado, setApellidoActualizado] = useState(estudiante.apellido);
  const [programaActualizado, setProgramaActualizado] = useState(estudiante.programa);
  const [documentoActualizado, setDocumentoActualizado] = useState(estudiante.documento);

  const handleActualizar = () => {
    actualizarEstudiante({
      ...estudiante,
      nombre: nombreActualizado,
      apellido: apellidoActualizado,
      programa: programaActualizado,
      documento: documentoActualizado
    });
    setEditando(false);
  };

  return (
    <li>
      {editando ? (
        <>
          <input
            type="text"
            value={nombreActualizado}
            onChange={(e) => setNombreActualizado(e.target.value)}
          />
          <input
            type="text"
            value={apellidoActualizado}
            onChange={(e) => setApellidoActualizado(e.target.value)}
          />
          <input
            type="text"
            value={programaActualizado}
            onChange={(e) => setProgramaActualizado(e.target.value)}
          />
          <input
            type="text"
            value={documentoActualizado}
            onChange={(e) => setDocumentoActualizado(e.target.value)}
          />
          <button onClick={handleActualizar}>Guardar</button>
        </>
      ) : (
        <>
          <span>{estudiante.nombre} {estudiante.apellido}</span>
          <br/>
          <span>Programa: {estudiante.programa}</span>
          <br/>
          <span>Documento: {estudiante.documento}</span>
          <br/>
          <br/>
          <button onClick={() => setEditando(true)}>Editar</button>
          <button onClick={() => eliminarEstudiante(estudiante.id)}>Eliminar</button>

          <br/>
          <br/>
        </>
      )}
    </li>
  );
}

export default ElementoEstudiante;
