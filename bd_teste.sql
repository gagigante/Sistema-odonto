-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: 10-Out-2019 às 20:38
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
  PRIMARY KEY (`tb01_idpaciente`)
) ENGINE=MyISAM AUTO_INCREMENT=50 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb01_paciente`
--

INSERT INTO `tb01_paciente` (`tb01_nome`, `tb01_rg`, `tb01_cpf`, `tb01_telefone`, `tb01_email`, `tb01_data`, `tb01_imagem`, `tb01_idpaciente`) VALUES
('Ga', '32.131.2', '501.337.338-74', '(11) 9 7528-9350', 'gabrielspereira2604@gmail.com', '22/22/2222', 'team1.jpg', 47),
('GABRIEL HENRIQUE', '32.131.232-13', '321.321.321-32', '(31) 2 3123-1232', 'gabrielspereira2604@gmail.com', '21/32/2132', 'team2.jpg', 48),
('dsads', '32.131.231-23', '312.321.321-31', '(32) 1 3123-1232', 'gabrielspereira2604@gmail.com', '31/23/1321', 'team3.jpg', 49);

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
  PRIMARY KEY (`tb02_idProduto`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb02_estoque`
--

INSERT INTO `tb02_estoque` (`tb02_produto`, `tb02_quantidade`, `tb02_preco`, `tb02_idProduto`) VALUES
('Fio Dental', 3, 13.4, 5);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
