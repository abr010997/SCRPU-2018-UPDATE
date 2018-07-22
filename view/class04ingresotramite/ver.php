	<div class="row">
			<div  class="panel panel-default">
				<div class="panel-heading">Detalle de Tramite</div>
				<div class="panel-body">
					<ul class="list-group">
						<li class="list-group-item"><strong>Código del Tramite: </strong><?php echo $this->class04ingresotramite->getAtributo('PU04IDTRA');?></li>
						<li class="list-group-item"><strong>Ubicacion Tramite: </strong><?php echo $this->class04ingresotramite->getAtributo('PU04DESCRIPCIONLUGAR');?></li>
						
					</ul>
					<a href="?c=class04ingresotramite&m=index" class="btn btn-danger" role="button">Regresar</a>  

				</div>
			</div>
		</div>
   
