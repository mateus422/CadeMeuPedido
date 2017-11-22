-- MySQL dump 10.13  Distrib 5.7.17, for Win64 (x86_64)
--
-- Host: localhost    Database: cade_meu_pedido
-- ------------------------------------------------------
-- Server version	5.5.5-10.1.26-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `t_cliente`
--

DROP TABLE IF EXISTS `t_cliente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `t_cliente` (
  `cod_cliente` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(80) NOT NULL,
  `numero` decimal(11,0) DEFAULT NULL,
  `endereço` varchar(255) NOT NULL,
  `cod_pedido` int(11) DEFAULT NULL,
  PRIMARY KEY (`cod_cliente`),
  KEY `cod_pedido` (`cod_pedido`),
  CONSTRAINT `t_cliente_ibfk_1` FOREIGN KEY (`cod_pedido`) REFERENCES `t_pedido` (`cod_pedido`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `t_cliente`
--

LOCK TABLES `t_cliente` WRITE;
/*!40000 ALTER TABLE `t_cliente` DISABLE KEYS */;
/*!40000 ALTER TABLE `t_cliente` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `t_empresa`
--

DROP TABLE IF EXISTS `t_empresa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `t_empresa` (
  `cod_empresa` int(11) NOT NULL AUTO_INCREMENT,
  `cod_entregador` int(11) DEFAULT NULL,
  PRIMARY KEY (`cod_empresa`),
  KEY `cod_entregador` (`cod_entregador`),
  CONSTRAINT `t_empresa_ibfk_1` FOREIGN KEY (`cod_entregador`) REFERENCES `t_entregador` (`cod_entregador`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `t_empresa`
--

LOCK TABLES `t_empresa` WRITE;
/*!40000 ALTER TABLE `t_empresa` DISABLE KEYS */;
/*!40000 ALTER TABLE `t_empresa` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `t_entregador`
--

DROP TABLE IF EXISTS `t_entregador`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `t_entregador` (
  `cod_entregador` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(80) NOT NULL,
  `descricao` varchar(255) DEFAULT NULL,
  `cod_pedido` int(11) DEFAULT NULL,
  PRIMARY KEY (`cod_entregador`),
  KEY `cod_pedido` (`cod_pedido`),
  CONSTRAINT `t_entregador_ibfk_1` FOREIGN KEY (`cod_pedido`) REFERENCES `t_pedido` (`cod_pedido`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `t_entregador`
--

LOCK TABLES `t_entregador` WRITE;
/*!40000 ALTER TABLE `t_entregador` DISABLE KEYS */;
/*!40000 ALTER TABLE `t_entregador` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `t_pedido`
--

DROP TABLE IF EXISTS `t_pedido`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `t_pedido` (
  `cod_pedido` int(11) NOT NULL AUTO_INCREMENT,
  `nome_pedido` varchar(80) NOT NULL,
  `valor_pedido` float NOT NULL,
  `cod_cliente` int(11) DEFAULT NULL,
  `cod_entregador` int(11) DEFAULT NULL,
  PRIMARY KEY (`cod_pedido`),
  KEY `cod_cliente` (`cod_cliente`),
  KEY `cod_entregador` (`cod_entregador`),
  CONSTRAINT `t_pedido_ibfk_1` FOREIGN KEY (`cod_cliente`) REFERENCES `t_cliente` (`cod_cliente`),
  CONSTRAINT `t_pedido_ibfk_2` FOREIGN KEY (`cod_entregador`) REFERENCES `t_entregador` (`cod_entregador`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `t_pedido`
--

LOCK TABLES `t_pedido` WRITE;
/*!40000 ALTER TABLE `t_pedido` DISABLE KEYS */;
/*!40000 ALTER TABLE `t_pedido` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-11-22  2:19:58
