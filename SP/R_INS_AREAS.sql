DELIMITER $$

USE `pu_ingenieria`$$

DROP PROCEDURE IF EXISTS `R_INS_AREAS`$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `R_INS_AREAS`(IN idtra INT(11))
BEGIN
  SELECT `pu13aarep`.`PU13DESCAAP`
  FROM `pu04tramite1`
  INNER JOIN `pu14trarep` ON `pu04tramite1`.`PU04IDTRA` = `pu14trarep`.`PU04IDTRA`
  INNER JOIN `pu13aarep` ON `pu14trarep`.`PU13IDAAP` = `pu13aarep`.`PU13IDAAP`
  WHERE `pu04tramite1`.`PU04IDTRA` = idtra;
END$$

DELIMITER ;