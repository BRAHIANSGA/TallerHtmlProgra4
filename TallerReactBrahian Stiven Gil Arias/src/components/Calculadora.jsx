import React, { Component } from 'react';

class Calculadora extends Component {
  constructor(props) {
    super(props);
    this.state = {
      num1: '',
      num2: '',
      operation: 'suma',
      result: '',
    };
  }

  handleInputChange = (event) => {
    const { name, value } = event.target;
    this.setState({ [name]: value });
  };

  handleOperationChange = (event) => {
    this.setState({ operation: event.target.value });
  };

  performOperation = () => {
    const { num1, num2, operation } = this.state;
    let result = '';

    switch (operation) {
      case 'suma':
        result = parseFloat(num1) + parseFloat(num2);
        break;
      case 'resta':
        result = parseFloat(num1) - parseFloat(num2);
        break;
      case 'multiplicacion':
        result = parseFloat(num1) * parseFloat(num2);
        break;
      case 'division':
        if (parseFloat(num2) === 0) {
          result = 'No se puede dividir por cero';
        } else {
          result = parseFloat(num1) / parseFloat(num2);
        }
        break;
      case 'potenciacion':
        result = Math.pow(parseFloat(num1), parseFloat(num2));
        break;
      case 'radicacion':
        if (parseFloat(num2) < 0) {
          result = 'No se puede calcular la raíz cuadrada de un número negativo';
        } else {
          result = Math.sqrt(parseFloat(num2));
        }
        break;
      case 'logaritmacion':
        if (parseFloat(num1) <= 0 || parseFloat(num2) <= 0) {
          result = 'No se puede calcular el logaritmo de un número negativo';
        } else {
          result = Math.log(parseFloat(num1)) / Math.log(parseFloat(num2));
        }
        break;
      default:
        result = 'Operación no válida';
    }

    this.setState({ result });
  };

  render() {
    return (
      <div>
        <h2>Calculadora</h2>
        <input
          type="text"
          name="num1"
          placeholder="Número 1"
          value={this.state.num1}
          onChange={this.handleInputChange}
        />
        <input
          type="text"
          name="num2"
          placeholder="Número 2"
          value={this.state.num2}
          onChange={this.handleInputChange}
        />
        <select value={this.state.operation} onChange={this.handleOperationChange}>
          <option value="suma">Suma</option>
          <option value="resta">Resta</option>
          <option value="multiplicacion">Multiplicación</option>
          <option value="division">División</option>
          <option value="potenciacion">Potenciación</option>
          <option value="radicacion">Radicación</option>
          <option value="logaritmacion">Logaritmación</option>
        </select>
        <button onClick={this.performOperation}>Calcular</button>
        {this.state.result !== '' && <p>Resultado: {this.state.result}</p>}
      </div>
    );
  }
}

export default Calculadora;
