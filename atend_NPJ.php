<?php
ini_set('default_charset', 'UTF-8');
error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);
session_start();
include("pages/login/seguranca.php"); // Inclui o arquivo com o sistema de seguranï¿½a
protegePagina(); // Chama a funï¿½ï¿½o que protege a pï¿½gina
include("pages/config/conn_pdo.php");
$conn=Conectar();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="Content-Type: text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>NPJ | Atendimento NPJ - Coleta</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="dist/icons/css/ionicons.min.css">
    <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
    <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
    <link rel="stylesheet" href="dist/css/radio_style.css">
    <link rel="stylesheet" href="plugins/iCheck/flat/blue.css">
    <link rel="stylesheet" href="plugins/morris/morris.css">
    <link rel="stylesheet" href="plugins/jvectormap/jquery-jvectormap-1.2.2.css">
    <link rel="stylesheet" href="plugins/datepicker/datepicker3.css">
    <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker-bs3.css">
    <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
    <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker-bs3.css">
    <link rel="stylesheet" href="plugins/iCheck/all.css">
    <link rel="stylesheet" href="plugins/colorpicker/bootstrap-colorpicker.min.css">
    <link rel="stylesheet" href="plugins/timepicker/bootstrap-timepicker.min.css">
    <link rel="stylesheet" href="plugins/select2/select2.min.css">
    <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
    <link rel="stylesheet" href="dist/css/form_Style.css">
    <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
    <link rel="stylesheet" type="text/css" href="dist/css/component.css"/>
    <script type="text/javascript" src="dist/js/jquery.maskMoney.js" ></script>

    <script type="text/javascript">
        $(document).ready(function(){
            $("input#dinheiro").maskMoney({showSymbol:true, symbol:"R$", decimal:",", thousands:"."});
        });
    </script>


    <script type="text/javascript" src="js/jquery-1.5.1.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            var i = 2;
            $("input[name='add_assistido']").click(function( e ){
                document.getElementById("loading_assistido").setAttribute("class", "overlay");
                document.getElementById("loading_assistido").innerHTML="<i class='fa fa-refresh fa-spin'></i>";
                setTimeout(function() {
                    document.getElementById("loading_assistido").setAttribute("class", "");
                    document.getElementById("loading_assistido").innerHTML="<i class=''></i>";


                    var input = '<?php $b_nome_cpf=$conn->prepare("SELECT * FROM cliente"); $b_nome_cpf->execute(); ?><label style="display: block"><div class="col-md-12"><div class="input-group"><div class="input-group-addon"><i class="fa fa-user"></i></div><select style="width: 100%" class="form-control select2" name="assistido_' + i + '"><option selected="selected" disabled>Nome do Assistido</option><?php while($linha=$b_nome_cpf->fetch(PDO::FETCH_ASSOC)){ ?> <option  value="<?php echo $linha["id_pessoas"];?>" ><?php echo $linha["nome"];?></option> <?php  }   ?> </select><a href=""><input type="button" style="width:100%;" class="btn btn-danger btn-flat" name="add" value="Remover"/></a></label><div></div>';
                    // var input = '<label style="display: block">Nome: <input id="' + i + '" type="text" name="foto[]" /> <a href="#" class="remove">X</a></label>';
                    $('#inputs_adicionais_assistido').append( input );
                    i = i + 1;
                }, 1500);
            });
            $('#inputs_adicionais_assistido').delegate('a','click',function( e ){
                e.preventDefault();
                $( this ).parent('div').remove();
            });

        });
    </script>

    <script type="text/javascript">
        $(document).ready(function(){
            var i = 2;
            $("input[name='add']").click(function( e ){

                document.getElementById("loading_parte_contraria").setAttribute("class", "overlay");
                document.getElementById("loading_parte_contraria").innerHTML="<i class='fa fa-refresh fa-spin'></i>";
                setTimeout(function() {

                    document.getElementById("loading_parte_contraria").setAttribute("class", "");
                    document.getElementById("loading_parte_contraria").innerHTML="<i class=''></i>";

                    var input = '<?php $b_nome_cpf=$conn->prepare("SELECT * FROM cliente"); $b_nome_cpf->execute(); ?><label style="display: block"><div class="col-md-12"><div class="input-group"><div class="input-group-addon"><i class="fa fa-user"></i></div><select style="width: 100%" class="form-control select2" name="requerido_' + i + '"><option selected="selected" disabled>Nome da Parte Contrária</option><?php while($linha=$b_nome_cpf->fetch(PDO::FETCH_ASSOC)){ ?> <option  value="<?php echo $linha["id_pessoas"];?>" ><?php echo $linha["nome"];?></option> <?php  }   ?> </select><a href=""><input type="button" style="width:100%;" class="btn btn-danger" name="add" value="Remover"/></a></label><div></div>';
                    // var input = '<label style="display: block">Nome: <input id="' + i + '" type="text" name="foto[]" /> <a href="#" class="remove">X</a></label>';
                    $('#inputs_adicionais').append( input );
                    i = i + 1;
                }, 1500);



            });

            $('#inputs_adicionais').delegate('a','click',function( e ){
                e.preventDefault();
                $( this ).parent('div').remove();
            });

        });
    </script>


