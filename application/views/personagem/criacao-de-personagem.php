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
<body class="fundo-alquimia">
	<div class="container">
		<div class="col-md-10 col-md-offset-1 fundo-papiro">
			<div class="criar-personagem">
				<h1 class="text-left">Raças</h1>

				<div class="erros">
					<?php 
					if ($this->session->flashdata("erro-hask")) 
					{
						echo "<p class='text-danger text-center'> <b>:( Ocorreu um erro ao criar o personagem.</p><p class='text-danger text-center'>Tente novamente.</b></p>";
					} 
					?>
				</div>

				<div class="racas">
					<a href="javascript:void(0)" class="selecao" id="humano">Humano</a>
					<a href="javascript:void(0)" class="selecao" id="elfo">Elfo</a>
					<a href="javascript:void(0)" class="selecao" id="anao">Anão</a>

					<div class="humano">
						<h2 class="text-center">Humanos</h2>
						<div class="col-md-4">
							<div class="col-md-12">
								<img class="img-responsive" src="<?=base_url('images/personagens/Humans.png') ?>" alt="Human Male">
							</div>
						</div>
						<div class="col-md-8">
							<p class="raca-descricao text-justify">
								Humanos são a raça mais presente no planeta, com um impulso de conquista e conhecer novas 
								terras. São adaptaveis à qualquer território e tem uma fome de poder que parece insaciável. 
								Humanos possuêm várias crenças e religiões distintas. Sendo as mais conhecidas as com base em 
								Creysio, um homem que dizia se comunicar com Deus, deixou alguns manuscritos e vários 
								Humanos os interpretam de formas distintas.
								As diferentes interpreteções causam guerras entre os Humanos e acaba dizimando grandes cidades.
								As cidades humanas são conhecidas pelo caos e pelas grandes casas próximas do senado. 
								A politica humana é simples, cada cidade possui distritos e cada distrito elege um 
								representante que entre eles elege um Superintendente responsável pelas negociações com 
								outras cidades.
							</p>
						</div>
						<div class="vertentes-humanas col-md-6">
							<h3>Vertentes Humanas</h3>
							<div class="row">

								<div class="col-md-3 heraldy" raca="Humano" vertente="Creysionista">
									<img class="img-responsive" src="<?=base_url('images/heraldry/brasao/heraldica-humano-cresy.jpg') ?>">
								</div>
								
								<div class="col-md-3 heraldy" raca="Humano" vertente="Antecreysionista">
									<img class="img-responsive" src="<?=base_url('images/heraldry/brasao/heraldica-humano-ante.jpg') ?>">
								</div>

								<div class="col-md-3 heraldy" raca="Humano" vertente="Uteista">
									<img class="img-responsive" src="<?=base_url('images/heraldry/brasao/heraldica-humano-ute.jpg') ?>">
								</div>
								
							</div>

							<div class="row vertente-descricao">
								<div class='vertente escondido col-md-12 text-justify Creysionista'>
									<p class="titulo">
										Creysionistas 
									</p>
									<p>
										(Acreditam que Creysio foi o messias que anunciou o fim de uma era, contam os anos a partir da chegada de Creysio e ignoram tudo que aconteceu antes. São fanáticos ao extremo e não são de aceitar opiniões alheias. Por possuirem esse gênio forte, de natureza, são excelentes soldados que seguem as ordens de seus superiores sem questionar.)
									</p>									
								</div>

								<div class='vertente escondido col-md-12 text-justify Antecreysionista'>
									<p class="titulo">
										Antecreysion 
									</p>
									<p>
										(Acreditam que Creysio veio para afirmar as antigas leis dos Deuses e o vêem apenas como um religioso, contam os anos a partir da criação do universo segundo Creysio, aceitam todos os deuses antigos e dão à Creysio o posto de braço direito de Deus. São mais mente aberta e aceitam inclusive o homossexualismo e o incesto, são vistos como bárbaros pelos Creysionistas e acabam travando as maiores batalhas da hitória, são ótimos em contar histórias sobre os tempos antigos e suas cidades são conhecidas pelos belos bordéis.)
									</p>									
								</div>

								<div class='vertente escondido col-md-12 text-justify Uteista'>
									<p class='titulo'>
										Uteistas 
									</p>
									<p>
										(Acreditam no mundo dos espiritos, para eles Creysio era um vidente que conseguia se comunicar com os espíritos. São tranquilos e temem os espiritos, deixando oferendas e sempre pedindo permissão antes de entrar em algun local, seja ele sagrado ou não. São ótimos agricultores e exploradores, tem conhecimentos sobre as ervas e amam os animais pois todo ser possui um espirito.)
									</p>									
								</div>
							</div>
						</div>
					</div>

					<div class="elfo escondido">
						<h2 class="text-center">Elfos</h2>
						<div class="col-md-4">
							<div class="col-md-12">
								<img class="img-responsive" src="<?=base_url('images/personagens/Elves.png') ?>" alt="Elf Male">
							</div>
						</div>
						<div class="col-md-8">
							<p class="raca-descricao text-justify">
								Elfos são seres de uma raça mística com aparência humanóide geralmente belos(as). 
								São mais altos e menos fortes, porém mais rápidos e habilidosos que os humanos. 
								Há quem diga que são Semi-Deuses e Imortais.
							</p>
						</div>
						<div class="vertentes-elficas col-md-6">
							<h3>Vertentes Élficas</h3>
							<div class="row">

								<div class="col-md-3 heraldy" raca="Elfo" vertente="montanha">
									<img class="img-responsive" src="<?=base_url('images/heraldry/brasao/heraldica-elfo-montanha.jpg') ?>">
								</div>
								
								<div class="col-md-3 heraldy" raca="Elfo" vertente="floresta">
									<img class="img-responsive" src="<?=base_url('images/heraldry/brasao/heraldica-elfo-floresta.jpg') ?>">
								</div>

								<div class="col-md-3 heraldy" raca="Elfo" vertente="cidade">
									<img class="img-responsive" src="<?=base_url('images/heraldry/brasao/heraldica-elfo-cidade.jpg') ?>">
								</div>
								
							</div>

							<div class="row vertente-descricao">
								<div class='vertente escondido col-md-12 text-justify montanha'>
									<p class="titulo">
										Elfos da Montanha 
									</p>
									<p>
										(Distantes da sociedade, possuem reação negativa a qualquer um que não seja elfo. Possuem maior resistência que outros elfos.)
										Os Elfos da montanha mantêm as crenças antigas, vivendo em uma sociedade sólida e rigorosa. Possuêm 3 castas importantes, 
										os Sarcedotes (Que são o topo da sociedade élfica e vivem para manter os bons costumes élficos e a crensa nos Deuses), 
										os Educadores (Que são Elfos que escolheram a vida de educar a todos, são geralmente filhos do meio de familias imfluêntes) e 
										os Imfluêntes (Que são os responsaveis pela economia élfica, possuêm maior poder aquisitivo e só abaixam a cabeça para sacerdotes Elfos da Montanha)
									</p>									
								</div>

								<div class='vertente escondido col-md-12 text-justify floresta'>
									<p class="titulo">
										Elfos da Floresta 
									</p>
									<p>
										(Foram os primeiros a manterem contatos com outras raças. Possuem ascendência sobre outras tipos de elfos pelo seu poder mágico e seu maior conhecimento. Possuem uma forte ligação com a natureza, mantendo uma dieta vegetariana.)
										Os Elfos da Floresta vivêm em tribos espalhadas pela floresta sendo a maior delas "Vishar, a cidade Alta", chamada assim por ser formada por estruturas alojadas nos topos das árvores com pontes suspensas formando ruas. São de uma hierarquia tribal, onde, cada cidade possui um Chefe (O Elfo forte da tribo), um Xamã e um conselho formado por generais e chefes visitantes de outra tribo.
									</p>									
								</div>

								<div class='vertente escondido col-md-12 text-justify cidade'>
									<p class='titulo'>
										Elfos da Cidade 
									</p>
									<p>
										(São, muitas das vezes, frutos da relação de Humanos com Elfos. Conhecidos como Meio Elfo, não possuem afinidade com nenhum outra raça, por terem crescido nas grandes cidades humanas eles sofreram discriminação por parte dos Elfos e por parte dos Humanos, sendo uma raça totalmente marginalizada.)
										Os Elfos da Cidade não possuem organização, são de sua grande maioria, empregados, pedintes, ladrões, contrabandistas e piratas.
									</p>									
								</div>
							</div>
						</div>

					</div>

					<div class="anao escondido">
						<h2 class="text-center">Anões</h2>
						<div class="col-md-4">
							<div class="col-md-12">
								<img class="img-responsive" src="<?=base_url('images/personagens/Dwarves.png') ?>" alt="Dwarf Male">
							</div>
						</div>
						<div class="col-md-8">
							<p class="raca-descricao text-justify">
								Anões possuem baixa estatura e são mestres na arte da mineração e da forjaria. 
								Geralmente são aliados dos humanos, mas não dos elfos. Embora usem outras armas, 
								preferem machados e martelos em combate, causando grandes estragos em seu oponente. 
								São impulsivos e beberrões. Quando esvaziam os barris de cerveja das tavernas, 
								procuram briga, confusão, são espalhafatosos, ou simplesmente caem bêbados, roncando 
								alto no chão. Frequentemente os anões possuem barba. A maioria possui uma pele 
								escurecida pela fuligem das minas e seus cabelos e barba são negros. 
								São dividos em cidades subterrâneas e possuem um livro chamado de "Codex" 
								onde está escrita a historia dos mesmos e que é passado de rei para rei. 
								O Codex contêm todas as regras de etiqueta e religiosas dos Anões, mas o 
								rei pode editar o Codex à sua maneira, tornando o livro um material confuso 
								de leitura e nada confiável.
							</p>
						</div>
						<div class="vertentes-anas col-md-6">
							<h3>Vertentes Anãs</h3>
							<div class="row">

								<div class="col-md-3 heraldy" raca="Anão" vertente="Elite">
									<img class="img-responsive" src="<?=base_url('images/heraldry/brasao/heraldica-anao-elite.jpg') ?>">
								</div>
								
								<div class="col-md-3 heraldy" raca="Anão" vertente="Mineirador">
									<img class="img-responsive" src="<?=base_url('images/heraldry/brasao/heraldica-anao-mine.jpg') ?>">
								</div>

								<div class="col-md-3 heraldy" raca="Anão" vertente="Exilado">
									<img class="img-responsive" src="<?=base_url('images/heraldry/brasao/heraldica-anao-exilado.jpg') ?>">
								</div>
								
							</div>

							<div class="row vertente-descricao">
								<div class='vertente escondido col-md-12 text-justify Elite'>
									<p class="titulo">
										Elite
									</p>
									<p>
										(São filhos de casas nobres, arrogantes e adoram contar vantagem, principalmente para Elfos. Aparecem pouco na superficie, mas quando aparecem estão vestindo armaduras deslumbrantes, com ouro e pedrarias.)
									</p>									
								</div>

								<div class='vertente escondido col-md-12 text-justify Mineirador'>
									<p class="titulo">
										Mineirador
									</p>
									<p>
										(A economia anã vem da mineração, todo anão, ou anã, trabalha nas minas, com algumas exceções. São resistentes e fortes, alguns até maiores que o anões comuns. Adoram seu trabalho, pois não tem outra escolha.)
									</p>									
								</div>

								<div class='vertente escondido col-md-12 text-justify Exilado'>
									<p class='titulo'>
										Exilado
									</p>
									<p>
										(São anões que por algum motivo, foram expulsos das cidades subterrâneas. Vivem como comerciantes, mercenarios ou ladrões. A maioria simplesmente fugiu das guerras que assolam o subterrâneo e alguns fugiram de dividas adquiridas em jogos de azar.)
									</p>									
								</div>
							</div>
						</div>
						
					</div>
				</div>

				<div class="row">
					<div class="col-md-2 col-md-offset-10">
						<button class="btn btn-success btn-block" data-toggle="modal" data-target="#criacao-ok" id="mostrar-dados">Confirmar</button>
						<button class="btn btn-danger btn-block">Voltar</button>
					</div>
				</div>
			</div>
		</div>
	</div>


	<!-- =-=-=-=-=-=MODAIS=-=-=-=-=-= -->
	<div class="modal fade fundo-pergaminho-2 modal-formulario" data-backdrop="static" id="criacao-ok" role="dialog">
		<div class="col-md-4 col-md-offset-4">
			<div class="col-md-12">
				<h2 class="text-center" style="color:white;margin-left:10px;">Você acaba de criar um personagem com as seguintes características:</h2>
			</div>
			<div class="col-md-10 col-md-offset-1">
				<?=form_open("system/criar_personagem") ?>
				<div class="col-md-10">
					<label form="raca-escolhida" id="mudar-raca" style="color:white;"></label>
					<input class="form-control" type="hidden" id="raca-escolhida" name="raca-escolhida">
					<label for="">, </label>
					<label form="vertente-escolhida" id="mudar-vertente" style="color:white;"></label>
					<input class="form-control" type="hidden" id="vertente-escolhida" name="vertente-escolhida">
				</div>
				<div class="col-md-12">
					<label form="nome-escolhida" style="color:white;">Digite o nome do seu personagem:</label>
				</div>
				<div class="col-md-12">
					<input class="form-control" type="text" id="nome-escolhida" name="nome-escolhida">
				</div>
				<div class="col-md-6 col-md-offset-3">
					<button type="submit" class="btn btn-success btn-block" style="margin-top:5px;">CRIAR</button>
					<?=form_close() ?>
				</div>
			</div>
			<div class="col-md-4 col-md-offset-8">
				<button type="button" class="btn btn-danger" data-dismiss="modal">CANCELAR</button>
			</div>
		</div>
	</div>
	<!-- =-=-=-=-=-=MODAIS=-=-=-=-=-= -->

	<script>
		$(function(){
			var nome;
			var raca;
			var vertente;
			$('.carousel').carousel({
				interval: 0
			})

			$(".selecao").on("click", function(e){
				var raca = $(this).attr("id");
				$(".anao").hide();
				$(".humano").hide();
				$(".elfo").hide();
				$("."+raca).show();
			})

			$(".heraldy").on("click", function(e){
				raca = $(this).attr("raca");
				vertente = $(this).attr("vertente");
				$(".vertente").hide();

				$("."+vertente).show();
				
				$("#mudar-raca").text(raca);
				$("#mudar-vertente").text(vertente);
			})

			$("#mostrar-dados").on("click", function(e){
				nome = $("#nome-escolhida").val();
				$("#raca-escolhida").val(raca);
				$("#vertente-escolhida").val(vertente);
			})
		})
	</script>
</body>
</html>