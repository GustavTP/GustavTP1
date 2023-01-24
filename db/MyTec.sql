 -- BASE DE DATOS FIS --
 CREATE DATABASE MyTec;
 USE MyTec;
 
 SET FOREIGN_KEY_CHECKS=0;

CREATE TABLE usuarios (
  usersId       int(9) NOT NULL AUTO_INCREMENT,
  grupoId       int(9) NOT NULL,
  nombres       varchar(150) NOT NULL,
  users         varchar(20) NOT NULL,
  clave         varchar(120) NOT NULL,
  nivel         int(2) NOT NULL,
  estado        int(1) NOT NULL,
  email         varchar(100) DEFAULT NULL,
  perfil        int(150) DEFAULT NULL,
  fechacreada datetime DEFAULT NULL
  PRIMARY KEY (usersId)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

INSERT INTO usuarios (usersId, grupoId, nombres, users, clave, nivel,estado, email, perfil, fechacreada) VALUES
(1, 1, 'Tito Poma Gustavo Alvaro ', 'root', 'admin123', 1, 1, 'Gustavtp1999@gmail.com', ' ',NOW());

CREATE TABLE grupos (
  grupoId int(9) NOT NULL,
  usersId int(9) NOT NULL,
  nombreGrupo varchar(255) DEFAULT NULL,
  fechainicio date NOT NULL,
  fechafinal date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
INSERT INTO grupos (grupoId, usersId, nombreGrupo, fechainicio, fechafinal) VALUES
(1, 1, 'administrador financiero portable', NOW(), DATE_ADD (NOW(),INTERVAL 1 YEAR));


CREATE TABLE baner (
  banerId int(9) NOT NULL AUTO_INCREMENT,
  usersId       int(9) NOT NULL,
  grupoId       int(9) NOT NULL,
  imagen    VARCHAR(250) DEFAULT NULL,
  titulo varchar (250) DEFAULT null,
  descripcion   text DEFAULT NULL,
  estado        int(1) NOT NULL,
  fechacreada datetime DEFAULT NULL,
  PRIMARY KEY (banerId)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

DROP PROCEDURE IF EXISTS `Acceder`;
DELIMITER ;;
CREATE PROCEDURE `Acceder` (IN Usuario varchar (100), In Claves varchar(200))
BEGIN
    DECLARE rpta VARCHAR(20) DEFAULT NULL;
    DECLARE IdGrupo INTEGER   DEFAULT 0;
    DECLARE IdUser INTEGER DEFAULT 0;
	
    SELECT usersId, grupoId INTO IdUser, IdGrupo FROM usuarios WHERE users=Usuario AND clave=Claves AND estado=`1`;
    If IdGrupos != 0 THEN
        SELECT usersId INTO rpta FROM grupos WHERE 0 < DATEDIFF( fechafnal,now()) AND grupoId = IdGrupo ;
    ELSE 
        SET rpta=NULL;
    END IF;
	
    IF rpta IS NOT NULL THEN 
        SELECT usersId, grupoId,nombres, users, nivel FROM usuarios WHERE usersId = IdUser LIMIT 1;
    ELSE
        SET rpta="No existe";
	    SELECT rpta;
    END IF;
END
;;
DELIMITER ;