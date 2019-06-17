<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="container p-4">
	<form action="<?php echo base_url('Agenda/PesquisarEvento');?>" method="post">
		<div class="form-group row">
			<div class="col-lg-4"></div>
			<div class="col-lg-4"><p class="text-center">EVENTOS AGENDADOS</p></div>
				<div class="col-lg-3 text-left">
						<input type="text" name="pesquisa" class="form-control form-control-block form-control-sm" placeholder="Cliente ou Nº do Evento">
				</div>
				<div class="col-lg-1">
					<button type="submit" class="btn btn-secondary btn-sm btn-block"><i class="fas fa-search"></i></button>
				</div>
		</div>
	</form>
		<nav class="navbar navbar-light mb-3" style="background-color: #e3f2fd;">
		   <a class="btn btn-outline-primary" href="<?= base_url()?>Agenda/AgendamentosPorMes/01" role="button">Janeiro</a>
		   <a class="btn btn-outline-primary" href="<?= base_url()?>Agenda/AgendamentosPorMes/02" role="button">Fevereiro</a>
		   <a class="btn btn-outline-primary" href="<?= base_url()?>Agenda/AgendamentosPorMes/03" role="button">Março</a>
		   <a class="btn btn-outline-primary" href="<?= base_url()?>Agenda/AgendamentosPorMes/04" role="button">Abril</a>
		   <a class="btn btn-outline-primary" href="<?= base_url()?>Agenda/AgendamentosPorMes/05" role="button">Maio</a>
		   <a class="btn btn-outline-primary" href="<?= base_url()?>Agenda/AgendamentosPorMes/06" role="button">Junho</a>
		   <a class="btn btn-outline-primary" href="<?= base_url()?>Agenda/AgendamentosPorMes/07" role="button">Julho</a>
		   <a class="btn btn-outline-primary" href="<?= base_url()?>Agenda/AgendamentosPorMes/08" role="button">Agosto</a>
		   <a class="btn btn-outline-primary" href="<?= base_url()?>Agenda/AgendamentosPorMes/09" role="button">Setembro</a>
		   <a class="btn btn-outline-primary" href="<?= base_url()?>Agenda/AgendamentosPorMes/10" role="button">Outubro</a>
		   <a class="btn btn-outline-primary" href="<?= base_url()?>Agenda/AgendamentosPorMes/11" role="button">Novembro</a>
		   <a class="btn btn-outline-primary" href="<?= base_url()?>Agenda/AgendamentosPorMes/12" role="button">Dezembro</a>
		   <a class="btn btn-outline-primary" href="<?= base_url()?>Agenda/Agendamentos" role="button">Todos</a>
		</nav>
	</form>
		<?php 
			foreach ($evento as $value => $ev) {
				$mes = date('m', strtotime($evento[$value]->data_evento));
				$AnoEvento = date('Y', strtotime($evento[$value]->data_evento));
				$AnoAtual = date('Y');

				if (empty($evento[$value]->mes_evento)) {
					echo "VOCÊ NÃO TEM EVENTOS CADASTRADOS PARA ESTE MÊS!";
				}

				setlocale(LC_ALL, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');

				//CONVERTE PARA O DIA DA SEMANA
				$data = strftime('%d/%m/%Y - %A', strtotime($evento[$value]->data_evento)); 

				if ($evento[$value]->status_evento == 'Confirmado') {
					$conf = "table-success border border-success";
				} elseif ($evento[$value]->status_evento == 'Pendente') {
					$conf = "table-warning border border-warning";
				} else {
					$conf = "table-danger border border-danger";
				}

				//if ($AnoEvento == $AnoAtual) {
		?>
		<a href="<?= base_url() ?>Agenda/DetalheEvento/<?= $evento[$value]->id_evento ?>" class="d-inline">
			<div class="row border border-primary rounded p-2 mb-2 <?= $conf; ?> text-decoration-none">
                <div class="col-sm-2">
                    <span class="font-weight-light">Nº do Evento: <br /></span>
                    <span class="h5 text-capitalize">
                    	<?= $evento[$value]->id_evento;?>
                    </span>
                </div>
                <div class="col-sm-5">
                    <span class="font-weight-light">Cliente: <br /></span>
                    <span class="h5 text-capitalize">
                    	<?= $evento[$value]->nome_cli;?>
                    </span>
                </div>
                <div class="col-sm-4">
                    <span class="font-weight-light">Data do Evento: <br /></span>
                    <span class="h5 text-capitalize"><?= mb_convert_encoding($data, 'UTF-8', 'ISO-8859-1'); ?> </</span>
                </div>
                <div class="col-sm-1">
                    <span class="font-weight-light">Hora: <br /></span>
                    <span class="h5 hora"><?= $evento[$value]->hora_evento; ?></span>
                </div>
            </div>
        </a>
		<?php
				//} else {
				//	echo "";
				//}//FIM IF ANO
			} //FIM FOREACH
		?>
