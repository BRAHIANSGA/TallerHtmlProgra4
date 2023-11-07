import React, { Component } from 'react';

class FibonacciCalculator extends Component {
  constructor() {
    super();
    this.state = {
      n: 0,
      result: null,
    };
  }

  calcularFibonacci = (n) => {
    if (n <= 1) {
      return n;
    }
    return this.calcularFibonacci(n - 1) + this.calcularFibonacci(n - 2);
  }

  handleInputChange = (event) => {
    this.setState({ n: event.target.value });
  }

  handleSubmit = () => {
    const n = parseInt(this.state.n, 10);
    if (!isNaN(n) && n >= 0) {
      const result = this.calcularFibonacci(n);
      this.setState({ result });
    } else {
      this.setState({ result: null });
    }
  }

  render() {
    return (
      <div>
        <h1>Calculadora de Fibonacci</h1>
        <input
          type="number"
          placeholder="Ingrese el valor de n"
          onChange={this.handleInputChange}
        />
        <button onClick={this.handleSubmit}>Calcular</button>
        {this.state.result !== null && (
          <p>
            El {this.state.n} n-esimo número de Fibonacci es: {this.state.result}
          </p>
        )}
      </div>
    );
  }
}
export default FibonacciCalculator;


