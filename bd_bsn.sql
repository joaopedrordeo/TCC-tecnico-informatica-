-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 18-Nov-2019 às 23:53
-- Versão do servidor: 10.4.6-MariaDB
-- versão do PHP: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `bd_bsn`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `aluno`
--

CREATE TABLE `aluno` (
  `Id_Aluno` int(11) NOT NULL,
  `Nome_aluno` varchar(150) DEFAULT NULL,
  `Sexo` varchar(1) DEFAULT NULL,
  `CPF` varchar(14) DEFAULT NULL,
  `Data_nasc_aluno` date DEFAULT NULL,
  `Estado_civil` varchar(100) DEFAULT NULL,
  `Escolaridade` varchar(100) DEFAULT NULL,
  `Profissao` varchar(200) DEFAULT NULL,
  `Endereco` varchar(200) DEFAULT NULL,
  `Num_residencia` decimal(5,0) DEFAULT NULL,
  `Bairro` varchar(200) DEFAULT NULL,
  `CEP` varchar(9) DEFAULT NULL,
  `Email` varchar(200) DEFAULT NULL,
  `Celular` varchar(14) DEFAULT NULL,
  `Altura` decimal(3,2) DEFAULT NULL,
  `Peso` decimal(4,1) DEFAULT NULL,
  `Probl_saude` text DEFAULT NULL,
  `Id_login` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `aluno`
--

INSERT INTO `aluno` (`Id_Aluno`, `Nome_aluno`, `Sexo`, `CPF`, `Data_nasc_aluno`, `Estado_civil`, `Escolaridade`, `Profissao`, `Endereco`, `Num_residencia`, `Bairro`, `CEP`, `Email`, `Celular`, `Altura`, `Peso`, `Probl_saude`, `Id_login`) VALUES
(30, 'Daniel', 'm', '030.182.030-97', '2002-03-15', 'solteiro', 'emc', ' ', '', '122', '', '', 'teste@teste.com', '', '1.80', '80.0', '', 111);

-- --------------------------------------------------------

--
-- Estrutura da tabela `avaliacao`
--

CREATE TABLE `avaliacao` (
  `id_ava` int(11) NOT NULL,
  `p1` varchar(1) DEFAULT NULL,
  `p2` varchar(1) DEFAULT NULL,
  `p3` varchar(1) DEFAULT NULL,
  `p4` varchar(1) DEFAULT NULL,
  `p5` varchar(1) DEFAULT NULL,
  `p6` varchar(1) DEFAULT NULL,
  `p7` varchar(1) DEFAULT NULL,
  `p8` varchar(1) DEFAULT NULL,
  `p9` varchar(1) DEFAULT NULL,
  `p10` varchar(1) DEFAULT NULL,
  `id_ft` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `avaliacao`
--

INSERT INTO `avaliacao` (`id_ava`, `p1`, `p2`, `p3`, `p4`, `p5`, `p6`, `p7`, `p8`, `p9`, `p10`, `id_ft`) VALUES
(1, 's', 's', '', '', '', '', '', '', '', '', 28);

-- --------------------------------------------------------

--
-- Estrutura da tabela `exercicio`
--

CREATE TABLE `exercicio` (
  `Id_ex` int(11) NOT NULL,
  `Ex_nome` varchar(200) DEFAULT NULL,
  `Ex_carga` decimal(4,1) DEFAULT NULL,
  `Ex_serie` decimal(3,0) DEFAULT NULL,
  `Ex_repeticao` decimal(3,0) DEFAULT NULL,
  `Ex_dia` varchar(50) DEFAULT NULL,
  `Id_ft` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `exercicio`
--

INSERT INTO `exercicio` (`Id_ex`, `Ex_nome`, `Ex_carga`, `Ex_serie`, `Ex_repeticao`, `Ex_dia`, `Id_ft`) VALUES
(1, 'Agachamento', '1.0', '1', '1', 'Domingo', 28),
(2, 'Agachamento', '1.0', '1', '1', 'Quinta', 28),
(3, 'Agachamento', '1.0', '1', '1', 'Sabado', 28);

-- --------------------------------------------------------

--
-- Estrutura da tabela `ficha_de_treino`
--

CREATE TABLE `ficha_de_treino` (
  `Id_ft` int(11) NOT NULL,
  `Id_Aluno` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `ficha_de_treino`
--

INSERT INTO `ficha_de_treino` (`Id_ft`, `Id_Aluno`) VALUES
(28, 30);

-- --------------------------------------------------------

--
-- Estrutura da tabela `personal`
--

CREATE TABLE `personal` (
  `Id_login` int(11) NOT NULL,
  `Usuario` varchar(30) DEFAULT NULL,
  `Senha` varchar(32) DEFAULT NULL,
  `Email` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `personal`
--

INSERT INTO `personal` (`Id_login`, `Usuario`, `Senha`, `Email`) VALUES
(111, 'teste', '698dc19d489c4e4db73e28a713eab07b', 'teste@teste.com');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `aluno`
--
ALTER TABLE `aluno`
  ADD PRIMARY KEY (`Id_Aluno`),
  ADD KEY `aluno_ibfk_1` (`Id_login`);

--
-- Índices para tabela `avaliacao`
--
ALTER TABLE `avaliacao`
  ADD PRIMARY KEY (`id_ava`),
  ADD KEY `avaliacao_ibfk_1` (`id_ft`);

--
-- Índices para tabela `exercicio`
--
ALTER TABLE `exercicio`
  ADD PRIMARY KEY (`Id_ex`),
  ADD KEY `Id_ft` (`Id_ft`);

--
-- Índices para tabela `ficha_de_treino`
--
ALTER TABLE `ficha_de_treino`
  ADD PRIMARY KEY (`Id_ft`),
  ADD KEY `ficha_de_treino_ibfk_1` (`Id_Aluno`);

--
-- Índices para tabela `personal`
--
ALTER TABLE `personal`
  ADD PRIMARY KEY (`Id_login`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `aluno`
--
ALTER TABLE `aluno`
  MODIFY `Id_Aluno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT de tabela `avaliacao`
--
ALTER TABLE `avaliacao`
  MODIFY `id_ava` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `exercicio`
--
ALTER TABLE `exercicio`
  MODIFY `Id_ex` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `ficha_de_treino`
--
ALTER TABLE `ficha_de_treino`
  MODIFY `Id_ft` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT de tabela `personal`
--
ALTER TABLE `personal`
  MODIFY `Id_login` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=112;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `aluno`
--
ALTER TABLE `aluno`
  ADD CONSTRAINT `aluno_ibfk_1` FOREIGN KEY (`Id_login`) REFERENCES `personal` (`Id_login`) ON DELETE CASCADE;

--
-- Limitadores para a tabela `avaliacao`
--
ALTER TABLE `avaliacao`
  ADD CONSTRAINT `avaliacao_ibfk_1` FOREIGN KEY (`id_ft`) REFERENCES `ficha_de_treino` (`Id_ft`) ON DELETE CASCADE;

--
-- Limitadores para a tabela `exercicio`
--
ALTER TABLE `exercicio`
  ADD CONSTRAINT `Id_ft` FOREIGN KEY (`Id_ft`) REFERENCES `ficha_de_treino` (`Id_ft`) ON DELETE CASCADE,
  ADD CONSTRAINT `exercicio_ibfk_1` FOREIGN KEY (`Id_ft`) REFERENCES `ficha_de_treino` (`Id_ft`);

--
-- Limitadores para a tabela `ficha_de_treino`
--
ALTER TABLE `ficha_de_treino`
  ADD CONSTRAINT `Id_Aluno` FOREIGN KEY (`Id_Aluno`) REFERENCES `aluno` (`Id_Aluno`) ON DELETE CASCADE,
  ADD CONSTRAINT `ficha_de_treino_ibfk_1` FOREIGN KEY (`Id_Aluno`) REFERENCES `aluno` (`Id_Aluno`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
