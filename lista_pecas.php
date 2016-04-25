<?php

error_reporting (E_ALL & ~ E_NOTICE & ~ E_DEPRECATED);
ini_set('default_charset','UTF-8');
session_start();
require_once("pages/config/conn.php");
include("pages/login/seguranca.php"); // Inclui o arquivo com o sistema de segurança
protegePagina(); // Chama a função que protege a página
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta http-equiv="Content-Type" content="text/html" charset=utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>NPJ | Acompanhamento</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
     folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="plugins/iCheck/flat/blue.css">
    <!-- Morris chart -->
    <link rel="stylesheet" href="plugins/morris/morris.css">
    <!-- jvectormap -->
    <link rel="stylesheet" href="plugins/jvectormap/jquery-jvectormap-1.2.2.css">
    <!-- Date Picker -->
    <link rel="stylesheet" href="plugins/datepicker/datepicker3.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker-bs3.css">
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">


    <!-- daterange picker -->
    <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker-bs3.css">
    <!-- iCheck for checkboxes and radio inputs -->
    <link rel="stylesheet" href="plugins/iCheck/all.css">
    <!-- Bootstrap Color Picker -->
    <link rel="stylesheet" href="plugins/colorpicker/bootstrap-colorpicker.min.css">
    <!-- Bootstrap time Picker -->
    <link rel="stylesheet" href="plugins/timepicker/bootstrap-timepicker.min.css">
    <!-- Select2 -->
    <link rel="stylesheet" href="plugins/select2/select2.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
    <link rel="stylesheet" href="dist/css/form_Style.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="js/html5shiv.min.js"></script>
    <script src="js/respond.min.js"></script>
    <script src="js/scriptFiltro_Tabela.js"></script>
    <![endif]-->

    <script type="text/javascript">
        var $JQuery = jQuery.noConflict()
    </script>
</head>


<body class="hold-transition skin-blue sidebar-mini">

