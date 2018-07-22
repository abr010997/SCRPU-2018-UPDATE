		<div class="row">
			<div class="panel panel-default">
				<div class="panel-heading">Detalle  de Capacidad de Uso de Suelo</div>
				<div class="panel-body">
					<ul class="list-group">
					<li class="list-group-item"><strong>Código de Capacidad de Uso de Suelo</strong><?php echo $this->class32capuso->getAtributo('PU32IDCUSO');?></li>
						<li class="list-group-item"><strong>Descripción de Capacidad de Uso de Suelo: </strong><?php echo $this->class32capuso->getAtributo('PU32DESUSO');?></li>
						
					</ul>
					<a href="?c=class32capuso&m=index" class="btn btn-danger" role="button">Regresar</a>  

				</div>
			</div>
		</div>

