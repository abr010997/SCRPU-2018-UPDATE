<?php
  require 'model/PU04INSPECCION.php';
   $idactdes2 = $this->pu04inspeccion->getTodasActividadesDesarrollo();

  // Eliminamos todos sus permisos:
  eliminarActividades2($idtramite);
  //$actividades = getTodasCategoriasactividades();
  // Reasignaremos sus permisos:
  foreach ($idactdes2 as $actividades2):
    if( isset( $_POST['actividades2'.$actividades2[0]] ) )
      asignarActividades2($idtramite, $actividades2[0]);
  endforeach;

  header('Location: editarPermisos.php?idtramite='.$idtramite);

?>
