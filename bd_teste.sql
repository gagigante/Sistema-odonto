-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
-- Versão do servidor:           10.1.31-MariaDB - mariadb.org binary distribution
-- OS do Servidor:               Win32
-- HeidiSQL Versão:              10.1.0.5464
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Copiando estrutura do banco de dados para bd_teste
CREATE DATABASE IF NOT EXISTS `bd_teste` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `bd_teste`;

-- Copiando estrutura para tabela bd_teste.tb01_paciente
CREATE TABLE IF NOT EXISTS `tb01_paciente` (
  `tb01_nome` varchar(360) NOT NULL,
  `tb01_rg` varchar(360) NOT NULL,
  `tb01_cpf` varchar(360) NOT NULL,
  `tb01_telefone` varchar(360) NOT NULL,
  `tb01_email` varchar(360) NOT NULL,
  `tb01_data` varchar(360) NOT NULL,
  `tb01_imagem` varchar(500) DEFAULT 'patient-default-profile-image.png',
  `tb01_profissao` varchar(360) DEFAULT NULL,
  `tb01_endereco` varchar(360) DEFAULT NULL,
  `tb01_idpaciente` int(100) NOT NULL AUTO_INCREMENT,
  `tb01_idUsuario` int(100) NOT NULL,
  PRIMARY KEY (`tb01_idpaciente`)
) ENGINE=MyISAM AUTO_INCREMENT=80 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela bd_teste.tb01_paciente: 2 rows
/*!40000 ALTER TABLE `tb01_paciente` DISABLE KEYS */;
INSERT INTO `tb01_paciente` (`tb01_nome`, `tb01_rg`, `tb01_cpf`, `tb01_telefone`, `tb01_email`, `tb01_data`, `tb01_imagem`, `tb01_profissao`, `tb01_endereco`, `tb01_idpaciente`, `tb01_idUsuario`) VALUES
	('Kayky', '', '', '(11) 1 1111-1111', '', '16/07/2004', '05d8b32ffff9cd18d430e5d7ac6d4d66bruno.jpeg', '', 'Rua Calixto Finelli', 79, 1),
	('Gabriel Gigante', '54.994.390-0', '503.001.778-01', '(11) 9 6859-5762', 'gabriel_gigante@outlook.com', '1970-01-01', 'ab72cfd3bf2e9e3585172ad21652a1835723fab70e21634575011f03qr-635-gb-01-eps.jpeg', 'Programador', 'Rua Calixto Finelli', 78, 1);
/*!40000 ALTER TABLE `tb01_paciente` ENABLE KEYS */;

-- Copiando estrutura para tabela bd_teste.tb02_estoque
CREATE TABLE IF NOT EXISTS `tb02_estoque` (
  `tb02_produto` varchar(360) NOT NULL,
  `tb02_quantidade` int(100) NOT NULL,
  `tb02_preco` double NOT NULL,
  `tb02_idProduto` int(100) NOT NULL AUTO_INCREMENT,
  `tb02_idUsuario` int(11) NOT NULL,
  PRIMARY KEY (`tb02_idProduto`)
) ENGINE=MyISAM AUTO_INCREMENT=48 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela bd_teste.tb02_estoque: 3 rows
/*!40000 ALTER TABLE `tb02_estoque` DISABLE KEYS */;
INSERT INTO `tb02_estoque` (`tb02_produto`, `tb02_quantidade`, `tb02_preco`, `tb02_idProduto`, `tb02_idUsuario`) VALUES
	('produto1', 2, 60, 36, 2),
	('produto1', 3, 60, 46, 1),
	('tr', 12, 60, 45, 1);
/*!40000 ALTER TABLE `tb02_estoque` ENABLE KEYS */;

