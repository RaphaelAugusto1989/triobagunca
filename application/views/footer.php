
		<!--<script src="<?php echo base_url('https://code.jquery.com/jquery-3.3.1.min.js');?>"></script>-->
		<script src="<?php echo base_url('assets/js/jquery.min.js');?>"></script>
		<script src="<?php echo base_url('assets/js/popper.min.js');?>"></script>
		<script src="<?php echo base_url('assets/js/bootstrap.min.js')?>"></script>
		<script src="<?php echo base_url('assets/js/bsadmin.js');?>"></script>
		<script src="<?php echo base_url('assets/js/jquery.mask.min.js')?>"></script>
		<script src="<?php echo base_url('assets/js/mask.js')?>"></script>
		<script src="<?php echo base_url('assets/js/busca_cep.js')?>"></script>
		<script src="<?php echo base_url('assets/js/jquery-ui.js');?>"></script>
		<script type="text/javascript">
			$(document).ready(function(){
			    $("#autocomplete").autocomplete({
			        source: "<?php echo base_url('Agenda/AgendamentoNovo')?>",
			    });

                $("#autocomplete2").autocomplete({
			        source: "<?php echo base_url('Colaborador/InsertPermissaoColaborador')?>",
			    });
			    aComplete();
			});

			
			//EXIBIR AUTOMATICA DADOS DE PACOTES EM AGENDAMENTO
			$(document).on ("change",'#selectpacotes', function() {
				var nome_pct = $("#selectpacotes").val();
				 $.ajax({
				 	url: "<?php echo base_url('Agenda/AgendamentoNovo')?>",
				 	type: 'POST',
				 	dataType:'json',
				 	data: {pacote: nome_pct},
				 	beforeSend: function() {
				 		$("#dados_pct").html("Carregando...");
				 	}
				 }).done(function(data){
				 	if(data.codErro==1){
				 		alert(data.msgErro);
				 	}else{
				 		$("#tempo").val(data.tempo);
				 		$("#valor").val(data.valor);
				 		$("#especificacao").val(data.especificacao);
				 	}
				 });
			});

			//EXIBE E OCULTA SENHA
			$(document).ready(function(){
				$('#showPassword').on('click', function(){
				    var passwordField = $('#password');
				    var passwordFieldType = passwordField.attr('type');
				    if(passwordFieldType == 'password') {
				        passwordField.attr('type', 'text');
				        $(this).html('<i class="fas fa-eye-slash"></i>');
				    } else {
				        passwordField.attr('type', 'password');
				        $(this).html('<i class="fas fa-eye"></i>');
				    }
				});
			});

			//GERA PASSWORD AUTOMATICAMENTE
			function Password() {
			  	var pass = "";
			  	var chars = 8; //Número de caracteres da senha
			  	generate = function(chars) {
			    	for (var i= 0; i< chars;i++) {
			      		pass = pass + getRandomChar();
			    	}
			    	document.getElementById("password").value = pass;
			    	//$("#senha").val(pass);
			  	}
				this.getRandomChar = function() {
			  		var ascii = [[48, 57],[97,122]];
			  		var i = Math.floor(Math.random()*ascii.length);
			  		return String.fromCharCode(Math.floor(Math.random()*(ascii[i][1]-ascii[i][0]))+ascii[i][0]);
			  	}
			  	generate(chars);
			}

			//ADICIONA MAIS UM INPUT DATE NA INDISPONIBILIDADE
			$(function () {
			    var scntDiv = $('#dynamicDivDate');
			    $(document).on('click', '#addInput', function () {
			        $('<div id="removDate" class="form-row">'+
			        	'<div class="form-group col-md-2">'+
					        '<input type="date"  class="form-control" name="datainicial[]" value="">'+
			    		'</div>'+
			    		'<div class="form-group col-md-2">'+
					        '<input type="date" class="form-control" name="datafinal[]" value="">'+
			    		'</div>'+
			    		'<div class="form-group col-md-7">'+
					        '<input type="text" class="form-control" name="motivo[]" value="" placeholder="Motivo da Indisponibilidade">'+
			    		'</div>'+
				    	'<div class="form-group col-md-1">'+
					    	'<a class="btn btn-danger" href="javascript:void(0)" onClick="delreg($linh[0])" id="remInputdate">'+
					    		'<span class="glyphicon glyphicon-minus" aria-hidden="true"></span>'+
					        	'<i class="fas fa-times"  title="Remover"></i>'+
							'</a>'+
						'</div>'+
					'</div>').appendTo(scntDiv);
			        return false;
			    });
			    $(document).on('click', '#remInputdate', function () {
		            $(this).parents('#removDate').remove();
			        return false;
			    });
			});

			//ADICIONA MAIS UM COLABORADOR NO AGENDAMENTO
			$(function () {
			    var scntDiv = $('#dynamicDiv');
			    $(document).on('click', '#addInput', function () {
			        $('<div id="remov" class="form-row">'+
			        	'<div class="form-group col-md-11">'+
		        			'<input type="text" id="autocompletecolab" class="form-control autocompletecolab" name="nome_colab[]" value="" placeholder="Nome do Colaborador" autofocus> '+
		        			'<input type="hidden" name="idcolab[]" id="idcolab" value="">'+
		        		'</div>'+
		    			'<div class="form-group col-md-1">'+
		        			'<a class="btn btn-danger" href="javascript:void(0)" id="remInput">'+
								'<span class="glyphicon glyphicon-minus" aria-hidden="true"></span>'+
								'<i class="fas fa-times" title="Remover"></i>'+
		        			'</a>'+
		        		'</div>'+
					'</div>').appendTo(scntDiv);
					aComplete();
			        return false;
			    });
			    $(document).on('click', '#remInput', function () {
		            $(this).parents('#remov').remove();
			        return false;
			    });
			});

			function delreg(idcolabevent) {
				var nome = document.getElementById("autocompletecolab").value
				var id = idcolabevent
				confirm('Tem certeza que quer excluir este colaborador do evento?');
				window.location.href="../DeletColabEvent/"+id;
			} 

			function aComplete(){
				$(document).on("keyup", ".autocompletecolab", function(){
					var elemento = $(this);
					$(".autocompletecolab").autocomplete({
	                    source: "<?php echo base_url('Agenda/AlterarAgendamento')?>",
	                    select: function( event, ui ) {

	                        console.log(ui.item.id);
	                        $(elemento).next().val(ui.item.id);

	                    }
	            	});
				});
				
			}
			
		</script>
</body>
</html>