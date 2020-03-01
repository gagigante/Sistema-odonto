-- --------------------------------------------------------
-- Servidor:                     localhost
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

-- Copiando estrutura para tabela bd_teste.tb01_pacientes
CREATE TABLE IF NOT EXISTS `tb01_pacientes` (
  `tb01_id` int(11) NOT NULL AUTO_INCREMENT,
  `tb01_id_usuario` int(11) NOT NULL,
  `tb01_nome` varchar(50) NOT NULL,
  `tb01_rg` varchar(50) DEFAULT NULL,
  `tb01_cpf` varchar(50) DEFAULT NULL,
  `tb01_telefone` varchar(50) NOT NULL,
  `tb01_email` varchar(50) DEFAULT NULL,
  `tb01_data_nascimento` date DEFAULT NULL,
  `tb01_imagem` varchar(50) DEFAULT 'patient-default-profile-image.png',
  `tb01_profissao` varchar(50) DEFAULT NULL,
  `tb01_endereco` varchar(50) NOT NULL,
  PRIMARY KEY (`tb01_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

-- Copiando dados para a tabela bd_teste.tb01_pacientes: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `tb01_pacientes` DISABLE KEYS */;
/*!40000 ALTER TABLE `tb01_pacientes` ENABLE KEYS */;

-- Copiando estrutura para tabela bd_teste.tb02_estoque
CREATE TABLE IF NOT EXISTS `tb02_estoque` (
  `tb02_id` int(11) NOT NULL AUTO_INCREMENT,
  `tb02_id_usuario` int(11) NOT NULL,
  `tb02_produto` varchar(50) NOT NULL,
  `tb02_quantidade` int(11) NOT NULL,
  `tb02_preco` double NOT NULL,
  PRIMARY KEY (`tb02_id`),
  KEY `FK_tb02_estoque_tb04_usuarios` (`tb02_id_usuario`),
  CONSTRAINT `FK_tb02_estoque_tb04_usuarios` FOREIGN KEY (`tb02_id_usuario`) REFERENCES `tb04_usuarios` (`tb04_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

-- Copiando dados para a tabela bd_teste.tb02_estoque: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `tb02_estoque` DISABLE KEYS */;
/*!40000 ALTER TABLE `tb02_estoque` ENABLE KEYS */;

-- Copiando estrutura para tabela bd_teste.tb03_tratamentos
CREATE TABLE IF NOT EXISTS `tb03_tratamentos` (
  `tb03_id` int(11) NOT NULL AUTO_INCREMENT,
  `tb03_id_usuario` int(11) NOT NULL,
  `tb03_nome` varchar(100) NOT NULL,
  `tb03_descricao` varchar(500) NOT NULL,
  `tb03_preco` double NOT NULL,
  PRIMARY KEY (`tb03_id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela bd_teste.tb03_tratamentos: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `tb03_tratamentos` DISABLE KEYS */;
/*!40000 ALTER TABLE `tb03_tratamentos` ENABLE KEYS */;

-- Copiando estrutura para tabela bd_teste.tb04_usuarios
CREATE TABLE IF NOT EXISTS `tb04_usuarios` (
  `tb04_id` int(11) NOT NULL AUTO_INCREMENT,
  `tb04_usuario` varchar(50) NOT NULL,
  `tb04_email` varchar(50) NOT NULL,
  `tb04_senha` varchar(50) NOT NULL,
  `tb04_reset_password` bit(1) NOT NULL DEFAULT b'0',
  PRIMARY KEY (`tb04_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

-- Copiando dados para a tabela bd_teste.tb04_usuarios: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `tb04_usuarios` DISABLE KEYS */;
/*!40000 ALTER TABLE `tb04_usuarios` ENABLE KEYS */;

-- Copiando estrutura para tabela bd_teste.tb05_financeiro
CREATE TABLE IF NOT EXISTS `tb05_financeiro` (
  `tb05_id` int(11) NOT NULL AUTO_INCREMENT,
  `tb05_id_usuario` int(11) NOT NULL DEFAULT '0',
  `tb05_id_consulta` int(11) DEFAULT NULL,
  `tb05_nome` varchar(50) NOT NULL,
  `tb05_tipo` tinyint(4) NOT NULL,
  `tb05_valor` double NOT NULL,
  `tb05_data` date NOT NULL,
  PRIMARY KEY (`tb05_id`),
  KEY `FK_tb05_financeiro_tb04_usuarios` (`tb05_id_usuario`),
  KEY `FK_tb05_financeiro_tb07_consultas` (`tb05_id_consulta`),
  CONSTRAINT `FK_tb05_financeiro_tb04_usuarios` FOREIGN KEY (`tb05_id_usuario`) REFERENCES `tb04_usuarios` (`tb04_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_tb05_financeiro_tb07_consultas` FOREIGN KEY (`tb05_id_consulta`) REFERENCES `tb07_consultas` (`tb07_id`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4;

-- Copiando dados para a tabela bd_teste.tb05_financeiro: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `tb05_financeiro` DISABLE KEYS */;
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
) ENGINE=MyISAM AUTO_INCREMENT=77 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela bd_teste.tb06_eventos: 0 rows
/*!40000 ALTER TABLE `tb06_eventos` DISABLE KEYS */;
/*!40000 ALTER TABLE `tb06_eventos` ENABLE KEYS */;

-- Copiando estrutura para tabela bd_teste.tb07_consultas
CREATE TABLE IF NOT EXISTS `tb07_consultas` (
  `tb07_id` int(11) NOT NULL AUTO_INCREMENT,
  `tb07_id_usuario` int(11) NOT NULL,
  `tb07_id_paciente` int(11) NOT NULL,
  `tb07_id_dentista` int(11) NOT NULL,
  `tb07_descricao` varchar(500) NOT NULL,
  `tb07_valor` double NOT NULL,
  `tb07_valor_desconto` double NOT NULL,
  `tb07_desconto` double NOT NULL,
  `tb07_valor_pago` double NOT NULL DEFAULT '0',
  `tb07_status_pagamento` int(11) NOT NULL,
  `tb07_data_consulta` datetime NOT NULL,
  PRIMARY KEY (`tb07_id`),
  KEY `FK_tb07_consultas_tb09_dentistas` (`tb07_id_dentista`),
  KEY `FK_tb07_consultas_tb01_pacientes` (`tb07_id_paciente`),
  KEY `FK_tb07_consultas_tb04_usuarios` (`tb07_id_usuario`),
  CONSTRAINT `FK_tb07_consultas_tb01_pacientes` FOREIGN KEY (`tb07_id_paciente`) REFERENCES `tb01_pacientes` (`tb01_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_tb07_consultas_tb04_usuarios` FOREIGN KEY (`tb07_id_usuario`) REFERENCES `tb04_usuarios` (`tb04_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_tb07_consultas_tb09_dentistas` FOREIGN KEY (`tb07_id_dentista`) REFERENCES `tb09_dentistas` (`tb09_id`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela bd_teste.tb07_consultas: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `tb07_consultas` DISABLE KEYS */;
/*!40000 ALTER TABLE `tb07_consultas` ENABLE KEYS */;

-- Copiando estrutura para tabela bd_teste.tb08_tratamentos_consulta
CREATE TABLE IF NOT EXISTS `tb08_tratamentos_consulta` (
  `tb08_id` int(11) NOT NULL AUTO_INCREMENT,
  `tb08_id_consulta` int(11) NOT NULL,
  `tb08_id_tratamento` int(11) NOT NULL,
  PRIMARY KEY (`tb08_id`),
  KEY `FK_tb08_tratamentos_consulta_tb07_consultas` (`tb08_id_consulta`),
  KEY `FK_tb08_tratamentos_consulta_tb03_tratamentos` (`tb08_id_tratamento`),
  CONSTRAINT `FK_tb08_tratamentos_consulta_tb03_tratamentos` FOREIGN KEY (`tb08_id_tratamento`) REFERENCES `tb03_tratamentos` (`tb03_id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  CONSTRAINT `FK_tb08_tratamentos_consulta_tb07_consultas` FOREIGN KEY (`tb08_id_consulta`) REFERENCES `tb07_consultas` (`tb07_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela bd_teste.tb08_tratamentos_consulta: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `tb08_tratamentos_consulta` DISABLE KEYS */;
/*!40000 ALTER TABLE `tb08_tratamentos_consulta` ENABLE KEYS */;

-- Copiando estrutura para tabela bd_teste.tb09_dentistas
CREATE TABLE IF NOT EXISTS `tb09_dentistas` (
  `tb09_id` int(11) NOT NULL AUTO_INCREMENT,
  `tb09_id_perfil` int(11) NOT NULL,
  `tb09_nome` varchar(50) NOT NULL,
  PRIMARY KEY (`tb09_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela bd_teste.tb09_dentistas: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `tb09_dentistas` DISABLE KEYS */;
/*!40000 ALTER TABLE `tb09_dentistas` ENABLE KEYS */;

-- Copiando estrutura para tabela bd_teste.tb10_imagens_paciente
CREATE TABLE IF NOT EXISTS `tb10_imagens_paciente` (
  `tb10_id` int(11) NOT NULL AUTO_INCREMENT,
  `tb10_id_paciente` int(11) NOT NULL,
  `tb10_id_usuario` int(11) NOT NULL,
  `tb10_imagem` varchar(500) NOT NULL,
  PRIMARY KEY (`tb10_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela bd_teste.tb10_imagens_paciente: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `tb10_imagens_paciente` DISABLE KEYS */;
/*!40000 ALTER TABLE `tb10_imagens_paciente` ENABLE KEYS */;

-- Copiando estrutura para tabela bd_teste.tb11_documentos_paciente
CREATE TABLE IF NOT EXISTS `tb11_documentos_paciente` (
  `tb11_id` int(11) NOT NULL AUTO_INCREMENT,
  `tb11_id_paciente` int(11) NOT NULL,
  `tb11_id_usuario` int(11) NOT NULL,
  `tb11_documento` varchar(500) NOT NULL,
  `tb11_nome` varchar(100) NOT NULL,
  `tb11_extensao` varchar(100) NOT NULL,
  PRIMARY KEY (`tb11_id`),
  KEY `FK_tb11_documentos_paciente_tb01_pacientes` (`tb11_id_paciente`),
  CONSTRAINT `FK_tb11_documentos_paciente_tb01_pacientes` FOREIGN KEY (`tb11_id_paciente`) REFERENCES `tb01_pacientes` (`tb01_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela bd_teste.tb11_documentos_paciente: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `tb11_documentos_paciente` DISABLE KEYS */;
/*!40000 ALTER TABLE `tb11_documentos_paciente` ENABLE KEYS */;

-- Copiando estrutura para tabela bd_teste.tb12_perfis
CREATE TABLE IF NOT EXISTS `tb12_perfis` (
  `tb12_id` int(11) NOT NULL AUTO_INCREMENT,
  `tb12_id_usuario` int(11) NOT NULL,
  PRIMARY KEY (`tb12_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela bd_teste.tb12_perfis: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `tb12_perfis` DISABLE KEYS */;
/*!40000 ALTER TABLE `tb12_perfis` ENABLE KEYS */;

-- Copiando estrutura para tabela bd_teste.tb13_movimentacoes_consulta
CREATE TABLE IF NOT EXISTS `tb13_movimentacoes_consulta` (
  `tb13_id` int(11) NOT NULL AUTO_INCREMENT,
  `tb13_id_consulta` int(11) NOT NULL,
  `tb13_valor` double NOT NULL,
  `tb13_forma_pagamento` varchar(50) NOT NULL,
  `tb13_data_pagamento` date NOT NULL,
  PRIMARY KEY (`tb13_id`),
  KEY `FK_tb13_movimentacoes_consulta_tb07_consultas` (`tb13_id_consulta`),
  CONSTRAINT `FK_tb13_movimentacoes_consulta_tb07_consultas` FOREIGN KEY (`tb13_id_consulta`) REFERENCES `tb07_consultas` (`tb07_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela bd_teste.tb13_movimentacoes_consulta: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `tb13_movimentacoes_consulta` DISABLE KEYS */;
/*!40000 ALTER TABLE `tb13_movimentacoes_consulta` ENABLE KEYS */;

-- Copiando estrutura para tabela bd_teste.tb14_estoque_consulta
CREATE TABLE IF NOT EXISTS `tb14_estoque_consulta` (
  `tb14_id` int(11) NOT NULL AUTO_INCREMENT,
  `tb14_id_consulta` int(11) NOT NULL,
  `tb14_item_id` int(11) NOT NULL,
  PRIMARY KEY (`tb14_id`),
  KEY `FK_tb14_estoque_consulta_tb07_consultas` (`tb14_id_consulta`),
  KEY `FK_tb14_estoque_consulta_tb02_estoque` (`tb14_item_id`),
  CONSTRAINT `FK_tb14_estoque_consulta_tb02_estoque` FOREIGN KEY (`tb14_item_id`) REFERENCES `tb02_estoque` (`tb02_id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  CONSTRAINT `FK_tb14_estoque_consulta_tb07_consultas` FOREIGN KEY (`tb14_id_consulta`) REFERENCES `tb07_consultas` (`tb07_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela bd_teste.tb14_estoque_consulta: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `tb14_estoque_consulta` DISABLE KEYS */;
/*!40000 ALTER TABLE `tb14_estoque_consulta` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
