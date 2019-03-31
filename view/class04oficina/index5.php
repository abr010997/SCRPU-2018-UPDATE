<?php $result = $this->class04oficina->listarIgnTra(); ?>

<div class="container-fluid">
  <h2> Trámites Rápidos Pendientes</h2>
  <div class="alert alert-success alert-dismissable">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <strong>¡Alerta!</strong> Si estas conectado desde un celular o tablet, preferiblemente utilícelo en forma horizontal.
  </div>



  <br>
  <br>
  <div class="container-fluid">
    <?php if ($result->num_rows): ?>
      <table class="display table table-bordered" cellpadding="0" cellspacing="0" border="0" width="100%" id="grilla-puestos">
        <thead>
          <tr>
            <th>Código de Trámite</th>
            <th>Fecha de ingreso</th>
            <th>Fecha de Plataforma</th>
            <th>Distrito</th>
            <th>Opción</th>
            
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
                      <a href="?c=class04oficina&m=agregarTrausutra&id=<?php echo $row[0]; ?>">
                        <span class="glyphicon glyphicon-pencil"></span>Inspección Rápida</a>
                      </li>
                    </ul>
                  </div></td> 







                </tr>
              <?php endwhile; ?>
            <?php else: ?>
              <div class="alert alert-info">
                <center>
                  <strong>¡Información!</strong> No hay información sobre Trámites.
                </center>
              </div>
            <?php endif ?>
          </tbody>
        </table>
      </div>
    </div>
