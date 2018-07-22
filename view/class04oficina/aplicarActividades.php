 <?php $idactividades = $this->class04oficina->getTodasActividades(); ?>
<?php $iddesarrollos = $this->class04oficina->getTodasActividadesDesarrollo(); ?>
<?php $iddesarrollos3 = $this->class04oficina->getTodasActividadesComercial(); ?>
<?php $iddesarrollos4 = $this->class04oficina->getTodasActividadesComercialIndustrial(); ?>
<?php $iddesarrollos5 = $this->class04oficina->getTodasActividadesEstacionDeServicio(); ?>
<?php $idtipopatentes = $this->class04oficina->getTodasPatenteOf(); ?>
<?php $idtipoleyes = $this->class04oficina->getTodasLeyes(); ?>

<?php $iddesarrollos00 = $this->class04oficina->getTododasEstados(); ?>

  <center><h2>Aplicando actividades al Trámite:</h2></center> 

       <div class="col-xs-2">
  <input type="text" class="form-control" id="id" name="id" value="<?php echo $this->class04oficina->getAtributo('PU04IDTRA');?>"  readonly> 
  <?php  $idtramite = $this->class04oficina->getAtributo('PU04IDTRA'); ?>
</div><br><br>



<div class="container-fluid">
 
<div id="parentVerticalTab">
  <ul class="resp-tabs-list hor_1">
    <li href="#tabconten5">Actividades Residencial</li>
    <li href="#tabconten5-Desarrollo">Actividades Desarrollo</li>
    <li href="#tabconten5-Comercial">Actividades Comerciales</li>
    <li href="#tabconten5-Comercial-Industrial">Comercial-Industrial</li>
    <li href="#tabconten5-Estacióndeservicios">Actividades Estación de servicios</li>
    <li href="#tabconten2">Patentes</li>
  
    
    
  </ul> 
  <div class="resp-tabs-container hor_1">



    <div class="container-fluid" id="tabconten5">
      <!-- contenido de tab 6 -->

  
        <form method="POST" action="?c=class04oficina&m=editarActividades">
          <div class="form-group">
            <label for="id">Código Trámite</label>
            <input type="text" class="form-control" id="id" name="id" value="<?php echo $this->class04oficina->getAtributo('PU04IDTRA');?>" readonly> 
            <?php  $idtramite = $this->class04oficina->getAtributo('PU04IDTRA'); ?>
          </div>
          <?php foreach( $idactividades as $idactividad ): ?>
          <?php $isCheck = $this->class04oficina->tieneActividades($idtramite, $idactividad['PU06IDACTDES']);?>
          <div class="checkbox">
            <label>
            <input type="checkbox" name="idactdes<?php echo $idactividad['PU06IDACTDES']; ?>"
             <?php if($isCheck['total']) {echo "checked";} ?>
            /> <?php echo $idactividad['PU06DESAD'] ;?>
            </label>
          </div>

 <!--o de tab  -->
          <?php endforeach; ?>
          <button type="submit" class="btn btn-success">Guardar</button>
          <br>
        </form>
        <form method="POST" action="?c=class04oficina&m=guardarObservacionResidencial">

          <div class="form-group">
            <label for="id">Código Trámite</label>
            <input type="text" class="form-control" id="id" name="id" value="<?php echo $this->class04oficina->getAtributo('PU04IDTRA');?>" readonly> 
            <?php  $idtramite = $this->class04oficina->getAtributo('PU04IDTRA'); ?>
          </div>
      

            <div class="container-fluid">
        <div class="col-xs-9">
        <label for="PU06OBSERVACIONES">Otra descripción de Actividades Residencial:</label>
        <textarea class="form-control" id="PU06OBSERVACIONES" name="PU06OBSERVACIONES" rows="5"></textarea><br>
      </div>
</div>
        <button type="submit" class="btn btn-success">Guardar descripción</button>
      
           </form>
    </div>

    <div class="container-fluid" id="tabconten5-Desarrollo">
      <!-- contenido de tab 4 -->
      

          <form method="POST" action="?c=class04oficina&m=editarActividades2">
          <div class="form-group">
            <label for="id">Código Trámite</label>
            <input type="text" class="form-control" id="id" name="id" value="<?php echo $this->class04oficina->getAtributo('PU04IDTRA');?>" readonly> 
            <?php  $idtramite = $this->class04oficina->getAtributo('PU04IDTRA'); ?>
          </div>
          <?php foreach( $iddesarrollos as $idactdes2 ): ?>
          <?php $isCheck = $this->class04oficina->tieneActividades2($idtramite, $idactdes2['PU06IDACTDES']);?>
          <div class="checkbox">
            <label>
            <input type="checkbox" name="idactdes2<?php echo $idactdes2['PU06IDACTDES']; ?>"
             <?php if($isCheck['total15']) {echo "checked";} ?>
            /> <?php echo $idactdes2['PU06DESAD'] ;?>
            </label>
          </div>
          <?php endforeach; ?>
          <button type="submit" class="btn btn-success">Guardar</button>
          <br>

        </form>
         <form method="POST" action="?c=class04oficina&m=guardarObservacionActdes">

          <div class="form-group">
            <label for="id">Código Trámite</label>
            <input type="text" class="form-control" id="id" name="id" value="<?php echo $this->class04oficina->getAtributo('PU04IDTRA');?>" readonly> 
            <?php  $idtramite = $this->class04oficina->getAtributo('PU04IDTRA'); ?>
          </div>
      

            <div class="container-fluid">
        <div class="col-xs-9">
        <label for="PU06OBSERVACIONES">Otra descripción de Actividades:</label>
        <textarea class="form-control" id="PU06OBSERVACIONES" name="PU06OBSERVACIONES" rows="5"></textarea><br>
      </div>
