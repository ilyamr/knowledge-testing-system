/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `answers` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `question_id` int(11) NOT NULL,
  `text` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `is_correct` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=773 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
INSERT INTO `answers` VALUES (1,1,'Yes',1,'2015-12-29 14:23:56','0000-00-00 00:00:00');
INSERT INTO `answers` VALUES (2,1,'No',0,'2015-12-29 14:23:56','0000-00-00 00:00:00');
INSERT INTO `answers` VALUES (3,2,'Wow, this is text answer!',1,'2015-12-29 14:36:05','0000-00-00 00:00:00');
INSERT INTO `answers` VALUES (4,3,'Yes',1,'2015-12-29 15:16:51','2015-12-29 15:16:51');
INSERT INTO `answers` VALUES (5,3,'No',0,'2015-12-29 15:16:51','2015-12-29 15:16:51');
INSERT INTO `answers` VALUES (6,4,'Wow, this is text answer!',1,'2015-12-29 15:16:51','2015-12-29 15:16:51');
INSERT INTO `answers` VALUES (7,5,'Yes',1,'2015-12-29 15:16:55','2015-12-29 15:16:55');
INSERT INTO `answers` VALUES (8,5,'No',0,'2015-12-29 15:16:55','2015-12-29 15:16:55');
INSERT INTO `answers` VALUES (9,6,'Wow, this is text answer!',1,'2015-12-29 15:16:55','2015-12-29 15:16:55');
INSERT INTO `answers` VALUES (64,12,'wow',1,'2016-05-26 12:49:24','2016-05-26 12:49:24');
INSERT INTO `answers` VALUES (65,12,'querty',0,'2016-05-26 12:49:24','2016-05-26 12:49:24');
INSERT INTO `answers` VALUES (275,7,'два',1,'2016-06-08 07:19:49','2016-06-08 07:19:49');
INSERT INTO `answers` VALUES (276,7,'три',0,'2016-06-08 07:19:49','2016-06-08 07:19:49');
INSERT INTO `answers` VALUES (277,7,'один',0,'2016-06-08 07:19:49','2016-06-08 07:19:49');
INSERT INTO `answers` VALUES (278,9,'1998',0,'2016-06-08 07:19:49','2016-06-08 07:19:49');
INSERT INTO `answers` VALUES (279,9,'1977',1,'2016-06-08 07:19:49','2016-06-08 07:19:49');
INSERT INTO `answers` VALUES (280,9,'1987',0,'2016-06-08 07:19:49','2016-06-08 07:19:49');
INSERT INTO `answers` VALUES (281,10,'Так',1,'2016-06-08 07:19:49','2016-06-08 07:19:49');
INSERT INTO `answers` VALUES (282,10,'Ні',0,'2016-06-08 07:19:49','2016-06-08 07:19:49');
INSERT INTO `answers` VALUES (283,11,'складності факторизації цілих чисел',1,'2016-06-08 07:19:49','2016-06-08 07:19:49');
INSERT INTO `answers` VALUES (284,11,'різниці простих чисел',0,'2016-06-08 07:19:49','2016-06-08 07:19:49');
INSERT INTO `answers` VALUES (285,11,'модульності різниці факторизації',0,'2016-06-08 07:19:49','2016-06-08 07:19:49');
INSERT INTO `answers` VALUES (286,16,'{\\displaystyle c=m^{e}{\\bmod {\\,}}n}\\ ',1,'2016-06-08 07:19:50','2016-06-08 07:19:50');
INSERT INTO `answers` VALUES (287,16,'{\\displaystyle c=m{\\bmod {\\,}}n}\\',0,'2016-06-08 07:19:50','2016-06-08 07:19:50');
INSERT INTO `answers` VALUES (288,17,'{\\displaystyle m=c^{d}{\\bmod {\\,}}n}\\',1,'2016-06-08 07:19:50','2016-06-08 07:19:50');
INSERT INTO `answers` VALUES (289,17,'{\\displaystyle m=c^{d}*n}\\',0,'2016-06-08 07:19:50','2016-06-08 07:19:50');
INSERT INTO `answers` VALUES (290,18,'{\\displaystyle c^{d} \\equiv (m^{e})^{d} \\equiv m^{ed}{\\pmod {n}}}\\',1,'2016-06-08 07:19:50','2016-06-08 07:19:50');
INSERT INTO `answers` VALUES (291,18,' {\\displaystyle c^{d} \\equiv m^{d} \\equiv m^{d}{\\pmod {n}}}\\',0,'2016-06-08 07:19:50','2016-06-08 07:19:50');
INSERT INTO `answers` VALUES (292,19,'{\\displaystyle s=d^{m}{\\bmod {\\ }}n}\\',0,'2016-06-08 07:19:50','2016-06-08 07:19:50');
INSERT INTO `answers` VALUES (293,19,'{\\displaystyle s=m^{d}{\\bmod {\\ }}n}\\',1,'2016-06-08 07:19:50','2016-06-08 07:19:50');
INSERT INTO `answers` VALUES (294,20,'{\\displaystyle m=s^{n}{\\bmod {\\ }}e}\\',0,'2016-06-08 07:19:50','2016-06-08 07:19:50');
INSERT INTO `answers` VALUES (295,20,'{\\displaystyle m=s^{e}{\\bmod {\\ }}n}\\',1,'2016-06-08 07:19:50','2016-06-08 07:19:50');
INSERT INTO `answers` VALUES (296,20,'{\\displaystyle n=m^{e}{\\bmod {\\ }}s}\\',0,'2016-06-08 07:19:50','2016-06-08 07:19:50');
INSERT INTO `answers` VALUES (297,21,'Так',1,'2016-06-08 07:19:50','2016-06-08 07:19:50');
INSERT INTO `answers` VALUES (298,21,'Ні',0,'2016-06-08 07:19:50','2016-06-08 07:19:50');
INSERT INTO `answers` VALUES (393,13,'асиметричним',0,'2016-06-08 09:51:36','2016-06-08 09:51:36');
INSERT INTO `answers` VALUES (394,13,'симетричним',1,'2016-06-08 09:51:36','2016-06-08 09:51:36');
INSERT INTO `answers` VALUES (395,22,'множити на ключ',0,'2016-06-08 09:51:36','2016-06-08 09:51:36');
INSERT INTO `answers` VALUES (396,22,'циклічно зсувати алфавіт',1,'2016-06-08 09:51:36','2016-06-08 09:51:36');
INSERT INTO `answers` VALUES (397,23,'{\\displaystyle y=(x+k)\\ mod\\ n}\\',1,'2016-06-08 09:51:36','2016-06-08 09:51:36');
INSERT INTO `answers` VALUES (398,23,'{\\displaystyle y=(x*k)\\ mod\\ n}\\',0,'2016-06-08 09:51:36','2016-06-08 09:51:36');
INSERT INTO `answers` VALUES (399,24,'{\\displaystyle x=(y-k)\\ mod\\ n}\\',1,'2016-06-08 09:51:36','2016-06-08 09:51:36');
INSERT INTO `answers` VALUES (400,24,'{\\displaystyle x=(y/k)\\ mod\\ n}\\',0,'2016-06-08 09:51:36','2016-06-08 09:51:36');
INSERT INTO `answers` VALUES (401,25,'Ні',0,'2016-06-08 09:51:36','2016-06-08 09:51:36');
INSERT INTO `answers` VALUES (402,25,'Так',1,'2016-06-08 09:51:36','2016-06-08 09:51:36');
INSERT INTO `answers` VALUES (403,26,'ROT13',1,'2016-06-08 09:51:36','2016-06-08 09:51:36');
INSERT INTO `answers` VALUES (404,26,'OPR8',0,'2016-06-08 09:51:36','2016-06-08 09:51:36');
INSERT INTO `answers` VALUES (405,26,'KEK2',0,'2016-06-08 09:51:36','2016-06-08 09:51:36');
INSERT INTO `answers` VALUES (406,27,'Шифр Кульбаки',0,'2016-06-08 09:51:36','2016-06-08 09:51:36');
INSERT INTO `answers` VALUES (407,27,'Шифр Віженера',1,'2016-06-08 09:51:36','2016-06-08 09:51:36');
INSERT INTO `answers` VALUES (408,28,'248 41 32',0,'2016-06-08 09:51:36','2016-06-08 09:51:36');
INSERT INTO `answers` VALUES (409,28,'254 41 32',1,'2016-06-08 09:51:36','2016-06-08 09:51:36');
INSERT INTO `answers` VALUES (410,29,'pqs',1,'2016-06-08 09:51:36','2016-06-08 09:51:36');
INSERT INTO `answers` VALUES (411,30,'kek',1,'2016-06-08 09:51:36','2016-06-08 09:51:36');
INSERT INTO `answers` VALUES (428,15,'17 липня 1995',0,'2016-06-08 10:10:54','2016-06-08 10:10:54');
INSERT INTO `answers` VALUES (429,15,'26 травня 2002',1,'2016-06-08 10:10:54','2016-06-08 10:10:54');
INSERT INTO `answers` VALUES (430,15,'4 жовтня 1996',0,'2016-06-08 10:10:54','2016-06-08 10:10:54');
INSERT INTO `answers` VALUES (431,31,'1995',0,'2016-06-08 10:10:54','2016-06-08 10:10:54');
INSERT INTO `answers` VALUES (432,31,'1996',0,'2016-06-08 10:10:54','2016-06-08 10:10:54');
INSERT INTO `answers` VALUES (433,31,'1998',1,'2016-06-08 10:10:54','2016-06-08 10:10:54');
INSERT INTO `answers` VALUES (434,32,'16 bit',0,'2016-06-08 10:10:54','2016-06-08 10:10:54');
INSERT INTO `answers` VALUES (435,32,'64 bit',0,'2016-06-08 10:10:54','2016-06-08 10:10:54');
INSERT INTO `answers` VALUES (436,32,'128 bit',1,'2016-06-08 10:10:54','2016-06-08 10:10:54');
INSERT INTO `answers` VALUES (437,32,'256 bit',0,'2016-06-08 10:10:54','2016-06-08 10:10:54');
INSERT INTO `answers` VALUES (438,33,'16/32/64 bit',0,'2016-06-08 10:10:54','2016-06-08 10:10:54');
INSERT INTO `answers` VALUES (439,33,'128/192/256 bit',1,'2016-06-08 10:10:54','2016-06-08 10:10:54');
INSERT INTO `answers` VALUES (440,33,'512/1024/2048 bit',0,'2016-06-08 10:10:54','2016-06-08 10:10:54');
INSERT INTO `answers` VALUES (441,34,'2/4/6',0,'2016-06-08 10:10:54','2016-06-08 10:10:54');
INSERT INTO `answers` VALUES (442,34,'10/12/14',1,'2016-06-08 10:10:54','2016-06-08 10:10:54');
INSERT INTO `answers` VALUES (443,34,'14/16/18',0,'2016-06-08 10:10:54','2016-06-08 10:10:54');
INSERT INTO `answers` VALUES (444,35,'Цезаря',0,'2016-06-08 10:10:54','2016-06-08 10:10:54');
INSERT INTO `answers` VALUES (445,35,'DES',1,'2016-06-08 10:10:54','2016-06-08 10:10:54');
INSERT INTO `answers` VALUES (446,35,'MD5',0,'2016-06-08 10:10:54','2016-06-08 10:10:54');
INSERT INTO `answers` VALUES (447,36,'Процедура обробляє кожен байт стану незалежно, проводячи нелінійну заміну байтів використовуючи таблицю замін ',1,'2016-06-08 10:10:54','2016-06-08 10:10:54');
INSERT INTO `answers` VALUES (448,36,'Процедура працює з рядками таблиці State. При цій трансформації рядка стану циклічно зсуваються на r байтів по горизонталі, залежно від номера рядка',0,'2016-06-08 10:10:54','2016-06-08 10:10:54');
INSERT INTO `answers` VALUES (449,36,'У процедурі чотири байти кожної колонки State змішуються, використовуючи для цього зворотну лінійну трансформацію',0,'2016-06-08 10:10:54','2016-06-08 10:10:54');
INSERT INTO `answers` VALUES (450,36,'У процедурі RoundKey кожного раунду об\'єднується зі State',0,'2016-06-08 10:10:54','2016-06-08 10:10:54');
INSERT INTO `answers` VALUES (451,37,'Процедура обробляє кожен байт стану незалежно, проводячи нелінійну заміну байтів використовуючи таблицю замін',0,'2016-06-08 10:10:54','2016-06-08 10:10:54');
INSERT INTO `answers` VALUES (452,37,'Процедура працює з рядками таблиці State. При цій трансформації рядка стану циклічно зсуваються на r байтів по горизонталі, залежно від номера рядка ',0,'2016-06-08 10:10:54','2016-06-08 10:10:54');
INSERT INTO `answers` VALUES (453,37,' У процедурі RoundKey кожного раунду об\'єднується зі State',0,'2016-06-08 10:10:54','2016-06-08 10:10:54');
INSERT INTO `answers` VALUES (454,37,'У процедурі чотири байти кожної колонки State змішуються, використовуючи для цього зворотну лінійну трансформацію',1,'2016-06-08 10:10:54','2016-06-08 10:10:54');
INSERT INTO `answers` VALUES (455,38,'У процедурі чотири байти кожної колонки State змішуються, використовуючи для цього зворотну лінійну трансформацію',0,'2016-06-08 10:10:54','2016-06-08 10:10:54');
INSERT INTO `answers` VALUES (456,38,'У процедурі RoundKey кожного раунду об\'єднується зі State',1,'2016-06-08 10:10:54','2016-06-08 10:10:54');
INSERT INTO `answers` VALUES (457,38,'Процедура працює з рядками таблиці State. При цій трансформації рядка стану циклічно зсуваються на r байтів по горизонталі, залежно від номера рядка',0,'2016-06-08 10:10:54','2016-06-08 10:10:54');
INSERT INTO `answers` VALUES (458,38,'Процедура обробляє кожен байт стану незалежно, проводячи нелінійну заміну байтів використовуючи таблицю замін ',0,'2016-06-08 10:10:54','2016-06-08 10:10:54');
INSERT INTO `answers` VALUES (459,39,'Процедура обробляє кожен байт стану незалежно, проводячи нелінійну заміну байтів використовуючи таблицю замін',0,'2016-06-08 10:10:54','2016-06-08 10:10:54');
INSERT INTO `answers` VALUES (460,39,'У процедурі чотири байти кожної колонки State змішуються, використовуючи для цього зворотну лінійну трансформацію',0,'2016-06-08 10:10:54','2016-06-08 10:10:54');
INSERT INTO `answers` VALUES (461,39,'Процедура працює з рядками таблиці State. При цій трансформації рядка стану циклічно зсуваються на r байтів по горизонталі, залежно від номера рядка',1,'2016-06-08 10:10:54','2016-06-08 10:10:54');
INSERT INTO `answers` VALUES (462,39,'У процедурі RoundKey кожного раунду об\'єднується зі State',0,'2016-06-08 10:10:54','2016-06-08 10:10:54');
INSERT INTO `answers` VALUES (538,49,'128 bits',0,'2016-06-08 11:13:47','2016-06-08 11:13:47');
INSERT INTO `answers` VALUES (539,49,'160 bits',1,'2016-06-08 11:13:47','2016-06-08 11:13:47');
INSERT INTO `answers` VALUES (540,49,'220 bits',0,'2016-06-08 11:13:47','2016-06-08 11:13:47');
INSERT INTO `answers` VALUES (541,50,'32',0,'2016-06-08 11:13:47','2016-06-08 11:13:47');
INSERT INTO `answers` VALUES (542,50,'64',0,'2016-06-08 11:13:47','2016-06-08 11:13:47');
INSERT INTO `answers` VALUES (543,50,'80',1,'2016-06-08 11:13:47','2016-06-08 11:13:47');
INSERT INTO `answers` VALUES (544,50,'100',0,'2016-06-08 11:13:47','2016-06-08 11:13:47');
INSERT INTO `answers` VALUES (545,51,'16 bits',0,'2016-06-08 11:13:47','2016-06-08 11:13:47');
INSERT INTO `answers` VALUES (546,51,'32 bits',1,'2016-06-08 11:13:47','2016-06-08 11:13:47');
INSERT INTO `answers` VALUES (547,51,'64 bits',0,'2016-06-08 11:13:47','2016-06-08 11:13:47');
INSERT INTO `answers` VALUES (548,51,'80 bits',0,'2016-06-08 11:13:47','2016-06-08 11:13:47');
INSERT INTO `answers` VALUES (549,52,'1998',0,'2016-06-08 11:13:47','2016-06-08 11:13:47');
INSERT INTO `answers` VALUES (550,52,'1995',1,'2016-06-08 11:13:47','2016-06-08 11:13:47');
INSERT INTO `answers` VALUES (551,52,'1993',0,'2016-06-08 11:13:47','2016-06-08 11:13:47');
INSERT INTO `answers` VALUES (552,52,'1991',0,'2016-06-08 11:13:47','2016-06-08 11:13:47');
INSERT INTO `answers` VALUES (553,53,'(b xor c) or ((not b) and d)',0,'2016-06-08 11:13:48','2016-06-08 11:13:48');
INSERT INTO `answers` VALUES (554,53,'(b or c) and ((not b) and d)',0,'2016-06-08 11:13:48','2016-06-08 11:13:48');
INSERT INTO `answers` VALUES (555,53,'(b and c) or ((not b) and d)',1,'2016-06-08 11:13:48','2016-06-08 11:13:48');
INSERT INTO `answers` VALUES (556,54,'b xor c xor d',1,'2016-06-08 11:13:48','2016-06-08 11:13:48');
INSERT INTO `answers` VALUES (557,54,'b and c and d',0,'2016-06-08 11:13:48','2016-06-08 11:13:48');
INSERT INTO `answers` VALUES (558,54,'b or c or d',0,'2016-06-08 11:13:48','2016-06-08 11:13:48');
INSERT INTO `answers` VALUES (559,55,'(b and c) or (b xor d) or (c and d) ',0,'2016-06-08 11:13:48','2016-06-08 11:13:48');
INSERT INTO `answers` VALUES (560,55,'(b and c) or (b and d) or (c and d) ',1,'2016-06-08 11:13:48','2016-06-08 11:13:48');
INSERT INTO `answers` VALUES (561,55,'(b or c) or (b and d) or (c xor d) ',0,'2016-06-08 11:13:48','2016-06-08 11:13:48');
INSERT INTO `answers` VALUES (562,56,'b xor c xor d',1,'2016-06-08 11:13:48','2016-06-08 11:13:48');
INSERT INTO `answers` VALUES (563,56,'(b and c) or ((not b) and d)',0,'2016-06-08 11:13:48','2016-06-08 11:13:48');
INSERT INTO `answers` VALUES (564,56,'(b and c) or (b and d) or (c and d) ',0,'2016-06-08 11:13:48','2016-06-08 11:13:48');
INSERT INTO `answers` VALUES (565,57,' 2 ексабайта',1,'2016-06-08 11:13:48','2016-06-08 11:13:48');
INSERT INTO `answers` VALUES (566,57,'2 терабайта',0,'2016-06-08 11:13:48','2016-06-08 11:13:48');
INSERT INTO `answers` VALUES (567,57,'2 мегабайта',0,'2016-06-08 11:13:48','2016-06-08 11:13:48');
INSERT INTO `answers` VALUES (568,58,'SHA-0',1,'2016-06-08 11:13:48','2016-06-08 11:13:48');
INSERT INTO `answers` VALUES (569,58,'SHA-2',0,'2016-06-08 11:13:48','2016-06-08 11:13:48');
INSERT INTO `answers` VALUES (570,58,'SHA-3',0,'2016-06-08 11:13:48','2016-06-08 11:13:48');
INSERT INTO `answers` VALUES (721,14,'У 1997',0,'2016-06-13 19:33:43','2016-06-13 19:33:43');
INSERT INTO `answers` VALUES (722,14,'У 1995',0,'2016-06-13 19:33:43','2016-06-13 19:33:43');
INSERT INTO `answers` VALUES (723,14,'У 1992',1,'2016-06-13 19:33:43','2016-06-13 19:33:43');
INSERT INTO `answers` VALUES (724,40,'128 bit',1,'2016-06-13 19:33:43','2016-06-13 19:33:43');
INSERT INTO `answers` VALUES (725,40,'64 bit',0,'2016-06-13 19:33:43','2016-06-13 19:33:43');
INSERT INTO `answers` VALUES (726,40,'512 bit',0,'2016-06-13 19:33:43','2016-06-13 19:33:43');
INSERT INTO `answers` VALUES (727,41,'512 bit',0,'2016-06-13 19:33:43','2016-06-13 19:33:43');
INSERT INTO `answers` VALUES (728,41,'32 bit',1,'2016-06-13 19:33:43','2016-06-13 19:33:43');
INSERT INTO `answers` VALUES (729,41,'256 bit',0,'2016-06-13 19:33:43','2016-06-13 19:33:43');
INSERT INTO `answers` VALUES (730,42,'3',0,'2016-06-13 19:33:43','2016-06-13 19:33:43');
INSERT INTO `answers` VALUES (731,42,'2',0,'2016-06-13 19:33:43','2016-06-13 19:33:43');
INSERT INTO `answers` VALUES (732,42,'4',1,'2016-06-13 19:33:43','2016-06-13 19:33:43');
INSERT INTO `answers` VALUES (733,43,'d41d8cd98f00b204e9800998ecf8427e',1,'2016-06-13 19:33:43','2016-06-13 19:33:43');
INSERT INTO `answers` VALUES (734,43,'9e107d9d372bb6826bd81d3542a419d6',0,'2016-06-13 19:33:43','2016-06-13 19:33:43');
INSERT INTO `answers` VALUES (735,43,'e4d909c290d0fb1ca068ffaddf22cbd0',0,'2016-06-13 19:33:43','2016-06-13 19:33:43');
INSERT INTO `answers` VALUES (736,44,'(B and C) or ((not B) and A)',0,'2016-06-13 19:33:43','2016-06-13 19:33:43');
INSERT INTO `answers` VALUES (737,44,'(B and C) or ((not B) and D)',1,'2016-06-13 19:33:43','2016-06-13 19:33:43');
INSERT INTO `answers` VALUES (738,44,'(A and C) or ((not B) and D)',0,'2016-06-13 19:33:43','2016-06-13 19:33:43');
INSERT INTO `answers` VALUES (739,45,'(D and B) or (D and C)',0,'2016-06-13 19:33:44','2016-06-13 19:33:44');
INSERT INTO `answers` VALUES (740,45,'(D and B) or ((not D) and C)',1,'2016-06-13 19:33:44','2016-06-13 19:33:44');
INSERT INTO `answers` VALUES (741,45,'(A and B) or ((not D) and C)',0,'2016-06-13 19:33:44','2016-06-13 19:33:44');
INSERT INTO `answers` VALUES (742,46,'B or C or D',0,'2016-06-13 19:33:44','2016-06-13 19:33:44');
INSERT INTO `answers` VALUES (743,46,'B xor D xor A',0,'2016-06-13 19:33:44','2016-06-13 19:33:44');
INSERT INTO `answers` VALUES (744,46,'B xor C xor D',1,'2016-06-13 19:33:44','2016-06-13 19:33:44');
INSERT INTO `answers` VALUES (745,47,'D xor (A and B)',0,'2016-06-13 19:33:44','2016-06-13 19:33:44');
INSERT INTO `answers` VALUES (746,47,'D and A',0,'2016-06-13 19:33:44','2016-06-13 19:33:44');
INSERT INTO `answers` VALUES (747,47,'C xor (B or (not D))',1,'2016-06-13 19:33:44','2016-06-13 19:33:44');
INSERT INTO `answers` VALUES (748,48,'2012',0,'2016-06-13 19:33:44','2016-06-13 19:33:44');
INSERT INTO `answers` VALUES (749,48,'2013',1,'2016-06-13 19:33:44','2016-06-13 19:33:44');
INSERT INTO `answers` VALUES (750,48,'2006',0,'2016-06-13 19:33:44','2016-06-13 19:33:44');
INSERT INTO `answers` VALUES (763,61,'12',0,'2017-06-15 06:26:41','2017-06-15 06:26:41');
INSERT INTO `answers` VALUES (764,61,'3123',1,'2017-06-15 06:26:41','2017-06-15 06:26:41');
INSERT INTO `answers` VALUES (765,61,'1232134',1,'2017-06-15 06:26:41','2017-06-15 06:26:41');
INSERT INTO `answers` VALUES (766,61,'5123',0,'2017-06-15 06:26:41','2017-06-15 06:26:41');
INSERT INTO `answers` VALUES (767,61,'1233',0,'2017-06-15 06:26:41','2017-06-15 06:26:41');
INSERT INTO `answers` VALUES (768,62,'Yes',1,'2017-06-15 06:26:41','2017-06-15 06:26:41');
INSERT INTO `answers` VALUES (769,62,'No',0,'2017-06-15 06:26:41','2017-06-15 06:26:41');
INSERT INTO `answers` VALUES (770,63,'3',0,'2017-06-15 06:26:41','2017-06-15 06:26:41');
INSERT INTO `answers` VALUES (771,63,'4',1,'2017-06-15 06:26:41','2017-06-15 06:26:41');
INSERT INTO `answers` VALUES (772,63,'5',0,'2017-06-15 06:26:41','2017-06-15 06:26:41');
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
INSERT INTO `migrations` VALUES ('2014_10_12_000000_create_users_table',1);
INSERT INTO `migrations` VALUES ('2014_10_12_100000_create_password_resets_table',1);
INSERT INTO `migrations` VALUES ('2015_12_28_195910_create_topic_table',1);
INSERT INTO `migrations` VALUES ('2015_12_28_195934_create_question_table',1);
INSERT INTO `migrations` VALUES ('2015_12_28_200000_create_answer_table',1);
INSERT INTO `migrations` VALUES ('2016_01_05_121708_add_slug_to_topics',2);
INSERT INTO `migrations` VALUES ('2016_05_13_105603_create_tags_table',3);
INSERT INTO `migrations` VALUES ('2016_05_15_193608_create_users_table',3);
INSERT INTO `migrations` VALUES ('2016_06_07_081153_modify_users_table',4);
INSERT INTO `migrations` VALUES ('2016_06_13_191840_add_image_to_questions',5);
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  KEY `password_resets_email_index` (`email`),
  KEY `password_resets_token_index` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `question_tags` (
  `question_id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
INSERT INTO `question_tags` VALUES (14,2);
INSERT INTO `question_tags` VALUES (7,4);
INSERT INTO `question_tags` VALUES (9,4);
INSERT INTO `question_tags` VALUES (11,4);
INSERT INTO `question_tags` VALUES (16,5);
INSERT INTO `question_tags` VALUES (17,5);
INSERT INTO `question_tags` VALUES (18,5);
INSERT INTO `question_tags` VALUES (19,5);
INSERT INTO `question_tags` VALUES (20,5);
INSERT INTO `question_tags` VALUES (21,6);
INSERT INTO `question_tags` VALUES (10,6);
INSERT INTO `question_tags` VALUES (13,4);
INSERT INTO `question_tags` VALUES (22,4);
INSERT INTO `question_tags` VALUES (23,5);
INSERT INTO `question_tags` VALUES (24,5);
INSERT INTO `question_tags` VALUES (25,4);
INSERT INTO `question_tags` VALUES (26,4);
INSERT INTO `question_tags` VALUES (27,4);
INSERT INTO `question_tags` VALUES (28,7);
INSERT INTO `question_tags` VALUES (29,7);
INSERT INTO `question_tags` VALUES (30,7);
INSERT INTO `question_tags` VALUES (15,2);
INSERT INTO `question_tags` VALUES (31,2);
INSERT INTO `question_tags` VALUES (32,4);
INSERT INTO `question_tags` VALUES (33,4);
INSERT INTO `question_tags` VALUES (34,4);
INSERT INTO `question_tags` VALUES (35,2);
INSERT INTO `question_tags` VALUES (36,4);
INSERT INTO `question_tags` VALUES (37,4);
INSERT INTO `question_tags` VALUES (38,4);
INSERT INTO `question_tags` VALUES (39,4);
INSERT INTO `question_tags` VALUES (40,4);
INSERT INTO `question_tags` VALUES (41,4);
INSERT INTO `question_tags` VALUES (42,4);
INSERT INTO `question_tags` VALUES (43,4);
INSERT INTO `question_tags` VALUES (44,4);
INSERT INTO `question_tags` VALUES (45,4);
INSERT INTO `question_tags` VALUES (46,4);
INSERT INTO `question_tags` VALUES (47,4);
INSERT INTO `question_tags` VALUES (48,2);
INSERT INTO `question_tags` VALUES (49,4);
INSERT INTO `question_tags` VALUES (50,4);
INSERT INTO `question_tags` VALUES (51,4);
INSERT INTO `question_tags` VALUES (52,2);
INSERT INTO `question_tags` VALUES (53,4);
INSERT INTO `question_tags` VALUES (54,4);
INSERT INTO `question_tags` VALUES (55,4);
INSERT INTO `question_tags` VALUES (56,4);
INSERT INTO `question_tags` VALUES (57,4);
INSERT INTO `question_tags` VALUES (58,2);
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `questions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `question` text COLLATE utf8_unicode_ci NOT NULL,
  `topic_id` int(11) NOT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=64 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
INSERT INTO `questions` VALUES (3,'Hello, haow are you?!',0,'single','','2015-12-29 15:16:51','2015-12-29 15:16:51');
INSERT INTO `questions` VALUES (4,'This is text question!',0,'text','','2015-12-29 15:16:51','2015-12-29 15:16:51');
INSERT INTO `questions` VALUES (5,'Hello, haow are you?!',0,'single','','2015-12-29 15:16:55','2015-12-29 15:16:55');
INSERT INTO `questions` VALUES (6,'This is text question!',0,'text','','2015-12-29 15:16:55','2015-12-29 15:16:55');
INSERT INTO `questions` VALUES (7,'Скільки ключів використовуються при роботі?',3,'single','','2016-06-08 09:58:17','2016-06-08 06:58:17');
INSERT INTO `questions` VALUES (9,'Коли була опублікована перша згадка про RSA?',3,'single','','2016-06-08 09:58:17','2016-06-08 06:58:17');
INSERT INTO `questions` VALUES (10,'Алгоритм RSA набагато повільніше, ніж DES і алгоритмів блокового шифрування. Це твердження вірне?',3,'single','','2016-06-08 10:17:46','2016-06-08 07:17:46');
INSERT INTO `questions` VALUES (11,'Безпека алгоритму RSA побудована на принципі:',3,'single','','2015-12-29 15:26:15','2015-12-29 15:26:15');
INSERT INTO `questions` VALUES (13,'По симетричності шифр Цезаря є:',5,'single','','2016-06-08 11:24:44','2016-06-08 08:24:44');
INSERT INTO `questions` VALUES (14,'Коли було створено алгоритм?',4,'single','0','2016-06-13 19:33:43','2016-06-13 19:33:43');
INSERT INTO `questions` VALUES (15,'Коли було оголошено інформацію про те, що AES став стандартом шифрування?',6,'single','','2016-06-08 13:01:15','2016-06-08 10:01:15');
INSERT INTO `questions` VALUES (16,'Для того, щоб зашифрувати повідомлення {\\displaystyle m<n\\,}\\ обчислюється число {\\displaystyle c\\,}\\, яке використовується в якості шифротексту:',3,'single','','2016-06-08 10:08:29','2016-06-08 07:08:29');
INSERT INTO `questions` VALUES (17,'Повідомлення розшифровується за такою формулою:',3,'single','','2016-06-08 07:04:51','2016-06-08 07:04:51');
INSERT INTO `questions` VALUES (18,'При розшифруванні вихідне повідомлення відновлюється за формулою:',3,'single','','2016-06-08 10:11:57','2016-06-08 07:11:57');
INSERT INTO `questions` VALUES (19,'RSA може використовуватися не тільки для шифрування, але й для цифрового підпису. Підпис {\\displaystyle s\\,}\\  повідомлення {\\displaystyle m\\,}\\  обчислюється з використанням секретного ключа за формулою:',3,'single','','2016-06-08 07:11:57','2016-06-08 07:11:57');
INSERT INTO `questions` VALUES (20,'RSA може використовуватися не тільки для шифрування, але й для цифрового підпису. Підпис {\\displaystyle s\\,}\\ повідомлення {\\displaystyle m\\,}\\ обчислюється з використанням секретного ключа. Для перевірки правильності підпису потрібно переконатися, що виконується рівність:',3,'single','','2016-06-08 10:19:50','2016-06-08 07:19:50');
INSERT INTO `questions` VALUES (21,'Знайти секретний (private) ключ, відповідний необхідному відкритому (public) ключу. Це дозволить нападнику читати всі повідомлення, зашифровані відкритим (public) ключем і підробляти підписи. Це твердження вірне?',3,'single','','2016-06-08 07:15:12','2016-06-08 07:15:12');
INSERT INTO `questions` VALUES (22,'Принцип дії полягає в тому, щоб:',5,'single','','2016-06-08 08:24:44','2016-06-08 08:24:44');
INSERT INTO `questions` VALUES (23,'Якщо зіставити кожному символу алфавіту його порядковий номер (нумеруючи з 0), то шифрування можна виразити формулами (якщо де {\\displaystyle ~x}\\  — символ відкритого тексту, {\\displaystyle ~y}\\  — символ шифрованого тексту, {\\displaystyle ~n}\\  — потужність алфавіту, а {\\displaystyle ~k}\\  — ключ):',5,'single','','2016-06-08 11:30:27','2016-06-08 08:30:27');
INSERT INTO `questions` VALUES (24,'Якщо зіставити кожному символу алфавіту його порядковий номер (нумеруючи з 0), то дешифрування можна виразити формулами (якщо де {\\displaystyle ~x}\\  — символ відкритого тексту, {\\displaystyle ~y}\\  — символ шифрованого тексту, {\\displaystyle ~n}\\  — потужність алфавіту, а {\\displaystyle ~k}\\  — ключ):',5,'single','','2016-06-08 11:30:27','2016-06-08 08:30:27');
INSERT INTO `questions` VALUES (25,'Шифр Цезаря може бути легко взламаний, навіть коли людина знає тільки текст. Вірно? ',5,'single','','2016-06-08 08:47:03','2016-06-08 08:47:03');
INSERT INTO `questions` VALUES (26,'В якому сучасному алгоритмі використовується шифр Цезаря?',5,'single','','2016-06-08 08:47:03','2016-06-08 08:47:03');
INSERT INTO `questions` VALUES (27,'В якому сучасному шифрі використовується шифр Цезаря?',5,'single','','2016-06-08 08:47:03','2016-06-08 08:47:03');
INSERT INTO `questions` VALUES (28,'Ключ - 3. Повідомлення з кодом символів: 251 38 29. Які коди символів будуть у зашифрованого повідомлення?',5,'single','','2016-06-08 08:49:54','2016-06-08 08:49:54');
INSERT INTO `questions` VALUES (29,'Код - 2. Потрібно зашифрувати повідомлення \"ron\".',5,'text','','2016-06-08 08:49:54','2016-06-08 08:49:54');
INSERT INTO `questions` VALUES (30,'Ключ - 3. Отримане повідомлення \"nhn\". Розшифруйте повідомлення.',5,'text','','2016-06-08 08:52:01','2016-06-08 08:52:01');
INSERT INTO `questions` VALUES (31,'В якому році був створений AES?',6,'single','','2016-06-08 10:01:15','2016-06-08 10:01:15');
INSERT INTO `questions` VALUES (32,'Який розмір блока в AES?',6,'single','','2016-06-08 10:01:15','2016-06-08 10:01:15');
INSERT INTO `questions` VALUES (33,'Які стандартні розміри ключа для даного алгоритму?',6,'single','','2016-06-08 10:01:15','2016-06-08 10:01:15');
INSERT INTO `questions` VALUES (34,'Яке число раундів перетворення інформації в AES?',6,'single','','2016-06-08 10:01:15','2016-06-08 10:01:15');
INSERT INTO `questions` VALUES (35,'Який шифр був попереднім стандартом шифрування до AES?',6,'single','','2016-06-08 10:10:54','2016-06-08 10:10:54');
INSERT INTO `questions` VALUES (36,'Що робить процедура subBytes()?',6,'single','','2016-06-08 10:10:54','2016-06-08 10:10:54');
INSERT INTO `questions` VALUES (37,'Що робить процедура mixColumns()?',6,'single','','2016-06-08 10:10:54','2016-06-08 10:10:54');
INSERT INTO `questions` VALUES (38,'Що робить процедура addRoundKey()?',6,'single','','2016-06-08 10:10:54','2016-06-08 10:10:54');
INSERT INTO `questions` VALUES (39,'Що робить процедура shiftRows()?',6,'single','','2016-06-08 10:10:54','2016-06-08 10:10:54');
INSERT INTO `questions` VALUES (40,'Який розмір дайджеста на виході у цього алгоритму хешування?',4,'single','','2016-06-08 10:50:34','2016-06-08 10:50:34');
INSERT INTO `questions` VALUES (41,'Блоги якого розміру обробляються алгоритмом циклічно?',4,'single','','2016-06-08 10:50:34','2016-06-08 10:50:34');
INSERT INTO `questions` VALUES (42,'Скільки різних функцій оброблюють один блок даних?',4,'single','','2016-06-08 10:50:34','2016-06-08 10:50:34');
INSERT INTO `questions` VALUES (43,'Який з цих дайджестів вийде, якщо хешувати порожній рядок?',4,'single','','2016-06-08 10:50:34','2016-06-08 10:50:34');
INSERT INTO `questions` VALUES (44,'Значення F на i[0, 15] ітерації обчислюється за формулою:',4,'single','','2016-06-08 10:50:34','2016-06-08 10:50:34');
INSERT INTO `questions` VALUES (45,'Значення F на i[16, 31] ітерації обчислюється за формулою:',4,'single','','2016-06-08 10:50:34','2016-06-08 10:50:34');
INSERT INTO `questions` VALUES (46,'Значення F на i[32, 47] ітерації обчислюється за формулою: ',4,'single','','2016-06-08 10:50:34','2016-06-08 10:50:34');
INSERT INTO `questions` VALUES (47,'Значення F на i[48, 63] ітерації обчислюється за формулою:',4,'single','','2016-06-08 10:50:34','2016-06-08 10:50:34');
INSERT INTO `questions` VALUES (48,'В якому році знайшли алгоритм, що знаходить колізі MD5 на звичайному комп’ютері менше, аніж за секунду? ',4,'single','','2016-06-08 10:50:34','2016-06-08 10:50:34');
INSERT INTO `questions` VALUES (49,'Який розмір дайджеста для цього алгоритма?',2,'single','','2016-06-08 11:02:47','2016-06-08 11:02:47');
INSERT INTO `questions` VALUES (50,'Скільки раундів у цьому алгоритмі?',2,'single','','2016-06-08 11:02:47','2016-06-08 11:02:47');
INSERT INTO `questions` VALUES (51,'Який розмір слова(word), що проходить циклічну обробку?',2,'single','','2016-06-08 11:02:47','2016-06-08 11:02:47');
INSERT INTO `questions` VALUES (52,'Коли була опублікована специфікація алгоритму?',2,'single','','2016-06-08 11:02:47','2016-06-08 11:02:47');
INSERT INTO `questions` VALUES (53,'При 0 ≤ i ≤ 19 значення $f$ обчислюється за формулою:',2,'single','','2016-06-08 11:02:47','2016-06-08 11:02:47');
INSERT INTO `questions` VALUES (54,'При 20 ≤ i ≤ 39 значення $f$ обчислюється за формулою: ',2,'single','','2016-06-08 11:08:54','2016-06-08 11:08:54');
INSERT INTO `questions` VALUES (55,'При 40 ≤ i ≤ 59 значення $f$ обчислюється за формулою: ',2,'single','','2016-06-08 11:08:54','2016-06-08 11:08:54');
INSERT INTO `questions` VALUES (56,'При 60 ≤ i ≤ 79 значення $f$ обчислюється за формулою: ',2,'single','','2016-06-08 11:08:54','2016-06-08 11:08:54');
INSERT INTO `questions` VALUES (57,'Яка максимальна довжина повідомлення, що може хешуватися?',2,'single','','2016-06-08 11:13:48','2016-06-08 11:13:48');
INSERT INTO `questions` VALUES (58,'Попередником цього алгоритму був:',2,'single','','2016-06-08 11:13:48','2016-06-08 11:13:48');
INSERT INTO `questions` VALUES (59,'Вывести список сотрудников, получающих заработную плату большую чем у непосредственного руководителя\n',8,'text','http://localhost:8080/uploads/e3592e4c.png','2017-06-15 06:10:53','2017-06-15 06:10:53');
INSERT INTO `questions` VALUES (60,'TEST',9,'text','0','2017-06-15 06:11:52','2017-06-15 06:11:52');
INSERT INTO `questions` VALUES (61,'afsasf?',10,'multi','0','2017-06-15 06:22:47','2017-06-15 06:22:47');
INSERT INTO `questions` VALUES (62,'1+1 = 2?',10,'single','0','2017-06-15 06:26:02','2017-06-15 06:26:02');
INSERT INTO `questions` VALUES (63,'2+2',10,'single','0','2017-06-15 06:26:41','2017-06-15 06:26:41');
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tags` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
INSERT INTO `tags` VALUES (1,'simple','2016-05-26 12:49:40','2016-05-26 12:49:40');
INSERT INTO `tags` VALUES (2,'history','2016-06-01 08:12:04','2016-06-01 08:12:04');
INSERT INTO `tags` VALUES (3,'asd','2016-06-05 14:18:43','2016-06-05 14:18:43');
INSERT INTO `tags` VALUES (4,'general','2016-06-08 06:58:17','2016-06-08 06:58:17');
INSERT INTO `tags` VALUES (5,'math','2016-06-08 07:03:19','2016-06-08 07:03:19');
INSERT INTO `tags` VALUES (6,'bool','2016-06-08 07:15:12','2016-06-08 07:15:12');
INSERT INTO `tags` VALUES (7,'practice','2016-06-08 08:49:54','2016-06-08 08:49:54');
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `topics` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
INSERT INTO `topics` VALUES (1,'Qui excepturi quibusdam asperiores.','Cum consequatur tempore rerum vero corporis voluptas officia. Cum unde nihil rerum consequatur pariatur. Maiores vero perferendis id est labore corrupti velit.','2015-12-29 01:14:38','0000-00-00 00:00:00','');
INSERT INTO `topics` VALUES (2,'SHA-1','# SHA-1\r\n\r\nSecure Hash Algorithm 1 — алгоритм криптографического хеширования. Описан в RFC 3174. Для входного сообщения произвольной длины (максимум {\\displaystyle 2^{64}-1}\\  бит, что примерно равно 2 эксабайта) алгоритм генерирует 160-битное хеш-значение, называемое также дайджестом сообщения. Используется во многих криптографических приложениях и протоколах. Также рекомендован в качестве основного для государственных учреждений в США. Принципы, положенные в основу SHA-1, аналогичны тем, которые использовались Рональдом Ривестом при проектировании MD4.\r\n\r\n### История\r\nВ 1993 году NSA совместно с NIST разработали алгоритм безопасного хеширования (сейчас известный как SHA-0) (опубликован в документе FIPS PUB 180) для стандарта безопасного хеширования. Однако вскоре NSA отозвало данную версию, сославшись на обнаруженную ими ошибку, которая так и не была раскрыта. И заменило его исправленной версией, опубликованной в 1995 году в документе FIPS PUB 180-1. Эта версия и считается тем, что называют SHA-1. Позже, на конференции CRYPTO в 1998 году два французских исследователя представили атаку на алгоритм SHA-0, которая не работала на алгоритме SHA-1 Возможно, это и была ошибка, открытая NSA.\r\n\r\n### Описание алгоритма\r\nОдна итерация алгоритма SHA1  \r\nSHA-1 реализует хеш-функцию, построенную на идее функции сжатия. Входами функции сжатия являются блок сообщения длиной 512 бит и выход предыдущего блока сообщения. Выход представляет собой значение всех хеш-блоков до этого момента. Иными словами хеш блока {\\displaystyle M_{i}}\\  равен {\\displaystyle h_{i}=f(M_{i},h_{i-1})}\\ . Хеш-значением всего сообщения является выход последнего блока.\r\n\r\n### Инициализация\r\nИсходное сообщение разбивается на блоки по 512 бит в каждом. Последний блок дополняется до длины, кратной 512 бит. Сначала добавляется 1 (бит), а потом нули, чтобы длина блока стала равной (512 - 64 = 448) бит. В оставшиеся 64 бита записывается длина исходного сообщения в битах (в big-endian формате). Если последний блок имеет длину более 448, но менее 512 бит, то дополнение выполняется следующим образом: сначала добавляется 1 (бит), затем нули вплоть до конца 512-битного блока; после этого создается ещё один 512-битный блок, который заполняется вплоть до 448 бит нулями, после чего в оставшиеся 64 бита записывается длина исходного сообщения в битах (в little-endian формате). Дополнение последнего блока осуществляется всегда, даже если сообщение уже имеет нужную длину.\r\n\r\nИнициализируются пять 32-битовых переменных.\r\n```\r\nA = a = 0x67452301\r\nB = b = 0xEFCDAB89\r\nC = c = 0x98BADCFE\r\nD = d = 0x10325476\r\nE = e = 0xC3D2E1F0\r\n```\r\nОпределяются четыре нелинейные операции и четыре константы.  \r\n{\\displaystyle F_{t}(m,l,k)=(m\\wedge l)\\vee (\\neg {m} \\wedge k)}\\\r\n{\\displaystyle K_{t}}\\  = 0x5A827999 $0≤t≤19$   \r\n{\\displaystyle F_{t}(m,l,k)=m\\oplus l\\oplus k}\\\r\n{\\displaystyle K_{t}}\\  = 0x6ED9EBA1 $20≤t≤39$  \r\n{\\displaystyle F_{t}(m,l,k)=(m\\wedge l)\\vee (m\\wedge k)\\vee (l\\wedge k)}\\ 	{\\displaystyle K_{t}}\\  = 0x8F1BBCDC	$40≤t≤59$  \r\n{\\displaystyle F_{t}(m,l,k)=m\\oplus l\\oplus k}\\ 	{\\displaystyle K_{t}}\\  = 0xCA62C1D6	60≤t≤79\r\n\r\n### Главный цикл\r\nГлавный цикл итеративно обрабатывает каждый 512-битный блок. Итерация состоит из четырех этапов по двадцать операций в каждом. Блок сообщения преобразуется из 16 32-битовых слов {\\displaystyle M_{i}}\\  в 80 32-битовых слов {\\displaystyle W_{j}}\\.\r\n\r\n### Псевдокод SHA-1\r\nПсевдокод алгоритма SHA-1 следующий:\r\n\r\n```\r\nЗамечание: Все используемые переменные 32 бита.\r\n\r\nИнициализация переменных:\r\nh0 = 0x67452301\r\nh1 = 0xEFCDAB89\r\nh2 = 0x98BADCFE\r\nh3 = 0x10325476\r\nh4 = 0xC3D2E1F0\r\n\r\nПредварительная обработка:\r\nПрисоединяем бит \'1\' к сообщению\r\nПрисоединяем k битов \'0\', где k наименьшее число ≥ 0 такое, что длина получившегося сообщения\r\n(в битах) сравнима по модулю  512 с 448 (length mod 512 == 448)\r\nДобавляем длину исходного сообщения (до предварительной обработки) как целое 64-битное\r\nBig-endian число, в битах.\r\n\r\nВ процессе сообщение разбивается последовательно по 512 бит:\r\nfor перебираем все такие части\r\n    разбиваем этот кусок на 16 частей, слов по 32-бита w[i], 0 <= i <= 15\r\n\r\n    16 слов по 32-бита дополняются до 80 32-битовых слов:\r\n    for i from 16 to 79\r\n        w[i] = (w[i-3] xor w[i-8] xor w[i-14] xor w[i-16]) циклический сдвиг влево 1\r\n\r\n    Инициализация хеш-значений этой части:\r\n    a = h0\r\n    b = h1\r\n    c = h2\r\n    d = h3\r\n    e = h4\r\n\r\n    Основной цикл:\r\n    for i from 0 to 79\r\n        if 0 ≤ i ≤ 19 then\r\n            f = (b and c) or ((not b) and d)\r\n            k = 0x5A827999\r\n        else if 20 ≤ i ≤ 39 then\r\n            f = b xor c xor d\r\n            k = 0x6ED9EBA1\r\n        else if 40 ≤ i ≤ 59 then\r\n            f = (b and c) or (b and d) or (c and d)\r\n            k = 0x8F1BBCDC\r\n        else if 60 ≤ i ≤ 79 then\r\n            f = b xor c xor d\r\n            k = 0xCA62C1D6\r\n\r\n        temp = (a leftrotate 5) + f + e + k + w[i]\r\n        e = d\r\n        d = c\r\n        c = b leftrotate 30\r\n        b = a\r\n        a = temp\r\n\r\n    Добавляем хеш-значение этой части к результату:\r\n    h0 = h0 + a\r\n    h1 = h1 + b \r\n    h2 = h2 + c\r\n    h3 = h3 + d\r\n    h4 = h4 + e\r\n```\r\n\r\nИтоговое хеш-значение:\r\ndigest = hash = h0 append h1 append h2 append h3 append h4\r\nВместо оригинальной формулировки FIPS PUB 180-1 приведены следующие эквивалентные выражения и могут быть использованы на компьютере f в главном цикле:\r\n```\r\n(0  ≤ i ≤ 19): f = d xor (b and (c xor d))                (альтернатива 1)\r\n(0  ≤ i ≤ 19): f = (b and c) xor ((not b) and d)          (альтернатива 2)\r\n(0  ≤ i ≤ 19): f = (b and c) + ((not b) and d)            (альтернатива 3)\r\n \r\n(40 ≤ i ≤ 59): f = (b and c) or (d and (b or c))          (альтернатива 1)\r\n(40 ≤ i ≤ 59): f = (b and c) or (d and (b xor c))         (альтернатива 2)\r\n(40 ≤ i ≤ 59): f = (b and c) + (d and (b xor c))          (альтернатива 3)\r\n(40 ≤ i ≤ 59): f = (b and c) xor (b and d) xor (c and d)  (альтернатива 4)\r\n```\r\n\r\n### Примеры\r\nНиже приведены примеры хешей SHA-1. Для всех сообщений подразумевается использование кодировки UTF-8.\r\n\r\nХеш панграммы на русском:\r\n```\r\nSHA-1(\"В чащах юга жил бы цитрус? Да, но фальшивый экземпляр!\")\r\n  = 9e32295f 8225803b b6d5fdfc c0674616 a4413c1b\r\n```\r\n\r\nХеш панграммы на английском:\r\n```\r\nSHA-1(\"The quick brown fox jumps over the lazy dog\") \r\n  = 2fd4e1c6 7a2d28fc ed849ee1 bb76e739 1b93eb12\r\n```\r\n```\r\nSHA-1(\"sha\")\r\n  = d8f45903 20e1343a 915b6394 170650a8 f35d6926\r\n```\r\n\r\nНебольшое изменение исходного текста (одна буква в верхнем регистре) приводит к сильному изменению самого хеша. Это происходит вследствие лавинного эффекта.\r\n\r\n```\r\nSHA-1(\"Sha\") \r\n  = ba79baeb 9f10896a 46ae7471 5271b7f5 86e74640\r\n```\r\n\r\nДаже для пустой строки вычисляется нетривиальное хеш-значение.\r\n```\r\nSHA-1(\"\") \r\n  = da39a3ee 5e6b4b0d 3255bfef 95601890 afd80709\r\n```\r\n### Криптоанализ\r\nКриптоанализ хеш-функций направлен на исследование уязвимости к различного вида атакам. Основные из них:\r\n* нахождение коллизий — ситуация, когда двум различным исходным сообщениям соответствует одно и то же хеш-значение.\r\n* нахождение прообраза — исходного сообщения — по его хешу.\r\n\r\nПри решении методом «грубой силы»:\r\n* вторая задача требует 2160 операций.\r\n* первая же требует в среднем 2160/2 = 280 операций, если использовать атаку Дней рождения.\r\n\r\nОт устойчивости хеш-функции к нахождению коллизий зависит безопасность электронной цифровой подписи с использованием данного хеш-алгоритма. От устойчивости к нахождению прообраза зависит безопасность хранения хешей паролей для целей аутентификации.\r\n\r\nВ январе 2005 года Vincent Rijmen и Elisabeth Oswald опубликовали сообщение об атаке на усечённую версию SHA-1 (53 раунда вместо 80), которая позволяет находить коллизии меньше, чем за 280 операций.\r\n\r\nВ феврале 2005 года Сяоюнь Ван, Ицюнь Лиза Инь и Хунбо Юй (Xiaoyun Wang, Yiqun Lisa Yin, Hongbo Yu) представили атаку на полноценный SHA-1, которая требует менее 269 операций.\r\n\r\nО методе авторы пишут:\r\n\r\nМы представляем набор стратегий и соответствующих методик, которые могут быть использованы для устранения некоторых важных препятствий в поиске коллизий в SHA-1. Сначала мы ищем близкие к коллизии дифференциальные пути, которые имеют небольшой «вес Хамминга» в «векторе помех», где каждый 1-бит представляет 6-шаговую локальную коллизию. Потом мы соответствующим образом корректируем дифференциальный путь из первого этапа до другого приемлемого дифференциального пути, чтобы избежать неприемлемых последовательных и усеченных коллизий. В конце концов мы преобразуем два одноблоковых близких к коллизии дифференциальных пути в один двухблоковый коллизионный путь с удвоенной вычислительной сложностью.\r\n\r\nТакже они заявляют:\r\n\r\nВ частности, наш анализ основан на оригинальной дифференциальной атаке на SHA-0, «near-collision» атаке на SHA-0, мультиблоковой методике, а также методикам модификации исходного сообщения, использованных при атаках поиска коллизий на HAVAL-128, MD4, RIPEMD и MD5.\r\n\r\nСтатья с описанием алгоритма была опубликована в августе 2005 года на конференции CRYPTO.\r\n\r\nВ этой же статье авторы опубликовали атаку на усечённый SHA-1 (58 раундов), которая позволяет находить коллизии за 233 операций.\r\n\r\nВ августе 2005 года на CRYPTO 2005 эти же специалисты представили улучшенную версию атаки на полноценный SHA-1, с вычислительной сложностью в 263 операций. В декабре 2007 года детали этого улучшения были проверены Мартином Кохраном.\r\n\r\nКристоф де Каньер и Кристиан Рехберг позже представили усовершенствованную версию атаки на SHA-1, за что были удостоены награды за лучшую статью на конференции ASIACRYPT 2006. Ими была представлена двух-блоковая коллизия на 64-раундовый алгоритм с вычислительной сложностью около 235 операций.\r\n\r\nСуществует масштабный исследовательский проект, стартовавший в технологическом университете австрийского города Грац, который : «… использует компьютеры, соединенные через Интернет, для проведения исследований в области криптоанализа. Вы можете поучаствовать в проекте загрузив и запустив бесплатную программу на своем компьютере.»\r\n\r\nХотя теоретически SHA-1 считается взломанным (количество вычислительных операций сокращено в 280-63 = 131 000 раз), на практике подобный взлом неосуществим, так как займёт пять миллиардов лет.\r\n\r\nБурт Калински, глава исследовательского отдела в «лаборатории RSA» предсказывает, что первая атака по нахождению прообраза будет успешно осуществлена в ближайшие 5—10 лет.\r\n\r\nВвиду того, что теоретические атаки на SHA-1 оказались успешными, NIST планирует полностью отказаться от использования SHA-1 в цифровых подписях.\r\n\r\nИз-за блочной и итеративной структуры алгоритмов, а также отсутствия специальной обработки в конце хеширования, все хеш-функции семейства SHA уязвимы к атакам удлинением сообщения и коллизии при частичном хешировании сообщения. Эти атаки позволяют подделывать сообщения, подписанные только хешем — {\\displaystyle SHA(message||key)}\\  или {\\displaystyle SHA(key||message)}\\  — путём удлинения сообщения и пересчёту хеша без знания значения ключа. Простейшим исправлением, позволяющим защититься от этих атак, является двойное хеширование — {\\displaystyle SHA_{d}(message)=SHA(SHA(0^{b}||message))}\\  ( {\\displaystyle 0^{b}}\\  — блок нулей той же длины, что и блок хеш-функции).\r\n\r\n2 ноября 2007 года NIST анонсировало конкурс по разработке нового алгоритма SHA-3, который продлился до 2012 года.\r\n\r\n### SHAppening\r\n8 октября Marc Stevens, Pierre Karpman, и Thomas Peyrin опубликовали атаку на функцию сжатия алгоритма SHA 1, которая требует всего 257 вычислений.','2016-06-07 09:53:18','2016-06-07 06:53:18','sha1');
INSERT INTO `topics` VALUES (3,'RSA','# RSA\r\n\r\n`RSA` — криптографічна система з відкритим ключем.\r\n\r\nRSA став першим алгоритмом такого типу, придатним і для шифрування і для цифрового підпису. Алгоритм використовується у великій кількості криптографічних застосунків.\r\n\r\n#### Зміст \r\n- Історія\r\n- Опис алгоритму\r\n - Генерування ключів\r\n - Шифрування й розшифрування\r\n  -  Цифровий підпис\r\n- Деякі особливості алгоритму\r\n - Генерація простих чисел\r\n - Доповнення повідомлень\r\n - Вибір значення відкритого показника\r\n - Вибір значення секретного показника\r\n- Довжина ключа\r\n- Застосування RSA\r\n\r\n## Історія\r\nОпис RSA було опубліковано у 1977 році Рональдом Райвестом, Аді Шаміром і Леонардом Адлеманом з Масачусетського Технологічного Інституту (MIT).\r\n\r\nБританський математик Кліфорд Кокс (Clifford Cocks), що працював в центрі урядового зв\'язку (GCHQ) Великобританії, описав аналогічну систему в 1973 році у внутрішніх документах центру, але ця робота не була розкрита до 1997 року, тож Райвест, Шамір і Адлеман розробили RSA незалежно від роботи Кокса.\r\n\r\nВ 1983 році був виданий патент 4405829 США, термін дії якого минув 21 вересня 2000 року.\r\n\r\n# Опис алгоритму\r\n    Вікіпідручник має книгу на тему\r\n    Розв\'язник вправ по дискретній математиці/Кодування/Алгоритм RSA\r\n\r\nБезпека алгоритму RSA побудована на принципі складності факторизації цілих чисел. Алгоритм використовує два ключі — відкритий (public) і секретний (private), разом відкритий і відповідний йому секретний ключі утворюють пари ключів (keypair). Відкритий ключ не потрібно зберігати в таємниці, він використовується для шифрування даних. Якщо повідомлення було зашифровано відкритим ключем, то розшифрувати його можна тільки відповідним секретним ключем.\r\n\r\n### Генерування ключів\r\nДля того, щоб згенерувати пари ключів виконуються такі дії:\r\n\r\n- вибираються два великі прості числа $p$, і $q$, приблизно 512 біт завдовжки кожне\r\n- обчислюється їх добуток ${n=pq}$,\r\n- обчислюється функція Ейлера $\\varphi(n)=(p-1)(q-1)$\r\n- вибирається ціле $e$, таке, що $1<e<\\varphi(n)$ та $e$, взаємно просте з $\\varphi(n)$\r\n- за допомогою розширеного алгоритму Евкліда знаходиться число $d$, таке, що $ed\\equiv 1\\pmod{\\varphi(n)}$\r\n\r\nЧисло $n$, називається модулем, а числа $e$, і $d$, — відкритою й секретною експонентами (англ. encryption and decryption exponents), відповідно. Пари чисел $(n,\\,e)$ є відкритою частиною ключа, а $(n,\\,d)$ — секретною. Числа $p$, і $q$, після генерації пари ключів можуть бути знищені, але в жодному разі не повинні бути розкриті.\r\n\r\n### Шифрування й розшифрування\r\nДля того, щоб зашифрувати повідомлення $m<n$, обчислюється\r\n\r\n$c=m^e\\bmod\\,n \\,$.\r\nЧисло $c$, використовується в якості шифротексту. Для розшифрування потрібно обчислити\r\n\r\n$m=c^d\\bmod\\,n \\,$.\r\nНеважко переконатися, що при розшифруванні ми відновимо вихідне повідомлення:\r\n\r\n$c^d\\equiv (m^e)^d\\equiv m^{ed}\\pmod n\\,$\r\nЗ умови\r\n\r\n$ed\\equiv 1\\pmod{\\varphi(n)}$\r\nвипливає, що\r\n\r\n$ed=k\\varphi(n)+1$ для деякого цілого $k$, отже\r\n$m^{ed}\\equiv m^{k\\varphi(n)+1}\\pmod n$\r\nЗгідно з теоремою Ейлера:\r\n\r\n$m^{\\varphi(n)}\\equiv 1\\pmod n$,\r\nтому\r\n\r\n$m^{k\\varphi(n)+1}\\equiv m \\pmod n$\r\n$c^d\\equiv m\\pmod n$,\r\nRSA припущення — RSA є односторонньою перестановкою, тобто для будь-якого дієвого алгоритму A ймовірність $Pr[A(n,e,c)=c^{1/e}]$ дуже мала, що означає неможливість обернення RSA без секретної інформації — $d$.\r\nНаведений вище варіант шифрування називається підручник RSA (англ. textbook RSA) і є цілком уразливим. В жодному разі його не можна використовувати в криптосистемах.\r\n\r\n### Цифровий підпис\r\nRSA може використовуватися не тільки для шифрування, але й для цифрового підпису. Підпис $s$, повідомлення $m$, обчислюється з використанням секретного ключа за формулою:\r\n\r\n$s=m^d\\bmod\\ n\\,$\r\nДля перевірки правильності підпису потрібно переконатися, що виконується рівність\r\n\r\n$m=s^e\\bmod\\ n\\,$\r\n\r\n## Деякі особливості алгоритму\r\n### Генерація простих чисел\r\nДля знаходження двох великих простих чисел $p$, і $q$, при генерації ключа, звичайно використовуються ймовірносні тести чисел на простоту, які дозволяють швидко виявити й відкинути складені числа.\r\n\r\nДля генерації $p$, і $q$, необхідно використовувати криптографічно надійний генератор випадкових чисел. У порушника не має бути можливості одержати будь-яку інформацію про значення цих чисел.\r\n\r\n$p$, і $q$, не повинні бути занадто близькими одне до одного, інакше можна буде знайти їх використовуючи метод факторизації Ферма. Крім того, необхідно вибирати «сильні» прості числа, щоб не можна було скористатися $p-1$ алгоритмом Поларда.\r\n\r\n### Доповнення повідомлень\r\nПри практичному використанні необхідно деяким чином доповнювати повідомлення. Відсутність доповнень може призвести до деяких проблем:\r\n\r\n-значення $m=0$, і $m=1$, дадуть при зашифруванні шифртексти 0 і 1 при будь-яких значеннях $e$, і $n$.\r\n-при малому значенні відкритого показника ($e=3$, наприклад) можлива ситуація, коли виявиться, що $m^e<n$. Тоді $c=m^e\\bmod\\ n=m^e$, і зловмисник легко зможе відновити вихідне повідомлення обчисливши корінь ступеня $e$, з $c$,.\r\n-оскільки RSA є детермінованим алгоритмом, тобто не використовує випадкових значень у процесі роботи, то зловмисник може використати атаку з обраним відкритим текстом.\r\n\r\nДля розв\'язання цих проблем повідомлення доповнюються перед кожним зашифруванням деяким випадковим значенням. Доповнення виконується таким чином, щоб гарантувати, що $m\\neq0$, $m\\neq1$ і $m^e>n$. Крім того, оскільки повідомлення доповнюється випадковими даними, то зашифровуючи той самий відкритий текст ми щораз будемо одержувати інше значення шифртексту, що робить атаку з обраним відкритим текстом неможливою.\r\n\r\n### Вибір значення відкритого показника\r\nRSA працює значно повільніше симетричних алгоритмів. Для підвищення швидкості шифрування відкритий показник $e$, вибирається невеликим, звичайно 3, 17 або 65537 (2 обрати не можна, бо $e$, повинно бути взаємно простим із $varphi(n)=(p-1)(q-1))$. Ці числа у двійковому вигляді містять тільки по дві одиниці, що зменшує число необхідних операцій множення при піднесенні до степеня. Наприклад, для піднесення числа $m$, до степеня 17 потрібно виконати тільки 5 операцій множення:\r\n\r\n- $m^2= m\\cdot m$\r\n- $m^4=m^2\\cdot m^2$\r\n- $m^8=m^4\\cdot m^4$\r\n- $m^{16}=m^8\\cdot m^8$\r\n- $m^{17}=m^{16}\\cdot m$\r\n\r\nВибір малого значення відкритого показника може призвести до розкриття повідомлення, якщо воно відправляється відразу декільком одержувачам, але ця проблема вирішується за рахунок доповнення повідомлень.\r\n\r\n### Вибір значення секретного показника\r\nЗначення секретного показника $d$, повинне бути досить великим. У 1990 році Міхаель Вінер (Michael J. Wiener) показав, що якщо $q<p<2q$, і $d<n^{\\frac14}/3$, то є ефективний спосіб обчислити $d$, по $n$, і $e$,. Однак, якщо значення $e$, вибирається невеликим, то $d$, виявляється досить великим і проблеми не виникає.\r\n\r\n## Довжина ключа\r\nЧисло n повинне мати розмір не менше 512 біт. На 2007 рік система шифрування на основі RSA вважалась надійною, починаючи з величини N в 1024 біта.\r\n\r\n## Застосування RSA\r\nСистема RSA використовується для захисту програмного забезпечення й у схемах цифрового підпису. Також вона використовується у відкритій системі шифрування PGP.\r\n\r\nЧерез низьку швидкість шифрування (близько 30 кбіт/сек при 512 бітному ключі на процесорі 2 ГГц), повідомлення звичайно шифрують за допомогою продуктивніших симетричних алгоритмів з випадковим ключем (сеансовий ключ), а за допомогою RSA шифрують лише цей ключ.','2016-06-07 09:30:26','2016-06-07 06:30:26','rsa');
INSERT INTO `topics` VALUES (4,'MD5','# MD5\r\nMD5 (Message Digest 5) — 128-бітний алгоритм хешування, розроблений професором Рональдом Л. Рівестом в 1991 році. Призначений для створення «відбитків» або «дайджестів» повідомлень довільної довжини. Прийшов на зміну MD4, що був недосконалим. Описаний в RFC 1321.\r\n\r\nУ 2004 році китайські дослідники Сяоюнь Ван (Xiaoyun Wang), Денгуо Фен (Dengguo Feng), Сюецзя Лай (Xuejia Lai) і Хонбо Ю (Hongbo Yu) повідомили про знаходження ними вразливості в алгоритмі, що дозволяє за невеликий час (1 годину на кластері IBM p690) знаходити колізії хеш-функцій. На жаль, автори так і не відкрили свій секрет широкій публіці.\r\n\r\nУ 2006 році чеський дослідник Властимил Клима опублікував алгоритм, що дозволяє знаходити колізії на звичайному комп\'ютері з довільним початковим вектором (A,B,C,D), за допомогою методу, що був названий: \"тунелювання\".\r\n\r\n## Початковий етап підготовки\r\nВхідні дані вирівнюються так, щоб їхній розмір можна було порівняти з 448 по модулю з 512. Спочатку дописують одиничний біт (навіть якщо довжина порівняна з 448), далі необхідна кількість нульових бітів .\r\nДописування 64-бітного представлення довжини даних по вирівнюванню. Якщо довжина перевищує {\\displaystyle 2^{64}-1}\\ , то дописують молодші біти.\r\n\r\n### Допоміжні таблиці та функції\r\nІніціалізуть 4 змінних розміром по 32 біта:\r\n```\r\nА = 01 23 45 67;\r\nВ = 89 AB CD EF;\r\nС = FE DC BA 98;\r\nD = 76 54 32 10.\r\n```\r\nВирівнювані дані розбиваються на блоки по 32 біта, і кожен проходить 4 раунда з 16 операторів. Всі оператори однотипні і мають вигляд: [abcd k s i], визначений як {\\displaystyle a=b+((a+Fun(b,c,d)+X[k]+T< i>)<<<s)}\\ , де X - блок даних, а T[1..64] - 64х елементна таблиця побудована наступним чином: {\\displaystyle T[i]=int(4294967296*|sin(i)|)}\\, $s$ - циклічний зсув вліво на s біт отриманого 32-бітного аргументу.\r\n\r\nІснують 4 можливі функці, кожна для окремого раунду:\r\n\r\n{\\displaystyle {\\begin{aligned}F(B,C,D)&=(B\\wedge {C})\\vee (\\neg {B} \\wedge {D})\\\\G(B,C,D)&=(B\\wedge {D})\\vee (C\\wedge \\neg {D})\\\\H(B,C,D)&=B\\oplus C\\oplus D\\\\I(B,C,D)&=C\\oplus (B\\vee \\neg {D})\\end{aligned}}}\\   \r\n{\\displaystyle \\oplus ,\\wedge ,\\vee ,\\neg }\\  позначають XOR, AND, OR і NOT відповідно.\r\n\r\n### Циклічна процедура обчислення\r\nСаме обчислення проходить наступним чином:\r\n\r\nЗберігаються значення A, B, C і D, що залишились після операцій з попередніми блоками(або їх початкові значення якщо блок перший)\r\nAA = A\r\n\r\nBB = B\r\n\r\nCC = C\r\n\r\nDD = D\r\n\r\nРаунд 1\r\n\r\n```\r\n/*[abcd k s i] a = b + ((a + F(b,c,d) + X[k] + T[i]) <<< s). */\r\n[ABCD  0 7  1][DABC  1 12  2][CDAB  2 17  3][BCDA  3 22  4]\r\n[ABCD  4 7  5][DABC  5 12  6][CDAB  6 17  7][BCDA  7 22  8]\r\n[ABCD  8 7  9][DABC  9 12 10][CDAB 10 17 11][BCDA 11 22 12]\r\n[ABCD 12 7 13][DABC 13 12 14][CDAB 14 17 15][BCDA 15 22 16]\r\n```\r\n\r\nРаунд 2\r\n```\r\n/*[abcd k s i] a = b + ((a + G(b,c,d) + X[k] + T[i]) <<< s). */\r\n[ABCD  1 5 17][DABC  6 9 18][CDAB 11 14 19][BCDA  0 20 20]\r\n[ABCD  5 5 21][DABC 10 9 22][CDAB 15 14 23][BCDA  4 20 24]\r\n[ABCD  9 5 25][DABC 14 9 26][CDAB  3 14 27][BCDA  8 20 28]\r\n[ABCD 13 5 29][DABC  2 9 30][CDAB  7 14 31][BCDA 12 20 32]\r\n```\r\n\r\nРаунд 3\r\n```\r\n/*[abcd k s i] a = b + ((a + H(b,c,d) + X[k] + T[i]) <<< s). */\r\n[ABCD  5 4 33][DABC  8 11 34][CDAB 11 16 35][BCDA 14 23 36]\r\n[ABCD  1 4 37][DABC  4 11 38][CDAB  7 16 39][BCDA 10 23 40]\r\n[ABCD 13 4 41][DABC  0 11 42][CDAB  3 16 43][BCDA  6 23 44]\r\n[ABCD  9 4 45][DABC 12 11 46][CDAB 15 16 47][BCDA  2 23 48]\r\n```\r\n\r\nРаунд 4\r\n```\r\n/*[abcd k s i] a = b + ((a + I(b,c,d) + X[k] + T[i]) <<< s). */\r\n[ABCD  0 6 49][DABC  7 10 50][CDAB 14 15 51][BCDA  5 21 52]\r\n[ABCD 12 6 53][DABC  3 10 54][CDAB 10 15 55][BCDA  1 21 56]\r\n[ABCD  8 6 57][DABC 15 10 58][CDAB  6 15 59][BCDA 13 21 60]\r\n[ABCD  4 6 61][DABC 11 10 62][CDAB  2 15 63][BCDA  9 21 64]\r\n```\r\n\r\nПроміжний результат\r\nВиконати наступні операції\r\nA = AA + A\r\nB = BB + B\r\nC = CC + C\r\nD = DD + D\r\nПісля цього перевірити, чи є ще блоки, якщо є, то повторюють циклічну процедуру обчислення для наступного 32-х бітового блоку.\r\n\r\n### Результат\r\nПісля обчислення для всіх блоків даних, отримуємо кінцевий хеш у регістрах A B C D. Якщо вивести слова у зворотному порядку DCBA, то отримаємо MD5 хеш.\r\n\r\n### MD5-хеші\r\nХеш містить 128 біт (16 байт) і зазвичай представляється як послідовність з 32 шістнадцяткових цифр.\r\n\r\nКілька прикладів хешу:\r\n MD5 (\"md5\") = 1bc29b36f623ba82aaf6724fd3b16718 \r\nНавіть невелика зміна вхідного повідомлення (у нашому випадку на один біт: ASCII символ «5» з кодом 0x35 16 = 00011010 \'1 \' 2 замінюється на символ «4» з кодом 0x34 16 = 00011010 \'0 \' 2 ) призводить до повної зміни хешу. Така властивість алгоритму називається лавинним ефектом.\r\n\r\n MD5 (\"md4\") = c93d3bf7a7c4afe94b64e30c2ce39f4f \r\nПриклад MD5-хеша для «нульового» рядка:\r\n\r\n MD5 (\"\") = d41d8cd98f00b204e9800998ecf8427e','2016-06-07 09:39:24','2016-06-07 06:39:24','md5');
INSERT INTO `topics` VALUES (5,'Caesar','# Шифр Цезаря\r\nШифр Цезаря — симетричний алгоритм шифрування підстановками. Використовувався римським імператором Юлієм Цезарем для приватного листування.\r\n\r\n## Принцип дії\r\nПринцип дії полягає в тому, щоб циклічно зсунути алфавіт, а ключ — це кількість літер, на які робиться зсув.\r\n\r\n## Математична модель\r\nЯкщо зіставити кожному символу алфавіту його порядковий номер (нумеруючи з 0), то шифрування і дешифрування можна виразити формулами:\r\n\r\n{\\displaystyle y=(x+k)\\ mod\\ n}\\  \r\n{\\displaystyle x=(y-k)\\ mod\\ n,}\\\r\n\r\nде {\\displaystyle ~x}\\  — символ відкритого тексту, {\\displaystyle ~y}\\  — символ шифрованого тексту, {\\displaystyle ~n}\\  — потужність алфавіту, а {\\displaystyle ~k}\\  — ключ.\r\n\r\nМожна помітити, що суперпозиція двох шифрувань на ключах {\\displaystyle ~k_{1}}\\  і {\\displaystyle ~k_{2}}\\  є просто шифруванням на ключі {\\displaystyle ~k_{1}+k_{2}}\\ . Більш загально, множина шифруючих перетворень шифру Цезаря утворює групу {\\displaystyle ~\\mathbb {Z} _{n}}\\ .\r\n\r\n## Приклад\r\nПрипустимо, що, використовуючи шифр Цезаря, з ключем, який дорівнює 3, необхідно зашифрувати словосполучення «ШИФР ЦЕЗАРЯ».\r\n\r\nДля цього зрушимо алфавіт так, щоб він починався з четвертої букви (Г). Отже, беручи вихідний алфавіт\r\n\r\n```АБВГҐДЕЄЖЗИІЇЙКЛМНОПРСТУФХЦЧШЩЬЮЯ``` ,\r\n\r\nі зміщуючи всі літери вліво на 3, отримуємо відповідність:\r\n\r\n```А Б В Г Ґ Д Е Є Ж З И І Ї Й К Л М Н О П Р С Т У Ф Х Ц Ч Ш Щ Ь Ю Я```\r\n\r\n```Г Ґ Д Е Є Ж З И І Ї Й К Л М Н О П Р С Т У Ф Х Ц Ч Ш Щ Ь Ю Я А Б В```,\r\nде Г=А, Ґ=Б, Д=В, і т. д.\r\n\r\nВикористовуючи цю схему, відкритий текст «ШИФР ЦЕЗАРЯ» перетворюється на «ЮЙЧУ ЩЗЇГУВ». Для того, щоб одержувач повідомлення міг відновити вихідний текст, необхідно повідомити йому, що ключ — 3.\r\n\r\n## Криптоаналіз\r\nШифр Цезаря має замало ключів — на одиницю менше, ніж літер в абетці. Тому перебрати усі ключі не складає особливої роботи. Дешифрування з одним з ключів дасть нам вірний відкритий текст.\r\n\r\nТакож зламати шифр Цезаря можна, як і звичайний підстановочний шифр, у зв\'язку з тим, що частота появи кожної літери в шифртексті збігається з частотою появи у відкритому тексті. Якщо припустити, що частота появи літер у відкритому тексті приблизно відповідає середньостатистичній відносній частоті появи літер в текстах мови, на якій написано повідомлення, тоді ключ знаходиться зіставленням перших декількох літер, що трапляються найчастіше у відкритому та зашифрованому текстах. Тобто за допомогою методу частотного криптоаналізу.','2016-06-07 09:08:58','2016-06-07 06:08:58','caesar');
INSERT INTO `topics` VALUES (6,'AES','# Advanced Encryption Standard\r\n\r\nAdvanced Encryption Standard (AES), також відомий під назвою Rijndael — симетричний алгоритм блочного шифрування (розмір блока 128 біт, ключ 128/192/256 біт), фіналіст конкурсу AES і прийнятий в якості американського стандарту шифрування урядом США. Вибір припав на AES з розрахуванням на широке використання і активний аналіз алгоритму, як це було із його попередником, DES. Державний інститут стандартів і технологій (англ. National Institute of Standards and Technology, NIST) США опублікував попередню специфікацію AES 26 жовтня 2001 року, після п\'ятилітньої підготовки. 26 травня 2002 року AES оголошено стандартом шифрування. Станом на 2009 рік AES є одним із найпоширеніших алгоритмів симетричного шифрування.\r\n\r\n## Історія\r\nПотреба у новому стандарті шифрування постала у середині 90-х років. Наявний тоді стандарт DES, довжиною ключа 56 біт, дозволяв застосувати метод грубої сили для дешифрування даних. Успішні злами даних відбулись уже в кінці 90-х. Крім того архітектура DES орієнтувалась на апаратну реалізацію, а програмна реалізація на платформах із обмеженими ресурсами не давала необхідної швидкості застосування. Модифікація DES 3-DES мала достатню довжину ключа, але при цьому була ще повільнішою.\r\n\r\n12 жовтня 1997 р. NIST оголосила конкурс на обрання спадкоємця для DES, що був американським стандартом ще з 1977 року. Перед претендентами поставили такі основні вимоги\r\n\r\n* блочний шифр\r\n* довжина блоку 128 біт\r\n* ключі довжиною 128, 192 і 256 біт.\r\n\r\nВибір алгоритму проходив у три етапи. 20 серпня 1998 року на 1-й конференції AES було оголошено список з 15 кандидатів. В серпні 1999 року на 2-й конференції AES список скоротився до п\'яти фіналістів: MARS, RC6, Rijndael, Serpent и Twofish. За результатами доповідей 3-ї конференції, що проходила у Нью Йорку 13-14 квітня 2000 року, 2 жовтня 2000 алгоритм, запропонований бельгійськими криптографами Д. Деймоном та В. Ріджменом, був оголошений переможцем конкурсу і почалась процедура стандартизації[2]. 26 травня 2002 року AES був прийнятий як стандарт.\r\n\r\n## Опис алгоритму\r\nВ принципі, алгоритм, запропонований Рейменом і Дейцменом, і AES не одне і те ж. Алгоритм Рейндол[3] підтримує широкий діапазон розміру блоку та ключа. AES має фіксовану довжину у 128 біт, а розмір ключа може приймати значення 128, 192 або 256 біт. В той час як Рейндол підтримує розмірність блоку та ключа із кроком 32 біт у діапазоні від 128 до 256. Через фіксований розмір блоку AES оперує із масивом 4×4 байт, що називається станом (версії алгоритму із більшим розміром блоку мають додаткові колонки).\r\n\r\nДля ключа 128 біт алгоритм має 10 раундів у яких послідовно виконуються операції\r\n\r\nsubBytes()  \r\nshiftRows()\r\nmixcolumns() (у 10-му раунді пропускається)\r\nxorRoundKey()\r\n\r\n\r\n## SubBytes()\r\nПроцедура SubBytes() обробляє кожен байт стану незалежно, проводячи нелінійну заміну байтів використовуючи таблицю замін (S-box). Така операція забезпечує нелінійність алгоритму шифрування. Побудова S-box складається з двох кроків. По-перше, проводиться отримання зворотного числа в полі Галуа ${GF\\left({2^{8}}\\right)}$. По-друге, до кожного байту b з яких складається S-box застосовується така операція:\r\n\r\n${B_{i}=b_{i}\\oplus b_{\\left({i+4}\\right){\\bmod {8}}}\\oplus b_{\\left({i+5}\\right){\\bmod {8}}}\\oplus b_{\\left({i+6}\\right){\\bmod {8}}}\\oplus b_{\\left({i+7}\\right){\\bmod {8}}}\\oplus c_{i} }$\r\nде {\\displaystyle 0\\leq i<8}\\ , і де ${b_{i}}$  є i-ий біт b, а {\\displaystyle c_{i}}\\  - i-ий біт константи {\\displaystyle c=63_{16}=99_{10}=01100011_{2}}\\ . Таким чином, забезпечується захист від атак, заснованих на простих алгебраїчних властивостях.\r\n\r\nS-box можна відобразити таблицею простої підстановки:\r\n\r\nS-box\r\n\r\n| \\ | 0  | 1  | 2  | 3  | 4  | 5  | 6  | 7  | 8  | 9  | a  | b  | c  | d  | e  | f  |\r\n|---|----|----|----|----|----|----|----|----|----|----|----|----|----|----|----|----|\r\n| 0 | 63 | 7c | 77 | 7b | f2 | 6b | 6f | c5 | 30 | 01 | 67 | 2b | fe | d7 | ab | 76 |\r\n| 1 | ca | 82 | c9 | 7d | fa | 59 | 47 | f0 | ad | d4 | a2 | af | 9c | a4 | 72 | c0 |\r\n| 2 | b7 | fd | 93 | 26 | 36 | 3f | f7 | cc | 34 | a5 | e5 | f1 | 71 | d8 | 31 | 15 |\r\n| 3 | 04 | c7 | 23 | c3 | 18 | 96 | 05 | 9a | 07 | 12 | 80 | e2 | eb | 27 | b2 | 75 |\r\n| 4 | 09 | 83 | 2c | 1a | 1b | 6e | 5a | a0 | 52 | 3b | d6 | b3 | 29 | e3 | 2f | 84 |\r\n| 5 | 53 | d1 | 00 | ed | 20 | fc | b1 | 5b | 6a | cb | be | 39 | 4a | 4c | 58 | cf |\r\n| 6 | d0 | ef | aa | fb | 43 | 4d | 33 | 85 | 45 | f9 | 02 | 7f | 50 | 3c | 9f | a8 |\r\n| 7 | 51 | a3 | 40 | 8f | 92 | 9d | 38 | f5 | bc | b6 | da | 21 | 10 | ff | f3 | d2 |\r\n| 8 | cd | 0c | 13 | ec | 5f | 97 | 44 | 17 | c4 | a7 | 7e | 3d | 64 | 5d | 19 | 73 |\r\n| 9 | 60 | 81 | 4f | dc | 22 | 2a | 90 | 88 | 46 | ee | b8 | 14 | de | 5e | 0b | db |\r\n| a | e0 | 32 | 3a | 0a | 49 | 06 | 24 | 5c | c2 | d3 | ac | 62 | 91 | 95 | e4 | 79 |\r\n| b | e7 | c8 | 37 | 6d | 8d | d5 | 4e | a9 | 6c | 56 | f4 | ea | 65 | 7a | ae | 08 |\r\n| c | ba | 78 | 25 | 2e | 1c | a6 | b4 | c6 | e8 | dd | 74 | 1f | 4b | bd | 8b | 8a |\r\n| d | 70 | 3e | b5 | 66 | 48 | 03 | f6 | 0e | 61 | 35 | 57 | b9 | 86 | c1 | 1d | 9e |\r\n| e | e1 | f8 | 98 | 11 | 69 | d9 | 8e | 94 | 9b | 1e | 87 | e9 | ce | 55 | 28 | df |\r\n| f | 8c | a1 | 89 | 0d | bf | e6 | 42 | 68 | 41 | 99 | 2d | 0f | b0 | 54 | bb | 16 |\r\n\r\nНаприклад, на вході 19 на виході отримаємо d4.\r\n\r\nФактично це звичайний шифр простої підстановки.\r\n\r\n## ShiftRows()\r\nУ процедурі ShiftRows , байти в кожному рядку state циклічно зсуваються вліво. Розмір зміщення байтів кожного рядка залежить від її номера\r\nShiftRows працює з рядками таблиці State. При цій трансформації рядка стану циклічно зсуваються на r байтів по горизонталі, залежно від номера рядка. Для нульового рядка r = 0, для першого рядка r = 1 і т. д. Таким чином кожна колонка вихідного стану після застосування процедури ShiftRows складається з байтів з кожної колонки початкового стану. Для алгоритму Rijndael патерн зсуву рядків для 128 - і 192-бітних рядків однаковий. Однак для блоку розміром 256 біт відрізняється від попередніх тим, що 2, 3, і 4-і рядки зміщуються на 1, 3, і 4 байти, відповідно.\r\n\r\nФактично це проста перестановка байтів таблиці 4х4 State.\r\n\r\n## MixColumns()\r\nУ процедурі MixColumns , кожна колонка стану перемножується з фіксованим многочленом c (x).\r\nУ процедурі MixColumns , чотири байти кожної колонки State змішуються, використовуючи для цього зворотну лінійну трансформацію. MixColumns опрацьовує стан по колонках, трактуючи кожну з них як поліном четвертого степеня. Над цими поліномами виконується множення в {\\displaystyle GF(2^{8})}\\  по модулю {\\displaystyle x^{4}+1}\\  на фіксований многочлен {\\displaystyle c(x)=3x^{3}+x^{2}+x+2}\\ . Разом з ShiftRows , MixColumns вносить дифузію в шифр.\r\n\r\nПід час цієї операції, кожен стовпчик множиться на матрицю, яка для 128-бітного ключа має вигляд {\\displaystyle {\\begin{bmatrix}2&3&1&1\\\\1&2&3&1\\\\1&1&2&3\\\\3&1&1&2\\end{bmatrix}}.}\\\r\n\r\n## AddRoundKey()\r\nУ процедурі AddRoundKey , кожен байт стану об\'єднується з RoundKey використовуючи операцію XOR.\r\nУ процедурі AddRoundKey , RoundKey кожного раунду об\'єднується зі State. Для кожного раунду Roundkey виходить з CipherKey використовуючи процедуру KeyExpansion ; кожен RoundKey такого ж розміру, що і State. Процедура виробляє побітовий XOR кожного байта State з кожним байтом RoundKey .\r\n\r\nФактично це звичайний побайтовий XOR байт ключа з байтами таблиці State.','2016-06-07 09:20:50','2016-06-07 06:20:50','aes');
INSERT INTO `topics` VALUES (7,'TEST','','2016-06-05 14:20:15','2016-06-05 14:20:15','simplke');
INSERT INTO `topics` VALUES (8,'Знания SQL','','2017-06-15 06:10:53','2017-06-15 06:10:53','Practical test');
INSERT INTO `topics` VALUES (9,'Знания SQL','','2017-06-15 06:11:52','2017-06-15 06:11:52','Practical test');
INSERT INTO `topics` VALUES (10,'Знания SQL','','2017-06-15 06:21:59','2017-06-15 06:21:59','Practical test');
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `intellectual` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
INSERT INTO `users` VALUES (1,'Ilya Moroz','ilya.d.moroz@gmail.com','$2y$10$vaEUroMffqQFKAKVJcovWuVfnp.Udzo7h2fL.fLjPxjQ.pI5chwc2','admin','MIhmEiLPjsjkuOdSSpCCBnO73Ya3vrbLyJo94OjRVcdATwcPgrozhb2C01jv','2017-06-15 08:56:49','2017-06-15 05:56:49',1);
INSERT INTO `users` VALUES (2,'admin','admin@main.com','$2y$10$l6gOFLQijjBmD21dhGVBQeszmGGzFTAA2Gv82NiKq17AHNiPcdusy','admin','yZdYPrycamx3CgyGDvJz85ew8uaf2a3YyPteh4zIP2qe625M2GcYO71AjqiC','2017-06-15 09:04:39','2016-06-07 05:18:41',1);
INSERT INTO `users` VALUES (3,'axlbun','axlbun@gmail.com','$2y$10$l6gOFLQijjBmD21dhGVBQeszmGGzFTAA2Gv82NiKq17AHNiPcdusy','','HtoaUEezswkFJYVH0SI3f7VGXXHYn2kzrFa2oNHsEo2JtUhnNiWugKTmmajp','2017-06-26 15:30:34','2017-06-26 12:30:34',0);
INSERT INTO `users` VALUES (4,'ASF','il95ya@mail.ru','$2y$10$l6Aa/VeW0DZPiXIoKZ7B1.QT.7BJnDHNqCguJbNRMXYDLZLqqoPry','',NULL,'2017-06-20 07:36:19','2017-06-20 07:36:19',0);
