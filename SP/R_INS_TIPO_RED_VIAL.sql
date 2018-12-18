DELIMITER $$

USE `pu_ingenieria`$$

DROP PROCEDURE IF EXISTS `R_INS_TIPO_RED_VIAL`$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `R_INS_TIPO_RED_VIAL`(IN idtra INT(11))
BEGIN
  SELECT `pu22tredv`.`PU22DESCTRV`
  FROM `pu04tramite1`
  INNER JOIN `pu22traserv` ON `pu04tramite1`.`PU04IDTRA` = `pu22traserv`.`PU04IDTRA`
  INNER JOIN `pu22tredv` ON `pu22traserv`.`PU22IDTREDV` =`pu22tredv`.`PU22IDTREDV`
  WHERE `pu04tramite1`.`PU04IDTRA` = idtra;
END$$

DELIMITER ;