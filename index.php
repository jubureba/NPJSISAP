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
    <title>NPJ | Tela Principal</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <link rel="shortcut icon" href="imagens/logoSisAp.ico" type="image/x-icon"/>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link href="http://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="dist/ionicons-2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
    <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="plugins/iCheck/flat/blue.css">
    <link rel="stylesheet" href="plugins/morris/morris.css">
    <link rel="stylesheet" href="plugins/jvectormap/jquery-jvectormap-1.2.2.css">
    <link rel="stylesheet" href="plugins/datepicker/datepicker3.css">
    <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker-bs3.css">
    <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
    <link href="http://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker-bs3.css">
    <link rel="stylesheet" href="plugins/iCheck/all.css">
    <link rel="stylesheet" href="plugins/colorpicker/bootstrap-colorpicker.min.css">

    <link rel="stylesheet" href="plugins/timepicker/bootstrap-timepicker.min.css">
    <link rel="stylesheet" href="plugins/select2/select2.min.css">
    <link rel="stylesheet" href="dist/css/form_Style.css">
    <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
    <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
    <link rel="stylesheet" type="text/css" href="dist/css/m2br.dialog.css"/>
    <script language="JavaScript" type="text/javascript" src="js/cidades-estados-1.4-utf8.js"></script> <!--cidades e estados -->
    <script src="js/html5shiv.min.js"></script>
    <script src="js/respond.min.js"></script>
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="script.js"></script>


    <script type="text/javascript" src="js/paginador-tab-proc.js"></script>
    <script type="text/javascript" src="js/paginador-tab-new-proc.js"></script>
    <script type="text/javascript" src="js/mensagens.js"></script>
    <script type="text/javascript" src="js/delete-msg.js"></script>
    <script type="text/javascript" src="js/popover.js"></script>


    <script type="text/javascript" language="javascript" src="plugins/jQuery/jquery-1.3.2.js"></script>
    <!--  <script type="text/javascript">
          $(document).ready(function () {
             $("#novo_usuario").click(function (evt) {
                 evt.preventDefault();
                 var href =  $(this).attr('href');
                 $.ajax({

                      type: "POST",
                      url: href,
                      //data: "",
                      beforeSend: function () {

                      },
                      success: function (data) {

                          $("#principal").html(data);

                      }

                 });
             });
          });
      </script> -->

    <script>
        function cadastrarEducacao() {
            novaEducacao(2);
            var form = document.getElementById("msgPerfil");
            var aviso = '<p id="lblAviso"><img src="pages/coleta_dados/NPJ/ajax-loader.gif" > Salvando...</p>';
            var destino = $('#msgPerfil');
            destino.append(aviso);
            setTimeout(function () {
                $('#lblAviso').remove();
                window.location = 'pages/cadastro/usuario/nova_Educacao.php';
            }, 5000);
        }
    </script>

    <script>
        function novaEducacao(valor) {
            var form = document.getElementById("formCad");
            if ((form.style.display == "none") && (valor == 1)) {
                form.style.display = "block";
            }
            if (valor == 2) {
                form.style.display = "none";
            }
        }
    </script>

    <script>
        function novaHabilidade(valor1) {
            var form = document.getElementById("formHab");
            if ((valor1 == 1) && (form.style.display == "none")) {
                form.style.display = "block";
            }
            if (valor1 == 2) {
                form.style.display = "none";
            }
        }
    </script>

    <script>
        function CadastrarHabilidade() {
            novaHabilidade(2);
            var form = document.getElementById("msgHabilidade");
            var aviso = '<p id="lblAviso"><img src="pages/coleta_dados/NPJ/ajax-loader.gif" > Salvando...</p>';
            var destino = $('#msgHabilidade');
            destino.append(aviso);
            setTimeout(function () {
                $('#lblAviso').remove();
                window.location = 'pages/cadastro/usuario/nova_Habilidade.php';
            }, 5000);
        }
    </script>

    <script>
        function cadastrarNota() {
            novaEducacao(2);
            var form = document.getElementById("msgNota");
            var aviso = '<p id="lblAviso"><img src="pages/coleta_dados/NPJ/ajax-loader.gif" > Salvando...</p>';
            var destino = $('#msgPerfil');
            destino.append(aviso);
            setTimeout(function () {
                $('#lblAviso').remove();
                window.location = 'pages/cadastro/usuario/nova_nota.php';
            }, 5000);
        }
    </script>

    <script>
        function novaNota(valor2) {
            var form = document.getElementById("formNota");
            if ((form.style.display == "none") && (valor2 == 1)) {
                form.style.display = "block";
            }
            if (valor2 == 2) {
                form.style.display = "none";
            }
        }
    </script>
