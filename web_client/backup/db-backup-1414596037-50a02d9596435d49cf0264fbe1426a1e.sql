DROP TABLE body;

CREATE TABLE `body` (
  `id_mark` varchar(35) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `user_name` varchar(15) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `id_region` int(10) NOT NULL,
  `json_body` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `status` int(2) NOT NULL,
  `hidden_flag` int(2) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_mark`),
  UNIQUE KEY `id_mark` (`id_mark`),
  KEY `id_region` (`id_region`),
  KEY `id_mark_2` (`id_mark`),
  KEY `user_name` (`user_name`),
  KEY `status` (`status`),
  KEY `hidden_flag` (`hidden_flag`),
  KEY `date` (`date`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO body VALUES("152306_5227390","admin","50","{\"id\":\"152306_5227390\",\"types\":[\"0\"],\"names\":\"fdas\",\"region\":\"??????\",\"phone\":\"sa\",\"site\":\"asfd\",\"e_mail\":\"sadf\",\"coord\":[55.879838163741,37.063217773437],\"times\":\"dfsad\",\"detail\":\"sf\",\"myname\":\"admin\",\"adress\":\"safd\",\"hidden_flag\":\"0\",\"delite\":0,\"p_duty\":0,\"delite_flag\":\"\"}","0","0","2014-10-19 00:10:36");
INSERT INTO body VALUES("1873178_9200520","admin","50","{\"id\":\"1873178_9200520\",\"types\":[\"0\"],\"names\":\"fds\",\"region\":\"??????\",\"phone\":\"dsf\",\"site\":\"dsf\",\"e_mail\":\"dfs\",\"coord\":[55.783997290891,37.177200927734],\"times\":\"sdf\",\"detail\":\"fds\",\"myname\":\"admin\",\"adress\":\"fds\",\"hidden_flag\":\"0\",\"delite\":0,\"p_duty\":0,\"delite_flag\":\"\"}","0","0","2014-10-19 00:07:27");
INSERT INTO body VALUES("2166598_2710313","admin","50","{\"id\":\"2166598_2710313\",\"types\":[\"8\"],\"names\":\"??? ?? ??  ???\",\"region\":\"??????\",\"phone\":\"??????\",\"site\":\"????????\",\"e_mail\":\"????????????\",\"coord\":[55.693349168962,37.624893798828],\"times\":\"???????? ??<br>? ??<br>??<br> ???<br> ???\",\"detail\":\"?????? ??? ?<br><br> ???? ????<br>????<br>???\",\"myname\":\"admin\",\"adress\":\"????  ???<br>?<br>? ??<br>???<br> ????\",\"hidden_flag\":\"0\",\"delite\":0,\"p_duty\":0,\"delite_flag\":\"\"}","0","0","2014-10-18 23:38:21");
INSERT INTO body VALUES("2573718_9351403","frog","50","{\"id\":\"2573718_9351403\",\"types\":[\"3\"],\"names\":\"fdsa\",\"region\":\"?????????? ???????\",\"phone\":\"fasd\",\"site\":\"fads\",\"e_mail\":\"dsfa\",\"coord\":[56.3436947283,35.644697484317],\"times\":\"afds\",\"detail\":\"adsf\",\"myname\":\"frog\",\"adress\":\"ads\",\"hidden_flag\":\"0\",\"delite\":0,\"p_duty\":0,\"delite_flag\":\"\"}","0","0","2014-10-06 18:16:32");
INSERT INTO body VALUES("280360_2031957","admin","50","{\"id\":\"280360_2031957\",\"types\":[\"3\"],\"names\":\"221122221\",\"region\":\"??????\",\"phone\":\"afads\",\"site\":\"fdsasfdd\",\"e_mail\":\"saf\",\"coord\":[55.745671966147,37.509537353516],\"times\":\"???????\",\"detail\":\"?????????\",\"myname\":\"admin\",\"adress\":\"affds\",\"hidden_flag\":\"0\",\"delite\":\"\",\"p_duty\":0,\"delite_flag\":\"\"}","0","0","2014-10-18 23:38:45");
INSERT INTO body VALUES("2833109_1242551","frog","50","{\"id\":\"2833109_1242551\",\"types\":[\"0\"],\"names\":\"2&quot;&quot;&quot;&quot;&quot;\",\"region\":\"??????\",\"phone\":\"fad\",\"site\":\"afds\",\"e_mail\":\"sasfd\",\"coord\":[55.783610355526,37.362595214844],\"times\":\"fads\",\"detail\":\"fads\",\"myname\":\"frog\",\"adress\":\"fads\",\"hidden_flag\":\"0\",\"delite\":\"\",\"p_duty\":0,\"delite_flag\":\"\"}","0","0","2014-10-06 18:40:35");
INSERT INTO body VALUES("2975330_9789609","admin","50","{\"id\":\"2975330_9789609\",\"types\":[\"0\"],\"names\":\"afs\",\"region\":\"??????\",\"phone\":\"dafs\",\"site\":\"fads\",\"e_mail\":\"adf\",\"coord\":[55.887942832033,37.832260742187],\"times\":\"dfas\",\"detail\":\"adfs\",\"myname\":\"admin\",\"adress\":\"dfsa\",\"hidden_flag\":\"0\",\"delite\":0,\"p_duty\":0,\"delite_flag\":\"\"}","0","0","2014-10-06 23:28:48");
INSERT INTO body VALUES("375763_5957377","admin","50","{\"id\":\"375763_5957377\",\"types\":[\"3\"],\"names\":\"fad\",\"region\":\"??????\",\"phone\":\"dfas\",\"site\":\"dfas\",\"e_mail\":\"fdas\",\"coord\":[55.792508892615,37.008286132812],\"times\":\"adsf\",\"detail\":\"dfsaadf\",\"myname\":\"admin\",\"adress\":\"afds\",\"hidden_flag\":\"0\",\"delite_flag\":\"0\",\"p_duty\":0}","0","0","2014-10-19 00:30:17");
INSERT INTO body VALUES("4126427_1578813","frog","50","{\"id\":\"4126427_1578813\",\"types\":[\"0\"],\"names\":\"adsf\",\"region\":\"??????\",\"phone\":\"dsfa\",\"site\":\"dsfa\",\"e_mail\":\"asdf\",\"coord\":[55.840062081647,37.31041015625],\"times\":\"adfs\",\"detail\":\"fd<br>sfdfsd\",\"myname\":\"frog\",\"adress\":\"dfas\",\"hidden_flag\":\"0\",\"delite\":\"\",\"p_duty\":0,\"delite_flag\":\"\"}","0","0","2014-10-06 18:23:39");
INSERT INTO body VALUES("5341319_1536144","admin","50","{\"id\":\"5341319_1536144\",\"types\":[\"4\"],\"names\":\"fds\",\"region\":\"??????\",\"phone\":\"fad\",\"site\":\"fdasfd\",\"e_mail\":\"adsf\",\"coord\":[55.919187779214,37.35435546875],\"times\":\"dsfa\",\"detail\":\"fds\",\"myname\":\"admin\",\"adress\":\"fad\",\"hidden_flag\":\"0\",\"delite\":0,\"p_duty\":0,\"delite_flag\":\"\"}","0","0","2014-10-19 00:16:10");
INSERT INTO body VALUES("5752339_2135589","frog","50","{\"id\":\"5752339_2135589\",\"types\":[\"10\"],\"names\":\"sdfasdf\",\"region\":\"??????\",\"phone\":\"dsf\",\"site\":\"dfsdsf\",\"e_mail\":\"dsfds\",\"coord\":[55.787479535519,37.685318603516],\"times\":\" \",\"detail\":\"sdf<br>sdf<br>sdf<br>sdf<br> \",\"myname\":\"frog\",\"adress\":\"dsf\",\"hidden_flag\":\"0\",\"delite\":\"\",\"p_duty\":0,\"delite_flag\":\"\"}","0","0","2014-10-06 19:09:40");
INSERT INTO body VALUES("5848656_3124055","admin","50","{\"id\":\"5848656_3124055\",\"types\":[\"13\",0,1,2],\"names\":\"sadfs\",\"region\":\"?????????? ???????\",\"phone\":\"afdsfasd\",\"site\":\"afsdasd\",\"e_mail\":\"fasdasdf\",\"coord\":[55.884071617657,37.552345409393],\"times\":\"afsd\",\"detail\":\"dafdaf\",\"myname\":\"admin\",\"adress\":\"af\",\"hidden_flag\":\"0\",\"delite\":0,\"p_duty\":1,\"delite_flag\":\"\"}","0","0","2014-10-06 23:30:57");
INSERT INTO body VALUES("5972065_8576604","admin","50","{\"id\":\"5972065_8576604\",\"types\":[\"0\"],\"names\":\"dfsa\",\"region\":\"??????\",\"phone\":\"adsf\",\"site\":\"fdas\",\"e_mail\":\"fdas\",\"coord\":[55.797924394065,37.863846435547],\"times\":\"adsf\",\"detail\":\"adsf\",\"myname\":\"admin\",\"adress\":\"fdsa\",\"hidden_flag\":\"0\",\"delite_flag\":\"0\",\"p_duty\":0}","0","0","2014-10-19 00:16:29");
INSERT INTO body VALUES("6309221_8743186","admin","50","{\"id\":\"6309221_8743186\",\"types\":[\"4\"],\"names\":\"fdsa\",\"region\":\"??????\",\"phone\":\"dsa\",\"site\":\"dsfas\",\"e_mail\":\"dfasd\",\"coord\":[55.837519560324,37.483444824219],\"times\":\"fdsa\",\"detail\":\"sfad\",\"myname\":\"admin\",\"adress\":\"asdf\",\"hidden_flag\":\"0\",\"delite\":0,\"p_duty\":0,\"delite_flag\":\"\"}","0","0","2014-10-18 23:37:24");
INSERT INTO body VALUES("7610517_7903482","admin","50","{\"id\":\"7610517_7903482\",\"types\":[\"3\"],\"names\":\"fdsa\",\"region\":\"??????\",\"phone\":\"dfas\",\"site\":\"fdsa\",\"e_mail\":\"fds\",\"coord\":[55.902218351219,36.972580566406],\"times\":\"dsfa\",\"detail\":\"fads\",\"myname\":\"admin\",\"adress\":\"fdsa\",\"hidden_flag\":\"0\",\"delite_flag\":\"0\",\"p_duty\":0}","0","0","2014-10-19 00:33:31");
INSERT INTO body VALUES("7915637_2480864","frog","69","{\"id\":\"7915637_2480864\",\"types\":[\"2\"],\"names\":\"fsda\",\"region\":\"???????? ???????\",\"phone\":\"fda\",\"site\":\"fda\",\"e_mail\":\"fdas\",\"coord\":[56.80300078376,34.536393687011],\"times\":\"adsf\",\"detail\":\"sadf\",\"myname\":\"frog\",\"adress\":\"fads\",\"hidden_flag\":\"0\",\"delite\":0,\"p_duty\":0,\"delite_flag\":\"\"}","0","0","2014-10-06 18:16:46");
INSERT INTO body VALUES("8095863_7297852","admin","50","{\"id\":\"8095863_7297852\",\"types\":[\"0\"],\"names\":\"adsf\",\"region\":\"??????\",\"phone\":\"adsfd\",\"site\":\"asfd\",\"e_mail\":\"fdsa\",\"coord\":[55.862851442882,37.66197265625],\"times\":\"adfsfas\",\"detail\":\"dfsa\",\"myname\":\"admin\",\"adress\":\"fads\",\"hidden_flag\":\"0\",\"delite\":0,\"p_duty\":0,\"delite_flag\":\"\"}","0","0","2014-10-19 00:10:48");
INSERT INTO body VALUES("8150999_3774510","admin","50","{\"id\":\"8150999_3774510\",\"types\":[\"0\"],\"names\":\"1\",\"region\":\"??????\",\"phone\":\"1\",\"site\":\"1\",\"e_mail\":\"1\",\"coord\":[55.710410258283,37.325516357422],\"times\":\"1\",\"detail\":\"1\",\"myname\":\"admin\",\"adress\":\"1\",\"hidden_flag\":\"0\",\"delite_flag\":\"0\",\"p_duty\":0}","0","0","2014-10-19 00:58:10");
INSERT INTO body VALUES("8266319_474079","admin","50","{\"id\":\"8266319_474079\",\"types\":[\"4\"],\"names\":\"dfsa\",\"region\":\"??????\",\"phone\":\"dsf\",\"site\":\"asfd\",\"e_mail\":\"dsfa\",\"coord\":[55.876364214227,37.539749755859],\"times\":\"dsfa\",\"detail\":\"<img src=&quot;http://hsto.org/files/2f2/bdf/faa/2f2bdffaa03241f68c56cb1db165030a.jpg&quot;  />\",\"myname\":\"admin\",\"adress\":\"fdas\",\"hidden_flag\":\"1\",\"delite\":\"\",\"p_duty\":0,\"delite_flag\":\"\"}","0","1","2014-10-06 23:29:26");
INSERT INTO body VALUES("8556082_6718884","admin","50","{\"id\":\"8556082_6718884\",\"types\":[\"0\"],\"names\":\"dsaf\",\"region\":\"??????\",\"phone\":\"afds\",\"site\":\"fdsa\",\"e_mail\":\"fdsa\",\"coord\":[55.908389915175,37.215653076172],\"times\":\"dsfa\",\"detail\":\"fdsa\",\"myname\":\"admin\",\"adress\":\"adsf\",\"hidden_flag\":\"0\",\"delite\":0,\"p_duty\":0,\"delite_flag\":\"\"}","0","0","2014-10-18 23:37:54");



DROP TABLE regions;

CREATE TABLE `regions` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name_region` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `city_name` varchar(25) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `city_name` (`city_name`)
) ENGINE=InnoDB AUTO_INCREMENT=83 DEFAULT CHARSET=latin1;

