
    <br>
    <center>
<h2>Características a Estudiar.</h2>
</center><br>



    <div id="parentHorizontalTab">
            <ul class="resp-tabs-list hor_1">
                <li href="#tabcontenido1">Espacio Geográfico</li>
                <li href="#tabcontenido2">Aspectos Biofísicos</li>
                <li href="#tabcontenido3">Afectación de Áreas Protección</li>
                <li href="#tabcontenido4">Actividades a Desarrollar</li>
                <li href="#tabcontenido5">Terreno Frente a Ruta</li>
                <li href="#tabcontenido6">Desarrollo en el Sector</li>
            </ul>

            <div class="resp-tabs-container hor_1">


                <div class="container-fluid" id="tabcontenido1">
<!--//////////////////////////////////////////////////////////////////////////////////////////////-->                          
           <form method="POST" action="?c=class04inspeccion&m=agregarespaciogeo">
                   <?php $result = $this->pu09tradeg->listar(); ?>
          <div class="form-group">
            <label for="id">Código Trámite</label>
            <input type="text" class="form-control" id="id" name="id" value="<?php echo $this->pu04inspeccion->getAtributo('PU04IDTRA');?>" readonly> 
            <?php  $idtramite = $this->pu04inspeccion->getAtributo('PU04IDTRA'); ?>
          </div>


         <p><b>Descripción del Espacio Geográfico :</b></p>
      <?php while ($row = mysqli_fetch_array($result)):?>
        <label class="checkbox-inline">
          <input type="checkbox" value="<?php echo $row['PU09IDDEG'];?>" name="pu09tradeg[]"><?php echo $row['PU09DESCREG']; ?>
        </label>
      <?php endwhile; ?><br>


          <button type="submit" class="btn btn-success">Guardar</button>
          <br>
        </form>
<!--//////////////////////////////////////////////////////////////////////////////////////////////-->
                </div>
                <div class="container-fluid" id="tabcontenido2">
<!--//////////////////////////////////////////////////////////////////////////////////////////////-->
     
    <form method="POST" action="?c=class04inspeccion&m=agregarespaciogeo">
                   
          <div class="form-group">
            <label for="id">Código Trámite</label>
            <input type="text" class="form-control" id="id" name="id" value="<?php echo $this->pu04inspeccion->getAtributo('PU04IDTRA');?>" readonly> 
            <?php  $idtramite = $this->pu04inspeccion->getAtributo('PU04IDTRA'); ?>
          </div>
          <button type="submit" class="btn btn-success">Guardar</button>
          <br>
        </form>
<!--//////////////////////////////////////////////////////////////////////////////////////////////-->
                </div>
                <div class="container-fluid" id="tabcontenido3">
<!--//////////////////////////////////////////////////////////////////////////////////////////////-->
            <form method="POST" action="?c=class04inspeccion&m=agregarespaciogeo">
                   
          <div class="form-group">
            <label for="id">Código Trámite</label>
            <input type="text" class="form-control" id="id" name="id" value="<?php echo $this->pu04inspeccion->getAtributo('PU04IDTRA');?>" readonly> 
            <?php  $idtramite = $this->pu04inspeccion->getAtributo('PU04IDTRA'); ?>
          </div>
          <button type="submit" class="btn btn-success">Guardar</button>
          <br>
        </form>
<!--//////////////////////////////////////////////////////////////////////////////////////////////-->
                </div>
                  <div class="container-fluid" id="tabcontenido4">
<!--//////////////////////////////////////////////////////////////////////////////////////////////-->
 <form method="POST" action="?c=class04inspeccion&m=agregarespaciogeo">
                   
          <div class="form-group">
            <label for="id">Código Trámite</label>
            <input type="text" class="form-control" id="id" name="id" value="<?php echo $this->pu04inspeccion->getAtributo('PU04IDTRA');?>" readonly> 
            <?php  $idtramite = $this->pu04inspeccion->getAtributo('PU04IDTRA'); ?>
          </div>
          <button type="submit" class="btn btn-success">Guardar</button>
          <br>
        </form>
<!--//////////////////////////////////////////////////////////////////////////////////////////////-->
                </div>
                  <div class="container-fluid" id="tabcontenido5">
<!--//////////////////////////////////////////////////////////////////////////////////////////////-->
 <form method="POST" action="?c=class04inspeccion&m=agregarespaciogeo">
                   
          <div class="form-group">
            <label for="id">Código Trámite</label>
            <input type="text" class="form-control" id="id" name="id" value="<?php echo $this->pu04inspeccion->getAtributo('PU04IDTRA');?>" readonly> 
            <?php  $idtramite = $this->pu04inspeccion->getAtributo('PU04IDTRA'); ?>
          </div>
          <button type="submit" class="btn btn-success">Guardar</button>
          <br>
        </form>
<!--//////////////////////////////////////////////////////////////////////////////////////////////-->
                </div>
                  <div class="container-fluid" id="tabcontenido6">
<!--//////////////////////////////////////////////////////////////////////////////////////////////-->
 <form method="POST" action="?c=class04inspeccion&m=agregarespaciogeo">
                   
          <div class="form-group">
            <label for="id">Código Trámite</label>
            <input type="text" class="form-control" id="id" name="id" value="<?php echo $this->pu04inspeccion->getAtributo('PU04IDTRA');?>" readonly> 
            <?php  $idtramite = $this->pu04inspeccion->getAtributo('PU04IDTRA'); ?>
          </div>
          <button type="submit" class="btn btn-success">Guardar</button>
          <br>
        </form>
<!--//////////////////////////////////////////////////////////////////////////////////////////////-->
                </div>
            </div>
        </div>

        <br/>
        <div id="nested-tabInfo">
            Tab seleccionado: <span class="tabName"></span>
        </div>
        <br/>
        <br/>
