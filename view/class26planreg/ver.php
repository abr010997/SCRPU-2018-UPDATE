		<div class="row">
			<div class="panel panel-default">
				<div class="panel-heading">Detalle del Plan Regulador</div>
				<div class="panel-body">
					<ul class="list-group">
						<li class="list-group-item"><strong>Código del Plan Regulador: </strong><?php echo $this->class26planreg->getAtributo('PU26IDPLAN');?></li>
						<li class="list-group-item"><strong>Descripción del Plan Regulador: </strong><?php echo $this->class26planreg->getAtributo('PU26PLNDESC');?></li>
						
					</ul>
					<a href="?c=class26planreg&m=index" class="btn btn-danger" role="button">Regresar</a>  

				</div>
			</div>
		</div>

