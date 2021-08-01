CREATE TABLE `getwifi`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(40) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `bssid1` varchar(40) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `bssid2` varchar(40) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `times` timestamp(6) NULL DEFAULT CURRENT_TIMESTAMP(6) ON UPDATE CURRENT_TIMESTAMP(6),
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8;

