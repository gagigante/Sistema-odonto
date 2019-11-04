-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: 31-Out-2019 às 18:12
-- Versão do servidor: 5.7.21
-- PHP Version: 5.6.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bd_teste`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb01_paciente`
--

DROP TABLE IF EXISTS `tb01_paciente`;
CREATE TABLE IF NOT EXISTS `tb01_paciente` (
  `tb01_nome` varchar(360) NOT NULL,
  `tb01_rg` varchar(360) NOT NULL,
  `tb01_cpf` varchar(360) NOT NULL,
  `tb01_telefone` varchar(360) NOT NULL,
  `tb01_email` varchar(360) NOT NULL,
  `tb01_data` varchar(360) NOT NULL,
  `tb01_imagem` varchar(360) DEFAULT NULL,
  `tb01_idpaciente` int(100) NOT NULL AUTO_INCREMENT,
  `tb01_idUsuario` int(100) NOT NULL,
  PRIMARY KEY (`tb01_idpaciente`)
) ENGINE=MyISAM AUTO_INCREMENT=57 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb01_paciente`
--

INSERT INTO `tb01_paciente` (`tb01_nome`, `tb01_rg`, `tb01_cpf`, `tb01_telefone`, `tb01_email`, `tb01_data`, `tb01_imagem`, `tb01_idpaciente`, `tb01_idUsuario`) VALUES
('GABRIEL SOUZA PEREIRA', '59.024.292-1', '501.337.338-74', '(11) 9 7528-9350', 'gabrielspereira2604@gmail.com', '23/21/3213', 'novoDamarelo.png', 55, 1),
('a', '32.1', '321.32', '(31) 2', 'g@g', '32/1', NULL, 56, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb02_estoque`
--

DROP TABLE IF EXISTS `tb02_estoque`;
CREATE TABLE IF NOT EXISTS `tb02_estoque` (
  `tb02_produto` varchar(360) NOT NULL,
  `tb02_quantidade` int(100) NOT NULL,
  `tb02_preco` double NOT NULL,
  `tb02_idProduto` int(100) NOT NULL AUTO_INCREMENT,
  `tb02_idUsuario` int(11) NOT NULL,
  PRIMARY KEY (`tb02_idProduto`)
) ENGINE=MyISAM AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb02_estoque`
--

INSERT INTO `tb02_estoque` (`tb02_produto`, `tb02_quantidade`, `tb02_preco`, `tb02_idProduto`, `tb02_idUsuario`) VALUES
('ga', 123, 321, 20, 1),
('faa', 321, 321, 21, 2),
('ga', 1, 2, 22, 3),
('Fio Dental', 111432, 321, 23, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb03_tratamentos`
--

DROP TABLE IF EXISTS `tb03_tratamentos`;
CREATE TABLE IF NOT EXISTS `tb03_tratamentos` (
  `tb03_nome` varchar(100) NOT NULL,
  `tb03_descricao` varchar(500) NOT NULL,
  `tb03_preco` double NOT NULL,
  `tb03_id` int(11) NOT NULL AUTO_INCREMENT,
  `tb03_idUsuario` int(100) NOT NULL,
  PRIMARY KEY (`tb03_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb03_tratamentos`
--

INSERT INTO `tb03_tratamentos` (`tb03_nome`, `tb03_descricao`, `tb03_preco`, `tb03_id`, `tb03_idUsuario`) VALUES
('GABRIEL SOUZA PEREIRA', 'Haras', 321, 10, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb04_login`
--

DROP TABLE IF EXISTS `tb04_login`;
CREATE TABLE IF NOT EXISTS `tb04_login` (
  `tb04_login` varchar(360) NOT NULL,
  `tb04_senha` varchar(360) NOT NULL,
  `tb04_idLogin` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`tb04_idLogin`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb04_login`
--

INSERT INTO `tb04_login` (`tb04_login`, `tb04_senha`, `tb04_idLogin`) VALUES
('ga', '123', 1),
('oto', '123', 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb05_financeiro`
--

DROP TABLE IF EXISTS `tb05_financeiro`;
CREATE TABLE IF NOT EXISTS `tb05_financeiro` (
  `tb05_nome` varchar(360) NOT NULL,
  `tb05_tipo` int(100) NOT NULL,
  `tb05_valor` double NOT NULL,
  `tb05_data` varchar(360) NOT NULL,
  `tb05_situacao` int(100) NOT NULL,
  `tb05_idUsuario` int(100) NOT NULL,
  `tb05_idPaciente` int(100) DEFAULT NULL,
  `tb05_idItem` int(100) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`tb05_idItem`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb05_financeiro`
--

INSERT INTO `tb05_financeiro` (`tb05_nome`, `tb05_tipo`, `tb05_valor`, `tb05_data`, `tb05_situacao`, `tb05_idUsuario`, `tb05_idPaciente`, `tb05_idItem`) VALUES
('ga', 1, 312, '11/13/2019', 0, 1, NULL, 3),
('ga', 1, 312, '11/13/2019', 0, 1, NULL, 4),
('dsa', 1, 21, '11/27/2019', 0, 1, NULL, 5),
('adas', 0, 321, '11/02/2019', 0, 1, NULL, 6);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
