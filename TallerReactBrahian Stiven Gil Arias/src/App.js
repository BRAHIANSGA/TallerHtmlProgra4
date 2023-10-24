import ReactDOM from "react-dom/client";
import { BrowserRouter, Routes, Route } from "react-router-dom";
import Layout from "./components/Layout";
import Home from "./components/Home";
import Contador from "./components/Contador";
import MayorMenor from "./components/MayorMenor";
import Factorial from "./components/Factorial";
import Cadenas from "./components/Cadenas";
import Palindromo from "./components/Palindromo";
import Fecha from "./components/Fecha";
import Calculadora from "./components/Calculadora";
import AbrirNuevaVentana from "./components/AbrirNuevaVentana";
import ListaTareas from "./components/ListarEstudiantes";
import Estudiantes from "./components/Estudiantes";
// import NoPage from "./components/NoPage";

export default function App() {
  return (
    <BrowserRouter>
      <Routes>
        <Route path="/" element={<Layout />}>
          <Route index element={<Home />} />
          <Route path="cont" element={<Contador />} />
          <Route path="mayor" element={<MayorMenor />} />
          <Route path="factorial" element={<Factorial />} />
          <Route path="cadenas" element={<Cadenas />} />
          <Route path="palindromo" element={<Palindromo />} />
          <Route path="fecha" element={<Fecha />} />
          <Route path="calculadora" element={<Calculadora />} />
          <Route path="nuevaVentana" element={<AbrirNuevaVentana />} />
          <Route path="listTareas" element={<ListaTareas />} />
          <Route path="estudiantes" element={<Estudiantes />} />
          {/* <Route path="*" element={<NoPage />} /> */}
        </Route>
      </Routes>
    </BrowserRouter>
  );
}