INSERT INTO regions VALUES("1","?????????? ??????","??????");
INSERT INTO regions VALUES("2","?????????? ????????????","???");
INSERT INTO regions VALUES("3","?????????? ???????","????-???");
INSERT INTO regions VALUES("4","?????????? ?????","?????-???????");
INSERT INTO regions VALUES("5","?????????? ????????","?????????");
INSERT INTO regions VALUES("6","?????????? ?????????","???????");
INSERT INTO regions VALUES("7","?????????-?????????? ??????????","???????");
INSERT INTO regions VALUES("8","?????????? ????????","??????");
INSERT INTO regions VALUES("9","?????????? ?????????-?????????","????????");
INSERT INTO regions VALUES("10","?????????? ???????","????????????");
INSERT INTO regions VALUES("11","?????????? ????","?????????");
INSERT INTO regions VALUES("12","?????????? ????? ??","??????-???");
INSERT INTO regions VALUES("13","?????????? ????????","???????");
INSERT INTO regions VALUES("14","?????????? ???? (??????)","??????");
INSERT INTO regions VALUES("15","?????????? ???????? ??????-??????","???????????");
INSERT INTO regions VALUES("16","?????????? ?????????","??????");
INSERT INTO regions VALUES("17","?????????? ????","?????");
INSERT INTO regions VALUES("18","?????????? ????????","??????");
INSERT INTO regions VALUES("19","?????????? ???????","??????");
INSERT INTO regions VALUES("20","????????? ??????????","???????");
INSERT INTO regions VALUES("21","????????? ??????????","?????????");
INSERT INTO regions VALUES("22","????????? ????","???????");
INSERT INTO regions VALUES("23","????????????? ????","?????????");
INSERT INTO regions VALUES("24","???????????? ????","??????????");
INSERT INTO regions VALUES("25","?????????? ????","???????????");
INSERT INTO regions VALUES("26","?????????????? ????","??????????");
INSERT INTO regions VALUES("27","??????????? ????","?????????");
INSERT INTO regions VALUES("28","???????? ???????","????????????");
INSERT INTO regions VALUES("29","????????????? ???????","???????????");
INSERT INTO regions VALUES("30","???????????? ???????","?????????");
INSERT INTO regions VALUES("31","???????????? ???????","????????");
INSERT INTO regions VALUES("32","???????? ???????","??????");
INSERT INTO regions VALUES("33","???????????? ???????","????????");
INSERT INTO regions VALUES("34","????????????? ???????","?????????");
INSERT INTO regions VALUES("35","??????????? ???????","???????");
INSERT INTO regions VALUES("36","??????????? ???????","???????");
INSERT INTO regions VALUES("37","?????????? ???????","???????");
INSERT INTO regions VALUES("38","????????? ???????","???????");
INSERT INTO regions VALUES("39","??????????????? ???????","???????????");
INSERT INTO regions VALUES("40","????????? ???????","??????");
INSERT INTO regions VALUES("41","?????????? ????","?????????????-??????????");
INSERT INTO regions VALUES("42","??????????? ???????","????????");
INSERT INTO regions VALUES("43","????????? ???????","?????");
INSERT INTO regions VALUES("44","??????????? ???????","????????");
INSERT INTO regions VALUES("45","?????????? ???????","??????");
INSERT INTO regions VALUES("46","??????? ???????","?????");
INSERT INTO regions VALUES("47","????????????? ???????","?????-?????????");
INSERT INTO regions VALUES("48","???????? ???????","??????");
INSERT INTO regions VALUES("49","??????????? ???????","???????");
INSERT INTO regions VALUES("50","?????????? ???????","??????");
INSERT INTO regions VALUES("51","?????????? ???????","????????");
INSERT INTO regions VALUES("52","????????????? ???????","?????? ????????");
INSERT INTO regions VALUES("53","???????????? ???????","????????");
INSERT INTO regions VALUES("54","????????????? ???????","???????????");
INSERT INTO regions VALUES("55","?????? ???????","????");
INSERT INTO regions VALUES("56","???????????? ???????","????????");
INSERT INTO regions VALUES("57","????????? ???????","????");
INSERT INTO regions VALUES("58","?????????? ???????","?????");
INSERT INTO regions VALUES("59","???????? ????","?????");
INSERT INTO regions VALUES("60","????????? ???????","?????");
INSERT INTO regions VALUES("61","?????????? ???????","??????-??-????");
INSERT INTO regions VALUES("62","????????? ???????","??????");
INSERT INTO regions VALUES("63","????????? ???????","??????");
INSERT INTO regions VALUES("64","??????????? ???????","???????");
INSERT INTO regions VALUES("65","??????????? ???????","????-?????????");
INSERT INTO regions VALUES("66","???????????? ???????","????????????");
INSERT INTO regions VALUES("67","?????????? ???????","????????");
INSERT INTO regions VALUES("68","?????????? ???????","??????");
INSERT INTO regions VALUES("69","???????? ???????","?????");
INSERT INTO regions VALUES("70","??????? ???????","?????");
INSERT INTO regions VALUES("71","???????? ???????","????");
INSERT INTO regions VALUES("72","????????? ???????","??????");
INSERT INTO regions VALUES("73","??????????? ???????","?????????");
INSERT INTO regions VALUES("74","??????????? ???????","?????????");
INSERT INTO regions VALUES("75","????????????? ????","????");
INSERT INTO regions VALUES("76","??????????? ???????","?????????");
INSERT INTO regions VALUES("77","????????? ?????????? ???????","??????????");
INSERT INTO regions VALUES("78","???????? ?????????? ?????","??????-???");
INSERT INTO regions VALUES("79","?????-?????????? ?????????? ????? - ????","?????-????????");
INSERT INTO regions VALUES("80","????????? ?????????? ?????","???????");
INSERT INTO regions VALUES("81","?????-???????? ?????????? ?????","????????");
INSERT INTO regions VALUES("82","?????????? ????","???????????");



DROP TABLE users;

CREATE TABLE `users` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `pass` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `rule` int(2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

INSERT INTO users VALUES("3","admin","fr","3");
INSERT INTO users VALUES("4","frog","res","1");
INSERT INTO users VALUES("5","adam","ttr","1");
INSERT INTO users VALUES("6","eva","wwe","2");
INSERT INTO users VALUES("7","vizor","qqw","0");



