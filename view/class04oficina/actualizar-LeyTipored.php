<?php
  require 'model/class04oficina.php';
   $idtipoleytipored = $this->class04oficina->getTodasTipored();

  // Eliminamos todos sus permisos:
  eliminarTipored($idtramite);
  //$actividades = getTodasCategoriasactividades();
  // Reasignaremos sus permisos:
  foreach ($idtipoleytipored as $tipoleytipored):
    if( isset( $_POST['tipoleytipored'.$tipoleytipored[0]] ) )
      asignarTipored($idtramite, $tipoleytipored[0]);
  endforeach;

  header('Location: revisionTramite.php?idtramite='.$idtramite);

?>

