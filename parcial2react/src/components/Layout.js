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
            <Link to="/fecha">Fecha</Link>
          </li>
          <li>
            <Link to="/fibo">Fibonacci</Link>
          </li>
          <li>
            <Link to="/nuevaVentana">AbrirNuevaVentana</Link>
          </li>
          <li>
            <Link to="/funciones">CalcularFuncionesSeno,Cosen,etc</Link>
          </li>
        </ul>
      </nav>

      <Outlet />
    </>
  )
};

export default Layout;