</head>


<body class="hold-transition skin-blue sidebar-mini">

<div class="wrapper">

    <?php include('pages/Menu/topo.php'); ?>
    <?php include('pages/Menu/menuLateral.php'); ?>


    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Coleta de Dados - NPJ
                <small>Painel de Controle</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Coleta de Dados - Defensoria Pï¿½blica</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <form class="contact_form" method="post" action="pages/coleta_dados/NPJ/cadastro.php">

            <!-- ################### FORMULARIO DE CADASTRO ############################-->
                <!--
                *
                *******************IDENTIFICAÇÃO
                * -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="box box-primary box-solid">
                            <div id="box-id" class="box-header with-border">
                                <div align="center"> <h3 class="box-title">Ficha de Triagem</h3></div>
                                <div class="box-tools pull-right">
                                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i id="identificacao_button" class="fa fa-minus"></i></button>
                                </div><!-- /.box-tools -->
                            </div><!-- /.box-header -->
                            <div class="box-body">
                                <div class="col-md-12">
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-archive"></i>
                                        </div>
                                        <input class="form-control" name="processoN" type="text"
                                               placeholder="Processo Numero">
                                    </div>
                                    <br/>
                                </div>

                                <div class="col-md-6">
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-odnoklassniki"></i>
                                        </div>
                                        <input class="form-control" name="vara" type="text" placeholder="Vara">
                                    </div>
                                    <br/>
                                </div>

                                <div class="col-md-6">
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </div>

                                        <input class="form-control" placeholder="Data do Atendimento" type="date" id="campoData"
                                               maxlength="10" name="data"
                                               pattern="[0-9]{2}\/[0-9]{2}\/[0-9]{4}$" min="<?php echo date('Y/m/d'); ?>"
                                               max="2020-02-18"
                                               value="<?php echo date('Y/m/d'); ?>"/>
                                    </div>
                                    <br/>
                                </div>

                                <div class="col-md-12">
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-user"></i>
                                        </div>
                                        <?php
                                        $b_nome_cpf=$conn->prepare("SELECT * FROM assuntos ");
                                        $b_nome_cpf->execute(); ?>
                                        <select style="width: 100%" name="assunto" class="form-control select2" id="nome_Pessoa">
                                            <option  value="" selected="selected" disabled>Selecione um Assunto para este caso</option><?php
                                            while($linha=$b_nome_cpf->fetch(PDO::FETCH_ASSOC)){ ?>
                                                <option  value="<?php echo $linha['id_assunto'];?>" ><?php echo $linha['assunto'];?></option>
                                            <?php  }   ?>
                                        </select>
                                    </div>
                                    <br/>
                                </div>

                                <div class="col-md-12">
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-user"></i>
                                        </div>
                                        <?php
                                        $b_nome_cpf=$conn->prepare("SELECT * FROM usuario WHERE permissao='Aluno' ");
                                        $b_nome_cpf->execute(); ?>
                                        <select style="width: 100%" name="aluno" class="form-control select2" id="nome_Pessoa">
                                            <option  value="" selected="selected" disabled>Selecione um aluno para este caso</option><?php
                                            while($linha=$b_nome_cpf->fetch(PDO::FETCH_ASSOC)){ ?>
                                                <option  value="<?php echo $linha['id_usuario'];?>" ><?php echo $linha['nome'];?></option>
                                            <?php  }   ?>
                                        </select>
                                    </div>
                                    <br/>
                                </div>


                            </div><!-- /.box-body -->
                            <div id="loading_identificacao"></div>
                        </div><!-- /.box -->
                    </div><!-- /.col -->
                </div>


            <!--
            *********************** IDENTIFICAÇÃO DO ASSISTIDO *****************************
            -->
            <div class="row">
                <div class="col-md-12">
                    <div class="box box-primary box-solid">
                        <div id="box-id" class="box-header with-border">
                            <div align="center"> <h3 class="box-title">Informações do Assistido</h3></div>
                            <div class="box-tools pull-right">
                                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i id="identificacao_button" class="fa fa-minus"></i></button>
                            </div><!-- /.box-tools -->
                        </div><!-- /.box-header -->
                        <div class="box-body">
                            <div class="col-md-12">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-user"></i>
                                    </div>
                                    <?php
                                    $b_nome_cpf=$conn->prepare("SELECT * FROM cliente");
                                    $b_nome_cpf->execute(); ?>

                                    <select style="width: 100%" name="assistido_1" class="form-control select2">
                                        <option  value="" selected="selected" disabled>Nome do Assistido</option><?php
                                        while($linha=$b_nome_cpf->fetch(PDO::FETCH_ASSOC)){ ?>
                                            <option  value="<?php echo $linha['id_pessoas'];?>" ><?php echo $linha['nome'];?></option>
                                        <?php  }   ?>
                                    </select>
                                </div>
                                <br/>
                            </div>



                            <div align="center" ><input type="button" class="btn btn-primary" name="add_assistido" value="Adicionar"/></div>
                            <fieldset id="inputs_adicionais_assistido" style="border: none">
                                <br/>
                            </fieldset>

                        </div><!-- /.box-body -->
                        <div id="loading_assistido"></div>
                    </div><!-- /.box -->
                </div><!-- /.col -->
            </div>

            <!--
            *********************** PARTE CONTRÁRIA ***********************************
            -->
            <div class="row">
                <div class="col-md-12">
                    <div class="box box-primary box-solid">
                        <div id="box-id" class="box-header with-border">
                            <div align="center"> <h3 class="box-title">Informações da Parte Contrária</h3></div>
                            <div class="box-tools pull-right">
                                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i id="identificacao_button" class="fa fa-minus"></i></button>
                            </div><!-- /.box-tools -->
                        </div><!-- /.box-header -->
                        <div class="box-body">
                            <div class="col-md-12">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-user"></i>
                                    </div>
                                    <?php
                                    $b_nome_cpf=$conn->prepare("SELECT * FROM cliente");
                                    $b_nome_cpf->execute(); ?>
                                    <select style="width: 100%" name="requerido_1" class="form-control select2" id="nome_Pessoa">
                                        <option  value="" selected="selected" disabled>Nome da Parte Contrária</option><?php
                                        while($linha=$b_nome_cpf->fetch(PDO::FETCH_ASSOC)){ ?>
                                            <option  value="<?php echo $linha['id_pessoas'];?>" ><?php echo $linha['nome'];?></option>
                                        <?php  }   ?>
                                    </select>
                                </div>
                                <br/>
                            </div>

                            <div align="center" ><input type="button" class="btn btn-primary" name="add" value="Adicionar"/></div>
                            <fieldset id="inputs_adicionais" style="border: none">
                            <br/>
                            </fieldset>

                        </div><!-- /.box-body -->
                        <div id="loading_parte_contraria"></div>
                    </div><!-- /.box -->
                </div><!-- /.col -->
            </div>

            <!--
            *********************** Medidas Cabiveis ***********************************
            -->
            <div class="row">
                <div class="col-md-12">
                    <div class="box box-primary box-solid">
                        <div id="box-id" class="box-header with-border">
                            <div align="center"> <h3 class="box-title">Medidas Jurídicas Cabíveis</h3></div>
                            <div class="box-tools pull-right">
                                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i id="identificacao_button" class="fa fa-minus"></i></button>
                            </div><!-- /.box-tools -->
                        </div><!-- /.box-header -->
                        <div class="box-body">
                            <div class="col-md-12">

                                <?php include("pages/coleta_dados/NPJ/table_documentos.php"); ?>

                                <br/>
                            </div>


                        </div><!-- /.box-body -->
                        <div id="loading_identificacao"></div>
                    </div><!-- /.box -->
                </div><!-- /.col -->
            </div>


            <!--
            *********************** Historico/Relatorio ***********************************
            -->
            <div class="row">
                <div class="col-md-12">
                    <div class="box box-primary box-solid">
                        <div id="box-id" class="box-header with-border">
                            <div align="center"> <h3 class="box-title">Histórico / Relatório</h3></div>
                            <div class="box-tools pull-right">
                                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i id="identificacao_button" class="fa fa-minus"></i></button>
                            </div><!-- /.box-tools -->
                        </div><!-- /.box-header -->
                        <div class="box-body">
                            <div class="col-md-12">

                                <div class="form-group">
                            <textarea class="form-control" placeholder="HistoricoRelatorio" rows="5" name="historico"
                                      style="width: 100%; height: 68px;"></textarea>
                                </div>

                            </div>
                        </div><!-- /.box-body -->
                        <div id="loading_identificacao"></div>
                    </div><!-- /.box -->
                </div><!-- /.col -->
            </div>



            <!-- BOTOES -->
            <div class="row">
                <div class="col-md-12">
                    <div class="box box-primary box-solid">
                        <div class="box-header with-border">
                            <div align="center"> <h3 class="box-title">Botões</h3></div>

                        </div><!-- /.box-header -->
                        <div class="box-body">
                            <span class="input-group-btn">
                            <button type="submit" name="Submit"
                                    class="btn btn-primary">Cadastrar
                            </button>
                        </span>

                        </div><!-- /.box-body -->
                    </div><!-- /.box -->
                </div><!-- /.col -->
            </div>
            </form>
        </section><!-- /.content -->
    </div><!-- /.content-wrapper -->


    </section><!-- /.content -->
