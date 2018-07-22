<?php
  require 'model/class04oficina.php';
   $idtipoleydesarrollosec = $this->class04oficina->getTodasDesarrollosec();

  // Eliminamos todos sus permisos:
  eliminarDesarrollosec($idtramite);
  //$actividades = getTodasCategoriasactividades();
  // Reasignaremos sus permisos:
  foreach ($idtipoleydesarrollosec as $tipoleydesarrollosec):
    if( isset( $_POST['tipoleydesarrollosec'.$tipoleydesarrollosec[0]] ) )
      asignarDesarrollosec($idtramite, $tipoleydesarrollosec[0]);
  endforeach;

  header('Location: revisionTramite.php?idtramite='.$idtramite);

?>

