<?php
  require 'model/PU04INSPECCION.php';
   $idtiporedvial = $this->pu04inspeccion->getTodasTipoRed();

  // Eliminamos todos sus permisos:
  eliminarTipoRed($idtramite);
  //$actividades = getTodasCategoriasactividades();
  // Reasignaremos sus permisos:
  foreach ($idtiporedvial as $tipored):
    if( isset( $_POST['tipored'.$tipored[0]] ) )
      asignarTipoRed($idtramite, $tipored[0]);
  endforeach;

  header('Location: editarPermisos.php?idtramite='.$idtramite);

?>
