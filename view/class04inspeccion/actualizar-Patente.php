<?php
  require 'model/PU04INSPECCION.php';
   $idtipopatente = $this->pu04inspeccion->getTodasPatente();

  // Eliminamos todos sus permisos:
  eliminarPatente($idtramite);
  //$actividades = getTodasCategoriasactividades();
  // Reasignaremos sus permisos:
  foreach ($idtipopatente as $tipopatente):
    if( isset( $_POST['tipopatente'.$tipopatente[0]] ) )
      asignarPatente($idtramite, $tipopatente[0]);
  endforeach;

  header('Location: editarPermisos.php?idtramite='.$idtramite);

?>
