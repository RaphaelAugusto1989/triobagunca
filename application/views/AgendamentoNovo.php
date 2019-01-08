<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
?>
	<div class="container p-4">
	<form action="Agenda/NovoAgendamento" method="post">
		<p class="text-center">AGENDAR EVENTO</p>
		<?php
			if ($this->session->flashdata('Success') !="") {
				echo "<p class='alert alert-success text-center'>" .$msg. "</p>";
			} elseif ($this->session->flashdata('Error') !="") {
				echo "<p class='alert alert-danger text-center'>" .$msg. "</p>";
			}
		?>
		<div class="form-group">
			<label for="inputcliente">Cliente:</label>
			<input type="text" name="nome_cliente" id="autocomplete" class="form-control" placeholder="Nome do Cliente">
		 </div>
		 <div class="form-group">
		 		<label for="inputniver">Aniversáriante:</label>
		 		<input type="text" name="aniversariante" id="inputniver" class="form-control" placeholder="Nome Completo do Aniversáriante">
		 </div>
		 <div class="form-row">
		 	<div class="form-group col-md-4">
		 		<label for="idade">Idade:</label>
		 		<input type="number" name="idade" class="form-control" id="idade" placeholder="Só Número">
		 	</div>
		 	<div class="form-group col-md-4">
		 		<label for="data">Data do Aniversário:</label>
		 		<input type="date" name="data_evento" class="form-control" id="data">
		 	</div>
		 	<div class="form-group col-md-4">
		 		<label for="horario">Horário da Festa:</label>
		 		<input type="text" name="hora_evento" class="form-control hora" id="horario"  placeholder="00:00">
		 	</div>
		 </div>
		 <div class="form-group">
			 	<label for="end">Endereço da Festa:</label>
			 	<input type="text" name="endereco" class="form-control" id="end">
		 </div>
		 <div class="form-row">
		 	<div class="form-group col-md-3">
		 		<label for="emergencia">Contato de Emergência:</label>
		 		<input type="text" name="nome_emergencia" class="form-control" id="emergencia" placeholder="Nome">
		 	</div>
		 	<div class="form-group col-md-3">
		 		<label for="emergencia">Número de Emergência:</label>
		 		<input type="text" name="numero_emergencia" class="form-control cel" id="emergencia" placeholder="(99) 9999-9999">
		 	</div>
		 	<div class="form-group col-md-3">
		 		<label for="criancas">Quantidade de Crianças:</label>
		 		<input type="number" name="qtd_criancas" class="form-control" id="criancas">
		 	</div>
		 	<div class="form-group col-md-3">
		 		<label for="idade">Média de Idade:</label>
		 		<input type="text" name="idade_media" class="form-control" id="idade"  placeholder="Ex.: 3 à 5 anos">
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
		 		<label for="especificacao">Especificação do Pacote:</label>
		 		<textarea type="text" name="especificacao" id="especificacao" class="form-control"  disebled style="height:96px;"><?= $dadospacote['especificacao_pct'];?></textarea>
		 </div>
		 <div class="form-group">
		 		<label for="personagem">Personagem/Animação:</label>
		 		<textarea type="text" name="personagem" id="personagem" class="form-control" style="height:96px;"></textarea>
		 </div>
		 <div class="form-row">
		 	<div class="form-group col-md-4">
		 		<label for="chegada">Hora da Chegada:</label>
		 		<input type="text" name="hora_chegada" class="form-control hora" id="chegada" placeholder="00:00">
		 	</div>
		 	<div class="form-group col-md-4">
		 		<label for="tempo">Tempo:</label>
		 		<input type="text" name="tempo_evento" id="tempo" class="form-control hora"  placeholder="00:00" value="<?= $dadospacote['tempo_pct'];?>" disebled>
		 	</div>
		 	<div class="form-group col-md-4">
		 		<label for="valor_pacote">Valor do Pacote</label>
		 		<input type="text" name="valor_pct" id="valor" class="form-control moeda"  value="<?= $dadospacote['valor_pct'];?>" disebled>
		 	</div>
		 </div>
		 <div class="form-row">
		 	<div class="form-group col-md-3">
		 		<label for="valor_total">Valor Total:</label>
		 		<input type="text" name="valor_total" class="form-control moeda" id="valor_total">
		 	</div>
		 	<div class="form-group col-md-3">
		 		<label for="sinal">Sinal:</label>
		 		<input type="text" name="sinal_valor" class="form-control moeda" id="sinal">
		 	</div>
		 	<div class="form-group col-md-3">
		 		<label for="falta_pagar">Falta Pagar:</label>
		 		<input type="text" name="falta_pagar" class="form-control moeda" id="falta_pagar">
		 	</div>
		 	<div class="form-group col-md-3">
		 		<label for="status">Status:</label>
		 		<select  class="form-control" id="selectpacotes" name="status">
		 			<option value="" selected disabled>Status</option>
					<option value="Confirmado">Confirmado</option>
					<option value="Pendente">Pendente</option>
					<option value="Cancelado">Cancelado</option>
				</select>
		 	</div>
		 	<button type="submit" class="btn btn-primary">Salvar <i class="fas fa-save ml-2"></i></button>
		 </div>
		</form>
	</form>
</div>
