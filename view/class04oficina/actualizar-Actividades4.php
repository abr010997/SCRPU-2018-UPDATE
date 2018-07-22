<?php
  require 'model/PU04INSPECCION.php';
   $idactdes4 = $this->pu04inspeccion->getTodasActividadesComercialIndustrial();

  // Eliminamos todos sus permisos:
  eliminarActividades4($idtramite);
  //$actividades = getTodasCategoriasactividades();
  // Reasignaremos sus permisos:
  foreach ($idactdes4 as $actividades4):
    if( isset( $_POST['actividades4'.$actividades4[0]] ) )
      asignarActividades4($idtramite, $actividades4[0]);
  endforeach;

  header('Location: editarPermisos.php?idtramite='.$idtramite);

?>
