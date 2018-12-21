<?php $result = $this->classlistinspeccion1->listar(); ?>

<!-- LISTA LOS TRAMITES CON DISTRITOS 1234  -->
    <?php if ($result->num_rows): ?>
        <table class="display table table-bordered" cellpadding="0" cellspacing="0" border="0" width="100%">
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
                <strong>¡Información!</strong> No hay información.
              </center>
            </div>
          <?php endif ?>
        </tbody>
      </table>
