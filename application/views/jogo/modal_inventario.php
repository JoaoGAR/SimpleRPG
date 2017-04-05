<div class="modal fade modal-inventario" id="inventario">
	<div class="col-md-5 col-md-offset-2">
		Inventário
	</div>
	<div class="col-md-6">
		<div class="col-md-12 inventario">
			<div class="row">
				<div class="col-md-3 slot equipado-cabeca">
					<img class="img-responsive" src="<?=base_url('images/itens/cabeca/capuz-simples.png') ?>">
				</div>
			</div>
			<div class="row">
				<div class="col-md-3 slot equipado-p-mao">
					<img class="img-responsive" src="<?=base_url('images/itens/armas/adagas/adaga-sagrada.png') ?>">
				</div>
				<div class="col-md-4 slot equipado-peito">
					<img class="img-responsive" src="<?=base_url('images/itens/peito/peito-couro.png') ?>">
				</div>
				<div class="col-md-3 slot equipado-s-mao">
					<img class="img-responsive" src="<?=base_url('images/itens/armas/adagas/adaga-sacrificio.png') ?>">
				</div>
			</div>
			<div class="row">
				<div class="col-md-3 slot equipado-pes">
					<img class="img-responsive" src="<?=base_url('images/itens/pes/bota-couro.png') ?>">
				</div>
			</div>
		</div>
	</div>
	<div class="col-md-6 inventario">
		<?php for ($i=1; $i < 26; $i++) { 
			echo "<div class='col-md-2 slot slot-".$i."'></div>";
		} ?>
	</div>
</div>