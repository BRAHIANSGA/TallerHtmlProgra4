import React from "react";

class AbrirNuevaVentana extends React.Component {
  abrirVentanaNueva = (opcion) => {
    const url = "https://miaulavirtual.ucp.edu.co/login/index.php";
    switch (opcion) {
      case 1:
        url =
          "https://www.ucp.edu.co/?https://ucp.edu.co/&gclid=CjwKCAjwv-2pBhB-EiwAtsQZFI33b-L4mqAZc18lKAYWF-VlsWomM8fn-LN-0xl7k8jvtPMkxzapLxoCpf4QAvD_BwE";
        break;
      case 2:
        url = "https://biblioteca.ucp.edu.co/";
        break;
      case 3:
        url = "https://www.youtube.com/";
        break;
      case 4:
        url =
          "https://medium.com/@vitaliysteffensen/react-js-how-to-add-an-image-a-beginners-guide-66334f1d18be";
        break;
      default:
        break;
    }

    const nuevaVentana = window.open(url, "_blank", "width=800,height=600");

    if (nuevaVentana) {
      nuevaVentana.focus();
    } else {
      alert(
        "No se pudo abrir una nueva ventana. Asegúrate de permitir ventanas emergentes en tu navegador."
      );
    }
  };

  render() {
    return (
      <div>
        <h2>Abrir una Nueva Ventana</h2>
        <button onClick={this.abrirVentanaNueva(1)}>Abrir Nueva Ventana1</button>
        <button onClick={this.abrirVentanaNueva(2)}>Abrir Nueva Ventana2</button>
        <button onClick={this.abrirVentanaNueva(3)}>Abrir Nueva Ventana3</button>
        <button onClick={this.abrirVentanaNueva(4)}>Abrir Nueva Ventana4</button>

      </div>
    );
  }
}

export default AbrirNuevaVentana;




