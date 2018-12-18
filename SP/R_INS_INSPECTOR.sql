DELIMITER $$

USE `pu_ingenieria`$$

DROP PROCEDURE IF EXISTS `R_INS_INSPECTOR`$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `R_INS_INSPECTOR`(IN idtra INT(11))
BEGIN
  SET lc_time_names = 'es_ES';
  SELECT DATE_FORMAT(`pu04regtra`.`PU04FETRA`, "%a %d %M %Y a las %H:%i") AS 'FechaTramite',
	 `pu04tramite1`.`PU04IDTRA`,
	 `pu04regtra`.`PU04NORTE`,
	 `pu04regtra`.`PU04ESTE`,
	 `pu04regtra`.`PU04ALTITUD`,
	 `pu01regusu`.`PU01CEDUSU`,
	 `pu01regusu`.`PU01NOMUSU`,
	 `pu01regusu`.`PU01APE1USU`,
	 `pu01regusu`.`PU01APE2USU`
  FROM `pu04tramite1`
  INNER JOIN `pu04regtra` ON `pu04tramite1`.`PU04IDTRA` = `pu04regtra`.`PU04IDTRA`
  INNER JOIN `pu01trausutra` ON `pu04tramite1`.`PU04IDTRA` = `pu01trausutra`.`PU04IDTRA`
  INNER JOIN `pu01regusu` ON `pu01trausutra`.`PU01CEDUSU` = `pu01regusu`.`PU01CEDUSU`
  WHERE `pu04tramite1`.`PU04IDTRA` = idtra;
END$$

DELIMITER ;