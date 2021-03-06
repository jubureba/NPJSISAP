<?php
require_once("pages/config/conn.php");
ini_set('default_charset', 'UTF-8');
error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);
session_start();
include("pages/login/seguranca.php"); // Inclui o arquivo com o sistema de segurança
protegePagina(); // Chama a função que protege a página
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta http-equiv="Content-Type" content="text/html" charset=utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>NPJ | Cadastro de Usuário</title>
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
    <script src="js/html5shiv.min.js"></script>
    <script src="js/respond.min.js"></script>
    <script language="JavaScript" type="text/javascript" src="js/cidades-estados-1.4-utf8.js"></script> <!--cidades e estados -->

</head>


<body class="hold-transition skin-blue sidebar-mini">

<div class="wrapper">
    <?php include('pages/Menu/topo.php');?>
    <?php include('pages/Menu/menuLateral.php');?>


    <!--####################### FIM -  MENU PRINCIPAL - BARRA LATERAL ESQUERDA ############################-->

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Upload de Modelos
                <small>Area do Professor</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Upload de Peça</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <!-- Small boxes (Stat box) -->


            <div class="box box-primary col-md-10">
                <div class="box-header with-border">

                    <h3 class="box-title">Selecione a Peça, e clique em Enviar Arquivos</h3>
                    <hr>
                    <!--###########  FORMULARIO DE CADASTRO -->

                    <div class="col-md-12">

                        <div class="form-group">
                            <form action="pages/docs/upload.php" method="post" enctype="multipart/form-data">
                                <fieldset>
                                    <p><label for="Enviar arquivo">Modelo da Peça Jurídica</label></p>
                                    <input type="file" name="arquivo" class="width233"/>
                                    <hr>
                                    <span class="input-group-btn">
                                        <button type="submit" name="enviar" class="btn btn-primary">Enviar Arquivos</button>
                                    </span>

                                </fieldset>
                            </form>
                        </div>
                        <!-- ########### FIM FORMULARIO DE CADASTRO -->
                    </div>
                </div>
                    <!--###########  FORMULARIO DE CADASTRO -->
                    <div class="col-md-12">

                        <div class="form-group">
                            <form action="pages/docs/upload.php" method="post" enctype="multipart/form-data">
                                <fieldset>
                                    <p><label for="Enviar arquivo">Modelo da Petição Inicial</label></p>
                                    <input type="file" name="arquivo" class="width233"/>
                                    <hr>
                                    <span class="input-group-btn">
                                        <button type="submit" name="enviar" class="btn btn-primary">Enviar Arquivos</button>
                                    </span>

                                </fieldset>
                            </form>
                        </div>
                        <!-- ########### FIM FORMULARIO DE CADASTRO -->
                    </div>
            </div><!-- /.row (main row) -->












        </section><!-- /.content -->
        <!-- FIM DO MENU - PARTE DO MEIO  -->
    </div>
    <!-- /.content-wrapper -->

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



    </div>
    <!-- FIM - MODAL PARA UPLOAD -->



    <div class="control-sidebar-bg"></div>
</div>
<script src="plugins/jQuery/jQuery-2.1.4.min.js"></script>
<script>
    $('select[name="estadoRequerido"]').on('change', function(){
        var estado = this.value;
        $('select[name="CIDADE"] option').each(function(){
            var $this = $(this);
            if($this.data('estado') == estado) $this.show();
            else $this.hide();
        });
    });

</script>
<script src="bootstrap/js/bootstrap.min.js"></script>
<script src="plugins/select2/select2.full.min.js"></script>
<script src="plugins/input-mask/jquery.inputmask.js"></script>
<script src="plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="plugins/input-mask/jquery.inputmask.extensions.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<script src="plugins/colorpicker/bootstrap-colorpicker.min.js"></script>
<script src="plugins/timepicker/bootstrap-timepicker.min.js"></script>
<script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
<script src="plugins/iCheck/icheck.min.js"></script>
<script src="plugins/fastclick/fastclick.min.js"></script>
<script src="dist/js/app.min.js"></script>
<script src="dist/js/demo.js"></script>
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
    $("#txttelefone").mask("(00) 0000-00009");
</script>
<script>
    $(function () {
        $(".select2").select2();

    });
</script>
<script language="JavaScript" type="text/javascript" charset="utf-8">
    new dgCidadesEstados({
        cidade: document.getElementById('cidade2'),
        estado: document.getElementById('estado2'),
        estadoVal: 'PA',
        cidadeVal: 'Castanhal'
    })
</script>

<script type="text/javascript">
    function getCoords(){
        var api;
        $('#toCrop').Jcrop({
            minSize: [160,160],
            aspectRatio: 1,
            bgOpacity: 0.4,
            addClass: 'jcrop-light',
            onSelect: updateCoords,
            onChange: updateCoords,
            setSelect: [0,0,160,160]
        });
    }

    function updateCoords(c){
        $('#x').val(c.x);
        $('#y').val(c.y);
        $('#w').val(c.w);
        $('#h').val(c.h);
    };

    function _(element){
        if(document.getElementById(element))
            return document.getElementById(element);
        else
            return false;
    }

    function submitForm(){
        if(_('arquivo').files[0]){//Se houver um arquivo, faremos alguns testes no mesmo
            var arquivo = _('arquivo').files[0];
            if(arquivo.type != 'image/png' && arquivo.type != 'image/jpeg')
                _('result').innerHTML = 'Por favor, selecione uma imagem do tipo JPEG ou PNG';
            else if(arquivo.size > 1024 * 2048)//2MB
                _('result').innerHTML = 'Por favor selecione uma image mo máximo 2MB de tamanho.';
            else{
                var x = _('x').value;
                var y = _('y').value;
                var w = _('w').value;
                var h = _('h').value;
                var formData = new FormData();
                formData.append('arquivo', arquivo);
                formData.append('x', x);
                formData.append('y', y);
                formData.append('w', w);
                formData.append('h', h);
                if(_('imgType')){
                    var imgType = _('imgType').value;
                    formData.append('imgType', imgType);
                }
                if(_('imgName')){
                    var imgName = _('imgName').value;
                    formData.append('imgName', imgName);
                }
                var request = new XMLHttpRequest();
                if(_('toCrop'))
                    var includeFile = 'recebeFile.php';
                else
                    var includeFile = 'recebeFile.php';
                request.open('post', includeFile, true);
                request.onreadystatechange = function(){
                    if(request.readyState == 4 && request.status == 200)
                        _('result').innerHTML = request.responseText;

                }
                request.send(formData);
                _('result').innerHTML = '<img src="loader.gif" />';
            }
        }
        else
            _('result').innerHTML = 'Por favor, selecione uma imagem para ser enviada!';
    }
</script>

</body>
</html>
