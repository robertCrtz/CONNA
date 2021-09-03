CREATE DATABASE cae_conna;
USE cae_conna;

CREATE TABLE `usuarios` (
  `usuarioId` int(11) PRIMARY KEY AUTO_INCREMENT NOT NULL,
  `nombresUsuario` VARCHAR(250) NOT NULL,
  `apellidosUsuario` VARCHAR(250) NOT NULL,
  `usuario` VARCHAR(250) NOT NULL,
  `contrasena` VARCHAR(250) NOT NULL,
  `rolId` VARCHAR(250) NOT NULL
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
  `rolId` int(11) PRIMARY KEY AUTO_INCREMENT NOT NULL,
  `rol` VARCHAR(250) NOT NULL
);
/* ROL DE EJEMPLO PARA INGRESAR AL SISTEMA */
INSERT INTO roles VALUES (
    '1',
    'Administrador'
);

CREATE TABLE `tipoAcogimiento` (
  `tipoAcogimientoId` int(11) PRIMARY KEY AUTO_INCREMENT NOT NULL,
  `nombreAcogimiento` VARCHAR(250) NOT NULL
);
/* TIPO DE ACOGIMIENTO DE EJEMPLO PARA INGRESAR AL SISTEMA */
INSERT INTO tipoAcogimiento VALUES (
    '1',
    'Familiar'
);

CREATE TABLE `personas` (
  `personaId` int(11) PRIMARY KEY AUTO_INCREMENT NOT NULL,
  `nombresPersona` VARCHAR(50) NOT NULL,
  `apellidosPersona` VARCHAR(50) NOT NULL,
  `edad` int(11) NOT NULL,
  `direccion` VARCHAR(250) NOT NULL
);

CREATE TABLE `observacionesJena` (
  `observacionJENAId` int(11) PRIMARY KEY AUTO_INCREMENT NOT NULL,
  `controlId` int(11) NOT NULL,
  `fechaObservacion` date NOT NULL,
  `descripcion` varchar(250) NOT NULL,
  `usuarioId` int(11) NOT NULL
);

CREATE TABLE `diasProrroga` (
  `diasProrrogaId` int(11) PRIMARY KEY AUTO_INCREMENT NOT NULL,
  `nDias` int(11) NOT NULL
);

CREATE TABLE `controlCambioMedida` (
  `controlCambioMedidaId` int(11) PRIMARY KEY AUTO_INCREMENT NOT NULL,
  `controlId` int(11) NOT NULL,
  `cambioMedidaId` int(11) NOT NULL,
  `descripcion` VARCHAR(250) NOT NULL,
  `fechaCambioMedida` date NOT NULL,
  `diasProrrogaId` int(11) NOT NULL,
  `usuarioId` int(11) NOT NULL
);

CREATE TABLE `control` (
  `controlId` int(11) PRIMARY KEY AUTO_INCREMENT NOT NULL,
  `personaId` int(11) NOT NULL,
  `nExpediente` int(11) NOT NULL,
  `fechaIngreso` date NOT NULL,
  `fechaMedida` date NOT NULL,
  `fechaVencimiento` date NOT NULL,
  `fechaNotificacion` date NOT NULL,
  `fechaSupervision` date NOT NULL,
  `fechaTrabajoSocial` date NOT NULL,
  `fechaPsicologia` date NOT NULL,
  `escucha` varchar(250) NOT NULL,
  `JENA` varchar(250) NOT NULL,
  `tipoAcogimientoId` int(11) NOT NULL,
  `centroAcogimientoId` int(11) NOT NULL,
  `procuradoria` varchar(250) NOT NULL,
  `descripAcogimiento` varchar(250) NOT NULL,
  `descripProcurador` VARCHAR(250) NOT NULL,
  `usuarioId` int(11) NOT NULL
);

CREATE TABLE `centroAcogimiento` (
  `centroAcogimientoId` int(11) PRIMARY KEY AUTO_INCREMENT NOT NULL,
  `nombreCentroAcogimiento` varchar(250) NOT NULL,
  `informacion` varchar(250) NOT NULL
);
/* CENTRO DE ACOGIMIENTO DE EJEMPLO PARA INGRESAR AL SISTEMA */
INSERT INTO centroAcogimiento VALUES (
    '1',
    'San Salvador',
    'Sede de la capital'
);

CREATE TABLE `cambioMedida` (
  `cambioMedidaId` int(11) PRIMARY KEY AUTO_INCREMENT NOT NULL,
  `nombreCambioMedida` varchar(250) NOT NULL
);