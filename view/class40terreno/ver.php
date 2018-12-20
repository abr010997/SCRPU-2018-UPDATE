<div class="container-fluid">
<div class="col-sm-offset-3 col-sm-6">
			<div class="panel panel-default">
				<div class="panel-heading">Listado de Terreno:</div>
				<div class="panel-body">
					<ul class="list-group">
					<li class="list-group-item"><strong>Número de Finca: </strong><?php echo $this->class40terreno->getAtributo('PU40NFINCA');?></li>
					<li class="list-group-item"><strong>Catastro: </strong><?php echo $this->class40terreno->getAtributo('PU40NCATASTRO');?></li>
					<li class="list-group-item"><strong>Distrito: </strong><?php echo $this->class40terreno->getAtributo('PU04IDDISTRITO');?></li>
					<li class="list-group-item"><strong>Barrio: </strong><?php echo $this->class40terreno->getAtributo('PU39BARRIO');?></li>
					<li class="list-group-item"><strong>Dirección: </strong><?php echo $this->class40terreno->getAtributo('PU39DIRECCION');?></li>

					</ul>
					<a href="?c=class40terreno&m=index" class="btn btn-danger" role="button">Regresar</a>

				</div>
			</div>
		</div>
		</div>
