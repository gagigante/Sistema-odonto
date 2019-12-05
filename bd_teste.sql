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
  `tb01_imagem` varchar(360) DEFAULT 'patient-default-profile-image.png',
  `tb01_proficao` varchar(360) DEFAULT NULL,
  `tb01_endereco` varchar(360) DEFAULT NULL,
  `tb01_idpaciente` int(100) NOT NULL AUTO_INCREMENT,
  `tb01_idUsuario` int(100) NOT NULL,
  PRIMARY KEY (`tb01_idpaciente`)
) ENGINE=MyISAM AUTO_INCREMENT=71 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela bd_teste.tb01_paciente: 3 rows
/*!40000 ALTER TABLE `tb01_paciente` DISABLE KEYS */;
INSERT INTO `tb01_paciente` (`tb01_nome`, `tb01_rg`, `tb01_cpf`, `tb01_telefone`, `tb01_email`, `tb01_data`, `tb01_imagem`, `tb01_proficao`, `tb01_endereco`, `tb01_idpaciente`, `tb01_idUsuario`) VALUES
	('dad', '', '', '(11) 1 1111-1111', '', '26/12/2019', '20d7ec614f9ebdb74d27c47ef431fb07Wallpaper OmniStack - 1440x900.png', '', 'dadad', 70, 1),
	('gabriel', '', '', '(33) 3 3333-3333', '', '29/05/2001', '85e4b33822fba96dc8f3f77116265f05bb4744f30c13ba63bf1c10f620cfa550.jpg', '', 'endereco', 69, 1);
/*!40000 ALTER TABLE `tb01_paciente` ENABLE KEYS */;

-- Copiando estrutura para tabela bd_teste.tb02_estoque
CREATE TABLE IF NOT EXISTS `tb02_estoque` (
  `tb02_produto` varchar(360) NOT NULL,
  `tb02_quantidade` int(100) NOT NULL,
  `tb02_preco` double NOT NULL,
  `tb02_idProduto` int(100) NOT NULL AUTO_INCREMENT,
  `tb02_idUsuario` int(11) NOT NULL,
  PRIMARY KEY (`tb02_idProduto`)
) ENGINE=MyISAM AUTO_INCREMENT=37 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela bd_teste.tb02_estoque: 1 rows
/*!40000 ALTER TABLE `tb02_estoque` DISABLE KEYS */;
INSERT INTO `tb02_estoque` (`tb02_produto`, `tb02_quantidade`, `tb02_preco`, `tb02_idProduto`, `tb02_idUsuario`) VALUES
	('produto1', 2, 60, 36, 2);
/*!40000 ALTER TABLE `tb02_estoque` ENABLE KEYS */;

