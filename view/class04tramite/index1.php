<?php $result = $this->class04tramite->listarAceptados1(); ?>

    <div class="container-fluid">
         
   <h2> Trámites Aceptados </h2>   
   
    <br><br>    
    <?php if ($result->num_rows): ?>
      <table class="display table table-bordered" cellpadding="0" cellspacing="0" border="0" width="100%" id="grilla-puestos">
        <thead>
          <tr>
            <th>Número de Trámite</th>
            
          
          </tr>
        </thead>
        <tbody>
          <?php while ($row = mysqli_fetch_array($result)):?>
            <tr>
              <td><?php echo $row[0]; ?></td>
              
              
             
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
