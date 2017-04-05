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
<body class="fundo-alquimia formulario-cadastro">
	<div class="container">
		<div class="col-md-10 col-md-offset-1 fundo-papiro">
			<div class="titulo">
				<h2>Registrar-se</h2>
			</div>
			<div class="col-md-6 col-md-offset-3 corpo">
				<?=form_open("system/cadastro")  ?>
				<div>
					<label for="email">E-mail</label>
					<input value="<?=set_value('email'); ?>" id="email" name="email" type="text" class="form-control" placeholder="Informe seu e-mail">
					<?=form_error('email'); ?>
				</div>
				<div>
					<label for="senha">Senha</label>
					<input id="senha" name="senha" type="password" class="form-control" placeholder="Informe sua senha">
					<?=form_error('senha'); ?>
				</div>
				<div>
					<input id="conf-senha" name="conf-senha" type="password" class="form-control" placeholder="Confirme sua senha">
					<?=form_error('conf-senha'); ?>
				</div>
				<div>
					<button class="btn btn-block btn-primary">CADASTRAR</button>
				</div>
				<?=form_close()  ?>
				<div>
					<button class="btn btn-block btn-warning">Voltar</button>
				</div>
			</div>
			<div class="col-md-2 col-md-offset-10">
				<img class="img-responsive" src="<?=base_url('images/icones/lacre.png') ?>">
			</div>
		</div>
	</div>
</body>
</html>