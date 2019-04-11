<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
?>

<div class="container p-4">
	<p class="text-center">DETALHE DA INDISPONIBILIDADE</p>

	<div class="form-row">
		<div class="form-group col-md-12">
			<label for="inpudate">Data da Indisponibilidade:</label>
			<input type="text" name="date" id="inpudate" class="form-control" value="<?= $ind['data_inicial'];?>">
		</div>		
	</div>
	<div class="form-row">
		<div class="form-group col-md-12">
			<label for="inpumotiv">Motivo:</label>
			<textarea name="motivo" id="inpumotiv" class="form-control"><?= $ind['motivo_ind'];?></textarea>
		</div>		
	</div>
</div>