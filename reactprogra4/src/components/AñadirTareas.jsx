import React, { useState } from 'react';

function AñadirTareas({ addTask }) {
  const [newTask, setNewTask] = useState('');

  const handleInputChange = (event) => {
    setNewTask(event.target.value);
  };

  const handleSubmit = (event) => {
    event.preventDefault();
    if (newTask.trim() !== '') {
      addTask({ id: Date.now(), text: newTask, completed: false });
      setNewTask('');
    }
  };

  return (
    <form onSubmit={handleSubmit}>
      <input
        type="text"
        placeholder="Nueva tarea"
        value={newTask}
        onChange={handleInputChange}
      />
      <button type="submit">Agregar</button>
    </form>
  );
}

export default AñadirTareas;
