<?php
  require 'model/PU04INSPECCION.php';
   $idtipoacceso = $this->pu04inspeccion->getTodasAcceso();

  // Eliminamos todos sus permisos:
  eliminarAcceso($idtramite);
  //$actividades = getTodasCategoriasactividades();
  // Reasignaremos sus permisos:
  foreach ($idtipoacceso as $acceso):
    if( isset( $_POST['acceso'.$acceso[0]] ) )
      asignarAcceso($idtramite, $acceso[0]);
  endforeach;

  header('Location: editarPermisos.php?idtramite='.$idtramite);

?>