<div class="wrapper">

    <!-- -->
    <?php include('pages/Menu/topo.php');?>
    <?php include('pages/Menu/menuLateral.php');?>

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Lista de peças em aberto
                <small>Painel de Controle</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Peças - <?php echo "".$_SESSION['nomeAssistido'] ?></li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <!-- Small boxes (Stat box) -->
            <div class="row">

                <!-- ASSUNTO -->


                <div class="col-md-12">
                    <div class="box box-primary" style="overflow: auto; height: 620px">
                        <div class="box-header">
                            <h3 class="box-title">Olá <?php echo " " . $_SESSION['usuarioNome']."," ?> selecione a Peça para corrigir: </h3>

                        </div>
                        <!-- /.box-header -->
                        <div id="divConteudo" class="box-body table-responsive no-padding">
                            <table id="tabela" class="table table-hover">

                                <thead>
                                <tr>
                                    <div class="box-tools">
                                        <div class="input-group input-group-sm" style="width: 150px;">
                                            <th><input id="txtColuna0" type="text" name="table_search" class="form-control pull-right"
                                                       placeholder="Pesquisar por Aluno"></th>
                                        </div>
                                    </div>
                                    <div class="box-tools">
                                        <div class="input-group input-group-sm" style="width: 150px;">
                                            <th><input id="txtColuna1" type="text" name="table_search" class="form-control pull-right"
                                                       placeholder="Pesquisar por Assistido"></th>
                                        </div>
                                    </div>
                                    <div class="box-tools">
                                        <div class="input-group input-group-sm" style="width: 150px;">
                                            <th><input id="txtColuna2" type="text" name="table_search" class="form-control pull-right"
                                                       placeholder="Pesquisar por Requerido"></th>
                                        </div>
                                    </div>
                                    <div class="box-tools">
                                        <div class="input-group input-group-sm" style="width: 150px;">
                                            <th><input id="txtColuna3" type="text" name="table_search" class="form-control pull-right"
                                                       placeholder="Pesquisar por Data"></th>
                                        </div>
                                    </div>
                                    <div class="box-tools">
                                        <div class="input-group input-group-sm" style="width: 150px;">
                                            <th><input id="txtColuna4" type="text" name="table_search" class="form-control pull-right"
                                                       placeholder="Pesquisar por Status"></th>
                                        </div>
                                    </div>


                                </tr>
                                </thead>
                                <tbody>
                                <tr>

                                    <th>Aluno</th>
                                    <th>Assistido</th>
                                    <th>Requerido</th>
                                    <th>Data</th>
                                    <th>Status</th>
                                    <th>Assunto</th>
                                    <th>Observação</th>
                                </tr>
                                <?php
                                $nomeID = $_SESSION['usuarioID'];
                                //$sql = "SELECT * FROM peças_juridicas";
                                $sql = "SELECT * FROM atendimento_defensoria,pecas_juridicas,usuario WHERE Usuario_idUsuario = '$nomeID'  and Pecas_idPecas = idPecas and idUsuario = Usuario_idUsuario";
                                $stmt = mysql_query($sql);

                                while ($resultado = mysql_fetch_array($stmt)) {
                                    //PEGA O NOME DO ASSISTIDO NA TABELA ASSISTIDODEFENSORIA, COM O ID
                                    $assistido = $resultado['Assistido_Defensoria_idAssistidoDefensoria'];
                                    $query = "SELECT * FROM assistido_defensoria WHERE idAssistidoDefensoria = $assistido";
                                    $assistido = mysql_fetch_array(mysql_query($query));

                                    //pega o nome do requerido
                                    $requerido = $resultado['Requerido_idRequerido'];
                                    $query = "SELECT * FROM requerido WHERE idRequerido = $requerido";
                                    $requerido = mysql_fetch_array(mysql_query($query));

                                    $assunto = $resultado['Assunto_Atendimento_idAssunto_Atendimento'];
                                    $query = "SELECT * FROM assunto_atendimento WHERE idAssunto_Atendimento = $assunto";
                                    $assunto = mysql_fetch_array(mysql_query($query));

                                    ?>

                                    <tr >
                                        <td onclick="javascript: if (confirm('Clique em OK para agendar um Retorno para <?php echo $assistido['nomeAssistidoDefensoria'] ?>'))location.href='agendar_retorno.php?nome=<?php echo $assistido['nomeAssistidoDefensoria'];?>&id=<?php echo $resultado['idAtendimento_Defensoria']; ?>'"><?php echo "" . $resultado['nome'] ?></td>
                                        <td onclick="javascript: if (confirm('Clique em OK para agendar um Retorno para <?php echo $assistido['nomeAssistidoDefensoria'] ?>'))location.href='agendar_retorno.php?nome=<?php echo $assistido['nomeAssistidoDefensoria'];?>&id=<?php echo $resultado['idAtendimento_Defensoria']; ?>'"><?php echo "" . $assistido['nomeAssistidoDefensoria'] ?></a></td>
                                        <td onclick="javascript: if (confirm('Clique em OK para agendar um Retorno para <?php echo $assistido['nomeAssistidoDefensoria'] ?>'))location.href='agendar_retorno.php?nome=<?php echo $assistido['nomeAssistidoDefensoria'];?>&id=<?php echo $resultado['idAtendimento_Defensoria']; ?>'"><?php echo "" . $requerido['nomeRequerido'] ?></td>
                                        <td onclick="javascript: if (confirm('Clique em OK para agendar um Retorno para <?php echo $assistido['nomeAssistidoDefensoria'] ?>'))location.href='agendar_retorno.php?nome=<?php echo $assistido['nomeAssistidoDefensoria'];?>&id=<?php echo $resultado['idAtendimento_Defensoria']; ?>'"><?php echo date('d/m/Y', strtotime("" . $resultado['dataPeca'])) ?></td>


                                        <td><span id="stats"
                                                  class="label label-success"><?php echo "" . $resultado['status'] ?></span>
                                        </td>

                                        <script type="text/javascript">
                                            var status = "<?php echo "".$resultado['status'] ?>";
                                            if (status == "Aberto") {
                                                document.getElementById("stats").setAttribute("class", "label label-primary");
                                                document.getElementById("stats").setAttribute("id", "class1");
                                            }
                                            if (status == "Aprovada") {
                                                document.getElementById("stats").setAttribute("class", "label label-success");
                                                document.getElementById("stats").setAttribute("id", "class2");
                                            }
                                            if (status == "Reprovada") {
                                                document.getElementById("stats").setAttribute("class", "label label-danger");
                                                document.getElementById("stats").setAttribute("id", "class3");
                                            }
                                            if (status == "Em correção") {
                                                document.getElementById("stats").setAttribute("class", "label label-warning");
                                                document.getElementById("stats").setAttribute("id", "class4");
                                            }
                                        </script>

                                        <td><?php echo "" . $assunto['descricao'] ?></td>
                                        <td><?php echo "" . $resultado['descricaoAtendimentoDefensoria'] ?></td>
                                    </tr>


                                <?php } ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </div>

                <script>
                    function Teste() {
                        $('#teste').bind('click', function () {
                            alert("Linha foi clicada");
                        });
                    }
                </script>

                <script  type="text/javascript">
                    function setText(){
                        var x=document.getElementById('assunto')
                        value = x.options[x.selectedIndex].value
                        document.getElementById('teste').style.visibility= "";
                        var itemSelecionado = x.options[x.selectedIndex].value;
                    }
                </script>

        </section><!-- /.content -->
    </div><!-- /.content-wrapper -->

    <?php include('pages/Menu/rodape.php');?>


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
                <h3 class="control-sidebar-heading">Em desenvolvimento</h3>

            </div>
            <!-- /.tab-pane -->
            <!-- Stats tab content -->
            <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
            <!-- /.tab-pane -->
            <!-- Settings tab content -->
            <div class="tab-pane" id="control-sidebar-settings-tab">
                <form method="post">
                    <h3 class="control-sidebar-heading">Configurações Gerais</h3>


                    <h3 class="control-sidebar-heading">Chat Settings</h3>

                    <div class="form-group">
                        <label class="control-sidebar-subheading">
                            Mostrar-me Online
                            <input type="checkbox" class="pull-right" checked>
                        </label>
                    </div>
                    <!-- /.form-group -->

                    <div class="form-group">
                        <label class="control-sidebar-subheading">
                            Desativar Notificações
                            <input type="checkbox" class="pull-right">
                        </label>
                    </div>
                    <!-- /.form-group -->

                    <div class="form-group">
                        <label class="control-sidebar-subheading">
                            Apagar histórico de Mensangem
                            <a href="javascript::;" class="text-red pull-right"><i class="fa fa-trash-o"></i></a>
                        </label>
                    </div>
                    <!-- /.form-group -->
                </form>
            </div>
            <!-- /.tab-pane -->
        </div>
    </aside>

    <!-- MODAIS -->
    <div class="container">
        <div class="modal fade" id="openModal" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title" id="TituloModal">Saindo do Sistema</h4>

                    </div>
                    <div class="modal-body">

                        <form method="POST" action="pages/login/logout.php">
                            <div class="input-group input-group-sm">
                                <p>Tem certeza que deseja sair?</p>
                            </div>
                            <br/>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-default">Sair do Sistema</button>
                        </form>
                        <button type="button" class="btn btn-default" onclick="" data-dismiss="modal">Cancelar
                        </button>
                    </div>

                </div>
            </div>
        </div>
    </div>


    <!-- MODAL PARA UPLOAD -->
    <div class="container">
        <div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title" id="TituloModal">Trocar Foto do Perfil</h4>
                    </div>
                    <div class="modal-body">
                        <!-- IMAGEM -->

                        <form method="POST" action="pages/cadastro/usuario/nova_Foto.php">
                            <div class="input-group input-group-sm">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-image"></i>
                                    </div>
                                    <input class="form-control" name="foto" type="file" id="arquivo"/>
                                </div>
                                                <span class="input-group-btn">
                                                    <button type="button" onclick="submitForm()" class="btn btn-info btn-flat">
                                                        Enviar Imagem
                                                    </button>
                                                </span>
                            </div>

                            <output id="result"></output>
                            <!-- FIM IMAGEM --><br/>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-default" >Salvar Nova Foto de Perfil
                        </button>
                        </form>
                        <button type="button" class="btn btn-default" onclick="" data-dismiss="modal">Fechar
                        </button>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- FIM - MODAL PARA UPLOAD -->



    <div class="control-sidebar-bg"></div>
