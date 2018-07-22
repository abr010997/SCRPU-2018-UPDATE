<?php
  require 'model/PU04INSPECCION.php';
   $idtipoacceso2 = $this->pu04inspeccion->getTodasAcceso2();

  // Eliminamos todos sus permisos:
  eliminarAcceso2($idtramite);
  //$actividades = getTodasCategoriasactividades();
  // Reasignaremos sus permisos:
  foreach ($idtipoacceso2 as $acceso2):
    if( isset( $_POST['acceso2'.$acceso2[0]] ) )
      asignarAcceso2($idtramite, $acceso2[0]);
  endforeach;

  header('Location: editarPermisos.php?idtramite='.$idtramite);

?>