</div>
        <button type="submit" class="btn btn-success">Guardar descripción</button>
      
           </form>

    </div>



<div class="container-fluid" id="tabconten5-Comercial">
      <!-- contenido de tab 6 -->

  
        <form method="POST" action="?c=class04oficina&m=editarActividades3">
          <div class="form-group">
            <label for="id">Código Trámite</label>
            <input type="text" class="form-control" id="id" name="id" value="<?php echo $this->class04oficina->getAtributo('PU04IDTRA');?>" readonly> 
            <?php  $idtramite = $this->class04oficina->getAtributo('PU04IDTRA'); ?>
          </div>
          <?php foreach( $iddesarrollos3 as $idactividad3 ): ?>
          <?php $isCheck = $this->class04oficina->tieneActividades3($idtramite, $idactividad3['PU06IDACTDES']);?>
          <div class="checkbox">
            <label>
            <input type="checkbox" name="idactdes3<?php echo $idactividad3['PU06IDACTDES']; ?>"
             <?php if($isCheck['total16']) {echo "checked";} ?>
            /> <?php echo $idactividad3['PU06DESAD'] ;?>
            </label>
          </div>

 <!--o de tab  -->
          <?php endforeach; ?>
          <button type="submit" class="btn btn-success">Guardar</button>
          <br>
        </form>
        <form method="POST" action="?c=class04oficina&m=guardarObservacionComercial">

          <div class="form-group">
            <label for="id">Código Trámite</label>
            <input type="text" class="form-control" id="id" name="id" value="<?php echo $this->class04oficina->getAtributo('PU04IDTRA');?>" readonly> 
            <?php  $idtramite = $this->class04oficina->getAtributo('PU04IDTRA'); ?>
          </div>
      

            <div class="container-fluid">
        <div class="col-xs-9">
        <label for="PU06OBSERVACIONESCOMER">Otra descripción de Actividades Comercial:</label>
        <textarea class="form-control" id="PU06OBSERVACIONESCOMER" name="PU06OBSERVACIONESCOMER" rows="5"></textarea><br>
      </div>
</div>
        <button type="submit" class="btn btn-success">Guardar descripción</button>
      
           </form>
    </div>


<!--o de tab  -->
 

<div class="container-fluid" id="tabconten5-Comercial-Industrial">
      <!-- contenido de tab 4 -->
      

          <form method="POST" action="?c=class04oficina&m=editarActividades4">
          <div class="form-group">
            <label for="id">Código Trámite</label>
            <input type="text" class="form-control" id="id" name="id" value="<?php echo $this->class04oficina->getAtributo('PU04IDTRA');?>" readonly> 
            <?php  $idtramite = $this->class04oficina->getAtributo('PU04IDTRA'); ?>
          </div>
          <?php foreach( $iddesarrollos4 as $idactividad4 ): ?>
          <?php $isCheck = $this->class04oficina->tieneActividades4($idtramite, $idactividad4['PU06IDACTDES']);?>
          <div class="checkbox">
            <label>
            <input type="checkbox" name="idactdes4<?php echo $idactividad4['PU06IDACTDES']; ?>"
             <?php if($isCheck['total17']) {echo "checked";} ?>
            /> <?php echo $idactividad4['PU06DESAD'] ;?>
            </label>
          </div>
          <?php endforeach; ?>
          <button type="submit" class="btn btn-success">Guardar</button>
          <br>

        </form>
        <form method="POST" action="?c=class04oficina&m=guardarObservacionComercialIndustrial">

          <div class="form-group">
            <label for="id">Código Trámite</label>
            <input type="text" class="form-control" id="id" name="id" value="<?php echo $this->class04oficina->getAtributo('PU04IDTRA');?>" readonly> 
            <?php  $idtramite = $this->class04oficina->getAtributo('PU04IDTRA'); ?>
          </div>
      

            <div class="container-fluid">
        <div class="col-xs-9">
        <label for="PU06OBSERVACIONES">Otra descripción de Comercial Industrial:</label>
        <textarea class="form-control" id="PU06OBSERVACIONES" name="PU06OBSERVACIONES" rows="5"></textarea><br>
      </div>
</div>
        <button type="submit" class="btn btn-success">Guardar descripción</button>
      
           </form>

    </div>


 <!--o de tab  -->
<!--o de tab  -->
 

