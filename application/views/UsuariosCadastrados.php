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
	<table class="table table-bordered table-sm table-hover">
        <thead class="bg-primary">
          <tr>
          	  <td>ID</td>
              <td>NOME</td>
              <td>CPF</td>
              <td>E-MAIL</td>
          </tr>
        </thead>
        <tbody>
      	<?php foreach ($usuario as $user) : 
      		if ($this->session->userdata('IdUser') == '1') {
      	?>
      			<tr>
		          	<td><?=  anchor("UserSystem/DetalheUser/{$user['id_usuario']}", $user['id_usuario']); ?></td>
		            <td><?= anchor("UserSystem/DetalheUser/{$user['id_usuario']}", $user['nome_usuario']." ".$user['sobrenome_usuario']); ?></td>
		            <td><?= anchor("UserSystem/DetalheUser/{$user['id_usuario']}", $user['cpf_usuario']); ?></td>
		            <td><?= anchor("UserSystem/DetalheUser/{$user['id_usuario']}", $user['email_usuario']); ?></td>
		        </tr>
		<?php
      		} elseif ($user['nome_usuario'] == 'Administrador do Sistema') {
      			echo "";
      		} else {
      	?>
      		
	          	<tr>
		          	<td><?=  anchor("UserSystem/DetalheUser/{$user['id_usuario']}", $user['id_usuario']); ?></td>
		            <td><?= anchor("UserSystem/DetalheUser/{$user['id_usuario']}", $user['nome_usuario']." ".$user['sobrenome_usuario']); ?></td>
		            <td><?= anchor("UserSystem/DetalheUser/{$user['id_usuario']}", $user['cpf_usuario']); ?></td>
		            <td><?= anchor("UserSystem/DetalheUser/{$user['id_usuario']}", $user['email_usuario']); ?></td>
		        </tr>
        <?php 
        	}
         	endforeach ?>
        </tbody>
  	</table>
</div>
