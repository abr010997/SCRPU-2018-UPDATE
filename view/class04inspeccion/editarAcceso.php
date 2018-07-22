<?php $idterrenofr = $this->pu04inspeccion->getTodasTerrenoFR(); ?>
<?php $idservicios = $this->pu04inspeccion->getTodasServicios(); ?>
<?php $idtiporedv = $this->pu04inspeccion->getTodasTipoRed(); ?>

<h4>Realizando estudio al trámite</h4>

<div class="col-xs-2">
  <input type="text" class="form-control" id="id" name="id" value="<?php echo $this->pu04inspeccion->getAtributo('PU04IDTRA');?>" readonly> <?php  $idtramite = $this->pu04inspeccion->getAtributo('PU04IDTRA'); ?>
</div>
<br>
<div id="parentVerticalTab">
  <ul class="resp-tabs-list hor_1">
    <li href="#tabconten1">Acceso Calle Publica</li>
    <li href="#tabconten2">Servicios disponibles</li>
    <li href="#tabconten3">:v</li>
    <li href="#tabconten4">:v</li>
    <li href="#tabconten5">:v </li>
    <li href="#tabconten6">:v </li>
    <li href="#tabconten7">:'v</li>
    <li href="#tabconten8">Tipo de Red Vial</li>
  </ul> 
  <div class="resp-tabs-container hor_1">
    <div class="container-fluid" id="tabconten1">
      <!-- contenido de tab 1 -->
            <form method="POST" action="?c=class04inspeccion&m=editarTerrenoFR">
          <div class="form-group">
            <label for="id">Código Trámite</label>
            <input type="text" class="form-control" id="id" name="id" value="<?php echo $this->pu04inspeccion->getAtributo('PU04IDTRA');?>" readonly> 
            <?php  $idtramite = $this->pu04inspeccion->getAtributo('PU04IDTRA'); ?>
          </div>
          <?php foreach( $idterrenofr as $idterrenoFR ): ?>
          <?php $isCheck = $this->pu04inspeccion->tieneTerrenoFR($idtramite, $idterrenoFR['PU07IDTFR']);?>
          <div class="checkbox">
            <label>
            <input type="checkbox" name="idterreno<?php echo $idterrenoFR['PU07IDTFR']; ?>"
             <?php if($isCheck['total3']) {echo "checked";} ?>
            /> <?php echo $idterrenoFR['PU07NOMTFR'] ;?>
            </label>
          </div>
          <?php endforeach; ?>
          <button type="submit" class="btn btn-success">Guardar</button>
          <br>
        </form>


    </div>
    <div class="container-fluid" id="tabconten2">
      <!-- contenido de tab 2 -->
      <form method="POST" action="?c=class04inspeccion&m=editarServicios">
          <div class="form-group">
            <label for="id">Código Trámite</label>
            <input type="text" class="form-control" id="id" name="id" value="<?php echo $this->pu04inspeccion->getAtributo('PU04IDTRA');?>" readonly> 
            <?php  $idtramite = $this->pu04inspeccion->getAtributo('PU04IDTRA'); ?>
          </div>

          <?php foreach( $idservicios as $servicios ): ?>
          <?php $isCheck = $this->pu04inspeccion->tieneServicios($idtramite, $servicios['PU21IDSERVI']);?>
          <div class="checkbox">
            <label>
            <input type="checkbox" name="idservicio<?php echo $servicios['PU21IDSERVI']; ?>"
             <?php if($isCheck['total6']) {echo "checked";} ?>
            /> <?php echo $servicios['PU21DESCSERVI'] ;?>
            </label>
          </div>
          <?php endforeach; ?>
          <button type="submit" class="btn btn-success">Guardar</button>
          <br>
        </form>

    </div>
    <div class="container-fluid" id="tabconten3">
      <!-- contenido de tab 3 -->


    </div>
    <div class="container-fluid" id="tabconten4">
      <!-- contenido de tab 4 -->
      

    </div>
    <div class="container-fluid" id="tabconten5">
      <!-- contenido de tab 5 -->



    </div>
    <div class="container-fluid" id="tabconten6">
      <!-- contenido de tab 6 -->

  


    </div>

    <div class="container-fluid" id="tabconten7">
      <!-- contenido de tab 7 -->

      
    </div>

    <div class="container-fluid" id="tabconten8">
      <!-- contenido de tab 8 -->
      <form method="POST" action="?c=class04inspeccion&m=editarTipoRed">
          <div class="form-group">
            <label for="id">Código Trámite</label>
            <input type="text" class="form-control" id="id" name="id" value="<?php echo $this->pu04inspeccion->getAtributo('PU04IDTRA');?>" readonly> 
            <?php  $idtramite = $this->pu04inspeccion->getAtributo('PU04IDTRA'); ?>
          </div>
          <?php foreach( $idtiporedv as $idtipored ): ?>
          <?php $isCheck = $this->pu04inspeccion->tieneTipoRed($idtramite, $idtipored['PU22IDTREDV']);?>
          <div class="checkbox">
            <label>
            <input type="checkbox" name="idtiporedvial<?php echo $idtipored['PU22IDTREDV']; ?>"
             <?php if($isCheck['total8']) {echo "checked";} ?>
            /> <?php echo $idtipored['PU22DESCTRV'] ;?>
            </label>
          </div>
          <?php endforeach; ?>
          <button type="submit" class="btn btn-success ">Guardar</button>
          <br>
        </form>
    </div>



  </div>
</div>
<br/>
<div id="nested-tabInfo2">
   Tab Seleccionado: <span class="tabName"></span>
</div>
<br/>
<br/>

