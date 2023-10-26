CREATE TABLE `usuario` (
  `usPass` int(11) NOT NULL,
  `usNombre` varchar(50) character set utf8 collate utf8_unicode_ci NOT NULL,
  `idUsuario` bigint(20) NOT NULL,
  `usMail` varchar(50) character set utf8 collate utf8_unicode_ci NOT NULL,
  `usDeshabilitado` timestamp,
  PRIMARY KEY  (`idUsuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `rol` (
  `idRol` bigint(20) NOT NULL,
  `roDescripcion` varchar(50) character set utf8 collate utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`idRol`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `usuarioRol` (
  `idRol` bigint(20) NOT NULL,
  `idUsuario` bigint(20) NOT NULL,
  PRIMARY KEY (`idRol`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

ALTER TABLE `usuarioRol`
ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`idUsuario`)
REFERENCES `usuario` (`idUsuario`);

ALTER TABLE `usuarioRol`
ADD CONSTRAINT `rol_ibfk_1` FOREIGN KEY (`idRol`)
REFERENCES `rol` (`idRol`);