import React, { useState } from 'react';
import DatePicker from 'react-datepicker';
import 'react-datepicker/dist/react-datepicker.css'; 
import 'react-datepicker/dist/react-datepicker-cssmodules.css'; 

function Fecha() {
  const [selectedDate, setSelectedDate] = useState(null);

  const handleDateChange = (date) => {
    setSelectedDate(date);
  };

  return (
    <div>
      <h2>Selecciona una fecha</h2>
      <DatePicker
        selected={selectedDate}
        onChange={handleDateChange}
        dateFormat="dd/MM/yyyy" // Formato de fecha
      />
      {selectedDate && (
        <p>Fecha seleccionada: {selectedDate.toLocaleDateString()}</p>
      )}
    </div>
  );
}

export default Fecha;
