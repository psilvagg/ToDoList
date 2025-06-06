-- MySQL dump 10.13  Distrib 8.0.42, for Win64 (x86_64)
--
-- Host: localhost    Database: SAEP_Kanban
-- ------------------------------------------------------
-- Server version	8.0.42
/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;

/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;

/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;

/*!50503 SET NAMES utf8mb4 */;

/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;

/*!40103 SET TIME_ZONE='+00:00' */;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;

/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;

/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


CREATE DATABASE IF NOT EXISTS SAEP_Kanban;

USE SAEP_Kanban;
--
-- Table structure for table `tarefas`
--
DROP TABLE IF EXISTS `tarefas`;

/*!40101 SET @saved_cs_client     = @@character_set_client */;

/*!50503 SET character_set_client = utf8mb4 */;

CREATE TABLE
  `tarefas` (
    `idTarefa` int NOT NULL AUTO_INCREMENT,
    `idUsuario_FK` int NOT NULL,
    `prioridadeTarefa` varchar(20) NOT NULL,
    `nomeSetor` varchar(40) NOT NULL,
    `descricaoTarefa` varchar(150) NOT NULL,
    `statusTarefa` varchar(20) NOT NULL,
    `dataHoraCadastroTarefa` datetime DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (`idTarefa`),
    KEY `idUsuario_FK` (`idUsuario_FK`),
    CONSTRAINT `tarefas_ibfk_1` FOREIGN KEY (`idUsuario_FK`) REFERENCES `usuarios` (`idUsuario`)
  ) ENGINE = InnoDB AUTO_INCREMENT = 46 DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci;

