-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 13-Jun-2017 às 04:30
-- Versão do servidor: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tcc`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `aluno`
--

CREATE TABLE `aluno` (
  `matricula` varchar(10) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `curso` varchar(50) NOT NULL,
  `senha` varchar(20) NOT NULL,
  `siapeProfOrientador` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `areainteresse`
--

CREATE TABLE `areainteresse` (
  `codInteresse` int(11) NOT NULL,
  `descricao` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `avaliacao`
--

CREATE TABLE `avaliacao` (
  `codAvaliacao` int(11) NOT NULL,
  `nota` varchar(5) DEFAULT NULL,
  `observacao` varchar(500) DEFAULT NULL,
  `siape` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `avaliamono`
--

CREATE TABLE `avaliamono` (
  `codAvaliacao` int(11) NOT NULL,
  `codMono` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `bancaavaliadora`
--

CREATE TABLE `bancaavaliadora` (
  `siapeBanca1` varchar(20) NOT NULL,
  `siapeBanca2` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Estrutura da tabela `coordenador`
--

CREATE TABLE `coordenador` (
  `siapeProfCoordenador` varchar(45) NOT NULL,
  `nomeCoordenador` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `interesseprof`
--

CREATE TABLE `interesseprof` (
  `codInteresse` int(11) DEFAULT NULL,
  `siape` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `monografia`
--

CREATE TABLE `monografia` (
  `codMono` int(11) NOT NULL,
  `versao` varchar(10) DEFAULT NULL,
  `titulo` varchar(100) DEFAULT NULL,
  `matricula` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `professor`
--

CREATE TABLE `professor` (
  `siape` varchar(20) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `senha` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aluno`
--
ALTER TABLE `aluno`
  ADD PRIMARY KEY (`matricula`),
  ADD KEY `siapeOrientador` (`siapeProfOrientador`);

--
-- Indexes for table `areainteresse`
--
ALTER TABLE `areainteresse`
  ADD PRIMARY KEY (`codInteresse`);

--
-- Indexes for table `avaliacao`
--
ALTER TABLE `avaliacao`
  ADD PRIMARY KEY (`codAvaliacao`),
  ADD KEY `siape` (`siape`);

--
-- Indexes for table `avaliamono`
--
ALTER TABLE `avaliamono`
  ADD KEY `codAvaliacao` (`codAvaliacao`),
  ADD KEY `codMono` (`codMono`);

--
-- Indexes for table `bancaavaliadora`
--
ALTER TABLE `bancaavaliadora`
  ADD KEY `siapeAvaliadorI` (`siapeBanca1`),
  ADD KEY `siapeAvaliadorII` (`siapeBanca2`);

--
-- Indexes for table `coordenador`
--
ALTER TABLE `coordenador`
  ADD PRIMARY KEY (`siapeProfCoordenador`),
  ADD KEY `siapeProfCoordenador` (`siapeProfCoordenador`);

--
-- Indexes for table `interesseprof`
--
ALTER TABLE `interesseprof`
  ADD KEY `codInteresse` (`codInteresse`),
  ADD KEY `siape` (`siape`);

--
-- Indexes for table `monografia`
--
ALTER TABLE `monografia`
  ADD PRIMARY KEY (`codMono`),
  ADD KEY `matricula` (`matricula`);

--
-- Indexes for table `professor`
--
ALTER TABLE `professor`
  ADD PRIMARY KEY (`siape`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `areainteresse`
--
ALTER TABLE `areainteresse`
  MODIFY `codInteresse` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `avaliacao`
--
ALTER TABLE `avaliacao`
  MODIFY `codAvaliacao` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `monografia`
--
ALTER TABLE `monografia`
  MODIFY `codMono` int(11) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `aluno`
--
ALTER TABLE `aluno`
  ADD CONSTRAINT `aluno_ibfk_1` FOREIGN KEY (`siapeProfOrientador`) REFERENCES `professor` (`siape`);

--
-- Limitadores para a tabela `avaliacao`
--
ALTER TABLE `avaliacao`
  ADD CONSTRAINT `avaliacao_ibfk_1` FOREIGN KEY (`siape`) REFERENCES `professor` (`siape`);

--
-- Limitadores para a tabela `avaliamono`
--
ALTER TABLE `avaliamono`
  ADD CONSTRAINT `avaliamono_ibfk_1` FOREIGN KEY (`codAvaliacao`) REFERENCES `avaliacao` (`codAvaliacao`),
  ADD CONSTRAINT `avaliamono_ibfk_2` FOREIGN KEY (`codMono`) REFERENCES `monografia` (`codMono`);

--
-- Limitadores para a tabela `bancaavaliadora`
--
ALTER TABLE `bancaavaliadora`
  ADD CONSTRAINT `bancaavaliadora_ibfk_1` FOREIGN KEY (`siapeBanca1`) REFERENCES `professor` (`siape`),
  ADD CONSTRAINT `bancaavaliadora_ibfk_2` FOREIGN KEY (`siapeBanca2`) REFERENCES `professor` (`siape`);

--
-- Limitadores para a tabela `interesseprof`
--
ALTER TABLE `interesseprof`
  ADD CONSTRAINT `interesseprof_ibfk_1` FOREIGN KEY (`codInteresse`) REFERENCES `areainteresse` (`codInteresse`),
  ADD CONSTRAINT `interesseprof_ibfk_2` FOREIGN KEY (`siape`) REFERENCES `professor` (`siape`);

--
-- Limitadores para a tabela `monografia`
--
ALTER TABLE `monografia`
  ADD CONSTRAINT `monografia_ibfk_1` FOREIGN KEY (`matricula`) REFERENCES `aluno` (`matricula`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
