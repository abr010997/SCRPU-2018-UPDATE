<?php $result = $this->class04ingresotramite->listarD567(); ?>

<div class="container-fluid">
  <div class="alert alert-success alert-dismissable">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <strong>¡Alerta!</strong> Si estas conectado desde un celular o tablet, preferiblemente utilícelo en forma horizontal.
  </div>


  <div class="container-fluid well">

    <center><h1>Inspección</h1></center>
    <div class="alert alert-info alert-dismissable">
      <h2>Trámites listos para inspeccionar</h2>
      <h2>Distritos: Samara, Nosara, Belen.</h2>
    </div>
  </div>
  <br>
  <br>
  <div class="container-fluid well">
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
                      <a href="?c=class04inspeccion&m=agregarTrausutra&id=<?php echo $row[0]; ?>">
                        <span class="glyphicon glyphicon-pencil"></span> Guardar Inspección</a>
                      </li>
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
                  <strong>¡Información!</strong> No hay información sobre Trámites.
                </center>
              </div>
            <?php endif ?>
          </tbody>
        </table>
      </div>
    </div>
