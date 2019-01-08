<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="container p-4">
	<form action="<?php echo base_url('Colaborador/AlterarColaborador');?>" method="POST">
		<p class="text-center">ALTERAR COLABORADOR</p>
		<?php echo $msg;?>
		<div class="form-group">
  			<label for="inputname">Nome:</label>
  			<input type="hidden" name="id" value="<?= $clb['id_colab']; ?>">
  			<input type="text" name="nome" id="inputname" class="form-control" placeholder="Nome Completo" value="<?= $clb['nome_colab']; ?>">
		</div>
		<div class="form-row">
			<div class="form-group col-md-6">
				<label for="inputcpf">Função:</label>
      			<input type="text" name="funcao" class="form-control" id="inputcpf" value="<?= $clb['funcao_colab']; ?>">
    		</div>
    		<div class="form-group col-md-6">
    			<label for="inputdate">Data de Nascimento:</label>
      			<input type="date" name="nascimento" class="form-control" id="inputdate" value="<?= $clb['nasc_colab']; ?>">
    		</div>
    	</div>
		<div class="form-group">
			<label for="inputAddress">Endereço:</label>
  			<input type="text" name="endereco" class="form-control" id="inputAddress" placeholder="Endereço Completo" value="<?= $clb['end_colab']; ?>">
		</div>
		<div class="form-row">
			<div class="form-group col-md-6">
				<label for="first_name">Contatos:</label>
      			<input type="tel" name="fixo" class="form-control fixo" id="inputfone1" placeholder="Fixo" value="<?= $clb['fixo_colab']; ?>">
      		</div>
    		<div class="form-group col-md-6">
    			<label for="inputfone2"><span style="color: #FFFFFF;">.</span></label>
      			<input type="tel" name="cel" class="form-control cel" id="inputfone2" placeholder="Celular" value="<?= $clb['cel_colab']; ?>">
    		</div>
    	</div>
		<div class="form-group">
			<label for="inputEmail4">E-mail:</label>
  			<input type="email" name="email" placeholder="E-mail" class="form-control" id="inputEmail4" value="<?= $clb['email_colab']; ?>">
		</div>
		<div class="form-group">
			<label for="inputobs">Obs:</label>
			<textarea class="form-control" name="obs" id="inputobs" rows="6"><?= $clb['obs_colab']; ?></textarea>
      	</div>
        <button type="submit" class="btn btn-primary">Salvar <i class="fas fa-save ml-2"></i></button>
		<a href="<?= base_url('Colaborador/ExcluirColaborador?id='.$clb['id_colab']);?>" class="btn btn-danger ml-2">Excluir <i class="fas fa-trash-alt ml-2"></i></a>
	</form>
</div >