<?php
  require 'model/class04oficina.php';
   $idtipoleypatentes= $this->class04oficina->getTodasPatentes();

  // Eliminamos todos sus permisos:
  eliminarPatentes($idtramite);
  //$actividades = getTodasCategoriasactividades();
  // Reasignaremos sus permisos:
  foreach ($idtipoleypatentes as $tipoleypatentes):
    if( isset( $_POST['tipoleypatentes'.$tipoleypatentes[0]] ) )
      asignarPatentes($idtramite, $tipoleypatentes[0]);
  endforeach;

  header('Location: revisionTramite.php?idtramite='.$idtramite);

?>

