/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 100121
Source Host           : localhost:3306
Source Database       : movies

Target Server Type    : MYSQL
Target Server Version : 100121
File Encoding         : 65001

Date: 2017-08-15 17:01:17
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for genere
-- ----------------------------
DROP TABLE IF EXISTS `genere`;
CREATE TABLE `genere` (
  `id_genere` int(255) NOT NULL AUTO_INCREMENT,
  `genere` varchar(255) NOT NULL,
  PRIMARY KEY (`id_genere`),
  KEY `id_genere` (`id_genere`,`genere`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of genere
-- ----------------------------
INSERT INTO `genere` VALUES ('8', 'Aventura');
INSERT INTO `genere` VALUES ('9', 'Ação');
INSERT INTO `genere` VALUES ('10', 'Comédia');
INSERT INTO `genere` VALUES ('11', 'Drama');
INSERT INTO `genere` VALUES ('12', 'Documentário');
INSERT INTO `genere` VALUES ('13', 'Ficção');
INSERT INTO `genere` VALUES ('14', 'Animação');
INSERT INTO `genere` VALUES ('15', 'Suspense');
INSERT INTO `genere` VALUES ('16', 'Terror');
INSERT INTO `genere` VALUES ('17', 'Romance');

-- ----------------------------
-- Table structure for movie
-- ----------------------------
DROP TABLE IF EXISTS `movie`;
CREATE TABLE `movie` (
  `id_movie` int(255) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `sinopse` text NOT NULL,
  `ano` varchar(30) NOT NULL,
  `nota` varchar(30) NOT NULL,
  `fk_categoria` int(255) NOT NULL,
  PRIMARY KEY (`id_movie`),
  KEY `fk_genere` (`fk_categoria`),
  CONSTRAINT `fk_genere` FOREIGN KEY (`fk_categoria`) REFERENCES `genere` (`id_genere`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of movie
-- ----------------------------
INSERT INTO `movie` VALUES ('11', 'Logan', 'Em 2029, Logan (Hugh Jackman) ganha a vida como chofer de limousine para cuidar do nonagenário Charles Xavier (Patrick Stewart). Debilitado fisicamente e esgotado emocionalmente, ele é procurado por Gabriela (Elizabeth Rodriguez), uma mexicana que precisa da ajuda do ex-X-Men para defender a pequena Laura Kinney / X-23 (Dafne Keen). Ao mesmo tempo em que se recusa a voltar à ativa, Logan é perseguido pelo mercenário Donald Pierce (Boyd Holbrook), interessado na menina.', '2017', '8.2', '9');
INSERT INTO `movie` VALUES ('12', 'Shrek', 'Em um pântano distante vive Shrek (Mike Myers), um ogro solitário que vê, sem mais nem menos, sua vida ser invadida por uma série de personagens de contos de fada, como três ratos cegos, um grande e malvado lobo e ainda três porcos que não têm um lugar onde morar. Todos eles foram expulsos de seus lares pelo maligno Lorde Farquaad (John Lithgow). Determinado a recuperar a tranquilidade de antes, Shrek resolve encontrar Farquaad e com ele faz um acordo: todos os personagens poderão retornar aos seus lares se ele e seu amigo Burro (Eddie Murphy) resgatarem uma bela princesa (Cameron Diaz), que é prisioneira de um dragão. Porém, quando Shrek e o Burro enfim conseguem resgatar a princesa logo eles descobrem que seus problemas estão apenas começando.', '2001', '7.1', '14');
INSERT INTO `movie` VALUES ('13', 'O Senhor dos Anéis - A Sociedade do Anel', 'Numa terra fantástica e única, chamada Terra-Média, um hobbit (seres de estatura entre 80 cm e 1,20 m, com pés peludos e bochechas um pouco avermelhadas) recebe de presente de seu tio o Um Anel, um anel mágico e maligno que precisa ser destruído antes que caia nas mãos do mal. Para isso o hobbit Frodo (Elijah Woods) terá um caminho árduo pela frente, onde encontrará perigo, medo e personagens bizarros. Ao seu lado para o cumprimento desta jornada aos poucos ele poderá contar com outros hobbits, um elfo, um anão, dois humanos e um mago, totalizando 9 pessoas que formarão a Sociedade do Anel.', '2002', '8.8', '8');
INSERT INTO `movie` VALUES ('14', 'Meu Passado Me Condena 2', 'A vida de casado dos apaixonado Fábio (Fábio Porchat) e Miá (Miá Mello) cai na rotina quando, as diferenças, que não são poucas, precisam ser enfrentadas. Após Fábio esquecer o terceiro aniversário de casamento, Miá decide pedir um tempo. Quando o avô de Fábio, que mora em Portugal, o comunica que ficou viúvo, ele enxerga nesta viagem para o funeral uma oportunidade de salvar seu casamento.', '2015', '5.7', '10');
INSERT INTO `movie` VALUES ('15', 'O Sal da Terra', 'O filme conta um pouco da longa trajetória do renomado fotógrafo brasileiro Sebastião Salgado e apresenta seu ambicioso projeto \"Gênesis\", expedição que tem como objetivo registrar, a partir de imagens, civilizações e regiões do planeta até então inexploradas.', '2014', '8.4', '12');
INSERT INTO `movie` VALUES ('16', 'Titanic', 'Jack Dawson (Leonardo DiCaprio) é um jovem aventureiro que, na mesa de jogo, ganha uma passagem para a primeira viagem do transatlântico Titanic. Trata-se de um luxuoso e imponente navio, anunciado na época como inafundável, que parte para os Estados Unidos. Nele está também Rose DeWitt Bukater (Kate Winslet), a jovem noiva de Caledon Hockley (Billy Zane). Rose está descontente com sua vida, já que sente-se sufocada pelos costumes da elite e não ama Caledon. Entretanto, ela precisa se casar com ele para manter o bom nome da família, que está falida. Um dia, desesperada, Rose ameaça se atirar do Titanic, mas Jack consegue demovê-la da ideia. Pelo ato ele é convidado a jantar na primeira classe, onde começa a se tornar mais próximo de Rose. Logo eles se apaixonam, despertando a fúria de Caledon. A situação fica ainda mais complicada quando o Titanic se choca com um iceberg, provocando algo que ninguém imaginava ser possível: o naufrágio do navio.', '1997', '7.7', '11');
INSERT INTO `movie` VALUES ('17', 'De Volta Para o Futuro', 'Um jovem (Michael J. Fox) aciona acidentalmente uma máquina do tempo construída por um cientista (Christopher Lloyd) em um Delorean, retornando aos anos 50. Lá conhece sua mãe (Lea Thompson), antes ainda do casamento com seu pai, que fica apaixonada por ele. Tal paixão põe em risco sua própria existência, pois alteraria todo o futuro, forçando-o a servir de cupido entre seus pais.', '1985', '8.5', '13');
INSERT INTO `movie` VALUES ('18', 'A culpa é das Estrelas', 'Diagnosticada com câncer, a adolescente Hazel Grace Lancaster (Shailene Woodley) se mantém viva graças a uma droga experimental. Após passar anos lutando com a doença, ela é forçada pelos pais a participar de um grupo de apoio cristão. Lá, conhece Augustus Waters (Ansel Elgort), um rapaz que também sofre com câncer. Os dois possuem visões muito diferentes de suas doenças: Hazel preocupa-se apenas com a dor que poderá causar aos outros, já Augustus sonha em deixar a sua própria marca no mundo. Apesar das diferenças, eles se apaixonam. Juntos, atravessam os principais conflitos da adolescência e do primeiro amor, enquanto lutam para se manter otimistas e fortes um para o outro.', '2014', '7.8', '17');
INSERT INTO `movie` VALUES ('19', 'Hannibal', 'Sete anos se passaram desde que o Dr. Hannibal Lecter (Anthony Hopkins) escapou da prisão. O múltiplo homicida agora trabalha na biblioteca de uma família nobre de Florença e transita livremente pela Europa. A agente do FBI Clarice Sterling (Julianne Moore), que entrevistou o Dr. Lecter antes que ele fugisse do hospital de segurança máxima para criminosos insanos, nunca esqueceu o assassino, cuja voz ainda atormenta seus sonhos. Mas também Mason Verger (Gary Oldman) não se esqueceu de Hannibal. Vítima que conseguiu sobreviver ao ataque do psicopata e ficou terrivelmente desfigurado, Verger se torna um obcecado pela vingança e percebe que, para fazer com que o Dr. Lecter seja descoberto, terá que usar como isca a própria Clarice Sterling.', '2001', '6.8', '15');
INSERT INTO `movie` VALUES ('20', 'Invocação do Mal', 'Harrisville, Estados Unidos. Um casal (Ron Livinston e Lili Taylor) muda para uma casa nova ao lado de suas cinco filhas. Inexplicavelmente, estranhos acontecimentos começam a assustar as crianças, o pai e, principalmente, a mãe. Preocupada com algumas manchas que aparecem em seu corpo e com uma sequência de sustos que levou, ela decide procurar um famoso casal de investigadores paranormais (Patrick Wilson e Vera Farmiga), mas eles não aceitam o convite, acreditando ser somente mais um engano de pessoas apavoradas com canos que fazem barulhos durante a noite ou coisas do gênero. Porém, quando eles aceitam fazer uma visita ao local, descobrem que algo muito poderoso e do mal reside ali. Agora, eles precisam descobrir o que é e o porquê daquilo tudo acontecendo com os membros daquela família. É quando o passado começa a revelar uma entidade demoníaca querendo continuar sua trajetória de maldades.', '2013', '7.5', '16');
