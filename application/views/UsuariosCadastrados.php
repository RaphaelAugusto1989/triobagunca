<div class="container p-4">
	<form action="">
		<div class="form-group row">
			<div class="col-lg-4"></div>
			<div class="col-lg-3"><p class="text-center">USUÁRIOS CADASTRADOS</p></div>
			<div class="col-lg-3 text-left">
				<input type="text" class="form-control form-control-block form-control-sm" id="inputdefault" placeholder="Nome ou CPF">
			</div>
			<div class="col-lg-2"><button class="btn btn-secondary btn-sm btn-block" type="submit"><i class="fas fa-search"></i> Buscar</button></div>
		</div>
	</form>

		<?php
			if ($this->session->set_flashdata('Success') !="") {
				echo "<p class='alert alert-danger text-center'>" .$Success. "</p>";
			} 
		?>
		<?php
			if ($this->session->userdata('IdUser') == '1') {
				$total = $total;
			} else {
				$total = $total - 1;
			}
		?>
		<span class="text-right"><?php echo "Você tem ".$total." usuários cadastrados!"; ?></span>
      	<?php foreach ($usuario as $user) : 
      		if ($this->session->userdata('IdUser') == '1') {
      	?>
		<div class="row border border-primary rounded p-2 mb-2 text-primary">
			<div class="col text-truncate">
				<span class="font-weight-light">Nome: <br /></span>
				<span class="h5"><?= anchor("UserSystem/DetalheUser/{$user['id_usuario']}", $user['nome_usuario']." ".$user['sobrenome_usuario']); ?></span>
			</div>
			<div class="col">
				<span class="font-weight-light">CPF: <br /></span>
				<span class="h5"><?= anchor("UserSystem/DetalheUser/{$user['id_usuario']}", $user['cpf_usuario']); ?></span>
			</div>
			<div class="col text-truncate">
				<span class="font-weight-light">E-mail: <br /></span>
				<span class="h5"><?= anchor("UserSystem/DetalheUser/{$user['id_usuario']}", $user['email_usuario']); ?></span>
			</div>
		</div>
		<?php
      		} elseif ($user['nome_usuario'] == 'Administrador do Sistema') {
      			echo "";
      		} else {
      	?>
		
      	<div class="row border border-primary rounded p-2 mb-2 text-primary">
			<div class="col text-truncate">
				<span class="font-weight-light">Nome: <br /></span>
				<span class="h5"><?= anchor("UserSystem/DetalheUser/{$user['id_usuario']}", $user['nome_usuario']." ".$user['sobrenome_usuario']); ?></span>
			</div>
			<div class="col">
				<span class="font-weight-light">CPF: <br /></span>
				<span class="h5"><?= anchor("UserSystem/DetalheUser/{$user['id_usuario']}", $user['cpf_usuario']); ?></span>
			</div>
			<div class="col text-truncate">
				<span class="font-weight-light">E-mail: <br /></span>
				<span class="h5"><?= anchor("UserSystem/DetalheUser/{$user['id_usuario']}", $user['email_usuario']); ?></span>
			</div>
		</div>	
        <?php 
        	}
         	endforeach ?>
        </tbody>
  	</table>
</div>
