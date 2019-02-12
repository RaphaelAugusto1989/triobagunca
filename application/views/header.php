<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!doctype html>
<html lang="pt-br">
<head>
    <title><?= $titulo; ?></title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.css');?>">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/bsadmin.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/jquery-ui.css'); ?>">
</head>
<body>
<nav class="navbar navbar-expand navbar-dark bg-primary">
    <a class="sidebar-toggle text-light mr-3"><i class="fa fa-bars"></i></a>
    <a class="navbar-brand" href="#"><i class="fab fa-themeisle"></i> <img class='rounded float-left' width='65%' src='<?= base_url("assets/img/logo_sistema.png");?>'></a>
    <div class="navbar-collapse collapse">
            <ul class="navbar-nav ml-auto">
                <div class="float-right">
                    <?php
                        $sexouser = $this->session->userdata('sexouser');
                        $foto = $this->session->userdata('foto');

                        if (!empty($foto)) {
                            echo "<img class='float-right rounded-circle' width='40px' src='".base_url("assets/img/fotos_usuarios/$foto")."'>";
                        } elseif ($sexouser == "MASCULINO") {
                            echo "<img class='float-right rounded-circle' width='7%' src='".base_url("assets/img/avatar_man.png")."'>";
                        } else {
                           echo "<img class='float-right rounded-circle' width='7%' src='".base_url("assets/img/avatar_woman.png")."'>";
                        }
                    ?>
                </div>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown">
                        <?php
                            echo $this->session->userdata('nome');
                        ?>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="<?php echo base_url('MeusDados');?>"
t><i class="fas fa-users-cog"></i> Meus Dados</a>
                        <a class="dropdown-item" href="<?php echo base_url('LoginSystem/Logout');?>"
t><i class="fas fa-sign-out-alt"></i> Sair</a>
                    </div>
                </li>
            </ul>
    </div>
</nav>