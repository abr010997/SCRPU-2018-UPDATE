<div class="container-fluid">
<div class="col-sm-offset-3 col-sm-6">
			<div class="panel panel-default">
				<div class="panel-heading">Listado de Solicitante:</div>
				<div class="panel-body">
					<ul class="list-group">
					<li class="list-group-item"><strong>Cédula: </strong><?php echo $this->class39solicitante->getAtributo('PU39CEDSOLICI');?></li>
					<li class="list-group-item"><strong>Nombre: </strong><?php echo $this->class39solicitante->getAtributo('PU39NOMSOLICI');?></li>
					<li class="list-group-item"><strong>Primer Apellido: </strong><?php echo $this->class39solicitante->getAtributo('PU39APE1SOLICI');?></li>
					<li class="list-group-item"><strong>Segundo Apellido: </strong><?php echo $this->class39solicitante->getAtributo('PU39APE2SOLICI');?></li>

					</ul>
					<a href="?c=class39solicitante&m=index" class="btn btn-danger" role="button">Regresar</a>

				</div>
			</div>
		</div>
	</div>
