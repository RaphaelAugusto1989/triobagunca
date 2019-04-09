<div class="container p-4">
	<form action="">
		<div class="form-group row">
			<div class="col-lg-4"></div>
			<div class="col-lg-4"><p class="text-center">COLABORADORES INDISPONIVEIS</p></div>
			<div class="col-lg-2 text-left">
				<input type="text" class="form-control form-control-block form-control-sm" id="inputdefault" placeholder="Nome ou CPF">
			</div>
			<div class="col-lg-2"><button class="btn btn-secondary btn-sm btn-block" type="submit"><i class="fas fa-search"></i> Buscar</button></div>
		</div>
	</form>
      	<?php foreach ($colaborador as $colab) : 
      		$SomaData = date('Y-m-d', strtotime($colab['data_cadastrado']. '+ 3 days'));

      		echo $SomaData = str_replace("-","", $SomaData);
			$DataInicial  = str_replace("-","",  $colab['data_inicial']); 

      		if ($SomaData <= $DataInicial) {
      			$Falta = 'table-danger border border-danger';
      			$MsgFalta = 'Colaborador escolheu a indisponibilidade com 3 dias ou menos da data escolhida! <br/>';
      		} else {
      			$Falta = 'border-primary';
      			$MsgFalta = Null;
      		}

      		if ($this->session->userdata('IdUser') == '1') { ?>
      			<a href="Agenda/DetalheIndisponibilidade/<?= $colab['id_ind'] ?>" class="d-inline">
					<div class="row border <?= $Falta?> rounded p-2 mb-2 text-primary">
						<div class="col-md-12 text-danger"><b><?= $MsgFalta; ?></b></div>
		                <div class="col text-truncate">
		                    <span class="font-weight-light">Nome: <br /></span>
		                    <span class="h5"><?= $colab['nome_colab']; ?></span>
		                </div>
		                <div class="col text-truncate">
		                    <span class="font-weight-light">Indisponibilidade: <br /></span>
		                    <span class="h5">
		                    	<?php 
		                    		if ($colab['data_inicial'] == $colab['data_final']) {
		                    			echo date("d/m/Y", strtotime($colab['data_inicial']));
		                    		} else {
		                    			echo 'De '.$colab['data_inicial'].' até '.$colab['data_final']; 
		                    		}
		                   		?>
		                   	</span>
		                </div>
						<div class="col text-truncate">
		                    <span class="font-weight-light">Data Cadastrada: <br /></span>
		                    <span class="h5">
		                    	<?= date("d/m/Y", strtotime($colab['data_cadastrado'])); ?>
							</span>
		                </div>
		            </div>
        		</a>
            <?php
	      		} elseif ($colab['id_colab'] == '1') {
	      			echo "";
	      		} else {
      		?>
      			<a href="Agenda/DetalheIndisponibilidade/<?= $colab['id_ind'] ?>" class="d-inline">
					<div class="row border <?= $Falta?> rounded p-2 mb-2 text-primary">
						<div class="col-md-12 text-danger"><b><?= $MsgFalta; ?></b></div>
		                <div class="col text-truncate">
		                    <span class="font-weight-light">Nome: <br /></span>
		                    <span class="h5"><?= $colab['nome_colab']; ?></span>
		                </div>
		                <div class="col text-truncate">
		                    <span class="font-weight-light">Indisponibilidade: <br /></span>
		                    <span class="h5">
		                    	<?php 
		                    		if ($colab['data_inicial'] == $colab['data_final']) {
		                    			echo date("d/m/Y", strtotime($colab['data_inicial']));
		                    		} else {
		                    			echo 'De '.$colab['data_inicial'].' até '.$colab['data_final']; 
		                    		}
		                   		?>
		                   	</span>
		                </div>
						<div class="col text-truncate">
		                    <span class="font-weight-light">Data Cadastrada: <br /></span>
		                    <span class="h5">
		                    	<?= date("d/m/Y", strtotime($colab['data_cadastrado'])); ?>
							</span>
		                </div>
		            </div>
        		</a>
        <?php } endforeach?>
        </tbody>
  	</table>
</div>