-- Copiando estrutura para tabela bd_teste.tb03_tratamentos
CREATE TABLE IF NOT EXISTS `tb03_tratamentos` (
  `tb03_nome` varchar(100) NOT NULL,
  `tb03_descricao` varchar(500) NOT NULL,
  `tb03_preco` double NOT NULL,
  `tb03_id` int(11) NOT NULL AUTO_INCREMENT,
  `tb03_idUsuario` int(100) NOT NULL,
  PRIMARY KEY (`tb03_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela bd_teste.tb03_tratamentos: ~4 rows (aproximadamente)
/*!40000 ALTER TABLE `tb03_tratamentos` DISABLE KEYS */;
INSERT INTO `tb03_tratamentos` (`tb03_nome`, `tb03_descricao`, `tb03_preco`, `tb03_id`, `tb03_idUsuario`) VALUES
	('editado', '111', 60, 2, 2),
	('Tratamento 2', 'descricao do tratamento 2', 80, 4, 1),
	('Tratamento 3', 'descricao do tratamento 3', 130, 5, 1),
	('tratamento 1', 'descricao do tratamento 1', 200, 6, 1);
/*!40000 ALTER TABLE `tb03_tratamentos` ENABLE KEYS */;

-- Copiando estrutura para tabela bd_teste.tb04_login
CREATE TABLE IF NOT EXISTS `tb04_login` (
  `tb04_id` int(11) NOT NULL AUTO_INCREMENT,
  `tb04_usuario` varchar(32) NOT NULL,
  `tb04_email` varchar(55) NOT NULL,
  `tb04_senha` varchar(32) NOT NULL,
  `tb04_reset_password` bit(1) NOT NULL DEFAULT b'0',
  PRIMARY KEY (`tb04_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela bd_teste.tb04_login: 2 rows
/*!40000 ALTER TABLE `tb04_login` DISABLE KEYS */;
INSERT INTO `tb04_login` (`tb04_id`, `tb04_usuario`, `tb04_email`, `tb04_senha`, `tb04_reset_password`) VALUES
	(1, 'user_admin', 'decadatech@gmail.com', '275f78b0da67df65db9336325c664de2', b'1'),
	(2, 'oto', '', '123', b'0');
/*!40000 ALTER TABLE `tb04_login` ENABLE KEYS */;

-- Copiando estrutura para tabela bd_teste.tb05_financeiro
CREATE TABLE IF NOT EXISTS `tb05_financeiro` (
  `tb05_nome` varchar(360) NOT NULL,
  `tb05_tipo` int(100) NOT NULL,
  `tb05_valor` double NOT NULL,
  `tb05_data` date NOT NULL,
  `tb05_situacao` int(100) NOT NULL,
  `tb05_idUsuario` int(100) NOT NULL,
  `tb05_idPaciente` int(100) DEFAULT NULL,
  `tb05_idItem` int(100) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`tb05_idItem`)
) ENGINE=MyISAM AUTO_INCREMENT=38 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela bd_teste.tb05_financeiro: 5 rows
/*!40000 ALTER TABLE `tb05_financeiro` DISABLE KEYS */;
INSERT INTO `tb05_financeiro` (`tb05_nome`, `tb05_tipo`, `tb05_valor`, `tb05_data`, `tb05_situacao`, `tb05_idUsuario`, `tb05_idPaciente`, `tb05_idItem`) VALUES
	('editado', 0, 60, '2019-12-30', 0, 1, NULL, 37),
	('editado', 1, 60, '1970-01-01', 0, 1, NULL, 36),
	('Gabriel Henrique Gigante da Silva', 1, 60, '2019-01-01', 0, 1, NULL, 35),
	('editado', 1, 60, '1970-01-01', 0, 1, NULL, 34),
	('editado', 1, 60, '2019-12-31', 0, 2, NULL, 33);
/*!40000 ALTER TABLE `tb05_financeiro` ENABLE KEYS */;

-- Copiando estrutura para tabela bd_teste.tb06_eventos
CREATE TABLE IF NOT EXISTS `tb06_eventos` (
  `tb06_idEvento` int(11) NOT NULL AUTO_INCREMENT,
  `tb06_idUsuario` int(11) NOT NULL,
  `tb06_nome` varchar(250) NOT NULL,
  `tb06_paciente` varchar(250) NOT NULL,
  `tb06_descricao` varchar(250) NOT NULL,
  `tb06_cor` varchar(50) NOT NULL,
  `tb06_inicio` datetime NOT NULL,
  `tb06_fim` datetime NOT NULL,
  PRIMARY KEY (`tb06_idEvento`)
) ENGINE=MyISAM AUTO_INCREMENT=75 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela bd_teste.tb06_eventos: 1 rows
/*!40000 ALTER TABLE `tb06_eventos` DISABLE KEYS */;
INSERT INTO `tb06_eventos` (`tb06_idEvento`, `tb06_idUsuario`, `tb06_nome`, `tb06_paciente`, `tb06_descricao`, `tb06_cor`, `tb06_inicio`, `tb06_fim`) VALUES
	(74, 1, 'Consulta - dr dioajdiajdijad', 'Gabriel Gigante', '', '#ffd700', '2020-01-20 08:45:00', '2020-01-20 09:00:00');
/*!40000 ALTER TABLE `tb06_eventos` ENABLE KEYS */;

-- Copiando estrutura para tabela bd_teste.tb07_consultas
CREATE TABLE IF NOT EXISTS `tb07_consultas` (
  `tb07_id` int(11) NOT NULL AUTO_INCREMENT,
  `tb07_id_paciente` int(11) NOT NULL,
  `tb07_id_dentista` int(11) NOT NULL,
  `tb07_id_usuario` int(11) NOT NULL,
  `tb07_descricao` varchar(50) NOT NULL,
  `tb07_valor` double NOT NULL,
  `tb07_status_pagamento` int(11) NOT NULL,
  `tb07_data` datetime NOT NULL,
  PRIMARY KEY (`tb07_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela bd_teste.tb07_consultas: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `tb07_consultas` DISABLE KEYS */;
/*!40000 ALTER TABLE `tb07_consultas` ENABLE KEYS */;

-- Copiando estrutura para tabela bd_teste.tb08_tratamentos_consulta
CREATE TABLE IF NOT EXISTS `tb08_tratamentos_consulta` (
  `tb08_id` int(11) NOT NULL AUTO_INCREMENT,
  `tb08_id_consulta` int(11) NOT NULL,
  `tb08_id_tratamento` int(11) NOT NULL,
  PRIMARY KEY (`tb08_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela bd_teste.tb08_tratamentos_consulta: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `tb08_tratamentos_consulta` DISABLE KEYS */;
/*!40000 ALTER TABLE `tb08_tratamentos_consulta` ENABLE KEYS */;

-- Copiando estrutura para tabela bd_teste.tb09_dentistas
CREATE TABLE IF NOT EXISTS `tb09_dentistas` (
  `tb09_id` int(11) NOT NULL AUTO_INCREMENT,
  `tb09_nome` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`tb09_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela bd_teste.tb09_dentistas: ~1 rows (aproximadamente)
/*!40000 ALTER TABLE `tb09_dentistas` DISABLE KEYS */;
INSERT INTO `tb09_dentistas` (`tb09_id`, `tb09_nome`) VALUES
	(2, 'Gabriel');
/*!40000 ALTER TABLE `tb09_dentistas` ENABLE KEYS */;

-- Copiando estrutura para tabela bd_teste.tb10_imagens_paciente
CREATE TABLE IF NOT EXISTS `tb10_imagens_paciente` (
  `tb10_id` int(11) NOT NULL AUTO_INCREMENT,
  `tb10_id_paciente` int(11) DEFAULT NULL,
  `tb10_imagem` varchar(500) DEFAULT NULL,
  `tb10_id_usuario` int(11) DEFAULT NULL,
  PRIMARY KEY (`tb10_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela bd_teste.tb10_imagens_paciente: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `tb10_imagens_paciente` DISABLE KEYS */;
/*!40000 ALTER TABLE `tb10_imagens_paciente` ENABLE KEYS */;

-- Copiando estrutura para tabela bd_teste.tb11_documentos_paciente
CREATE TABLE IF NOT EXISTS `tb11_documentos_paciente` (
  `tb11_id` int(11) NOT NULL AUTO_INCREMENT,
  `tb11_id_paciente` int(11) NOT NULL,
  `tb11_documento` varchar(500) NOT NULL,
  `tb11_nome` varchar(100) NOT NULL,
  `tb11_extensao` varchar(100) NOT NULL,
  `tb11_id_usuario` int(11) NOT NULL,
  PRIMARY KEY (`tb11_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela bd_teste.tb11_documentos_paciente: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `tb11_documentos_paciente` DISABLE KEYS */;
/*!40000 ALTER TABLE `tb11_documentos_paciente` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
