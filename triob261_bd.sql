-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 07-Fev-2019 às 20:11
-- Versão do servidor: 10.1.37-MariaDB
-- versão do PHP: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `triob261_bd`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `agenda`
--

CREATE TABLE `agenda` (
  `id_agenda` int(11) NOT NULL,
  `evento` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `data` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `semana` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `hora` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `local` text COLLATE utf8_unicode_ci NOT NULL,
  `obs` text COLLATE utf8_unicode_ci NOT NULL,
  `tipo` varchar(12) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `agenda`
--

INSERT INTO `agenda` (`id_agenda`, `evento`, `data`, `semana`, `hora`, `local`, `obs`, `tipo`) VALUES
(8, 'Dia da Bagunça - 2017, 2°Edição', '03/09/2017', 'Domingo', '14:00', 'Lions Clube Taguatinga Independência', 'ATENÇÃO ATENÇÃO ATENÇÃO!!!!!\r\n\r\nMamães e papais vem aí a segunda edição do DIA DA BAGUNÇA!!! Agora muuuuito melhor!\r\n\r\nO DIA DA BAGUNÇA é um dia repleto de atrações, para divertir as crianças e seus pais. Um dia perfeito para unir a família e sair da rotina!\r\n\r\nNeste dia da bagunça teremos as seguintes atrações:\r\n**Apresentação teatral do espetáculo: &quot;FEIURINHA&quot;**\r\n**Animação repleta de brincadeiras novas e divertidas, além de pinturinhas de rosto**\r\n**Apresentação dos personagens, com muita dança, diversão e fotos a vontade, com os seguintes personagens: Homem Aranha, Capitão América, Batman, Lady Bug e Cat Noir, Elsa, Anna e Olaf, Rapunzel, Moana, Minnie e Mickey **\r\n* Cama elástica e piscina de bolinhas***\r\n**Serão oferecidos: algodão doce, pipoca, geladinho e água **\r\n\r\n\r\nO DIA DA BAGUNÇA acontecerá no dia 03 de Setembro, de 14 às 18 horas, no Lions Clube de Taguatinga Sul (local coberto e com toda a infra estrutura necessária).\r\n\r\nValores: \r\n1 criança: ingresso no valor de R$ 100,00 reais com direito a dois acompanhantes.\r\n2 crianças:  total de R$ 180 reais com direito a 3 acompanhantes.\r\n3 crianças: total de R$ 270 com direito a 4 acompanhantes.\r\n4 crianças ou mais: informações com a organização do evento.\r\n\r\n** OBS: No local terão barraquinhas para a venda de alguns lanches, mas você também pode trazer o seu de casa. O importante é se divertir!!! \r\n\r\nVOCÊ NÃO PODE PERDER! CORRA E FAÇA A SUA INSCRIÇÃO, VAGAS LIMITADAS!!!!\r\n\r\n** Inscrições exclusivamente por whats app: 981263521 ou 981082385.', 'Em Andamento');

-- --------------------------------------------------------

--
-- Estrutura da tabela `banners`
--

CREATE TABLE `banners` (
  `id_banner` int(9) NOT NULL,
  `titulo_banner` text COLLATE utf8_unicode_ci NOT NULL,
  `img_banner` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `url_banner` text COLLATE utf8_unicode_ci NOT NULL,
  `ordem_banner` int(9) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `banners`
--

INSERT INTO `banners` (`id_banner`, `titulo_banner`, `img_banner`, `url_banner`, `ordem_banner`) VALUES
(113, '', 'banner08122018114357.jpeg', '', 0),
(112, 'teste', 'banner04122018042330.jpeg', '', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `clientes`
--

CREATE TABLE `clientes` (
  `id_cli` int(11) NOT NULL,
  `nome_cli` varchar(50) NOT NULL,
  `cpf_cli` varchar(14) NOT NULL,
  `nasc_cli` date NOT NULL,
  `end_cli` text NOT NULL,
  `fixo_cli` varchar(15) NOT NULL,
  `cel_cli` varchar(16) NOT NULL,
  `email_cli` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `clientes`
--

INSERT INTO `clientes` (`id_cli`, `nome_cli`, `cpf_cli`, `nasc_cli`, `end_cli`, `fixo_cli`, `cel_cli`, `email_cli`) VALUES
(1, 'Raphael Augusto Almeida Pereira', '023.486.491-52', '1989-06-08', 'Rua 36 Norte Lote 3350 Bloco i apto 1205', '(61) 3024-3388', '(61) 99278-8607', 'raphael.a.a.p@gmail.com'),
(2, 'Carla da Silva Sá', '999.999.999-99', '1993-11-10', 'Rua 36 Norte Lote 3350 Bloco i apto 1205', '(61) 3024-3388', '(61) 99278-8607', 'carladasilvasa@gmail.com'),
(8, 'Pedro Almeida Pereira Sá', '777.777.777-77', '2015-07-18', 'Rua 36 Norte Lt 3350', '(61) 3024-3388', '(61) 98221-6572', 'pedrinho@gmail.com'),
(9, 'Pedro Almeida Pereira da Silva Sauro Jorge Pinto d', '999.999.999-99', '2018-07-18', 'Rua 36 norte Lote 3350 Bloco i Apto 1205', '', '(61) 99278-8607', 'pedrinho@gmail.com'),
(10, 'Francisco de Sales Pereira', '654.321.565-18', '2019-01-31', 'Rua 36 Norte Lote 3350 Bloco D ', '(61) 3354-4458', '(61) 99873-0545', 'sales.kasaimoveisnodf@gmail.com');

-- --------------------------------------------------------

--
-- Estrutura da tabela `colaborador`
--

CREATE TABLE `colaborador` (
  `id_colab` int(9) NOT NULL,
  `nome_colab` varchar(50) NOT NULL,
  `sobrenome_colab` varchar(50) DEFAULT NULL,
  `funcao_colab` varchar(30) NOT NULL,
  `cpf_colab` varchar(14) DEFAULT NULL,
  `nasc_colab` date NOT NULL,
  `sexo_colab` varchar(9) DEFAULT NULL,
  `cep_colab` varchar(10) NOT NULL,
  `rua_colab` text NOT NULL,
  `cidade_colab` text NOT NULL,
  `bairro_colab` varchar(25) NOT NULL,
  `estado_colab` varchar(2) NOT NULL,
  `complemento_colab` text NOT NULL,
  `fixo_colab` varchar(15) NOT NULL,
  `cel_colab` varchar(16) NOT NULL,
  `email_colab` varchar(50) NOT NULL,
  `login_colab` varchar(20) NOT NULL,
  `senha_colab` text NOT NULL,
  `foto_colab` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `colaborador`
--

INSERT INTO `colaborador` (`id_colab`, `nome_colab`, `sobrenome_colab`, `funcao_colab`, `cpf_colab`, `nasc_colab`, `sexo_colab`, `cep_colab`, `rua_colab`, `cidade_colab`, `bairro_colab`, `estado_colab`, `complemento_colab`, `fixo_colab`, `cel_colab`, `email_colab`, `login_colab`, `senha_colab`, `foto_colab`) VALUES
(1, 'Administrador', 'do Sistema', 'Administrador', '023.486.491-52', '1989-06-08', 'MASCULINO', '71.919-180', 'Rua 36 Norte', 'Brasília', 'Norte (Águas Claras)', 'DF', 'Lote 3350', '(61) 3024-3388', '(61) 99278-8607', 'raphael.a.a.p@gmail.com', 'admin', 'd243ee28aa5930dea901298cdeb2cb9f', 'user1_05022019074529.png'),
(2, 'Raphael Augusto', 'Almeida Pereira', 'Trouxa', '023.486.491-52', '1989-06-08', 'MASCULINO', '72.020-045', 'CSD 4', 'Brasília', 'Taguatinga Sul (Taguating', 'DF', 'casa 02', '(61) 3024-1097', '(61) 99215-7766', 'raphael1989@gmail.com', 'raphael', 'af79a8227f6f020dac98afce2a06d061', 'user2_04022019113110.jpg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `evento`
--

CREATE TABLE `evento` (
  `id_evento` int(11) NOT NULL,
  `nome_cli` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `niver_cli` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `idade_niver` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `data_evento` date NOT NULL,
  `email_cli` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `hora_evento` time NOT NULL,
  `nome_mae` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `nome_pai` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `cep_evento` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `rua_evento` text COLLATE utf8_unicode_ci NOT NULL,
  `cidade_evento` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `bairro_evento` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `estado_evento` varchar(2) COLLATE utf8_unicode_ci NOT NULL,
  `Complemento` text COLLATE utf8_unicode_ci NOT NULL,
  `nome_emergencia` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `numero_emergencia` varchar(14) COLLATE utf8_unicode_ci NOT NULL,
  `qtd_crianca_evento` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `idade_media_evento` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `id_pct` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `especificacao_pct` text COLLATE utf8_unicode_ci NOT NULL,
  `psg_evento` text COLLATE utf8_unicode_ci NOT NULL,
  `hora_chegada` time NOT NULL,
  `tempo_evento` time NOT NULL,
  `hora_adicional` time NOT NULL,
  `valor_pct` varchar(12) COLLATE utf8_unicode_ci NOT NULL,
  `valor_total` varchar(12) COLLATE utf8_unicode_ci NOT NULL,
  `sinal_valor` varchar(12) COLLATE utf8_unicode_ci NOT NULL,
  `falta_pagar_valor` varchar(12) COLLATE utf8_unicode_ci NOT NULL,
  `status_evento` varchar(10) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `evento`
--

INSERT INTO `evento` (`id_evento`, `nome_cli`, `niver_cli`, `idade_niver`, `data_evento`, `email_cli`, `hora_evento`, `nome_mae`, `nome_pai`, `cep_evento`, `rua_evento`, `cidade_evento`, `bairro_evento`, `estado_evento`, `Complemento`, `nome_emergencia`, `numero_emergencia`, `qtd_crianca_evento`, `idade_media_evento`, `id_pct`, `especificacao_pct`, `psg_evento`, `hora_chegada`, `tempo_evento`, `hora_adicional`, `valor_pct`, `valor_total`, `sinal_valor`, `falta_pagar_valor`, `status_evento`) VALUES
(16, 'Carla da Silva Sá', 'Pedro Almeida Pereira Sá', '4', '2019-08-17', '', '17:00:00', '', '', '', '', '', '', '', '', 'Luciene', '(61) 30241-097', '200', '1 a 12', '2', 'Ficar 1 hora e meia no evento.', '    Todos', '18:00:00', '01:30:00', '00:01:50', '', '1.000,00', '1.000,00', '0,00', 'Confirmado'),
(12, 'Raphael Augusto Almeida Pereira', 'Pedro Alme', '4', '2019-07-18', '', '18:00:00', '', '', '', '', '', '', '', '', 'Carla', '(61) 99215-776', '20', '1 a 8 anos', '1', 'Pacote de 2 horas de animação ou personagem vivo.', ' Homem Aranha', '19:00:00', '02:00:00', '00:02:50', '', '250,00', '150,00', '100,00', 'Confirmado'),
(17, 'Francisco de Sales Pereira', 'Rafaella Cecilia de Sousa Sales Pereira', '09', '2019-02-24', '', '18:00:00', '', '', '', '', '', '', '', '', '', '', '15', '4 a 12 Anos de ', '1', 'Pacote de 2 horas de animação ou personagem vivo.', 'Princesa Sophia  e animação', '19:00:00', '02:00:00', '00:02:50', '', '250,00', '250,00', '0,00', 'Cancelado'),
(20, 'Luciene Alves de Almeida', '', '', '2018-07-18', 'luciene@gmail.com', '16:00:00', '', '', '', '', '', '', '', '', '', '', '', '', '1', '', '', '00:00:00', '00:00:00', '00:00:00', '', '', '', '', 'Pendente'),
(21, 'Valmir lopes', '', '', '2019-02-15', 'valmir@gmail.com', '16:00:00', '', '', '', '', '', '', '', '', '', '', '', '', '2', 'Ficar 1 hora e meia no evento.', '', '00:00:00', '01:30:00', '00:00:00', '150,00', '', '', '', 'Pendente');

-- --------------------------------------------------------

--
-- Estrutura da tabela `galeria`
--

CREATE TABLE `galeria` (
  `id_galeria` int(9) NOT NULL,
  `imagem_galeria` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `galeria`
--

INSERT INTO `galeria` (`id_galeria`, `imagem_galeria`) VALUES
(186, '146489504057508640d8481.jpg'),
(188, '146489509157508673af610.jpg'),
(190, '146489510657508682cb774.jpg'),
(192, '14648951225750869287e2b.jpg'),
(196, '1464895168575086c0edc3c.jpg'),
(197, '1464895176575086c8305b6.jpg'),
(198, '1464895186575086d25b66a.jpg'),
(205, '1464895443575087d3e78b8.jpg'),
(208, '14649048175750ac71851c5.jpg'),
(211, '14649049175750acd583742.jpg'),
(213, '14649049435750acef69787.jpg'),
(215, '14649051125750ad9810c3f.jpg'),
(220, '14649054355750aedbbfd41.jpg'),
(223, '14649062365750b1fc3e783.jpg'),
(233, '1466470800576891908eb99.jpg'),
(238, '1467994957577fd34d737aa.jpg'),
(241, '1482383721585b616939efe.jpg'),
(242, '1482383747585b6183e4afd.jpg'),
(243, '1482383778585b61a2c0129.jpg'),
(246, '1482383829585b61d5ad961.jpg'),
(249, '1482383890585b6212ba03c.jpg'),
(250, '1482383905585b6221e2599.jpg'),
(251, '1482383930585b623a254c7.jpg'),
(259, '1482384048585b62b080d52.png'),
(260, '1482384064585b62c0786d9.jpg'),
(261, '1482384108585b62ece4ed2.jpg'),
(264, '1483112669586680dda174d.jpg'),
(266, '1483112707586681036b2f6.jpg'),
(268, '1484715608587ef658ce8c6.jpg'),
(270, '1484715669587ef695aa33d.jpg'),
(271, '1485534966588b76f64c93a.jpg'),
(272, '1485535047588b77477d950.jpg'),
(273, '1485535072588b7760668bb.jpg'),
(274, '1485535093588b77750a5c1.jpg'),
(275, '1485535112588b7788c55e3.jpg'),
(276, '1485535131588b779b925be.jpg'),
(277, '1485535146588b77aaf0966.jpg'),
(278, '1486263285589693f5bdfea.jpg'),
(280, '14978157285946dab00f7be.jpg'),
(282, '14978157715946dadb3cf78.png'),
(285, '14978158735946db41bd3e4.jpg'),
(286, '14978158895946db5186961.jpg'),
(287, '15265291395afcfc73c38f1.jpg'),
(288, '15265291605afcfc88db0d3.jpg'),
(289, '15265291795afcfc9baa0c5.jpg'),
(290, '15265292135afcfcbdceb45.jpg'),
(291, '15265292285afcfccc8a31e.jpg'),
(292, '15265293625afcfd52c7009.jpg'),
(293, '15265293835afcfd67183d5.jpg'),
(294, '15265294005afcfd7845eac.jpg'),
(295, '15265294285afcfd946e3b6.jpg'),
(296, '15265294495afcfda914995.jpg'),
(297, '15265294705afcfdbe38091.jpg'),
(298, '15265294865afcfdceadab4.jpg'),
(299, '15265295115afcfde79ff50.jpg'),
(300, '15265295415afcfe05545da.jpg'),
(301, '15265295845afcfe30b4810.jpg'),
(302, '15265296115afcfe4b98c69.jpg'),
(303, '15265297765afcfef0da41d.jpg'),
(304, '15265298225afcff1ebeab2.jpg'),
(305, '15265299465afcff9a2a095.jpg'),
(306, '15265299785afcffba21de5.jpg'),
(307, '15265299925afcffc8beaef.jpg'),
(308, '15265300165afcffe095fa6.jpg'),
(309, '15265300385afcfff688e48.jpg'),
(310, '15268493465b01df423314c.jpg'),
(311, '15268496695b01e085aab3c.jpg'),
(313, '15268496965b01e0a05f388.jpg'),
(314, '15268497095b01e0adb0594.jpg'),
(315, '15268497355b01e0c783f9f.jpg'),
(316, '15268497515b01e0d7324f7.jpg'),
(318, '15268497725b01e0ec75ce7.jpg'),
(319, '15268497915b01e0ff62645.jpg'),
(320, '15268498095b01e111d6097.jpg'),
(321, '15268498295b01e12559386.jpg'),
(322, '15268498565b01e140c5fdb.jpg'),
(323, '15268498705b01e14e06faf.jpg'),
(324, '15268498955b01e167830d0.jpg'),
(326, '15268499165b01e17ca71ed.jpg'),
(327, '15268499365b01e1903b718.jpg'),
(328, '15268499575b01e1a5389e9.jpg'),
(329, '15268502215b01e2ad83f44.jpg'),
(330, '15268502365b01e2bce8491.jpg'),
(331, '15268502505b01e2cadf7fd.jpg'),
(332, '15268502695b01e2dd5f2a0.jpg'),
(333, '15268502895b01e2f1ecd26.jpg'),
(334, '15268503065b01e3025d8a1.jpg'),
(336, '15268503325b01e31c63de6.jpg'),
(337, '15268503775b01e34951cf9.jpg'),
(338, '15268504105b01e36b01a89.jpg'),
(339, '15268504325b01e38040b60.jpg'),
(340, '15271287855b0622d128e98.jpg'),
(341, '15271287965b0622dcf0922.jpg'),
(342, '15271288115b0622eb385f2.jpg'),
(343, '15271288225b0622f63cd7a.jpg'),
(344, '15271288305b0622fe6730f.jpg'),
(345, '15271288485b062310576df.jpg'),
(346, '15271288645b062320ac5c3.jpg'),
(347, '15271288745b06232a8a795.jpg'),
(348, '15271288945b06233e6f8b2.jpg'),
(349, '15271289995b0623a731b7d.jpg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `pacotes`
--

CREATE TABLE `pacotes` (
  `id_pct` int(9) NOT NULL,
  `nome_pct` varchar(50) DEFAULT '0',
  `tempo_pct` varchar(6) DEFAULT '0',
  `valor_pct` varchar(50) DEFAULT '0',
  `especificacao_pct` text NOT NULL,
  `obs_pct` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `pacotes`
--

INSERT INTO `pacotes` (`id_pct`, `nome_pct`, `tempo_pct`, `valor_pct`, `especificacao_pct`, `obs_pct`) VALUES
(1, 'Pacote de 2 horas', '02:00', '250,00', 'Pacote de 2 horas de animação ou personagem vivo.', 'Não passar de 2 horas.'),
(2, 'Pacote Teste', '01:30', '150,00', 'Ficar 1 hora e meia no evento.', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `permissao_user`
--

CREATE TABLE `permissao_user` (
  `id_permission` int(10) UNSIGNED NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `permission1` int(11) DEFAULT NULL,
  `permission2` int(11) DEFAULT NULL,
  `permission3` int(11) DEFAULT NULL,
  `permission4` int(11) DEFAULT NULL,
  `permission5` int(11) DEFAULT NULL,
  `permission6` int(11) DEFAULT NULL,
  `permission7` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `permissao_user`
--

INSERT INTO `permissao_user` (`id_permission`, `id_user`, `permission1`, `permission2`, `permission3`, `permission4`, `permission5`, `permission6`, `permission7`) VALUES
(0, NULL, 1, 1, 1, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `recados`
--

CREATE TABLE `recados` (
  `id_recado` int(9) NOT NULL,
  `nome_recado` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `recado` text COLLATE utf8_unicode_ci NOT NULL,
  `data_hora` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `aprovacao` varchar(3) COLLATE utf8_unicode_ci NOT NULL,
  `fotos` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `recados`
--

INSERT INTO `recados` (`id_recado`, `nome_recado`, `recado`, `data_hora`, `aprovacao`, `fotos`) VALUES
(1, 'Raphael Augusto', 'O site ficou show, parabéns pra quem desenvolveu e parabéns para a equipe Trio Bagunça!', '13/06/2016 22:06:03', 'Sim', 'clientes_13_06_2016_104403.jpg'),
(2, 'Mariana', 'Assim como o trabalho de vocês esse site ficou show', '14/06/2016 05:06:33', 'Sim', ''),
(3, 'Alan Costa', 'Melhor empresa de festa infantil de Brasília!', '14/06/2016 10:06:44', 'Sim', ''),
(8, 'Luana', 'O site ficou ótimo!!\r\nParabéns ', '20/06/2016 12:28:51', 'Sim', ''),
(7, 'Lucas', 'Eu quero!', '14/06/2016 22:54:46', 'Sim', 'clientes_14_06_2016_105446.jpg'),
(9, 'Nome:', 'Ficou ótimo!', '20/06/2016 12:34:07', 'Sim', ''),
(10, 'Ana Claudia', 'Este trio é perfeito! Foi a sensação da festa da minha filha...', '20/06/2016 12:37:46', 'Sim', ''),
(11, 'Erika Alves', 'Perfeição é pouco pra descrever o que vcs representaram na nossa festa', '20/06/2016 22:16:50', 'Sim', 'clientes_20_06_2016_101650.jpeg'),
(12, 'Neila Portela', 'Parabéns, ótimo trabalho!', '20/06/2016 23:52:21', 'Sim', ''),
(13, 'SUCESSO', 'A EXATOS 365 DIAS VOCÊS fizeram a alegria da minha pequena, hoje ela completa 06 anos e não quer festa convencional só se for com o frozem, por esta razão adiamos o bis e vamos comemorar na churrascaria fogo de galpão no pistão. queremos sim vocês animando nossas vidas, espero que seja em breve.\r\n\r\nVOCÊS SÃO TOPS', '21/06/2016 14:50:51', 'Sim', ''),
(14, 'ju', 'Conheci o trabalho dessa equipe e super indico p todos', '21/06/2016 20:17:27', 'Sim', ''),
(15, 'Tatiane', 'Adorei o site!!!', '22/06/2016 13:06:18', 'Sim', ''),
(28, 'Patricia Maruno', 'Nayara e Nathália: vocês são demais! Muito carinhosas, cuidadosas, atenciosas...\r\nParabéns pelo trabalho de vocês! \r\nRecomendo demais! \r\nE até a próxima!', '28/06/2016 21:50:55', 'Sim', ''),
(18, 'Fran', 'Oi boa noite, eu e minha filha Lorena, seguimos vocês é tudo tão lindo !!!! Adoro todas as princesas, a Melida é perfeita, a Ana e a Frozen.Meu sonho era ver uma na festa da minha filhota.', '27/06/2016 19:07:17', 'Sim', ''),
(40, 'Glaysa Fernanda Infanger de Castro', 'Momento Mágico com a presença das princesas Elsa e Anna e o Olaf. Adultos e crianças se encantam com a beleza, postura e carisma da equipe. Muito profissionais e pontuais!! Obrigada e parabéns pelo excelente trabalho!', '03/12/2016 14:03:42', 'Sim', 'clientes_03_12_2016_020342.JPG'),
(20, 'Antônia', 'Amei a iniciativa do trio, de ter feito uma boa ação em creche carente!', '27/06/2016 20:09:47', 'Sim', ''),
(21, 'MARIA DE LOURDES CARDOSO', 'AMEI O SITE E VOU INDICAR O TRABALHO DE VOCÊS.\r\nTENHO TRÊS NETOS E UMA A CAMINHO.', '27/06/2016 20:31:54', 'Sim', ''),
(22, 'Rebeca Marinho', 'Mais uma vez gostaria de agradecer a essa equipe maravilhosa! Mais um ano pude contar com a presença de vcs na festinha da minha filha! Ano passado frozen...perfeito! Esse ano branca de neve...maravilhoso! Super indico o trabalho! Profissionais simpáticas,  atenciosas e lindas! Agradeço pela presença e por tornar a festinha da minha filha um verdadeiro conto de princesas!Foi mágico! Vcs são as melhores!!! Vamos escolher o próximo tema!!!! Bjos', '27/06/2016 22:30:25', 'Sim', ''),
(23, 'Cintia Siqueira', 'Gostaria de agradecer a alegria para as crianças e emoção para os adultos na festa da minha filha. Tudo que um festa precisa . Profissionais como vocês . O trabalho de vocês é PERFEITO. Jamais deixarei de contrata-los. A festa fica muito mais festa com o trio bagunça. Eu mesma chorei quando chegaram aqui.... Que lindo o trabalho de vocês! E agora com pintura de rosto e balão mania ! Pacote mais que completo ! Momento com vocês mais que especial ! O tema foi o maravilhoso FROZEN. E espero ARIEL  em novembro com pintura de rosto ... SEMPRE  o TRIO BAGUNÇA, Nayara e Natalia! A simpatia de vocês contagia ! Beijooooo', '28/06/2016 06:19:33', 'Sim', ''),
(27, 'LINDO', 'O site está ótimo, só animação!!!', '28/06/2016 18:02:35', 'Sim', ''),
(25, 'Michelle Lopes', 'Super hiper recomendo! Já fiz uma festa da Froozen com essas princesas lindas e já contratei 4x os animadores! Todos muito atenciosos e carinhosos! Diversão e tranquilidade para os pais! Já estou esperando o px niver para convidá-los!!!', '28/06/2016 10:58:02', 'Sim', 'clientes_28_06_2016_105802.jpg'),
(29, 'caroline pires', 'O site está lindo!! Parabéns trio bagunça!', '29/06/2016 01:07:33', 'Sim', ''),
(34, 'Ana Claudia', 'Foi o dinheiro mais bem investido em toda a festa! Encantou crianças e adultos...❤️❤️', '12/07/2016 10:35:40', 'Sim', 'clientes_12_07_2016_103540.jpeg'),
(35, 'Carla Moura', 'Gostaria de agradecer o trabalho e o profissionalismo da equipe de vcs!!!! A festa foi um sucesso, e os convidados adoraram a animação, foram muito elogiados...... Desde ontem To passando o contato de vcs!!!!! \r\nSucesso e obrigada', '06/09/2016 07:41:13', 'Sim', 'clientes_06_09_2016_074113.png'),
(36, 'livia', 'parabéns.... simplesmente perfeito ...foi mágico', '13/09/2016 13:23:14', 'Sim', 'clientes_13_09_2016_012314.jpg'),
(37, 'Gilsa', 'Amei fez toda a diferença na minha festa \r\nAmei \r\nMinha filha ficou hiper feliz', '19/09/2016 21:39:30', 'Sim', 'clientes_19_09_2016_093930.jpg'),
(38, 'Thayane', 'Obrigada por vcs ter tornado a festa da minha filha mágica, com a presença da princesa Sofia! Foi lindo! Fez toda a diferença!', '26/09/2016 01:19:27', 'Sim', 'clientes_26_09_2016_011927.jpeg'),
(39, 'Claudia', 'So tenho a agradecer essa equipe maravilhosa. A Bela realmente e uma princesa, fez a alegria da minha filhotinha juntamente com seus amiguinhos; aqui ate os adultos entraram no clima de princesas... Linda festa, e com certeza os outros anos estaremos juntos.', '07/11/2016 10:55:13', 'Sim', 'clientes_07_11_2016_105513.jpg'),
(41, 'Edna', 'Lindoooo amei a festinha da minha filha, ver a carinha das criancas qdo vcs chegam não tem preço!!!!\r\nA minha princesinha disse q no proximo ano quer a festinha do mesmo jeito.\r\nFrozen novamente.\r\nParabéns Trio Bagunça vcs são D+++', '05/12/2016 21:52:17', 'Sim', 'clientes_05_12_2016_095217.jpg'),
(42, 'Amanda Hernandes', 'Lindooooooo eu simplesmente ameeei ! Minha filha ficou louca quando viu a Elsa a Ana e o Olaf, ela é fissurada na Elsa. Todos que estavam presentes na festa amaram! Vocês são ótimos obrigada por realizem o sonho da minha rainha Alice ! Obs: a minha filha sonhou a noite toda falando ( cadê a Elsa mamãe) a apresentação foi emocionante me fizeram chorar ao ver os olhos da minha filha encantada ! Obrigada  obrigada obrigada ! Trio da bagunça equipe que realiza sonhos ! Dos filhos e das mães tamb ! Kkkkk ❤️', '18/12/2016 22:20:22', 'Sim', 'clientes_18_12_2016_102022.JPG'),
(43, 'Luciana', 'Só tenho a agradecer pela presença do Trio Bagunça e Tio Luan na festa da minha filha, sem dúvida foi essencial para a diversão das crianças! Parabéns pelo trabalho irretocável de vocês! Foi demais!!! Muito obrigada, recomendo fortemente e desejo muito sucesso para toda a equipe! Abraços, Luciana e Família', '19/12/2016 11:02:28', 'Sim', 'clientes_19_12_2016_110228.JPG'),
(46, 'Rubia', 'Simplesmente amei!!! As crianças ficaram maravilhadas com o Homem Aranha!!! O Arthur foi super educado, atencioso e carinhoso com as crianças! Todas elas de diferentes idades! Bernardo curtiu tanto que dormiu no colo do Homem Aranha! A Nayara foi sempre um amor no atendimento!! Super recomendo o Trio Bagunça para as festinhas dos pimpolhos!!', '09/01/2017 16:16:58', 'Sim', 'clientes_09_01_2017_041658.PNG'),
(45, 'Priscila', 'Muito obrigada pelo excelente trabalho de vcs! Super pontuais, lindos, atenciosos, amorosos com as crianças. Deixam a festa muito mais bonita é encantadora! As crianças ficaram extasiadas e os adultos encantados. Parabéns!!! ', '04/01/2017 12:13:34', 'Sim', 'clientes_04_01_2017_121334.JPG'),
(47, 'Glazielle', 'Aniversário de 06 anos da minha filha foi um verdadeiro encanto com a chegada da princesa Ariel, linda, pontual, educada e carismática, super indico. Parabéns ao Trio Bagunça! Bjs e obrigada.', '15/01/2017 19:29:09', 'Sim', 'clientes_15_01_2017_072909.jpeg'),
(48, 'Evelyn', 'Quero agradecer todo o carinho desde o nosso primeiro contato.Foi tudo perfeito,  pontualidade, profissionalismo, lindos, impecaveis!!!!\r\nAs crianças amaram e os adultos ficaram encantados.o sorriso da Clarinha nas fotos diz tudo.....Foi uma emoção contagiante.\r\nParabéns foi a festa dos sonhos!!! Obrigada por tudo.', '23/01/2017 20:49:04', 'Sim', 'clientes_23_01_2017_084904.jpg'),
(49, 'Fabiane Lopes', 'Muito obrigada à equipe do Trio Bagunça!!! Vocês fizeram da festinha do meu filho um momento mais que especial! Foram pontuais, educados, solícitos e muito animados!!!', '02/02/2017 10:29:52', 'Sim', 'clientes_02_02_2017_102952.jpg'),
(50, 'Aline', 'Fiz uma festa da Ariel pra minha filha que ficou encantada com a Ariel do Trio Bagunça! Super satisfeita com a profissional e muito feliz em ver a alegria da minha princesa!!!!', '05/02/2017 12:01:02', 'Sim', 'clientes_05_02_2017_120102.JPG'),
(51, 'Danielli', 'Foi simplesmente mágico os momentos compartilhamos com a princesa Bela', '13/02/2017 11:09:38', 'Sim', 'clientes_13_02_2017_110938.JPG'),
(52, 'Thais Amorim', 'A festa da minha filha foi de Ladybug e a própria apareceu. Minha filha amouuuu. Obrigada a todos da equipe Trio Bagunça. Super recomendo.', '13/02/2017 12:16:24', 'Sim', 'clientes_13_02_2017_121624.jpg'),
(53, 'Simone', 'Fiz uma festa de Ladybug para minha filha, foi simplesmente maravilhosa. A Ladybug (Luciana) é uma simpatia! Obrigada!!!', '21/02/2017 17:54:28', 'Sim', 'clientes_21_02_2017_055428.jpg'),
(54, 'Tacia Justino', 'Muito feliz com o trio Bagunça que fez uma surpe alegria das crianças, foi muito e o personagem batman fez alegria das crianças e os adultos ficaram surpe felizes.', '26/03/2017 10:26:54', 'Sim', 'clientes_26_03_2017_102654.jpg'),
(55, 'Mariana', 'Simplesmente amei o homem aranha! Super simpático e meu filho ficou em êxtase com a chegada dele! Quero ter a oportunidade de contrata-los novamente!', '23/04/2017 12:36:16', 'Sim', 'clientes_23_04_2017_123616.JPG'),
(56, 'Ana Rodrigues', 'Foi incrível, minha filha amou. Os personagens lindos e profissionais. Foi muito mágico ,  super recomendo .', '24/04/2017 10:00:10', 'Sim', 'clientes_24_04_2017_100010.PNG'),
(57, 'Elaine', 'O Batman foi sucesso na festa do meu sobrinho ele ficou encantado. Vcs estão de parabéns pelo profissionalismo e tb da sensibilidade com as crianças super recomendo', '26/04/2017 14:11:04', 'Sim', 'clientes_26_04_2017_021104.jpg'),
(58, 'Fernada', 'Ladybug e Catnoir arrasaram na festa da Manu! Sucesso absoluto e alegria da garotada!\r\nParabéns e muito obrigada por animarem ainda mais a nossa comemoração!', '05/05/2017 21:16:41', 'Sim', 'clientes_05_05_2017_091641.JPG'),
(59, 'Marcela', 'Amei as princesas! Minha filha de 3 anos e os amiguinhos se divertiram muito com as brincadeiras e dançaram com as princesas. Além disso, são lindas e simpáticas! Valeu a pena!', '21/05/2017 21:13:24', 'Sim', 'clientes_21_05_2017_091324.JPG'),
(60, 'Karina', 'Foi simplesmente maravilhoso receber na nossa festa o batman e o homem aranha. Eles são ótimos. Vale a pena. As crianças adoraram!', '04/06/2017 17:57:03', 'Sim', 'clientes_04_06_2017_055703.JPG'),
(61, 'Fabiana Calviño', 'A Moana arrasou na festinha dos meus pequenos. Minha filha ficou apaixonada pela &quot;môuana&quot; e não queria mais sair do lado dela.\r\nParabéns pelo trabalho de vocês, que é maravilhoso!', '12/06/2017 15:13:17', 'Sim', 'clientes_12_06_2017_031317.JPG'),
(62, 'Fabíola Cristina', 'Só tenho a agradecer ao trio Bagunça! Vocês fizeram a diferença nesses meus dois dias de festa! Com profissionalismo, carinho, respeito e amor ao que faz eu só posso ser grata pelos momentos que vocês fizeram parte! Primeiro o super homem que encantou a festa do meu filho na escola. As crianças ficaram apaixonada pela magia do personagem e por brincarem com ele. E ontem salvaram minha festa! Como consegui aproveitar minha festa graças a vocês. Taís meu muito obrigada! Você entreteve as crianças por três horas seguidas sem intervalo, sempre com alegria, com sorriso no rosto, várias atividades. Todos ficaram encantados! Gratidão!!!', '16/06/2017 17:42:10', 'Sim', 'clientes_16_06_2017_054210.jpg'),
(63, 'Juliana Amorim', 'Quero agradecer de todo meu coração a presença do Capitão América na festinha dos meus filhos. Ele foi atencioso, carinhoso, pontual, tem ótima interação com as crianças. Meus filhos estão apaixonados. E todos os convidados também ficaram!\r\nObrigada Trio bagunça!!! Vcs são show! Não foi a primeira vez que eu vi o trabalho de vcs em uma festa e todas as vezes foi maravilhoso! Parabéns! Continuem abrilhantando as festinhas dos nossos pequenos!', '25/06/2017 12:51:35', 'Sim', 'clientes_25_06_2017_125135.jpg'),
(64, 'JANAÍNA SIMÕES', 'Bom dia\r\nEu adorei a presença das personagens Ana e Elsa e da pintura de rosto e balão. Fizeram   uma diferença enorme no sucesso da festa. A minha menina só fala que abraçou a Ana e Elsa. Todos os convidados elogiaram muito a simpatia e a beleza de vocês. Fez um sucesso enorme não só com as crianças e tbm com os adultos. O rapaz da pintura de rosto foi muito paciente com as crianças e bem animado. Gostei de tudo. Parabéns pelo trabalho que vocês realizam ', '27/06/2017 09:36:30', 'Sim', 'clientes_27_06_2017_093630.jpg'),
(67, 'Suelen Tamara', 'Não tenho palavras para agradecer à equipe Trio Bagunça é em especial ao Valmir personagem do Homem Aranha. Impossível descrever a emoção que tivemos ao ver nosso pequeno correndo para abraçar seu seu herói favorito. Não tem preço! Apesar da pouca idade, tenho certeza que não irá esquecer esse momento. Ele só fala nisso. Meus sinceros agradecimentos.', '01/08/2017 20:22:25', 'Sim', 'clientes_01_08_2017_082225.JPG'),
(66, 'Shirlene Souza', 'Quero agradecer a presença do Trio Bagunça na festa das minhas princesas. Ladybug e Catnoir abrilhantaram a festa, brincaram com as crianças, eles são profissionais talentosos que super recomendo. Parabéns pelo trabalho de vocês, foi maravilhoso!!', '20/07/2017 10:05:42', 'Sim', 'clientes_20_07_2017_100542.JPG'),
(68, 'Maitê', 'Parabéns a toda equipe trio bagunça. Em especial a moça que se veste de Minnie. Muito delicada e atenciosa.\r\nMinha filha amou ter a Minnie na festa dela!! Foi um dos meus melhores investimentos. As meninas amaram.', '13/08/2017 18:56:31', 'Sim', 'clientes_13_08_2017_065631.jpg'),
(69, 'Thais L', 'Satisfeita com o trio da bagunça ,em especial com a ladybug e o cat noar ,que fizeram toda a diferença na minha festa ,super atenciosos e cuidadosos com as crianças ,minha filha ficou maravilhada ...amamos ...parabéns ', '20/08/2017 20:36:30', 'Sim', 'clientes_20_08_2017_083630.JPG'),
(70, 'Marcela Amorim', 'Quero agradecer ao trio da Bagunça pelo profissionalismo, carinho com as crianças, excelência no trabalho realizado! Todos da festinha ficaram encantados com os personagens da frozen. ', '04/09/2017 13:34:21', 'Sim', 'clientes_04_09_2017_013421.JPG'),
(71, 'Carla Monteiro', 'pela primeira vez fui ao dia da bagunça, pessoal vale muito apena, minha filha ficou muito feliz em está brincando com o papai e a mamãe, em ver seus personagens favoritos e se encher de besteiras. Valeu cada centavo.\r\nConte com minha família em todos os eventos de vcs.\r\nPq para minha família a felicidade da nossa pequena vale ouro.\r\nObrigada trio Bagunça pelo trabalho e carinho com que vcs conduzem tudo. Muito bom mesmo.', '04/09/2017 15:13:10', 'Sim', 'clientes_04_09_2017_031310.jpg'),
(72, 'Karla Fontana Sampaio', 'As personagens, além de lindas, promovem brincadeiras super animadas com as crianças. Super recomendo! Eleva o nível de qualquer festa!', '21/09/2017 15:45:31', 'Sim', 'clientes_21_09_2017_034531.jpeg'),
(73, 'Fernanda', 'Equipe sensacional \r\nO Mickey e a Minnie são maravilhosos e a Tia Gabriella fez toda diferença.\r\nA  Mayara sempre muito atenciosa e carinhosa.\r\nRecomendo para qualquer família o Trio Bagunça para fazer a diferença na festa do seu filho.', '23/09/2017 13:47:46', 'Sim', 'clientes_23_09_2017_014746.JPG'),
(74, 'Ana', 'Estão de parabéns pela animação e as brincadeiras as crianças amaram esta tarde vcs fizeram toda a diferença....Obrigada tia Jessica', '12/10/2017 22:14:32', 'Sim', 'clientes_12_10_2017_101432.jpg'),
(75, 'TATIANA ROBERTA GALANTE', 'Foi um grande prazer contrata-los para a festa de aniversario de minha filha de 5 anos. A Larybug foi super atenciosa, carinhosa, criativa! O sonho da minha filha foi realizado graças ao profissionalismo e competência de vocês!! Ver os olhinhos dela brilhando por conta da magia de conhecer a heroína que ama não tem preço! Recomendo de olhos fechados!!', '15/10/2017 19:44:01', 'Sim', 'clientes_15_10_2017_074401.jpg'),
(80, 'Etienne', 'Recado: Foi uma excelente escolha contratar vocês para animar a festinha da nossa filha. Ela ficou super feliz com a presença da Ladybug e Cat Noir e nós, pais, realizados. Parabéns pelo profissionalismo, pontualidade, carisma, atenção e empenho em fazer a alegria das crianças! Obrigada! Super recomendo!', '25/03/2018 22:57:03', 'Sim', 'clientes_25_03_2018_105703.jpg'),
(78, 'Davi', 'Recado: Foi um sucesso!!! Meu filho e sobrinho amaram o Homem-Aranha! A fantasia era linda! E o rapaz muito gentil, educado e animado!!! Foi a cereja do bolo!!! Obrigada Trio Bagunça!!!', '13/03/2018 14:20:23', 'Sim', 'clientes_13_03_2018_022023.jpeg'),
(79, 'Nayara', 'Melhor equipe de animação infantil do DF ', '14/03/2018 15:13:46', 'Sim', 'clientes_14_03_2018_031346.jpeg'),
(81, 'Juliana Candida Gondim da Silva', 'Recado: Contratei o trio bagunça pela segunda vez esse ano e novamente me surpreendi com o trabalho das meninas que me atenderam! A princesa Ariel (Marcela) foi um doce com as crianças!! Super meiga, linda e delicada como uma princesa!!! A animadora Taina foi o ponto alto da festa! Em uma festa na piscina, com crianças pequenas que insistiram em ficar na piscina grande, ela entrou na piscina para agitar as brincadeiras! Super cuidadosa e atenciosa! Um doce de menina! Recomendo sempre! A festa não é a mesma sem o Trio Bagunça para animar!!!', '02/04/2018 16:45:56', 'Sim', 'clientes_02_04_2018_044556.JPG'),
(82, 'Daniela', 'Recado: Adoramos a personagem da Anna que chegou para alegrar a festinha da nossa pequena, além de muito carinhosa com as crianças a fantasia era encantadora!!! Foi um dia de sonho para a nossa princesa!!!', '06/04/2018 12:23:07', 'Sim', 'clientes_06_04_2018_122307.jpg'),
(83, 'Pavleska', 'Recado:ja são 3 anos contratando essa equipe maravilhosa... Todo ano um personagem novo e sempre muito bons !!! Esse ano contratei a animação também,  melhor investimento p a festa. Como valeu a pena, meu filho dormiu e acordou falando dos heróis...\r\nObrigada', '08/04/2018 14:18:19', 'Sim', 'clientes_08_04_2018_021819.jpg'),
(84, 'Tais Viana !', 'Recado:Não há palavras para expressar minha satisfação e alegria em ter comemorado o aniversário da minha filha com vocês. Agradeço a Natália e sua irmã pelo profissionalismo e cordialidade que teve comigo desde o primeiro contato. Tudo perfeito, mais do que imaginava. Vocês estão de parabéns a toda a equipe do TRIO BAGUNÇA foi maravilhosa. A Tia Deza (Pintura) nem se fala, ela e MARAVILHOSA a Ladyburg e o Cat Noir um sonho a parte eu amei tudo. Com certeza no próximo ano estaremos juntos celebrando mais um aniversário do Maria Eduarda. Festa Ladyburg  em 20/04/2018. Indico... Super Indico e Indico novamente.', '23/04/2018 09:01:01', 'Sim', 'clientes_23_04_2018_090101.jpg'),
(85, 'Aurea', 'Recado: Minha filha ficou simplesmente encantada! Trio bagunça é 100%! Sem palavras p agradecer.', '29/04/2018 17:29:01', 'Sim', 'clientes_29_04_2018_052901.jpeg'),
(86, 'Suele', 'Recado: Festinha da minha filha foi no dia 05/05/2018. A Elza é simplesmente linda, paciente , atenciosa, animada. Conquistou a todos! O meu muito obrigada! Foi, sem dúvida, o meu melhor investimento! Super recomendo! Sem contar que antes do evento estavam sempre disposto a esclarecer as minhas dúvidas!', '07/05/2018 15:49:43', 'Sim', 'clientes_07_05_2018_034943.jpg'),
(87, 'Suele', 'Recado: Festinha da minha filha foi no dia 05/05/2018. A Elza é simplesmente linda, paciente , atenciosa, animada. Conquistou a todos! O meu muito obrigada! Foi, sem dúvida, o meu melhor investimento! Super recomendo! Sem contar que antes do evento estavam sempre disposto a esclarecer as minhas dúvidas!', '07/05/2018 15:50:17', 'Sim', 'clientes_07_05_2018_035017.jpg'),
(88, 'Mariana Peixoto', 'Recado:Recentemente contratei o Trio Bagunça para o aniversário do meu filho de 4 anos (tema super heróis) e da minha filha de 2 anos (tema jardim) e, antes disso, já tinha contratado eles pra uma outra festinha...☺️. Sabe aquele item que não pode faltar? Esse item passou a ser eles! Todos os profissionais que trabalharam nas festinhas dos meus filhos foram ótimos! Pessoas educadas, de ótima energia e super solicitas, que simplesmente tomam de conta das crianças e até mesmo dos outros convidados em algumas brincadeiras, tornando tudo muito divertido! São simplesmente excelentes e fazem toda a diferença! Indico de olhos fechados, sempre só recebo elogios! E que  venham as próximas festinhas! Abraço aos colaboradores e fica aí a dica é a recomendação! Só tenho a agradecer!☺️', '07/05/2018 17:21:16', 'Sim', 'clientes_07_05_2018_052116.jpeg'),
(90, 'Misler Campos', 'Recado:Simplismente muito encantada com o trabalho dessa turma animada. Todos muito atensiosos e pacientes com todas as crianças!  Também não posso deixar de citar a pontualidade,  excelente.  Agradeço a vocês por nos proporcionar momentos de alegria e encantamento aos  nossos pequenos. Super indico vcs sempre! Mil beijos...', '21/05/2018 22:09:37', 'Sim', 'clientes_21_05_2018_100937.jpg'),
(91, 'Claudia cristiani de santi conde teixeira', 'Recado: contratei o pessoal da animação e o personagem Marshall só tenho elogios e agradecimento com todos serviço simplesmente MARAVILHOSO as prendas q deram para as crianças foi muito boa fantasia do personagem muito perfeita. Pessoal do trio bagunça só tenho q agradecer por tudo por ajudar a realizar um sonho da minha filha. Serviço nota 1000 super recomendo ', '28/05/2018 16:09:55', 'Sim', 'clientes_28_05_2018_040955.mp4'),
(92, 'Rose Pestana', 'Recado: Obrigada trio bagunça ,os bonecos vivos foram sensação da festa minha Valentina .\r\nMinha filha ficou muito feliz ❤️', '04/06/2018 10:32:35', 'Sim', 'clientes_04_06_2018_103235.jpg'),
(93, 'Maria Valentina', 'Recado: tudo lindo ', '04/06/2018 18:35:39', 'Sim', 'clientes_04_06_2018_063539.MOV'),
(94, 'Glaucilene', 'Recado: Foi um Sucesso entre crianças e adultos! Vai ter repeteco.', '04/06/2018 22:47:18', 'Sim', 'clientes_04_06_2018_104718.jpg'),
(97, 'Maria Valentina', 'Recado: contratei o trio bagunça e eles proporcionaram muita alegria, a felicidade da Valentina ficou estampada no rostinho dela e continua até hoje, ela esta encantada e até pediu bis', '06/06/2018 10:32:57', 'Sim', 'clientes_06_06_2018_103257.jpeg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `servicos`
--

CREATE TABLE `servicos` (
  `id_servico` int(9) NOT NULL,
  `tipo_servico` varchar(50) NOT NULL,
  `nome_servico` varchar(50) NOT NULL,
  `imagem_servico` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `servicos`
--

INSERT INTO `servicos` (`id_servico`, `tipo_servico`, `nome_servico`, `imagem_servico`) VALUES
(79, 'Personagem Vivo', '', 'servico_02_06_2016_115723.jpg'),
(80, 'Personagem Vivo', '', 'servico_02_06_2016_115730.jpg'),
(99, 'Pintura de Rosto', '', 'servico_02_06_2016_122201.jpg'),
(100, 'Pintura de Rosto', '', 'servico_02_06_2016_122211.jpg'),
(101, 'Pintura de Rosto', '', 'servico_02_06_2016_122224.jpg'),
(102, 'Pintura de Rosto', '', 'servico_02_06_2016_122236.jpg'),
(104, 'Pintura de Rosto', '', 'servico_02_06_2016_122306.jpg'),
(105, 'Animação Infantil', '', 'servico_02_06_2016_122606.jpg'),
(108, 'Caricatura', '', 'servico_02_06_2016_031619.jpg'),
(109, 'Caricatura', '', 'servico_02_06_2016_031851.jpg'),
(113, 'Caricatura', '', 'servico_02_06_2016_045238.jpg'),
(114, 'Pintura de Rosto', '', 'servico_02_06_2016_054735.jpg'),
(115, 'Pintura de Rosto', '', 'servico_02_06_2016_054750.jpg'),
(117, 'Pintura de Rosto', '', 'servico_02_06_2016_054915.jpg'),
(118, 'Pintura de Rosto', '', 'servico_02_06_2016_054938.jpg'),
(119, 'Pintura de Rosto', '', 'servico_02_06_2016_054957.jpg'),
(120, 'Pintura de Rosto', '', 'servico_02_06_2016_055010.jpg'),
(121, 'Pintura de Rosto', '', 'servico_02_06_2016_055033.jpg'),
(122, 'Pintura de Rosto', '', 'servico_02_06_2016_055054.jpg'),
(123, 'Pintura de Rosto', '', 'servico_02_06_2016_055112.jpg'),
(124, 'Pintura de Rosto', '', 'servico_02_06_2016_055125.jpg'),
(125, 'Pintura de Rosto', '', 'servico_02_06_2016_055147.jpg'),
(127, 'Pintura de Rosto', '', 'servico_02_06_2016_055226.jpg'),
(128, 'Pintura de Rosto', '', 'servico_02_06_2016_055412.jpg'),
(130, 'Animação Infantil', '', 'servico_02_06_2016_055716.jpg'),
(134, 'Animação Infantil', '', 'servico_02_06_2016_055914.jpg'),
(135, 'Animação Infantil', '', 'servico_02_06_2016_055940.jpg'),
(139, 'Caricatura', '', 'servico_02_06_2016_064946.jpg'),
(140, 'Caricatura', '', 'servico_02_06_2016_065337.jpg'),
(141, 'Caricatura', '', 'servico_02_06_2016_085706.jpg'),
(150, 'Personagem Vivo', '', 'servico_03_06_2016_114018.jpg'),
(151, 'Personagem Vivo', '', 'servico_03_06_2016_114201.jpg'),
(157, 'Personagem Vivo', '', 'servico_03_06_2016_114715.jpg'),
(161, 'Sob Encomenda', '', 'servico_05_06_2016_051814.jpg'),
(162, 'Sob Encomenda', '', 'servico_05_06_2016_052041.jpg'),
(163, 'Sob Encomenda', '', 'servico_05_06_2016_052123.jpg'),
(164, 'Sob Encomenda', '', 'servico_05_06_2016_052202.jpg'),
(165, 'Sob Encomenda', '', 'servico_05_06_2016_052238.jpg'),
(168, 'Personagem Vivo', '', 'servico_10_06_2016_092150.jpg'),
(170, 'Personagem Vivo', '', 'servico_10_06_2016_092736.jpg'),
(173, 'Personagem Vivo', '', 'servico_10_06_2016_093513.jpg'),
(174, 'Personagem Vivo', '', 'servico_10_06_2016_093556.jpg'),
(175, 'Personagem Vivo', '', 'servico_10_06_2016_093734.jpg'),
(179, 'Balão Mania', '', 'servico_10_06_2016_094639.jpg'),
(182, 'Balão Mania', '', 'servico_10_06_2016_094716.jpg'),
(186, 'Balão Mania', '', 'servico_10_06_2016_094800.jpg'),
(187, 'Balão Mania', '', 'servico_10_06_2016_094810.jpg'),
(188, 'Balão Mania', '', 'servico_10_06_2016_095049.jpg'),
(192, 'Animação Infantil', '', 'servico_13_06_2016_092038.jpg'),
(193, 'Animação Infantil', '', 'servico_13_06_2016_092049.jpg'),
(194, 'Animação Infantil', '', 'servico_13_06_2016_092100.jpg'),
(198, 'Pintura de Rosto', '', 'servico_13_06_2016_092949.jpg'),
(199, 'Balão Mania', '', 'servico_13_06_2016_093456.jpg'),
(200, 'Personagem Vivo', '', 'servico_14_06_2016_085909.jpg'),
(205, 'Personagem Vivo', '', 'servico_20_06_2016_075318.jpg'),
(207, 'Bagunça Top', '', 'servico_20_06_2016_075404.jpg'),
(209, 'Bagunça Top', '', 'servico_20_06_2016_075433.jpg'),
(212, 'Bagunça Top', '', 'servico_20_06_2016_075522.jpg'),
(215, 'Bagunça Top', '', 'servico_20_06_2016_075610.jpg'),
(216, 'Bagunça Top', '', 'servico_20_06_2016_075626.jpg'),
(217, 'Pintura de Rosto', '', 'servico_20_06_2016_080740.jpg'),
(222, 'Personagem Vivo', '', 'servico_08_07_2016_112252.jpg'),
(223, 'Pintura de Rosto', '', 'servico_08_07_2016_112725.jpeg'),
(226, 'Animação Infantil', '', 'servico_20_07_2016_071033.jpg'),
(228, 'Pintura de Rosto', '', 'servico_20_07_2016_071111.jpg'),
(229, 'Pintura de Rosto', '', 'servico_20_07_2016_071121.jpg'),
(230, 'Personagem Vivo', '', 'servico_22_09_2016_081347.jpg'),
(233, 'Personagem Vivo', '', 'servico_22_09_2016_081430.jpg'),
(235, 'Personagem Vivo', '', 'servico_22_09_2016_081453.jpg'),
(236, 'Personagem Vivo', '', 'servico_22_09_2016_081509.jpg'),
(238, 'Personagem Vivo', '', 'servico_22_09_2016_081533.jpg'),
(239, 'Personagem Vivo', '', 'servico_22_09_2016_081548.jpg'),
(241, 'Personagem Vivo', '', 'servico_22_09_2016_081612.jpg'),
(242, 'Personagem Vivo', '', 'servico_22_09_2016_081624.jpg'),
(243, 'Animação Infantil', '', 'servico_22_09_2016_081638.jpg'),
(244, 'Personagem Vivo', '', 'servico_22_09_2016_081654.jpg'),
(247, 'Personagem Vivo', '', 'servico_22_09_2016_081732.jpg'),
(248, 'Animação Infantil', '', 'servico_03_10_2016_093332.jpg'),
(249, 'Animação Infantil', '', 'servico_03_10_2016_093346.jpg'),
(250, 'Animação Infantil', '', 'servico_03_10_2016_093356.jpg'),
(251, 'Pintura de Rosto', '', 'servico_03_10_2016_093409.jpg'),
(252, 'Pintura de Rosto', '', 'servico_03_10_2016_093425.jpg'),
(253, 'Animação Infantil', '', 'servico_21_11_2016_044636.jpg'),
(254, 'Animação Infantil', '', 'servico_21_11_2016_044648.jpg'),
(255, 'Animação Infantil', '', 'servico_21_11_2016_044703.jpg'),
(256, 'Animação Infantil', '', 'servico_21_11_2016_044717.jpg'),
(257, 'Pintura de Rosto', '', 'servico_21_11_2016_044742.jpg'),
(258, 'Pintura de Rosto', '', 'servico_21_11_2016_044759.jpg'),
(259, 'Pintura de Rosto', '', 'servico_21_11_2016_044817.jpg'),
(261, 'Personagem Vivo', '', 'servico_21_11_2016_044858.jpg'),
(262, 'Personagem Vivo', '', 'servico_21_11_2016_044915.jpg'),
(263, 'Personagem Vivo', '', 'servico_21_11_2016_044924.jpg'),
(264, 'Personagem Vivo', '', 'servico_21_11_2016_044949.jpg'),
(265, 'Personagem Vivo', '', 'servico_21_11_2016_045005.jpg'),
(270, 'Personagem Vivo', 'Branca de Neve', 'servico_29_11_2016_100456.png'),
(271, 'Personagem Vivo', 'Branca de Neve', 'servico_29_11_2016_100526.png'),
(273, 'Personagem Vivo', 'Ariel', 'servico_29_11_2016_100635.jpg'),
(276, 'Personagem Vivo', 'Batgirl e Mulher Maravilha', 'servico_29_11_2016_100828.png'),
(278, 'Personagem Vivo', 'Princesa Sofia', 'servico_29_11_2016_100946.png'),
(279, 'Personagem Vivo', 'Anna e Elsa', 'servico_29_11_2016_101126.png'),
(280, 'Personagem Vivo', 'Elsa', 'servico_29_11_2016_101349.png'),
(281, 'Personagem Vivo', 'Elsa', 'servico_29_11_2016_101409.png'),
(282, 'Personagem Vivo', 'Anna e Elsa', 'servico_29_11_2016_101450.png'),
(283, 'Personagem Vivo', 'Anna, Elsa, Olaf e Kristoff', 'servico_29_11_2016_101520.png'),
(284, 'Personagem Vivo', 'Anna, Elsa, Olaf e Kristoff', 'servico_29_11_2016_101557.png'),
(285, 'Personagem Vivo', 'Elsa', 'servico_29_11_2016_101622.jpg'),
(286, 'Personagem Vivo', 'Elsa', 'servico_29_11_2016_101644.jpg'),
(288, 'Personagem Vivo', 'Anna', 'servico_29_11_2016_101737.jpg'),
(289, 'Personagem Vivo', 'Elsa', 'servico_29_11_2016_101801.jpg'),
(290, 'Personagem Vivo', 'Anna', 'servico_29_11_2016_101825.jpg'),
(291, 'Personagem Vivo', 'Anna e Elsa', 'servico_29_11_2016_102819.jpg'),
(292, 'Personagem Vivo', 'Elsa', 'servico_29_11_2016_102841.jpg'),
(293, 'Personagem Vivo', 'Anna e Elsa', 'servico_29_11_2016_102913.jpg'),
(294, 'Personagem Vivo', 'Olaf e Elsa', 'servico_29_11_2016_102941.jpg'),
(298, 'Personagem Vivo', 'Bela', 'servico_29_11_2016_103405.jpg'),
(299, 'Personagem Vivo', 'Bela', 'servico_29_11_2016_103429.jpg'),
(301, 'Personagem Vivo', 'Branca de Neve', 'servico_29_11_2016_103518.jpg'),
(303, 'Personagem Vivo', 'Princesa Sofia', 'servico_29_11_2016_103643.jpg'),
(308, 'Personagem Vivo', 'Homem Aranha', 'servico_29_11_2016_104445.jpg'),
(309, 'Personagem Vivo', 'Valente', 'servico_29_11_2016_104528.jpg'),
(310, 'Animação Infantil', 'Oficina de bonequinhos de farinha', 'servico_05_12_2016_075111.jpg'),
(314, 'Personagem Vivo', 'Ariel', 'servico_05_12_2016_075623.jpg'),
(315, 'Pintura de Rosto', 'Pintura- Borboleta', 'servico_05_12_2016_075655.jpg'),
(316, 'Pintura de Rosto', 'Pintura- Homem Aranha', 'servico_05_12_2016_075728.jpg'),
(317, 'Personagem Vivo', 'Malévola', 'servico_05_12_2016_075752.jpg'),
(319, 'Caricatura', '', 'servico_29_12_2016_125527.jpeg'),
(321, 'Caricatura', '', 'servico_30_12_2016_083851.jpeg'),
(322, 'Caricatura', '', 'servico_30_12_2016_083914.jpeg'),
(323, 'Caricatura', '', 'servico_30_12_2016_083941.jpeg'),
(324, 'Caricatura', '', 'servico_30_12_2016_084006.jpeg'),
(325, 'Caricatura', '', 'servico_30_12_2016_084029.jpeg'),
(327, 'Caricatura', '', 'servico_30_12_2016_084132.jpeg'),
(328, 'Caricatura', '', 'servico_30_12_2016_084154.jpeg'),
(329, 'Caricatura', '', 'servico_30_12_2016_084216.jpeg'),
(330, 'Caricatura', '', 'servico_30_12_2016_084247.jpeg'),
(331, 'Caricatura', '', 'servico_30_12_2016_084317.jpeg'),
(332, 'Caricatura', '', 'servico_30_12_2016_084350.jpeg'),
(333, 'Caricatura', '', 'servico_30_12_2016_084416.jpeg'),
(334, 'Caricatura', '', 'servico_30_12_2016_084445.jpeg'),
(335, 'Caricatura', '', 'servico_30_12_2016_084507.jpeg'),
(336, 'Caricatura', '', 'servico_30_12_2016_084534.jpeg'),
(337, 'Caricatura', '', 'servico_30_12_2016_084604.jpeg'),
(338, 'Caricatura', '', 'servico_30_12_2016_084629.jpeg'),
(339, 'Caricatura', '', 'servico_30_12_2016_084941.jpeg'),
(340, 'Caricatura', '', 'servico_30_12_2016_085006.jpeg'),
(341, 'Caricatura', '', 'servico_30_12_2016_085034.jpeg'),
(342, 'Animação Infantil', '', 'servico_30_12_2016_093901.jpg'),
(343, 'Animação Infantil', '', 'servico_30_12_2016_093915.jpg'),
(344, 'Animação Infantil', '', 'servico_30_12_2016_093939.jpg'),
(345, 'Animação Infantil', '', 'servico_30_12_2016_093953.jpg'),
(346, 'Personagem Vivo', '', 'servico_30_12_2016_094012.jpg'),
(347, 'Personagem Vivo', '', 'servico_30_12_2016_094027.jpg'),
(353, 'Personagem Vivo', '', 'servico_30_12_2016_094154.jpg'),
(354, 'Animação Infantil', '', 'servico_30_12_2016_094207.jpg'),
(357, 'Pintura de Rosto', '', 'servico_30_12_2016_094303.jpg'),
(358, 'Pintura de Rosto', '', 'servico_30_12_2016_094315.jpg'),
(359, 'Pintura de Rosto', '', 'servico_30_12_2016_094328.jpg'),
(360, 'Pintura de Rosto', '', 'servico_30_12_2016_094341.jpg'),
(361, 'Pintura de Rosto', '', 'servico_30_12_2016_094357.jpg'),
(362, 'Animação Infantil', '', 'servico_30_12_2016_095516.jpg'),
(363, 'Animação Infantil', '', 'servico_30_12_2016_095527.jpg'),
(364, 'Animação Infantil', '', 'servico_30_12_2016_095541.jpg'),
(365, 'Animação Infantil', '', 'servico_30_12_2016_095557.jpeg'),
(366, 'Animação Infantil', '', 'servico_30_12_2016_095607.jpg'),
(368, 'Animação Infantil', '', 'servico_30_12_2016_095629.jpg'),
(369, 'Pintura de Rosto', '', 'servico_30_12_2016_095648.jpg'),
(370, 'Personagem Vivo', '', 'servico_30_12_2016_095658.jpg'),
(371, 'Personagem Vivo', '', 'servico_30_12_2016_095718.jpg'),
(373, 'Animação Infantil', '', 'servico_18_01_2017_064704.jpeg'),
(374, 'Personagem Vivo', '', 'servico_18_01_2017_064726.jpeg'),
(378, 'Balão Mania', '', 'servico_18_01_2017_065105.jpeg'),
(379, 'Balão Mania', '', 'servico_18_01_2017_065120.jpeg'),
(381, 'Bagunça Top', '', 'servico_28_01_2017_063121.jpg'),
(383, 'Bagunça Top', '', 'servico_28_01_2017_063251.jpg'),
(384, 'Balão Mania', '', 'servico_29_01_2017_064217.jpeg'),
(385, 'Animação Infantil', '', 'servico_29_01_2017_064234.jpeg'),
(386, 'Sob Encomenda', '', 'servico_04_02_2017_013631.jpg'),
(388, 'Bagunça Top', '', 'servico_04_02_2017_084419.jpg'),
(389, 'Bagunça Top', '', 'servico_04_02_2017_084510.jpg'),
(390, 'Bagunça Top', '', 'servico_04_02_2017_084553.jpg'),
(391, 'Animação Infantil', '', 'servico_04_02_2017_084829.jpg'),
(393, 'Animação Infantil', '', 'servico_04_02_2017_084941.jpg'),
(394, 'Animação Infantil', '', 'servico_04_02_2017_085018.jpg'),
(396, 'Pintura de Rosto', '', 'servico_04_02_2017_085107.jpg'),
(397, 'Bagunça Top', '', 'servico_04_02_2017_085415.jpg'),
(398, 'Sob Encomenda', '', 'servico_06_02_2017_062653.jpg'),
(399, 'Bagunça Top', '', 'servico_27_02_2017_084136.jpeg'),
(400, 'Animação Infantil', '', 'servico_27_02_2017_084230.jpg'),
(402, 'Animação Infantil', '', 'servico_27_02_2017_084319.jpg'),
(403, 'Pintura de Rosto', '', 'servico_27_02_2017_084336.jpg'),
(404, 'Pintura de Rosto', '', 'servico_27_02_2017_084400.jpg'),
(406, 'Pintura de Rosto', '', 'servico_27_02_2017_084447.jpg'),
(408, 'Pintura de Rosto', '', 'servico_27_02_2017_084658.jpg'),
(409, 'Pintura de Rosto', '', 'servico_27_02_2017_084711.jpg'),
(410, 'Pintura de Rosto', '', 'servico_27_02_2017_084731.jpg'),
(411, 'Pintura de Rosto', '', 'servico_05_03_2017_080115.jpg'),
(412, 'Pintura de Rosto', '', 'servico_05_03_2017_080138.jpg'),
(413, 'Pintura de Rosto', '', 'servico_05_03_2017_080216.jpg'),
(414, 'Pintura de Rosto', '', 'servico_05_03_2017_080230.jpg'),
(415, 'Pintura de Rosto', '', 'servico_05_03_2017_080245.jpg'),
(416, 'Balão Mania', '', 'servico_12_03_2017_090636.jpg'),
(417, 'Balão Mania', '', 'servico_12_03_2017_090659.jpg'),
(418, 'Pintura de Rosto', '', 'servico_05_04_2017_090430.jpg'),
(419, 'Animação Infantil', '', 'servico_13_04_2017_063200.jpg'),
(420, 'Animação Infantil', '', 'servico_13_04_2017_063227.jpg'),
(423, 'Animação Infantil', '', 'servico_07_06_2017_080156.jpg'),
(424, 'Animação Infantil', '', 'servico_07_06_2017_080217.jpg'),
(425, 'Animação Infantil', '', 'servico_07_06_2017_080237.jpg'),
(426, 'Animação Infantil', '', 'servico_07_06_2017_080256.jpg'),
(430, 'Personagem Vivo', '', 'servico_07_06_2017_080430.jpg'),
(433, 'Personagem Vivo', '', 'servico_07_06_2017_080507.jpg'),
(435, 'Personagem Vivo', '', 'servico_07_06_2017_080529.jpg'),
(436, 'Personagem Vivo', '', 'servico_07_06_2017_080544.jpg'),
(437, 'Personagem Vivo', 'Alice no País das Maravilhas', 'servico_18_06_2017_025851.png'),
(438, 'Personagem Vivo', 'Barbie', 'servico_18_06_2017_025918.png'),
(439, 'Personagem Vivo', 'Bela', 'servico_18_06_2017_025939.png'),
(440, 'Personagem Vivo', 'Anna e Elsa', 'servico_18_06_2017_030005.jpg'),
(441, 'Personagem Vivo', 'Homem Aranha', 'servico_18_06_2017_030030.png'),
(445, 'Personagem Vivo', 'Super Homem', 'servico_18_06_2017_030240.jpg'),
(446, 'Personagem Vivo', 'Fada', 'servico_18_06_2017_030340.jpg'),
(448, 'Personagem Vivo', 'Moana', 'servico_18_06_2017_030450.jpg'),
(451, 'Animação Infantil', '', 'servico_18_06_2017_030713.jpg'),
(457, 'Personagem Vivo', 'Principe', 'servico_01_11_2017_060745.jpg'),
(462, 'Personagem Vivo', 'Anna', 'servico_01_11_2017_061025.jpg'),
(464, 'Contação de História', 'Contação', 'servico_01_11_2017_061156.jpg'),
(466, 'Personagem Vivo', 'Moana', 'servico_01_11_2017_061443.jpg'),
(467, 'Personagem Vivo', 'Mickey', 'servico_01_11_2017_061756.jpg'),
(469, 'Personagem Vivo', 'Super Homem', 'servico_01_11_2017_061909.jpg'),
(470, 'Contação de História', '', 'servico_01_11_2017_062018.jpg'),
(471, 'Animação Infantil', '', 'servico_01_11_2017_062127.jpg'),
(473, 'Personagem Vivo', 'Bela', 'servico_01_11_2017_062755.jpg'),
(474, 'Personagem Vivo', 'Capitão América', 'servico_01_11_2017_062844.jpg'),
(475, 'Personagem Vivo', 'Moana', 'servico_01_11_2017_062944.jpg'),
(476, 'Personagem Vivo', 'Anna', 'servico_01_11_2017_063046.jpg'),
(477, 'Personagem Vivo', 'Elsa', 'servico_01_11_2017_063151.jpg'),
(479, 'Personagem Vivo', 'Moana', 'servico_01_11_2017_063426.jpg'),
(480, 'Personagem Vivo', 'Homem Aranha', 'servico_01_11_2017_063530.jpg'),
(481, 'Personagem Vivo', 'Moana', 'servico_01_11_2017_064352.jpg'),
(482, 'Personagem Vivo', 'Ariel', 'servico_01_11_2017_064433.jpg'),
(483, 'Personagem Vivo', 'Mulher Maravilha', 'servico_01_11_2017_064513.jpg'),
(484, 'Personagem Vivo', 'Cinderela', 'servico_01_11_2017_064558.jpg'),
(485, 'Personagem Vivo', 'Aurora', 'servico_01_11_2017_064637.jpg'),
(487, 'Personagem Vivo', 'Elsa', 'servico_01_11_2017_064819.jpg'),
(488, 'Personagem Vivo', 'Moana', 'servico_01_11_2017_064907.jpg'),
(489, 'Personagem Vivo', 'Ariel', 'servico_01_11_2017_065031.jpg'),
(490, 'Personagem Vivo', 'Olaf', 'servico_01_11_2017_065142.jpg'),
(494, 'Personagem Vivo', 'Alice', 'servico_01_11_2017_084841.jpg'),
(495, 'Personagem Vivo', 'Minnie', 'servico_01_11_2017_084925.jpg'),
(496, 'Personagem Vivo', 'Princesas', 'servico_01_11_2017_085004.jpg'),
(497, 'Animação Infantil', '', 'servico_01_11_2017_085039.jpg'),
(498, 'Personagem Vivo', 'Kristoff', 'servico_01_11_2017_085228.jpg'),
(499, 'Personagem Vivo', 'Minnie', 'servico_01_11_2017_085322.jpg'),
(501, 'Personagem Vivo', 'Bataman', 'servico_01_11_2017_085449.jpg'),
(503, 'Personagem Vivo', 'Thor', 'servico_01_11_2017_085602.jpg'),
(504, 'Personagem Vivo', 'Princesa Sofia', 'servico_01_11_2017_085715.jpg'),
(505, 'Personagem Vivo', 'Alice', 'servico_01_11_2017_085751.jpg'),
(510, 'Personagem Vivo', 'Jasmine', 'servico_01_11_2017_090232.jpg'),
(511, 'Animação Infantil', '', 'servico_01_11_2017_090348.jpg'),
(512, 'Personagem Vivo', 'Elsa', 'servico_01_11_2017_090425.jpg'),
(514, 'Personagem Vivo', 'Olaf', 'servico_01_11_2017_090658.jpg'),
(516, 'Personagem Vivo', 'Batman', 'servico_01_11_2017_090845.jpg'),
(517, 'Personagem Vivo', 'Pocahontas', 'servico_01_11_2017_090957.jpg'),
(518, 'Personagem Vivo', '', 'servico_25_01_2018_081116.jpg'),
(519, 'Animação Infantil', '', 'servico_20_05_2018_041356.jpg'),
(520, 'Animação Infantil', '', 'servico_20_05_2018_041425.jpg'),
(521, 'Animação Infantil', '', 'servico_20_05_2018_041445.jpg'),
(522, 'Animação Infantil', '', 'servico_20_05_2018_041504.jpg'),
(523, 'Animação Infantil', '', 'servico_20_05_2018_041523.jpg'),
(524, 'Animação Infantil', '', 'servico_20_05_2018_041634.jpg'),
(525, 'Animação Infantil', '', 'servico_20_05_2018_041658.jpg'),
(526, 'Animação Infantil', '', 'servico_20_05_2018_041807.jpg'),
(527, 'Pintura de Rosto', '', 'servico_20_05_2018_041935.jpg'),
(528, 'Pintura de Rosto', '', 'servico_20_05_2018_042002.jpg'),
(530, 'Pintura de Rosto', '', 'servico_20_05_2018_042023.jpg'),
(532, 'Pintura de Rosto', '', 'servico_20_05_2018_042317.jpg'),
(533, 'Pintura de Rosto', '', 'servico_20_05_2018_042341.jpg'),
(534, 'Pintura de Rosto', '', 'servico_20_05_2018_042402.jpg'),
(535, 'Pintura de Rosto', '', 'servico_20_05_2018_042432.jpg'),
(536, 'Pintura de Rosto', '', 'servico_20_05_2018_042537.jpg'),
(539, 'Pintura de Rosto', '', 'servico_20_05_2018_042625.jpg'),
(541, 'Personagem Vivo', 'Ariel', 'servico_20_05_2018_043454.jpg'),
(542, 'Personagem Vivo', 'Mickey e Minnie- Tema Reinado', 'servico_20_05_2018_043547.jpg'),
(543, 'Personagem Vivo', 'Moana', 'servico_20_05_2018_043634.jpg'),
(544, 'Personagem Vivo', 'Capitão América', 'servico_20_05_2018_043706.jpg'),
(546, 'Personagem Vivo', 'Fera', 'servico_20_05_2018_043739.jpg'),
(547, 'Personagem Vivo', 'Rapunzel e Principe', 'servico_20_05_2018_043825.jpg'),
(549, 'Personagem Vivo', 'Ryder E Marshall', 'servico_20_05_2018_043901.jpg'),
(551, 'Personagem Vivo', 'Chapeuzinho Vermelho e Lobo Mau', 'servico_20_05_2018_044004.jpg'),
(553, 'Personagem Vivo', 'Branca de Neve', 'servico_20_05_2018_044248.jpeg'),
(554, 'Personagem Vivo', 'Capitão América', 'servico_20_05_2018_044353.jpg'),
(555, 'Pintura de Rosto', '', 'servico_20_05_2018_044426.jpg'),
(557, 'Pintura de Rosto', '', 'servico_20_05_2018_044508.jpg'),
(558, 'Personagem Vivo', 'Mulher Maravilha', 'servico_20_05_2018_044534.jpeg'),
(559, 'Personagem Vivo', 'Moana', 'servico_20_05_2018_044639.jpg'),
(560, 'Personagem Vivo', 'Masha e o Urso', 'servico_21_05_2018_075156.jpeg'),
(561, 'Personagem Vivo', 'Masha e o Urso', 'servico_21_05_2018_075440.jpeg'),
(562, 'Personagem Vivo', 'Anna', 'servico_21_05_2018_075533.png'),
(564, 'Personagem Vivo', 'Kristoff', 'servico_21_05_2018_075654.png'),
(565, 'Personagem Vivo', 'Moana', 'servico_21_05_2018_075756.png'),
(566, 'Personagem Vivo', 'Frozen', 'servico_21_05_2018_075843.jpeg'),
(567, 'Pintura de Rosto', '', 'servico_21_05_2018_075922.jpeg'),
(568, 'Contação de História', '', 'servico_21_05_2018_075956.jpeg'),
(569, 'Personagem Vivo', 'Fada', 'servico_21_05_2018_093756.JPG'),
(570, 'Personagem Vivo', 'Moana', 'servico_21_05_2018_093834.JPG'),
(571, 'Contação de História', '', 'servico_21_05_2018_101609.JPG'),
(572, 'Personagem Vivo', 'Batman', 'servico_21_05_2018_102353.JPG'),
(573, 'Personagem Vivo', 'Rapunzel', 'servico_23_05_2018_092236.jpg'),
(574, 'Personagem Vivo', 'Rapunzel', 'servico_23_05_2018_092452.jpg'),
(575, 'Personagem Vivo', 'Minnie Rosa', 'servico_23_05_2018_093056.jpg'),
(576, 'Personagem Vivo', 'Anna e Elsa', 'servico_23_05_2018_094151.jpg'),
(577, 'Animação Infantil', '', 'servico_23_05_2018_094503.JPG'),
(578, 'Pintura de Rosto', '', 'servico_23_05_2018_094618.JPG'),
(580, 'Contação de História', '', 'servico_23_05_2018_094814.JPG'),
(581, 'Contação de História', '', 'servico_23_05_2018_094836.JPG'),
(582, 'Contação de História', '', 'servico_23_05_2018_094854.JPG'),
(584, 'Contação de História', '', 'servico_23_05_2018_094915.JPG'),
(586, 'Contação de História', '', 'servico_23_05_2018_094956.JPG'),
(587, 'Contação de História', '', 'servico_23_05_2018_095032.JPG'),
(588, 'Animação Infantil', '', 'servico_29_05_2018_062701.jpeg'),
(589, 'Animação Infantil', '', 'servico_29_05_2018_063026.jpeg'),
(590, 'Animação Infantil', '', 'servico_29_05_2018_063309.jpeg'),
(591, 'Personagem Vivo', 'Cinderela', 'servico_29_05_2018_063527.jpeg'),
(594, 'Animação Infantil', '', 'servico_29_05_2018_063947.jpeg'),
(596, 'Personagem Vivo', 'Cinderela', 'servico_29_05_2018_064605.jpeg'),
(597, 'Personagem Vivo', 'Branca de Neve', 'servico_29_05_2018_064632.jpeg'),
(598, 'Personagem Vivo', 'Branca de Neve', 'servico_29_05_2018_064832.jpeg'),
(599, 'Personagem Vivo', 'Skye- Patrulha Canina', 'servico_04_06_2018_102907.jpeg'),
(600, 'Personagem Vivo', 'Skye- Patrulha Canina', 'servico_04_06_2018_103044.jpeg'),
(601, 'Personagem Vivo', 'Skye- Patrulha Canina', 'servico_04_06_2018_103159.jpeg'),
(602, 'Personagem Vivo', 'Ariel', 'servico_05_06_2018_091341.jpeg'),
(603, 'Contação de História', '', 'servico_06_06_2018_110249.jpeg'),
(604, 'Contação de História', '', 'servico_06_06_2018_110302.jpeg'),
(605, 'Contação de História', '', 'servico_06_06_2018_110402.jpeg'),
(606, 'Contação de História', '', 'servico_06_06_2018_110424.jpeg'),
(607, 'Contação de História', '', 'servico_06_06_2018_110444.jpeg'),
(608, 'Personagem Vivo', 'Cinderela', 'servico_06_06_2018_110504.jpeg'),
(609, 'Personagem Vivo', 'Bruxinha', 'servico_06_06_2018_110538.jpeg'),
(610, 'Personagem Vivo', 'Príncipe', 'servico_06_06_2018_110617.jpeg'),
(612, 'Camarim Fashion', 'Camarin do Carai de Asas 2', 'servico_06_06_2018_083347.jpeg'),
(613, 'Camarim Fashion', 'Camarin do Carai de Asas 3', 'servico_06_06_2018_083400.jpeg'),
(614, 'Oficina de Slime', 'testando', 'servico_22_10_2018_122810.jpg'),
(615, 'Oficina de Slime', 'testando2', 'servico_22_10_2018_122823.jpg'),
(616, 'Oficina de Slime', 'testando3', 'servico_22_10_2018_122833.jpg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `trio`
--

CREATE TABLE `trio` (
  `id_trio` int(9) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `idade` date NOT NULL,
  `funcao` varchar(100) NOT NULL,
  `alem` varchar(100) NOT NULL,
  `rede_social` varchar(50) NOT NULL,
  `foto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `trio`
--

INSERT INTO `trio` (`id_trio`, `nome`, `idade`, `funcao`, `alem`, `rede_social`, `foto`) VALUES
(34, 'Natália Bittencourt', '1993-01-23', 'Personagem Vivo e Sócia', 'Fisioterapeuta, Atriz e Modelo', '', 'parceiro_01_06_2016_103603.jpg'),
(35, 'Nayara Bittencourt', '1994-03-02', 'Personagem e Sócia', 'Fisioterapeuta Residente - SES/DF', '', 'parceiro_02_06_2016_123421.jpg'),
(36, 'Valmir Teotonio', '1991-06-21', 'Personagem, Animador, Sócio e Pintor (pintura de rosto)', 'Estudante de Saúde Coletiva UnB e Técnico em Recreação e Lazer', '', 'parceiro_01_06_2016_103604.jpg'),
(38, 'Andreza Marques', '1997-07-22', 'Personagem e Pintura', 'Estudante de Fonoaudiologia- UnB', '', 'parceiro_02_06_2016_123845.jpg'),
(52, 'Karla Barboza', '1995-09-07', 'Animação', 'Estudante de Veterinária', '', 'parceiro_02_06_2016_013559.jpg'),
(58, 'Fabrício Hundou', '0000-00-00', 'Pintura e Animação', 'Terapeuta Ocupacional', '', 'parceiro_02_06_2016_025319.jpg'),
(59, 'Brendon Lelis', '1995-02-20', 'Animação', 'Estudante de Sistemas de Informação', '', 'parceiro_02_06_2016_045055.jpg'),
(61, 'Alan Costa', '1991-09-15', 'Gestor', 'Técnico de Informática e Gestor em tecnologia da informação', '', 'parceiro_02_06_2016_061330.jpg'),
(62, 'Luciana Rezende', '1996-04-01', 'Animação e Pintura', 'Estudante de Fonoaudiólogia UnB', '', 'parceiro_02_06_2016_063306.jpg'),
(70, 'Mariana Martinez', '1995-08-14', 'Animação, Pintura e Personagem', 'Estudante de Engenharia UnB', '', 'parceiro_29_06_2016_085310.jpg'),
(71, 'Terra Thais', '1991-07-05', 'Animação', 'Estudante de Comunicação Social UnB', '', 'parceiro_05_03_2017_083157.jpg'),
(74, 'Caroliny Victória', '1998-05-14', 'Animação', 'Estudante de Enfermagem UnB', '', 'parceiro_26_06_2017_094424.jpg'),
(76, 'Isabella Mariana', '1997-07-06', 'Pintura', 'Estudante de Saúde Coletiva UnB', '', 'parceiro_26_06_2017_095706.jpg'),
(77, 'Jéssica Campos', '1998-09-25', 'Animação', 'Estudante de Fisioterapia', '', 'parceiro_01_07_2017_081428.jpg'),
(78, 'Gabryella Dias', '1993-07-12', 'Animação', 'Enfermeira', '', 'parceiro_02_07_2017_080717.jpg'),
(80, 'Andrezza Rocha', '1997-03-25', 'Animação', 'Estudante de Fisioterapia UnB', '', 'parceiro_12_07_2017_045600.jpg'),
(81, 'Jeremias Bruno', '1996-01-25', 'Pintura', 'Estudante de Fisioterapia UnB', '', 'parceiro_14_07_2017_040041.jpg'),
(82, 'Anderson Francisco', '1996-02-21', 'Personagem', 'Estudante de Fonoaudiologia UnB', '', 'parceiro_22_07_2017_031013.jpg'),
(84, 'Bárbara Lorrane', '1992-02-21', 'Animação', 'Estudante de Terapia Ocupacional UnB', '', 'parceiro_22_07_2017_031429.jpg'),
(85, 'Carolyne Sousa', '1994-03-15', 'Personagem', 'Professora', '', 'parceiro_07_08_2017_075229.jpg'),
(88, 'Soraia Barcat', '1999-01-06', 'Animação', 'Estudante de Educação Física UnB', '', 'parceiro_05_09_2017_062348.jpeg'),
(89, 'Elaine de Oliveira', '1995-07-21', 'Animação e Personagem Vivo', 'Estudante de Fisioterapia UnB', '', 'parceiro_05_09_2017_062532.jpeg'),
(90, 'Bruno Carvalho', '1997-07-25', 'Personagem Vivo', 'Assistente Escolar', '', 'parceiro_05_09_2017_063307.jpeg'),
(91, 'Kathleen Evelyn', '1996-06-16', 'Animação', 'Estudante de Terapia Ocupacional UnB', '', 'parceiro_10_10_2017_073413.jpeg'),
(94, 'Marcos Seixas', '1989-06-09', 'Animação', 'Professor de Futebol', '', 'parceiro_01_11_2017_054230.jpeg'),
(95, 'Diego Paz', '1995-03-31', 'Animação', 'Estudante de Letras UnB', '', 'parceiro_01_11_2017_054422.jpeg'),
(97, 'Ana Beatriz', '1994-11-15', 'Animação', 'Estudante de Psicologia UnB', '', 'parceiro_01_11_2017_054739.jpeg'),
(98, 'Antônio Vinicius', '1996-04-09', 'Animação', 'Estudante de Educação Física UnB', '', 'parceiro_08_11_2017_072326.jpeg'),
(101, 'Tainah Barcat', '1995-11-28', 'Animação', 'Estudante de Ciências Biológicas na UnB', '', 'parceiro_27_11_2017_012847.jpeg'),
(102, 'Priscila Tavares', '1993-08-16', 'Pintura', 'Estudante de Artes Cênicas- UnB', '', 'parceiro_29_11_2017_044041.jpeg'),
(104, 'Júlia Pimenta', '1998-08-11', 'Animação', 'Estudante de Educação Física- UnB', '', 'parceiro_17_05_2018_104255.jpeg'),
(105, 'Marcelo Petrillo', '1988-10-17', 'Animação', 'Gestor em Tecnologia da Informação', '', 'parceiro_17_05_2018_111100.jpeg'),
(106, 'Yasmim Almeida', '1997-08-20', 'Animação', 'Estudante de Educação Física- UnB', '', 'parceiro_17_05_2018_071611.JPG'),
(108, 'Carolina Prata', '1994-10-05', 'Personagem Vivo', 'Estudante de Arquitetura- UnB', '', 'parceiro_19_05_2018_010400.JPG'),
(109, 'Gabriel Homero', '1998-05-02', 'Animação', 'Estudante de Análise e Desenvolvimento de Sistemas', '', 'parceiro_19_05_2018_010633.JPG'),
(110, 'Lilian Alencar', '0000-00-00', 'Contação de Histórias', 'Atriz, Performer, Diretora, Pordutora, Bailarina, Contadora de Histórias. Formada em Letras/Portuguê', '', 'parceiro_19_05_2018_023348.jpg'),
(111, 'Thalia Ariadne', '1998-01-18', 'Personagem', 'Estudante de Odontologia', '', 'parceiro_20_05_2018_033028.jpeg'),
(112, 'Gabriela Hiratra', '1994-06-22', 'Pintura', 'Bióloga e Ilustradora científica', '', 'parceiro_20_05_2018_033604.JPG'),
(113, 'Raul Victor', '1997-09-30', 'Animação', 'Estudante de Educação Fisica', '', 'parceiro_21_05_2018_080938.jpeg'),
(114, 'Raphael Bastos', '1996-02-06', 'Animação', 'Estudante de Engenharia Mecânica- UnB', '', 'parceiro_21_05_2018_081315.jpeg'),
(115, 'Alice Souza', '1997-04-08', 'Personagem Vivo', 'Estudante de Enfermagem- UnB', '', 'parceiro_21_05_2018_093646.JPG'),
(116, 'Leonardo Camilo', '1991-09-08', 'Animação e Personagem Vivo', 'Administrador', '', 'parceiro_21_05_2018_094548.JPG'),
(117, 'Henrique Hansen', '1996-08-02', 'Personagem Vivo', 'Estudante de Engenharia Mecânica- UnB', '', 'parceiro_21_05_2018_095024.JPG'),
(119, 'Arthur Szerman', '1992-01-03', 'Personagem Vivo', 'Comissário de Bordo', '', 'parceiro_21_05_2018_102739.JPG'),
(120, 'Marcela Martins', '1997-09-11', 'Personagem Vivo', 'Estudante de Farmácia - UnB', '', 'parceiro_22_05_2018_015641.jpeg'),
(121, 'Karolinne Santos', '1992-04-12', 'Personagem Vivo', 'Estudante de Educação Fisica- UnB', '', 'parceiro_23_05_2018_091416.jpeg'),
(122, 'Maycow Marques', '1995-03-23', 'Animação', 'Empresário, Consultor de carreiras e desenvolvedor de softwares.', '', 'parceiro_28_05_2018_113418.jpeg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(9) NOT NULL,
  `nome_usuario` varchar(50) NOT NULL,
  `sobrenome_usuario` varchar(50) DEFAULT NULL,
  `foto_usuario` varchar(50) DEFAULT NULL,
  `sexo_usuario` varchar(9) DEFAULT NULL,
  `email_usuario` varchar(50) NOT NULL,
  `cpf_usuario` varchar(14) NOT NULL,
  `nascimento_usuario` date NOT NULL,
  `login_usuario` varchar(20) NOT NULL,
  `senha_usuario` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `nome_usuario`, `sobrenome_usuario`, `foto_usuario`, `sexo_usuario`, `email_usuario`, `cpf_usuario`, `nascimento_usuario`, `login_usuario`, `senha_usuario`) VALUES
(1, 'Administrador do Sistema', NULL, 'user1_18122018085835.jpg', 'MASCULINO', 'raphael1989@gmail.com', '999.999.999-99', '2018-11-25', 'admin', 'd243ee28aa5930dea901298cdeb2cb9f'),
(2, 'Valmir ', 'Lopes', NULL, NULL, 'valmir_teotonio@hotmail.com', '000.000.000-00', '0000-00-00', 'valmir', '123456'),
(3, 'Nayara ', 'Bittencourt', NULL, NULL, 'nayara2394@gmail.com', '000.000.000-00', '0000-00-00', 'Nayara', 'nayara1802'),
(9, 'Raphael Augusto', 'Almeida Pereira', 'user9_11122018094009', 'MASCULINO', 'raphael.a.a.p@gmail.com', '023.486.491-52', '1989-06-08', 'raphael', 'af79a8227f6f020dac98afce2a06d061'),
(12, 'Teste', 'Sistema', NULL, 'MASCULINO', 'teste@teste.com', '023.486.491-51', '2018-12-01', 'teste', 'af79a8227f6f020dac98afce2a06d061');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `agenda`
--
ALTER TABLE `agenda`
  ADD PRIMARY KEY (`id_agenda`);

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id_banner`);

--
-- Indexes for table `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id_cli`);

--
-- Indexes for table `colaborador`
--
ALTER TABLE `colaborador`
  ADD PRIMARY KEY (`id_colab`);

--
-- Indexes for table `evento`
--
ALTER TABLE `evento`
  ADD PRIMARY KEY (`id_evento`);

--
-- Indexes for table `galeria`
--
ALTER TABLE `galeria`
  ADD PRIMARY KEY (`id_galeria`);

--
-- Indexes for table `pacotes`
--
ALTER TABLE `pacotes`
  ADD PRIMARY KEY (`id_pct`);

--
-- Indexes for table `permissao_user`
--
ALTER TABLE `permissao_user`
  ADD PRIMARY KEY (`id_permission`);

--
-- Indexes for table `recados`
--
ALTER TABLE `recados`
  ADD PRIMARY KEY (`id_recado`);

--
-- Indexes for table `servicos`
--
ALTER TABLE `servicos`
  ADD PRIMARY KEY (`id_servico`);

--
-- Indexes for table `trio`
--
ALTER TABLE `trio`
  ADD PRIMARY KEY (`id_trio`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `agenda`
--
ALTER TABLE `agenda`
  MODIFY `id_agenda` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `id_banner` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=114;

--
-- AUTO_INCREMENT for table `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id_cli` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `colaborador`
--
ALTER TABLE `colaborador`
  MODIFY `id_colab` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `evento`
--
ALTER TABLE `evento`
  MODIFY `id_evento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `galeria`
--
ALTER TABLE `galeria`
  MODIFY `id_galeria` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=350;

--
-- AUTO_INCREMENT for table `pacotes`
--
ALTER TABLE `pacotes`
  MODIFY `id_pct` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `recados`
--
ALTER TABLE `recados`
  MODIFY `id_recado` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=134;

--
-- AUTO_INCREMENT for table `servicos`
--
ALTER TABLE `servicos`
  MODIFY `id_servico` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=617;

--
-- AUTO_INCREMENT for table `trio`
--
ALTER TABLE `trio`
  MODIFY `id_trio` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=123;

--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
