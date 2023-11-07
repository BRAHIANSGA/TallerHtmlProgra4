import ReactDOM from "react-dom/client";
import { BrowserRouter, Routes, Route } from "react-router-dom";
import Layout from "./components/Layout";
import Home from "./components/Home";
import FibonacciCalculator from "./components/FibonacciCalculator";
import Fecha from "./components/Fecha";
import AbrirNuevaVentana from "./components/AbrirNuevaVentana";
import CalcularFunciones from "./components/CalcularFunciones";
// import NoPage from "./components/NoPage";

export default function App() {
  return (
    <BrowserRouter>
      <Routes>
        <Route path="/" element={<Layout />}>
          <Route index element={<Home />} />

          <Route path="fecha" element={<Fecha />} />
          <Route path="fibo" element={<FibonacciCalculator />} />
          <Route path="nuevaVentana" element={<AbrirNuevaVentana />} />
          <Route path="funciones" element={<CalcularFunciones />} />
          {/* <Route path="*" element={<NoPage />} /> */}
        </Route>
      </Routes>
    </BrowserRouter>
  );
}

