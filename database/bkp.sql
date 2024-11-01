-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 03/09/2024 às 23:05
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `empresateste`
--

CREATE DATABASE empresateste;

USE empresateste;

-- --------------------------------------------------------

--
-- Estrutura para tabela `cargo`
--

CREATE TABLE `cargo` (
  `nomeCargo` varchar(50) NOT NULL,
  `salario` decimal(8,2) NOT NULL,
  `codCargo` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `cargo`
--

INSERT INTO `cargo` (`nomeCargo`, `salario`, `codCargo`, `created_at`, `updated_at`) VALUES
('Programador Jr', 2600.00, 1, '2024-08-30 09:23:00', NULL),
('Programador Pleno', 5400.00, 2, '2024-08-30 09:23:00', NULL),
('Programador Sênior', 7800.00, 3, '2024-08-30 09:23:00', NULL);

-- --------------------------------------------------------

--
-- Estrutura para tabela `departamento`
--

CREATE TABLE `departamento` (
  `nomeDepartamento` varchar(45) NOT NULL,
  `codDepartamento` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `departamento`
--

INSERT INTO `departamento` (`nomeDepartamento`, `codDepartamento`, `created_at`, `updated_at`) VALUES
('Backend', 1, '2024-08-30 09:24:00', NULL),
('Frontend', 2, '2024-08-30 09:24:00', NULL),
('Fullstack', 3, '2024-08-30 09:24:00', NULL);

-- --------------------------------------------------------

--
-- Estrutura para tabela `funcionario`
--

CREATE TABLE `funcionario` (
  `funcional` int(11) NOT NULL,
  `cpf` char(14) NOT NULL,
  `nome` varchar(40) NOT NULL,
  `telefone` char(15) DEFAULT NULL,
  `endereco` varchar(70) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `image_url` varchar(80) DEFAULT NULL,
  `codDepartamento` int(11) NOT NULL,
  `codCargo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `funcionario`
--

INSERT INTO `funcionario` (`funcional`, `cpf`, `nome`, `telefone`, `endereco`, `created_at`, `updated_at`, `image_url`, `codDepartamento`, `codCargo`) VALUES
(1, '259.689.211-02', 'Fernando Henrique Cardozo', '(11) 93445-5420', 'Parque Vitória / Franco da Rocha SP', '2024-08-30 09:25:00', '2024-09-03 17:56:00', 'view/img/funcionario/1725397013_pessoa.jpg', 1, 2),
(2, '168.925.552-02', 'José Antonio Vasquez', '(11) 99923-2876', 'Av. Antonia Leopodina / Caieras SP', '2024-08-30 09:29:00', '2024-09-03 14:59:00', 'view/img/funcionario/1725386340_pessoa2.jpg', 1, 1),
(3, '123.658.854-88', 'Fernanda Noemia da Silva', '(11) 93355-5689', 'Parque Vila Lobo / Francisco Morato SP', '2024-09-03 15:56:00', '2024-09-03 16:11:00', 'view/img/funcionario/1725390649_pessoa3.jpg', 2, 2),
(4, '255.666.898-25', 'Antonio Lima de Rafael', '(11) 99923-6899', 'Antonio de Solza / São Paulo SP', '2024-09-03 17:40:00', NULL, 'view/img/funcionario/1725396113_pessoa4.jpg', 3, 3);

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `funcional` int(11) NOT NULL,
  `status` tinyint(1) DEFAULT 0,
  `deleted` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `usuario`
--

INSERT INTO `usuario` (`id`, `email`, `senha`, `funcional`, `deleted`, `status`) VALUES
(1, 'admin@email.com', '$2y$10$Y8.CyNCQqIgZ2BfwJI4viOfbrrcl6T2pdHOYcHaCbLuGaJGp5J5Uu', 1, 0, 1),
(2, 'joseantonio123@email.com', '$2y$10$Y8.CyNCQqIgZ2BfwJI4viOfbrrcl6T2pdHOYcHaCbLuGaJGp5J5Uu', 2, 0, 0),
(3, 'fernanda_noemia@email.com', '$2y$10$Y8.CyNCQqIgZ2BfwJI4viOfbrrcl6T2pdHOYcHaCbLuGaJGp5J5Uu', 3, 0, 0),
(4, 'luquinhas32@email.com', '$2y$10$Y8.CyNCQqIgZ2BfwJI4viOfbrrcl6T2pdHOYcHaCbLuGaJGp5J5Uu',4, 0, 0);

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `cargo`
--
ALTER TABLE `cargo`
  ADD PRIMARY KEY (`codCargo`),
  ADD UNIQUE KEY `nomeCargo` (`nomeCargo`);

--
-- Índices de tabela `departamento`
--
ALTER TABLE `departamento`
  ADD PRIMARY KEY (`codDepartamento`),
  ADD UNIQUE KEY `uqDepto` (`nomeDepartamento`);

--
-- Índices de tabela `funcionario`
--
ALTER TABLE `funcionario`
  ADD PRIMARY KEY (`funcional`),
  ADD UNIQUE KEY `cpf` (`cpf`),
  ADD UNIQUE KEY `uqcpf` (`cpf`),
  ADD KEY `fkfuncDepto` (`codDepartamento`),
  ADD KEY `fkCargoFunc` (`codCargo`);

--
-- Índices de tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `funcional` (`funcional`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `cargo`
--
ALTER TABLE `cargo`
  MODIFY `codCargo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `departamento`
--
ALTER TABLE `departamento`
  MODIFY `codDepartamento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `funcionario`
--
ALTER TABLE `funcionario`
  MODIFY `funcional` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `funcionario`
--
ALTER TABLE `funcionario`
  ADD CONSTRAINT `fkCargoFunc` FOREIGN KEY (`codCargo`) REFERENCES `cargo` (`codCargo`),
  ADD CONSTRAINT `fkfuncDepto` FOREIGN KEY (`codDepartamento`) REFERENCES `departamento` (`codDepartamento`);

--
-- Restrições para tabelas `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `FK_funcionario_funcional` FOREIGN KEY (`funcional`) REFERENCES `funcionario` (`funcional`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;