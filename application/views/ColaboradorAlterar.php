<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="container p-4">
		<p class="text-center">ALTERAR COLABORADOR</p>
		<?php echo $msg;?>
<form action="<?php echo base_url('Colaborador/AlterarMeusDados');?>" method="POST" enctype="multipart/form-data">
  <div class="form-group text-center">
      <?php
          if (!empty($clb['foto_colab'])) {
              echo "<img class='meu_avatar rounded-circle border border-2 p-1' src='".base_url("assets/img/fotos_colabs/".$clb['foto_colab']."")."'>";
          } elseif ($clb['sexo_colab'] == "MASCULINO") {
              echo "<img class='meu_avatar rounded-circle border border-2 p-1' src='".base_url("assets/img/avatar_man.png")."'>";
          } else {
              echo "<img class='meu_avatar rounded-circle border border-2 p-1' src='".base_url("assets/img/avatar_woman.png")."'>";
          }
      ?>
  </div>
<span class="form-row border border-dark border-top-0 border-left-0 border-right-0 border-bottom-1 mb-3 ml-1 mt-3 mr-1 pb-2 font-weight-bold">DADOS: </span>
    <div class="form-row">
      	<div class="form-group col-md-6">
          <input type="hidden" name="id" value="<?= $clb['id_colab']; ?>">
          <label for="inputname">Nome:</label>
          <input type="text" name="nome" id="inputname" class="form-control" placeholder="Nome" value="<?= $clb['nome_colab']; ?>">
        </div>
        <div class="form-group col-md-6">
    			<label for="inputsobrename">Sobrenome:</label>
	  			<input type="text" name="sobrenome" id="inputsobrename" class="form-control" placeholder="Sobrenome" value="<?= $clb['sobrenome_colab']; ?>">
    		</div>
    </div>
    <div class="form-row">
      <div class="form-group col-md-6">
          <label for="inputcpf">CPF:</label>
          <input type="text" name="cpf" id="inputcpf" class="cpf form-control" value="<?= $clb['cpf_colab']; ?>">
        </div>
        <div class="form-group col-md-6">
          <label for="inputdate">Data de Nascimento:</label>
            <input type="date" name="nascimento" class="form-control" id="inputdate" value="<?= $clb['nasc_colab']; ?>">
        </div>
    </div>
    <div class="form-row">
      <div class="form-group col-md-6"">
                <label for="selecsexo">Sexo</label>
                <?php
                  if ($clb['sexo_colab'] == "MASCULINO") {
                      $Selected = "selected";
                  } elseif ($clb['sexo_colab'] == "FEMININO") {
                      $Selected = "selected";
                  }
                ?>
                <select  class="form-control" id="selectsexo" name="sexo">
                    <option <?= $Selected ?> value="FEMININO">Feminino</option>
                    <option <?= $Selected ?> value="MASCULINO">Masculino</option>
                </select>
            </div>
      <div class="form-group col-md-6">
        <label for="inputcpf">Função:</label>
            <input type="text" name="funcao" class="form-control" id="inputfuncao" value="<?= $clb['funcao_colab']; ?>">
        </div>
      </div>
      <span class="form-row border border-dark border-top-0 border-left-0 border-right-0 border-bottom-1 mb-3 ml-1 mt-3 mr-1 pb-2 font-weight-bold">ENDEREÇO: </span>
      <div class="form-row">
        <div class="form-group col-md-3">
        <label for="cep">CEP:</label>
          <input type="text" name="cep" class="cep form-control" id="cep" placeholder="99.999-999" onblur="pesquisacep(this.value);"  value="<?= $clb['cep_colab']; ?>">
      </div>
      <div class="form-group col-md-5">
        <label for="inputAddress">Rua:</label>
          <input type="text" name="rua" class="form-control" id="rua" placeholder="Rua" value="<?= $clb['rua_colab']; ?>">
      </div>
      <div class="form-group col-md-4">
        <label for="cidade">Cidade:</label>
          <input type="text" name="cidade" class="form-control" id="cidade" placeholder="Cidade" value="<?= $clb['cidade_colab']; ?>">
      </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-3">
        <label for="inputAddress">Bairro:</label>
          <input type="text" name="bairro" class="form-control" id="bairro" placeholder="Bairro" value="<?= $clb['bairro_colab']; ?>">
      </div>
      <div class="form-group col-md-2">
        <label for="uf">Estado:</label>
          <input type="text" name="estado" class="form-control" id="estado" placeholder="Estado" value="<?= $clb['estado_colab']; ?>">
      </div>
      <div class="form-group col-md-7">
        <label for="inputAddress">Complemento:</label>
          <input type="text" name="complemento" class="form-control" id="inputestado" placeholder="Complemento" value="<?= $clb['complemento_colab']; ?>">
      </div>
    </div>
    <span class="form-row border border-dark border-top-0 border-left-0 border-right-0 border-bottom-1 mb-3 ml-1 mt-3 mr-1 pb-2 font-weight-bold">CONTATOS: </span>
    <div class="form-row">
      <div class="form-group col-md-6">
        <label for="inputfone1">Fixo:</label>
            <input type="tel" name="fixo" class="form-control fixo" id="inputfone1" placeholder="Fixo" value="<?= $clb['fixo_colab']; ?>">
          </div>
        <div class="form-group col-md-6">
          <label for="inputfone2">Celular:</label>
            <input type="tel" name="cel" class="form-control cel" id="inputfone2" placeholder="Celular" value="<?= $clb['cel_colab']; ?>">
        </div>
      </div>
    <div class="form-group">
      <label for="inputEmail4">E-mail:</label>
        <input type="email" name="email" placeholder="E-mail" class="form-control" id="inputEmail4" value="<?= $clb['email_colab']; ?>">
    </div>
    <span class="form-row border border-dark border-top-0 border-left-0 border-right-0 border-bottom-1 mb-3 ml-1 mt-3 mr-1 pb-2 font-weight-bold">DADOS DO SISTEMA: </span>
    <div class="form-row">
        <div class="form-group col-md-6">
          <label for="inputuser">Usuário:</label>
                <input type="input" name="login" class="form-control" id="inputuser" required value="<?= $clb['login_colab']; ?>">
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
		<a href="<?= base_url('Colaborador/ExcluirColaborador?id='.$clb['id_colab']);?>" class="btn btn-danger ml-2">Excluir <i class="fas fa-trash-alt ml-2"></i></a>
	</form>
</div >