<?php
  require 'model/class04oficina.php';
   $idtipoleyaspectosbio = $this->class04oficina->getTodasAspectosbio();

  // Eliminamos todos sus permisos:
  eliminarAspectosbio($idtramite);
  //$actividades = getTodasCategoriasactividades();
  // Reasignaremos sus permisos:
  foreach ($idtipoleyaspectosbio as $tipoleyaspectosbio):
    if( isset( $_POST['tipoleyaspectosbio'.$tipoleyaspectosbio[0]] ) )
      asignarAspectosbio($idtramite, $tipoleyaspectosbio[0]);
  endforeach;

  header('Location: revisionTramite.php?idtramite='.$idtramite);

?>

