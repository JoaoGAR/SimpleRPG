<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Simple RPG</title>
	<link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=MedievalSharp" />
	<link rel="stylesheet" href="<?=base_url("css/bootstrap.min.css");?>">
	<link rel="stylesheet" href="<?=base_url("css/main.css");?>">
	<link rel="stylesheet" href="<?=base_url("css/modais.css");?>">
	<link rel="stylesheet" href="<?=base_url("css/icones.css");?>">
	<script src="<?=base_url('js/jquery.min.js') ?>"></script>
	<script src="<?=base_url('js/bootstrap.min.js') ?>"></script>
</head>
<body>
	<div class="container-fluid mapa">
		<?php $this->load->view('jogo/elementos');
		$brasao = $this->session->userdata('personagem_logado')['brasao'];
		?>
	</div>

	<div class="container-fluid fundo-papiro barra-inferior">
		<div class="row">
			<div class="col-md-2" style="padding-left:0">
				<div class="col-md-8 heraldy">
					<img style="margin-top:5px;" class="img-responsive" src="<?=base_url($brasao) ?>">
				</div>

				<div class="col-md-1 barra-icones">
					<button class="icone icone-inventario" data-toggle="modal" data-target="#inventario"></button>
					<button class="icone icone-talentos" data-toggle="modal" data-target="#talentos"></button>
					<button class="icone icone-cla"></button>
				</div>
			</div>

			<div class="col-md-2 status">
				<div class="status-elemento">
					<label>Pontos de Vida</label>
					<div class="progress">
						<div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="10" aria-valuemin="1" aria-valuemax="10" style="width: 100%;">
							<p><i><?=$status["vida"] ?></i>/<?=$status["vida_maxima"] ?></p>
						</div>
					</div>
				</div>

				<div class="status-elemento">
					<label>Energia</label>
					<div class="progress">
						<div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="5" aria-valuemin="0" aria-valuemax="5" style="width: 100%;">
							<p><i><?=$status["energia"] ?></i>/<?=$status["energia_maxima"] ?></p>
						</div>
					</div>
				</div>

				<div class="status-elemento">
					<div class="progress">
						<div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="5" style="width: 0%;">
							<p><i><?=$status["experiencia"] ?></i>/<?=$status["experiencia_maxima"] ?></p>
						</div>
					</div>
				</div>
			</div>

			<div class="col-md-2">
				<div class="mini-map">
					<img class="img-responsive" src="<?=base_url('images/mundo/world2.jpg') ?>" alt="Mini Map" usemap="#minimap">
					<map name="minimap">
						<area id="primeiro-quadrante" class="minimap-map" shape="rect" coords="0,0,93,44" href="javascript:void(0)" alt="top left">
						<area id="segundo-quadrante" class="minimap-map" shape="rect" coords="186,0,93,44" href="javascript:void(0)" alt="top right">
						<area id="quarto-quadrante" class="minimap-map" shape="rect" coords="93,44,186,88" href="javascript:void(0)" alt="center right">
						<area id="terceiro-quadrante" class="minimap-map" shape="rect" coords="93,44,0,88" href="javascript:void(0)" alt="center left">
						<area id="quinto-quadrante" class="minimap-map" shape="rect" coords="93,88,0,127" href="javascript:void(0)" alt="bottom left">
						<area id="sexto-quadrante" class="minimap-map" shape="rect" coords="93,88,185,128" href="javascript:void(0)" alt="bottom right">
					</map>
				</div>
			</div>

			<div class="col-md-4 fila_trabalhos">
				<div class='col-md-3 trabalho_fila'>
					<img class="img-responsive" src="<?=base_url('images/icones/fila_trabalho.png') ?>">
				</div>
			</div>

			<div class="col-md-1">
				<?=form_open("system/deslogar"); ?>
				<button class="icone icone-saida" style="margin-top:50px;"></button>
				<?=form_close() ?>
			</div>

		</div>

	</div>
</div>

<!-- =-=-=-=-=-= MODAIS =-=-=-=-=-= -->
<?php $this->load->view('jogo/modal_talentos') ?>
<?php $this->load->view('jogo/modal_trabalho') ?>
<?php $this->load->view('jogo/modal_inventario') ?>

<div class="modal fade" id="fila_trabalho">
	<div class="col-md-10 col-md-offset-1 modal-espolios">
		<div class="col-md-12">
			<h1 class="text-left titulo">Fila de Trabalho</h1>
		</div>
		<div class="col-md-12 recompensas">

		</div>
	</div>
</div>
<!-- =-=-=-=-=-= /MODAIS/ =-=-=-=-=-= -->

