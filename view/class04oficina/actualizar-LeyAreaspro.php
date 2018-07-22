<?php
  require 'model/class04oficina.php';
   $idtipoleyareas = $this->class04oficina->getTodasAreaspro();

  // Eliminamos todos sus permisos:
  eliminarAreaspro($idtramite);
  //$actividades = getTodasCategoriasactividades();
  // Reasignaremos sus permisos:
  foreach ($idtipoleyareas as $tipoleyareas):
    if( isset( $_POST['tipoleyareas'.$tipoleyareas[0]] ) )
      asignarAreaspro($idtramite, $tipoleyareas[0]);
  endforeach;

  header('Location: revisionTramite.php?idtramite='.$idtramite);

?>

