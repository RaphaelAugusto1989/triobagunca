<!DOCTYPE html>
<html>
<head>
	<title>Recuperar senha</title>
	<link rel="stylesheet" href="http://admin.triobagunca.com.br/assets/css/bootstrap.css">
</head>
<body>
	<div class="row">
		<div class="col-sm-12 m-3">
			<p class="h3">Solicitação de Redefinição de Senha</p>
			<p>
			Prezado(a) <?= $user['nome_colab'];?> <br />
			Registramos um pedido de redefinição de senha. Caso você não tenha feito essa solicitação, por favor, desconsiderar este e-mail. Caso tenha solicitado a redefinição, clique no botão a baixo ou copie e cole o link em seu navegador.
			</p>
			Copiar link: 
		</div>
	</div>
	<div class="row">
		<div class="col-sm-12 m-3 text-center">
			<a href="#" class="btn btn-danger btn-lg"> Alterar Senha </a>
		</div>
	</div>
</body>
</html>