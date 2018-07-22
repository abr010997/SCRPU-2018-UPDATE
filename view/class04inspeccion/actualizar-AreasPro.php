<?php
  require 'model/PU04INSPECCION.php';
   $idareasp = $this->pu04inspeccion->getTodasAreasPro();

  // Eliminamos todos sus permisos:
  eliminarAreasPro($idtramite);
  //$actividades = getTodasCategoriasactividades();
  // Reasignaremos sus permisos:
  foreach ($idareasp as $areas):
    if( isset( $_POST['areas'.$areas[0]] ) )
      asignarAreasPro($idtramite, $areas[0]);
  endforeach;

  header('Location: editarPermisos.php?idtramite='.$idtramite);

?>
