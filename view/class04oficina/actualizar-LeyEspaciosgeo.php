<?php
  require 'model/class04oficina.php';
   $idtipoleyespacio = $this->class04oficina->getTodasEspaciosgeo();

  // Eliminamos todos sus permisos:
  eliminarEspaciosgeo($idtramite);
  //$actividades = getTodasCategoriasactividades();
  // Reasignaremos sus permisos:
  foreach ($idtipoleyespacio as $tipoleyespacio):
    if( isset( $_POST['tipoleyespacio'.$tipoleyespacio[0]] ) )
      asignarPlanregulador($idtramite, $tipoleyespacio[0]);
  endforeach;

  header('Location: revisionTramite.php?idtramite='.$idtramite);

?>