</head>


<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
    <?php include('pages/Menu/topo.php'); ?>
    <?php include('pages/Menu/menuLateral.php'); ?>

    <!-- ####################### INICIO DO MENU - PARTE DO MEIO ####################### -->

    <div id="principal">
        <div class="content-wrapper" >
            <section class="content">

                <!--***************************************************
                *******************************************************
                *******************************************************
                ***********************TABELA**************************
                *******************************************************
                *******************************************************
                *******************************************************
                -->
                <?php include("pages/config/tab-processos-index.php"); ?>

               

                <!--***************************************************
                *******************************************************
                *******************************************************
                ***********************MENSAGENS***********************
                *******************************************************
                *******************************************************
                *******************************************************
                 -->
                <div class="row">

                <?php include("pages/config/mensagens-index.php"); ?>
                <?php include("pages/config/tab-new-processos.php"); ?>
                <?php include("pages/config/slider.php"); ?>

                </div>

            </section>
        </div>


        <!-- /.content -->

        <!-- FIM DO MENU - PARTE DO MEIO  -->
    </div>
    <!-- /.content-wrapper -->

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
                                                    <button type="button" onclick="submitForm()"
                                                            class="btn btn-info btn-flat">
                                                        Enviar Imagem
                                                    </button>
                                                </span>
                            </div>

                            <output id="result"></output>
                            <!-- FIM IMAGEM --><br/>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-default">Salvar Nova Foto de Perfil
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
</div>
</div>
<!-- ./wrapper -->

<!-- jQuery 2.1.4 -->
<script src="plugins/jQuery/jQuery-2.1.4.min.js"></script>
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
                _('result').innerHTML = '<img src="imagens/loader.gif" />';
            }
        }
        else
            _('result').innerHTML = 'Por favor, selecione uma imagem para ser enviada!';
    }
</script>

<script>
    $.widget.bridge('uibutton', $.ui.button);
</script>
<script src="plugins/jQuery/jQuery-2.1.4.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
<script src="plugins/select2/select2.min.js"></script>
<script type="text/javascript">
    $(".select2").select2();
</script>
<script src="plugins/input-mask/jquery.inputmask.js"></script>
<script src="plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="plugins/input-mask/jquery.inputmask.extensions.js"></script>
<script src="js/raphael-min.js"></script>
<script src="plugins/colorpicker/bootstrap-colorpicker.min.js"></script>
<script src="plugins/timepicker/bootstrap-timepicker.min.js"></script>
<script src="plugins/iCheck/icheck.min.js"></script>
<script src="plugins/fastclick/fastclick.min.js"></script>
<script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
<script src="plugins/morris/morris.min.js"></script>
<script src="plugins/sparkline/jquery.sparkline.min.js"></script>
<script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<script src="plugins/knob/jquery.knob.js"></script>
<script src="js/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<script src="plugins/datepicker/bootstrap-datepicker.js"></script>
<script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
<script src="plugins/fastclick/fastclick.min.js"></script>
<script src="dist/js/app.min.js"></script>
<script src="dist/js/pages/dashboard.js"></script>
<script src="js/pesquisar-tabela.js"></script>
<script src="dist/js/demo.js"></script>
<script language='JavaScript'>
    imagenes = new Array(2)
    imagenes[0] = "<a href='#' title='Clique para subir'><img border='0' src='imagens/up-arrow.png' style='position:fixed; bottom:0; right:0;'/></a>"
    imagenes[1] = "<a href='#' title='Clique para subir'><img border='0' src='imagens/up-arrow.png' style='position:fixed; bottom:0; right:0;'/></a>"
    aleatorio = Math.random() * (imagenes.length)
    aleatorio = Math.floor(aleatorio)
    document.write(imagenes[aleatorio])
</script>
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
    window.onload = function(){
        $(".clk").on("click", function(){
            var id = $(this).attr("data-id");
            //alert(id);
            //ativa popup modal
            $("#modal").show();
            $("#modal #delmsg").attr("data-id", id);

            //agora que ativou o popup modal...
            $("#delmsg").on("click", function(){
                window.location.href = "deletamensagem.php?idmsg="+id+"";
            });
            return false;
        });
    }
</script>


</body>
</html>