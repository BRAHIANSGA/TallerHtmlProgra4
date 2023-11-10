-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 10-11-2023 a las 03:03:41
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
  `Sexo` varchar(255) DEFAULT NULL,
  `FechaNacimiento` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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
  MODIFY `Id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `formulario2`
--
ALTER TABLE `formulario2`
  MODIFY `Id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `formulario3`
--
ALTER TABLE `formulario3`
  MODIFY `Id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `formulario4`
--
ALTER TABLE `formulario4`
  MODIFY `Id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `formulario5`
--
ALTER TABLE `formulario5`
  MODIFY `Id` int NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
