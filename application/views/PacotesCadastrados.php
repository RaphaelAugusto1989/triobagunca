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
	        <?php foreach ($pacotes as $pct) : ?>
	        <a href="Pacotes/DetalhePacote/<?= $pct['id_pct'] ?>" class="d-inline">
				<div class="row border border-primary rounded p-2 mb-2 text-primary">
	                <div class="col text-truncate">
	                    <span class="font-weight-light">Pacote: <br /></span>
	                    <span class="h5"><?= $pct['nome_pct'] ?></span>
	                </div>
	                <div class="col">
	                    <span class="font-weight-light">Tempo: <br /></span>
	                    <span class="h5"><?= $pct['tempo_pct'] ?></span>
	                </div>
	                <div class="col text-truncate">
	                    <span class="font-weight-light">Valor: <br /></span>
	                    <span class="h5">R$ <?= $pct['valor_pct'] ?></span>
	                </div>
	            </div>
        	</a>
          	<?php endforeach ?>
	</div>
