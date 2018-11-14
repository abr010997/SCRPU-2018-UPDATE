<?php
  require 'model/class04oficina.php';
   $idtipoleypatentesencabezado= $this->class04oficina->getTodasLeyPatenteencabezado();

  // Eliminamos todos sus permisos:
  eliminarLeyPatenteencabezado($idtramite);
  //$actividades = getTodasCategoriasactividades();
  // Reasignaremos sus permisos:
  foreach ($idtipoleypatentesencabezado as $tipoleypatente1):
    if( isset( $_POST['tipoleypatente1'.$tipoleypatente1[0]] ) )
      asignarLeyPatenteencabezado($idtramite, $tipoleypatente1[0]);
  endforeach;

  header('Location: revisionTramite.php?idtramite='.$idtramite);

?>

