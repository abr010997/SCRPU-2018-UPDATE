DELIMITER $$

USE `pu_ingenieria`$$

DROP PROCEDURE IF EXISTS `SP00_LISTAR_INGRESO_TRAMITE_1234`$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP00_LISTAR_INGRESO_TRAMITE_1234`()
BEGIN
	
 SELECT `pu04tramite1`.PU04IDTRA,`pu04tramite1`.PU04FEINICIO,`pu04tramite2`.`PU04FEPLATAFOR`,
CASE `pu04tramite2`.`PU04IDDISTRITO` WHEN "1" THEN "Nicoya"
				WHEN "2" THEN "Mansion"
				WHEN "3" THEN "San Antonio"
				WHEN "4" THEN "Quebrada Honda"
				END
 FROM pu04tramite1
 INNER JOIN `pu04tramite2`
 ON `pu04tramite1`.`PU04IDTRA` = `pu04tramite2`.`PU04IDTRA`
 WHERE pu04tramite1.PUIDESTADO=1
 ORDER BY `pu04tramite1`.`PU04FEINICIO` DESC;	
END$$

DELIMITER ;
-- //////////////////////////////////////////////////////////////////////////////

DELIMITER $$

USE `pu_ingenieria`$$

DROP PROCEDURE IF EXISTS `SP00_LISTAR_INGRESO_TRAMITE_567`$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP00_LISTAR_INGRESO_TRAMITE_567`()
BEGIN
	
 SELECT `pu04tramite1`.PU04IDTRA,`pu04tramite1`.PU04FEINICIO,`pu04tramite2`.`PU04FEPLATAFOR`,
CASE `pu04tramite2`.`PU04IDDISTRITO` 
				WHEN "5" THEN "Samara"
				WHEN "6" THEN "Nosara"
				WHEN "7" THEN "Belen" END
 FROM pu04tramite1
 INNER JOIN `pu04tramite2`
 ON `pu04tramite1`.`PU04IDTRA` = `pu04tramite2`.`PU04IDTRA`
 WHERE pu04tramite1.PUIDESTADO=1
 ORDER BY `pu04tramite1`.`PU04FEINICIO` DESC;	
END$$

DELIMITER ;