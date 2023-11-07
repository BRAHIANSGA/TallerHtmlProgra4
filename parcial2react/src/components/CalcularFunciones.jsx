import React, { Component } from 'react';

class CalcularFunciones extends Component {
  constructor(props) {
    super(props);
    this.state = {
      number1: '',
      number2: '',
      result: '',
      errorMessage: '',
    };
  }

  handleInputChange = (e) => {
    const { name, value } = e.target;
    this.setState({ [name]: value });
  }

  calcularOperaciones = () => {
    const { number1, number2 } = this.state;

    if (isNaN(number1) || isNaN(number2)) {
      this.setState({ errorMessage: 'Ingresa números válidos.' });
    } else {
      const num1 = parseFloat(number1);
      const num2 = parseFloat(number2);
      if (num1 === 0) {
        this.setState({ errorMessage2: 'La tangente no está definida para el segundo número igual a 0.' });
      }
      if (num2 === 0) {
        this.setState({ errorMessage: 'La tangente no está definida para el segundo número igual a 0.' });
      } else {
        const sine = Math.sin(num1);
        const cosine = Math.cos(num1);
        const tangent = Math.tan(num1);
        const isMultiple = num1 % num2 === 0;
        const sine2 = Math.sin(num2);
        const coseno2 = Math.cos(num2);
        const tangent2 = Math.tan(num2);
       

        this.setState({
          result: `Resultado dado en radianes >>>> Seno Numero 1: ${sine}, Coseno numero 1: ${cosine}, Tangente numero 1: ${tangent} ,
           ${num1} ${isMultiple ? 'ES' : 'NO ES'} MÚLTIPO DE  ${num2}`,
          errorMessage: '',
          result2: `Resultado dado en radianes >>>> Seno Numero 2: ${sine2}, Coseno numero 2: ${coseno2}, Tangente numero 2: ${tangent2} `,
          errorMessage2: '',
        });
      }
    }
  }

  render() {
    return (
      <div>
        <input
          type="text"
          name="number1"
          placeholder="Número 1"
          value={this.state.number1}
          onChange={this.handleInputChange}
        />
        <input
          type="text"
          name="number2"
          placeholder="Número 2"
          value={this.state.number2}
          onChange={this.handleInputChange}
        />
        <button onClick={this.calcularOperaciones}>Calcular</button>
        {this.state.errorMessage && <p>{this.state.errorMessage}</p>}
        {this.state.errorMessage2 && <p>{this.state.errorMessage2}</p>}
        {this.state.result && <p>{this.state.result}</p>}
        {this.state.result2 && <p>{this.state.result2}</p>}
      </div>
    );
  }
}

export default CalcularFunciones;
