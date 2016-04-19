<?php
require_once("../../pages/conexao/conn.php");
ini_set('default_charset', 'UTF-8');
error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);
session_start();
include("../../pages/login/seguranca.php"); // Inclui o arquivo com o sistema de segurança
protegePagina(); // Chama a função que protege a página
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta http-equiv="Content-Type" content="text/html" charset=utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>NPJ | Tela Principal</title>

    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../../https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="../../dist/css/AdminLTE.min.css">
    <link rel="stylesheet" href="../../dist/css/skins/_all-skins.min.css">
    <link rel="stylesheet" href="../../plugins/iCheck/flat/blue.css">
    <link rel="stylesheet" href="../../plugins/morris/morris.css">
    <link rel="stylesheet" href="../../plugins/jvectormap/jquery-jvectormap-1.2.2.css">
    <link rel="stylesheet" href="../../plugins/datepicker/datepicker3.css">
    <link rel="stylesheet" href="../../plugins/daterangepicker/daterangepicker-bs3.css">
    <link rel="stylesheet" href="../../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
    <link rel="stylesheet" href="../../plugins/daterangepicker/daterangepicker-bs3.css">
    <link rel="stylesheet" href="../../plugins/iCheck/all.css">
    <link rel="stylesheet" href="../../plugins/colorpicker/bootstrap-colorpicker.min.css">
    <link rel="stylesheet" href="../../plugins/timepicker/bootstrap-timepicker.min.css">
    <link rel="stylesheet" href="../../plugins/select2/select2.min.css">
    <link rel="stylesheet" href="../../dist/css/form_Style.css">
    <link rel="stylesheet" href="../../dist/css/AdminLTE.min.css">
    <link rel="stylesheet" href="../../dist/css/skins/_all-skins.min.css">

    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
    <script type="text/javascript" src="../../script.js"></script>
    <script type="text/javascript" language="javascript" src="../../plugins/jQuery/jquery-1.3.2.js"></script>
</head>


<body class="hold-transition skin-blue sidebar-mini">

