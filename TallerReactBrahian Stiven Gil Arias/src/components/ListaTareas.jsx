import React, { useState } from 'react';
import TareasList from './TareasList';
import AñadirTareas from './AñadirTareas';

function ListaTareas() {
  const [tasks, setTasks] = useState([]);
  
  const addTask = (newTask) => {
    setTasks([...tasks, newTask]);
  };

  const completeTask = (taskId) => {
    const updatedTasks = tasks.map((task) =>
      task.id === taskId ? { ...task, completed: !task.completed } : task
    );
    setTasks(updatedTasks);
  };

  const deleteTask = (taskId) => {
    const updatedTasks = tasks.filter((task) => task.id !== taskId);
    setTasks(updatedTasks);
  };

  return (
    <div>
      <h1>Tareas Pendientes</h1>
      <AñadirTareas addTask={addTask} />
      <TareasList tasks={tasks} completeTask={completeTask} deleteTask={deleteTask} />
      
    </div>
  );
}

export default ListaTareas;
