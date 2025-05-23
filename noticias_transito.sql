-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 23, 2025 at 06:52 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `noticias_transito`
--

-- --------------------------------------------------------

--
-- Table structure for table `noticias`
--

CREATE TABLE `noticias` (
  `id` int(11) NOT NULL,
  `manchete` varchar(225) NOT NULL,
  `subtitulo` varchar(225) NOT NULL,
  `lide` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `noticias`
--

INSERT INTO `noticias` (`id`, `manchete`, `subtitulo`, `lide`) VALUES
(1, 'Governo anuncia novo plano de habitação', 'Medida visa beneficiar mais de 1 milhão de famílias até 2026', 'O presidente apresentou nesta manhã um novo pacote habitacional voltado à população de baixa renda.'),
(2, 'Tecnologia brasileira é destaque em feira internacional', 'Startup do Recife vence prêmio de inovação em Berlim', 'A empresa apresentou um sistema de monitoramento ambiental baseado em IA que chamou atenção de investidores europeus.'),
(3, 'Chuvas causam alagamentos em várias regiões do sul', 'Defesa Civil emite alerta para municípios afetados', 'A tempestade que atinge a região desde ontem já deixou mais de 200 desabrigados e interrompeu vias importantes.'),
(4, 'Brasil conquista ouro em campeonato mundial de judô', 'Atleta paulista vence japonesa na final por ippon', 'Com a vitória, o país alcança a melhor marca da história na competição, com cinco medalhas no total.'),
(5, 'Nova vacina contra a dengue começa a ser aplicada', 'Campanha de imunização será iniciada nas capitais com maior incidência', 'O Ministério da Saúde lançou a campanha nacional nesta segunda-feira, visando conter o avanço dos casos da doença.'),
(6, 'Projeto de lei propõe regulamentar trabalho remoto', 'Texto está em tramitação no Congresso Nacional', 'A proposta quer estabelecer regras claras sobre horários, benefícios e controle de produtividade no home office.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `noticias`
--
ALTER TABLE `noticias`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `noticias`
--
ALTER TABLE `noticias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
