<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="container p-4">
	<form action="<?php echo base_url('Clientes/AlterarCliente');?>" method="POST">
		<p class="text-center">ALTERAR CLIENTE</p>
		<?php echo $msg;?>
		<div class="form-group">
  			<label for="inputname">Nome:</label>
  			<input type="hidden" name="id" value="<?= $clientes['id_cli']; ?>">
  			<input type="text" name="nome" id="inputname" class="form-control" placeholder="Nome Completo" value="<?= $clientes['nome_cli']; ?>">
		</div>
		<div class="form-row">
			<div class="form-group col-md-6">
				<label for="inputcpf">CPF:</label>
      			<input type="text" name="cpf" class="form-control cpf" id="inputcpf" placeholder="Só Número" maxlength="11" value="<?= $clientes['cpf_cli']; ?>">
    		</div>
    		<div class="form-group col-md-6">
    			<label for="inputdate">Data de Nascimento:</label>
      			<input type="date" name="nascimento" class="form-control" id="inputdate" value="<?= $clientes['nasc_cli']; ?>">
    		</div>
    	</div>
		<div class="form-group">
			<label for="inputAddress">Endereço:</label>
  			<input type="text" name="endereco" class="form-control" id="inputAddress" placeholder="Endereço Completo" value="<?= $clientes['end_cli']; ?>">
		</div>
		<div class="form-row">
			<div class="form-group col-md-6">
				<label for="first_name">Contatos:</label>
      			<input type="tel" name="fixo" class="form-control fixo" id="inputfone1" placeholder="Fixo" value="<?= $clientes['fixo_cli']; ?>">
      		</div>
    		<div class="form-group col-md-6">
    			<label for="inputfone2"><span style="color: #FFFFFF;">.</span></label>
      			<input type="tel" name="cel" class="form-control cel" id="inputfone2" placeholder="Celular" value="<?= $clientes['cel_cli']; ?>">
    		</div>
    	</div>
		<div class="form-group">
			<label for="inputEmail4">E-mail:</label>
  			<input type="email" name="email" placeholder="E-mail" class="form-control" id="inputEmail4" value="<?= $clientes['email_cli']; ?>">
		</div>
        <button type="submit" class="btn btn-primary">Salvar <i class="fas fa-save ml-2"></i></button>
		<a href="<?= base_url('Clientes/ExcluirCliente?id='.$clientes['id_cli']);?>" class="btn btn-danger ml-2">Excluir <i class="fas fa-trash-alt ml-2"></i></a>
	</form>
</div >