<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
?>
	<div class="container p-4">
	<form action="Agenda/NovoAgendamento" method="post">
		<p class="text-center">PRÉ AGENDAMENTO</p>
		<?php
			if ($this->session->flashdata('Success') !="") {
				echo "<p class='alert alert-success text-center'>" .$msg. "</p>";
			} elseif ($this->session->flashdata('Error') !="") {
				echo "<p class='alert alert-danger text-center'>" .$msg. "</p>";
			}
		?>
		<div class="form-group">
			<label for="inputcliente">Nome Completo:</label>
			<input type="text" name="nome_cliente" id="autocomplete" class="form-control" placeholder="Nome do Cliente">
		 </div>
		 <div class="form-row">
			 	<div class="form-group col-md-3">
			 		<label for="data">Data do Evento:</label>
			 		<input type="date" name="data_evento" class="form-control" id="data">
			 	</div>
			 	<div class="form-group col-md-2">
			 		<label for="horario">Horário:</label>
			 		<input type="text" name="hora_evento" class="form-control hora" id="horario"  placeholder="00:00">
			 	</div>
				<div class="form-group col-md-7">
					<label for="inputemail">E-mail:</label>
					<input type="email" name="email_cliente" id="inputemail" class="form-control" placeholder="E-mail">
			 </div>
		 </div>
		 <div class="form-group">
		 	<label for="selectpacotes">Pacotes:</label>
		 	<select  class="form-control" id="selectpacotes" name="pct">
		 		<option value="" selected disabled>Escolha o Pacote</option>
		 		<?php foreach ($pacote as $pct) : ?>
					<option value="<?=  $pct['id_pct']; ?>"><?=  $pct['nome_pct']; ?></option>
				<?php endforeach ?>
		 	</select>
		 </div>

		 <div class="form-group">
		 		<!--Especificação do Pacote:-->
		 		<input type="hidden" name="especificacao" id="especificacao" class="form-control"  value="<?= $dadospacote['especificacao_pct'];?>">
		 </div>
		 <div class="form-row">
		 	<div class="form-group col-md-6">
		 		<!--Tempo:-->
		 		<input type="hidden" name="tempo_evento" id="tempo" class="form-control hora"  placeholder="00:00" value="<?= $dadospacote['tempo_pct'];?>" disebled>
		 	</div>
		 	<div class="form-group col-md-6">
		 		<!--Valor do Pacote:-->
		 		<input type="hidden" name="valor_pct" id="valor" class="form-control moeda"  value="<?= $dadospacote['valor_pct'];?>" disebled>
		 	</div>
		 </div>
		 	<input type="hidden" name="status" value="Pendente">
		 	<button type="submit" class="btn btn-primary">Salvar <i class="fas fa-save ml-2"></i></button>
		 </div>
		</form>
	</form>
</div>
