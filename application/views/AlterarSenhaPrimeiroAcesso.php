<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
?>
<html lang="pt-br">
<head>
    <title><?= $titulo; ?></title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="icon" href="<?php echo base_url('assets/img/favicon.ico');?>" type="image/gif">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.css'); ?>">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/bsadmin.css'); ?>">
</head>
	<body class="bg">
		<div class="container">

			<div class="row justify-content-md-center">
				<div class="col align-self-center col-md-4 login">
					<p class="text-center">Primeiro Acesso</p>
					<?php
						if ($this->session->flashdata('Success') !="") {
							echo "<p class='alert alert-success text-center'>" .$msg. "</p>";
						} elseif ($this->session->flashdata('Error') !="") {
							echo "<p class='alert alert-danger text-center'>" .$msg. "</p>";
						}
						
						$IdCode = $_GET['id'];
						$DecodeId = base64_decode($IdCode);

						$NameCode = $_GET['eman'];
						$DecodeName = base64_decode($NameCode);

						echo "<p class='text-center'> Olá <u>".$DecodeName."</u>, esse é seu primeiro acesso ao sistema, te aconselho a fazer a alteração da senha enviada ao seu e-mail.</p>";
					?>
					<form action="<?php echo base_url('LoginSystem/AlterarMinhaSenha');?>" method="post">
							<input type="hidden" name="id" value="<?= $DecodeId ?>">
						<div class="input-group mb-2">
		          			<input type="password" name="antiga" class="form-control form-control-lg" placeholder="Senha Antiga" required>
						</div>
						<div class="input-group mb-2">
		          			<input type="password" name="senha1" class="form-control form-control-lg" placeholder="Digite sua senha" required>
						</div>
						<div class="input-group mb-2">
					        <input type="password" name="senha2" class="form-control form-control-lg" placeholder="Repita sua senha novamente" required>
			        	</div>
			        	<div class="input-group mb-2">
							<button type="submit" class="btn btn-block btn-danger btn-lg">Alterar</button>
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