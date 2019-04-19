<<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
?>
	<div class="container p-4">
		<a href="javascript:history.go(-1)"> <i class="fas fa-arrow-alt-circle-left"></i> <b>voltar</b> </a>
		<p class="text-center">PERMISSÕES</p>
        <?php
        if ($this->session->flashdata('Sucess') !="") {
            echo $msg;
        } elseif ($this->session->flashdata('Error') !="") {
            echo $msg;
        }
        ?>
		<form action="<?php echo base_url('Colaborador/InsertPermissaoColaborador');?>" method="POST">
            <div class="form-group">
                <label for="inputcliente">Colaborador:</label>
                <input type="text" id="autocompletecolab2" class="form-control autocompletecolab" name="nome_colab" value="<?= $perm[0]['nome_colab']?>">
                <input type="hidden" name="idcolab" id="idcolab2" value="">
            </div>
			<div class="form-group">
                <div class="form-check form-check-inline">
                	<?php 
                		if ($perm[0]['permission1'] == '1') {
                			$check = 'value="1" checked';
                		} else {
                			$check = 'value="2"';
                		}

                	?>
                    <input class="form-check-input" type="checkbox" id="checkbox2" name="permission1" <?= $check ?>>
                    <label class="form-check-label" for="checkbox2">EVENTOS</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="checkbox3" name="permission2" value="1">
                    <label class="form-check-label" for="checkbox3">PACOTES</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="checkbox4" name="permission3" value="1">
                    <label class="form-check-label" for="checkbox4">COLABORADORES</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="checkbox5" name="permission4" value="1">
                    <label class="form-check-label" for="checkbox5">FINANCEIRO</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="checkbox6" name="permission5" value="1">
                    <label class="form-check-label" for="checkbox6">SITE</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="checkbox7" name="permission6" value="1">
                    <label class="form-check-label" for="checkbox7">RELATÓRIOS</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="checkbox8" name="permission7" value="1">
                    <label class="form-check-label" for="checkbox8">MINHA ÁREA</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="checkbox9" name="permission8" value="1">
                    <label class="form-check-label" for="checkbox9">SISTEMA</label>
                </div>
			</div>
			<button type="submit" class="btn btn-primary">Alterar <i class="fas fa-save ml-2"></i></button>
			<a href="<?= base_url('Colaborador/ExcluirPermissao?id='.$perm[0]['id_permission']);?>" class="btn btn-danger ml-2">Excluir <i class="fas fa-trash-alt ml-2"></i></a>
	</form>
		</form>
    </div>
</div>
