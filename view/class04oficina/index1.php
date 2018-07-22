<?php $result = $this->class04oficina->listarTraRealizado(); ?>

    <div class="container-fluid">
        <h2> Trámites Inspeccionados</h2>   
    <a href="?c=class04oficina&m=index" class="btn btn-primary" role="button">Regresar</a>
   
    <br><br>    
    <?php if ($result->num_rows): ?>
      <table class="display table table-bordered" cellpadding="0" cellspacing="0" border="0" width="100%" id="grilla-puestos">
        <thead>
          <tr>
            <th>Trámite</th>
            <th>Fecha Inspección</th>
            <th>Este</th>
            <th>Norte</th>
            <th>Altitud</th>
            <th style="width: 120px;">Más</th>
          </tr>
        </thead>
        <tbody>
          <?php while ($row = mysqli_fetch_array($result)):?>
            <tr>
              <td><?php echo $row[0]; ?></td>
              <td><?php echo $row[1]; ?></td>
              <td><?php echo $row[2]; ?></td>
              <td><?php echo $row[3]; ?></td>
              <td><?php echo $row[4]; ?></td>
              
              <td>
                <div class="dropdown">
                <button class="btn btn-info dropdown-toggle" type="button" data-toggle="dropdown">Opciones
                  <span class="caret"></span></button>
                  <ul class="dropdown-menu">
                    <li>
                        <a href="?c=class04inspeccion&m=editarActividades&id=<?php echo $row[0]; ?>">
                        <span class="glyphicon glyphicon-pencil"></span> Editar</a>
                    </li>
                    <!-- <li>
                        <a href="?c=class04inspeccion&m=editarPermisos&id=<?php echo $row[0]; ?>">
                        <span class="glyphicon glyphicon-pencil"></span> Editar</a>
                    </li> -->
                    <li>
                      <a href="?c=class04inspeccion&m=eliminar&id=<?php echo $row[0]; ?>">
                       <span  class="glyphicon glyphicon-trash"></span> Eliminar</a>
                    </li>
                     <li>
                      <a href="?c=class04inspeccion&m=ver&id=<?php echo $row[0]; ?>">
                       <span class="glyphicon glyphicon-eye-open"></span> ver</a>
                    </li>
                     <li>
                      <a href="?c=class04inspeccion&m=agregar&id=<?php echo $row[0]; ?>">
                       <span class="glyphicon glyphicon-eye-open"></span> Inspección</a>
                    </li>
                  </ul>
                </div></td>
              </tr>
            <?php endwhile; ?>
          <?php else: ?>
            <div style="background-color:#b2ff59" class="alert alert-info">
              <center>
                <strong>¡Información!</strong> No hay información sobre trámites.
              </center>
            </div>
          <?php endif ?>
        </tbody>

      </table>

    </div>
