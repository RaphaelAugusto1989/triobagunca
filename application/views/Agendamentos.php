<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
?>
		<div class="container p-4">
			<form action="">
				<div class="form-group row">
					<div class="col-lg-3"></div>
					<div class="col-lg-5"><p class="text-center">EVENTOS AGENDADOS</p></div>
				  	<div class="col-lg-3">
						<select class="form-control form-control-sm">
							<option selected disabled>Filtrar</option>
							<option>Confirmados</option>
							<option>Pendentes</option>
							<option>Cancelados</option>
						</select>
					</div>
					<div class="col-lg-1"><button class="btn btn-secondary btn-sm" type="submit">Filtrar</button></div>
				</div>
			</form>
		<table class="table table-bordered table-sm table-hover">
			<thead class="bg-primary">
				<tr>
					<td>DATA DO EVENTO</td>
					<td>CLIENTE</td>
					<td>ANIVERSARIANTE</td>
					<td>PERSONAGEM/ANIMADOR</td>
					<td align="center">CONFIRMAÇÃO</td>

				</tr>
			</thead>
			<tbody>
				<?php foreach ($evento as $ev): 
					setlocale(LC_ALL, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
					$data = strftime('%d/%m/%Y - %A', strtotime($ev['data_evento']));
				?>

				<?php
					if ($ev['status_evento'] == 'Confirmados') {
						echo "<i class='fas fa-check' title='CONFIRMADO'></i>";
						$conf = "table-success border border-success";

					}elseif ($ev['status_evento'] == 'Pendente') {
						$conf = "table-warning border border-warning";
					} else {
						$conf = "table-danger border border-danger";
					}
				?>
				<div class="row border border-primary rounded p-2 mb-2 <?= $conf; ?>">
                <div class="col text-truncate">
                    <span class="font-weight-light">Cliente: <br /></span>
                    <span class="h5">
                    	<?=  anchor("Agenda/DetalheEvento/{$ev['id_evento']}", $ev['nome_cli']);?>
                    </span>
                </div>
                <div class="col">
                    <span class="font-weight-light">Aniversariante: <br /></span>
                    <span class="h5"><?=  anchor("Agenda/DetalheEvento/{$ev['id_evento']}", $ev['niver_cli']); ?></span>
                </div>
                <div class="col text-truncate">
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

				<tr>
					<td><?=  anchor("Agenda/DetalheEvento/{$ev['id_evento']}", $data); ?> </td>
					<td><?=  anchor("Agenda/DetalheEvento/{$ev['id_evento']}", $ev['nome_cli']);?></td>
					<td><?=  anchor("Agenda/DetalheEvento/{$ev['id_evento']}", $ev['niver_cli']); ?></td>
					<td><?=  anchor("Agenda/DetalheEvento/{$ev['id_evento']}", $ev['psg_evento']); ?></td>
					<td align="center" style="color: #228B22;">
					<?php
						if ($ev['status_evento'] == 'Confirmados') {
							echo "<i class='fas fa-check' title='CONFIRMADO'></i>";
						}elseif ($ev['status_evento'] == 'Pendente') {
							echo "<i class='fas fa-exclamation-triangle' title='PENDENTE'></i>";
						} else {
							echo "<i class='fas fa-times' title='CANCELADO'></i>";
						}
					?>
				</tr>
			<?php endforeach ?>
			</tbody>
		</table>
	</div>
