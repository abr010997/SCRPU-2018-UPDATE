<div class="container-fluid">
<div class="col-sm-offset-3 col-sm-6">
			<div class="panel panel-default">
				<div class="panel-heading">Listado de Propietario:</div>
				<div class="panel-body">
					<ul class="list-group">
					<li class="list-group-item"><strong>Cédula: </strong><?php echo $this->class40propietario->getAtributo('PU40CEDPROPIE');?></li>
					<li class="list-group-item"><strong>Nombre: </strong><?php echo $this->class40propietario->getAtributo('PU40NOMPROPIE');?></li>
					<li class="list-group-item"><strong>Primer Apellido: </strong><?php echo $this->class40propietario->getAtributo('PU40APE1PROPIE');?></li>
					<li class="list-group-item"><strong>Segundo Apellido: </strong><?php echo $this->class40propietario->getAtributo('PU40APE2PROPIE');?></li>

					</ul>
					<a href="?c=class40propietario&m=index" class="btn btn-danger" role="button">Regresar</a>

				</div>
			</div>
		</div>
		</div>