-- Copiando estrutura para tabela bd_teste.tb03_tratamentos
CREATE TABLE IF NOT EXISTS `tb03_tratamentos` (
  `tb03_nome` varchar(100) NOT NULL,
  `tb03_descricao` varchar(500) NOT NULL,
  `tb03_preco` double NOT NULL,
  `tb03_id` int(11) NOT NULL AUTO_INCREMENT,
  `tb03_idUsuario` int(100) NOT NULL,
  PRIMARY KEY (`tb03_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela bd_teste.tb03_tratamentos: ~1 rows (aproximadamente)
/*!40000 ALTER TABLE `tb03_tratamentos` DISABLE KEYS */;
INSERT INTO `tb03_tratamentos` (`tb03_nome`, `tb03_descricao`, `tb03_preco`, `tb03_id`, `tb03_idUsuario`) VALUES
	('editado', '111', 60, 2, 2);
/*!40000 ALTER TABLE `tb03_tratamentos` ENABLE KEYS */;

-- Copiando estrutura para tabela bd_teste.tb04_login
CREATE TABLE IF NOT EXISTS `tb04_login` (
  `tb04_login` varchar(360) NOT NULL,
  `tb04_senha` varchar(360) NOT NULL,
  `tb04_idLogin` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`tb04_idLogin`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela bd_teste.tb04_login: 2 rows
/*!40000 ALTER TABLE `tb04_login` DISABLE KEYS */;
INSERT INTO `tb04_login` (`tb04_login`, `tb04_senha`, `tb04_idLogin`) VALUES
	('ga', '123', 1),
	('oto', '123', 2);
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
) ENGINE=MyISAM AUTO_INCREMENT=70 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela bd_teste.tb06_eventos: 22 rows
/*!40000 ALTER TABLE `tb06_eventos` DISABLE KEYS */;
INSERT INTO `tb06_eventos` (`tb06_idEvento`, `tb06_idUsuario`, `tb06_nome`, `tb06_paciente`, `tb06_descricao`, `tb06_cor`, `tb06_inicio`, `tb06_fim`) VALUES
	(56, 1, 'dadada', 'GABRIEL SOUZA PEREIRA', 'adada', '#b5b5b5', '2019-11-13 10:00:00', '2019-11-13 10:15:00'),
	(54, 1, 'adada', 'GABRIEL SOUZA PEREIRA', 'ddd', '#ff6363', '2019-11-14 08:15:00', '2019-11-14 08:45:00'),
	(55, 1, 'dadad', 'GABRIEL SOUZA PEREIRA', 'adada', '#91f291', '2019-11-13 09:15:00', '2019-11-13 09:30:00'),
	(53, 1, 'ddada', 'GABRIEL SOUZA PEREIRA', 'addaw', '#ffd700', '2019-11-11 07:15:00', '2019-11-11 07:30:00'),
	(52, 1, 'dadad', 'GABRIEL SOUZA PEREIRA', 'dadad', '#ffd700', '2019-11-11 08:30:00', '2019-11-11 08:45:00'),
	(51, 1, 'adad', 'editado', 'adadd', '#c982f5', '2019-11-11 07:45:00', '2019-11-11 08:00:00'),
	(50, 1, 'adada', 'GABRIEL SOUZA PEREIRA', 'dadadd', '#40e0d0', '2019-11-13 07:30:00', '2019-11-13 07:45:00'),
	(49, 1, 'adada', 'GABRIEL SOUZA PEREIRA', 'gafad', '#91f291', '2019-11-13 11:30:00', '2019-11-13 12:30:00'),
	(46, 1, 'dadad', 'GABRIEL SOUZA PEREIRA', 'adawdad', '#ffd700', '2019-11-18 09:00:00', '2019-11-18 10:00:00'),
	(57, 1, 'adada', 'editado', '', '#ffd700', '2019-11-11 09:00:00', '2019-11-11 09:30:00'),
	(58, 1, 'dawda', 'GABRIEL SOUZA PEREIRA', 'addawd', '#91f291', '2019-11-12 08:00:00', '2019-11-12 08:15:00'),
	(59, 1, 'dadwa', 'GABRIEL SOUZA PEREIRA', 'awdad', '#40e0d0', '2019-11-12 09:30:00', '2019-11-12 09:45:00'),
	(60, 1, 'adwd', 'GABRIEL SOUZA PEREIRA', 'awdadaw', '#b5b5b5', '2019-11-12 08:45:00', '2019-11-12 09:00:00'),
	(61, 1, 'afgafaw', 'editado', 'fafafa', '#ffd700', '2019-11-14 08:00:00', '2019-11-14 08:30:00'),
	(62, 1, 'dadadad', 'GABRIEL SOUZA PEREIRA', 'adadad', '#ffd700', '2019-11-12 10:15:00', '2019-11-12 10:30:00'),
	(63, 1, 'dadada', 'editado', 'awdad', '#ffd700', '2019-11-11 10:15:00', '2019-11-11 10:30:00'),
	(64, 1, 'dadad', 'editado', 'dadawd', '#ffd700', '2019-11-12 07:30:00', '2019-11-12 07:45:00'),
	(65, 1, 'adada', 'editado', 'adad', '#ffd700', '2019-11-14 09:00:00', '2019-11-14 09:15:00'),
	(66, 1, 'adada', 'editado', 'dadadd', '#ffd700', '2019-11-13 08:45:00', '2019-11-13 09:00:00'),
	(67, 1, 'dadad', 'editado', 'adada', '#ffd700', '2019-11-14 09:30:00', '2019-11-14 09:45:00'),
	(68, 1, 'adada', 'GABRIEL SOUZA PEREIRA', 'dawdada', '#b5b5b5', '2019-11-26 08:00:00', '2019-11-26 09:00:00'),
	(69, 1, 'adada', 'Gabriel Henrique Gigante da Silva', 'dadada', '#ffd700', '2019-12-02 09:15:00', '2019-12-02 09:30:00');
/*!40000 ALTER TABLE `tb06_eventos` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
