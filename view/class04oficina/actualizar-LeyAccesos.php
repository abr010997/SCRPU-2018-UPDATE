<?php
  require 'model/class04oficina.php';
   $idtipoley = $this->class04oficina->getTodasLeyes();

  // Eliminamos todos sus permisos:
  eliminarLeyes($idtramite);
  //$actividades = getTodasCategoriasactividades();
  // Reasignaremos sus permisos:
  foreach ($idtipoley as $tipoley):
    if( isset( $_POST['tipoley'.$tipoley[0]] ) )
      asignarLeyes($idtramite, $tipoley[0]);
  endforeach;

  header('Location: revisionTramite.php?idtramite='.$idtramite);

?>

