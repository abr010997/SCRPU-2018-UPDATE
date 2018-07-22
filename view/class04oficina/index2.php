<?php $result = $this->class04oficina->listar(); ?>

        <h2>Listado de Trámites con Oficina realizada</h2>   
    <!--<a href="?c=class04oficina&m=agregar"  class="btn btn-primary" role="button">Guardar Información Oficina</a>
   <br> <br>
       <h2>Listado de Trámites</h2>   
    <a href="?c=class04oficina&m=index1" class="btn btn-primary" role="button">Ver Trámites Inspecionados</a>
    <br><br>   --> 
   <br>   
    <?php if ($result->num_rows): ?>
      <div class="col-md-12" style="overflow-x: scroll;">
      <table class="display table table-bordered" cellpadding="0" cellspacing="0" border="0" width="100%" id="grilla-oficina">
        <thead>
          <tr>
            <th style="width: 120px;">Más</th>
            <th>Id Trámite</th>
            <th>Cédula Solicitante</th>
            <th>Nombre Solicitante</th>
            <th>1° Apellido Solicitante</th>
            <th>2° Apellido Solicitante</th>
            <th>Distrito Solicitante</th>
            <th>Barrio Solicitante</th>
            <th>Dirección Solicitante</th>

            <th>Cédula Propietario</th>
            <th>Nombre Propietario</th>
            <th>1° Apellido Propietario</th>
            <th>2° Apellido Propietario</th>
            <th>Plano Propietario</th>
            <th>Finca</th>
            
          </tr>
        </thead>
        <tbody>
          <?php while ($row = mysqli_fetch_array($result)):?>
            <tr>
              <td><div class="dropdown">
                <button class="btn btn-info dropdown-toggle" type="button" data-toggle="dropdown">Opciones
                  <span class="caret"></span></button>
                  <ul class="dropdown-menu">
                    <!-- <li>
                        <a href="?c=class04inspeccion&m=agregarTra&id=<?php echo $row[0]; ?>">
                        <span class="glyphicon glyphicon-pencil"></span> Guardar Inspección</a>
                    </li> -->
                    <li>
                        <a href="?c=class04oficina&m=editar&id=<?php echo $row[0]; ?>">
                        <span class="glyphicon glyphicon-pencil"></span> Editar Oficina</a>
                    </li>
                    
                  </ul>
                </div></td>
              <td><?php echo $row[0]; ?></td>
              <td><?php echo $row[1]; ?></td>
               <td><?php echo $row[2]; ?></td>
               <td><?php echo $row[3]; ?></td>
              <td><?php echo $row[4]; ?></td>
               <td><?php echo $row[5]; ?></td>
               <td><?php echo $row[6]; ?></td>
               <td><?php echo $row[7]; ?></td>

               <td><?php echo $row[8]; ?></td>
               <td><?php echo $row[9]; ?></td>
               <td><?php echo $row[10]; ?></td>
               <td><?php echo $row[11]; ?></td>
               <td><?php echo $row[12]; ?></td>
               <td><?php echo $row[13]; ?></td>
            
              
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
 </div>
   
