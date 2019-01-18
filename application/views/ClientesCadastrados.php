<div class="container p-4">
	<form action="">
		<div class="form-group row">
			<div class="col-lg-4"></div>
			<div class="col-lg-3"><p class="text-center">CLIENTES CADASTRADOS</p></div>
			<div class="col-lg-3 text-left">
				<input type="text" class="form-control form-control-block form-control-sm" id="inputdefault" placeholder="Nome ou CPF">
			</div>
			<div class="col-lg-2"><button class="btn btn-secondary btn-sm btn-block" type="submit"><i class="fas fa-search"></i> Buscar</button></div>
		</div>
	</form>

		<?php
			if ($this->session->set_flashdata('Success') !="") {
				echo "<p class='alert alert-danger text-center'>" .$Success. "</p>";
			} 
		?>
        <span class="text-right"><?php echo "Você tem ".$total." clientes cadastrados!"; ?></span>
        <?php foreach ($clientes as $cli) : ?>
            <div class="row border border-primary rounded p-2 mb-2 text-primary">
                <div class="col text-truncate">
                    <span class="font-weight-light">Nome: <br /></span>
                    <span class="h5"><?= anchor("Clientes/DetalheCliente/{$cli['id_cli']}", $cli['nome_cli']); ?></span>
                </div>
                <div class="col">
                    <span class="font-weight-light">CPF: <br /></span>
                    <span class="h5"><?= anchor("Clientes/DetalheCliente/{$cli['id_cli']}", $cli['cpf_cli']); ?></span>
                </div>
                <div class="col text-truncate">
                    <span class="font-weight-light">E-mail: <br /></span>
                    <span class="h5"><?= anchor("Clientes/DetalheCliente/{$cli['id_cli']}", $cli['email_cli']); ?></span>
                </div>
                <div class="col">
                    <span class="font-weight-light">Contato: <br /></span>
                    <span class="h5">
                        <?php
                            if (empty($cli['fixo_cli'])) {
                                echo anchor("Clientes/DetalheCliente/{$cli['id_cli']}", $cli['cel_cli']);
                            } else {
                                echo anchor("Clientes/DetalheCliente/{$cli['id_cli']}", $cli['fixo_cli']);
                            }
                        ?>
                    </span>
                </div>
            </div>
        <?php endforeach?>
        </tbody>
  	</table>
</div>
