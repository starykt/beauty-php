-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3333
-- Tempo de geração: 14-Nov-2022 às 19:08
-- Versão do servidor: 10.4.25-MariaDB
-- versão do PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `esteticaclinica`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `agendamento`
--

CREATE TABLE `agendamento` (
  `idAgendamento` int(11) NOT NULL,
  `data` date NOT NULL,
  `hora` time NOT NULL,
  `status` varchar(50) NOT NULL,
  `tipoPagamento` varchar(40) NOT NULL,
  `idCliente` int(11) NOT NULL,
  `idServico` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `atendente`
--

CREATE TABLE `atendente` (
  `idAtendente` int(11) NOT NULL,
  `nome` varchar(144) NOT NULL,
  `cpf` varchar(14) NOT NULL,
  `cargo` varchar(30) NOT NULL,
  `dataNasc` date NOT NULL,
  `salario` double NOT NULL,
  `email` varchar(144) NOT NULL,
  `senha` varchar(20) NOT NULL,
  `endereco` varchar(144) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `catalogo`
--

CREATE TABLE `catalogo` (
  `idCatalogo` int(11) NOT NULL,
  `nome` varchar(144) NOT NULL,
  `tipo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `cliente`
--

CREATE TABLE `cliente` (
  `idCliente` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `cpf` varchar(14) NOT NULL,
  `endereco` varchar(144) NOT NULL,
  `telefone` varchar(14) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `desconto`
--

CREATE TABLE `desconto` (
  `idDesconto` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `valor` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `notas`
--

CREATE TABLE `notas` (
  `idNota` int(11) NOT NULL,
  `nome` varchar(144) NOT NULL,
  `descricao` varchar(144) NOT NULL,
  `status` varchar(50) NOT NULL,
  `idAtendente` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `servico`
--

CREATE TABLE `servico` (
  `idServico` int(11) NOT NULL,
  `nome` varchar(144) NOT NULL,
  `valor` double NOT NULL,
  `idCatalogo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `servicoagendado`
--

CREATE TABLE `servicoagendado` (
  `idServico` int(11) NOT NULL,
  `idAgendamento` int(11) NOT NULL,
  `idDesconto` int(11) NOT NULL,
  `subtotal` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `agendamento`
--
ALTER TABLE `agendamento`
  ADD PRIMARY KEY (`idAgendamento`),
  ADD KEY `cliente_FK` (`idCliente`),
  ADD KEY `servico_FK` (`idServico`);

--
-- Índices para tabela `atendente`
--
ALTER TABLE `atendente`
  ADD PRIMARY KEY (`idAtendente`);

--
-- Índices para tabela `catalogo`
--
ALTER TABLE `catalogo`
  ADD PRIMARY KEY (`idCatalogo`);

--
-- Índices para tabela `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`idCliente`);

--
-- Índices para tabela `desconto`
--
ALTER TABLE `desconto`
  ADD PRIMARY KEY (`idDesconto`);

--
-- Índices para tabela `notas`
--
ALTER TABLE `notas`
  ADD PRIMARY KEY (`idNota`),
  ADD KEY `atendente_FK` (`idAtendente`);

--
-- Índices para tabela `servico`
--
ALTER TABLE `servico`
  ADD PRIMARY KEY (`idServico`),
  ADD KEY `catalogo_FK` (`idCatalogo`);

--
-- Índices para tabela `servicoagendado`
--
ALTER TABLE `servicoagendado`
  ADD KEY `agendamento_FK` (`idAgendamento`),
  ADD KEY `desconto_FK` (`idDesconto`),
  ADD KEY `servicoAgendado_FK` (`idServico`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `agendamento`
--
ALTER TABLE `agendamento`
  MODIFY `idAgendamento` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `atendente`
--
ALTER TABLE `atendente`
  MODIFY `idAtendente` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `catalogo`
--
ALTER TABLE `catalogo`
  MODIFY `idCatalogo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `cliente`
--
ALTER TABLE `cliente`
  MODIFY `idCliente` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `desconto`
--
ALTER TABLE `desconto`
  MODIFY `idDesconto` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `notas`
--
ALTER TABLE `notas`
  MODIFY `idNota` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `servico`
--
ALTER TABLE `servico`
  MODIFY `idServico` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `agendamento`
--
ALTER TABLE `agendamento`
  ADD CONSTRAINT `cliente_FK` FOREIGN KEY (`idCliente`) REFERENCES `cliente` (`idCliente`),
  ADD CONSTRAINT `servico_FK` FOREIGN KEY (`idServico`) REFERENCES `servico` (`idServico`);

--
-- Limitadores para a tabela `notas`
--
ALTER TABLE `notas`
  ADD CONSTRAINT `atendente_FK` FOREIGN KEY (`idAtendente`) REFERENCES `atendente` (`idAtendente`);

--
-- Limitadores para a tabela `servico`
--
ALTER TABLE `servico`
  ADD CONSTRAINT `catalogo_FK` FOREIGN KEY (`idCatalogo`) REFERENCES `catalogo` (`idCatalogo`);

--
-- Limitadores para a tabela `servicoagendado`
--
ALTER TABLE `servicoagendado`
  ADD CONSTRAINT `agendamento_FK` FOREIGN KEY (`idAgendamento`) REFERENCES `agendamento` (`idAgendamento`),
  ADD CONSTRAINT `desconto_FK` FOREIGN KEY (`idDesconto`) REFERENCES `desconto` (`idDesconto`),
  ADD CONSTRAINT `servicoAgendado_FK` FOREIGN KEY (`idServico`) REFERENCES `servico` (`idServico`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
