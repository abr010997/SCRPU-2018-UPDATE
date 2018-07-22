<?php $result = $this->pu04inspeccion->listar(); ?>

    <div class="container-fluid">
        <h2>Listado de Trámites</h2>   
    <a href="?c=class04inspeccion&m=index1" class="btn btn-primary" role="button">Ver Trámites Inspecionados</a>
    <br><br>    
    <?php if ($result->num_rows): ?>
      <table class="display table table-bordered" cellpadding="0" cellspacing="0" border="0" width="100%" id="grilla-puestos">
        <thead>
          <tr>
            <th>Código de Trámite</th>
            <th>Fecha de ingreso</th>
            <th>Fecha de Plataforma</th>
             <th>Distrito</th>
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
              <td><div class="dropdown">
                <button class="btn btn-info dropdown-toggle" type="button" data-toggle="dropdown">Opciones
                  <span class="caret"></span></button>
                  <ul class="dropdown-menu">
                    <li>
                        <a href="?c=class04inspeccion&m=agregarTra&id=<?php echo $row[0]; ?>">
                        <span class="glyphicon glyphicon-pencil"></span> Guardar Inspección</a>
                    </li>
                    <li>
                        <a href="?c=class04inspeccion&m=editarActividades&id=<?php echo $row[0]; ?>">
                        <span class="glyphicon glyphicon-pencil"></span> Editar</a>
                    </li>
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
                    <li>
                      <a href="?c=class04inspeccion&m=editarAcceso&id=<?php echo $row[0]; ?>">
                       <span class="glyphicon glyphicon-eye-open"></span> Inspeccionar</a>
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
