<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="container p-4">
	<div class="form-group row">
		<div class="col-lg-3"></div>
		<div class="col-lg-5"><p class="text-center">ACESSOS AO SISTEMA</p></div>
	  	<div class="col-lg-4">
		</div>
	</div>

	<?php
		foreach ($ColabAcesso as $key => $Colab) {
	?>

	<a href="<?= base_url() ?>Colaborador/DetalheAcessosColaborador/<?= $ColabAcesso[$key]['id_colab']; ?>" class="d-inline">
		<div class="row border border-primary rounded p-2 mb-2 text-decoration-none">
            <div class="col">
                <span class="font-weight-light">Colaborador: <br /></span>
                <span class="h5 text-capitalize">
                	<?= $ColabAcesso[$key]['nome_colab'];?>
                </span>
            </div>
        </div>
    </a>

    <?php
    	}
    ?>

</div>
