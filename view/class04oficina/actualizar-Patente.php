<?php
  require 'model/class04oficina.php';
   $idtipopatente = $this->class04oficina->getTodasPatenteOf();

  // Eliminamos todos sus permisos:
  eliminarPatenteOf($idtramite);
  //$actividades = getTodasCategoriasactividades();
  // Reasignaremos sus permisos:
  foreach ($idtipopatente as $tipopatente):
    if( isset( $_POST['tipopatente'.$tipopatente[0]] ) )
      asignarPatenteOf($idtramite, $tipopatente[0]);
  endforeach;

  header('Location: editarPermisos.php?idtramite='.$idtramite);

?>
