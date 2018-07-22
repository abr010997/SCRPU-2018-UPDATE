<?php
  require 'model/PU04INSPECCION.php';
   $idterreno = $this->pu04inspeccion->getTodasTerrenoFR();

  // Eliminamos todos sus permisos:
  eliminarEspaciosGeo($idtramite);
  //$espacios = getTodasCategoriasespacios();
  // Reasignaremos sus permisos:
  foreach ($idterreno as $terrenofr):
    if( isset( $_POST['terrenofr'.$terrenofr[0]] ) )
      asignarEspaciosGeo($idtramite, $terrenofr[0]);
  endforeach;

  header('Location: editarPermisos.php?idtramite='.$idtramite);

?>
