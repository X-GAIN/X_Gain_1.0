-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 05/12/2023 às 20:17
-- Versão do servidor: 10.4.28-MariaDB
-- Versão do PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `x_bank`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `t_carrinho`
--

CREATE TABLE `t_carrinho` (
  `quantidade` int(11) NOT NULL,
  `id_Produto` int(11) NOT NULL,
  `id_Usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `t_categorias`
--

CREATE TABLE `t_categorias` (
  `id_categoria` int(11) NOT NULL,
  `nome_Categoria` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `t_categorias`
--

INSERT INTO `t_categorias` (`id_categoria`, `nome_Categoria`) VALUES
(1, 'Cardio'),
(2, 'Musculação'),
(3, 'Acessórios');

-- --------------------------------------------------------

--
-- Estrutura para tabela `t_imgprod`
--

CREATE TABLE `t_imgprod` (
  `id_img` int(11) NOT NULL,
  `id_produto` int(11) NOT NULL,
  `img` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `t_imgprod`
--

INSERT INTO `t_imgprod` (`id_img`, `id_produto`, `img`) VALUES
(1, 1, '../imgs/produtos/6563b93649c48_1step_3-4.png'),
(2, 1, '../imgs/produtos/6563b9364a6ad_2step_frente.png'),
(3, 1, '../imgs/produtos/6563b9364b164_3step_lado.png'),
(4, 2, '../imgs/produtos/6563ba87a3c32_Simulador de escada 3_4.png'),
(5, 2, '../imgs/produtos/6563ba87a4bb4_Simulador de escada frente (1).png'),
(6, 2, '../imgs/produtos/6563ba87a5846_Simulador de escada lado.png'),
(7, 3, '../imgs/produtos/6563bb0f2f00d_panturrilha 3_4.png'),
(8, 3, '../imgs/produtos/6563bb0f2f983_panturrilha perfil.png'),
(9, 4, '../imgs/produtos/6563bb5b2e517_LegPress 3-4.png'),
(10, 4, '../imgs/produtos/6563bb5b2f2bb_LegPress Frente.png'),
(11, 4, '../imgs/produtos/6563bb5b2ff50_LegPress perfil.png'),
(12, 5, '../imgs/produtos/6563bcefd9873_Hand grip  3 4 .png'),
(13, 5, '../imgs/produtos/6563bcefdaf6a_Hand grip  frente .png'),
(14, 5, '../imgs/produtos/6563bcefdb976_Hand grip  lado .png'),
(15, 6, '../imgs/produtos/6563c2c725f4d_1 3-4 halter.png'),
(16, 6, '../imgs/produtos/6563c2c728c2a_2halter frente.png'),
(17, 6, '../imgs/produtos/6563c2c72977a_3 halter perfil.png'),
(18, 7, '../imgs/produtos/6563c37934652_Flexora 3_4.png'),
(19, 7, '../imgs/produtos/6563c37934dcf_Flexora frente.png'),
(20, 7, '../imgs/produtos/6563c37935665_Flexora lado.png'),
(21, 8, '../imgs/produtos/6563c420770ba_extensora 3_4.png'),
(22, 8, '../imgs/produtos/6563c42078716_Extensora frente.png'),
(23, 8, '../imgs/produtos/6563c420799a4_extensora perfil.png'),
(24, 9, '../imgs/produtos/6563c48e83495_Esteira curvada 3_4.png'),
(25, 9, '../imgs/produtos/6563c48e84466_Esteira curvada frente.png'),
(26, 9, '../imgs/produtos/6563c48e8502b_Esteira curvada lado.png'),
(27, 10, '../imgs/produtos/6563cf3db0fc5_1 esteira 3-4.png'),
(28, 10, '../imgs/produtos/6563cf3db2124_2 esteira frente.png'),
(29, 10, '../imgs/produtos/6563cf3db348d_3 esteira perfil.png'),
(30, 11, '../imgs/produtos/6563d177c050f_1 Esteira 3-4.png'),
(31, 11, '../imgs/produtos/6563d177c11e4_2 Esteira frente.png'),
(32, 11, '../imgs/produtos/6563d177c1c87_3 Esteira perfil.png'),
(33, 12, '../imgs/produtos/6563d1cc57164_Desenvolvimento 3_4.png'),
(34, 12, '../imgs/produtos/6563d1cc585ec_Desenvolvimento frente.png'),
(35, 13, '../imgs/produtos/6563d2508d3a7_crossover_3_4.png'),
(36, 13, '../imgs/produtos/6563d2508deb7_Crossover_Frente.png'),
(37, 14, '../imgs/produtos/6563d557be5da_Barra fixa  lado png.png'),
(38, 14, '../imgs/produtos/6563d557c01ec_barra fixa 3 4.png'),
(39, 14, '../imgs/produtos/6563d557c0d4d_barra fixa frente frente.png'),
(40, 15, '../imgs/produtos/6563d70664692_banco inclinado 3 4.png'),
(41, 15, '../imgs/produtos/6563d70664fae_banco inclinado frente .png'),
(42, 15, '../imgs/produtos/6563d70665b49_banco inclinado lado .png'),
(43, 16, '../imgs/produtos/6563d91889f61_banco inclinado 3 4.png'),
(44, 16, '../imgs/produtos/6563d9188aa6b_banco inclinado frente .png'),
(45, 16, '../imgs/produtos/6563d9188b363_banco inclinado lado .png'),
(46, 17, '../imgs/produtos/6563db7096dc8_1 Sneakers 3-4.png'),
(47, 17, '../imgs/produtos/6563db7097ade_2 Sneakers frente.png'),
(48, 17, '../imgs/produtos/6563db7098601_3 Sneakers perfil.png'),
(49, 18, '../imgs/produtos/6563e268b6c0a_1 Sneakers 3-4.png'),
(50, 18, '../imgs/produtos/6563e268b9dc3_2 Sneakers frente.png'),
(51, 18, '../imgs/produtos/6563e268bae1b_3 Sneakers perfil.png'),
(53, 20, '../imgs/produtos/656f6f210e6c7_Supino Maquina 3-4.png'),
(54, 20, '../imgs/produtos/656f6f210fb6e_Supino Maquina frente.png'),
(55, 20, '../imgs/produtos/656f6f2110ee9_Supino Maquina lado.png'),
(56, 21, '../imgs/produtos/656f6f6faa6ff_Rosca Scott Maquina 3-4.png'),
(57, 21, '../imgs/produtos/656f6f6fabbf9_Rosca Scott Maquina frente.png'),
(58, 21, '../imgs/produtos/656f6f6fad2ed_Rosca Scott Maquina lado.png'),
(59, 22, '../imgs/produtos/656f6fa83392f_Puxada Alta 3-4.png'),
(60, 22, '../imgs/produtos/656f6fa834d31_Puxada Alta frente.png'),
(61, 22, '../imgs/produtos/656f6fa83618a_Puxada Alta lado.png'),
(62, 23, '../imgs/produtos/656f702568374_Banco Romano 3-4.png'),
(63, 23, '../imgs/produtos/656f70256969c_Banco Romano frente.png'),
(64, 23, '../imgs/produtos/656f70256a874_Banco Romano lado.png'),
(65, 24, '../imgs/produtos/656f7068873f4_Elevação Lateral Maquina 3-4.png'),
(66, 24, '../imgs/produtos/656f7068885ea_Elevação Lateral Maquina frente.png'),
(67, 24, '../imgs/produtos/656f706889868_Elevação Lateral Maquina lado.png'),
(68, 25, '../imgs/produtos/656f7126dee39_Bike 3-4.png'),
(69, 25, '../imgs/produtos/656f7126e054d_Bike frente.png'),
(70, 25, '../imgs/produtos/656f7126e1cb5_Bike lado.png');

-- --------------------------------------------------------

--
-- Estrutura para tabela `t_produto`
--

CREATE TABLE `t_produto` (
  `id_Produto` int(11) NOT NULL,
  `modelo` varchar(200) NOT NULL,
  `descricao` longtext NOT NULL,
  `categoria` int(11) NOT NULL,
  `subcategoria` int(11) NOT NULL,
  `comprimento` int(5) NOT NULL,
  `largura` int(5) NOT NULL,
  `altura` int(5) NOT NULL,
  `garantia` int(2) NOT NULL,
  `peso` int(20) NOT NULL,
  `obj3d` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Despejando dados para a tabela `t_produto`
--

INSERT INTO `t_produto` (`id_Produto`, `modelo`, `descricao`, `categoria`, `subcategoria`, `comprimento`, `largura`, `altura`, `garantia`, `peso`, `obj3d`) VALUES
(1, 'Step', 'O \"step\" refere-se a uma forma de exercício aeróbico que utiliza um degrau ajustável. Os praticantes realizam uma série de movimentos coreografados subindo e descendo do degrau, geralmente acompanhados por música. O step é popular em aulas de grupo em academias e oferece benefícios para o condicionamento cardiovascular, força muscular e coordenação. Essa atividade pode ser adaptada para diferentes níveis de habilidade, tornando-a acessível a diversos participantes.', 3, 10, 95, 40, 14, 3, 4, '../objs/6563b93648c20_Step.obj'),
(2, 'Simulador de Escada', 'O simulador de escada é um equipamento de exercício que replica os movimentos de subir e descer escadas. Ele proporciona um treino cardiovascular eficaz, trabalhando os músculos das pernas, glúteos e região central. O equipamento é utilizado para melhorar a resistência, queimar calorias e fortalecer os músculos inferiores, sendo uma opção versátil para o condicionamento físico.\r\n', 1, 2, 185, 220, 90, 3, 226, '../objs/6563ba87a114f_simulador de escada.obj'),
(3, 'Panturrilha Sentado', 'O exercício de panturrilha sentado é uma técnica de treino que se concentra no fortalecimento dos músculos da panturrilha. Realizado geralmente em uma máquina específica, o indivíduo senta-se e eleva os calcanhares, contraindo os músculos da panturrilha. Esse movimento visa desenvolver a força, resistência e definição muscular nessa região, sendo uma prática comum em rotinas de treinamento para as pernas.\r\n', 2, 9, 120, 60, 100, 3, 83, '../objs/6563bb0f2df74_Panturrilha.obj'),
(4, 'Leg Press', 'O leg press é um equipamento de treino que visa fortalecer os músculos das pernas, com foco nos quadríceps, glúteos e ísquios. Este aparelho contribui para o desenvolvimento muscular, fortalecimento dos ossos e articulações, e melhora da força e resistência nas pernas. É amplamente utilizado em treinos para condicionamento físico e desempenho atlético, proporcionando benefícios abrangentes para o sistema musculoesquelético inferior.', 2, 9, 250, 120, 155, 3, 201, '../objs/6563bb5b2cd89_Leg Press.obj'),
(5, 'Hand Grip', 'Descubra o revolucionário Hand Grip, projetado para transformar seu treino de mãos e antebraços. Com resistência ajustável, durabilidade excepcional e portabilidade imbatível, este companheiro de condicionamento físico se adapta a todos os níveis de habilidade. Sinta a diferença em sua força e destreza rapidamente, onde quer que esteja. Investir na sua saúde nunca foi tão acessível. Obtenha resultados notáveis sem comprometer sua carteira. Potencialize seu treino, adquira o Hand Grip agora e eleve seu desempenho para novos patamares!', 3, 11, 15, 11, 16, 3, 145, '../objs/6563bcefd7edf_grip hand.obj'),
(6, 'Halter', 'Descubra o poder do Halter, projetado para revolucionar seu treino de musculação. Com versatilidade premium, design ergonômico e durabilidade superior, este halter oferece a solução completa para esculpir seu corpo de maneira eficaz. Ajuste personalizado, eficiência no espaço e uma pegada confortável tornam o Halter a escolha ideal para treinos intensos em casa ou na academia. Alcance seus objetivos fitness, invista no seu corpo, e eleve seu treino para um novo patamar com o Halter. Potencialize sua jornada de condicionamento físico agora!', 3, 12, 33, 10, 10, 3, 0, '../objs/6563c2c724486_Halter.obj'),
(7, 'Cadeira Flexora', 'Este equipamento de musculação foi especialmente concebido para otimizar o treinamento dos músculos isquiotibiais, situados na parte posterior das pernas. Ao fortalecer esses músculos, não apenas se promove um aumento significativo da força nessa região, mas também se aprimora a estabilização dos joelhos, contribuindo assim para a prevenção de possíveis lesões nessa área. Trata-se de uma ferramenta essencial para o desenvolvimento equilibrado e seguro da musculatura, proporcionando benefícios tanto para atletas quanto para aqueles que buscam aprimorar sua saúde física e bem-estar geral.', 2, 9, 100, 85, 149, 3, 95, '../objs/6563c37932df1_Flexora.obj'),
(8, 'Cadeira Extensora', 'A cadeira extensora é um equipamento de musculação focalizado nos quadríceps. O exercício envolve estender as pernas contra resistência ajustável, fortalecendo os músculos frontais das coxas. Essa máquina é amplamente usada para desenvolver força e resistência nas pernas, sendo uma ferramenta eficaz para treinos específicos de membros inferiores. ', 2, 9, 100, 85, 149, 3, 95, '../objs/6563c4207563e_Extensora.obj'),
(9, 'Esteira Curvada', 'A esteira curvada é um tipo de esteira ergométrica sem motor, onde o usuário impulsiona a esteira com seus próprios passos. Ela oferece um treino mais desafiador, pois não possui configuração de velocidade fixa, dependendo do esforço do usuário para determinar o ritmo. Essa esteira promove um padrão de corrida mais natural e pode ser uma opção eficaz para treinos de alta intensidade e condicionamento cardiovascular.', 1, 1, 104, 145, 59, 3, 155, '../objs/6563c48e81be7_Esteira Curvada.obj'),
(11, 'Esteira', 'A esteira é mais que um simples equipamento cardiovascular; é sua aliada na jornada de perda de peso, queima de calorias e aprimoramento do condicionamento físico. Este equipamento multifuncional não apenas impulsiona a resistência, mas também proporciona uma maneira eficaz de alcançar seus objetivos fitness. Transforme seu treino com a esteira e conquiste um corpo mais saudável e tonificado.', 1, 1, 215, 96, 155, 3, 68, '../objs/6563d177bf133_Esteira.obj'),
(12, 'Desenvolvimento Ombro', 'Este equipamento direciona seu foco para o desenvolvimento dos deltoides, fortalecendo e aumentando a resistência dessa importante região dos ombros. Ao aprimorar a força e a resistência dos deltoides, proporciona-se um impacto positivo no desempenho global, especialmente em atividades que demandam força nessa área, tais como natação, vôlei, arremesso, tênis, entre outras.', 2, 7, 135, 125, 149, 3, 60, '../objs/6563d1cc559bf_Desenvolvimento ombro.obj'),
(13, 'Crossover', 'O crossover é um exercício de treinamento que envolve mover os membros superiores de maneira cruzada em direção aos lados opostos do corpo. É comumente usado para fortalecer e tonificar os músculos do peito, ombros e braços. O movimento é realizado geralmente usando cabos ou máquinas específicas, proporcionando uma resistência controlada. O crossover é popular em treinos de musculação e pode ser adaptado para diferentes níveis de habilidade e objetivos de condicionamento físico.', 2, 8, 420, 95, 255, 3, 60, '../objs/6563d2508bf36_crossover.obj'),
(14, 'Barra Fixa', 'A Barra Fixa é a chave para desbloquear um treino de resistência eficaz em casa. Com a capacidade de fortalecer diversos grupos musculares, essa barra versátil oferece a oportunidade de esculpir seu corpo de maneira completa. Instale facilmente em sua porta e mergulhe em uma rotina de exercícios que aprimora a força, define os músculos e eleva seu condicionamento físico. Experimente a Barra Fixa para um treino desafiador e resultados visíveis, sem sair de casa!', 3, 10, 130, 58, 91, 3, 8, '../objs/6563d557bd00d_barra fixa.obj'),
(16, 'Banco Inclinado', 'O banco inclinado é um equipamento de musculação com uma superfície ajustável. Ele permite que os usuários realizem exercícios como supino inclinado, focando mais nos músculos superiores do peito e nos ombros. O ajuste de inclinação oferece variação nos padrões de movimento, promovendo o desenvolvimento muscular equilibrado.', 3, 10, 120, 45, 45, 3, 35, '../objs/6563d91888af7_Banco inclinado.obj'),
(18, 'Tênis Sneakers', 'Descubra o ápice do desempenho na academia com os Tênis Sneakers. Projetados para oferecer conforto inigualável, estabilidade aprimorada e um design moderno, esses tênis são a escolha definitiva para seus treinos. Com suporte lateral robusto e durabilidade elite, proporcionam confiança em cada passo, mesmo nos treinos mais intensos. Seja qual for o seu regime de exercícios, os Sneakers se adaptam com versatilidade fitness, garantindo que você esteja na moda enquanto conquista seus objetivos. Eleve seus treinos, faça uma declaração de moda e alcance novos patamares na sua jornada fitness com os Tênis Sneakers!', 3, 12, 0, 0, 0, 3, 465, '../objs/6563e268b322f_Sneakers.obj'),
(20, 'Supino Vertical ', 'Exercício de musculação para o peitoral, feito em uma máquina dedicada, pressionando a barra para longe do corpo. Fortalece os músculos do peito e tríceps.', 2, 8, 155, 140, 210, 3, 220, '../objs/656f6f210a99e_Supino Maquina.obj'),
(21, ' Rosca Scott Maquina', 'Exercício de musculação para os braços, realizado em uma máquina especializada, enfatizando os músculos do bíceps. Consiste em flexionar os cotovelos enquanto segura as alças da máquina. Ajuda a fortalecer e definir os bíceps.', 2, 5, 110, 100, 180, 3, 170, '../objs/656f6f6fa86af_Rosca Scott Maquina.obj'),
(22, 'Puxada Alta', ' Exercício de musculação para as costas, puxando uma barra em direção ao peito para fortalecer músculos dorsais e braços.', 2, 6, 130, 100, 240, 3, 270, '../objs/656f6fa831b45_Puxada Alta.obj'),
(23, 'Banco Romano', 'Equipamento de musculação com um design inclinado, ajustável para diferentes posições. Usado para exercícios como abdominais e lombar, visando fortalecer o core e estabilizar a parte superior do corpo.', 2, 6, 82, 97, 108, 2, 40, '../objs/656f702566bb3_Banco romano.obj'),
(24, 'Elevação Lateral Maquina', 'Exercício de musculação para ombros, realizado em uma máquina específica, elevando os braços para os lados. Fortalece e define os músculos deltoides.', 2, 7, 130, 120, 140, 3, 145, '../objs/656f7068855f2_Elevação Lateral Maquina.obj'),
(25, 'Bike Ergométrica', 'Equipamento de exercício estacionário para treinos aeróbicos e fortalecimento muscular, simula pedaladas de bicicleta tradicional. Monitor exibe tempo, distância, velocidade e calorias queimadas. Ideal para exercícios internos.', 1, 3, 115, 53, 112, 3, 53, '../objs/656f7126dcba0_Bike.obj');

-- --------------------------------------------------------

--
-- Estrutura para tabela `t_subcate`
--

CREATE TABLE `t_subcate` (
  `id_subCate` int(11) NOT NULL,
  `nome_subCate` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `t_subcate`
--

INSERT INTO `t_subcate` (`id_subCate`, `nome_subCate`) VALUES
(1, 'Esteira'),
(2, 'Escada'),
(3, 'Bike'),
(4, 'Abdômen'),
(5, 'Braço'),
(6, 'Costas'),
(7, 'Ombro'),
(8, 'Peito'),
(9, 'Perna'),
(10, 'Utilitários'),
(11, 'Equipamentos'),
(12, 'Outros\r\n');

-- --------------------------------------------------------

--
-- Estrutura para tabela `t_usuario`
--

CREATE TABLE `t_usuario` (
  `id_usuario` int(11) NOT NULL,
  `nome` varchar(200) NOT NULL,
  `sobrenome` varchar(200) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `telefone` varchar(200) NOT NULL,
  `email` varchar(255) NOT NULL,
  `nivel_Usuario` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Despejando dados para a tabela `t_usuario`
--

INSERT INTO `t_usuario` (`id_usuario`, `nome`, `sobrenome`, `senha`, `telefone`, `email`, `nivel_Usuario`) VALUES
(1, 'X', 'Gain ADM', 'ofinalC123#', '11111111111', 'tcc.etec.ultimate.challenge@gmail.com', 1),
(2, 'Exemplo', 'Sem ADM', '1', '11111111111', 'exemplo@gmail.com', 0),
(10, 'a', 'a', 'a', '11111111111', 'a@gmail.com', 0);

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `t_categorias`
--
ALTER TABLE `t_categorias`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Índices de tabela `t_imgprod`
--
ALTER TABLE `t_imgprod`
  ADD PRIMARY KEY (`id_img`),
  ADD KEY `id_produto` (`id_produto`);

--
-- Índices de tabela `t_produto`
--
ALTER TABLE `t_produto`
  ADD PRIMARY KEY (`id_Produto`),
  ADD KEY `t_produto-t_categoria` (`categoria`),
  ADD KEY `t_produto-t_subCate` (`subcategoria`);

--
-- Índices de tabela `t_subcate`
--
ALTER TABLE `t_subcate`
  ADD PRIMARY KEY (`id_subCate`);

--
-- Índices de tabela `t_usuario`
--
ALTER TABLE `t_usuario`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `t_categorias`
--
ALTER TABLE `t_categorias`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `t_imgprod`
--
ALTER TABLE `t_imgprod`
  MODIFY `id_img` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT de tabela `t_produto`
--
ALTER TABLE `t_produto`
  MODIFY `id_Produto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de tabela `t_subcate`
--
ALTER TABLE `t_subcate`
  MODIFY `id_subCate` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de tabela `t_usuario`
--
ALTER TABLE `t_usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
