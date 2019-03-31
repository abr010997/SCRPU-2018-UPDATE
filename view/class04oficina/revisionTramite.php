<h1>Revisión General del Trámite </h1>  

       <div class="col-xs-2">
  <input type="text" class="form-control" id="id" name="id" value="<?php echo $this->class04oficina->getAtributo('PU04IDTRA');?>"  readonly> 
  <?php  $idtramite = $this->class04oficina->getAtributo('PU04IDTRA'); ?>
</div><br><br>


<div id="parentVerticalTab">
  <ul class="resp-tabs-list hor_1">
    <li href="#tabconten1">Ingreso Trámite</li>
    <li href="#tabconten2">Inspección</li>
    <li  href="#tabconten3">Oficina</li>
    <li  href="#tabconten5">Tipo de Trámite</li>
    <li  href="#tabconten4">Observaciones generales</li>
    <li  href="#tabconten6">Cargar Imágen Terreno</li>
    <li  href="#tabconten7">Tipo de Resolución</li>
  </ul> 
  <div class="resp-tabs-container hor_1">

    <div class="container-fluid" id="tabconten1">
       <center><h3>Visualizando Datos de Ingreso Trámite:</h3></center>
      
          <form >
     

       <div class="form-group row">
          <div class="col-md-5">
            <label for="PU04IDTRA">Código Trámite:</label>
            <input type="text" class="form-control" id="PU04IDTRA" name="PU04IDTRA" value="<?php echo $this->class04oficina->getAtributo('PU04IDTRA');?>" readonly>
        </div>
      </div>
         


      
  

         </form>















<!--Apartado de Accesos -->

<form >
  <div class="container-fluid  well   "> 
    <div class="form-group">
      <p><b>Acceso seleccionado :</b></p>
        <?php foreach ($apartados  as $acceso):?>
          <label class="checkbox-inline">
            <input type="checkbox" value="<?php echo $acceso->getAtributo('PU38IDSERVIDUMBRE');?>" name="class04oficina1[]" checked disabled><?php echo $acceso->getAtributo('PU38DESCRIPSERVIDUM');?>
          </label>
        <?php endforeach; ?>
      </div>
    </div>
       <a href="?c=class04oficina&m=editarLeyAccesos&id=<?php echo $idtramite;?>" class="btn btn-danger" role="button">Editar Ley Acceso</a>   
  <br>
</form> 


<!--Apartado de Plan Regulador -->
<form >
  <div class="container-fluid  well   "> 
    <div class="form-group">
      <p><b>Plan Regulador  :</b></p>
        <?php foreach ($traplanReg as $planreg):?>
          <label class="checkbox-inline">
            <input type="checkbox" value="<?php echo $planreg->getAtributo('PU26IDPLAN');?>" name="class04oficina1[]" checked disabled><?php echo $planreg->getAtributo('PU26PLNDESC');?>
        </label>
        <?php endforeach; ?>
      </div>
    </div>
  <br>  
</form>




<!--Apartado de NicoSama -->

<form >
  <div class="container-fluid  well   "> 
    <div class="form-group">
        <p><b>Descripción del tipo construcción :</b></p>
          <?php foreach ($nicosama as $NicoSama):?>
            <label class="checkbox-inline">
              <input type="checkbox" value="<?php echo $NicoSama->getAtributo('PU26IDDESCNICOYASAMA');?>" name="class04oficina1[]" checked disabled><?php echo $NicoSama->getAtributo('PU26DESCACNICOYASAMA');?>
          </label>
        <?php endforeach; ?>
      </div>
    </div>
      <a href="?c=class04oficina&m=editarLeyPlanregulador&id=<?php echo $idtramite;?>" class="btn btn-danger" role="button">Editar Ley</a> 
  <br>  
 </form> 




<!--Apartado de Afectación de Áreas de Protección -->

