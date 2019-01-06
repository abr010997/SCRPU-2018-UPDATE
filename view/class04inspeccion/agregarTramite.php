<?php $idactividades = $this->pu04inspeccion->getTodasActividades(); ?>
<?php $idespacios = $this->pu04inspeccion->getTodasEspaciosGeo(); ?>

<?php $iddesarrollosec = $this->pu04inspeccion->getTodasDesarrolloSec(); ?>
<?php $idaspectosbio = $this->pu04inspeccion->getTodasAspectosBio(); ?>

<?php $idareas = $this->pu04inspeccion->getTodasAreasPro(); ?>
<?php $idtiporedv = $this->pu04inspeccion->getTodasTipoRed(); ?>
<?php $idtipopatentes = $this->pu04inspeccion->getTodasPatente(); ?>
<?php $iddesarrollos = $this->pu04inspeccion->getTodasActividadesDesarrollo(); ?>
<?php $iddesarrollos3 = $this->pu04inspeccion->getTodasActividadesComercial(); ?>
<?php $iddesarrollos4 = $this->pu04inspeccion->getTodasActividadesComercialIndustrial(); ?>
<?php $iddesarrollos5 = $this->pu04inspeccion->getTodasActividadesEstacionDeServicio(); ?>
<?php $idaccesos = $this->pu04inspeccion->getTodasAcceso(); ?>

<?php $idaccesos2 = $this->pu04inspeccion->getTodasAcceso2(); ?>




<div class="alert alert-success alert-dismissable">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
  <strong>¡Alerta!</strong> Si estas conectado desde un celular o tablet, preferiblemente utilícelo en forma horizontal.
</div>

<center><h4>Realizando Inspección</h4></center>

<form method="POST" action="?c=class04inspeccion&m=agregarTra">
  <div class="container-fluid well">
    <div class="alert alert-info alert-dismissable">
      <button type="button" class="close" data-dismiss="alert">&times;</button>
      <strong>¡Alerta!</strong> Pasos a seguir.
      <br>
      <ul>
        <li>Registrar las coordenadas geografías.</li>
      </ul>
    </div>

    <div class="form-group row ">
      <h4>Realizando estudio al Trámite:</h4>
      <div class="col-xs-2">
        <input type="text" class="form-control" id="id" name="id" value="<?php echo $this->pu04inspeccion->getAtributo('PU04IDTRA');?>"  readonly> <?php  $idtramite = $this->pu04inspeccion->getAtributo('PU04IDTRA'); ?>
      </div>
    </div>
    <br>

    <div class="form-group row ">
      <div class=" col-xs-2 text-left">
        <label for="PU04NORTE">Norte:</label>
        <input type="number" class="form-control" id="PU04NORTE" name="PU04NORTE"  placeholder="Norte" max="99999999999"  required>
      </div>

      <div class="col-xs-2 text-left">
        <label for="PU04ESTE">Este:</label>
        <input type="number" class="form-control" id="PU04ESTE" name="PU04ESTE" placeholder="Este"  max="99999999999" required>
      </div>

      <div class="col-xs-2 text-left">
        <label for="PU04ALTITUD">Altitud:</label>
        <input type="number" class="form-control" id="PU04ALTITUD" name="PU04ALTITUD" placeholder="Altitud" max="99999999999"  required>
        <br>
      </div>
    </div>
    <button type="submit" class="btn btn-success ">Guardar</button>
    <a href="?c=class04inspeccion&m=index2" class="btn btn-danger" role="button">Regresar</a>
    <br>
  </div>

</form>

