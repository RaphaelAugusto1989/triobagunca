<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
?>
		<div class="container p-4">
		<form action="">
			<div class="form-group row">
				<div class="col-lg-4"></div>
				<div class="col-lg-3"><p class="text-center">PACOTES CADASTRADOS</p></div>
				<div class="col-lg-3 text-left">
					<input type="text" class="form-control form-control-block form-control-sm" id="inputdefault" placeholder="Pacote">
				</div>
				<div class="col-lg-2"><button class="btn btn-secondary btn-sm btn-block" type="submit"><i class="fas fa-search"></i> Buscar</button></div>
			</div>
		</form>
		<table class="table table-bordered table-sm table-hover">
	        <thead class="bg-primary">
	          <tr>
	              <td>PACOTE</td>
	              <td>TEMPO</td>
	              <td>VALOR</td>
	          </tr>
	        </thead>

	        <tbody>
	        <?php foreach ($pacotes as $pct) : ?>
	         	 <tr>
		            <td><?=  anchor("Pacotes/DetalhePacote/{$pct['id_pct']}", $pct['nome_pct']); ?></td>
		            <td><?=  anchor("Pacotes/DetalhePacote/{$pct['id_pct']}", $pct['tempo_pct']); ?></td>
		            <td><?=  anchor("Pacotes/DetalhePacote/{$pct['id_pct']}", $pct['valor_pct']); ?></td>
          		</tr>
          	<?php endforeach ?>
	        </tbody>
      	</table>
	</div>
