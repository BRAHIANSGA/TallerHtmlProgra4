import React, { Component } from 'react';

class Factorial extends Component {
  constructor(props) {
    super(props);
    this.state = {
      number: '',
      factorial: null,
    };
  }

  handleInputChange = (event) => {
    this.setState({ number: event.target.value });
  }

  calculateFactorial = () => {
    const number = parseInt(this.state.number);
    if (!isNaN(number)) {
      let result = 1;
      for (let i = 1; i <= number; i++) {
        result *= i;
      }
      this.setState({ factorial: result });
    } else {
      this.setState({ factorial: null });
      alert("Por Favor Ingrese un Numero Valido");
    }
  }

  render() {
    return (
      <div>
        <h2>Calculadora de Factorial</h2>
        <input
          type="text"
          placeholder="Ingresa un número"
          value={this.state.number}
          onChange={this.handleInputChange}
        />
        <button onClick={this.calculateFactorial}>Calcular Factorial</button>
        {this.state.factorial !== null && (
          <p>El factorial de {this.state.number} es {this.state.factorial}</p>
        )}
      </div>
    );
  }
}

export default Factorial;