</div><!-- /.content-wrapper -->

<?php include('pages/Menu/rodape.php'); ?>


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
            </ul><!-- /.control-sidebar-menu -->

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
            </ul><!-- /.control-sidebar-menu -->

        </div><!-- /.tab-pane -->
        <!-- Stats tab content -->
        <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div><!-- /.tab-pane -->
        <!-- Settings tab content -->
        <div class="tab-pane" id="control-sidebar-settings-tab">
            <form method="post">
                <h3 class="control-sidebar-heading">Configuraï¿½ï¿½es Gerais</h3>
                <div class="form-group">
                    <label class="control-sidebar-subheading">
                        Report panel usage
                        <input type="checkbox" class="pull-right" checked>
                    </label>
                    <p>
                        Some information about this general settings option
                    </p>
                </div><!-- /.form-group -->

                <div class="form-group">
                    <label class="control-sidebar-subheading">
                        Allow mail redirect
                        <input type="checkbox" class="pull-right" checked>
                    </label>
                    <p>
                        Other sets of options are available
                    </p>
                </div><!-- /.form-group -->

                <div class="form-group">
                    <label class="control-sidebar-subheading">
                        Expose author name in posts
                        <input type="checkbox" class="pull-right" checked>
                    </label>
                    <p>
                        Allow the user to show his name in blog posts
                    </p>
                </div><!-- /.form-group -->

                <h3 class="control-sidebar-heading">Chat Settings</h3>

                <div class="form-group">
                    <label class="control-sidebar-subheading">
                        Show me as online
                        <input type="checkbox" class="pull-right" checked>
                    </label>
                </div><!-- /.form-group -->

                <div class="form-group">
                    <label class="control-sidebar-subheading">
                        Turn off notifications
                        <input type="checkbox" class="pull-right">
                    </label>
                </div><!-- /.form-group -->

                <div class="form-group">
                    <label class="control-sidebar-subheading">
                        Delete chat history
                        <a href="javascript::;" class="text-red pull-right"><i class="fa fa-trash-o"></i></a>
                    </label>
                </div><!-- /.form-group -->
            </form>
        </div><!-- /.tab-pane -->
    </div>
