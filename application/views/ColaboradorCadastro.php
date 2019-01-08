<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="container p-4">
	<form action="<?php echo base_url('Colaborador/NovoColaborador');?>" method="POST">
		<p class="text-center">CADASTRO DO COLABORADOR</p>
		<?php
			if ($this->session->flashdata('Success') !="") {
				echo "<p class='alert alert-success text-center'>" .$msg. "</p>";
			} elseif ($this->session->flashdata('Error') !="") {
				echo "<p class='alert alert-danger text-center'>" .$msg. "</p>";
			}
		?>
		<div class="form-group">
  			<label for="inputname">Nome:</label>
  			<input type="text" name="nome" id="inputname" class="form-control" placeholder="Nome Completo">
		</div>
		<div class="form-row">
			<div class="form-group col-md-6">
				<label for="inputcpf">Função:</label>
      			<input type="text" name="funcao" class="form-control" id="inputfuncao">
    		</div>
    		<div class="form-group col-md-6">
    			<label for="inputdate">Data de Nascimento:</label>
      			<input type="date" name="nascimento" class="form-control" id="inputdate">
    		</div>
    	</div>
		<div class="form-group">
			<label for="inputAddress">Endereço:</label>
  			<input type="text" name="endereco" class="form-control" id="inputAddress" placeholder="Endereço Completo">
		</div>
		<div class="form-row">
			<div class="form-group col-md-6">
				<label for="first_name">Contatos:</label>
      			<input type="tel" name="fixo" class="form-control fixo" id="inputfone1" placeholder="Fixo">
      		</div>
    		<div class="form-group col-md-6">
    			<label for="inputfone2"><span style="color: #FFFFFF;">.</span></label>
      			<input type="tel" name="cel" class="form-control cel" id="inputfone2" placeholder="Celular">
    		</div>
    	</div>
		<div class="form-group">
			<label for="inputEmail4">E-mail:</label>
  			<input type="email" name="email" placeholder="E-mail" class="form-control" id="inputEmail4">
		</div>
		<div class="form-group">
			<label for="inputobs">Obs:</label>
			<textarea class="form-control" name="obs" id="inputobs" rows="6"></textarea>
      	</div>
        <button type="submit" class="btn btn-primary">Salvar <i class="fas fa-save ml-2"></i></button>
	</form>

</div >