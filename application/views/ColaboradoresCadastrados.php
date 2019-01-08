<div class="container p-4">
	<form action="">
		<div class="form-group row">
			<div class="col-lg-4"></div>
			<div class="col-lg-4"><p class="text-center">COLABORADORES CADASTRADOS</p></div>
			<div class="col-lg-2 text-left">
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
              <td>FUNÇÃO</td>
              <td>E-MAIL</td>
              <td>TELEFONE</td>
          </tr>
        </thead>
        <tbody>
      	<?php foreach ($colaborador as $colab) : ?>
	          	<tr>
		          	<td><?=  anchor("Colaborador/DetalheColaborador/{$colab['id_colab']}", $colab['id_colab']); ?></td>
		            <td><?= anchor("Colaborador/DetalheColaborador/{$colab['id_colab']}", $colab['nome_colab']); ?></td>
		            <td><?= anchor("Colaborador/DetalheColaborador/{$colab['id_colab']}", $colab['funcao_colab']); ?></td>
		            <td><?= anchor("Colaborador/DetalheColaborador/{$colab['id_colab']}", $colab['email_colab']); ?></td>
		            <td><?php
							if (empty($colab['fixo_cli'])) {
								echo anchor("Colaborador/DetalheColaborador/{$colab['id_colab']}", $colab['cel_colab']);
							} else {
								echo anchor("Colaborador/DetalheColaborador/{$colab['id_colab']}", $colab['fixo_colab']);
							}?>
		          	</td>
		          </a>
		        </tr>
        <?php endforeach?>
        </tbody>
  	</table>
</div>
