		<div class="row">
			<div class="panel panel-default">
				<div class="panel-heading">Detalle del Servicio de Electricidad y Agua</div>
				<div class="panel-body">
					<ul class="list-group">
						<li class="list-group-item"><strong>Código del Servicio: </strong><?php echo $this->class16servae->getAtributo('PU16IDSAE');?></li>
						<li class="list-group-item"><strong>Descripción del Servicio: </strong><?php echo $this->class16servae->getAtributo('PU16DESCAE');?></li>
						
					</ul>
					<a href="?c=class16servae&m=index" class="btn btn-danger" role="button">Regresar</a>  

				</div>
			</div>
		</div>
