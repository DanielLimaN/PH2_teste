/*
SQLyog Community v12.18 (64 bit)
MySQL - 10.0.23-MariaDB : Database - teste_ph2
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`teste_ph2` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `teste_ph2`;

/*Table structure for table `produtos` */

DROP TABLE IF EXISTS `produtos`;

CREATE TABLE `produtos` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Primary key da tabela',
  `codigo` int(11) NOT NULL DEFAULT '0' COMMENT 'Código de identificação do produto',
  `nome` varchar(100) NOT NULL COMMENT 'Nome de identificação do produto',
  `descricao` text NOT NULL COMMENT 'Descrição do produto',
  `composicao` text NOT NULL COMMENT 'Descrição do que o produto é composto',
  `conteudo_embalagem` text NOT NULL COMMENT 'Descrição do que está escrito na embalagem',
  `cor` varchar(7) DEFAULT 'Incolor' COMMENT 'Cor do produto (Hexadecimal)',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `produtos` */

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
