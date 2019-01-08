<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
?>
	<div class="container p-4">
		<p class="text-center">PERMISSÃO DE USUÁRIO</p>
        <?php
        if ($this->session->flashdata('Sucess') !="") {
            echo $msg;
        } elseif ($this->session->flashdata('Error') !="") {
            echo $msg;
        }
        ?>
		<form action="<?php echo base_url('UserSystem/PermissionUserCadastro');?>" method="POST">
            <div class="form-group">
                <label for="inputcliente">Usuário:</label>
                <input type="text" name="nome_user" id="autocompleteuser" class="form-control" placeholder="Nome do Usuário">
                <input type="hidden" name="id_user" id="iduser" value="<?= $dadospacote['id_user']; ?>">
            </div>
			<div class="form-group">
      			<div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="checkbox1" name="permission1" value="1">
                    <label class="form-check-label" for="checkbox1">CLIENTES</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="checkbox2" name="permission2" value="1">
                    <label class="form-check-label" for="checkbox2">AGENDAMENTOS</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="checkbox3" name="permission3" value="1">
                    <label class="form-check-label" for="checkbox3">PACOTES</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="checkbox4" name="permission4" value="1">
                    <label class="form-check-label" for="checkbox4">COLABORADORES</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="checkbox5" name="permission5" value="1">
                    <label class="form-check-label" for="checkbox5">FINANCEIRO</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="checkbox6" name="permission6" value="1">
                    <label class="form-check-label" for="checkbox6">SITE</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="checkbox7" name="permission7" value="1">
                    <label class="form-check-label" for="checkbox7">RELATÓRIOS</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="checkbox8" name="permission8" value="1">
                    <label class="form-check-label" for="checkbox8">COLABORADOR</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="checkbox9" name="permission9" value="1">
                    <label class="form-check-label" for="checkbox9">SISTEMA</label>
                </div>
			</div>
			<button type="submit" class="btn btn-primary">Salvar <i class="fas fa-save ml-2"></i></button>
		</form>
</div>