<form >
    <div class="container-fluid  well   "> 
      <div class="form-group">
        <p><b>Afectación de Áreas de Protección :</b></p>
          <?php foreach ($aap as $aap):?>
            <label class="checkbox-inline">
            <input type="checkbox" value="<?php echo $aap->getAtributo('PU13IDAAP');?>" name="class04oficina1[]" checked disabled><?php echo $aap->getAtributo('PU13DESCAAP');?>
        </label>
        <?php endforeach; ?>
      </div>
    </div>
     <a href="?c=class04oficina&m=editarLeyAreaspro&id=<?php echo $idtramite;?>" class="btn btn-danger" role="button">Editar Ley Áreas</a> 
  <br>  
</form>


    </div>




















      <!-- contenido de tab 1 -->
        <div class="container-fluid" id="tabconten2">

           <center><h3>Visualizando Datos de Inspección:</h3></center>
      
         <form >

        <div class="form-group row">
          <div class="col-md-5">
            <label for="PU04IDTRA">Código Trámite:</label>
            <input type="text" class="form-control" id="PU04IDTRA" name="PU04IDTRA" value="<?php echo $this->class04oficina1->getAtributo('PU04IDTRA');?>" readonly> 
            <?php  $idtramite = $this->class04oficina1->getAtributo('PU04IDTRA'); ?>
          </div>
        </div>

         <div class="form-group row">
          <div class="col-md-5">
            <label for="PU04NORTE">Norte:</label>
            <input type="text" class="form-control" id="PU04NORTE" name="PU04NORTE" value="<?php echo $this->class04oficina1->getAtributo('PU04NORTE');?>" readonly>
          </div>
        </div>

         <div class="form-group row">
          <div class="col-md-5">
            <label for="PU04ESTE">Este:</label>
            <input type="text" class="form-control" id="PU04ESTE" name="PU04ESTE" value="<?php echo $this->class04oficina1->getAtributo('PU04ESTE');?>" readonly>
          </div>
        </div>

         <div class="form-group row">
          <div class="col-md-5">
            <label for="PU04ALTITUD">Altitud:</label>
            <input type="text" class="form-control" id="PU04ALTITUD" name="PU04ALTITUD" value="<?php echo $this->class04oficina1->getAtributo('PU04ALTITUD');?>" readonly>
          </div>
        </div>

<!--Apartado de Descripción del Espacio Geográfico -->
<form >
  <div class="container-fluid  well   "> 
    <div class="form-group">
        <p><b>Descripción del Espacio Geográfico :</b></p>
          <?php foreach ($deg as $EspacioGeo):?>
            <label class="checkbox-inline">
              <input type="checkbox" value="<?php echo $EspacioGeo->getAtributo('PU09IDDEG');?>" name="class04oficina1[]" checked disabled><?php echo $EspacioGeo->getAtributo('PU09DESCREG');?>
          </label>
        <?php endforeach; ?>
      </div>
    </div>
     <a href="?c=class04oficina&m=editarLeyEspaciosgeo&id=<?php echo $idtramite;?>" class="btn btn-danger" role="button">Editar Ley Espacio Geográfico</a> 
  <br>  
 </form>

<!--Apartado de Aspectos Biofísicos -->
<form >
  <div class="container-fluid  well   "> 
    <div class="form-group">
        <p><b>Aspectos Biofísicos :</b></p>
          <?php foreach ($aspbio as $AspBiofisicos):?>
            <label class="checkbox-inline">
              <input type="checkbox" value="<?php echo $AspBiofisicos->getAtributo('PU10IDASBIO');?>" name="class04oficina1[]" checked disabled><?php echo $AspBiofisicos->getAtributo('PU10DESCABIO');?>
          </label>
        <?php endforeach; ?>
      </div>
    </div>
    <a href="?c=class04oficina&m=editarLeyAspectosbio&id=<?php echo $idtramite;?>" class="btn btn-danger" role="button">Editar Ley Aspectos BIO</a> 
  <br>  
 </form>