<div class="container-fluid" id="tabconten5-Estacióndeservicios">
      <!-- contenido de tab 4 -->
      

          <form method="POST" action="?c=class04oficina&m=editarActividades5">
          <div class="form-group">
            <label for="id">Código Trámite</label>
            <input type="text" class="form-control" id="id" name="id" value="<?php echo $this->class04oficina->getAtributo('PU04IDTRA');?>" readonly> 
            <?php  $idtramite = $this->class04oficina->getAtributo('PU04IDTRA'); ?>
          </div>
          <?php foreach( $iddesarrollos5 as $idactividad5 ): ?>
          <?php $isCheck = $this->class04oficina->tieneActividades5($idtramite, $idactividad5['PU06IDACTDES']);?>
          <div class="checkbox">
            <label>
            <input type="checkbox" name="idactdes5<?php echo $idactividad5['PU06IDACTDES']; ?>"
             <?php if($isCheck['total19']) {echo "checked";} ?>
            /> <?php echo $idactividad5['PU06DESAD'] ;?>
            </label>
          </div>
          <?php endforeach; ?>
          <button type="submit" class="btn btn-success">Guardar</button>
          <br>
        </form>
         <form method="POST" action="?c=class04oficina&m=guardarObservacionEstacionDeServicios">

          <div class="form-group">
            <label for="id">Código Trámite</label>
            <input type="text" class="form-control" id="id" name="id" value="<?php echo $this->class04oficina->getAtributo('PU04IDTRA');?>" readonly> 
            <?php  $idtramite = $this->class04oficina->getAtributo('PU04IDTRA'); ?>
          </div>
      

            <div class="container-fluid">
        <div class="col-xs-9">
        <label for="PU06OBSERVACIONES">Otra descripción Estacion de Servicios:</label>
        <textarea class="form-control" id="PU06OBSERVACIONES" name="PU06OBSERVACIONES" rows="5"></textarea><br>
      </div>
</div>
        <button type="submit" class="btn btn-success">Guardar descripción</button>
      
           </form>
    </div>




 <div class="container-fluid" id="tabconten2">
      <!-- contenido de tab 5 -->
        <form method="POST" action="?c=class04oficina&m=editarPatenteOf">
          <div class="form-group">
            <label for="id">Código Trámite</label>
            <input type="text" class="form-control" id="id" name="id" value="<?php echo $this->class04oficina->getAtributo('PU04IDTRA');?>" readonly> 
            <?php  $idtramite = $this->class04oficina->getAtributo('PU04IDTRA'); ?>
          </div>
          <?php foreach( $idtipopatentes as $idtipopatent ): ?>
          <?php $isCheck = $this->class04oficina->tienePatenteOf($idtramite, $idtipopatent['PU24IDINFR']);?>
          <div class="checkbox">
            <label>
            <input type="checkbox"  name="idtipopatente<?php echo $idtipopatent['PU24IDINFR']; ?>"
             <?php if($isCheck['total9']) {echo "checked";} ?>
            /> <?php echo $idtipopatent['PU24DESCINF'] ;?>
            </label>
          </div>
          <?php endforeach; ?>
          <button type="submit" class="btn btn-success ">Guardar</button>
          <br>
        </form>
      
<form method="POST" action="?c=class04oficina&m=guardarObservacionPatentes">

          <div class="form-group">
            <label for="id">Código Trámite</label>
            <input type="text" class="form-control" id="id" name="id" value="<?php echo $this->class04oficina->getAtributo('PU04IDTRA');?>" readonly> 
            <?php  $idtramite = $this->class04oficina->getAtributo('PU04IDTRA'); ?>
          </div>
      

            <div class="container-fluid">
        <div class="col-xs-9">
        <label for="PU06OBSERVACIONES">Otra descripción Patentes :</label>
        <textarea class="form-control" id="PU06OBSERVACIONES" name="PU06OBSERVACIONES" rows="5"></textarea><br>
      </div>
</div>
        <button type="submit" class="btn btn-success">Guardar descripción</button>
      
           </form>
    </div>


<!-- 
    <div class="container-fluid" id="tabconten20">
  
        <form method="POST" action="?c=class04oficina&m=editarLeyes">
          <div class="form-group">
            <label for="id">Código Trámite</label>
            <input type="text" class="form-control" id="id" name="id" value="<?php echo $this->class04oficina->getAtributo('PU04IDTRA');?>" readonly> 
            <?php  $idtramite = $this->class04oficina->getAtributo('PU04IDTRA'); ?>
          </div>
          <?php foreach( $idtipoleyes as $idtipoleye): ?>
          <?php $isCheck = $this->class04oficina->tieneLeyes($idtramite, $idtipoleye['pu45idley']);?>
          <div class="checkbox">
            <label>
            <input type="checkbox"  name="idtipoley<?php echo $idtipoleye['pu45idley']; ?>"
             <?php if($isCheck['total20']) {echo "checked";} ?>
            /> <?php echo $idtipoleye['pu45objetivo'] ;?>
            </label>
          </div>
          <?php endforeach; ?>
          <button type="submit" class="btn btn-success ">Guardar</button>
          <br>
        </form>
    </div> -->

 <!--o de tab  -->

    </div>
  </div>
 </div>