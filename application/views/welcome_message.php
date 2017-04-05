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
<body class="fundo-taberna">
	<div class="container">
		<div class="col-md-6 col-md-offset-3 menu-inicial fundo-papiro">
			<div class="mensagens">
				<?php  
				if ($this->session->flashdata("erro-cadastro")) 
				{
					echo "<p class='text-danger text-center'> <b>:( Ocorreu um erro ao efetuar o cadastro.</p><p class='text-danger text-center'>Tente novamente.</b></p>";
				}

				if ($this->session->flashdata("erro-senha")) 
				{
					echo "<p class='text-danger text-center'> <b>:( Informe uma senha válida.</p><p class='text-danger text-center'>Tente novamente.</b></p>";

				}

				if ($this->session->flashdata("erro-email")) 
				{
					echo "<p class='text-danger text-center'> <b>:( Este e-mail já esta cadastrado.</p><p class='text-danger text-center'>Tente novamente.</b></p>";

				} 

				if ($this->session->flashdata("loginEsenhaVazios")) 
				{
					echo "<p class='text-danger text-center'> <b>:( Login ou Senha vazios.</p><p class='text-danger text-center'>Tente novamente.</b></p>";

				} 

				if ($this->session->flashdata("erro-naoLogou")) 
				{
					echo "<p class='text-danger text-center'> <b>:( Ocorreu um erro ao conectar-se com o servidor.</p><p class='text-danger text-center'>Tente novamente.</b></p>";
				} 
				?>
			</div>
			<div class="row">
				<h1 class="text-center">Simple RPG</h1>
			</div>
			<div class="col-md-10 col-md-offset-1">
				<?=form_open("system/cadastro") ?>
				<button id="margin-bottom" data-toggle="modal" class="btn btn-primary btn-block">Novo Jogo</button>
				<?=form_close() ?>
				<button data-toggle="modal" data-target="#logar" class="btn btn-success btn-block">Continuar</button>
				<button class="btn btn-warning btn-block">Configurações</button>
			</div>
		</div>
	</div>


	<div class="modal fade fundo-pergaminho-1 modal-formulario" id="logar" tabindex="-1" role="dialog">
		<div class="col-md-4 col-md-offset-4">
			<div class="modal-header">
				<h2 class="modal-title">Conectar-se</h2>
			</div>
			<?=form_open("system/autenticar")  ?>
			<div class="col-md-10 col-md-offset-1 formulario-cadastro modal-body">
				<div class="col-md-10 col-md-offset-1 campo">
					<div class="input-group">
						<span for="email-autenticar" class="input-group-addon" id="basic-addon1">E-mail</span>
						<input name="email-autenticar" type="text" class="form-control" placeholder="Digite seu e-mail" aria-describedby="basic-addon1">
						<?php echo form_error('e-mail-autenticar'); ?>
					</div>
				</div>

				<div class="col-md-10 col-md-offset-1 campo">
					<div class="input-group">
						<span for="senha-autenticar" class="input-group-addon" id="basic-addon1">Senha</span>
						<input name="senha-autenticar" type="password" class="form-control" placeholder="Digite sua senha" aria-describedby="basic-addon1">
						<?php echo form_error('Senha-autenticar'); ?>
					</div>
				</div>
			</div>
			<div class="modal-footer col-md-10 col-md-offset-1">
				<button class="btn btn-primary btn-block">Logar</button>
				<?=form_close()  ?>
			</div>
		</div>
	</div>

</body>
</html>