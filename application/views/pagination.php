	<div class="row">
		<div class="col-lg-12">
			<nav aria-label="Navegação de página exemplo">
			    <ul class="pagination justify-content-center">
			        <?php
						$quant_pg = ceil($TotalReg/$NumReg);
						$quant_pg++;
						$url_ant = $url."?pg=";
						 
							//LINK ANTERIOR  
							if ($pg > 1) {
								echo '<li class="page-item">';
								echo '<a class="page-link" href="'.$url_ant.($pg-1).'" tabindex="-1">Anterior</a>';
							  	//echo "<span class='pg'><a href=".$url_ant.($pg-1).">Anterior</a></span>";
							  	echo '</li>';
							} else {
							   	echo '<li class="page-item disabled">';
								echo '<a class="page-link" href="'.$url_ant.($pg-1).'" tabindex="-1">Anterior</a>';
							  	//echo "<span class='pg'><a href=".$url_ant.($pg-1).">Anterior</a></span>";
							  	echo '</li>';
							}

							// Faz controle das páginas que irá mostrar na paginação	
							if (($pg - 4) < 1) {
							   $anterior = 1;
							} else {
							   $anterior = $pg - 4;
							}

							if (($pg + 6) > $quant_pg) {
							   $proximo = $quant_pg;
							} else {
							   $proximo = $pg + 6;
							}

							//CRIA OS NUMEROS DAS PÁGINAS	
							for($i_pg = $anterior; $i_pg < $proximo; $i_pg++) {
							   if ($pg == ($i_pg)) {
							   	echo '<li class="page-item active">';
							    echo '<a class="page-link" href="#">'.$i_pg.' <span class="sr-only">(atual)</span></a>';
							    echo '</li>';
								//echo "<span class='pg_select'>$i_pg</span>";
							   } else {
							       $i_pg2 = $i_pg;
							       //echo '<li class="page-item"> <a href={'.$url_ant.'}{'.$i_pg2.'}>'.$i_pg.'</a> </li>';
							       echo "<li class='page-item'><a class='page-link' href={$url_ant}{$i_pg2}>".$i_pg."</a></li>";
							   }
							}

							//LINK PRÓXIMO
							if (( $pg + 1 ) < $quant_pg) {
								echo '<li class="page-item">';
								echo '<a class="page-link" href="ColaboradoresCadastrados'.$url_ant.($pg+1).'" tabindex="-1">Próximo</a>';
							  	echo '</li>';

							   	//echo "<span class='pg'><a href=".$url_ant.($pg+1).">Próxima</a></span>";
							} else {
							   echo '<li class="page-item disabled">';
								echo '<a class="page-link" href="ColaboradoresCadastrados'.$url_ant.($pg+1).'" tabindex="-1">Próximo</a>';
							  	echo '</li>';
							}
					?>
				</ul>
			</nav>
		</div>
	</div>
</div> <!--FIM DIV CONTAINER-->