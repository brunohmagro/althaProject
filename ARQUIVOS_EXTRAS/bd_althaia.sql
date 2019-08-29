-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 29-Ago-2019 às 20:08
-- Versão do servidor: 10.1.33-MariaDB
-- PHP Version: 7.2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bd_althaia`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_medicamento`
--

CREATE TABLE `tb_medicamento` (
  `id_medicamento` int(11) NOT NULL,
  `apresentacao` varchar(200) NOT NULL,
  `pAtivo` varchar(100) NOT NULL,
  `fornecedor` varchar(100) NOT NULL,
  `descricao` varchar(255) NOT NULL,
  `id_usuario` varchar(20) NOT NULL,
  `dt_cadastro` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_medicamento`
--

INSERT INTO `tb_medicamento` (`id_medicamento`, `apresentacao`, `pAtivo`, `fornecedor`, `descricao`, `id_usuario`, `dt_cadastro`) VALUES
(2019000001, 'Solução oral. Cartucho contendo: 4, 6, 12, 50*, 60* e 100* flaconetes de 10 mL (*embalagem múltipla).', 'Citrato de Colina + Betaína + Metionina', 'Althaia S/A', 'Abcler Abnat age principalmente sobre o fígado evitando o acúmulo de gordura nesse órgão e auxiliando na remoção de restos metabólicos e outras toxinas. Previne a infiltração (entrada) de gordura no fígado.', 'bruno.magro', '2019-08-27 20:32:47'),
(2019000002, 'Drágeas – Caixa com 20 e 60 drágeas. Uso Oral. Uso Adulto.', 'Vitaminas do Complexo B', 'Althaia S/A', 'B-Suprin inclui diversas vitaminas hidrossolúveis (complexo B), indispensáveis para a bioquímica do organismo. ', 'bruno.magro', '2019-08-29 12:25:57'),
(2019000003, 'Bac Sulfitrin - docusato de sódio, estearato de magnésio, povidona, amidoglicolato de sódio e celulose microcristalina).', 'Sulfametoxazol + Trimetoprima', 'Neo Química', 'Bac-Sulfitrin não deve ser utilizado em pacientes com doença grave no fígado e no rim, quando não se puder determinar regularmente a concentração do fármaco no sangue.', 'bruno.magro', '2019-08-29 12:27:29'),
(2019000004, '20 Bi - 1 cápsula de 335 mg contém: 2 x 1010 (20 bilhões) microrganismos probióticos.', 'Lactobacillus + Bifidobacterium', 'Eurofarma', '20 Bi é um alimento com propriedade funcional em cápsulas composto pelos probióticos Lactobacillus acidophilus NCFM, Lactobacillus paracasei Lpc-37, Bifidobacterium lactis Bl-04, Bifidobacterium lactis Bi-07 e Bifidobacterium bifidum Bb-02.', 'bruno.magro', '2019-08-29 14:48:26'),
(2019000005, '20 Bi - 1 cápsula de 335 mg contém: 2 x 1010 (20 bilhões) microrganismos probióticos.', 'Lactobacillus + Bifidobacterium', 'Eurofarma', '20 Bi é um alimento com propriedade funcional em cápsulas composto pelos probióticos Lactobacillus acidophilus NCFM, Lactobacillus paracasei Lpc-37, Bifidobacterium lactis Bl-04, Bifidobacterium lactis Bi-07 e Bifidobacterium bifidum Bb-02.', 'bruno.magro', '2019-08-29 14:48:32'),
(2019000006, '20 Bi - 1 cápsula de 335 mg contém: 2 x 1010 (20 bilhões) microrganismos probióticos.', 'Lactobacillus + Bifidobacterium', 'Eurofarma', '20 Bi é um alimento com propriedade funcional em cápsulas composto pelos probióticos Lactobacillus acidophilus NCFM, Lactobacillus paracasei Lpc-37, Bifidobacterium lactis Bl-04, Bifidobacterium lactis Bi-07 e Bifidobacterium bifidum Bb-02.', 'bruno.magro', '2019-08-29 14:48:35'),
(2019000011, 'AAS Infantil - Comprimidos de 100 mg. Embalagem contendo 30, 120 ou 200 comprimidos. Uso oral. Uso pediátrico.', 'Ácido Acetilsalicílico', 'Sanofi-Aventis', 'O alívio sintomático de dores de intensidade leve a moderada, como dor de cabeça, dor de dente, dor de garganta, dor menstrual, dor muscular, dor nas articulações, dor nas costas, dor da artrite', 'bruno.magro', '2019-08-29 00:29:01'),
(2019000013, 'Pó liofilizado para suspensão injetável. Cada embalagem contém 1 frasco-ampola com 100 mg de paclitaxel ligado à albumina.', 'Paclitaxel', 'Celgene', 'Abraxane® contém como substância ativa, o paclitaxel, ligado à proteína albumina humana, na forma de pequenas partículas conhecidas por nanopartículas. ', 'bruno.magro', '2019-08-29 10:15:27');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_usuario`
--

CREATE TABLE `tb_usuario` (
  `id_usuario` int(8) NOT NULL,
  `login_usuario` varchar(20) NOT NULL,
  `nome_usuario` varchar(60) NOT NULL,
  `senha_usuario` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_usuario`
--

INSERT INTO `tb_usuario` (`id_usuario`, `login_usuario`, `nome_usuario`, `senha_usuario`) VALUES
(1, 'bruno.magro', 'Bruno Henrique Magro', 'fc3707fa908df1e82e30ecbdae3d094804a8f87d');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_medicamento`
--
ALTER TABLE `tb_medicamento`
  ADD PRIMARY KEY (`id_medicamento`);

--
-- Indexes for table `tb_usuario`
--
ALTER TABLE `tb_usuario`
  ADD PRIMARY KEY (`id_usuario`,`login_usuario`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_usuario`
--
ALTER TABLE `tb_usuario`
  MODIFY `id_usuario` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
