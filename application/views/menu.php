<div class="d-flex">
    <nav class="sidebar bg-dark">
        <ul class="list-unstyled">
            <li>
                <a href="#submenu1" data-toggle="collapse"><i class="fa fa-fw fa-address-card"></i> CLIENTES</a>
                <ul id="submenu1" class="list-unstyled collapse">
                    <li><a href="<?php echo base_url('ClienteCadastro');?>">Novo Cliente</a></li>
                    <li><a href="<?php echo base_url('ClientesCadastrados');?>">Clientes Cadastrados</a></li>
                    <li><a href="<?php echo base_url('EmDesenvolvimento');?>">Relatórios</a></li>
                </ul>
            </li>
            <li>
                <a href="#submenu2" data-toggle="collapse"><i class="far fa-calendar-alt"></i> AGENDAMENTOS</a>
                <ul id="submenu2" class="list-unstyled collapse">
                    <li><a href="<?php echo base_url('AgendamentoNovo');?>">Novo Agendamento</a></li>
                    <li><a href="<?php echo base_url('Agendamentos');?>">Agendamentos</a></li>
                    <li><a href="<?php echo base_url('EmDesenvolvimento');?>">Relatórios</a></li>
                </ul>
            </li>
            <li>
                <a href="#submenu3" data-toggle="collapse"><i class="fas fa-archive"></i> PACOTES</a>
                <ul id="submenu3" class="list-unstyled collapse">
                    <li><a href="<?php echo base_url('PacoteCadastro');?>">Novo Pacote</a></li>
                    <li><a href="<?php echo base_url('PacotesCadastrados');?>">Pacotes Cadastrados</a></li>
                </ul>
            </li>
            <li>
                <a href="#submenu4" data-toggle="collapse"><i class="fas fa-users"></i> COLABORADORES</a>
                <ul id="submenu4" class="list-unstyled collapse">
                    <li><a href="<?php echo base_url('ColaboradorCadastro');?>">Novo Colaborador</a></li>
                    <li><a href="<?php echo base_url('ColaboradoresCadastrados');?>">Colaborador Cadastrados</a></li>
                    <li><a href="<?php echo base_url('EmDesenvolvimento');?>">Relatórios</a></li>
                </ul>
            </li>
            <!--<li>
                <a href="#submenu5" data-toggle="collapse"><i class="fas fa-dollar-sign"></i> FINANCEIRO</a>
                <ul id="submenu5" class="list-unstyled collapse">
                    <li><a href="<?php echo base_url('EmDesenvolvimento');?>">Novo Cliente</a></li>
                    <li><a href="<?php echo base_url('EmDesenvolvimento');?>">Clientes Cadastrados</a></li>
                    <li><a href="<?php echo base_url('EmDesenvolvimento');?>">Relatórios</a></li>
                </ul>
            </li>
            <li>
                <a href="#submenu6" data-toggle="collapse"><i class="fa fa-fw fa-link"></i> Site</a>
                <ul id="submenu6" class="list-unstyled collapse">
                    <li><a href="<?php echo base_url('EmDesenvolvimento');?>">Banner</a></li>
                    <li><a href="<?php echo base_url('EmDesenvolvimento');?>">Serviços</a></li>
                    <li><a href="<?php echo base_url('EmDesenvolvimento');?>">Parceiros</a></li>
                    <li><a href="<?php echo base_url('EmDesenvolvimento');?>">Galeria</a></li>
                    <li><a href="<?php echo base_url('EmDesenvolvimento');?>">Recados</a></li>
                </ul>
            </li>-->
            <li>
                <a href="#submenu7" data-toggle="collapse"><i class="fas fa-cog"></i> SISTEMA</a>
                <ul id="submenu7" class="list-unstyled collapse">
                    <li><a href="<?php echo base_url('UsuarioNovo');?>">Novo Usuário</a></li>
                    <li><a href="<?php echo base_url('UsuariosCadastrados');?>">Usuário Cadastrados</a></li>
                    <li><a href="<?php echo base_url('UsuarioPermissao');?>">Permissões de Usuário</a></li>
                </ul>
            </li>
        </ul>
    </nav>
