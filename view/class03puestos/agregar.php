   
    <center><h2>Agregar nuevo puesto</h2></center>
    <form action="?c=class03puestos&m=agregar" method="post" >
      <div class="form-group">
        <label for="PU03IDPUES">Código del Puesto:</label>
        <input type="text" class="form-control" id="PU03IDPUES" name="PU03IDPUES">
      </div>
      <div class="form-group">
        <label for="PU03PUESTO">Nombre del puesto:</label>
        <input type="text" class="form-control" id="PU03PUESTO" name="PU03PUESTO">
      </div>

      <button type="submit" class="btn btn-success">Guardar puesto</button> 
      <a id="regresar" class="btn btn-danger" role="button" href="?c=class03puestos&m=index">Regresar</a>  

      <!--<script type="text/javascript">

        $("#regresar").click(function(){
        var bool=confirm("XXXXX----DESEA REGRESAR----XXXXX?");
        if(bool){
        $("#contenido").load("?c=class03puestos&m=index");
        }else{
        $.alert("CANCELADO");
        }
      });
      </script>-->
     </form>