</div><!-- ./wrapper -->
<!-- jQuery 2.1.4 -->
<script src="plugins/jQuery/jQuery-2.1.4.min.js"></script>
<!-- Bootstrap 3.3.5 -->
<script src="bootstrap/js/bootstrap.min.js"></script>
<!-- Select2 -->
<script src="plugins/select2/select2.full.min.js"></script>
<!-- InputMask -->
<script src="plugins/input-mask/jquery.inputmask.js"></script>
<script src="plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="plugins/input-mask/jquery.inputmask.extensions.js"></script>
<!-- date-range-picker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- bootstrap color picker -->
<script src="plugins/colorpicker/bootstrap-colorpicker.min.js"></script>
<!-- bootstrap time picker -->
<script src="plugins/timepicker/bootstrap-timepicker.min.js"></script>
<!-- SlimScroll 1.3.0 -->
<script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- iCheck 1.0.1 -->
<script src="plugins/iCheck/icheck.min.js"></script>
<!-- FastClick -->
<script src="plugins/fastclick/fastclick.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- Page script -->
<script>
    $(function () {
        //Initialize Select2 Elements
        $(".select2").select2();

        //Datemask dd/mm/yyyy
        $("#datemask").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"});
        //Datemask2 mm/dd/yyyy
        $("#datemask2").inputmask("mm/dd/yyyy", {"placeholder": "mm/dd/yyyy"});
        //Money Euro
        $("[data-mask]").inputmask();

        //Date range picker
        $('#reservation').daterangepicker();
        //Date range picker with time picker
        $('#reservationtime').daterangepicker({timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm A'});
        //Date range as a button
        $('#daterange-btn').daterangepicker(
            {
                ranges: {
                    'Today': [moment(), moment()],
                    'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                    'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                    'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                    'This Month': [moment().startOf('month'), moment().endOf('month')],
                    'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
                },
                startDate: moment().subtract(29, 'days'),
                endDate: moment()
            },
            function (start, end) {
                $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
            }
        );

        //iCheck for checkbox and radio inputs
        $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
            checkboxClass: 'icheckbox_minimal-blue',
            radioClass: 'iradio_minimal-blue'
        });
        //Red color scheme for iCheck
        $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
            checkboxClass: 'icheckbox_minimal-red',
            radioClass: 'iradio_minimal-red'
        });
        //Flat red color scheme for iCheck
        $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
            checkboxClass: 'icheckbox_flat-green',
            radioClass: 'iradio_flat-green'
        });

        //Colorpicker
        $(".my-colorpicker1").colorpicker();
        //color picker with addon
        $(".my-colorpicker2").colorpicker();

        //Timepicker
        $(".timepicker").timepicker({
            showInputs: false
        });
    });
</script>
<script>
    $(function(){
        $("#tabela input").keyup(function(){

            var index = $(this).parent().index();
            var nth = "#tabela td:nth-child("+(index+1).toString()+")";
            var valor = $(this).val().toUpperCase();
            $("#tabela tbody tr").show();
            $(nth).each(function(){
                if($(this).text().toUpperCase().indexOf(valor) < 0){
                    $(this).parent().hide();
                }
            });
        });

        $("#tabela input").blur(function(){
            $(this).val("");
        });
    });
</script>
</body>
</html>