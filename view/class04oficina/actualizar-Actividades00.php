<?php
  require 'model/class04oficina.php';
   $idactdes00 = $this->class04oficina->getTododasEstados();

  // Eliminamos todos sus permisos:
  eliminarActividades00($idtramite);
  //$actividades = getTodasCategoriasactividades();
  // Reasignaremos sus permisos:
  foreach ($idactdes00 as $actividades00):
    if( isset( $_POST['actividades00'.$actividades00[0]] ) )
      asignarActividades00($idtramite, $actividades00[0]);
  endforeach;

  header('Location: editarPermisos.php?idtramite='.$idtramite);

?>