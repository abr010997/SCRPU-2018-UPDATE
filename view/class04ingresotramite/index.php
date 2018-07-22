<?php $result = $this->class04ingresotramite->listar(); ?>

        <h2>Trámites Ingresados</h2>   
    <a href="?c=class04ingresotramite&m=agregar"  class="btn btn-primary" role="button">Registrar Trámite</a>
   <br> <br><!-- 
   <a href="?c=class04ingresotramite&m=graficoBarras"  class="btn btn-info" role="button">Graficar Trámite</a>
   <a href="?c=class04ingresotramite&m=Barras"  class="btn btn-info" role="button">Graficar </a>
   <br><br> -->
   <br>   
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
                    <!-- <li>
                        <a href="?c=class04ingresotramite&m=editar&id=<?php echo $row[0]; ?>">
                        <span class="glyphicon glyphicon-pencil"></span> Editar</a>
                    </li>
                    <li>
                      <a href="?c=class04ingresotramite&m=eliminar&id=<?php echo $row[0]; ?>">
                       <span  class="glyphicon glyphicon-trash"></span> Eliminar</a>
                    </li>
                     <li>
                      <a href="?c=class04ingresotramite&m=ver&id=<?php echo $row[0]; ?>">
                       <span class="glyphicon glyphicon-eye-open"></span> ver</a>
                    </li>
                      <li>
                      <a href="?c=class04inspeccion&m=agregar&id=<?php echo $row[0]; ?>">
                       <span class="glyphicon glyphicon-eye-open"></span> Trámite</a>
                    </li> -->
                  </ul>
                </div></td>
              </tr>
            <?php endwhile; ?>
          <?php else: ?>
            <div style="background-color:#b2ff59" class="alert alert-info">
              <center>
                <strong>¡Información!</strong> No hay información sobre Trámites.
              </center>
            </div>
          <?php endif ?>
        </tbody>
      </table>

   
