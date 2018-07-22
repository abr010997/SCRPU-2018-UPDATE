		<div class="row">
			<div class="panel panel-default">
				<div class="panel-heading">Detalle de la Infraestructura</div>
				<div class="panel-body">
					<ul class="list-group">
						<li class="list-group-item"><strong> Código de la infraestructura: </strong>
							<?php echo $this->class24infest->getAtributo('PU24IDINFR');?>
						</li>
						<li class="list-group-item"><strong>Descripción de la infraestructura: </strong>
							<?php echo $this->class24infest->getAtributo('PU24DESCINF');?>
						</li>
					</ul>
					<a href="?c=class24infest&m=index" class="btn btn-danger" role="button">Regresar</a>  
				</div>
			</div>
		</div>
