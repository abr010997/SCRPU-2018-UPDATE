<?php 
$result = $this->class27cuinic->listar(); 

?>

  <div class="container">
    <center><h2>Listado de Ubicaciones en Nicoya</h2>   </center>
    <a href="?c=class27cuinic&m=agregar" class="btn btn-primary" role="button">Registrar Ubicación:</a>
    <br><br>    <br> 
    <?php if ($result->num_rows): ?>
      <table class="table table-bordered table-hover" id="grilla-cuinic">
        <thead>
          <tr>
            <th>Códgido de la Ubicación:</th>
            <th>Descripción de la Ubicación:</th>
            <th style="width: 120px;">Más</th>
          </tr>
        </thead>
        <tbody>
          <?php while ($row = mysqli_fetch_array($result)):?>
            <tr>
              <td><?php echo $row[0]; ?></td>
              <td><?php echo $row[1]; ?></td>
         
              <td><div class="dropdown">
                <button class="btn btn-info dropdown-toggle" type="button" data-toggle="dropdown">Opciones
                  <span class="caret"></span></button>
                  <ul class="dropdown-menu">
                    <li>
                        <a href="?c=class27cuinic&m=editar&id=<?php echo $row[0]; ?>">
                        <span class="glyphicon glyphicon-pencil"></span> Editar</a>
                    </li>
                    <li>
                      <a href="?c=class27cuinic&m=eliminar&id=<?php echo $row[0]; ?>">
                       <span class="glyphicon glyphicon-trash"></span> Eliminar</a>
                    </li>
                     <li>
                      <a href="?c=class27cuinic&m=ver&id=<?php echo $row[0]; ?>">
                       <span class="glyphicon glyphicon-eye-open"></span> ver</a>
                    </li>
                  </ul>
                </div></td>
              </tr>
            <?php endwhile; ?>
          <?php else: ?>
            <div class="alert alert-info">
              <center>
                <strong>¡Información!</strong> No hay información registrada.
              </center>
            </div>
          <?php endif ?>
        </tbody>
      </table>
    </div>
