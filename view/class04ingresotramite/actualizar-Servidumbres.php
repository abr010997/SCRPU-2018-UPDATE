<?php
  require 'model/class04ingresotramite.php';
   $idservi = $this->class04ingresotramite->getTodasServidumbres();

  // Eliminamos todos sus permisos:
  eliminarServidumbres($idtramite);
  //$actividades = getTodasCategoriasactividades();
  // Reasignaremos sus permisos:
  foreach ($idservi as $servi):
    if( isset( $_POST['servi'.$servi[0]] ) )
      asignarServidumbres($idtramite, $servi[0]);
  endforeach;

  header('Location: agregarAccesosServidumbre.php.php?idtramite='.$idtramite);

?>
