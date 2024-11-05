-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 05-11-2024 a las 20:03:23
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
-- Base de datos: `medicalsoft`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `auth_activation_attempts`
--

CREATE TABLE `auth_activation_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `user_agent` varchar(255) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `auth_groups`
--

CREATE TABLE `auth_groups` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `auth_groups`
--

INSERT INTO `auth_groups` (`id`, `name`, `description`) VALUES
(1, 'admin', 'Administrators. The top of the food chain.'),
(2, 'member', 'Member everyday member.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `auth_groups_permissions`
--

CREATE TABLE `auth_groups_permissions` (
  `group_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `permission_id` int(11) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `auth_groups_permissions`
--

INSERT INTO `auth_groups_permissions` (`group_id`, `permission_id`) VALUES
(1, 1),
(1, 1),
(1, 2),
(1, 2),
(1, 3),
(1, 3),
(1, 4),
(1, 4),
(1, 5),
(1, 6),
(1, 7),
(1, 8),
(1, 9),
(1, 10),
(1, 11),
(2, 1),
(2, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `auth_groups_users`
--

CREATE TABLE `auth_groups_users` (
  `group_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `user_id` int(11) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `auth_groups_users`
--

INSERT INTO `auth_groups_users` (`group_id`, `user_id`) VALUES
(1, 1),
(2, 1),
(2, 2),
(2, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `auth_logins`
--

CREATE TABLE `auth_logins` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `user_id` int(11) UNSIGNED DEFAULT NULL,
  `date` datetime NOT NULL,
  `success` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `auth_logins`
--

INSERT INTO `auth_logins` (`id`, `ip_address`, `email`, `user_id`, `date`, `success`) VALUES
(1, '127.0.0.1', 'admin@admin.com', 1, '2022-12-20 22:40:00', 1),
(2, '127.0.0.1', 'admin', NULL, '2022-12-21 23:22:45', 0),
(3, '127.0.0.1', 'admin@admin.com', 1, '2022-12-21 23:22:53', 1),
(4, '127.0.0.1', 'admin@admin.com', 1, '2023-01-01 23:45:25', 1),
(5, '127.0.0.1', 'admin@admin.com', 1, '2023-01-02 23:20:09', 1),
(6, '127.0.0.1', 'admin@admin.com', 1, '2023-01-03 22:27:51', 1),
(7, '127.0.0.1', 'admin@admin.com', 1, '2023-01-04 22:42:55', 1),
(8, '127.0.0.1', 'admin@admin.com', 1, '2023-01-05 22:36:34', 1),
(9, '127.0.0.1', 'admin@admin.com', 1, '2023-01-06 22:54:23', 1),
(10, '127.0.0.1', 'admin@admin.com', 1, '2023-01-07 22:04:30', 1),
(11, '127.0.0.1', 'admin@admin.com', 1, '2023-01-08 17:26:57', 1),
(12, '127.0.0.1', 'admin@admin.com', 1, '2023-01-12 21:59:40', 1),
(13, '127.0.0.1', 'admin', NULL, '2023-01-12 22:04:11', 0),
(14, '127.0.0.1', 'admin@admin.com', 1, '2023-01-12 22:04:19', 1),
(15, '127.0.0.1', 'admin@admin.com', 1, '2023-01-12 22:04:29', 1),
(16, '127.0.0.1', 'admin@admin.com', 1, '2023-01-26 15:26:50', 1),
(17, '127.0.0.1', 'admin@admin.com', 1, '2023-01-26 20:12:17', 1),
(18, '127.0.0.1', 'admin@admin.com', 1, '2023-01-30 20:57:16', 1),
(19, '127.0.0.1', 'admin@admin.com', 1, '2023-01-31 13:12:14', 1),
(20, '127.0.0.1', 'admin', NULL, '2023-02-01 21:29:10', 0),
(21, '127.0.0.1', 'admin@admin.com', 1, '2023-02-01 21:29:18', 1),
(22, '127.0.0.1', 'admin@admin.com', 1, '2023-02-02 21:46:30', 1),
(23, '::1', 'admin@admin.com', 1, '2024-09-30 17:30:28', 1),
(24, '::1', 'admin', NULL, '2024-09-30 17:38:33', 0),
(25, '::1', 'admin@admin.com', 1, '2024-09-30 17:38:37', 1),
(26, '::1', 'admin@admin.com', 1, '2024-09-30 17:53:18', 1),
(27, '::1', 'admin', NULL, '2024-10-18 16:15:59', 0),
(28, '::1', 'admin@admin.com', 1, '2024-10-18 16:16:05', 1),
(29, '::1', 'admin', NULL, '2024-11-04 16:09:10', 0),
(30, '::1', 'admin@admin.com', 1, '2024-11-04 16:09:24', 1),
(31, '::1', 'admin@admin.com', 1, '2024-11-04 16:10:45', 1),
(32, '::1', 'admin@admin.com', 1, '2024-11-04 17:15:15', 1),
(33, '::1', 'admin@admin.com', 1, '2024-11-04 17:24:30', 1),
(34, '::1', 'admin@admin.com', 1, '2024-11-04 18:35:11', 1),
(35, '::1', 'admin', NULL, '2024-11-04 23:25:07', 0),
(36, '::1', 'admin@admin.com', 1, '2024-11-04 23:26:07', 1),
(37, '::1', 'admin@admin.com', 1, '2024-11-05 15:53:14', 1),
(38, '::1', 'admin@admin.com', 1, '2024-11-05 16:01:05', 1),
(39, '::1', 'admin@admin.com', 1, '2024-11-05 16:02:25', 1),
(40, '::1', 'admin', NULL, '2024-11-05 16:06:46', 0),
(41, '::1', 'admin@admin.com', 1, '2024-11-05 16:06:50', 1),
(42, '::1', 'admin', NULL, '2024-11-05 16:11:03', 0),
(43, '::1', 'admin@admin.com', 1, '2024-11-05 16:11:08', 1),
(44, '::1', 'admin@admin.com', 1, '2024-11-05 17:16:11', 1),
(45, '::1', 'admin@admin.com', 1, '2024-11-05 17:25:55', 1),
(46, '::1', 'admin@admin.com', 1, '2024-11-05 17:27:30', 1),
(47, '::1', 'admin', NULL, '2024-11-05 18:07:45', 0),
(48, '::1', 'admin@admin.com', 1, '2024-11-05 18:07:49', 1),
(49, '::1', 'admin', NULL, '2024-11-05 18:09:28', 0),
(50, '::1', 'admin@admin.com', 1, '2024-11-05 18:09:33', 1),
(51, '::1', 'admin', NULL, '2024-11-05 18:23:20', 0),
(52, '::1', 'admin@admin.com', 1, '2024-11-05 18:23:25', 1),
(53, '::1', 'admin@admin.com', 1, '2024-11-05 18:31:10', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `auth_permissions`
--

CREATE TABLE `auth_permissions` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `auth_permissions`
--

INSERT INTO `auth_permissions` (`id`, `name`, `description`) VALUES
(1, 'back-office', 'User can access to the administration panel.'),
(2, 'manage-user', 'User can create, delete or modify the users.'),
(3, 'role-permission', 'User can edit and define permissions for a role.'),
(4, 'menu-permission', 'User cand create, delete or modify the menu.'),
(5, 'configuracion-permiso', 'Permiso para configurar el sistema'),
(6, 'bitacora-permiso', 'Permiso para acceder a la bitácora de eventos'),
(7, 'pacientes-permiso', 'Acceso al catalogo de pacientes'),
(8, 'medicamentos-permiso', 'Permiso para el acceso al catalogo de medicamentos'),
(9, 'enfermedades-permiso', 'Permiso para acceder al catalogo de enfermedades'),
(10, 'citas-permiso', 'Permiso para acceder al modulo de citas'),
(11, 'bitacora-permission', 'Permiso para la lista de bitacora');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `auth_reset_attempts`
--

CREATE TABLE `auth_reset_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `user_agent` varchar(255) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `auth_tokens`
--

CREATE TABLE `auth_tokens` (
  `id` int(11) UNSIGNED NOT NULL,
  `selector` varchar(255) NOT NULL,
  `hashedValidator` varchar(255) NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `expires` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `auth_users_permissions`
--

CREATE TABLE `auth_users_permissions` (
  `user_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `permission_id` int(11) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `auth_users_permissions`
--

INSERT INTO `auth_users_permissions` (`user_id`, `permission_id`) VALUES
(1, 1),
(1, 2),
(1, 3),
(1, 4),
(1, 5),
(1, 6),
(1, 7),
(1, 8),
(1, 9),
(1, 10),
(1, 11),
(2, 1),
(2, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bitacora`
--

CREATE TABLE `bitacora` (
  `id` bigint(20) NOT NULL,
  `descripcion` text DEFAULT NULL,
  `usuario` varchar(16) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `bitacora`
--

INSERT INTO `bitacora` (`id`, `descripcion`, `usuario`, `created_at`, `deleted_at`, `updated_at`) VALUES
(1, 'Se Modifico las configuracion con los siguientes datos:{\"csrf_test_name\":\"a7ffa97d2b28231ecf04142fbf2aac8f\",\"nombreHospital\":\"Hospital Generalasd\",\"correoElectronico\":\"asdasd@asd.com\",\"RFC\":\"XXXAasdasd\",\"telefono\":\"5646546321\"}', 'admin', '2023-01-02 23:23:36', NULL, '2023-01-02 23:23:36'),
(2, 'Se Modifico las configuracion con los siguientes datos:{\"csrf_test_name\":\"a7ffa97d2b28231ecf04142fbf2aac8f\",\"nombreHospital\":\"Hospital Generalasd\",\"correoElectronico\":\"asdasd@asd.com\",\"RFC\":\"XXXAasdasd\",\"telefono\":\"5646546321\"}', 'admin', '2023-01-02 23:24:22', NULL, '2023-01-02 23:24:22'),
(3, 'Se Modifico las configuracion con los siguientes datos:{\"csrf_test_name\":\"a7ffa97d2b28231ecf04142fbf2aac8f\",\"nombreHospital\":\"Hospital Generalasd\",\"correoElectronico\":\"asdasd@asd.com\",\"RFC\":\"XXXAasdasd\",\"telefono\":\"5646546321\"}', 'admin', '2023-01-02 23:24:24', NULL, '2023-01-02 23:24:24'),
(4, 'Se Modifico las configuracion con los siguientes datos:{\"csrf_test_name\":\"a7ffa97d2b28231ecf04142fbf2aac8f\",\"nombreHospital\":\"Hospital Generalasd\",\"correoElectronico\":\"asdasd@asd.com\",\"RFC\":\"XXXAasdasdasdasd\",\"telefono\":\"5646546321asdasda\"}', 'admin', '2023-01-02 23:24:26', NULL, '2023-01-02 23:24:26'),
(5, 'Se Modifico las configuracion con los siguientes datos:{\"csrf_test_name\":\"a7ffa97d2b28231ecf04142fbf2aac8f\",\"nombreHospital\":\"Hospital Generalasd\",\"correoElectronico\":\"asdaaasdsd@asd.com\",\"RFC\":\"XXXAasdasdasdasd\",\"telefono\":\"5646546321asdasd\"}', 'admin', '2023-01-02 23:24:30', NULL, '2023-01-02 23:24:30'),
(6, 'Se Modifico las configuracion con los siguientes datos:{\"csrf_test_name\":\"a7ffa97d2b28231ecf04142fbf2aac8f\",\"nombreHospital\":\"Hospital Generalasdasd\",\"correoElectronico\":\"asdaaasdsd@asd.com\",\"RFC\":\"XXXAasdasdasdasd\",\"telefono\":\"5646546321asdasd\"}', 'admin', '2023-01-02 23:24:33', NULL, '2023-01-02 23:24:33'),
(7, 'Se Modifico las configuracion con los siguientes datos:{\"csrf_test_name\":\"a7ffa97d2b28231ecf04142fbf2aac8f\",\"nombreHospital\":\"Hospital Generalasdasd\",\"correoElectronico\":\"asdaaasdsd@asd.comas\",\"RFC\":\"XXXAasdasdasdasd\",\"telefono\":\"5646546321asdasd\"}', 'admin', '2023-01-02 23:24:36', NULL, '2023-01-02 23:24:36'),
(8, 'Se guardo el paciente con los siguientes datos: {\"idPaciente\":\"0\",\"nombres\":\"Julio Cesar\",\"apellidos\":\"Leyva Rodriguez\",\"telefono\":\"asd\",\"dni\":\"asd\",\"correoElectronico\":\"julio@asd.com\"}', 'admin', '2023-01-04 22:55:45', NULL, '2023-01-04 22:55:45'),
(9, 'Se actualizo el paciente con los siguientes datos: {\"idPaciente\":\"1\",\"nombres\":\"Julio Cesar\",\"apellidos\":\"Leyva Rodriguez\",\"telefono\":\"123123123\",\"dni\":\"asd\",\"correoElectronico\":\"julio@asd.com\"}', 'admin', '2023-01-04 22:56:03', NULL, '2023-01-04 22:56:03'),
(10, 'Se elimino el paciente que contenia los siguientes datos null', NULL, '2023-01-04 22:56:10', NULL, '2023-01-04 22:56:10'),
(11, 'Se guardo el paciente con los siguientes datos: {\"idPaciente\":\"0\",\"nombres\":\"asdasda\",\"apellidos\":\"dssasd\",\"telefono\":\"asdasd\",\"dni\":\"asdasd\",\"correoElectronico\":\"asdasd@asd.com\"}', 'admin', '2023-01-04 22:57:48', NULL, '2023-01-04 22:57:48'),
(12, 'Se guardo el paciente con los siguientes datos: {\"idPaciente\":\"0\",\"nombres\":\"asdasd\",\"apellidos\":\"asdasd\",\"telefono\":\"123123123\",\"dni\":\"asdasd\",\"correoElectronico\":\"asd@asd.com\"}', 'admin', '2023-01-04 22:58:54', NULL, '2023-01-04 22:58:54'),
(13, 'Se guardo el paciente con los siguientes datos: {\"idPaciente\":\"0\",\"nombres\":\"asdasd\",\"apellidos\":\"asdasd\",\"telefono\":\"123123\",\"dni\":\"123123\",\"correoElectronico\":\"asdasd@asd.com\"}', 'admin', '2023-01-04 23:00:16', NULL, '2023-01-04 23:00:16'),
(14, 'Se elimino el paciente que contenia los siguientes datos []', NULL, '2023-01-04 23:00:20', NULL, '2023-01-04 23:00:20'),
(15, 'Se guardo la medicamento con los siguientes datos: {\"idMedicamento\":\"0\",\"descripcion\":\"Ibuprofeno\"}', 'admin', '2023-01-06 22:56:44', NULL, '2023-01-06 22:56:44'),
(16, 'Se guardo la medicamento con los siguientes datos: {\"idMedicamento\":\"0\",\"descripcion\":\"Loradatamina\"}', 'admin', '2023-01-06 22:56:51', NULL, '2023-01-06 22:56:51'),
(17, 'Se actualizo el medicamento con los siguientes datos: {\"idMedicamento\":\"1\",\"descripcion\":\"Ibuprofeno 20 gr\"}', 'admin', '2023-01-06 22:56:59', NULL, '2023-01-06 22:56:59'),
(18, 'Se elimino la medicamento que contenia los siguientes datos null', NULL, '2023-01-06 22:57:24', NULL, '2023-01-06 22:57:24'),
(19, 'Se guardo la enfermedad con los siguientes datos: {\"idEnfermedad\":\"0\",\"descripcion\":\"Fiebre\"}', 'admin', '2023-01-07 22:07:30', NULL, '2023-01-07 22:07:30'),
(20, 'Se guardo la enfermedad con los siguientes datos: {\"idEnfermedad\":\"0\",\"descripcion\":\"Chorro\"}', 'admin', '2023-01-07 22:08:27', NULL, '2023-01-07 22:08:27'),
(21, 'Se actualizo el paciente con los siguientes datos: {\"idEnfermedad\":\"2\",\"descripcion\":\"Dierrea\"}', 'admin', '2023-01-07 22:08:40', NULL, '2023-01-07 22:08:40'),
(22, 'Se elimino la enfermedad que contenia los siguientes datos null', NULL, '2023-01-07 22:09:13', NULL, '2023-01-07 22:09:13'),
(23, 'Se elimino la enfermedad que contenia los siguientes datos null', NULL, '2023-01-07 22:11:21', NULL, '2023-01-07 22:11:21'),
(24, 'Se guardo la enfermedad con los siguientes datos: {\"idEnfermedad\":\"0\",\"descripcion\":\"asdasd\"}', 'admin', '2023-01-07 22:11:27', NULL, '2023-01-07 22:11:27'),
(25, 'Se elimino la enfermedad que contenia los siguientes datos {\"id\":\"3\",\"descripcion\":\"asdasd\",\"created_at\":\"2023-01-07 22:11:27\",\"deleted_at\":\"0000-00-00 00:00:00\",\"updated_at\":\"2023-01-07 22:11:27\"}', NULL, '2023-01-07 22:11:40', NULL, '2023-01-07 22:11:40'),
(26, 'Se guardo la enfermedad con los siguientes datos: {\"idEnfermedad\":\"0\",\"descripcion\":\"asd\"}', 'admin', '2023-01-07 22:13:23', NULL, '2023-01-07 22:13:23'),
(27, 'Se elimino la enfermedad que contenia los siguientes datos {\"id\":\"4\",\"descripcion\":\"asd\",\"created_at\":\"2023-01-07 22:13:23\",\"deleted_at\":\"0000-00-00 00:00:00\",\"updated_at\":\"2023-01-07 22:13:23\"}', 'admin', '2023-01-07 22:13:26', NULL, '2023-01-07 22:13:26'),
(28, 'Se guardo el paciente con los siguientes datos: {\"idPaciente\":\"0\",\"nombres\":\"Publico en generaL\",\"apellidos\":\"Publico en generaL\",\"telefono\":\"1231231\",\"dni\":\"ASDASD\",\"correoElectronico\":\"ASDASD@ASD.COM\"}', 'admin', '2023-01-07 22:16:00', NULL, '2023-01-07 22:16:00'),
(29, 'Se actualizo el paciente con los siguientes datos: {\"idPaciente\":\"5\",\"nombres\":\"Publico en generaL\",\"apellidos\":\"Publico en generaL\",\"telefono\":\"1231231\",\"dni\":\"ASDASD\",\"correoElectronico\":\"ASDASD@ASD.COM\"}', 'admin', '2023-01-07 22:16:05', NULL, '2023-01-07 22:16:05'),
(30, 'Se elimino el paciente que contenia los siguientes datos {\"id\":\"5\",\"nombres\":\"Publico en generaL\",\"apellidos\":\"Publico en generaL\",\"dni\":\"ASDASD\",\"telefono\":\"1231231\",\"correoElectronico\":\"ASDASD@ASD.COM\",\"created_at\":\"2023-01-07 22:16:00\",\"deleted_at\":null,\"updated_at\":\"2023-01-07 22:16:05\"}', 'admin', '2023-01-07 22:16:08', NULL, '2023-01-07 22:16:08'),
(31, 'Se guardo el paciente con los siguientes datos: {\"idPaciente\":\"0\",\"nombres\":\"Julio Cesar \",\"apellidos\":\"Leyva Rodriguez\",\"telefono\":\"123123123\",\"dni\":\"123123\",\"correoElectronico\":\"adasd@asd.com.mx\"}', 'admin', '2023-01-08 17:29:50', NULL, '2023-01-08 17:29:50'),
(32, 'Se guardo el paciente con los siguientes datos: {\"idPaciente\":\"0\",\"nombres\":\"asdasd\",\"apellidos\":\"asdasd\",\"telefono\":\"123123\",\"dni\":\"asdasd\",\"correoElectronico\":\"123123@asd.com\"}', 'admin', '2023-01-08 17:30:21', NULL, '2023-01-08 17:30:21'),
(33, 'Se guardo el paciente con los siguientes datos: {\"idPaciente\":\"0\",\"nombres\":\"adadsas\",\"apellidos\":\"asdasd\",\"telefono\":\"asdasd\",\"dni\":\"123123\",\"correoElectronico\":\"adasdasd@asd.com\"}', 'admin', '2023-01-08 17:30:33', NULL, '2023-01-08 17:30:33'),
(34, 'Se guardo la medicamento con los siguientes datos: {\"idCita\":\"0\",\"observaciones\":\"Cita para checar asd\",\"idPaciente\":\"6\",\"fechaHora\":\"2023-01-08T17:30:37\",\"hastaFechaHora\":\"2023-01-08T17:30:37\"}', 'admin', '2023-01-08 17:31:08', NULL, '2023-01-08 17:31:08'),
(35, 'Se guardo el paciente con los siguientes datos: {\"idPaciente\":\"0\",\"nombres\":\"asdasda\",\"apellidos\":\"asdasd\",\"telefono\":\"123\",\"dni\":\"123\",\"correoElectronico\":\"asd@asd.com\"}', 'admin', '2023-01-26 15:36:15', NULL, '2023-01-26 15:36:15'),
(36, 'Se actualizo el paciente con los siguientes datos: {\"idPaciente\":\"9\",\"nombres\":\"asdasdaasda\",\"apellidos\":\"asdasd\",\"telefono\":\"123\",\"dni\":\"123\",\"correoElectronico\":\"asd@asd.com\"}', 'admin', '2023-01-26 15:36:24', NULL, '2023-01-26 15:36:24'),
(37, 'Se elimino el paciente que contenia los siguientes datos {\"id\":\"9\",\"nombres\":\"asdasdaasda\",\"apellidos\":\"asdasd\",\"dni\":\"123\",\"telefono\":\"123\",\"correoElectronico\":\"asd@asd.com\",\"created_at\":\"2023-01-26 15:36:15\",\"deleted_at\":null,\"updated_at\":\"2023-01-26 15:36:24\"}', 'admin', '2023-01-26 15:36:27', NULL, '2023-01-26 15:36:27'),
(38, 'Se guardo la enfermedad con los siguientes datos: {\"idEnfermedad\":\"0\",\"descripcion\":\"asda\"}', 'admin', '2023-01-26 15:36:35', NULL, '2023-01-26 15:36:35'),
(39, 'Se actualizo el paciente con los siguientes datos: {\"idEnfermedad\":\"5\",\"descripcion\":\"asdaasda\"}', 'admin', '2023-01-26 15:36:38', NULL, '2023-01-26 15:36:38'),
(40, 'Se elimino la enfermedad que contenia los siguientes datos {\"id\":\"5\",\"descripcion\":\"asdaasda\",\"created_at\":\"2023-01-26 15:36:35\",\"deleted_at\":\"0000-00-00 00:00:00\",\"updated_at\":\"2023-01-26 15:36:38\"}', 'admin', '2023-01-26 15:36:41', NULL, '2023-01-26 15:36:41'),
(41, 'Se guardo la medicamento con los siguientes datos: {\"idMedicamento\":\"0\",\"descripcion\":\"asdasda\"}', 'admin', '2023-01-26 15:36:49', NULL, '2023-01-26 15:36:49'),
(42, 'Se actualizo el medicamento con los siguientes datos: {\"idMedicamento\":\"3\",\"descripcion\":\"asdasdaasd\"}', 'admin', '2023-01-26 15:37:06', NULL, '2023-01-26 15:37:06'),
(43, 'Se actualizo el medicamento con los siguientes datos: {\"idMedicamento\":\"3\",\"descripcion\":\"asdasdaasda\"}', 'admin', '2023-01-26 15:37:11', NULL, '2023-01-26 15:37:11'),
(44, 'Se elimino la medicamento que contenia los siguientes datos {\"id\":\"3\",\"descripcion\":\"asdasdaasda\",\"created_at\":\"2023-01-26 15:36:49\",\"deleted_at\":null,\"updated_at\":\"2023-01-26 15:37:11\"}', 'admin', '2023-01-26 15:37:13', NULL, '2023-01-26 15:37:13'),
(45, 'Se guardo la enfermedad con los siguientes datos: {\"idEnfermedad\":\"0\",\"descripcion\":\"Dolor de cabeza\"}', 'admin', '2023-01-30 21:23:50', NULL, '2023-01-30 21:23:50'),
(46, 'Se guardo la enfermedad con los siguientes datos: {\"idEnfermedad\":\"0\",\"descripcion\":\"Dolor de panza\"}', 'admin', '2023-01-30 21:23:59', NULL, '2023-01-30 21:23:59'),
(47, 'Se guardo la enfermedad con los siguientes datos: {\"idEnfermedad\":\"0\",\"descripcion\":\"Dificultad para respirar\"}', 'admin', '2023-01-30 21:24:11', NULL, '2023-01-30 21:24:11'),
(48, 'Se guardo la medicamento con los siguientes datos: {\"idMedicamento\":\"0\",\"descripcion\":\"Descanso\"}', 'admin', '2023-01-30 23:14:10', NULL, '2023-01-30 23:14:10'),
(49, 'Se guardo la enfermedad con los siguientes datos: {\"idEnfermedad\":\"0\",\"descripcion\":\"prueba10\"}', 'admin', '2023-01-31 16:03:48', NULL, '2023-01-31 16:03:48'),
(50, 'Se guardo la enfermedad con los siguientes datos: {\"idEnfermedad\":\"0\",\"descripcion\":\"asda\"}', 'admin', '2023-01-31 16:04:03', NULL, '2023-01-31 16:04:03'),
(51, 'Se guardo la enfermedad con los siguientes datos: {\"idEnfermedad\":\"0\",\"descripcion\":\"prueba\"}', 'admin', '2023-01-31 16:08:45', NULL, '2023-01-31 16:08:45'),
(52, 'Se elimino la enfermedad que contenia los siguientes datos {\"id\":\"11\",\"descripcion\":\"prueba\",\"created_at\":\"2023-01-31 16:08:45\",\"deleted_at\":\"0000-00-00 00:00:00\",\"updated_at\":\"2023-01-31 16:08:45\"}', 'admin', '2023-01-31 16:09:09', NULL, '2023-01-31 16:09:09'),
(53, 'Se elimino la enfermedad que contenia los siguientes datos {\"id\":\"10\",\"descripcion\":\"asda\",\"created_at\":\"2023-01-31 16:04:03\",\"deleted_at\":\"0000-00-00 00:00:00\",\"updated_at\":\"2023-01-31 16:04:03\"}', 'admin', '2023-01-31 16:09:11', NULL, '2023-01-31 16:09:11'),
(54, 'Se elimino la enfermedad que contenia los siguientes datos null', 'admin', '2023-01-31 16:09:13', NULL, '2023-01-31 16:09:13'),
(55, 'Se elimino la enfermedad que contenia los siguientes datos {\"id\":\"9\",\"descripcion\":\"prueba10\",\"created_at\":\"2023-01-31 16:03:48\",\"deleted_at\":\"0000-00-00 00:00:00\",\"updated_at\":\"2023-01-31 16:03:48\"}', 'admin', '2023-01-31 16:09:20', NULL, '2023-01-31 16:09:20'),
(56, 'Se guardo la enfermedad con los siguientes datos: {\"idEnfermedad\":\"0\",\"descripcion\":\"prueba\"}', 'admin', '2023-01-31 16:13:30', NULL, '2023-01-31 16:13:30'),
(57, 'Se guardo la medicamento con los siguientes datos: {\"idMedicamento\":\"0\",\"descripcion\":\"asd\"}', 'admin', '2023-01-31 16:34:48', NULL, '2023-01-31 16:34:48'),
(58, 'Se elimino la medicamento que contenia los siguientes datos {\"id\":\"5\",\"descripcion\":\"asd\",\"created_at\":\"2023-01-31 16:34:48\",\"deleted_at\":null,\"updated_at\":\"2023-01-31 16:34:48\"}', 'admin', '2023-01-31 16:34:52', NULL, '2023-01-31 16:34:52'),
(59, 'Se guardo la medicamento con los siguientes datos: {\"idMedicamento\":\"0\",\"descripcion\":\"Antibiotico\"}', 'admin', '2023-01-31 16:36:23', NULL, '2023-01-31 16:36:23'),
(60, 'Se guardo la medicamento con los siguientes datos: {\"idMedicamento\":\"0\",\"descripcion\":\"prueba\"}', 'admin', '2023-01-31 16:37:09', NULL, '2023-01-31 16:37:09'),
(61, 'Se actualizo el paciente con los siguientes datos: {\"idPaciente\":\"undefined\",\"nombres\":\"Nombre Paciente\",\"apellidos\":\"Apellidos\",\"telefono\":\"6688612348\",\"dni\":\"INE\",\"correoElectronico\":\"asdasd@asd.com\"}', 'admin', '2023-01-31 17:43:42', NULL, '2023-01-31 17:43:42'),
(62, 'Se actualizo el paciente con los siguientes datos: {\"idPaciente\":\"undefined\",\"nombres\":\"Nombre Paciente\",\"apellidos\":\"Apellidos\",\"telefono\":\"6688612348\",\"dni\":\"INE\",\"correoElectronico\":\"asdasd@asd.com\"}', 'admin', '2023-01-31 17:43:42', NULL, '2023-01-31 17:43:42'),
(63, 'Se actualizo el paciente con los siguientes datos: {\"idPaciente\":\"undefined\",\"nombres\":\"Nombre Paciente\",\"apellidos\":\"Apellidos\",\"telefono\":\"6688612348\",\"dni\":\"INE\",\"correoElectronico\":\"asdasd@asd.com\"}', 'admin', '2023-01-31 17:43:42', NULL, '2023-01-31 17:43:42'),
(64, 'Se guardo el paciente con los siguientes datos: {\"idPaciente\":\"0\",\"nombres\":\"Nombre Paciente\",\"apellidos\":\"Apellidos\",\"telefono\":\"6688612348\",\"dni\":\"INE\",\"correoElectronico\":\"asdasd@asd.com\"}', 'admin', '2023-01-31 17:43:42', NULL, '2023-01-31 17:43:42'),
(65, 'Se guardo la consulta con los siguientes datos: {\"paciente\":\"6\",\"fechaHora\":\"2023-02-01T22:04:14\",\"idDoctor\":\"1\",\"motivoConsulta\":\"Prueba\",\"diagnosticos\":\"[{\\\"idDiagnostico\\\":\\\"12\\\",\\\"descripcion\\\":\\\"prueba\\\"},{\\\"idDiagnostico\\\":\\\"7\\\",\\\"descripcion\\\":\\\"Dolor de panza\\\"},{\\\"idDiagnostico\\\":\\\"6\\\",\\\"descripcion\\\":\\\"Dolor de cabeza\\\"},{\\\"idDiagnostico\\\":\\\"8\\\",\\\"descripcion\\\":\\\"Dificultad para respirar\\\"}]\",\"tratamientos\":\"[{\\\"idTratamiento\\\":\\\"7\\\",\\\"descripcion\\\":\\\"prueba\\\",\\\"uso\\\":\\\"\\\"},{\\\"idTratamiento\\\":\\\"1\\\",\\\"descripcion\\\":\\\"Ibuprofeno 20 gr\\\",\\\"uso\\\":\\\"\\\"},{\\\"idTratamiento\\\":\\\"6\\\",\\\"descripcion\\\":\\\"Antibiotico\\\",\\\"uso\\\":\\\"\\\"}]\",\"uuid\":\"d00e110f-d0f4-4c33-a829-983967f48785\"}', 'admin', '2023-02-01 22:04:38', NULL, '2023-02-01 22:04:38'),
(66, 'Se guardo la consulta con los siguientes datos: {\"paciente\":\"6\",\"fechaHora\":\"2023-02-01T23:39:28\",\"idDoctor\":\"1\",\"motivoConsulta\":\"Prueba Motivos\",\"diagnosticos\":\"[{\\\"idDiagnostico\\\":\\\"12\\\",\\\"descripcion\\\":\\\"prueba\\\"},{\\\"idDiagnostico\\\":\\\"7\\\",\\\"descripcion\\\":\\\"Dolor de panza\\\"},{\\\"idDiagnostico\\\":\\\"6\\\",\\\"descripcion\\\":\\\"Dolor de cabeza\\\"},{\\\"idDiagnostico\\\":\\\"8\\\",\\\"descripcion\\\":\\\"Dificultad para respirar\\\"}]\",\"tratamientos\":\"[{\\\"idTratamiento\\\":\\\"7\\\",\\\"descripcion\\\":\\\"prueba\\\",\\\"uso\\\":\\\"\\\"},{\\\"idTratamiento\\\":\\\"1\\\",\\\"descripcion\\\":\\\"Ibuprofeno 20 gr\\\",\\\"uso\\\":\\\"\\\"},{\\\"idTratamiento\\\":\\\"4\\\",\\\"descripcion\\\":\\\"Descanso\\\",\\\"uso\\\":\\\"\\\"},{\\\"idTratamiento\\\":\\\"6\\\",\\\"descripcion\\\":\\\"Antibiotico\\\",\\\"uso\\\":\\\"\\\"}]\",\"uuid\":\"b7bd042a-6fbf-499a-90ce-6fa3f46d951d\"}', 'admin', '2023-02-01 23:40:15', NULL, '2023-02-01 23:40:15'),
(67, 'Se guardo la consulta con los siguientes datos: {\"paciente\":\"6\",\"fechaHora\":\"2023-02-01T23:41:28\",\"idDoctor\":\"1\",\"motivoConsulta\":\"motivo consulta\",\"diagnosticos\":\"[{\\\"idDiagnostico\\\":\\\"12\\\",\\\"descripcion\\\":\\\"prueba\\\"},{\\\"idDiagnostico\\\":\\\"7\\\",\\\"descripcion\\\":\\\"Dolor de panza\\\"},{\\\"idDiagnostico\\\":\\\"6\\\",\\\"descripcion\\\":\\\"Dolor de cabeza\\\"},{\\\"idDiagnostico\\\":\\\"8\\\",\\\"descripcion\\\":\\\"Dificultad para respirar\\\"}]\",\"tratamientos\":\"[{\\\"idTratamiento\\\":\\\"7\\\",\\\"descripcion\\\":\\\"prueba\\\",\\\"uso\\\":\\\"prueba\\\"},{\\\"idTratamiento\\\":\\\"1\\\",\\\"descripcion\\\":\\\"Ibuprofeno 20 gr\\\",\\\"uso\\\":\\\"1 cada 8 horas\\\"},{\\\"idTratamiento\\\":\\\"4\\\",\\\"descripcion\\\":\\\"Descanso\\\",\\\"uso\\\":\\\"por las tardes\\\"},{\\\"idTratamiento\\\":\\\"6\\\",\\\"descripcion\\\":\\\"Antibiotico\\\",\\\"uso\\\":\\\"1 cada 12 horas\\\"}]\",\"uuid\":\"e1c2b6e0-397e-4063-8c72-783e357650c2\"}', 'admin', '2023-02-01 23:42:18', NULL, '2023-02-01 23:42:18'),
(68, 'Se guardo la consulta con los siguientes datos: {\"paciente\":\"6\",\"fechaHora\":\"2023-02-01T23:58:04\",\"idDoctor\":\"1\",\"motivoConsulta\":\"asdasd\",\"diagnosticos\":\"[{\\\"idDiagnostico\\\":\\\"12\\\",\\\"descripcion\\\":\\\"prueba\\\"},{\\\"idDiagnostico\\\":\\\"7\\\",\\\"descripcion\\\":\\\"Dolor de panza\\\"},{\\\"idDiagnostico\\\":\\\"6\\\",\\\"descripcion\\\":\\\"Dolor de cabeza\\\"},{\\\"idDiagnostico\\\":\\\"8\\\",\\\"descripcion\\\":\\\"Dificultad para respirar\\\"}]\",\"tratamientos\":\"[{\\\"idTratamiento\\\":\\\"7\\\",\\\"descripcion\\\":\\\"prueba\\\",\\\"uso\\\":\\\"uso\\\"},{\\\"idTratamiento\\\":\\\"4\\\",\\\"descripcion\\\":\\\"Descanso\\\",\\\"uso\\\":\\\"1 cada 5 hhoras\\\"},{\\\"idTratamiento\\\":\\\"6\\\",\\\"descripcion\\\":\\\"Antibiotico\\\",\\\"uso\\\":\\\"1 cada 5 hhoras\\\"}]\",\"uuid\":\"6be47712-1aa8-4798-8078-6abc1abac66b\"}', 'admin', '2023-02-01 23:58:35', NULL, '2023-02-01 23:58:35'),
(69, 'Se guardo la consulta con los siguientes datos: {\"paciente\":\"6\",\"fechaHora\":\"2023-02-01T23:59:01\",\"idDoctor\":\"1\",\"motivoConsulta\":\"Consulta\",\"diagnosticos\":\"[{\\\"idDiagnostico\\\":\\\"12\\\",\\\"descripcion\\\":\\\"prueba\\\"},{\\\"idDiagnostico\\\":\\\"7\\\",\\\"descripcion\\\":\\\"Dolor de panza\\\"},{\\\"idDiagnostico\\\":\\\"6\\\",\\\"descripcion\\\":\\\"Dolor de cabeza\\\"},{\\\"idDiagnostico\\\":\\\"8\\\",\\\"descripcion\\\":\\\"Dificultad para respirar\\\"}]\",\"tratamientos\":\"[{\\\"idTratamiento\\\":\\\"7\\\",\\\"descripcion\\\":\\\"prueba\\\",\\\"uso\\\":\\\"prueba\\\"},{\\\"idTratamiento\\\":\\\"1\\\",\\\"descripcion\\\":\\\"Ibuprofeno 20 gr\\\",\\\"uso\\\":\\\"\\\"},{\\\"idTratamiento\\\":\\\"4\\\",\\\"descripcion\\\":\\\"Descanso\\\",\\\"uso\\\":\\\"\\\"},{\\\"idTratamiento\\\":\\\"6\\\",\\\"descripcion\\\":\\\"Antibiotico\\\",\\\"uso\\\":\\\"\\\"}]\",\"uuid\":\"1e106916-f07a-45cc-b0e8-57fd2eb18126\"}', 'admin', '2023-02-01 23:59:25', NULL, '2023-02-01 23:59:25'),
(70, 'Se elimino la consulta que contenia los siguientes datosnull', NULL, '2024-09-30 17:30:55', NULL, '2024-09-30 17:30:55'),
(71, 'Se guardo el paciente con los siguientes datos: {\"idPaciente\":\"0\",\"nombres\":\"Nombre\",\"apellidos\":\"Prueba\",\"telefono\":\"Telefono\",\"dni\":\"Ine prubea\",\"correoElectronico\":\"123@asd.com\"}', 'admin', '2024-11-04 17:02:09', NULL, '2024-11-04 17:02:09'),
(72, 'Se actualizo el medicamento con los siguientes datos: {\"idCita\":\"1\",\"observaciones\":\"Cita para checar asd\",\"idPaciente\":\"6\",\"fechaHora\":\"2023-01-08T17:30:37\",\"hastaFechaHora\":\"2023-01-08T17:30:37\"}', 'admin', '2024-11-04 23:26:39', NULL, '2024-11-04 23:26:39'),
(73, 'The query is saved with the following data: {\"paciente\":\"7\",\"fechaHora\":\"2024-11-04T23:51:29\",\"idDoctor\":\"1\",\"motivoConsulta\":\"asd\",\"diagnosticos\":\"[{\\\"idDiagnostico\\\":\\\"6\\\",\\\"descripcion\\\":\\\"Dolor de cabeza\\\"},{\\\"idDiagnostico\\\":\\\"8\\\",\\\"descripcion\\\":\\\"Dificultad para respirar\\\"}]\",\"tratamientos\":\"[{\\\"idTratamiento\\\":\\\"6\\\",\\\"descripcion\\\":\\\"Antibiotico\\\",\\\"uso\\\":\\\"123\\\"},{\\\"idTratamiento\\\":\\\"4\\\",\\\"descripcion\\\":\\\"Descanso\\\",\\\"uso\\\":\\\"asd\\\"}]\",\"uuid\":\"44eb50ac-a2e0-4090-a9d7-a36ac37548d3\"}', 'admin', '2024-11-04 23:51:59', NULL, '2024-11-04 23:51:59'),
(74, 'Se Modifico las configuracion con los siguientes datos:{\"csrf_test_name\":\"1072c2bd8ed7113db46a264909f2304e\",\"nombreHospital\":\"Hospital Generalasdasd\",\"correoElectronico\":\"asdaaasdsd@asd.comas\",\"RFC\":\"XXXAasdasdasdasd\",\"telefono\":\"5646546321asdasd\",\"languaje\":\"en\"}', 'admin', '2024-11-05 00:42:53', NULL, '2024-11-05 00:42:53'),
(75, 'Se Modifico las configuracion con los siguientes datos:{\"csrf_test_name\":\"1072c2bd8ed7113db46a264909f2304e\",\"nombreHospital\":\"Hospital Generalasdasd\",\"correoElectronico\":\"asdaaasdsd@asd.comas\",\"RFC\":\"XXXAasdasdasdasd\",\"telefono\":\"5646546321asdasd\",\"languaje\":\"es\"}', 'admin', '2024-11-05 00:43:16', NULL, '2024-11-05 00:43:16'),
(76, 'Se Modifico las configuracion con los siguientes datos:{\"csrf_test_name\":\"1072c2bd8ed7113db46a264909f2304e\",\"nombreHospital\":\"Hospital Generalasdasd\",\"correoElectronico\":\"asdaaasdsd@asd.comas\",\"RFC\":\"XXXAasdasdasdasd\",\"telefono\":\"5646546321asdasd\",\"languaje\":\"it\"}', 'admin', '2024-11-05 00:47:16', NULL, '2024-11-05 00:47:16'),
(77, 'Se Modifico las configuracion con los siguientes datos:{\"csrf_test_name\":\"1072c2bd8ed7113db46a264909f2304e\",\"nombreHospital\":\"Hospital Generalasdasd\",\"correoElectronico\":\"asdaaasdsd@asd.comas\",\"RFC\":\"XXXAasdasdasdasd\",\"telefono\":\"5646546321asdasd\",\"languaje\":\"en\"}', 'admin', '2024-11-05 00:48:20', NULL, '2024-11-05 00:48:20'),
(78, 'Se Modifico las configuracion con los siguientes datos:{\"csrf_test_name\":\"1072c2bd8ed7113db46a264909f2304e\",\"nombreHospital\":\"Hospital Generalasdasd\",\"correoElectronico\":\"asdaaasdsd@asd.comas\",\"RFC\":\"XXXAasdasdasdasd\",\"telefono\":\"5646546321asdasd\",\"languaje\":\"es\"}', 'admin', '2024-11-05 00:48:27', NULL, '2024-11-05 00:48:27'),
(79, 'Se Modifico las configuracion con los siguientes datos:{\"csrf_test_name\":\"1072c2bd8ed7113db46a264909f2304e\",\"nombreHospital\":\"Hospital Generalasdasd\",\"correoElectronico\":\"asdaaasdsd@asd.comas\",\"RFC\":\"XXXAasdasdasdasd\",\"telefono\":\"5646546321asdasd\",\"languaje\":\"es\"}', 'admin', '2024-11-05 00:50:35', NULL, '2024-11-05 00:50:35'),
(80, 'Se Modifico las configuracion con los siguientes datos:{\"csrf_test_name\":\"1072c2bd8ed7113db46a264909f2304e\",\"nombreHospital\":\"Hospital Generalasdasd\",\"correoElectronico\":\"asdaaasdsd@asd.comas\",\"RFC\":\"XXXAasdasdasdasd\",\"telefono\":\"5646546321asdasd\",\"languaje\":\"es\"}', 'admin', '2024-11-05 00:57:30', NULL, '2024-11-05 00:57:30'),
(81, 'Se Modifico las configuracion con los siguientes datos:{\"csrf_test_name\":\"edccca48359a7b963e964586dabf2942\",\"nombreHospital\":\"Hospital Generalasdasd\",\"correoElectronico\":\"asdaaasdsd@asd.comas\",\"RFC\":\"XXXAasdasdasdasd\",\"telefono\":\"5646546321asdasd\",\"languaje\":\"en\"}', 'admin', '2024-11-05 16:01:28', NULL, '2024-11-05 16:01:28'),
(82, 'Se Modifico las configuracion con los siguientes datos:{\"csrf_test_name\":\"6cc3a2b15fde5d4ffd597b0f4941b75d\",\"nombreHospital\":\"Hospital Generalasdasd\",\"correoElectronico\":\"asdaaasdsd@asd.comas\",\"RFC\":\"XXXAasdasdasdasd\",\"telefono\":\"5646546321asdasd\",\"languaje\":\"es\"}', 'admin', '2024-11-05 16:07:14', NULL, '2024-11-05 16:07:14'),
(83, 'Se Modifico las configuracion con los siguientes datos:{\"csrf_test_name\":\"edccca48359a7b963e964586dabf2942\",\"nombreHospital\":\"Hospital Generalasdasd\",\"correoElectronico\":\"asdaaasdsd@asd.comas\",\"RFC\":\"XXXAasdasdasdasd\",\"telefono\":\"5646546321asdasd\",\"languaje\":\"es\"}', 'admin', '2024-11-05 17:22:20', NULL, '2024-11-05 17:22:20'),
(84, 'Se Modifico las configuracion con los siguientes datos:{\"csrf_test_name\":\"edccca48359a7b963e964586dabf2942\",\"nombreHospital\":\"Hospital Generalasdasd\",\"correoElectronico\":\"asdaaasdsd@asd.comas\",\"RFC\":\"XXXAasdasdasdasd\",\"telefono\":\"5646546321asdasd\",\"languaje\":\"it\"}', 'admin', '2024-11-05 17:22:31', NULL, '2024-11-05 17:22:31'),
(85, 'Se Modifico las configuracion con los siguientes datos:{\"csrf_test_name\":\"edccca48359a7b963e964586dabf2942\",\"nombreHospital\":\"Hospital Generalasdasd\",\"correoElectronico\":\"asdaaasdsd@asd.comas\",\"RFC\":\"XXXAasdasdasdasd\",\"telefono\":\"5646546321asdasd\",\"languaje\":\"it\"}', 'admin', '2024-11-05 17:24:38', NULL, '2024-11-05 17:24:38'),
(86, 'Se Modifico las configuracion con los siguientes datos:{\"csrf_test_name\":\"edccca48359a7b963e964586dabf2942\",\"nombreHospital\":\"Hospital Generalasdasd\",\"correoElectronico\":\"asdaaasdsd@asd.comas\",\"RFC\":\"XXXAasdasdasdasd\",\"telefono\":\"5646546321asdasd\",\"languaje\":\"it\"}', 'admin', '2024-11-05 17:25:45', NULL, '2024-11-05 17:25:45'),
(87, 'Se Modifico las configuracion con los siguientes datos:{\"csrf_test_name\":\"edccca48359a7b963e964586dabf2942\",\"nombreHospital\":\"Hospital Generalasdasd\",\"correoElectronico\":\"asdaaasdsd@asd.comas\",\"RFC\":\"XXXAasdasdasdasd\",\"telefono\":\"5646546321asdasd\",\"languaje\":\"ep\"}', 'admin', '2024-11-05 17:26:38', NULL, '2024-11-05 17:26:38'),
(88, 'Se Modifico las configuracion con los siguientes datos:{\"csrf_test_name\":\"edccca48359a7b963e964586dabf2942\",\"nombreHospital\":\"Hospital Generalasdasd\",\"correoElectronico\":\"asdaaasdsd@asd.comas\",\"RFC\":\"XXXAasdasdasdasd\",\"telefono\":\"5646546321asdasd\",\"languaje\":\"ep\"}', 'admin', '2024-11-05 17:26:55', NULL, '2024-11-05 17:26:55'),
(89, 'Se Modifico las configuracion con los siguientes datos:{\"csrf_test_name\":\"edccca48359a7b963e964586dabf2942\",\"nombreHospital\":\"Hospital Generalasdasd\",\"correoElectronico\":\"asdaaasdsd@asd.comas\",\"RFC\":\"XXXAasdasdasdasd\",\"telefono\":\"5646546321asdasd\",\"languaje\":\"es\"}', 'admin', '2024-11-05 17:27:09', NULL, '2024-11-05 17:27:09'),
(90, 'Se Modifico las configuracion con los siguientes datos:{\"csrf_test_name\":\"edccca48359a7b963e964586dabf2942\",\"nombreHospital\":\"Hospital Generalasdasd\",\"correoElectronico\":\"asdaaasdsd@asd.comas\",\"RFC\":\"XXXAasdasdasdasd\",\"telefono\":\"5646546321asdasd\",\"languaje\":\"en\"}', 'admin', '2024-11-05 17:27:55', NULL, '2024-11-05 17:27:55'),
(91, 'Se Modifico las configuracion con los siguientes datos:{\"csrf_test_name\":\"edccca48359a7b963e964586dabf2942\",\"nombreHospital\":\"Hospital Generalasdasd\",\"correoElectronico\":\"asdaaasdsd@asd.comas\",\"RFC\":\"XXXAasdasdasdasd\",\"telefono\":\"5646546321asdasd\",\"languaje\":\"en\"}', 'admin', '2024-11-05 17:33:51', NULL, '2024-11-05 17:33:51'),
(92, 'Se Modifico las configuracion con los siguientes datos:{\"csrf_test_name\":\"6cc3a2b15fde5d4ffd597b0f4941b75d\",\"nombreHospital\":\"Hospital Generalasdasd\",\"correoElectronico\":\"asdaaasdsd@asd.comas\",\"RFC\":\"XXXAasdasdasdasd\",\"telefono\":\"5646546321asdasd\",\"languaje\":\"en\"}', 'admin', '2024-11-05 17:46:34', NULL, '2024-11-05 17:46:34'),
(93, 'Se Modifico las configuracion con los siguientes datos:{\"csrf_test_name\":\"0af0a9747a37635a433b3d959b36d745\",\"nombreHospital\":\"Hospital Generalasdasd\",\"correoElectronico\":\"asdaaasdsd@asd.comas\",\"RFC\":\"XXXAasdasdasdasd\",\"telefono\":\"5646546321asdasd\",\"languaje\":\"en\"}', 'admin', '2024-11-05 18:07:31', NULL, '2024-11-05 18:07:31'),
(94, 'Se Modifico las configuracion con los siguientes datos:{\"csrf_test_name\":\"0af0a9747a37635a433b3d959b36d745\",\"nombreHospital\":\"Hospital Generalasdasd\",\"correoElectronico\":\"asdaaasdsd@asd.comas\",\"RFC\":\"XXXAasdasdasdasd\",\"telefono\":\"5646546321asdasd\",\"languaje\":\"en\"}', 'admin', '2024-11-05 18:07:35', NULL, '2024-11-05 18:07:35'),
(95, 'Se Modifico las configuracion con los siguientes datos:{\"csrf_test_name\":\"0af0a9747a37635a433b3d959b36d745\",\"nombreHospital\":\"Hospital Generalasdasd\",\"correoElectronico\":\"asdaaasdsd@asd.comas\",\"RFC\":\"XXXAasdasdasdasd\",\"telefono\":\"5646546321asdasd\",\"languaje\":\"es\"}', 'admin', '2024-11-05 18:09:12', NULL, '2024-11-05 18:09:12'),
(96, 'Se Modifico las configuracion con los siguientes datos:{\"csrf_test_name\":\"edf10c0e6a949f4c846683bce5733347\",\"nombreHospital\":\"Hospital Generalasdasd\",\"correoElectronico\":\"asdaaasdsd@asd.comas\",\"RFC\":\"XXXAasdasdasdasd\",\"telefono\":\"5646546321asdasd\",\"languaje\":\"es\"}', 'admin', '2024-11-05 18:11:00', NULL, '2024-11-05 18:11:00'),
(97, 'Se Modifico las configuracion con los siguientes datos:{\"csrf_test_name\":\"edf10c0e6a949f4c846683bce5733347\",\"nombreHospital\":\"Hospital Generalasdasd\",\"correoElectronico\":\"asdaaasdsd@asd.comas\",\"RFC\":\"XXXAasdasdasdasd\",\"telefono\":\"5646546321asdasd\",\"languaje\":\"es\"}', 'admin', '2024-11-05 18:12:30', NULL, '2024-11-05 18:12:30'),
(98, 'Se Modifico las configuracion con los siguientes datos:{\"csrf_test_name\":\"edf10c0e6a949f4c846683bce5733347\",\"nombreHospital\":\"Hospital Generalasdasd\",\"correoElectronico\":\"asdaaasdsd@asd.comas\",\"RFC\":\"XXXAasdasdasdasd\",\"telefono\":\"5646546321asdasd\",\"languaje\":\"es\"}', 'admin', '2024-11-05 18:13:30', NULL, '2024-11-05 18:13:30'),
(99, 'Se Modifico las configuracion con los siguientes datos:{\"csrf_test_name\":\"0af0a9747a37635a433b3d959b36d745\",\"nombreHospital\":\"Hospital Generalasdasd\",\"correoElectronico\":\"asdaaasdsd@asd.comas\",\"RFC\":\"XXXAasdasdasdasd\",\"telefono\":\"5646546321asdasd\",\"languaje\":\"en\"}', 'admin', '2024-11-05 18:22:26', NULL, '2024-11-05 18:22:26'),
(100, 'Se Modifico las configuracion con los siguientes datos:{\"csrf_test_name\":\"0af0a9747a37635a433b3d959b36d745\",\"nombreHospital\":\"Hospital Generalasdasd\",\"correoElectronico\":\"asdaaasdsd@asd.comas\",\"RFC\":\"XXXAasdasdasdasd\",\"telefono\":\"5646546321asdasd\",\"languaje\":\"en\"}', 'admin', '2024-11-05 18:22:29', NULL, '2024-11-05 18:22:29'),
(101, 'Se Modifico las configuracion con los siguientes datos:{\"csrf_test_name\":\"0af0a9747a37635a433b3d959b36d745\",\"nombreHospital\":\"Hospital Generalasdasd\",\"correoElectronico\":\"asdaaasdsd@asd.comas\",\"RFC\":\"XXXAasdasdasdasd\",\"telefono\":\"5646546321asdasd\",\"languaje\":\"en\"}', 'admin', '2024-11-05 18:22:39', NULL, '2024-11-05 18:22:39'),
(102, 'Se Modifico las configuracion con los siguientes datos:{\"csrf_test_name\":\"0af0a9747a37635a433b3d959b36d745\",\"nombreHospital\":\"Hospital Generalasdasd\",\"correoElectronico\":\"asdaaasdsd@asd.comas\",\"RFC\":\"XXXAasdasdasdasd\",\"telefono\":\"5646546321asdasd\",\"languaje\":\"en\"}', 'admin', '2024-11-05 18:22:57', NULL, '2024-11-05 18:22:57'),
(103, 'Se Modifico las configuracion con los siguientes datos:{\"csrf_test_name\":\"0af0a9747a37635a433b3d959b36d745\",\"nombreHospital\":\"Hospital Generalasdasd\",\"correoElectronico\":\"asdaaasdsd@asd.comas\",\"RFC\":\"XXXAasdasdasdasd\",\"telefono\":\"5646546321asdasd\",\"languaje\":\"es\"}', 'admin', '2024-11-05 18:25:32', NULL, '2024-11-05 18:25:32'),
(104, 'Se Modifico las configuracion con los siguientes datos:{\"csrf_test_name\":\"0af0a9747a37635a433b3d959b36d745\",\"nombreHospital\":\"Hospital Generalasdasd\",\"correoElectronico\":\"asdaaasdsd@asd.comas\",\"RFC\":\"XXXAasdasdasdasd\",\"telefono\":\"5646546321asdasd\",\"languaje\":\"es\"}', 'admin', '2024-11-05 18:29:46', NULL, '2024-11-05 18:29:46'),
(105, 'Se Modifico las configuracion con los siguientes datos:{\"csrf_test_name\":\"0af0a9747a37635a433b3d959b36d745\",\"nombreHospital\":\"Hospital Generalasdasd\",\"correoElectronico\":\"asdaaasdsd@asd.comas\",\"RFC\":\"XXXAasdasdasdasd\",\"telefono\":\"5646546321asdasd\",\"languaje\":\"en\"}', 'admin', '2024-11-05 18:29:59', NULL, '2024-11-05 18:29:59'),
(106, 'Se Modifico las configuracion con los siguientes datos:{\"csrf_test_name\":\"0af0a9747a37635a433b3d959b36d745\",\"nombreHospital\":\"Hospital Generalasdasd\",\"correoElectronico\":\"asdaaasdsd@asd.comas\",\"RFC\":\"XXXAasdasdasdasd\",\"telefono\":\"5646546321asdasd\",\"languaje\":\"en\"}', 'admin', '2024-11-05 18:30:12', NULL, '2024-11-05 18:30:12'),
(107, 'Se Modifico las configuracion con los siguientes datos:{\"csrf_test_name\":\"0af0a9747a37635a433b3d959b36d745\",\"nombreHospital\":\"Hospital Generalasdasd\",\"correoElectronico\":\"asdaaasdsd@asd.comas\",\"RFC\":\"XXXAasdasdasdasd\",\"telefono\":\"5646546321asdasd\",\"languaje\":\"es\"}', 'admin', '2024-11-05 18:30:25', NULL, '2024-11-05 18:30:25'),
(108, 'Se Modifico las configuracion con los siguientes datos:{\"csrf_test_name\":\"0af0a9747a37635a433b3d959b36d745\",\"nombreHospital\":\"Hospital Generalasdasd\",\"correoElectronico\":\"asdaaasdsd@asd.comas\",\"RFC\":\"XXXAasdasdasdasd\",\"telefono\":\"5646546321asdasd\",\"languaje\":\"es\"}', 'admin', '2024-11-05 18:30:35', NULL, '2024-11-05 18:30:35'),
(109, 'Se Modifico las configuracion con los siguientes datos:{\"csrf_test_name\":\"0af0a9747a37635a433b3d959b36d745\",\"nombreHospital\":\"Hospital Generalasdasd\",\"correoElectronico\":\"asdaaasdsd@asd.comas\",\"RFC\":\"XXXAasdasdasdasd\",\"telefono\":\"5646546321asdasd\",\"languaje\":\"en\"}', 'admin', '2024-11-05 18:30:49', NULL, '2024-11-05 18:30:49'),
(110, 'Se Modifico las configuracion con los siguientes datos:{\"csrf_test_name\":\"0af0a9747a37635a433b3d959b36d745\",\"nombreHospital\":\"Hospital Generalasdasd\",\"correoElectronico\":\"asdaaasdsd@asd.comas\",\"RFC\":\"XXXAasdasdasdasd\",\"telefono\":\"5646546321asdasd\",\"languaje\":\"en\"}', 'admin', '2024-11-05 18:30:53', NULL, '2024-11-05 18:30:53'),
(111, 'Se Modifico las configuracion con los siguientes datos:{\"csrf_test_name\":\"0af0a9747a37635a433b3d959b36d745\",\"nombreHospital\":\"Hospital Generalasdasd\",\"correoElectronico\":\"asdaaasdsd@asd.comas\",\"RFC\":\"XXXAasdasdasdasd\",\"telefono\":\"5646546321asdasd\",\"languaje\":\"es\"}', 'admin', '2024-11-05 18:31:47', NULL, '2024-11-05 18:31:47'),
(112, 'Se Modifico las configuracion con los siguientes datos:{\"csrf_test_name\":\"0af0a9747a37635a433b3d959b36d745\",\"nombreHospital\":\"Hospital Generalasdasd\",\"correoElectronico\":\"asdaaasdsd@asd.comas\",\"RFC\":\"XXXAasdasdasdasd\",\"telefono\":\"5646546321asdasd\",\"languaje\":\"es\"}', 'admin', '2024-11-05 18:31:48', NULL, '2024-11-05 18:31:48'),
(113, 'Se Modifico las configuracion con los siguientes datos:{\"csrf_test_name\":\"0af0a9747a37635a433b3d959b36d745\",\"nombreHospital\":\"Hospital Generalasdasd\",\"correoElectronico\":\"asdaaasdsd@asd.comas\",\"RFC\":\"XXXAasdasdasdasd\",\"telefono\":\"5646546321asdasd\",\"languaje\":\"en\"}', 'admin', '2024-11-05 18:39:55', NULL, '2024-11-05 18:39:55'),
(114, 'Se Modifico las configuracion con los siguientes datos:{\"csrf_test_name\":\"0af0a9747a37635a433b3d959b36d745\",\"nombreHospital\":\"Hospital Generalasdasd\",\"correoElectronico\":\"asdaaasdsd@asd.comas\",\"RFC\":\"XXXAasdasdasdasd\",\"telefono\":\"5646546321asdasd\",\"languaje\":\"es\"}', 'admin', '2024-11-05 18:40:05', NULL, '2024-11-05 18:40:05'),
(115, 'Se Modifico las configuracion con los siguientes datos:{\"csrf_test_name\":\"0af0a9747a37635a433b3d959b36d745\",\"nombreHospital\":\"Hospital Generalasdasd\",\"correoElectronico\":\"asdaaasdsd@asd.comas\",\"RFC\":\"XXXAasdasdasdasd\",\"telefono\":\"5646546321asdasd\",\"languaje\":\"es\"}', 'admin', '2024-11-05 18:40:07', NULL, '2024-11-05 18:40:07'),
(116, 'Se Modifico las configuracion con los siguientes datos:{\"csrf_test_name\":\"0af0a9747a37635a433b3d959b36d745\",\"nombreHospital\":\"Hospital Generalasdasd\",\"correoElectronico\":\"asdaaasdsd@asd.comas\",\"RFC\":\"XXXAasdasdasdasd\",\"telefono\":\"5646546321asdasd\",\"languaje\":\"en\"}', 'admin', '2024-11-05 18:41:53', NULL, '2024-11-05 18:41:53'),
(117, 'Se Modifico las configuracion con los siguientes datos:{\"csrf_test_name\":\"0af0a9747a37635a433b3d959b36d745\",\"nombreHospital\":\"Hospital Generalasdasd\",\"correoElectronico\":\"asdaaasdsd@asd.comas\",\"RFC\":\"XXXAasdasdasdasd\",\"telefono\":\"5646546321asdasd\",\"languaje\":\"en\"}', 'admin', '2024-11-05 18:41:56', NULL, '2024-11-05 18:41:56'),
(118, 'Se Modifico las configuracion con los siguientes datos:{\"csrf_test_name\":\"0af0a9747a37635a433b3d959b36d745\",\"nombreHospital\":\"Hospital Generalasdasd\",\"correoElectronico\":\"asdaaasdsd@asd.comas\",\"RFC\":\"XXXAasdasdasdasd\",\"telefono\":\"5646546321asdasd\",\"languaje\":\"es\"}', 'admin', '2024-11-05 18:42:53', NULL, '2024-11-05 18:42:53'),
(119, 'Se Modifico las configuracion con los siguientes datos:{\"csrf_test_name\":\"0af0a9747a37635a433b3d959b36d745\",\"nombreHospital\":\"Hospital Generalasdasd\",\"correoElectronico\":\"asdaaasdsd@asd.comas\",\"RFC\":\"XXXAasdasdasdasd\",\"telefono\":\"5646546321asdasd\",\"languaje\":\"en\"}', 'admin', '2024-11-05 18:42:57', NULL, '2024-11-05 18:42:57'),
(120, 'Se Modifico las configuracion con los siguientes datos:{\"csrf_test_name\":\"0af0a9747a37635a433b3d959b36d745\",\"nombreHospital\":\"Hospital Generalasdasd\",\"correoElectronico\":\"asdaaasdsd@asd.comas\",\"RFC\":\"XXXAasdasdasdasd\",\"telefono\":\"5646546321asdasd\",\"languaje\":\"es\"}', 'admin', '2024-11-05 18:43:08', NULL, '2024-11-05 18:43:08'),
(121, 'Se Modifico las configuracion con los siguientes datos:{\"csrf_test_name\":\"0af0a9747a37635a433b3d959b36d745\",\"nombreHospital\":\"Hospital Generalasdasd\",\"correoElectronico\":\"asdaaasdsd@asd.comas\",\"RFC\":\"XXXAasdasdasdasd\",\"telefono\":\"5646546321asdasd\",\"languaje\":\"en\"}', 'admin', '2024-11-05 18:43:24', NULL, '2024-11-05 18:43:24'),
(122, 'Se Modifico las configuracion con los siguientes datos:{\"csrf_test_name\":\"0af0a9747a37635a433b3d959b36d745\",\"nombreHospital\":\"Hospital Generalasdasd\",\"correoElectronico\":\"asdaaasdsd@asd.comas\",\"RFC\":\"XXXAasdasdasdasd\",\"telefono\":\"5646546321asdasd\",\"languaje\":\"es\"}', 'admin', '2024-11-05 18:43:29', NULL, '2024-11-05 18:43:29'),
(123, 'Se Modifico las configuracion con los siguientes datos:{\"csrf_test_name\":\"0af0a9747a37635a433b3d959b36d745\",\"nombreHospital\":\"Hospital Generalasdasd\",\"correoElectronico\":\"asdaaasdsd@asd.comas\",\"RFC\":\"XXXAasdasdasdasd\",\"telefono\":\"5646546321asdasd\",\"languaje\":\"es\"}', 'admin', '2024-11-05 18:43:29', NULL, '2024-11-05 18:43:29'),
(124, 'Se Modifico las configuracion con los siguientes datos:{\"csrf_test_name\":\"0af0a9747a37635a433b3d959b36d745\",\"nombreHospital\":\"Hospital Generalasdasd\",\"correoElectronico\":\"asdaaasdsd@asd.comas\",\"RFC\":\"XXXAasdasdasdasd\",\"telefono\":\"5646546321asdasd\",\"languaje\":\"en\"}', 'admin', '2024-11-05 18:46:21', NULL, '2024-11-05 18:46:21'),
(125, 'Se Modifico las configuracion con los siguientes datos:{\"csrf_test_name\":\"0af0a9747a37635a433b3d959b36d745\",\"nombreHospital\":\"Hospital Generalasdasd\",\"correoElectronico\":\"asdaaasdsd@asd.comas\",\"RFC\":\"XXXAasdasdasdasd\",\"telefono\":\"5646546321asdasd\",\"languaje\":\"es\"}', 'admin', '2024-11-05 18:46:27', NULL, '2024-11-05 18:46:27'),
(126, 'Se Modifico las configuracion con los siguientes datos:{\"csrf_test_name\":\"0af0a9747a37635a433b3d959b36d745\",\"nombreHospital\":\"Hospital Generalasdasd\",\"correoElectronico\":\"asdaaasdsd@asd.comas\",\"RFC\":\"XXXAasdasdasdasd\",\"telefono\":\"5646546321asdasd\",\"languaje\":\"it\"}', 'admin', '2024-11-05 18:46:36', NULL, '2024-11-05 18:46:36'),
(127, 'Se Modifico las configuracion con los siguientes datos:{\"csrf_test_name\":\"0af0a9747a37635a433b3d959b36d745\",\"nombreHospital\":\"Hospital Generalasdasd\",\"correoElectronico\":\"asdaaasdsd@asd.comas\",\"RFC\":\"XXXAasdasdasdasd\",\"telefono\":\"5646546321asdasd\",\"languaje\":\"en\"}', 'admin', '2024-11-05 18:46:40', NULL, '2024-11-05 18:46:40'),
(128, 'Se Modifico las configuracion con los siguientes datos:{\"csrf_test_name\":\"0af0a9747a37635a433b3d959b36d745\",\"nombreHospital\":\"Hospital Generalasdasd\",\"correoElectronico\":\"asdaaasdsd@asd.comas\",\"RFC\":\"XXXAasdasdasdasd\",\"telefono\":\"5646546321asdasd\",\"languaje\":\"es\"}', 'admin', '2024-11-05 18:47:14', NULL, '2024-11-05 18:47:14'),
(129, 'Se Modifico las configuracion con los siguientes datos:{\"csrf_test_name\":\"0af0a9747a37635a433b3d959b36d745\",\"nombreHospital\":\"Hospital Generalasdasd\",\"correoElectronico\":\"asdaaasdsd@asd.comas\",\"RFC\":\"XXXAasdasdasdasd\",\"telefono\":\"5646546321asdasd\",\"languaje\":\"en\"}', 'admin', '2024-11-05 18:47:17', NULL, '2024-11-05 18:47:17'),
(130, 'Se Modifico las configuracion con los siguientes datos:{\"csrf_test_name\":\"0af0a9747a37635a433b3d959b36d745\",\"nombreHospital\":\"Hospital Generalasdasd\",\"correoElectronico\":\"asdaaasdsd@asd.comas\",\"RFC\":\"XXXAasdasdasdasd\",\"telefono\":\"5646546321asdasd\",\"languaje\":\"es\"}', 'admin', '2024-11-05 18:47:24', NULL, '2024-11-05 18:47:24'),
(131, 'Se Modifico las configuracion con los siguientes datos:{\"csrf_test_name\":\"0af0a9747a37635a433b3d959b36d745\",\"nombreHospital\":\"Hospital Generalasdasd\",\"correoElectronico\":\"asdaaasdsd@asd.comas\",\"RFC\":\"XXXAasdasdasdasd\",\"telefono\":\"5646546321asdasd\",\"languaje\":\"it\"}', 'admin', '2024-11-05 19:00:44', NULL, '2024-11-05 19:00:44');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `citas`
--

CREATE TABLE `citas` (
  `id` int(11) NOT NULL,
  `idPaciente` int(11) DEFAULT NULL,
  `fechaHora` datetime NOT NULL,
  `hastaFechaHora` datetime DEFAULT NULL,
  `observaciones` varchar(1024) NOT NULL,
  `created_at` datetime NOT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `estado` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `citas`
--

INSERT INTO `citas` (`id`, `idPaciente`, `fechaHora`, `hastaFechaHora`, `observaciones`, `created_at`, `deleted_at`, `updated_at`, `estado`) VALUES
(1, 6, '2023-01-08 17:30:37', '2023-01-08 17:30:37', 'Cita para checar asd', '2023-01-08 17:31:08', NULL, '2024-11-04 23:26:39', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `configuraciones`
--

CREATE TABLE `configuraciones` (
  `id` int(11) NOT NULL,
  `nombreHospital` varchar(128) NOT NULL,
  `RFC` varchar(16) NOT NULL,
  `telefono` varchar(16) NOT NULL,
  `correoElectronico` varchar(64) NOT NULL,
  `direccion` varchar(256) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `languaje` varchar(64) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `configuraciones`
--

INSERT INTO `configuraciones` (`id`, `nombreHospital`, `RFC`, `telefono`, `correoElectronico`, `direccion`, `created_at`, `updated_at`, `deleted_at`, `languaje`) VALUES
(1, 'Hospital Generalasdasd', 'XXXAasdasdasdasd', '5646546321asdasd', 'asdaaasdsd@asd.comas', 'Conocido', NULL, NULL, NULL, 'it');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `consultas`
--

CREATE TABLE `consultas` (
  `id` bigint(20) NOT NULL,
  `paciente` int(11) DEFAULT NULL,
  `fechaHora` datetime DEFAULT NULL,
  `idDoctor` int(11) DEFAULT NULL,
  `motivoConsulta` varchar(1024) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `uuid` varchar(36) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `consultas`
--

INSERT INTO `consultas` (`id`, `paciente`, `fechaHora`, `idDoctor`, `motivoConsulta`, `created_at`, `updated_at`, `deleted_at`, `uuid`) VALUES
(1, 6, '2023-02-01 22:04:14', 1, 'Prueba', '2023-02-01 22:04:38', '2023-02-01 22:04:38', NULL, 'd00e110f-d0f4-4c33-a829-983967f48785'),
(2, 6, '2023-02-01 23:39:28', 1, 'Prueba Motivos', '2023-02-01 23:40:14', '2024-09-30 17:30:55', '2024-09-30 17:30:55', 'b7bd042a-6fbf-499a-90ce-6fa3f46d951d'),
(3, 6, '2023-02-01 23:41:28', 1, 'motivo consulta', '2023-02-01 23:42:18', '2023-02-01 23:42:18', NULL, 'e1c2b6e0-397e-4063-8c72-783e357650c2'),
(4, 6, '2023-02-01 23:58:04', 1, 'asdasd', '2023-02-01 23:58:35', '2023-02-01 23:58:35', NULL, '6be47712-1aa8-4798-8078-6abc1abac66b'),
(5, 6, '2023-02-01 23:59:01', 1, 'Consulta', '2023-02-01 23:59:25', '2023-02-01 23:59:25', NULL, '1e106916-f07a-45cc-b0e8-57fd2eb18126'),
(6, 7, '2024-11-04 23:51:29', 1, 'asd', '2024-11-04 23:51:59', '2024-11-04 23:51:59', NULL, '44eb50ac-a2e0-4090-a9d7-a36ac37548d3');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `consultas_tratamientos`
--

CREATE TABLE `consultas_tratamientos` (
  `id` bigint(20) NOT NULL,
  `idConsulta` bigint(20) DEFAULT NULL,
  `idTratamiento` int(11) DEFAULT NULL,
  `descripcion` varchar(128) DEFAULT NULL,
  `uso` varchar(256) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `consultas_tratamientos`
--

INSERT INTO `consultas_tratamientos` (`id`, `idConsulta`, `idTratamiento`, `descripcion`, `uso`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 7, 'prueba', '', '2023-02-01 22:04:38', '2023-02-01 22:04:38', NULL),
(2, 1, 1, 'Ibuprofeno 20 gr', '', '2023-02-01 22:04:38', '2023-02-01 22:04:38', NULL),
(3, 1, 6, 'Antibiotico', '', '2023-02-01 22:04:38', '2023-02-01 22:04:38', NULL),
(4, 2, 7, 'prueba', '', '2023-02-01 23:40:14', '2023-02-01 23:40:14', NULL),
(5, 2, 1, 'Ibuprofeno 20 gr', '', '2023-02-01 23:40:14', '2023-02-01 23:40:14', NULL),
(6, 2, 4, 'Descanso', '', '2023-02-01 23:40:15', '2023-02-01 23:40:15', NULL),
(7, 2, 6, 'Antibiotico', '', '2023-02-01 23:40:15', '2023-02-01 23:40:15', NULL),
(8, 3, 7, 'prueba', 'prueba', '2023-02-01 23:42:18', '2023-02-01 23:42:18', NULL),
(9, 3, 1, 'Ibuprofeno 20 gr', '1 cada 8 horas', '2023-02-01 23:42:18', '2023-02-01 23:42:18', NULL),
(10, 3, 4, 'Descanso', 'por las tardes', '2023-02-01 23:42:18', '2023-02-01 23:42:18', NULL),
(11, 3, 6, 'Antibiotico', '1 cada 12 horas', '2023-02-01 23:42:18', '2023-02-01 23:42:18', NULL),
(12, 4, 7, 'prueba', 'uso', '2023-02-01 23:58:35', '2023-02-01 23:58:35', NULL),
(13, 4, 4, 'Descanso', '1 cada 5 hhoras', '2023-02-01 23:58:35', '2023-02-01 23:58:35', NULL),
(14, 4, 6, 'Antibiotico', '1 cada 5 hhoras', '2023-02-01 23:58:35', '2023-02-01 23:58:35', NULL),
(15, 5, 7, 'prueba', 'prueba', '2023-02-01 23:59:25', '2023-02-01 23:59:25', NULL),
(16, 5, 1, 'Ibuprofeno 20 gr', '', '2023-02-01 23:59:25', '2023-02-01 23:59:25', NULL),
(17, 5, 4, 'Descanso', '', '2023-02-01 23:59:25', '2023-02-01 23:59:25', NULL),
(18, 5, 6, 'Antibiotico', '', '2023-02-01 23:59:25', '2023-02-01 23:59:25', NULL),
(19, 6, 6, 'Antibiotico', '123', '2024-11-04 23:51:59', '2024-11-04 23:51:59', NULL),
(20, 6, 4, 'Descanso', 'asd', '2024-11-04 23:51:59', '2024-11-04 23:51:59', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `consulta_diagnosticos`
--

CREATE TABLE `consulta_diagnosticos` (
  `id` bigint(20) NOT NULL,
  `idConsulta` bigint(20) DEFAULT NULL,
  `idDiagnostico` int(11) DEFAULT NULL,
  `descripcion` varchar(128) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `consulta_diagnosticos`
--

INSERT INTO `consulta_diagnosticos` (`id`, `idConsulta`, `idDiagnostico`, `descripcion`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 12, 'prueba', '2023-02-01 22:04:38', '2023-02-01 22:04:38', NULL),
(2, 1, 7, 'Dolor de panza', '2023-02-01 22:04:38', '2023-02-01 22:04:38', NULL),
(3, 1, 6, 'Dolor de cabeza', '2023-02-01 22:04:38', '2023-02-01 22:04:38', NULL),
(4, 1, 8, 'Dificultad para respirar', '2023-02-01 22:04:38', '2023-02-01 22:04:38', NULL),
(5, 2, 12, 'prueba', '2023-02-01 23:40:14', '2023-02-01 23:40:14', NULL),
(6, 2, 7, 'Dolor de panza', '2023-02-01 23:40:14', '2023-02-01 23:40:14', NULL),
(7, 2, 6, 'Dolor de cabeza', '2023-02-01 23:40:14', '2023-02-01 23:40:14', NULL),
(8, 2, 8, 'Dificultad para respirar', '2023-02-01 23:40:14', '2023-02-01 23:40:14', NULL),
(9, 3, 12, 'prueba', '2023-02-01 23:42:18', '2023-02-01 23:42:18', NULL),
(10, 3, 7, 'Dolor de panza', '2023-02-01 23:42:18', '2023-02-01 23:42:18', NULL),
(11, 3, 6, 'Dolor de cabeza', '2023-02-01 23:42:18', '2023-02-01 23:42:18', NULL),
(12, 3, 8, 'Dificultad para respirar', '2023-02-01 23:42:18', '2023-02-01 23:42:18', NULL),
(13, 4, 12, 'prueba', '2023-02-01 23:58:35', '2023-02-01 23:58:35', NULL),
(14, 4, 7, 'Dolor de panza', '2023-02-01 23:58:35', '2023-02-01 23:58:35', NULL),
(15, 4, 6, 'Dolor de cabeza', '2023-02-01 23:58:35', '2023-02-01 23:58:35', NULL),
(16, 4, 8, 'Dificultad para respirar', '2023-02-01 23:58:35', '2023-02-01 23:58:35', NULL),
(17, 5, 12, 'prueba', '2023-02-01 23:59:25', '2023-02-01 23:59:25', NULL),
(18, 5, 7, 'Dolor de panza', '2023-02-01 23:59:25', '2023-02-01 23:59:25', NULL),
(19, 5, 6, 'Dolor de cabeza', '2023-02-01 23:59:25', '2023-02-01 23:59:25', NULL),
(20, 5, 8, 'Dificultad para respirar', '2023-02-01 23:59:25', '2023-02-01 23:59:25', NULL),
(21, 6, 6, 'Dolor de cabeza', '2024-11-04 23:51:59', '2024-11-04 23:51:59', NULL),
(22, 6, 8, 'Dificultad para respirar', '2024-11-04 23:51:59', '2024-11-04 23:51:59', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `enfermedades`
--

CREATE TABLE `enfermedades` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(256) NOT NULL,
  `created_at` datetime NOT NULL,
  `deleted_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `enfermedades`
--

INSERT INTO `enfermedades` (`id`, `descripcion`, `created_at`, `deleted_at`, `updated_at`) VALUES
(1, 'Fiebre', '2023-01-07 22:07:30', '2023-01-07 22:10:30', '2023-01-07 22:10:30'),
(2, 'Dierrea', '2023-01-07 22:08:27', '2023-01-07 22:09:13', '2023-01-07 22:09:13'),
(3, 'asdasd', '2023-01-07 22:11:27', '2023-01-07 22:11:32', '2023-01-07 22:11:32'),
(4, 'asd', '2023-01-07 22:13:23', '2023-01-07 22:13:26', '2023-01-07 22:13:26'),
(5, 'asdaasda', '2023-01-26 15:36:35', '2023-01-26 15:36:41', '2023-01-26 15:36:41'),
(6, 'Dolor de cabeza', '2023-01-30 21:23:50', '0000-00-00 00:00:00', '2023-01-30 21:23:50'),
(7, 'Dolor de panza', '2023-01-30 21:23:59', '0000-00-00 00:00:00', '2023-01-30 21:23:59'),
(8, 'Dificultad para respirar', '2023-01-30 21:24:11', '0000-00-00 00:00:00', '2023-01-30 21:24:11'),
(9, 'prueba10', '2023-01-31 16:03:48', '2023-01-31 16:09:20', '2023-01-31 16:09:20'),
(10, 'asda', '2023-01-31 16:04:03', '2023-01-31 16:09:11', '2023-01-31 16:09:11'),
(11, 'prueba', '2023-01-31 16:08:45', '2023-01-31 16:09:09', '2023-01-31 16:09:09'),
(12, 'prueba', '2023-01-31 16:13:30', '0000-00-00 00:00:00', '2023-01-31 16:13:30');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `groups_menu`
--

CREATE TABLE `groups_menu` (
  `id` int(11) UNSIGNED NOT NULL,
  `group_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `menu_id` int(11) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `groups_menu`
--

INSERT INTO `groups_menu` (`id`, `group_id`, `menu_id`) VALUES
(6, 1, 6),
(11, 1, 1),
(12, 2, 1),
(13, 1, 3),
(14, 2, 3),
(15, 1, 4),
(16, 1, 5),
(17, 1, 7),
(21, 1, 2),
(22, 2, 2),
(24, 1, 9),
(25, 2, 9),
(26, 1, 10),
(27, 2, 10),
(28, 1, 11),
(29, 2, 11),
(32, 1, 13),
(33, 2, 13),
(42, 1, 18),
(43, 2, 18),
(44, 1, 8),
(45, 1, 12),
(46, 2, 12),
(47, 1, 14),
(48, 2, 14),
(51, 1, 16),
(52, 2, 16),
(53, 1, 1),
(54, 1, 2),
(55, 1, 3),
(56, 1, 4),
(57, 1, 5),
(58, 1, 6),
(59, 1, 7),
(60, 2, 1),
(61, 2, 2),
(62, 2, 3),
(67, 1, 17),
(68, 2, 17);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `medicamentos`
--

CREATE TABLE `medicamentos` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(256) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `medicamentos`
--

INSERT INTO `medicamentos` (`id`, `descripcion`, `created_at`, `deleted_at`, `updated_at`) VALUES
(1, 'Ibuprofeno 20 gr', '2023-01-06 22:56:44', NULL, '2023-01-06 22:56:59'),
(2, 'Loradatamina', '2023-01-06 22:56:51', '2023-01-06 22:57:24', '2023-01-06 22:57:24'),
(3, 'asdasdaasda', '2023-01-26 15:36:49', '2023-01-26 15:37:13', '2023-01-26 15:37:13'),
(4, 'Descanso', '2023-01-30 23:14:10', NULL, '2023-01-30 23:14:10'),
(5, 'asd', '2023-01-31 16:34:48', '2023-01-31 16:34:52', '2023-01-31 16:34:52'),
(6, 'Antibiotico', '2023-01-31 16:36:23', NULL, '2023-01-31 16:36:23'),
(7, 'prueba', '2023-01-31 16:37:09', NULL, '2023-01-31 16:37:09');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `menu`
--

CREATE TABLE `menu` (
  `id` int(11) UNSIGNED NOT NULL,
  `parent_id` int(11) UNSIGNED DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 1,
  `title` varchar(255) DEFAULT NULL,
  `icon` varchar(55) DEFAULT NULL,
  `route` varchar(255) DEFAULT NULL,
  `sequence` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `menu`
--

INSERT INTO `menu` (`id`, `parent_id`, `active`, `title`, `icon`, `route`, `sequence`, `created_at`, `updated_at`) VALUES
(1, 0, 1, 'Cruscotto', 'fas fa-tachometer-alt', 'admin', 1, '2022-12-20 22:39:17', '2022-12-20 23:09:10'),
(2, 0, 1, 'Impostazioni', 'fas fa-share-alt', '#', 11, '2022-12-20 22:39:17', '2022-12-20 23:09:10'),
(3, 2, 1, 'Profilo Utente', 'fas fa-user-edit', 'admin/user/profile', 12, '2022-12-20 22:39:17', '2022-12-20 23:09:10'),
(4, 2, 1, 'Utenti', 'fas fa-users', 'admin/user/manage', 13, '2022-12-20 22:39:17', '2022-12-20 23:09:10'),
(5, 2, 1, 'Permessi', 'fas fa-user-lock', 'admin/permission', 14, '2022-12-20 22:39:17', '2022-12-20 23:09:10'),
(6, 2, 1, 'Ruoli', 'fas fa-users-cog', 'admin/role', 15, '2022-12-20 22:39:17', '2022-12-20 23:09:10'),
(7, 2, 1, 'Menu', 'fas fa-stream', 'admin/menu', 16, '2022-12-20 22:39:17', '2022-12-20 23:09:10'),
(8, 2, 1, 'Dati Ospedalieri', 'fas fa-h-square', 'admin/settings', 17, '2022-12-20 22:48:13', '2022-12-20 23:10:56'),
(9, 0, 1, 'Cataloghi', 'fas fa-address-book', 'admin/catalogos', 7, '2022-12-20 22:53:34', '2022-12-20 23:09:10'),
(10, 9, 1, 'Patiens', 'fas fa-male', 'admin/pacientes', 8, '2022-12-20 22:54:33', '2022-12-20 23:09:10'),
(11, 9, 1, 'Farmaci', 'fas fa-briefcase-medical', 'admin/medicamentos', 9, '2022-12-20 22:55:28', '2022-12-20 23:09:10'),
(12, 9, 1, 'Diagnosi', 'fas fa-file-medical-alt', 'admin/enfermedades', 10, '2022-12-20 22:56:37', '2023-01-07 22:06:07'),
(13, 0, 1, 'Interventi', 'fas fa-hiking', '#', 2, '2022-12-20 23:04:42', '2022-12-20 23:09:10'),
(14, 13, 1, 'Appuntamenti Medici', 'fas fa-calendar-alt', 'admin/citas', 3, '2022-12-20 23:05:35', '2023-01-08 17:28:58'),
(16, 13, 1, 'Visita Medica', 'fas fa-user-md', 'admin/consultas/generarConsulta', 5, '2022-12-20 23:07:22', '2023-01-30 21:11:15'),
(17, 13, 1, 'Elenco Visite Mediche', 'fas fa-list', 'admin/consultas/listaConsultas', 6, '2022-12-20 23:08:01', '2023-02-02 22:07:21'),
(18, 2, 1, 'Registro', 'fas fa-align-justify', 'admin/bitacora', 18, '2022-12-20 23:09:46', '2022-12-20 23:09:46');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(1, '2017-11-20-223112', 'App\\Database\\Migrations\\CreateAuthTables', 'default', 'App', 1671597557, 1),
(2, '2020-02-03-081118', 'App\\Database\\Migrations\\CreateMenuTable', 'default', 'App', 1671597557, 1),
(3, '2023-02-02-193406', 'App\\Database\\Migrations\\Userfields', 'default', 'App', 1675395958, 2),
(4, '2024-11-04163919', 'App\\Database\\Migrations\\AddColumnForLanguaje', 'default', 'App', 1730764768, 3),
(5, '2024-11-04163919', 'App\\Database\\Migrations\\Bitacora', 'default', 'App', 1730764768, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pacientes`
--

CREATE TABLE `pacientes` (
  `id` int(11) NOT NULL,
  `nombres` varchar(256) DEFAULT NULL,
  `apellidos` varchar(256) DEFAULT NULL,
  `dni` varchar(32) DEFAULT NULL,
  `telefono` varchar(16) DEFAULT NULL,
  `correoElectronico` varchar(64) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `pacientes`
--

INSERT INTO `pacientes` (`id`, `nombres`, `apellidos`, `dni`, `telefono`, `correoElectronico`, `created_at`, `deleted_at`, `updated_at`) VALUES
(1, 'Julio Cesar', 'Leyva Rodriguez', 'asd', '123123123', 'julio@asd.com', '2023-01-04 22:55:45', '2023-01-04 22:56:10', '2023-01-04 22:56:10'),
(2, 'asdasda', 'dssasd', 'asdasd', 'asdasd', 'asdasd@asd.com', '2023-01-04 22:57:48', '2023-01-04 22:57:51', '2023-01-04 22:57:51'),
(3, 'asdasd', 'asdasd', 'asdasd', '123123123', 'asd@asd.com', '2023-01-04 22:58:54', '2023-01-04 22:58:56', '2023-01-04 22:58:56'),
(4, 'asdasd', 'asdasd', '123123', '123123', 'asdasd@asd.com', '2023-01-04 23:00:16', '2023-01-04 23:00:20', '2023-01-04 23:00:20'),
(5, 'Publico en generaL', 'Publico en generaL', 'ASDASD', '1231231', 'ASDASD@ASD.COM', '2023-01-07 22:16:00', '2023-01-07 22:16:08', '2023-01-07 22:16:08'),
(6, 'Julio Cesar ', 'Leyva Rodriguez', '123123', '123123123', 'adasd@asd.com.mx', '2023-01-08 17:29:50', NULL, '2023-01-08 17:29:50'),
(7, 'asdasd', 'asdasd', 'asdasd', '123123', '123123@asd.com', '2023-01-08 17:30:21', NULL, '2023-01-08 17:30:21'),
(8, 'adadsas', 'asdasd', '123123', 'asdasd', 'adasdasd@asd.com', '2023-01-08 17:30:33', NULL, '2023-01-08 17:30:33'),
(9, 'asdasdaasda', 'asdasd', '123', '123', 'asd@asd.com', '2023-01-26 15:36:15', '2023-01-26 15:36:27', '2023-01-26 15:36:27'),
(10, 'Nombre Paciente', 'Apellidos', 'INE', '6688612348', 'asdasd@asd.com', '2023-01-31 17:43:42', NULL, '2023-01-31 17:43:42'),
(11, 'Nombre', 'Prueba', 'Ine prubea', 'Telefono', '123@asd.com', '2024-11-04 17:02:09', NULL, '2024-11-04 17:02:09');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(30) DEFAULT NULL,
  `password_hash` varchar(255) NOT NULL,
  `reset_hash` varchar(255) DEFAULT NULL,
  `reset_at` datetime DEFAULT NULL,
  `reset_expires` datetime DEFAULT NULL,
  `activate_hash` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `status_message` varchar(255) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 0,
  `force_pass_reset` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `firstname` varchar(256) DEFAULT NULL,
  `lastname` varchar(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `email`, `username`, `password_hash`, `reset_hash`, `reset_at`, `reset_expires`, `activate_hash`, `status`, `status_message`, `active`, `force_pass_reset`, `created_at`, `updated_at`, `deleted_at`, `firstname`, `lastname`) VALUES
(1, 'admin@admin.com', 'admin', '$2y$10$7nxoSYlH8gJJSttvVJP1CuHMWh3.Y5BJD9SncurU2DWnXb0IXfXaK', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2022-12-20 22:39:17', '2023-02-02 21:48:07', NULL, 'Julio Cesar', 'Leyva Rodriguez'),
(2, 'user@user.com', 'user', '$2y$10$fHJMPvev8Z3m9BP.hmUfceK.Ea3Imhgx/oPvZITSdEocYqdv91jKy', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2022-12-20 22:39:17', '2022-12-21 23:39:21', NULL, NULL, NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `auth_activation_attempts`
--
ALTER TABLE `auth_activation_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `auth_groups`
--
ALTER TABLE `auth_groups`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `auth_groups_permissions`
--
ALTER TABLE `auth_groups_permissions`
  ADD KEY `auth_groups_permissions_permission_id_foreign` (`permission_id`),
  ADD KEY `group_id_permission_id` (`group_id`,`permission_id`);

--
-- Indices de la tabla `auth_groups_users`
--
ALTER TABLE `auth_groups_users`
  ADD KEY `auth_groups_users_user_id_foreign` (`user_id`),
  ADD KEY `group_id_user_id` (`group_id`,`user_id`);

--
-- Indices de la tabla `auth_logins`
--
ALTER TABLE `auth_logins`
  ADD PRIMARY KEY (`id`),
  ADD KEY `email` (`email`),
  ADD KEY `user_id` (`user_id`);

--
-- Indices de la tabla `auth_permissions`
--
ALTER TABLE `auth_permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `auth_reset_attempts`
--
ALTER TABLE `auth_reset_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `auth_tokens`
--
ALTER TABLE `auth_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `auth_tokens_user_id_foreign` (`user_id`),
  ADD KEY `selector` (`selector`);

--
-- Indices de la tabla `auth_users_permissions`
--
ALTER TABLE `auth_users_permissions`
  ADD KEY `auth_users_permissions_permission_id_foreign` (`permission_id`),
  ADD KEY `user_id_permission_id` (`user_id`,`permission_id`);

--
-- Indices de la tabla `bitacora`
--
ALTER TABLE `bitacora`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `citas`
--
ALTER TABLE `citas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `configuraciones`
--
ALTER TABLE `configuraciones`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `consultas`
--
ALTER TABLE `consultas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `consultas_tratamientos`
--
ALTER TABLE `consultas_tratamientos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `consulta_diagnosticos`
--
ALTER TABLE `consulta_diagnosticos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `enfermedades`
--
ALTER TABLE `enfermedades`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `groups_menu`
--
ALTER TABLE `groups_menu`
  ADD KEY `groups_menu_menu_id_foreign` (`menu_id`),
  ADD KEY `groups_menu_group_id_foreign` (`group_id`),
  ADD KEY `id_group_id_menu_id` (`id`,`group_id`,`menu_id`);

--
-- Indices de la tabla `medicamentos`
--
ALTER TABLE `medicamentos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `pacientes`
--
ALTER TABLE `pacientes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `auth_activation_attempts`
--
ALTER TABLE `auth_activation_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `auth_groups`
--
ALTER TABLE `auth_groups`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `auth_logins`
--
ALTER TABLE `auth_logins`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT de la tabla `auth_permissions`
--
ALTER TABLE `auth_permissions`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `auth_reset_attempts`
--
ALTER TABLE `auth_reset_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `auth_tokens`
--
ALTER TABLE `auth_tokens`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `bitacora`
--
ALTER TABLE `bitacora`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=132;

--
-- AUTO_INCREMENT de la tabla `citas`
--
ALTER TABLE `citas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `configuraciones`
--
ALTER TABLE `configuraciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `consultas`
--
ALTER TABLE `consultas`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `consultas_tratamientos`
--
ALTER TABLE `consultas_tratamientos`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `consulta_diagnosticos`
--
ALTER TABLE `consulta_diagnosticos`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de la tabla `enfermedades`
--
ALTER TABLE `enfermedades`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `groups_menu`
--
ALTER TABLE `groups_menu`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT de la tabla `medicamentos`
--
ALTER TABLE `medicamentos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `pacientes`
--
ALTER TABLE `pacientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `auth_groups_permissions`
--
ALTER TABLE `auth_groups_permissions`
  ADD CONSTRAINT `auth_groups_permissions_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `auth_groups` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `auth_groups_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `auth_permissions` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `auth_groups_users`
--
ALTER TABLE `auth_groups_users`
  ADD CONSTRAINT `auth_groups_users_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `auth_groups` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `auth_groups_users_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `auth_tokens`
--
ALTER TABLE `auth_tokens`
  ADD CONSTRAINT `auth_tokens_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `auth_users_permissions`
--
ALTER TABLE `auth_users_permissions`
  ADD CONSTRAINT `auth_users_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `auth_permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `auth_users_permissions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `groups_menu`
--
ALTER TABLE `groups_menu`
  ADD CONSTRAINT `groups_menu_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `auth_groups` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `groups_menu_menu_id_foreign` FOREIGN KEY (`menu_id`) REFERENCES `menu` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
