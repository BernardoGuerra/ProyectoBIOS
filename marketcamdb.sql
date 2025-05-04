-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 19-02-2018 a las 15:15:30
-- Versión del servidor: 5.6.26
-- Versión de PHP: 5.5.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `marketcamdb`
--
CREATE DATABASE IF NOT EXISTS `marketcamdb` DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish_ci;
USE `marketcamdb`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE IF NOT EXISTS `categorias` (
  `idCat` int(10) unsigned NOT NULL,
  `tipoCat` varchar(50) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- RELACIONES PARA LA TABLA `categorias`:
--

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`idCat`, `tipoCat`) VALUES
(31, 'Cámaras'),
(32, 'Flashes'),
(33, 'Trípodes'),
(34, 'Filtros'),
(35, 'Fundas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE IF NOT EXISTS `productos` (
  `idProd` int(10) unsigned NOT NULL,
  `marcaProd` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `descProd` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `origenProd` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `precioProd` int(11) unsigned NOT NULL,
  `idCatProd` int(11) unsigned NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- RELACIONES PARA LA TABLA `productos`:
--   `idCatProd`
--       `categorias` -> `idCat`
--

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`idProd`, `marcaProd`, `descProd`, `origenProd`, `precioProd`, `idCatProd`) VALUES
(29, 'Nikon', 'Cámara 50 MP', 'Estados Unidos', 2000, 31),
(30, 'Fuji', 'Cámara sumergible', 'China', 1500, 31),
(31, 'HP', 'Cámara 100 MP', 'Alemania', 2500, 31),
(32, 'Samsung', 'Cámara 300 MP', 'Estados Unidos', 4000, 31),
(33, 'Fuji', 'Trípode', 'Alemania', 200, 33),
(34, 'Nikon', 'Funda con bolsillos ', 'Estados Unidos', 300, 35),
(35, 'Bromberg', 'BOLSO EQUIPO Y PIES CON RUEDAS B-01', 'Estados Unidos', 1000, 35),
(36, 'Bromberg', 'BOLSO TRIPODES Y PIES DE FLASH B-03', 'Estados Unidos', 1500, 35),
(37, 'Manfrotto', 'COBERTOR PARA CAMARA E-702 PL', 'Alemania', 1300, 35),
(38, 'Manfrotto', 'MOCHILA ADVANCED TRI BACKPACK MEDIANA', 'China', 3000, 35),
(39, 'Bromberg', 'TRIPODES JIRAFA JIR2', 'Estados Unidos', 1275, 33),
(40, 'Manfrotto', 'PIE-300-LA', 'China', 1280, 33),
(41, 'Rime Lite', 'STORM 4 PLUS KIT', 'Estados Unidos', 3680, 32),
(42, 'Bromberg', 'FLASH ESTUDIO  LUCE-160S', 'China', 2005, 32),
(43, 'Rime Lite', 'CABEZAL i4A  Flash Power(w/s) 400', 'China', 2500, 32),
(44, 'Hama', 'Filtro ultravioleta Hama, 52 mm, color neutro', 'Alemania', 2000, 34),
(45, 'Hama ', 'Filtro HAma Polarizador Circular (58 mm) ', 'China', 1375, 34),
(46, 'Canon', 'Filtro densidad neutra graduados (85 x 110 mm)', 'China', 3000, 34);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`idCat`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`idProd`),
  ADD KEY `idCatProd` (`idCatProd`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `idCat` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `idProd` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=47;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `productos_ibfk_1` FOREIGN KEY (`idCatProd`) REFERENCES `categorias` (`idCat`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
