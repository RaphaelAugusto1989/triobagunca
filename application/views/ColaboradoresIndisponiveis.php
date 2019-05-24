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
		<nav class="navbar navbar-light mb-3" style="background-color: #e3f2fd;">
		   <a class="btn btn-outline-primary" href="<?= base_url()?>Colaborador/ColaboradoresIndisponiveisPorMes/01" role="button">Janeiro</a>
		   <a class="btn btn-outline-primary" href="<?= base_url()?>Colaborador/ColaboradoresIndisponiveisPorMes/02" role="button">Fevereiro</a>
		   <a class="btn btn-outline-primary" href="<?= base_url()?>Colaborador/ColaboradoresIndisponiveisPorMes/03" role="button">Março</a>
		   <a class="btn btn-outline-primary" href="<?= base_url()?>Colaborador/ColaboradoresIndisponiveisPorMes/04" role="button">Abril</a>
		   <a class="btn btn-outline-primary" href="<?= base_url()?>Colaborador/ColaboradoresIndisponiveisPorMes/05" role="button">Maio</a>
		   <a class="btn btn-outline-primary" href="<?= base_url()?>Colaborador/ColaboradoresIndisponiveisPorMes/06" role="button">Junho</a>
		   <a class="btn btn-outline-primary" href="<?= base_url()?>Colaborador/ColaboradoresIndisponiveisPorMes/07" role="button">Julho</a>
		   <a class="btn btn-outline-primary" href="<?= base_url()?>Colaborador/ColaboradoresIndisponiveisPorMes/08" role="button">Agosto</a>
		   <a class="btn btn-outline-primary" href="<?= base_url()?>Colaborador/ColaboradoresIndisponiveisPorMes/09" role="button">Setembro</a>
		   <a class="btn btn-outline-primary" href="<?= base_url()?>Colaborador/ColaboradoresIndisponiveisPorMes/10" role="button">Outubro</a>
		   <a class="btn btn-outline-primary" href="<?= base_url()?>Colaborador/ColaboradoresIndisponiveisPorMes/11" role="button">Novembro</a>
		   <a class="btn btn-outline-primary" href="<?= base_url()?>Colaborador/ColaboradoresIndisponiveisPorMes/12" role="button">Dezembro</a>
		   <a class="btn btn-outline-primary" href="<?= base_url()?>ColaboradoresIndisponiveis" role="button">Todos</a>
		</nav>
	</form>
      	<?php foreach ($colaborador as $colab) : 
			
			$SomaData = str_replace("-","", $colab['data_soma']);
			$DataInicial = str_replace("-","",  $colab['data_inicial']); 

			$TotalData = $SomaData - $DataInicial;

      		if ($TotalData <= 15 && $TotalData >= 0) {
      			$Falta = 'table-danger border border-danger';
      			$MsgFalta = 'Colaborador cadastrou indisponibilidade com 15 dias ou menos da data escolhida! <br/>';
      		} else {
      			$Falta = 'border-primary';
      			$MsgFalta = Null;
      		}
      		if ($this->session->userdata('IdUser') == '1') { ?>
      			<a href="<?= base_url() ?>Colaborador/DetalheIndisponibilidade/<?= $colab['id_ind'] ?>" class="d-inline">
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
		                    		echo date("d/m/Y", strtotime($colab['data_inicial']));
		                    		#if ($colab['data_inicial'] == $colab['data_final']) {
		                    		#	echo date("d/m/Y", strtotime($colab['data_inicial']));
		                    		#} else {
		                    		#	echo 'De '.date("d/m/Y", strtotime($colab['data_inicial'])).' até '.date("d/m/Y", strtotime($colab['data_final'])); 
		                    		#}
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
      			<a href="Colaborador/DetalheIndisponibilidade/<?= $colab['id_ind'] ?>" class="d-inline">
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
		                    			echo 'De '.date("d/m/Y", strtotime($colab['data_inicial'])).' até '.date("d/m/Y", strtotime($colab['data_final'])); 
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