<!--Apartado de Tipo Desarrollo Sector -->
<form >
  <div class="container-fluid  well   "> 
    <div class="form-group">
        <p><b>Tipo de Desarrollo Sector :</b></p>
          <?php foreach ($desector as $DesarrolloSec):?>
            <label class="checkbox-inline">
              <input type="checkbox" value="<?php echo $DesarrolloSec->getAtributo('PU12IDTDESEC');?>" name="class04oficina1[]" checked disabled><?php echo $DesarrolloSec->getAtributo('PU12TIPODES');?>
          </label>
        <?php endforeach; ?>
      </div>
    </div>
    <a href="?c=class04oficina&m=editarLeyDesarrollosec&id=<?php echo $idtramite;?>" class="btn btn-danger" role="button">Editar Ley Tipo de Desarrollo Sector</a> 
  <br>  
 </form>
<!--Apartado de Tipo Red Vial -->

<form >
  <div class="container-fluid  well   "> 
    <div class="form-group">
        <p><b>Tipo de Red Vial :</b></p>
          <?php foreach ($tredvial as $TRedVial):?>
            <label class="checkbox-inline">
              <input type="checkbox" value="<?php echo $TRedVial->getAtributo('PU22IDTREDV');?>" name="class04oficina1[]" checked disabled><?php echo $TRedVial->getAtributo('PU22DESCTRV');?>
          </label>
        <?php endforeach; ?>
      </div>
    </div>
     <a href="?c=class04oficina&m=editarLeyTipored&id=<?php echo $idtramite;?>" class="btn btn-danger" role="button">Editar Ley Tipo de Red Vial</a> 
  <br>  
 </form>
<!--Apartado de Patentes -->
<form >
  <div class="container-fluid  well   "> 
    <div class="form-group">
        <p><b>Patente :</b></p>
          <?php foreach ($patentes as $Patentes):?>
            <label class="checkbox-inline">
              <input type="checkbox" value="<?php echo $Patentes->getAtributo('PU24IDINFR');?>" name="class04oficina1[]" checked disabled><?php echo $Patentes->getAtributo('PU24DESCINF');?>
          </label>
        <?php endforeach; ?>
      </div>
    </div>
     <a href="?c=class04oficina&m=editarLeyPatentes&id=<?php echo $idtramite;?>" class="btn btn-danger" role="button">Editar Ley Patentes</a> 
  <br>  
 </form>


<!--Apartado de Servidumbres -->
<form >
    <div class="container-fluid  well   "> 
      <div class="form-group">
        <p><b>Servidumbres :</b></p>
          <?php foreach ($actservidumbre as $actservidumbres):?>
            <label class="checkbox-inline">
            <input type="checkbox" value="<?php echo $actservidumbres->getAtributo('PU42IDSERVIDUMBRE');?>" name="class04oficina1[]" checked disabled><?php echo $actservidumbres->getAtributo('PU42DESCRIPCION');?>
        </label>
        <?php endforeach; ?>
      </div>
    </div>
   <a href="?c=class04oficina&m=editarLeyServidumbres&id=<?php echo $idtramite;?>" class="btn btn-danger" role="button">Editar Ley Servidumbres</a> 
  <br>  
