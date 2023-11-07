import React, { useState } from 'react';
import DatePicker from 'react-datepicker';
import 'react-datepicker/dist/react-datepicker.css'; 
import 'react-datepicker/dist/react-datepicker-cssmodules.css'; 

function Fecha() {
  const [selectedDate, setSelectedDate] = useState(null);
  const [selectedDateNew, setSelectedDatenew] = useState(Date.now());
  const [respuesta, setRespuesta] = useState("");

  const handleDateChange = (date) => {
    setSelectedDate(date);
    compararFecha();
  };

  const compararFecha = () => {
    if (selectedDate>selectedDateNew) {
      setRespuesta("La fecha Seleccionada es MAYOR a la Fecha Actual");
    }else{
      setRespuesta("La fecha Seleccionada es MENOR a la Fecha Actual");
    }
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
      <p>Comparacion de fecha: {respuesta}</p>
    </div>
  );
}

export default Fecha;
