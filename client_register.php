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
    <script language="JavaScript" type="text/javascript" src="js/cidades-estados-1.4-utf8.js"></script>
    <!--cidades e estados -->


</head>


<body class="hold-transition skin-blue sidebar-mini">

<div class="wrapper">

    <?php include('pages/Menu/topo.php'); ?>
    <?php include('pages/Menu/menuLateral.php'); ?>


    <div class="content-wrapper">
        <section class="content-header">
            <h1>CADASTRAR NOVO USUÁRIO
                <small>Painel de Controle</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Tela de Cadastro</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">

            <!-- ################### FORMULARIO DE CADASTRO ############################-->
            <form class="contact_form" method="post" name="form1" action="pages/coleta_dados/NPJ/cadastro.php">
                <div class="box box-primary">
                    <div class="box-header">

                        <!-- IDENTIFICAÇÃO PARTE 1 ---------------------------------------------------->
                        <h3 class="box-title">I- Identificação</h3><br/>
                        <hr>

                        <div class="col-md-6">
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-user"></i>
                                </div>

                                <input class="form-control" required name="nome" type="text"
                                       placeholder="Nome Completo">
                            </div>
                            <br/>
                        </div>

                        <div class="col-md-6">
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-male"></i>
                                </div>
                                <input class="form-control" name="NomeMenor" type="text"
                                       placeholder="Nome do Menor">
                            </div>
                            <br/>
                        </div>

                        <div class="col-md-6">
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-users"></i>
                                </div>
                                <input class="form-control" name="nomePai" type="text" placeholder="Nome do Pai">
                            </div>
                            <br/>
                        </div>

                        <div class="col-md-6">
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-users"></i>
                                </div>
                                <input class="form-control" name="nomeMae" type="text" placeholder="Nome da Mãe">
                            </div>
                            <br/>
                        </div>
                    </div>
                </div>


                <!-- NATURALIDADE/NACIONALIDADE -->
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">II- NATURALIDADE/NACIONALIDADE</h3><br/>
                        <hr>

                        <div class="col-md-12">
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-location-arrow"></i>
                                </div>
                                <input class="form-control" value="" name="pais-naturalidade"
                                       type="text" placeholder="País">
                            </div>
                            <br/>
                        </div>
                        <!-- ESTADO -->
                        <div class="col-md-6">
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-check"></i>
                                </div>
                                <select class="form-control select2" name="estado-naturalidade" id="estado-naturalidade"
                                        data-placeholder="Estado"></select>
                            </div>
                            <br/>
                        </div>
                        <!--CIDADE-->
                        <div class="col-md-6">
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-street-view"></i>
                                </div>
                                <select class="form-control select2" name="city-naturalidade" id="city-naturalidade"
                                        data-placeholder="Cidade"></select>
                            </div>
                            <br/>
                        </div>
                    </div>
                </div>

                <div class="box box-primary">
                    <div class="box-header">

                        <h3 class="box-title">III- ENDEREÇO ATUAL</h3><br/>
                        <hr>
                        <div class="col-md-6">
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-user"></i>
                                </div>
                                <input class="form-control" name="cep-residencial" id="cep-residencial" type="text"
                                       placeholder="CEP" size="10" maxlength="9" onblur="pesquisacep(this.value)">
                            </div>
                            <br/>
                        </div>
                        <div class="col-md-6">
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-location-arrow"></i>
                                </div>
                                <input class="form-control" value="" id="pais-residencial" name="pais-residencial"
                                       type="text" placeholder="País">
                            </div>
                            <br/>
                        </div>

                        <script type="text/javascript" src="js/form-cep-consult.js"></script>
                        <!-- ESTADO -->
                        <div class="col-md-6">
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-check"></i>
                                </div>
                                <select class="form-control select2" name="estado-residencial"
                                        id="estado-residencial"></select>
                            </div>
                            <br/>
                        </div>
                        <!--CIDADE-->
                        <div class="col-md-6">
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-street-view"></i>
                                </div>
                                <select class="form-control select2" name="city-residencial" id="city-residencial"
                                        data-placeholder="Cidade"></select>
                            </div>
                            <br/>

                        </div>

                        <div class="col-md-6">
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-user"></i>
                                </div>
                                <input class="form-control" name="end-residencial-bairro" id="end-residencial-bairro"
                                       type="text"
                                       placeholder="Endereço Residencial">
                            </div>
                            <br/>
                        </div>
                        <div class="col-md-6">
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-user"></i>
                                </div>
                                <input class="form-control" name="end-residencial-rua" id="end-residencial-rua"
                                       type="text"
                                       placeholder="Endereço Residencial">
                            </div>
                            <br/>
                        </div>

                    </div>
                </div>

                <!-- DADOS PESSOAIS -->
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">IV- DADOS PESSOAIS</h3><br/>
                        <hr>

                        <div class="col-md-6">
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-user"></i>
                                </div>
                                <input class="form-control" placeholder="Data de Nascimento" type="date" id="campoData2"
                                       required="required" maxlength="10" name="date"
                                       pattern="[0-9]{2}\/[0-9]{2}\/[0-9]{4}$" min="2012-01-01" max="2020-02-18"/>
                            </div>
                            <br/>
                        </div>

                        <div class="col-md-6">
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-user"></i>
                                </div>
                                <select class="form-control select2" name="escolaridade" data-placeholder="Escolaridade" id="escolaridade">
                                    <option selected disabled="disabled">Escolaridade</option>
                                    <option value="infantil">Educação Infantil</option>
                                    <option value="fundamental">Ensino Fundamental</option>
                                    <option value="edJovensAdultos">Educação de Jovens e Adultos</option>
                                    <option value="tecnico">Ensino Técnico | Pós-Médio</option>
                                    <option value="superior">Ensino Superior | Tecnológico | Licenciatura | Bacharelado</option>
                                    <option value="posgraduacao">Pós-Graduação | Especialização</option>
                                    <option value="mestrado">Mestrado</option>
                                    <option value="doutorado">Doutorado</option>
                                    <option value="posdoutorado">Pós-Doutorado</option>
                                </select>
                            </div>
                            <br/>
                        </div>


                        <div class="col-md-6">
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-user"></i>
                                </div>

                                <select class="form-control select2" name="estado-civil" data-placeholder="Estado Civil" id="estado-civil">
                                    <option selected disabled="disabled">Estado Civil</option>
                                    <option value="solteiro">Solteiro(a)</option>
                                    <option value="casado">Casado(a)</option>
                                    <option value="divorciado">Divorciado(a)</option>
                                    <option value="viuvo">Viúvo(a)</option>
                                    <option value="separado">Separado(a)</option>
                                    <option value="companheiro">Companheiro(a)</option>

                                </select>
                            </div>
                            <br/>
                        </div>

                        <div class="col-md-6">
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-user"></i>
                                </div>
                                <input class="form-control" required name="Profissao" type="text"
                                       placeholder="Profissão">
                            </div>
                            <br/>
                        </div>


                        <div class="col-md-6">
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-user"></i>
                                </div>
                                <input class="form-control" type="tel" required name="telefone" id="tel"
                                       placeholder="Telefone Residencial"
                                       pattern="\([0-9]{2}\)[0-9]{4}-[0-9]{4,5}"/>
                            </div>
                            <br/>
                        </div>
                        <div class="col-md-6">
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-user"></i>
                                </div>
                                <input class="form-control" required name="EnderecoTrabalho" type="text"
                                       placeholder="Endereço do Trabalho">
                            </div>
                            <br/>
                        </div>
                        <div class="col-md-6">
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-user"></i>
                                </div>
                                <input class="form-control" name="cidadeTrabalho" type="text"
                                       placeholder="Cidade do Trabalho">
                            </div>
                            <br/>
                        </div>
                        <div class="col-md-6">
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-user"></i>
                                </div>

                                <input class="form-control" name="telefoneTrabalho" type="tel" id="telTrab"
                                       placeholder="Telefone do Trabalho"
                                       pattern="\([0-9]{2}\)[0-9]{4}-[0-9]{4,5}"/>

                            </div>
                            <br/>
                        </div>
                        <div class="col-md-6">
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-user"></i>
                                </div>
                                <input class="form-control" name="situacaoHabitacional" type="text"
                                       placeholder="Situação Habitacional">
                            </div>
                            <br/>
                        </div>


                        <div class="col-md-6">
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-user"></i>
                                </div>
                                <input class="form-control" id="dinheiro" name="Remuneracao" type="text"
                                       placeholder="Remuneração">
                            </div>
                            <br/>
                        </div>
                    </div>
                </div>

                <div class="box box-primary">
                    <div class="box-header">

                        <!-- HISTORICO/RELATORIO ---------------------------------------------------->
                        <h3 class="box-title">II- Histórico/Relatório</h3><br/><br/>
                        <div class="form-group">
                            <textarea class="form-control" placeholder="HistoricoRelatorio" rows="5" name="assunto"
                                      style="width: 975px; height: 68px;"></textarea>
                        </div>

                    </div>
                </div>
            </form>


            <!-- UPLOAD DE ARQUIVOS ---------------------------------------------------->
            <div class="row">
                <div class="col-md-12">
                    <div class="box box-primary">
                        <div class="box-header">
                            <h3 class="box-title">III- Coleta de Documentos</h3>
                            <hr>
                        </div>
                        <div class="box-body">
                            <?php include("pages/coleta_dados/NPJ/table_upload.php"); ?>
                        </div><!-- /.box-body -->
                    </div><!-- /.box -->
                </div><!-- /.col (left) -->
            </div><!-- /.col (right) -->


            <!--4 - MEDIDAS JURIDICAS CABIVEIS -->

            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title">IV- Medidas Jurídicas Cabíveis</h3><br/>
                    <hr>
                    <?php include("pages/coleta_dados/NPJ/table_documentos.php"); ?>
                </div>
            </div>

            <!--5 - INFORMAÇÕES SOBRE A PARTE CONTRÁRIA -->

            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title">V- Informações sobre a Parte Contrária</h3><br/>

                    <hr>

                    <div class="col-md-6">
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-user"></i>
                            </div>

                            <input class="form-control" name="nomeContraria" type="text"
                                   placeholder="Nome">
                        </div>
                        <br/>
                    </div>

                    <div class="col-md-6">
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-user"></i>
                            </div>
                            <input class="form-control" name="EnderecoResContraria" type="text"
                                   placeholder="Endereço Residencial">
                        </div>
                        <br/>
                    </div>

                    <div class="col-md-6">
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-user"></i>
                            </div>
                            <input class="form-control" name="telContraria" type="text"
                                   placeholder="Telefone">
                        </div>
                        <br/>
                    </div>

                    <div class="col-md-6">
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-user"></i>
                            </div>
                            <input class="form-control" name="cpfContraria" type="text"
                                   placeholder="CPF">
                        </div>
                        <br/>
                    </div>

                    <div class="col-md-6">
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-user"></i>
                            </div>
                            <input class="form-control" name="rgContraria" type="text"
                                   placeholder="RG">
                        </div>
                        <br/>
                    </div>

                    <div class="col-md-6">
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-user"></i>
                            </div>
                            <input class="form-control" name="profissaoContraria" type="text"
                                   placeholder="Profissão">
                        </div>
                        <br/>
                    </div>

                    <div class="col-md-6">
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-user"></i>
                            </div>
                            <input class="form-control" name="rzSocialContraria" type="text"
                                   placeholder="Razão Social da Empresa">
                        </div>
                        <br/>
                    </div>

                    <div class="col-md-6">
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-user"></i>
                            </div>
                            <input class="form-control" name="cnpjContraria" type="text"
                                   placeholder="CNPJ da Empresa">
                        </div>
                        <br/>
                    </div>

                    <div class="col-md-6">
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-user"></i>
                            </div>
                            <input class="form-control" name="endProfissionalContraria" type="text"
                                   placeholder="Endereço Profissional">
                        </div>
                        <br/>
                    </div>

                    <div class="col-md-6">
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-user"></i>
                            </div>
                            <input class="form-control" name="infAddContraria" type="text"
                                   placeholder="Informações Adicionais">
                        </div>
                        <br/>
                    </div>


                </div>
            </div>


            <div class="box box-primary">
                <div class="box-header">
                        <span class="input-group-btn">
                            <button type="submit" onclick="document.form1.submit()" name="Submit"
                                    class="btn btn-primary">Cadastrar
                            </button>
                        </span>

                    <br/>
                    <br/>
                    redireciona para pagina com os dados do usuario com opcao de download dos documentos
                    </br>

                </div>
            </div>


        </section><!-- /.content -->

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
    jQuery(function ($) {
        $("#campoData").mask("99/99/9999");
        $("#campoData2").mask("99/99/9999");
    });
</script>
<script type="text/javascript" src="plugins/mask/jquery.mask.min.js"></script>
<script type="text/javascript">
    $("#txttelefone").mask("(00) 0000-00009");
</script>
<script type="text/javascript">
    $("#cep-residencial").mask("00000-000");
</script
<script>
    $(function () {
        $(".select2").select2();

    });
</script>
<script>
    $(document).ready(function() { $("#estado-civil").select2(); });
    $(document).ready(function() { $("#escolaridade").select2(); });

</script>
<script language="JavaScript" type="text/javascript" charset="utf-8">
    new dgCidadesEstados({
        cidade: document.getElementById('city-naturalidade'),
        estado: document.getElementById('estado-naturalidade'),
        estadoVal: 'PA',
        cidadeVal: 'Castanhal'
    })
</script>
<script language="JavaScript" type="text/javascript" charset="utf-8">
    new dgCidadesEstados({
        cidade: document.getElementById('city-residencial'),
        estado: document.getElementById('estado-residencial'),
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
