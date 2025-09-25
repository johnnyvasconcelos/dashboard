-- MySQL dump 10.13  Distrib 8.0.41, for Win64 (x86_64)
--
-- Host: localhost    Database: dashboard_eenu
-- ------------------------------------------------------
-- Server version	8.0.41

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

--
-- Table structure for table `empresas`
--

DROP TABLE IF EXISTS `empresas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `empresas` (
  `id` int NOT NULL AUTO_INCREMENT,
  `data` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `empresa_nome` varchar(150) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `responsavel` varchar(150) NOT NULL,
  `cadastrante_nome` varchar(150) NOT NULL,
  `cadastrante_imagem` varchar(255) NOT NULL,
  `torre` varchar(20) DEFAULT NULL,
  `andar` varchar(20) DEFAULT NULL,
  `numero_sala` varchar(20) DEFAULT NULL,
  `telefone` varchar(20) DEFAULT NULL,
  `descricao` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `empresas`
--

LOCK TABLES `empresas` WRITE;
/*!40000 ALTER TABLE `empresas` DISABLE KEYS */;
INSERT INTO `empresas` VALUES (8,'2025-09-21 00:49:31','Empresa Teste','empresa-teste','Eu','Tatiana','tatiana.jpg','Torre B','Andar 2','140','111111111','Teste cadastrar empresa.'),(10,'2025-09-22 01:33:17','Miro Ferragens','miro-ferragens','Miro Borges','Tatiana','tatiana.jpg','Torre B','Andar 2','102','1090091000','Miro Borges Ferragens.');
/*!40000 ALTER TABLE `empresas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `empresas_sites`
--

DROP TABLE IF EXISTS `empresas_sites`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `empresas_sites` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) DEFAULT NULL,
  `titulo` varchar(255) NOT NULL DEFAULT 'Titulo Empresa',
  `slug` varchar(255) DEFAULT '',
  `sobre_1` text,
  `metodo_1_texto` text,
  `metodo_2_texto` text,
  `metodo_3_texto` text,
  `metodo_4_texto` text,
  `sobre_2` text,
  `sobre_3` text,
  `profissional_1_texto` text,
  `profissional_2_texto` text,
  `profissional_3_texto` text,
  `email` varchar(255) DEFAULT 'contato@eenu.com.br',
  `whatsapp` varchar(20) DEFAULT '1111111111',
  `metodo_1_titulo` varchar(255) DEFAULT 'Descoberta',
  `metodo_2_titulo` varchar(255) DEFAULT 'Pesquisa',
  `metodo_3_titulo` varchar(255) DEFAULT 'Designing',
  `metodo_4_titulo` varchar(255) DEFAULT 'Ajustes',
  `foto_1` varchar(255) DEFAULT 'item-1.webp',
  `foto_2` varchar(255) DEFAULT 'item-2.webp',
  `foto_3` varchar(255) DEFAULT 'item-3.webp',
  `foto_4` varchar(255) DEFAULT 'item-4.webp',
  `foto_5` varchar(255) DEFAULT 'item-5.webp',
  `icone_card_1` varchar(255) DEFAULT 'icon-1.svg',
  `icone_card_2` varchar(255) DEFAULT 'icon-7.svg',
  `icone_card_3` varchar(255) DEFAULT 'icon-4.svg',
  `titulo_card_1` varchar(50) DEFAULT '180+',
  `titulo_card_2` varchar(50) DEFAULT '470+',
  `titulo_card_3` varchar(50) DEFAULT '25+',
  `subtitulo_card_1` varchar(255) DEFAULT 'Clientes Atendidos',
  `subtitulo_card_2` varchar(255) DEFAULT 'Coleções Criadas',
  `subtitulo_card_3` varchar(255) DEFAULT 'Prêmios Ganhos',
  `profissional_1_titulo` varchar(255) DEFAULT 'José Silva',
  `profissional_2_titulo` varchar(255) DEFAULT 'Maria Silva',
  `profissional_3_titulo` varchar(255) DEFAULT 'Augusto Silva',
  `profissional_1_imagem` varchar(255) DEFAULT 'time-1.webp',
  `profissional_2_imagem` varchar(255) DEFAULT 'time-2.webp',
  `profissional_3_imagem` varchar(255) DEFAULT 'time-3.webp',
  `foto_sobre` varchar(80) DEFAULT 'author.webp',
  `foto_cabecalho` varchar(50) DEFAULT NULL,
  `logo` varchar(80) DEFAULT 'logo.webp',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `empresas_sites`
--

