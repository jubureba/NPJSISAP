-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 27-Abr-2016 às 22:27
-- Versão do servidor: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `npjdb`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `agenda`
--

CREATE TABLE IF NOT EXISTS `agenda` (
  `idAgenda` int(11) NOT NULL AUTO_INCREMENT,
  `data` date NOT NULL,
  `hora` time NOT NULL,
  `numProtocolo` varchar(20) NOT NULL,
  `descricao` varchar(100) NOT NULL,
  `Atendimento_Defensoria_idAtendimento_Defensoria` int(11) NOT NULL,
  PRIMARY KEY (`idAgenda`),
  KEY `fk_Agenda_Atendimento_Defensoria1_idx` (`Atendimento_Defensoria_idAtendimento_Defensoria`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `assistido_defensoria`
--

CREATE TABLE IF NOT EXISTS `assistido_defensoria` (
  `idAssistidoDefensoria` int(11) NOT NULL AUTO_INCREMENT,
  `nomeAssistidoDefensoria` varchar(50) NOT NULL,
  `telefoneAssistidoDefensoria` varchar(15) NOT NULL,
  `loginDefensoria` text,
  `Endereco_Assistido_idEndereco_Assistido` int(11) DEFAULT NULL,
  `Endereco_Profissional_idEndereco_Profissional` int(11) DEFAULT NULL,
  `Documentos_Assistido_idDocumentos_Assistidos` int(11) DEFAULT NULL,
  PRIMARY KEY (`idAssistidoDefensoria`),
  KEY `fk_Assistido_Defensoria_Endereco_Assistido1_idx` (`Endereco_Assistido_idEndereco_Assistido`),
  KEY `fk_Assistido_Defensoria_Endereco_Profissional1_idx` (`Endereco_Profissional_idEndereco_Profissional`),
  KEY `fk_Assistido_Defensoria_Documentos_Assistido1_idx` (`Documentos_Assistido_idDocumentos_Assistidos`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=39 ;

--
-- Extraindo dados da tabela `assistido_defensoria`
--

INSERT INTO `assistido_defensoria` (`idAssistidoDefensoria`, `nomeAssistidoDefensoria`, `telefoneAssistidoDefensoria`, `loginDefensoria`, `Endereco_Assistido_idEndereco_Assistido`, `Endereco_Profissional_idEndereco_Profissional`, `Documentos_Assistido_idDocumentos_Assistidos`) VALUES
(32, 'ANDERSON THIAGO DA COSTA LIMA', '(91)99999-9999', 'teste', 28, NULL, NULL),
(33, 'MATEUS RANGEL', '(99)99999-9999', 'teste', 29, NULL, NULL),
(34, 'teste', '(99)99999-9999', 'teste', 30, NULL, NULL),
(35, 'ANDERSON THIAGO DA COSTA LIMA', '(99)99999-9999', 'teste', NULL, NULL, NULL),
(36, '', '', '', 32, NULL, NULL),
(37, 'Teste2', '(99)99999-9999', 'Login', 33, NULL, NULL),
(38, 'Anderson Maia', '(91)98200-8693', '', 34, NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `assistido_npj`
--

CREATE TABLE IF NOT EXISTS `assistido_npj` (
  `idAssistido_NPJ` int(11) NOT NULL AUTO_INCREMENT,
  `nomeAssistidoNPJ` varchar(50) NOT NULL,
  `nomeMenor` varchar(50) DEFAULT NULL,
  `nomePai` varchar(50) DEFAULT NULL,
  `nomeMae` varchar(50) NOT NULL,
  `naturalidade` varchar(20) NOT NULL,
  `nacionalidade` varchar(20) NOT NULL,
  `dataNascimento` date NOT NULL,
  `escolaridade` varchar(45) DEFAULT NULL,
  `profissao` varchar(45) NOT NULL,
  `estadoCivil` varchar(20) DEFAULT NULL,
  `situacaoHabitacional` varchar(45) DEFAULT NULL,
  `remuneracao` float NOT NULL,
  `historico` varchar(200) DEFAULT NULL,
  `rg` varchar(20) NOT NULL,
  `cpf` varchar(20) NOT NULL,
  `ctps` varchar(20) NOT NULL,
  `Endereco_Profissional_idEndereco_Profissional` int(11) NOT NULL,
  `Documentos_Assistido_idDocumentos_Assistidos` int(11) NOT NULL,
  `Endereco_Assistido_idEndereco_Assistido` int(11) NOT NULL,
  PRIMARY KEY (`idAssistido_NPJ`),
  KEY `fk_Assistido_NPJ_Endereco_Profissional1_idx` (`Endereco_Profissional_idEndereco_Profissional`),
  KEY `fk_Assistido_NPJ_Documentos_Assistido1_idx` (`Documentos_Assistido_idDocumentos_Assistidos`),
  KEY `fk_Assistido_NPJ_Endereco_Assistido1_idx` (`Endereco_Assistido_idEndereco_Assistido`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `assunto_atendimento`
--

CREATE TABLE IF NOT EXISTS `assunto_atendimento` (
  `idAssunto_Atendimento` int(11) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(150) NOT NULL,
  PRIMARY KEY (`idAssunto_Atendimento`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- Extraindo dados da tabela `assunto_atendimento`
--

INSERT INTO `assunto_atendimento` (`idAssunto_Atendimento`, `descricao`) VALUES
(1, 'Ação de investigação de Paternidade'),
(2, 'Ação de Indenização c/c Dano Moral'),
(3, 'Ação de Execução de Alimentos'),
(4, 'Ação de Indenização por Ato Ilicíto C/C Dano '),
(5, 'Ação de Indenização de Paternidade C/C Alimen'),
(6, 'Ação de Inventário e Partilha'),
(7, 'Ação de Reparação de Dano Por Alto Ilícito C/C Dano Material e Moral'),
(9, 'Ação de Indenização por Dano Moral'),
(10, 'Ação de Alimentos'),
(11, 'Ação de Divórcio Litigioso');

-- --------------------------------------------------------

--
-- Estrutura da tabela `atendimento_defensoria`
--

CREATE TABLE IF NOT EXISTS `atendimento_defensoria` (
  `idAtendimento_Defensoria` int(11) NOT NULL AUTO_INCREMENT,
  `descricaoAtendimentoDefensoria` varchar(200) DEFAULT NULL,
  `data` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `deferido` tinyint(1) DEFAULT NULL,
  `Assistido_Defensoria_idAssistidoDefensoria` int(11) NOT NULL,
  `Requerido_idRequerido` int(11) NOT NULL,
  `Documentos_Atendimento_idDocumentos` int(11) DEFAULT NULL,
  `Usuario_idUsuario` int(11) NOT NULL,
  `Assunto_Atendimento_idAssunto_Atendimento` int(11) NOT NULL,
  `status_atendimento` varchar(20) NOT NULL,
  `visualizado` tinyint(1) NOT NULL,
  `Pecas_idPecas` int(11) NOT NULL,
  PRIMARY KEY (`idAtendimento_Defensoria`),
  KEY `fk_Atendimento_Defensoria_Assistido_Defensoria1_idx` (`Assistido_Defensoria_idAssistidoDefensoria`),
  KEY `fk_Atendimento_Defensoria_Requerido1_idx` (`Requerido_idRequerido`),
  KEY `fk_Atendimento_Defensoria_Documentos_Atendimento1_idx` (`Documentos_Atendimento_idDocumentos`),
  KEY `fk_Atendimento_Defensoria_Usuario1_idx` (`Usuario_idUsuario`),
  KEY `fk_Atendimento_Defensoria_Assunto_Atendimento1_idx` (`Assunto_Atendimento_idAssunto_Atendimento`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=16 ;

--
-- Extraindo dados da tabela `atendimento_defensoria`
--

INSERT INTO `atendimento_defensoria` (`idAtendimento_Defensoria`, `descricaoAtendimentoDefensoria`, `data`, `deferido`, `Assistido_Defensoria_idAssistidoDefensoria`, `Requerido_idRequerido`, `Documentos_Atendimento_idDocumentos`, `Usuario_idUsuario`, `Assunto_Atendimento_idAssunto_Atendimento`, `status_atendimento`, `visualizado`, `Pecas_idPecas`) VALUES
(7, 'Ação de investigação de Paternidade', '2015-10-14 10:31:00', NULL, 32, 28, NULL, 1, 1, 'aberto', 0, 0),
(8, 'Ação de Indenização c/c Dano Moral', '2015-09-21 17:13:36', NULL, 33, 29, NULL, 1, 2, 'Não Aprovado', 0, 0),
(9, 'Ação de investigação de Paternidade', '2015-11-02 17:34:15', NULL, 34, 30, NULL, 1, 1, 'esperando aprovacao', 0, 1),
(10, 'Ação de Execução de Alimentos', '2015-11-02 18:04:50', NULL, 32, 28, NULL, 1, 3, 'concluído', 0, 1),
(11, 'Ação de investigação de Paternidade', '2015-09-21 17:13:36', NULL, 33, 29, NULL, 1, 1, 'concluído', 0, 1),
(14, 'Ação de Aliments', '2015-11-05 09:42:55', NULL, 37, 33, NULL, 1, 10, 'aberto', 0, 2),
(15, '', '2015-11-06 23:56:58', NULL, 38, 34, NULL, 2, 1, 'aberto', 0, 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `atendimento_npj`
--

CREATE TABLE IF NOT EXISTS `atendimento_npj` (
  `idAtendimento_NPJ` int(11) NOT NULL AUTO_INCREMENT,
  `descricaoAtendimentoNPJ` varchar(200) DEFAULT NULL,
  `data` date DEFAULT NULL,
  `deferido` tinyint(1) DEFAULT NULL,
  `Assistido_NPJ_idAssistido_NPJ` int(11) NOT NULL,
  `Usuario_idUsuario` int(11) NOT NULL,
  `Documentos_Atendimento_idDocumentos` int(11) NOT NULL,
  `Assunto_Atendimento_idAssunto_Atendimento` int(11) NOT NULL,
  `Requerido_idRequerido` int(11) NOT NULL,
  `Pecas_idPecas` int(11) NOT NULL,
  PRIMARY KEY (`idAtendimento_NPJ`),
  KEY `fk_Atendimento_NPJ_Assistido_NPJ1_idx` (`Assistido_NPJ_idAssistido_NPJ`),
  KEY `fk_Atendimento_NPJ_Usuario1_idx` (`Usuario_idUsuario`),
  KEY `fk_Atendimento_NPJ_Documentos_Atendimento1_idx` (`Documentos_Atendimento_idDocumentos`),
  KEY `fk_Atendimento_NPJ_Assunto_Atendimento1_idx` (`Assunto_Atendimento_idAssunto_Atendimento`),
  KEY `fk_Atendimento_NPJ_Requerido1_idx` (`Requerido_idRequerido`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `documentos_assistido`
--

CREATE TABLE IF NOT EXISTS `documentos_assistido` (
  `idDocumentos_Assistidos` int(11) NOT NULL AUTO_INCREMENT,
  `rg` varchar(50) DEFAULT NULL,
  `cpf` varchar(150) DEFAULT NULL,
  `certidaoNascimento` varchar(50) DEFAULT NULL,
  `certidaoCasamento` varchar(50) DEFAULT NULL,
  `comprovanteResidencia` varchar(50) DEFAULT NULL,
  `carteiraTrabalho` varchar(50) DEFAULT NULL,
  `outros` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`idDocumentos_Assistidos`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `documentos_atendimento`
--

CREATE TABLE IF NOT EXISTS `documentos_atendimento` (
  `idDocumentos` int(11) NOT NULL AUTO_INCREMENT,
  `procuracao` varchar(50) DEFAULT NULL,
  `declaracaoPobreza` varchar(50) DEFAULT NULL,
  `declaracaoEndereco` varchar(50) DEFAULT NULL,
  `substabelecimento` varchar(50) DEFAULT NULL,
  `autorizacao` varchar(50) DEFAULT NULL,
  `historico` varchar(50) DEFAULT NULL,
  `carteiraTrabalho` varchar(50) DEFAULT NULL,
  `contraCheque` varchar(50) DEFAULT NULL,
  `certidaoNascimento` varchar(50) DEFAULT NULL,
  `certidaoCasamento` varchar(50) DEFAULT NULL,
  `certidaoObito` varchar(50) DEFAULT NULL,
  `peticaoInicial` varchar(50) DEFAULT NULL,
  `contestacao` varchar(50) DEFAULT NULL,
  `notificacaoExtraJudicial` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`idDocumentos`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `documentos_requerido`
--

CREATE TABLE IF NOT EXISTS `documentos_requerido` (
  `idDocumentos_Requerido` int(11) NOT NULL AUTO_INCREMENT,
  `comprovanteEndereco` varchar(50) DEFAULT NULL,
  `rg` varchar(50) DEFAULT NULL,
  `cpf` varchar(50) DEFAULT NULL,
  `outros` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`idDocumentos_Requerido`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `educacao_usuario`
--

CREATE TABLE IF NOT EXISTS `educacao_usuario` (
  `idEducacao` int(255) NOT NULL AUTO_INCREMENT,
  `instituicao` varchar(255) NOT NULL,
  `idUsuario_educacao` int(255) NOT NULL,
  `curso` varchar(255) NOT NULL,
  PRIMARY KEY (`idEducacao`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Extraindo dados da tabela `educacao_usuario`
--

INSERT INTO `educacao_usuario` (`idEducacao`, `instituicao`, `idUsuario_educacao`, `curso`) VALUES
(1, 'IESAM - INSTITUTO DE ENSINO SUPERIOR DA AMAZÔNIA', 1, 'ENGENHARIA DE COMPUTAÇÃO'),
(2, 'FCAT - FACULDADE DE CASTANHAL', 1, 'ANALISE E DESENVOLVIMENTO DE SISTEMAS'),
(3, 'FCAT - FACULDADE DE CASTANHAL', 2, 'ANALISE E DESENVOLVIMENTO DE SISTEMAS');

-- --------------------------------------------------------

--
-- Estrutura da tabela `endereco_assistido`
--

CREATE TABLE IF NOT EXISTS `endereco_assistido` (
  `idEndereco_Assistido` int(11) NOT NULL AUTO_INCREMENT,
  `logradouroAssistido` varchar(50) NOT NULL,
  `numeroCasaAssistido` int(11) DEFAULT NULL,
  `bairroAssistido` varchar(45) DEFAULT NULL,
  `complementoAssistido` varchar(100) DEFAULT NULL,
  `CidadeAssistido` varchar(45) NOT NULL,
  `EstadoAssistido` varchar(2) NOT NULL,
  PRIMARY KEY (`idEndereco_Assistido`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=35 ;

--
-- Extraindo dados da tabela `endereco_assistido`
--

INSERT INTO `endereco_assistido` (`idEndereco_Assistido`, `logradouroAssistido`, `numeroCasaAssistido`, `bairroAssistido`, `complementoAssistido`, `CidadeAssistido`, `EstadoAssistido`) VALUES
(28, 'ADAILSON DA SILVA RODRIGUES', NULL, NULL, NULL, 'Castanhal', 'PA'),
(29, 'RUA DOS ME ROUBA', NULL, NULL, NULL, 'Castanhal', 'PA'),
(30, 'teste', NULL, NULL, NULL, 'Castanhal', 'PA'),
(31, 'ADAILSON DA SILVA RODRIGUES', NULL, NULL, NULL, 'Castanhal', 'PA'),
(32, '', NULL, NULL, NULL, '', ''),
(33, 'Asad', NULL, NULL, NULL, 'Castanhal', 'PA'),
(34, 'Belém-Pa', NULL, NULL, NULL, 'Castanhal', 'PA');

-- --------------------------------------------------------

--
-- Estrutura da tabela `endereco_profissional`
--

CREATE TABLE IF NOT EXISTS `endereco_profissional` (
  `idEndereco_Profissional` int(11) NOT NULL AUTO_INCREMENT,
  `logradouroProfissional` varchar(50) NOT NULL,
  `numeroCasaProfissional` int(11) NOT NULL,
  `bairroProfissional` varchar(45) NOT NULL,
  `complementoProfissional` varchar(100) DEFAULT NULL,
  `CidadeProfissional` varchar(45) NOT NULL,
  `EstadoProfissional` varchar(2) NOT NULL,
  PRIMARY KEY (`idEndereco_Profissional`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `endereco_requerido`
--

CREATE TABLE IF NOT EXISTS `endereco_requerido` (
  `idEndereco_Requerido` int(11) NOT NULL AUTO_INCREMENT,
  `logradouroRequerido` varchar(50) NOT NULL,
  `numeroCasaRequerido` int(11) DEFAULT NULL,
  `bairroRequerido` varchar(45) DEFAULT NULL,
  `complementoRequerido` varchar(100) DEFAULT NULL,
  `CidadeRequerido` varchar(45) NOT NULL,
  `EstadoRequerido` varchar(2) NOT NULL,
  PRIMARY KEY (`idEndereco_Requerido`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=35 ;

--
-- Extraindo dados da tabela `endereco_requerido`
--

INSERT INTO `endereco_requerido` (`idEndereco_Requerido`, `logradouroRequerido`, `numeroCasaRequerido`, `bairroRequerido`, `complementoRequerido`, `CidadeRequerido`, `EstadoRequerido`) VALUES
(28, 'RUA DOS ME ROUBA LOGO', NULL, NULL, NULL, 'Castanhal', 'PA'),
(29, 'BLU BLU BLU', NULL, NULL, NULL, 'Castanhal', 'PA'),
(30, 'teste', NULL, NULL, NULL, 'Castanhal', 'PA'),
(31, 'RUA DOS ME ROUBA LOGO', NULL, NULL, NULL, 'Castanhal', 'PA'),
(32, '', NULL, NULL, NULL, '', ''),
(33, 'ASDASDASDA', NULL, NULL, NULL, 'Castanhal', 'PA'),
(34, 'Belém-Pa', NULL, NULL, NULL, 'Castanhal', 'PA');

-- --------------------------------------------------------

--
-- Estrutura da tabela `estados`
--

CREATE TABLE IF NOT EXISTS `estados` (
  `estados` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `habilidades_usuario`
--

CREATE TABLE IF NOT EXISTS `habilidades_usuario` (
  `idHabilidade` int(255) NOT NULL AUTO_INCREMENT,
  `habilidade` varchar(255) NOT NULL,
  `idUsuario_Habilidade` int(255) NOT NULL,
  `qualidade` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`idHabilidade`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=16 ;

--
-- Extraindo dados da tabela `habilidades_usuario`
--

INSERT INTO `habilidades_usuario` (`idHabilidade`, `habilidade`, `idUsuario_Habilidade`, `qualidade`) VALUES
(1, 'Desenvolvedor C', 1, 'Excelente'),
(2, 'Desenvolvedor JAVA', 1, 'Excelente'),
(3, 'Desenvolvedor PHP', 1, 'Médio'),
(4, 'Musico', 1, 'Ruim'),
(5, 'Inglês', 1, 'Médio'),
(6, 'Manutenção de Computadores', 1, 'Bom'),
(7, 'Desenvolvedor JAVA', 3, 'Excelente'),
(8, 'Inglês Avançado', 3, 'Bom'),
(9, 'Desenvolvedor C#', 3, 'Bom'),
(10, 'DBA', 3, 'Bom'),
(11, 'Engenheira de Projetos', 4, NULL),
(12, 'Desenvolvedora C#', 4, NULL),
(13, 'Espanhol', 4, 'Bom'),
(14, 'Inglês', 4, 'Bom'),
(15, 'Desenvolvedora Java', 4, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `mensagens`
--

CREATE TABLE IF NOT EXISTS `mensagens` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mensagem` text NOT NULL,
  `foto` varchar(255) NOT NULL,
  `dataHora` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=119 ;

--
-- Extraindo dados da tabela `mensagens`
--

INSERT INTO `mensagens` (`id`, `nome`, `email`, `mensagem`, `foto`, `dataHora`) VALUES
(110, 'Mateus Rangel', 'rangel@hotmail.com', 'Teste Mensagem - Baiano  2', 'dist/img/Rangel.jpg', '2015-11-05 05:20:46'),
(108, 'Anderson Thiago', 'eng.thiagolima@hotmail.com', 'Teste de Mensagem 5 !', 'dist/img/Thiago.jpg', '2015-11-05 03:51:38'),
(109, 'Mateus Rangel', 'rangel@hotmail.com', 'Teste Mensagem - Baiano', 'dist/img/Rangel.jpg', '2015-11-05 05:18:57'),
(105, 'Anderson Thiago', 'eng.thiagolima@hotmail.com', 'Teste de Mensagem 3 !', 'dist/img/Thiago.jpg', '2015-11-05 03:24:21'),
(103, 'Anderson Thiago', 'eng.thiagolima@hotmail.com', 'Teste de Mensagem 1 !', 'dist/img/Thiago.jpg', '2015-11-05 03:24:11'),
(104, 'Anderson Thiago', 'eng.thiagolima@hotmail.com', 'Teste de Mensagem 2 !', 'dist/img/Thiago.jpg', '2015-11-05 03:24:17'),
(111, 'Anderson Thiago', 'eng.thiagolima@hotmail.com', 'Haha, massa, agora tá funcionando! :3', 'dist/img/Thiago.jpg', '2015-11-05 05:23:30'),
(112, 'Maria Maxelen', 'max@hotmail.com', 'Realmente ! :D', 'dist/img/Max.jpg', '2015-11-05 05:24:10'),
(116, 'Anderson Thiago', 'eng.thiagolima@hotmail.com', 'mensagem teste', 'dist/img/943930_1080117988706985_2163493282915899592_n.jpg', '2016-04-19 20:12:47'),
(117, 'Anderson Thiago', 'eng.thiagolima@hotmail.com', 'mensagem teste', 'dist/img/943930_1080117988706985_2163493282915899592_n.jpg', '2016-04-26 22:39:22');

-- --------------------------------------------------------

--
-- Estrutura da tabela `pecas_juridicas`
--

CREATE TABLE IF NOT EXISTS `pecas_juridicas` (
  `idPecas` int(11) NOT NULL AUTO_INCREMENT,
  `peca` varchar(255) DEFAULT NULL,
  `status` varchar(255) NOT NULL,
  `dataPeca` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`idPecas`),
  UNIQUE KEY `peca` (`peca`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Extraindo dados da tabela `pecas_juridicas`
--

INSERT INTO `pecas_juridicas` (`idPecas`, `peca`, `status`, `dataPeca`) VALUES
(1, 'caminho da peça 1', 'Aberto', '2016-04-22 18:43:07'),
(2, 'caminho da peça 2', 'Aprovada', '2016-04-22 18:43:07');

-- --------------------------------------------------------

--
-- Estrutura da tabela `requerido`
--

CREATE TABLE IF NOT EXISTS `requerido` (
  `idRequerido` int(11) NOT NULL AUTO_INCREMENT,
  `nomeRequerido` varchar(50) NOT NULL,
  `telefoneRequerido` varchar(15) NOT NULL,
  `razaoSocial` varchar(20) DEFAULT NULL,
  `profissao` varchar(30) DEFAULT NULL,
  `remuneracao` double DEFAULT NULL,
  `informacoesAdicionais` varchar(200) DEFAULT NULL,
  `Documentos_Requerido_idDocumentos_Requerido` int(11) DEFAULT NULL,
  `Endereco_Requerido_idEndereco_Requerido` int(11) DEFAULT NULL,
  `Endereco_Profissional_idEndereco_Profissional` int(11) DEFAULT NULL,
  PRIMARY KEY (`idRequerido`),
  KEY `fk_Requerido_Documentos_Requerido1_idx` (`Documentos_Requerido_idDocumentos_Requerido`),
  KEY `fk_Requerido_Endereco_Requerido1_idx` (`Endereco_Requerido_idEndereco_Requerido`),
  KEY `fk_Requerido_Endereco_Profissional1_idx` (`Endereco_Profissional_idEndereco_Profissional`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=35 ;

--
-- Extraindo dados da tabela `requerido`
--

INSERT INTO `requerido` (`idRequerido`, `nomeRequerido`, `telefoneRequerido`, `razaoSocial`, `profissao`, `remuneracao`, `informacoesAdicionais`, `Documentos_Requerido_idDocumentos_Requerido`, `Endereco_Requerido_idEndereco_Requerido`, `Endereco_Profissional_idEndereco_Profissional`) VALUES
(28, 'MATEUS RANGEL', '(99)99999-9999', NULL, NULL, NULL, NULL, NULL, 28, NULL),
(29, 'ANDERSON THIAGO', '(91)99999-9999', NULL, NULL, NULL, NULL, NULL, 29, NULL),
(30, 'teste', '(99)99999-9999', NULL, NULL, NULL, NULL, NULL, 30, NULL),
(31, 'MATEUS RANGEL', '(99)99999-9999', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(32, '', '', NULL, NULL, NULL, NULL, NULL, 32, NULL),
(33, 'Teste2', '(99)99999-9999', NULL, NULL, NULL, NULL, NULL, 33, NULL),
(34, 'Manuel Sarmanho', '(91)98345-6222', NULL, NULL, NULL, NULL, NULL, 34, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `telefone_assistido_defensoria`
--

CREATE TABLE IF NOT EXISTS `telefone_assistido_defensoria` (
  `idTelefone_Defensoria` int(11) NOT NULL AUTO_INCREMENT,
  `telefone` varchar(15) NOT NULL,
  `Assistido_Defensoria_idAssistidoDefensoria` int(11) NOT NULL,
  PRIMARY KEY (`idTelefone_Defensoria`),
  KEY `fk_Telefone_Assistido_Defensoria_Assistido_Defensoria1_idx` (`Assistido_Defensoria_idAssistidoDefensoria`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `telefone_assistido_npj`
--

CREATE TABLE IF NOT EXISTS `telefone_assistido_npj` (
  `idTelefone_Assistido` int(11) NOT NULL AUTO_INCREMENT,
  `telefone` varchar(15) NOT NULL,
  `Assistido_NPJ_idAssistido_NPJ` int(11) NOT NULL,
  PRIMARY KEY (`idTelefone_Assistido`),
  KEY `fk_Telefone_Assistido_NPJ_Assistido_NPJ1_idx` (`Assistido_NPJ_idAssistido_NPJ`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `telefone_requerido`
--

CREATE TABLE IF NOT EXISTS `telefone_requerido` (
  `idTelefone_Requerido` int(11) NOT NULL AUTO_INCREMENT,
  `telefone` varchar(15) NOT NULL,
  `Requerido_idRequerido` int(11) NOT NULL,
  PRIMARY KEY (`idTelefone_Requerido`),
  KEY `fk_Telefone_Requerido_Requerido1_idx` (`Requerido_idRequerido`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `idUsuario` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  `login` varchar(20) NOT NULL,
  `senha` varchar(20) NOT NULL,
  `semestre` varchar(20) NOT NULL,
  `turma` varchar(15) NOT NULL,
  `turno` varchar(20) NOT NULL,
  `telefone` varchar(20) DEFAULT NULL,
  `permissao` varchar(100) NOT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `ideducacao` int(255) DEFAULT NULL,
  `Cidade` varchar(255) DEFAULT NULL,
  `Estado` varchar(255) DEFAULT NULL,
  `Nota` varchar(255) DEFAULT NULL,
  `idHabilidade` int(255) DEFAULT NULL,
  PRIMARY KEY (`idUsuario`),
  UNIQUE KEY `matricula_UNIQUE` (`login`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=15 ;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`idUsuario`, `nome`, `login`, `senha`, `semestre`, `turma`, `turno`, `telefone`, `permissao`, `foto`, `email`, `ideducacao`, `Cidade`, `Estado`, `Nota`, `idHabilidade`) VALUES
(1, 'Anderson Thiago', 'thiago', '123', '4', 'ADSN2014.1', 'N', '(91)98349-0122', 'Suporte/Desenvolvedor', 'dist/img/943930_1080117988706985_2163493282915899592_n.jpg', 'eng.thiagolima@hotmail.com', 1, 'Castanhal', 'Pará', '"As pessoas que são loucas o suficiente para achar que podem mudar o Mundo, são aquelas que o fazem."', 1),
(2, 'Anderson Thiago da Costa Lima', 'engthiagolima', 'mascote10', '4', 'ADSN2014.1', 'N', '91983490122', 'Aluno', 'dist/img/thiago_edited.jpg', 'eng.thiagolima@hotmail.com', 0, '', '', '', NULL),
(9, 'Suyanne Magalhães ', 'suyanne', '123', '4', 'ADSN2014.1', 'Noturno', '(91)99389-7093', 'Suporte/Desenvolvedor', 'dist/img/Suy.jpg', 'suyanne@hotmail.com', 2, 'Castanhal', 'PA', NULL, 2),
(10, 'Mateus Rangel', 'rangel', '123', '4', 'ADSN2014.1', 'Noturno', '(91)98201-1852', 'Suporte/Desenvolvedor', 'dist/img/Rangel.jpg', 'rangel@hotmail.com', 3, 'Castanhal', 'PA', NULL, 3),
(11, 'Maria Maxelen', 'max', '123', '4', 'ADSN2014.1', 'Noturno', '(91)99130-0049', 'Suporte/Desenvolvedor', 'dist/img/Max.jpg', 'max@hotmail.com', 2, 'Castanhal', 'PA', NULL, 4),
(12, 'João Severino', 'neto', '123', '4', 'ADSN2014.1', 'Noturno', '(91)98184-9097', 'Suporte/Desenvolvedor', 'dist/img/Neto.jpg', 'neto@hotmail.com', 2, 'Castanhal', 'PA', NULL, NULL),
(13, 'Taís Amaral', 'tais', '123', '4', 'ADSN2014.1', 'Noturno', '(91)98311-1147', 'Suporte/Desenvolvedor', 'dist/img/Tais.jpg', 'tais@hotmail.com', 2, 'Castanhal', 'PA', NULL, NULL),
(14, 'teste', 'teste', 'teste', 'Quinto', 'teste', 'Noturno', '(99) 9999-99999', 'Aluno', 'dist/img/', 'teste@teste.com', NULL, NULL, NULL, NULL, NULL);

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `agenda`
--
ALTER TABLE `agenda`
  ADD CONSTRAINT `fk_Agenda_Atendimento_Defensoria1` FOREIGN KEY (`Atendimento_Defensoria_idAtendimento_Defensoria`) REFERENCES `atendimento_defensoria` (`idAtendimento_Defensoria`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `assistido_defensoria`
--
ALTER TABLE `assistido_defensoria`
  ADD CONSTRAINT `fk_Assistido_Defensoria_Documentos_Assistido1` FOREIGN KEY (`Documentos_Assistido_idDocumentos_Assistidos`) REFERENCES `documentos_assistido` (`idDocumentos_Assistidos`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Assistido_Defensoria_Endereco_Assistido1` FOREIGN KEY (`Endereco_Assistido_idEndereco_Assistido`) REFERENCES `endereco_assistido` (`idEndereco_Assistido`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Assistido_Defensoria_Endereco_Profissional1` FOREIGN KEY (`Endereco_Profissional_idEndereco_Profissional`) REFERENCES `endereco_profissional` (`idEndereco_Profissional`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `assistido_npj`
--
ALTER TABLE `assistido_npj`
  ADD CONSTRAINT `fk_Assistido_NPJ_Documentos_Assistido1` FOREIGN KEY (`Documentos_Assistido_idDocumentos_Assistidos`) REFERENCES `documentos_assistido` (`idDocumentos_Assistidos`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Assistido_NPJ_Endereco_Assistido1` FOREIGN KEY (`Endereco_Assistido_idEndereco_Assistido`) REFERENCES `endereco_assistido` (`idEndereco_Assistido`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Assistido_NPJ_Endereco_Profissional1` FOREIGN KEY (`Endereco_Profissional_idEndereco_Profissional`) REFERENCES `endereco_profissional` (`idEndereco_Profissional`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `atendimento_defensoria`
--
ALTER TABLE `atendimento_defensoria`
  ADD CONSTRAINT `fk_Atendimento_Defensoria_Assistido_Defensoria1` FOREIGN KEY (`Assistido_Defensoria_idAssistidoDefensoria`) REFERENCES `assistido_defensoria` (`idAssistidoDefensoria`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Atendimento_Defensoria_Assunto_Atendimento1` FOREIGN KEY (`Assunto_Atendimento_idAssunto_Atendimento`) REFERENCES `assunto_atendimento` (`idAssunto_Atendimento`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Atendimento_Defensoria_Documentos_Atendimento1` FOREIGN KEY (`Documentos_Atendimento_idDocumentos`) REFERENCES `documentos_atendimento` (`idDocumentos`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Atendimento_Defensoria_Requerido1` FOREIGN KEY (`Requerido_idRequerido`) REFERENCES `requerido` (`idRequerido`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Atendimento_Defensoria_Usuario1` FOREIGN KEY (`Usuario_idUsuario`) REFERENCES `usuario` (`idUsuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `atendimento_npj`
--
ALTER TABLE `atendimento_npj`
  ADD CONSTRAINT `fk_Atendimento_NPJ_Assistido_NPJ1` FOREIGN KEY (`Assistido_NPJ_idAssistido_NPJ`) REFERENCES `assistido_npj` (`idAssistido_NPJ`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Atendimento_NPJ_Assunto_Atendimento1` FOREIGN KEY (`Assunto_Atendimento_idAssunto_Atendimento`) REFERENCES `assunto_atendimento` (`idAssunto_Atendimento`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Atendimento_NPJ_Documentos_Atendimento1` FOREIGN KEY (`Documentos_Atendimento_idDocumentos`) REFERENCES `documentos_atendimento` (`idDocumentos`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Atendimento_NPJ_Requerido1` FOREIGN KEY (`Requerido_idRequerido`) REFERENCES `requerido` (`idRequerido`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Atendimento_NPJ_Usuario1` FOREIGN KEY (`Usuario_idUsuario`) REFERENCES `usuario` (`idUsuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `requerido`
--
ALTER TABLE `requerido`
  ADD CONSTRAINT `fk_Requerido_Documentos_Requerido1` FOREIGN KEY (`Documentos_Requerido_idDocumentos_Requerido`) REFERENCES `documentos_requerido` (`idDocumentos_Requerido`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Requerido_Endereco_Profissional1` FOREIGN KEY (`Endereco_Profissional_idEndereco_Profissional`) REFERENCES `endereco_profissional` (`idEndereco_Profissional`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Requerido_Endereco_Requerido1` FOREIGN KEY (`Endereco_Requerido_idEndereco_Requerido`) REFERENCES `endereco_requerido` (`idEndereco_Requerido`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `telefone_assistido_defensoria`
--
ALTER TABLE `telefone_assistido_defensoria`
  ADD CONSTRAINT `fk_Telefone_Assistido_Defensoria_Assistido_Defensoria1` FOREIGN KEY (`Assistido_Defensoria_idAssistidoDefensoria`) REFERENCES `assistido_defensoria` (`idAssistidoDefensoria`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `telefone_assistido_npj`
--
ALTER TABLE `telefone_assistido_npj`
  ADD CONSTRAINT `fk_Telefone_Assistido_NPJ_Assistido_NPJ1` FOREIGN KEY (`Assistido_NPJ_idAssistido_NPJ`) REFERENCES `assistido_npj` (`idAssistido_NPJ`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `telefone_requerido`
--
ALTER TABLE `telefone_requerido`
  ADD CONSTRAINT `fk_Telefone_Requerido_Requerido1` FOREIGN KEY (`Requerido_idRequerido`) REFERENCES `requerido` (`idRequerido`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
