DELIMITER $$

USE `pu_ingenieria`$$

DROP PROCEDURE IF EXISTS `R_INS_PATENTES`$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `R_INS_PATENTES`(IN idtra INT(11))
BEGIN
  SELECT `pu24infest`.`PU24DESCINF`
  FROM `pu04tramite1`
  INNER JOIN `pu25patent` ON `pu04tramite1`.`PU04IDTRA` = `pu25patent`.`PU04IDTRA`
  INNER JOIN `pu24infest` ON `pu25patent`.`PU24IDINFR` =`pu24infest`.`PU24IDINFR`
  WHERE `pu04tramite1`.`PU04IDTRA` = idtra;
END$$

DELIMITER ;