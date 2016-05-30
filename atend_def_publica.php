<?php
error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);
session_start();
ini_set('default_charset', 'UTF-8');
include("pages/login/seguranca.php"); // Inclui o arquivo com o sistema de segurança
protegePagina(); // Chama a função que protege a página
include("pages/config/conn_pdo.php");
$conn=Conectar();
?>

<!DOCTYPE html>
<html lang="pt-br" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="Content-Type: text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>NPJ | Defensoria Publica</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
    <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
    <link rel="stylesheet" href="plugins/iCheck/flat/blue.css">
    <link rel="stylesheet" href="plugins/morris/morris.css">
    <link rel="stylesheet" href="dist/css/def_publica_style.css">
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
    <script language="JavaScript" type="text/javascript" src="js/cidades-estados-1.4-utf8.js"></script>
    <!--cidades e estados -->

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
            Coleta de Dados - Defensoria Pública
            <small>Painel de Controle</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Coleta de Dados - Defensoria Pública</li>
        </ol>
    </section>

    <section class="content">
        <form class="contact_form" method="post" action="pages/coleta_dados/Defensoria_Publica/cadastro.php">
            <!-- ################### FORMULARIO DE CADASTRO -->
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

            <!-- dados -->
            <div class="row">
                <div class="col-md-12">
                    <div class="box box-primary box-solid">
                        <div class="box-header with-border">
                            <div align="center"> <h3 class="box-title">Dados</h3></div>
                            <div class="box-tools pull-right">
                                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i id="identificacao_button" class="fa fa-minus"></i></button>
                            </div>
                        </div><!-- /.box-header -->
                        <div class="box-body">
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
                            <!-- textarea -->


                            <div class="col-md-12">
                                <div class="form-group">
                                    <textarea class="form-control" name="observacao" rows="5" placeholder="Observação"></textarea>
                                </div>
                            </div>

                            <!--Login-->
                            <div class="col-md-12">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-user"></i>
                                    </div>
                                    <input class="form-control" name="loginDefensoria" type="text"
                                           placeholder="Login da Defensoria">
                                </div>
                                <br/>
                            </div>


                        </div><!-- /.box-body -->
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

                            <button type="submit" onclick="document.form1.submit()" name="Submit"
                                    class="btn btn-primary">Cadastrar
                            </button>
                        </span>

                        </div><!-- /.box-body -->
                    </div><!-- /.box -->
                </div><!-- /.col -->
            </div>


        </form>
    </section>
    <!-- /.content -->
</div>
<!-- FIM FORMULARIO DE CADASTRO -->

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

<div class="control-sidebar-bg"></div>
</div><!-- ./wrapper -->
<!-- jQuery 2.1.4 -->
<script src="plugins/jQuery/jQuery-2.1.4.min.js"></script>
<script>
    $('select[name="estadoRequerido"]').on('change', function () {
        var estado = this.value;
        $('select[name="CIDADE"] option').each(function () {
            var $this = $(this);
            if ($this.data('estado') == estado) $this.show();
            else $this.hide();
        });
    });

</script>
<!-- Bootstrap 3.3.5 -->
<script src="bootstrap/js/bootstrap.min.js"></script>
<script src="plugins/select2/select2.full.min.js"></script>
<script>
    $(function () {
        //Initialize Select2 Elements
        $(".select2").select2();
    });
</script>

<!-- InputMask -->
<script src="plugins/input-mask/jquery.inputmask.js"></script>
<script src="plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="plugins/input-mask/jquery.inputmask.extensions.js"></script>
<!-- date-range-picker -->
<script src="js/moment.min.js"></script>
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

<script language="JavaScript" type="text/javascript" charset="utf-8">
    new dgCidadesEstados({
        cidade: document.getElementById('cidade2'),
        estado: document.getElementById('estado2'),
        estadoVal: 'PA',
        cidadeVal: 'Castanhal'
    })
</script>
<script language="JavaScript" type="text/javascript" charset="utf-8">
    new dgCidadesEstados({
        cidade: document.getElementById('cidade3'),
        estado: document.getElementById('estado3'),
        estadoVal: 'PA',
        cidadeVal: 'Castanhal'
    })
</script>


<script type="text/javascript">
    function getCoords() {
        var api;
        $('#toCrop').Jcrop({
            minSize: [160, 160],
            aspectRatio: 1,
            bgOpacity: 0.4,
            addClass: 'jcrop-light',
            onSelect: updateCoords,
            onChange: updateCoords,
            setSelect: [0, 0, 160, 160]
        });
    }

    function updateCoords(c) {
        $('#x').val(c.x);
        $('#y').val(c.y);
        $('#w').val(c.w);
        $('#h').val(c.h);
    }
    ;

    function _(element) {
        if (document.getElementById(element))
            return document.getElementById(element);
        else
            return false;
    }

    function submitForm() {
        if (_('arquivo').files[0]) {//Se houver um arquivo, faremos alguns testes no mesmo
            var arquivo = _('arquivo').files[0];
            if (arquivo.type != 'image/png' && arquivo.type != 'image/jpeg')
                _('result').innerHTML = 'Por favor, selecione uma imagem do tipo JPEG ou PNG';
            else if (arquivo.size > 1024 * 2048)//2MB
                _('result').innerHTML = 'Por favor selecione uma image mo máximo 2MB de tamanho.';
            else {
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
                if (_('imgType')) {
                    var imgType = _('imgType').value;
                    formData.append('imgType', imgType);
                }
                if (_('imgName')) {
                    var imgName = _('imgName').value;
                    formData.append('imgName', imgName);
                }
                var request = new XMLHttpRequest();
                if (_('toCrop'))
                    var includeFile = 'recebeFile.php';
                else
                    var includeFile = 'recebeFile.php';
                request.open('post', includeFile, true);
                request.onreadystatechange = function () {
                    if (request.readyState == 4 && request.status == 200)
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