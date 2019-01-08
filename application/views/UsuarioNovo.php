<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
?>
	<div class="container p-4">
		<p class="text-center">CADASTRO DE USUÁRIOS</p>
		<?php
			if ($this->session->flashdata('Sucess') !="") {
                echo "<p class='alert alert-success text-center'>" .$msg. "</p>";
			} elseif ($this->session->flashdata('Error') !="") {
				echo "<p class='alert alert-danger text-center'>" .$msg. "</p>";
			}
		?>
		<form action="<?php echo base_url('UserSystem/NewUser');?>" method="POST">
            <div class="form-row">
                <div class="form-group  col-md-6">
                    <label for="inputname">Nome:</label>
                    <input type="text" name="nome" id="inputname" class="form-control" placeholder="Nome" required>
                </div>
                <div class="form-group col-md-6">
                    <label for="inputname">Sobrenome:</label>
                    <input type="text" name="sobrenome" id="inputname" class="form-control" placeholder="Sobrenome" required>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6"">
                <label for="selecsexo">Sexo</label>
                <select  class="form-control" id="selectsexo" name="sexo">
                    <option value="" selected disabled>Selecione o Sexo</option>
                    <option value="FEMININO">Feminino</option>
                    <option value="MASCULINO">Masculino</option>
                </select>
            </div>
                <div class="form-group col-md-6"">
                    <label for="inputmail">E-mail:</label>
                    <input type="text" name="email" class="form-control" id="inputmail" placeholder="E-mail do Usuário" required>
                </div>
            </div>
			<div class="form-row">
				<div class="form-group col-md-6">
					<label for="inputcpf">CPF:</label>
          			<input type="text" name="cpf" class="form-control cpf" id="inputcpf" maxlength="11">
        		</div>
        		<div class="form-group col-md-6">
        			<label for="inputnascimento">Data de Nascimento:</label>
          			<input type="date" name="nascimento" class="form-control" id="inputnascimento">
        		</div>
        	</div>
			<div class="form-row">
				<div class="form-group col-md-6">
					<label for="inputuser">Usuário:</label>
          			<input type="input" name="user" class="form-control" id="inputuser" required>
        		</div>
        		<div class="form-group col-md-6">
        			<label for="senha">Senha:</label>
          			<div class="input-group">
	          			<input type="password" name="password" id="password" class="form-control" placeholder= "Digite uma Senha"> 
	          			<div class="input-group-append">
	   	       				<a href="#" class="bg-white btn btn-link border border-left-0" id="showPassword" title="Mostrar Senha" style="text-decoration: none;"><i class="fas fa-eye"></i></a>
	   	       			</div>
   	       			</div>
          			<a href="javascript:Password(this);"> <i class="fas fa-key"></i> Gerar Senha </a>
        		</div>
        	</div>
			<button type="submit" class="btn btn-primary">Salvar <i class="fas fa-save ml-2"></i></button>
		</form>
</div>
