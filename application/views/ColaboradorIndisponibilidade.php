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
		$NomeColab = $this->session->userdata('nome');
	?>
	<form action="<?php echo base_url('Colaborador/InsertIndisponibilidade');?>" method="POST">
		<input type="hidden" name="idcolab" id="idcolab" value="<?= $idcolab; ?>">
		<input type="hidden" name="nomecolab" id="nomecolab" value="<?= $NomeColab; ?>">
		<input type="hidden" name="datahoje" id="datahoje" value="<?= $DataHoje; ?>">
	 	<input type="hidden" name="datahoje" id="datahoje" value="<?= $DataHoje; ?>">
		<div id="dynamicDivDate">
	 		<div id="removDate" class="form-row">
	 			<div class="form-group col-md-2">
	 				<label> Data Inicial: </label>
			        <input type="date"  class="form-control" name="datainicial[]" value="">
	    		</div>
	    		<div class="form-group col-md-2">
	    			<label>Data Final:</label>
			        <input type="date" class="form-control" name="datafinal[]" value="">
	    		</div>
	    		<div class="form-group col-md-7">
	    			<label>Motivo:</label>
			        <input type="text" class="form-control" name="motivo[]" value="" placeholder="Motivo da Indisponibilidade">
	    		</div>
		    	<div class="form-group col-md-1">
				</div>
			</div>
		</div>
		<div class="form-row text-rigth">
			<div class="col-md-12">
			 	<button type="submit" class="btn btn-primary">Salvar <i class="fas fa-save ml-2"></i></button>
			</div>
		</div>
	</form>
	<?php
		if (empty($ind)) {
		} else {
	?>
	<p class="text-center mt-md-5">MINHAS INDISPONIBILIDADES</p>

	<div class="row">
	<table class="table table-sm table-hover mt-md-3">
		<thead>
			<tr class="row">
				<td class="col-md-2"><b>Data Inicial</b></td>
				<td class="col-md-2"><b>Data Final</b></td>
				<td class="col-md-7"><b>Motivo da Indisponibilidade</b></td>
				<td class="col-md-1 text-center"><b>Excluir</b></td>
			</tr>
		</thead>
	<?php 
		foreach ($ind as $indice => $dadosIndi) {
			setlocale(LC_ALL, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');

			//CONVERTE PARA O DIA DA SEMANA
			$DataInicial = strftime('%d/%m/%Y - %A', strtotime($dadosIndi['data_inicial'])); 
			$DataFinal = strftime('%d/%m/%Y - %A', strtotime($dadosIndi['data_final'])); 
	?>
		<tbody>
			<tr class="row">
				<td class="text-capitalize col-md-2"><?= $DataInicial ?></td>
				<td class="text-capitalize col-md-2"><?= $DataFinal ?></td>
				<td class="text-capitalize text-truncate col-md-7"> <?= $dadosIndi['motivo_ind'] ?></td>
				<td class="text-capitalize col-md-1"><a href="<?= base_url('Colaborador/ExcluirIndisponibilidade?id='.$dadosIndi['id_ind']); ?>" class="btn btn-danger btn-sm ml-2">Excluir <i class="fas fa-trash-alt ml-2"></i></a></td>
			</tr>
		</tbody>
	<?php 
		} 
	}
	?>	
	</table>
	</div>
</div>