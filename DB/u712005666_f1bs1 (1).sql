-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 22-04-2023 a las 08:17:17
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `u712005666_f1bs1`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bodega`
--

CREATE TABLE `bodega` (
  `Id_Bodega` int(11) NOT NULL,
  `DescripcionBodega` varchar(100) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `bodega`
--

INSERT INTO `bodega` (`Id_Bodega`, `DescripcionBodega`, `created_at`, `updated_at`) VALUES
(1, 'Bodega Chapinero', NULL, '2023-04-20 03:36:45'),
(2, 'Bodega Engativa', '2023-04-20 00:05:25', '2023-04-20 03:36:52');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bodegaxsede`
--

CREATE TABLE `bodegaxsede` (
  `Id_Bodega_X_Sede` int(11) NOT NULL,
  `IdBodega` int(11) NOT NULL,
  `IdSede` int(11) NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `bodegaxsede`
--

INSERT INTO `bodegaxsede` (`Id_Bodega_X_Sede`, `IdBodega`, `IdSede`, `updated_at`, `created_at`) VALUES
(1, 2, 2, '2023-04-20 02:30:21', NULL),
(2, 1, 1, '2023-04-20 02:30:14', '2023-04-20 01:03:08');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `factura`
--

CREATE TABLE `factura` (
  `idFactura` int(11) NOT NULL,
  `Fecha` date NOT NULL,
  `FormaPago` varchar(45) DEFAULT NULL,
  `Mesero` varchar(45) NOT NULL,
  `Mesa` int(11) NOT NULL,
  `Clientes` int(11) DEFAULT NULL,
  `Descuento` float DEFAULT 0,
  `ValorSS` float DEFAULT 0,
  `ValorDescuento` float DEFAULT 0,
  `Observacion` varchar(100) DEFAULT NULL,
  `Nota` varchar(500) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `Subtotal` float DEFAULT NULL,
  `TasaImpuesto` float DEFAULT NULL,
  `MontoImpuesto` float DEFAULT NULL,
  `Servicio` float DEFAULT NULL,
  `Total` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedido`
--

CREATE TABLE `pedido` (
  `idpedido` int(11) NOT NULL,
  `Mesero` int(11) NOT NULL,
  `Mesa` int(11) NOT NULL,
  `Estado` varchar(50) NOT NULL,
  `horapedido` datetime DEFAULT NULL,
  `horadespacho` datetime DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `pedido`
--

INSERT INTO `pedido` (`idpedido`, `Mesero`, `Mesa`, `Estado`, `horapedido`, `horadespacho`, `created_at`, `updated_at`) VALUES
(55, 1, 5, '1', '2023-04-22 00:00:00', NULL, '2023-04-22', '2023-04-22'),
(56, 1, 5, '1', '2023-04-22 00:00:00', NULL, '2023-04-22', '2023-04-22'),
(57, 1, 5, '1', '2023-04-22 00:00:00', NULL, '2023-04-22', '2023-04-22');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `idProducto` int(11) NOT NULL,
  `Descripcion` varchar(100) NOT NULL,
  `Precio` float NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`idProducto`, `Descripcion`, `Precio`, `updated_at`, `created_at`) VALUES
(111, 'CAUSA LIMEÑA DE POLLO ALA BRASA', 17500, '2022-10-09 17:43:37', NULL),
(112, 'CAUSA FERREÑA FANA', 19700, '2022-10-09 17:43:44', NULL),
(113, 'CAUSA DE LANGOSTINOS', 23100, '2022-10-09 17:43:57', NULL),
(114, 'CAUSA CEVICHERA', 27900, '2022-10-09 17:44:04', NULL),
(115, 'CAUSA DE LOMO ANTICUCHERO', 29100, '2022-10-09 17:44:09', NULL),
(116, 'CAUSA DE LOMO SALTADO', 29500, '2022-10-09 17:44:16', NULL),
(117, 'CEVICHE CLASICO', 25100, '2022-10-09 17:44:22', NULL),
(118, 'CEVICHE DE CAMARONES', 29100, '2022-10-09 17:46:48', NULL),
(119, 'CEVICHENIKEEIDESALMON', 35700, NULL, NULL),
(120, 'CEVICHE MIXTO CALIENTE', 35700, '2022-10-09 17:46:53', NULL),
(121, 'CEVICHELIMAENDOSTIEMPOS', 47900, NULL, NULL),
(122, 'CEVICHE MIXTO ESPECIAL', 47900, '2022-10-09 17:46:59', NULL),
(123, 'TIRADITO CALIENTE', 29500, '2022-10-09 17:47:09', NULL),
(124, 'JALEA DE MARISCOS', 61700, '2022-10-09 17:47:05', NULL),
(125, 'CAMARONES A LA HUANCAINA', 29300, '2022-10-09 17:47:18', NULL),
(126, 'PESCA ANTICUCHERA CON PAPA A LA HUANCAINA', 31300, '2022-10-09 17:48:03', NULL),
(127, 'PESCA TACUTACU', 39700, '2022-10-09 17:47:26', NULL),
(128, 'SALMONCONVEGETALESALCARBONYPESTODEALBAHACA', 37900, NULL, NULL),
(129, 'PICANTEDECAMARONES', 41300, NULL, NULL),
(130, 'SUDADONORTEÑO', 43700, NULL, NULL),
(131, 'ESCABECHEDEPESCADOALACHICLAYANA', 45300, NULL, NULL),
(132, 'SALTADOMARINO', 47500, NULL, NULL),
(133, 'SALMONMARISQUERO', 49300, NULL, NULL),
(134, 'PESCAMARISQUERA', 49300, NULL, NULL),
(135, 'PESCAALOMACHO', 49500, NULL, NULL),
(136, 'ADOBOAREQUIPEÑODECERDO', 39300, NULL, NULL),
(137, 'LOMOSALTADOALWOK', 37500, NULL, NULL),
(138, 'LOMOCAMPESINO', 37900, NULL, NULL),
(139, 'BRASEADODEASADODETIRACONPURE', 39300, NULL, NULL),
(140, 'SECODEASADODETIRA', 39300, NULL, NULL),
(141, 'ENTRECOTALAPARRILLA', 53100, NULL, NULL),
(142, 'T-BONESTEAKALAPARRILA', 60900, NULL, NULL),
(143, 'AJIDEGALLINA', 31900, NULL, NULL),
(144, 'ARROZCONMARISCOS', 33700, NULL, NULL),
(145, 'ARROZDELNORTEPERUANOCONSALSAALAHUANCAINA', 35900, NULL, NULL),
(147, 'TACUTACULIMEÑOCONLOMO', 39300, NULL, NULL),
(148, 'SPAGHETTIALAHUANCAINACONCAMARONES', 31300, NULL, NULL),
(149, 'SPAGHETTIALAHUANCAINACONLOMOSALTADO', 39900, NULL, NULL),
(150, 'SPAGHETTICONGAMBAS', 43700, NULL, NULL),
(151, 'SPAGHETTISALTADODELOMO', 39500, NULL, NULL),
(152, 'SPAGHETTIALPESTOCONCAMARONES', 39700, NULL, NULL),
(154, 'SODASANDIA', 13000, NULL, NULL),
(155, 'SODADEMANZANAYJENGIBRE', 13000, NULL, NULL),
(156, 'SODADEMARACUYA', 13000, NULL, NULL),
(157, 'MOJITOVIRGEN', 17000, NULL, NULL),
(158, 'COCTELTROPICAL', 17000, NULL, NULL),
(159, 'COCTELDEFRUTOSDELBOSQUE', 17000, NULL, NULL),
(160, 'FRUITPUNCH', 15500, NULL, NULL),
(161, 'CHICHAMORADA', 12000, NULL, NULL),
(162, 'JARRADECHICHAMORADA', 24000, NULL, NULL),
(163, 'LIMONADANATURAL', 5900, NULL, NULL),
(164, 'LIMONADADEHIERBABUENA', 7000, NULL, NULL),
(165, 'LIMONADADESANDIA', 7000, NULL, NULL),
(166, 'LIMONADACEREZADA', 9900, NULL, NULL),
(167, 'LIMONADADECOCO', 9900, NULL, NULL),
(168, 'LIMONADADEMANGOBICHE', 9900, NULL, NULL),
(169, 'LIMONADADEJENGIBRE', 9900, NULL, NULL),
(170, 'MAMDARINATA', 13000, NULL, NULL),
(171, 'COPADEHELADOSYSORBETES', 11300, NULL, NULL),
(172, 'PANNACOTTADEYOGURTGRIEGO', 13700, NULL, NULL),
(173, 'MERENGONCONFRUTASYHELADO', 15100, NULL, NULL),
(174, 'TENTACIONDEFRUTOSROJOS', 19500, NULL, NULL),
(175, 'TARTALETADECHOCOLATEYHELADODEVAINILLA', 17100, NULL, NULL),
(176, 'SUSPIROLIMEÑO', 21300, NULL, NULL),
(177, 'AMERICANO', 5500, NULL, NULL),
(178, 'CAFÉLATTE', 5500, NULL, NULL),
(179, 'EXPRESO', 5300, NULL, NULL),
(180, 'MACHIATO', 5900, NULL, NULL),
(181, 'CAPPUCCINO', 6900, NULL, NULL),
(182, 'MOCACCINO', 7900, NULL, NULL),
(183, 'AROMATICADEHIERBABUENA', 3500, NULL, NULL),
(184, 'AROMATICADEFRUTAS', 5500, NULL, NULL),
(185, 'TEVERDECONGENGIBRE', 5500, NULL, NULL),
(186, 'TE', 5500, NULL, NULL),
(187, 'AGUAPANELACONLIMON', 3500, NULL, NULL),
(188, 'TRCINZANOBIANCO', 13000, NULL, NULL),
(189, 'TRCINZANOROSSO', 13900, NULL, NULL),
(190, 'TRDUBONET', 18000, NULL, NULL),
(191, 'TRAMARETTOCONVIER', 13000, NULL, NULL),
(192, 'TRBAILEYS', 20000, NULL, NULL),
(193, '1/4POLLO', 13000, NULL, NULL),
(194, '1/2POLLO', 25000, NULL, NULL),
(195, 'POLLOENTERO', 49000, NULL, NULL),
(196, '1/4POLLOCONCHAUFA', 19000, '2022-10-13 00:46:53', NULL),
(197, 'PECHUGADEPOLLO180', 11500, NULL, NULL),
(198, 'PESCADOENMILANESA170', 13500, NULL, NULL),
(199, 'LOMOFINO170', 17100, NULL, NULL),
(200, 'PESCADOALAPLANCHA200', 19100, NULL, NULL),
(201, 'ENSALADAMIXTA', 9000, NULL, NULL),
(202, 'VEGETALESALAPLANCHA', 9500, NULL, NULL),
(203, 'PAPASALAFRANCESA', 7500, NULL, NULL),
(204, 'PAPASALVAPOR', 5700, NULL, NULL),
(205, 'PAPASCASCO', 9700, NULL, NULL),
(206, 'ARROZBLANCO', 5500, NULL, NULL),
(207, 'SPAGHETTINIENSALSA', 11900, NULL, NULL),
(208, 'SALMONALAPLANCHA200', 21000, NULL, NULL),
(209, 'MARISCOSAPANADOSCONYUQUITASALAHUANCAINA', 25300, NULL, NULL),
(210, 'CREMADEZAPALLO', 19300, NULL, NULL),
(211, 'CALDODEPOLLOLIMEÑO', 21700, NULL, NULL),
(212, 'SOPAWANTAN', 23500, NULL, NULL),
(213, 'CREMADETOMATE', 21700, NULL, NULL),
(214, 'AGUADITODEMARISCOSYGAMBAS', 45700, NULL, NULL),
(215, 'MINESTRONE', 35900, NULL, NULL),
(216, 'CHILCANODEPESCADO', 33700, NULL, NULL),
(217, 'CHUPEDEGAMBAS', 49500, NULL, NULL),
(218, 'PARIHUELATUMBESINA', 49700, NULL, NULL),
(219, 'JUGODEMANDARINA', 9900, NULL, NULL),
(220, 'JUGODEMORA', 7500, NULL, NULL),
(221, 'JUGODEMARACUYA', 7500, NULL, NULL),
(222, 'JUGODEMANGO', 7500, NULL, NULL),
(223, 'JUGODEGUANABANA', 8700, NULL, NULL),
(224, 'JUGODEPIÑA', 8700, NULL, NULL),
(225, 'JUGODEFRESA', 8700, NULL, NULL),
(226, 'JUGODEMORAENLECHE', 8700, NULL, NULL),
(227, 'JUGODEMARACUYAENLECHE', 8700, NULL, NULL),
(228, 'JUGODEMANGOENLECHE', 8700, NULL, NULL),
(229, 'JUGODEGUANABANAENLECHE', 9900, NULL, NULL),
(230, 'JUGODEFRESAENLECHE', 9900, NULL, NULL),
(231, 'ESTANCIAMENDOZAMALBEC', 95000, NULL, NULL),
(232, 'RAMONROQUETATEMPRANILLO', 95000, NULL, NULL),
(233, 'RAMONROQUETAGARNACHA', 95000, NULL, NULL),
(234, 'CORIMBO', 235000, NULL, NULL),
(235, 'LAUCACARMENER', 85000, NULL, NULL),
(236, 'LAUCAPINOTNOIR', 117000, NULL, NULL),
(237, 'MONTESCABERNET', 95000, NULL, NULL),
(238, 'LEGADODEMUÑOZ', 137000, NULL, NULL),
(239, 'CANTINACOLLI', 137000, NULL, NULL),
(240, 'MONTESSAUVIGNONBLANC', 117000, NULL, NULL),
(241, 'MONTELMERLOT', 95000, NULL, NULL),
(242, 'CHATEAUBUJAMBORDEAUX', 137000, NULL, NULL),
(243, 'BOURGOGNEPINONOIR', 149000, NULL, NULL),
(244, 'DOMAINEDUPETITROMAN', 127000, NULL, NULL),
(245, 'MEDIALIVANASAUVIGNON', 49000, NULL, NULL),
(246, 'LAUCASAUVIGNON', 85000, NULL, NULL),
(247, 'MONTESSAUVIGNONBLANC', 95000, NULL, NULL),
(248, 'ESTANCIAMENDOZACHENIN', 95000, NULL, NULL),
(249, 'SAINTBRISSAUVIGNON', 121500, NULL, NULL),
(250, 'SAINTLOUISBRUT', 85000, NULL, NULL),
(251, 'OTAZUROSE', 85000, NULL, NULL),
(252, 'HEMISFERIO', 75000, NULL, NULL),
(253, 'COPADEVINO', 21000, NULL, NULL),
(254, 'JARRADESANGRIA', 67500, NULL, NULL),
(255, 'COPADESANGRIA', 21500, NULL, NULL),
(256, 'PISCOSOUR', 23000, NULL, NULL),
(257, 'MOJITO', 23000, NULL, NULL),
(258, 'MARGARITA', 23000, NULL, NULL),
(259, 'CHILCANO', 23000, NULL, NULL),
(260, 'COCTELDEALGORROBINA', 25000, NULL, NULL),
(261, 'TINTOVERANO', 21000, NULL, NULL),
(262, 'PRIMAVERA', 21000, NULL, NULL),
(263, 'VINOCALIENTE', 21000, NULL, NULL),
(264, 'DRYMARTINI', 25000, NULL, NULL),
(265, 'GIN&TONICGORDONS', 21000, NULL, NULL),
(266, 'BLOODYMARY', 25000, NULL, NULL),
(267, 'VODKATONIC', 23000, NULL, NULL),
(268, 'BTBUCHANNAS', 225000, NULL, NULL),
(269, 'BTOLDPAR', 225000, NULL, NULL),
(270, 'BTSELLONEGRO', 225000, NULL, NULL),
(271, 'BTTANQUERAY', 195000, NULL, NULL),
(272, 'BTGORDONS', 135000, NULL, NULL),
(273, 'BTTEQUILAJOSECUERVO', 157000, NULL, NULL),
(274, 'BTSMIRNOF', 135000, NULL, NULL),
(275, 'BTABSOLUT', 135000, NULL, NULL),
(276, 'TRBUCHANNAS', 27000, NULL, NULL),
(277, 'TROLDPAR', 27000, NULL, NULL),
(278, 'TRSELLONEGRO', 27000, NULL, NULL),
(279, 'TRTANQUERAY', 21000, NULL, NULL),
(280, 'TRGORDONS', 19000, NULL, NULL),
(281, 'TRTEQUILAJOSECUERVO', 19000, NULL, NULL),
(282, 'TRSMIRNOF', 17000, NULL, NULL),
(283, 'TRABSOLUT', 21000, NULL, NULL),
(284, 'CLUBDORADA', 9000, NULL, NULL),
(285, 'CLUBROJA', 9000, NULL, NULL),
(286, 'CLUBNEGRA', 9000, NULL, NULL),
(287, 'CORDILLERA', 13000, NULL, NULL),
(288, 'CUSQUEÑADORADA', 15500, NULL, NULL),
(289, 'CUSQUEÑATRIGO', 15500, NULL, NULL),
(290, 'CORONA', 13000, NULL, NULL),
(291, 'HEINEKEN', 13000, NULL, NULL),
(292, 'STELAARTROIS', 13000, NULL, NULL),
(293, 'INCAKOLA', 13500, NULL, NULL),
(294, 'COCACOLA', 5500, NULL, NULL),
(295, 'COCACOLAZERO', 5500, NULL, NULL),
(296, 'SPRITE', 7000, NULL, NULL),
(297, 'GINGER', 7000, NULL, NULL),
(298, 'AGUA', 5500, NULL, NULL),
(299, 'AGUACONGAS', 5500, NULL, NULL),
(300, 'SODA', 5500, NULL, NULL),
(301, 'AGUATONICA', 7500, NULL, NULL),
(302, 'TIRADITODEGUATILA', 19300, NULL, NULL),
(303, 'CAUSAVEGETARIANA', 19700, NULL, NULL),
(304, 'CEVICHEDECHAMPIÑONES', 25300, NULL, NULL),
(305, 'TACUTACUVEGETARIANO', 25700, NULL, NULL),
(306, 'ARROZCHAUFADEVEGETALES', 27900, NULL, NULL),
(307, 'RISOTTODETOFU', 31500, NULL, NULL),
(308, 'FRESCOSDEFRUTOSROJOSCONHELADODEALMENDRAS', 15000, NULL, NULL),
(309, 'DULCEDEHIGOSYMELOCOTONCONHELADODEARROZ', 17500, NULL, NULL),
(311, 'POLLOALALIOLICONLECHUGAYTOMATE', 17000, NULL, NULL),
(312, 'BUTIFARRA,LAMINASDECERDOCONSARSACRIOLLA', 21000, NULL, NULL),
(313, 'DEPOLLOALABRASA,LECHUGA,TOMATEYAGUACATE', 21000, NULL, NULL),
(314, 'DECHICHARRONDECERDOCONCAMOTEYSARSACRIOLLA', 23000, NULL, NULL),
(316, 'DELOMOSALTADO', 27000, NULL, NULL),
(317, 'HAMBURGUESASDELANGOSTINOS', 33000, NULL, NULL),
(318, 'ARREGLOFLORAL', 85000, NULL, NULL),
(319, 'CANCHITA', 8300, NULL, NULL),
(320, 'ARTICULOEX', 5000, NULL, NULL),
(321, 'ADICIONDEPOLLO', 5300, NULL, NULL),
(999, 'tupapa', 45000, '2022-10-12 21:39:30', '2022-10-12 21:39:30'),
(1212, 'omar', 200, '2022-09-30 21:40:58', '2022-09-30 21:40:58'),
(34555, 'pescado', 13000, '2022-10-13 01:29:48', '2022-10-13 01:29:48');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productosxfactura`
--

CREATE TABLE `productosxfactura` (
  `idProductosXFactura` int(11) NOT NULL,
  `IdFactura` int(11) NOT NULL,
  `IdProducto` int(11) NOT NULL,
  `Cantidad` int(11) NOT NULL,
  `Precio` float NOT NULL,
  `Total` varchar(45) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productosxpedido`
--

CREATE TABLE `productosxpedido` (
  `idproductosxpedido` int(11) NOT NULL,
  `Idproducto` int(11) NOT NULL,
  `IdPedido` int(11) NOT NULL,
  `Cantidad` int(11) NOT NULL,
  `Precio` float NOT NULL,
  `Total` float NOT NULL,
  `observaciones` varchar(200) DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `productosxpedido`
--

INSERT INTO `productosxpedido` (`idproductosxpedido`, `Idproducto`, `IdPedido`, `Cantidad`, `Precio`, `Total`, `observaciones`, `created_at`, `updated_at`) VALUES
(110, 111, 55, 2, 17500, 35000, NULL, '2023-04-22', '2023-04-22'),
(111, 111, 56, 2, 17500, 35000, NULL, '2023-04-22', '2023-04-22'),
(112, 111, 57, 2, 17500, 35000, NULL, '2023-04-22', '2023-04-22');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productoxbodega`
--

CREATE TABLE `productoxbodega` (
  `id_Producto_X_Bodega` int(11) NOT NULL,
  `IdProducto` int(11) NOT NULL,
  `IdBodega` int(11) NOT NULL,
  `Cantidad` int(11) NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `productoxbodega`
--

INSERT INTO `productoxbodega` (`id_Producto_X_Bodega`, `IdProducto`, `IdBodega`, `Cantidad`, `updated_at`, `created_at`) VALUES
(2, 183, 1, 2, '2023-04-20 02:10:44', NULL),
(3, 111, 1, 2, '2023-04-22 05:15:37', '2023-04-20 02:21:30'),
(4, 124, 2, 25, '2023-04-20 02:21:40', '2023-04-20 02:21:40'),
(5, 123, 2, 85, '2023-04-20 02:29:53', '2023-04-20 02:29:53'),
(6, 169, 1, 50, '2023-04-21 18:43:47', '2023-04-21 18:43:47');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `idRol` int(11) NOT NULL,
  `Descripcion_Rol` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`idRol`, `Descripcion_Rol`) VALUES
(1, 'Administrador'),
(2, 'Mesero'),
(3, 'Cajero');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sedes`
--

CREATE TABLE `sedes` (
  `Id_Sede` int(11) NOT NULL,
  `Descripcion_Sede` varchar(200) NOT NULL,
  `Direccion` varchar(200) NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `sedes`
--

INSERT INTO `sedes` (`Id_Sede`, `Descripcion_Sede`, `Direccion`, `updated_at`, `created_at`) VALUES
(1, 'Chapinero', 'cra 5 25-556', '2023-04-20 03:39:00', NULL),
(2, 'Engativa', 'calle 80 no 95-668', '2023-04-20 03:38:11', NULL),
(3, 'Suba', 'calle 127 no 75-66', '2023-04-20 03:47:20', '2023-04-20 03:47:20');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `usuario` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `perfil` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `usuario`, `email`, `Password`, `perfil`, `updated_at`, `created_at`) VALUES
(1, 'eduardo Martinez', 'eduardo2324@gmail.com', '$2y$10$Kzd08XgYfnukfJrgWBAJG.Rwo9mDJ5A64iGPKkYKe68lo/PKfjxAa', 1, '2023-04-22 05:27:11', '2023-04-19 20:25:09'),
(2, 'omar jaramillo', 'omarjaramillo8@gmail.com', '$2y$10$E5FkIgEEn1jwrnKoh893Hu.HuScHUzNKTLYy71jKDFmGSMN/dynee', 1, '2023-04-22 05:27:05', '2023-04-19 20:27:13'),
(3, 'julian sepulveda', 'julian15@gmail.com', '$2y$10$sYi0bJ1w91vW8EmjGyCUTe3PU8.BZjCiTmGVf0ieiDOeoJJ5exmh.', NULL, '2023-04-22 05:26:57', '2023-04-22 05:02:36');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarioxroles`
--

CREATE TABLE `usuarioxroles` (
  `Id_Usuario_X_Rol` int(11) NOT NULL,
  `IdRol` int(11) NOT NULL,
  `IdUsuario` int(11) NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuarioxroles`
--

INSERT INTO `usuarioxroles` (`Id_Usuario_X_Rol`, `IdRol`, `IdUsuario`, `updated_at`, `created_at`) VALUES
(1, 1, 2, '2023-04-19 23:11:22', NULL),
(2, 2, 1, '2023-04-19 23:11:27', NULL),
(4, 3, 3, '2023-04-22 05:03:14', '2023-04-22 05:03:14');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarioxsede`
--

CREATE TABLE `usuarioxsede` (
  `Id_Usuario_X_Sede` int(11) NOT NULL,
  `Id_Usuario` int(11) NOT NULL,
  `Id_Sede` int(11) NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuarioxsede`
--

INSERT INTO `usuarioxsede` (`Id_Usuario_X_Sede`, `Id_Usuario`, `Id_Sede`, `updated_at`, `created_at`) VALUES
(3, 1, 1, '2023-04-22 05:02:49', '2023-04-19 22:19:08'),
(4, 2, 1, '2023-04-19 22:22:30', '2023-04-19 22:22:30'),
(5, 3, 1, '2023-04-22 05:03:03', '2023-04-22 05:03:03');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `bodega`
--
ALTER TABLE `bodega`
  ADD PRIMARY KEY (`Id_Bodega`);

--
-- Indices de la tabla `bodegaxsede`
--
ALTER TABLE `bodegaxsede`
  ADD PRIMARY KEY (`Id_Bodega_X_Sede`),
  ADD KEY `IdBodega` (`IdBodega`),
  ADD KEY `IdSede` (`IdSede`);

--
-- Indices de la tabla `factura`
--
ALTER TABLE `factura`
  ADD PRIMARY KEY (`idFactura`);

--
-- Indices de la tabla `pedido`
--
ALTER TABLE `pedido`
  ADD PRIMARY KEY (`idpedido`),
  ADD KEY `Mesero` (`Mesero`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`idProducto`);

--
-- Indices de la tabla `productosxfactura`
--
ALTER TABLE `productosxfactura`
  ADD PRIMARY KEY (`idProductosXFactura`),
  ADD KEY `Id_Producto` (`IdProducto`),
  ADD KEY `Id_Factura` (`IdFactura`);

--
-- Indices de la tabla `productosxpedido`
--
ALTER TABLE `productosxpedido`
  ADD PRIMARY KEY (`idproductosxpedido`),
  ADD KEY `Idproducto` (`Idproducto`),
  ADD KEY `IdPedido` (`IdPedido`);

--
-- Indices de la tabla `productoxbodega`
--
ALTER TABLE `productoxbodega`
  ADD PRIMARY KEY (`id_Producto_X_Bodega`),
  ADD KEY `IdProducto` (`IdProducto`),
  ADD KEY `IdBodega` (`IdBodega`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`idRol`);

--
-- Indices de la tabla `sedes`
--
ALTER TABLE `sedes`
  ADD PRIMARY KEY (`Id_Sede`) USING BTREE;

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarioxroles`
--
ALTER TABLE `usuarioxroles`
  ADD PRIMARY KEY (`Id_Usuario_X_Rol`),
  ADD KEY `usuario` (`IdUsuario`),
  ADD KEY `rol` (`IdRol`) USING BTREE;

--
-- Indices de la tabla `usuarioxsede`
--
ALTER TABLE `usuarioxsede`
  ADD PRIMARY KEY (`Id_Usuario_X_Sede`),
  ADD KEY `Id_Usuario` (`Id_Usuario`),
  ADD KEY `Id_Sede` (`Id_Sede`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `bodega`
--
ALTER TABLE `bodega`
  MODIFY `Id_Bodega` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `bodegaxsede`
--
ALTER TABLE `bodegaxsede`
  MODIFY `Id_Bodega_X_Sede` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `factura`
--
ALTER TABLE `factura`
  MODIFY `idFactura` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=225;

--
-- AUTO_INCREMENT de la tabla `pedido`
--
ALTER TABLE `pedido`
  MODIFY `idpedido` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT de la tabla `productosxfactura`
--
ALTER TABLE `productosxfactura`
  MODIFY `idProductosXFactura` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=294;

--
-- AUTO_INCREMENT de la tabla `productosxpedido`
--
ALTER TABLE `productosxpedido`
  MODIFY `idproductosxpedido` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=113;

--
-- AUTO_INCREMENT de la tabla `productoxbodega`
--
ALTER TABLE `productoxbodega`
  MODIFY `id_Producto_X_Bodega` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `rol`
--
ALTER TABLE `rol`
  MODIFY `idRol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `sedes`
--
ALTER TABLE `sedes`
  MODIFY `Id_Sede` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `usuarioxroles`
--
ALTER TABLE `usuarioxroles`
  MODIFY `Id_Usuario_X_Rol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `usuarioxsede`
--
ALTER TABLE `usuarioxsede`
  MODIFY `Id_Usuario_X_Sede` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `bodegaxsede`
--
ALTER TABLE `bodegaxsede`
  ADD CONSTRAINT `bodegaxsede_ibfk_2` FOREIGN KEY (`IdSede`) REFERENCES `sedes` (`Id_Sede`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `bodegaxsede_ibfk_3` FOREIGN KEY (`IdBodega`) REFERENCES `bodega` (`Id_Bodega`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `pedido`
--
ALTER TABLE `pedido`
  ADD CONSTRAINT `fk_mesero_usuario` FOREIGN KEY (`Mesero`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `productosxfactura`
--
ALTER TABLE `productosxfactura`
  ADD CONSTRAINT `productosxfactura_ibfk_1` FOREIGN KEY (`IdProducto`) REFERENCES `productos` (`idProducto`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `productosxfactura_ibfk_2` FOREIGN KEY (`IdFactura`) REFERENCES `factura` (`idFactura`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `productosxfactura_ibfk_3` FOREIGN KEY (`IdProducto`) REFERENCES `productos` (`idProducto`);

--
-- Filtros para la tabla `productosxpedido`
--
ALTER TABLE `productosxpedido`
  ADD CONSTRAINT `productosxpedido_ibfk_1` FOREIGN KEY (`Idproducto`) REFERENCES `productos` (`idProducto`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `productosxpedido_ibfk_2` FOREIGN KEY (`IdPedido`) REFERENCES `pedido` (`idpedido`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `productoxbodega`
--
ALTER TABLE `productoxbodega`
  ADD CONSTRAINT `productoxbodega_ibfk_2` FOREIGN KEY (`IdProducto`) REFERENCES `productos` (`idProducto`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `productoxbodega_ibfk_3` FOREIGN KEY (`IdBodega`) REFERENCES `bodega` (`Id_Bodega`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuarioxroles`
--
ALTER TABLE `usuarioxroles`
  ADD CONSTRAINT `usuarioxroles_ibfk_3` FOREIGN KEY (`IdUsuario`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `usuarioxroles_ibfk_4` FOREIGN KEY (`IdRol`) REFERENCES `rol` (`idRol`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuarioxsede`
--
ALTER TABLE `usuarioxsede`
  ADD CONSTRAINT `usuarioxsede_ibfk_3` FOREIGN KEY (`Id_Usuario`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `usuarioxsede_ibfk_4` FOREIGN KEY (`Id_Sede`) REFERENCES `sedes` (`Id_Sede`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
