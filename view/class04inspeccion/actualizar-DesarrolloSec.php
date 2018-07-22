<?php
  require 'model/PU04INSPECCION.php';
   $iddesarrollosc = $this->pu04inspeccion->getTodasdesarrolloGeo();

  // Eliminamos todos sus permisos:
  eliminarDesarrolloSec($idtramite);
  //$desarrollo = getTodasCategoriasdesarrollo();
  // Reasignaremos sus permisos:
  foreach ($iddesarrollosc as $desarrollo):
    if( isset( $_POST['desarrollo'.$desarrollo[0]] ) )
      asignarDesarrolloSec($idtramite, $desarrollo[0]);
  endforeach;

  header('Location: editarPermisos.php?idtramite='.$idtramite);

?>
