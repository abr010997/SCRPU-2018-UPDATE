<?php
  require 'model/class04oficina.php';
   $idactdes3 = $this->class04oficina->getTodasActividadesComercial();

  // Eliminamos todos sus permisos:
  eliminarActividades3($idtramite);
  //$actividades = getTodasCategoriasactividades();
  // Reasignaremos sus permisos:
  foreach ($idactdes3 as $actividades3):
    if( isset( $_POST['actividades3'.$actividades3[0]] ) )
      asignarActividades3($idtramite, $actividades3[0]);
  endforeach;

  header('Location: editarPermisos.php?idtramite='.$idtramite);

?>
