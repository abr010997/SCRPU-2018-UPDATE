<?php $result = $this->class0102usuarios->listar(); ?>

  <center><h2>Listado de usuarios</h2></center>   
  <a  href="?c=class0102usuarios&m=agregar" class="btn btn-primary" role="button">Registrar usuario</a>    
  <br>
  <br>    
  <?php if ($result->num_rows): ?>
    <table class="display table table-bordered" cellpadding="0" cellspacing="0" border="0" width="100%" id="grilla-usuarios">
      <thead>
        <tr>
          <th>Cédula</th>
          <th>Nombre</th>
          <th>Primer Apellido</th>
          <th>Segundo Apellido</th>
          <th>Teléfono</th>
          <th>Correo</th>
          <th>Puesto</th>           
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
          <td><?php echo $row[5]; ?></td>
          <td><?php echo $row[6]; ?></td>    
          <td>
            <div class="dropdown">
              <button class="btn btn-info dropdown-toggle" type="button" data-toggle="dropdown">Opciones<span class="caret"></span></button>
                <ul class="dropdown-menu">
                  <li><a href="?c=class0102usuarios&m=editar&id=<?php echo $row[0]; ?>"><span class="glyphicon glyphicon-pencil"></span> Editar</a></li>
                  <li><a href="?c=class0102usuarios&m=eliminar&id=<?php echo $row[0]; ?>"><span class="glyphicon glyphicon-trash"></span> Eliminar</a></li>
                  <li><a href="?c=class0102usuarios&m=ver&id=<?php echo $row[0]; ?>"><span class="glyphicon glyphicon-eye-open"></span> ver</a></li>
                </ul>
            </div></td>
          </tr>
          <?php endwhile; ?>
          <?php else: ?>
        <div style="background-color:#b2ff59" class="alert alert-info">
          <center><strong>¡Información!</strong> No hay usuarios registrados.</center>
        </div>
        <?php endif ?>
    </tbody>
  </table>