LOCK TABLES `empresas_sites` WRITE;
/*!40000 ALTER TABLE `empresas_sites` DISABLE KEYS */;
INSERT INTO `empresas_sites` VALUES (1,'Inova Soluções LTDA','Titulo Empresa','inova-solucoes-ltda',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'contato@eenu.com.br','11911111111','Descoberta','Pesquisa','Designing','Ajustes','item-1.webp','item-2.webp','item-3.webp','item-4.webp','item-5.webp','icon-1.svg','icon-7.svg','icon-4.svg','180+','470+','25+','Clientes Atendidos','Coleções Criadas','Prêmios Ganhos','José Silva','Maria Silva','Augusto Silva','time-1.webp','time-2.webp','time-3.webp','author.webp','header.webp','logo.webp'),(2,'Tico Teco Soluções ','Titulo Empresa','tico-teco-solucoes',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'contato@eenu.com.br','1111111111','Descoberta','Pesquisa','Designing','Ajustes','item-1.webp','item-2.webp','item-3.webp','item-4.webp','item-5.webp','icon-1.svg','icon-7.svg','icon-4.svg','180+','470+','25+','Clientes Atendidos','Coleções Criadas','Prêmios Ganhos','José Silva','Maria Silva','Augusto Silva','time-1.webp','time-2.webp','time-3.webp','author.webp','header.webp','logo.webp'),(3,'Edinaldo Peças','Titulo Empresa','edinaldo-pecas',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'contato@eenu.com.br','1111111111','Descoberta','Pesquisa','Designing','Ajustes','item-1.webp','item-2.webp','item-3.webp','item-4.webp','item-5.webp','icon-1.svg','icon-7.svg','icon-4.svg','180+','470+','25+','Clientes Atendidos','Coleções Criadas','Prêmios Ganhos','José Silva','Maria Silva','Augusto Silva','time-1.webp','time-2.webp','time-3.webp','author.webp','header.webp','logo.webp'),(4,'Sílvia Imóveis','Titulo Empresa','silvia-imoveis',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'contato@eenu.com.br','1111111111','Descoberta','Pesquisa','Designing','Ajustes','item-1.webp','item-2.webp','item-3.webp','item-4.webp','item-5.webp','icon-1.svg','icon-7.svg','icon-4.svg','180+','470+','25+','Clientes Atendidos','Coleções Criadas','Prêmios Ganhos','José Silva','Maria Silva','Augusto Silva','time-1.webp','time-2.webp','time-3.webp','author.webp','header.webp','logo.webp'),(5,'Sílvia Imóveis','Titulo Empresa','silvia-imoveis',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'contato@eenu.com.br','1111111111','Descoberta','Pesquisa','Designing','Ajustes','item-1.webp','item-2.webp','item-3.webp','item-4.webp','item-5.webp','icon-1.svg','icon-7.svg','icon-4.svg','180+','470+','25+','Clientes Atendidos','Coleções Criadas','Prêmios Ganhos','José Silva','Maria Silva','Augusto Silva','time-1.webp','time-2.webp','time-3.webp','author.webp','header.webp','logo.webp'),(6,'Luna Calçados','Titulo Empresa','luna-calcados',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'contato@eenu.com.br','1111111111','Descoberta','Pesquisa','Designing','Ajustes','item-1.webp','item-2.webp','item-3.webp','item-4.webp','item-5.webp','icon-1.svg','icon-7.svg','icon-4.svg','180+','470+','25+','Clientes Atendidos','Coleções Criadas','Prêmios Ganhos','José Silva','Maria Silva','Augusto Silva','time-1.webp','time-2.webp','time-3.webp','author.webp','header.webp','logo.webp'),(7,'Miro Ferragens','Titulo Empresa','miro-ferragens','Mais informações sobre a empresa. Edite no painel.','Explorar novas ideias e caminhos que podem transformar projetos em algo único.','Investigar e analisar profundamente para encontrar soluções sólidas e eficazes.','Transformar conceitos em formas visuais e funcionais que encantam e resolvem.','Refinar detalhes até alcançar o equilíbrio perfeito entre estética e eficiência.','Sobre a história da empresa. Edite no painel.','Sobre a nossa equipe. Edite no painel.','Um profissional dedicado, comprometido com resultados e sempre atento aos detalhes. Atua com seriedade, ética e busca constante por melhorias, oferecendo um atendimento de qualidade e soluções eficientes para cada desafio.','Um profissional dedicado, comprometido com resultados e sempre atento aos detalhes. Atua com seriedade, ética e busca constante por melhorias, oferecendo um atendimento de qualidade e soluções eficientes para cada desafio.','Um profissional dedicado, comprometido com resultados e sempre atento aos detalhes. Atua com seriedade, ética e busca constante por melhorias, oferecendo um atendimento de qualidade e soluções eficientes para cada desafio.','contato@eenu.com.br','1111111111','Descoberta','Pesquisa','Designing','Ajustes','item-1.webp','item-2.webp','item-3.webp','item-4.webp','item-5.webp','icon-1.svg','icon-7.svg','icon-5.svg','180+','470+','25+','Clientes Atendidos','Coleções Criadas','Prêmios Ganhos','José Silva','Maria Silva','Augusto Silva','time-1.webp','time-2.webp','time-3.webp','author.webp','header.webp','logo.webp'),(8,'Empresa Teste','Teste de Título 1','empresa-teste','Teste de informações.','Teste Card Texto 1','Teste Card Texto 2','Teste Card Texto 3','Teste Card Texto 3','Teste de texto da empresa.','Sobre a nossa equipe texto de teste.','Texto do José Alencar','Texto da Maria Ribeiro.','Texto do José Serra.','teste@email.com','1190908080','Teste Card Titulo 1','Teste Card Titulo 2','Teste Card Titulo 3','Teste Card Titulo 4','galeria-1-empresa-teste.jpg','galeria-2-empresa-teste.jpg','galeria-3-empresa-teste.png','galeria-4-empresa-teste.jpg','galeria-5-empresa-teste.jpg','icon-8.svg','icon-6.svg','icon-9.svg','123123','323123','123123','xcasxasx','fwefweas','asdasd','José Alencar','Maria Ribeiro','José Serra','time-1-empresa-teste.webp','time-2-empresa-teste.webp','time-3-empresa-teste.jpg','sobre-empresa-teste.webp','header-empresa-teste.jpg','logo-empresa-teste.png'),(9,'Editar Empresa 2','Titulo Empresa','editar-empresa-2',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'contato@eenu.com.br','1111111111','Descoberta','Pesquisa','Designing','Ajustes','item-1.webp','item-2.webp','item-3.webp','item-4.webp','item-5.webp','icon-1.svg','icon-7.svg','icon-4.svg','180+','470+','25+','Clientes Atendidos','Coleções Criadas','Prêmios Ganhos','José Silva','Maria Silva','Augusto Silva','time-1.webp','time-2.webp','time-3.webp','author.webp','header.webp','logo.webp'),(10,'Miro Ferragens','Titulo Empresa','miro-ferragens','Mais informações sobre a empresa. Edite no painel.','Explorar novas ideias e caminhos que podem transformar projetos em algo único.','Investigar e analisar profundamente para encontrar soluções sólidas e eficazes.','Transformar conceitos em formas visuais e funcionais que encantam e resolvem.','Refinar detalhes até alcançar o equilíbrio perfeito entre estética e eficiência.','Sobre a história da empresa. Edite no painel.','Sobre a nossa equipe. Edite no painel.','Um profissional dedicado, comprometido com resultados e sempre atento aos detalhes. Atua com seriedade, ética e busca constante por melhorias, oferecendo um atendimento de qualidade e soluções eficientes para cada desafio.','Um profissional dedicado, comprometido com resultados e sempre atento aos detalhes. Atua com seriedade, ética e busca constante por melhorias, oferecendo um atendimento de qualidade e soluções eficientes para cada desafio.','Um profissional dedicado, comprometido com resultados e sempre atento aos detalhes. Atua com seriedade, ética e busca constante por melhorias, oferecendo um atendimento de qualidade e soluções eficientes para cada desafio.','contato@eenu.com.br','1111111111','Descoberta','Pesquisa','Designing','Ajustes','item-1.webp','item-2.webp','item-3.webp','item-4.webp','item-5.webp','icon-1.svg','icon-7.svg','icon-5.svg','180+','470+','25+','Clientes Atendidos','Coleções Criadas','Prêmios Ganhos','José Silva','Maria Silva','Augusto Silva','time-1.webp','time-2.webp','time-3.webp','author.webp','header.webp','logo.webp');
/*!40000 ALTER TABLE `empresas_sites` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `usuarios` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `foto` varchar(255) DEFAULT './user-default.webp',
  `ultimo_login` datetime DEFAULT NULL,
  `funcao` varchar(50) NOT NULL DEFAULT 'usuario',
  PRIMARY KEY (`id`),
  UNIQUE KEY `nome` (`nome`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` VALUES (1,'Christian','@senha100','christian.jpg','2025-09-17 13:57:23','Administrador'),(2,'Tatiana','@senha200','tatiana.jpg','2025-09-17 15:09:17','Editor');
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

-- Dump completed on 2025-09-25  9:37:48
