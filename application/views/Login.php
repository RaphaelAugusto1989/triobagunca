<!doctype html>
<html lang="pt-br">
<head>
    <title>Área Restrita</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.css'); ?>">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/bsadmin.css'); ?>">
</head>
	<body class="bg">
		<div class="container">
            <div class="row">
                <div class="logologin text-center col col-md">
                    <img src="<?php echo base_url('assets/img/logo-trio.png'); ?>" class="rounded" width="250px">
                </div>
            </div>
			<div class="row justify-content-md-center">
				<div class="col align-self-center col-md-4 login">
					<p class="text-center">Área Restrita</p>
					<?php 
						if ($this->session->flashdata('msgErro') !="") {
							echo "<p class='alert alert-danger text-center'>".$ErroLogin. "</p>";
						}
					?>
					<form action="<?php echo base_url('LoginSystem/AutenticaLogin');?>" method="post">
						<div class="input-group mb-2">
					        <div class="input-group-prepend">
					          <div class="input-group-text"><i class="fas fa-user"></i></div>
					        </div>
		          			<input type="text" id="login" name="login" class="form-control form-control-lg" placeholder="Usuário ou E-mail" required>
						</div>
						<div class="input-group mb-2">
					        <div class="input-group-prepend">
					          <div class="input-group-text"><i class="fas fa-key"></i></div>
					        </div>
		          			<input type="password" name="password" id="password" class="form-control form-control-lg" placeholder="Senha" required>
		          			<div class="input-group-append border-0">
		          				<a href="#" class="input-group-text bg-white border-0 btn btn-link" id="showPassword" title="Mostrar Senha" style="text-decoration: none;"><i class="fas fa-eye"></i></a>
		          			</div>
			        	</div>
			        	<div class="input-group mb-2">
							<button type="submit" class="btn btn-block btn-primary btn-lg">Entrar</button>
						</div>
					</form>
					<a href="<?php echo base_url('EsqueciSenha');?>" class="text-white text-center"> Esqueci minha senha</a>
				</div>
			</div>
		</div>
	</body>
	<script src="<?php echo base_url('assets/js/jquery.min.js');?>"></script>
	<script type="text/javascript">
			//Exibir e esconder senha
			$(document).ready(function(){
				$('#showPassword').on('click', function(){
				    var passwordField = $('#password');
				    var passwordFieldType = passwordField.attr('type');
				    if(passwordFieldType == 'password') {
				        passwordField.attr('type', 'text');
				        $(this).html('<i class="fas fa-eye-slash"></i>');
				    } else {
				        passwordField.attr('type', 'password');
				        $(this).html('<i class="fas fa-eye"></i>');
				    }
				});
			});
	</script>
</html>