-- phpMyAdmin SQL Dump
-- version 4.2.10
-- http://www.phpmyadmin.net
--
-- Servidor: localhost:8889
-- Tiempo de generación: 03-02-2015 a las 14:38:48
-- Versión del servidor: 5.5.38
-- Versión de PHP: 5.6.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de datos: `plataforma`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `acis`
--

CREATE TABLE `acis` (
`id` int(10) unsigned NOT NULL,
  `nombre` varchar(80) COLLATE utf8_unicode_ci NOT NULL,
  `descripcion` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `nclientes` mediumint(8) unsigned NOT NULL,
  `naci` smallint(5) unsigned NOT NULL,
  `tipoaci` varchar(80) COLLATE utf8_unicode_ci NOT NULL,
  `eliminado` tinyint(1) NOT NULL DEFAULT '0',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `acis`
--

INSERT INTO `acis` (`id`, `nombre`, `descripcion`, `nclientes`, `naci`, `tipoaci`, `eliminado`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'SuperACI', 'Comercial que depende de los PAL que tenga.', 50, 10, 'ACI', 1, '2015-01-31 16:26:05', '2015-01-31 16:20:08', '2015-01-31 16:26:05'),
(2, 'ACI', 'Comercial Básico', 100, 0, '', 0, NULL, '2015-01-31 16:25:59', '2015-01-31 16:25:59'),
(3, 'SuperACI', 'Comercial segundo nivel', 500, 10, 'ACI', 0, NULL, '2015-02-01 11:08:59', '2015-02-01 11:09:13'),
(4, 'MegaACI', 'Comercial tercer nivel', 1000, 2, 'SuperACI', 0, NULL, '2015-02-01 11:09:39', '2015-02-01 11:09:39'),
(5, 'DEFAULT', 'En caso de que no sea ACI, se rellena con default', 0, 0, '', 0, NULL, '2015-02-01 11:18:07', '2015-02-01 11:18:36');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estadospagos`
--

CREATE TABLE `estadospagos` (
`id` int(10) unsigned NOT NULL,
  `nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `eliminado` tinyint(1) NOT NULL DEFAULT '0',
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `estadospagos`
--

INSERT INTO `estadospagos` (`id`, `nombre`, `created_at`, `updated_at`, `eliminado`, `deleted_at`) VALUES
(1, 'Liquidado', '2015-01-20 19:56:21', '2015-01-21 09:45:47', 0, NULL),
(4, 'Emitido', '2015-01-21 10:06:14', '2015-01-21 10:06:14', 0, NULL),
(5, 'Pendiente', '2015-01-21 10:06:29', '2015-01-21 10:06:29', 0, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mails`
--

CREATE TABLE `mails` (
`id` int(10) unsigned NOT NULL,
  `cliente_id` int(10) unsigned NOT NULL,
  `asistente_id` int(10) unsigned NOT NULL,
  `lugar` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `informacion` text COLLATE utf8_unicode_ci NOT NULL,
  `archivo1` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `archivo2` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `respuesta` text COLLATE utf8_unicode_ci NOT NULL,
  `tema` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `eliminado` tinyint(1) NOT NULL DEFAULT '0',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_12_22_135638_create_roles_table', 1),
('2014_12_22_190851_create_usuarios_table', 2),
('2014_12_23_123104_create_users_table', 3),
('2015_01_13_175908_create_telefonicas_table', 4),
('2015_01_18_214302_create_tarifas_table', 5),
('2015_01_19_175430_create_table_pagos', 6),
('2015_01_20_174617_create_table_estados_pagos', 7),
('2015_01_21_110728_add_estado_pagos', 8),
('2015_01_22_184751_add_tarifa_id_pagos', 9),
('2015_01_29_200943_create_table_users', 10),
('2015_01_30_121042_create_roles_table', 10),
('2015_01_30_121459_create_estadospagos_table', 10),
('2015_01_30_122230_create_acis_table', 10),
('2015_01_30_123626_nominas', 10),
('2015_01_30_201924_acis_table', 11),
('2015_01_31_145125_modificar_estadospagos', 11),
('2015_01_31_145329_modificar_nominas', 12),
('2015_01_31_150122_modificar_roles', 13),
('2015_01_31_151516_modificar_tarifas', 14),
('2015_01_31_180826_add_timestamps_nominas', 15),
('2015_01_31_191735_create_pagos_table', 16),
('2015_01_31_193555_add_foreign_pagos', 17),
('2015_02_01_105129_create_tipouser_table', 18),
('2015_02_01_110245_add_user_campos', 19),
('2015_02_01_155301_add_eliminado_telefonias', 20),
('2015_02_02_174049_add_importe_pagos', 21),
('2015_02_02_192820_create_mail_table', 22);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nominas`
--

CREATE TABLE `nominas` (
`id` int(10) unsigned NOT NULL,
  `nombre` varchar(80) COLLATE utf8_unicode_ci NOT NULL,
  `descripcion` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `importe` float(10,2) NOT NULL,
  `impuesto` float(10,2) NOT NULL DEFAULT '7.00',
  `total` float(10,2) NOT NULL,
  `eliminado` tinyint(1) NOT NULL DEFAULT '0',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `nominas`
--

INSERT INTO `nominas` (`id`, `nombre`, `descripcion`, `importe`, `impuesto`, `total`, `eliminado`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Abogados', 'Asistentes y abogados', 1400.00, 7.00, 1498.00, 1, '2015-01-31 17:15:58', '2015-01-31 17:11:05', '2015-01-31 17:15:58'),
(2, 'Asistente', 'Asistentes y abogados', 1200.00, 7.00, 1284.00, 1, '2015-01-31 17:11:48', '2015-01-31 17:11:41', '2015-01-31 17:11:48'),
(3, 'Secretarias', 'Administran la plataforma', 1500.00, 7.00, 1605.00, 0, NULL, '2015-01-31 17:15:54', '2015-01-31 17:15:54'),
(4, 'Asistentes', 'Asistentes a consultas telefonicas', 1400.00, 7.00, 1498.00, 0, NULL, '2015-02-01 15:59:16', '2015-02-01 15:59:16'),
(5, 'Dep. Cotizaciones', 'Adminstran los pagos', 1300.00, 7.00, 1391.00, 0, NULL, '2015-02-01 15:59:38', '2015-02-01 15:59:38');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pagos`
--

CREATE TABLE `pagos` (
`id` int(10) unsigned NOT NULL,
  `cedula` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `concepto` varchar(80) COLLATE utf8_unicode_ci NOT NULL,
  `fecha` datetime NOT NULL,
  `eliminado` tinyint(1) NOT NULL DEFAULT '0',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `empleado_id` int(10) unsigned NOT NULL,
  `auth_id` int(10) unsigned NOT NULL,
  `estadospago_id` int(10) unsigned NOT NULL,
  `nomina_id` int(10) unsigned NOT NULL,
  `importe` float(10,2) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `pagos`
--

INSERT INTO `pagos` (`id`, `cedula`, `concepto`, `fecha`, `eliminado`, `deleted_at`, `created_at`, `updated_at`, `empleado_id`, `auth_id`, `estadospago_id`, `nomina_id`, `importe`) VALUES
(1, '2933.3333', 'Enero 2015', '0000-00-00 00:00:00', 0, NULL, '2015-02-02 17:00:32', '2015-02-02 18:14:09', 9, 2, 4, 3, 1605.00),
(2, '2-33-4444', 'Febrero', '0000-00-00 00:00:00', 1, '2015-02-02 18:15:34', '2015-02-02 17:57:21', '2015-02-02 18:15:34', 2, 2, 5, 3, 1605.00);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
`id` int(10) unsigned NOT NULL,
  `nombre` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `descripcion` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `eliminado` tinyint(1) NOT NULL DEFAULT '0',
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `nombre`, `descripcion`, `created_at`, `updated_at`, `eliminado`, `deleted_at`) VALUES
(1, 'Administrador', 'Permisos a todo', '2014-12-23 16:45:56', '2015-01-19 11:28:30', 0, NULL),
(2, 'Cliente', 'Puede consultar, pagar, y ver su perfil', '2014-12-23 16:46:22', '2014-12-23 16:46:22', 0, NULL),
(3, 'Asistente', 'Realiza consultas, ver sus cobros, y ver su perfil', '2014-12-23 16:47:05', '2014-12-23 16:47:05', 0, NULL),
(4, 'ACI', 'Comercial', '2015-01-08 08:11:19', '2015-01-08 08:11:19', 0, NULL),
(6, 'Adminbasico', 'Admin con alguna restricción', '2015-01-31 15:22:01', '2015-01-31 15:26:41', 1, '2015-01-31 15:26:41');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tarifas`
--

CREATE TABLE `tarifas` (
`id` int(10) unsigned NOT NULL,
  `nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `descripcion` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `importe` float(10,2) NOT NULL,
  `impuesto` float(8,2) NOT NULL,
  `total` float(10,2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `eliminado` tinyint(1) NOT NULL DEFAULT '0',
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `tarifas`
--

INSERT INTO `tarifas` (`id`, `nombre`, `descripcion`, `importe`, `impuesto`, `total`, `created_at`, `updated_at`, `eliminado`, `deleted_at`) VALUES
(2, 'PAL ', 'PAL asistencia legal primaria', 40.00, 7.00, 42.80, '2015-01-19 15:57:07', '2015-01-19 15:59:09', 0, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `telefonicas`
--

CREATE TABLE `telefonicas` (
`id` int(10) unsigned NOT NULL,
  `user_id` int(11) NOT NULL,
  `asistente_id` int(11) NOT NULL,
  `lugar` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `informacion` text COLLATE utf8_unicode_ci NOT NULL,
  `observaciones` text COLLATE utf8_unicode_ci NOT NULL,
  `anexos` text COLLATE utf8_unicode_ci NOT NULL,
  `firma` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fecha` datetime NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `eliminado` tinyint(1) NOT NULL DEFAULT '0',
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `telefonicas`
--

INSERT INTO `telefonicas` (`id`, `user_id`, `asistente_id`, `lugar`, `informacion`, `observaciones`, `anexos`, `firma`, `fecha`, `created_at`, `updated_at`, `eliminado`, `deleted_at`) VALUES
(2, 7, 9, 'Huelva', 'Información', 'Aqui van las observaciones', 'Y los anexos adjuntos, eah.', 'La firma de no se sabe quien', '0000-00-00 00:00:00', '2015-01-18 16:49:17', '2015-02-01 15:03:17', 0, '2015-02-01 15:03:17'),
(5, 7, 9, 'Santiago de Chile, Chile', 'Más información sobre la consulta', 'Observamos que observamos', 'Y anexos varios', 'El cliente firma', '0000-00-00 00:00:00', '2015-02-01 15:01:53', '2015-02-01 15:01:53', 0, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tiposuser`
--

CREATE TABLE `tiposuser` (
`id` int(10) unsigned NOT NULL,
  `nombre` varchar(80) COLLATE utf8_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `eliminado` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `tiposuser`
--

INSERT INTO `tiposuser` (`id`, `nombre`, `deleted_at`, `eliminado`, `created_at`, `updated_at`) VALUES
(1, 'Empleado', NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'Cliente', NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'Comercial', NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
`id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  `nombre` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `apellidos` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `direccion` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `localidad` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `provincia` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `pais` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `usuario` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `password_temp` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `code` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `remember_token` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `cedula` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `imagen` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `nclientes` int(10) unsigned NOT NULL,
  `aci_id` int(10) unsigned NOT NULL,
  `tiposuser_id` int(10) unsigned NOT NULL,
  `eliminado` tinyint(1) NOT NULL DEFAULT '0',
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `role_id`, `nombre`, `apellidos`, `direccion`, `localidad`, `provincia`, `pais`, `usuario`, `email`, `password`, `password_temp`, `code`, `active`, `remember_token`, `cedula`, `imagen`, `created_at`, `updated_at`, `nclientes`, `aci_id`, `tiposuser_id`, `eliminado`, `deleted_at`) VALUES
(2, 1, 'Admin', 'Admin', 'Puerto, 4', 'Colon', 'Colon', 'Panamá', '', 'hastalascuatro@gmail.com', '$2y$10$0bIATOMGcFfVmJFfJdPIT.o6gIsLrLQyqkr2OFDVY7CY3cAWHmnTG', '', '', 1, '23PWaYNggBIs9H2t1dDZER7o9rTbCfzBpcwOWXZPJnaHJczy5wlLuaaffUGw', '2-33-4444', '', '2015-01-05 11:06:44', '2015-02-01 14:36:21', 0, 5, 1, 0, NULL),
(7, 2, 'Maria', 'Lobillo Santos', 'Av. de las flores', 'Huelva', 'Huelva', 'España', '', 'maria@arscsa.com', '$2y$10$6xMlPnWyCM3NuJC6Xdcgfu4TDGsdNbTsb/C3Gq4q1dZJOvOJg6Lvu', '', '', 1, '', '23.333.3333', '', '2015-01-31 17:22:19', '2015-02-02 17:52:12', 0, 5, 2, 0, NULL),
(9, 3, 'Maria', 'Lobillo', 'Av. del Otoño', 'Huelva', 'Huelva', 'Panamá', '', 'maria.lobillo.santos@gmail.com', '$2y$10$NGEwBIsrkPGnerqk5ZlcMOru30Q5CmlTLLtZ3BGqTI6a2yrB6TNUK', '', '', 1, '', '2933.3333', '', '2015-02-01 11:15:53', '2015-02-02 17:41:12', 0, 5, 1, 0, NULL);

--
-- Índices para tablas volcadas
--

