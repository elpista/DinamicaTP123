CREATE TABLE `google`(
    `email` varchar(50) character set utf8 collate utf8_unicode_ci NOT NULL,
    `name` varchar(50) character set utf8 collate utf8_unicode_ci NOT NULL,
    `picture` varchar(50) character set utf8 collate utf8_unicode_ci NOT NULL,
    PRIMARY KEY  (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `steam`(
    `steamid` varchar(50) character set utf8 collate utf8_unicode_ci NOT NULL,
    `personaname` varchar(50) character set utf8 collate utf8_unicode_ci NOT NULL,
    `avatarmedium` varchar(100) character set utf8 collate utf8_unicode_ci NOT NULL,
    `googleEmail` varchar(50) character set utf8 collate utf8_unicode_ci NOT NULL,
    PRIMARY KEY (`steamid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

ALTER TABLE `steam`
ADD CONSTRAINT `steam_ibfk_1` FOREIGN KEY (`googleEmail`) REFERENCES `google` (`email`);