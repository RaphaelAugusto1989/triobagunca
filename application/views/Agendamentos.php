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
				<?php foreach ($evento as $ev): 
					setlocale(LC_ALL, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
					$data = strftime('%d/%m/%Y - %A', strtotime($ev['data_evento']));
				?>
				<?php
					if ($ev['status_evento'] == 'Confirmado') {
						$conf = "table-success border border-success";

					}elseif ($ev['status_evento'] == 'Pendente') {
						$conf = "table-warning border border-warning";
					} else {
						$conf = "table-danger border border-danger";
					}
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
			<?php endforeach ?>
			</tbody>
		</table>
	</div>