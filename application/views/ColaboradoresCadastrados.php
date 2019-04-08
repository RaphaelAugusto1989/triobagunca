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

			if ($this->session->userdata('IdUser') == '1') {
				$total = $total;
			} else {
				$total = $total - 1;
			}
		?>

		<span class="text-right"><?php echo "Você tem ".$total." colaboradores cadastrados!"; ?></span>

      	<?php foreach ($colaborador as $colab) : 
      		if ($this->session->userdata('IdUser') == '1') { ?>
      		<a href="Colaborador/DetalheColaborador/<?= $colab['id_colab'] ?>" class="d-inline">
				<div class="row border border-primary rounded p-2 mb-2 text-primary">
	                <div class="col text-truncate">
	                    <span class="font-weight-light">Nome: <br /></span>
	                    <span class="h5"><?= $colab['nome_colab'] ?></span>
	                </div>
	                <div class="col">
	                    <span class="font-weight-light text-truncate">Função: <br /></span>
	                    <span class="h5"><?=  $colab['funcao_colab'] ?></span>
	                </div>
	                <div class="col text-truncate">
	                    <span class="font-weight-light">E-mail: <br /></span>
	                    <span class="h5"><?= $colab['email_colab'] ?></span>
	                </div>
									<div class="col text-truncate">
	                    <span class="font-weight-light">Telefone: <br /></span>
	                    <span class="h5">
							<?php 
								if (empty($colab['fixo_cli'])) {
									echo $colab['cel_colab'];
								} else {
									echo  $colab['fixo_colab'];
								} 
							?>
							</span>
	                </div>
	            </div>
        	</a>
            <?php
	      		} elseif ($colab['id_colab'] == '1') {
	      			echo "";
	      		} else {
      		?>
      			<a href="Colaborador/DetalheColaborador/<?= $colab['id_colab'] ?>" class="d-inline">
	      			<div class="row border border-primary rounded p-2 mb-2 text-primary">
		                <div class="col text-truncate">
		                    <span class="font-weight-light">Nome: <br /></span>
		                    <span class="h5"><?= $colab['nome_colab'] ?></span>
		                </div>
		                <div class="col">
		                    <span class="font-weight-light text-truncate">Função: <br /></span>
		                    <span class="h5"><?= $colab['funcao_colab'];?></span>
		                </div>
		                <div class="col text-truncate">
		                    <span class="font-weight-light">E-mail: <br /></span>
		                    <span class="h5"><?= $colab['email_colab'] ?></span>
		                </div>
										<div class="col text-truncate">
		                    <span class="font-weight-light">Telefone: <br /></span>
		                    <span class="h5">
								<?php 
									if (empty($colab['fixo_cli'])) {
										echo $colab['cel_colab'];
									} else {
										echo $colab['fixo_colab'];
									} 
								?>
							</span>
		                </div>
		            </div>
	        	</a>
        <?php } endforeach?>
        </tbody>
  	</table>
</div>
