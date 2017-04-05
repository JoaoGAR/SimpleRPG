-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 23-Fev-2016 às 16:03
-- Versão do servidor: 5.6.21
-- PHP Version: 5.5.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `simplerpg`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `personagem`
--

CREATE TABLE IF NOT EXISTS `personagem` (
`id_personagem` int(11) NOT NULL,
  `id_dono` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `raca` int(11) NOT NULL,
  `vertente` int(11) NOT NULL,
  `nivel` int(11) NOT NULL DEFAULT '1',
  `status` int(11) NOT NULL,
  `talentos` int(11) NOT NULL,
  `posicao` varchar(50) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Extraindo dados da tabela `personagem`
--

INSERT INTO `personagem` (`id_personagem`, `id_dono`, `nome`, `raca`, `vertente`, `nivel`, `status`, `talentos`, `posicao`) VALUES
(5, 5, 'Bilugoso', 2, 5, 1, 1, 4, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `racas`
--

CREATE TABLE IF NOT EXISTS `racas` (
`id_raca` int(11) NOT NULL,
  `nome_raca` varchar(10) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Extraindo dados da tabela `racas`
--

INSERT INTO `racas` (`id_raca`, `nome_raca`) VALUES
(1, 'Humano'),
(2, 'Elfo'),
(3, 'Anão');

-- --------------------------------------------------------

--
-- Estrutura da tabela `status`
--

CREATE TABLE IF NOT EXISTS `status` (
`id_status` int(11) NOT NULL,
  `vida` int(11) NOT NULL,
  `energia` int(11) NOT NULL DEFAULT '10',
  `desmaiado` tinyint(1) NOT NULL DEFAULT '0',
  `dinheiro` int(11) NOT NULL,
  `experiencia` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `status`
--

INSERT INTO `status` (`id_status`, `vida`, `energia`, `desmaiado`, `dinheiro`, `experiencia`) VALUES
(1, 5, 10, 0, 0, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `talentos`
--

CREATE TABLE IF NOT EXISTS `talentos` (
`id_talentos` int(11) NOT NULL,
  `constituicao` int(11) NOT NULL DEFAULT '0',
  `vigor` int(11) NOT NULL DEFAULT '0',
  `resistencia` int(11) NOT NULL DEFAULT '0',
  `aparencia` int(11) NOT NULL DEFAULT '0',
  `mira` int(11) NOT NULL DEFAULT '0',
  `pericia` int(11) NOT NULL DEFAULT '0',
  `estrategia` int(11) NOT NULL DEFAULT '0',
  `evasao` int(11) NOT NULL DEFAULT '0',
  `criatividade` int(11) NOT NULL DEFAULT '0',
  `natureza` int(11) NOT NULL DEFAULT '0',
  `inteligencia` int(11) NOT NULL DEFAULT '0',
  `percepcao` int(11) NOT NULL DEFAULT '0',
  `lideranca` int(11) NOT NULL DEFAULT '0',
  `empenho` int(11) NOT NULL DEFAULT '0',
  `confianca` int(11) NOT NULL DEFAULT '0',
  `instinto_animal` int(11) NOT NULL DEFAULT '0',
  `arcanismo` int(11) NOT NULL DEFAULT '0',
  `liturgia` int(11) NOT NULL DEFAULT '0',
  `ocultismo` int(11) NOT NULL DEFAULT '0',
  `disfarce` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Extraindo dados da tabela `talentos`
--

INSERT INTO `talentos` (`id_talentos`, `constituicao`, `vigor`, `resistencia`, `aparencia`, `mira`, `pericia`, `estrategia`, `evasao`, `criatividade`, `natureza`, `inteligencia`, `percepcao`, `lideranca`, `empenho`, `confianca`, `instinto_animal`, `arcanismo`, `liturgia`, `ocultismo`, `disfarce`) VALUES
(4, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `trabalho_execucao`
--

CREATE TABLE IF NOT EXISTS `trabalho_execucao` (
`id_execucao` int(11) NOT NULL,
  `id_trabalho` int(11) NOT NULL,
  `id_personagem` int(11) NOT NULL,
  `hora_inicial` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `tempo_escolhido` varchar(3) NOT NULL,
  `concluido` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Extraindo dados da tabela `trabalho_execucao`
--

INSERT INTO `trabalho_execucao` (`id_execucao`, `id_trabalho`, `id_personagem`, `hora_inicial`, `tempo_escolhido`, `concluido`) VALUES
(15, 3, 5, '2016-02-22 17:34:29', '30', 1),
(16, 4, 5, '2016-02-22 18:04:29', '30', 1),
(18, 7, 5, '2016-02-22 18:34:29', '60', 1),
(19, 4, 5, '2016-02-22 19:04:29', '30', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
`id_usuario` int(11) NOT NULL,
  `email` varchar(40) NOT NULL,
  `senha` varchar(30) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `email`, `senha`) VALUES
(5, 'jgarchanjo@gmail.com', '01010125');

-- --------------------------------------------------------

--
-- Estrutura da tabela `vertentes`
--

CREATE TABLE IF NOT EXISTS `vertentes` (
`id_vertente` int(11) NOT NULL,
  `id_raca` int(11) NOT NULL,
  `nome_vertente` varchar(20) NOT NULL,
  `brasao` varchar(50) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Extraindo dados da tabela `vertentes`
--

INSERT INTO `vertentes` (`id_vertente`, `id_raca`, `nome_vertente`, `brasao`) VALUES
(1, 1, 'Creysionista', 'images/heraldry/brasao/heraldica-humano-cresy.jpg'),
(2, 1, 'Antecreysionista', 'images/heraldry/brasao/heraldica-humano-ante.jpg'),
(3, 1, 'Uteista', 'images/heraldry/brasao/heraldica-humano-ute.jpg'),
(4, 2, 'Elfo da Montanha', 'images/heraldry/brasao/heraldica-elfo-montanha.jpg'),
(5, 2, 'Elfo da Floresta', 'images/heraldry/brasao/heraldica-elfo-floresta.jpg'),
(6, 2, 'Elfo da Cidade', 'images/heraldry/brasao/heraldica-elfo-cidade.jpg'),
(7, 3, 'Elite', 'images/heraldry/brasao/heraldica-anao-elite.jpg'),
(8, 3, 'Mineirador', 'images/heraldry/brasao/heraldica-anao-mine.jpg'),
(9, 3, 'Exilado', 'images/heraldry/brasao/heraldica-anao-exilado.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `personagem`
--
ALTER TABLE `personagem`
 ADD PRIMARY KEY (`id_personagem`);

--
-- Indexes for table `racas`
--
ALTER TABLE `racas`
 ADD PRIMARY KEY (`id_raca`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
 ADD PRIMARY KEY (`id_status`);

--
-- Indexes for table `talentos`
--
ALTER TABLE `talentos`
 ADD PRIMARY KEY (`id_talentos`);

--
-- Indexes for table `trabalho_execucao`
--
ALTER TABLE `trabalho_execucao`
 ADD PRIMARY KEY (`id_execucao`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
 ADD PRIMARY KEY (`id_usuario`);

--
-- Indexes for table `vertentes`
--
ALTER TABLE `vertentes`
 ADD PRIMARY KEY (`id_vertente`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `personagem`
--
ALTER TABLE `personagem`
MODIFY `id_personagem` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `racas`
--
ALTER TABLE `racas`
MODIFY `id_raca` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
MODIFY `id_status` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `talentos`
--
ALTER TABLE `talentos`
MODIFY `id_talentos` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `trabalho_execucao`
--
ALTER TABLE `trabalho_execucao`
MODIFY `id_execucao` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `vertentes`
--
ALTER TABLE `vertentes`
MODIFY `id_vertente` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
