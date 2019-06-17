<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Agenda extends CI_Controller {

	function __construct() {
		parent::__construct(); 
		$this->load->library('form_validation');
	}

	public function AgendamentoNovo() {
		$msg = null;
		if ($this->session->flashdata('Success') !="") {
			$msg = $this->session->flashdata('Success');
		} else {
			$msg = $this->session->flashdata('Error');
		}
		
		#MOSTRA PACOTE
		$this->load->model('Pacotes_model');
		$lista = $this->Pacotes_model->MostraPacotes();
		$dados =  array('pacote' => $lista, 'dadospacote'=>null);
		
		if(isset($_POST['pacote'])) {
			$id = $_POST['pacote'];
			$idPacote = $this->Pacotes_model->RetornaIdPacote($id);
			$dados = array('dadospacote' => $idPacote);
			if(!empty($dados)){
				
				echo json_encode(array("codErro"=>0, 
								 	   "msg"=>"", 
									   "tempo"=>$dados["dadospacote"]["tempo_pct"],
									   "valor"=>$dados["dadospacote"]["valor_pct"],
									   "especificacao"=>trim($dados["dadospacote"]["especificacao_pct"])
									   )
							    );exit;
			}else{
				echo json_encode(array("codErro"=>1, "msg"=>"Dados do pacote não encontrado")); exit;
			}
			echo'<pre>';print_r($dados);exit;
		}

		
		$dados['msg'] = $msg;
		$dados['titulo'] = 'Agendamento de Envento';
	    $ListaMenus = $this->menu->PermissaoMenus();

		$this->load->view('header', $dados);
		$this->load->view('menu', $ListaMenus);
		$this->load->view('AgendamentoNovo', $dados);
		$this->load->view('footer');
	}
	
	public function NovoAgendamento()	{
		$mes = date('m', strtotime($this->input->post('data_evento')));
		$EmailEnviado = '0';
		
		$agenda = array(
			'nome_cli' => $this->input->post('nome_cliente'), 
			'data_evento' => date('Y-m-d', strtotime($this->input->post('data_evento'))),
			'mes_evento' => $mes,
			'hora_evento' => $this->input->post('hora_evento'),
			'email_cli' => $this->input->post('email_cliente'),
			'id_pct' => $this->input->post('pct'),
			'especificacao_pct' => $this->input->post('especificacao'),
			'tempo_evento' => $this->input->post('tempo_evento'),
			'valor_pct' => $this->input->post('valor_pct'),
			'status_evento' => $this->input->post('status'),
			'email_enviado' => $EmailEnviado,
		);

		$this->load->model('Agenda_model');
		$this->Agenda_model->SaveAgenda($agenda);

		if (!empty($agenda)) {
			$this->session->set_flashdata('Success', 'Agendamento Feito com Sucesso');
			redirect(base_url('AgendamentoNovo'));
		} else {
			$this->session->set_flashdata('Error', 'Ocorreu algum problema, verifique os dados e tente novamente!');
			redirect(base_url('AgendamentoNovo'));
		}
	}

	public function Agendamentos(){
		$MesAtual = date('m');
		$AnoAtual = date('Y');
		$this->load->model('Agenda_model');
		$ContEvento = $this->Agenda_model->MostraAgenda($MesAtual, $AnoAtual);

		$NumReg = 8; #QTD DE REGISTROS A SER MOSTRADO POR PÁGINA

		$pg = isset($_GET["pg"]) ? $_GET["pg"] : 1;
		$Inicial = ($pg * $NumReg) - $NumReg;

		$TotalReg = count($ContEvento);

		$lista = $this->Agenda_model->MostraQtdRegAgenda($MesAtual, $AnoAtual, $Inicial, $NumReg);

		$dados = array('evento' => $lista, 'TotalReg' => $TotalReg, 'NumReg' => $NumReg, 'pg' => $pg, 'url' => 'Agendamentos', 'titulo' => 'Eventos Cadastrados');

		$ListaMenus = $this->menu->PermissaoMenus();

		$this->load->view('header', $dados);
		$this->load->view('menu',$ListaMenus);
		$this->load->view('Agendamentos', $dados);
		$this->load->view('pagination', $dados);
		$this->load->view('footer');
	}

	public function AgendamentosPorMes(){
		$Mes = $this->uri->segment(3);
		$AnoAtual = date('Y');

		$this->load->model('Agenda_model');
		$lista = $this->Agenda_model->MostraAgendaPorMes($Mes, $AnoAtual);

		$dados = array('evento' => $lista, 'titulo' => 'Eventos Cadastrados');

		$ListaMenus = $this->menu->PermissaoMenus();

		$this->load->view('header', $dados);
		$this->load->view('menu',$ListaMenus);
		$this->load->view('Agendamentos', $dados);
		$this->load->view('footer');
	}

	public function PesquisarEvento() {
		$pesquisa = $this->input->post('pesquisa');

		$this->load->model('Agenda_model');
		$lista = $this->Agenda_model->PesquisaEvento($pesquisa);

		echo '<pre>';
		print_r($lista); exit();

		$dados = array('evento' => $lista, 'titulo' => 'Eventos Encontrado');

		$ListaMenus = $this->menu->PermissaoMenus();

		$this->load->view('header', $dados);
		$this->load->view('menu',$ListaMenus);
		$this->load->view('Agendamentos', $dados);
		$this->load->view('footer');
	}

	public function AlterarAgendamento () {
		$id = $this->input->post('id');
		$DataEvento = $this->input->post('data_evento');
		$mes = date('m', strtotime($this->input->post('data_evento')));

		//CADASTRA AS ALTERAÇÕES DO EVENTO
		$evento = array(
			'nome_cli' => $this->input->post('nome_cliente'), 
			'niver_cli' => $this->input->post('aniversariante'),
			'idade_niver' => $this->input->post('idade'),
			'data_evento' => $DataEvento,
			'mes_evento' => $mes,
			'email_cli' => $this->input->post('email_cliente'),
			'hora_evento' => $this->input->post('hora_evento'),
			'nome_mae' => $this->input->post('nomemae'),
			'nome_pai' => $this->input->post('nomepai'),
			'cep_evento' => $this->input->post('cep'),
			'rua_evento' => $this->input->post('rua'),
			'numero_evento' => $this->input->post('numero'),
			'cidade_evento' => $this->input->post('cidade'),
			'bairro_evento' => $this->input->post('bairro'),
			'estado_evento' => $this->input->post('estado'),
			'complemento_evento' => $this->input->post('complemento'),
			'nome_emergencia' => $this->input->post('nome_emergencia'),
			'numero_emergencia' => $this->input->post('numero_emergencia'),
			'qtd_idade_crianca_evento' => $this->input->post('qtd_criancas'),
			'id_pct' => $this->input->post('pct'),
			'especificacao_pct' => $this->input->post('especificacao'),
			'hora_chegada' => $this->input->post('hora_chegada'),
			'tempo_evento' => $this->input->post('tempo_evento'),
			'hora_adicional' => $this->input->post('hora_adicional'),
			'valor_pct' => $this->input->post('valor_pct'),
			'valor_total' => $this->input->post('valor_total'),
			'sinal_valor' => $this->input->post('sinal_valor'),
			'falta_pagar_valor' => $this->input->post('falta_pagar'),
			'status_evento' => $this->input->post('status'),
		);

		$this->load->model('Agenda_model');
		$this->Agenda_model->AlteraAgenda($id, $evento);

		$this->load->model('Colaborador_model');
		$this->Colaborador_model->MostraIndisponibilidadeEvento($DataEvento);

		#AUTOCOMPLETE
        if(isset($_GET['term'])) {
            $this->load->model('Colaborador_model');
            $lista = $this->Colaborador_model->AutoCompleteColaborador($_GET['term']);
            $arr_lista = array();
            if (!empty($lista)) {
                foreach ($lista as $nome) {
                    $resultado = array("label" => $nome->nome_colab.' '.$nome->sobrenome_colab,
                    "value" => $nome->nome_colab.' '.$nome->sobrenome_colab.' - '.$nome->funcao_colab,
                    "id"=>$nome->id_colab);
                    array_push($arr_lista, $resultado);
                }
                echo  json_encode($arr_lista); exit;
            }
		}

		//CADASTRA COLABORADOR NO EVENTO
		$nomeColaborador = $this->input->post('nome_colab');
		$idsColaboradores = $this->input->post('idcolab');
		$ids = $this->Agenda_model->colaboradoresEvento($id);
				
		$jaCadastrados = array();
		if(!empty($ids)){
			foreach ($ids as $value) {
				array_push($jaCadastrados, $value["fk_id_colaborador"]);
			}
		}

		foreach($idsColaboradores as $indice => $c){
			if(!in_array($c, $jaCadastrados)){
				$nomeColaborador = $this->input->post('nome_colab')[$indice];
				$EventoColaborador = array (
					'fk_id_evento' => $id,
					'fk_id_colaborador' => $c,
					'nome_colaborador' => $nomeColaborador,
				);

				$this->load->model('Agenda_model');
				$this->Agenda_model->SaveColabEvento($EventoColaborador);
			}
		} 

		//echo '<pre>';
		//print_r($evento); exit();
		if (!empty($id)) {
			$id = $this->input->post('id');
			$idEv = $this->Agenda_model->RetornaIdAgenda($id);

			if ($idEv['email_enviado'] == '0') {
				if ($evento['status_evento'] == 'Confirmado') {
					$id = $evento['id_pct'];

					$this->load->model('Pacotes_model');
					$idPacote = $this->Pacotes_model->RetornaIdPacote($id);

					$Nome = $evento['nome_cli'];
					$To = $evento['email_cli'];
					$Subject = "Evento Confirmado!";
					
					$Message= "<html charset='utf-8'>
								<center style='width: 100%; background-color: #F3F2F1; padding: 30px 0 30px 0;'> 
									<div style='width: 70%; margin: 0 auto; border: 0 solid; border:1px solid #007BFF; margin:5px; text-align: left; background-color: #FFFFFF;'>
										<div style='padding: 10px 10px 0 10px;'>
											<img src='http://admin.triobagunca.com.br/assets/img/logo_sistema_email.png' style='width: 150px; text-align: center; margin-top: 15px;'>
											<img src='http://admin.triobagunca.com.br/assets/img/logo-trio.png' style='width: 100px; text-align: center; float: right;'>
										</div>
										<p style='font-size: 22px; height: 25px; padding: 15px 0 15px 0; background-color:#007BFF; color: #ffffff; text-align: center; font-weight: bold;'>CONFIRMAÇÃO DO EVENTO</p>
										<p style='padding: 10px; font-size: 14px;'>
										Olá ".$Nome."! <br />
										Seu evento foi confirmado, verifique os dados abaixo.
										Caso tenha algum dado incorreto, entrar em contato com o responsável da contratação do evento!
										<br />

										<div style='font-size: 18px; padding: 0 10px 0 10px; color: #007BFF; text-align: left; font-weight: bold;'>
										<span style='color: #000000; font-size: 16px;'>Nº DO EVENTO: ".$this->input->post('id')."</span><br />
										DADOS DO CLIENTE</div>
										<div style='padding: 0 10px 0 10px;; font-size: 14px;'>
											<b>Aniversáriante:</b> ".$evento['niver_cli']."<br />
											<b>Idade:</b> ".$evento['idade_niver']." anos<br />
											<b>Data do Evento:</b> ".date('d/m/Y', strtotime($evento['data_evento']))."<br />
											<b>Horário da Festa:</b> ".$evento['hora_evento']."<br />
											<b>Nome da Mãe:</b> ".$evento['nome_mae']."<br />
											<b>Nome do Pai:</b> ".$evento['nome_pai']."<br />
										</div>

										<div style='font-size: 18px; padding: 20px 10px 0 10px; color: #007BFF; text-align: left; font-weight: bold;'>ENDEREÇO DA FESTA</div>
										<div style='padding: 0 10px 0 10px; font-size: 14px;'>
											<b>Rua:</b> ".$evento['rua_evento']."<br />
											<b>Nº:</b> ".$evento['numero_evento']."<br />
											<b>Cidade:</b> ".$evento['cidade_evento']."<br />
											<b>Bairro:</b> ".$evento['bairro_evento']."<br />
											<b>Estado:</b> ".$evento['estado_evento']."<br />
											<b>Complemento:</b> ".$evento['complemento_evento']."<br />
										</div>

										<div style='font-size: 18px; padding: 20px 10px 0 10px; color: #007BFF; text-align: left; font-weight: bold;'>DETALHE DA FESTA</div>
										<div style='padding: 0 10px 10px 10px; font-size: 14px;'>
											<b>Quantidade e média de idade das crianças:</b> ".$evento['qtd_idade_crianca_evento']."<br />
											<b>Pacote Contratado:</b> ".$idPacote['nome_pct']."<br />
											<b>Especificação do Pacote:</b> ".$evento['especificacao_pct']."<br />
											<b>Hora da Chegada:</b> ".$evento['hora_chegada']."<br />
											<b>Tempo de Permanência:</b> ".$evento['tempo_evento']."<br />
											<b>Valor do Pacote:</b> ".$evento['valor_pct']."<br />
											<b>Valor Total do Pacote:</b> ".$evento['valor_total']."<br />
											<b>Sinal:</b> ".$evento['sinal_valor']."<br />
											<b>Falta Pagar:</b> ".$evento['falta_pagar_valor']."<br />
										</div>
									</div>
								</center>
							</html>";
				
					//É necessário indicar que o formato do e-mail é html
					$Headers  = 'MIME-Version: 1.0' . "\r\n";
				    $Headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
				    $Headers .= 'From: '."Trio Bagunça <noreply@triobagunca.com.br>";
				   	//$Headers .= "Bcc: $EmailPadrao\r\n";
						
					$Enviado = mail($To, $Subject, $Message, $Headers);

					if ($Enviado) {
						$id = $this->input->post('id');
						$EmailEnviado = '1';
						$evento = array(
							'email_enviado' => $EmailEnviado,
						);
						$this->Agenda_model->AlteraAgenda($id, $evento);
					}	
				} //FIM IF STATUS CONFIRMADO
			}//FIM IF VERIFICAÇÃO SE O E-MAIL FOI ENVIADO
			
			$msg = $this->session->set_flashdata('Success', 'Evento Alterado com Sucesso');
			redirect(base_url('Agenda/DetalheEvento/'.$id));
		} else {
			$msg = $this->session->set_flashdata('Error', 'Ocorreu algum problema, verifique os dados e tente novamente!');
			redirect(base_url('DetalheEvento/'.$id));
		}
	}

	public function ExcluirEvento() {
		$id = $this->input->get('id');
		$this->load->model('Agenda_model');
		$true = $this->Agenda_model->DeletaAgenda($id);

		if ($true == TRUE) {
			echo "<script> alert('EVENTO EXCLUÍDO COM SUCESSO!') </script>";
			echo "<script> location.href=('../Agendamentos')</script>";
		}
	}

	public function DetalheEvento() {
		$msg = null;
		if ($this->session->flashdata('Success') !="") {
			$msg = "<p class='alert alert-success text-center'>".$this->session->flashdata('Success')."</p>";
		} else if ($this->session->flashdata('Error') !=""){
			$msg = "<p class='alert alert-danger text-center'>".$this->session->flashdata('Error')."</p>";
		}

		#MOSTRA PACOTE
		$this->load->model('Pacotes_model');
		$lista = $this->Pacotes_model->MostraPacotes();
		$dados =  array('pacote' => $lista, 'dadospacote'=>null, 'titulo'=>'Evento');
		
		if(isset($_POST['pacote'])) {
			$id = $_POST['pacote'];
			$idPacote = $this->Pacotes_model->RetornaIdPacote($id);
			$dados = array('dadospacote' => $idPacote);
			if(!empty($dados)){
				echo json_encode(array("codErro"=>0, 
								 	   "msg"=>"", 
								 	   "idpct"=>$dados["dadospacote"]["id_pct"],
									   "tempo"=>$dados["dadospacote"]["tempo_pct"],
									   "valor"=>$dados["dadospacote"]["valor_pct"],
									   "especificacao"=>trim($dados["dadospacote"]["especificacao_pct"])
									   )
							    ); exit;
			} else {
				echo json_encode(array("codErro"=>1, "msg"=>"Dados do pacote não encontrado")); exit;
			}
		}

		$id = $this->uri->segment(3);

		$this->load->model('Agenda_model');
		$idEvento = $this->Agenda_model->RetornaIdAgenda($id);

		//RETORNA COLABORADORES CADASTRADOS NO EVENTO
		$colab = $this->Agenda_model->MostraColabEvento($id);

		$Evento = array('evento' => $idEvento, 'ColabEvento' => $colab);
		$Evento['msg'] = $msg;

		$ListaMenus = $this->menu->PermissaoMenus();

		$this->load->view('header', $dados);
		$this->load->view('menu', $ListaMenus);
		$this->load->view('AgendamentoAltera', $Evento);
		$this->load->view('footer');
	}

	public function DeletColabEvent() {
		$id = $this->uri->segment(3);

		$this->load->model('Agenda_model');

		$IdEvent = $this->Agenda_model->RetornaIdEventoColab($id);
		$true = $this->Agenda_model->ExcluiColabEvento($id);

		foreach ($IdEvent as $key => $iv) {
				$IdDoEvento = $iv['fk_id_evento'];
		}
		
		if ($true) {
			redirect(base_url('Agenda/DetalheEvento/'.$IdDoEvento));
		} else {
			$msg = $this->session->set_flashdata('Error', 'Ocorreu algum problema ao excluir colaborador deste evento, verifique os dados e tente novamente!');
			redirect(base_url('Agenda/DetalheEvento/'.$IdDoEvento));
		}
	}
}
