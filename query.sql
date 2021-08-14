CREATE DATABASE cae_conna;
USE cae_conna;

CREATE TABLE `usuarios` (
  `id_usuarios` int(11) PRIMARY KEY AUTO_INCREMENT NOT NULL,
  `nombre` VARCHAR(250) NOT NULL,
  `apellido` VARCHAR(250) NOT NULL,
  `usuario` VARCHAR(250) NOT NULL,
  `contrasena` VARCHAR(250) NOT NULL,
  `id_rol` VARCHAR(250) NOT NULL
);
/* USUARIO DE EJEMPLO PARA INGRESAR AL SISTEMA */
/* 'user' 'root' */
INSERT INTO usuarios VALUES (
    '1',
    'user',
    'root',
    'Hector',
    'Díaz',
    '1'
);
CREATE TABLE `roles` (
  `id_rol` int(11) PRIMARY KEY AUTO_INCREMENT NOT NULL,
  `rol` VARCHAR(250) NOT NULL
);

CREATE TABLE `tipo_acogimiento` (
  `id_tipoAcogimiento` int(11) PRIMARY KEY AUTO_INCREMENT NOT NULL,
  `nombreAcogimiento` VARCHAR(250) NOT NULL
);

CREATE TABLE `persona` (
  `id_persona` int(11) PRIMARY KEY AUTO_INCREMENT NOT NULL,
  `nombre` VARCHAR(50) NOT NULL,
  `apellido` VARCHAR(50) NOT NULL,
  `edad` int(11) NOT NULL,
  `direccion` VARCHAR(250) NOT NULL
);

CREATE TABLE `observaciones_jena` (
  `id_observacionJENA` int(11) PRIMARY KEY AUTO_INCREMENT NOT NULL,
  `id_control` int(11) NOT NULL,
  `fechaObservacion` date NOT NULL,
  `descripcion` varchar(250) NOT NULL,
  `id_usuario` int(11) NOT NULL
);

CREATE TABLE `dias_prorroga` (
  `id_diasProrroga` int(11) PRIMARY KEY AUTO_INCREMENT NOT NULL,
  `numeroDias` int(11) NOT NULL
);

CREATE TABLE `control_cambio_medida` (
  `id_controlCambioMedida` int(11) PRIMARY KEY AUTO_INCREMENT NOT NULL,
  `id_control` int(11) NOT NULL,
  `id_cambioMedida` int(11) NOT NULL,
  `descripcion` VARCHAR(250) NOT NULL,
  `fechaCambioMedida` date NOT NULL,
  `id_diasProrroga` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL
);

CREATE TABLE `control` (
  `id_control` int(11) PRIMARY KEY AUTO_INCREMENT NOT NULL,
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
  `descripProcurador` VARCHAR(250) NOT NULL,
  `id_usuario` int(11) NOT NULL
);

CREATE TABLE `centro_acogimiento` (
  `id_centroAcogimiento` int(11) PRIMARY KEY AUTO_INCREMENT NOT NULL,
  `nombreCentroAcogimiento` varchar(250) NOT NULL,
  `informacion` varchar(250) NOT NULL
);

CREATE TABLE `cambio_medida` (
  `id_cambioMedida` int(11) PRIMARY KEY AUTO_INCREMENT NOT NULL,
  `nombreCambioMedida` varchar(250) NOT NULL
);