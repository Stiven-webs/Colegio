-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 07-12-2024 a las 06:03:27
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `consorcio`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumno`
--

CREATE TABLE `alumno` (
  `idalumno` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `apellido` varchar(100) NOT NULL,
  `numero` varchar(50) NOT NULL,
  `fechaNacimiento` date NOT NULL,
  `sexo` enum('M','F') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `alumno`
--

INSERT INTO `alumno` (`idalumno`, `nombre`, `apellido`, `numero`, `fechaNacimiento`, `sexo`) VALUES
(1, 'Miguel', 'Reyes', '970293727', '2001-06-12', 'M'),
(3, 'Ricardo', 'Hinostroza', '973748394', '2000-06-14', 'M'),
(4, 'Carlos', 'Castillo', '937483845', '2001-06-13', 'M'),
(5, 'Erick', 'Ramos', '987384756', '2001-01-15', 'M'),
(6, 'Marcelo', 'Calderon', '938482934', '2001-05-20', 'M'),
(7, 'Jasmin', 'Coral', '938465734', '2000-01-19', 'F'),
(8, 'Yadhira', 'Solano', '938475634', '2001-05-12', 'F'),
(9, 'Gustavo', 'Gonzales', '938465723', '2000-05-15', 'M'),
(10, 'Alejandro', 'Salvador', '937483746', '2000-01-02', 'M'),
(11, 'Milagros', 'Perez', '93838833', '2024-12-16', 'F');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cronograma`
--

CREATE TABLE `cronograma` (
  `id` int(11) NOT NULL,
  `nombreActividad` varchar(100) NOT NULL,
  `fechaInicio` date NOT NULL,
  `fechaFin` date NOT NULL,
  `horaInicio` time NOT NULL,
  `horaFin` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `cronograma`
--

INSERT INTO `cronograma` (`id`, `nombreActividad`, `fechaInicio`, `fechaFin`, `horaInicio`, `horaFin`) VALUES
(1, 'Ingles', '2024-11-14', '2029-07-12', '13:03:00', '20:00:00'),
(3, 'Programacion', '2024-11-21', '2027-06-09', '13:30:00', '18:00:00'),
(4, 'Matematicas', '2024-11-11', '2029-05-30', '16:30:00', '18:15:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cursos`
--

CREATE TABLE `cursos` (
  `idcurso` int(11) NOT NULL,
  `nombreCurso` varchar(100) NOT NULL,
  `nivelCurso` enum('principiante','intermedio','avanzado') NOT NULL,
  `precio` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `cursos`
--

INSERT INTO `cursos` (`idcurso`, `nombreCurso`, `nivelCurso`, `precio`) VALUES
(1, 'Ingles', 'principiante', 200.00),
(3, 'Programacion', 'intermedio', 600.00),
(4, 'Matematicas', 'avanzado', 400.00);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profesores`
--

CREATE TABLE `profesores` (
  `idprofesor` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `apellido` varchar(100) NOT NULL,
  `telefono` varchar(20) NOT NULL,
  `fechaNacimiento` date NOT NULL,
  `sexo` enum('M','F') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `profesores`
--

INSERT INTO `profesores` (`idprofesor`, `nombre`, `apellido`, `telefono`, `fechaNacimiento`, `sexo`) VALUES
(1, 'Ricardo', 'Paucar', '937472734', '1996-06-12', 'M'),
(3, 'Julieta', 'Coral', '937482734', '1995-05-15', 'F'),
(4, 'Carlos', 'Dabalos', '938475634', '1996-05-22', 'M'),
(5, 'Natalia', 'Paucar', '937465849', '1997-05-20', 'F');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `idusuario` int(11) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `clave` varchar(50) NOT NULL,
  `descripcion` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`idusuario`, `usuario`, `clave`, `descripcion`) VALUES
(1, 'jluque', '123456', 'Usuario estandar'),
(2, 'Bryan', '112233', 'Estudiante'),
(9, 'Miguel', '1122334455', 'Estudiante');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `alumno`
--
ALTER TABLE `alumno`
  ADD PRIMARY KEY (`idalumno`);

--
-- Indices de la tabla `cronograma`
--
ALTER TABLE `cronograma`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cursos`
--
ALTER TABLE `cursos`
  ADD PRIMARY KEY (`idcurso`);

--
-- Indices de la tabla `profesores`
--
ALTER TABLE `profesores`
  ADD PRIMARY KEY (`idprofesor`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idusuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `alumno`
--
ALTER TABLE `alumno`
  MODIFY `idalumno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `cronograma`
--
ALTER TABLE `cronograma`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `cursos`
--
ALTER TABLE `cursos`
  MODIFY `idcurso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `profesores`
--
ALTER TABLE `profesores`
  MODIFY `idprofesor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idusuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
