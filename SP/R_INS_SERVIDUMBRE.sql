DELIMITER $$

USE `pu_ingenieria`$$

DROP PROCEDURE IF EXISTS `R_INS_SERVIDUMBRE`$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `R_INS_SERVIDUMBRE`(IN idtra INT(11))
BEGIN
  SELECT `pu42servidumbre`.`PU42DESCRIPCION`
  FROM `pu04tramite1`
  INNER JOIN `pu43traacceso` ON `pu04tramite1`.`PU04IDTRA` = `pu43traacceso`.`PU04IDTRA`
  INNER JOIN `pu42servidumbre` ON `pu43traacceso`.`PU42IDSERVID` = `pu42servidumbre`.`PU42IDSERVID`
  WHERE `pu04tramite1`.`PU04IDTRA` = idtra;
END$$

DELIMITER ;