<?php $result = $this->classlistinspeccion2->listar(); ?>

<!-- LISTA LOS TRAMITES CON DISTRITO 567 -->

<div class="container-fluid">
  <div class="alert alert-success alert-dismissable">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <strong>¡Alerta!</strong> Si estas conectado desde un celular o tablet, preferiblemente utilícelo en forma horizontal.
  </div>

  <div class="container-fluid well">
    <center><h1>Lista de trámites</h1></center>
    <div class="alert alert-info alert-dismissable">
      <h2>Distritos: Samara, Nosara, Belen.</h2>
    </div>
  </div>

  <br>
  <br>
  <div class="container-fluid">
    <?php if ($result->num_rows): ?>
      <table class="display table table-bordered" cellpadding="0" cellspacing="0" border="0" width="100%" id="grilla-puestos">
        <thead>
          <tr>
            <th>Código de Trámite</th>
            <th>Fecha Ingreso al Sistema (aa/mm/dd)</th>
            <th>Fecha Ingreso a Plataforma (aa/mm/dd)</th>
            <th>Distrito</th>
          </tr>
        </thead>
        <tbody>
          <?php while ($row = mysqli_fetch_array($result)):?>
            <tr>
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
