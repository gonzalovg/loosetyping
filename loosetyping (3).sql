git -- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 20-05-2021 a las 07:05:51
-- Versión del servidor: 10.4.18-MariaDB
-- Versión de PHP: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `loosetyping`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id` int(11) NOT NULL,
  `nom_cat` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id`, `nom_cat`) VALUES
(7, 'Cultura general'),
(8, 'Tecnología'),
(9, 'Geografía'),
(10, 'Deporte'),
(11, 'Ciencia'),
(12, 'Entretenimiento'),
(13, 'Literatura');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentarios`
--

CREATE TABLE `comentarios` (
  `id` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `txt_com` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estadisticas`
--

CREATE TABLE `estadisticas` (
  `id` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `wpm` float DEFAULT NULL,
  `max_wpm` float DEFAULT NULL,
  `txt_fav` int(11) DEFAULT NULL,
  `tot_res` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `resoluciones`
--

CREATE TABLE `resoluciones` (
  `id` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `id_text` int(11) DEFAULT NULL,
  `wpm_res` int(11) DEFAULT NULL,
  `tim_res` float DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `resoluciones`
--

INSERT INTO `resoluciones` (`id`, `id_user`, `id_text`, `wpm_res`, `tim_res`, `created_at`) VALUES
(14, 30, 31, 60, 33.38, '2021-05-12 13:57:52'),
(15, 25, 32, 62, 10.372, '2021-05-12 14:58:22'),
(16, 25, 32, 78, 8.279, '2021-05-12 15:26:50'),
(17, 30, 32, 64, 10.146, '2021-05-13 13:57:33'),
(18, 30, 32, 73, 8.839, '2021-05-13 13:57:45'),
(19, 30, 30, 57, 52.422, '2021-05-13 13:58:41'),
(20, 30, 37, 52, 117.551, '2021-05-13 14:00:54'),
(21, 30, 31, 62, 32.404, '2021-05-13 14:04:14'),
(22, 25, 30, 60, 49.248, '2021-05-14 06:37:53'),
(23, 25, 31, 68, 29.64, '2021-05-14 06:39:09'),
(24, 25, 32, 59, 11.05, '2021-05-14 07:23:03'),
(25, 25, 32, 69, 9.391, '2021-05-14 07:23:25'),
(26, 25, 32, 71, 9.128, '2021-05-14 07:23:38'),
(27, 25, 31, 67, 30.191, '2021-05-14 07:24:23'),
(28, 25, 31, 66, 30.6, '2021-05-14 07:25:02'),
(29, 25, 32, 75, 8.675, '2021-05-14 07:25:19'),
(31, 25, 30, 54, 55.084, '2021-05-14 07:48:56'),
(32, 25, 40, 63, 7.852, '2021-05-14 13:15:25'),
(33, 25, 32, 66, 9.889, '2021-05-15 08:20:46'),
(34, 25, 40, 65, 7.544, '2021-05-15 08:22:33'),
(35, 25, 31, 77, 26.348, '2021-05-15 08:23:07'),
(36, 25, 32, 66, 9.857, '2021-05-15 08:24:30'),
(37, 25, 32, 70, 9.253, '2021-05-15 08:25:12'),
(38, 25, 32, 61, 10.561, '2021-05-15 08:26:17'),
(39, 25, 31, 76, 26.365, '2021-05-15 08:26:54'),
(40, 25, 40, 59, 8.305, '2021-05-15 08:27:50'),
(41, 25, 32, 80, 8.07, '2021-05-15 08:29:09'),
(42, 25, 32, 72, 8.96, '2021-05-15 08:40:20'),
(43, 25, 40, 59, 8.364, '2021-05-15 08:55:06'),
(44, 25, 31, 70, 28.647, '2021-05-15 08:56:39'),
(45, 25, 40, 59, 8.331, '2021-05-15 09:04:49'),
(46, 25, 32, 73, 8.86, '2021-05-15 09:05:18'),
(47, 25, 30, 62, 47.783, '2021-05-15 09:06:11'),
(48, 25, 40, 58, 8.508, '2021-05-15 09:07:55'),
(49, 25, 40, 60, 8.197, '2021-05-15 09:08:57'),
(50, 25, 32, 77, 8.379, '2021-05-15 09:18:50'),
(51, 25, 31, 78, 25.74, '2021-05-15 09:20:15'),
(52, 25, 32, 71, 9.136, '2021-05-15 09:22:27'),
(53, 25, 40, 67, 7.339, '2021-05-15 09:24:12'),
(54, 25, 40, 59, 8.367, '2021-05-15 09:26:05'),
(55, 25, 40, 75, 6.537, '2021-05-15 09:28:10'),
(56, 25, 32, 78, 8.36, '2021-05-15 09:29:57'),
(57, 25, 32, 78, 8.256, '2021-05-15 09:31:58'),
(58, 25, 32, 71, 9.141, '2021-05-15 09:36:13'),
(59, 25, 32, 73, 8.867, '2021-05-15 09:51:08'),
(60, 25, 32, 77, 8.387, '2021-05-15 09:53:44'),
(61, 25, 32, 91, 7.151, '2021-05-15 09:54:07'),
(62, 25, 31, 70, 28.617, '2021-05-15 09:59:22'),
(63, 25, 40, 72, 6.789, '2021-05-15 10:00:57'),
(64, 25, 40, 59, 8.276, '2021-05-15 10:02:20'),
(65, 25, 32, 83, 7.845, '2021-05-15 10:03:04'),
(66, 25, 40, 29, 16.892, '2021-05-15 10:03:59'),
(67, 25, 40, 73, 6.761, '2021-05-15 10:05:25'),
(68, 25, 32, 70, 9.289, '2021-05-15 10:05:56'),
(69, 31, 31, 46, 43.808, '2021-05-15 10:21:08'),
(70, 31, 40, 37, 13.225, '2021-05-15 10:21:48'),
(71, 25, 43, 76, 30.297, '2021-05-15 10:37:12'),
(72, 25, 40, 54, 9.029, '2021-05-17 11:35:44'),
(73, 25, 40, 49, 10.098, '2021-05-17 11:41:39'),
(74, 25, 40, 61, 8.119, '2021-05-17 11:42:04'),
(75, 25, 32, 57, 11.449, '2021-05-17 11:42:43'),
(76, 25, 32, 73, 8.928, '2021-05-17 11:45:21'),
(77, 25, 40, 56, 8.784, '2021-05-17 11:46:21'),
(78, 25, 32, 84, 7.716, '2021-05-17 11:47:36'),
(79, 25, 43, 75, 30.483, '2021-05-17 11:48:18'),
(80, 25, 40, 65, 7.566, '2021-05-17 11:51:18'),
(81, 25, 40, 60, 8.267, '2021-05-17 12:00:25'),
(82, 25, 32, 87, 7.465, '2021-05-17 12:01:22'),
(83, 25, 32, 71, 9.087, '2021-05-17 12:08:32'),
(84, 25, 31, 73, 27.496, '2021-05-17 12:10:06'),
(85, 25, 40, 67, 7.354, '2021-05-17 12:11:17'),
(86, 25, 31, 74, 27.297, '2021-05-17 12:13:06'),
(87, 25, 32, 77, 8.4, '2021-05-17 12:15:37'),
(88, 25, 32, 81, 8.015, '2021-05-17 12:17:11'),
(89, 25, 40, 69, 7.156, '2021-05-17 12:18:56'),
(90, 25, 40, 59, 8.27, '2021-05-17 12:24:42'),
(91, 25, 32, 82, 7.92, '2021-05-17 12:27:20'),
(92, 25, 31, 75, 26.939, '2021-05-17 12:29:04'),
(93, 25, 32, 84, 7.689, '2021-05-17 12:29:48'),
(94, 25, 43, 64, 35.937, '2021-05-17 12:31:59'),
(95, 25, 40, 59, 8.287, '2021-05-17 12:32:11'),
(96, 25, 32, 85, 7.625, '2021-05-17 12:34:44'),
(97, 25, 40, 53, 9.302, '2021-05-17 12:37:43'),
(98, 25, 32, 78, 8.269, '2021-05-17 12:38:40'),
(99, 25, 32, 81, 7.975, '2021-05-17 12:40:59'),
(100, 25, 31, 73, 27.562, '2021-05-17 12:44:48'),
(101, 25, 40, 54, 9.116, '2021-05-17 12:46:14'),
(102, 25, 40, 46, 10.811, '2021-05-17 12:47:50'),
(103, 25, 32, 71, 9.116, '2021-05-17 12:50:51'),
(104, 25, 32, 89, 7.247, '2021-05-17 12:51:54'),
(105, 25, 32, 86, 7.538, '2021-05-17 12:54:57'),
(106, 25, 40, 54, 9.151, '2021-05-17 13:18:11'),
(107, 25, 40, 60, 8.176, '2021-05-17 13:18:34'),
(108, 25, 40, 64, 7.721, '2021-05-19 16:46:57'),
(109, 25, 32, 67, 9.691, '2021-05-19 17:36:06'),
(110, 25, 31, 66, 30.387, '2021-05-19 17:36:41'),
(111, 30, 37, 57, 108.406, '2021-05-19 18:14:56'),
(112, 30, 40, 65, 7.616, '2021-05-19 20:07:34'),
(113, 30, 43, 66, 34.678, '2021-05-19 20:08:35'),
(114, 30, 30, 49, 61.013, '2021-05-19 20:26:18'),
(115, 32, 32, 79, 8.228, '2021-05-19 20:38:56');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `teclas`
--

CREATE TABLE `teclas` (
  `id` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `tecla` char(1) DEFAULT NULL,
  `aciertos` int(11) DEFAULT NULL,
  `fallos` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `teclas`
--

INSERT INTO `teclas` (`id`, `id_user`, `tecla`, `aciertos`, `fallos`) VALUES
(676, 25, '0', 0, 0),
(677, 25, '1', 0, 0),
(678, 25, '2', 0, 0),
(679, 25, '3', 0, 0),
(680, 25, '4', 0, 0),
(681, 25, '5', 0, 0),
(682, 25, '6', 0, 0),
(683, 25, '7', 0, 0),
(684, 25, '8', 0, 0),
(685, 25, '9', 0, 0),
(686, 25, '', 7, 1),
(687, 25, '!', 0, 0),
(688, 25, '$', 0, 0),
(689, 25, '#', 0, 0),
(690, 25, '&', 0, 0),
(691, 25, '%', 0, 0),
(692, 25, '(', 0, 0),
(693, 25, ')', 0, 0),
(694, 25, '*', 0, 0),
(695, 25, '+', 0, 0),
(696, 25, ',', 0, 0),
(697, 25, '-', 0, 0),
(698, 25, '.', 5, 0),
(699, 25, '/', 0, 0),
(700, 25, ':', 0, 0),
(701, 25, ';', 0, 0),
(702, 25, '<', 0, 0),
(703, 25, '=', 0, 0),
(704, 25, '>', 0, 0),
(705, 25, '?', 0, 0),
(706, 25, '@', 0, 0),
(707, 25, 'A', 0, 0),
(708, 25, 'Á', 0, 0),
(709, 25, 'À', 0, 0),
(710, 25, 'Ä', 0, 0),
(711, 25, 'Â', 0, 0),
(712, 25, 'B', 0, 0),
(713, 25, 'C', 1, 0),
(714, 25, 'D', 1, 0),
(715, 25, 'E', 1, 0),
(716, 25, 'É', 0, 0),
(717, 25, 'È', 0, 0),
(718, 25, 'Ë', 0, 0),
(719, 25, 'Ê', 0, 0),
(720, 25, 'F', 0, 0),
(721, 25, 'G', 0, 0),
(722, 25, 'H', 0, 0),
(723, 25, 'I', 0, 0),
(724, 25, 'Í', 0, 0),
(725, 25, 'Ì', 0, 0),
(726, 25, 'Ï', 0, 0),
(727, 25, 'Î', 0, 0),
(728, 25, 'J', 0, 0),
(729, 25, 'K', 0, 0),
(730, 25, 'L', 3, 0),
(731, 25, 'M', 0, 0),
(732, 25, 'N', 0, 0),
(733, 25, 'Ñ', 0, 0),
(734, 25, 'O', 0, 0),
(735, 25, 'Ó', 0, 0),
(736, 25, 'Ò', 0, 0),
(737, 25, 'Ö', 0, 0),
(738, 25, 'Ô', 0, 0),
(739, 25, 'P', 0, 0),
(740, 25, 'Q', 0, 0),
(741, 25, 'R', 0, 0),
(742, 25, 'S', 0, 0),
(743, 25, 'T', 0, 0),
(744, 25, 'U', 0, 0),
(745, 25, 'Ú', 0, 0),
(746, 25, 'Ù', 0, 0),
(747, 25, 'Ü', 0, 0),
(748, 25, 'Û', 0, 0),
(749, 25, 'V', 0, 0),
(750, 25, 'W', 0, 0),
(751, 25, 'X', 0, 0),
(752, 25, 'Y', 0, 0),
(753, 25, 'Z', 0, 0),
(754, 25, '[', 0, 0),
(755, 25, ']', 0, 0),
(756, 25, '^', 0, 0),
(757, 25, '_', 0, 0),
(758, 25, '`', 0, 0),
(759, 25, 'a', 36, 2),
(760, 25, 'á', 4, 0),
(761, 25, 'à', 0, 0),
(762, 25, 'ä', 0, 0),
(763, 25, 'â', 0, 0),
(764, 25, 'b', 1, 0),
(765, 25, 'c', 7, 0),
(766, 25, 'd', 17, 0),
(767, 25, 'e', 36, 5),
(768, 25, 'é', 3, 1),
(769, 25, 'è', 0, 0),
(770, 25, 'ë', 0, 0),
(771, 25, 'ê', 0, 0),
(772, 25, 'f', 4, 0),
(773, 25, 'g', 2, 0),
(774, 25, 'h', 8, 0),
(775, 25, 'i', 9, 1),
(776, 25, 'í', 0, 0),
(777, 25, 'ì', 0, 0),
(778, 25, 'ï', 0, 0),
(779, 25, 'î', 0, 0),
(780, 25, 'j', 2, 0),
(781, 25, 'k', 0, 0),
(782, 25, 'l', 5, 0),
(783, 25, 'm', 4, 0),
(784, 25, 'n', 19, 0),
(785, 25, 'ñ', 0, 1),
(786, 25, 'o', 23, 1),
(787, 25, 'ó', 0, 0),
(788, 25, 'ò', 0, 0),
(789, 25, 'ö', 0, 0),
(790, 25, 'ô', 0, 0),
(791, 25, 'p', 9, 1),
(792, 25, 'q', 5, 0),
(793, 25, 'r', 25, 3),
(794, 25, 's', 17, 2),
(795, 25, 't', 12, 1),
(796, 25, 'u', 18, 2),
(797, 25, 'ú', 0, 0),
(798, 25, 'ù', 0, 0),
(799, 25, 'ü', 0, 0),
(800, 25, 'û', 0, 0),
(801, 25, 'v', 2, 1),
(802, 25, 'w', 0, 0),
(803, 25, 'x', 0, 0),
(804, 25, 'y', 1, 1),
(805, 25, 'z', 4, 0),
(806, 25, '{', 0, 0),
(807, 25, '|', 0, 0),
(808, 25, '}', 0, 0),
(809, 25, '~', 0, 0),
(810, 25, '­', 0, 0),
(811, 30, '0', 0, 0),
(812, 30, '1', 2, 0),
(813, 30, '2', 0, 0),
(814, 30, '3', 3, 0),
(815, 30, '4', 0, 2),
(816, 30, '5', 0, 0),
(817, 30, '6', 0, 0),
(818, 30, '7', 0, 0),
(819, 30, '8', 3, 0),
(820, 30, '9', 1, 1),
(821, 30, '', 81, 4),
(822, 30, '!', 0, 0),
(823, 30, '$', 0, 0),
(824, 30, '#', 0, 0),
(825, 30, '&', 0, 0),
(826, 30, '%', 0, 0),
(827, 30, '(', 0, 0),
(828, 30, ')', 0, 0),
(829, 30, '*', 0, 0),
(830, 30, '+', 0, 0),
(831, 30, ',', 11, 2),
(832, 30, '-', 0, 1),
(833, 30, '.', 6, 0),
(834, 30, '/', 0, 0),
(835, 30, ':', 0, 0),
(836, 30, ';', 1, 0),
(837, 30, '<', 0, 0),
(838, 30, '=', 0, 0),
(839, 30, '>', 0, 0),
(840, 30, '?', 0, 0),
(841, 30, '@', 0, 0),
(842, 30, 'A', 1, 0),
(843, 30, 'Á', 0, 0),
(844, 30, 'À', 0, 0),
(845, 30, 'Ä', 0, 0),
(846, 30, 'Â', 0, 0),
(847, 30, 'B', 1, 0),
(848, 30, 'C', 0, 0),
(849, 30, 'D', 2, 0),
(850, 30, 'E', 2, 0),
(851, 30, 'É', 0, 0),
(852, 30, 'È', 0, 0),
(853, 30, 'Ë', 0, 0),
(854, 30, 'Ê', 0, 0),
(855, 30, 'F', 0, 0),
(856, 30, 'G', 1, 0),
(857, 30, 'H', 0, 0),
(858, 30, 'I', 0, 0),
(859, 30, 'Í', 0, 0),
(860, 30, 'Ì', 0, 0),
(861, 30, 'Ï', 0, 0),
(862, 30, 'Î', 0, 0),
(863, 30, 'J', 1, 0),
(864, 30, 'K', 0, 0),
(865, 30, 'L', 2, 0),
(866, 30, 'M', 3, 0),
(867, 30, 'N', 2, 0),
(868, 30, 'Ñ', 0, 0),
(869, 30, 'O', 0, 0),
(870, 30, 'Ó', 0, 0),
(871, 30, 'Ò', 0, 0),
(872, 30, 'Ö', 0, 0),
(873, 30, 'Ô', 0, 0),
(874, 30, 'P', 1, 0),
(875, 30, 'Q', 0, 0),
(876, 30, 'R', 1, 0),
(877, 30, 'S', 2, 0),
(878, 30, 'T', 1, 0),
(879, 30, 'U', 0, 0),
(880, 30, 'Ú', 0, 0),
(881, 30, 'Ù', 0, 0),
(882, 30, 'Ü', 0, 0),
(883, 30, 'Û', 0, 0),
(884, 30, 'V', 1, 0),
(885, 30, 'W', 0, 0),
(886, 30, 'X', 0, 0),
(887, 30, 'Y', 0, 1),
(888, 30, 'Z', 0, 0),
(889, 30, '[', 0, 0),
(890, 30, ']', 0, 0),
(891, 30, '^', 0, 0),
(892, 30, '_', 0, 0),
(893, 30, '`', 0, 1),
(894, 30, 'a', 100, 8),
(895, 30, 'á', 4, 0),
(896, 30, 'à', 0, 0),
(897, 30, 'ä', 0, 0),
(898, 30, 'â', 0, 0),
(899, 30, 'b', 8, 1),
(900, 30, 'c', 38, 0),
(901, 30, 'd', 33, 3),
(902, 30, 'e', 106, 33),
(903, 30, 'é', 5, 0),
(904, 30, 'è', 0, 0),
(905, 30, 'ë', 0, 0),
(906, 30, 'ê', 0, 0),
(907, 30, 'f', 5, 2),
(908, 30, 'g', 8, 1),
(909, 30, 'h', 8, 2),
(910, 30, 'i', 43, 7),
(911, 30, 'í', 1, 0),
(912, 30, 'ì', 0, 0),
(913, 30, 'ï', 0, 0),
(914, 30, 'î', 0, 0),
(915, 30, 'j', 0, 0),
(916, 30, 'k', 1, 0),
(917, 30, 'l', 40, 1),
(918, 30, 'm', 23, 2),
(919, 30, 'n', 50, 24),
(920, 30, 'ñ', 2, 0),
(921, 30, 'o', 60, 5),
(922, 30, 'ó', 5, 0),
(923, 30, 'ò', 0, 0),
(924, 30, 'ö', 0, 0),
(925, 30, 'ô', 0, 0),
(926, 30, 'p', 27, 4),
(927, 30, 'q', 10, 0),
(928, 30, 'r', 56, 4),
(929, 30, 's', 65, 8),
(930, 30, 't', 33, 2),
(931, 30, 'u', 30, 2),
(932, 30, 'ú', 0, 0),
(933, 30, 'ù', 0, 0),
(934, 30, 'ü', 0, 0),
(935, 30, 'û', 0, 0),
(936, 30, 'v', 4, 1),
(937, 30, 'w', 1, 0),
(938, 30, 'x', 0, 0),
(939, 30, 'y', 11, 0),
(940, 30, 'z', 3, 0),
(941, 30, '{', 0, 0),
(942, 30, '|', 0, 0),
(943, 30, '}', 0, 0),
(944, 30, '~', 0, 0),
(945, 30, '­', 0, 0),
(946, 32, '0', 0, 0),
(947, 32, '1', 0, 0),
(948, 32, '2', 0, 0),
(949, 32, '3', 0, 0),
(950, 32, '4', 0, 0),
(951, 32, '5', 0, 0),
(952, 32, '6', 0, 0),
(953, 32, '7', 0, 0),
(954, 32, '8', 0, 0),
(955, 32, '9', 0, 0),
(956, 32, '', 11, 0),
(957, 32, '!', 0, 0),
(958, 32, '$', 0, 0),
(959, 32, '#', 0, 0),
(960, 32, '&', 0, 0),
(961, 32, '%', 0, 0),
(962, 32, '(', 0, 0),
(963, 32, ')', 0, 0),
(964, 32, '*', 0, 0),
(965, 32, '+', 0, 0),
(966, 32, ',', 0, 0),
(967, 32, '-', 0, 0),
(968, 32, '.', 1, 0),
(969, 32, '/', 0, 0),
(970, 32, ':', 0, 0),
(971, 32, ';', 0, 0),
(972, 32, '<', 0, 0),
(973, 32, '=', 0, 0),
(974, 32, '>', 0, 0),
(975, 32, '?', 0, 0),
(976, 32, '@', 0, 0),
(977, 32, 'A', 0, 0),
(978, 32, 'Á', 0, 0),
(979, 32, 'À', 0, 0),
(980, 32, 'Ä', 0, 0),
(981, 32, 'Â', 0, 0),
(982, 32, 'B', 0, 0),
(983, 32, 'C', 1, 0),
(984, 32, 'D', 1, 0),
(985, 32, 'E', 0, 0),
(986, 32, 'É', 0, 0),
(987, 32, 'È', 0, 0),
(988, 32, 'Ë', 0, 0),
(989, 32, 'Ê', 0, 0),
(990, 32, 'F', 0, 0),
(991, 32, 'G', 0, 0),
(992, 32, 'H', 0, 0),
(993, 32, 'I', 0, 0),
(994, 32, 'Í', 0, 0),
(995, 32, 'Ì', 0, 0),
(996, 32, 'Ï', 0, 0),
(997, 32, 'Î', 0, 0),
(998, 32, 'J', 0, 0),
(999, 32, 'K', 0, 0),
(1000, 32, 'L', 0, 0),
(1001, 32, 'M', 0, 0),
(1002, 32, 'N', 0, 0),
(1003, 32, 'Ñ', 0, 0),
(1004, 32, 'O', 0, 0),
(1005, 32, 'Ó', 0, 0),
(1006, 32, 'Ò', 0, 0),
(1007, 32, 'Ö', 0, 0),
(1008, 32, 'Ô', 0, 0),
(1009, 32, 'P', 0, 0),
(1010, 32, 'Q', 0, 0),
(1011, 32, 'R', 0, 0),
(1012, 32, 'S', 0, 0),
(1013, 32, 'T', 0, 0),
(1014, 32, 'U', 0, 0),
(1015, 32, 'Ú', 0, 0),
(1016, 32, 'Ù', 0, 0),
(1017, 32, 'Ü', 0, 0),
(1018, 32, 'Û', 0, 0),
(1019, 32, 'V', 0, 0),
(1020, 32, 'W', 0, 0),
(1021, 32, 'X', 0, 0),
(1022, 32, 'Y', 0, 0),
(1023, 32, 'Z', 0, 0),
(1024, 32, '[', 0, 0),
(1025, 32, ']', 0, 0),
(1026, 32, '^', 0, 0),
(1027, 32, '_', 0, 0),
(1028, 32, '`', 0, 0),
(1029, 32, 'a', 4, 0),
(1030, 32, 'á', 0, 0),
(1031, 32, 'à', 0, 0),
(1032, 32, 'ä', 0, 0),
(1033, 32, 'â', 0, 0),
(1034, 32, 'b', 0, 0),
(1035, 32, 'c', 3, 0),
(1036, 32, 'd', 1, 0),
(1037, 32, 'e', 5, 0),
(1038, 32, 'é', 0, 0),
(1039, 32, 'è', 0, 0),
(1040, 32, 'ë', 0, 0),
(1041, 32, 'ê', 0, 0),
(1042, 32, 'f', 0, 0),
(1043, 32, 'g', 0, 0),
(1044, 32, 'h', 2, 0),
(1045, 32, 'i', 2, 0),
(1046, 32, 'í', 0, 0),
(1047, 32, 'ì', 0, 0),
(1048, 32, 'ï', 0, 0),
(1049, 32, 'î', 0, 0),
(1050, 32, 'j', 0, 0),
(1051, 32, 'k', 0, 0),
(1052, 32, 'l', 1, 0),
(1053, 32, 'm', 2, 0),
(1054, 32, 'n', 2, 0),
(1055, 32, 'ñ', 0, 0),
(1056, 32, 'o', 6, 0),
(1057, 32, 'ó', 0, 0),
(1058, 32, 'ò', 0, 0),
(1059, 32, 'ö', 0, 0),
(1060, 32, 'ô', 0, 0),
(1061, 32, 'p', 1, 0),
(1062, 32, 'q', 0, 0),
(1063, 32, 'r', 1, 0),
(1064, 32, 's', 4, 0),
(1065, 32, 't', 0, 0),
(1066, 32, 'u', 3, 0),
(1067, 32, 'ú', 0, 0),
(1068, 32, 'ù', 0, 0),
(1069, 32, 'ü', 0, 0),
(1070, 32, 'û', 0, 0),
(1071, 32, 'v', 1, 0),
(1072, 32, 'w', 0, 0),
(1073, 32, 'x', 0, 0),
(1074, 32, 'y', 1, 0),
(1075, 32, 'z', 1, 0),
(1076, 32, '{', 0, 0),
(1077, 32, '|', 0, 0),
(1078, 32, '}', 0, 0),
(1079, 32, '~', 0, 0),
(1080, 32, '­', 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `textos`
--

CREATE TABLE `textos` (
  `id` int(11) NOT NULL,
  `tit_text` varchar(50) DEFAULT NULL,
  `txt_text` text DEFAULT NULL,
  `lang_text` varchar(50) DEFAULT NULL,
  `id_cat` int(11) DEFAULT NULL,
  `ori_text` varchar(150) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `textos`
--

INSERT INTO `textos` (`id`, `tit_text`, `txt_text`, `lang_text`, `id_cat`, `ori_text`, `created_at`) VALUES
(30, 'Madrid', 'Madrid es la capital central de España con elegantes bulevares y amplios parques muy cuidados, como el Buen Retiro. Es famosa por sus ricas colecciones de arte europeo, con obras de Goya, Velázquez y otros maestros españoles en el Museo del Prado.', 'es', 9, 'Wikipedia', '2021-05-12 13:38:06'),
(31, 'Bádminton', 'El bádminton es un deporte de raqueta en el que se enfrentan dos jugadores o dos parejas situadas en las mitades opuestas de una pista rectangular dividida por una red.', 'es', 10, 'Wikipedia', '2021-05-12 13:39:32'),
(32, 'Don Quijote', 'Cada uno es como Dios le hizo y aun peor muchas veces.', 'es', 13, 'Miguel De Cervantes', '2021-05-12 13:42:46'),
(37, 'La Célula', 'La teoría celular, propuesta en 1838 para los vegetales y en 1839 para los animales,3 por Matthias Jakob Schleiden y Theodor Schwann, postula que todos los organismos están compuestos por células, y que todas las células derivan de otras precedentes. De este modo, todas las funciones vitales emanan de la maquinaria celular y de la interacción entre células adyacentes; además, la tenencia de la información genética, base de la herencia, en su ADN permite la transmisión de aquella de generación en generación.', 'es', 11, 'Wikipedia', '2021-05-12 13:52:11'),
(40, 'Don Vito', 'Le haré una oferta que no podrá rechazar.', 'es', 12, 'Vito Corleone - El Padrino', '2021-05-14 07:47:20'),
(43, 'Prueba miguel', 'No se porque pienso que escribir de esta manera probara que mi capacidad para escribir mucho mas rapido y sin acentos sea mi unica forma de escribir mas rapido en esta pagina pero soy monger.', 'es', 7, 'MIGUEL', '2021-05-15 10:36:33');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nom_user` varchar(50) DEFAULT NULL,
  `ema_user` varchar(60) DEFAULT NULL,
  `pas_user` varchar(200) DEFAULT NULL,
  `ava_user` varchar(100) DEFAULT 'ec ec-robot',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `per_user` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nom_user`, `ema_user`, `pas_user`, `ava_user`, `created_at`, `per_user`) VALUES
(25, 'Gonzalo', 'gonver17@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'ec-clown-face', '2021-05-15 10:31:55', 2),
(30, 'test', 'test@test.com', '81dc9bdb52d04dc20036dbd8313ed055', 'ec-money-mouth-face', '2021-05-13 13:57:16', 1),
(31, 'Miguel', 'vamichi2002@gmail.com', '8470f5b15e011b7ebe858034eaafd44f', 'ec-cancer', '2021-05-15 10:37:33', 2),
(32, 'GONSO', 'gonso@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'ec-peach', '2021-05-19 20:38:44', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`);

--
-- Indices de la tabla `estadisticas`
--
ALTER TABLE `estadisticas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `txt_fav` (`txt_fav`);

--
-- Indices de la tabla `resoluciones`
--
ALTER TABLE `resoluciones`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_text` (`id_text`);

--
-- Indices de la tabla `teclas`
--
ALTER TABLE `teclas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`);

--
-- Indices de la tabla `textos`
--
ALTER TABLE `textos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_cat` (`id_cat`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `estadisticas`
--
ALTER TABLE `estadisticas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `resoluciones`
--
ALTER TABLE `resoluciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=116;

--
-- AUTO_INCREMENT de la tabla `teclas`
--
ALTER TABLE `teclas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1081;

--
-- AUTO_INCREMENT de la tabla `textos`
--
ALTER TABLE `textos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `comentarios`
--
ALTER TABLE `comentarios`
  ADD CONSTRAINT `comentarios_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `estadisticas`
--
ALTER TABLE `estadisticas`
  ADD CONSTRAINT `estadisticas_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `estadisticas_ibfk_2` FOREIGN KEY (`txt_fav`) REFERENCES `textos` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `resoluciones`
--
ALTER TABLE `resoluciones`
  ADD CONSTRAINT `resoluciones_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `resoluciones_ibfk_2` FOREIGN KEY (`id_text`) REFERENCES `textos` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `teclas`
--
ALTER TABLE `teclas`
  ADD CONSTRAINT `teclas_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `textos`
--
ALTER TABLE `textos`
  ADD CONSTRAINT `textos_ibfk_1` FOREIGN KEY (`id_cat`) REFERENCES `categorias` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
