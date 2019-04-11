<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
?>

<div class="container p-4">
	<a href="javascript:history.go(-1)"> <i class="fas fa-arrow-alt-circle-left"></i> <b>voltar</b> </a>
	<p class="text-center">DETALHE DA INDISPONIBILIDADE</p>
	<?php 
		$SomaData = str_replace("-","", $ind[0]['data_soma']);
		$DataInicial = str_replace("-","",  $ind[0]['data_inicial']); 

		$TotalData = $SomaData - $DataInicial;

  		if ($TotalData <= 3 && $TotalData >= 0) {
  			echo $MsgFalta = "<p class='alert alert-danger text-center'>Colaborador cadastrou indisponibilidade com 3 dias ou menos da data escolhida! </p>";
  		} else {
  			$Falta = 'border-primary';
  			$MsgFalta = Null;
  		}
    ?>	
	<div class="form-row">
		<div class="form-group col-md-12">
			<label for="inpudate">Colaborador:</label>
			<input type="text" name="date" id="inpudate" class="form-control" value="<?= $ind[0]['nome_colab'];?>" readonly>
		</div>
	</div>
	<div class="form-row">
		<div class="form-group col-md-6">
			<label for="inpudate">Data da Indisponibilidade:</label>
			<input type="text" name="date" id="inpudate" class="form-control" value="<?= date('d/m/Y', strtotime($ind[0]['data_inicial']));?>" readonly>
		</div>
		<div class="form-group col-md-6">
			<label for="inpudate">Data Cadastrada:</label>
			<input type="text" name="date" id="inpudate" class="form-control" value="<?= date('d/m/Y', strtotime($ind[0]['data_cadastrado']));?>" readonly>
		</div>			
	</div>
	<div class="form-row">
		<div class="form-group col-md-12">
			<label for="inpumotiv">Motivo:</label>
			<textarea name="motivo" id="inpumotiv" class="form-control" readonly><?= $ind[0]['motivo_ind'];?></textarea>
		</div>		
	</div>
</div>