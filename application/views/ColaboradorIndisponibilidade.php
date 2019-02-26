<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="container p-4">
	<p class="text-center">INDISPONIBILIDADE</p>
	<?php
		if ($this->session->flashdata('Success') !="") {
			echo "<p class='alert alert-success text-center'>" .$msg. "</p>";
		} elseif ($this->session->flashdata('Error') !="") {
			echo "<p class='alert alert-danger text-center'>" .$msg. "</p>";
		}
	?>
	<div class="form-row">
	 	<div class="form-group col-md-12">
	 		<a href="" id="addInput" class="btn btn-primary"><i class="fas fa-plus"> </i> Indisponível</a>
	 	</div>
	</div>
	<?php
		$DataHoje = date('Y-m-d');
		$idcolab = $this->session->userdata('IdUser');
	?>
	<form action="<?php echo base_url('Colaborador/InsertIndisponibilidade');?>" method="POST">
		<input type="hidden" name="idcolab" id="idcolab" value="<?= $idcolab; ?>">
	 	<input type="hidden" name="datahoje" id="datahoje" value="<?= $DataHoje; ?>">
		<div id="dynamicDivDate">
	 		<div id="removDate" class="form-row">
	 			<div class="form-group col-md-3">
	 				<label> Data Inicial: </label>
			        <input type="date"  class="form-control" name="dateinicio[]" value="">
	    		</div>
	    		<div class="form-group col-md-2">
	    			<label>Hora Inicial:</label>
			        <input type="text" class="form-control hora" name="horainicial[]" value="" placeholder="00:00">
	    		</div>
	    		<div class="form-group col-md-3">
	    			<label>Data Final:</label>
			        <input type="date" class="form-control" name="datefim[]" value="">
	    		</div>
	    		<div class="form-group col-md-2">
	    			<label>Hora Final:</label>
			        <input type="text" class="form-control hora" name="horafinal[]" value="" placeholder="00:00">
	    		</div>
		    	<div class="form-group col-md-2">
		    		<br />
			    	<a class="btn btn-danger mt-md-2" href="javascript:void(0)" id="remInputdate">
			    		<span class="glyphicon glyphicon-minus" aria-hidden="true"></span>
			        	<i class="fas fa-times"  title="Remover"></i>
					</a>
				</div>
			</div>
		</div>

		<div class="form-row float-right">
		 	<button type="submit" class="btn btn-primary">Salvar <i class="fas fa-save ml-2"></i></button>
		</div>
	</form>
</div>