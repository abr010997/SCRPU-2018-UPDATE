<?php
  require 'model/class04oficina.php';
   $idtipoleyplan = $this->class04oficina->getTodasPlanregulador();

  // Eliminamos todos sus permisos:
  eliminarPlanregulador($idtramite);
  //$actividades = getTodasCategoriasactividades();
  // Reasignaremos sus permisos:
  foreach ($idtipoleyplan as $tipoleyplan):
    if( isset( $_POST['tipoleyplan'.$tipoleyplan[0]] ) )
      asignarPlanregulador($idtramite, $tipoleyplan[0]);
  endforeach;

  header('Location: revisionTramite.php?idtramite='.$idtramite);

?>

