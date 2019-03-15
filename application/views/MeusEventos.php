<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
?>
		<div class="container p-4">
				<div class="form-group row">
					<div class="col-lg-3"></div>
					<div class="col-lg-5"><p class="text-center">MEUS EVENTOS</p></div>
				  	<div class="col-lg-4">
					</div>
				</div>
			<form action="">
				<div class="form-group row">
					<div class="col-lg-4">
						<label for="DataInicio">Data Inicial: </label>
						<input type="date" name="inicio" id="DataInicio" class="form-control form-control-sm">
					</div>
					<div class="col-lg-4">
						<label for="DataFinal">Data Inicial: </label>
						<input type="date" name="fim" id="DataFinal" class="form-control form-control-sm">
					</div>
					<div class="col-lg-3">
						<label for="status">Status: </label>
						<select class="form-control form-control-sm" id="status">
							<option selected disabled>Filtrar</option>
							<option>Confirmados</option>
							<option>Pendentes</option>
							<option>Cancelados</option>
						</select>
					</div>
					<div class="col-lg-1">
						<label for="status" class="text-white">Filtrar: </label>
						<button class="btn btn-secondary btn-sm" type="submit">Filtrar</button>
					</div>
				</div>
			</form>
				<?php foreach ($evento as $indice => $ev): 

					setlocale(LC_ALL, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');

					//CONVERTE PARA O DIA DA SEMANA
					$data = strftime('%d/%m/%Y - %A', strtotime($ev[0]['data_evento'])); 

					if ($ev[0]['status_evento'] == 'Confirmado') {
						$conf = "table-success border border-success";

					} elseif ($ev[0]['status_evento'] == 'Pendente') {
						$conf = "table-warning border border-warning";
					} else {
						$conf = "table-danger border border-danger";
					}

					$mes = date('m', strtotime($ev[0]['data_evento'])); //PEGA O MÊS A DATA NO SERVIDOR

					if (date('m') == $mes) {
				?>
				<a href="Agenda/DetalheEvento/<?= $ev[0]['id_evento'] ?>" class="d-inline">
				<div class="row border border-primary rounded p-2 mb-2 <?= $conf; ?> text-decoration-none">
                <div class="col">
                    <span class="font-weight-light">Cliente: <br /></span>
                    <span class="h5 text-capitalize">
                    	<?= $ev[0]['nome_cli'];?>
                    </span>
                </div>
                <div class="col">
                    <span class="font-weight-light">Data do Evento: <br /></span>
                    <span class="h5 text-capitalize"><?= $data; ?> </</span>
                </div>
                <div class="col">
                    <span class="font-weight-light">Hora do Evento: <br /></span>
                    <span class="h5 hora"><?= $ev[0]['hora_evento']; ?></span>
                </div>
            </div>
			<?php 
					} //FINAL DO IF DATE
				endforeach 
			?>
			</tbody>
		</table>
	</div>
