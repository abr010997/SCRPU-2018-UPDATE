<div class="row">
			<div class="panel panel-default">
				<div class="panel-heading">Listado de  usuarios:</div>
				<div class="panel-body">
					<ul class="list-group">
					<li class="list-group-item"><strong>Cédula: </strong><?php echo $this->class0102usuarios->getAtributo('PU01CEDUSU');?></li>
					<li class="list-group-item"><strong>Nombre: </strong><?php echo $this->class0102usuarios->getAtributo('PU01NOMUSU');?></li>
					<li class="list-group-item"><strong>Primer Apellido: </strong><?php echo $this->class0102usuarios->getAtributo('PU01APE1USU');?></li>
					<li class="list-group-item"><strong>Segundo Apellido: </strong><?php echo $this->class0102usuarios->getAtributo('PU01APE2USU');?></li>
					<li class="list-group-item"><strong>Teléfono: </strong><?php echo $this->class0102usuarios->getAtributo('PU02TELUSU');?></li>
					<li class="list-group-item"><strong>Correo: </strong><?php echo $this->class0102usuarios->getAtributo('PU02CORUSU');?></li>
					<li class="list-group-item"><strong>Puesto: </strong><?php echo $this->class0102usuarios->getAtributo('PU03IDPUES');?></li>
						
					</ul>
					<a href="?c=class0102usuarios&m=index" class="btn btn-danger" role="button">Regresar</a>  

				</div>
			</div>
		</div>
        </div>