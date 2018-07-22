<?php
  require 'model/class04oficina.php';
   $idtipoleyactividades = $this->class04oficina->getTodasActividades();

  // Eliminamos todos sus permisos:
  eliminarActividades($idtramite);
  //$actividades = getTodasCategoriasactividades();
  // Reasignaremos sus permisos:
  foreach ($idtipoleyactividades as $tipoleyactividades):
    if( isset( $_POST['tipoleyactividades'.$tipoleyactividades[0]] ) )
      asignarActividades($idtramite, $tipoleyactividades[0]);
  endforeach;

  header('Location: revisionTramite.php?idtramite='.$idtramite);

?>