<div class="wrapper">

    <header class="main-header">
        <!-- Logo -->
        <a href="index.php" class="logo">
            <span class="logo-mini"><b>NPJ</b></span>
            <span class="logo-lg"><b>NPJ</b> | FCAT</span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                <span class="sr-only">Toggle navigation</span>
            </a>

            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">

                    <!-- NOTIFICAÇÃO DE NOVO VINCULO -->
                    <li class="dropdown notifications-menu">
                        <?php
                        $idUsuario = $_SESSION['usuarioID'];
                        $sql = mysql_query("SELECT * FROM atendimento_defensoria WHERE Usuario_idUsuario = $idUsuario");
                        $total = mysql_num_rows($sql);
                        ?>
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-bell-o"></i>
                            <span class="label label-danger"><?php echo $total ?> </span>
                        </a>

                        <ul class="dropdown-menu">
                            <li class="header"><?php echo "Voce tem " . $total . " Notificações" ?></li>
                            <li>
                                <!-- inner menu: contains the actual data -->
                                <ul class="menu">

                                    <?php
                                    while ($result = mysql_fetch_array($sql)) {
                                        ?>
                                        <li>
                                            <a href="#">
                                                <i class="fa fa-users text-aqua"></i> <?php echo $result['descricaoAtendimentoDefensoria']; ?>
                                            </a>
                                        </li>
                                        <?php
                                    }
                                    ?>
                                </ul>
                            </li>
                            <li class="footer"><a href="#">Ver Todas</a></li>
                        </ul>
                    </li>
                    <!-- FIM - NOTIFICAÇÃO -->

                    <!-- User Account: style can be found in dropdown.less -->
                    <li class="dropdown user user-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <img src="<?php
                            echo "../../" . $_SESSION['imagem']
                            ?>" class="user-image" alt="User Image">
                            <span class="hidden-xs">
                                <?php
                                echo "Bem-Vindo, " . $_SESSION['usuarioNome'];
                                ?>

                            </span>
                        </a>
                        <ul class="dropdown-menu">
                            <!-- User image -->
                            <li class="user-header">
                                <img src="
                                <?php
                                echo "../../" . $_SESSION['imagem']
                                ?>
                                " class="img-circle" alt="User Image">
                                <p>
                                    <?php
                                    echo "Bem-Vindo, " . $_SESSION['usuarioNome'];
                                    ?>
                                    <small><!-- EMAIL -->
                                        <?php
                                        echo "" . $_SESSION['email'];
                                        ?>
                                    </small>
                                    <small><!-- PERMISSAO -->
                                        <?php
                                        echo "" . $_SESSION['permissaoUser'];
                                        ?>
                                    </small>
                                </p>
                            </li>

                            <li class="user-footer">
                                <div class="pull-left">
                                    <a href="pages/login/lockscreen.php" class="btn btn-default btn-flat">Bloquear</a>
                                </div>

                                <div class="pull-right">
                                    <a href="pages/login/logout.php" class="btn btn-default btn-flat">Sair</a>
                                </div>
                            </li>
                        </ul>
                    </li>
                    <!-- Control Sidebar Toggle Button -->
                    <li>
                        <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    <!-- Left side column. contains the logo and sidebar -->


    <!--####################### MENU PRINCIPAL - BARRA LATERAL ESQUERDA ############################-->
    <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
            <!-- Sidebar user panel -->
            <div class="user-panel">
                <div class="pull-left image">
                    <!-- IMAGEM DO USUÁRIO, CAMINHO PEGO DO BD  -->
                    <img src="
								<?php
                    echo "../../" . $_SESSION['imagem']
                    ?>
                                " class="img-circle" alt="User Image">
                </div>
                <div class="pull-left info">
                    <!-- NOME DO USUARIO -->
                    <p>
                        <?php
                        echo "" . $_SESSION['usuarioNome'];
                        ?>
                    </p>
                    <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                </div>
            </div>


            <!-- search form -->
            <form action="#" method="get" class="sidebar-form">
                <div class="input-group">
                    <input type="text" name="q" class="form-control" placeholder="Pesquisar...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
                </div>
            </form>
            <!-- /.search form -->


            <!-- sidebar menu: : style can be found in sidebar.less -->
            <ul class="sidebar-menu">
                <li class="header"><h4>MENU PRINCIPAL</h4></li>
                <!-- MENU PARA PROFESSOR -->
                <li class="header">Professor</li>

                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-dashboard"></i> <span>Correção</span> <i
                            class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="#"><i class="fa fa-circle-o"></i>Aprovação/Reprovação</a></li>

                    </ul>
                </li>

                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-dashboard"></i> <span>Cadastro</span> <i
                            class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="pages/cadastro/usuario/novo_usuario.php"><i class="fa fa-circle-o"></i>Novo Usuário</a>
                        </li>
                        <li><a href="pages/cadastro/assunto/novo_assunto.php"><i class="fa fa-circle-o"></i>Novo
                                Assunto/Ação</a></li>
                    </ul>

                </li>

                <!-- MENU PARA ALUNO -->
                <li class="header">Aluno</li>


                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-dashboard"></i> <span> Coleta de Dados </span> <i
                            class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="pages/coleta_dados/NPJ/AtendimentoNPJ.php"><i class="fa fa-circle-o"></i> NPJ </a>
                        </li>
                        <li><a href="pages/coleta_dados/defensoria_publica/atendimento_defensoria_publica.php"><i
                                    class="fa fa-circle-o"></i> DEFENSORIA PÚBLICA </a></li>


                    </ul>
                </li>

                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-dashboard"></i> <span> Acompanhamento </span> <i
                            class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="pages/coleta_dados/NPJ/AtendimentoNPJ.php"><i class="fa fa-circle-o"></i> Mediação
                            </a></li>

                    </ul>
                </li>


                <li class="header">Secretaria</li>


                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-share"></i> <span>Teste</span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="#"><i class="fa fa-circle-o"></i> Level One</a></li>
                        <li>
                            <a href="#"><i class="fa fa-circle-o"></i> Level One <i
                                    class="fa fa-angle-left pull-right"></i></a>
                            <ul class="treeview-menu">
                                <li><a href="#"><i class="fa fa-circle-o"></i> Level Two</a></li>
                                <li>
                                    <a href="#"><i class="fa fa-circle-o"></i> Level Two <i
                                            class="fa fa-angle-left pull-right"></i></a>
                                    <ul class="treeview-menu">
                                        <li><a href="#"><i class="fa fa-circle-o"></i> Level Three</a></li>
                                        <li><a href="#"><i class="fa fa-circle-o"></i> Level Three</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li><a href="#"><i class="fa fa-circle-o"></i> Level One</a></li>
                    </ul>
                </li>


            </ul>
        </section>
        <!-- /.sidebar -->
    </aside>


    <!--####################### FIM -  MENU PRINCIPAL - BARRA LATERAL ESQUERDA ############################-->
    <!-- ####################### INICIO DO MENU - PARTE DO MEIO ####################### -->
    <div class="content-wrapper">

        <section class="content-header">
            <h1>
                NPJ | System
                <small>Desenvolvedores</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <!-- PERFIL DA TELA INICIAL -->
            <!-- Main content -->
            <section class="content">

                <div class="row">

                    <!-- THIAGO -->
                    <?php
                    $sql = "SELECT * FROM usuario WHERE idUsuario = 1 ";
                    $stmt = mysql_query($sql);
                    while ($resultado = mysql_fetch_array($stmt)) { ?>
                    <div class="col-md-3">

                        <div class="box box-primary">
                            <div class="box-body box-profile">

                                <img class="profile-user-img img-responsive img-circle"
                                     src="<?php echo "../../".$resultado['foto']; ?> " alt="User profile picture">

                                <h3 class="profile-username text-center"><?php echo $resultado['nome'] ?></h3>

                                <p class="text-muted text-center"><?php echo $resultado['permissao'] ?></p>

                                <div class="box-header with-border">
                                    <h3 class="box-title">Sobre</h3>
                                </div>
                                <div class="box-body">
                                    <!-- EDUCAÇÃO -->

                                    <strong><i class="fa fa-comment margin-r-5"></i>Contato</strong><br/><br/>

                                    <p class="text-muted"><?php echo $resultado['email'] ?></p>
                                    <p class="text-muted"><?php echo $resultado['telefone'] ?></p>

                                    <br/>

                                    <strong><i class="fa fa-book margin-r-5"></i>Educação</strong><br/><br/>
                                    <?php
                                    $sql = "SELECT * FROM educacao_usuario WHERE idUsuario_educacao = 1 ";
                                    $stmt = mysql_query($sql);
                                    while ($resultado1 = mysql_fetch_array($stmt)) {
                                        ?>
                                        <p class="text-muted">
                                        <span
                                            class="list-group-item-text"><b>Instituição:   </b><?php echo $resultado1['instituicao']; ?> </span><br/>
                                        <span
                                            class="list-group-item-text"><b>Curso:  </b><?php echo $resultado1['curso']; ?> </span><br/>
                                        </p>
                                        <hr>
                                        <?php
                                    }
                                    ?>

                                    <strong><i class="fa fa-map-marker margin-r-5"></i>Localização</strong><br/><br/>

                                    <p class="text-muted"><?php echo $resultado['Cidade'] . ", " .$resultado['Estado']; ?></p>

                                    <hr>

                                    <!-- HABILIDADES -->
                                    <strong><i class="fa fa-pencil margin-r-5"></i>Habilidades</strong><br/><br/>


                                    <?php
                                    $sql = "SELECT * FROM habilidades_usuario WHERE idUsuario_Habilidade = 1 ";
                                    $stmt = mysql_query($sql);
                                    $somador <= 1;
                                    while ($resultado2 = mysql_fetch_array($stmt)) {
                                        $somador <= $somador + 1;
                                        ?>

                                        <span id="habilidade"
                                              class="label label-success"><?php echo "" . $resultado2['habilidade'] ?></span>
                                        <!-- ESSE SCRIPT TEM QUE FICAR DEPOIS DO SPAN PQ ELE MUDA O NOME DA CLASS -->
                                        <script type="text/javascript">
                                            var status1 = "<?php echo $resultado2['qualidade']; ?>";
                                            var somador = "<?php echo $somador; ?>";

                                            if (status1 == "Excelente") {
                                                document.getElementById("habilidade").setAttribute("class", "label label-success");
                                                document.getElementById("habilidade").setAttribute("id", "class" + somador);
                                            } else if (status1 == "Bom") {
                                                document.getElementById("habilidade").setAttribute("class", "label label-primary");
                                                document.getElementById("habilidade").setAttribute("id", "class1" + somador);
                                            } else if (status1 == "Médio") {
                                                document.getElementById("habilidade").setAttribute("class", "label label-warning");
                                                document.getElementById("habilidade").setAttribute("id", "class4" + somador);
                                            } else if (status1 == "Ruim") {
                                                document.getElementById("habilidade").setAttribute("class", "label label-danger");
                                                document.getElementById("habilidade").setAttribute("id", "class3" + somador);
                                            }
                                        </script>
                                    <?php } ?>
                                    <br/><br/>
                                <span class="required_notification"> Legenda:
                                    <span class="label label-success">Excelente</span>
                                    <span class="label label-primary">Bom</span>
                                    <span class="label label-warning">Médio</span>
                                    <span class="label label-danger">Ruim</span>
                                </span>
                                    <hr>

                                    <!-- NOTAS -->

                                    <strong><i class="fa fa-file-text-o margin-r-5"></i> Notas</strong><br/><br/>

                                    <p class="text-muted"> <?php echo "" . $resultado['Nota']; } ?> </p>

                                </div>
                            </div>
                        </div>
                    </div>


                    <!-- BAIANO -->
                    <?php
                    $sql = "SELECT * FROM usuario WHERE idUsuario = 10 ";
                    $stmt = mysql_query($sql);
                    while ($resultado = mysql_fetch_array($stmt)) { ?>
                    <div class="col-md-3">

                        <div class="box box-primary">
                            <div class="box-body box-profile">

                                <img class="profile-user-img img-responsive img-circle"
                                     src="<?php echo "../../".$resultado['foto']; ?> " alt="User profile picture">

                                <h3 class="profile-username text-center"><?php echo $resultado['nome'] ?></h3>

                                <p class="text-muted text-center"><?php echo $resultado['permissao'] ?></p>

                                <div class="box-header with-border">
                                    <h3 class="box-title">Sobre</h3>
                                </div>
                                <div class="box-body">

                                    <strong><i class="fa fa-comment margin-r-5"></i>Contato</strong><br/><br/>

                                    <p class="text-muted"><?php echo $resultado['email'] ?></p>
                                    <p class="text-muted"><?php echo $resultado['telefone'] ?></p>

                                    <br/>
                                    <!-- EDUCAÇÃO -->
                                    <strong><i class="fa fa-book margin-r-5"></i>Educação</strong><br/><br/>
                                    <?php
                                    $sql = "SELECT * FROM educacao_usuario WHERE idUsuario_educacao = 2 ";
                                    $stmt = mysql_query($sql);
                                    while ($resultado1 = mysql_fetch_array($stmt)) {
                                        ?>
                                        <p class="text-muted">
                                        <span
                                            class="list-group-item-text"><b>Instituição:   </b><?php echo $resultado1['instituicao']; ?> </span><br/>
                                        <span
                                            class="list-group-item-text"><b>Curso:  </b><?php echo $resultado1['curso']; ?> </span><br/>
                                        </p>
                                        <hr>
                                        <?php
                                    }
                                    ?>

                                    <strong><i class="fa fa-map-marker margin-r-5"></i>Localização</strong><br/><br/>

                                    <p class="text-muted"><?php echo $resultado['Cidade'] . ", " .$resultado['Estado']; ?></p>

                                    <hr>

                                    <!-- HABILIDADES -->
                                    <strong><i class="fa fa-pencil margin-r-5"></i>Habilidades</strong><br/><br/>


                                    <?php
                                    $sql = "SELECT * FROM habilidades_usuario WHERE idUsuario_Habilidade = 2 ";
                                    $stmt = mysql_query($sql);
                                    $somador <= 1;
                                    while ($resultado2 = mysql_fetch_array($stmt)) {
                                        $somador <= $somador + 1;
                                        ?>

                                        <span id="habilidade"
                                              class="label label-success"><?php echo "" . $resultado2['habilidade'] ?></span>
                                        <!-- ESSE SCRIPT TEM QUE FICAR DEPOIS DO SPAN PQ ELE MUDA O NOME DA CLASS -->
                                        <script type="text/javascript">
                                            var status1 = "<?php echo $resultado2['qualidade']; ?>";
                                            var somador = "<?php echo $somador; ?>";

                                            if (status1 == "Excelente") {
                                                document.getElementById("habilidade").setAttribute("class", "label label-success");
                                                document.getElementById("habilidade").setAttribute("id", "class" + somador);
                                            } else if (status1 == "Bom") {
                                                document.getElementById("habilidade").setAttribute("class", "label label-primary");
                                                document.getElementById("habilidade").setAttribute("id", "class1" + somador);
                                            } else if (status1 == "Médio") {
                                                document.getElementById("habilidade").setAttribute("class", "label label-warning");
                                                document.getElementById("habilidade").setAttribute("id", "class4" + somador);
                                            } else if (status1 == "Ruim") {
                                                document.getElementById("habilidade").setAttribute("class", "label label-danger");
                                                document.getElementById("habilidade").setAttribute("id", "class3" + somador);
                                            }
                                        </script>
                                    <?php } ?>
                                    <br/><br/>
                                <span class="required_notification"> Legenda:
                                    <span class="label label-success">Excelente</span>
                                    <span class="label label-primary">Bom</span>
                                    <span class="label label-warning">Médio</span>
                                    <span class="label label-danger">Ruim</span>
                                </span>
                                    <hr>

                                    <!-- NOTAS -->

                                    <strong><i class="fa fa-file-text-o margin-r-5"></i> Notas</strong><br/><br/>

                                    <p class="text-muted"> <?php echo "" . $resultado['Nota']; } ?> </p>

                                </div>
                            </div>
                        </div>
                    </div>


                    <!-- Maxelen -->
                    <?php
                    $sql = "SELECT * FROM usuario WHERE idUsuario = 11 ";
                    $stmt = mysql_query($sql);
                    while ($resultado = mysql_fetch_array($stmt)) { ?>
                    <div class="col-md-3">

                        <div class="box box-primary">
                            <div class="box-body box-profile">

                                <img class="profile-user-img img-responsive img-circle"
                                     src="<?php echo "../../".$resultado['foto']; ?> " alt="User profile picture">

                                <h3 class="profile-username text-center"><?php echo $resultado['nome'] ?></h3>

                                <p class="text-muted text-center"><?php echo $resultado['permissao'] ?></p>

                                <div class="box-header with-border">
                                    <h3 class="box-title">Sobre</h3>
                                </div>
                                <div class="box-body">

                                    <strong><i class="fa fa-comment margin-r-5"></i>Contato</strong><br/><br/>

                                    <p class="text-muted"><?php echo $resultado['email'] ?></p>
                                    <p class="text-muted"><?php echo $resultado['telefone'] ?></p>

                                    <br/>
                                    <!-- EDUCAÇÃO -->
                                    <strong><i class="fa fa-book margin-r-5"></i>Educação</strong><br/><br/>
                                    <?php
                                    $sql = "SELECT * FROM educacao_usuario WHERE idUsuario_educacao = 2 ";
                                    $stmt = mysql_query($sql);
                                    while ($resultado1 = mysql_fetch_array($stmt)) {
                                        ?>
                                        <p class="text-muted">
                                        <span
                                            class="list-group-item-text"><b>Instituição:   </b><?php echo $resultado1['instituicao']; ?> </span><br/>
                                        <span
                                            class="list-group-item-text"><b>Curso:  </b><?php echo $resultado1['curso']; ?> </span><br/>
                                        </p>
                                        <hr>
                                        <?php
                                    }
                                    ?>

                                    <strong><i class="fa fa-map-marker margin-r-5"></i>Localização</strong><br/><br/>

                                    <p class="text-muted"><?php echo $resultado['Cidade'] . ", " .$resultado['Estado']; ?></p>

                                    <hr>

                                    <!-- HABILIDADES -->
                                    <strong><i class="fa fa-pencil margin-r-5"></i>Habilidades</strong><br/><br/>


                                    <?php
                                    $sql = "SELECT * FROM habilidades_usuario WHERE idUsuario_Habilidade = 2 ";
                                    $stmt = mysql_query($sql);
                                    $somador <= 1;
                                    while ($resultado2 = mysql_fetch_array($stmt)) {
                                        $somador <= $somador + 1;
                                        ?>

                                        <span id="habilidade"
                                              class="label label-success"><?php echo "" . $resultado2['habilidade'] ?></span>
                                        <!-- ESSE SCRIPT TEM QUE FICAR DEPOIS DO SPAN PQ ELE MUDA O NOME DA CLASS -->
                                        <script type="text/javascript">
                                            var status1 = "<?php echo $resultado2['qualidade']; ?>";
                                            var somador = "<?php echo $somador; ?>";

                                            if (status1 == "Excelente") {
                                                document.getElementById("habilidade").setAttribute("class", "label label-success");
                                                document.getElementById("habilidade").setAttribute("id", "class" + somador);
                                            } else if (status1 == "Bom") {
                                                document.getElementById("habilidade").setAttribute("class", "label label-primary");
                                                document.getElementById("habilidade").setAttribute("id", "class1" + somador);
                                            } else if (status1 == "Médio") {
                                                document.getElementById("habilidade").setAttribute("class", "label label-warning");
                                                document.getElementById("habilidade").setAttribute("id", "class4" + somador);
                                            } else if (status1 == "Ruim") {
                                                document.getElementById("habilidade").setAttribute("class", "label label-danger");
                                                document.getElementById("habilidade").setAttribute("id", "class3" + somador);
                                            }
                                        </script>
                                    <?php } ?>
                                    <br/><br/>
                                <span class="required_notification"> Legenda:
                                    <span class="label label-success">Excelente</span>
                                    <span class="label label-primary">Bom</span>
                                    <span class="label label-warning">Médio</span>
                                    <span class="label label-danger">Ruim</span>
                                </span>
                                    <hr>

                                    <!-- NOTAS -->

                                    <strong><i class="fa fa-file-text-o margin-r-5"></i> Notas</strong><br/><br/>

                                    <p class="text-muted"> <?php echo "" . $resultado['Nota']; } ?> </p>

                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Suy -->
                    <?php
                    $sql = "SELECT * FROM usuario WHERE idUsuario = 9 ";
                    $stmt = mysql_query($sql);
                    while ($resultado = mysql_fetch_array($stmt)) { ?>
                    <div class="col-md-3">

                        <div class="box box-primary">
                            <div class="box-body box-profile">

                                <img class="profile-user-img img-responsive img-circle"
                                     src="<?php echo "../../".$resultado['foto']; ?> " alt="User profile picture">

                                <h3 class="profile-username text-center"><?php echo $resultado['nome'] ?></h3>

                                <p class="text-muted text-center"><?php echo $resultado['permissao'] ?></p>

                                <div class="box-header with-border">
                                    <h3 class="box-title">Sobre</h3>
                                </div>
                                <div class="box-body">

                                    <strong><i class="fa fa-comment margin-r-5"></i>Contato</strong><br/><br/>

                                    <p class="text-muted"><?php echo $resultado['email'] ?></p>
                                    <p class="text-muted"><?php echo $resultado['telefone'] ?></p>

                                    <br/>
                                    <!-- EDUCAÇÃO -->
                                    <strong><i class="fa fa-book margin-r-5"></i>Educação</strong><br/><br/>
                                    <?php
                                    $sql = "SELECT * FROM educacao_usuario WHERE idUsuario_educacao = 2 ";
                                    $stmt = mysql_query($sql);
                                    while ($resultado1 = mysql_fetch_array($stmt)) {
                                        ?>
                                        <p class="text-muted">
                                        <span
                                            class="list-group-item-text"><b>Instituição:   </b><?php echo $resultado1['instituicao']; ?> </span><br/>
                                        <span
                                            class="list-group-item-text"><b>Curso:  </b><?php echo $resultado1['curso']; ?> </span><br/>
                                        </p>
                                        <hr>
                                        <?php
                                    }
                                    ?>

                                    <strong><i class="fa fa-map-marker margin-r-5"></i>Localização</strong><br/><br/>

                                    <p class="text-muted"><?php echo $resultado['Cidade'] . ", " .$resultado['Estado']; ?></p>

                                    <hr>

                                    <!-- HABILIDADES -->
                                    <strong><i class="fa fa-pencil margin-r-5"></i>Habilidades</strong><br/><br/>


                                    <?php
                                    $sql = "SELECT * FROM habilidades_usuario WHERE idUsuario_Habilidade = 2 ";
                                    $stmt = mysql_query($sql);
                                    $somador <= 1;
                                    while ($resultado2 = mysql_fetch_array($stmt)) {
                                        $somador <= $somador + 1;
                                        ?>

                                        <span id="habilidade"
                                              class="label label-success"><?php echo "" . $resultado2['habilidade'] ?></span>
                                        <!-- ESSE SCRIPT TEM QUE FICAR DEPOIS DO SPAN PQ ELE MUDA O NOME DA CLASS -->
                                        <script type="text/javascript">
                                            var status1 = "<?php echo $resultado2['qualidade']; ?>";
                                            var somador = "<?php echo $somador; ?>";

                                            if (status1 == "Excelente") {
                                                document.getElementById("habilidade").setAttribute("class", "label label-success");
                                                document.getElementById("habilidade").setAttribute("id", "class" + somador);
                                            } else if (status1 == "Bom") {
                                                document.getElementById("habilidade").setAttribute("class", "label label-primary");
                                                document.getElementById("habilidade").setAttribute("id", "class1" + somador);
                                            } else if (status1 == "Médio") {
                                                document.getElementById("habilidade").setAttribute("class", "label label-warning");
                                                document.getElementById("habilidade").setAttribute("id", "class4" + somador);
                                            } else if (status1 == "Ruim") {
                                                document.getElementById("habilidade").setAttribute("class", "label label-danger");
                                                document.getElementById("habilidade").setAttribute("id", "class3" + somador);
                                            }
                                        </script>
                                    <?php } ?>
                                    <br/><br/>
                                <span class="required_notification"> Legenda:
                                    <span class="label label-success">Excelente</span>
                                    <span class="label label-primary">Bom</span>
                                    <span class="label label-warning">Médio</span>
                                    <span class="label label-danger">Ruim</span>
                                </span>
                                    <hr>

                                    <!-- NOTAS -->

                                    <strong><i class="fa fa-file-text-o margin-r-5"></i> Notas</strong><br/><br/>

                                    <p class="text-muted"> <?php echo "" . $resultado['Nota']; } ?> </p>

                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Neto -->
                    <?php
                    $sql = "SELECT * FROM usuario WHERE idUsuario = 12";
                    $stmt = mysql_query($sql);
                    while ($resultado = mysql_fetch_array($stmt)) { ?>
                    <div class="col-md-3">

                        <div class="box box-primary">
                            <div class="box-body box-profile">

                                <img class="profile-user-img img-responsive img-circle"
                                     src="<?php echo "../../".$resultado['foto']; ?> " alt="User profile picture">

                                <h3 class="profile-username text-center"><?php echo $resultado['nome'] ?></h3>

                                <p class="text-muted text-center"><?php echo $resultado['permissao'] ?></p>

                                <div class="box-header with-border">
                                    <h3 class="box-title">Sobre</h3>
                                </div>
                                <div class="box-body">

                                    <strong><i class="fa fa-comment margin-r-5"></i>Contato</strong><br/><br/>

                                    <p class="text-muted"><?php echo $resultado['email'] ?></p>
                                    <p class="text-muted"><?php echo $resultado['telefone'] ?></p>

                                    <br/>
                                    <!-- EDUCAÇÃO -->
                                    <strong><i class="fa fa-book margin-r-5"></i>Educação</strong><br/><br/>
                                    <?php
                                    $sql = "SELECT * FROM educacao_usuario WHERE idUsuario_educacao = 2 ";
                                    $stmt = mysql_query($sql);
                                    while ($resultado1 = mysql_fetch_array($stmt)) {
                                        ?>
                                        <p class="text-muted">
                                        <span
                                            class="list-group-item-text"><b>Instituição:   </b><?php echo $resultado1['instituicao']; ?> </span><br/>
                                        <span
                                            class="list-group-item-text"><b>Curso:  </b><?php echo $resultado1['curso']; ?> </span><br/>
                                        </p>
                                        <hr>
                                        <?php
                                    }
                                    ?>

                                    <strong><i class="fa fa-map-marker margin-r-5"></i>Localização</strong><br/><br/>

                                    <p class="text-muted"><?php echo $resultado['Cidade'] . ", " .$resultado['Estado']; ?></p>

                                    <hr>

                                    <!-- HABILIDADES -->
                                    <strong><i class="fa fa-pencil margin-r-5"></i>Habilidades</strong><br/><br/>


                                    <?php
                                    $sql = "SELECT * FROM habilidades_usuario WHERE idUsuario_Habilidade = 2 ";
                                    $stmt = mysql_query($sql);
                                    $somador <= 1;
                                    while ($resultado2 = mysql_fetch_array($stmt)) {
                                        $somador <= $somador + 1;
                                        ?>

                                        <span id="habilidade"
                                              class="label label-success"><?php echo "" . $resultado2['habilidade'] ?></span>
                                        <!-- ESSE SCRIPT TEM QUE FICAR DEPOIS DO SPAN PQ ELE MUDA O NOME DA CLASS -->
                                        <script type="text/javascript">
                                            var status1 = "<?php echo $resultado2['qualidade']; ?>";
                                            var somador = "<?php echo $somador; ?>";

                                            if (status1 == "Excelente") {
                                                document.getElementById("habilidade").setAttribute("class", "label label-success");
                                                document.getElementById("habilidade").setAttribute("id", "class" + somador);
                                            } else if (status1 == "Bom") {
                                                document.getElementById("habilidade").setAttribute("class", "label label-primary");
                                                document.getElementById("habilidade").setAttribute("id", "class1" + somador);
                                            } else if (status1 == "Médio") {
                                                document.getElementById("habilidade").setAttribute("class", "label label-warning");
                                                document.getElementById("habilidade").setAttribute("id", "class4" + somador);
                                            } else if (status1 == "Ruim") {
                                                document.getElementById("habilidade").setAttribute("class", "label label-danger");
                                                document.getElementById("habilidade").setAttribute("id", "class3" + somador);
                                            }
                                        </script>
                                    <?php } ?>
                                    <br/><br/>
                                <span class="required_notification"> Legenda:
                                    <span class="label label-success">Excelente</span>
                                    <span class="label label-primary">Bom</span>
                                    <span class="label label-warning">Médio</span>
                                    <span class="label label-danger">Ruim</span>
                                </span>
                                    <hr>

                                    <!-- NOTAS -->

                                    <strong><i class="fa fa-file-text-o margin-r-5"></i> Notas</strong><br/><br/>

                                    <p class="text-muted"> <?php echo "" . $resultado['Nota']; } ?> </p>

                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Tais -->
                    <?php
                    $sql = "SELECT * FROM usuario WHERE idUsuario = 13 ";
                    $stmt = mysql_query($sql);
                    while ($resultado = mysql_fetch_array($stmt)) { ?>
                    <div class="col-md-3">

                        <div class="box box-primary">
                            <div class="box-body box-profile">

                                <img class="profile-user-img img-responsive img-circle"
                                     src="<?php echo "../../".$resultado['foto']; ?> " alt="User profile picture">

                                <h3 class="profile-username text-center"><?php echo $resultado['nome'] ?></h3>

                                <p class="text-muted text-center"><?php echo $resultado['permissao'] ?></p>

                                <div class="box-header with-border">
                                    <h3 class="box-title">Sobre</h3>
                                </div>
                                <div class="box-body">

                                    <strong><i class="fa fa-comment margin-r-5"></i>Contato</strong><br/><br/>

                                    <p class="text-muted"><?php echo $resultado['email'] ?></p>
                                    <p class="text-muted"><?php echo $resultado['telefone'] ?></p>

                                    <br/>

                                    <!-- EDUCAÇÃO -->
                                    <strong><i class="fa fa-book margin-r-5"></i>Educação</strong><br/><br/>
                                    <?php
                                    $sql = "SELECT * FROM educacao_usuario WHERE idUsuario_educacao = 2 ";
                                    $stmt = mysql_query($sql);
                                    while ($resultado1 = mysql_fetch_array($stmt)) {
                                        ?>
                                        <p class="text-muted">
                                        <span
                                            class="list-group-item-text"><b>Instituição:   </b><?php echo $resultado1['instituicao']; ?> </span><br/>
                                        <span
                                            class="list-group-item-text"><b>Curso:  </b><?php echo $resultado1['curso']; ?> </span><br/>
                                        </p>
                                        <hr>
                                        <?php
                                    }
                                    ?>

                                    <strong><i class="fa fa-map-marker margin-r-5"></i>Localização</strong><br/><br/>

                                    <p class="text-muted"><?php echo $resultado['Cidade'] . ", " .$resultado['Estado']; ?></p>

                                    <hr>

                                    <!-- HABILIDADES -->
                                    <strong><i class="fa fa-pencil margin-r-5"></i>Habilidades</strong><br/><br/>


                                    <?php
                                    $sql = "SELECT * FROM habilidades_usuario WHERE idUsuario_Habilidade = 2 ";
                                    $stmt = mysql_query($sql);
                                    $somador <= 1;
                                    while ($resultado2 = mysql_fetch_array($stmt)) {
                                        $somador <= $somador + 1;
                                        ?>

                                        <span id="habilidade"
                                              class="label label-success"><?php echo "" . $resultado2['habilidade'] ?></span>
                                        <!-- ESSE SCRIPT TEM QUE FICAR DEPOIS DO SPAN PQ ELE MUDA O NOME DA CLASS -->
                                        <script type="text/javascript">
                                            var status1 = "<?php echo $resultado2['qualidade']; ?>";
                                            var somador = "<?php echo $somador; ?>";

                                            if (status1 == "Excelente") {
                                                document.getElementById("habilidade").setAttribute("class", "label label-success");
                                                document.getElementById("habilidade").setAttribute("id", "class" + somador);
                                            } else if (status1 == "Bom") {
                                                document.getElementById("habilidade").setAttribute("class", "label label-primary");
                                                document.getElementById("habilidade").setAttribute("id", "class1" + somador);
                                            } else if (status1 == "Médio") {
                                                document.getElementById("habilidade").setAttribute("class", "label label-warning");
                                                document.getElementById("habilidade").setAttribute("id", "class4" + somador);
                                            } else if (status1 == "Ruim") {
                                                document.getElementById("habilidade").setAttribute("class", "label label-danger");
                                                document.getElementById("habilidade").setAttribute("id", "class3" + somador);
                                            }
                                        </script>
                                    <?php } ?>
                                    <br/><br/>
                                <span class="required_notification"> Legenda:
                                    <span class="label label-success">Excelente</span>
                                    <span class="label label-primary">Bom</span>
                                    <span class="label label-warning">Médio</span>
                                    <span class="label label-danger">Ruim</span>
                                </span>
                                    <hr>

                                    <!-- NOTAS -->

                                    <strong><i class="fa fa-file-text-o margin-r-5"></i> Notas</strong><br/><br/>

                                    <p class="text-muted"> <?php echo "" . $resultado['Nota']; } ?> </p>

                                </div>
                            </div>
                        </div>
                    </div>



                    <!-- /.col -->

                <!-- /.row -->


            </section>
        </section>
        <!-- /.content -->

        <!-- FIM DO MENU - PARTE DO MEIO  -->
    </div>
    <!-- /.content-wrapper -->

    <footer class="main-footer">
        <div class="pull-right hidden-xs">
            <b>Versão</b> 1.0.0
        </div>
        <strong>Copyright &copy; 2015 -  NPJ </strong>| FCAT - Núcleo de Prática Jurídica | Faculdade de Castanhal - Desenvolvido por <a href="#">TecnoSoft Studio</a> - Todos os direitos reservados.
    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Create the tabs -->
        <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
            <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
            <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
        </ul>
        <!-- Tab panes -->
        <div class="tab-content">
            <!-- Home tab content -->
            <div class="tab-pane" id="control-sidebar-home-tab">
                <h3 class="control-sidebar-heading">Recent Activity</h3>
                <ul class="control-sidebar-menu">
                    <li>
                        <a href="javascript::;">
                            <i class="menu-icon fa fa-birthday-cake bg-red"></i>

                            <div class="menu-info">
                                <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>

                                <p>Will be 23 on April 24th</p>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="javascript::;">
                            <i class="menu-icon fa fa-user bg-yellow"></i>

                            <div class="menu-info">
                                <h4 class="control-sidebar-subheading">Frodo Updated His Profile</h4>

                                <p>New phone +1(800)555-1234</p>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="javascript::;">
                            <i class="menu-icon fa fa-envelope-o bg-light-blue"></i>

                            <div class="menu-info">
                                <h4 class="control-sidebar-subheading">Nora Joined Mailing List</h4>

                                <p>nora@example.com</p>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="javascript::;">
                            <i class="menu-icon fa fa-file-code-o bg-green"></i>

                            <div class="menu-info">
                                <h4 class="control-sidebar-subheading">Cron Job 254 Executed</h4>

                                <p>Execution time 5 seconds</p>
                            </div>
                        </a>
                    </li>
                </ul>
                <!-- /.control-sidebar-menu -->

                <h3 class="control-sidebar-heading">Tasks Progress</h3>
                <ul class="control-sidebar-menu">
                    <li>
                        <a href="javascript::;">
                            <h4 class="control-sidebar-subheading">
                                Custom Template Design
                                <span class="label label-danger pull-right">70%</span>
                            </h4>

                            <div class="progress progress-xxs">
                                <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="javascript::;">
                            <h4 class="control-sidebar-subheading">
                                Update Resume
                                <span class="label label-success pull-right">95%</span>
                            </h4>

                            <div class="progress progress-xxs">
                                <div class="progress-bar progress-bar-success" style="width: 95%"></div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="javascript::;">
                            <h4 class="control-sidebar-subheading">
                                Laravel Integration
                                <span class="label label-warning pull-right">50%</span>
                            </h4>

                            <div class="progress progress-xxs">
                                <div class="progress-bar progress-bar-warning" style="width: 50%"></div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="javascript::;">
                            <h4 class="control-sidebar-subheading">
                                Back End Framework
                                <span class="label label-primary pull-right">68%</span>
                            </h4>

                            <div class="progress progress-xxs">
                                <div class="progress-bar progress-bar-primary" style="width: 68%"></div>
                            </div>
                        </a>
                    </li>
                </ul>
                <!-- /.control-sidebar-menu -->

            </div>
            <!-- /.tab-pane -->
            <!-- Stats tab content -->
            <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
            <!-- /.tab-pane -->
            <!-- Settings tab content -->
            <div class="tab-pane" id="control-sidebar-settings-tab">
                <form method="post">
                    <h3 class="control-sidebar-heading">Configurações Gerais</h3>

                    <div class="form-group">
                        <label class="control-sidebar-subheading">
                            Report panel usage
                            <input type="checkbox" class="pull-right" checked>
                        </label>

                        <p>
                            Some information about this general settings option
                        </p>
                    </div>
                    <!-- /.form-group -->

                    <div class="form-group">
                        <label class="control-sidebar-subheading">
                            Allow mail redirect
                            <input type="checkbox" class="pull-right" checked>
                        </label>

                        <p>
                            Other sets of options are available
                        </p>
                    </div>
                    <!-- /.form-group -->

                    <div class="form-group">
                        <label class="control-sidebar-subheading">
                            Expose author name in posts
                            <input type="checkbox" class="pull-right" checked>
                        </label>

                        <p>
                            Allow the user to show his name in blog posts
                        </p>
                    </div>
                    <!-- /.form-group -->

                    <h3 class="control-sidebar-heading">Chat Settings</h3>

                    <div class="form-group">
                        <label class="control-sidebar-subheading">
                            Show me as online
                            <input type="checkbox" class="pull-right" checked>
                        </label>
                    </div>
                    <!-- /.form-group -->

                    <div class="form-group">
                        <label class="control-sidebar-subheading">
                            Turn off notifications
                            <input type="checkbox" class="pull-right">
                        </label>
                    </div>
                    <!-- /.form-group -->

                    <div class="form-group">
                        <label class="control-sidebar-subheading">
                            Delete chat history
                            <a href="javascript::;" class="text-red pull-right"><i class="fa fa-trash-o"></i></a>
                        </label>
                    </div>
                    <!-- /.form-group -->
                </form>
            </div>
            <!-- /.tab-pane -->
        </div>
    </aside>
    <!-- /.control-sidebar -->
    <!-- Add the sidebar's background. This div must be placed
         immediately after the control sidebar -->
    <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 2.1.4 -->
<script src="../../plugins/jQuery/jQuery-2.1.4.min.js"></script>



<!-- jQuery UI 1.11.4 -->
<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.5 -->
<script src="../../bootstrap/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="../../plugins/morris/morris.min.js"></script>
<!-- Sparkline -->
<script src="../../plugins/sparkline/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="../../plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="../../plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="../../plugins/knob/jquery.knob.js"></script>
<!-- daterangepicker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>
<script src="../../plugins/daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="../../plugins/datepicker/bootstrap-datepicker.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="../../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="../../plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="../../plugins/fastclick/fastclick.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/app.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="../../dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>
<script language='JavaScript'>
    imagenes = new Array(2)
    imagenes[0] = "<a href='#' title='Clique para subir'><img border='0' src='imagens/up-arrow.png' style='position:fixed; bottom:0; right:0;'/></a>"
    imagenes[1] = "<a href='#' title='Clique para subir'><img border='0' src='imagens/up-arrow.png' style='position:fixed; bottom:0; right:0;'/></a>"
    aleatorio = Math.random() * (imagenes.length)
    aleatorio = Math.floor(aleatorio)
    document.write(imagenes[aleatorio])
</script>

</body>
</html>