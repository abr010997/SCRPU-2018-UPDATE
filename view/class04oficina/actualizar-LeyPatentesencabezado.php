<?php
  require 'model/class04oficina.php';
   $idtipoleypatentesencabezado= $this->class04oficina->getTodasLeyPatenteencabezado();

  // Eliminamos todos sus permisos:
  eliminarLeyPatenteencabezado($idtramite);
  //$actividades = getTodasCategoriasactividades();
  // Reasignaremos sus permisos:
  foreach ($idtipoleypatentesencabezado as $tipoleypatentesencabezado):
    if( isset( $_POST['tipoleypatentesencabezado'.$tipoleypatentesencabezado[0]] ) )
      asignarLeyPatenteencabezado($idtramite, $tipoleypatentesencabezado[0]);
  endforeach;

  header('Location: revisionTramite.php?idtramite='.$idtramite);

?>

