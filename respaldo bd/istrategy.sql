-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 04-09-2024 a las 23:40:56
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
-- Base de datos: `istrategy`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` bigint(20) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(70) NOT NULL,
  `latest_access_date` datetime NOT NULL,
  `email` varchar(30) NOT NULL,
  `cellphone` varchar(12) NOT NULL,
  `join_date` datetime NOT NULL,
  `gender` varchar(5) NOT NULL,
  `role` varchar(15) NOT NULL,
  `salary` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `latest_access_date`, `email`, `cellphone`, `join_date`, `gender`, `role`, `salary`) VALUES
(1, 'aayala', '$2y$10$A0tQSXinLFAS4wnd8WTG5.BMRu1Rg9QMhSoicn4HTXknSwlrsCa72', '2024-09-03 02:34:42', '', '', '0000-00-00 00:00:00', '', '', 0),
(2, 'adela', '$2y$10$fqohijkbuNSLvjaWTaIPLOV6X5jx7GrUM6GJwDPcKizUxdOZCTJLy', '2024-09-03 17:27:43', 'adela@gmail.com', '4432112343', '2024-09-03 17:27:43', 'male', 'Developer', 20000),
(5, 'Goku', '$2y$10$iIbi2kZoUklV5T50124GbOsnqApNIzzlyA3ARqFF9GhOTZRqjbwdK', '2024-09-03 17:58:42', 'goku@gmail.com', '434565237', '2024-09-03 17:58:42', 'f', 'HR', 20000),
(6, 'Anibal', '$2y$10$fB.jdqBkAVbuWbLBJNhf8OhaKGyPA8g3ZutWjsIvBuIEQE5AXH.x6', '2024-09-03 18:07:09', 'anibal@gmail.com', '434210987', '2024-09-03 18:07:09', 'f', 'Contador', 23000),
(8, 'alan', '$2y$10$wvuC/Cl8Qw0OGxY9GGQlXe02YCXztxawL9vrR/LGVqyinUmYz.PPK', '2024-09-04 06:47:11', 'alan@gmail.com', '4433123467', '2024-09-04 06:47:11', 'm', 'Gerente', 30000),
(9, 'javi', '$2y$10$UiXjj5/0NlUP3Teak1Ly4u2O9NkEVYk3hMG6xLTxakKwjNTAdbxVS', '2024-09-04 09:12:22', 'javier@gmail.com', '876652553', '2024-09-04 09:12:22', 'm', 'Instructor', 17000),
(10, 'robe', '$2y$10$kjZ82JKT25N8VjszUmatNO3bebTCogWJgNioQwDhemb/6SgTEsg/S', '2024-09-04 09:17:19', 'robe@gmail.com', '655786754', '2024-09-04 09:17:19', 'm', 'Vigilante', 12000),
(11, 'flor', '$2y$10$Ajib4ljZqfUzHZBxTSOAlO1ZNAMpcuLuPWERs3kd0BTpfpcxro9fC', '2024-09-04 09:19:15', 'flor@gmail.com', '766786542', '2024-09-04 09:19:15', 'm', 'Gerente', 22000),
(12, 'ale', '$2y$10$rlazZQnbTl1S7w4Ce8SmDuCVeA5XurbwnntysbMx8tTWywjkU0Tsa', '2024-09-04 09:20:44', 'ale@gmail.com', '878985825', '2024-09-04 09:20:44', 'm', 'Intendente', 9500),
(13, 'vero', '$2y$10$VTsGahNaWdDhfDkk1Q/6HegDbTzLZEvZ/12PBdqriClddsfeMb2cW', '2024-09-04 09:32:09', 'vero@gmail.com', '554672839', '2024-09-04 09:32:09', 'm', 'Seguridad', 12000),
(14, 'anahi', '$2y$10$IE8d8F1kIYOx9V2C20GOLuof7sqIU4QqQwrGb2qNAKWFeXFrv9LYW', '2024-09-04 10:29:27', 'anahi@gmail.com', '876652553', '2024-09-04 10:29:27', 'm', 'Secretaria', 12000),
(15, 'carla', '$2y$10$rlJF8AFvxiyfVKasXvzAbe0jeawpSt7eKbzzLuU/AogZRcOvJJRT2', '2024-09-04 10:30:36', 'carla@gmail.com', '434223123', '2024-09-04 10:30:36', 'm', 'Secretaria', 12000),
(16, 'fred', '$2y$10$ruhy13YBCwA5QezNz4SkZ.Iq.YK7We1ZPHgjYIeBv5YmVpjgXr1ey', '2024-09-04 10:58:53', 'fred@gmail.com', '434221120', '2024-09-04 10:58:53', 'm', 'Administrador', 13000),
(17, 'norma', '$2y$10$mpg.1dA0OzlgITwUALuz1uqjByW7Y.IcbTIRgFUG3HorYiURJGUUi', '2024-09-04 11:00:33', 'norma@gmail.com', '765678937', '2024-09-04 11:00:33', 'm', 'Conserje', 80000),
(18, 'miri', '$2y$10$GWpNjcbVeCouacv1a6xHhOJRavZvFxgCwVEO1CzUrnF1QgNb5Dib6', '2024-09-04 11:05:59', 'miri@gmail.com', '768980087', '2024-09-04 11:05:59', 'm', 'Gerente', 20000);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
