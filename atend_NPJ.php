<?php
ini_set('default_charset', 'UTF-8');
error_reporting (E_ALL & ~ E_NOTICE & ~ E_DEPRECATED);
session_start();
include("pages/login/seguranca.php"); // Inclui o arquivo com o sistema de seguranï¿½a
protegePagina(); // Chama a funï¿½ï¿½o que protege a pï¿½gina
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
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
    <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
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
    <link rel="stylesheet" href="plugins/select2/select2.min.css">


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
            <span class="required_notification"><img src="dist/img/red_asterisk.png"> Indica campo obrigatï¿½rio</span><br/>
            <!-- ################### FORMULARIO DE CADASTRO ############################-->
            <form class="contact_form" method="post" name="form1" action="pages/coleta_dados/NPJ/cadastro.php">
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">FICHA DE TRIAGEM</h3><br/>
                        <hr>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-user"></i>
                            </div>
                            <input class="form-control" required name="processoN" type="text" placeholder="Processo Numero">
                        </div><br/>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-user"></i>
                            </div>
                            <input class="form-control" name="vara" type="text" placeholder="Vara">
                        </div><br/>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </div>

                            <input class="form-control" placeholder="Data do Atendimento" type="date" id="campoData" required="required" maxlength="10" name="data" pattern="[0-9]{2}\/[0-9]{2}\/[0-9]{4}$" min="<?php echo date('Y/m/d'); ?>" max="2020-02-18"
                                value="<?php echo date('d/m/Y');?>"/>
                        </div>
                        </br >

                    </div>
                </div>

                <div class="box box-primary">
                    <div class="box-header">

                        <!-- IDENTIFICAï¿½ï¿½O PARTE 1 ---------------------------------------------------->
                        <h3 class="box-title">1- Identificação</h3><br />
                        <hr>
                        <div class="col-md-6">

                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-user"></i>
                                </div>

                                <input class="form-control" required  name="nome" type="text" placeholder="Nome(Assistido, Pai ou Responsável)">
                            </div><br/>
                        </div>

                        <div class="col-md-6">
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-user"></i>
                                </div>
                                <input class="form-control" required name="NomeMenor" type="text" placeholder="Nome do Menor">
                            </div><br/>
                        </div>

                        <div class="col-md-6">
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-user"></i>
                                </div>
                                <input class="form-control" name="nomePai" type="text" placeholder="Nome do Pai">
                            </div><br/>
                        </div>

                        <div class="col-md-6">
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-user"></i>
                                </div>
                                <input class="form-control" name="nomeMae" type="text" placeholder="Nome da Mãe">
                            </div><br/>
                        </div>

                        <div class="col-md-6">
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-user"></i>
                                </div>
                                <input class="form-control" required value="Paraense" name="Naturalidade" type="text" placeholder="Naturalidade">
                            </div><br/>
                        </div>

                        <div class="col-md-6">
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-user"></i>
                                </div>
                                <input class="form-control" required value="Brasileiro(a)" name="Nacionalidade" type="text" placeholder="Nacionalidade">
                            </div><br/>
                        </div>

                        <div class="col-md-6">
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-user"></i>
                                </div>
                                <input class="form-control" placeholder="Data de Nascimento" type="date" id="campoData2" required="required" maxlength="10" name="date" pattern="[0-9]{2}\/[0-9]{2}\/[0-9]{4}$" min="2012-01-01" max="2020-02-18" />
                            </div><br/>
                        </div>


                        <div class="col-md-6">
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-user"></i>
                                </div>
                                <input class="form-control" required name="Escolaridade" type="text" placeholder="Escolaridade">
                            </div><br/>
                        </div>
                        <div class="col-md-6">
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-user"></i>
                                </div>
                                <input class="form-control" required name="Profissao" type="text" placeholder="Profissão">
                            </div><br/>
                        </div>
                        <div class="col-md-6">
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-user"></i>
                                </div>
                                <input class="form-control" required name="EstadoCivil" type="text" placeholder="Estado Civil">
                            </div><br/>
                        </div>
                        <div class="col-md-6">
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-user"></i>
                                </div>
                                <input class="form-control" required name="enderecoResidencial" type="text" placeholder="Endereço Residencial">
                            </div><br/>
                        </div>
                        <div class="col-md-6">
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-user"></i>
                                </div>
                                <input class="form-control" required value="Castanhal/PA" name="cidade" type="text" placeholder="Cidade Residencial">
                            </div><br/>
                        </div>
                        <div class="col-md-6">
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-user"></i>
                                </div>
                                <input class="form-control" type="tel"  required name="telefone" id="txttelefone" placeholder="Telefone Residencial" pattern="\([0-9]{2}\)[\s][0-9]{4}-[0-9]{4,5}"/>
                            </div><br/>
                        </div>
                        <div class="col-md-6">
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-user"></i>
                                </div>
                                <input class="form-control" required name="EnderecoTrabalho"  type="text" placeholder="Endereço do Trabalho">
                            </div><br/>
                        </div>
                        <div class="col-md-6">
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-user"></i>
                                </div>
                                <input class="form-control" name="cidadeTrabalho" type="text" placeholder="Cidade do Trabalho">
                            </div><br/>
                        </div>
                        <div class="col-md-6">
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-user"></i>
                                </div>

                                <input class="form-control" name="telefoneTrabalho" type="tel" id="txttelefone" placeholder="Telefone do Trabalho" pattern="\([0-9]{2}\)[\s][0-9]{4}-[0-9]{4,5}"/>
                            </div><br/>
                        </div>
                        <div class="col-md-6">
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-user"></i>
                                </div>
                                <input class="form-control" name="situacaoHabitacional" type="text" placeholder="Situação Habitacional">
                            </div><br/>
                        </div>

                        <div class="col-md-6">
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-user"></i>
                                </div>
                                <input class="form-control" name="Remuneracao" type="text" placeholder="Remuneração">
                            </div><br/>
                        </div>

                    </div>
                </div>

                <div class="box box-primary">
                    <div class="box-header">

                        <!-- HISTORICO/RELATORIO ---------------------------------------------------->
                        <h3 class="box-title">2- Histórico/Relatório</h3><br /><br />
                        <div class="form-group">
                            <textarea class="form-control" placeholder="HistoricoRelatorio" rows="5" name="assunto" style="width: 975px; height: 68px;"></textarea>
                        </div>

                    </div>
                </div>
            </form>

            <!-- UPLOAD DE ARQUIVOS ---------------------------------------------------->
            <div class="row">
                <div class="col-md-6">
                    <div class="box box-primary">
                        <div class="box-header">
                            <h3 class="box-title">3- Coleta de Documentos</h3>
                        </div>
                        <div class="box-body">
                            <!-- /.form-group -->
                            <!-- ESTE CAMPO SERÁ FEITO UPLOAD DOS ARQUIVOS SCANEADOS - DOCUMENTOS NA PAG2 -->
                            <div class="form-group">
                                <select id="idselect" name="idPosto" onchange="UploadDocumentos(this.value)"
                                        class="form-control select2" multiple="multiple"
                                        data-placeholder="Documentos Apresentados"
                                        style="width: 100%;">
                                    <option value="cpf">CPF</option>
                                    <option value="rg">RG</option>
                                    <option value="ctps">CTPS</option>
                                    <option value="comprovanteResidencia">Comprovante de Residência</option>
                                    <option value="contracheque">Contracheque</option>
                                    <option value="certidaoNascimento">Certidão de Nascimento</option>
                                    <option value="certidaoCasamento">Certidão de Casamento</option>
                                    <option value="certidaoObito">Certidão de Óbito</option>
                                </select>
                                <br/></div>
                            <div id="visualizarSituacao"></div>
                            <?php include('pages/Modals/modal_upload.php');?>
                            <script type="text/javascript">
                                function UploadDocumentos(valor) {
                                    $('#myModal').modal('show');
                                }
                            </script>

                        </div><!-- /.box-body -->
                    </div><!-- /.box -->
                </div><!-- /.col (left) -->


                <div class="col-md-6">
                    <div class="box box-primary">
                        <div class="box-header">
                            <h3 class="box-title">Preview Imagem</h3>
                        </div>
                        Imagem
                        <div id="visualizar"></div>

                    </div><!-- /.box-body -->
                </div><!-- /.box -->

                <!-- iCheck -->

            </div><!-- /.col (right) -->




            <div class="box box-primary">
                <div class="box-header">
                        <span class="input-group-btn">
                            <button type="submit" onclick="document.form1.submit()" name="Submit" class="btn btn-primary">Cadastrar</button>
                        </span>

                    <br/>
                    <br/>
                    redireciona para pagina com os dados do usuario com opcao de download dos documentos
                    </br>
                    a tela seguinte tem botao de elaborar peï¿½a, imprmir os dados, campo de texto para observacao, mediaï¿½ï¿½o.
                    mediaï¿½ï¿½o - nome dos envolvidos, e se houve acordo ou nao
                </div>
            </div>



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

<script  src="plugins/jQuery/jQuery-2.1.4.min.js"></script>
<script src="js/html5shiv.min.js"></script>
<script src="js/respond.min.js"></script>
<!-- Bootstrap 3.3.5 -->
<script src="bootstrap/js/bootstrap.min.js"></script>
<!-- InputMask -->
<script type="text/javascript" src="plugins/mask/jquery.maskedinput.js.sql"></script>
<script type="text/javascript">
    jQuery(function($){
        $("#campoData").mask("99/99/9999");
        $("#campoData2").mask("99/99/9999");
    });
</script>
<script type="text/javascript" src="plugins/mask/jquery.mask.min.js"></script>
<script type="text/javascript">
    $("#txttxttelefone").mask("(00) 0000-00009");
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



</body>
</html>