<script>
	var talento_nome;
	var talento_descricao;
	var talento_logo;
	var id_trabalho;

	$verifica = window.setInterval(verifica_trabalho, 2000);

	function verifica_trabalho() {
		console.log('trabalhando..');
		$.ajax({
			url: '<?=base_url("index.php/trabalho/verifica_fila") ?>',
			dataType: "json", 
			success: function(bonificacao){ 
				
			}
		});
	}

	$(".minimap-map").on("click", function(e){
		$(".quadrante").hide();
		var quadrante = $(this).attr('id');
		$("."+quadrante).show();
		var coords = $(this).attr("alt");
		$(".mapa").css("background-position", coords);
	});

	$(".talento-p > img").on("click", function(e){
		talento_nome = $(this).attr("nome");
		talento_descricao = $(this).attr("descricao");
		talento_logo = $(this).attr("src");
		$(".talento-nome").text(talento_nome);
		$(".talento-texto").text(talento_descricao);
		$(".talento-logo").attr("src",talento_logo);
	});

	$('.trabalho').on('click',function(e){
		id_trabalho = $(this).attr('id');
		$.ajax({
			url: '<?=base_url("index.php/trabalho/carregar_trabalho?id_trabalho='+id_trabalho+'") ?>',
			dataType: "json", 
			success: function(trabalho){ 
				var trabalho_nome = trabalho.nome;
				var trabalho_texto = trabalho.descricao;
				var dinheiro_trabalho = trabalho.dinheiro;
				var energia_trabalho = trabalho.energia;
				var exp_trabalho = trabalho.experiencia;
				var perigo_trabalho = trabalho.perigo;
				var qtd_ptsRequisitos = trabalho.qtsPontos;
				var p_requisito = trabalho.p_requisito;
				var s_requisito = trabalho.s_requisito;
				var t_requisito = trabalho.t_requisito; 

				$(".nome_trabalho").text(trabalho_nome);
				$(".trabalho_texto").text(trabalho_texto);

				$("#trabalho_experiencia").text(exp_trabalho+" pontos de EXP à cada 30 minutos");
				$("#trabalho_energia").text("gasta "+energia_trabalho+" pontos de energia à cada 30 minutos");
				$("#trabalho_dinheiro").text(dinheiro_trabalho+" moedas de cobre à cada 30 minutos");
				$("#trabalho_perigo").text(perigo_trabalho+"% de chance de aocntecer algo ruim");

				$("#p_requisito").attr("src","<?=base_url('"+p_requisito+"') ?>");
				$("#s_requisito").attr("src","<?=base_url('"+s_requisito+"') ?>");
				$("#t_requisito").attr("src","<?=base_url('"+t_requisito+"') ?>");

				$("#qtd_ptsRequisitos").text(qtd_ptsRequisitos);
			}
		});
})

$("#horas_trabalho").on("change", function(e){
	var valor = $(this).val();
	var txt;
	if (valor == "0") {
		txt = '30 Minutos';
	}
	else if (valor == "60") {
		txt = '1 Hora';
	}
	else if (valor == "120") {
		txt = '2 Horas';
	}
	$(this).next().text(txt)
})

$(".icone-talentos").on("click", function(e){
	$.ajax({
		url: '<?=base_url("index.php/talentos/carregar_talentos") ?>',
		dataType: "json", 
		success: function(talentos){ 
			$("#constituicao").text(talentos.constituicao);
			$("#vigor").text(talentos.vigor);
			$("#resistencia").text(talentos.resistencia);
			$("#aparencia").text(talentos.aparencia);
			$("#evasao").text(talentos.evasao);
			$("#mira").text(talentos.mira);
			$("#pericia").text(talentos.pericia);
			$("#estrategia").text(talentos.estrategia);
			$("#inteligencia").text(talentos.inteligencia);
			$("#natureza").text(talentos.natureza);
			$("#percepcap").text(talentos.percepcap);
			$("#criatividade").text(talentos.criatividade);
			$("#confianca").text(talentos.confianca);
			$("#empenho").text(talentos.empenho);
			$("#lideranca").text(talentos.lideranca);
			$("#instinto_animal").text(talentos.instinto_animal);
			$("#disfarce").text(talentos.disfarce);
			$("#arcanismo").text(talentos.arcanismo);
			$("#liturgia").text(talentos.liturgia);
			$("#ocultismo").text(talentos.ocultismo);
		}
	});
})

$(".trabalhar").on("click", function(e){
	var horas_trabalho = $("#horas_trabalho").val();
	$('#trabalho').modal('hide');
	$.ajax({
		url: '<?=base_url("index.php/trabalho/trabalhar?id_trabalho='+id_trabalho+'") ?>',
		type: "POST",
		data: {horas_trabalho: horas_trabalho},
		dataType: "json", 
		success: function(trabalho_escolhido){ 
		}
	});
})

$(".trabalho_fila").on("click", function(e){
	$("#fila_trabalho").modal('show');
	$(".recompensas").html('');
	$.ajax({
		url: '<?=base_url("index.php/trabalho/fila_trabalho") ?>',
		dataType: "json", 
		success: function(trabalhos){ 
			$.each(trabalhos, function(index, trabalho) {
				var html = '<div class="col-md-3 recompensa" id="4"><div class="col-md-12">';
				html += "<h3 class='text-center titulo-r'>"+trabalho.nome+"</h3><div class='col-md-4 col-md-offset-4'><img class='img-responsive' src='<?=base_url('"+trabalho.icon+"') ?>''></div></div>";
				html += '<div class="row"><div class="col-md-offset-2"><p id="recompensa_perigo">'+trabalho.nome+' por '+trabalho.tempo_escolhido+' Minutos</p></div></div>';
				
				if (trabalho.concluido == 1) {
					html += '<div class="col-md-10 col-md-offset-1"><button disabled="true" class="btn btn-default btn-block">CONCLUÍDO</button>';
					html += '</div><div class="col-md-10 col-md-offset-1"><?=anchor("trabalho/coletar_recompensa?id_execucao='+trabalho.id_execucao+'", "COLETAR", array("class" => "btn btn-block btn-success")) ?></div></div>';
				}
				else {
					html += '<div class="col-md-10 col-md-offset-1"><button disabled="true" class="btn btn-default btn-block"><img class="img-responsive" src="<?=base_url("images/icones/trabalhando.gif") ?>"</button>';
					html += '</div><div class="col-md-10 col-md-offset-1"><?=anchor("trabalho/cancelar_contrato?id_execucao='+trabalho.id_execucao+'", "Cancelar Contrato", array("class" => "btn btn-block btn-danger")) ?></div></div>';
				}

				$(".recompensas").append(html);
			})
}
})
})
</script>
</body>
</html>