</form>



    <a href="?c=class04inspeccion&m=editar&id=<?php echo $idtramite; ?>" class="btn btn-danger" role="button">Editar Inspección</a> 
         </form>





    </div>












      <!-- contenido de tab 2 -->
        <div class="container-fluid" id="tabconten3">
      
              <center><h3>Visualizando Datos de Oficina:</h3></center>
    <form >
      
      <div class="form-group row">
        <div class="col-md-5">
        <label for="PU04IDTRA">Código Trámite:</label>
        <input type="text" class="form-control" id="PU04IDTRA" name="PU04IDTRA" value="<?php echo $this->class04oficina->getAtributo('PU04IDTRA');?>" readonly>
        </div>
      </div>

      <h3>Datos del solicitante:</h3>

       <div class="form-group row">
        <div class="col-md-5">
        <label for="PU39NOMSOLICI">Nombre del Solicitante:</label>
        <input type="text" class="form-control" id="PU39NOMSOLICI" name="PU39NOMSOLICI" value="<?php echo $this->class04oficina->getAtributo('PU39NOMSOLICI');?> " readonly>
        </div>
      </div>

      <div class="form-group row">
        <div class="col-md-5">
        <label for="PU39APE1SOLICI">1° Apellido del Solicitante:</label>
        <input type="text" class="form-control" id="PU39APE1SOLICI" name="PU39APE1SOLICI" value="<?php echo $this->class04oficina->getAtributo('PU39APE1SOLICI');?> " readonly>
        </div>
      </div>

       <div class="form-group row">
        <div class="col-md-5">
        <label for="PU39APE2SOLICI">2° Apellido del Solicitante:</label>
        <input type="text" class="form-control" id="PU39APE2SOLICI" name="PU39APE2SOLICI" value="<?php echo $this->class04oficina->getAtributo('PU39APE2SOLICI');?> " readonly>
        </div>
      </div>

        <div class="form-group row">
        <div class="col-md-5">
        <label for="PU04IDDISTRITO">Distrito al que pertenece:</label>
        <input type="text" class="form-control" id="PU04IDDISTRITO" name="PU04IDDISTRITO" value="<?php echo $this->class04oficina->getAtributo('PU04IDDISTRITO');?> " readonly>
        </div>
      </div>

        <div class="form-group row">
        <div class="col-md-5">
        <label for="PU39BARRIO">Barrio donde vive: </label>
        <input type="text" class="form-control" id="PU39BARRIO" name="PU39BARRIO" value="<?php echo $this->class04oficina->getAtributo('PU39BARRIO');?> " readonly>
        </div>
      </div>

          <div class="form-group row">
        <div class="col-md-5">
        <label for="PU39DIRECCION">Dirección exacta de recidencia: </label>
        <input type="text" class="form-control" id="PU39DIRECCION" name="PU39DIRECCION" value="<?php echo $this->class04oficina->getAtributo('PU39DIRECCION');?> " readonly>
        </div>
      </div>

      <h3>Datos del propietario:</h3>

       <div class="form-group row">
        <div class="col-md-5">
        <label for="PU40NOMPROPIE">Nombre del Propietario:</label>
        <input type="text" class="form-control" id="PU40NOMPROPIE" name="PU40NOMPROPIE" value="<?php echo $this->class04oficina->getAtributo('PU40NOMPROPIE');?> " readonly>
        </div>
      </div>

       <div class="form-group row">
        <div class="col-md-5">
        <label for="PU40APE1PROPIE">1° Apellido del Propietario:</label>
        <input type="text" class="form-control" id="PU40APE1PROPIE" name="PU40APE1PROPIE" value="<?php echo $this->class04oficina->getAtributo('PU40APE1PROPIE');?> " readonly>
        </div>
      </div>

       <div class="form-group row">
        <div class="col-md-5">
        <label for="PU40APE2PROPIE">2° Apellido del Propietario:</label>
        <input type="text" class="form-control" id="PU40APE2PROPIE" name="PU40APE2PROPIE" value="<?php echo $this->class04oficina->getAtributo('PU40APE2PROPIE');?> " readonly>
        </div>
      </div>

       <h3>Datos de la propiedad:</h3>

       <div class="form-group row">
        <div class="col-md-5">
        <label for="PU40NFINCA">Finca 5-:</label>
        <input type="text" class="form-control" id="PU40NFINCA" name="PU40NFINCA" value="<?php echo $this->class04oficina->getAtributo('PU40NFINCA');?> " readonly>
        </div>
      </div>

       <div class="form-group row">
        <div class="col-md-5">
        <label for="PU40NPLANO">Plano G-:</label>
        <input type="text" class="form-control" id="PU40NPLANO" name="PU40NPLANO" value="<?php echo $this->class04oficina->getAtributo('PU40NPLANO');?> " readonly>
        </div>
      </div>


      <!--Apartado de Actividades a desarrollar -->
