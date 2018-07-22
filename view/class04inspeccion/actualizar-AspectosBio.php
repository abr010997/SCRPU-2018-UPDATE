<?php
  require 'model/PU04INSPECCION.php';
   $idaspecto = $this->pu04inspeccion->getTodasAspectosBio();

  // Eliminamos todos sus permisos:
  eliminarAspectosBio($idtramite);
  //$desarrollo = getTodasCategoriasdesarrollo();
  // Reasignaremos sus permisos:
  foreach ($idaspecto as $aspectos):
    if( isset( $_POST['aspectos'.$aspectos[0]] ) )
      asignarAspectosBio($idtramite, $aspectos[0]);
  endforeach;

  header('Location: editarPermisos.php?idtramite='.$idtramite);

?>
