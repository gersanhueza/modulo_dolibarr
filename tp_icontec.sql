-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 15-09-2023 a las 16:06:43
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `dolibarr`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tp_icontec`
--

CREATE TABLE `tp_icontec` (
  `id` int(11) NOT NULL,
  `session_id` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `agente` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `fecha_hora_ingreso` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `pcs` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `servicio` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `nombre_cliente` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `record_url` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `fecha_solicitud` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `dni` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `correo_cliente` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `nombre_compania` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `servicio_icontec` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `gestion` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `tipo_icontec` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `tipo_solicitud` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `estado` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `clase_contacto` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `regional` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `categoria_contacto` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `contacto_destinatario` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `contacto_reemplazo` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `observacion` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `hora_ingreso` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `HORA_INICIO_LLAMADA` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `HORA_TERMINO_LLAMADA` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `prospecto` varchar(200) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `tp_icontec`
--

INSERT INTO `tp_icontec` (`id`, `session_id`, `agente`, `fecha_hora_ingreso`, `pcs`, `servicio`, `nombre_cliente`, `record_url`, `fecha_solicitud`, `dni`, `correo_cliente`, `nombre_compania`, `servicio_icontec`, `gestion`, `tipo_icontec`, `tipo_solicitud`, `estado`, `clase_contacto`, `regional`, `categoria_contacto`, `contacto_destinatario`, `contacto_reemplazo`, `observacion`, `hora_ingreso`, `HORA_INICIO_LLAMADA`, `HORA_TERMINO_LLAMADA`, `prospecto`) VALUES
(1, '20230915094825', '', '2023-09-15 / 09:48:25', '56982186956', '', 'GERMAN SANHUEZA SALAS', '', '<?php echo $fecha; ?>', '5532352352', 'wedgwg@gmail.com', 'aergeg', 'Informacion de Servicio', 'Certificación Procesos y Servicios', 'Servicios', 'No Aplica', 'Se Contacto al Cliente', 'Formulario', 'Antioquia, Chocó y Eje Cafetero', 'Comunicación', '', '', 'dytjdty', '', '', '', 'No'),
(2, '20230915095022', '', '2023-09-15 / 09:50:22', '56930181236', '', 'GERMAN SANHUEZA SALAS', '', '<?php echo $fecha; ?>', '5532352352', 'wedgwg@gmail.com', 'aergeg', 'PQRs', 'Certificación Procesos y Servicios', 'Administrativo', 'Comunicación con la Regional', 'Se Contacto al Cliente', 'Mail', 'Centro y Sur Oriente', 'Cartera', 'GERMAN SANHUEZA', '', 'ergerge', '', '', '', 'No'),
(3, '20230915095118', '', '2023-09-15 / 09:51:18', '56982186956', '', 'GERMAN SANHUEZA SALAS', '', '<?php echo $fecha; ?>', '5532352352', 'wedgwg@gmail.com', 'aergeg', 'PQRs', 'Certificación Procesos y Servicios', 'Administrativo', 'Comunicación con la Regional', 'Se Contacto al Cliente', 'Formulario', 'Centro y Sur Oriente', 'Cartera', 'GERMAN SANHUEZA', 'GERMAN SANHUEZA', 'rthrth', '', '', '', 'No'),
(4, '20230915110256', '', '2023-09-15 / 11:02:56', '56930181236', '', 'GERMAN SANHUEZA SALAS', '', '2023-09-15', '5532352352', 'wedgwg@gmail.com', 'ktktktk', 'PQRs', 'Acraditación Salud', 'Administrativo', 'Comunicación con la Filial', 'Sin Clasificar', 'Chat', 'Centro y Sur Oriente', 'Cartera', 'GERMAN SANHUEZA', 'GERMAN SANHUEZA', 'hola', '', '', '', 'No'),
(5, '20230915110419', '', '2023-09-15 / 11:04:19', '56982186956', '', 'GERMAN SANHUEZA SALAS', '', '2023-09-15', '5532352352', 'wedgwg@gmail.com', 'tjjtyjt', 'PQRs', 'Afiliados', 'Administrativo', 'Comunicación con la Regional', 'Se Envió Cotización', 'Chat', 'Centro y Sur Oriente', 'Cartera', 'GERMAN SANHUEZA', 'GERMAN SANHUEZA', 'jtyjtjtjtjtjtj', '', '', '', 'No'),
(6, '20230915110602', '', '2023-09-15 / 11:06:02', '56982186956', '', 'GERMAN SANHUEZA SALAS', '', '2023-09-15', '5532352352', 'wedgwg@gmail.com', 'aergeg', 'Proveedores', 'Afiliados', 'Servicios', 'Comunicación con la Regional', 'Se Contacto al Cliente', 'Chat', 'Antioquia, Chocó y Eje Cafetero', 'Comunicación', 'GERMAN SANHUEZA', 'GERMAN SANHUEZA', 'prueba', '', '', '', 'No');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tp_icontec`
--
ALTER TABLE `tp_icontec`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tp_icontec`
--
ALTER TABLE `tp_icontec`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
