-- phpMyAdmin SQL Dump
-- version 4.2.10
-- http://www.phpmyadmin.net
--
-- Servidor: localhost:8889
-- Tiempo de generación: 15-01-2015 a las 17:36:08
-- Versión del servidor: 5.5.38
-- Versión de PHP: 5.6.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de datos: `plataforma`
--

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
('2015_01_13_175908_create_telefonicas_table', 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
`id` int(10) unsigned NOT NULL,
  `nombre` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `descripcion` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `nombre`, `descripcion`, `created_at`, `updated_at`) VALUES
(1, 'Administrador', 'Tiene todos los permisos y accesos.', '2014-12-23 16:45:56', '2014-12-23 16:45:56'),
(2, 'Cliente', 'Puede consultar, pagar, y ver su perfil', '2014-12-23 16:46:22', '2014-12-23 16:46:22'),
(3, 'Asistente', 'Realiza consultas, ver sus cobros, y ver su perfil', '2014-12-23 16:47:05', '2014-12-23 16:47:05'),
(4, 'Aci', 'Comercial', '2015-01-08 08:11:19', '2015-01-08 08:11:19');

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
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
`id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  `cargo_id` int(10) unsigned NOT NULL,
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
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `role_id`, `cargo_id`, `nombre`, `apellidos`, `direccion`, `localidad`, `provincia`, `pais`, `usuario`, `email`, `password`, `password_temp`, `code`, `active`, `remember_token`, `cedula`, `imagen`, `created_at`, `updated_at`) VALUES
(2, 1, 0, 'Admin', 'Admin', 'Puerto, 4', 'Colon', 'Colon', 'Panamá', '', 'hastalascuatro@gmail.com', '$2y$10$0bIATOMGcFfVmJFfJdPIT.o6gIsLrLQyqkr2OFDVY7CY3cAWHmnTG', '', '', 1, '4NsbNm8Ejs2NLITHHFYwBUsQknwjwxv34FL0PdwTKnP02ZK5zbGA3qXRTTY3', '2-33-4444', '', '2015-01-05 11:06:44', '2015-01-13 16:58:23'),
(3, 3, 0, 'Asistente', 'Asistente', 'La Direccción', 'Santiago', 'Santiago', 'Panamá', '', 'maria.lobillo.santos@gmail.com', '$2y$10$4q2gilviFltIFCXCpcl2Tu37HNm.EsLrUCh4/A1j8f3bUIIYvjoW2', '', '', 1, 'qrdsU0q0cHivNj0pewJBsAjktuJqxCI9HvaSxQwCX3jHSvgyTEucZi8rtuuj', '3-44-3333', '', '2015-01-05 11:09:25', '2015-01-07 16:41:12'),
(6, 2, 0, 'María', 'Lobillo', 'Puerto, 4', 'Huelva', 'Huelva', 'Españolll', '', 'maria@arscsa.com', '$2y$10$WhoXfOojx6BYC9puAP1/YuOcCUBm/GhvyqH5kl45aQmt/DFdp1o8y', '', '', 1, 'dm5Vc6daXf8kHw0WDJviPS4MNZDCG6okEHJn1p4kcq0aAO3jJ5sRxkbld3n5', '5-66-7696', '', '2015-01-08 09:33:43', '2015-01-15 14:51:06');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `telefonicas`
--
ALTER TABLE `telefonicas`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`id`), ADD KEY `users_role_id_foreign` (`role_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `telefonicas`
--
ALTER TABLE `telefonicas`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `users`
--
ALTER TABLE `users`
ADD CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`);
