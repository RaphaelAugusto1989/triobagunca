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

			<div class="row justify-content-md-center">
				<div class="col align-self-center col-md-4 login">
					<p class="text-center">Esqueceu sua senha?</p>
					<?php
						if ($this->session->flashdata('msgErro') !="") {
							echo "<p class='alert alert-danger text-center'>".$ErroLogin. "</p>";
						}
					?>
                    <a href="<?php echo base_url(); ?>" class="float-right mb-1"><i class="fas fa-angle-double-left"></i> Voltar</a>
					<form action="<?php echo base_url('LoginSystem/EnviaLinkSenha');?>" method="post">
						<div class="input-group mb-2">
					        <div class="input-group-prepend">
					          <div class="input-group-text"><i class="fas fa-envelope"></i></div>
					        </div>
		          			<input type="text" id="email" name="email" class="form-control form-control-lg" placeholder="Insira seu e-mail" required>
						</div>
						<div class="input-group mb-2">
					        <div class="input-group-prepend">
					          <div class="input-group-text"><i class="fas fa-address-card"></i></div>
					        </div>
                            <input type="text" name="cpf" class="form-control form-control-lg cpf" id="inputcpf" maxlength="11" placeholder="Insira seu CPF" required>
			        	</div>
			        	<div class="input-group mb-2">
							<button type="submit" class="btn btn-block btn-primary btn-lg">Recuperar</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</body>
	<script src="<?php echo base_url('assets/js/jquery.min.js');?>"></script>
    <script src="<?php echo base_url('assets/js/jquery.mask.min.js')?>"></script>
    <script src="<?php echo base_url('assets/js/mask.js')?>"></script>
</html>