DELIMITER $$

USE `pu_ingenieria`$$

DROP PROCEDURE IF EXISTS `R_INS_SERVIDUMBRES`$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `R_INS_SERVIDUMBRES`(IN idtra INT(11))
BEGIN
  SELECT `pu38servidumbres`.`PU38DESCRIPSERVIDUM`
  FROM `pu04tramite1`
  INNER JOIN `pu38traservidumbres` ON `pu04tramite1`.`PU04IDTRA` = `pu38traservidumbres`.`PU04IDTRA`
  INNER JOIN `pu38servidumbres` ON `pu38traservidumbres`.`PU38IDSERVIDUMBRE` = `pu38servidumbres`.`PU38IDSERVIDUMBRE`
  WHERE `pu04tramite1`.`PU04IDTRA` = idtra;
END$$

DELIMITER ;