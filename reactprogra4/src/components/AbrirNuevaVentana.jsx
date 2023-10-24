import React from 'react';

class AbrirNuevaVentana extends React.Component {
  abrirVentanaNueva = () => {
    
    const url = 'https://miaulavirtual.ucp.edu.co/login/index.php';

    
    const nuevaVentana = window.open(url, '_blank', 'width=800,height=600');

    
    if (nuevaVentana) {
      nuevaVentana.focus(); 
    } else {
      alert('No se pudo abrir una nueva ventana. Asegúrate de permitir ventanas emergentes en tu navegador.');
    }
  }

  render() {
    return (
      <div>
        <h2>Abrir una Nueva Ventana</h2>
        <button onClick={this.abrirVentanaNueva}>Abrir Nueva Ventana</button>
      </div>
    );
  }
}

export default AbrirNuevaVentana;
