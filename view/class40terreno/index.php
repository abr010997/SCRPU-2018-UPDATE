<?php $result = $this->class40terreno->listar(); ?>

<div class="alert alert-success alert-dismissable">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
  <strong>¡Alerta!</strong> Si estas conectado desde un celular o tablet, preferiblemente utilícelo en forma horizontal.
</div>

<div class="container-fluid well">
  <h2>Terrenos Ingresados</h2>
  <a  href="?c=class40terreno&m=agregar" class="btn btn-primary" role="button">Registrar Terreno</a>
</div>
<br>
<br>

<div class="container-fluid">
  <?php if ($result->num_rows): ?>
    <table class="display table table-bordered" cellpadding="0" cellspacing="0" border="0" width="100%" id="grilla-usuarios">
      <thead>

        <tr>
          <th>Número Finca</th>
          <th>Catastro</th>
          <th>Distrito</th>
          <th>Barrio</th>
          <th>Dirreción</th>


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
                <button class="btn btn-info dropdown-toggle" type="button" data-toggle="dropdown">Opciones<span class="caret"></span></button>
                <ul class="dropdown-menu">
                  <li><a href="?c=class40terreno&m=editar&id=<?php echo $row[0]; ?>"><span class="glyphicon glyphicon-pencil"></span> Editar</a></li>
                  <!-- <li><a href="?c=class40terreno&m=eliminar&id=<?php echo $row[0]; ?>"><span class="glyphicon glyphicon-trash"></span> Eliminar</a></li> -->
                  <li><a href="?c=class40terreno&m=ver&id=<?php echo $row[0]; ?>"><span class="glyphicon glyphicon-eye-open"></span> ver</a></li>
                </ul>
              </div></td>
            </tr>
          <?php endwhile; ?>
        <?php else: ?>
          <div class="alert alert-info">
            <center><strong>¡Información!</strong> No hay terrenos registrados.</center>
          </div>
        <?php endif ?>
      </tbody>
    </table>
  </div>
