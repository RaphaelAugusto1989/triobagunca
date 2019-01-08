<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
?>
	<div class="container p-4">
		<p class="text-center">ALTERAR USUÁRIO</p>
		<?php echo $msg;?>
		<form action="<?php echo base_url('UserSystem/AlterarUser');?>" method="POST">
            <div class="form-row">
                <div class="form-group  col-md-6">
      			    <label for="inputname">Nome:</label>
      			    <input type="hidden" name="id" value="<?= $user['id_usuario']; ?>">
      			    <input type="text" name="nome" id="inputname" class="form-control" placeholder="Nome" required value="<?= $user['nome_usuario']; ?>">
			    </div>
                <div class="form-group col-md-6">
                    <label for="inputsobrename">Sobrenome:</label>
                    <input type="text" name="sobrenome" id="inputsobrename" class="form-control" placeholder="Sobrenome" required value="<?= $user['sobrenome_usuario']; ?>">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6"">
                    <label for="selecsexo">Sexo</label>
                    <select  class="form-control" id="selectsexo" name="sexo">
                        <option value="" selected disabled>Selecione o Sexo</option>

                        <option value="FEMININO" <?php if ($user['sexo_usuario'] == "FEMININO") : echo "selected"; endif ?>>Feminino</option>
                        <option value="MASCULINO" <?php if ($user['sexo_usuario'] == "MASCULINO") : echo "selected"; endif ?>>Masculino</option>
                    </select>
                </div>
                <div class="form-group col-md-6"">
                    <label for="inputmail">E-mail:</label>
                    <input type="text" name="email" class="form-control" id="inputmail" placeholder="E-mail do Usuário" required value="<?= $user['email_usuario']; ?>">
                </div>
            </div>
			<div class="form-row">
				<div class="form-group col-md-6">
					<label for="inputcpf">CPF:</label>
          			<input type="text" name="cpf" class="form-control cpf" id="inputcpf" maxlength="11" value="<?= $user['cpf_usuario']; ?>">
        		</div>
        		<div class="form-group col-md-6">
        			<label for="inputnascimento">Data de Nascimento:</label>
          			<input type="date" name="nascimento" class="form-control" id="inputnascimento" value="<?= $user['nascimento_usuario']; ?>">
        		</div>
        	</div>
			<div class="form-row">
				<div class="form-group col-md-6">
					<label for="inputuser">Usuário:</label>
          			<input type="input" name="user" class="form-control" id="inputuser" required value="<?= $user['login_usuario']; ?>">
        		</div>
        		<div class="form-group col-md-6">
        			<label for="password">Alterar Senha:</label>
        			<div class="input-group">
	          			<input type="password" name="password" id="password" class="form-control" placeholder= "Digite uma Senha"> 
	          			<div class="input-group-append">
	   	       				<a href="#" class="bg-white btn btn-link border border-left-0" id="showPassword" title="Mostrar Senha" style="text-decoration: none;"><i class="fas fa-eye"></i></a>
	   	       			</div>
   	       			</div>
          			<a href="javascript:Password(this);"> <i class="fas fa-key"></i> Gerar Senha </a>
   	       			<span style="font-size: 12px; float: right;">*Deixe em branco caso não queira alterar a senha!</span>
        		</div>
        	</div>
			<button type="submit" class="btn btn-primary">Salvar <i class="fas fa-save ml-2"></i></button>
		 	<a href="<?= base_url('UserSystem/ExcluirUser?id='.$user['id_usuario']);?>" class="btn btn-danger ml-2">Excluir <i class="fas fa-trash-alt ml-2"></i></a>
		</form>
</div>
