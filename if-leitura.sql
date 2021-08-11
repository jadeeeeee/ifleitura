-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 12-Ago-2021 às 01:36
-- Versão do servidor: 10.4.17-MariaDB
-- versão do PHP: 7.4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `if-leitura`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `avaliacao`
--

CREATE TABLE `avaliacao` (
  `id` int(200) NOT NULL,
  `resenha` text NOT NULL,
  `nota` decimal(1,0) NOT NULL,
  `data` date NOT NULL DEFAULT current_timestamp(),
  `id_livro` varchar(200) NOT NULL,
  `id_usuario` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `avaliacao`
--

INSERT INTO `avaliacao` (`id`, `resenha`, `nota`, `data`, `id_livro`, `id_usuario`) VALUES
(3, 'muito bom', '5', '2021-07-19', '02007', 1),
(4, 'pessimo', '1', '2021-07-19', '01003', 1),
(13, 'um pouco', '2', '2021-07-19', '01001', 18),
(35, 'podia ser melhor', '2', '2021-07-20', '01002', 20),
(69, 'she probaly gives you butterflies i hope you happy i wish you was the best really', '6', '2021-08-04', '01002', 1),
(70, 'Is this the real life?\r\nIs this just fantasy?\r\nCaught in a landside,\r\nNo escape from reality\r\nOpen your eyes,\r\nLook up to the skies and see,\r\nI\'m just a poor boy, I need no sympathy,\r\nBecause I\'m easy come, easy go,\r\nLittle high, little low,\r\nAny way the wind blows doesn\'t really matter to\r\nMe, to me\r\nMamaaa,\r\nJust killed a man,\r\nPut a gun against his head, pulled my trigger,\r\nNow he\'s dead\r\nMamaaa, life had just begun,\r\nBut now I\'ve gone and thrown it all away\r\nMama, oooh,\r\nDidn\'t mean to make you cry,\r\nIf I\'m not back again this time tomorrow,\r\nCarry on, carry on as if nothing really matters\r\nToo late, my time has come,\r\nSends shivers down my spine, body\'s aching all\r\nThe time\r\nGoodbye, everybody, I\'ve got to go,\r\nGotta leave you all behind and face the truth\r\nMama, oooh\r\nI don\'t want to die,\r\nI sometimes wish I\'d never been born at all.\r\nI see a little silhouetto of a man,\r\nScaramouch, Scaramouch, will you do the Fandango!\r\nThunderbolts and lightning, very, very frightening me\r\nGalileo, Galileo\r\nGalileo, Galileo\r\nGalileo, Figaro - magnificoo\r\nI\'m just a poor boy nobody loves me\r\nHe\'s just a poor boy from a poor family,\r\nSpare him his life from this monstrosity\r\nEasy come, easy go, will you let me go\r\nBismillah! No, we will not let you go\r\n(Let him go!) Bismillah! We will not let you go\r\n(Let him go!) Bismillah! We will not let you go\r\n(Let me go) Will not let you go\r\n(Let me go)(Never) Never let you go\r\n(Let me go) (Never) let you go (Let me go) Ah\r\nNo, no, no, no, no, no, no\r\nOh mama mia, mama mia, mama mia, let me go\r\nBeelzebub has a devil put aside for me, for me,\r\nFor meee\r\nSo you think you can stop me and spit in my eye\r\nSo you think you can love me and leave me to die\r\nOh, baby, can\'t do this to me, baby,\r\nJust gotta get out, just gotta get right outta here\r\nNothing really matters, Anyone can see,\r\nNothing really matters,\r\nNothing really matters to me\r\nAny way the wind blows...', '6', '2021-08-04', '01002', 1),
(110, 'CAPITU TRaiU SIM KKKKKKKKKK', '9', '2021-08-09', '01001', 23),
(114, 'um livro muito bom', '4', '2021-08-10', '01001', 27),
(115, 'muito díficil a leitura', '6', '2021-08-10', '01004', 27),
(116, 'muito bom!!!', '9', '2021-08-10', '02003', 28),
(117, 'muito doido esse livro', '7', '2021-08-10', '02009', 30),
(121, 'Um livro surpreendente. Conta a história do amor de Bento (Dom Casmurro, do título) por sua vizinha Capitu e de suas suspeitas de traição com o amigo Escobar. Há momentos em que o autor conversa com o leitor contando suas estórias, seus dramas, suas dúvidas sobre a traição de Capitu; tornando o livro envolvente.', '9', '2021-08-10', '01001', 3),
(124, 'muito interessante', '6', '2021-08-10', '01003', 23);

-- --------------------------------------------------------

--
-- Estrutura da tabela `livro`
--

CREATE TABLE `livro` (
  `titulo` varchar(100) NOT NULL,
  `autor` varchar(50) NOT NULL,
  `ano_publi` int(4) NOT NULL,
  `id` varchar(5) NOT NULL,
  `sinopse` text NOT NULL,
  `origem` varchar(20) NOT NULL,
  `capa` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `livro`
--

INSERT INTO `livro` (`titulo`, `autor`, `ano_publi`, `id`, `sinopse`, `origem`, `capa`) VALUES
('dom casmurro', 'machado de assis', 1899, '01001', 'bento santiago (bentinho), apelidado de dom casmurro por ser calado e introvertido. na adolescência, apaixona-se por capitu, abandonando o seminário e, com ele, os desígnios traçados por sua mãe, dona glória, para que se tornasse padre.', 'Nacional', 'domcasmurro.jpg'),
('incidente em antares', 'érico veríssimo', 1971, '01002', ' foi o último romance escrito por érico veríssimo. escrito em 1971, faz uso do fantástico e do sobrenatural para abordar temas reais. as principais temáticas sobre as quais veríssimo escreve nessa obra são a violência do regime militar e a chegada de indústrias estrangeiras ao brasil', 'Nacional', 'incidente1.jpg'),
('o cortiço', 'aluísio azevedo', 1890, '01003', 'o cortiço é um romance naturalista do brasileiro aluísio azevedo publicado em 1890 que denuncia a exploração e as péssimas condições de vida dos moradores das estalagens ou dos cortiços cariocas do final do século xix.', 'Nacional', 'cortico.jpg'),
('a hora da estrela', 'clarice lispector', 1977, '01004', 'romance literário da escritora brasileira clarice lispector. o romance narra a história da datilógrafa alagoana, macabéa, que migra para o rio de janeiro, tendo sua rotina narrada por um escritor fictício chamado rodrigo s.m.', 'Nacional', 'ahoradaestrela.jpg'),
('cidade de deus', 'paulo lins', 1997, '01005', 'buscapé é um jovem pobre, negro e sensível, que cresce em um universo de muita violência. ele vive na cidade de deus, favela carioca conhecida por ser um dos locais mais violentos do rio. amedrontado com a possibilidade de se tornar um bandido, buscapé é salvo de seu destino por causa de seu talento como fotógrafo, o qual permite que siga carreira na profissão.', 'Nacional', 'cidade.jpg'),
('senhora', 'josé de alencar', 1875, '01006', 'senhora é romance urbano publicado em 1874, na forma de folhetim. é um dos últimos romances de alencar, publicado três anos antes da morte do escritor. da mesma forma que iracema, senhora é juntamente com lucíola um dos pontos altos da sua ficção citadina e de atualidade.', 'Nacional', 'senhora.jpg'),
('o alienista', 'machado de assis', 1882, '01007', 'casa verde é um asilo em itaguaí, nomeado em razão da cor de suas janelas. muitos dementes estavam recolhidos e os parentes tiveram ocasião de ver o carinho paternal e a caridade cristã com que eles ia ser tratados', 'Nacional', 'alienista.jpg'),
('clara dos anjos', 'lima barreto', 1948, '01008', 'clara dos anjos é um livro póstumo do escritor brasileiro lima barreto, pertencente ao pré-modernismo brasileiro. concluído em 1922, ano da morte do autor, foi publicado em 1948.', 'Nacional', 'clara.jpg'),
('memórias póstumas de brás cubas', 'machado de assis', 1881, '01009', 'após ter morrido brás cubas decide por narrar sua história a fim de se distrair na eternidade. a partir de então ele relembra de amigos como quincas borba, de sua displicente formação acadêmica em portugal, dos amores de sua vida e ainda do privilégio que teve de nunca ter precisado trabalhar em sua vida.', 'Nacional', 'memorias.jpg'),
('capitães da areia', 'jorge amado', 1937, '01010', 'a obra retrata a vida de um grupo de menores abandonados, que crescem nas ruas da cidade de salvador, bahia, vivendo em um trapiche, roubando para sobreviver, chamados de \"capitães da areia\".', 'Nacional', 'capitaes.jpg'),
('vidas secas', 'graciliano ramos', 1938, '01011', 'a história de uma família pobre da região seca do nordeste e sua luta diária por trabalho e comida para sobreviver e superar as dificuldades do ambiente árido em que vive.', 'Nacional', 'vidasecas.jpg'),
('as crônicas de nárnia', 'c.s. lewis', 1950, '02001', 'as crônicas de nárnia apresentam, geralmente, as aventuras de crianças que desempenham um papel central e descobrem o ficcional reino de nárnia, um lugar onde a magia é corriqueira, os animais falam, e ocorrem batalhas entre o bem e o mal.', 'Internacional', 'narnia.jpg'),
('admirável mundo novo', 'aldous huxley', 1932, '02002', 'a história se passa em londres no ano 2540, o romance antecipa desenvolvimentos em tecnologia reprodutiva, hipnopedia, manipulação psicológica e condicionamento clássico, que se combinam para mudar profundamente a sociedade.', 'Internacional', 'admiravel.jpg'),
('orgulho e reconceito', 'jane austen', 1813, '02003', 'elizabeth bennet vive com sua mãe, pai e irmãs no campo, na inglaterra. por ser a filha mais velha, ela enfrenta uma crescente pressão de seus pais para se casar. quando elizabeth é apresentada ao belo e rico darcy, faíscas voam. embora haja uma química óbvia entre os dois, a natureza excessivamente reservada de darcy ameaça a relação.', 'Internacional', 'orgulho.jpg'),
('harry potter e a pedra filosofal', 'j.k. rowling', 1997, '02004', 'harry potter é um garoto órfão que vive infeliz com seus tios, os dursleys. ele recebe uma carta contendo um convite para ingressar em hogwarts, uma famosa escola especializada em formar jovens bruxos. inicialmente, harry é impedido de ler a carta por seu tio, mas logo recebe a visita de hagrid, o guarda-caça de hogwarts, que chega para levá-lo até a escola.', 'Internacional', 'harry.jpg'),
('madame bovary', 'gustave flaubert', 1856, '02005', 'madame bovary é um romance de gustave flaubert. chamado de \"romance dos romances\", madame bovary é considerado pioneiro dentre os romances realistas, tornando-se famoso por sua originalidade', 'Internacional', 'madame.jpg'),
('coraline', 'neil gaiman', 2002, '02006', 'a pequena coraline descobre uma porta secreta que contém um mundo parecido com o dela, porém melhor em muitas maneiras. os pais são carinhosos e os sonhos de coraline viram realidade por lá. ela se encanta com essa descoberta, mas logo percebe que segredos estranhos estão em ação: uma outra mãe e o resto de sua família tentam mantê-la eternamente nesse mundo paralelo.', 'Internacional', 'coraline.jpg'),
('a revolução dos bichos', 'george orwell', 1945, '02007', 'cansados da exploração a que são submetidos pelos humanos, os animais da granja do solar rebelam-se contra seus donos e tomam posse da fazenda, com o objetivo de instituir um sistema igualitário. Porém, não demora muito para que uns se privilegiem mais que outros.', 'Internacional', 'bichos.jpg'),
('os irmãos karamazov', 'fiódor dostoiévski', 1879, '02008', 'os irmãos karamazov é um romance de fiódor dostoiévski, escrito em 1879, uma das mais importantes obras das literaturas russa e mundial, ou, conforme afirmou freud: \"a maior obra da história\".', 'Internacional', 'irmãos.jpg'),
('o crime do padre amaro', 'eça de queiroz', 1875, '02009', 'o crime do padre amaro é uma das obras do escritor português eça de queirós mais difundidas por todo o mundo. trata-se de uma obra polêmica, que causou protestos da igreja católica, ao ser publicada em 1875, em portugal.', 'Internacional', 'ocrime.jpg'),
('o hobbit', 'j. r. r. tolkien', 1937, '02010', 'como a maioria dos hobbits, bilbo bolseiro leva uma vida tranquila até o dia em que recebe uma missão do mago gandalf. acompanhado por um grupo de anões, ele parte numa jornada até a montanha solitária para libertar o reino de erebor do dragão smaug.', 'Internacional', 'hobbit.jpg'),
('cronica de uma morte anunciada', 'gabriel garcia marquez', 1981, '0211', 'essa obra conta a intrigante história do assassinato de santiago nasar pelos gêmeos vicario, remontando tudo que ocorreu nas últimas horas antes do rapaz ser assassinado na porta de sua casa, em um pequeno povoado.', 'Internacional', 'cronica.jpg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(255) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `idade` int(3) NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(32) NOT NULL,
  `data` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `nome`, `idade`, `email`, `senha`, `data`) VALUES
(1, 'Jade Beatriz', 18, 'jbeatriz.borborema12@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '2021-07-15'),
(2, 'xaulin', 15, 'xaulin@gmail.com', 'c84a2097f504c20d5b2869afcf26bf01', '2021-07-15'),
(3, 'tyler', 30, 'thecreator@oddfuture.com', 'dd97813dd40be87559aaefed642c3fbb', '2021-07-16'),
(15, 'bia', 16, 'bia@gmail.com', 'f11903d870bd5136fdf72d2265ef7952', '2021-07-16'),
(16, 'eva', 32, 'eva@gmail.com', 'f0b197c37084f90e66ba08f552c33a77', '2021-07-16'),
(17, 'carla', 19, 'carla@gmail.com', '2204f8aa7b9f894a874240273dcbda5d', '2021-07-16'),
(18, 'lucaseluan', 18, 'lucaseluan@gmail.com', 'f11903d870bd5136fdf72d2265ef7952', '2021-07-16'),
(19, 'pabblo ', 25, 'pabblo@gmail.com', '7eeaf587ccefec289ea185702273515a', '2021-07-16'),
(20, 'norte', 43, 'norte@gmail.com', '776f175906b4f37f7be3cfe42753e853', '2021-07-16'),
(21, 'vinicius', 19, 'vini@gmail.com', '74faf009b8a2873bfa49c135ea514ce2', '2021-07-20'),
(22, 'nais', 17, 'nais@gmail.com', '8bc1fe2cd2b791a6a9774a0e5d0033a3', '2021-07-20'),
(23, 'céline', 28, 'celine@hotmail.com', 'dba7b8a81dc064a62919df57e69d0054', '2021-08-04'),
(24, 'madchen', 12, 'madchen@gmail.com', 'fd18c01cf72b06ab3e37af4337848d63', '2021-08-04'),
(25, 'nikes', 19, 'nikes@outlook.com', '6895bea7a44b19897e2b5589a94df686', '2021-08-04'),
(26, 'admin', 18, 'admin@gmail.com', 'f6fdffe48c908deb0f4c3bd36c032e72', '2021-08-04'),
(27, 'Jade Beatriz', 18, 'jade@gmail.com', '4fb6ad4678d2876cfd97650274bca7ad', '2021-08-10'),
(28, 'maria', 18, 'maria@gmail.com', '4fb6ad4678d2876cfd97650274bca7ad', '2021-08-10'),
(29, 'marcela', 19, 'marcela@gmail.com', '0bb875f8fb22d81deb8fe69d6ef15a2e', '2021-08-10'),
(30, 'ana', 17, 'ana@gmail.com', '0bb875f8fb22d81deb8fe69d6ef15a2e', '2021-08-10');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `avaliacao`
--
ALTER TABLE `avaliacao`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_livro` (`id_livro`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Índices para tabela `livro`
--
ALTER TABLE `livro`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `avaliacao`
--
ALTER TABLE `avaliacao`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=125;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `avaliacao`
--
ALTER TABLE `avaliacao`
  ADD CONSTRAINT `avaliacao_ibfk_2` FOREIGN KEY (`id_livro`) REFERENCES `livro` (`id`),
  ADD CONSTRAINT `avaliacao_ibfk_3` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
