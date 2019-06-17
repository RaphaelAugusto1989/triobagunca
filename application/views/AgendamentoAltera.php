<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="container p-4">
	<a href="javascript:history.go(-1)"> <i class="fas fa-arrow-alt-circle-left"></i> <b>voltar</b> </a>
	<form action="<?php echo base_url('Agenda/AlterarAgendamento');?>" method="POST">
		<p class="text-center">ALTERAR EVENTO</p>
		<?php
			if ($this->session->flashdata('Success') !="") {
				echo "<p class='alert alert-success text-center'>" .$msg. "</p>";
			} elseif ($this->session->flashdata('Error') !="") {
				echo "<p class='alert alert-danger text-center'>" .$msg. "</p>";
			}
		?>
		<span class="form-row border border-dark border-top-0 border-left-0 border-right-0 border-bottom-1 mb-3 ml-1 mt-3 mr-1 pb-2 font-weight-bold">DADOS DO CLIENTE: </span>
		<div class="form-group">
			<label for="inputcliente">Nome Completo:</label>
			<input type="hidden" name="id" class="form-control" value="<?= $evento['id_evento']; ?>">
			<input type="text" name="nome_cliente" class="form-control" placeholder="Nome do Cliente" value="<?= $evento['nome_cli']; ?>" required>
		 </div>
		 <div class="form-row">
		 	<div class="form-group col-md-4">
		 		<label for="data">Data do Evento:</label>
		 		<input type="text" name="data_evento" class="form-control data" id="data" value="<?= date('d/m/Y', strtotime($evento['data_evento'])); ?>" required>
		 	</div>
			<div class="form-group col-md-8">
				<label for="inputemail">E-mail:</label>
				<input type="email" name="email_cliente" id="inputemail" class="form-control" placeholder="E-mail" value="<?= $evento['email_cli']; ?>" required>
		 	</div>
		 </div>
		 <div class="form-group">
	 		<label for="inputniver">Aniversáriante:</label>
	 		<input type="text" name="aniversariante" id="inputniver" class="form-control" placeholder="Nome do Aniversáriante" value="<?= $evento['niver_cli']; ?>" required>
		 </div>
		 <div class="form-row">
		 	<div class="form-group col-md-6">
		 		<label for="idade">Idade:</label>
		 		<input type="number" name="idade" class="form-control" id="idade" placeholder="Só Número" value="<?= $evento['idade_niver']; ?>" required>
		 	</div>
		 	<div class="form-group col-md-6">
		 		<label for="horario">Horário da Festa:</label>
		 		<input type="text" name="hora_evento" class="form-control hora" id="horario"  placeholder="00:00" value="<?= $evento['hora_evento']; ?>" required>
		 	</div>
		 </div>
		 <div class="form-row">
		 	<div class="form-group col-md-6">
		 		<label for="idade">Nome da Mãe:</label>
		 		<input type="text" name="nomemae" class="form-control" id="" placeholder="Nome da Mãe" value="<?= $evento['nome_mae']; ?>" required>
		 	</div>
		 	<div class="form-group col-md-6">
		 		<label for="idade">Nome do Pai:</label>
		 		<input type="text" name="nomepai" class="form-control" id="" placeholder="Nome do Pai" value="<?= $evento['nome_pai']; ?>">
		 	</div>
		 </div>

		 <span class="form-row border border-dark border-top-0 border-left-0 border-right-0 border-bottom-1 mb-3 ml-1 mt-3 mr-1 pb-2 font-weight-bold">ENDEREÇO DA FESTA: </span>
		 <div class="form-row">
	    	<div class="form-group col-md-2">
				<label for="cep">CEP:</label>
	  			<input type="text" name="cep" class="cep form-control" id="cep" placeholder="99.999-999" onblur="pesquisacep(this.value);" value="<?= $evento['cep_evento']; ?>" required>
			</div>
			<div class="form-group col-md-5">
				<label for="inputAddress">Rua:</label>
	  			<input type="text" name="rua" class="form-control" id="rua" placeholder="Rua" value="<?= $evento['rua_evento']; ?>" required>
			</div>
			<div class="form-group col-md-1">
				<label for="inputAddress">Nº:</label>
	  			<input type="text" name="numero" class="form-control" id="numero" placeholder="Nº" value="<?= $evento['numero_evento']; ?>">
			</div>
			<div class="form-group col-md-4">
				<label for="cidade">Cidade:</label>
	  			<input type="text" name="cidade" class="form-control" id="cidade" placeholder="Cidade" value="<?= $evento['cidade_evento']; ?>">
			</div>
		</div>
		<div class="form-row">
	    	<div class="form-group col-md-3">
				<label for="inputAddress">Bairro:</label>
	  			<input type="text" name="bairro" class="form-control" id="bairro" placeholder="Bairro" value="<?= $evento['bairro_evento']; ?>">
			</div>
			<div class="form-group col-md-2">
				<label for="uf">Estado:</label>
	  			<input type="text" name="estado" class="form-control" id="estado" placeholder="Estado" value="<?= $evento['estado_evento']; ?>">
			</div>
			<div class="form-group col-md-7">
				<label for="inputAddress">Complemento:</label>
	  			<input type="text" name="complemento" class="form-control" id="inputestado" placeholder="Complemento" value="<?= $evento['complemento_evento']; ?>">
			</div>
		</div>

		<span class="form-row border border-dark border-top-0 border-left-0 border-right-0 border-bottom-1 mb-3 ml-1 mt-3 mr-1 pb-2 font-weight-bold">DETALHE DA FESTA: </span>
		 <div class="form-row">
		 	<div class="form-group col-md-4">
		 		<label for="emergencia">Contato de Emergência:</label>
		 		<input type="text" name="nome_emergencia" class="form-control" id="emergencia" placeholder="Nome" value="<?= $evento['nome_emergencia']; ?>">
		 	</div>
		 	<div class="form-group col-md-3">
		 		<label for="emergencia">Número de Emergência:</label>
		 		<input type="text" name="numero_emergencia" class="form-control cel" id="emergencia" placeholder="(99) 9999-9999" value="<?= $evento['numero_emergencia']; ?>">
		 	</div>
		 	<div class="form-group col-md-5">
		 		<label for="criancas">Quantidade e média de idade das crianças:</label>
		 		<input type="text" name="qtd_criancas" class="form-control" id="criancas" value="<?= $evento['qtd_idade_crianca_evento']; ?>">
		 	</div>
		 </div>
		 <div class="form-group">
		 	<label for="selectpacotes">Pacotes:</label>
		 	<select  class="form-control" id="selectpacotes" name="pct">
		 		<option  value="<?= $evento['id_pct']; ?>" selected> 
		 			<?php 
		 				foreach ($pacote as $pct) {
			 				if ($evento['id_pct'] == $pct['id_pct']) {
			 					echo $pct['nome_pct'];
			 				} 
			 			}
		 			?>
		 		</option>
		 		<?php foreach ($pacote as $pct) : ?>
					<option value="<?=  $pct['id_pct']; ?>"><?=  $pct['nome_pct']; ?></option>
				<?php endforeach ?>
		 	</select>
		 </div>
		 <div class="form-group">
		 		<label for="especificacao">Especificação do Pacote:</label>
		 		<textarea type="text" name="especificacao" id="especificacao" class="form-control"  readonly style="height:96px;"><?=  $evento['especificacao_pct']; ?> <?= $dadospacote['especificacao_pct'];?></textarea>
		 </div>
		 <div class="form-row">
		 	<div class="form-group col-md-4">
		 		<label for="chegada">Hora da Chegada:</label>
		 		<input type="text" name="hora_chegada" class="form-control hora" id="chegada" placeholder="00:00" value="<?= $evento['hora_chegada']; ?>">
		 	</div>
		 	<div class="form-group col-md-4">
		 		<label for="tempo">Tempo:</label>
		 		<input type="text" name="tempo_evento" id="tempo" class="form-control hora"  placeholder="00:00" value="<?=  $evento['tempo_evento']; ?><?= $dadospacote['tempo_evento'];?>" readonly>
		 	</div>
		 	<div class="form-group col-md-4">
		 		<label for="adicional">Hora Adicional:</label>
		 		<input type="text" name="hora_adicional" id="adicional" class="form-control hora"  value="<?=  $evento['hora_adicional'];?> ">
		 	</div>
		 </div>
		 <div class="form-row">
		 	<div class="form-group col-md-3">
		 		<label for="valor_pct">Valor do Pacote:</label>
		 		.<input type="text" name="valor_pct" id="valor" class="form-control moeda"  value="<?= $evento['valor_pct']; ?><?= $dadospacote['valor_pct'];?>" readonly>
		 	</div>
		 	<div class="form-group col-md-3">
		 		<label for="valor_total">Valor Total:</label>
		 		<input type="text" name="valor_total" class="form-control moeda" id="valor_total" value="<?= $evento['valor_total']; ?>">
		 	</div>
		 	<div class="form-group col-md-3">
		 		<label for="sinal">Sinal:</label>
		 		<input type="text" name="sinal_valor" class="form-control moeda" id="sinal" value="<?= $evento['sinal_valor']; ?>">
		 	</div>
		 	<div class="form-group col-md-3">
		 		<label for="falta_pagar">Falta Pagar:</label>
		 		<input type="text" name="falta_pagar" class="form-control moeda" id="falta_pagar" value="<?= $evento['falta_pagar_valor']; ?>">
		 	</div>
		 </div>
		 <div class="form-row">
		 	<div class="form-group col-md-12">
		 		<label for="status">Status:</label>
		 		<select  class="form-control" id="selectpacotes" name="status">
		 			<option value="<?= $evento['status_evento']; ?>" selected> <?= $evento['status_evento']; ?></option>
					<option value="Confirmado">Confirmado</option>
					<option value="Pendente">Pendente</option>
					<option value="Cancelado">Cancelado</option>
				</select>
		 	</div>
		 </div>
		 <span class="form-row border border-dark border-top-0 border-left-0 border-right-0 border-bottom-1 mb-3 ml-1 mt-3 mr-1 pb-2 font-weight-bold">Adicionar Colaborador: </span>
		 <div class="form-row">
		 	<div class="form-group col-md-12">
		 		<a href="" id="addInput" class="btn btn-primary"><i class="fas fa-plus"> </i> Colaborador</a>
		 	</div>
		 </div>

		<?php
			foreach($ColabEvento as $indice => $cvt) :
				$idEvento = $ColabEvento[$indice]->fk_id_evento;
		?>
			<div id="dynamicDiv">
		 		<div id="remov" class="form-row">
		 			<div class="form-group col-md-11">
				        <input type="text" id="autocompletecolab" class="form-control autocompletecolab" name="nome_colab[]" placeholder="Nome do Colaborador" value="<?= $ColabEvento[$indice]->nome_colaborador?>">
				        <input type="hidden" name="idcolab[]" id="idcolab" value="<?= $ColabEvento[$indice]->fk_id_colaborador?>">

		    		</div>
			    	<div class="form-group col-md-1">
				    	<a class="btn btn-danger" href="javascript:void(0)" id="remInput" onClick="delreg('<?php echo $ColabEvento[$indice]->id_colab_evento?>')">
				    		<span class="glyphicon glyphicon-minus" aria-hidden="true"></span>
				        	<i class="fas fa-times"  title="Remover"></i>
						</a>
					</div>
				</div>
			</div>
		<?php
			endforeach;

			if (empty($idEvento)) {
		?>
		<div id="dynamicDiv">
	 		<div id="remov" class="form-row">
	 			<div class="form-group col-md-11">        
					<input type="text" id="autocompletecolab" class="form-control autocompletecolab" name="nome_colab[]" value="" placeholder="Nome do Colaborador" autofocus>
			        <input type="hidden" name="idcolab[]" id="idcolab" value="">
	    		</div>
		    	<div class="form-group col-md-1">
			    	<a class="btn btn-danger" href="javascript:void(0)" id="remInput" onClick="delreg()">
			    		<span class="glyphicon glyphicon-minus" aria-hidden="true"></span>
			        	<i class="fas fa-times"  title="Remover"></i> 
					</a>
				</div>
			</div>
		</div>
		<?php
			} //END IF
		?>
		 <div class="form-row">
		 	<button type="submit" class="btn btn-primary">Salvar <i class="fas fa-save ml-2"></i></button>
		 	<a href="<?= base_url('Agenda/ExcluirEvento?id='.$evento['id_evento']);?>" class="btn btn-danger ml-2">Excluir <i class="fas fa-trash-alt ml-2"></i></a>
		 </div>
	</form>
</div>
