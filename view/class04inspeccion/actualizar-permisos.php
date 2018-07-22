<?php
  require 'model/PU04INSPECCION.php';
   $idactdes = $this->pu04inspeccion->getTodasActividades();

  // Eliminamos todos sus permisos:
  eliminarActividades($idtramite);
  //$actividades = getTodasCategoriasactividades();
  // Reasignaremos sus permisos:
  foreach ($idactdes as $actividades):
    if( isset( $_POST['actividades'.$actividades[0]] ) )
      asignarActividades($idtramite, $actividades[0]);
  endforeach;

  header('Location: editarPermisos.php?idtramite='.$idtramite);

?>
