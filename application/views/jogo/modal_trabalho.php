<div class="modal fade fundo-pergaminho-1 modal-trabalho" id="trabalho">
	<div class="col-md-5 col-md-offset-2">
		<h2 class="text-left titulo-modal nome_trabalho"></h2>
	</div>
	<div class="col-md-12">
		<div class="col-md-6 col-md-offset-1">
			<h3>Requisitos</h3>
		</div>
		<div class="col-md-6 col-md-offset-1">
			<div class="col-md-2">
				<img id="p_requisito" class="img-responsive" src="<?=base_url('images/icones/talentos/forca/vigor.png') ?>">
			</div>
			<div class="col-md-2">
				<img id="s_requisito" class="img-responsive" src="<?=base_url('images/icones/talentos/destreza/pericia.png') ?>">
			</div>
			<div class="col-md-2">
				<img id="t_requisito" class="img-responsive" src="<?=base_url('images/icones/talentos/magia/natureza.png') ?>">
			</div>
			<div class="col-md-2">
				<button id="qtd_ptsRequisitos" disabled class="icone btn btn-default">10</button>
			</div>
			<div class="col-md-2">
				<button id="qtd_ptsPossuidos" disabled class="icone btn btn-success">50</button>
			</div>
		</div>
	</div>
	<div class="col-md-6 col-md-offset-1">
		<p class="trabalho_texto text-justify">

		</p>
	</div>
	<div class="col-md-6 col-md-offset-1">
		<div class="col-md-6">
			<p>Trabalhar :</p>
			<input id="horas_trabalho" type="range" name="horas-trabalho" min="0" max="120" step="60" value="0">
			<p>30 Minutos</p>
		</div>

		<div class="col-md-6">
			<div class="col-md-3">
				<img class="img-responsive" src="<?=base_url('images/icones/exp.png') ?>">
			</div>
			<div>
				<p id="trabalho_experiencia"></p>
			</div>
			<div class="col-md-3">
				<img class="img-responsive" src="<?=base_url('images/icones/energia.png') ?>">
			</div>
			<div>
				<p id="trabalho_energia"></p>
			</div>
			<div class="col-md-3">
				<img class="img-responsive" src="<?=base_url('images/icones/dinheiro.png') ?>">
			</div>
			<div>
				<p id="trabalho_dinheiro"></p>
			</div>
			<div class="col-md-3">
				<img class="img-responsive" src="<?=base_url('images/icones/perigo.png') ?>">
			</div>
			<div>
				<p id="trabalho_perigo"></p>
			</div>
		</div>

		<div class="col-md-4 col-md-offset-3">
			<button class="btn btn-block btn-default trabalhar"><div class="col-md-5"><img class="img-responsive" src="<?=base_url('images/icones/trabalhar.png') ?>"></div> Trabalhar</button>
		</div>
	</div>
</div>