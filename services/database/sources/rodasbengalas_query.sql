-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 15-Dez-2021 às 23:34
-- Versão do servidor: 10.4.21-MariaDB
-- versão do PHP: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `rodasbengalas`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `brand`
--

CREATE TABLE `brand` (
  `idBrand` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `districts`
--

CREATE TABLE `districts` (
  `idDistrict` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `homes`
--

CREATE TABLE `homes` (
  `idHome` int(11) NOT NULL,
  `idDistrict` int(11) NOT NULL,
  `adress` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `intake`
--

CREATE TABLE `intake` (
  `idIntake` int(11) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `medication`
--

CREATE TABLE `medication` (
  `idMedication` int(11) NOT NULL,
  `idTechnician` int(11) NOT NULL,
  `idClient` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `medicine`
--

CREATE TABLE `medicine` (
  `idMedicine` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `activeIngredient` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `idBrand` int(11) NOT NULL,
  `idIntake` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `medicinemedication`
--

CREATE TABLE `medicinemedication` (
  `idMedicineMedication` int(11) NOT NULL,
  `idMedicine` int(11) NOT NULL,
  `idMedication` int(11) NOT NULL,
  `startDate` date NOT NULL,
  `endDate` date DEFAULT NULL,
  `intakeFrequency` int(11) NOT NULL COMMENT 'Hours\r\nex.: 12, 24, 48, 72, ...',
  `isSOS` tinyint(1) DEFAULT NULL,
  `isSingleDose` tinyint(1) DEFAULT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `idUser` int(11) NOT NULL,
  `type` int(11) NOT NULL COMMENT '0: Admin\r\n1: Home admin\r\n2: Technician\r\n3: Client',
  `firstName` varchar(255) NOT NULL,
  `lastName` varchar(255) NOT NULL,
  `idHome` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`idBrand`);

--
-- Índices para tabela `districts`
--
ALTER TABLE `districts`
  ADD PRIMARY KEY (`idDistrict`);

--
-- Índices para tabela `homes`
--
ALTER TABLE `homes`
  ADD PRIMARY KEY (`idHome`),
  ADD KEY `idDistrict` (`idDistrict`);

--
-- Índices para tabela `intake`
--
ALTER TABLE `intake`
  ADD PRIMARY KEY (`idIntake`);

--
-- Índices para tabela `medication`
--
ALTER TABLE `medication`
  ADD PRIMARY KEY (`idMedication`),
  ADD KEY `idTechnician` (`idTechnician`),
  ADD KEY `idClient` (`idClient`);

--
-- Índices para tabela `medicine`
--
ALTER TABLE `medicine`
  ADD PRIMARY KEY (`idMedicine`),
  ADD KEY `idBrand` (`idBrand`),
  ADD KEY `idIntake` (`idIntake`);

--
-- Índices para tabela `medicinemedication`
--
ALTER TABLE `medicinemedication`
  ADD PRIMARY KEY (`idMedicineMedication`),
  ADD KEY `idMedication` (`idMedication`),
  ADD KEY `idMedicine` (`idMedicine`);

--
-- Índices para tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`idUser`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `brand`
--
ALTER TABLE `brand`
  MODIFY `idBrand` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `districts`
--
ALTER TABLE `districts`
  MODIFY `idDistrict` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `homes`
--
ALTER TABLE `homes`
  MODIFY `idHome` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `intake`
--
ALTER TABLE `intake`
  MODIFY `idIntake` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `medication`
--
ALTER TABLE `medication`
  MODIFY `idMedication` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `medicine`
--
ALTER TABLE `medicine`
  MODIFY `idMedicine` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `medicinemedication`
--
ALTER TABLE `medicinemedication`
  MODIFY `idMedicineMedication` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `idUser` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `homes`
--
ALTER TABLE `homes`
  ADD CONSTRAINT `idDistrict` FOREIGN KEY (`idDistrict`) REFERENCES `districts` (`idDistrict`);

--
-- Limitadores para a tabela `medication`
--
ALTER TABLE `medication`
  ADD CONSTRAINT `idClient` FOREIGN KEY (`idClient`) REFERENCES `users` (`idUser`),
  ADD CONSTRAINT `idTechnician` FOREIGN KEY (`idTechnician`) REFERENCES `users` (`idUser`);

--
-- Limitadores para a tabela `medicine`
--
ALTER TABLE `medicine`
  ADD CONSTRAINT `idBrand` FOREIGN KEY (`idBrand`) REFERENCES `brand` (`idBrand`),
  ADD CONSTRAINT `idIntake` FOREIGN KEY (`idIntake`) REFERENCES `intake` (`idIntake`);

--
-- Limitadores para a tabela `medicinemedication`
--
ALTER TABLE `medicinemedication`
  ADD CONSTRAINT `idMedication` FOREIGN KEY (`idMedication`) REFERENCES `medication` (`idMedication`),
  ADD CONSTRAINT `idMedicine` FOREIGN KEY (`idMedicine`) REFERENCES `medicine` (`idMedicine`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