<form >
    <div class="container-fluid  well   "> 
      <div class="form-group">
        <p><b>Actividad residencial :</b></p>
          <?php foreach ($actResidencial as $actResiden):?>
            <label class="checkbox-inline">
            <input type="checkbox" value="<?php echo $actResiden->getAtributo('PU06IDACTDES');?>" name="class04oficina1[]" checked disabled><?php echo $actResiden->getAtributo('PU06DESAD');?>
        </label>
        <?php endforeach; ?>
      </div>
    </div>
  <br>  
</form>
<!--Apartado de Actividades desarrollo -->
<form >
    <div class="container-fluid  well   "> 
      <div class="form-group">
        <p><b>Actividad desarrollo :</b></p>
          <?php foreach ($actDesarrollo as $actDesarroll):?>
            <label class="checkbox-inline">
            <input type="checkbox" value="<?php echo $actDesarroll->getAtributo('PU06IDACTDESDESA');?>" name="class04oficina1[]" checked disabled><?php echo $actDesarroll->getAtributo('PU06DESADDESA');?>
        </label>
        <?php endforeach; ?>
      </div>
    </div>
  <br>  
</form>
<!--Apartado de Actividades comerciales -->
<form >
    <div class="container-fluid  well   "> 
      <div class="form-group">
        <p><b>Actividad comercial :</b></p>
          <?php foreach ($actComercial as $actComercia):?>
            <label class="checkbox-inline">
            <input type="checkbox" value="<?php echo $actComercia->getAtributo('PU06IDACTCOMERCIAL');?>" name="class04oficina1[]" checked disabled><?php echo $actComercia->getAtributo('PU06DESADCOMERCIAL');?>
        </label>
        <?php endforeach; ?>
      </div>
    </div>
  <br>  
</form>
<!--Apartado de Actividades comercial-industrial -->
<form >
    <div class="container-fluid  well   "> 
      <div class="form-group">
        <p><b>Actividad comercial-industrial :</b></p>
          <?php foreach ($actComercialIndustrial as $actComercialIndustria):?>
            <label class="checkbox-inline">
            <input type="checkbox" value="<?php echo $actComercialIndustria->getAtributo('PU06IDACTCOMERCIALINDUSTRIAL');?>" name="class04oficina1[]" checked disabled><?php echo $actComercialIndustria->getAtributo('PU06DESADCOMERCIALINDUSTRIAL');?>
        </label>
        <?php endforeach; ?>
      </div>
    </div>
  <br>  
</form>
<!--Apartado de Actividades estación de servicios -->

<form >
    <div class="container-fluid  well   "> 
      <div class="form-group">
        <p><b>Actividad estación de servicios :</b></p>
          <?php foreach ($actEstacionServicios as $actEstacionServicio):?>
            <label class="checkbox-inline">
            <input type="checkbox" value="<?php echo $actEstacionServicio->getAtributo('PU06IDACTESTACIONSERVICIOS');?>" name="class04oficina1[]" checked disabled><?php echo $actEstacionServicio->getAtributo('PU06DESADESTACIONSERVICIOS');?>
        </label>
        <?php endforeach; ?>
      </div>
    </div>
  <!--   <a href="?c=class04oficina&m=editarLeyActividades&id=<?php echo $idtramite;?>" class="btn btn-danger" role="button">Editar Ley</a>  -->
  <br>  
</form>

           <a href="?c=class04oficina&m=editar&id=<?php echo $idtramite; ?>" class="btn btn-danger" role="button">Editar Oficina</a> 
      </form><br>
         

    </div>










<!-- Tab nuevo del Tipo de trámite-->
   <div class="container-fluid" id="tabconten5">
        <form method="POST" action="?c=class04oficina&m=guardarTipoTramite">
              <div class="container-fluid">
                        <div class="form-group">
     <label for="id">Código Trámite</label>
      <input type="text" class="form-control" id="id" name="id" value="<?php echo $this->class04oficina->getAtributo('PU04IDTRA');?>" readonly> 
            
                        </div>
                        <br>

