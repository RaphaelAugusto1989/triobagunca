<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="container p-4">
	<div class="form-group row">
			<div class="col-lg-3"></div>
			<div class="col-lg-5"><p class="text-center">EVENTOS AGENDADOS</p></div>
			<div class="col-lg-3"></div>
	</div>
	<form action="">
		<div class="form-group row">
			<div class="col-lg-3"></div>
			<div class="col-lg-9">
				<label for="inicio">Data Inicial:</label>
				<input type="date" name="inicio" id="inicio" class="form-control form-control-sm col-3 float-right ml-2">
				<label for="fim">Data Final:</label>
				<input type="date" name="fim" id class="form-control form-control-sm col-3 float-right  ml-2">

				<select class="form-control form-control-sm col-3 float-right">
					<option selected disabled>Filtrar</option>
					<option>Confirmados</option>
					<option>Pendentes</option>
					<option>Cancelados</option>
				</select>
				<button class="btn btn-secondary btn-sm" type="submit">Filtrar</button>
			</div>
		</div>
	</form>
		<?php foreach ($evento as $ev): 
			setlocale(LC_ALL, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');

			//CONVERTE PARA O DIA DA SEMANA
			$data = strftime('%d/%m/%Y - %A', strtotime($ev['data_evento'])); 

			if ($ev['status_evento'] == 'Confirmado') {
				$conf = "table-success border border-success";

			} elseif ($ev['status_evento'] == 'Pendente') {
				$conf = "table-warning border border-warning";
			} else {
				$conf = "table-danger border border-danger";
			}

			$mes = date('m', strtotime($ev['data_evento'])); //PEGA O MÊS A DATA NO SERVIDOR

			if (date('m') == $mes) {
		?>
	<div class="row border border-primary rounded p-2 mb-2 <?= $conf; ?>">
        <div class="col">
            <span class="font-weight-light">Cliente: <br /></span>
            <span class="h5">
            	<?=  anchor("Agenda/DetalheEvento/{$ev['id_evento']}", $ev['nome_cli']);?>
            </span>
        </div>
        <div class="col">
            <span class="font-weight-light">Aniversariante: <br /></span>
            <span class="h5"><?=  anchor("Agenda/DetalheEvento/{$ev['id_evento']}", $ev['niver_cli']); ?></span>
        </div>
        <div class="col">
            <span class="font-weight-light">Data do Evento: <br /></span>
            <span class="h5"><?=  anchor("Agenda/DetalheEvento/{$ev['id_evento']}", $data); ?> </</span>
        </div>
        <div class="col">
            <span class="font-weight-light">Personagem/Animação: <br /></span>
            <span class="h5">
                <?=  anchor("Agenda/DetalheEvento/{$ev['id_evento']}", $ev['psg_evento']); ?>
            </span>
        </div>
    </div>
	<?php 
			}

		endforeach 
	?>
</div>
