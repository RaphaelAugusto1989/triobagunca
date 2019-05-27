<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="container p-4">
	<a href="javascript:history.go(-1)"> <i class="fas fa-arrow-alt-circle-left"></i> <b>voltar</b> </a>

	<div class="form-group row">
		<div class="col-lg-3"></div>
		<div class="col-lg-5"><p class="text-center">DETALHE DOS ACESSOS AO SISTEMA</p></div>
	  	<div class="col-lg-4">
		</div>
	</div>
	<table class="table table-striped">
		<thead>
		    <tr>
		      <th scope="col">COLABORADOR</th>
		      <th scope="col">IP ACESSADO</th>
		      <th scope="col">HOST</th>
		      <th scope="col">DATA E HORA DO ACESSO</th>
		    </tr>
		</thead>
		<tbody>
	<?php
		foreach ($acessos as $key => $ac) {
	?>
		    <tr>
		      <td><?= $acessos[$key]['nome_colab']?> </td>
		      <td><?= $acessos[$key]['ip_acesso']?></td>
		      <td><?= $acessos[$key]['nome_operadora']?></td>
		      <td><?= date('d/m/Y', strtotime($acessos[$key]['data_acesso'])).' às '.$acessos[$key]['hora_acesso'] ?></td>
		    </tr>
	<?php
		}
	?>
		</tbody>
	</table>
</div>
