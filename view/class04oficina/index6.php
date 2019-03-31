<?php $result = $this->class04oficina->listarTraInspector(); ?>
<div class="container-fluid">
  <div class="alert alert-success alert-dismissable">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <strong>¡Alerta!</strong> Si estas conectado desde un celular o tablet, preferiblemente utilícelo en forma horizontal.
  </div>


  <div class="container-fluid well">

    <center><h1>Oficina</h1></center>
    <div class="alert alert-info alert-dismissable">
      <h2>Trámites listos para realizar Oficina</h2>
    </div>
  </div>
  <br>
  <br>
    <?php if ($result->num_rows): ?>
      <table class="display table table-bordered" cellpadding="0" cellspacing="0" border="0" width="100%" id="grilla-puestos">
        <thead>
          <tr>
            <th style="width: 120px;">Más</th>
            <th>Código de Trámite</th>
            <th>Fecha de ingreso</th>
            <th>Fecha de Plataforma</th>
             <th>Distrito</th>
          </tr>
        </thead>
        <tbody>
          <?php while ($row = mysqli_fetch_array($result)):?>
            <tr>
              <td><div class="dropdown">
                <button class="btn btn-info dropdown-toggle" type="button" data-toggle="dropdown">Opciones
                  <span class="caret"></span></button>
                  <ul class="dropdown-menu">
                    <li>
                        <a href="?c=class04oficina&m=agregar&id=<?php echo $row[0]; ?>">
                        <span class="glyphicon glyphicon-pencil"></span> Guardar Oficina</a>
                    </li>
                    <!--<li>
                        <a href="?c=class04inspeccion&m=editarActividades&id=<?php echo $row[0]; ?>">
                        <span class="glyphicon glyphicon-pencil"></span> Editar</a>
                    </li>-->
                    <!-- <li>
                        <a href="?c=class04inspeccion&m=editarPermisos&id=<?php echo $row[0]; ?>">
                        <span class="glyphicon glyphicon-pencil"></span> Editar</a>
                    </li>
                    <li>
                      <a href="?c=class04inspeccion&m=eliminar&id=<?php echo $row[0]; ?>">
                       <span  class="glyphicon glyphicon-trash"></span> Eliminar</a>
                    </li>
                     <li>
                      <a href="?c=class04inspeccion&m=ver&id=<?php echo $row[0]; ?>">
                       <span class="glyphicon glyphicon-eye-open"></span> ver</a>
                    </li>>
                     <li>
                      <a href="?c=class04inspeccion&m=agregar&id=<?php echo $row[0]; ?>">
                       <span class="glyphicon glyphicon-eye-open"></span> Trámite</a>
                    </li>-->
                   <!-- <li>
                      <a href="?c=class04inspeccion&m=editarAcceso&id=<?php echo $row[0]; ?>">
                       <span class="glyphicon glyphicon-eye-open"></span> Inspeccionar</a>
                    </li>-->
                  </ul>
                </div></td>
              <td><?php echo $row[0]; ?></td>
              <td><?php echo $row[1]; ?></td>
              <td><?php echo $row[2]; ?></td>
              <td><?php echo $row[3]; ?></td>
              </tr>
            <?php endwhile; ?>
          <?php else: ?>
            <div class="alert alert-info">
              <center>
                <strong>¡Información!</strong> No hay información sobre trámites.
              </center>
            </div>
          <?php endif ?>
        </tbody>

      </table>

    </div>
