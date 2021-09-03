/*
SQLyog Community v13.1.5  (64 bit)
MySQL - 5.7.24 : Database - cae_conna
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`cae_conna` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `cae_conna`;

/*Table structure for table `bitacora_acceso` */

DROP TABLE IF EXISTS `bitacora_acceso`;

CREATE TABLE `bitacora_acceso` (
  `id_bitacora_acceso` bigint(20) NOT NULL AUTO_INCREMENT,
  `id_usuario` bigint(20) NOT NULL,
  `fecha_acceso` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `ip` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id_bitacora_acceso`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

/*Data for the table `bitacora_acceso` */

insert  into `bitacora_acceso`(`id_bitacora_acceso`,`id_usuario`,`fecha_acceso`,`ip`) values 
(1,2,'2021-08-26 06:55:04','127.0.0.1'),
(2,2,'2021-08-26 10:30:04','127.0.0.1'),
(3,2,'2021-08-26 10:32:25','127.0.0.1'),
(4,2,'2021-08-26 11:37:55','127.0.0.1'),
(5,2,'2021-08-26 11:47:37','127.0.0.1'),
(6,2,'2021-08-26 12:16:17','127.0.0.1'),
(7,2,'2021-08-26 12:20:59','127.0.0.1'),
(8,2,'2021-08-26 13:05:07','127.0.0.1'),
(9,2,'2021-08-27 13:14:05','127.0.0.1'),
(10,2,'2021-08-28 09:28:42','127.0.0.1');

/*Table structure for table `bitacora_accion` */

DROP TABLE IF EXISTS `bitacora_accion`;

CREATE TABLE `bitacora_accion` (
  `id_bitacora_accion` bigint(20) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(11) NOT NULL,
  `accion` enum('Insert','Update','Delete') NOT NULL,
  `fecha_accion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_bitacora_accion`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `bitacora_accion` */

/*Table structure for table `cambio_medida` */

DROP TABLE IF EXISTS `cambio_medida`;

CREATE TABLE `cambio_medida` (
  `id_cambioMedida` int(11) NOT NULL AUTO_INCREMENT,
  `nombreCambioMedida` varchar(250) NOT NULL,
  PRIMARY KEY (`id_cambioMedida`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `cambio_medida` */

/*Table structure for table `centro_acogimiento` */

DROP TABLE IF EXISTS `centro_acogimiento`;

CREATE TABLE `centro_acogimiento` (
  `id_centroAcogimiento` int(11) NOT NULL AUTO_INCREMENT,
  `nombreCentroAcogimiento` varchar(250) NOT NULL,
  `informacion` varchar(250) NOT NULL,
  PRIMARY KEY (`id_centroAcogimiento`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `centro_acogimiento` */

/*Table structure for table `control` */

DROP TABLE IF EXISTS `control`;

CREATE TABLE `control` (
  `id_control` int(11) NOT NULL AUTO_INCREMENT,
  `id_persona` int(11) NOT NULL,
  `n_expediente` int(11) NOT NULL,
  `fechaIngreso` date NOT NULL,
  `fechaMedida` date NOT NULL,
  `fechaVencimiento` date NOT NULL,
  `fechaNotificacion` date NOT NULL,
  `fechaSupervision` date NOT NULL,
  `trabajoSocial` date NOT NULL,
  `psicologia` date NOT NULL,
  `escucha` varchar(250) NOT NULL,
  `JENA` varchar(250) NOT NULL,
  `id_tipoAcogimiento` int(11) NOT NULL,
  `id_centroAcogimiento` int(11) NOT NULL,
  `procuradoria` varchar(250) NOT NULL,
  `descripAcogimiento` varchar(250) NOT NULL,
  `descripProcurador` varchar(250) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  PRIMARY KEY (`id_control`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `control` */

/*Table structure for table `control_cambio_medida` */

DROP TABLE IF EXISTS `control_cambio_medida`;

CREATE TABLE `control_cambio_medida` (
  `id_controlCambioMedida` int(11) NOT NULL AUTO_INCREMENT,
  `id_control` int(11) NOT NULL,
  `id_cambioMedida` int(11) NOT NULL,
  `descripcion` varchar(250) NOT NULL,
  `fechaCambioMedida` date NOT NULL,
  `id_diasProrroga` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  PRIMARY KEY (`id_controlCambioMedida`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `control_cambio_medida` */

/*Table structure for table `dias_prorroga` */

DROP TABLE IF EXISTS `dias_prorroga`;

CREATE TABLE `dias_prorroga` (
  `id_diasProrroga` int(11) NOT NULL AUTO_INCREMENT,
  `numeroDias` int(11) NOT NULL,
  PRIMARY KEY (`id_diasProrroga`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `dias_prorroga` */

/*Table structure for table `observaciones_jena` */

DROP TABLE IF EXISTS `observaciones_jena`;

CREATE TABLE `observaciones_jena` (
  `id_observacionJENA` int(11) NOT NULL AUTO_INCREMENT,
  `id_control` int(11) NOT NULL,
  `fechaObservacion` date NOT NULL,
  `descripcion` varchar(250) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  PRIMARY KEY (`id_observacionJENA`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `observaciones_jena` */

/*Table structure for table `persona` */

DROP TABLE IF EXISTS `persona`;

CREATE TABLE `persona` (
  `id_persona` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `edad` int(11) NOT NULL,
  `direccion` varchar(250) NOT NULL,
  PRIMARY KEY (`id_persona`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `persona` */

/*Table structure for table `roles` */

DROP TABLE IF EXISTS `roles`;

CREATE TABLE `roles` (
  `id_rol` int(11) NOT NULL AUTO_INCREMENT,
  `rol` varchar(250) NOT NULL,
  `estado` char(1) DEFAULT 'A',
  PRIMARY KEY (`id_rol`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `roles` */

insert  into `roles`(`id_rol`,`rol`,`estado`) values 
(1,'Administrador','A'),
(2,'Visualizador','A'),
(3,'','A');

/*Table structure for table `tipo_acogimiento` */

DROP TABLE IF EXISTS `tipo_acogimiento`;

CREATE TABLE `tipo_acogimiento` (
  `id_tipoAcogimiento` int(11) NOT NULL AUTO_INCREMENT,
  `nombreAcogimiento` varchar(250) NOT NULL,
  PRIMARY KEY (`id_tipoAcogimiento`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tipo_acogimiento` */

/*Table structure for table `usuarios` */

DROP TABLE IF EXISTS `usuarios`;

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(250) NOT NULL,
  `apellido` varchar(250) NOT NULL,
  `usuario` varchar(250) NOT NULL,
  `contrasena` varchar(250) NOT NULL,
  `id_rol` int(11) NOT NULL,
  `estado` char(1) NOT NULL DEFAULT 'A',
  PRIMARY KEY (`id_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `usuarios` */

insert  into `usuarios`(`id_usuario`,`nombre`,`apellido`,`usuario`,`contrasena`,`id_rol`,`estado`) values 
(1,'user','root','Hector','Díaz',1,'A'),
(2,'John','Doe','admin','3627909a29c31381a071ec27f7c9ca97726182aed29a7ddd2e54353322cfb30abb9e3a6df2ac2c20fe23436311d678564d0c8d305930575f60e2d3d048184d79',1,'A');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
