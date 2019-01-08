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
				<tr>
					<td>18/07/2019 - Sexta-Feira </td>
					<td>Raphael Augusto Almeida Pereira</td>
					<td>Pedro Almeida Pereira Sá</td>
					<td>Homem Aranha</td>
					<td align="center" style="color: #228B22;"><i class="fas fa-check" title="CONFIRMADO"></i></td>
				</tr>
				<tr>
					<td>18/07/2019 - Sexta-Feira </td>
					<td>Raphael Augusto Almeida Pereira</td>
					<td>Pedro Almeida Pereira Sá</td>
					<td>Homem Aranha <br/> Homem de Ferro<br/> Animadores</td>
					<td align="center" style="color: #FF7F00;"><i class="fas fa-exclamation-triangle" title="PENDENTE"></i></td>
				</tr>
				<tr>
					<td>18/07/2019 - Sexta-Feira </td>
					<td>Raphael Augusto Almeida Pereira</td>
					<td>Pedro Almeida Pereira Sá</td>
					<td>Homem Aranha e Homem de Ferro</td>
					<td align="center" valign="middle" style="color: #EE0000"><i class="fas fa-times" title="CANCELADO"></i></td>
				</tr>
			</tbody>
		</table>
	</div>