<br>
<div class="container-fluid">
  <div id="parentVerticalTab">
    <ul class="resp-tabs-list hor_1">
      <li href="#tabconten1">Espacio Geográfico</li>
      <li href="#tabconten2">Aspectos Biofísicos</li>
      <li href="#tabconten6">Desarrollo en el Sector</li>
      <li href="#tabconten7">Tipo de Red Vial</li>
      <li href="#tabconten8">Patentes</li>
      <li href="#tabconten10">Acceso Servidumbre de Paso</li>
      <li href="#tabconten11">Acceso Servidumbre Agrícola</li>
      <li href="#tabconten00">Afectación de Áreas de Protección</li>
      <li href="#tabconten9">Observaciones</li>
    </ul>

    <div class="resp-tabs-container hor_1">

      <div class="container-fluid" id="tabconten1">
        <div class="container-fluid">
        <form method="POST" action="?c=class04inspeccion&m=editarEspaciosGeo">
          <div class="alert alert-info alert-dismissable">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong>¡Alerta!</strong> Pasos a seguir.
            <br>
            <ul>
              <li>Registrar los espacios geográficos y observación.</li>
            </ul>
          </div>

          <div class="form-group">
            <label for="id">Código Trámite</label>
            <input type="text" class="form-control" id="id" name="id" value="<?php echo $this->pu04inspeccion->getAtributo('PU04IDTRA');?>" readonly>
            <?php  $idtramite = $this->pu04inspeccion->getAtributo('PU04IDTRA'); ?>
          </div>

          <?php foreach( $idespacios as $espacio ): ?>
            <?php $isCheck = $this->pu04inspeccion->tieneEspaciosGeo($idtramite, $espacio['PU09IDDEG']);?>
            <div class="checkbox">
              <label>
                <input type="checkbox" name="idespacio<?php echo $espacio['PU09IDDEG']; ?>"
                <?php if($isCheck['total1']) {echo "checked";} ?>
                /> <?php echo $espacio['PU09DESCREG'] ;?>
              </label>
            </div>
          <?php endforeach; ?>
          <button type="submit" class="btn btn-success">Guardar</button>
        </form>

        <form method="POST" action="?c=class04inspeccion&m=guardarObservacionDesceg">

          <div class="form-group">
            <label for="id">Código Trámite</label>
            <input type="text" class="form-control" id="id" name="id" value="<?php echo $this->pu04inspeccion->getAtributo('PU04IDTRA');?>" readonly>
            <?php  $idtramite = $this->pu04inspeccion->getAtributo('PU04IDTRA'); ?>
          </div>

          <div class="container-fluid">
            <div class="col-xs-9">
              <label for="PU09OBSERVACIONES">Otra descripción de Espacios Geográficos:</label>
              <textarea class="form-control" id="PU09OBSERVACIONES" name="PU09OBSERVACIONES" rows="5"></textarea><br>
            </div>
          </div>
          <button type="submit" class="btn btn-success">Guardar descripción</button>
        </form>
      </div>
    </div>


    <div class="container-fluid" id="tabconten2">
      <div class="container-fluid" >
        <form method="POST" action="?c=class04inspeccion&m=editarAspectosBio">

          <div class="alert alert-info alert-dismissable">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong>¡Alerta!</strong> Pasos a seguir.
            <br>
            <ul>
              <li>Registrar los aspectos biofísicos y observación.</li>
            </ul>
          </div>

          <div class="form-group">
            <label for="id">Código Trámite</label>
            <input type="text" class="form-control" id="id" name="id" value="<?php echo $this->pu04inspeccion->getAtributo('PU04IDTRA');?>" readonly>
            <?php  $idtramite = $this->pu04inspeccion->getAtributo('PU04IDTRA'); ?>
          </div>

          <?php foreach( $idaspectosbio as $idaspecto ): ?>
            <?php $isCheck = $this->pu04inspeccion->tieneAspectosBio($idtramite, $idaspecto['PU10IDASBIO']);?>
            <div class="checkbox">
              <label>
                <input type="checkbox" name="idaspecto<?php echo $idaspecto['PU10IDASBIO']; ?>"
                <?php if($isCheck['total5']) {echo "checked";} ?>
                /> <?php echo $idaspecto['PU10DESCABIO'] ;?>
              </label>
            </div>
          <?php endforeach; ?>

          <button type="submit" class="btn btn-success">Guardar</button>
          <br>


        </form>

        <form method="POST" action="?c=class04inspeccion&m=guardarObservacionAspBio">

          <div class="form-group">
            <label for="id">Código Trámite</label>
            <input type="text" class="form-control" id="id" name="id" value="<?php echo $this->pu04inspeccion->getAtributo('PU04IDTRA');?>" readonly>
            <?php  $idtramite = $this->pu04inspeccion->getAtributo('PU04IDTRA'); ?>
          </div>

          <div class="container-fluid">
            <div class="col-xs-9">
              <label for="PU10OBSERVACIONES">Otra descripción de Aspectos Biofísicos:</label>
              <textarea class="form-control" id="PU10OBSERVACIONES" name="PU10OBSERVACIONES" rows="5"></textarea><br>
            </div>
          </div>

          <button type="submit" class="btn btn-success">Guardar descripción</button>
        </form>
      </div>
    </div>



    <div class="container-fluid" id="tabconten4">
      <div class="container-fluid">
        <form method="POST" action="?c=class04inspeccion&m=editarDesarrolloSec">
          <div class="form-group">

            <div class="alert alert-info alert-dismissable">
              <button type="button" class="close" data-dismiss="alert">&times;</button>
              <strong>¡Alerta!</strong> Pasos a seguir.
              <br>
              <ul>
                <li>Registrar el tipo de desarrollo en el sector y observación.</li>
              </ul>
            </div>
            <label for="id">Código Trámite</label>
            <input type="text" class="form-control" id="id" name="id" value="<?php echo $this->pu04inspeccion->getAtributo('PU04IDTRA');?>" readonly>
            <?php  $idtramite = $this->pu04inspeccion->getAtributo('PU04IDTRA'); ?>
          </div>

          <?php foreach( $iddesarrollosec as $iddesarrollo ): ?>
            <?php $isCheck = $this->pu04inspeccion->tieneDesarrolloSec($idtramite, $iddesarrollo['PU12IDTDESEC']);?>
            <div class="checkbox">
              <label>
                <input type="checkbox" name="iddesarrollosc<?php echo $iddesarrollo['PU12IDTDESEC']; ?>"
                <?php if($isCheck['total4']) {echo "checked";} ?>
                /> <?php echo $iddesarrollo['PU12TIPODES'] ;?>
              </label>
            </div>
          <?php endforeach; ?>
          <button type="submit" class="btn btn-success">Guardar</button>
          <br>

        </form>

        <form method="POST" action="?c=class04inspeccion&m=guardarObservacionTipdesc">

          <div class="form-group">
            <label for="id">Código Trámite</label>
            <input type="text" class="form-control" id="id" name="id" value="<?php echo $this->pu04inspeccion->getAtributo('PU04IDTRA');?>" readonly>
            <?php  $idtramite = $this->pu04inspeccion->getAtributo('PU04IDTRA'); ?>
          </div>

          <div class="container-fluid">
            <div class="col-xs-9">
              <label for="PU12OBSERVACIONES">Otra descripción de Tipo desarrollo en el sector:</label>
              <textarea class="form-control" id="PU12OBSERVACIONES" name="PU12OBSERVACIONES" rows="5"></textarea><br>
            </div>
          </div>
          <button type="submit" class="btn btn-success">Guardar descripción</button>
        </form>
      </div>
    </div>



    <div class="container-fluid" id="tabconten6">
      <div class="container-fluid">
        <form method="POST" action="?c=class04inspeccion&m=editarTipoRed">
          <div class="form-group">
            <div class="alert alert-info alert-dismissable">
              <button type="button" class="close" data-dismiss="alert">&times;</button>
              <strong>¡Alerta!</strong> Pasos a seguir.
              <br>
              <ul>
                <li>Registrar el tipo de red vial y observación.</li>
              </ul>
            </div>
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



    <div class="container-fluid" id="tabconten8">
      <div class="container-fluid" >

        <form method="POST" action="?c=class04inspeccion&m=editarPatente">

          <div class="form-group">
            <div class="alert alert-info alert-dismissable">
              <button type="button" class="close" data-dismiss="alert">&times;</button>
              <strong>¡Alerta!</strong> Pasos a seguir.
              <br>
              <ul>
                <li>Registrar las patentes y observación.</li>
              </ul>
            </div>
            <label for="id">Código Trámite</label>
            <input type="text" class="form-control" id="id" name="id" value="<?php echo $this->pu04inspeccion->getAtributo('PU04IDTRA');?>" readonly>
            <?php  $idtramite = $this->pu04inspeccion->getAtributo('PU04IDTRA'); ?>
          </div>

          <?php foreach( $idtipopatentes as $idtipopatent ): ?>
            <?php $isCheck = $this->pu04inspeccion->tienePatente($idtramite, $idtipopatent['PU24IDINFR']);?>
            <div class="checkbox">
              <label>
                <input type="checkbox" name="idtipopatente<?php echo $idtipopatent['PU24IDINFR']; ?>"
                <?php if($isCheck['total9']) {echo "checked";} ?>
                /> <?php echo $idtipopatent['PU24DESCINF'] ;?>
              </label>
            </div>

          <?php endforeach; ?>
          <button type="submit" class="btn btn-success ">Guardar</button>
          <br>

        </form>

        <form method="POST" action="?c=class04inspeccion&m=guardarTipoInfra">

          <div class="form-group">
            <label for="id">Código Trámite</label>
            <input type="text" class="form-control" id="id" name="id" value="<?php echo $this->pu04inspeccion->getAtributo('PU04IDTRA');?>" readonly>
            <?php  $idtramite = $this->pu04inspeccion->getAtributo('PU04IDTRA'); ?>
          </div>


          <div class="container-fluid">
            <label for="PU24TIPOCONSTRUCCION">Infraestructura observada en el terreno:</label>
            <textarea class="form-control" id="PU24TIPOCONSTRUCCION" name="PU24TIPOCONSTRUCCION" rows="5"></textarea><br>
          </div>

          <button type="submit" class="btn btn-success">Guardar descripción</button>
        </form>

      </div>
    </div>



    <div class="container-fluid" id="tabconten10">
      <div class="container-fluid">
        <form method="POST" action="?c=class04inspeccion&m=editarAccesos">
          <div class="form-group">
            <div class="alert alert-info alert-dismissable">
              <button type="button" class="close" data-dismiss="alert">&times;</button>
              <strong>¡Alerta!</strong> Pasos a seguir.
              <br>
              <ul>
                <li>Registrar accesos servidumbre de paso y observación.</li>
              </ul>
            </div>

            <label for="id">Código Trámite</label>
            <input type="text" class="form-control" id="id" name="id" value="<?php echo $this->pu04inspeccion->getAtributo('PU04IDTRA');?>" readonly>
            <?php  $idtramite = $this->pu04inspeccion->getAtributo('PU04IDTRA'); ?>
          </div>

          <?php foreach( $idaccesos as $accesos ): ?>
            <?php $isCheck = $this->pu04inspeccion->tieneAcceso($idtramite, $accesos['PU42IDSERVID']);?>
            <div class="checkbox">
              <label>
                <input type="checkbox" name="idtipoacceso<?php echo $accesos['PU42IDSERVID']; ?>"
                <?php if($isCheck['total49']) {echo "checked";} ?>
                /> <?php echo $accesos['PU42DESCRIPCION'] ;?>
              </label>
            </div>
          <?php endforeach; ?>
          <button type="submit" class="btn btn-success">Guardar</button>
          <br><br>
        </form>
        <form method="POST" action="?c=class04inspeccion&m=guardarObservacionAccesos">

          <div class="form-group">
            <label for="id">Código Trámite</label>
            <input type="text" class="form-control" id="id" name="id" value="<?php echo $this->pu04inspeccion->getAtributo('PU04IDTRA');?>" readonly>
            <?php  $idtramite = $this->pu04inspeccion->getAtributo('PU04IDTRA'); ?>
          </div>


          <div class="container-fluid">
            <div class="col-xs-9">
              <label for="PU38OBSERVACIONES">Otra descripción de Acceso:</label>
              <textarea class="form-control" id="PU38OBSERVACIONES" name="PU38OBSERVACIONES" rows="5"></textarea><br>
            </div>
          </div>


          <button type="submit" class="btn btn-success">Guardar descripción</button>
        </form>
      </div>
    </div>



    <div class="container-fluid" id="tabconten11">
      <div class="container-fluid">
        <form method="POST" action="?c=class04inspeccion&m=editarAccesos2">

          <div class="form-group">

            <div class="alert alert-info alert-dismissable">
              <button type="button" class="close" data-dismiss="alert">&times;</button>
              <strong>¡Alerta!</strong> Pasos a seguir.
              <br>
              <ul>
                <li>Registrar accesos servidumbre agrícola y observación.</li>
              </ul>
            </div>

            <label for="id">Código Trámite</label>
            <input type="text" class="form-control" id="id" name="id" value="<?php echo $this->pu04inspeccion->getAtributo('PU04IDTRA');?>" readonly>
            <?php  $idtramite = $this->pu04inspeccion->getAtributo('PU04IDTRA'); ?>
          </div>

          <?php foreach( $idaccesos2 as $accesos2 ): ?>
            <?php $isCheck = $this->pu04inspeccion->tieneAcceso2($idtramite, $accesos2['PU42IDSERVID']);?>
            <div class="checkbox">
              <label>
                <input type="checkbox" name="idtipoacceso2<?php echo $accesos2['PU42IDSERVID']; ?>"
                <?php if($isCheck['total70']) {echo "checked";} ?>
                /> <?php echo $accesos2['PU42DESCRIPCION'] ;?>
              </label>
            </div>
          <?php endforeach; ?>
          <button type="submit" class="btn btn-success">Guardar</button>
          <br><br>
        </form>
        <form method="POST" action="?c=class04inspeccion&m=guardarObservacionAccesos">

          <div class="form-group">
            <label for="id">Código Trámite</label>
            <input type="text" class="form-control" id="id" name="id" value="<?php echo $this->pu04inspeccion->getAtributo('PU04IDTRA');?>" readonly>
            <?php  $idtramite = $this->pu04inspeccion->getAtributo('PU04IDTRA'); ?>
          </div>
          <div class="container-fluid">
            <div class="col-xs-9">
              <label for="PU38OBSERVACIONES">Otra descripción de Acceso:</label>
              <textarea class="form-control" id="PU38OBSERVACIONES" name="PU38OBSERVACIONES" rows="5"></textarea><br>
            </div>
          </div>
          <button type="submit" class="btn btn-success">Guardar descripción</button>

        </form>
      </div>
    </div>



    <div class="container-fluid" id="tabconten00">
      <div class="container-fluid">
        <form method="POST" action="?c=class04inspeccion&m=editarAreasPro">

          <div class="form-group">

            <div class="alert alert-info alert-dismissable">
              <button type="button" class="close" data-dismiss="alert">&times;</button>
              <strong>¡Alerta!</strong> Pasos a seguir.
              <br>
              <ul>
                <li>Registrar afectación de áreas de protección y observación.</li>
              </ul>
            </div>

            <label for="id">Código Trámite</label>
            <input type="text" class="form-control" id="id" name="id" value="<?php echo $this->pu04inspeccion->getAtributo('PU04IDTRA');?>" readonly>
            <?php  $idtramite = $this->pu04inspeccion->getAtributo('PU04IDTRA'); ?>


            <?php foreach( $idareas as $areasp ): ?>
              <?php $isCheck = $this->pu04inspeccion->tieneAreasPro($idtramite, $areasp['PU13IDAAP']);?>
              <div class="checkbox">
                <label>
                  <input type="checkbox" name="idareasp<?php echo $areasp['PU13IDAAP']; ?>"
                  <?php if($isCheck['total7']) {echo "checked";} ?>
                  /> <?php echo $areasp['PU13DESCAAP'] ;?>
                </label>
              </div>
            <?php endforeach; ?>

            <button type="submit" class="btn btn-success">Guardar</button>

          </div>

        </form>
      </div>
    </div>



    <!--o de tab  -->
    <div class="container-fluid" id="tabconten9">
      <div class="container-fluid">
        <form method="POST" action="?c=class04inspeccion&m=guardarObservacion">

          <div class="form-group">
            <div class="alert alert-info alert-dismissable">
              <button type="button" class="close" data-dismiss="alert">&times;</button>
              <strong>¡Alerta!</strong> Pasos a seguir.
              <br>
              <ul>
                <li>Registrar observaciones generales.</li>
              </ul>
            </div>
            <label for="id">Código Trámite</label>
            <input type="text" class="form-control" id="id" name="id" value="<?php echo $this->pu04inspeccion->getAtributo('PU04IDTRA');?>" readonly>
            <?php  $idtramite = $this->pu04inspeccion->getAtributo('PU04IDTRA'); ?>
          </div>
          <label for="PU04OBSERVACIONES">Observaciones Generales:</label>
          <textarea class="form-control" id="PU04OBSERVACIONES" name="PU04OBSERVACIONES" rows="10"></textarea>

          <br>
          <button type="submit" class="btn btn-success ">Guardar</button>
          <br>
        </div>
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
</div>
