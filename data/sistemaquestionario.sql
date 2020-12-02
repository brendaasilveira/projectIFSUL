-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 06-Dez-2019 às 23:04
-- Versão do servidor: 10.3.16-MariaDB
-- versão do PHP: 7.1.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `sistemaquestionario`
--

-- --------------------------------------------------------

--
-- Estrutura stand-in para vista `dados_pergunta_opcao`
-- (Veja abaixo para a view atual)
--
CREATE TABLE `dados_pergunta_opcao` (
`id_pergunta` int(11)
,`pr_pergunta` varchar(50)
,`ds_pergunta` varchar(200)
,`id_opcao` int(11)
,`ds_opcao` varchar(200)
);

-- --------------------------------------------------------

--
-- Estrutura stand-in para vista `dados_questionario`
-- (Veja abaixo para a view atual)
--
CREATE TABLE `dados_questionario` (
`id_questionario` int(11)
,`nm_questionario` varchar(30)
,`id_pergunta` int(11)
,`pr_pergunta` varchar(50)
,`ds_pergunta` varchar(200)
,`id_tipo` int(11)
,`id_opcao` int(11)
,`ds_opcao` varchar(200)
,`id_qpo` int(11)
);

-- --------------------------------------------------------

--
-- Estrutura stand-in para vista `dados_resposta`
-- (Veja abaixo para a view atual)
--
CREATE TABLE `dados_resposta` (
`id_questionario` int(11)
,`nm_questionario` varchar(30)
,`id_pergunta` int(11)
,`pr_pergunta` varchar(50)
,`id_opcao` int(11)
,`ds_opcao` varchar(200)
,`id_usuario` int(11)
,`lg_usuario` char(17)
,`ds_email` varchar(200)
,`nm_usuario` varchar(200)
,`id_resposta` int(11)
,`respostas` varchar(500)
);

-- --------------------------------------------------------

--
-- Estrutura stand-in para vista `dados_usuario`
-- (Veja abaixo para a view atual)
--
CREATE TABLE `dados_usuario` (
`id_usuario` int(11)
,`lg_usuario` char(17)
,`nm_usuario` varchar(200)
,`dt_nascimento` date
,`ds_senha` char(11)
,`ds_email` varchar(200)
,`us_codt` int(11)
,`us_tipo` varchar(50)
,`us_cods` int(11)
,`us_situacao` varchar(50)
);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_opcao`
--

CREATE TABLE `tb_opcao` (
  `id_opcao` int(11) NOT NULL,
  `ds_opcao` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_opcao`
--

INSERT INTO `tb_opcao` (`id_opcao`, `ds_opcao`) VALUES
(1, 'Dissertativa');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_pergunta`
--

CREATE TABLE `tb_pergunta` (
  `id_pergunta` int(11) NOT NULL,
  `pr_pergunta` varchar(50) NOT NULL,
  `ds_pergunta` varchar(200) DEFAULT NULL,
  `id_tipo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_perguntatipo`
--

CREATE TABLE `tb_perguntatipo` (
  `id_tipo` int(11) NOT NULL,
  `ds_tipo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tb_perguntatipo`
--

INSERT INTO `tb_perguntatipo` (`id_tipo`, `ds_tipo`) VALUES
(1, 'Resposta Curta'),
(2, 'Multipla Escolha'),
(3, 'Caixa de Seleção');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_pergunta_opcao`
--

