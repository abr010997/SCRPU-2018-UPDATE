DELIMITER $$

USE `pu_ingenieria`$$

DROP PROCEDURE IF EXISTS `R_INS_DESARROLLO_SECTOR`$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `R_INS_DESARROLLO_SECTOR`(IN idtra INT(11))
BEGIN
  SELECT `pu12tipdesec`.`PU12TIPODES`
  FROM `pu04tramite1`
  INNER JOIN `pu12tratipdesec` ON `pu04tramite1`.`PU04IDTRA` = `pu12tratipdesec`.`PU04IDTRA`
  INNER JOIN `pu12tipdesec` ON `pu12tratipdesec`.`PU12IDTDESEC` = `pu12tipdesec`.`PU12IDTDESEC`
  WHERE `pu04tramite1`.`PU04IDTRA` = idtra;
END$$

DELIMITER ;