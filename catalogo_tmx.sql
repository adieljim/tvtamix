-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 12-10-2021 a las 05:44:46
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `catalogo_tmx`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `archivos`
--

CREATE TABLE `archivos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `clave` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `titulo_original` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `genero` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `duracion` time NOT NULL,
  `tipo_archivo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `formato_original` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `codec_ac` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `codec_bc` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `huella_digital_video_ac` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `huella_digital_video_bc` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fecha_digitalizacion` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ficha_tecnica`
--

CREATE TABLE `ficha_tecnica` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `realizacion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `camarografo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `asistente_camara` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sonidista` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `investigacion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `edicion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `posproduccion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `produccion_ejecutiva` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lugar_produccion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `anio_produccion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `entidad_federativa` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sinopsis` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `formato_archivo`
--

CREATE TABLE `formato_archivo` (
  `tipo_archivo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `codec_bc` tinyint(1) NOT NULL,
  `codec_ac` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `formato_archivo`
--

INSERT INTO `formato_archivo` (`tipo_archivo`, `nombre`, `codec_bc`, `codec_ac`, `created_at`, `updated_at`) VALUES
('AUDIOVISUAL', 'BETA', 0, 0, NULL, NULL),
('AUDIOVISUAL', 'VHS', 0, 0, NULL, NULL),
('AUDIOVISUAL', 'SVHS', 0, 0, NULL, NULL),
('AUDIOVISUAL', '8MM', 0, 0, NULL, NULL),
('AUDIOVISUAL', 'Hi8', 0, 0, NULL, NULL),
('AUDIOVISUAL', 'Mini DV', 0, 0, NULL, NULL),
('AUDIOVISUAL', 'BETACAM', 0, 0, NULL, NULL),
('AUDIOVISUAL', 'BETACAM', 0, 0, NULL, NULL),
('AUDIOVISUAL', 'DVD', 0, 0, NULL, NULL),
('AUDIOVISUAL', 'DIGITAL', 0, 0, NULL, NULL),
('AUDIOVISUAL', 'MOV', 0, 1, NULL, NULL),
('AUDIOVISUAL', 'MP4/MKV', 1, 0, NULL, NULL),
('AUDIO', 'AUDIOCASSETTE', 0, 0, NULL, NULL),
('AUDIO', 'CD', 0, 0, NULL, NULL),
('AUDIO', 'DVD', 0, 0, NULL, NULL),
('AUDIO', 'DIGITAL', 0, 0, NULL, NULL),
('AUDIO', 'WAV/AIFF', 0, 1, NULL, NULL),
('AUDIO', 'MP3', 1, 0, NULL, NULL),
('IMAGEN', 'NEGATIVO', 0, 0, NULL, NULL),
('IMAGEN', 'POSITIVO', 0, 0, NULL, NULL),
('IMAGEN', 'FOTOGRAFIA COLOR 2X', 0, 0, NULL, NULL),
('IMAGEN', 'FOTOGRAFIA B/N 2X', 0, 0, NULL, NULL),
('IMAGEN', 'FOTOGRAFIA COLOR 4X', 0, 0, NULL, NULL),
('IMAGEN', 'FOTOGRAFIA B/N 4X', 0, 0, NULL, NULL),
('IMAGEN', 'FOTOGRAFIA COLOR 6X', 0, 0, NULL, NULL),
('IMAGEN', 'FOTOGRAFIA B/N 6X', 0, 0, NULL, NULL),
('IMAGEN', 'DIGITAL', 0, 0, NULL, NULL),
('IMAGEN', 'PNG/JPEG', 0, 1, NULL, NULL),
('IMAGEN', 'JPG', 1, 0, NULL, NULL),
('PDF', 'TEXTO', 0, 0, NULL, NULL),
('PDF', 'IMPRESO  REVISTA', 0, 0, NULL, NULL),
('PDF', 'IMPRESO  LIBRO', 0, 0, NULL, NULL),
('PDF', 'CARTEL', 0, 0, NULL, NULL),
('PDF', 'FOLLETO', 0, 0, NULL, NULL),
('PDF', 'TRIPTICO', 0, 0, NULL, NULL),
('PDF', 'FLYER', 0, 0, NULL, NULL),
('PDF', 'PORTADA', 0, 0, NULL, NULL),
('PDF', 'DIGITAL', 0, 0, NULL, NULL),
('PDF', 'PDF 12', 0, 1, NULL, NULL),
('PDF', 'PDF 6', 1, 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fotogramas`
--

CREATE TABLE `fotogramas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `numFoto` bigint(20) NOT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `info_general`
--

CREATE TABLE `info_general` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `lengua` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `indice_tematico` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion_general` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `personajes_principales` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `categoria_consulta` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(57, '2014_10_12_000000_create_users_table', 1),
(58, '2014_10_12_100000_create_password_resets_table', 1),
(59, '2019_08_19_000000_create_failed_jobs_table', 1),
(60, '2021_08_01_053149_create_tipo_archivo_table', 1),
(61, '2021_08_01_053843_create_formato_archivo_table', 1),
(62, '2021_08_01_075001_create_archivos_table', 1),
(63, '2021_08_01_075006_create_ficha_tecnica_table', 1),
(64, '2021_08_01_075030_create_info_general_table', 1),
(65, '2021_09_14_231217_create_visitantes_table', 1),
(66, '2021_10_09_161617_create_fotogramas_table', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_archivo`
--

CREATE TABLE `tipo_archivo` (
  `tipo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `tipo_archivo`
--

INSERT INTO `tipo_archivo` (`tipo`, `created_at`, `updated_at`) VALUES
('AUDIOVISUAL', NULL, NULL),
('AUDIO', NULL, NULL),
('IMAGEN', NULL, NULL),
('PDF', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipo_usuario` tinyint(1) NOT NULL DEFAULT 1,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `tipo_usuario`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@admin.com', NULL, '$2y$10$H1QuHIu2InoMNSb.x8PiPuBMeJfqP8nqkPHFN5AlBwcJu6RIfmDjK', 0, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `visitantes`
--

CREATE TABLE `visitantes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `apellidos` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `archivos`
--
ALTER TABLE `archivos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indices de la tabla `ficha_tecnica`
--
ALTER TABLE `ficha_tecnica`
  ADD KEY `ficha_tecnica_id_foreign` (`id`);

--
-- Indices de la tabla `fotogramas`
--
ALTER TABLE `fotogramas`
  ADD KEY `fotogramas_id_foreign` (`id`);

--
-- Indices de la tabla `info_general`
--
ALTER TABLE `info_general`
  ADD KEY `info_general_id_foreign` (`id`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indices de la tabla `visitantes`
--
ALTER TABLE `visitantes`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `archivos`
--
ALTER TABLE `archivos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `visitantes`
--
ALTER TABLE `visitantes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `ficha_tecnica`
--
ALTER TABLE `ficha_tecnica`
  ADD CONSTRAINT `ficha_tecnica_id_foreign` FOREIGN KEY (`id`) REFERENCES `archivos` (`id`);

--
-- Filtros para la tabla `fotogramas`
--
ALTER TABLE `fotogramas`
  ADD CONSTRAINT `fotogramas_id_foreign` FOREIGN KEY (`id`) REFERENCES `archivos` (`id`);

--
-- Filtros para la tabla `info_general`
--
ALTER TABLE `info_general`
  ADD CONSTRAINT `info_general_id_foreign` FOREIGN KEY (`id`) REFERENCES `archivos` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
