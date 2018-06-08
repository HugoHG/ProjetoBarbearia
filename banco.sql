-- MySQL dump 10.13  Distrib 5.6.10, for Win64 (x86_64)
--
-- Host: localhost    Database: db_centroestetico
-- ------------------------------------------------------
-- Server version	5.6.10-log

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
-- Table structure for table `tbl_destaque`
--

DROP TABLE IF EXISTS `tbl_destaque`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_destaque` (
  `idDestaque` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(100) NOT NULL,
  `imagem` varchar(255) DEFAULT NULL,
  `descricao` text NOT NULL,
  `idEstabelecimento` int(11) NOT NULL,
  PRIMARY KEY (`idDestaque`),
  KEY `fk_destaque_estabelecimento` (`idEstabelecimento`),
  CONSTRAINT `fk_destaque_estabelecimento` FOREIGN KEY (`idEstabelecimento`) REFERENCES `tbl_estabelecimento` (`idEstabelecimento`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_destaque`
--

LOCK TABLES `tbl_destaque` WRITE;
/*!40000 ALTER TABLE `tbl_destaque` DISABLE KEYS */;
INSERT INTO `tbl_destaque` VALUES (1,'Ambiente1','../imagens/sobre/195696b3245eaa86570e71ca7c2e6fa3.jpg','Lorem ipsum dolor sit amet',2),(2,'maui','../imagens/destaque/c3ca895978eb12420b4c0a57bc15007d.jpg','detalhes',1),(7,'destaque meu 666','../imagens/destaque/e49318b550df39fc11889ccf83f59294.jpg','test teste',1);
/*!40000 ALTER TABLE `tbl_destaque` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_estabelecimento`
--

DROP TABLE IF EXISTS `tbl_estabelecimento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_estabelecimento` (
  `idEstabelecimento` int(11) NOT NULL AUTO_INCREMENT,
  `nomeEstabelecimento` varchar(15) NOT NULL,
  PRIMARY KEY (`idEstabelecimento`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_estabelecimento`
--

LOCK TABLES `tbl_estabelecimento` WRITE;
/*!40000 ALTER TABLE `tbl_estabelecimento` DISABLE KEYS */;
INSERT INTO `tbl_estabelecimento` VALUES (1,'Barbearia'),(2,'Centro Estetico');
/*!40000 ALTER TABLE `tbl_estabelecimento` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_faleconosco`
--

DROP TABLE IF EXISTS `tbl_faleconosco`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_faleconosco` (
  `nome` varchar(60) NOT NULL,
  `telefone` varchar(13) DEFAULT NULL,
  `celular` varchar(14) NOT NULL,
  `email` varchar(100) NOT NULL,
  `homepage` varchar(100) DEFAULT NULL,
  `facebook` varchar(100) DEFAULT NULL,
  `criticas` varchar(1000) DEFAULT NULL,
  `infoprodutos` varchar(250) DEFAULT NULL,
  `sexo` varchar(1) NOT NULL,
  `profissao` varchar(40) NOT NULL,
  `idFaleConosco` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`idFaleConosco`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_faleconosco`
--

LOCK TABLES `tbl_faleconosco` WRITE;
/*!40000 ALTER TABLE `tbl_faleconosco` DISABLE KEYS */;
INSERT INTO `tbl_faleconosco` VALUES ('a','b','c','d@z','http://www.e.com','http://www.f.com','g','h','m','i',1);
/*!40000 ALTER TABLE `tbl_faleconosco` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_lojas`
--

DROP TABLE IF EXISTS `tbl_lojas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_lojas` (
  `idLoja` int(11) NOT NULL AUTO_INCREMENT,
  `enderecoLoja` varchar(255) NOT NULL,
  `detalhesLoja` text,
  `cidadeLoja` varchar(255) NOT NULL,
  `ativo` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`idLoja`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_lojas`
--

LOCK TABLES `tbl_lojas` WRITE;
/*!40000 ALTER TABLE `tbl_lojas` DISABLE KEYS */;
INSERT INTO `tbl_lojas` VALUES (2,'R. Joaquim Nunes, 8 - Centro','detalhe itapevi','Itapevi',1),(8,'Rua alguma coisa','asd asd asd ','Afonso Cláudio 123',0);
/*!40000 ALTER TABLE `tbl_lojas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_nivel`
--

DROP TABLE IF EXISTS `tbl_nivel`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_nivel` (
  `idNivel` int(11) NOT NULL AUTO_INCREMENT,
  `nomeNivel` varchar(20) DEFAULT NULL,
  `ativo` int(1) NOT NULL,
  PRIMARY KEY (`idNivel`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_nivel`
--

LOCK TABLES `tbl_nivel` WRITE;
/*!40000 ALTER TABLE `tbl_nivel` DISABLE KEYS */;
INSERT INTO `tbl_nivel` VALUES (1,'Administrador',1),(2,'Cataloguista',1),(3,'Operador Básico',1);
/*!40000 ALTER TABLE `tbl_nivel` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_produto`
--

DROP TABLE IF EXISTS `tbl_produto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_produto` (
  `idProduto` int(11) NOT NULL AUTO_INCREMENT,
  `nomeProduto` varchar(100) NOT NULL,
  `descProduto` varchar(255) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `valor` float NOT NULL,
  `idEstabelecimento` int(11) NOT NULL,
  `prodMes` tinyint(1) NOT NULL,
  PRIMARY KEY (`idProduto`),
  KEY `fk_estabelecimento_produto` (`idEstabelecimento`),
  CONSTRAINT `fk_estabelecimento_produto` FOREIGN KEY (`idEstabelecimento`) REFERENCES `tbl_estabelecimento` (`idEstabelecimento`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_produto`
--

LOCK TABLES `tbl_produto` WRITE;
/*!40000 ALTER TABLE `tbl_produto` DISABLE KEYS */;
INSERT INTO `tbl_produto` VALUES (1,'corte1','desc_corte1','../imagens/produtos_barbearia/corte1.jpg',30,1,0),(2,'corte2',NULL,NULL,40,2,0),(3,'produto3','descproduto3','../imagens/produtos_barbearia/corte2.jpg',100,1,1),(4,'produto4','descproduto4','../imagens/produtos_centroestetico/spa-4.jpg',100,2,1),(5,'produto5','descproduto5','../imagens/produtos_centroestetico/spa-8.jpg',200,2,0);
/*!40000 ALTER TABLE `tbl_produto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_promocao`
--

DROP TABLE IF EXISTS `tbl_promocao`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_promocao` (
  `idPromocao` int(11) NOT NULL AUTO_INCREMENT,
  `idProduto` int(11) NOT NULL,
  `desconto` float NOT NULL,
  `visibilidade` int(1) NOT NULL,
  PRIMARY KEY (`idPromocao`),
  KEY `fk_produto_promocao` (`idProduto`),
  CONSTRAINT `fk_produto_promocao` FOREIGN KEY (`idProduto`) REFERENCES `tbl_produto` (`idProduto`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_promocao`
--

LOCK TABLES `tbl_promocao` WRITE;
/*!40000 ALTER TABLE `tbl_promocao` DISABLE KEYS */;
INSERT INTO `tbl_promocao` VALUES (2,2,100,1),(9,1,10,0);
/*!40000 ALTER TABLE `tbl_promocao` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_sobre`
--

DROP TABLE IF EXISTS `tbl_sobre`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_sobre` (
  `txtSobre` text,
  `imgSobre` varchar(255) NOT NULL,
  `titulo` varchar(50) NOT NULL,
  `idEstabelecimento` int(11) NOT NULL,
  `idSobre` int(11) NOT NULL AUTO_INCREMENT,
  `visibilidade` int(1) NOT NULL,
  PRIMARY KEY (`idSobre`),
  KEY `fk_sobre_estabelecimento` (`idEstabelecimento`),
  CONSTRAINT `fk_sobre_estabelecimento` FOREIGN KEY (`idEstabelecimento`) REFERENCES `tbl_estabelecimento` (`idEstabelecimento`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_sobre`
--

LOCK TABLES `tbl_sobre` WRITE;
/*!40000 ALTER TABLE `tbl_sobre` DISABLE KEYS */;
INSERT INTO `tbl_sobre` VALUES ('Inspirada nas antigas barbearias nova-iorquinas típicas de filmes da máfia das décadas de 40, 50 e 60, a Barbearia Corleone chega com a intenção de resgatar a cultura masculina, perdida ao longo dos anos, em que os homens se encontravam para fazer a barba à navalha e cortar os cabelos enquanto fumavam seus charutos, bebiam e conversavam. Entre toalhas quentes e massagem facial, os melhores cremes e espumas preparam o rosto dos nossos clientes. E hoje, eles e nossos visitantes ainda podem aproveitar o espaço da nossa cervejaria, que conta com um cardápio com mais de 450 rótulos de cerveja para escolher, degustar ou levar para casa.','../imagens/sobre/0bb817b7fdd1dc90bc8a978806fee6b4.png','Sobre a barbearia',1,1,1),('teste teste','../imagens/sobre/675905f79bb00e192ad785862174570a.jpg','Sobre a minha loja 666',1,17,0);
/*!40000 ALTER TABLE `tbl_sobre` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_usuarios`
--

DROP TABLE IF EXISTS `tbl_usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_usuarios` (
  `usuario` varchar(50) DEFAULT NULL,
  `senha` varchar(20) DEFAULT NULL,
  `nomeUsuario` varchar(100) DEFAULT NULL,
  `idUsuario` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`idUsuario`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_usuarios`
--

LOCK TABLES `tbl_usuarios` WRITE;
/*!40000 ALTER TABLE `tbl_usuarios` DISABLE KEYS */;
INSERT INTO `tbl_usuarios` VALUES ('hugo','1234','Hugo333333',1);
/*!40000 ALTER TABLE `tbl_usuarios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary table structure for view `view_promocoes`
--

DROP TABLE IF EXISTS `view_promocoes`;
/*!50001 DROP VIEW IF EXISTS `view_promocoes`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `view_promocoes` (
  `idProduto` tinyint NOT NULL,
  `descProduto` tinyint NOT NULL,
  `foto` tinyint NOT NULL,
  `valor` tinyint NOT NULL,
  `idEstabelecimento` tinyint NOT NULL,
  `desconto` tinyint NOT NULL,
  `idPromocao` tinyint NOT NULL,
  `nomeProduto` tinyint NOT NULL,
  `visibilidade` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Final view structure for view `view_promocoes`
--

/*!50001 DROP TABLE IF EXISTS `view_promocoes`*/;
/*!50001 DROP VIEW IF EXISTS `view_promocoes`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `view_promocoes` AS select `tbl_produto`.`idProduto` AS `idProduto`,`tbl_produto`.`descProduto` AS `descProduto`,`tbl_produto`.`foto` AS `foto`,`tbl_produto`.`valor` AS `valor`,`tbl_produto`.`idEstabelecimento` AS `idEstabelecimento`,`tbl_promocao`.`desconto` AS `desconto`,`tbl_promocao`.`idPromocao` AS `idPromocao`,`tbl_produto`.`nomeProduto` AS `nomeProduto`,`tbl_promocao`.`visibilidade` AS `visibilidade` from (`tbl_produto` join `tbl_promocao` on((`tbl_promocao`.`idProduto` = `tbl_produto`.`idProduto`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-05-30 15:36:35
