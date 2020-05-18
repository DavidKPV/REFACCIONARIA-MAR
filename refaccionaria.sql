-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 21-01-2019 a las 03:44:54
-- Versión del servidor: 10.1.32-MariaDB
-- Versión de PHP: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `refaccionaria`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `facturas`
--

CREATE TABLE `facturas` (
  `folio` varchar(200) NOT NULL,
  `pago_por` varchar(20) NOT NULL,
  `no_tarjeta` varchar(100) NOT NULL,
  `nombre_tarjeta` varchar(100) NOT NULL,
  `fecha_ex_mes` varchar(10) NOT NULL,
  `fecha_ex_anio` varchar(10) NOT NULL,
  `envio_por` varchar(20) NOT NULL,
  `nombre_comprador` varchar(200) NOT NULL,
  `direccion` varchar(300) NOT NULL,
  `ciudad` varchar(100) NOT NULL,
  `estado` varchar(100) NOT NULL,
  `codigo_postal` varchar(100) NOT NULL,
  `pais` varchar(100) NOT NULL,
  `id_login` int(20) NOT NULL,
  `finalizado` int(1) NOT NULL,
  `total` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `facturas`
--

INSERT INTO `facturas` (`folio`, `pago_por`, `no_tarjeta`, `nombre_tarjeta`, `fecha_ex_mes`, `fecha_ex_anio`, `envio_por`, `nombre_comprador`, `direccion`, `ciudad`, `estado`, `codigo_postal`, `pais`, `id_login`, `finalizado`, `total`) VALUES
('12256641David Martinez22', 'credito', '5515070039601505', 'Martinez Martinez David', '1', '22', 'dhl', 'David Martinez', 'Calle Oriente 3 La candelaria Tlapala', 'Chalco', 'MÃ©xico', '56641', 'MÃ©xico', 2, 1, 4232),
('22456432Belen Romo33', 'credito', '125673584501236', 'Romo Espinoza Belen', '2', '24', 'estafeta', 'Belen Romo', 'Unidad habitacional Alamos Chalco num 26', 'Chalco', 'MÃ©xico', '56432', 'MÃ©xico', 3, 1, 1974);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `login`
--

CREATE TABLE `login` (
  `nombre_usuario` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `id` int(20) NOT NULL,
  `tipo_usuario` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `login`
--

INSERT INTO `login` (`nombre_usuario`, `password`, `id`, `tipo_usuario`) VALUES
('administrador_1', '12345asdf', 1, 1),
('David', 'qwerty', 2, 1),
('Belen', '1234qwer', 3, 1),
('Blade-Marcos90', 'ferraris90', 19, 2),
('marcos12', 'ferraris90', 20, 2),
('marcos2345', 'asdfghjkl', 21, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos`
--

CREATE TABLE `pedidos` (
  `codigo` varchar(50) NOT NULL,
  `cantidad` int(50) NOT NULL,
  `proveedor` varchar(50) NOT NULL,
  `precio` int(250) NOT NULL,
  `lugar_almacen` varchar(100) NOT NULL,
  `tipo_producto` varchar(50) NOT NULL,
  `id_login` int(20) NOT NULL,
  `id_usuario` int(20) NOT NULL,
  `nombre_producto` varchar(200) NOT NULL,
  `descripcion_producto` varchar(300) NOT NULL,
  `foto1` varchar(300) NOT NULL,
  `foto2` varchar(300) NOT NULL,
  `foto3` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `codigo` varchar(50) NOT NULL,
  `cantidad` int(50) NOT NULL,
  `proveedor` varchar(50) NOT NULL,
  `precio` int(250) NOT NULL,
  `lugar_almacen` varchar(100) NOT NULL,
  `tipo_producto` varchar(50) NOT NULL,
  `id_login` int(20) NOT NULL,
  `nombre_producto` varchar(200) NOT NULL,
  `descripcion_producto` varchar(300) NOT NULL,
  `foto1` varchar(300) NOT NULL,
  `foto2` varchar(300) NOT NULL,
  `foto3` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`codigo`, `cantidad`, `proveedor`, `precio`, `lugar_almacen`, `tipo_producto`, `id_login`, `nombre_producto`, `descripcion_producto`, `foto1`, `foto2`, `foto3`) VALUES
('12qwe78', 13, 'Auto Emblema', 2500, 'Chalco', 'Accesorio', 2, 'Amortiguadores de Gas', 'Amortiguadores de gas para motocicletas de trabajo (baja cilindrada)', 'fotos_productos/amortiguador1.jpg', 'fotos_productos/amortiguador2.jpg', 'fotos_productos/amortiguador3.jpg'),
('aaa', 0, 'a', 0, 'a', 'a', 2, 'a', 'a', 'fotos_productos/Penguins.jpg', 'fotos_productos/Desert.jpg', 'fotos_productos/Tulips.jpg'),
('akapro1345', 38, 'Accesorios Exclusivos', 1500, 'Chalco', 'Accesorio', 2, 'Escape Akrapovic Leovince Two Brothers', 'Escape Akrapovic Leovince Two Brothers deportivo para motos Cbr, R6 y Duke ', 'fotos_productos/escape1.jpg', 'fotos_productos/escape2.jpg', 'fotos_productos/escape3.jpg'),
('cabezaft150', 6, 'REMO', 1000, 'Chalco', 'Refaccion', 2, 'Cabeza de cilindro ft150', 'Cabeza de cilindro completa Ft 150cc para motocicleta Italika ', 'fotos_productos/cabe1.jpg', 'fotos_productos/cabe2.jpg', 'fotos_productos/cabe3.jpg'),
('cala34rty', 39, 'Accesorios Iztapalapa', 30, 'Chalco', 'Accesorio', 2, 'Par luz led Rgb Calavera', 'Par luz led Rgb Calavera para valvulas como tapon de llanta para bici, moto y auto ', 'fotos_productos/cal1.jpg', 'fotos_productos/cal2.jpg', 'fotos_productos/cal3.jpg'),
('canwe34', 4, 'REMO', 150, 'Coco', 'Accesorio', 2, 'Candado con alarma', 'Candado alta seguridad alarma sirena 110db Arco grande para motos ', 'fotos_productos/can1.jpg', 'fotos_productos/can2.jpg', 'fotos_productos/can3.jpg'),
('capungk12', 97, 'REMO', 60, 'Chalco', 'Refaccion', 2, 'Capuchon de Bujia Ngk', 'Capuchon de Bujia Ngk Vd05f para Motocicletas', 'fotos_productos/capuchon1.jpg', 'fotos_productos/capuchon2.jpg', 'fotos_productos/capuchon3.jpg'),
('cargaa234', 29, 'Accesorios Neza', 300, 'Chalco', 'Accesorio', 2, 'Cargador para celular', 'Cargador para celular para moto con 2 Usb, Voltimetro Y tipo Encendedor de 12v ', 'fotos_productos/cargador1.jpg', 'fotos_productos/cargador2.jpg', 'fotos_productos/cargador3.jpg'),
('casc1', 28, 'Accesorios coco', 1300, 'Cocotitlan', 'Accesorio', 2, 'Casco Jiekai', 'Casco para motociclista de cara completo visor dual con escudo colorido', 'fotos_productos/casco1.jpg', 'fotos_productos/casco2.jpg', 'fotos_productos/casco3.jpg'),
('cdiitalika12', 9, 'REMO', 120, 'Chalco', 'Refacciones', 2, 'Cdi Motoneta Italika', 'Unidad Cdi para motonetas Italika 125cc y 150cc', 'fotos_productos/cdi1.jpg', 'fotos_productos/cd2.jpg', 'fotos_productos/cdi3.jpg'),
('clutchft150', 19, 'REMO', 500, 'Chalco', 'Refaccion', 2, 'Clutch completo Ft 150', 'Clutch completo Ft 150 para motocicletas Italika ', 'fotos_productos/clutch1.jpg', 'fotos_productos/clutch2.jpg', 'fotos_productos/clutch3.jpg'),
('discofre23ya', 5, 'REMO', 800, 'Chalco', 'Refaccion', 2, 'Disco de freno delantero Fz 16', 'Disco de freno delantero para motocicleta Yamaha Fz 16', 'fotos_productos/freno1.jpg', 'fotos_productos/freno2.jpg', 'fotos_productos/freno3.jpg'),
('escapefthg34', 49, 'REMO', 1500, 'Chalco', 'Accesorio ', 2, 'Escape Deportivo (Universal)', 'Escape Deportivo para motocilcetas Italika, Fz, Pulsar, Dominar, 250z, Dm200, 600 y Ns ', 'fotos_productos/escapes1.jpg', 'fotos_productos/escapes2.jpg', 'fotos_productos/escapes3.jpg'),
('ester000', 10, 'Accesorios Iztapalapa', 720, 'Chalco', 'Accesorio', 2, 'Estereo con bocinas bluetooth', 'Estereo con bocinas bluetooth para motocicletas Usb, Mp3 y Manos Libres ', 'fotos_productos/estereo1.jpg', 'fotos_productos/estereo2.jpg', 'fotos_productos/estereo3.jpg'),
('filtroflujoalto987y', 20, 'Accesorios Iztapalapa', 1200, 'Chalco', 'Accesorio', 2, 'Filtro de alto flujo Roughcrafts Cromo', 'Filtro de alto flujo Roughcrafts Cromo para Harley Sporster 883 y 1200 ', 'fotos_productos/filtroaire1.jpg', 'fotos_productos/filtroaire2.jpg', 'fotos_productos/filtroaire3.jpg'),
('filtrosen12', 494, 'REMO', 20, 'Chalco', 'Refaccion', 2, 'Filtro de gasolina universal', 'Filtro de gasolina universal para motocicletas Italika, Honda y Yamaha ', 'fotos_productos/filtro1.jpg', 'fotos_productos/filtro2.jpg', 'fotos_productos/filtro3.jpg'),
('gtecsfr4', 15, 'REMO', 120, 'Chalco', 'Accesorio', 2, 'Guantes con ventilaciÃ³n', 'Guantes Universales con protecciones con tres presentaciones (colores))', 'fotos_productos/guante1.jpg', 'fotos_productos/guante2.jpg', 'fotos_productos/guante3.jpg'),
('inter123', 5, 'Accesorios de China', 800, 'Chalco', 'Accesorio', 2, 'Intercomunicador bluetooth para Casco', 'Bt-s2 1000m Intercomunicador Bluetooth Moto Casco Manos Libres', 'fotos_productos/interco1.jpg', 'fotos_productos/interco2.jpg', 'fotos_productos/interco3.jpg'),
('kit345tyu4', 200, 'REMO', 160, 'Chalco', 'Accesorio', 2, 'Kit de parchado', 'Kit de parchado o reparaciÃ³n de llantas sin camara para motocicletas o carros', 'fotos_productos/parches1.jpg', 'fotos_productos/parches2.jpg', 'fotos_productos/parches3.jpg'),
('lamper45', 2, 'Acceorios coco', 500, 'Cocotitlan', 'Accesorio', 2, 'Lampara Auxiliar', 'Lampara recargable de 10000 lÃºmenes poder 4x Cree T6 (Universal))', 'fotos_productos/lamp1.jpg', 'fotos_productos/lamp2.jpg', 'fotos_productos/lamp3.jpg'),
('llave34tybu', 20, 'Refaccionaria Chalco', 90, 'Chalco', 'Accesorio', 2, 'Llave de bujÃ­a', 'Llave de bujÃ­a 4 Tiempos 3/4 X 13/16 - 19 X 21 Mm Oregon 42-452 ', 'fotos_productos/llave1.jpg', 'fotos_productos/llave2.jpg', 'fotos_productos/llave3.jpg'),
('luz1256', 5, 'Accesorios Neza', 400, 'Chalco', 'Accesorio', 2, 'Tiras de luz para casco', 'Tiras de luz pegables para cascos de talla L y XL', 'fotos_productos/luz_casco2.jpg', 'fotos_productos/luz_casco1.jpg', 'fotos_productos/luz_casco3.jpg'),
('mal4578', 10, 'Accesorios Neza', 500, 'Chalco', 'Accesorio', 2, 'Maletero Chico', 'Maletero cuadrado, chico (1 casco, universal))', 'fotos_productos/maletero1.jpg', 'fotos_productos/maletero2.jpg', 'fotos_productos/maletero3.jpg'),
('manuer56t', 29, 'REMO', 550, 'Chalco', 'Refaccion', 2, 'Manubrio deportivo Stunt Volante', 'Manubrio deportivo Stunt Volante para Yamaha Fz16 2.0 y motos Cafe Racer', 'fotos_productos/manu1.jpg', 'fotos_productos/manu2.jpg', 'fotos_productos/manu3.jpg'),
('moch277', 5, 'Accesorios Neza', 480, 'Chalco', 'Accesorio', 2, 'Mochila (maletero)', 'Maletero para motociclista (Universal))', 'fotos_productos/maleta1.jpg', 'fotos_productos/maleta2.jpg', 'fotos_productos/maleta3.jpg'),
('ngkd8ea', 198, 'REMO', 55, 'Chalco', 'Refaccion', 2, 'Bujia Ngk D8ea', 'Bujia Ngk D8ea para Motocicletas Italika Dt125, Ft125, FT150, Rc150, y Tc200', 'fotos_productos/bujia1.jpg', 'fotos_productos/bujia2.jpg', 'fotos_productos/bujia3.jpg'),
('palancas34ert', 39, 'REMO', 900, 'Chalco', 'Refaccion', 2, 'Palancas deportivas', 'Palancas deportivas universales de freno y clutch para motocicletas (tres presentaciones))', 'fotos_productos/palanca1.jpg', 'fotos_productos/palanca2.jpg', 'fotos_productos/palanca3.jpg'),
('pcel2345', 5, 'Accesorios coco', 170, 'Cocotitlan', 'Accesorio', 2, 'Bolsa Mochila', 'Bolsa mochila porta celular o herramientas para motocicletas o bicicletas', 'fotos_productos/porta_cel1.jpg', 'fotos_productos/porta_cel2.jpg', 'fotos_productos/porta_cel3.jpg'),
('redelas234', 29, 'REMO', 100, 'Chalco', 'Accesorio', 2, 'Red ElÃ¡stica ', 'Red elÃ¡stica para casco y equipaje para motocicletas Italika, Honda y Yamaha', 'fotos_productos/red1.jpg', 'fotos_productos/red2.jpg', 'fotos_productos/red3.jpg'),
('rodille23ty7', 5, 'Accesorios Iztapalapa', 1500, 'Chalco', 'Accesorio', 2, 'Rodilleras H11 Y K11 Scoyco', 'Rodilleras H11 Y K11 Scoyco para motociclista ', 'fotos_productos/rodi1.jpg', 'fotos_productos/rodi2.jpg', 'fotos_productos/rodi3.jpg'),
('slidergty67', 7, 'REMO', 900, 'Chalco', 'Accesorio', 2, 'Sliders para Yamaha', 'Sliders para Yamaha Fz16, Szrr y Fazer 150 2011 2012 2013 2014 2015 ', 'fotos_productos/slider3.jpg', 'fotos_productos/slider1.jpg', 'fotos_productos/slider2.jpg'),
('swi54rt7', 4, 'Accesorios coco', 100, 'Cocotitlan', 'Accesorio', 2, 'Switch', 'Switch apagador, corta corriente para moto, o para luces led auxiliares o bocinas', 'fotos_productos/swi1.jpg', 'fotos_productos/swi2.jpg', 'fotos_productos/swi3.jpg'),
('tableft150', 5, 'REMO', 750, 'Chalco', 'Refaccion', 2, 'Tablero / Velocimetro', 'Tablero / Velocimetro para motocicleta Italika Ft150 y Ft150 Gt ', 'fotos_productos/tablero1.jpg', 'fotos_productos/tablero2.jpg', 'fotos_productos/tablero3.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos_factura`
--

CREATE TABLE `productos_factura` (
  `folio` varchar(200) NOT NULL,
  `codigo` varchar(50) NOT NULL,
  `cantidad` int(50) NOT NULL,
  `proveedor` varchar(50) NOT NULL,
  `precio` int(250) NOT NULL,
  `lugar_almacen` varchar(100) NOT NULL,
  `tipo_producto` varchar(50) NOT NULL,
  `id_login` int(20) NOT NULL,
  `id_usuario` int(20) NOT NULL,
  `nombre_producto` varchar(200) NOT NULL,
  `descripcion_producto` varchar(300) NOT NULL,
  `foto1` varchar(300) NOT NULL,
  `foto2` varchar(300) NOT NULL,
  `foto3` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `productos_factura`
--

INSERT INTO `productos_factura` (`folio`, `codigo`, `cantidad`, `proveedor`, `precio`, `lugar_almacen`, `tipo_producto`, `id_login`, `id_usuario`, `nombre_producto`, `descripcion_producto`, `foto1`, `foto2`, `foto3`) VALUES
('12256641David Martinez22', 'cabezaft150', 1, 'REMO', 1050, 'Chalco', 'Refaccion', 1, 2, 'Cabeza de cilindro ft150', 'Cabeza de cilindro completa Ft 150cc para motocicleta Italika ', 'fotos_productos/cabe1.jpg', 'fotos_productos/cabe2.jpg', 'fotos_productos/cabe3.jpg'),
('12256641David Martinez22', 'canwe34', 1, 'REMO', 158, 'Coco', 'Accesorio', 1, 2, 'Candado con alarma', 'Candado alta seguridad alarma sirena 110db Arco grande para motos ', 'fotos_productos/can1.jpg', 'fotos_productos/can2.jpg', 'fotos_productos/can3.jpg'),
('12256641David Martinez22', 'capungk12', 1, 'REMO', 63, 'Chalco', 'Refaccion', 1, 2, 'Capuchon de Bujia Ngk', 'Capuchon de Bujia Ngk Vd05f para Motocicletas', 'fotos_productos/capuchon1.jpg', 'fotos_productos/capuchon2.jpg', 'fotos_productos/capuchon3.jpg'),
('12256641David Martinez22', 'casc1', 1, 'Accesorios coco', 1365, 'Cocotitlan', 'Accesorio', 1, 2, 'Casco Jiekai', 'Casco para motociclista de cara completo visor dual con escudo colorido', 'fotos_productos/casco1.jpg', 'fotos_productos/casco2.jpg', 'fotos_productos/casco3.jpg'),
('22456432Belen Romo33', 'clutchft150', 1, 'REMO', 525, 'Chalco', 'Refaccion', 1, 3, 'Clutch completo Ft 150', 'Clutch completo Ft 150 para motocicletas Italika ', 'fotos_productos/clutch1.jpg', 'fotos_productos/clutch2.jpg', 'fotos_productos/clutch3.jpg'),
('12256641David Martinez22', 'filtrosen12', 1, 'REMO', 21, 'Chalco', 'Refaccion', 1, 2, 'Filtro de gasolina universal', 'Filtro de gasolina universal para motocicletas Italika, Honda y Yamaha ', 'fotos_productos/filtro1.jpg', 'fotos_productos/filtro2.jpg', 'fotos_productos/filtro3.jpg'),
('22456432Belen Romo33', 'moch277', 1, 'Accesorios Neza', 504, 'Chalco', 'Accesorio', 1, 3, 'Mochila (maletero)', 'Maletero para motociclista (Universal))', 'fotos_productos/maleta1.jpg', 'fotos_productos/maleta2.jpg', 'fotos_productos/maleta3.jpg'),
('22456432Belen Romo33', 'palancas34ert', 1, 'REMO', 945, 'Chalco', 'Refaccion', 1, 3, 'Palancas deportivas', 'Palancas deportivas universales de freno y clutch para motocicletas (tres presentaciones))', 'fotos_productos/palanca1.jpg', 'fotos_productos/palanca2.jpg', 'fotos_productos/palanca3.jpg');

--
-- Disparadores `productos_factura`
--
DELIMITER $$
CREATE TRIGGER `eliminar` AFTER INSERT ON `productos_factura` FOR EACH ROW DELETE FROM pedidos
$$
DELIMITER ;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `facturas`
--
ALTER TABLE `facturas`
  ADD PRIMARY KEY (`folio`),
  ADD KEY `id_login` (`id_login`);

--
-- Indices de la tabla `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`codigo`),
  ADD KEY `id_login` (`id_login`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`codigo`),
  ADD KEY `id_login` (`id_login`);

--
-- Indices de la tabla `productos_factura`
--
ALTER TABLE `productos_factura`
  ADD PRIMARY KEY (`codigo`),
  ADD KEY `folio` (`folio`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `login`
--
ALTER TABLE `login`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `facturas`
--
ALTER TABLE `facturas`
  ADD CONSTRAINT `facturas_ibfk_1` FOREIGN KEY (`id_login`) REFERENCES `login` (`id`);

--
-- Filtros para la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD CONSTRAINT `pedidos_ibfk_1` FOREIGN KEY (`id_login`) REFERENCES `login` (`id`);

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `productos_ibfk_1` FOREIGN KEY (`id_login`) REFERENCES `login` (`id`);

--
-- Filtros para la tabla `productos_factura`
--
ALTER TABLE `productos_factura`
  ADD CONSTRAINT `productos_factura_ibfk_1` FOREIGN KEY (`folio`) REFERENCES `facturas` (`folio`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
