<?php
  require 'model/PU04INSPECCION.php';
   $idespacio = $this->pu04inspeccion->getTodasEspaciosGeo();

  // Eliminamos todos sus permisos:
  eliminarEspaciosGeo($idtramite);
  //$espacios = getTodasCategoriasespacios();
  // Reasignaremos sus permisos:
  foreach ($idespacio as $espacios):
    if( isset( $_POST['espacios'.$espacios[0]] ) )
      asignarEspaciosGeo($idtramite, $espacios[0]);
  endforeach;

  header('Location: editarPermisos.php?idtramite='.$idtramite);

?>
