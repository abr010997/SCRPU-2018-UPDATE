DELIMITER $$

USE `pu_ingenieria`$$

DROP PROCEDURE IF EXISTS `R_INS_ESPACIO_GEO`$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `R_INS_ESPACIO_GEO`(IN idtra INT(11))
BEGIN
  SELECT `pu09desceg`.`PU09DESCREG`
  FROM `pu04tramite1`
  INNER JOIN `pu09tradeg` ON `pu04tramite1`.`PU04IDTRA` = `pu09tradeg`.`PU04IDTRA`
  INNER JOIN `pu09desceg` ON `pu09tradeg`.`PU09IDDEG` = `pu09desceg`.`PU09IDDEG`
  WHERE `pu04tramite1`.`PU04IDTRA` = idtra;
END$$

DELIMITER ;