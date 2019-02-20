<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="container p-4">
	<a href="javascript:history.go(-1)"> <i class="fas fa-arrow-alt-circle-left"></i> <b>voltar</b> </a>
	<form action="<?php echo base_url('Pacotes/AlterarPacote');?>" method="POST">
		<p class="text-center">ALTERAR DE PACOTE</p>
		<?php echo $msg;?>
		<div class="form-group">
  			<label for="inputpacote">Pacote:</label>
  			<input type="hidden" name="id"  value="<?= $pacote['id_pct']; ?>">
  			<input type="text" name="pacote" id="inputpacote" class="form-control" placeholder="Nome do Pacote" value="<?= $pacote['nome_pct']; ?>">
		</div>
		<div class="form-row">
			<div class="form-group col-md-6">
				<label for="inputtime">Tempo:</label>
      			<input type="text" name="tempo" class="form-control hora" id="inputtime" placeholder="00:00" value="<?= $pacote['tempo_pct']; ?>">
    		</div>
    		<div class="form-group col-md-6">
    			<label for="inputvalor">Valor:</label>
      			<input type="text" name="valor" class="form-control moeda" id="inputvalor" style="display:inline-block" placeholder="200,00"  value="<?= $pacote['valor_pct']; ?>">
    		</div>
    	</div>
		<div class="form-group">
			<label for="inputesp">Especificação:</label>
  			<textarea class="form-control" name="especificacao" id="inputesp" rows="6"> <?= $pacote['especificacao_pct']; ?></textarea>
		</div>
		<div class="form-group">
			<label for="inputobs">Obs:</label>
			<textarea class="form-control" name="obs" id="inputobs" rows="6"> <?= $pacote['obs_pct']; ?></textarea>
      	</div>
        <button type="submit" class="btn btn-primary">Salvar <i class="fas fa-save ml-2"></i></button>
		<a href="<?= base_url('Pacotes/ExcluirPacote?id='.$pacote['id_pct']);?>" class="btn btn-danger ml-2">Excluir <i class="fas fa-trash-alt ml-2"></i></a>
	</form>
</div>