<div class="form-group">
        <div class="col-md-3 col-sm-3 col-xs-3">
          <label for="PU47IDTIPOTRAMITE">Seleccione el Tipo de Trámite: </label>
          <select class="form-control selectpicker" name="PU47IDTIPOTRAMITE" id="PU47IDTIPOTRAMITE">
            <option value="Seleccione">Seleccione...</option>
            <option value="RMU">RMU</option>
            <option value="DAR">DAR</option>
            <option value="OFICIO">OFICIO</option>
          </select>
        </div>
      </div>
      <br><br><br><br>
<br>

<label for="CONSECUTIVOTRAMITE">Digite el consecutivo del Trámite:
        </label>

        <input type="text" class="form-control" id="CONSECUTIVOTRAMITE" name="CONSECUTIVOTRAMITE"><br> 


      </div>
         <br>
          <button type="submit" class="btn btn-success ">   Guardar Tipo
           de Trámite</button>
          <br>
          </form>

           <a href="?c=class04oficina&m=editartipotra&id=<?php echo $idtramite; ?>" class="btn btn-danger" role="button">Editar </a> 
      </form>

        </form>


  </div>

    <!-- ____________________________________________________________ -->






      <!-- contenido de tab 3 -->
      <div class="container-fluid" id="tabconten4">
            <form method="POST" action="?c=class04oficina&m=guardarObservacionRevisionTramite">
      <div class="container-fluid">
        <div class="form-group">
            <label for="id">Código Trámite</label>
            <input type="text" class="form-control" id="id" name="id" value="<?php echo $this->class04oficina->getAtributo('PU04IDTRA');?>" readonly> 
            
          </div>
        <label for="PU04OBSERVACIONESREVISIONTRA">Observaciones Generales:</label>
        <textarea class="form-control" id="PU04OBSERVACIONES" name="PU04OBSERVACIONESREVISIONTRA" rows="10"></textarea>
      </div>
         <br>
          <button type="submit" class="btn btn-success ">   Guardar observación</button>
          <br>
        </form>
        
        <a href="?c=class04oficina&m=editarObservacionesgenerales&id=<?php echo $idtramite; ?>" class="btn btn-danger" role="button">Editar Observaciones</a> 

        </div>



    <div class="container-fluid" id="tabconten6">
      <form action="?c=class04oficina&m=guardarImagen" enctype="multipart/form-data" method="post" >

        <div class="form-group row">
          <div class="col-md-5">
            <label for="PU04IDTRA">Código Trámite:</label>
            <input type="text" class="form-control" id="PU04IDTRA" name="PU04IDTRA" value="<?php echo $this->class04oficina->getAtributo('PU04IDTRA');?>" readonly>
        </div>
      </div>

      <tr>
      <td><label class="control-label">Imagen Terreno</label></td>
        <td><input class="input-group" type="file" name="user_image" accept="image/*" /></td>
    </tr>
<br>
      <button type="submit" name="btnsave" class="btn btn-success">Guardar Imágen</button> 
      <a id="regresar" class="btn btn-danger" role="button" href="?c=class04oficina&m=index">Regresar</a>  
     </form>
    </div>
    

    




    <div class="container-fluid" id="tabconten7">
      <form action="?c=class04oficina&m=guardarImagen" enctype="multipart/form-data" method="post" >

        <div class="form-group row">
          <div class="col-md-5">
            <label for="PU04IDTRA">Código Trámite:</label>
            <input type="text" class="form-control" id="PU04IDTRA" name="PU04IDTRA" value="<?php echo $this->class04oficina->getAtributo('PU04IDTRA');?>" readonly>
             <?php  $idtramite1 = $this->class04oficina->getAtributo('PU04IDTRA'); ?>
        </div>
      </div>
<br>
<a href="?c=class04oficina&m=editarLeyPatentesencabezado&id=<?php echo $idtramite1;?>" class="btn btn-danger" role="button">Asignar Resolución</a> 
 
     </form>
    </div>

        
</div>

