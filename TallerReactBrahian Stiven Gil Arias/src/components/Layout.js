import { Outlet, Link } from "react-router-dom";

const Layout = () => {
  return (
    <>
      <nav>
        <ul>
          <li>
            <Link to="/">Home</Link>
          </li>
          <li>
            <Link to="/cont">Contador</Link>
          </li>
          <li>
            <Link to="/mayor">MayorMenor</Link>
          </li>
          <li>
            <Link to="/factorial">Factorial</Link>
          </li>
          <li>
            <Link to="/cadenas">CadenasString</Link>
          </li>
          <li>
            <Link to="/palindromo">Palindromos</Link>
          </li>
          <li>
            <Link to="/fecha">Fecha</Link>
          </li>
          <li>
            <Link to="/calculadora">Calculadora</Link>
          </li>
          <li>
            <Link to="/nuevaVentana">AbrirNuevaVentana</Link>
          </li>
          <li>
            <Link to="/listTareas">ListaTareas</Link>
          </li>
          <li>
            <Link to="/estudiantes">Estusiantes</Link>
          </li>
        </ul>
      </nav>

      <Outlet />
    </>
  )
};

export default Layout;