CREATE TABLE `tb_pergunta_opcao` (
  `id_pergunta` int(11) NOT NULL,
  `id_opcao` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_questionario`
--

CREATE TABLE `tb_questionario` (
  `id_questionario` int(11) NOT NULL,
  `nm_questionario` varchar(30) NOT NULL,
  `dt_datai` date NOT NULL,
  `dt_fim` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_questionario_pergunta_opcao`
--

CREATE TABLE `tb_questionario_pergunta_opcao` (
  `id_pergunta` int(11) NOT NULL,
  `id_opcao` int(11) DEFAULT NULL,
  `id_qpo` int(11) NOT NULL,
  `id_questionario` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_respostas`
--

CREATE TABLE `tb_respostas` (
  `id_usuario` int(11) NOT NULL,
  `id_resposta` int(11) NOT NULL,
  `respostas` varchar(500) DEFAULT NULL,
  `id_qpo` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_usuario`
--

CREATE TABLE `tb_usuario` (
  `id_usuario` int(11) NOT NULL,
  `lg_usuario` char(17) NOT NULL,
  `nm_usuario` varchar(200) NOT NULL,
  `dt_nascimento` date NOT NULL,
  `ds_senha` char(11) NOT NULL,
  `ds_email` varchar(200) DEFAULT NULL,
  `us_codt` int(11) DEFAULT NULL,
  `us_cods` int(11) DEFAULT 2
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_usuario`
--

INSERT INTO `tb_usuario` (`id_usuario`, `lg_usuario`, `nm_usuario`, `dt_nascimento`, `ds_senha`, `ds_email`, `us_codt`, `us_cods`) VALUES
(61, 'brenda', 'Brenda Silveira', '2019-12-04', '123', 'brenda@brenda.com', 1, 1),
(62, 'admc', 'Servidor CORAC', '2019-12-04', '123', 'adm@adm.com', 3, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_usuariosituacao`
--

CREATE TABLE `tb_usuariosituacao` (
  `us_cods` int(11) NOT NULL,
  `us_situacao` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_usuariosituacao`
--

INSERT INTO `tb_usuariosituacao` (`us_cods`, `us_situacao`) VALUES
(1, 'HABILITADO'),
(2, 'DESABILITADO');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_usuariotipo`
--

CREATE TABLE `tb_usuariotipo` (
  `us_codt` int(11) NOT NULL,
  `us_tipo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_usuariotipo`
--

INSERT INTO `tb_usuariotipo` (`us_codt`, `us_tipo`) VALUES
(1, 'ALUNO'),
(2, 'SERVIDOR'),
(3, 'SERVIDOR ADM');

-- --------------------------------------------------------

--
-- Estrutura para vista `dados_pergunta_opcao`
--
DROP TABLE IF EXISTS `dados_pergunta_opcao`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `dados_pergunta_opcao`  AS  select `p`.`id_pergunta` AS `id_pergunta`,`p`.`pr_pergunta` AS `pr_pergunta`,`p`.`ds_pergunta` AS `ds_pergunta`,`o`.`id_opcao` AS `id_opcao`,`o`.`ds_opcao` AS `ds_opcao` from ((`tb_pergunta_opcao` `po` join `tb_pergunta` `p` on(`po`.`id_pergunta` = `p`.`id_pergunta`)) left join `tb_opcao` `o` on(`po`.`id_opcao` = `o`.`id_opcao`)) ;

-- --------------------------------------------------------

--
-- Estrutura para vista `dados_questionario`
--
DROP TABLE IF EXISTS `dados_questionario`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `dados_questionario`  AS  select `t1`.`id_questionario` AS `id_questionario`,`t1`.`nm_questionario` AS `nm_questionario`,`t2`.`id_pergunta` AS `id_pergunta`,`t2`.`pr_pergunta` AS `pr_pergunta`,`t2`.`ds_pergunta` AS `ds_pergunta`,`t2`.`id_tipo` AS `id_tipo`,`t3`.`id_opcao` AS `id_opcao`,`t3`.`ds_opcao` AS `ds_opcao`,`t4`.`id_qpo` AS `id_qpo` from (((`tb_questionario_pergunta_opcao` `t4` join `tb_questionario` `t1` on(`t1`.`id_questionario` = `t4`.`id_questionario`)) join `tb_pergunta` `t2` on(`t2`.`id_pergunta` = `t4`.`id_pergunta`)) left join `tb_opcao` `t3` on(`t3`.`id_opcao` = `t4`.`id_opcao`)) ;

-- --------------------------------------------------------

--
-- Estrutura para vista `dados_resposta`
--
DROP TABLE IF EXISTS `dados_resposta`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `dados_resposta`  AS  select `tb_questionario`.`id_questionario` AS `id_questionario`,`tb_questionario`.`nm_questionario` AS `nm_questionario`,`tb_pergunta`.`id_pergunta` AS `id_pergunta`,`tb_pergunta`.`pr_pergunta` AS `pr_pergunta`,`tb_opcao`.`id_opcao` AS `id_opcao`,`tb_opcao`.`ds_opcao` AS `ds_opcao`,`tb_usuario`.`id_usuario` AS `id_usuario`,`tb_usuario`.`lg_usuario` AS `lg_usuario`,`tb_usuario`.`ds_email` AS `ds_email`,`tb_usuario`.`nm_usuario` AS `nm_usuario`,`tb_respostas`.`id_resposta` AS `id_resposta`,`tb_respostas`.`respostas` AS `respostas` from (((((`tb_respostas` join `tb_usuario`) join `tb_questionario_pergunta_opcao`) join `tb_questionario`) join `tb_pergunta`) join `tb_opcao`) where `tb_questionario_pergunta_opcao`.`id_questionario` = `tb_questionario`.`id_questionario` and `tb_questionario_pergunta_opcao`.`id_pergunta` = `tb_pergunta`.`id_pergunta` and `tb_respostas`.`id_usuario` = `tb_usuario`.`id_usuario` and `tb_questionario_pergunta_opcao`.`id_opcao` = `tb_opcao`.`id_opcao` and `tb_respostas`.`id_qpo` = `tb_questionario_pergunta_opcao`.`id_qpo` ;

-- --------------------------------------------------------

--
-- Estrutura para vista `dados_usuario`
--
DROP TABLE IF EXISTS `dados_usuario`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `dados_usuario`  AS  select `t`.`id_usuario` AS `id_usuario`,`t`.`lg_usuario` AS `lg_usuario`,`t`.`nm_usuario` AS `nm_usuario`,`t`.`dt_nascimento` AS `dt_nascimento`,`t`.`ds_senha` AS `ds_senha`,`t`.`ds_email` AS `ds_email`,`ut`.`us_codt` AS `us_codt`,`ut`.`us_tipo` AS `us_tipo`,`us`.`us_cods` AS `us_cods`,`us`.`us_situacao` AS `us_situacao` from ((`tb_usuario` `t` left join `tb_usuariotipo` `ut` on(`t`.`us_codt` = `ut`.`us_codt`)) left join `tb_usuariosituacao` `us` on(`t`.`us_cods` = `us`.`us_cods`)) ;

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `tb_opcao`
--
ALTER TABLE `tb_opcao`
  ADD PRIMARY KEY (`id_opcao`);

--
-- Índices para tabela `tb_pergunta`
--
ALTER TABLE `tb_pergunta`
  ADD PRIMARY KEY (`id_pergunta`),
  ADD UNIQUE KEY `pr_pergunta` (`pr_pergunta`),
  ADD KEY `fk_tipo` (`id_tipo`);

--
-- Índices para tabela `tb_perguntatipo`
--
ALTER TABLE `tb_perguntatipo`
  ADD PRIMARY KEY (`id_tipo`);

--
-- Índices para tabela `tb_pergunta_opcao`
--
ALTER TABLE `tb_pergunta_opcao`
  ADD KEY `fk_pergunta` (`id_pergunta`),
  ADD KEY `fk_opcao` (`id_opcao`);

--
-- Índices para tabela `tb_questionario`
--
ALTER TABLE `tb_questionario`
  ADD PRIMARY KEY (`id_questionario`),
  ADD UNIQUE KEY `nm_questionario` (`nm_questionario`);

--
-- Índices para tabela `tb_questionario_pergunta_opcao`
--
ALTER TABLE `tb_questionario_pergunta_opcao`
  ADD PRIMARY KEY (`id_qpo`),
  ADD KEY `fk_perguntaa` (`id_pergunta`),
  ADD KEY `fk_opcao` (`id_opcao`),
  ADD KEY `fk_questionaio` (`id_questionario`);

--
-- Índices para tabela `tb_respostas`
--
ALTER TABLE `tb_respostas`
  ADD PRIMARY KEY (`id_resposta`),
  ADD KEY `fk_usuario` (`id_usuario`) USING BTREE,
  ADD KEY `fk_qpo` (`id_qpo`);

--
-- Índices para tabela `tb_usuario`
--
ALTER TABLE `tb_usuario`
  ADD PRIMARY KEY (`id_usuario`),
  ADD UNIQUE KEY `lg_usuario` (`lg_usuario`),
  ADD KEY `fk_cods` (`us_cods`),
  ADD KEY `fk_codt` (`us_codt`);

--
-- Índices para tabela `tb_usuariosituacao`
--
ALTER TABLE `tb_usuariosituacao`
  ADD PRIMARY KEY (`us_cods`);

--
-- Índices para tabela `tb_usuariotipo`
--
ALTER TABLE `tb_usuariotipo`
  ADD UNIQUE KEY `us_codt` (`us_codt`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `tb_opcao`
--
ALTER TABLE `tb_opcao`
  MODIFY `id_opcao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=342;

--
-- AUTO_INCREMENT de tabela `tb_pergunta`
--
ALTER TABLE `tb_pergunta`
  MODIFY `id_pergunta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=122;

--
-- AUTO_INCREMENT de tabela `tb_perguntatipo`
--
ALTER TABLE `tb_perguntatipo`
  MODIFY `id_tipo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `tb_questionario`
--
ALTER TABLE `tb_questionario`
  MODIFY `id_questionario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=274;

--
-- AUTO_INCREMENT de tabela `tb_questionario_pergunta_opcao`
--
ALTER TABLE `tb_questionario_pergunta_opcao`
  MODIFY `id_qpo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=137;

--
-- AUTO_INCREMENT de tabela `tb_respostas`
--
ALTER TABLE `tb_respostas`
  MODIFY `id_resposta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=337;

--
-- AUTO_INCREMENT de tabela `tb_usuario`
--
ALTER TABLE `tb_usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT de tabela `tb_usuariosituacao`
--
ALTER TABLE `tb_usuariosituacao`
  MODIFY `us_cods` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `tb_usuariotipo`
--
ALTER TABLE `tb_usuariotipo`
  MODIFY `us_codt` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `tb_pergunta`
--
ALTER TABLE `tb_pergunta`
  ADD CONSTRAINT `fk_tipo` FOREIGN KEY (`id_tipo`) REFERENCES `tb_perguntatipo` (`id_tipo`);

--
-- Limitadores para a tabela `tb_pergunta_opcao`
--
ALTER TABLE `tb_pergunta_opcao`
  ADD CONSTRAINT `fk_opcao` FOREIGN KEY (`id_opcao`) REFERENCES `tb_opcao` (`id_opcao`),
  ADD CONSTRAINT `fk_pergunta` FOREIGN KEY (`id_pergunta`) REFERENCES `tb_pergunta` (`id_pergunta`);

--
-- Limitadores para a tabela `tb_respostas`
--
ALTER TABLE `tb_respostas`
  ADD CONSTRAINT `fk_qpo` FOREIGN KEY (`id_qpo`) REFERENCES `tb_questionario_pergunta_opcao` (`id_qpo`),
  ADD CONSTRAINT `fk_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `tb_usuario` (`id_usuario`);

--
-- Limitadores para a tabela `tb_usuario`
--
ALTER TABLE `tb_usuario`
  ADD CONSTRAINT `fk_cods` FOREIGN KEY (`us_cods`) REFERENCES `tb_usuariosituacao` (`us_cods`),
  ADD CONSTRAINT `fk_codt` FOREIGN KEY (`us_codt`) REFERENCES `tb_usuariotipo` (`us_codt`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
