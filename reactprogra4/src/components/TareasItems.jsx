import React from 'react';

function TareasItems({ task, completeTask, deleteTask }) {
  return (
    <li>
      <span style={{ textDecoration: task.completed ? 'line-through' : 'none' }}>
        {task.text}
      </span>
      <button onClick={() => completeTask(task.id)}>
        {task.completed ? 'Desmarcar' : 'Completar'}
      </button>
      <button onClick={() => deleteTask(task.id)}>Eliminar</button>
    </li>
  );
}

export default TareasItems;
