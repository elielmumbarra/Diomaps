-- Dump ajustado para importação via HeidiSQL/MariaDB
-- Data: 2026-01-13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";
SET NAMES utf8mb4;
SET collation_connection = 'utf8mb4_unicode_ci';
SET FOREIGN_KEY_CHECKS=0;

DROP DATABASE IF EXISTS `diomaps`;
CREATE DATABASE IF NOT EXISTS `diomaps` CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE `diomaps`;

-- Tabela: bairros
CREATE TABLE `bairros` (
  `idbairro` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(30) NOT NULL,
  PRIMARY KEY (`idbairro`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Tabela: tiposdelixo
CREATE TABLE `tiposdelixo` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Tabela: noticia
CREATE TABLE `noticia` (
  `titulo` VARCHAR(30) NOT NULL,
  `datanoticia` DATE NOT NULL,
  `escritor` VARCHAR(30) NOT NULL,
  `descricao` VARCHAR(30) NOT NULL,
  `imagem` VARCHAR(30) NOT NULL,
  `descricaoimagem` VARCHAR(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Tabela: usuario (FKs serão adicionadas após inserts)
CREATE TABLE `usuario` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(60) NOT NULL,
  `email` VARCHAR(50) NOT NULL,
  `senha` VARCHAR(1000) NOT NULL,
  `cep` VARCHAR(20) NOT NULL,
  `endereco` VARCHAR(30) NOT NULL,
  `bairro` INT(11) UNSIGNED NOT NULL,
  `telefone` VARCHAR(100) NOT NULL,
  `lixo` INT(11) UNSIGNED NOT NULL,
  `imagem` VARCHAR(30) DEFAULT NULL,
  `nivel` VARCHAR(10) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idx_usuario_lixo` (`lixo`),
  KEY `idx_usuario_bairro` (`bairro`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dados: bairros
INSERT INTO `bairros` (`idbairro`, `nome`) VALUES
(1, 'Cidade São Pedro'),
(2, 'Centro'),
(3, 'Fazendinha'),
(4, 'Cururuquara'),
(5, 'Recanto Maravilha 3'),
(6, 'Colinas da Anhanguera'),
(7, 'Parque Santana II'),
(8, '120'),
(9, 'Jardim Isaura'),
(10, 'Jabuticabeiras'),
(11, 'Jardim São Luiz'),
(12, 'Recanto Silvestre'),
(13, 'Vila Sabrina'),
(14, 'Parque Santana'),
(15, 'Vila Maria Nazaré'),
(16, 'Jarim São Luiz'),
(17, 'Varzea dos Souzas'),
(18, 'Tambore Polo Residencial'),
(19, 'Alphaville'),
(20, 'Jardim Professor Benoa'),
(21, 'Vila Velha'),
(22, 'Chácara do Solar II'),
(23, 'Vila Maclape'),
(24, 'Jardim Silvio'),
(25, 'Chácara do Solar I'),
(26, 'Jardim Frediani'),
(27, 'Jardim Bandeirantes'),
(28, 'Itaim Mirim'),
(29, 'Refugio dos Bandeirantes'),
(30, 'Jaguari'),
(31, 'Parque Alvorada'),
(32, 'Aldeia da Serra'),
(33, 'Vila Poupanca'),
(34, 'Recanto Pereira'),
(35, 'Sitio do Rosario'),
(36, 'Jardim do Luar'),
(37, 'Jardim Itapua'),
(38, 'Germano'),
(39, 'Suru');

-- Dados: tiposdelixo
INSERT INTO `tiposdelixo` (`id`, `nome`) VALUES
(1, 'Orgânico'),
(2, 'Papel'),
(3, 'Plastico'),
(4, 'Metal'),
(5, 'Vidro');

-- Dados: usuario
INSERT INTO `usuario` (`id`, `nome`, `email`, `senha`, `cep`, `endereco`, `bairro`, `telefone`, `lixo`, `nivel`) VALUES
(1, 'Guilherme', 'guilhermeadm@gmail.com', '$2y$10$8RzntB85TMxVyDZXHplW6eqK.kHnM8b7WKX6KrvzqQ0t9Nm6Ek0ga', '4636709', 'rua manuel martins 11', 6, '2147483647', 1, 'adm'),
(2, 'Eliel', 'elieladm@gmail.com', '$2y$10$8RzntB85TMxVyDZXHplW6eqK.kHnM8b7WKX6KrvzqQ0t9Nm6Ek0ga', '4636709', 'rua manuel martins 11', 6, '2147483647', 1, 'adm'),
(3, 'Bruna', 'brunaadm@gmail.com', '$2y$10$8RzntB85TMxVyDZXHplW6eqK.kHnM8b7WKX6KrvzqQ0t9Nm6Ek0ga', '4636709', 'rua manuel martins 11', 6, '2147483647', 1, 'adm'),
(4, 'Eco Ponto Avemare', 'posto1@gmail.com', '$2y$10$KWs6oS/shpTfWMEDqBW5G.BBE1fD9Zc0mFdLTk622NrX366Q5rpaa', '06515005', 'R. das Bananeiras, 909', 14, '000000000', 1, NULL),
(5, 'Reciclagem Ribeiro', 'posto2@gmail.com', '$2y$10$KWs6oS/shpTfWMEDqBW5G.BBE1fD9Zc0mFdLTk622NrX366Q5rpaa', '06535001', 'Av. Jaguarí, 406', 1, '11963527703', 4, NULL),
(6, 'Recomplast', 'posto3@gmail.com', '$2y$10$KWs6oS/shpTfWMEDqBW5G.BBE1fD9Zc0mFdLTk622NrX366Q5rpaa', '06529220', 'R. Guanabara, 245', 3, '1139283322', 3, NULL),
(7, 'Rottami Reciclagem', 'posto4@gmail.com', '$2y$10$KWs6oS/shpTfWMEDqBW5G.BBE1fD9Zc0mFdLTk622NrX366Q5rpaa', '06513100', 'R. Vereda Tropical, 98', 25, '1130900749', 4, NULL),
(8, 'Ecológico Sucata', 'posto5@gmail.com', '$2y$10$KWs6oS/shpTfWMEDqBW5G.BBE1fD9Zc0mFdLTk622NrX366Q5rpaa', '06535090', 'R. Alfeu de Oliveira, 305', 1, '11998787794', 4, NULL),
(9, 'Recicladora Plástico Bianch Ind Com', 'posto6@gmail.com', '$2y$10$KWs6oS/shpTfWMEDqBW5G.BBE1fD9Zc0mFdLTk622NrX366Q5rpaa', '06529175', 'R. Boa Vista, 304', 3, '1147051228', 3, NULL),
(10, 'Metais Ômega', 'posto7@gmail.com', '$2y$10$KWs6oS/shpTfWMEDqBW5G.BBE1fD9Zc0mFdLTk622NrX366Q5rpaa', '06529185', 'R. Natal, 236', 3, '1141561522', 4, NULL),
(11, 'Requipe recicláveis', 'posto8@gmail.com', '$2y$10$KWs6oS/shpTfWMEDqBW5G.BBE1fD9Zc0mFdLTk622NrX366Q5rpaa', '06516050', 'Av. Moacir da Silveira, 1284', 9, '1126905265', 3, NULL),
(12, 'Metais Bueno', 'posto9@gmail.com', '$2y$10$KWs6oS/shpTfWMEDqBW5G.BBE1fD9Zc0mFdLTk622NrX366Q5rpaa', '06529320', 'Av. Gino Boreli, 275', 3, '1141561732', 4, NULL),
(13, 'Starbras Ambiental', 'posto10@gmail.com', '$2y$10$KWs6oS/shpTfWMEDqBW5G.BBE1fD9Zc0mFdLTk622NrX366Q5rpaa', '06530030', 'R. Maranhão, 227', 25, '1141563993', 3, NULL),
(14, 'BlackPlastic Industria', 'posto11@gmail.com', '$2y$10$KWs6oS/shpTfWMEDqBW5G.BBE1fD9Zc0mFdLTk622NrX366Q5rpaa', '06529175', 'R. Boa Vista, 68', 3, '1141564000', 3, NULL),
(15, 'Polimix Ambiental - IRO', 'posto12@gmail.com', '$2y$10$KWs6oS/shpTfWMEDqBW5G.BBE1fD9Zc0mFdLTk622NrX366Q5rpaa', '00000000', 'Unnamed Road', 28, '1148580600', 1, NULL),
(16, 'JP Comércio de Metais', 'posto13@gmail.com', '$2y$10$KWs6oS/shpTfWMEDqBW5G.BBE1fD9Zc0mFdLTk622NrX366Q5rpaa', '06525001', 'Estr. Ten. Marques, 3999', 33, '1141568335', 4, NULL),
(17, 'Proplast Reciclaveis', 'posto14@gmail.com', '$2y$10$KWs6oS/shpTfWMEDqBW5G.BBE1fD9Zc0mFdLTk622NrX366Q5rpaa', '06516050', 'Av. Moacir da Silveira, 1284', 9, '11984748335', 3, NULL),
(18, 'Plastcor Industria', 'posto15@gmail.com', '$2y$10$KWs6oS/shpTfWMEDqBW5G.BBE1fD9Zc0mFdLTk622NrX366Q5rpaa', '06530015', 'R. Espírito Santo, 476', 25, '1141565178', 3, NULL),
(19, 'Wk Solutions', 'posto16@gmail.com', '$2y$10$KWs6oS/shpTfWMEDqBW5G.BBE1fD9Zc0mFdLTk622NrX366Q5rpaa', '06530040', 'R. Goiás, 111', 22, '11947843180', 5, NULL),
(20, 'Anjos Do Brasil', 'posto17@gmail.com', '$2y$10$KWs6oS/shpTfWMEDqBW5G.BBE1fD9Zc0mFdLTk622NrX366Q5rpaa', '06529210', 'Estr. Maricá Marquês, 543', 3, '1151971318', 3, NULL),
(21, 'Labor Quality Diagnósticos', 'posto18@gmail.com', '$2y$10$KWs6oS/shpTfWMEDqBW5G.BBE1fD9Zc0mFdLTk622NrX366Q5rpaa', '06530020', 'R. Rio de Janeiro, 1326', 3, '1147053355', 2, NULL),
(22, 'Posto Recicla', 'posto19@gmail.com', '$2y$10$KWs6oS/shpTfWMEDqBW5G.BBE1fD9Zc0mFdLTk622NrX366Q5rpaa', '00000000', 'R. Flavio Pires, 1', 1, '11963258741', 2, NULL),
(23, 'Lk industria', 'posto20@gmail.com', '$2y$10$KWs6oS/shpTfWMEDqBW5G.BBE1fD9Zc0mFdLTk622NrX366Q5rpaa', '00000000', 'R. Cascata do Alto, 2', 2, '11321654987', 2, NULL),
(24, 'Lud papel', 'posto21@gmail.com', '$2y$10$KWs6oS/shpTfWMEDqBW5G.BBE1fD9Zc0mFdLTk622NrX366Q5rpaa', '00000000', 'R. Ludmilla Cena, 3', 3, '11236548975', 2, NULL),
(25, 'SOS Papeis', 'posto22@gmail.com', '$2y$10$KWs6oS/shpTfWMEDqBW5G.BBE1fD9Zc0mFdLTk622NrX366Q5rpaa', '00000000', 'R. Gab almeida, 4', 4, '11321654789', 2, NULL),
(26, 'Papel Recicla', 'posto23@gmail.com', '$2y$10$KWs6oS/shpTfWMEDqBW5G.BBE1fD9Zc0mFdLTk622NrX366Q5rpaa', '00000000', 'R. Luan calvo, 5', 5, '11456123789', 2, NULL),
(27, 'PP Ind', 'posto24@gmail.com', '$2y$10$KWs6oS/shpTfWMEDqBW5G.BBE1fD9Zc0mFdLTk622NrX366Q5rpaa', '00000000', 'R. Jonh do Manto, 6', 6, '11852963741', 2, NULL),
(28, 'Quality Papel', 'posto25@gmail.com', '$2y$10$KWs6oS/shpTfWMEDqBW5G.BBE1fD9Zc0mFdLTk622NrX366Q5rpaa', '00000000', 'R. Eduardo do Santos, 7', 7, '11741258963', 2, NULL),
(29, 'Nando Reciclagem', 'posto26@gmail.com', '$2y$10$KWs6oS/shpTfWMEDqBW5G.BBE1fD9Zc0mFdLTk622NrX366Q5rpaa', '00000000', 'R. Fernando Nando, 8', 8, '11242536987', 2, NULL),
(30, 'Ares do Papel', 'posto27@gmail.com', '$2y$10$KWs6oS/shpTfWMEDqBW5G.BBE1fD9Zc0mFdLTk622NrX366Q5rpaa', '00000000', 'R. Haridade Ares, 9', 9, '11221133112', 2, NULL),
(31, 'Antunes Ambiente', 'posto28@gmail.com', '$2y$10$KWs6oS/shpTfWMEDqBW5G.BBE1fD9Zc0mFdLTk622NrX366Q5rpaa', '00000000', 'R. Tabia Antunes, 10', 10, '11625423987', 2, NULL),
(32, 'Pepe Orgânicos', 'posto29@gmail.com', '$2y$10$KWs6oS/shpTfWMEDqBW5G.BBE1fD9Zc0mFdLTk622NrX366Q5rpaa', '00000000', 'R. Pepe do Futbol, 11', 11, '11753951258', 1, NULL),
(33, 'ISC recicla', 'posto30@gmail.com', '$2y$10$KWs6oS/shpTfWMEDqBW5G.BBE1fD9Zc0mFdLTk622NrX366Q5rpaa', '00000000', 'R. Isaac Nego Doce, 12', 12, '11369512355', 1, NULL),
(34, 'Eco Abençoado', 'posto31@gmail.com', '$2y$10$KWs6oS/shpTfWMEDqBW5G.BBE1fD9Zc0mFdLTk622NrX366Q5rpaa', '00000000', 'R. Xola Abençoado da Silva, 13', 13, '11415263789', 1, NULL),
(35, 'Labor Quality Diagnósticos', 'posto32@gmail.com', '$2y$10$KWs6oS/shpTfWMEDqBW5G.BBE1fD9Zc0mFdLTk622NrX366Q5rpaa', '00000000', 'R. Elilo Beluginha, 14', 14, '11569832147', 1, NULL),
(36, 'Bio Orgânico', 'posto33@gmail.com', '$2y$10$KWs6oS/shpTfWMEDqBW5G.BBE1fD9Zc0mFdLTk622NrX366Q5rpaa', '00000000', 'R. Mailon Baiano, 15', 15, '11764152896', 1, NULL),
(37, 'Felix Bio', 'posto34@gmail.com', '$2y$10$KWs6oS/shpTfWMEDqBW5G.BBE1fD9Zc0mFdLTk622NrX366Q5rpaa', '00000000', 'R. Felix Felicio, 16', 16, '1171412365', 1, NULL),
(38, 'Orgânico Trix', 'posto35@gmail.com', '$2y$10$KWs6oS/shpTfWMEDqBW5G.BBE1fD9Zc0mFdLTk622NrX366Q5rpaa', '00000000', 'R. Bibia trix, 17', 17, '11999654125', 1, NULL),
(39, 'Yas recycle', 'posto36@gmail.com', '$2y$10$KWs6oS/shpTfWMEDqBW5G.BBE1fD9Zc0mFdLTk622NrX366Q5rpaa', '00000000', 'R. Yasbosta, 18', 18, '11985632123', 1, NULL),
(40, 'Eco Max', 'posto37@gmail.com', '$2y$10$KWs6oS/shpTfWMEDqBW5G.BBE1fD9Zc0mFdLTk622NrX366Q5rpaa', '00000000', 'R. Fofinho, 19', 19, '1184563219', 1, NULL),
(41, 'Familia Sustentável', 'posto38@gmail.com', '$2y$10$KWs6oS/shpTfWMEDqBW5G.BBE1fD9Zc0mFdLTk622NrX366Q5rpaa', '00000000', 'R. Felipão familia, 20', 20, '11312856498', 1, NULL),
(42, 'Plastic RH', 'posto39@gmail.com', '$2y$10$KWs6oS/shpTfWMEDqBW5G.BBE1fD9Zc0mFdLTk622NrX366Q5rpaa', '00000000', 'R. Luan RH, 21', 21, '11741256398', 3, NULL),
(43, 'Pie Plasticos', 'posto40@gmail.com', '$2y$10$KWs6oS/shpTfWMEDqBW5G.BBE1fD9Zc0mFdLTk622NrX366Q5rpaa', '00000000', 'R. Pietra Pie, 22', 22, '11736215987', 3, NULL),
(44, 'Plasticos BM', 'posto41@gmail.com', '$2y$10$KWs6oS/shpTfWMEDqBW5G.BBE1fD9Zc0mFdLTk622NrX366Q5rpaa', '00000000', 'R. Bruna Machado, 23', 23, '11999999999', 3, NULL),
(45, 'Eco Plastic', 'posto42@gmail.com', '$2y$10$KWs6oS/shpTfWMEDqBW5G.BBE1fD9Zc0mFdLTk622NrX366Q5rpaa', '00000000', 'R. Tutu, 24', 24, '11888888888', 3, NULL),
(46, 'Danzo Recicla', 'posto43@gmail.com', '$2y$10$KWs6oS/shpTfWMEDqBW5G.BBE1fD9Zc0mFdLTk622NrX366Q5rpaa', '00000000', 'R. Fefe, 25', 25, '1177777777', 3, NULL),
(47, 'Recicladora Acustica', 'posto44@gmail.com', '$2y$10$KWs6oS/shpTfWMEDqBW5G.BBE1fD9Zc0mFdLTk622NrX366Q5rpaa', '00000000', 'R. Cirilo Acustico, 26', 26, '11666666666', 3, NULL),
(48, 'LTDA ECO', 'posto45@gmail.com', '$2y$10$KWs6oS/shpTfWMEDqBW5G.BBE1fD9Zc0mFdLTk622NrX366Q5rpaa', '00000000', 'R. Cirilo Acustico2, 27', 27, '11555555555', 3, NULL),
(49, 'Recicla Jaum', 'posto46@gmail.com', '$2y$10$KWs6oS/shpTfWMEDqBW5G.BBE1fD9Zc0mFdLTk622NrX366Q5rpaa', '00000000', 'R. Jaum, 28', 28, '114444444444', 3, NULL),
(50, 'Eco Quality', 'posto47@gmail.com', '$2y$10$KWs6oS/shpTfWMEDqBW5G.BBE1fD9Zc0mFdLTk622NrX366Q5rpaa', '00000000', 'R. Raffshawty, 29', 29, '11333333333', 3, NULL),
(51, 'BioShawty', 'posto48@gmail.com', '$2y$10$KWs6oS/shpTfWMEDqBW5G.BBE1fD9Zc0mFdLTk622NrX366Q5rpaa', '00000000', 'R. Rodrigues Designer, 30', 30, '11222222222', 3, NULL),
(52, 'Vidros Recicla', 'posto49@gmail.com', '$2y$10$KWs6oS/shpTfWMEDqBW5G.BBE1fD9Zc0mFdLTk622NrX366Q5rpaa', '00000000', 'R. Edson Arantes, 31', 31, '11111111111', 5, NULL),
(53, 'Vidro Sustentável', 'posto50@gmail.com', '$2y$10$KWs6oS/shpTfWMEDqBW5G.BBE1fD9Zc0mFdLTk622NrX366Q5rpaa', '00000000', 'R. Pelé, 32', 32, '11000000000', 5, NULL),
(54, 'Posto Menino Bom', 'posto51@gmail.com', '$2y$10$KWs6oS/shpTfWMEDqBW5G.BBE1fD9Zc0mFdLTk622NrX366Q5rpaa', '00000000', 'R. Neymar Junior, 33', 33, '11645796314', 5, NULL),
(55, 'Posto Bom Jesus', 'posto52@gmail.com', '$2y$10$KWs6oS/shpTfWMEDqBW5G.BBE1fD9Zc0mFdLTk622NrX366Q5rpaa', '00000000', 'R. Messi, 34', 34, '1147536912', 5, NULL),
(56, 'Coleta Vidros CR', 'posto53@gmail.com', '$2y$10$KWs6oS/shpTfWMEDqBW5G.BBE1fD9Zc0mFdLTk622NrX366Q5rpaa', '00000000', 'R. Cristiano Ronaldo, 35', 35, '1112546398', 5, NULL),
(57, 'Coleta Eco', 'posto54@gmail.com', '$2y$10$KWs6oS/shpTfWMEDqBW5G.BBE1fD9Zc0mFdLTk622NrX366Q5rpaa', '00000000', 'R. Tilapia, 36', 36, '1178514681', 5, NULL),
(58, 'BIO GLASS', 'posto55@gmail.com', '$2y$10$KWs6oS/shpTfWMEDqBW5G.BBE1fD9Zc0mFdLTk622NrX366Q5rpaa', '00000000', 'R. Locutor, 37', 37, '1112354789', 5, NULL),
(59, 'Glass Quality', 'posto56@gmail.com', '$2y$10$KWs6oS/shpTfWMEDqBW5G.BBE1fD9Zc0mFdLTk622NrX366Q5rpaa', '00000000', 'R. Pierock, 38', 38, '11123852123', 5, NULL),
(60, 'Recicla Glass', 'posto57@gmail.com', '$2y$10$KWs6oS/shpTfWMEDqBW5G.BBE1fD9Zc0mFdLTk622NrX366Q5rpaa', '00000000', 'R. Oreia, 39', 39, '11258456372', 5, NULL),
(61, 'Vidros Import', 'posto58@gmail.com', '$2y$10$KWs6oS/shpTfWMEDqBW5G.BBE1fD9Zc0mFdLTk622NrX366Q5rpaa', '00000000', 'R. Guigui, 40', 1, '11791364572', 5, NULL),
(62, 'Bonde do Metal', 'posto59@gmail.com', '$2y$10$KWs6oS/shpTfWMEDqBW5G.BBE1fD9Zc0mFdLTk622NrX366Q5rpaa', '00000000', 'R. Genoveva, 41', 2, '115383636', 4, NULL),
(63, 'Nova Vida', 'posto60@gmail.com', '$2y$10$KWs6oS/shpTfWMEDqBW5G.BBE1fD9Zc0mFdLTk622NrX366Q5rpaa', '00000000', 'R. Derek Luccas, 42', 3, '1186896868', 4, NULL),
(64, 'Vila do Metal', 'posto61@gmail.com', '$2y$10$KWs6oS/shpTfWMEDqBW5G.BBE1fD9Zc0mFdLTk622NrX366Q5rpaa', '00000000', 'R. Kanye West, 43', 4, '11875686688', 4, NULL),
(65, 'Recicla Metal', 'posto62@gmail.com', '$2y$10$KWs6oS/shpTfWMEDqBW5G.BBE1fD9Zc0mFdLTk622NrX366Q5rpaa', '00000000', 'R. Lana Del Rey, 44', 5, '11786767867', 4, NULL),
(66, 'Jay Metais', 'posto63@gmail.com', '$2y$10$KWs6oS/shpTfWMEDqBW5G.BBE1fD9Zc0mFdLTk622NrX366Q5rpaa', '00000000', 'R. Jay-Z, 45', 6, '11785786166', 4, NULL),
(67, 'MC Metal', 'posto64@gmail.com', '$2y$10$KWs6oS/shpTfWMEDqBW5G.BBE1fD9Zc0mFdLTk622NrX366Q5rpaa', '00000000', 'R. Jhony Mc, 46', 7, '112365236', 4, NULL),
(68, 'Posto Veigh', 'posto65@gmail.com', '$2y$10$KWs6oS/shpTfWMEDqBW5G.BBE1fD9Zc0mFdLTk622NrX366Q5rpaa', '00000000', 'R. Veigh Baby, 47', 8, '117575757', 4, NULL),
(69, 'Qualidade Metal', 'posto66@gmail.com', '$2y$10$KWs6oS/shpTfWMEDqBW5G.BBE1fD9Zc0mFdLTk622NrX366Q5rpaa', '00000000', 'R. Abott, 48', 9, '11956569565', 4, NULL),
(70, 'Recicla Ferro', 'posto67@gmail.com', '$2y$10$KWs6oS/shpTfWMEDqBW5G.BBE1fD9Zc0mFdLTk622NrX366Q5rpaa', '00000000', 'R. FBC, 49', 10, '1124121244', 4, NULL),
(71, 'ECO METAL', 'posto68@gmail.com', '$2y$10$KWs6oS/shpTfWMEDqBW5G.BBE1fD9Zc0mFdLTk622NrX366Q5rpaa', '00000000', 'R. Cu7alo, 50', 11, '11994167405', 4, NULL);

-- Chaves estrangeiras após carga
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`lixo`) REFERENCES `tiposdelixo` (`id`),
  ADD CONSTRAINT `usuario_ibfk_2` FOREIGN KEY (`bairro`) REFERENCES `bairros` (`idbairro`);

SET FOREIGN_KEY_CHECKS=1;

-- Views de compatibilidade para código que espera propriedades em inglês
DROP VIEW IF EXISTS `v_bairros`;
CREATE VIEW `v_bairros` AS
SELECT
  `idbairro` AS `id`,
  `nome` AS `name`
FROM `bairros`;

DROP VIEW IF EXISTS `v_tiposdelixo`;
CREATE VIEW `v_tiposdelixo` AS
SELECT
  `id` AS `id`,
  `nome` AS `name`
FROM `tiposdelixo`;

DROP VIEW IF EXISTS `v_usuario`;
CREATE VIEW `v_usuario` AS
SELECT
  `id`,
  `nome` AS `name`,
  `email`,
  `senha`,
  `cep`,
  `endereco` AS `endereco`,
  `bairro`,
  `telefone`,
  `lixo`,
  `imagem`,
  `nivel`
FROM `usuario`;
