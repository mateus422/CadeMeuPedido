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


/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
create Database cade_meu_pedido;
  use cade_meu_pedido;

CREATE TABLE `t_cliente` (
  `cli_cpf` varchar(11) NOT NULL,
  `cli_nomecompleto` varchar(255) NOT NULL,
  `cli_telefone` decimal(11,0) NOT NULL,
  `cli_endereco` varchar(255) NOT NULL,
  PRIMARY KEY (`cli_cpf`)
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
  `emp_cnpj` int(14) NOT NULL,
  `emp_nome` varchar(200) NOT NULL,
  `emp_login` varchar(16) NOT NULL,
  `emp_senha` varchar(16) NOT NULL,
  `emp_telefone` decimal(11,0),
  PRIMARY KEY (`emp_cnpj`)
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
  `ent_cpf` varchar(11) NOT NULL,
  `ent_nomecompleto` varchar(255) NOT NULL,
  `ent_telefone` decimal(11,0) NOT NULL,
  `emp_cnpj` int(14) NOT NULL,
  PRIMARY KEY (`ent_cpf`),
  KEY `emp_cnpj` (`emp_cnpj`),
  CONSTRAINT `t_entregador_ibfk_1` FOREIGN KEY (`emp_cnpj`) REFERENCES `t_empresa` (`emp_cnpj`)
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
  `ped_codigo` int(11) NOT NULL AUTO_INCREMENT,
  `ped_status` boolean NOT NULL DEFAULT TRUE,
  `ped_descricao` varchar(255) NOT NULL,
  `ped_valor` float(5,2) NOT NULL,
  `cli_cpf` varchar(11) NOT NULL,
  `ent_cpf` varchar(11) DEFAULT NULL,
  PRIMARY KEY (`ped_codigo`),
  KEY `cli_cpf` (`cli_cpf`),
  KEY `ent_cpf` (`ent_cpf`),
  CONSTRAINT `t_pedido_ibfk_1` FOREIGN KEY (`cli_cpf`) REFERENCES `t_cliente` (`cli_cpf`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `t_pedido_ibfk_2` FOREIGN KEY (`ent_cpf`) REFERENCES `t_entregador` (`ent_cpf`)  ON DELETE CASCADE ON UPDATE CASCADE
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
