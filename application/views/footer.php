
		<!--<script src="<?php echo base_url('https://code.jquery.com/jquery-3.3.1.min.js');?>"></script>-->
		<script src="<?php echo base_url('assets/js/jquery.min.js');?>"></script>
		<script src="<?php echo base_url('assets/js/popper.min.js');?>"></script>
		<script src="<?php echo base_url('assets/js/bootstrap.min.js')?>"></script>
		<script src="<?php echo base_url('assets/js/bsadmin.js');?>"></script>
		<script src="<?php echo base_url('assets/js/jquery.mask.min.js')?>"></script>
		<script src="<?php echo base_url('assets/js/mask.js')?>"></script>
		<script src="<?php echo base_url('assets/js/jquery-ui.js');?>"></script>
		<script type="text/javascript">
			$(document).ready(function(){
			    $("#autocomplete").autocomplete({
			        source: "<?php echo base_url('Agenda/AgendamentoNovo')?>",
			    });

                $("#autocompleteuser").autocomplete({
                    source: "<?php echo base_url('UserSystem/PermissionUserCadastro')?>",
                    select: function( event, ui ) {

                        console.log(ui.item.id);
                        $("#iduser").val(ui.item.id);

                    }
                });
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

			//EXIBIR AUTOMATICA DADOS DO USUARIO
			$(document).on ("change",'#iduser', function() {
				var id_user = $("#autocompleteuser").val();
				 $.ajax({
				 	url: "<?php echo base_url('UserSystem/PermissionUserCadastro')?>",
				 	type: 'POST',
				 	dataType:'json',
				 	data: {id: id_user},
				 	beforeSend: function() {
				 		$("#dados_id").html("Carregando...");
				 	}
				 }).done(function(data){
				 	if(data.codErro==1){
				 		alert(data.msgErro);
				 	}else{
				 		$("#iduser").val(data.id);
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
			
		</script>
</body>
</html>