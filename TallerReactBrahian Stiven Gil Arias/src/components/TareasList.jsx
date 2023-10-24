import React from 'react';
import TareasItems from './TareasItems';

function TareasList({ tasks, completeTask, deleteTask }) {
  return (
    <ul>
      {tasks.map((task) => (
        <TareasItems key={task.id} task={task} completeTask={completeTask} deleteTask={deleteTask} />
      ))}
    </ul>
  );
}

export default TareasList;