/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tarefas`
--
LOCK TABLES `tarefas` WRITE;

/*!40000 ALTER TABLE `tarefas` DISABLE KEYS */;

INSERT INTO
  `tarefas`
VALUES
  (
    1,
    1,
    'Alta',
    'TI',
    'Atualizar sistema operacional dos servidores para última versão.',
    'A fazer',
    '2025-06-01 08:15:00'
  ),
  (
    2,
    1,
    'Media',
    'RH',
    'Organizar treinamento de diversidade e inclusão.',
    'Fazendo',
    '2025-06-01 09:00:00'
  ),
  (
    3,
    1,
    'Baixa',
    'Financeiro',
    'Revisar notas fiscais do mês e arquivar documentos.',
    'Pronto',
    '2025-05-30 14:30:00'
  ),
  (
    4,
    1,
    'Alta',
    'Marketing',
    'Planejar campanha de lançamento do novo produto.',
    'A fazer',
    '2025-06-02 10:45:00'
  ),
  (
    5,
    1,
    'Media',
    'Suporte',
    'Atender chamados pendentes e registrar feedback.',
    'Fazendo',
    '2025-06-01 11:20:00'
  ),
  (
    6,
    1,
    'Baixa',
    'Logística',
    'Atualizar planilha de inventário e verificar estoque.',
    'Pronto',
    '2025-05-29 16:00:00'
  ),
  (
    7,
    1,
    'Alta',
    'TI',
    'Corrigir vulnerabilidades do relatório de segurança.',
    'A fazer',
    '2025-06-01 15:30:00'
  ),
  (
    8,
    1,
    'Media',
    'Comercial',
    'Contato com clientes para renegociação de contratos.',
    'Fazendo',
    '2025-06-01 13:45:00'
  ),
  (
    9,
    1,
    'Baixa',
    'RH',
    'Atualizar cadastro dos funcionários no sistema.',
    'Pronto',
    '2025-05-28 09:15:00'
  ),
  (
    10,
    1,
    'Alta',
    'Financeiro',
    'Fechar balanço financeiro do trimestre.',
    'A fazer',
    '2025-06-02 08:00:00'
  ),
  (
    11,
    1,
    'Media',
    'Marketing',
    'Criar conteúdo para redes sociais.',
    'Fazendo',
    '2025-06-01 14:00:00'
  ),
  (
    12,
    1,
    'Baixa',
    'TI',
    'Backup semanal dos servidores.',
    'Pronto',
    '2025-05-31 23:00:00'
  ),
  (
    13,
    1,
    'Alta',
    'Comercial',
    'Preparar apresentação para reunião com parceiros.',
    'A fazer',
    '2025-06-02 09:30:00'
  ),
  (
    14,
    1,
    'Media',
    'Suporte',
    'Atualizar base de conhecimento interna.',
    'Fazendo',
    '2025-06-01 10:00:00'
  ),
  (
    15,
    1,
    'Baixa',
    'Logística',
    'Planejar rota de entrega para a próxima semana.',
    'Pronto',
    '2025-05-30 17:00:00'
  ),
  (
    16,
    1,
    'Alta',
    'TI',
    'Implementar autenticação multifator.',
    'A fazer',
    '2025-06-02 11:00:00'
  ),
  (
    17,
    1,
    'Media',
    'RH',
    'Organizar avaliação de desempenho.',
    'Fazendo',
    '2025-06-01 12:30:00'
  ),
  (
    18,
    1,
    'Baixa',
    'Financeiro',
    'Atualizar fluxo de caixa semanal.',
    'Pronto',
    '2025-05-29 10:00:00'
  ),
  (
    19,
    1,
    'Alta',
    'Marketing',
    'Analisar métricas da última campanha.',
    'Fazendo',
    '2025-06-02 14:15:00'
  ),
  (
    20,
    1,
    'Media',
    'Suporte',
    'Resolver tickets prioritários.',
    'Fazendo',
    '2025-06-01 15:00:00'
  ),
  (
    21,
    1,
    'Baixa',
    'Logística',
    'Coordenar transporte de mercadorias.',
    'Pronto',
    '2025-05-28 16:45:00'
  ),
  (
    22,
    1,
    'Alta',
    'TI',
    'Monitorar rede para evitar falhas.',
    'A fazer',
    '2025-06-02 08:45:00'
  ),
  (
    23,
    1,
    'Media',
    'Comercial',
    'Negociar condições com fornecedores.',
    'Fazendo',
    '2025-06-01 13:00:00'
  ),
  (
    24,
    1,
    'Baixa',
    'RH',
    'Registrar ponto dos funcionários.',
    'Pronto',
    '2025-05-30 09:00:00'
  ),
  (
    25,
    1,
    'Alta',
    'Financeiro',
    'Preparar relatório para auditoria.',
    'A fazer',
    '2025-06-02 09:45:00'
  ),
  (
    26,
    1,
    'Media',
    'Marketing',
    'Revisar calendário editorial.',
    'Fazendo',
    '2025-06-01 11:30:00'
  ),
  (
    27,
    1,
    'Baixa',
    'TI',
    'Atualizar licenças de software.',
    'Pronto',
    '2025-05-29 14:00:00'
  ),
  (
    28,
    1,
    'Alta',
    'Comercial',
    'Fazer follow-up com leads.',
    'A fazer',
    '2025-06-02 10:15:00'
  ),
  (
    29,
    1,
    'Media',
    'Suporte',
    'Treinar equipe sobre novo sistema.',
    'Fazendo',
    '2025-06-01 12:00:00'
  ),
  (
    30,
    1,
    'Baixa',
    'Logística',
    'Atualizar cadastro de fornecedores.',
    'Pronto',
    '2025-05-31 15:30:00'
  ),
  (
    31,
    1,
    'Alta',
    'TI',
    'Realizar auditoria de segurança.',
    'A fazer',
    '2025-06-02 13:00:00'
  ),
  (
    32,
    1,
    'Media',
    'RH',
    'Organizar evento de integração.',
    'Fazendo',
    '2025-06-01 14:30:00'
  ),
  (
    33,
    1,
    'Baixa',
    'Financeiro',
    'Conferir pagamentos realizados.',
    'Pronto',
    '2025-05-28 11:00:00'
  ),
  (
    34,
    1,
    'Alta',
    'Marketing',
    'Desenvolver nova identidade visual.',
    'A fazer',
    '2025-06-02 09:00:00'
  ),
  (
    35,
    1,
    'Media',
    'Suporte',
    'Atualizar FAQ do site.',
    'Fazendo',
    '2025-06-01 10:30:00'
  ),
  (
    36,
    1,
    'Baixa',
    'Logística',
    'Planejar manutenção dos veículos.',
    'Pronto',
    '2025-05-30 16:15:00'
  ),
  (
    37,
    1,
    'Alta',
    'TI',
    'Configurar servidores para backup.',
    'A fazer',
    '2025-06-02 15:00:00'
  ),
  (
    38,
    1,
    'Media',
    'Comercial',
    'Analisar feedbacks dos clientes.',
    'Fazendo',
    '2025-06-01 09:15:00'
  ),
  (
    39,
    1,
    'Baixa',
    'RH',
    'Atualizar plano de cargos e salários.',
    'Pronto',
    '2025-05-29 13:00:00'
  ),
  (
    40,
    1,
    'Alta',
    'Financeiro',
    'Negociar linhas de crédito.',
    'A fazer',
    '2025-06-02 12:30:00'
  ),
  (
    41,
    1,
    'Media',
    'Marketing',
    'Planejar webinar para clientes.',
    'Fazendo',
    '2025-06-01 11:45:00'
  ),
  (
    42,
    1,
    'Baixa',
    'TI',
    'Documentar processos internos.',
    'Pronto',
    '2025-05-28 17:00:00'
  ),
  (
    43,
    1,
    'Alta',
    'Comercial',
    'Fechar parcerias estratégicas.',
    'A fazer',
    '2025-06-02 14:45:00'
  ),
  (
    44,
    1,
    'Media',
    'Suporte',
    'Melhorar tempo de resposta aos chamados.',
    'Fazendo',
    '2025-06-01 13:15:00'
  ),
  (
    45,
    1,
    'Baixa',
    'Logística',
    'Organizar documentos de transporte.',
    'Pronto',
    '2025-05-30 12:00:00'
  );

/*!40000 ALTER TABLE `tarefas` ENABLE KEYS */;

UNLOCK TABLES;

--
-- Table structure for table `usuarios`
--
DROP TABLE IF EXISTS `usuarios`;

/*!40101 SET @saved_cs_client     = @@character_set_client */;

/*!50503 SET character_set_client = utf8mb4 */;

CREATE TABLE
  `usuarios` (
    `idUsuario` int NOT NULL AUTO_INCREMENT,
    `nomeUsuario` varchar(100) NOT NULL,
    `emailUsuario` varchar(100) NOT NULL,
    PRIMARY KEY (`idUsuario`),
    UNIQUE KEY `emailUsuario` (`emailUsuario`)
  ) ENGINE = InnoDB AUTO_INCREMENT = 103 DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci;

/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--
LOCK TABLES `usuarios` WRITE;

/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;

INSERT INTO
  `usuarios`
VALUES
  (1, 'Pedro', 'pedro@example.com'),
  (3, 'Piper Gawen', 'pgawen0@diigo.com'),
  (4, 'Dosi Bullingham', 'dbullingham1@sun.com'),
  (5, 'Wendy Jamblin', 'wjamblin2@opensource.org'),
  (6, 'Maxi O\'Cooney', 'mocooney3@wikipedia.org'),
  (7, 'Donnie Avraham', 'davraham4@gnu.org'),
  (8, 'Ruby Rival', 'rrival5@biblegateway.com'),
  (9, 'Jecho Smeed', 'jsmeed6@homestead.com'),
  (10, 'Lynelle Gillman', 'lgillman7@arizona.edu'),
  (11, 'Noel Tukesby', 'ntukesby8@dyndns.org'),
  (12, 'Thaine Jonin', 'tjonin9@alibaba.com'),
  (13, 'Mercie Lakeland', 'mlakelanda@goo.ne.jp'),
  (14, 'Kevyn Dehm', 'kdehmb@studiopress.com'),
  (15, 'Warner Patsall', 'wpatsallc@ox.ac.uk'),
  (16, 'Andrus Sime', 'asimed@indiatimes.com'),
  (17, 'Ellis Dunbar', 'edunbare@livejournal.com'),
  (18, 'Doralyn Malthouse', 'dmalthousef@unblog.fr'),
  (19, 'Nora Garlicke', 'ngarlickeg@arstechnica.com'),
  (20, 'Rourke Acres', 'racresh@oracle.com'),
  (21, 'Rosalie Dockreay', 'rdockreayi@omniture.com'),
  (22, 'Janenna Saben', 'jsabenj@gmpg.org'),
  (23, 'Jena Caldow', 'jcaldowk@bloomberg.com'),
  (24, 'Malory Sherrington', 'msherringtonl@umn.edu'),
  (25, 'Broddie Raleston', 'bralestonm@cam.ac.uk'),
  (26, 'Tessie Lagen', 'tlagenn@yellowpages.com'),
  (27, 'Ginevra Greneham', 'ggrenehamo@unc.edu'),
  (28, 'Wilow Cassel', 'wcasselp@studiopress.com'),
  (29, 'Jaime Dun', 'jdunq@mapy.cz'),
  (30, 'Charmaine Yesinov', 'cyesinovr@house.gov'),
  (
    31,
    'Elwin Vasilchenko',
    'evasilchenkos@chronoengine.com'
  ),
  (32, 'Keary Dansie', 'kdansiet@sphinn.com'),
  (33, 'Angelia Tibbs', 'atibbsu@dagondesign.com'),
  (34, 'Doretta Shutle', 'dshutlev@yellowbook.com'),
  (35, 'Nevin Ivakhno', 'nivakhnow@engadget.com'),
  (
    36,
    'Sosanna Winterscale',
    'swinterscalex@sbwire.com'
  ),
  (
    37,
    'Gilberto Chipperfield',
    'gchipperfieldy@cnbc.com'
  ),
  (38, 'Rozalin Pendre', 'rpendrez@canalblog.com'),
  (39, 'Fidelio Killeen', 'fkilleen10@unc.edu'),
  (40, 'Rodrique Chaster', 'rchaster11@hc360.com'),
  (41, 'Pavel Dahlback', 'pdahlback12@boston.com'),
  (42, 'Wilmar Passey', 'wpassey13@imageshack.us'),
  (43, 'Amalea Hiley', 'ahiley14@marketwatch.com'),
  (
    44,
    'Siana Danshin',
    'sdanshin15@biblegateway.com'
  ),
  (45, 'Desmond Nance', 'dnance16@salon.com'),
  (46, 'York La Grange', 'yla17@google.it'),
  (47, 'Essa Stockoe', 'estockoe18@cbsnews.com'),
  (48, 'Terrel Ravenhill', 'travenhill19@hibu.com'),
  (49, 'Phineas Dabel', 'pdabel1a@cbc.ca'),
  (50, 'Martica Emmanueli', 'memmanueli1b@ibm.com'),
  (51, 'Durand Woolpert', 'dwoolpert1c@nature.com'),
  (52, 'Garvy Lempenny', 'glempenny1d@auda.org.au'),
  (53, 'Rikki Dabourne', 'rdabourne1e@hibu.com'),
  (54, 'Hilton Nenci', 'hnenci1f@joomla.org'),
  (55, 'Harald Creany', 'hcreany1g@opera.com'),
  (56, 'Vi Fannon', 'vfannon1h@comcast.net'),
  (57, 'Chase Vasnev', 'cvasnev1i@stumbleupon.com'),
  (58, 'Elsa Rooze', 'erooze1j@princeton.edu'),
  (59, 'Derek Dohmann', 'ddohmann1k@tumblr.com'),
  (
    60,
    'Bernardina Lilleyman',
    'blilleyman1l@usda.gov'
  ),
  (61, 'Nancee Dedrick', 'ndedrick1m@earthlink.net'),
  (62, 'Paulo Swetenham', 'pswetenham1n@webnode.com'),
  (
    63,
    'Rosmunda Savile',
    'rsavile1o@themeforest.net'
  ),
  (64, 'Zollie Earie', 'zearie1p@discovery.com'),
  (65, 'Ferdy Bendson', 'fbendson1q@yellowpages.com'),
  (66, 'Remington Carnew', 'rcarnew1r@ucla.edu'),
  (67, 'Roxie Keasy', 'rkeasy1s@netlog.com'),
  (68, 'Marlo Ravel', 'mravel1t@icq.com'),
  (69, 'Lynna Svanini', 'lsvanini1u@ustream.tv'),
  (70, 'Eal Ivanikhin', 'eivanikhin1v@meetup.com'),
  (71, 'Moll Godden', 'mgodden1w@bravesites.com'),
  (
    72,
    'Kingston Berrington',
    'kberrington1x@redcross.org'
  ),
  (73, 'Jamesy Flindall', 'jflindall1y@diigo.com'),
  (
    74,
    'Ivan Lightfoot',
    'ilightfoot1z@microsoft.com'
  ),
  (
    75,
    'Cory Gruszczak',
    'cgruszczak20@dagondesign.com'
  ),
  (
    76,
    'Eveleen Joskowitz',
    'ejoskowitz21@biblegateway.com'
  ),
  (77, 'Domini Brittian', 'dbrittian22@usgs.gov'),
  (78, 'Leticia Iamittii', 'liamittii23@ucoz.ru'),
  (79, 'Kilian Bridgeman', 'kbridgeman24@europa.eu'),
  (80, 'Pooh Buckby', 'pbuckby25@nih.gov'),
  (81, 'Hedda McCart', 'hmccart26@e-recht24.de'),
  (82, 'Hayward Kurton', 'hkurton27@prnewswire.com'),
  (83, 'Irwin Bucksey', 'ibucksey28@yellowpages.com'),
  (84, 'Brit Wigsell', 'bwigsell29@chronoengine.com'),
  (85, 'Beatrice Whatman', 'bwhatman2a@tiny.cc'),
  (86, 'Gideon Gillean', 'ggillean2b@who.int'),
  (87, 'Cliff MacHarg', 'cmacharg2c@pinterest.com'),
  (88, 'Vanya De Gregario', 'vde2d@engadget.com'),
  (89, 'Steffane Malkin', 'smalkin2e@ft.com'),
  (90, 'Faina Milsap', 'fmilsap2f@columbia.edu'),
  (
    91,
    'Bobbye Addionizio',
    'baddionizio2g@huffingtonpost.com'
  ),
  (
    92,
    'Novelia Bresson',
    'nbresson2h@constantcontact.com'
  ),
  (
    93,
    'Skipper Coppock.',
    'scoppock2i@quantcast.com'
  ),
  (
    94,
    'Andree Gallimore',
    'agallimore2j@sourceforge.net'
  ),
  (95, 'Oliy Stoffers', 'ostoffers2k@soundcloud.com'),
  (96, 'Alvis Stichall', 'astichall2l@ow.ly'),
  (97, 'Candi Gleadle', 'cgleadle2m@plala.or.jp'),
  (98, 'Umeko Grafham', 'ugrafham2n@clickbank.net'),
  (99, 'Kory MacAfee', 'kmacafee2o@wsj.com'),
  (100, 'Reinold Riby', 'rriby2p@51.la'),
  (101, 'Torrin Selliman', 'tselliman2q@auda.org.au'),
  (102, 'Nicky Bleyman', 'nbleyman2r@google.it');

/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;

UNLOCK TABLES;

/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;

/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;

/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;

/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;

/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-06-02 16:41:49