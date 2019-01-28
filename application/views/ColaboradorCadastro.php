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
		<span class="form-row border border-dark border-top-0 border-left-0 border-right-0 border-bottom-1 mb-3 ml-1 mt-3 mr-1 pb-2 font-weight-bold">DADOS: </span>
		<div class="form-row">
			<div class="form-group col-md-6">
	  			<label for="inputname">Nome:</label>
	  			<input type="text" name="nome" id="inputname" class="form-control" placeholder="Nome">
	  		</div>
  			<div class="form-group col-md-6">
    			<label for="inputsobrename">Sobrenome:</label>
	  			<input type="text" name="sobrenome" id="inputsobrename" class="form-control" placeholder="Sobrenome">
    		</div>
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
    	<span class="form-row border border-dark border-top-0 border-left-0 border-right-0 border-bottom-1 mb-3 ml-1 mt-3 mr-1 pb-2 font-weight-bold">ENDEREÇO: </span>
    	<div class="form-row">
	    	<div class="form-group col-md-3">
				<label for="inputAddress">CEP:</label>
	  			<input type="text" name="cep" class="form-control" id="inputcep" placeholder="99.999-999">
			</div>
			<div class="form-group col-md-9">
				<label for="inputAddress">Endereço:</label>
	  			<input type="text" name="endereco" class="form-control" id="inputAddress" placeholder="Endereço">
			</div>
		</div>
		<div class="form-row">
	    	<div class="form-group col-md-3">
				<label for="inputAddress">Bairro:</label>
	  			<input type="text" name="bairro" class="form-control" id="inputbairro" placeholder="Bairro">
			</div>
			<div class="form-group col-md-3">
				<label for="inputAddress">Estado:</label>
	  			<input type="text" name="estado" class="form-control" id="inputestado" placeholder="Bairro">
			</div>
		</div>
		<span class="form-row border border-dark border-top-0 border-left-0 border-right-0 border-bottom-1 mb-3 ml-1 mt-3 mr-1 pb-2 font-weight-bold">CONTATOS: </span>
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
		<span class="form-row border border-dark border-top-0 border-left-0 border-right-0 border-bottom-1 mb-3 ml-1 mt-3 mr-1 pb-2 font-weight-bold">DADOS DO SISTEMA: </span>
        <button type="submit" class="btn btn-primary">Salvar <i class="fas fa-save ml-2"></i></button>
	</form>

</div >