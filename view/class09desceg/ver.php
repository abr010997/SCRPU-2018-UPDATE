		<div class="row">
			<div class="panel panel-default">
				<div class="panel-heading">Detalle del Espacio Geográfico</div>
				<div class="panel-body">
					<ul class="list-group">
						<li class="list-group-item"><strong>Código de Espacio Geográfico: </strong><?php echo $this->class09desceg->getAtributo('PU09IDDEG');?></li>
						<li class="list-group-item"><strong>Descripción de Espacio Geográfico: </strong><?php echo $this->class09desceg->getAtributo('PU09DESCREG');?></li>
						
					</ul>
					<a href="?c=class09desceg&m=index" class="btn btn-danger" role="button">Regresar</a>  

				</div>
			</div>
		</div>

