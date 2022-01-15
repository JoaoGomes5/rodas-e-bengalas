-- phpMyAdmin SQL Dump

-- version 5.0.4deb2ubuntu5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 15, 2022 at 03:27 AM
-- Server version: 8.0.27-0ubuntu0.21.10.1
-- PHP Version: 8.0.8


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
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `districts`
--

CREATE TABLE `districts` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `homes`
--

CREATE TABLE `homes` (
<<<<<<< HEAD
  `id` int NOT NULL,
  `idDistrict` int NOT NULL,
  `address` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `description` varchar(255) NOT NULL,
  `image_link` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;


-- --------------------------------------------------------

--
-- Estrutura da tabela `intake`
--

CREATE TABLE `intake` (
  `id` int(11) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `medication`
--

CREATE TABLE `medication` (
  `id` int(11) NOT NULL,
  `idTechnician` int(11) NOT NULL,
  `idClient` int(11) NOT NULL,
  `startDate` date NOT NULL,
  `endDate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `medicine`
--

CREATE TABLE `medicine` (
  `id` int(11) NOT NULL,
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
  `id` int(11) NOT NULL,
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
<<<<<<< HEAD
  `id` int NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `type` int NOT NULL COMMENT '0: Admin\r\n1: Home admin\r\n2: Technician\r\n3: Client',
=======
  `id` int(11) NOT NULL,
  `type` int(11) NOT NULL COMMENT '0: Admin\r\n1: Home admin\r\n2: Technician\r\n3: Client',
>>>>>>> 619f695426d4fe89de55ddcf20cfebda8685fdad
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
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `districts`
--
ALTER TABLE `districts`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `homes`
--
ALTER TABLE `homes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idDistrict` (`idDistrict`);

--
-- Índices para tabela `intake`
--
ALTER TABLE `intake`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `medication`
--
ALTER TABLE `medication`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idTechnician` (`idTechnician`),
  ADD KEY `idClient` (`idClient`);

--
-- Índices para tabela `medicine`
--
ALTER TABLE `medicine`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idBrand` (`idBrand`),
  ADD KEY `idIntake` (`idIntake`);

--
-- Índices para tabela `medicinemedication`
--
ALTER TABLE `medicinemedication`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idMedication` (`idMedication`),
  ADD KEY `idMedicine` (`idMedicine`);

--
-- Índices para tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `brand`
--
ALTER TABLE `brand`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `districts`
--
ALTER TABLE `districts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `homes`
--
ALTER TABLE `homes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `intake`
--
ALTER TABLE `intake`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `medication`
--
ALTER TABLE `medication`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `medicine`
--
ALTER TABLE `medicine`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `medicinemedication`
--
ALTER TABLE `medicinemedication`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `homes`
--
ALTER TABLE `homes`
  ADD CONSTRAINT `idDistrict` FOREIGN KEY (`idDistrict`) REFERENCES `districts` (`id`);

--
-- Limitadores para a tabela `medication`
--
ALTER TABLE `medication`
  ADD CONSTRAINT `idClient` FOREIGN KEY (`idClient`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `idTechnician` FOREIGN KEY (`idTechnician`) REFERENCES `users` (`id`);

--
-- Limitadores para a tabela `medicine`
--
ALTER TABLE `medicine`
  ADD CONSTRAINT `idBrand` FOREIGN KEY (`idBrand`) REFERENCES `brand` (`id`),
  ADD CONSTRAINT `idIntake` FOREIGN KEY (`idIntake`) REFERENCES `intake` (`id`);

--
-- Limitadores para a tabela `medicinemedication`
--
ALTER TABLE `medicinemedication`
  ADD CONSTRAINT `idMedication` FOREIGN KEY (`idMedication`) REFERENCES `medication` (`id`),
  ADD CONSTRAINT `idMedicine` FOREIGN KEY (`idMedicine`) REFERENCES `medicine` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
