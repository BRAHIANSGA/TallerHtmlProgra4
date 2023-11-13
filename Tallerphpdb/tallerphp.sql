-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 13-11-2023 a las 20:22:01
-- Versión del servidor: 8.0.32
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `tallerphp`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `formulario1`
--

CREATE TABLE `formulario1` (
  `Id` int NOT NULL,
  `Idioma` varchar(255) DEFAULT NULL,
  `Conexion` varchar(255) DEFAULT NULL,
  `Nombre` varchar(255) DEFAULT NULL,
  `Apellidos` varchar(255) DEFAULT NULL,
  `sexolistamultiple` varchar(64) DEFAULT NULL,
  `Sexo` varchar(255) DEFAULT NULL,
  `FechaNacimiento` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `formulario1`
--

INSERT INTO `formulario1` (`Id`, `Idioma`, `Conexion`, `Nombre`, `Apellidos`, `sexolistamultiple`, `Sexo`, `FechaNacimiento`) VALUES
(1, 'INGLES', 'USB', 'BRAHIAN', 'GIL', 'MUJER', 'HOMBRE', '2023-11-14');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `formulario2`
--

CREATE TABLE `formulario2` (
  `Id` int NOT NULL,
  `Asignatura` varchar(255) DEFAULT NULL,
  `EditorDeTexto` varchar(255) DEFAULT NULL,
  `Comentarios` text,
  `Procesador` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `formulario3`
--

CREATE TABLE `formulario3` (
  `Id` int NOT NULL,
  `Ciclo` varchar(255) DEFAULT NULL,
  `Fecha` date DEFAULT NULL,
  `Texto1` text,
  `Hora` time DEFAULT NULL,
  `Asignaturas` varchar(255) DEFAULT NULL,
  `Color` varchar(7) DEFAULT NULL,
  `Texto2` text,
  `AsignaturaFavorita` varchar(255) DEFAULT NULL,
  `Escritorio` varchar(255) DEFAULT NULL,
  `Nombre` varchar(255) DEFAULT NULL,
  `Apellidos` varchar(255) DEFAULT NULL,
  `Telefono` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `formulario3`
--

INSERT INTO `formulario3` (`Id`, `Ciclo`, `Fecha`, `Texto1`, `Hora`, `Asignaturas`, `Color`, `Texto2`, `AsignaturaFavorita`, `Escritorio`, `Nombre`, `Apellidos`, `Telefono`) VALUES
(1, 'ciclodaw', '2023-11-10', 'texto1', '22:29:00', 'asignaturalengua', '#751f1f', 'texto3', '', 'Array', 'BRAHIAN', 'GIL', '3216203644');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `formulario4`
--

CREATE TABLE `formulario4` (
  `Id` int NOT NULL,
  `Texto` text,
  `Fecha` date DEFAULT NULL,
  `Color` varchar(7) DEFAULT NULL,
  `Conectores` varchar(255) DEFAULT NULL,
  `Aula` varchar(10) DEFAULT NULL,
  `Archivos` varchar(255) DEFAULT NULL,
  `Nombre` varchar(255) DEFAULT NULL,
  `Apellidos` varchar(255) DEFAULT NULL,
  `Direccion` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `formulario5`
--

CREATE TABLE `formulario5` (
  `Id` int NOT NULL,
  `Velocidad` varchar(255) DEFAULT NULL,
  `DNI` varchar(20) DEFAULT NULL,
  `Nombre` varchar(255) DEFAULT NULL,
  `Apellidos` varchar(255) DEFAULT NULL,
  `Email` varchar(255) DEFAULT NULL,
  `Color` varchar(7) DEFAULT NULL,
  `Texto` text,
  `Procesador` varchar(255) DEFAULT NULL,
  `Hora` time DEFAULT NULL,
  `Red` varchar(10) DEFAULT NULL,
  `Fichero` varchar(255) DEFAULT NULL,
  `Asignaturas` varchar(255) DEFAULT NULL,
  `OtraHora` time DEFAULT NULL,
  `OtroFichero` varchar(255) DEFAULT NULL,
  `Texto2` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `formulario5`
--

INSERT INTO `formulario5` (`Id`, `Velocidad`, `DNI`, `Nombre`, `Apellidos`, `Email`, `Color`, `Texto`, `Procesador`, `Hora`, `Red`, `Fichero`, `Asignaturas`, `OtraHora`, `OtroFichero`, `Texto2`) VALUES
(1, '1000_mbits', '1007577760', 'BRAHIAN', 'gil', 'brahian.gil@ucp.edu.co', '#4d1919', 'hola3', 'procesadorintel_i9', '14:03:00', 'red4g', 'WhatsApp Image 2023-11-08 at 11.20.29 PM.jpeg', 'asignaturalengua', '14:04:00', 'WhatsApp Image 2023-11-08 at 11.20.07 PM.jpeg', 'hola3');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `formulario1`
--
ALTER TABLE `formulario1`
  ADD PRIMARY KEY (`Id`);

--
-- Indices de la tabla `formulario2`
--
ALTER TABLE `formulario2`
  ADD PRIMARY KEY (`Id`);

--
-- Indices de la tabla `formulario3`
--
ALTER TABLE `formulario3`
  ADD PRIMARY KEY (`Id`);

--
-- Indices de la tabla `formulario4`
--
ALTER TABLE `formulario4`
  ADD PRIMARY KEY (`Id`);

--
-- Indices de la tabla `formulario5`
--
ALTER TABLE `formulario5`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `formulario1`
--
ALTER TABLE `formulario1`
  MODIFY `Id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `formulario2`
--
ALTER TABLE `formulario2`
  MODIFY `Id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `formulario3`
--
ALTER TABLE `formulario3`
  MODIFY `Id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `formulario4`
--
ALTER TABLE `formulario4`
  MODIFY `Id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `formulario5`
--
ALTER TABLE `formulario5`
  MODIFY `Id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
