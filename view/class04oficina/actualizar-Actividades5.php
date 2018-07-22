<?php
  require 'model/PU04INSPECCION.php';
   $idactdes5 = $this->pu04inspeccion->getTodasActividadesEstacionDeServicio();

  // Eliminamos todos sus permisos:
  eliminarActividades5($idtramite);
  //$actividades = getTodasCategoriasactividades();
  // Reasignaremos sus permisos:
  foreach ($idactdes5 as $actividades5):
    if( isset( $_POST['actividades5'.$actividades5[0]] ) )
      asignarActividades5($idtramite, $actividades5[0]);
  endforeach;

  header('Location: editarPermisos.php?idtramite='.$idtramite);

?>
