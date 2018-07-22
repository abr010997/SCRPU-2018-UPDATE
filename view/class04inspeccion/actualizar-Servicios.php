<?php
  require 'model/PU04INSPECCION.php';
   $idservicio = $this->pu04inspeccion->getTodasServicios();

  // Eliminamos todos sus permisos:
  eliminarServicios($idtramite);
  //$desarrollo = getTodasCategoriasdesarrollo();
  // Reasignaremos sus permisos:
  foreach ($idservicio as $idservicios):
    if( isset( $_POST['idservicios'.$idservicios[0]] ) )
      asignarServicios($idtramite, $idservicios[0]);
  endforeach;

  header('Location: editarPermisos.php?idtramite='.$idtramite);

?>