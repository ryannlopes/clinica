-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 13/06/2023 às 05:53
-- Versão do servidor: 10.4.28-MariaDB
-- Versão do PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `clinica`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `consulta`
--

CREATE TABLE `consulta` (
  `idConsulta` int(11) NOT NULL,
  `id_paciente` int(11) NOT NULL,
  `id_medico` int(11) NOT NULL,
  `dataConsulta` varchar(30) NOT NULL,
  `horaConsulta` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `consulta`
--

INSERT INTO `consulta` (`idConsulta`, `id_paciente`, `id_medico`, `dataConsulta`, `horaConsulta`) VALUES
(3, 3, 2, '2023-06-13', '17:30'),
(4, 1, 1, '2023-06-24', ''),
(5, 1, 1, '2023-06-17', '15:30'),
(7, 1, 2, '2023-06-13', '15:30'),
(8, 2, 2, '2023-06-13', '16:30'),
(9, 2, 2, '2023-06-13', '13:30'),
(10, 2, 2, '2023-06-13', '18:00'),
(11, 5, 3, '2023-06-14', '17:30'),
(12, 7, 3, '2023-06-14', '17:00');

-- --------------------------------------------------------

--
-- Estrutura para tabela `especialidade`
--

CREATE TABLE `especialidade` (
  `idEspecialidade` int(11) NOT NULL,
  `descricaoEspecialidade` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `especialidade`
--

INSERT INTO `especialidade` (`idEspecialidade`, `descricaoEspecialidade`) VALUES
(5, 'Clinico Geral'),
(6, 'Pediatra'),
(8, 'Nutricionista'),
(9, 'Dentista');

-- --------------------------------------------------------

--
-- Estrutura para tabela `medico`
--

CREATE TABLE `medico` (
  `idMedico` int(11) NOT NULL,
  `nomeMedico` varchar(50) NOT NULL,
  `crmMedico` varchar(50) NOT NULL,
  `idadeMedico` int(11) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `medico`
--

INSERT INTO `medico` (`idMedico`, `nomeMedico`, `crmMedico`, `idadeMedico`, `email`) VALUES
(3, 'Paulo Muzy', 'CRM/SP 123456', 45, 'paulo@muzy.com'),
(4, 'Ray', 'CRM/SP 123456', 51, 'ray@ray.com'),
(5, 'Alciomar', 'CRM/SP 123456', 34, 'alciomar@nota10.com');

-- --------------------------------------------------------

--
-- Estrutura para tabela `medicoespecialidade`
--

CREATE TABLE `medicoespecialidade` (
  `id` int(11) NOT NULL,
  `id_medico` int(11) NOT NULL,
  `id_especialidade` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `medicoespecialidade`
--

INSERT INTO `medicoespecialidade` (`id`, `id_medico`, `id_especialidade`) VALUES
(6, 5, 6),
(7, 3, 5),
(8, 3, 8),
(9, 4, 6);

-- --------------------------------------------------------

--
-- Estrutura para tabela `paciente`
--

CREATE TABLE `paciente` (
  `idPaciente` int(11) NOT NULL,
  `nomePaciente` varchar(50) NOT NULL,
  `idadePaciente` int(11) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `paciente`
--

INSERT INTO `paciente` (`idPaciente`, `nomePaciente`, `idadePaciente`, `email`) VALUES
(5, 'Camila Oliveira', 19, 'camila@teste.com'),
(6, 'Ana Paula', 23, 'ana@teste.com'),
(7, 'Ryan Lopes', 20, 'ryan@teste.com'),
(8, 'Fabio Stori', 20, 'fabin@stori.com');

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuario`
--

CREATE TABLE `usuario` (
  `idUser` int(11) NOT NULL,
  `nomeUser` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `usuario`
--

INSERT INTO `usuario` (`idUser`, `nomeUser`, `username`, `password`) VALUES
(4, 'Camila', 'camila', 'admin'),
(5, 'Ana Paula', 'ana', 'ana');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `consulta`
--
ALTER TABLE `consulta`
  ADD PRIMARY KEY (`idConsulta`),
  ADD KEY `id_medico` (`id_medico`),
  ADD KEY `id_paciente` (`id_paciente`);

--
-- Índices de tabela `especialidade`
--
ALTER TABLE `especialidade`
  ADD PRIMARY KEY (`idEspecialidade`);

--
-- Índices de tabela `medico`
--
ALTER TABLE `medico`
  ADD PRIMARY KEY (`idMedico`);

--
-- Índices de tabela `medicoespecialidade`
--
ALTER TABLE `medicoespecialidade`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_especialidade` (`id_especialidade`),
  ADD KEY `id_medico` (`id_medico`);

--
-- Índices de tabela `paciente`
--
ALTER TABLE `paciente`
  ADD PRIMARY KEY (`idPaciente`);

--
-- Índices de tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idUser`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `consulta`
--
ALTER TABLE `consulta`
  MODIFY `idConsulta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de tabela `especialidade`
--
ALTER TABLE `especialidade`
  MODIFY `idEspecialidade` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de tabela `medico`
--
ALTER TABLE `medico`
  MODIFY `idMedico` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `medicoespecialidade`
--
ALTER TABLE `medicoespecialidade`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de tabela `paciente`
--
ALTER TABLE `paciente`
  MODIFY `idPaciente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idUser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `medicoespecialidade`
--
ALTER TABLE `medicoespecialidade`
  ADD CONSTRAINT `medicoespecialidade_ibfk_1` FOREIGN KEY (`id_especialidade`) REFERENCES `especialidade` (`idEspecialidade`) ON DELETE CASCADE,
  ADD CONSTRAINT `medicoespecialidade_ibfk_2` FOREIGN KEY (`id_medico`) REFERENCES `medico` (`idMedico`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
