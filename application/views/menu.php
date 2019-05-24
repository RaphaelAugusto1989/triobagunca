<div class="d-flex">
    <nav class="sidebar bg-dark">
        <div class="media">
            <img class='rounded mx-auto d-block mt-2' width='55%' src='<?= base_url("assets/img/logo-trio.png");?>'></a>
        </div>
        <ul class="list-unstyled">
            <!--<li>
                <a href="#submenu1" data-toggle="collapse"><i class="fa fa-fw fa-address-card"></i> CLIENTES</a>
                <ul id="submenu1" class="list-unstyled collapse">
                    <li><a href="<?php echo base_url('ClienteCadastro');?>">Novo Cliente</a></li>
                    <li><a href="<?php echo base_url('ClientesCadastrados');?>">Clientes Cadastrados</a></li>
                    <li><a href="<?php echo base_url('EmDesenvolvimento');?>">Relatórios</a></li>
                </ul>
            </li>-->
            <?php 
                foreach ($permissao as $indice => $perm) {
                
                #echo '<pre>';
                #print_r($permissao); exit();         
                if (!empty($perm->permission1)) {
            ?>
            <li>
                <a href="#submenu2" data-toggle="collapse"><i class="far fa-calendar-alt"></i> EVENTOS</a>
                <ul id="submenu2" class="list-unstyled collapse">
                    <li><a href="<?php echo base_url('AgendamentoNovo');?>">Pré Agendamento</a></li>
                    <li><a href="<?php echo base_url('Agendamentos');?>">Agendados</a></li>
                    <li><a href="<?php echo base_url('EmDesenvolvimento');?>">Relatórios</a></li>
                </ul>
            </li>
            <?php 
                } else { }
                if (!empty($perm->permission2)) {
            ?>
            <li>
                <a href="#submenu3" data-toggle="collapse"><i class="fas fa-archive"></i> PACOTES</a>
                <ul id="submenu3" class="list-unstyled collapse">
                    <li><a href="<?php echo base_url('PacoteCadastro');?>">Novo Pacote</a></li>
                    <li><a href="<?php echo base_url('PacotesCadastrados');?>">Pacotes Cadastrados</a></li>
                </ul>
            </li>
            <?php 
                } else { }
                if (!empty($perm->permission3)) {
            ?>
            <li>
                <a href="#submenu4" data-toggle="collapse"><i class="fas fa-users"></i> COLABORADORES</a>
                <ul id="submenu4" class="list-unstyled collapse">
                    <li><a href="<?php echo base_url('ColaboradorCadastro');?>">Novo Colaborador</a></li>
                    <li><a href="<?php echo base_url('ColaboradoresCadastrados');?>">Colaborador Cadastrados</a></li>
                    <li><a href="<?php echo base_url('ColaboradoresIndisponiveis');?>">Indisponibilidades dos Colaboradores</a></li>
                </ul>
            </li>
            <?php 
                } else { }
                if (!empty($perm->permission4)) {
            ?>
            <!--<li>
                <a href="#submenu5" data-toggle="collapse"><i class="fas fa-dollar-sign"></i> FINANCEIRO</a>
                <ul id="submenu5" class="list-unstyled collapse">
                    <li><a href="<?php echo base_url('EmDesenvolvimento');?>">Novo Cliente</a></li>
                    <li><a href="<?php echo base_url('EmDesenvolvimento');?>">Clientes Cadastrados</a></li>
                    <li><a href="<?php echo base_url('EmDesenvolvimento');?>">Relatórios</a></li>
                </ul>
            </li>
            <?php 
                } else { }
                if (!empty($perm->permission5)) {
            ?>
            <li>
                <a href="#submenu6" data-toggle="collapse"><i class="fa fa-fw fa-link"></i> Site</a>
                <ul id="submenu6" class="list-unstyled collapse">
                    <li><a href="<?php echo base_url('EmDesenvolvimento');?>">Banner</a></li>
                    <li><a href="<?php echo base_url('EmDesenvolvimento');?>">Serviços</a></li>
                    <li><a href="<?php echo base_url('EmDesenvolvimento');?>">Parceiros</a></li>
                    <li><a href="<?php echo base_url('EmDesenvolvimento');?>">Galeria</a></li>
                    <li><a href="<?php echo base_url('EmDesenvolvimento');?>">Recados</a></li>
                </ul>
            </li>
            <?php 
                } else { }
                if (!empty($perm->permission6)) {
            ?>
            <li>
                <a href="#submenu7" data-toggle="collapse"><i class="fas fa-user"></i> RELATÓRIOS</a>
                <ul id="submenu7" class="list-unstyled collapse">
                    <li><a href="<?php echo base_url('ColaboradorIndisponibilidade');?>">Indisponibilidade</a></li>
                    <li><a href="<?php echo base_url('MeusEventos');?>">Meus Eventos</a></li>
                    <li><a class="dropdown-item" href="<?php echo base_url('MeusDados');?>">Meus Dados</a></li>
                </ul>
            </li>-->
            <?php 
                } else { }
                if (!empty($perm->permission8)) {
            ?>
            <li>
                <a href="#submenu8" data-toggle="collapse"><i class="fas fa-cog"></i> SISTEMA</a>
                <ul id="submenu8" class="list-unstyled collapse">
                    <li><a href="<?php echo base_url('ColaboradorPermissaoSistema');?>">Permissões de Usuário</a></li>
                    <li><a href="<?php echo base_url('AcessosAoSistema');?>">Acessos no Sistema</a></li>
                    <li><a href="<?php echo base_url('AlteracoeSistemas');?>">Alterações no Sistema </a></li>
                </ul>
            </li>
            <?php 
                } else { }
            } //FIM FOREACH
            ?>
            <li>
                <a href="#submenu7" data-toggle="collapse"><i class="fas fa-user"></i> MINHA ÁREA</a>
                <ul id="submenu7" class="list-unstyled collapse">
                    <li><a href="<?php echo base_url('ColaboradorIndisponibilidade');?>">Indisponibilidade</a></li>
                    <li><a href="<?php echo base_url('MeusEventos');?>">Meus Eventos</a></li>
                    <li><a class="dropdown-item" href="<?php echo base_url('MeusDados');?>">Meus Dados</a></li>
                </ul>
            </li>
        </ul>
    </nav>
