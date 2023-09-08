-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 08-09-2023 a las 19:36:41
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `pdfcentraldb`
--
CREATE DATABASE IF NOT EXISTS `pdfcentraldb` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `pdfcentraldb`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `files`
--

CREATE TABLE `files` (
  `id` int(11) NOT NULL,
  `filename` text NOT NULL,
  `iduser` int(11) NOT NULL,
  `active` enum('1','0') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `files_db`
--

CREATE TABLE `files_db` (
  `id` int(11) NOT NULL,
  `filename` text NOT NULL,
  `iduser` int(11) NOT NULL,
  `active` enum('1','0') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `files_dg`
--

CREATE TABLE `files_dg` (
  `id` int(11) NOT NULL,
  `filename` text NOT NULL,
  `iduser` int(11) NOT NULL,
  `active` enum('1','0') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `files_di`
--

CREATE TABLE `files_di` (
  `id` int(11) NOT NULL,
  `filename` text NOT NULL,
  `iduser` int(11) NOT NULL,
  `active` enum('1','0') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `files_pap`
--

CREATE TABLE `files_pap` (
  `id` int(11) NOT NULL,
  `filename` text NOT NULL,
  `iduser` int(11) NOT NULL,
  `active` enum('1','0') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sentfiles`
--

CREATE TABLE `sentfiles` (
  `id` int(11) NOT NULL,
  `idusersender` int(11) DEFAULT NULL,
  `iduserreceiver` int(11) NOT NULL,
  `idfilesent` int(11) DEFAULT NULL,
  `area_origin` text DEFAULT NULL,
  `viewed` int(11) DEFAULT 0,
  `checked` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Disparadores `sentfiles`
--
DELIMITER $$
CREATE TRIGGER `after_insert_filesent` AFTER INSERT ON `sentfiles` FOR EACH ROW BEGIN

	INSERT INTO timestest(datetimes, sent_notified, useridlink) VALUES(NOW(), 0, NEW.idusersender);

END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `timestest`
--

CREATE TABLE `timestest` (
  `id` int(11) NOT NULL,
  `datetimes` datetime NOT NULL,
  `sent_notified` tinyint(1) NOT NULL DEFAULT 0,
  `useridlink` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `active` enum('1','0') NOT NULL DEFAULT '1',
  `area` enum('DG','PAP','DI','DB') DEFAULT NULL,
  `rol` enum('director','lider','usuario') NOT NULL DEFAULT 'usuario'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `active`, `area`, `rol`) VALUES
(1, 'admin', '123', '1', 'DG', 'usuario'),
(2, 'legible', '1234', '1', 'PAP', 'usuario'),
(3, 'ivan', '1234', '1', 'DI', 'usuario'),
(4, 'pokemeta', '1234', '1', 'DB', 'usuario'),
(5, 'hgfdgfdgfdsgfdsgfdsgf', 'gfdsgfdgfdsgfdsgfdsgfdsgfds', '1', 'DG', 'usuario'),
(6, 'fdsggfdsgfdsgfdgfdsgfdgfds', 'gfdsgfdsgfdsgfdsgfdgfdgf', '1', 'DG', 'usuario'),
(9, 'erwtertrw', 'erwgjhkjhjhgfgcxf', '1', 'PAP', 'usuario'),
(10, 'piuyjgfddzsvfds', 'fdsadx ccbggf', '1', 'PAP', 'usuario'),
(11, '5435454354', '38574687487', '1', 'PAP', 'usuario'),
(12, '4575287966', '786786768876', '1', 'PAP', 'usuario'),
(13, 'fdgsgfdgfdgfdsf', '156432132513251325', '1', 'DI', 'usuario'),
(14, 'dsffdsafdsa', 'fdsafdsfdsfdsafds', '1', 'DB', 'usuario'),
(15, 'fdsafdsafdsfds', 'dsffdsafdsafdsafdsa', '1', 'DB', 'usuario'),
(16, 'fdsfdsafdsfdsafdsafds', 'fdsfdsafdsafdsadsffdsafdsa', '1', 'DB', 'usuario'),
(17, 'fdsfdsfdsafdfdsafdsafds', 'fdsfdsafdsafdsafdsafdsa', '1', 'DB', 'usuario'),
(18, 'dehafrliaiu', 'fdspoiujapoih', '1', 'DB', 'usuario'),
(19, 'o0ipjgknwsihwqg', 'poijfdsilherwgvu', '1', 'DB', 'usuario');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`id`),
  ADD KEY `iduser` (`iduser`);

--
-- Indices de la tabla `files_db`
--
ALTER TABLE `files_db`
  ADD PRIMARY KEY (`id`),
  ADD KEY `iduser` (`iduser`);

--
-- Indices de la tabla `files_dg`
--
ALTER TABLE `files_dg`
  ADD PRIMARY KEY (`id`),
  ADD KEY `iduser` (`iduser`);

--
-- Indices de la tabla `files_di`
--
ALTER TABLE `files_di`
  ADD PRIMARY KEY (`id`),
  ADD KEY `iduser` (`iduser`);

--
-- Indices de la tabla `files_pap`
--
ALTER TABLE `files_pap`
  ADD PRIMARY KEY (`id`),
  ADD KEY `iduser` (`iduser`);

--
-- Indices de la tabla `sentfiles`
--
ALTER TABLE `sentfiles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idusersender` (`idusersender`);

--
-- Indices de la tabla `timestest`
--
ALTER TABLE `timestest`
  ADD PRIMARY KEY (`id`),
  ADD KEY `useridlink` (`useridlink`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `files`
--
ALTER TABLE `files`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `files_db`
--
ALTER TABLE `files_db`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `files_dg`
--
ALTER TABLE `files_dg`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `files_di`
--
ALTER TABLE `files_di`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `files_pap`
--
ALTER TABLE `files_pap`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `sentfiles`
--
ALTER TABLE `sentfiles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `timestest`
--
ALTER TABLE `timestest`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `files`
--
ALTER TABLE `files`
  ADD CONSTRAINT `files_ibfk_1` FOREIGN KEY (`iduser`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `files_db`
--
ALTER TABLE `files_db`
  ADD CONSTRAINT `files_db_ibfk_1` FOREIGN KEY (`iduser`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `files_dg`
--
ALTER TABLE `files_dg`
  ADD CONSTRAINT `files_dg_ibfk_1` FOREIGN KEY (`iduser`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `files_di`
--
ALTER TABLE `files_di`
  ADD CONSTRAINT `files_di_ibfk_1` FOREIGN KEY (`iduser`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `files_pap`
--
ALTER TABLE `files_pap`
  ADD CONSTRAINT `files_pap_ibfk_1` FOREIGN KEY (`iduser`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `sentfiles`
--
ALTER TABLE `sentfiles`
  ADD CONSTRAINT `sentfiles_ibfk_1` FOREIGN KEY (`idusersender`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `timestest`
--
ALTER TABLE `timestest`
  ADD CONSTRAINT `timestest_ibfk_1` FOREIGN KEY (`useridlink`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
