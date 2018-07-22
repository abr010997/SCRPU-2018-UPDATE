<?php
  require 'model/class04oficina.php';
   $idactdes = $this->class04oficina->getTodasActividades();

  // Eliminamos todos sus permisos:
  eliminarActividades($idtramite);
  //$actividades = getTodasCategoriasactividades();
  // Reasignaremos sus permisos:
  foreach ($idactdes as $actividades):
    if( isset( $_POST['actividades'.$actividades[0]] ) )
      asignarActividades($idtramite, $actividades[0]);
  endforeach;

  header('Location: editarPermisos.php?idtramite='.$idtramite);

?>
