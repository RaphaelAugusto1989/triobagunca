<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="container p-4">
	<form action="<?php echo base_url('Pacotes/NovoPacote');?>" method="POST">
		<p class="text-center">CADASTRO DE PACOTES</p>
		<?php
			if ($this->session->flashdata('Success') !="") {
				echo "<p class='alert alert-success text-center'>" .$msg. "</p>";
			} elseif ($this->session->flashdata('Error') !="") {
				echo "<p class='alert alert-danger text-center'>" .$msg. "</p>";
			}
		?>
		<div class="form-group">
  			<label for="inputpacote">Pacote:</label>
  			<input type="text" name="pacote" id="inputpacote" class="form-control" placeholder="Nome do Pacote">
		</div>
		<div class="form-row">
			<div class="form-group col-md-6">
				<label for="inputtime">Tempo:</label>
      			<input type="text" name="tempo" class="form-control hora" id="inputtime"placeholder="00:00">
    		</div>
    		<div class="form-group col-md-6">
    			<label for="inputvalor">Valor:</label>
      			<input type="text" name="valor" class="form-control moeda" id="inputvalor" style="display:inline-block" placeholder="200,00">
    		</div>
    	</div>
		<div class="form-group">
			<label for="inputesp">Especificação:</label>
  			<textarea class="form-control" name="especificacao" id="inputesp" rows="6"></textarea>
		</div>
		<div class="form-group">
			<label for="inputobs">Obs:</label>
			<textarea class="form-control" name="obs" id="inputobs" rows="6"></textarea>
      	</div>
        <button type="submit" class="btn btn-primary">Salvar <i class="fas fa-save ml-2"></i></button>
	</form>
</div>