</aside><!-- /.control-sidebar -->
<!-- Add the sidebar's background. This div must be placed
     immediately after the control sidebar -->
<div class="control-sidebar-bg"></div>
</div><!-- ./wrapper -->

<script src="plugins/jQuery/jQuery-2.1.4.min.js"></script>
<script src="js/html5shiv.min.js"></script>
<script src="js/respond.min.js"></script>
<!-- Bootstrap 3.3.5 -->
<script src="bootstrap/js/bootstrap.min.js"></script>
<!-- InputMask -->
<script type="text/javascript" src="plugins/mask/jquery.maskedinput.js.sql"></script>

<script type="text/javascript">
    jQuery(function ($) {
        $("#campoData").mask("99/99/9999");
    });
</script>
<script type="text/javascript" src="plugins/mask/jquery.mask.min.js"></script>
<script type="text/javascript">
    $("#tel").mask("(00)0000-00009");
    $("#telTrab").mask("(00)0000-00009");

</script>
<script src="plugins/colorpicker/bootstrap-colorpicker.min.js"></script>
<script src="plugins/timepicker/bootstrap-timepicker.min.js"></script>
<!-- SlimScroll 1.3.0 -->
<script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- iCheck 1.0.1 -->
<script src="plugins/iCheck/icheck.min.js"></script>
<!-- FastClick -->
<script src="plugins/fastclick/fastclick.min.js"></script>
<script src="dist/js/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<script src="plugins/select2/select2.full.min.js"></script>
<script>
    $(function () {
        //Initialize Select2 Elements
        $(".select2").select2();
    });
</script>


<script src="js/custom-file-input.js"></script>
</body>
</html>