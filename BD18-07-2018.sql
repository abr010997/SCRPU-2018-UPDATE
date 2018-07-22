/*
SQLyog Ultimate v9.02 
MySQL - 5.5.5-10.1.25-MariaDB : Database - pu_ingenieria
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`pu_ingenieria` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `pu_ingenieria`;

/*Table structure for table `pu00estados` */

DROP TABLE IF EXISTS `pu00estados`;

CREATE TABLE `pu00estados` (
  `PUIDESTADO` int(11) NOT NULL,
  `PUDESCESTA` varchar(30) NOT NULL,
  PRIMARY KEY (`PUIDESTADO`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `pu00estados` */

LOCK TABLES `pu00estados` WRITE;

insert  into `pu00estados`(`PUIDESTADO`,`PUDESCESTA`) values (1,'INGRESADO'),(2,'INSPECCIONADO'),(3,'ACEPTADO'),(4,'DENEGADO'),(5,'ELIMINADO'),(6,'RETRASADO'),(7,'OFICINA '),(8,'REVISION');

UNLOCK TABLES;

/*Table structure for table `pu01regusu` */

DROP TABLE IF EXISTS `pu01regusu`;

CREATE TABLE `pu01regusu` (
  `PU01CEDUSU` int(11) NOT NULL,
  `PU01NOMUSU` varchar(30) CHARACTER SET latin1 NOT NULL,
  `PU01APE1USU` varchar(30) CHARACTER SET latin1 NOT NULL,
  `PU01APE2USU` varchar(30) CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`PU01CEDUSU`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `pu01regusu` */

LOCK TABLES `pu01regusu` WRITE;

insert  into `pu01regusu`(`PU01CEDUSU`,`PU01NOMUSU`,`PU01APE1USU`,`PU01APE2USU`) values (123,'Alberto  ','Espinoza  ','OrtÃ­z  '),(365363,'Abraham','Obando ','Villegas'),(5645645,'MarÃ­a','AlpÃ­zar','RodrÃ­guez'),(50321000,'MarÃ­','Alvarado ','RodrÃ­guez '),(504180821,'Alberth','Esquivel','Alvarado'),(2147483647,'OriÃaÃº ','LhgiÃ³   ','OhgoihgÃ¡ ');

UNLOCK TABLES;

/*Table structure for table `pu02infusu` */

DROP TABLE IF EXISTS `pu02infusu`;

CREATE TABLE `pu02infusu` (
  `PU01CEDUSU` int(11) NOT NULL,
  `PU02TELUSU` varchar(30) CHARACTER SET latin1 NOT NULL,
  `PU02CORUSU` varchar(100) CHARACTER SET latin1 NOT NULL,
  `PU03IDPUES` int(11) NOT NULL,
  `PU02USUARIO` varchar(30) CHARACTER SET latin1 NOT NULL,
  `PU02CLAVE` varchar(30) CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`PU01CEDUSU`),
  KEY `FK_PU03IDPUES` (`PU03IDPUES`),
  CONSTRAINT `FK_PU01CEDUSU` FOREIGN KEY (`PU01CEDUSU`) REFERENCES `pu01regusu` (`PU01CEDUSU`),
  CONSTRAINT `FK_PU03IDPUES` FOREIGN KEY (`PU03IDPUES`) REFERENCES `pu03puestos` (`PU03IDPUES`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `pu02infusu` */

LOCK TABLES `pu02infusu` WRITE;

insert  into `pu02infusu`(`PU01CEDUSU`,`PU02TELUSU`,`PU02CORUSU`,`PU03IDPUES`,`PU02USUARIO`,`PU02CLAVE`) values (123,'909010','Arubato@ ',1,'Aru','123'),(365363,'34567879','Abraham@',1,'Abrahambov','Abr298393'),(5645645,'786876','Afaf@',1,'Adlkjadjk','Jkiausd078'),(50321000,'456678','Asfgh@',3,'Fgjbvvch','Cchbbb'),(504180821,'86933679','Alberth@',1,'admin','123'),(2147483647,'07860986098','Jhbljh',1,'Lhglhj','Gjhghj');

UNLOCK TABLES;

/*Table structure for table `pu03puestos` */

DROP TABLE IF EXISTS `pu03puestos`;

CREATE TABLE `pu03puestos` (
  `PU03IDPUES` int(11) NOT NULL,
  `PU03PUESTO` varchar(30) CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`PU03IDPUES`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `pu03puestos` */

LOCK TABLES `pu03puestos` WRITE;

insert  into `pu03puestos`(`PU03IDPUES`,`PU03PUESTO`) values (1,'Administrador'),(2,'Coordinador'),(3,'Asistente'),(4,'Auxiliar'),(5,'Alcalde(sa)'),(6,'Prueba :v');

UNLOCK TABLES;

/*Table structure for table `pu04distrito` */

DROP TABLE IF EXISTS `pu04distrito`;

CREATE TABLE `pu04distrito` (
  `PU04IDDISTRITO` int(11) NOT NULL,
  `PU04DESCRIPDIS` varchar(30) CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`PU04IDDISTRITO`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `pu04distrito` */

LOCK TABLES `pu04distrito` WRITE;

insert  into `pu04distrito`(`PU04IDDISTRITO`,`PU04DESCRIPDIS`) values (0,'Seleccione'),(1,'Nicoya'),(2,'Mansión'),(3,'San Antonio'),(4,'Quebrada Honda'),(5,'Sámara'),(6,'Nosara'),(7,'Belén');

UNLOCK TABLES;

/*Table structure for table `pu04fototerreno` */

DROP TABLE IF EXISTS `pu04fototerreno`;

CREATE TABLE `pu04fototerreno` (
  `PU04IDTRA` int(11) NOT NULL,
  `PU04RUTAIMAGEN` varchar(200) NOT NULL,
  PRIMARY KEY (`PU04IDTRA`),
  CONSTRAINT `FK_PU04RUTAIMAGEN` FOREIGN KEY (`PU04IDTRA`) REFERENCES `pu04tramite1` (`PU04IDTRA`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `pu04fototerreno` */

LOCK TABLES `pu04fototerreno` WRITE;

UNLOCK TABLES;

/*Table structure for table `pu04observacionrevisiontramite` */

DROP TABLE IF EXISTS `pu04observacionrevisiontramite`;

CREATE TABLE `pu04observacionrevisiontramite` (
  `pu04idobservacion` int(11) NOT NULL AUTO_INCREMENT,
  `PU04IDTRA` int(11) NOT NULL,
  `pu4504descripcionobservacion` varchar(500) NOT NULL,
  PRIMARY KEY (`pu04idobservacion`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `pu04observacionrevisiontramite` */

LOCK TABLES `pu04observacionrevisiontramite` WRITE;

UNLOCK TABLES;

/*Table structure for table `pu04regtra` */

DROP TABLE IF EXISTS `pu04regtra`;

CREATE TABLE `pu04regtra` (
  `PU04IDTRA` int(11) NOT NULL,
  `PU04FETRA` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `PU04NORTE` int(11) NOT NULL,
  `PU04ESTE` int(11) NOT NULL,
  `PU04ALTITUD` int(11) NOT NULL,
  PRIMARY KEY (`PU04IDTRA`),
  CONSTRAINT `pu04regtra_ibfk_1` FOREIGN KEY (`PU04IDTRA`) REFERENCES `pu04tramite1` (`PU04IDTRA`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `pu04regtra` */

LOCK TABLES `pu04regtra` WRITE;

insert  into `pu04regtra`(`PU04IDTRA`,`PU04FETRA`,`PU04NORTE`,`PU04ESTE`,`PU04ALTITUD`) values (1,'2018-05-27 20:57:34',123,123,432),(4,'2018-06-01 09:22:25',1234,4321,44423),(60871,'2018-06-01 10:12:24',109207,330645,36),(62135,'2018-07-06 09:41:17',1121619,341590,117),(123445,'2018-06-14 08:07:13',4452,3342,1121);

UNLOCK TABLES;

/*Table structure for table `pu04tramite1` */

DROP TABLE IF EXISTS `pu04tramite1`;

CREATE TABLE `pu04tramite1` (
  `PU04IDTRA` int(11) NOT NULL,
  `PU0INDICETRA` int(20) NOT NULL AUTO_INCREMENT,
  `PU04FEINICIO` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `PUIDESTADO` int(11) NOT NULL,
  PRIMARY KEY (`PU0INDICETRA`,`PU04IDTRA`),
  KEY `PU04IDTRA` (`PU04IDTRA`),
  KEY `PUIDESTADO` (`PUIDESTADO`),
  CONSTRAINT `pu04tramite1_ibfk_1` FOREIGN KEY (`PUIDESTADO`) REFERENCES `pu00estados` (`PUIDESTADO`)
) ENGINE=InnoDB AUTO_INCREMENT=159 DEFAULT CHARSET=latin1;

/*Data for the table `pu04tramite1` */

LOCK TABLES `pu04tramite1` WRITE;

insert  into `pu04tramite1`(`PU04IDTRA`,`PU0INDICETRA`,`PU04FEINICIO`,`PUIDESTADO`) values (1,152,'2018-05-27 20:57:20',7),(2,153,'2018-05-31 22:01:39',1),(3,154,'2018-05-31 22:04:27',1),(4,155,'2018-06-01 09:22:02',7),(60871,156,'2018-06-01 10:00:33',7),(123445,157,'2018-06-14 08:06:41',7),(62135,158,'2018-07-06 09:40:30',7);

UNLOCK TABLES;

/*Table structure for table `pu04tramite1observaciones` */

DROP TABLE IF EXISTS `pu04tramite1observaciones`;

CREATE TABLE `pu04tramite1observaciones` (
  `PU04IDTRA` int(11) NOT NULL,
  `PU04OBSERVACIONES` varchar(300) CHARACTER SET latin1 NOT NULL,
  KEY `FK_pu04tramite1Observaciones` (`PU04IDTRA`),
  CONSTRAINT `FK_pu04tramite1Observaciones` FOREIGN KEY (`PU04IDTRA`) REFERENCES `pu04tramite1` (`PU04IDTRA`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `pu04tramite1observaciones` */

LOCK TABLES `pu04tramite1observaciones` WRITE;

UNLOCK TABLES;

/*Table structure for table `pu04tramite2` */

DROP TABLE IF EXISTS `pu04tramite2`;

CREATE TABLE `pu04tramite2` (
  `PU04IDTRA` int(11) NOT NULL,
  `PU04FEPLATAFOR` datetime NOT NULL,
  `PU04IDDISTRITO` int(11) NOT NULL,
  PRIMARY KEY (`PU04IDTRA`),
  KEY `FK_PU04TRAMITE3` (`PU04IDDISTRITO`),
  CONSTRAINT `FK_PU04TRAMITE2` FOREIGN KEY (`PU04IDTRA`) REFERENCES `pu04tramite1` (`PU04IDTRA`),
  CONSTRAINT `FK_PU04TRAMITE3` FOREIGN KEY (`PU04IDDISTRITO`) REFERENCES `pu04distrito` (`PU04IDDISTRITO`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `pu04tramite2` */

LOCK TABLES `pu04tramite2` WRITE;

insert  into `pu04tramite2`(`PU04IDTRA`,`PU04FEPLATAFOR`,`PU04IDDISTRITO`) values (1,'2018-05-27 00:00:00',1),(2,'2018-05-31 00:00:00',1),(3,'2018-05-31 00:00:00',1),(4,'2018-06-01 00:00:00',1),(60871,'2018-05-21 00:00:00',5),(62135,'2018-06-25 00:00:00',1),(123445,'2018-06-14 00:00:00',1);

UNLOCK TABLES;

/*Table structure for table `pu05unitra` */

DROP TABLE IF EXISTS `pu05unitra`;

CREATE TABLE `pu05unitra` (
  `PU04IDTRA` int(11) NOT NULL,
  `PU06IDACTDES` int(11) NOT NULL,
  KEY `FK_PU04IDTRAUNITRA` (`PU04IDTRA`),
  KEY `FK_PU06IDACTDESUNITRA` (`PU06IDACTDES`),
  CONSTRAINT `FK_PU06IDACTDESUNITRA` FOREIGN KEY (`PU06IDACTDES`) REFERENCES `pu06actdes` (`PU06IDACTDES`),
  CONSTRAINT `pu05unitra_ibfk_1` FOREIGN KEY (`PU04IDTRA`) REFERENCES `pu04regtra` (`PU04IDTRA`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `pu05unitra` */

LOCK TABLES `pu05unitra` WRITE;

UNLOCK TABLES;

/*Table structure for table `pu06actdes` */

DROP TABLE IF EXISTS `pu06actdes`;

CREATE TABLE `pu06actdes` (
  `PU06IDACTDES` int(11) NOT NULL,
  `PU06DESAD` varchar(50) CHARACTER SET latin1 NOT NULL,
  `PU06IDTIPO` int(11) DEFAULT NULL,
  PRIMARY KEY (`PU06IDACTDES`),
  KEY `FK_pu06actdes` (`PU06IDTIPO`),
  CONSTRAINT `FK_pu06actdes` FOREIGN KEY (`PU06IDTIPO`) REFERENCES `pu06tipoactivi` (`PU06IDTIPO`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `pu06actdes` */

LOCK TABLES `pu06actdes` WRITE;

insert  into `pu06actdes`(`PU06IDACTDES`,`PU06DESAD`,`PU06IDTIPO`) values (1,'Residencial',1),(2,'ConstrucciÃ³n Vivienda Unifamiliar',1),(3,'ConstrucciÃ³n Apartamentos',1),(4,'RemodelaciÃ³n/AmpliaciÃ³n',1),(5,'Desarrollos',2),(6,'UrbanizaciÃ³n',2),(7,'Residencial',2),(8,'Proyecto de Interes Social',2),(9,'Condominios',2),(10,'UrbanizaciÃ³n con Diferentes Fincas',2),(11,'Comercial',3),(12,'Permiso Funcionamiento Sanitario',3),(13,'Patente Nueva',3),(14,'Patente RenovaciÃ³n',3),(15,'Eventos PÃºblicos',3),(16,'Comercial-Industrial',4),(17,'ConstrucciÃ³n de Comercio',4),(18,'ConstrucciÃ³n de Industria',4),(19,'EstaciÃ³n de Servicio',5),(20,'Tanque de Almacenamiento',5),(21,'Expendio de Combustible',5),(22,'Institucional',5),(23,'ConstrucciÃ³n de Vivienda de Bono',5),(24,'Constancia de aptitud de Terreno',5),(25,'Otro Uso',1),(26,'Otro Uso',2),(27,'Otro Uso',3),(28,'Otro Uso',4),(29,'Otro Uso',5);

UNLOCK TABLES;

/*Table structure for table `pu06observaciones` */

DROP TABLE IF EXISTS `pu06observaciones`;

CREATE TABLE `pu06observaciones` (
  `PU04IDTRA` int(11) NOT NULL,
  `PU06OBSERVACIONES` varchar(50) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `pu06observaciones` */

LOCK TABLES `pu06observaciones` WRITE;

UNLOCK TABLES;

/*Table structure for table `pu06observacionescomercial` */

DROP TABLE IF EXISTS `pu06observacionescomercial`;

CREATE TABLE `pu06observacionescomercial` (
  `PU04IDTRA` int(11) NOT NULL,
  `PU06OBSERVACIONESCOMER` varchar(50) NOT NULL,
  KEY `FK_pu06observacionesComercial` (`PU04IDTRA`),
  CONSTRAINT `FK_pu06observacionesComercial` FOREIGN KEY (`PU04IDTRA`) REFERENCES `pu04tramite1` (`PU04IDTRA`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `pu06observacionescomercial` */

LOCK TABLES `pu06observacionescomercial` WRITE;

UNLOCK TABLES;

/*Table structure for table `pu06observacionescomerindustrial` */

DROP TABLE IF EXISTS `pu06observacionescomerindustrial`;

CREATE TABLE `pu06observacionescomerindustrial` (
  `PU04IDTRA` int(11) NOT NULL,
  `PU06OBSERVACIONES` varchar(300) NOT NULL,
  PRIMARY KEY (`PU04IDTRA`),
  CONSTRAINT `FK_PU06OBSERVACIONESCOMERINDUSTRIAL` FOREIGN KEY (`PU04IDTRA`) REFERENCES `pu04tramite1` (`PU04IDTRA`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `pu06observacionescomerindustrial` */

LOCK TABLES `pu06observacionescomerindustrial` WRITE;

UNLOCK TABLES;

/*Table structure for table `pu06observacionesdesarrollo` */

DROP TABLE IF EXISTS `pu06observacionesdesarrollo`;

CREATE TABLE `pu06observacionesdesarrollo` (
  `PU04IDTRA` int(11) NOT NULL,
  `PU06OBSERVACIONES` varchar(50) NOT NULL,
  KEY `FK_pu06observacionesDesarrollo` (`PU04IDTRA`),
  CONSTRAINT `FK_pu06observacionesDesarrollo` FOREIGN KEY (`PU04IDTRA`) REFERENCES `pu04tramite1` (`PU04IDTRA`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `pu06observacionesdesarrollo` */

LOCK TABLES `pu06observacionesdesarrollo` WRITE;

UNLOCK TABLES;

/*Table structure for table `pu06observacionesestacion` */

DROP TABLE IF EXISTS `pu06observacionesestacion`;

CREATE TABLE `pu06observacionesestacion` (
  `PU04IDTRA` int(11) NOT NULL,
  `PU06OBSERVACIONES` varchar(300) NOT NULL,
  PRIMARY KEY (`PU04IDTRA`),
  CONSTRAINT `FK_PU06OBSERVACIONESESTACION` FOREIGN KEY (`PU04IDTRA`) REFERENCES `pu04tramite1` (`PU04IDTRA`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `pu06observacionesestacion` */

LOCK TABLES `pu06observacionesestacion` WRITE;

UNLOCK TABLES;

/*Table structure for table `pu06observacionesresidencial` */

DROP TABLE IF EXISTS `pu06observacionesresidencial`;

CREATE TABLE `pu06observacionesresidencial` (
  `PU04IDTRA` int(11) NOT NULL,
  `PU06OBSERVACIONES` varchar(300) NOT NULL,
  PRIMARY KEY (`PU04IDTRA`),
  CONSTRAINT `FK_PU04IDTRA` FOREIGN KEY (`PU04IDTRA`) REFERENCES `pu04tramite1` (`PU04IDTRA`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `pu06observacionesresidencial` */

LOCK TABLES `pu06observacionesresidencial` WRITE;

UNLOCK TABLES;

/*Table structure for table `pu06tipoactivi` */

DROP TABLE IF EXISTS `pu06tipoactivi`;

CREATE TABLE `pu06tipoactivi` (
  `PU06IDTIPO` int(11) NOT NULL,
  `PU06DESADTIPO` varchar(30) CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`PU06IDTIPO`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `pu06tipoactivi` */

LOCK TABLES `pu06tipoactivi` WRITE;

insert  into `pu06tipoactivi`(`PU06IDTIPO`,`PU06DESADTIPO`) values (1,'RESIDENCIAL'),(2,'DESARROLLOS'),(3,'COMERCIAL'),(4,'COMERCIAL-INDUSTRIAL'),(5,'ESTACION DE SERVICIOS');

UNLOCK TABLES;

/*Table structure for table `pu06tracomercial` */

DROP TABLE IF EXISTS `pu06tracomercial`;

CREATE TABLE `pu06tracomercial` (
  `PU04IDTRA` int(11) NOT NULL,
  `PU06IDACTDES` int(11) NOT NULL,
  KEY `FK_PU06TRACOMERCIAL` (`PU06IDACTDES`),
  KEY `FK_PU06TRACOMERCIALTRAMITE` (`PU04IDTRA`),
  CONSTRAINT `FK_PU06TRACOMERCIAL` FOREIGN KEY (`PU06IDACTDES`) REFERENCES `pu06actdes` (`PU06IDACTDES`),
  CONSTRAINT `FK_PU06TRACOMERCIALTRAMITE` FOREIGN KEY (`PU04IDTRA`) REFERENCES `pu04regtra` (`PU04IDTRA`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `pu06tracomercial` */

LOCK TABLES `pu06tracomercial` WRITE;

insert  into `pu06tracomercial`(`PU04IDTRA`,`PU06IDACTDES`) values (1,27),(4,11),(4,12),(123445,11),(123445,13);

UNLOCK TABLES;

/*Table structure for table `pu06tracomercial_industrial` */

DROP TABLE IF EXISTS `pu06tracomercial_industrial`;

CREATE TABLE `pu06tracomercial_industrial` (
  `PU04IDTRA` int(11) NOT NULL,
  `PU06IDACTDES` int(11) NOT NULL,
  KEY `FK_PU06TRACOMERCIAL_INDUSTRIAL` (`PU06IDACTDES`),
  KEY `FK_PU06TRACOMERCIAL_INDUSTRIALTRAMITE` (`PU04IDTRA`),
  CONSTRAINT `FK_PU06TRACOMERCIAL_INDUSTRIAL` FOREIGN KEY (`PU06IDACTDES`) REFERENCES `pu06actdes` (`PU06IDACTDES`),
  CONSTRAINT `FK_PU06TRACOMERCIAL_INDUSTRIALTRAMITE` FOREIGN KEY (`PU04IDTRA`) REFERENCES `pu04regtra` (`PU04IDTRA`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `pu06tracomercial_industrial` */

LOCK TABLES `pu06tracomercial_industrial` WRITE;

insert  into `pu06tracomercial_industrial`(`PU04IDTRA`,`PU06IDACTDES`) values (1,28),(4,16),(4,17),(123445,16),(123445,17),(62135,17);

UNLOCK TABLES;

/*Table structure for table `pu06tradesarrollos` */

DROP TABLE IF EXISTS `pu06tradesarrollos`;

CREATE TABLE `pu06tradesarrollos` (
  `PU04IDTRA` int(11) NOT NULL,
  `PU06IDACTDES` int(11) NOT NULL,
  KEY `FK_PU06TRADESARROLLOS` (`PU06IDACTDES`),
  KEY `FK_PU06TRADESARROLLOSTRAMITE` (`PU04IDTRA`),
  CONSTRAINT `FK_PU06TRADESARROLLOS` FOREIGN KEY (`PU06IDACTDES`) REFERENCES `pu06actdes` (`PU06IDACTDES`),
  CONSTRAINT `FK_PU06TRADESARROLLOSTRAMITE` FOREIGN KEY (`PU04IDTRA`) REFERENCES `pu04regtra` (`PU04IDTRA`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `pu06tradesarrollos` */

LOCK TABLES `pu06tradesarrollos` WRITE;

insert  into `pu06tradesarrollos`(`PU04IDTRA`,`PU06IDACTDES`) values (1,5),(1,6),(1,7),(4,5),(4,6),(123445,5),(123445,7);

UNLOCK TABLES;

/*Table structure for table `pu06traestacionservicios` */

DROP TABLE IF EXISTS `pu06traestacionservicios`;

CREATE TABLE `pu06traestacionservicios` (
  `PU04IDTRA` int(11) NOT NULL,
  `PU06IDACTDES` int(11) NOT NULL,
  KEY `FK_PU06TRAESTACIONSERVICIOS` (`PU06IDACTDES`),
  KEY `FK_PU06TRAESTACIONSERVICIOSTRAMITE` (`PU04IDTRA`),
  CONSTRAINT `FK_PU06TRAESTACIONSERVICIOS` FOREIGN KEY (`PU06IDACTDES`) REFERENCES `pu06actdes` (`PU06IDACTDES`),
  CONSTRAINT `FK_PU06TRAESTACIONSERVICIOSTRAMITE` FOREIGN KEY (`PU04IDTRA`) REFERENCES `pu04regtra` (`PU04IDTRA`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `pu06traestacionservicios` */

LOCK TABLES `pu06traestacionservicios` WRITE;

insert  into `pu06traestacionservicios`(`PU04IDTRA`,`PU06IDACTDES`) values (1,19),(1,24),(4,19),(4,23),(123445,19),(123445,20);

UNLOCK TABLES;

/*Table structure for table `pu06traresidencial` */

DROP TABLE IF EXISTS `pu06traresidencial`;

CREATE TABLE `pu06traresidencial` (
  `PU04IDTRA` int(11) NOT NULL,
  `PU06IDACTDES` int(11) NOT NULL,
  KEY `FK_PU06RESIDENCIAL` (`PU06IDACTDES`),
  KEY `FK_PU06RESIDENCIALTRAMITE` (`PU04IDTRA`),
  CONSTRAINT `FK_PU06RESIDENCIAL` FOREIGN KEY (`PU06IDACTDES`) REFERENCES `pu06actdes` (`PU06IDACTDES`),
  CONSTRAINT `FK_PU06RESIDENCIALTRAMITE` FOREIGN KEY (`PU04IDTRA`) REFERENCES `pu04regtra` (`PU04IDTRA`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `pu06traresidencial` */

LOCK TABLES `pu06traresidencial` WRITE;

insert  into `pu06traresidencial`(`PU04IDTRA`,`PU06IDACTDES`) values (1,1),(1,2),(1,3),(4,1),(4,2),(60871,2),(123445,1),(123445,2);

UNLOCK TABLES;

/*Table structure for table `pu07terrft` */

DROP TABLE IF EXISTS `pu07terrft`;

CREATE TABLE `pu07terrft` (
  `PU07IDTFR` int(11) NOT NULL,
  `PU07NOMTFR` varchar(30) CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`PU07IDTFR`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `pu07terrft` */

LOCK TABLES `pu07terrft` WRITE;

insert  into `pu07terrft`(`PU07IDTFR`,`PU07NOMTFR`) values (1,'Calle Nacional'),(2,'Ruta Cantonal'),(3,'Servidumbre AgrÃ­cola');

UNLOCK TABLES;

/*Table structure for table `pu07traterrft` */

DROP TABLE IF EXISTS `pu07traterrft`;

CREATE TABLE `pu07traterrft` (
  `PU04IDTRA` int(11) NOT NULL,
  `PU07IDTFR` int(11) NOT NULL,
  KEY `FK_PU07IDTFRTRAT` (`PU07IDTFR`),
  KEY `PU04IDTRA` (`PU04IDTRA`),
  CONSTRAINT `FK_PU07IDTFRTRAT` FOREIGN KEY (`PU07IDTFR`) REFERENCES `pu07terrft` (`PU07IDTFR`),
  CONSTRAINT `pu07traterrft_ibfk_1` FOREIGN KEY (`PU04IDTRA`) REFERENCES `pu04regtra` (`PU04IDTRA`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `pu07traterrft` */

LOCK TABLES `pu07traterrft` WRITE;

UNLOCK TABLES;

/*Table structure for table `pu09desceg` */

DROP TABLE IF EXISTS `pu09desceg`;

CREATE TABLE `pu09desceg` (
  `PU09IDDEG` int(11) NOT NULL,
  `PU09DESCREG` varchar(50) CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`PU09IDDEG`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `pu09desceg` */

LOCK TABLES `pu09desceg` WRITE;

insert  into `pu09desceg`(`PU09IDDEG`,`PU09DESCREG`) values (1,'TopografÃ­a Plana'),(2,'TopografÃ­a Semiplana'),(3,'TopografÃ­a con Depresiones'),(4,'TopografÃ­a Irregular'),(5,'Existe Movimiento Tierra'),(6,'Futuro Movimiento Tierra'),(7,'Otros');

UNLOCK TABLES;

/*Table structure for table `pu09observaciones` */

DROP TABLE IF EXISTS `pu09observaciones`;

CREATE TABLE `pu09observaciones` (
  `PU04IDTRA` int(11) NOT NULL,
  `PU09OBSERVACIONES` varchar(50) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `pu09observaciones` */

LOCK TABLES `pu09observaciones` WRITE;

UNLOCK TABLES;

/*Table structure for table `pu09tradeg` */

DROP TABLE IF EXISTS `pu09tradeg`;

CREATE TABLE `pu09tradeg` (
  `PU04IDTRA` int(11) NOT NULL,
  `PU09IDDEG` int(11) NOT NULL,
  KEY `FK_PU09IDDEGREGTRA` (`PU04IDTRA`),
  KEY `FK_PU06IDACTDESDESCEG` (`PU09IDDEG`),
  CONSTRAINT `FK_PU06IDACTDESDESCEG` FOREIGN KEY (`PU09IDDEG`) REFERENCES `pu09desceg` (`PU09IDDEG`),
  CONSTRAINT `pu09tradeg_ibfk_1` FOREIGN KEY (`PU04IDTRA`) REFERENCES `pu04regtra` (`PU04IDTRA`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `pu09tradeg` */

LOCK TABLES `pu09tradeg` WRITE;

insert  into `pu09tradeg`(`PU04IDTRA`,`PU09IDDEG`) values (1,1),(1,2),(1,3),(1,4),(1,6),(4,1),(4,6),(60871,1),(123445,2),(123445,4),(123445,6),(62135,1);

UNLOCK TABLES;

/*Table structure for table `pu10aspbio` */

DROP TABLE IF EXISTS `pu10aspbio`;

CREATE TABLE `pu10aspbio` (
  `PU10IDASBIO` int(11) NOT NULL,
  `PU10DESCABIO` varchar(30) CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`PU10IDASBIO`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `pu10aspbio` */

LOCK TABLES `pu10aspbio` WRITE;

insert  into `pu10aspbio`(`PU10IDASBIO`,`PU10DESCABIO`) values (1,'VegetaciÃ³n JardÃ­n'),(2,'VegetaciÃ³n Tipo Pasto'),(3,'Ãrboles Dispersos'),(4,'Bosque Primario'),(5,'Bosque Secundario'),(6,'Zonas Boscosas'),(7,'Otros');

UNLOCK TABLES;

/*Table structure for table `pu10observaciones` */

DROP TABLE IF EXISTS `pu10observaciones`;

CREATE TABLE `pu10observaciones` (
  `PU04IDTRA` int(11) NOT NULL,
  `PU10OBSERVACIONES` varchar(50) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `pu10observaciones` */

LOCK TABLES `pu10observaciones` WRITE;

UNLOCK TABLES;

/*Table structure for table `pu11uniabio` */

DROP TABLE IF EXISTS `pu11uniabio`;

CREATE TABLE `pu11uniabio` (
  `PU04IDTRA` int(11) NOT NULL,
  `PU10IDASBIO` int(11) NOT NULL,
  KEY `FK_PU10IDASBIOREGTRA` (`PU04IDTRA`),
  KEY `FK_PU10IDASBIOASPBIO` (`PU10IDASBIO`),
  CONSTRAINT `FK_PU10IDASBIOASPBIO` FOREIGN KEY (`PU10IDASBIO`) REFERENCES `pu10aspbio` (`PU10IDASBIO`),
  CONSTRAINT `pu11uniabio_ibfk_1` FOREIGN KEY (`PU04IDTRA`) REFERENCES `pu04regtra` (`PU04IDTRA`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `pu11uniabio` */

LOCK TABLES `pu11uniabio` WRITE;

insert  into `pu11uniabio`(`PU04IDTRA`,`PU10IDASBIO`) values (1,1),(4,1),(4,3),(60871,3),(123445,2),(123445,6),(62135,1);

UNLOCK TABLES;

/*Table structure for table `pu11uniabiootros` */

DROP TABLE IF EXISTS `pu11uniabiootros`;

CREATE TABLE `pu11uniabiootros` (
  `PU04IDTRA` int(11) NOT NULL,
  `PU11asbiodesc` varchar(30) CHARACTER SET latin1 NOT NULL,
  KEY `FK_PU11uniabio1` (`PU04IDTRA`),
  CONSTRAINT `FK_PU11uniabio1` FOREIGN KEY (`PU04IDTRA`) REFERENCES `pu11uniabio` (`PU04IDTRA`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `pu11uniabiootros` */

LOCK TABLES `pu11uniabiootros` WRITE;

UNLOCK TABLES;

/*Table structure for table `pu12observaciones` */

DROP TABLE IF EXISTS `pu12observaciones`;

CREATE TABLE `pu12observaciones` (
  `PU04IDTRA` int(11) NOT NULL,
  `PU12OBSERVACIONES` varchar(50) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `pu12observaciones` */

LOCK TABLES `pu12observaciones` WRITE;

UNLOCK TABLES;

/*Table structure for table `pu12tipdesec` */

DROP TABLE IF EXISTS `pu12tipdesec`;

CREATE TABLE `pu12tipdesec` (
  `PU12IDTDESEC` int(11) NOT NULL,
  `PU12TIPODES` varchar(50) CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`PU12IDTDESEC`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `pu12tipdesec` */

LOCK TABLES `pu12tipdesec` WRITE;

insert  into `pu12tipdesec`(`PU12IDTDESEC`,`PU12TIPODES`) values (0,'Otro'),(1,'Infraestructura de tipo residencial'),(2,'Infraestructura de tipo comercial'),(3,'Infraestructura de tipo residecial'),(4,'No hay desarrollo en la zona');

UNLOCK TABLES;

/*Table structure for table `pu12tratipdesec` */

DROP TABLE IF EXISTS `pu12tratipdesec`;

CREATE TABLE `pu12tratipdesec` (
  `PU04IDTRA` int(11) NOT NULL,
  `PU12IDTDESEC` int(11) NOT NULL,
  KEY `FK_PU12IDTDESEC` (`PU12IDTDESEC`),
  KEY `PU04IDTRA` (`PU04IDTRA`),
  CONSTRAINT `FK_PU12IDTDESEC` FOREIGN KEY (`PU12IDTDESEC`) REFERENCES `pu12tipdesec` (`PU12IDTDESEC`),
  CONSTRAINT `pu12tratipdesec_ibfk_1` FOREIGN KEY (`PU04IDTRA`) REFERENCES `pu04regtra` (`PU04IDTRA`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `pu12tratipdesec` */

LOCK TABLES `pu12tratipdesec` WRITE;

insert  into `pu12tratipdesec`(`PU04IDTRA`,`PU12IDTDESEC`) values (1,1),(4,1),(60871,1),(123445,1),(123445,2),(62135,1);

UNLOCK TABLES;

/*Table structure for table `pu13aarep` */

DROP TABLE IF EXISTS `pu13aarep`;

CREATE TABLE `pu13aarep` (
  `PU13IDAAP` int(11) NOT NULL,
  `PU13DESCAAP` varchar(50) CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`PU13IDAAP`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `pu13aarep` */

LOCK TABLES `pu13aarep` WRITE;

insert  into `pu13aarep`(`PU13IDAAP`,`PU13DESCAAP`) values (1,'Refugio Ostional'),(2,'Depresiones Naturales'),(3,'Naciente'),(4,'RÃ­o/Quebrada-Rural'),(5,'RÃ­o/Quebrada-Urbano'),(7,'Pozo Artesanal'),(8,'Pozo PÃºblico'),(9,'AcuÃ­fero Mala Noche'),(10,'AcuÃ­fero Potrero'),(11,'Terreno dentro de Refugio segÃºn Mapa Municipal'),(12,'No Aplica');

UNLOCK TABLES;

/*Table structure for table `pu14trarep` */

DROP TABLE IF EXISTS `pu14trarep`;

CREATE TABLE `pu14trarep` (
  `PU04IDTRA` int(11) NOT NULL,
  `PU13IDAAP` int(11) NOT NULL,
  KEY `FK_PU13IDAAPREGTRA` (`PU04IDTRA`),
  KEY `FK_PU13IDAAPAAREP` (`PU13IDAAP`),
  CONSTRAINT `FK_PU13IDAAPAAREP` FOREIGN KEY (`PU13IDAAP`) REFERENCES `pu13aarep` (`PU13IDAAP`),
  CONSTRAINT `pu14trarep_ibfk_2` FOREIGN KEY (`PU04IDTRA`) REFERENCES `pu04tramite1` (`PU04IDTRA`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `pu14trarep` */

LOCK TABLES `pu14trarep` WRITE;

insert  into `pu14trarep`(`PU04IDTRA`,`PU13IDAAP`) values (1,2),(1,8),(2,1),(2,2),(3,2),(4,1),(60871,12),(123445,2),(123445,7),(62135,12);

UNLOCK TABLES;

/*Table structure for table `pu15serv` */

DROP TABLE IF EXISTS `pu15serv`;

CREATE TABLE `pu15serv` (
  `PU15IDSERVI` int(11) NOT NULL,
  `PU21IDSERVI` int(11) NOT NULL,
  `PU04IDTRA` int(11) NOT NULL,
  `PU20IDDESAS` int(11) NOT NULL,
  PRIMARY KEY (`PU15IDSERVI`),
  KEY `FK_PU21IDSERVICASERV` (`PU21IDSERVI`),
  KEY `FK_PU21IDSERVIREGTRA` (`PU04IDTRA`),
  KEY `FK_PU20IDDESASSERV` (`PU20IDDESAS`),
  CONSTRAINT `FK_PU20IDDESASSERV` FOREIGN KEY (`PU20IDDESAS`) REFERENCES `pu20desas` (`PU20IDDESAS`),
  CONSTRAINT `FK_PU21IDSERVICASERV` FOREIGN KEY (`PU21IDSERVI`) REFERENCES `pu21serviservicios` (`PU21IDSERVI`),
  CONSTRAINT `pu15serv_ibfk_1` FOREIGN KEY (`PU04IDTRA`) REFERENCES `pu04regtra` (`PU04IDTRA`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `pu15serv` */

LOCK TABLES `pu15serv` WRITE;

UNLOCK TABLES;

/*Table structure for table `pu16servae` */

DROP TABLE IF EXISTS `pu16servae`;

CREATE TABLE `pu16servae` (
  `PU16IDSAE` int(11) NOT NULL,
  `PU16DESCAE` varchar(30) CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`PU16IDSAE`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `pu16servae` */

LOCK TABLES `pu16servae` WRITE;

insert  into `pu16servae`(`PU16IDSAE`,`PU16DESCAE`) values (1,'Agua'),(2,'Electricidad');

UNLOCK TABLES;

/*Table structure for table `pu17serae` */

DROP TABLE IF EXISTS `pu17serae`;

CREATE TABLE `pu17serae` (
  `PU15IDSERVI` int(11) NOT NULL,
  `PU16IDSAE` int(11) NOT NULL,
  KEY `FK_PU15IDSERVISERV` (`PU15IDSERVI`),
  KEY `FK_PU16IDSAESERVAE` (`PU16IDSAE`),
  CONSTRAINT `FK_PU15IDSERVISERV` FOREIGN KEY (`PU15IDSERVI`) REFERENCES `pu15serv` (`PU15IDSERVI`),
  CONSTRAINT `FK_PU16IDSAESERVAE` FOREIGN KEY (`PU16IDSAE`) REFERENCES `pu16servae` (`PU16IDSAE`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `pu17serae` */

LOCK TABLES `pu17serae` WRITE;

UNLOCK TABLES;

/*Table structure for table `pu18casasser` */

DROP TABLE IF EXISTS `pu18casasser`;

CREATE TABLE `pu18casasser` (
  `PU18IDCSCLS` int(11) NOT NULL,
  `PU18DESCS` varchar(100) CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`PU18IDCSCLS`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `pu18casasser` */

LOCK TABLES `pu18casasser` WRITE;

insert  into `pu18casasser`(`PU18IDCSCLS`,`PU18DESCS`) values (1,'Existen casas frente a calle Pública'),(2,'No existen casas frente a calle Pública'),(3,'Terreno con difícil acceso a calle Pública');

UNLOCK TABLES;

/*Table structure for table `pu19serpacsca` */

DROP TABLE IF EXISTS `pu19serpacsca`;

CREATE TABLE `pu19serpacsca` (
  `PU15IDSERVI` int(11) NOT NULL,
  `PU18IDCSCLS` int(11) NOT NULL,
  KEY `FK_PU15IDSERVIPASCA` (`PU15IDSERVI`),
  KEY `FK_PU18IDCSCLSCALLE` (`PU18IDCSCLS`),
  CONSTRAINT `FK_PU15IDSERVIPASCA` FOREIGN KEY (`PU15IDSERVI`) REFERENCES `pu15serv` (`PU15IDSERVI`),
  CONSTRAINT `FK_PU18IDCSCLSCALLE` FOREIGN KEY (`PU18IDCSCLS`) REFERENCES `pu18casasser` (`PU18IDCSCLS`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `pu19serpacsca` */

LOCK TABLES `pu19serpacsca` WRITE;

UNLOCK TABLES;

/*Table structure for table `pu20desas` */

DROP TABLE IF EXISTS `pu20desas`;

CREATE TABLE `pu20desas` (
  `PU20IDDESAS` int(11) NOT NULL,
  `PU20DESCS` varchar(30) CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`PU20IDDESAS`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `pu20desas` */

LOCK TABLES `pu20desas` WRITE;

insert  into `pu20desas`(`PU20IDDESAS`,`PU20DESCS`) values (1,'Aaa');

UNLOCK TABLES;

/*Table structure for table `pu21serviservicios` */

DROP TABLE IF EXISTS `pu21serviservicios`;

CREATE TABLE `pu21serviservicios` (
  `PU21IDSERVI` int(11) NOT NULL COMMENT 'id servicio',
  `PU21DESCSERVI` varchar(100) CHARACTER SET latin1 DEFAULT NULL COMMENT 'descripción del servicio',
  PRIMARY KEY (`PU21IDSERVI`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `pu21serviservicios` */

LOCK TABLES `pu21serviservicios` WRITE;

insert  into `pu21serviservicios`(`PU21IDSERVI`,`PU21DESCSERVI`) values (1,'Servicios de Agua ya Instalado'),(2,'Servicios de Luz  ya Instalado'),(3,'Servicios en calle Pública, sin instalar'),(4,'No existe Servicio');

UNLOCK TABLES;

/*Table structure for table `pu22traserv` */

DROP TABLE IF EXISTS `pu22traserv`;

CREATE TABLE `pu22traserv` (
  `PU04IDTRA` int(11) NOT NULL,
  `PU22IDTREDV` int(11) NOT NULL,
  KEY `PU22IDTREDV` (`PU22IDTREDV`),
  KEY `PU04IDTRA` (`PU04IDTRA`),
  CONSTRAINT `pu22traserv_ibfk_1` FOREIGN KEY (`PU22IDTREDV`) REFERENCES `pu22tredv` (`PU22IDTREDV`),
  CONSTRAINT `pu22traserv_ibfk_2` FOREIGN KEY (`PU04IDTRA`) REFERENCES `pu04regtra` (`PU04IDTRA`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `pu22traserv` */

LOCK TABLES `pu22traserv` WRITE;

insert  into `pu22traserv`(`PU04IDTRA`,`PU22IDTREDV`) values (1,1),(4,1),(60871,3),(123445,1),(62135,3);

UNLOCK TABLES;

/*Table structure for table `pu22tredv` */

DROP TABLE IF EXISTS `pu22tredv`;

CREATE TABLE `pu22tredv` (
  `PU22IDTREDV` int(11) NOT NULL,
  `PU22DESCTRV` varchar(50) CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`PU22IDTREDV`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `pu22tredv` */

LOCK TABLES `pu22tredv` WRITE;

insert  into `pu22tredv`(`PU22IDTREDV`,`PU22DESCTRV`) values (1,'Calle Fisicamente'),(2,'SÃ³lo en Plano'),(3,'Cantonal'),(4,'Nacional');

UNLOCK TABLES;

/*Table structure for table `pu23traservi` */

DROP TABLE IF EXISTS `pu23traservi`;

CREATE TABLE `pu23traservi` (
  `PU04IDTRA` int(11) NOT NULL,
  `PU21IDSERVI` int(11) NOT NULL,
  KEY `FK_PO23REDVREGTRA` (`PU04IDTRA`),
  KEY `FK_PU21REDVCASERV` (`PU21IDSERVI`),
  CONSTRAINT `FK_PU21REDVCASERV` FOREIGN KEY (`PU21IDSERVI`) REFERENCES `pu21serviservicios` (`PU21IDSERVI`),
  CONSTRAINT `pu23traservi_ibfk_1` FOREIGN KEY (`PU04IDTRA`) REFERENCES `pu04regtra` (`PU04IDTRA`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `pu23traservi` */

LOCK TABLES `pu23traservi` WRITE;

UNLOCK TABLES;

/*Table structure for table `pu24infest` */

DROP TABLE IF EXISTS `pu24infest`;

CREATE TABLE `pu24infest` (
  `PU24IDINFR` int(11) NOT NULL,
  `PU24DESCINF` varchar(30) CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`PU24IDINFR`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `pu24infest` */

LOCK TABLES `pu24infest` WRITE;

insert  into `pu24infest`(`PU24IDINFR`,`PU24DESCINF`) values (1,'Infraestructura Existente'),(2,'No hay infraestructura'),(3,'No Aplica');

UNLOCK TABLES;

/*Table structure for table `pu24tipoconstruccion` */

DROP TABLE IF EXISTS `pu24tipoconstruccion`;

CREATE TABLE `pu24tipoconstruccion` (
  `PU04IDTRA` int(11) NOT NULL,
  `PU24TIPOCONSTRUCCION` varchar(50) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `pu24tipoconstruccion` */

LOCK TABLES `pu24tipoconstruccion` WRITE;

UNLOCK TABLES;

/*Table structure for table `pu25observacionpatentes` */

DROP TABLE IF EXISTS `pu25observacionpatentes`;

CREATE TABLE `pu25observacionpatentes` (
  `PU04IDTRA` int(11) NOT NULL,
  `PU06OBSERVACIONES` varchar(300) NOT NULL,
  PRIMARY KEY (`PU04IDTRA`),
  CONSTRAINT `FK_PU25OBSERVACIONPATENTES` FOREIGN KEY (`PU04IDTRA`) REFERENCES `pu04tramite1` (`PU04IDTRA`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `pu25observacionpatentes` */

LOCK TABLES `pu25observacionpatentes` WRITE;

UNLOCK TABLES;

/*Table structure for table `pu25patent` */

DROP TABLE IF EXISTS `pu25patent`;

CREATE TABLE `pu25patent` (
  `PU04IDTRA` int(11) NOT NULL,
  `PU24IDINFR` int(11) NOT NULL,
  KEY `FK_PU24IDINFRREGTRA` (`PU04IDTRA`),
  KEY `FK_PU24IDINFRPATENT` (`PU24IDINFR`),
  CONSTRAINT `FK_PU24IDINFRPATENT` FOREIGN KEY (`PU24IDINFR`) REFERENCES `pu24infest` (`PU24IDINFR`),
  CONSTRAINT `pu25patent_ibfk_1` FOREIGN KEY (`PU04IDTRA`) REFERENCES `pu04regtra` (`PU04IDTRA`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `pu25patent` */

LOCK TABLES `pu25patent` WRITE;

insert  into `pu25patent`(`PU04IDTRA`,`PU24IDINFR`) values (1,3),(4,3),(60871,3),(123445,3),(62135,3);

UNLOCK TABLES;

/*Table structure for table `pu26planactinicosama` */

DROP TABLE IF EXISTS `pu26planactinicosama`;

CREATE TABLE `pu26planactinicosama` (
  `PU26IDDESCNICOYASAMA` int(11) NOT NULL,
  `PU26DESCACNICOYASAMA` varchar(50) CHARACTER SET latin1 NOT NULL,
  `PU26IDPLAN` int(11) NOT NULL,
  PRIMARY KEY (`PU26IDDESCNICOYASAMA`),
  KEY `FK_PU26PLANACTINICOSAMA` (`PU26IDPLAN`),
  CONSTRAINT `FK_PU26PLANACTINICOSAMA` FOREIGN KEY (`PU26IDPLAN`) REFERENCES `pu26planreg` (`PU26IDPLAN`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `pu26planactinicosama` */

LOCK TABLES `pu26planactinicosama` WRITE;

insert  into `pu26planactinicosama`(`PU26IDDESCNICOYASAMA`,`PU26DESCACNICOYASAMA`,`PU26IDPLAN`) values (1,'Comercial',1),(2,'Comercial Central',1),(3,'Institucional',1),(4,'Residencial',1),(5,'Residencial Comercial',1),(6,'Area Verde',1),(7,'Industrial',1),(8,'Zona Comercial Turistica',2),(9,'Zona Residencial Privada',2),(10,'Institucional',2),(11,'Zona Privada',2),(12,'Zona de Arriendo',2),(13,'Zona Hotelera',2),(14,'No Aplica',1),(15,'No Aplica',2);

UNLOCK TABLES;

/*Table structure for table `pu26planreg` */

DROP TABLE IF EXISTS `pu26planreg`;

CREATE TABLE `pu26planreg` (
  `PU26IDPLAN` int(11) NOT NULL,
  `PU26PLNDESC` varchar(50) CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`PU26IDPLAN`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `pu26planreg` */

LOCK TABLES `pu26planreg` WRITE;

insert  into `pu26planreg`(`PU26IDPLAN`,`PU26PLNDESC`) values (1,'Nicoya'),(2,'SÃ¡mara'),(3,'Fuera del Plan Regulador');

UNLOCK TABLES;

/*Table structure for table `pu26planregtramite` */

DROP TABLE IF EXISTS `pu26planregtramite`;

CREATE TABLE `pu26planregtramite` (
  `PU04IDTRA` int(11) NOT NULL,
  `PU26IDPLAN` int(11) NOT NULL,
  KEY `FK_pu26planregtramite` (`PU04IDTRA`),
  KEY `FK_pu26planregtramite1` (`PU26IDPLAN`),
  CONSTRAINT `FK_pu26planregtramite` FOREIGN KEY (`PU04IDTRA`) REFERENCES `pu04tramite1` (`PU04IDTRA`),
  CONSTRAINT `FK_pu26planregtramite1` FOREIGN KEY (`PU26IDPLAN`) REFERENCES `pu26planreg` (`PU26IDPLAN`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `pu26planregtramite` */

LOCK TABLES `pu26planregtramite` WRITE;

insert  into `pu26planregtramite`(`PU04IDTRA`,`PU26IDPLAN`) values (1,1),(2,1),(3,1),(4,1),(60871,3),(123445,1),(62135,3);

UNLOCK TABLES;

/*Table structure for table `pu26traplan` */

DROP TABLE IF EXISTS `pu26traplan`;

CREATE TABLE `pu26traplan` (
  `PU04IDTRA` int(11) NOT NULL,
  `PU26IDDESCNICOYASAMA` int(11) NOT NULL,
  KEY `FK_PU26TRAPLAN` (`PU04IDTRA`),
  KEY `FK_PU26TRAPLANNICOSAMA2` (`PU26IDDESCNICOYASAMA`),
  CONSTRAINT `FK_PU26TRAPLAN` FOREIGN KEY (`PU04IDTRA`) REFERENCES `pu04tramite1` (`PU04IDTRA`),
  CONSTRAINT `FK_PU26TRAPLANNICOSAMA2` FOREIGN KEY (`PU26IDDESCNICOYASAMA`) REFERENCES `pu26planactinicosama` (`PU26IDDESCNICOYASAMA`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `pu26traplan` */

LOCK TABLES `pu26traplan` WRITE;

insert  into `pu26traplan`(`PU04IDTRA`,`PU26IDDESCNICOYASAMA`) values (1,4),(2,1),(2,15),(3,2),(3,15),(4,1),(123445,2),(123445,4),(123445,15);

UNLOCK TABLES;

/*Table structure for table `pu27ubicacion` */

DROP TABLE IF EXISTS `pu27ubicacion`;

CREATE TABLE `pu27ubicacion` (
  `PU27IDUBIC` int(11) NOT NULL,
  `PU27DESCRIP` varchar(30) CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`PU27IDUBIC`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `pu27ubicacion` */

LOCK TABLES `pu27ubicacion` WRITE;

insert  into `pu27ubicacion`(`PU27IDUBIC`,`PU27DESCRIP`) values (1,'Nicoya'),(2,'Sámara');

UNLOCK TABLES;

/*Table structure for table `pu28ubidescripcion` */

DROP TABLE IF EXISTS `pu28ubidescripcion`;

CREATE TABLE `pu28ubidescripcion` (
  `PU28IDUBIDESC` int(11) NOT NULL,
  `PU28UBICADESCRIP` varchar(30) CHARACTER SET latin1 NOT NULL,
  `PU27IDUBIC` int(11) NOT NULL,
  PRIMARY KEY (`PU28IDUBIDESC`),
  KEY `FK_PU27IDUBIC` (`PU27IDUBIC`),
  CONSTRAINT `FK_PU27IDUBIC` FOREIGN KEY (`PU27IDUBIC`) REFERENCES `pu27ubicacion` (`PU27IDUBIC`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `pu28ubidescripcion` */

LOCK TABLES `pu28ubidescripcion` WRITE;

UNLOCK TABLES;

/*Table structure for table `pu29unitradesc` */

DROP TABLE IF EXISTS `pu29unitradesc`;

CREATE TABLE `pu29unitradesc` (
  `PU28IDUBIDESC` int(11) NOT NULL,
  `PU04IDTRA` int(11) NOT NULL,
  KEY `FK_PU28IDUBIDESC` (`PU04IDTRA`),
  KEY `FK_PU28IDUBIDESCR` (`PU28IDUBIDESC`),
  CONSTRAINT `FK_PU28IDUBIDESCR` FOREIGN KEY (`PU28IDUBIDESC`) REFERENCES `pu28ubidescripcion` (`PU28IDUBIDESC`),
  CONSTRAINT `pu29unitradesc_ibfk_1` FOREIGN KEY (`PU04IDTRA`) REFERENCES `pu04regtra` (`PU04IDTRA`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `pu29unitradesc` */

LOCK TABLES `pu29unitradesc` WRITE;

UNLOCK TABLES;

/*Table structure for table `pu31trasue` */

DROP TABLE IF EXISTS `pu31trasue`;

CREATE TABLE `pu31trasue` (
  `PU04IDTRA` int(11) NOT NULL,
  `PU35IDTIPS` int(11) NOT NULL,
  KEY `FK_PU035IDTIPSREGTRA` (`PU04IDTRA`),
  KEY `FK_PU35IDTIPSTRASUE` (`PU35IDTIPS`),
  CONSTRAINT `FK_PU35IDTIPSTRASUE` FOREIGN KEY (`PU35IDTIPS`) REFERENCES `pu35tipsue` (`PU35IDTIPS`),
  CONSTRAINT `pu31trasue_ibfk_1` FOREIGN KEY (`PU04IDTRA`) REFERENCES `pu04regtra` (`PU04IDTRA`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `pu31trasue` */

LOCK TABLES `pu31trasue` WRITE;

UNLOCK TABLES;

/*Table structure for table `pu32capuso` */

DROP TABLE IF EXISTS `pu32capuso`;

CREATE TABLE `pu32capuso` (
  `PU32IDCUSO` int(11) NOT NULL,
  `PU32DESUSO` varchar(30) NOT NULL,
  PRIMARY KEY (`PU32IDCUSO`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `pu32capuso` */

LOCK TABLES `pu32capuso` WRITE;

UNLOCK TABLES;

/*Table structure for table `pu33tracap` */

DROP TABLE IF EXISTS `pu33tracap`;

CREATE TABLE `pu33tracap` (
  `PU04IDTRA` int(11) NOT NULL,
  `PU32IDCUSO` int(11) NOT NULL,
  KEY `FK_PU32IDCUSOEGTRA` (`PU04IDTRA`),
  KEY `FK_PU32IDCUSOCAPUSO` (`PU32IDCUSO`),
  CONSTRAINT `FK_PU32IDCUSOCAPUSO` FOREIGN KEY (`PU32IDCUSO`) REFERENCES `pu32capuso` (`PU32IDCUSO`),
  CONSTRAINT `pu33tracap_ibfk_1` FOREIGN KEY (`PU04IDTRA`) REFERENCES `pu04regtra` (`PU04IDTRA`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `pu33tracap` */

LOCK TABLES `pu33tracap` WRITE;

UNLOCK TABLES;

/*Table structure for table `pu34clases` */

DROP TABLE IF EXISTS `pu34clases`;

CREATE TABLE `pu34clases` (
  `PU34IDCLAS` int(11) NOT NULL,
  `PU34DESCLA` int(11) NOT NULL,
  PRIMARY KEY (`PU34IDCLAS`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `pu34clases` */

LOCK TABLES `pu34clases` WRITE;

UNLOCK TABLES;

/*Table structure for table `pu35tipsue` */

DROP TABLE IF EXISTS `pu35tipsue`;

CREATE TABLE `pu35tipsue` (
  `PU35IDTIPS` int(11) NOT NULL,
  `PU35DESTIP` varchar(30) CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`PU35IDTIPS`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `pu35tipsue` */

LOCK TABLES `pu35tipsue` WRITE;

insert  into `pu35tipsue`(`PU35IDTIPS`,`PU35DESTIP`) values (1,'Arenoso');

UNLOCK TABLES;

/*Table structure for table `pu36hisinsp` */

DROP TABLE IF EXISTS `pu36hisinsp`;

CREATE TABLE `pu36hisinsp` (
  `PU36NUMERACION` int(11) NOT NULL AUTO_INCREMENT,
  `PU04IDTRA` int(11) NOT NULL,
  `PU01CEDUSU` int(11) NOT NULL,
  `PU03IDPUES` int(11) NOT NULL,
  `PU36FEHISINP` date NOT NULL,
  PRIMARY KEY (`PU36NUMERACION`),
  KEY `FK_PU04IDTRAHISINP` (`PU04IDTRA`),
  KEY `FK_PU01CEDUSUHISINP` (`PU01CEDUSU`),
  KEY `FK_PU03IDPUESHISINP` (`PU03IDPUES`),
  CONSTRAINT `FK_PU01CEDUSUHISINP` FOREIGN KEY (`PU01CEDUSU`) REFERENCES `pu01regusu` (`PU01CEDUSU`),
  CONSTRAINT `FK_PU03IDPUESHISINP` FOREIGN KEY (`PU03IDPUES`) REFERENCES `pu02infusu` (`PU03IDPUES`),
  CONSTRAINT `pu36hisinsp_ibfk_1` FOREIGN KEY (`PU04IDTRA`) REFERENCES `pu04regtra` (`PU04IDTRA`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `pu36hisinsp` */

LOCK TABLES `pu36hisinsp` WRITE;

UNLOCK TABLES;

/*Table structure for table `pu37hisofi` */

DROP TABLE IF EXISTS `pu37hisofi`;

CREATE TABLE `pu37hisofi` (
  `PU37NUMERACION` int(11) NOT NULL AUTO_INCREMENT,
  `PU04IDTRA` int(11) NOT NULL,
  `PU01CEDUSU` int(11) NOT NULL,
  `PU03IDPUES` int(11) NOT NULL,
  `PU037FEHISOFI` date NOT NULL,
  PRIMARY KEY (`PU37NUMERACION`),
  KEY `FK_PU04IDTRAHISOFI` (`PU04IDTRA`),
  KEY `FK_PU01CEDUSUHISOFI` (`PU01CEDUSU`),
  KEY `FK_PU03IDPUESHISOFI` (`PU03IDPUES`),
  CONSTRAINT `FK_PU01CEDUSUHISOFI` FOREIGN KEY (`PU01CEDUSU`) REFERENCES `pu01regusu` (`PU01CEDUSU`),
  CONSTRAINT `FK_PU03IDPUESHISOFI` FOREIGN KEY (`PU03IDPUES`) REFERENCES `pu02infusu` (`PU03IDPUES`),
  CONSTRAINT `pu37hisofi_ibfk_1` FOREIGN KEY (`PU04IDTRA`) REFERENCES `pu04regtra` (`PU04IDTRA`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `pu37hisofi` */

LOCK TABLES `pu37hisofi` WRITE;

UNLOCK TABLES;

/*Table structure for table `pu38servidumbres` */

DROP TABLE IF EXISTS `pu38servidumbres`;

CREATE TABLE `pu38servidumbres` (
  `PU38IDSERVIDUMBRE` int(11) NOT NULL,
  `PU38DESCRIPSERVIDUM` varchar(50) CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`PU38IDSERVIDUMBRE`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `pu38servidumbres` */

LOCK TABLES `pu38servidumbres` WRITE;

insert  into `pu38servidumbres`(`PU38IDSERVIDUMBRE`,`PU38DESCRIPSERVIDUM`) values (1,'Servidumbre de Paso'),(2,'Servidumbre AgrÃ­cola'),(3,'Calle PÃºblica');

UNLOCK TABLES;

/*Table structure for table `pu38tramiteaccesoobservaciones` */

DROP TABLE IF EXISTS `pu38tramiteaccesoobservaciones`;

CREATE TABLE `pu38tramiteaccesoobservaciones` (
  `PU04IDTRA` int(11) NOT NULL,
  `PU38OBSERVACIONES` varchar(300) NOT NULL,
  PRIMARY KEY (`PU04IDTRA`),
  CONSTRAINT `FK_PU38IDTRA` FOREIGN KEY (`PU04IDTRA`) REFERENCES `pu04tramite1` (`PU04IDTRA`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `pu38tramiteaccesoobservaciones` */

LOCK TABLES `pu38tramiteaccesoobservaciones` WRITE;

UNLOCK TABLES;

/*Table structure for table `pu38traservidumbres` */

DROP TABLE IF EXISTS `pu38traservidumbres`;

CREATE TABLE `pu38traservidumbres` (
  `PU04IDTRA` int(11) NOT NULL,
  `PU38IDSERVIDUMBRE` int(11) NOT NULL,
  KEY `FK_pu38Servidumbres` (`PU04IDTRA`),
  KEY `FK_pu38Servidumbres1` (`PU38IDSERVIDUMBRE`),
  CONSTRAINT `FK_pu38Servidumbres` FOREIGN KEY (`PU04IDTRA`) REFERENCES `pu04tramite1` (`PU04IDTRA`),
  CONSTRAINT `FK_pu38Servidumbres1` FOREIGN KEY (`PU38IDSERVIDUMBRE`) REFERENCES `pu38servidumbres` (`PU38IDSERVIDUMBRE`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `pu38traservidumbres` */

LOCK TABLES `pu38traservidumbres` WRITE;

insert  into `pu38traservidumbres`(`PU04IDTRA`,`PU38IDSERVIDUMBRE`) values (1,1),(2,1),(3,1),(4,1),(60871,1),(123445,1),(62135,3);

UNLOCK TABLES;

/*Table structure for table `pu39reginfosolicitante` */

DROP TABLE IF EXISTS `pu39reginfosolicitante`;

CREATE TABLE `pu39reginfosolicitante` (
  `PU39CEDSOLICI` int(11) NOT NULL,
  `PU04IDDISTRITO` int(11) NOT NULL,
  `PU39BARRIO` varchar(50) CHARACTER SET latin1 NOT NULL,
  `PU39DIRECCION` varchar(150) CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`PU39CEDSOLICI`),
  KEY `FK_PU04IDDISTRITO` (`PU04IDDISTRITO`),
  CONSTRAINT `FK_PU04IDDISTRITO` FOREIGN KEY (`PU04IDDISTRITO`) REFERENCES `pu04distrito` (`PU04IDDISTRITO`),
  CONSTRAINT `FK_PU39CEDSOLICITANTE` FOREIGN KEY (`PU39CEDSOLICI`) REFERENCES `pu39regsolicitante` (`PU39CEDSOLICI`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `pu39reginfosolicitante` */

LOCK TABLES `pu39reginfosolicitante` WRITE;

insert  into `pu39reginfosolicitante`(`PU39CEDSOLICI`,`PU04IDDISTRITO`,`PU39BARRIO`,`PU39DIRECCION`) values (109340746,5,'Cartagena','Del hotel cartagena 600 mestros norte'),(111030333,1,'Guadalpe','Al costado oeste super 26 de octubre'),(504650654,1,'La virginia','125 metros sur del antiguo radio la pampa'),(504940434,1,'La virginia','Por ahÃ­'),(506540546,1,'La virginia','Por ahi');

UNLOCK TABLES;

/*Table structure for table `pu39regsolicitante` */

DROP TABLE IF EXISTS `pu39regsolicitante`;

CREATE TABLE `pu39regsolicitante` (
  `PU04IDTRA` int(11) NOT NULL,
  `PU39CEDSOLICI` int(11) NOT NULL,
  `PU39NOMSOLICI` varchar(50) CHARACTER SET latin1 NOT NULL,
  `PU39APE1SOLICI` varchar(50) CHARACTER SET latin1 NOT NULL,
  `PU39APE2SOLICI` varchar(50) CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`PU39CEDSOLICI`),
  KEY `FK_PU39IDTRA` (`PU04IDTRA`),
  CONSTRAINT `FK_PU39IDTRA` FOREIGN KEY (`PU04IDTRA`) REFERENCES `pu04tramite1` (`PU04IDTRA`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `pu39regsolicitante` */

LOCK TABLES `pu39regsolicitante` WRITE;

insert  into `pu39regsolicitante`(`PU04IDTRA`,`PU39CEDSOLICI`,`PU39NOMSOLICI`,`PU39APE1SOLICI`,`PU39APE2SOLICI`) values (60871,109340746,'Fabricio','Jimenez','Alfaro'),(62135,111030333,'Gilberto','GutiÃ©rrez','Dominguez'),(123445,504650654,'Alberto','JimÃ¨nez','Obando'),(1,504940434,'Carlos','Espinoza','Chavarria'),(4,506540546,'Maria','Jimenez','Ortiz');

UNLOCK TABLES;

/*Table structure for table `pu40reginfopropietario` */

DROP TABLE IF EXISTS `pu40reginfopropietario`;

CREATE TABLE `pu40reginfopropietario` (
  `PU40CEDPROPIE` int(11) NOT NULL,
  `PU40NFINCA` varchar(15) CHARACTER SET latin1 NOT NULL,
  `PU40NCATASTRO` varchar(50) CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`PU40CEDPROPIE`),
  CONSTRAINT `FK_PU40REGINFOPROPIETARIO` FOREIGN KEY (`PU40CEDPROPIE`) REFERENCES `pu40regpropietario` (`PU40CEDPROPIE`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `pu40reginfopropietario` */

LOCK TABLES `pu40reginfopropietario` WRITE;

insert  into `pu40reginfopropietario`(`PU40CEDPROPIE`,`PU40NFINCA`,`PU40NCATASTRO`) values (109340746,'500098716','1189578-2007'),(111030333,'116911','1537802-2011'),(506960454,'564345-000','8436234-2018'),(604340543,'234543-000','5321223-2018'),(605450434,'234223-000','1232234-2018');

UNLOCK TABLES;

/*Table structure for table `pu40regpropietario` */

DROP TABLE IF EXISTS `pu40regpropietario`;

CREATE TABLE `pu40regpropietario` (
  `PU04IDTRA` int(11) NOT NULL,
  `PU40CEDPROPIE` int(11) NOT NULL,
  `PU40NOMPROPIE` varchar(50) CHARACTER SET latin1 NOT NULL,
  `PU40APE1PROPIE` varchar(50) CHARACTER SET latin1 NOT NULL,
  `PU40APE2PROPIE` varchar(50) CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`PU40CEDPROPIE`),
  KEY `FK_PU39IDTRA1` (`PU04IDTRA`),
  CONSTRAINT `FK_PU39IDTRA1` FOREIGN KEY (`PU04IDTRA`) REFERENCES `pu04tramite1` (`PU04IDTRA`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `pu40regpropietario` */

LOCK TABLES `pu40regpropietario` WRITE;

insert  into `pu40regpropietario`(`PU04IDTRA`,`PU40CEDPROPIE`,`PU40NOMPROPIE`,`PU40APE1PROPIE`,`PU40APE2PROPIE`) values (60871,109340746,'Fabricio','Jimenez','Alfaro'),(62135,111030333,'Gilberto','Gilberto','Dominguez'),(4,506960454,'Jose','Espinoza','Ortiz'),(123445,604340543,'MarÃ­a','Espinoza','Espinoza'),(1,605450434,'MarÃ­a','Cruz','Zamora');

UNLOCK TABLES;

/*Table structure for table `pu41espaciosgeo` */

DROP TABLE IF EXISTS `pu41espaciosgeo`;

CREATE TABLE `pu41espaciosgeo` (
  `PU41IDESPACIOS` varchar(11) CHARACTER SET latin1 NOT NULL,
  `PU41DESCRIPCESPACIOS` varchar(200) CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`PU41IDESPACIOS`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `pu41espaciosgeo` */

LOCK TABLES `pu41espaciosgeo` WRITE;

UNLOCK TABLES;

/*Table structure for table `pu42servidumbre` */

DROP TABLE IF EXISTS `pu42servidumbre`;

CREATE TABLE `pu42servidumbre` (
  `PU42IDSERVID` int(11) NOT NULL,
  `PU42DESCRIPCION` varchar(200) NOT NULL,
  `PU38IDSERVIDUMBRE` int(11) NOT NULL,
  PRIMARY KEY (`PU42IDSERVID`),
  KEY `FK_pu42servidumbre` (`PU38IDSERVIDUMBRE`),
  CONSTRAINT `FK_pu42servidumbre` FOREIGN KEY (`PU38IDSERVIDUMBRE`) REFERENCES `pu38servidumbres` (`PU38IDSERVIDUMBRE`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `pu42servidumbre` */

LOCK TABLES `pu42servidumbre` WRITE;

insert  into `pu42servidumbre`(`PU42IDSERVID`,`PU42DESCRIPCION`,`PU38IDSERVIDUMBRE`) values (1,'Existen casas frente a calle Publica',1),(2,'Existen casas frente a calle Publica',2),(3,'No existen casas frente a calle Publica',1),(4,'No existen casas frente a calle Publica',2),(5,'Terreno con difícil acceso a calle Publica',1),(6,'Terreno con difícil acceso a calle Publica',2),(7,'Existe desarrollo en la Servidumbre',1),(8,'Existe desarrollo en la Servidumbre',2),(9,'No existe desarrollo en la Servidumbre ',1),(10,'No existe desarrollo en la Servidumbre ',2),(11,'Servicios de Luz  ya Instalado en el terreno',1),(12,'Servicios de Luz  ya Instalado en el terreno',2),(13,'Servicios en calle Publica, sin instalar  ',1),(14,'Servicios en calle Publica, sin instalar  ',2),(15,'No existe Servicio',1),(16,'No existe Servicio',2);

UNLOCK TABLES;

/*Table structure for table `pu43traacceso` */

DROP TABLE IF EXISTS `pu43traacceso`;

CREATE TABLE `pu43traacceso` (
  `PU04IDTRA` int(11) DEFAULT NULL,
  `PU42IDSERVID` int(11) DEFAULT NULL,
  KEY `FK_pu43traacceso` (`PU42IDSERVID`),
  KEY `FK_pu43traaccesoS` (`PU04IDTRA`),
  CONSTRAINT `FK_pu43traacceso` FOREIGN KEY (`PU42IDSERVID`) REFERENCES `pu42servidumbre` (`PU42IDSERVID`),
  CONSTRAINT `FK_pu43traaccesoS` FOREIGN KEY (`PU04IDTRA`) REFERENCES `pu04tramite1` (`PU04IDTRA`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `pu43traacceso` */

LOCK TABLES `pu43traacceso` WRITE;

insert  into `pu43traacceso`(`PU04IDTRA`,`PU42IDSERVID`) values (1,16),(4,16),(60871,1),(60871,13),(123445,16);

UNLOCK TABLES;

/*Table structure for table `pu44traleyaccesos` */

DROP TABLE IF EXISTS `pu44traleyaccesos`;

CREATE TABLE `pu44traleyaccesos` (
  `pu04idtra` int(11) NOT NULL,
  `pu45idley` int(11) NOT NULL,
  KEY `pu45idley` (`pu45idley`),
  KEY `pu04idtra` (`pu04idtra`),
  CONSTRAINT `pu44traleyaccesos_ibfk_1` FOREIGN KEY (`pu45idley`) REFERENCES `pu45leyes` (`pu45idley`),
  CONSTRAINT `pu44traleyaccesos_ibfk_2` FOREIGN KEY (`pu04idtra`) REFERENCES `pu04tramite1` (`PU04IDTRA`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `pu44traleyaccesos` */

LOCK TABLES `pu44traleyaccesos` WRITE;

insert  into `pu44traleyaccesos`(`pu04idtra`,`pu45idley`) values (1,13),(4,18),(60871,18);

UNLOCK TABLES;

/*Table structure for table `pu45leyes` */

DROP TABLE IF EXISTS `pu45leyes`;

CREATE TABLE `pu45leyes` (
  `pu45idley` int(11) NOT NULL AUTO_INCREMENT,
  `pu45objetivo` varchar(500) CHARACTER SET latin1 NOT NULL,
  `pu45descripcion` varchar(2000) CHARACTER SET latin1 NOT NULL,
  `pu45idtipo` int(11) DEFAULT NULL,
  PRIMARY KEY (`pu45idley`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `pu45leyes` */

LOCK TABLES `pu45leyes` WRITE;

insert  into `pu45leyes`(`pu45idley`,`pu45objetivo`,`pu45descripcion`,`pu45idtipo`) values (1,'Para: Residencial: vivienda unifamiliar, vivienda bono, apartamentos, remodelación y ampliación. Desarrollo. Comercial-industrial. Estación de servicios. Construcción en institucional.','Condicionado a contar con la disponibilidad de agua para el proyecto a realizar por parte de la entidad competente (Asada o AyA). Basado en el Decreto de SequÃ­a N° 38642-MP-MAG.',4),(2,'Para: Construcción de local comercial o industrial, remodelación-ampliación de local comercial.','Esta resoluciÃ³n NO es para una Actividad Comercial, del ministerio de Salud es solamente para cumplir con el Permiso de ConstrucciÃ³n, como lo indica la Ley de Construcciones N°833.',4),(3,'Para: Cuando la propiedad aparezca en zona de inundación.','Condicionado a cumplir segÃºn la valoraciÃ³n del Ingeniero o Arquitecto responsable de las obras Civiles a desarrollar, definiendo los diseños estructurales aptos para este tipo de terrenos. AsÃ­ como, el cumplimiento de los estudios que indique el Ing. Municipal. Dado a que la propiedad se ubica dentro del Ã¡rea de amenaza potencial de inundación por crecidas de RÃ­o, segÃºn cartografía de la ComisiÃ³n Nacional de Emergencias.',6),(4,'Para: Desarrollo Comercial. (Patentes)  Fuera del plan regulador','• Comercial:\n Este trÃ¡mite queda sujeto a disposiciones del Departamento de Desarrollo y Control Comercial, quien es el que determinarÃ¡ si la actividad Comercial solicitada va acorde con lo estipulado por ley. \nSe le advierte que “las edificaciones privadas que impliquen concurrencia y brinden atenciÃ³n al pÃºblico, deberán de contar con accesibilidad al espacio físico “conforme los dispuesto en el artículo 10 de la ley N.º 7600 “ Igualdad de oportunidades a las personas con discapacidad” y deberÃ¡n contar con las caracterÃ­sticas establecidas en el Decreto N.º 26831,” Reglamento de igualdad de oportunidades para personas con discapacidad”.\nEl otorgamiento de la resoluciÃ³n municipal de ubicaciÃ³n no  implica el otorgamiento inmediato y obligatorio de permiso sanitario de funcionamiento por parte del Ministerio de Salud, ya que el administrado deberÃ¡ cumplir con lo estipulado en la ley N.º 5395 del 30 de octubre de 1973 “ Ley general de salud”, y sus reformas; Decreto ejecutivo N|39472-S del lunes 8 de febrero del 2016 “ Reglamento General para autorizaciones y permisos sanitarios de funcionamiento otorgados por el Ministerio de salud”, asÃ­ como demÃ¡s condiciones de ordenamiento jurÃ­dico vigentes y requisitos señalados en el reglamento especÃ­fico que regula el funcionamiento de la actividad a instalar.\n De requerirse remodelar, ampliar, renovar o reparar el local comercial, se requiere del trÃ¡mite de la licencia municipal de construcciÃ³n, para lo cual deberÃ¡ sujetarse a las regulaciones estipuladas en el reglamento de construcciones, publicado en el diario oficial La Gaceta N°56, alcance N.º 17 del 11 de marzo de 1983 y sus reformas, asÃ­ como lo indicado en la ley N°833 de noviembre de 1949 “Ley de construcciones “, asÃ­ mismo,  cumplir con la normativa ambiental, sanitaria, urbanÃ­stica y otras vigentes que regulen los procesos constructivos.\n',5),(5,'Para: Desarrollo Comercial. (Patentes) Prescripción del permiso de construcción.','Basado en el Oficio DGJ-00116-2017, donde se delimita sobre el periodo de prescripciÃ³n del permiso de construcciÃ³n.',5),(6,'Para: Desarrollo Comercial. (Patentes) en el plan regulador.','•Comercial (SÃ³lo en los Usos Permitidos en el Plan Regulador para esta Zona). \nSe concluye: Uso de Suelo Conforme de ResoluciÃ³n Municipal de UbicaciÃ³n con el proyecto a realizar.  Este trÃ¡mite queda sujeto a disposiciones del Departamento de Desarrollo y Control Comercial, quien es el que determinarÃ¡ si la actividad Comercial solicitada va acorde con lo estipulado por ley. \nSe le advierte que “las edificaciones privada que impliquen concurrencia y brinden atenciÃ³n al pÃºblico deberÃ¡n de contar con accesibilidad al espacio físico “conforme los dispuesto en el artÃ­culo 10 de la ley N.º 7600 “Igualdad de oportunidades a las personas con discapacidad” y deberÃ¡n contar con las caracterÃ­sticas establecidas en el Decreto N.º 26831,” Reglamento de igualdad de oportunidades para personas con discapacidad”.\nEl otorgamiento de la resoluciÃ³n municipal de ubicaciÃ³n no  implica el otorgamiento inmediato y obligatorio de permiso sanitario de funcionamiento por parte del Ministerio de Salud, ya que el administrado deberá cumplir con lo estipulado en la ley N.º 5395 del 30 de octubre de 1973 “ Ley general de salud”, y sus reformas; Decreto ejecutivo N|39472-S del lunes 8 de febrero del 2016 “ Reglamento General para autorizaciones y permisos sanitarios de funcionamiento otorgados por el Ministerio de salud”, así como demÃ¡s condiciones de ordenamiento jurÃ­dico vigentes y requisitos señalados en el reglamento especÃ­fico que regula el funcionamiento de la actividad a instalar.\n De requerirse remodelar, ampliar, renovar o reparar el local comercial, se requiere del trÃ¡mite de la licencia municipal de construcciÃ³n, para lo cual deberÃ¡ sujetarse a las regulaciones estipuladas en el reglamento de construcciones, publicado en el diario oficial La Gaceta N°56, alcance N.º 17 del 11 de marzo de 1983 y sus reformas, así como lo indicado en la ley N°833 de noviembre de 1949 “Ley de construcciones “, asÃ­ mismo,  cumplir con la normativa ambiental, sanitaria, urbanÃ­stica y otr',5),(7,'Para: Retiro de río y quebrada en zona urbana.','La propiedad estÃ¡ afectada por cause de Dominio pÃºblico (Quebrada o RÃ¬os) se deberÃ¡ aplicar el artÃ¬culo 33 de la Ley Forestal N. 7575 que establece un Ã¡rea de protecciÃ³n de 10 metros en zona Urbana en terreno plano medidas horizontales a ambos lados a partir de la ribera de la Quebrada, RÃ¬os.',6),(8,'Para: Retiro de río y quebrada en zona Rural.','La propiedad estÃ¡ afectada por cause de Dominio pÃºblico (Quebrada o RÃ¬os) se deberÃ¡ aplicar el artÃ¬culo 33 de la Ley Forestal N. 7575 que establece un Ã¡rea de protecciÃ³n de 15 metros en zona Rural en terreno plano medidas horizontales a ambos lados a partir de la ribera de la Quebrada, RÃ¬os.',6),(9,'Para: Topografía con Depresiones Naturales.','En cuanto a la depresiÃ³n natural que atraviesa el terreno en estudio, se le indica que las aguas pluviales deben ser canalizadas permitiendo discurrir de forma natural sin afectar su curso. De manera Bue, el paso de aguas pluviales no puede ser rellenado sin que de previo hayan sido canalizadas, mediante un estudio en donde se contemple factores hidrolÃ³gicos e hidrÃ¡ulicos que permitan mediar los caudales de aguas pluviales y las dimensiones del diseño de la obra a realizar.   \nLo anterior, de acuerdo a la Ley 276  ArtÃ¬culo 4°. I.- indica que “Las aguas pluviales que caen en su predio mientras discurran por él. PodrÃ¡ el dueÃ±o, en consecuencia, construir dentro de su propiedad, estanques, pantanos, cisternas o aljibes donde conservarlas al efecto, o emplear para ello cualquier otro medio adecuado, siempre que no cause perjuicio al pÃºblico ni a tercero”.\n',6),(10,'Para: Bosque secundario, bosque primario, árboles primarios, zonas boscosas.','Debiendo coordinar el permiso de corta de Ã¡rboles existente en la propiedad ante el MINAE, cumpliendo con el artÃ¬culo 27 de la Ley Forestal.',3),(11,'Para: Cuando está dentro del plan regulador Nicoya Sámara.','El Retiro debe ir en apego al Reglamento de Construcciones ArtÃ¬culo 68. En zonas residenciales, la zona destinada al estacionamiento deberÃ¡ cumplir con cada una de las siguientes características:\na. Las dimensiones mínimas por vehÃ¬culo serÃ¡n de 5 metros x 2,5 metros.\nb. En zonas donde se permita el estacionamiento perpendicular a la calle, segÃºn se\nestablece en el Reglamento de ZonificaciÃ³n y Uso del Suelo del presente Plan\nRegulador, se podrá impermeabilizar hasta un 50% del retiro frontal.\nArtÃ¬culo 69. No se permite el uso de la acera o retiros frontales para el estacionamiento en\nninguna zona del cantÃ³n.\n',NULL),(12,'Para: Cuando marca condominios en Oficina','Debe someter el proyecto a revisiÃ³n ante la  SETENA para la obtenciÃ³n de la viabilidad (Licencia) ambiental. AdemÃ¡s tramitar ante el INVU, en cumplimiento con Reglamento a la Ley Reguladora de la Propiedad en Condominio, N° 32303-MIVAH-MEIC-TUR donde indica en el  ArtÃ¬culo 6º que: Para obtener la aprobaciÃ³n de los planos de un condominio que se vaya a desarrollar en etapas, es necesario realizar el trÃ¡mite del Anteproyecto del proyecto ante el INVU, el Ministerio de Salud y la Municipalidad respectiva, segÃºn corresponda a las competencias de cada instituciÃ³n.',NULL),(13,'Para: Cuando marque accesos calle pública. (nacional o cantonal).','Para la eventual construcciÃ³n se debe de respetar los retiros de Ley (Rutas nacional, Cantonal o cualquier otro que corresponda segÃºn la ubicaciÃ³n del terreno).',NULL),(14,'Para: Cuando marque urbanización residencial, proyecto de interés social en Oficina.','El proyecto estÃ¡ condicionado a las siguientes variables, basado en el expuesto en el artÃ¬culo 01 de la Ley de PlanificaciÃ³n Urbana donde indica: UrbanizaciÃ³n, es el fraccionamiento y habilitaciÃ³n de un terreno para fines urbanos, mediante apertura de calles y provisiÃ³n de servicios:\n?	Debe someter el proyecto a revisiÃ³n ante la SETENA para la obtenciÃ³n de la viabilidad (Licencia) ambiental. \n?	Condicionado a tramitar el proyecto ante el INVU, Reglamento de Fraccionamiento III.36.1.1. UrbanizaciÃ³n o fraccionamiento residencial: El criterio a utilizar es el de densidad habitacional debiendo cederse veinte (20) metros cuadrados o lote o 20 m2 unidad de vivienda. Esta cantidad en porcentaje no podrÃ¡ ser menor de un 5% ni mayor de un 20% del Ã¡rea urbanizable, salvo en vivienda de interÃ©s social en cuyo caso el mÃ¬nimo serÃ¡ el 10%. Ã€reas VerdesIII.6.2.1. La porciÃ³n del Ã¡rea que se ubique en la urbanizaciÃ³n deberÃ¡ destinarse. Prioritariamente a juegos infantiles y parque.  Lo necesario para estos usos se calcularÃ¡ asÃ¬: por lote o casa 10 m2 / para juegos infantiles. Resto del Ã¡rea, hasta completar 1/3 del Ã¡rea pÃºblica para parque o juegos deportivos, Estas dos Ã¡reas deberÃ¡n estar preferentemente juntas. III.3.6.2.2. Los terrenos en que se ubiquen las Ã¡reas pÃºblicas deberÃ¡n tener una topografÃ¬a de calidad no mayor al promedio de la que tiene todo el terreno urbanizable. Para este tipo de proyectos se debe respetar todo lo concerniente al Reglamento para el Control Nacional de Fraccionamientos y Urbanizaciones a lo cual debe de cumplir. \n',NULL),(15,'Para: Cuando marque Pozo Público en inspección u Oficina.','Si se realiza la apertura de un pozo debe hacerse bajo la legalidad pertinente ademÃ¡s apegarse a lo dispuesto por la Ley de Aguas N° 276, en el artÃ¬culo 31 que indica: Se declaran como reserva de dominio a favor de la NaciÃ³n: a) Las tierras que circunden los sitios de captaciÃ³n o tomas surtidoras de agua potable, en un perímetro no menor de 200mts de radio.',NULL),(16,'Para: Cuando marque Pozo Artesanal en inspección u Oficina.','Texto de la ley:\nSi se realiza la apertura de un pozo debe hacerse bajo la legalidad pertinente ademÃ¡s apegarse a lo dispuesto por la Ley de Aguas N° 276, en el artÃ¬culo 8 que indica: Las labores de que trata el artÃ¬culo anterior para alumbramiento, no podrÃ¡n ejecutarse a menor distancia de 40mts de Edificios ajenos, de un ferrocarril, o carretera, ni a menor de 100mts de otro alumbramiento o fuente, rÃ¬o, canal, acequia o abrevadero pÃºblico, sin la licencia correspondiente del Ministerio de Ambiente y EnergÃ¬a…\n',NULL),(17,'Para: Cuando se marque en advertencia administrativa en Oficina.','La propiedad cuenta con Advertencia Administrativa.  Esta resoluciÃ³n se otorga basado en el decreto 26771-J Reglamento del Registro PÃºblico ArtÃ¬culo 97. \nLa Propiedad cuenta con Advertencia Administrativa, la cual indica segÃºn el decreto ejecutivo N° 35509-J de 30 de septiembre de 2009, publicado en gaceta N° 198 del 13 de octubre de 2009….. Disponiendo su carÃ¡cter de mera publicidad noticia y su efecto de no impedir la inscripciÃ³n de documentos posteriores. AdemÃ¡s se indica La medida cautelar de nota de Advertencia Administrativa, al tener efecto de mera publicidad noticia, no impide la inscripciÃ³n de documentos presentados con posterioridad a su imposiciÃ³n y por tanto no suspende su plazo de caducidad.\nBasado en el oficio N°  DGJ-0010-2016 del Departamento De GestiÃ³n JurÃ¬dica el día 22 de Febrero, firmado por el Lic. Humberto LeÃ³n AbadÃ¬a, donde determino lo siguiente:\nComo nos indica el siguiente fundamento de derecho, el cual corresponde a doctrina que ha dado sustento a los criterios jurÃ¬dicos. En ese sentido, la jurisprudencia y doctrina dentro de la dinÃ¡mica de lo que corresponden a las advertencias administrativas han dicho por medio de tratadistas del derecho, versados en esta materia como el Dr. Ernesto Jinesta Lobo, sobre ese contexto, se apunta las consideraciones que, a continuaciÃ³n se hacen.\nLa condiciÃ³n de la advertencia administrativa sobre un terreno y sobre lo cual, debe de tenerse claro que, “la advertencia administrativa pertenece a la especie de medidas cautelares dictadas dentro de un procedimiento con el fin de garantizar la eficacia de lo que se resuelva, mientras que la inmovilizaciÃ³n corresponde a la ejecución de lo ya resuelto dentro del procedimiento administrativo.\n“ Se extrae de las doctrinas aportada, debe tenerse claro que, la administraciÃ³n tiene el deber entonces de acatar lo que por principio de legalidad y de fe pÃºblica y publicidad registrales, indica el Registro Inmobiliario en base digital de consultas, como ',NULL),(18,'Para: Agregar en patentes Servidumbre de Paso-Comercial.','Basado en el oficio DGJ-0052-2016, firmado por el Lic. Humberto León Abadía del departamento de Gestión Jurídica el cual indica que basado en el Reglamento para el control Nacional de Fraccionamiento y Urbanizaciones señala en su capítulo II fraccionamiento, punto II.2, Accesos, apuntados ha Vivienda y no refiere a actividades comerciales.  De conformidad con los artículos 39,41 de la constitución política, 163 del código municipal, 173 de la ley general de la administración pública. Por lo cual no es posible dar el uso conforme para la actividad solicitada ya que lo único que se puede desarrollar en la propiedad es para lo que fue confinado por la servidumbre de paso Vivienda.',5),(19,'Para: Si se marca Acuífero ','Uso de Suelo No Conforme de Resoluci Ã³n Municipal de Ubicaci Ã³n con el proyecto a realizar, por encontrarse dentro del Ã¡rea de restricci Ã³n del Acuífero Mala Noche. Seg Ãºn lo dispuesto por SENARA. Basado en el mapa se encuentra en Vulnerabilidad Extrema donde indica que no se debe permitir, ning Ãºn tipo de desarrollo, de acuerdo con la matriz de Vulnerabilidad aprobada por el SENARA en el acuerdo de Junta directiva 3303, seg Ãºn el Oficio DIGH-0373-2011 de SENARA, donde se externa que no se puede  ejecutar ning Ãºn tipo de proyecto que pueda contaminar el mismo, sea este urban Ã¬stico   (Vivienda), hotelero o agropecuario.   Como muestra la imagen:',6),(20,'Para: Área verde, zona institucional. Plan regulador Nicoya','Imagen del Plan Regulador de \nNicoya Aprobado para el distrito primero, que fue publicado en gaceta # 18 del 26-01-1983. Como se muestra en la Imagen del plan regulador. \n',NULL),(21,'Para: Existen movimientos de tierra.','Basado en el informe de campo de la inspección Municipal realizado por el funcionario Municipal. Se condicionada la presente resolución a tramitar el movimiento de tierra ante el Departamento de Control Constructivo. En apego al oficio IM-053-2016 del departamento de Control Constructivo, donde se indica que todo movimiento de tierra (Que no sea limpieza de capar vegetal) requiere de licencia Municipal para el desarrollo.',2),(22,'Para: Futuro movimiento de tierra.','Basado en el informe de campo de la inspección Municipal realizado por el funcionario Municipal. Si se realiza movimiento de tierra esta resolución municipal queda condicionada a tramitar el movimiento de tierra ante el Departamento de Control Constructivo. En apego al oficio IM-053-2016 del departamento de Control Constructivo, donde se indica que todo movimiento de tierra (Que no sea limpieza de capar vegetal) requiere de licencia Municipal para el desarrollo.  ',2),(23,'Para: Todos residencial y desarrollo, comercial-industrial, estación de servicios, construcción institucional y vivienda bono.','La altura m Ã¡xima y la cobertura deber Ã¡n estar apegadas a lo dispuesto en la Ley de Planificaci Ã³n Urbana, Ley de Uso, Manejo y Conservaci Ã³n de Suelo N° 7779, Ley forestal N°7575 y dem Ã¡s Legislaci Ã³n Vigente.',4),(24,'Para: Cuando indique que está fuera del plan regulador','LA VALIDEZ DE LA PRESENTE RESOLUCIÃ“N, PERMANECERÃ€  HASTA QUE ENTRE EN VIGENCIA, UN PLAN REGULADOR QUE AFECTE EL PREVIO RELACIONADO.',0),(25,'Para: Cuando indique que está dentro del plan regulador.','LA VALIDEZ DE LA PRESENTE RESOLUCIÃ“N, PERMANECERÃ€ MIENTRAS ESTÃ‰ EN VIGENCIA, EL PLAN REGULADOR QUE AFECTE EL PREVIO RELACIONADO.',0),(26,'Para: Clase VIII - Oficina','Basado en el oficio DST-213-2016 del 27 de octubre del 2016 firmado por el Ing. Agr. Renato JimÃ©nez ZÃºÃ±iga, MSC. Jefe del departamento de servicios técnicos del INTA. Donde delimita en el punto5: Finalmente, esta dependencia no tiene competencia legal ni técnica para definir si la propiedad de marras se encuentra o no en zona de bosque o con aptitud forestal, debido a que este tema es resorte exclusivo del Sistema Nacional de Ã€reas de ConservaciÃ³n (SINAC), del Ministerio de Ambiente y EnergÃ¬a. ',NULL),(27,'Para: Permiso de Construcción – Patentes, cuando no tiene el permiso de construcción.','Por lo tanto, se incumple con el ordenamiento jurÃ¬dico el cual es muy claro en cuanto a la Ley de ConstrucciÃ³n Nº833, la cual apunta lo siguiente:\nArtÃ¬culo 74: “…...Licencias. Toda obra relacionada con la construcciÃ³n, que se ejecute en las poblaciones de la RepÃºblica, sea de carÃ¡cter permanente o provisional, deberÃ¡ ejecutarse con licencia de la Municipalidad correspondiente…..”.\nArtÃ¬culo 89: “….Infracciones. Se considerarÃ¡n infracciones ademÃ¡s de las señaladas en los CapÃ¬tulos de este Ordenamiento, las siguientes:\na) Ejecutar sin licencia previa, obras para las cuales esta ley y su reglamento exigen la licencia.\nb) Ejecutar obras amparadas por una licencia de plazo vencido.\nc) Ejecutar una obra modificando en parte o radicalmente el proyecto respectivo aprobado.\nd) Ejecutar, sin la debida protecciÃ³n, obras que pongan en peligro la vida o las propiedades.\ne) No enviar oportunamente a la Municipalidad los informes de datos que se previenen en diferentes CapÃ¬tulos del Reglamento.\nf) No dar aviso a la Municipalidad de suspensiÃ³n o terminaciÃ³n de obras.\ng) No obedecer Ã³rdenes sobre modificaciones, suspensiÃ³n o destrucciÃ³n de obras de la Municipalidad.\nArtÃ¬culo 92: “….Las multas y otras penas se impondrÃ¡n al propietario, Ingeniero Responsable, al Contratista, o a cualquier persona que infrinja este Reglamento….”\nArtÃ¬culo 93: “Cuando un edificio o construcciÃ³n o instalaciÃ³n ha sido terminado sin licencia ni proyecto aprobado por la Municipalidad y sin que se haya dado aviso a esta de la terminaciÃ³n de la obra, se levantarÃ¡ una informaciÃ³n, fijando al propietario un plazo improrrogable de treinta (30) dÃ¬as, para que dÃ© cumplimiento a lo estatuido en esta Ley y Reglamento, presentando el proyecto, solicitud de licencia, etc.”\nArtÃ¬culo 94: “Si pasado el plazo fijado, el propietario no ha dado cumplimiento a la orden anterior, se le levantarÃ¡ una nueva informaciÃ³n la que se pondrÃ¡ de acuerdo con el artÃ¬culo sobre Renuencia y se fijarÃ¡ un últ',5),(28,'Para: (CFIA) Cuando se marque vivienda bono o vivienda unifamiliar y cuando se deniega el uso de suelo.','Se le indica que el trÃ¡mite de Uso de suelo es parte de los estudios preliminares segÃºn el Colegio Federado de Ingenieros y Arquitectos, el cual debe realizar su profesional o su desarrollador, ademÃ¡s este se realiza antes de cualquier de trÃ¡mite de Vivienda Bono o Vivienda Unifamiliar para delimitar si la propiedad en estudio tiene alguna limitante.  Como es en este caso, esto con el fin de no generarle una expectativa o ilusiÃ³n errÃ³nea al contribuyente.',NULL),(29,'Para: Cuando se deniega un uso de suelo.','De conformidad con lo expuesto en el artÃ¬culo 162 del cÃ³digo municipal, puede interponer los recursos de revocatoria con apelaciÃ³n en subsidio dentro de un plazo de los cinco dÃ¬as hÃ¡biles, contados a partir del dÃ¬a siguiente de la presente notificaciÃ³n, que resuelve el departamento de planificaciÃ³n urbana en revocatoria y el alcalde municipal en apelaciÃ³n subsidiaria, ello en caso de que se decida interponer uno o ambos recursos.',NULL),(30,'Para: Oficios de la alcaldía - Oficina','En apego al ArtÃ¬culo 107, de la Ley de AdministraciÃ³n PÃºblica y en vista de lo anterior este despacho procede a dar la ResoluciÃ³n.',NULL),(31,'Para: Cuando se marca servidumbre agrícola.','La figura que se utilizÃ³ para el fraccionamiento es la de Servidumbre de AgrÃ¬cola por lo tanto basado en la Reforma al Reglamento para el Control Nacional de Fraccionamientos y Urbanizaciones, INSTITUTO NACIONAL DE VIVIENDA Y URBANISMO, REGLAMENTO PARA EL CONTROL NACIONAL DE FRACCIONAMIENTO Y URBANIZACIONES, donde indica: ArtÃ¬culo II.2.1.6. Para fines agrÃ¬colas, pecuarios y forestales se podrÃ¡n permitir segregaciones de parcelas con frente a servidumbres especiales, que en adelante se denominarÃ¡n agrÃ¬colas y forestales, las porciones resultantes deberÃ¡n ser iguales o mayores a los 5 000 m2, en estos casos los planos individuales deben indicar \"uso agrÃ¬cola\", \"uso pecuario\"; o \"uso forestal\", segÃºn corresponda. Las construcciones de vivienda y demÃ¡s instalaciones y estructuras quedan sujetas a un mÃ¡ximo del 15% en Ã¡rea de cobertura.',1),(32,'Para: Cuando se marca Área Verde o Zona Institucional, y se deniega el uso de suelo.',' De previo a resolver favor presentar el HistÃ³rico de la finca desde su nacimiento. ',NULL),(33,'Para: Cuando se marca Servidumbre de Paso o Agrícola, y se deniega el uso de suelo.','Visado Municipal:\nAcuerdo N°2  ….. donde indica que la aprobaciÃ³n del Visado no constituirÃ¡ implícitamente el otorgamiento del permiso de construcciÃ³n o del uso de suelo……  Aprobado en firme a partir de su publicaciÃ³n. Nicoya, 6 de noviembre del 2008—Marco Antonio JimÃ©nez MuÃ±oz secretario Municipal—1 vez—(105965). La gaceta N° 223 del 18 de noviembre del 2008. \nCabe destacar que en materia de Urbanismo, Derecho Ambiental y en Bienes de Dominio PÃºblico no opera el silencio positivo lo que puede consultarse en las resoluciones del Tribunal Contencioso Administrativo 2011-00126 SIII, 2015-00247 SVI y 2016-00433 SIII y en  los votos 2005-00119, 2008-0071 y 2013-01195 de la sal primera. \n',1),(34,'Para: Cuando se marca (previo a resolver).','Una vez este proceso sea subsanado se deberÃ¡ tramitar por medio de correspondencia adjuntando copia de este oficio y si todo se encuentra conforme, se procederÃ¡ a brindar la ResoluciÃ³n de UbicaciÃ³n de Usos de Suelo para la Actividad Deseada. ',NULL);

UNLOCK TABLES;

/*Table structure for table `pu46traleyactividades` */

DROP TABLE IF EXISTS `pu46traleyactividades`;

CREATE TABLE `pu46traleyactividades` (
  `pu04idtra` int(11) DEFAULT NULL,
  `pu45idley` int(11) DEFAULT NULL,
  KEY `FK_pu46traleyactividades` (`pu45idley`),
  KEY `FK_pu46traleyactividadess` (`pu04idtra`),
  CONSTRAINT `FK_pu46traleyactividades` FOREIGN KEY (`pu45idley`) REFERENCES `pu45leyes` (`pu45idley`),
  CONSTRAINT `FK_pu46traleyactividadess` FOREIGN KEY (`pu04idtra`) REFERENCES `pu04tramite1` (`PU04IDTRA`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `pu46traleyactividades` */

LOCK TABLES `pu46traleyactividades` WRITE;

UNLOCK TABLES;

/*Table structure for table `pu46traleyareaspro` */

DROP TABLE IF EXISTS `pu46traleyareaspro`;

CREATE TABLE `pu46traleyareaspro` (
  `pu04idtra` int(11) DEFAULT NULL,
  `pu45idley` int(11) DEFAULT NULL,
  KEY `FK_pu46traleyareaspro` (`pu45idley`),
  KEY `FK_pu46traleyareasprot` (`pu04idtra`),
  CONSTRAINT `FK_pu46traleyareaspro` FOREIGN KEY (`pu45idley`) REFERENCES `pu45leyes` (`pu45idley`),
  CONSTRAINT `FK_pu46traleyareasprot` FOREIGN KEY (`pu04idtra`) REFERENCES `pu04tramite1` (`PU04IDTRA`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `pu46traleyareaspro` */

LOCK TABLES `pu46traleyareaspro` WRITE;

insert  into `pu46traleyareaspro`(`pu04idtra`,`pu45idley`) values (1,31),(4,31);

UNLOCK TABLES;

/*Table structure for table `pu46traleyaspectobio` */

DROP TABLE IF EXISTS `pu46traleyaspectobio`;

CREATE TABLE `pu46traleyaspectobio` (
  `pu04idtra` int(11) DEFAULT NULL,
  `pu45idley` int(11) DEFAULT NULL,
  KEY `FK_pu46traleyaspectobio` (`pu45idley`),
  KEY `FK_pu46traleyaspectobiof` (`pu04idtra`),
  CONSTRAINT `FK_pu46traleyaspectobio` FOREIGN KEY (`pu45idley`) REFERENCES `pu45leyes` (`pu45idley`),
  CONSTRAINT `FK_pu46traleyaspectobiof` FOREIGN KEY (`pu04idtra`) REFERENCES `pu04tramite1` (`PU04IDTRA`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `pu46traleyaspectobio` */

LOCK TABLES `pu46traleyaspectobio` WRITE;

insert  into `pu46traleyaspectobio`(`pu04idtra`,`pu45idley`) values (1,3),(62135,10);

UNLOCK TABLES;

/*Table structure for table `pu46traleydesarrosect` */

DROP TABLE IF EXISTS `pu46traleydesarrosect`;

CREATE TABLE `pu46traleydesarrosect` (
  `pu04idtra` int(11) DEFAULT NULL,
  `pu45idley` int(11) DEFAULT NULL,
  KEY `FK_pu46traleydesarrosect` (`pu04idtra`),
  KEY `FK_pu46traleydesarrosecto` (`pu45idley`),
  CONSTRAINT `FK_pu46traleydesarrosect` FOREIGN KEY (`pu04idtra`) REFERENCES `pu04tramite1` (`PU04IDTRA`),
  CONSTRAINT `FK_pu46traleydesarrosecto` FOREIGN KEY (`pu45idley`) REFERENCES `pu45leyes` (`pu45idley`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `pu46traleydesarrosect` */

LOCK TABLES `pu46traleydesarrosect` WRITE;

insert  into `pu46traleydesarrosect`(`pu04idtra`,`pu45idley`) values (1,12),(62135,1),(62135,2),(62135,23);

UNLOCK TABLES;

/*Table structure for table `pu46traleyespaciosgeo` */

DROP TABLE IF EXISTS `pu46traleyespaciosgeo`;

CREATE TABLE `pu46traleyespaciosgeo` (
  `pu04idtra` int(11) DEFAULT NULL,
  `pu45idley` int(11) DEFAULT NULL,
  KEY `FK_pu46traleyespaciosgeo` (`pu45idley`),
  KEY `FK_pu46traleyespaciosgeog` (`pu04idtra`),
  CONSTRAINT `FK_pu46traleyespaciosgeo` FOREIGN KEY (`pu45idley`) REFERENCES `pu45leyes` (`pu45idley`),
  CONSTRAINT `FK_pu46traleyespaciosgeog` FOREIGN KEY (`pu04idtra`) REFERENCES `pu04tramite1` (`PU04IDTRA`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `pu46traleyespaciosgeo` */

LOCK TABLES `pu46traleyespaciosgeo` WRITE;

insert  into `pu46traleyespaciosgeo`(`pu04idtra`,`pu45idley`) values (1,12),(62135,22);

UNLOCK TABLES;

/*Table structure for table `pu46traleypatente` */

DROP TABLE IF EXISTS `pu46traleypatente`;

CREATE TABLE `pu46traleypatente` (
  `pu04idtra` int(11) DEFAULT NULL,
  `pu45idley` int(11) DEFAULT NULL,
  KEY `FK_pu46traleypatente` (`pu45idley`),
  KEY `FK_pu46traleypatentes` (`pu04idtra`),
  CONSTRAINT `FK_pu46traleypatente` FOREIGN KEY (`pu45idley`) REFERENCES `pu45leyes` (`pu45idley`),
  CONSTRAINT `FK_pu46traleypatentes` FOREIGN KEY (`pu04idtra`) REFERENCES `pu04tramite1` (`PU04IDTRA`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `pu46traleypatente` */

LOCK TABLES `pu46traleypatente` WRITE;

UNLOCK TABLES;

/*Table structure for table `pu46traleyplan` */

DROP TABLE IF EXISTS `pu46traleyplan`;

CREATE TABLE `pu46traleyplan` (
  `pu04idtra` int(11) DEFAULT NULL,
  `pu45idley` int(11) DEFAULT NULL,
  KEY `FK_pu46traleyplan` (`pu04idtra`),
  KEY `FK_pu46traleyplanre` (`pu45idley`),
  CONSTRAINT `FK_pu46traleyplan` FOREIGN KEY (`pu04idtra`) REFERENCES `pu04tramite1` (`PU04IDTRA`),
  CONSTRAINT `FK_pu46traleyplanre` FOREIGN KEY (`pu45idley`) REFERENCES `pu45leyes` (`pu45idley`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `pu46traleyplan` */

LOCK TABLES `pu46traleyplan` WRITE;

insert  into `pu46traleyplan`(`pu04idtra`,`pu45idley`) values (1,14),(4,14),(60871,24);

UNLOCK TABLES;

/*Table structure for table `pu46traleyredvial` */

DROP TABLE IF EXISTS `pu46traleyredvial`;

CREATE TABLE `pu46traleyredvial` (
  `pu04idtra` int(11) DEFAULT NULL,
  `pu45idley` int(11) DEFAULT NULL,
  KEY `FK_pu46traleyredvial` (`pu04idtra`),
  KEY `FK_pu46traleyredvialt` (`pu45idley`),
  CONSTRAINT `FK_pu46traleyredvial` FOREIGN KEY (`pu04idtra`) REFERENCES `pu04tramite1` (`PU04IDTRA`),
  CONSTRAINT `FK_pu46traleyredvialt` FOREIGN KEY (`pu45idley`) REFERENCES `pu45leyes` (`pu45idley`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `pu46traleyredvial` */

LOCK TABLES `pu46traleyredvial` WRITE;

insert  into `pu46traleyredvial`(`pu04idtra`,`pu45idley`) values (1,23);

UNLOCK TABLES;

/* Procedure structure for procedure `LOGIN` */

/*!50003 DROP PROCEDURE IF EXISTS  `LOGIN` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `LOGIN`(usuario VARCHAR(30), clave VARCHAR(30))
BEGIN
SELECT `pu01regusu`.`PU01NOMUSU`, `pu03puestos`.`PU03IDPUES`, `pu03puestos`.`PU03PUESTO` 
FROM 
	`pu01regusu`
	INNER JOIN
	`pu02infusu` 
	ON `pu01regusu`.`PU01CEDUSU`=`pu02infusu`.`PU01CEDUSU`
	
	INNER JOIN 
		`pu03puestos`
		ON `pu02infusu`.`PU03IDPUES` = `pu03puestos`.`PU03IDPUES`
		
 WHERE `pu02infusu`.`PU02USUARIO`= usuario AND `pu02infusu`.`PU02CLAVE`=clave;
END */$$
DELIMITER ;

/* Procedure structure for procedure `R_ACTDES` */

/*!50003 DROP PROCEDURE IF EXISTS  `R_ACTDES` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `R_ACTDES`(id INT)
BEGIN
SET lc_time_names = 'es_ES';
SELECT DISTINCT
	 `pu06actdes`.`PU06DESAD`
 FROM `pu04tramite1`
	INNER JOIN `pu04regtra` ON `pu04tramite1`.`PU04IDTRA` = `pu04regtra`.`PU04IDTRA`
	INNER JOIN `pu05unitra` ON `pu04regtra`.`PU04IDTRA` = `pu05unitra`.`PU04IDTRA`
	INNER JOIN `pu06actdes` ON `pu05unitra`.`PU06IDACTDES` = `pu06actdes`.`PU06IDACTDES`
	WHERE `pu04tramite1`.`PU04IDTRA`= id;
END */$$
DELIMITER ;

/* Procedure structure for procedure `R_DESCEG` */

/*!50003 DROP PROCEDURE IF EXISTS  `R_DESCEG` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `R_DESCEG`(id INT)
BEGIN
SET lc_time_names = 'es_ES';
SELECT 
	 `pu09desceg`.`PU09DESCREG`
 FROM `pu04tramite1`
	INNER JOIN `pu04regtra` ON `pu04tramite1`.`PU04IDTRA` = `pu04regtra`.`PU04IDTRA`
	INNER JOIN `pu09tradeg` ON `pu04regtra`.`PU04IDTRA` = `pu09tradeg`.`PU04IDTRA`
	INNER JOIN `pu09desceg` ON `pu09tradeg`.`PU09IDDEG` = `pu09desceg`.`PU09IDDEG`
	WHERE `pu04tramite1`.`PU04IDTRA`= id;
END */$$
DELIMITER ;

/* Procedure structure for procedure `R_LEYES` */

/*!50003 DROP PROCEDURE IF EXISTS  `R_LEYES` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `R_LEYES`(id INT (11))
BEGIN
	SELECT 	`pu45leyes`.`pu45descripcion`
	
	FROM pu45leyes
	INNER JOIN 
		pu46traleyareaspro
			
			ON pu45leyes.pu45idley = pu46traleyareaspro.`pu45idley`	
			
			
			INNER JOIN pu04tramite1
					
				ON `pu04tramite1`.`PU04IDTRA` = `pu46traleyareaspro`.`pu04idtra`
							
						WHERE `pu04tramite1`.`PU04IDTRA`=id;
	
END */$$
DELIMITER ;

/* Procedure structure for procedure `R_LEYES1` */

/*!50003 DROP PROCEDURE IF EXISTS  `R_LEYES1` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `R_LEYES1`(id INT (11))
BEGIN
	SELECT 	`pu45leyes`.`pu45descripcion`
	
	FROM pu45leyes
	INNER JOIN 
		pu46traleyespaciosgeo
			
			ON pu45leyes.pu45idley = pu46traleyespaciosgeo.`pu45idley`
			INNER JOIN pu04tramite1
					
							ON `pu04tramite1`.`PU04IDTRA` = `pu46traleyespaciosgeo`.`pu04idtra`
					
			
						WHERE `pu04tramite1`.`PU04IDTRA`=id;
	
END */$$
DELIMITER ;

/* Procedure structure for procedure `R_LEYES2` */

/*!50003 DROP PROCEDURE IF EXISTS  `R_LEYES2` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `R_LEYES2`(id INT (11))
BEGIN
	SELECT 	`pu45leyes`.`pu45descripcion`
	
	FROM pu45leyes
	INNER JOIN 
		`pu44traleyaccesos`
			
			ON pu45leyes.pu45idley = `pu44traleyaccesos`.`pu45idley`
			INNER JOIN pu04tramite1
					
							ON `pu04tramite1`.`PU04IDTRA` = `pu44traleyaccesos`.`pu04idtra`
					
			
						WHERE `pu04tramite1`.`PU04IDTRA`=id;
	
END */$$
DELIMITER ;

/* Procedure structure for procedure `R_LEYES3` */

/*!50003 DROP PROCEDURE IF EXISTS  `R_LEYES3` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `R_LEYES3`(id INT (11))
BEGIN
	SELECT 	`pu45leyes`.`pu45descripcion`
	
	FROM pu45leyes
	INNER JOIN 
		`pu46traleydesarrosect`
			
			ON pu45leyes.pu45idley = `pu46traleydesarrosect`.`pu45idley`
			INNER JOIN pu04tramite1
					
							ON `pu04tramite1`.`PU04IDTRA` = `pu46traleydesarrosect`.`pu04idtra`
					
			
						WHERE `pu04tramite1`.`PU04IDTRA`=id;
	
END */$$
DELIMITER ;

/* Procedure structure for procedure `R_LEYES4` */

/*!50003 DROP PROCEDURE IF EXISTS  `R_LEYES4` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `R_LEYES4`(id INT (11))
BEGIN
	SELECT 	`pu45leyes`.`pu45descripcion`
	
	FROM pu45leyes
	INNER JOIN 
		`pu46traleyplan`
			
			ON pu45leyes.pu45idley = `pu46traleyplan`.`pu45idley`
			INNER JOIN pu04tramite1
					
							ON `pu04tramite1`.`PU04IDTRA` = `pu46traleyplan`.`pu04idtra`
					
			
						WHERE `pu04tramite1`.`PU04IDTRA`=id;
	
END */$$
DELIMITER ;

/* Procedure structure for procedure `R_LEYES5` */

/*!50003 DROP PROCEDURE IF EXISTS  `R_LEYES5` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `R_LEYES5`(id INT (11))
BEGIN
	SELECT 	`pu45leyes`.`pu45descripcion`
	
	FROM pu45leyes
	INNER JOIN 
		`pu46traleyredvial`
			
			ON pu45leyes.pu45idley = `pu46traleyredvial`.`pu45idley`
			INNER JOIN pu04tramite1
					
							ON `pu04tramite1`.`PU04IDTRA` = `pu46traleyredvial`.`pu04idtra`
					
			
						WHERE `pu04tramite1`.`PU04IDTRA`=id;
	
END */$$
DELIMITER ;

/* Procedure structure for procedure `R_PRINCIPAL` */

/*!50003 DROP PROCEDURE IF EXISTS  `R_PRINCIPAL` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `R_PRINCIPAL`(id INT)
BEGIN
SET lc_time_names = 'es_ES';
SELECT 
	 `pu26planactinicosama`.`PU26IDDESCNICOYASAMA`
 FROM `pu04tramite1`
	INNER JOIN `pu26traplan` ON `pu04tramite1`.`PU04IDTRA` = `pu26traplan`.`PU04IDTRA`
	INNER JOIN `pu26planactinicosama` ON `pu26traplan`.`PU26IDDESCNICOYASAMA` = `pu26planactinicosama`.`PU26IDDESCNICOYASAMA`
	WHERE `pu04tramite1`.`PU04IDTRA`= id;
END */$$
DELIMITER ;

/* Procedure structure for procedure `R_RESI1` */

/*!50003 DROP PROCEDURE IF EXISTS  `R_RESI1` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `R_RESI1`(id INT)
BEGIN
SET lc_time_names = 'es_ES';
SELECT DISTINCT
	 `pu26planactinicosama`.`PU26DESCACNICOYASAMA`
 FROM `pu04tramite1`
	INNER JOIN `pu26traplan` ON `pu04tramite1`.`PU04IDTRA` = `pu26traplan`.`PU04IDTRA`
	INNER JOIN `pu26planactinicosama` ON `pu26traplan`.`PU26IDDESCNICOYASAMA` = `pu26planactinicosama`.`PU26IDDESCNICOYASAMA`
	WHERE `pu04tramite1`.`PU04IDTRA`= id;
END */$$
DELIMITER ;

/* Procedure structure for procedure `SP00_LISTAR_INGRESO_TRAMITE` */

/*!50003 DROP PROCEDURE IF EXISTS  `SP00_LISTAR_INGRESO_TRAMITE` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `SP00_LISTAR_INGRESO_TRAMITE`()
BEGIN
	
 SELECT `pu04tramite1`.PU04IDTRA,`pu04tramite1`.PU04FEINICIO,`pu04tramite2`.`PU04FEPLATAFOR`,
CASE `pu04tramite2`.`PU04IDDISTRITO` WHEN "1" THEN "Nicoya"
				WHEN "2" THEN "Mansion"
				WHEN "3" THEN "San Antonio"
				WHEN "4" THEN "Quebrada Honda"
				WHEN "5" THEN "Samara"
				WHEN "6" THEN "Nosara"
				WHEN "7" THEN "Belen" END
 FROM pu04tramite1
 INNER JOIN `pu04tramite2`
 ON `pu04tramite1`.`PU04IDTRA` = `pu04tramite2`.`PU04IDTRA`
 WHERE pu04tramite1.PUIDESTADO=1
 ORDER BY `pu04tramite1`.`PU04FEINICIO` DESC;	
END */$$
DELIMITER ;

/* Procedure structure for procedure `SP00_LISTAR_TRAMITE_ACEPTADO` */

/*!50003 DROP PROCEDURE IF EXISTS  `SP00_LISTAR_TRAMITE_ACEPTADO` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `SP00_LISTAR_TRAMITE_ACEPTADO`()
BEGIN
	
	SELECT `PU04IDTRA`,`PU04FEINICIO`
	FROM 
	`pu04tramite1`	
		WHERE PUIDESTADO=3;
END */$$
DELIMITER ;

/* Procedure structure for procedure `SP00_LISTAR_TRAMITE_ATRASADO` */

/*!50003 DROP PROCEDURE IF EXISTS  `SP00_LISTAR_TRAMITE_ATRASADO` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `SP00_LISTAR_TRAMITE_ATRASADO`()
BEGIN
	
	SELECT `PU04IDTRA`,`PU04FEINICIO`
	FROM 
	`pu04tramite1`	
		WHERE PUIDESTADO=6;
END */$$
DELIMITER ;

/* Procedure structure for procedure `R_RESI` */

/*!50003 DROP PROCEDURE IF EXISTS  `R_RESI` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `R_RESI`(id INT)
BEGIN
SET lc_time_names = 'es_ES';
SELECT DISTINCT
	 DATE_FORMAT(NOW(),"%d %M %Y") AS 'Fecha Actual',
	`pu04tramite1`.`PU04IDTRA`,
	`pu39regsolicitante`.`PU39NOMSOLICI`,
	`pu39regsolicitante`.`PU39APE1SOLICI`,
	`pu39regsolicitante`.`PU39APE2SOLICI`,
	`pu39regsolicitante`.`PU39CEDSOLICI`,
	`pu40reginfopropietario`.`PU40NCATASTRO`,
	`pu40reginfopropietario`.`PU40NFINCA`,
	`pu40regpropietario`.`PU40NOMPROPIE`,
	`pu40regpropietario`.`PU40APE1PROPIE`,
	`pu40regpropietario`.`PU40APE2PROPIE`,
	`pu40regpropietario`.`PU40CEDPROPIE`,
	`pu39reginfosolicitante`.`PU39BARRIO`,
	`pu39reginfosolicitante`.`PU39DIRECCION`,
	`pu04distrito`.`PU04IDDISTRITO`
 FROM `pu04tramite1`
	INNER JOIN `pu04regtra` ON `pu04tramite1`.`PU04IDTRA` = `pu04regtra`.`PU04IDTRA`
	INNER JOIN `pu04tramite2` ON `pu04tramite1`.`PU04IDTRA` = `pu04tramite2`.`PU04IDTRA`
	INNER JOIN `pu39regsolicitante` ON `pu04tramite1`.`PU04IDTRA` = `pu39regsolicitante`.`PU04IDTRA`
	INNER JOIN `pu40regpropietario` ON `pu04tramite1`.`PU04IDTRA` = `pu40regpropietario`.`PU04IDTRA`
	INNER JOIN `pu39reginfosolicitante` ON `pu39regsolicitante`.`PU39CEDSOLICI` = `pu39reginfosolicitante`.`PU39CEDSOLICI`
	INNER JOIN `pu40reginfopropietario` ON `pu40regpropietario`.`PU40CEDPROPIE` = `pu40reginfopropietario`.`PU40CEDPROPIE`
	INNER JOIN `pu04distrito` ON `pu04tramite2`.`PU04IDDISTRITO` = `pu04distrito`.`PU04IDDISTRITO`
	WHERE `pu04tramite1`.`PU04IDTRA`= id;
END */$$
DELIMITER ;

/* Procedure structure for procedure `R_RESOLUCION` */

/*!50003 DROP PROCEDURE IF EXISTS  `R_RESOLUCION` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `R_RESOLUCION`(id INT)
BEGIN
SET lc_time_names = 'es_ES';
SELECT DISTINCT
	 DATE_FORMAT(NOW(),"%d %M %Y") AS 'Fecha Actual',
	`pu04tramite1`.`PU04IDTRA`,
	`pu39regsolicitante`.`PU39NOMSOLICI`,
	`pu39regsolicitante`.`PU39APE1SOLICI`,
	`pu39regsolicitante`.`PU39APE2SOLICI`,
	`pu39regsolicitante`.`PU39CEDSOLICI`,
	`pu40reginfopropietario`.`PU40NCATASTRO`,
	`pu40reginfopropietario`.`PU40NFINCA`,
	`pu40regpropietario`.`PU40NOMPROPIE`,
	`pu40regpropietario`.`PU40APE1PROPIE`,
	`pu40regpropietario`.`PU40APE2PROPIE`,
	`pu40regpropietario`.`PU40CEDPROPIE`,
	`pu39reginfosolicitante`.`PU39BARRIO`,
	`pu39reginfosolicitante`.`PU39DIRECCION`,
	`pu04distrito`.`PU04IDDISTRITO`
 FROM `pu04tramite1`
	INNER JOIN `pu04regtra` ON `pu04tramite1`.`PU04IDTRA` = `pu04regtra`.`PU04IDTRA`
	INNER JOIN `pu04tramite2` ON `pu04tramite1`.`PU04IDTRA` = `pu04tramite2`.`PU04IDTRA`
	INNER JOIN `pu39regsolicitante` ON `pu04tramite1`.`PU04IDTRA` = `pu39regsolicitante`.`PU04IDTRA`
	INNER JOIN `pu40regpropietario` ON `pu04tramite1`.`PU04IDTRA` = `pu40regpropietario`.`PU04IDTRA`
	INNER JOIN `pu39reginfosolicitante` ON `pu39regsolicitante`.`PU39CEDSOLICI` = `pu39reginfosolicitante`.`PU39CEDSOLICI`
	INNER JOIN `pu40reginfopropietario` ON `pu40regpropietario`.`PU40CEDPROPIE` = `pu40reginfopropietario`.`PU40CEDPROPIE`
	INNER JOIN `pu04distrito` ON `pu04tramite2`.`PU04IDDISTRITO` = `pu04distrito`.`PU04IDDISTRITO`
	WHERE `pu04tramite1`.`PU04IDTRA`= id;
END */$$
DELIMITER ;

/* Procedure structure for procedure `SP00_LISTAR_TRAMITE_DENEGADOS` */

/*!50003 DROP PROCEDURE IF EXISTS  `SP00_LISTAR_TRAMITE_DENEGADOS` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `SP00_LISTAR_TRAMITE_DENEGADOS`()
BEGIN
	
	SELECT `PU04IDTRA`,`PU04FEINICIO`
	FROM 
	`pu04tramite1`	
		WHERE PUIDESTADO=4;
END */$$
DELIMITER ;

/* Procedure structure for procedure `SP00_LISTAR_TRAMITE_OFICINA` */

/*!50003 DROP PROCEDURE IF EXISTS  `SP00_LISTAR_TRAMITE_OFICINA` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `SP00_LISTAR_TRAMITE_OFICINA`()
BEGIN
	
	SELECT `PU04IDTRA`,`PU04FEINICIO`
	
FROM 
	`pu04tramite1`	
		
WHERE PUIDESTADO=7;
END */$$
DELIMITER ;

/* Procedure structure for procedure `SP00_LISTAR_TRAMITE_REALIZADO` */

/*!50003 DROP PROCEDURE IF EXISTS  `SP00_LISTAR_TRAMITE_REALIZADO` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `SP00_LISTAR_TRAMITE_REALIZADO`()
BEGIN
  SELECT DISTINCT pu04regtra.PU04IDTRA AS 'Numero Trámite', pu04regtra.PU04FETRA AS 'Fecha',
   pu04regtra.PU04NORTE AS 'Norte', pu04regtra.PU04ESTE AS 'Este', pu04regtra.PU04ALTITUD AS 'Altitud'
   
   FROM pu04regtra
   INNER JOIN
   pu04tramite1
   ON `pu04tramite1`.`PU04IDTRA` = `pu04regtra`.`PU04IDTRA`
   WHERE `pu04tramite1`.`PUIDESTADO` = 2;
          END */$$
DELIMITER ;

/* Procedure structure for procedure `SP01_REGINFUSU_ACTUALIZAR` */

/*!50003 DROP PROCEDURE IF EXISTS  `SP01_REGINFUSU_ACTUALIZAR` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `SP01_REGINFUSU_ACTUALIZAR`(IN CEDU INT(11), IN NOM VARCHAR(30), IN APE1 VARCHAR(30), IN APE2 VARCHAR(30),
  IN TEL VARCHAR(30), IN COR VARCHAR(100), IN IDPUES INT(11))
BEGIN
UPDATE PU01REGUSU
 SET PU01NOMUSU = NOM,
   PU01APE1USU = APE1,
    PU01APE2USU = APE2
    WHERE PU01CEDUSU = CEDU;
UPDATE PU02INFUSU 
SET PU02TELUSU = TEL,
  PU02CORUSU = COR,
   PU03IDPUES = IDPUES
     WHERE PU01CEDUSU = CEDU;
END */$$
DELIMITER ;

/* Procedure structure for procedure `SP01_REGINFUSU_BUSCAR` */

/*!50003 DROP PROCEDURE IF EXISTS  `SP01_REGINFUSU_BUSCAR` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `SP01_REGINFUSU_BUSCAR`(IN CEDU INT(11))
BEGIN
   SELECT PU01REGUSU.`PU01CEDUSU` AS 'Cédula', PU01REGUSU.`PU01NOMUSU` AS 'Nombre',
    PU01REGUSU.`PU01APE1USU` AS 'Primer Apellido', PU01REGUSU.`PU01APE2USU` AS 'Segundo Apellido',
   PU02INFUSU.`PU02TELUSU` AS 'Teléfono',PU02INFUSU.`PU02CORUSU` AS 'Correo', 
   CASE PU02INFUSU.`PU03IDPUES`WHEN "1" THEN "Coordinador"
			       WHEN "2" THEN "Asistente"   
			       WHEN "3" THEN "Alcalde"
			       WHEN "4" THEN "Administrador"
			       END AS 'Puesto'
   FROM PU01REGUSU
		INNER JOIN PU02INFUSU
		ON PU01REGUSU.`PU01CEDUSU` = PU02INFUSU.`PU01CEDUSU`
		WHERE PU01REGUSU.`PU01CEDUSU`=CEDU;
		
END */$$
DELIMITER ;

/* Procedure structure for procedure `SP01_REGINFUSU_ELIMINAR` */

/*!50003 DROP PROCEDURE IF EXISTS  `SP01_REGINFUSU_ELIMINAR` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `SP01_REGINFUSU_ELIMINAR`(IN CEDU INT(11))
BEGIN
DELETE FROM PU02INFUSU
  WHERE PU01CEDUSU = CEDU;
  DELETE FROM PU01REGUSU
 WHERE PU01CEDUSU = CEDU;
END */$$
DELIMITER ;

/* Procedure structure for procedure `SP01_REGINFUSU_GUARDAR` */

/*!50003 DROP PROCEDURE IF EXISTS  `SP01_REGINFUSU_GUARDAR` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `SP01_REGINFUSU_GUARDAR`(IN CEDU INT(11),
 IN NOM VARCHAR(30), IN APE1 VARCHAR(30), IN APE2 VARCHAR(30),
  IN TEL VARCHAR(30), IN COR VARCHAR(100), IN IDPUES INT(11), IN USU VARCHAR(30), IN CLA VARCHAR(30))
BEGIN
	INSERT INTO PU01REGUSU (PU01CEDUSU, PU01NOMUSU, PU01APE1USU, PU01APE2USU)
		VALUES (CEDU, NOM, APE1, APE2);
	INSERT INTO PU02INFUSU (PU01CEDUSU, PU02TELUSU, PU02CORUSU, PU03IDPUES, PU02USUARIO, PU02CLAVE)
		VALUES (CEDU, TEL, COR, IDPUES, USU, CLA);
END */$$
DELIMITER ;

/* Procedure structure for procedure `SP01_REGINFUSU_MOSTRARTODO` */

/*!50003 DROP PROCEDURE IF EXISTS  `SP01_REGINFUSU_MOSTRARTODO` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `SP01_REGINFUSU_MOSTRARTODO`()
BEGIN
SELECT `pu01regusu`.`PU01CEDUSU` AS 'Cédula',pu01regusu.`PU01NOMUSU` AS 'Nombre',pu01regusu.`PU01APE1USU` AS 'Primer Apellido',
pu01regusu.`PU01APE2USU` AS 'Segundo Apellido', `pu02infusu`.`PU02TELUSU` AS 'Teléfono',`pu02infusu`.`PU02CORUSU` AS 'Correo',
 CASE`pu02infusu`.`PU03IDPUES` WHEN "1" THEN "Coordinador"
				WHEN "2" THEN "Auxiliar"
				WHEN "3" THEN "Asistente"
				WHEN "4" THEN "Administrador" END AS 'Puesto'
FROM `pu01regusu`
        INNER JOIN `pu02infusu`
        ON pu01regusu.`PU01CEDUSU` = `pu02infusu`.`PU01CEDUSU`;       
        END */$$
DELIMITER ;

/* Procedure structure for procedure `SP01_REGTRA_ACTUALIZAR` */

/*!50003 DROP PROCEDURE IF EXISTS  `SP01_REGTRA_ACTUALIZAR` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `SP01_REGTRA_ACTUALIZAR`(IN IDTRA INT(11),
 IN NORTE INT(11),IN ESTE INT(11),IN ALTITUD INT(11))
BEGIN
UPDATE `pu04regtra`
 SET `PU04NORTE` = NORTE,
   `PU04ESTE` = ESTE,
    `PU04ALTITUD` = ALTITUD
    WHERE `PU04IDTRA` = IDTRA;
END */$$
DELIMITER ;

/* Procedure structure for procedure `SP03_PUESTOS_ACTUALIZAR` */

/*!50003 DROP PROCEDURE IF EXISTS  `SP03_PUESTOS_ACTUALIZAR` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `SP03_PUESTOS_ACTUALIZAR`(IN IDPUES INT(11), IN PUES VARCHAR(30))
BEGIN
UPDATE PU03PUESTOS
 SET PU03PUESTO = PUES
 WHERE PU03IDPUES = IDPUES;
END */$$
DELIMITER ;

/* Procedure structure for procedure `SP03_PUESTOS_BUSCAR` */

/*!50003 DROP PROCEDURE IF EXISTS  `SP03_PUESTOS_BUSCAR` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `SP03_PUESTOS_BUSCAR`(IN IDPUES INT(11))
BEGIN
SELECT `PU03IDPUES`,`PU03PUESTO`
FROM PU03PUESTOS 
WHERE PU03IDPUES = IDPUES;
END */$$
DELIMITER ;

/* Procedure structure for procedure `SP03_PUESTOS_ELIMINAR` */

/*!50003 DROP PROCEDURE IF EXISTS  `SP03_PUESTOS_ELIMINAR` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `SP03_PUESTOS_ELIMINAR`(IN IDPUES INT(11))
BEGIN
DELETE FROM PU03PUESTOS
 WHERE PU03IDPUES = IDPUES;
END */$$
DELIMITER ;

/* Procedure structure for procedure `SP03_PUESTOS_GUARDAR` */

/*!50003 DROP PROCEDURE IF EXISTS  `SP03_PUESTOS_GUARDAR` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `SP03_PUESTOS_GUARDAR`(IN IDPUES INT(11), IN PUES VARCHAR(30))
BEGIN
INSERT INTO PU03PUESTOS (PU03IDPUES, PU03PUESTO)
VALUES (IDPUES, PUES);
END */$$
DELIMITER ;

/* Procedure structure for procedure `SP03_PUESTOS_MOSTRAR` */

/*!50003 DROP PROCEDURE IF EXISTS  `SP03_PUESTOS_MOSTRAR` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `SP03_PUESTOS_MOSTRAR`()
BEGIN
SELECT `PU03IDPUES`,`PU03PUESTO`
 FROM PU03PUESTOS;
END */$$
DELIMITER ;

/* Procedure structure for procedure `SP04_DISTRITO_MOSTRAR` */

/*!50003 DROP PROCEDURE IF EXISTS  `SP04_DISTRITO_MOSTRAR` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `SP04_DISTRITO_MOSTRAR`()
BEGIN
SELECT `PU04IDDISTRITO`,`PU04DESCRIPDIS`
 FROM `pu04distrito`;
END */$$
DELIMITER ;

/* Procedure structure for procedure `SP04_INGRESOTRAMITE_LISTAR_AAP` */

/*!50003 DROP PROCEDURE IF EXISTS  `SP04_INGRESOTRAMITE_LISTAR_AAP` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `SP04_INGRESOTRAMITE_LISTAR_AAP`(IN IDTRA INT (11))
BEGIN
SELECT  `pu13aarep`.`PU13IDAAP`,
`pu13aarep`.`PU13DESCAAP`
FROM pu04tramite1
	INNER JOIN `pu14trarep`
ON pu04tramite1.PU04IDTRA = `pu14trarep`.`PU04IDTRA`
INNER JOIN `pu13aarep`
ON `pu14trarep`.`PU13IDAAP` = `pu13aarep`.`PU13IDAAP`
WHERE pu04tramite1.PU04IDTRA = IDTRA;
END */$$
DELIMITER ;

/* Procedure structure for procedure `SP04_INGRESOTRAMITE_LISTAR_ACCESO` */

/*!50003 DROP PROCEDURE IF EXISTS  `SP04_INGRESOTRAMITE_LISTAR_ACCESO` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `SP04_INGRESOTRAMITE_LISTAR_ACCESO`(IN IDTRA INT (11))
BEGIN
SELECT  `pu38servidumbres`.`PU38IDSERVIDUMBRE`,
`pu38servidumbres`.`PU38DESCRIPSERVIDUM`
FROM pu04tramite1
	INNER JOIN `pu38traservidumbres`
ON pu04tramite1.PU04IDTRA = `pu38traservidumbres`.`PU04IDTRA`
INNER JOIN `pu38servidumbres`
ON `pu38traservidumbres`.`PU38IDSERVIDUMBRE` = `pu38servidumbres`.`PU38IDSERVIDUMBRE`
WHERE pu04tramite1.PU04IDTRA = IDTRA;
END */$$
DELIMITER ;

/* Procedure structure for procedure `SP04_INGRESOTRAMITE_LISTAR_ACT_COMERCIAL` */

/*!50003 DROP PROCEDURE IF EXISTS  `SP04_INGRESOTRAMITE_LISTAR_ACT_COMERCIAL` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `SP04_INGRESOTRAMITE_LISTAR_ACT_COMERCIAL`(IN IDTRA INT (11))
BEGIN
SELECT  `pu06actdes`.`PU06IDACTDES`,
`pu06actdes`.`PU06DESAD`
FROM pu04tramite1
	INNER JOIN `pu06tracomercial`
ON pu04tramite1.PU04IDTRA = `pu06tracomercial`.`PU04IDTRA`
INNER JOIN `pu06actdes`
ON `pu06tracomercial`.`PU06IDACTDES` = `pu06actdes`.`PU06IDACTDES`
WHERE pu04tramite1.PU04IDTRA = IDTRA;
END */$$
DELIMITER ;

/* Procedure structure for procedure `SP04_INGRESOTRAMITE_LISTAR_ACT_COMERCIAL_INDUSTRIAL` */

/*!50003 DROP PROCEDURE IF EXISTS  `SP04_INGRESOTRAMITE_LISTAR_ACT_COMERCIAL_INDUSTRIAL` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `SP04_INGRESOTRAMITE_LISTAR_ACT_COMERCIAL_INDUSTRIAL`(IN IDTRA INT (11))
BEGIN
SELECT  `pu06actdes`.`PU06IDACTDES`,
`pu06actdes`.`PU06DESAD`
FROM pu04tramite1
	INNER JOIN `pu06tracomercial_industrial`
ON pu04tramite1.PU04IDTRA = `pu06tracomercial_industrial`.`PU04IDTRA`
INNER JOIN `pu06actdes`
ON `pu06tracomercial_industrial`.`PU06IDACTDES` = `pu06actdes`.`PU06IDACTDES`
WHERE pu04tramite1.PU04IDTRA = IDTRA;
END */$$
DELIMITER ;

/* Procedure structure for procedure `SP04_INGRESOTRAMITE_LISTAR_ACT_DESARROLLO` */

/*!50003 DROP PROCEDURE IF EXISTS  `SP04_INGRESOTRAMITE_LISTAR_ACT_DESARROLLO` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `SP04_INGRESOTRAMITE_LISTAR_ACT_DESARROLLO`(IN IDTRA INT (11))
BEGIN
SELECT  `pu06actdes`.`PU06IDACTDES`,
`pu06actdes`.`PU06DESAD`
FROM pu04tramite1
	INNER JOIN `pu06tradesarrollos`
ON pu04tramite1.PU04IDTRA = `pu06tradesarrollos`.`PU04IDTRA`
INNER JOIN `pu06actdes`
ON `pu06tradesarrollos`.`PU06IDACTDES` = `pu06actdes`.`PU06IDACTDES`
WHERE pu04tramite1.PU04IDTRA = IDTRA;
END */$$
DELIMITER ;

/* Procedure structure for procedure `SP04_INGRESOTRAMITE_LISTAR_ACT_ESTACIONSERCIVIOS` */

/*!50003 DROP PROCEDURE IF EXISTS  `SP04_INGRESOTRAMITE_LISTAR_ACT_ESTACIONSERCIVIOS` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `SP04_INGRESOTRAMITE_LISTAR_ACT_ESTACIONSERCIVIOS`(IN IDTRA INT (11))
BEGIN
SELECT  `pu06actdes`.`PU06IDACTDES`,
`pu06actdes`.`PU06DESAD`
FROM pu04tramite1
	INNER JOIN `pu06traestacionservicios`
ON pu04tramite1.PU04IDTRA = `pu06traestacionservicios`.`PU04IDTRA`
INNER JOIN `pu06actdes`
ON `pu06traestacionservicios`.`PU06IDACTDES` = `pu06actdes`.`PU06IDACTDES`
WHERE pu04tramite1.PU04IDTRA = IDTRA;
END */$$
DELIMITER ;

/* Procedure structure for procedure `SP04_INGRESOTRAMITE_LISTAR_ACT_RESIDENCIAL` */

/*!50003 DROP PROCEDURE IF EXISTS  `SP04_INGRESOTRAMITE_LISTAR_ACT_RESIDENCIAL` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `SP04_INGRESOTRAMITE_LISTAR_ACT_RESIDENCIAL`(IN IDTRA INT (11))
BEGIN
SELECT  `pu06actdes`.`PU06IDACTDES`,
`pu06actdes`.`PU06DESAD`
FROM pu04tramite1
	INNER JOIN `pu06traresidencial`
ON pu04tramite1.PU04IDTRA = `pu06traresidencial`.`PU04IDTRA`
INNER JOIN `pu06actdes`
ON `pu06traresidencial`.`PU06IDACTDES` = `pu06actdes`.`PU06IDACTDES`
WHERE pu04tramite1.PU04IDTRA = IDTRA;
END */$$
DELIMITER ;

/* Procedure structure for procedure `SP04_INGRESOTRAMITE_LISTAR_ASPBIOFISICOS` */

/*!50003 DROP PROCEDURE IF EXISTS  `SP04_INGRESOTRAMITE_LISTAR_ASPBIOFISICOS` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `SP04_INGRESOTRAMITE_LISTAR_ASPBIOFISICOS`(IN IDTRA INT (11))
BEGIN
SELECT  `pu10aspbio`.`PU10IDASBIO`,
`pu10aspbio`.`PU10DESCABIO`
FROM pu04tramite1
	INNER JOIN `pu11uniabio`
ON pu04tramite1.PU04IDTRA = `pu11uniabio`.`PU04IDTRA`
INNER JOIN `pu10aspbio`
ON `pu11uniabio`.`PU10IDASBIO` = `pu10aspbio`.`PU10IDASBIO`
WHERE pu04tramite1.PU04IDTRA = IDTRA;
END */$$
DELIMITER ;

/* Procedure structure for procedure `SP04_INGRESOTRAMITE_LISTAR_DEG` */

/*!50003 DROP PROCEDURE IF EXISTS  `SP04_INGRESOTRAMITE_LISTAR_DEG` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `SP04_INGRESOTRAMITE_LISTAR_DEG`(IN IDTRA INT (11))
BEGIN
SELECT  pu09desceg.`PU09IDDEG`,
pu09desceg.PU09DESCREG
FROM pu04tramite1
	INNER JOIN pu09tradeg
ON pu04tramite1.PU04IDTRA = pu09tradeg.PU04IDTRA
INNER JOIN pu09desceg
ON pu09tradeg.PU09IDDEG = pu09desceg.PU09IDDEG
WHERE pu04tramite1.PU04IDTRA = IDTRA;
END */$$
DELIMITER ;

/* Procedure structure for procedure `SP04_INGRESOTRAMITE_LISTAR_DESARROLLOSECTOR` */

/*!50003 DROP PROCEDURE IF EXISTS  `SP04_INGRESOTRAMITE_LISTAR_DESARROLLOSECTOR` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `SP04_INGRESOTRAMITE_LISTAR_DESARROLLOSECTOR`(IN IDTRA INT (11))
BEGIN
SELECT  `pu12tipdesec`.`PU12IDTDESEC`,
`pu12tipdesec`.`PU12TIPODES`
FROM pu04tramite1
	INNER JOIN `pu12tratipdesec`
ON pu04tramite1.PU04IDTRA = `pu12tratipdesec`.`PU04IDTRA`
INNER JOIN `pu12tipdesec`
ON `pu12tratipdesec`.`PU12IDTDESEC` = `pu12tipdesec`.`PU12IDTDESEC`
WHERE pu04tramite1.PU04IDTRA = IDTRA;
END */$$
DELIMITER ;

/* Procedure structure for procedure `SP04_INGRESOTRAMITE_LISTAR_ESPACIOGEOGRAFICO` */

/*!50003 DROP PROCEDURE IF EXISTS  `SP04_INGRESOTRAMITE_LISTAR_ESPACIOGEOGRAFICO` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `SP04_INGRESOTRAMITE_LISTAR_ESPACIOGEOGRAFICO`(IN IDTRA INT (11))
BEGIN
SELECT  `pu09desceg`.`PU09IDDEG`,
`pu09desceg`.`PU09DESCREG`
FROM pu04tramite1
	INNER JOIN `pu09tradeg`
ON pu04tramite1.PU04IDTRA = `pu09tradeg`.`PU04IDTRA`
INNER JOIN `pu09desceg`
ON `pu09tradeg`.`PU09IDDEG` = `pu09desceg`.`PU09IDDEG`
WHERE pu04tramite1.PU04IDTRA = IDTRA;
END */$$
DELIMITER ;

/* Procedure structure for procedure `SP04_INGRESOTRAMITE_LISTAR_NICOSAMA` */

/*!50003 DROP PROCEDURE IF EXISTS  `SP04_INGRESOTRAMITE_LISTAR_NICOSAMA` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `SP04_INGRESOTRAMITE_LISTAR_NICOSAMA`(IN IDTRA INT (11))
BEGIN
SELECT  `pu26planactinicosama`.`PU26IDDESCNICOYASAMA`,
`pu26planactinicosama`.`PU26DESCACNICOYASAMA`
FROM pu04tramite1
	INNER JOIN `pu26traplan`
ON pu04tramite1.PU04IDTRA = `pu26traplan`.`PU04IDTRA`
INNER JOIN `pu26planactinicosama`
ON `pu26traplan`.`PU26IDDESCNICOYASAMA` = `pu26planactinicosama`.`PU26IDDESCNICOYASAMA`
WHERE pu04tramite1.PU04IDTRA = IDTRA;
END */$$
DELIMITER ;

/* Procedure structure for procedure `SP04_INGRESOTRAMITE_LISTAR_PATENTES` */

/*!50003 DROP PROCEDURE IF EXISTS  `SP04_INGRESOTRAMITE_LISTAR_PATENTES` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `SP04_INGRESOTRAMITE_LISTAR_PATENTES`(IN IDTRA INT (11))
BEGIN
SELECT  `pu24infest`.`PU24IDINFR`,
`pu24infest`.`PU24DESCINF`
FROM pu04tramite1
	INNER JOIN `pu25patent`
ON pu04tramite1.PU04IDTRA = `pu25patent`.`PU04IDTRA`
INNER JOIN `pu24infest`
ON `pu25patent`.`PU24IDINFR` = `pu24infest`.`PU24IDINFR`
WHERE pu04tramite1.PU04IDTRA = IDTRA;
END */$$
DELIMITER ;

/* Procedure structure for procedure `SP04_INGRESOTRAMITE_LISTAR_PLANREG` */

/*!50003 DROP PROCEDURE IF EXISTS  `SP04_INGRESOTRAMITE_LISTAR_PLANREG` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `SP04_INGRESOTRAMITE_LISTAR_PLANREG`(IN IDTRA INT (11))
BEGIN
SELECT  `pu26planreg`.`PU26IDPLAN`,
`pu26planreg`.`PU26PLNDESC`
FROM pu04tramite1
	INNER JOIN `pu26planregtramite`
ON pu04tramite1.PU04IDTRA = `pu26planregtramite`.`PU04IDTRA`
INNER JOIN `pu26planreg`
ON `pu26planregtramite`.`PU26IDPLAN` = `pu26planreg`.`PU26IDPLAN`
WHERE pu04tramite1.PU04IDTRA = IDTRA;
END */$$
DELIMITER ;

/* Procedure structure for procedure `SP04_INGRESOTRAMITE_LISTAR_TIPOREDVIAL` */

/*!50003 DROP PROCEDURE IF EXISTS  `SP04_INGRESOTRAMITE_LISTAR_TIPOREDVIAL` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `SP04_INGRESOTRAMITE_LISTAR_TIPOREDVIAL`(IN IDTRA INT (11))
BEGIN
SELECT  `pu22tredv`.`PU22IDTREDV`,
`pu22tredv`.`PU22DESCTRV`
FROM pu04tramite1
	INNER JOIN `pu22traserv`
ON pu04tramite1.PU04IDTRA = `pu22traserv`.`PU04IDTRA`
INNER JOIN `pu22tredv`
ON `pu22traserv`.`PU22IDTREDV` = `pu22tredv`.`PU22IDTREDV`
WHERE pu04tramite1.PU04IDTRA = IDTRA;
END */$$
DELIMITER ;

/* Procedure structure for procedure `SP04_OBSERVACIONESREVISIONTRAMITE_GUARDAR` */

/*!50003 DROP PROCEDURE IF EXISTS  `SP04_OBSERVACIONESREVISIONTRAMITE_GUARDAR` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `SP04_OBSERVACIONESREVISIONTRAMITE_GUARDAR`(IN IDTRA INT(11),
 IN OBSERVACION VARCHAR(500)
 )
BEGIN
INSERT INTO `pu04observacionrevisiontramite` (`PU04IDTRA`, `pu4504descripcionobservacion`)
VALUES (IDTRA, OBSERVACION);
END */$$
DELIMITER ;

/* Procedure structure for procedure `SP04_OBSERVACIONES_TRAMITE_GUARDAR` */

/*!50003 DROP PROCEDURE IF EXISTS  `SP04_OBSERVACIONES_TRAMITE_GUARDAR` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `SP04_OBSERVACIONES_TRAMITE_GUARDAR`(IN IDTRA INT(11),
 IN OBSER VARCHAR(300)
 )
BEGIN
INSERT INTO `pu04tramite1observaciones` (`PU04IDTRA`, `PU04OBSERVACIONES`)
VALUES (IDTRA, OBSER);
END */$$
DELIMITER ;

/* Procedure structure for procedure `SP04_REGISTROTRAMITE_GUARDAR` */

/*!50003 DROP PROCEDURE IF EXISTS  `SP04_REGISTROTRAMITE_GUARDAR` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `SP04_REGISTROTRAMITE_GUARDAR`( IN IDTRA INT(11), 
IN PU04NORTE INT(11), IN PU04ESTE INT(11), IN PU04ALTITUD INT(11))
BEGIN
-- INSERT DE LA INFORMACIÓN REQUERIDA POR LA TABLA PRINCIPAL DE TRÁMITE
INSERT INTO pu04regtra (PU04IDTRA,PU04NORTE,PU04ESTE,PU04ALTITUD)
 VALUES (IDTRA,PU04NORTE,PU04ESTE,PU04ALTITUD);
 
 
END */$$
DELIMITER ;

/* Procedure structure for procedure `SP04_REGISTROTRA_DEG_GUARDAR` */

/*!50003 DROP PROCEDURE IF EXISTS  `SP04_REGISTROTRA_DEG_GUARDAR` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `SP04_REGISTROTRA_DEG_GUARDAR`( IN IDTRA INT(11),IN PU09IDDEG INT (11))
BEGIN
-- INSERT DE LA DESCRIPCIÓN DEL ESPACIO GEOGRÁFICO
INSERT INTO pu09tradeg (PU04IDTRA,PU09IDDEG)
 VALUES (IDTRA,PU09IDDEG);
END */$$
DELIMITER ;

/* Procedure structure for procedure `SP04_REGISTROTRA_ELIMINAR` */

/*!50003 DROP PROCEDURE IF EXISTS  `SP04_REGISTROTRA_ELIMINAR` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `SP04_REGISTROTRA_ELIMINAR`(IN IDTRA INT(11))
BEGIN
DELETE FROM pu09tradeg
  WHERE PU04IDTRA = IDTRA;
  
DELETE FROM pu11uniabio
 WHERE PU04IDTRA = IDTRA;
 
 DELETE FROM pu14trarep
  WHERE PU04IDTRA = IDTRA;
  
DELETE FROM pu05unitra
 WHERE PU04IDTRA = IDTRA;
 
 DELETE FROM pu04regtra
 WHERE PU04IDTRA = IDTRA;
END */$$
DELIMITER ;

/* Procedure structure for procedure `SP04_REGISTROTRA_MOSTRAR` */

/*!50003 DROP PROCEDURE IF EXISTS  `SP04_REGISTROTRA_MOSTRAR` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `SP04_REGISTROTRA_MOSTRAR`()
BEGIN
  SELECT DISTINCT pu04regtra.PU04IDTRA AS 'Numero Trámite', pu04regtra.PU04FETRA AS 'Fecha',
   pu04regtra.PU04NORTE AS 'Norte', pu04regtra.PU04ESTE AS 'Este', pu04regtra.PU04ALTITUD AS 'Altitud'
   
   FROM pu04regtra;
       END */$$
DELIMITER ;

/* Procedure structure for procedure `SP04_REGISTROTRA_MOSTRAR_INFOR` */

/*!50003 DROP PROCEDURE IF EXISTS  `SP04_REGISTROTRA_MOSTRAR_INFOR` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `SP04_REGISTROTRA_MOSTRAR_INFOR`(IN IDTRA INT(11))
BEGIN
   SELECT DISTINCT pu04regtra.PU04IDTRA AS 'Numero Trámite', pu04regtra.PU04FETRA AS 'Fecha', pu07terrft.PU07NOMTFR AS 'T.F.R',
   pu04regtra.PU04NORTE AS 'Norte', pu04regtra.PU04ESTE AS 'Este', pu04regtra.PU04ALTITUD AS 'Altitud',
   pu12tipdesec.PU12TIPODES AS 'Tipo Desarrollo'
   
   FROM ((pu04regtra INNER JOIN pu12tipdesec
   ON pu04regtra.PU12IDTDESEC = pu12tipdesec.PU12IDTDESEC)
   INNER JOIN pu07terrft ON pu04regtra.`PU07IDTFR` = pu07terrft.PU07IDTFR)
   
  WHERE pu04regtra.PU04IDTRA = 1 AND pu04regtra.PU07IDTFR>0;
   
		
END */$$
DELIMITER ;

/* Procedure structure for procedure `SP04_REGISTROTRA_MOSTRAR_INFOR_ACT_D` */

/*!50003 DROP PROCEDURE IF EXISTS  `SP04_REGISTROTRA_MOSTRAR_INFOR_ACT_D` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `SP04_REGISTROTRA_MOSTRAR_INFOR_ACT_D`(IN IDTRA INT(11))
BEGIN
 SELECT 
 DISTINCT pu06actdes.PU06DESAD AS 'Actividad Desarrollar'
   
   FROM ((pu04regtra INNER JOIN pu05unitra ON pu04regtra.PU04IDTRA = pu05unitra.PU04IDTRA)
	INNER JOIN pu06actdes ON pu05unitra.PU06IDACTDES = pu06actdes.`PU06IDACTDES`)
	
	WHERE pu04regtra.PU04IDTRA = IDTRA  AND pu05unitra.PU04IDTRA = IDTRA  AND pu05unitra.PU06IDACTDES>0;
   
		
END */$$
DELIMITER ;

/* Procedure structure for procedure `SP04_REGISTROTRA_MOSTRAR_INFOR_A_A_P` */

/*!50003 DROP PROCEDURE IF EXISTS  `SP04_REGISTROTRA_MOSTRAR_INFOR_A_A_P` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `SP04_REGISTROTRA_MOSTRAR_INFOR_A_A_P`(IN IDTRA INT(11))
BEGIN
 SELECT 
 DISTINCT pu13aarep.PU13DESCAAP AS 'Afectacion de Areas de Proteccion'
   
   FROM ((pu04regtra INNER JOIN pu14trarep ON pu04regtra.PU04IDTRA = pu14trarep.PU04IDTRA)
	INNER JOIN pu13aarep ON pu14trarep.PU13IDAAP = pu13aarep.PU13IDAAP)
	
	WHERE pu04regtra.PU04IDTRA = IDTRA  AND pu14trarep.PU04IDTRA = IDTRA  AND pu14trarep.PU13IDAAP>0;
   
		
END */$$
DELIMITER ;

/* Procedure structure for procedure `SP04_REGISTROTRA_MOSTRAR_INFOR_A_B` */

/*!50003 DROP PROCEDURE IF EXISTS  `SP04_REGISTROTRA_MOSTRAR_INFOR_A_B` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `SP04_REGISTROTRA_MOSTRAR_INFOR_A_B`(IN IDTRA INT(11))
BEGIN
 SELECT 
 DISTINCT pu10aspbio.PU10DESCABIO AS 'Aspectos Biofisicos'
   
   FROM ((pu04regtra INNER JOIN pu11uniabio ON pu04regtra.PU04IDTRA = pu11uniabio.PU04IDTRA)
	INNER JOIN pu10aspbio ON pu11uniabio.PU10IDASBIO = pu10aspbio.PU10IDASBIO)
	
	WHERE pu04regtra.PU04IDTRA = IDTRA  AND pu11uniabio.PU04IDTRA = IDTRA  AND pu11uniabio.PU10IDASBIO>0;
   
		
END */$$
DELIMITER ;

/* Procedure structure for procedure `SP04_REGISTROTRA_ACTUALIZAR` */

/*!50003 DROP PROCEDURE IF EXISTS  `SP04_REGISTROTRA_ACTUALIZAR` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `SP04_REGISTROTRA_ACTUALIZAR`( IN IDTRA INT(11), IN FETRA DATE, IN IDTFR INT(11), 
IN PU04NORTE INT(11), IN PU04ESTE INT(11), IN PU04ALTITUD INT(11), IN IDTDESEC INT(11),
IN PU09IDDEG_01 INT (11),IN PU09IDDEG_02 INT (11),IN PU09IDDEG_03 INT (11),IN PU09IDDEG_04 INT (11),IN PU09IDDEG_05 INT (11),
IN PU09IDDEG_06 INT (11),IN PU09IDDEG_07 INT (11),
IN PU10IDASBIO_01 INT (11), IN PU10IDASBIO_02 INT (11),IN PU10IDASBIO_03 INT (11), IN PU10IDASBIO_04 INT (11),
 IN PU10IDASBIO_05 INT (11), IN PU10IDASBIO_06 INT (11),
 
 IN PU13IDAAP_1 INT (11),IN PU13IDAAP_2 INT (11),IN PU13IDAAP_3 INT (11),IN PU13IDAAP_4 INT (11),IN PU13IDAAP_5 INT (11),
 IN PU13IDAAP_6 INT (11),IN PU13IDAAP_7 INT (11),
 
 IN PU06IDACTDES_01 INT (11), IN PU06IDACTDES_02 INT (11),IN PU06IDACTDES_03 INT (11), IN PU06IDACTDES_04 INT (11),
 IN PU06IDACTDES_05 INT (11), IN PU06IDACTDES_06 INT (11))
BEGIN
-- UPDATE DE LA INFORMACIÓN REQUERIDA POR LA TABLA PRINCIPAL DE TRÁMITE
UPDATE pu04regtra 
SET PU04FETRA = FETRA,
  PU07IDTFR = IDTFR,
   PU04NORTE = PU04NORTE,
    PU04ESTE = PU04ESTE,
     PU04ALTITUD = PU04ALTITUD,
     PU12IDTDESEC =IDTDESEC
     WHERE PU04IDTRA = IDTRA;
     
-- UPDATE DE LA DESCRIPCIÓN DEL ESPACIO GEOGRÁFICO
 UPDATE pu09tradeg
SET PU09IDDEG = PU09IDDEG_01
     WHERE PU04IDTRA = IDTRA;
--
 UPDATE pu09tradeg 
SET PU09IDDEG = PU09IDDEG_02
     WHERE PU04IDTRA = IDTRA;
 --
 UPDATE pu09tradeg 
SET PU09IDDEG = PU09IDDEG_03
     WHERE PU04IDTRA = IDTRA;
 --
 UPDATE pu09tradeg 
SET PU09IDDEG = PU09IDDEG_04
     WHERE PU04IDTRA = IDTRA;
 --
 UPDATE pu09tradeg 
SET PU09IDDEG = PU09IDDEG_05
     WHERE PU04IDTRA = IDTRA;
 --
 UPDATE pu09tradeg 
SET PU09IDDEG = PU09IDDEG_06
     WHERE PU04IDTRA = IDTRA;
 --
 UPDATE pu09tradeg 
SET PU09IDDEG = PU09IDDEG_07
     WHERE PU04IDTRA = IDTRA;
-- FIN DE EDICIÓN DE DATOS EN TABLA UNIÓN DE TRÁMITE Y DESCRIPCIÓN DEL ESPACIO GEOGRÁFICO
-- ----------------------------------------------------------------------------------------
-- UPDATE DE LOS ASPECTOS BIOFÍSICOS
 UPDATE pu11uniabio 
SET PU10IDASBIO = PU10IDASBIO_01
     WHERE PU04IDTRA = IDTRA;   
--
 UPDATE pu11uniabio 
SET PU10IDASBIO = PU10IDASBIO_02
     WHERE PU04IDTRA = IDTRA;  
--
 UPDATE pu11uniabio 
SET PU10IDASBIO = PU10IDASBIO_03
     WHERE PU04IDTRA = IDTRA;  
--
 UPDATE pu11uniabio 
SET PU10IDASBIO = PU10IDASBIO_04
     WHERE PU04IDTRA = IDTRA;  
--
 UPDATE pu11uniabio 
SET PU10IDASBIO = PU10IDASBIO_05
     WHERE PU04IDTRA = IDTRA;  
--
 UPDATE pu11uniabio 
SET PU10IDASBIO = PU10IDASBIO_06
     WHERE PU04IDTRA = IDTRA;  
-- FIN DE LA ACTUALIZACIÓN DE DATOS EN TABLA UNIÓN DE TRÁMITE Y ASPECTOS BIOFÍSICOS
-- ----------------------------------------------------------------------------------------
-- UPDATE DE LA AFECTACIÓN DE ÁREAS DE PROTECCIÓN
 UPDATE pu14trarep 
SET PU13IDAAP = PU13IDAAP_1
     WHERE PU04IDTRA = IDTRA;      
--
 UPDATE pu14trarep 
SET PU13IDAAP = PU13IDAAP_2
     WHERE PU04IDTRA = IDTRA;  
--
 UPDATE pu14trarep 
SET PU13IDAAP = PU13IDAAP_3
     WHERE PU04IDTRA = IDTRA;  
--
 UPDATE pu14trarep 
SET PU13IDAAP = PU13IDAAP_4
     WHERE PU04IDTRA = IDTRA;  
--
 UPDATE pu14trarep 
SET PU13IDAAP = PU13IDAAP_5
     WHERE PU04IDTRA = IDTRA;  
--
 UPDATE pu14trarep 
SET PU13IDAAP = PU13IDAAP_6
     WHERE PU04IDTRA = IDTRA;  
--
 UPDATE pu14trarep 
SET PU13IDAAP = PU13IDAAP_7
     WHERE PU04IDTRA = IDTRA;  
-- FIN DE ACTUALIZACIÓN DE DATOS EN TABLA UNIÓN DE TRÁMITE Y ASPECTOS BIOFÍSICOS
-- ----------------------------------------------------------------------------------------
-- UPDATE DE LAS ACTIVIDADES A DESARROLLAR
 UPDATE pu05unitra 
SET PU06IDACTDES = PU06IDACTDES_01
     WHERE PU04IDTRA = IDTRA;  
--
 UPDATE pu05unitra 
SET PU06IDACTDES = PU06IDACTDES_02
     WHERE PU04IDTRA = IDTRA;
--
 UPDATE pu05unitra 
SET PU06IDACTDES = PU06IDACTDES_03
     WHERE PU04IDTRA = IDTRA;
--
 UPDATE pu05unitra 
SET PU06IDACTDES = PU06IDACTDES_04
     WHERE PU04IDTRA = IDTRA;
--
 UPDATE pu05unitra 
SET PU06IDACTDES = PU06IDACTDES_05
     WHERE PU04IDTRA = IDTRA;
--
 UPDATE pu05unitra 
SET PU06IDACTDES = PU06IDACTDES_06
     WHERE PU04IDTRA = IDTRA;
-- FIN DE INSERSIÓN DE DATOS EN TABLA UNIÓN DE TRÁMITE Y ACTIVIDAD A DESARROLLAR
-- ----------------------------------------------------------------------------------------
END */$$
DELIMITER ;

/* Procedure structure for procedure `SP04_REGISTROTRA_MOSTRAR_INFOR_D_E_G` */

/*!50003 DROP PROCEDURE IF EXISTS  `SP04_REGISTROTRA_MOSTRAR_INFOR_D_E_G` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `SP04_REGISTROTRA_MOSTRAR_INFOR_D_E_G`(IN IDTRA INT(11))
BEGIN
 SELECT 
 DISTINCT pu09desceg.PU09DESCREG AS 'Descripcion del Espacio Geografico'
   
   FROM ((pu04regtra INNER JOIN pu09tradeg ON pu04regtra.`PU04IDTRA` = pu09tradeg.`PU04IDTRA`)
	INNER JOIN pu09desceg ON pu09tradeg.`PU09IDDEG` = pu09desceg.`PU09IDDEG`)
	
	WHERE pu04regtra.PU04IDTRA = IDTRA  AND pu09tradeg.`PU04IDTRA`= IDTRA  AND pu09tradeg.`PU09IDDEG`>0;
   
		
END */$$
DELIMITER ;

/* Procedure structure for procedure `SP04_REGISTROTR_GUARDAR` */

/*!50003 DROP PROCEDURE IF EXISTS  `SP04_REGISTROTR_GUARDAR` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `SP04_REGISTROTR_GUARDAR`( IN IDTRA INT(11), 
IN PU04NORTE INT(11), IN PU04ESTE INT(11), IN PU04ALTITUD INT(11))
BEGIN
DECLARE ESTADO INT (11);
SET ESTADO = 2;
-- INSERT DE LA INFORMACIÓN REQUERIDA POR LA TABLA PRINCIPAL DE TRÁMITE
INSERT INTO pu04regtra (PU04IDTRA,PU04NORTE,PU04ESTE,PU04ALTITUD)
 VALUES (IDTRA,PU04NORTE,PU04ESTE,PU04ALTITUD);
 
 UPDATE `pu04tramite1`
 SET PUIDESTADO = ESTADO
 WHERE `PU04IDTRA` = IDTRA;
 
END */$$
DELIMITER ;

/* Procedure structure for procedure `SP04_REGTRAMITEINFO_BUSCAR` */

/*!50003 DROP PROCEDURE IF EXISTS  `SP04_REGTRAMITEINFO_BUSCAR` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `SP04_REGTRAMITEINFO_BUSCAR`(IN IDTRA INT(11))
BEGIN
SELECT PU04IDTRA, PU04DESCRIPCIONLUGAR
FROM pu04tramite1 
WHERE PU04IDTRA = IDTRA;
END */$$
DELIMITER ;

/* Procedure structure for procedure `SP04_REGTRAMITEINFO_ELIMINAR` */

/*!50003 DROP PROCEDURE IF EXISTS  `SP04_REGTRAMITEINFO_ELIMINAR` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `SP04_REGTRAMITEINFO_ELIMINAR`(IN IDTRA INT(11))
BEGIN
DELETE FROM pu04tramite1
 WHERE PU04IDTRA = IDTRA;
END */$$
DELIMITER ;

/* Procedure structure for procedure `SP04_REGTRAMITEINFO_GUARDAR` */

/*!50003 DROP PROCEDURE IF EXISTS  `SP04_REGTRAMITEINFO_GUARDAR` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `SP04_REGTRAMITEINFO_GUARDAR`(IN IDTRA INT(11),
in `PU04FEPLATAFOR` datetime, in `PU04IDDISTRITO` int(11)  
 )
BEGIN
DECLARE ESTADO INT (11);
SET ESTADO = 1;
INSERT INTO pu04tramite1(PU04IDTRA,`PUIDESTADO`)
VALUES (IDTRA,ESTADO);
INSERT INTO `pu04tramite2`(PU04IDTRA,`PU04FEPLATAFOR`,`PU04IDDISTRITO`)
VALUES (IDTRA,PU04FEPLATAFOR,PU04IDDISTRITO);
	
END */$$
DELIMITER ;

/* Procedure structure for procedure `SP04_REGTRAMITEINFO_MOSTRAR` */

/*!50003 DROP PROCEDURE IF EXISTS  `SP04_REGTRAMITEINFO_MOSTRAR` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `SP04_REGTRAMITEINFO_MOSTRAR`()
BEGIN
SELECT `pu04tramite1`.PU04IDTRA,`pu04tramite1`.PU04FEINICIO,`pu04tramite2`.`PU04FEPLATAFOR`,
CASE `pu04tramite2`.`PU04IDDISTRITO` WHEN "1" THEN "Nicoya"
				WHEN "2" THEN "Mansion"
				WHEN "3" THEN "San Antonio"
				WHEN "4" THEN "Quebrada Honda"
				WHEN "5" THEN "Samara"
				WHEN "6" THEN "Nosara"
				WHEN "7" THEN "Belen" END
 FROM pu04tramite1
 INNER JOIN `pu04tramite2`
 ON `pu04tramite1`.`PU04IDTRA` = `pu04tramite2`.`PU04IDTRA`
 ORDER BY `pu04tramite1`.`PU04FEINICIO` DESC;
END */$$
DELIMITER ;

/* Procedure structure for procedure `SP04_REGTRAMITEINFO_REGTRA_BUSCAR` */

/*!50003 DROP PROCEDURE IF EXISTS  `SP04_REGTRAMITEINFO_REGTRA_BUSCAR` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `SP04_REGTRAMITEINFO_REGTRA_BUSCAR`(IN IDTRA INT(11))
BEGIN
SELECT `pu04tramite1`.`PU04IDTRA`,pu04regtra.`PU04NORTE`,pu04regtra.`PU04ESTE`,pu04regtra.`PU04ALTITUD`
	FROM `pu04tramite1`
	inner join `pu04regtra`
	on `pu04tramite1`.`PU04IDTRA` = `pu04regtra`.`PU04IDTRA`
WHERE `pu04regtra`.PU04IDTRA = IDTRA;
END */$$
DELIMITER ;

/* Procedure structure for procedure `SP04_REGTRAMITEINFO_TRA1_BUSCAR` */

/*!50003 DROP PROCEDURE IF EXISTS  `SP04_REGTRAMITEINFO_TRA1_BUSCAR` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `SP04_REGTRAMITEINFO_TRA1_BUSCAR`(IN IDTRA INT(11))
BEGIN
SELECT `pu04tramite1`.PU04IDTRA,DATE_FORMAT(`pu04tramite2`.`PU04FEPLATAFOR`,'%d/%m/%Y') as "FECHA",
`pu04tramite2`.`PU04IDDISTRITO`
	FROM pu04tramite1
		inner join `pu04tramite2`
	on `pu04tramite1`.PU04IDTRA = `pu04tramite2`.`PU04IDTRA`
	
WHERE `pu04tramite1`.PU04IDTRA = IDTRA;
END */$$
DELIMITER ;

/* Procedure structure for procedure `SP04_REGISTROTRA_GUARDAR` */

/*!50003 DROP PROCEDURE IF EXISTS  `SP04_REGISTROTRA_GUARDAR` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `SP04_REGISTROTRA_GUARDAR`( IN IDTRA INT(11), IN FETRA DATE, IN ESTADO VARCHAR(20),IN IDTFR INT(11), 
IN PU04NORTE INT(11), IN PU04ESTE INT(11), IN PU04ALTITUD INT(11), IN IDTDESEC INT(11),
IN PU09IDDEG_01 INT (11),IN PU09IDDEG_02 INT (11),IN PU09IDDEG_03 INT (11),IN PU09IDDEG_04 INT (11),IN PU09IDDEG_05 INT (11),
IN PU09IDDEG_06 INT (11),IN PU09IDDEG_07 INT (11),
IN PU10IDASBIO_01 INT (11), IN PU10IDASBIO_02 INT (11),IN PU10IDASBIO_03 INT (11), IN PU10IDASBIO_04 INT (11),
 IN PU10IDASBIO_05 INT (11), IN PU10IDASBIO_06 INT (11),
 
 IN PU13IDAAP_1 INT (11),IN PU13IDAAP_2 INT (11),IN PU13IDAAP_3 INT (11),IN PU13IDAAP_4 INT (11),IN PU13IDAAP_5 INT (11),
 IN PU13IDAAP_6 INT (11),IN PU13IDAAP_7 INT (11),
 
 IN PU06IDACTDES_01 INT (11), IN PU06IDACTDES_02 INT (11),IN PU06IDACTDES_03 INT (11), IN PU06IDACTDES_04 INT (11),
 IN PU06IDACTDES_05 INT (11), IN PU06IDACTDES_06 INT (11))
BEGIN
-- INSERT DE LA INFORMACIÓN REQUERIDA POR LA TABLA PRINCIPAL DE TRÁMITE
INSERT INTO pu04regtra (PU04IDTRA, PU04FETRA,PU04ESTADO,PU07IDTFR,PU04NORTE,PU04ESTE,PU04ALTITUD,PU12IDTDESEC)
 VALUES (IDTRA, FETRA,ESTADO,IDTFR,PU04NORTE,PU04ESTE,PU04ALTITUD,IDTDESEC);
-- INSERT DE LA DESCRIPCIÓN DEL ESPACIO GEOGRÁFICO
INSERT INTO pu09tradeg (PU04IDTRA,PU09IDDEG)
 VALUES (IDTRA,PU09IDDEG_01);
--
 INSERT INTO pu09tradeg (PU04IDTRA,PU09IDDEG)
 VALUES (IDTRA,PU09IDDEG_02);
 --
 INSERT INTO pu09tradeg (PU04IDTRA,PU09IDDEG)
 VALUES (IDTRA,PU09IDDEG_03);
 --
 INSERT INTO pu09tradeg (PU04IDTRA,PU09IDDEG)
 VALUES (IDTRA,PU09IDDEG_04);
 --
 INSERT INTO pu09tradeg (PU04IDTRA,PU09IDDEG)
 VALUES (IDTRA,PU09IDDEG_05);
 --
 INSERT INTO pu09tradeg (PU04IDTRA,PU09IDDEG)
 VALUES (IDTRA,PU09IDDEG_06);
 --
 INSERT INTO pu09tradeg (PU04IDTRA,PU09IDDEG)
 VALUES (IDTRA,PU09IDDEG_07);
-- FIN DE INSERSIÓN DE DATOS EN TABLA UNIÓN DE TRÁMITE Y DESCRIPCIÓN DEL ESPACIO GEOGRÁFICO
-- ----------------------------------------------------------------------------------------
-- INSERT DE LOS ASPECTOS BIOFÍSICOS
INSERT INTO pu11uniabio (PU04IDTRA,PU10IDASBIO)
VALUES (IDTRA,PU10IDASBIO_01);
--
INSERT INTO pu11uniabio (PU04IDTRA,PU10IDASBIO)
VALUES (IDTRA,PU10IDASBIO_02);
--
INSERT INTO pu11uniabio (PU04IDTRA,PU10IDASBIO)
VALUES (IDTRA,PU10IDASBIO_03);
--
INSERT INTO pu11uniabio (PU04IDTRA,PU10IDASBIO)
VALUES (IDTRA,PU10IDASBIO_04);
--
INSERT INTO pu11uniabio (PU04IDTRA,PU10IDASBIO)
VALUES (IDTRA,PU10IDASBIO_05);
--
INSERT INTO pu11uniabio (PU04IDTRA,PU10IDASBIO)
VALUES (IDTRA,PU10IDASBIO_06);
-- FIN DE INSERSIÓN DE DATOS EN TABLA UNIÓN DE TRÁMITE Y ASPECTOS BIOFÍSICOS
-- ----------------------------------------------------------------------------------------
-- INSERT DE LA AFECTACIÓN DE ÁREAS DE PROTECCIÓN
INSERT INTO pu14trarep (PU04IDTRA,PU13IDAAP)
VALUES (IDTRA,PU13IDAAP_1);
--
INSERT INTO pu14trarep (PU04IDTRA,PU13IDAAP)
VALUES (IDTRA,PU13IDAAP_2);
--
INSERT INTO pu14trarep (PU04IDTRA,PU13IDAAP)
VALUES (IDTRA,PU13IDAAP_3);
--
INSERT INTO pu14trarep (PU04IDTRA,PU13IDAAP)
VALUES (IDTRA,PU13IDAAP_4);
--
INSERT INTO pu14trarep (PU04IDTRA,PU13IDAAP)
VALUES (IDTRA,PU13IDAAP_5);
--
INSERT INTO pu14trarep (PU04IDTRA,PU13IDAAP)
VALUES (IDTRA,PU13IDAAP_6);
--
INSERT INTO pu14trarep (PU04IDTRA,PU13IDAAP)
VALUES (IDTRA,PU13IDAAP_7);
-- FIN DE INSERSIÓN DE DATOS EN TABLA UNIÓN DE TRÁMITE Y ASPECTOS BIOFÍSICOS
-- ----------------------------------------------------------------------------------------
-- INSERT DE LAS ACTIVIDADES A DESARROLLAR
INSERT INTO pu05unitra (PU04IDTRA,PU06IDACTDES)
VALUES (IDTRA,PU06IDACTDES_01);
--
INSERT INTO pu05unitra (PU04IDTRA,PU06IDACTDES)
VALUES (IDTRA,PU06IDACTDES_02);
--
INSERT INTO pu05unitra (PU04IDTRA,PU06IDACTDES)
VALUES (IDTRA,PU06IDACTDES_03);
--
INSERT INTO pu05unitra (PU04IDTRA,PU06IDACTDES)
VALUES (IDTRA,PU06IDACTDES_04);
--
INSERT INTO pu05unitra (PU04IDTRA,PU06IDACTDES)
VALUES (IDTRA,PU06IDACTDES_05);
--
INSERT INTO pu05unitra (PU04IDTRA,PU06IDACTDES)
VALUES (IDTRA,PU06IDACTDES_06);
-- FIN DE INSERSIÓN DE DATOS EN TABLA UNIÓN DE TRÁMITE Y ACTIVIDAD A DESARROLLAR
-- ----------------------------------------------------------------------------------------
END */$$
DELIMITER ;

/* Procedure structure for procedure `SP04_RUTAIMAGEN_GUARDAR` */

/*!50003 DROP PROCEDURE IF EXISTS  `SP04_RUTAIMAGEN_GUARDAR` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `SP04_RUTAIMAGEN_GUARDAR`(IN IDTRA INT(11), IN RIMAGEN VARCHAR(200))
BEGIN
INSERT INTO pu04fototerreno (`PU04IDTRA`, `PU04RUTAIMAGEN`)
VALUES (IDTRA, RIMAGEN);
END */$$
DELIMITER ;

/* Procedure structure for procedure `SP04_TRAMITEESTADO_GUARDAR` */

/*!50003 DROP PROCEDURE IF EXISTS  `SP04_TRAMITEESTADO_GUARDAR` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `SP04_TRAMITEESTADO_GUARDAR`( IN IDTRA INT(11))
BEGIN
DECLARE ESTADO VARCHAR (20);
SET ESTADO = "INSPECCIONADO";
-- INSERT DE LA INFORMACIÓN REQUERIDA POR LA TABLA PRINCIPAL DE TRÁMITE
 
 UPDATE `pu04tramite1`
 SET `PU04ESTADOTRA` = ESTADO
 WHERE `PU04IDTRA` = IDTRA;
 
END */$$
DELIMITER ;

/* Procedure structure for procedure `SP04_TRAMITE_GUARDAR` */

/*!50003 DROP PROCEDURE IF EXISTS  `SP04_TRAMITE_GUARDAR` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`mauricio`@`localhost` PROCEDURE `SP04_TRAMITE_GUARDAR`(IDTRA  INT(11),FEINICIO date,ESTADO varchar(20))
BEGIN
 insert into `pu04tramite`(`PU04IDTRA`,`PU04FEINICIO`,`PU04ESTADO`)
 values(IDTRA,FEINICIO,ESTADO);
    END */$$
DELIMITER ;

/* Procedure structure for procedure `SP04_TRAMITE_MOSTRARACEPTADOS` */

/*!50003 DROP PROCEDURE IF EXISTS  `SP04_TRAMITE_MOSTRARACEPTADOS` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`mauricio`@`localhost` PROCEDURE `SP04_TRAMITE_MOSTRARACEPTADOS`()
BEGIN
SELECT `PU04IDTRA`,`PU04FEINICIO`,`PU04ESTADO`
FROM `pu04tramite`
WHERE `PU04ESTADO`='Aceptados';
END */$$
DELIMITER ;

/* Procedure structure for procedure `SP04_TRAMITE_MOSTRARDENEGADOS` */

/*!50003 DROP PROCEDURE IF EXISTS  `SP04_TRAMITE_MOSTRARDENEGADOS` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `SP04_TRAMITE_MOSTRARDENEGADOS`()
BEGIN
SELECT `PU04IDTRA`,`PU04FEINICIO`,`PU04ESTADO`
FROM `pu04tramite`
WHERE `PU04ESTADO`='Denegados';
END */$$
DELIMITER ;

/* Procedure structure for procedure `SP04_TRAMITE_MOSTRARINSPECCION` */

/*!50003 DROP PROCEDURE IF EXISTS  `SP04_TRAMITE_MOSTRARINSPECCION` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `SP04_TRAMITE_MOSTRARINSPECCION`()
BEGIN
SELECT `PU04IDTRA`,`PU04FEINICIO`,`PU04ESTADO`
FROM `pu04tramite`
WHERE `PU04ESTADO`='Inspección';
END */$$
DELIMITER ;

/* Procedure structure for procedure `SP04_TRAMITE_MOSTRARNUEVOS` */

/*!50003 DROP PROCEDURE IF EXISTS  `SP04_TRAMITE_MOSTRARNUEVOS` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `SP04_TRAMITE_MOSTRARNUEVOS`()
BEGIN
SELECT `PU04IDTRA`,`PU04FEINICIO`,`PU04ESTADO`
FROM `pu04tramite`
WHERE `PU04ESTADO`='Nuevos';
END */$$
DELIMITER ;

/* Procedure structure for procedure `SP04_TRAMITE_MOSTRAROFICINA` */

/*!50003 DROP PROCEDURE IF EXISTS  `SP04_TRAMITE_MOSTRAROFICINA` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `SP04_TRAMITE_MOSTRAROFICINA`()
BEGIN
SELECT `PU04IDTRA`,`PU04FEINICIO`,`PU04ESTADO`
FROM `pu04tramite`
WHERE `PU04ESTADO`='Oficina';
END */$$
DELIMITER ;

/* Procedure structure for procedure `SP04_TRAMITE_MOSTRARRETRASADOS` */

/*!50003 DROP PROCEDURE IF EXISTS  `SP04_TRAMITE_MOSTRARRETRASADOS` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `SP04_TRAMITE_MOSTRARRETRASADOS`()
BEGIN
SELECT `PU04IDTRA`,`PU04FEINICIO`,`PU04ESTADO`
FROM `pu04tramite`
WHERE `PU04ESTADO`='Retrasado';
END */$$
DELIMITER ;

/* Procedure structure for procedure `SP06_ACTDES_ACTUALIZAR` */

/*!50003 DROP PROCEDURE IF EXISTS  `SP06_ACTDES_ACTUALIZAR` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `SP06_ACTDES_ACTUALIZAR`(IN IDACTDES INT(11), IN DESAD VARCHAR(30))
BEGIN
UPDATE PU06ACTDES
 SET PU06DESAD = DESAD
  WHERE PU06IDACTDES = IDACTDES;
END */$$
DELIMITER ;

/* Procedure structure for procedure `SP06_ACTDES_BUSCAR` */

/*!50003 DROP PROCEDURE IF EXISTS  `SP06_ACTDES_BUSCAR` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`mauricio`@`localhost` PROCEDURE `SP06_ACTDES_BUSCAR`(IDACTDES INT)
BEGIN
 SELECT `PU06IDACTDES`,`PU06DESAD`
 FROM pu06actdes 
 WHERE PU06IDACTDES =IDACTDES;
    END */$$
DELIMITER ;

/* Procedure structure for procedure `SP06_ACTDES_ELIMINAR` */

/*!50003 DROP PROCEDURE IF EXISTS  `SP06_ACTDES_ELIMINAR` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `SP06_ACTDES_ELIMINAR`(IN IDACTDES INT(11))
BEGIN
DELETE FROM `pu06actdes`
 WHERE `PU06IDACTDES` = IDACTDES;
END */$$
DELIMITER ;

/* Procedure structure for procedure `SP06_ACTDES_GUARDAR` */

/*!50003 DROP PROCEDURE IF EXISTS  `SP06_ACTDES_GUARDAR` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `SP06_ACTDES_GUARDAR`(IN IDACTDES INT(11), IN DESAD VARCHAR(30))
BEGIN
INSERT INTO PU06ACTDES (PU06IDACTDES, PU06DESAD)
 VALUES (IDACTDES, DESAD);
END */$$
DELIMITER ;

/* Procedure structure for procedure `SP06_ACTDES_MOSTRAR` */

/*!50003 DROP PROCEDURE IF EXISTS  `SP06_ACTDES_MOSTRAR` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `SP06_ACTDES_MOSTRAR`()
BEGIN
	SELECT `PU06IDACTDES`,`PU06DESAD`
	FROM pu06actdes;
    END */$$
DELIMITER ;

/* Procedure structure for procedure `SP06_ACTDES_TRA_GUARDAR` */

/*!50003 DROP PROCEDURE IF EXISTS  `SP06_ACTDES_TRA_GUARDAR` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `SP06_ACTDES_TRA_GUARDAR`(IN idtra INT(11), IN idactdes int(11))
BEGIN
INSERT INTO `pu05unitra`(`PU04IDTRA`, `PU06IDACTDES`)
 VALUES (idtra, idactdes);
END */$$
DELIMITER ;

/* Procedure structure for procedure `SP06_ACTIVIDAD_COMERCIAL_INDUSTRIAL_MOSTRAR` */

/*!50003 DROP PROCEDURE IF EXISTS  `SP06_ACTIVIDAD_COMERCIAL_INDUSTRIAL_MOSTRAR` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `SP06_ACTIVIDAD_COMERCIAL_INDUSTRIAL_MOSTRAR`()
BEGIN
	SELECT * FROM `pu06actdes`
	WHERE `PU06IDTIPO` = 4;
    END */$$
DELIMITER ;

/* Procedure structure for procedure `SP06_ACTIVIDAD_COMERCIAL_MOSTRAR` */

/*!50003 DROP PROCEDURE IF EXISTS  `SP06_ACTIVIDAD_COMERCIAL_MOSTRAR` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `SP06_ACTIVIDAD_COMERCIAL_MOSTRAR`()
BEGIN
	SELECT * FROM `pu06actdes`
	WHERE `PU06IDTIPO` = 3;
    END */$$
DELIMITER ;

/* Procedure structure for procedure `SP06_ACTIVIDAD_DESARROLLOS_MOSTRAR` */

/*!50003 DROP PROCEDURE IF EXISTS  `SP06_ACTIVIDAD_DESARROLLOS_MOSTRAR` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `SP06_ACTIVIDAD_DESARROLLOS_MOSTRAR`()
BEGIN
	SELECT `PU06IDACTDES`,`PU06DESAD`,PU06IDTIPO
	FROM `pu06actdes`
	WHERE `PU06IDTIPO` = 2;
    END */$$
DELIMITER ;

/* Procedure structure for procedure `SP06_ACTIVIDAD_ESTACION_MOSTRAR` */

/*!50003 DROP PROCEDURE IF EXISTS  `SP06_ACTIVIDAD_ESTACION_MOSTRAR` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `SP06_ACTIVIDAD_ESTACION_MOSTRAR`()
BEGIN
	SELECT * FROM `pu06actdes`
	WHERE `PU06IDTIPO` = 5;
    END */$$
DELIMITER ;

/* Procedure structure for procedure `SP06_ACTIVIDAD_RESIDENCIAL_MOSTRAR` */

/*!50003 DROP PROCEDURE IF EXISTS  `SP06_ACTIVIDAD_RESIDENCIAL_MOSTRAR` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `SP06_ACTIVIDAD_RESIDENCIAL_MOSTRAR`()
BEGIN
	SELECT * FROM `pu06actdes`
	WHERE `PU06IDTIPO` = 1;
    END */$$
DELIMITER ;

/* Procedure structure for procedure `SP06_OBSERVACIONES_ACTDES_GUARDAR` */

/*!50003 DROP PROCEDURE IF EXISTS  `SP06_OBSERVACIONES_ACTDES_GUARDAR` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `SP06_OBSERVACIONES_ACTDES_GUARDAR`(IN IDTRA INT(11),
 IN OBSER VARCHAR(50)
 )
BEGIN
INSERT INTO `pu06observaciones` (`PU04IDTRA`, `PU06OBSERVACIONES`)
VALUES (IDTRA, OBSER);
END */$$
DELIMITER ;

/* Procedure structure for procedure `SP06_OBSERVACIONES_COMERCIAL_GUARDAR` */

/*!50003 DROP PROCEDURE IF EXISTS  `SP06_OBSERVACIONES_COMERCIAL_GUARDAR` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `SP06_OBSERVACIONES_COMERCIAL_GUARDAR`(IN IDTRA INT(11),
 IN OBSER VARCHAR(300)
 )
BEGIN
INSERT INTO `pu06observacionescomercial` (`PU04IDTRA`, `PU06OBSERVACIONESCOMER`)
VALUES (IDTRA, OBSER);
END */$$
DELIMITER ;

/* Procedure structure for procedure `SP06_OBSERVACIONES_COMERINDUSTRIAL_GUARDAR` */

/*!50003 DROP PROCEDURE IF EXISTS  `SP06_OBSERVACIONES_COMERINDUSTRIAL_GUARDAR` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `SP06_OBSERVACIONES_COMERINDUSTRIAL_GUARDAR`(IN IDTRA INT(11),
 IN OBSER VARCHAR(300)
 )
BEGIN
INSERT INTO `pu06observacionescomerindustrial`(`PU04IDTRA`, `PU06OBSERVACIONES`)
VALUES (IDTRA, OBSER);
END */$$
DELIMITER ;

/* Procedure structure for procedure `SP06_OBSERVACIONES_ESTACIONSERVICIOS_GUARDAR` */

/*!50003 DROP PROCEDURE IF EXISTS  `SP06_OBSERVACIONES_ESTACIONSERVICIOS_GUARDAR` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `SP06_OBSERVACIONES_ESTACIONSERVICIOS_GUARDAR`(IN IDTRA INT(11),
 IN OBSER VARCHAR(300)
 )
BEGIN
INSERT INTO `pu06observacionesestacion`(`PU04IDTRA`, `PU06OBSERVACIONES`)
VALUES (IDTRA, OBSER);
END */$$
DELIMITER ;

/* Procedure structure for procedure `SP06_OBSERVACIONES_RESIDENCIAL_GUARDAR` */

/*!50003 DROP PROCEDURE IF EXISTS  `SP06_OBSERVACIONES_RESIDENCIAL_GUARDAR` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `SP06_OBSERVACIONES_RESIDENCIAL_GUARDAR`(IN IDTRA INT(11),
 IN OBSER VARCHAR(300)
 )
BEGIN
INSERT INTO `pu06observacionesresidencial`(`PU04IDTRA`, `PU06OBSERVACIONES`)
VALUES (IDTRA, OBSER);
END */$$
DELIMITER ;

/* Procedure structure for procedure `SP07_TERRFR_TRA_GUARDAR` */

/*!50003 DROP PROCEDURE IF EXISTS  `SP07_TERRFR_TRA_GUARDAR` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `SP07_TERRFR_TRA_GUARDAR`(IN idtra INT(11), IN idterrfr int(11))
BEGIN
INSERT INTO `pu07traterrft`(`PU04IDTRA`, `PU07IDTFR`)
 VALUES (idtra, idterrfr);
END */$$
DELIMITER ;

/* Procedure structure for procedure `SP07_TERRFT_ACTUALIZAR` */

/*!50003 DROP PROCEDURE IF EXISTS  `SP07_TERRFT_ACTUALIZAR` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `SP07_TERRFT_ACTUALIZAR`(IN IDTFR INT(11), IN NOMTFR VARCHAR(30))
BEGIN
UPDATE PU07TERRFT
 SET PU07NOMTFR = NOMTFR
  WHERE PU07IDTFR = IDTFR;
END */$$
DELIMITER ;

/* Procedure structure for procedure `SP07_TERRFT_BUSCAR` */

/*!50003 DROP PROCEDURE IF EXISTS  `SP07_TERRFT_BUSCAR` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `SP07_TERRFT_BUSCAR`(IN IDTFR INT(11))
BEGIN
SELECT `PU07IDTFR`,`PU07NOMTFR` 
FROM `pu07terrft`
 WHERE `PU07IDTFR` = IDTFR;
END */$$
DELIMITER ;

/* Procedure structure for procedure `SP07_TERRFT_ELIMINAR` */

/*!50003 DROP PROCEDURE IF EXISTS  `SP07_TERRFT_ELIMINAR` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `SP07_TERRFT_ELIMINAR`(IN IDTFR INT(11))
BEGIN
DELETE FROM PU07TERRFT
 WHERE PU07IDTFR = IDTFR;
END */$$
DELIMITER ;

/* Procedure structure for procedure `SP07_TERRFT_GUARDAR` */

/*!50003 DROP PROCEDURE IF EXISTS  `SP07_TERRFT_GUARDAR` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `SP07_TERRFT_GUARDAR`(IN IDTFR INT(11), IN NOMTFR VARCHAR(30))
BEGIN
INSERT INTO PU07TERRFT (PU07IDTFR, PU07NOMTFR)
 VALUES (IDTFR, NOMTFR);
END */$$
DELIMITER ;

/* Procedure structure for procedure `SP07_TERRFT_MOSTRAR` */

/*!50003 DROP PROCEDURE IF EXISTS  `SP07_TERRFT_MOSTRAR` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `SP07_TERRFT_MOSTRAR`()
BEGIN
SELECT `PU07IDTFR`,`PU07NOMTFR` 
FROM `pu07terrft`;
END */$$
DELIMITER ;

/* Procedure structure for procedure `SP09_DESCEG_ACTUALIZAR` */

/*!50003 DROP PROCEDURE IF EXISTS  `SP09_DESCEG_ACTUALIZAR` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `SP09_DESCEG_ACTUALIZAR`(IN IDDEG INT(11), IN DESCREG VARCHAR(30))
BEGIN
UPDATE PU09DESCEG
 SET PU09DESCREG = DESCREG
   WHERE PU09IDDEG = IDDEG;
END */$$
DELIMITER ;

/* Procedure structure for procedure `SP09_DESCEG_BUSCAR` */

/*!50003 DROP PROCEDURE IF EXISTS  `SP09_DESCEG_BUSCAR` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `SP09_DESCEG_BUSCAR`(IDDEG INT)
BEGIN
	SELECT `PU09IDDEG`,`PU09DESCREG`
	FROM pu09desceg 
	WHERE PU09IDDEG =IDDEG;
    END */$$
DELIMITER ;

/* Procedure structure for procedure `SP09_DESCEG_ELIMINAR` */

/*!50003 DROP PROCEDURE IF EXISTS  `SP09_DESCEG_ELIMINAR` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `SP09_DESCEG_ELIMINAR`(IN IDDEG INT(11))
BEGIN
DELETE FROM PU09DESCEG
 WHERE PU09IDDEG = IDDEG;
END */$$
DELIMITER ;

/* Procedure structure for procedure `SP09_DESCEG_GUARDAR` */

/*!50003 DROP PROCEDURE IF EXISTS  `SP09_DESCEG_GUARDAR` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `SP09_DESCEG_GUARDAR`(IN IDDEG INT(11), IN DESCREG VARCHAR(30))
BEGIN
INSERT INTO PU09DESCEG (PU09IDDEG, PU09DESCREG)
 VALUES (IDDEG, DESCREG);
END */$$
DELIMITER ;

/* Procedure structure for procedure `SP09_DESCEG_MOSTRAR` */

/*!50003 DROP PROCEDURE IF EXISTS  `SP09_DESCEG_MOSTRAR` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `SP09_DESCEG_MOSTRAR`()
BEGIN
SELECT `PU09IDDEG`,`PU09DESCREG`
FROM `pu09desceg`;
END */$$
DELIMITER ;

/* Procedure structure for procedure `SP09_DESCEG_TRA_GUARDAR` */

/*!50003 DROP PROCEDURE IF EXISTS  `SP09_DESCEG_TRA_GUARDAR` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `SP09_DESCEG_TRA_GUARDAR`(IN IDTRA INT(11),IN IDDEG INT(11))
BEGIN
INSERT INTO PU09tradeg (PU04IDTRA,PU09IDDEG)
 VALUES (IDTRA,IDDEG);
END */$$
DELIMITER ;

/* Procedure structure for procedure `SP09_OBSERVACIONES_DESCEG_GUARDAR` */

/*!50003 DROP PROCEDURE IF EXISTS  `SP09_OBSERVACIONES_DESCEG_GUARDAR` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `SP09_OBSERVACIONES_DESCEG_GUARDAR`(IN IDTRA INT(11),
 IN OBSER VARCHAR(50)
 )
BEGIN
INSERT INTO `pu09observaciones` (`PU04IDTRA`, `PU09OBSERVACIONES`)
VALUES (IDTRA, OBSER);
END */$$
DELIMITER ;

/* Procedure structure for procedure `SP10_ASPBIO_ACTUALIZAR` */

/*!50003 DROP PROCEDURE IF EXISTS  `SP10_ASPBIO_ACTUALIZAR` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `SP10_ASPBIO_ACTUALIZAR`(IN IDASBIO INT(11), IN DESCABIO VARCHAR(30))
BEGIN
UPDATE PU10ASPBIO
 SET PU10DESCABIO = DESCABIO
  WHERE PU10IDASBIO = IDASBIO;
END */$$
DELIMITER ;

/* Procedure structure for procedure `SP10_ASPBIO_ELIMINAR` */

/*!50003 DROP PROCEDURE IF EXISTS  `SP10_ASPBIO_ELIMINAR` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `SP10_ASPBIO_ELIMINAR`(IN IDASBIO INT(11))
BEGIN
DELETE FROM PU10ASPBIO
 WHERE PU10IDASBIO = IDASBIO;
END */$$
DELIMITER ;

/* Procedure structure for procedure `SP10_ASPBIO_GUARDAR` */

/*!50003 DROP PROCEDURE IF EXISTS  `SP10_ASPBIO_GUARDAR` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `SP10_ASPBIO_GUARDAR`(IN IDASBIO INT(11), IN DESCABIO VARCHAR(30))
BEGIN
INSERT INTO PU10ASPBIO (PU10IDASBIO, PU10DESCABIO)
 VALUES (IDASBIO, DESCABIO);
END */$$
DELIMITER ;

/* Procedure structure for procedure `SP10_ASPBIO_MOSTRAR` */

/*!50003 DROP PROCEDURE IF EXISTS  `SP10_ASPBIO_MOSTRAR` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `SP10_ASPBIO_MOSTRAR`()
BEGIN
	SELECT `PU10IDASBIO`,`PU10DESCABIO`
	FROM pu10aspbio;
    END */$$
DELIMITER ;

/* Procedure structure for procedure `SP10_ASPBIO_TRA_GUARDAR` */

/*!50003 DROP PROCEDURE IF EXISTS  `SP10_ASPBIO_TRA_GUARDAR` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `SP10_ASPBIO_TRA_GUARDAR`(IN IDTRA INT(11), IN IDASPBIO INT(11))
BEGIN
INSERT INTO pu11uniabio (PU04IDTRA,PU10IDASBIO)
 VALUES (IDTRA, IDASPBIO);
END */$$
DELIMITER ;

/* Procedure structure for procedure `SP10_OBSERVACIONES_DESCEG_GUARDAR` */

/*!50003 DROP PROCEDURE IF EXISTS  `SP10_OBSERVACIONES_DESCEG_GUARDAR` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `SP10_OBSERVACIONES_DESCEG_GUARDAR`(IN IDTRA INT(11),
 IN OBSER VARCHAR(50)
 )
BEGIN
INSERT INTO `pu10observaciones` (`PU04IDTRA`, `PU10OBSERVACIONES`)
VALUES (IDTRA, OBSER);
END */$$
DELIMITER ;

/* Procedure structure for procedure `SP121_SERVICIOS_TRA_GUARDAR` */

/*!50003 DROP PROCEDURE IF EXISTS  `SP121_SERVICIOS_TRA_GUARDAR` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `SP121_SERVICIOS_TRA_GUARDAR`(IN IDTRA INT(11), IN IDSERV INT(11))
BEGIN
INSERT INTO `pu23traservi` (PU04IDTRA,PU21IDSERVI)
 VALUES (IDTRA, IDSERV);
END */$$
DELIMITER ;

/* Procedure structure for procedure `SP12_OBSERVACIONES_TIPDESC_GUARDAR` */

/*!50003 DROP PROCEDURE IF EXISTS  `SP12_OBSERVACIONES_TIPDESC_GUARDAR` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `SP12_OBSERVACIONES_TIPDESC_GUARDAR`(IN IDTRA INT(11),
 IN OBSER VARCHAR(50)
 )
BEGIN
INSERT INTO `pu12observaciones` (`PU04IDTRA`, `PU12OBSERVACIONES`)
VALUES (IDTRA, OBSER);
END */$$
DELIMITER ;

/* Procedure structure for procedure `SP12_TIPDESEC_ACTUALIZAR` */

/*!50003 DROP PROCEDURE IF EXISTS  `SP12_TIPDESEC_ACTUALIZAR` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `SP12_TIPDESEC_ACTUALIZAR`(IN IDTDESEC INT(11), IN TIPODES VARCHAR(30))
BEGIN
UPDATE PU12TIPDESEC
 SET PU12TIPODES = TIPODES
  WHERE PU12IDTDESEC = IDTDESEC;
END */$$
DELIMITER ;

/* Procedure structure for procedure `SP12_TIPDESEC_ELIMINAR` */

/*!50003 DROP PROCEDURE IF EXISTS  `SP12_TIPDESEC_ELIMINAR` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `SP12_TIPDESEC_ELIMINAR`(IN IDTDESEC INT(11))
BEGIN
DELETE FROM PU12TIPDESEC
 WHERE PU12IDTDESEC = IDTDESEC;
END */$$
DELIMITER ;

/* Procedure structure for procedure `SP12_TIPDESEC_GUARDAR` */

/*!50003 DROP PROCEDURE IF EXISTS  `SP12_TIPDESEC_GUARDAR` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `SP12_TIPDESEC_GUARDAR`(IN IDTDESEC INT(11), IN TIPODES VARCHAR(30))
BEGIN
INSERT INTO PU12TIPDESEC (PU12IDTDESEC, PU12TIPODES)
 VALUES (IDTDESEC, TIPODES);
END */$$
DELIMITER ;

/* Procedure structure for procedure `SP12_TIPDESEC_MOSTRAR` */

/*!50003 DROP PROCEDURE IF EXISTS  `SP12_TIPDESEC_MOSTRAR` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `SP12_TIPDESEC_MOSTRAR`()
BEGIN
	 SELECT `PU12IDTDESEC`,`PU12TIPODES` 
	 FROM pu12tipdesec;
    END */$$
DELIMITER ;

/* Procedure structure for procedure `SP12_TIPODESEC_TRA_GUARDAR` */

/*!50003 DROP PROCEDURE IF EXISTS  `SP12_TIPODESEC_TRA_GUARDAR` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `SP12_TIPODESEC_TRA_GUARDAR`(IN IDTRA INT(11), IN IDTIPODESEC INT(11))
BEGIN
INSERT INTO `pu12tratipdesec` (PU04IDTRA,`PU12IDTDESEC`)
 VALUES (IDTRA, IDTIPODESEC);
END */$$
DELIMITER ;

/* Procedure structure for procedure `SP13_AAREP_ACTUALIZAR` */

/*!50003 DROP PROCEDURE IF EXISTS  `SP13_AAREP_ACTUALIZAR` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `SP13_AAREP_ACTUALIZAR`( IN idapp INT(11),IN descaap VARCHAR(30))
BEGIN
UPDATE `pu13aarep`
 SET `PU13DESCAAP`=descaap
  WHERE `PU13IDAAP`=idapp;	
END */$$
DELIMITER ;

/* Procedure structure for procedure `SP13_AAREP_BUSCAR` */

/*!50003 DROP PROCEDURE IF EXISTS  `SP13_AAREP_BUSCAR` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `SP13_AAREP_BUSCAR`(IDAAP INT)
BEGIN
	 SELECT `PU13IDAAP`,`PU13DESCAAP`
	 FROM pu13aarep 
	 WHERE PU13IDAAP =IDAAP;
END */$$
DELIMITER ;

/* Procedure structure for procedure `SP13_AAREP_ELIMINAR` */

/*!50003 DROP PROCEDURE IF EXISTS  `SP13_AAREP_ELIMINAR` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `SP13_AAREP_ELIMINAR`( IN idapp INT(11))
BEGIN
DELETE FROM `PU13AAREP`
 WHERE `PU13IDAAP`=idapp;
END */$$
DELIMITER ;

/* Procedure structure for procedure `SP13_AAREP_GUARDAR` */

/*!50003 DROP PROCEDURE IF EXISTS  `SP13_AAREP_GUARDAR` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `SP13_AAREP_GUARDAR`( IN idapp INT(11),IN descaap VARCHAR(30))
BEGIN
INSERT INTO `pu13aarep` ( `PU13IDAAP`,`PU13DESCAAP`)
 VALUES (idapp, descaap);
END */$$
DELIMITER ;

/* Procedure structure for procedure `SP13_AAREP_MOSTRAR` */

/*!50003 DROP PROCEDURE IF EXISTS  `SP13_AAREP_MOSTRAR` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `SP13_AAREP_MOSTRAR`()
BEGIN
	 SELECT `PU13IDAAP`,`PU13DESCAAP`
	 FROM pu13aarep ;
    END */$$
DELIMITER ;

/* Procedure structure for procedure `SP13_AAREP_TRA_GUARDAR` */

/*!50003 DROP PROCEDURE IF EXISTS  `SP13_AAREP_TRA_GUARDAR` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `SP13_AAREP_TRA_GUARDAR`( IN idtra INT(11),IN idaap int(11))
BEGIN
INSERT INTO `pu14trarep` (`PU04IDTRA`,`PU13IDAAP`)
 VALUES (idtra, idaap);
END */$$
DELIMITER ;

/* Procedure structure for procedure `SP15_SERV_ACTUALIZAR` */

/*!50003 DROP PROCEDURE IF EXISTS  `SP15_SERV_ACTUALIZAR` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `SP15_SERV_ACTUALIZAR`( IN idserv INT,IN idservid INT,IN idtra INT,IN iddesas INT,IN idsae INT, IN idcscls INT)
BEGIN
UPDATE `pu15serv`
 SET `PU21IDSERVI`=idservid,
  `PU04IDTRA`=idtra,
   `PU20IDDESAS`=iddesas
    WHERE `PU15IDSERVI`=idserv;
    
UPDATE `pu17serae`SET 
	`PU16IDSAE`=idsae
	WHERE `PU15IDSERVI`=idserv;
	
UPDATE `pu19serpacsca` SET 
 `PU18IDCSCLS`=idcscls
   WHERE `PU15IDSERVI`=idserv;
END */$$
DELIMITER ;

/* Procedure structure for procedure `SP15_SERV_ELIMINAR` */

/*!50003 DROP PROCEDURE IF EXISTS  `SP15_SERV_ELIMINAR` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `SP15_SERV_ELIMINAR`( IN idserv INT)
BEGIN
DELETE FROM `pu19serpacsca`
 WHERE `PU15IDSERVI`=idserv;
DELETE FROM `pu17serae`
 WHERE `PU15IDSERVI`=idserv;
DELETE FROM `pu15serv`
 WHERE `PU15IDSERVI`=idserv;
END */$$
DELIMITER ;

/* Procedure structure for procedure `SP15_SERV_GUARDAR` */

/*!50003 DROP PROCEDURE IF EXISTS  `SP15_SERV_GUARDAR` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `SP15_SERV_GUARDAR`( IN idserv INT(11),IN idservid INT(11),IN idtra INT(11),IN iddesas INT(11),IN idsae INT(11), IN idcscls INT(11))
BEGIN
INSERT INTO `pu15serv`( `PU15IDSERVI`,`PU21IDSERVI`,`PU04IDTRA`,`PU20IDDESAS`)
 VALUES (idserv, idservid,idtra,iddesas);
    
INSERT INTO `pu17serae`(`PU15IDSERVI`,`PU16IDSAE`)
 VALUE(idserv,idsae);
    
INSERT INTO `pu19serpacsca`(`PU15IDSERVI`,`PU18IDCSCLS`)
 VALUE(idserv,idcscls);   
END */$$
DELIMITER ;

/* Procedure structure for procedure `SP16_SERVAE_ACTUALIZAR` */

/*!50003 DROP PROCEDURE IF EXISTS  `SP16_SERVAE_ACTUALIZAR` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `SP16_SERVAE_ACTUALIZAR`( IN idsae INT,IN descae VARCHAR(30))
BEGIN
UPDATE  `pu16servae`
 SET `PU16DESCAE`=descae
  WHERE `PU16IDSAE`=idsae;	
END */$$
DELIMITER ;

/* Procedure structure for procedure `SP16_SERVAE_BUSCAR` */

/*!50003 DROP PROCEDURE IF EXISTS  `SP16_SERVAE_BUSCAR` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `SP16_SERVAE_BUSCAR`(IDSAE INT)
BEGIN
	 SELECT `PU16IDSAE`,`PU16DESCAE`
	 FROM pu16servae 
	 WHERE PU16IDSAE =IDSAE;
END */$$
DELIMITER ;

/* Procedure structure for procedure `SP16_SERVAE_ELIMINAR` */

/*!50003 DROP PROCEDURE IF EXISTS  `SP16_SERVAE_ELIMINAR` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `SP16_SERVAE_ELIMINAR`( IN idsae INT)
BEGIN
DELETE FROM `pu16servae`
 WHERE `PU16IDSAE`=idsae;
END */$$
DELIMITER ;

/* Procedure structure for procedure `SP16_SERVAE_GUARDAR` */

/*!50003 DROP PROCEDURE IF EXISTS  `SP16_SERVAE_GUARDAR` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `SP16_SERVAE_GUARDAR`( IN idsae INT,IN descae VARCHAR(30))
BEGIN
INSERT INTO`pu16servae`( `PU16IDSAE`,`PU16DESCAE`)
 VALUES (idsae,descae);   
END */$$
DELIMITER ;

/* Procedure structure for procedure `SP16_SERVAE_MOSTRAR` */

/*!50003 DROP PROCEDURE IF EXISTS  `SP16_SERVAE_MOSTRAR` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `SP16_SERVAE_MOSTRAR`()
BEGIN
	 SELECT `PU16IDSAE`,`PU16DESCAE`
	 FROM pu16servae ;
    END */$$
DELIMITER ;

/* Procedure structure for procedure `SP18_CALLESER_ACTUALIZAR` */

/*!50003 DROP PROCEDURE IF EXISTS  `SP18_CALLESER_ACTUALIZAR` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `SP18_CALLESER_ACTUALIZAR`( IN idcscls INT,IN descs VARCHAR(30))
BEGIN
UPDATE  `pu18calleser`
 SET `PU18DESCS`=descs
  WHERE `PU18IDCSCLS`=idcscls;
END */$$
DELIMITER ;

/* Procedure structure for procedure `SP18_CALLESER_BUSCAR` */

/*!50003 DROP PROCEDURE IF EXISTS  `SP18_CALLESER_BUSCAR` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `SP18_CALLESER_BUSCAR`(IDCSCLS INT)
BEGIN
	 SELECT `PU18IDCSCLS`,`PU18DESCS` 
	 FROM PU18CALLESER 
	 WHERE PU18IDCSCLS = IDCSCLS;
END */$$
DELIMITER ;

/* Procedure structure for procedure `SP18_CALLESER_ELIMINAR` */

/*!50003 DROP PROCEDURE IF EXISTS  `SP18_CALLESER_ELIMINAR` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `SP18_CALLESER_ELIMINAR`( IN idcscls INT)
BEGIN	
DELETE FROM `pu18calleser`
 WHERE `PU18IDCSCLS`=idcscls;
END */$$
DELIMITER ;

/* Procedure structure for procedure `SP18_CALLESER_GUARDAR` */

/*!50003 DROP PROCEDURE IF EXISTS  `SP18_CALLESER_GUARDAR` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `SP18_CALLESER_GUARDAR`( IN idcscls INT,IN descs VARCHAR(30))
BEGIN
INSERT INTO `pu18calleser`( `PU18IDCSCLS`,`PU18DESCS`)
 VALUES (idcscls,descs);    
END */$$
DELIMITER ;

/* Procedure structure for procedure `SP18_CALLESER_MOSTRAR` */

/*!50003 DROP PROCEDURE IF EXISTS  `SP18_CALLESER_MOSTRAR` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `SP18_CALLESER_MOSTRAR`()
BEGIN
	SELECT `PU18IDCSCLS`,`PU18DESCS` 
	 FROM PU18CALLESER ;
    END */$$
DELIMITER ;

/* Procedure structure for procedure `SP20_DESAS_ACTUALIZAR` */

/*!50003 DROP PROCEDURE IF EXISTS  `SP20_DESAS_ACTUALIZAR` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `SP20_DESAS_ACTUALIZAR`( IN iddesas INT,IN descs VARCHAR(30))
BEGIN
UPDATE  `pu20desas`
 SET `PU20DESCS`=descs
  WHERE `PU20IDDESAS`=iddesas;	
END */$$
DELIMITER ;

/* Procedure structure for procedure `SP20_DESAS_BUSCAR` */

/*!50003 DROP PROCEDURE IF EXISTS  `SP20_DESAS_BUSCAR` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `SP20_DESAS_BUSCAR`(IDDESAS INT)
BEGIN
SELECT `PU20IDDESAS`,`PU20DESCS` 
FROM `pu20desas`
 WHERE `PU20IDDESAS` = IDDESAS;
END */$$
DELIMITER ;

/* Procedure structure for procedure `SP20_DESAS_ELIMINAR` */

/*!50003 DROP PROCEDURE IF EXISTS  `SP20_DESAS_ELIMINAR` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `SP20_DESAS_ELIMINAR`( IN iddesas INT)
BEGIN
DELETE FROM `pu20desas`
 WHERE `PU20IDDESAS`=iddesas;
END */$$
DELIMITER ;

/* Procedure structure for procedure `SP20_DESAS_GUARDAR` */

/*!50003 DROP PROCEDURE IF EXISTS  `SP20_DESAS_GUARDAR` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `SP20_DESAS_GUARDAR`( IN iddesas INT,IN descs VARCHAR(30))
BEGIN
INSERT INTO `pu20desas`(`PU20IDDESAS`,`PU20DESCS`)
 VALUES (iddesas,descs);  
END */$$
DELIMITER ;

/* Procedure structure for procedure `SP20_DESAS_MOSTRAR` */

/*!50003 DROP PROCEDURE IF EXISTS  `SP20_DESAS_MOSTRAR` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `SP20_DESAS_MOSTRAR`()
BEGIN
SELECT `PU20IDDESAS`,`PU20DESCS` 
FROM `pu20desas`;
END */$$
DELIMITER ;

/* Procedure structure for procedure `SP21_CASERV_ACTUALIZAR` */

/*!50003 DROP PROCEDURE IF EXISTS  `SP21_CASERV_ACTUALIZAR` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `SP21_CASERV_ACTUALIZAR`( IN idservi INT,IN descser VARCHAR(30))
BEGIN
UPDATE  `pu21caserv`
 SET `PU21DESCSER`=descser
  WHERE `PU21IDSERVI`=idservi;
END */$$
DELIMITER ;

/* Procedure structure for procedure `SP21_CASERV_ELIMINAR` */

/*!50003 DROP PROCEDURE IF EXISTS  `SP21_CASERV_ELIMINAR` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `SP21_CASERV_ELIMINAR`( IN idservi INT)
BEGIN
DELETE FROM `pu21caserv`
 WHERE `PU21IDSERVI`=idservi;	
END */$$
DELIMITER ;

/* Procedure structure for procedure `SP21_CASERV_GUARDAR` */

/*!50003 DROP PROCEDURE IF EXISTS  `SP21_CASERV_GUARDAR` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `SP21_CASERV_GUARDAR`( IN idservi INT,IN descser VARCHAR(30))
BEGIN
INSERT INTO `pu21caserv`(`PU21IDSERVI`,`PU21IDSERVI`)
 VALUES (idservi,descser);    
END */$$
DELIMITER ;

/* Procedure structure for procedure `SP21_SERVICIOS_MOSTRAR` */

/*!50003 DROP PROCEDURE IF EXISTS  `SP21_SERVICIOS_MOSTRAR` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `SP21_SERVICIOS_MOSTRAR`()
BEGIN
SELECT `PU21IDSERVI`,`PU21DESCSERVI`
FROM `pu21serviservicios`;
END */$$
DELIMITER ;

/* Procedure structure for procedure `SP22_SERRVI_ACTUALIZAR` */

/*!50003 DROP PROCEDURE IF EXISTS  `SP22_SERRVI_ACTUALIZAR` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `SP22_SERRVI_ACTUALIZAR`( IN idredvi INT,IN dessvi VARCHAR(30))
BEGIN
UPDATE  `pu22serrvi` SET 
 `PU22DESSVI`=dessvi
  WHERE `PU22IDREDVI`=idredvi;
END */$$
DELIMITER ;

/* Procedure structure for procedure `SP22_SERRVI_BUSCAR` */

/*!50003 DROP PROCEDURE IF EXISTS  `SP22_SERRVI_BUSCAR` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `SP22_SERRVI_BUSCAR`(IDREDVI INT)
BEGIN
SELECT `PU22IDREDVI`,`PU22DESSVI`,`PU22OBSERV` 
FROM `pu22serrvi`
 WHERE `PU22IDREDVI` =IDREDVI;
END */$$
DELIMITER ;

/* Procedure structure for procedure `SP22_SERRVI_ELIMINAR` */

/*!50003 DROP PROCEDURE IF EXISTS  `SP22_SERRVI_ELIMINAR` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `SP22_SERRVI_ELIMINAR`( IN idredvi INT)
BEGIN	
DELETE FROM `pu22serrvi`
 WHERE `PU22IDREDVI`=idredvi;
END */$$
DELIMITER ;

/* Procedure structure for procedure `SP22_SERRVI_GUARDAR` */

/*!50003 DROP PROCEDURE IF EXISTS  `SP22_SERRVI_GUARDAR` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `SP22_SERRVI_GUARDAR`( IN idredvi INT,IN dessvi VARCHAR(30))
BEGIN
INSERT INTO `pu22serrvi`(`PU22IDREDVI`,`PU22DESSVI`)
 VALUES (idredvi,dessvi); 
END */$$
DELIMITER ;

/* Procedure structure for procedure `SP22_SERRVI_MOSTRAR` */

/*!50003 DROP PROCEDURE IF EXISTS  `SP22_SERRVI_MOSTRAR` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `SP22_SERRVI_MOSTRAR`()
BEGIN
SELECT `PU22IDREDVI`,`PU22DESSVI`,`PU22OBSERV` 
FROM `pu22serrvi`;
END */$$
DELIMITER ;

/* Procedure structure for procedure `SP22_TREDV_MOSTRAR` */

/*!50003 DROP PROCEDURE IF EXISTS  `SP22_TREDV_MOSTRAR` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `SP22_TREDV_MOSTRAR`()
BEGIN
SELECT `PU22IDTREDV`,`PU22DESCTRV`
FROM `pu22tredv`;
END */$$
DELIMITER ;

/* Procedure structure for procedure `SP22_TREDV_TRA_GUARDAR` */

/*!50003 DROP PROCEDURE IF EXISTS  `SP22_TREDV_TRA_GUARDAR` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `SP22_TREDV_TRA_GUARDAR`( IN idtra INT(11),IN idtred INT(11))
BEGIN
INSERT INTO `pu22traserv` (`PU04IDTRA`,`PU22IDTREDV`)
 VALUES (idtra, idtred);
END */$$
DELIMITER ;

/* Procedure structure for procedure `SP24_INFEST_ACTUALIZAR` */

/*!50003 DROP PROCEDURE IF EXISTS  `SP24_INFEST_ACTUALIZAR` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `SP24_INFEST_ACTUALIZAR`( IN idinfr INT,IN descinf VARCHAR(30))
BEGIN
UPDATE  `pu24infest`
 SET `PU24DESCINF`=descinf
  WHERE `PU24IDINFR`=idinfr;
END */$$
DELIMITER ;

/* Procedure structure for procedure `SP24_INFEST_BUSCAR` */

/*!50003 DROP PROCEDURE IF EXISTS  `SP24_INFEST_BUSCAR` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `SP24_INFEST_BUSCAR`(IN idinfr INT(11))
BEGIN
SELECT `PU24IDINFR`,`PU24DESCINF`
FROM `pu24infest`
 WHERE PU24IDINFR = idinfr;
END */$$
DELIMITER ;

/* Procedure structure for procedure `SP24_INFEST_ELIMINAR` */

/*!50003 DROP PROCEDURE IF EXISTS  `SP24_INFEST_ELIMINAR` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `SP24_INFEST_ELIMINAR`( IN idinfr INT)
BEGIN
DELETE FROM `pu24infest`
 WHERE `PU24IDINFR`=idredvi;	
END */$$
DELIMITER ;

/* Procedure structure for procedure `SP24_INFEST_GUARDAR` */

/*!50003 DROP PROCEDURE IF EXISTS  `SP24_INFEST_GUARDAR` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `SP24_INFEST_GUARDAR`( IN idinfr INT,IN descinf VARCHAR(30))
BEGIN
INSERT INTO `pu24infest`(`PU24IDINFR`,`PU24DESCINF`)
 VALUES (idinfr,descinf);    
END */$$
DELIMITER ;

/* Procedure structure for procedure `SP24_INFEST_MOSTRAR` */

/*!50003 DROP PROCEDURE IF EXISTS  `SP24_INFEST_MOSTRAR` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `SP24_INFEST_MOSTRAR`()
BEGIN
SELECT `PU24IDINFR`,`PU24DESCINF`
FROM `pu24infest`;
END */$$
DELIMITER ;

/* Procedure structure for procedure `SP24_TIPODECONTRUCCION_INFEST_GUARDAR` */

/*!50003 DROP PROCEDURE IF EXISTS  `SP24_TIPODECONTRUCCION_INFEST_GUARDAR` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `SP24_TIPODECONTRUCCION_INFEST_GUARDAR`(IN IDTRA INT(11),
 IN INFRA VARCHAR(50)
 )
BEGIN
INSERT INTO `PU24TIPOCONSTRUCCION` (`PU04IDTRA`, `PU24TIPOCONSTRUCCION`)
VALUES (IDTRA, INFRA);
END */$$
DELIMITER ;

/* Procedure structure for procedure `SP25_OBSERVACIONES_PATENTES_GUARDAR` */

/*!50003 DROP PROCEDURE IF EXISTS  `SP25_OBSERVACIONES_PATENTES_GUARDAR` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `SP25_OBSERVACIONES_PATENTES_GUARDAR`(IN IDTRA INT(11),
 IN OBSER VARCHAR(300)
 )
BEGIN
INSERT INTO `pu25observacionpatentes`(`PU04IDTRA`, `PU06OBSERVACIONES`)
VALUES (IDTRA, OBSER);
END */$$
DELIMITER ;

/* Procedure structure for procedure `SP26_PLANREGACTIVI_NICOYA_MOSTRAR` */

/*!50003 DROP PROCEDURE IF EXISTS  `SP26_PLANREGACTIVI_NICOYA_MOSTRAR` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `SP26_PLANREGACTIVI_NICOYA_MOSTRAR`()
BEGIN
	SELECT `PU26IDDESCNICOYASAMA`,`PU26DESCACNICOYASAMA`
	FROM `pu26planactinicosama`
	WHERE `PU26IDPLAN` = 1;
    END */$$
DELIMITER ;

/* Procedure structure for procedure `SP26_PLANREGACTIVI_SAMARA_MOSTRAR` */

/*!50003 DROP PROCEDURE IF EXISTS  `SP26_PLANREGACTIVI_SAMARA_MOSTRAR` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `SP26_PLANREGACTIVI_SAMARA_MOSTRAR`()
BEGIN
	SELECT `PU26IDDESCNICOYASAMA`,`PU26DESCACNICOYASAMA`
	FROM `pu26planactinicosama`
	WHERE `PU26IDPLAN` = 2;
    END */$$
DELIMITER ;

/* Procedure structure for procedure `SP26_PLANREGULADOR_TRA_GUARDAR` */

/*!50003 DROP PROCEDURE IF EXISTS  `SP26_PLANREGULADOR_TRA_GUARDAR` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `SP26_PLANREGULADOR_TRA_GUARDAR`(IN idtra INT(11), IN idplanreg INT(11))
BEGIN
INSERT INTO `pu26planregtramite`(`PU04IDTRA`, `PU26IDPLAN`)
 VALUES (idtra, idplanreg);
END */$$
DELIMITER ;

/* Procedure structure for procedure `SP26_PLANREG_ACTUALIZAR` */

/*!50003 DROP PROCEDURE IF EXISTS  `SP26_PLANREG_ACTUALIZAR` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `SP26_PLANREG_ACTUALIZAR`(IN idplan INT(11),IN plandes VARCHAR(30))
BEGIN
UPDATE pu26planreg SET PU26PLNDESC=plandes WHERE PU26IDPLAN=idplan;
END */$$
DELIMITER ;

/* Procedure structure for procedure `SP26_PLANREG_BUSCAR` */

/*!50003 DROP PROCEDURE IF EXISTS  `SP26_PLANREG_BUSCAR` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `SP26_PLANREG_BUSCAR`(IDPLAN INT)
BEGIN
SELECT `PU26IDPLAN`,`PU26PLNDESC` 
FROM `pu26planreg`
 WHERE `PU26IDPLAN` =IDPLAN;
END */$$
DELIMITER ;

/* Procedure structure for procedure `SP26_PLANREG_ELIMINAR` */

/*!50003 DROP PROCEDURE IF EXISTS  `SP26_PLANREG_ELIMINAR` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `SP26_PLANREG_ELIMINAR`(IN idplan INT(11))
BEGIN
	DELETE FROM pu26planreg WHERE PU26IDPLAN=idplan;
END */$$
DELIMITER ;

/* Procedure structure for procedure `SP26_PLANREG_GUARDAR` */

/*!50003 DROP PROCEDURE IF EXISTS  `SP26_PLANREG_GUARDAR` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `SP26_PLANREG_GUARDAR`( IN idplan INT (11), IN plandes VARCHAR(30))
BEGIN
	INSERT INTO pu26planreg (PU26IDPLAN, PU26PLNDESC)
    VALUES (idplan, plandes);
END */$$
DELIMITER ;

/* Procedure structure for procedure `SP26_PLANREG_MOSTRAR` */

/*!50003 DROP PROCEDURE IF EXISTS  `SP26_PLANREG_MOSTRAR` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `SP26_PLANREG_MOSTRAR`()
BEGIN
SELECT `PU26IDPLAN`,`PU26PLNDESC` 
FROM `pu26planreg`;
END */$$
DELIMITER ;

/* Procedure structure for procedure `SP26_TRAPLAN_TRA_GUARDAR` */

/*!50003 DROP PROCEDURE IF EXISTS  `SP26_TRAPLAN_TRA_GUARDAR` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `SP26_TRAPLAN_TRA_GUARDAR`(IN idtra INT(11), IN idnicosama int (11))
BEGIN
INSERT INTO `pu26traplan`(`PU04IDTRA`, `PU26IDDESCNICOYASAMA`)
 VALUES (idtra,idnicosama);
END */$$
DELIMITER ;

/* Procedure structure for procedure `SP32_CAPUSO_ACTUALIZAR` */

/*!50003 DROP PROCEDURE IF EXISTS  `SP32_CAPUSO_ACTUALIZAR` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `SP32_CAPUSO_ACTUALIZAR`(IN idcuso INT(11),IN dscuso VARCHAR(30))
BEGIN
UPDATE pu32capuso SET PU32DESUSO=dscuso WHERE PU32IDCUSO=idcuso;
END */$$
DELIMITER ;

/* Procedure structure for procedure `SP32_CAPUSO_ELIMINAR` */

/*!50003 DROP PROCEDURE IF EXISTS  `SP32_CAPUSO_ELIMINAR` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `SP32_CAPUSO_ELIMINAR`(IN idcuso INT)
BEGIN
	DELETE FROM pu32capuso WHERE PU32IDCUSO=idcuso;
	
END */$$
DELIMITER ;

/* Procedure structure for procedure `SP32_CAPUSO_GUARDAR` */

/*!50003 DROP PROCEDURE IF EXISTS  `SP32_CAPUSO_GUARDAR` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `SP32_CAPUSO_GUARDAR`( IN idcuso INT (11), IN dscuso VARCHAR(30))
BEGIN
	INSERT INTO `pu32capuso`(`PU32IDCUSO`, `PU32DESUSO`)
    VALUES (idcuso, dscuso);
   
    END */$$
DELIMITER ;

/* Procedure structure for procedure `SP32_CAPUSO_MOSTRAR` */

/*!50003 DROP PROCEDURE IF EXISTS  `SP32_CAPUSO_MOSTRAR` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `SP32_CAPUSO_MOSTRAR`()
BEGIN
SELECT `PU32IDCUSO`,`PU32DESUSO` 
FROM `pu32capuso`;
END */$$
DELIMITER ;

/* Procedure structure for procedure `SP35_TIPSUE_BUSCAR` */

/*!50003 DROP PROCEDURE IF EXISTS  `SP35_TIPSUE_BUSCAR` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `SP35_TIPSUE_BUSCAR`(IDTIPS INT)
BEGIN
	SELECT `PU35IDTIPS`,`PU35DESTIP`
	FROM `pu35tipsue`
	 WHERE `PU35IDTIPS` =IDTIPS;
    END */$$
DELIMITER ;

/* Procedure structure for procedure `SP35_TIPSUE_ELIMINAR` */

/*!50003 DROP PROCEDURE IF EXISTS  `SP35_TIPSUE_ELIMINAR` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `SP35_TIPSUE_ELIMINAR`(IN idtipsue INT)
BEGIN
	DELETE FROM pu35tipsue WHERE PU35IDTIPS=idtipsue;
	
END */$$
DELIMITER ;

/* Procedure structure for procedure `SP35_TIPSUE_GUARDAR` */

/*!50003 DROP PROCEDURE IF EXISTS  `SP35_TIPSUE_GUARDAR` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `SP35_TIPSUE_GUARDAR`( IN idtipsue INT (11), IN dstipsue VARCHAR(30))
BEGIN
	INSERT INTO `pu35tipsue` (`PU35IDTIPS`, `PU35DESTIP`)
    VALUES (idtipsue, dstipsue);
    
    END */$$
DELIMITER ;

/* Procedure structure for procedure `SP35_TIPSUE_MOSTRAR` */

/*!50003 DROP PROCEDURE IF EXISTS  `SP35_TIPSUE_MOSTRAR` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `SP35_TIPSUE_MOSTRAR`()
BEGIN
SELECT `PU35IDTIPS`,`PU35DESTIP`
	FROM `pu35tipsue`;
END */$$
DELIMITER ;

/* Procedure structure for procedure `SP38_OBSERVACIONES_ACCESOS_GUARDAR` */

/*!50003 DROP PROCEDURE IF EXISTS  `SP38_OBSERVACIONES_ACCESOS_GUARDAR` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `SP38_OBSERVACIONES_ACCESOS_GUARDAR`(IN IDTRA INT(11),
 IN OBSER VARCHAR(300)
 )
BEGIN
INSERT INTO `PU38TRAMITEACCESOOBSERVACIONES` (`PU04IDTRA`, `PU38OBSERVACIONES`)
VALUES (IDTRA, OBSER);
END */$$
DELIMITER ;

/* Procedure structure for procedure `SP38_SERVIDUMBRES_MOSTRAR` */

/*!50003 DROP PROCEDURE IF EXISTS  `SP38_SERVIDUMBRES_MOSTRAR` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `SP38_SERVIDUMBRES_MOSTRAR`()
BEGIN
SELECT `PU38IDSERVIDUMBRE`,`PU38DESCRIPSERVIDUM`
FROM `pu38servidumbres`;
END */$$
DELIMITER ;

/* Procedure structure for procedure `SP38_SERVIDUMBRES_TRA_GUARDAR` */

/*!50003 DROP PROCEDURE IF EXISTS  `SP38_SERVIDUMBRES_TRA_GUARDAR` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `SP38_SERVIDUMBRES_TRA_GUARDAR`(IN idtra INT(11), IN idservi INT(11))
BEGIN
INSERT INTO `pu38traservidumbres`(`PU04IDTRA`, `PU38IDSERVIDUMBRE`)
 VALUES (idtra, idservi);
END */$$
DELIMITER ;

/* Procedure structure for procedure `SP39_40_REFINFOSOLIPROPIE_ACTUALIZAR` */

/*!50003 DROP PROCEDURE IF EXISTS  `SP39_40_REFINFOSOLIPROPIE_ACTUALIZAR` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `SP39_40_REFINFOSOLIPROPIE_ACTUALIZAR`(IN IDTRA INT(11),
 in PU39CEDSOLICI int (11),IN PU39NOMSOLICI VARCHAR (50),IN PU39APE1SOLICI VARCHAR (50),IN PU39APE2SOLICI VARCHAR (50),
 IN PU04IDDISTRITO INT(11),IN PU39BARRIO VARCHAR (50),IN PU39DIRECCION VARCHAR (150),
 in PU40CEDPROPIE int (11),IN PU40NOMPROPIE  VARCHAR (50),IN PU40APE1PROPIE  VARCHAR (50),IN PU40APE2PROPIE  VARCHAR (50),
 IN PU40NFINCA VARCHAR (15),IN PU40NCATASTRO  VARCHAR (50)
 )
BEGIN
UPDATE pu39regsolicitante 
SET 	
	PU39NOMSOLICI = PU39NOMSOLICI,
	PU39APE1SOLICI = PU39APE1SOLICI,
	PU39APE2SOLICI = PU39APE2SOLICI
WHERE PU04IDTRA = IDTRA;
			
	UPDATE pu39reginfosolicitante 
	SET 		
		PU04IDDISTRITO = PU04IDDISTRITO,
		PU39BARRIO = PU39BARRIO,
		PU39DIRECCION = PU39DIRECCION
	where pu39reginfosolicitante.PU39CEDSOLICI=PU39CEDSOLICI;
		
update pu40regpropietario 
set	
	PU40NOMPROPIE = PU40NOMPROPIE,
	PU40APE1PROPIE = PU40APE1PROPIE,
	PU40APE2PROPIE = PU40APE2PROPIE
where PU04IDTRA = IDTRA;
		
	update pu40reginfopropietario 
	set 
		PU40NFINCA = PU40NFINCA,
		PU40NCATASTRO = PU40NCATASTRO
	where pu40reginfopropietario.PU40CEDPROPIE = PU40CEDPROPIE;
	
END */$$
DELIMITER ;

/* Procedure structure for procedure `SP39_40_REFINFOSOLIPROPIE_BUSCAR` */

/*!50003 DROP PROCEDURE IF EXISTS  `SP39_40_REFINFOSOLIPROPIE_BUSCAR` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `SP39_40_REFINFOSOLIPROPIE_BUSCAR`(IN IDTRA INT(11))
BEGIN
   SELECT distinct`pu39regsolicitante`.`PU04IDTRA`,pu39regsolicitante.`PU39CEDSOLICI`,pu39regsolicitante.`PU39NOMSOLICI`,
   pu39regsolicitante.`PU39APE1SOLICI`,
   pu39regsolicitante.`PU39APE2SOLICI`,`pu39reginfosolicitante`.`PU04IDDISTRITO`,pu39reginfosolicitante.`PU39BARRIO`,
   pu39reginfosolicitante.`PU39DIRECCION`,
   `pu40regpropietario`.`PU40CEDPROPIE`,`pu40regpropietario`.`PU40NOMPROPIE`, pu40regpropietario.`PU40APE1PROPIE`,
    pu40regpropietario.`PU40APE2PROPIE`,
   `pu40reginfopropietario`.`PU40NCATASTRO`,`pu40reginfopropietario`.`PU40NFINCA`
   
   FROM `pu39regsolicitante`
	INNER JOIN `pu39reginfosolicitante`
	ON `pu39regsolicitante`.`PU39CEDSOLICI` = `pu39reginfosolicitante`.`PU39CEDSOLICI`
	
		INNER JOIN `pu40regpropietario`
		 ON `pu40regpropietario`.`PU04IDTRA` = `pu39regsolicitante`.`PU04IDTRA`
			
			INNER JOIN `pu40reginfopropietario`
			 ON `pu40regpropietario`.`PU40CEDPROPIE` = `pu40reginfopropietario`.`PU40CEDPROPIE`
		
WHERE `pu39regsolicitante`.`PU04IDTRA`=IDTRA AND `pu40regpropietario`.`PU04IDTRA` = IDTRA;
		
END */$$
DELIMITER ;

/* Procedure structure for procedure `SP39_40_REFINFOSOLIPROPIE_GUARDAR` */

/*!50003 DROP PROCEDURE IF EXISTS  `SP39_40_REFINFOSOLIPROPIE_GUARDAR` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `SP39_40_REFINFOSOLIPROPIE_GUARDAR`(IN IDTRA INT(11),
 IN PU39CEDSOLICI INT(11),IN PU39NOMSOLICI VARCHAR (50),IN PU39APE1SOLICI VARCHAR (50),IN PU39APE2SOLICI VARCHAR (50),
 IN PU04IDDISTRITO INt(11),IN PU39BARRIO VARCHAR (50),IN PU39DIRECCION VARCHAR (150),
 IN PU40CEDPROPIE INT (11),IN PU40NOMPROPIE  VARCHAR (50),IN PU40APE1PROPIE  VARCHAR (50),IN PU40APE2PROPIE  VARCHAR (50),
 IN PU40NFINCA VARCHAR (15),IN PU40NCATASTRO  VARCHAR (50)
 )
BEGIN
DECLARE ESTADO INT (11);
SET ESTADO = 7;
INSERT INTO pu39regsolicitante (PU04IDTRA,PU39CEDSOLICI,PU39NOMSOLICI,PU39APE1SOLICI,PU39APE2SOLICI)
		VALUES (IDTRA,PU39CEDSOLICI,PU39NOMSOLICI,PU39APE1SOLICI,PU39APE2SOLICI);
		
	INSERT INTO pu39reginfosolicitante (PU39CEDSOLICI,PU04IDDISTRITO,PU39BARRIO,PU39DIRECCION)
		VALUES (PU39CEDSOLICI,PU04IDDISTRITO,PU39BARRIO,PU39DIRECCION);
		
INSERT INTO pu40regpropietario (PU04IDTRA,PU40CEDPROPIE,PU40NOMPROPIE,PU40APE1PROPIE,PU40APE2PROPIE)
VALUES (IDTRA,PU40CEDPROPIE,PU40NOMPROPIE,PU40APE1PROPIE,PU40APE2PROPIE);
		
	INSERT INTO pu40reginfopropietario (PU40CEDPROPIE,PU40NFINCA,PU40NCATASTRO)
		VALUES (PU40CEDPROPIE,PU40NFINCA,PU40NCATASTRO);
		
		 UPDATE `pu04tramite1`
 SET PUIDESTADO = ESTADO
 WHERE `PU04IDTRA` = IDTRA;
	
END */$$
DELIMITER ;

/* Procedure structure for procedure `SP39_40_REFINFOSOLIPROPIE_MOSTRAR` */

/*!50003 DROP PROCEDURE IF EXISTS  `SP39_40_REFINFOSOLIPROPIE_MOSTRAR` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `SP39_40_REFINFOSOLIPROPIE_MOSTRAR`()
BEGIN
   SELECT `pu39regsolicitante`.`PU04IDTRA`,pu39regsolicitante.`PU39CEDSOLICI`,pu39regsolicitante.`PU39NOMSOLICI`,pu39regsolicitante.`PU39APE1SOLICI`,
   pu39regsolicitante.`PU39APE2SOLICI`, 
   CASE`pu39reginfosolicitante`.`PU04IDDISTRITO`
	WHEN "1" THEN "Nicoya"
	WHEN "2" THEN "Mansion"
	WHEN "3" THEN "San Antonio"
	WHEN "4" THEN "Quebrada Honda"
	WHEN "5" THEN "Samara"
	WHEN "6" THEN "Nosara "
	WHEN "7" THEN "Belen" END as "Distrito", pu39reginfosolicitante.`PU39BARRIO`,pu39reginfosolicitante.`PU39DIRECCION`,
   pu40regpropietario.`PU40CEDPROPIE`,`pu40regpropietario`.`PU40NOMPROPIE`, pu40regpropietario.`PU40APE1PROPIE`, pu40regpropietario.`PU40APE2PROPIE`,
   `pu40reginfopropietario`.`PU40NCATASTRO`,`pu40reginfopropietario`.`PU40NFINCA`
   
   FROM `pu39regsolicitante`
	INNER JOIN `pu39reginfosolicitante`
	ON `pu39regsolicitante`.`PU39CEDSOLICI` = `pu39reginfosolicitante`.`PU39CEDSOLICI`
	
		INNER JOIN `pu40regpropietario`
		 ON `pu40regpropietario`.`PU04IDTRA` = `pu39regsolicitante`.`PU04IDTRA`
			
			INNER JOIN `pu40reginfopropietario`
			 ON `pu40regpropietario`.`PU40CEDPROPIE` = `pu40reginfopropietario`.`PU40CEDPROPIE`;
        END */$$
DELIMITER ;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
