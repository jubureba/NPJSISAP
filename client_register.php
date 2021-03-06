<?php
require_once("pages/config/conn_pdo.php");
ini_set('default_charset', 'UTF-8');
error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);
session_start();
include("pages/login/seguranca.php"); // Inclui o arquivo com o sistema de segurança
protegePagina(); // Chama a função que protege a página
$conn = Conectar();
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
    <link rel="stylesheet" type="text/css" href="dist/css/component.css"/> <!-- estilo da parte de upload -->
    <link rel="stylesheet" href="dist/css/radio_style.css">   <!-- estilo da parte de upload -->
    <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
    <link rel="stylesheet" href="dist/css/form_Style.css">
    <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
    <script src="js/html5shiv.min.js"></script>
    <script src="js/respond.min.js"></script>
    <script language="JavaScript" type="text/javascript" src="js/cidades-estados-1.4-utf8.js"></script>
    <script language="JavaScript" type="text/javascript" src="js/valida_cpf_cnpj.js"></script>

    <!--cidades e estados -->


</head>


<body class="hold-transition skin-blue sidebar-mini">

<div class="wrapper">

    <?php include('pages/Menu/topo.php'); ?>
    <?php include('pages/Menu/menuLateral.php'); ?>


    <div class="content-wrapper">
        <section class="content-header">

            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Tela de Cadastro</li>
            </ol>
            <br/>
        </section>

        <!-- Main content -->
        <section class="content">

            <!-- ################### FORMULARIO DE CADASTRO ############################-->
            <form class="contact_form" id="form-cad" method="post" name="form1" action="pages/cadastro/pessoa/cad_pessoa.php" >

                <!-- PESQUISAR USUARIO JÁ CADASTRADO -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="box box-primary box-solid collapsed-box">
                            <div class="box-header with-border" align="center">
                                <h3 class="box-title">Pesquisar/Editar Cadastro</h3>
                                <div class="box-tools pull-right">
                                    <button type="button" onclick="botaoEditar(document.getElementById('teste1').className);" class="btn btn-box-tool" data-widget="collapse"><i id="teste1" class="fa fa-plus"></i></button>
                                </div><!-- /.box-tools -->
                            </div>
                            <div class="box-body" id="bott" style="display: none;">
                                <div style="color: red" align="center">*Para Editar um cadastro, deixe essa guia aberta*</div><br/>

                                <div class="col-md-6">
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-user"></i>
                                        </div>
                                        <?php
                                        $b_nome_cpf=$conn->prepare("SELECT * FROM pessoas");
                                        $b_nome_cpf->execute(); ?>
                                        <select style="width: 100%" onchange="teste(this.value);" name="teste" class="form-control select2" id="nome_Pessoa">
                                            <option  value="" selected="selected" disabled>Pesquisar por Nome</option><?php
                                            while($linha=$b_nome_cpf->fetch(PDO::FETCH_ASSOC)){ ?>
                                                <option  value="<?php echo $linha['nome'];?>" ><?php echo $linha['nome'];?></option>
                                            <?php  }   ?>
                                        </select>
                                    </div>
                                    <br/>
                                </div>

                                <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js"></script>

                                <script type="text/javascript">
                                    $(document).ready(function(){
                                        $("select[name='teste']").change(function(){
                                            var $nome = $("input[name='nome']");
                                            var $nomeMenor = $("input[name='NomeMenor']");
                                            var $nomePai = $("input[name='nomePai']");
                                            var $nomeMae = $("input[name='nomeMae']");

                                            var $cep_residencial = $("input[name='cep-residencial']");
                                            var $pais_residencial = $("input[name='pais-residencial']");
                                            var $estado_residencial = $("input[name='estado-residencial']");
                                            var $city_residencial = $("input[name='city-residencial']");
                                            var $end_residencial_bairro = $("input[name='end-residencial-bairro']");
                                            var $end_residencial_rua = $("input[name='end-residencial-rua']");

                                            document.getElementById("loading_identificacao").setAttribute("class", "overlay");
                                            document.getElementById("loading_identificacao").innerHTML="<i class='fa fa-refresh fa-spin'></i>";
                                            document.getElementById("loading_nacionalidade").setAttribute("class", "overlay");
                                            document.getElementById("loading_nacionalidade").innerHTML="<i class='fa fa-refresh fa-spin'></i>";
                                            document.getElementById("loading").setAttribute("class", "overlay");
                                            document.getElementById("loading").innerHTML="<i class='fa fa-refresh fa-spin'></i>";
                                            setTimeout(function() {

                                                document.getElementById("loading_identificacao").setAttribute("class", "");
                                                document.getElementById("loading_identificacao").innerHTML="<i class=''></i>";
                                                document.getElementById("loading_nacionalidade").setAttribute("class", "");
                                                document.getElementById("loading_nacionalidade").innerHTML="<i class=''></i>";
                                                document.getElementById("loading").setAttribute("class", "");
                                                document.getElementById("loading").innerHTML="<i class=''></i>";

                                            }, 1500);
                                            $.getJSON(
                                                'function.php',
                                                {nome: $(this).val()},
                                                function (json) {
                                                    $nome.val(json.nome);
                                                    $nomeMenor.val(json.nomeMenor);
                                                    $nomePai.val(json.nomePai);
                                                    $nomeMae.val(json.nomeMae);
                                                    
                                                    $cep_residencial.val(json.cep);
                                                    $pais_residencial.val(json.pais);
                                                    $estado_residencial.val(json.estado);
                                                    $city_residencial.val(json.cidade);
                                                    $end_residencial_bairro.val(json.bairro);
                                                    $end_residencial_rua.val(json.rua);
                                                }
                                            );

                                        });
                                    });
                                </script>

                                <div class="col-md-6">
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-user"></i>
                                        </div>
                                        <?php
                                        $b_nome_cpf=$conn->prepare("SELECT * FROM pessoas");
                                        $b_nome_cpf->execute(); ?>

                                        <select style="width: 100%" class="form-control select2" id="cpf_Pessoa">
                                            <option  value="" selected="selected" disabled>Pesquisar por CPF</option><?php
                                            while($linha=$b_nome_cpf->fetch(PDO::FETCH_ASSOC)){ ?>
                                                <option value="<?php echo $linha['idPessoa'];?>"><?php echo $linha['cpf'];?></option>
                                            <?php } ?>
                                        </select>

                                    </div>
                                    <br/>
                                </div>

                            </div><!-- /.box-body -->
                        </div>
                    </div>
                </div>

                <script>

                    function botaoEditar(stats) {
                        if(stats=="fa fa-plus"){
                            document.getElementById("b_submit_editar").style.display="block";

                        }else if(stats == "fa fa-minus"){
                            document.getElementById("b_submit_editar").style.display="none";
                            document.getElementById("b_submit").style.display="block";
                        }
                    }
                </script>


                <!-- IDENTIFICAÇÃO PARTE 1 ---------------------------------------------------->
                <div class="row">
                    <div class="col-md-12">
                        <div class="box box-primary box-solid">
                            <div id="box-id" class="box-header with-border">
                                <div align="center"> <h3 class="box-title">Identificação</h3></div>
                                <div class="box-tools pull-right">
                                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i id="identificacao_button" class="fa fa-minus"></i></button>
                                </div><!-- /.box-tools -->
                            </div><!-- /.box-header -->
                            <div class="box-body">
                                <div class="col-md-6">
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-user"></i>
                                        </div>

                                        <input class="form-control" required id="nome" name="nome" type="text"
                                               placeholder="Nome Completo">
                                    </div>
                                    <br/>
                                </div>

                                <div class="col-md-6">
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-male"></i>
                                        </div>
                                        <input class="form-control" id="NomeMenor" name="NomeMenor" type="text"
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
                            </div><!-- /.box-body -->
                            <div id="loading_identificacao"></div>
                        </div><!-- /.box -->
                    </div><!-- /.col -->
                </div>



                <!-- NATURALIDADE/NACIONALIDADE -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="box box-primary box-solid">
                            <div class="box-header with-border">
                                <div align="center"> <h3 class="box-title">Naturalidade/Nacionalidade</h3></div>
                                <div class="box-tools pull-right">
                                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                                </div><!-- /.box-tools -->
                            </div><!-- /.box-header -->
                            <div class="box-body">
                                <div class="col-md-12">
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-location-arrow"></i>
                                        </div>
                                        <input class="form-control" value="Brasil" name="pais-naturalidade"
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
                            </div><!-- /.box-body -->
                            <div id="loading_nacionalidade"></div>
                        </div><!-- /.box -->
                    </div><!-- /.col -->
                </div>


                <!--ENDEREÇO RESIDENCIAL-->
                <div class="row">
                    <div class="col-md-12">
                        <div class="box box-primary box-solid">
                            <div class="box-header with-border">
                                <div align="center"> <h3 class="box-title">Endereço Residencial</h3></div>
                                <div class="box-tools pull-right">
                                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                                </div><!-- /.box-tools -->
                            </div><!-- /.box-header -->
                            <div class="box-body">
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

                                <script type="text/javascript" src="js/cep-search-residencial.js"></script>
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
                            <div id="loading"></div>
                        </div>
                    </div>
                </div>




                <!-- DADOS PESSOAIS -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="box box-primary box-solid">
                            <div class="box-header with-border">
                                <div align="center"> <h3 class="box-title">Informações Pessoais</h3></div>
                                <div class="box-tools pull-right">
                                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                                </div><!-- /.box-tools -->
                            </div><!-- /.box-header -->
                            <div class="box-body">
                                <div class="col-md-6">
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-user"></i>
                                        </div>
                                        <input class="form-control" placeholder="Data de Nascimento" type="date" id="campoData2"
                                               required="required" maxlength="10" name="date"
                                               pattern="[0-9]{2}\/[0-9]{2}\/[0-9]{4}$" min="1910-01-01" max="2020-02-18"/>
                                    </div>
                                    <br/>
                                </div>

                                <div class="col-md-6">
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-user"></i>
                                        </div>
                                        <select class="form-control select2" name="escolaridade"  data-placeholder="Escolaridade" id="escolaridade">
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
                                        <input class="form-control" type="tel" required name="telefone" id="tel-residencial"
                                               placeholder="Telefone Residencial"
                                               pattern="\([0-9]{2}\)[0-9]{4}-[0-9]{4,5}"/>
                                    </div>
                                    <br/>
                                </div>
                            </div><!-- /.box-body -->
                        </div><!-- /.box -->
                    </div><!-- /.col -->
                </div>

                <!-- Informações do Trabalho -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="box box-primary box-solid">
                            <div class="box-header with-border">
                                <div align="center"> <h3 class="box-title">Endereço de Trabalho</h3></div>
                                <div class="box-tools pull-right">
                                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                                </div><!-- /.box-tools -->
                            </div><!-- /.box-header -->
                            <div class="box-body">
                                <div class="box-body">
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
                                            <input class="form-control" id="dinheiro" name="Remuneracao" type="text"
                                                   placeholder="Remuneração">
                                        </div>
                                        <br/>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-user"></i>
                                            </div>
                                            <input class="form-control" name="cep-work" id="cep-work" type="text"
                                                   placeholder="CEP" size="10" maxlength="9" onblur="pesquisacep_work(this.value)">
                                        </div>
                                        <br/>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-location-arrow"></i>
                                            </div>
                                            <input class="form-control" value="" id="pais-work" name="pais-work"
                                                   type="text" placeholder="País">
                                        </div>
                                        <br/>
                                    </div>

                                    <script type="text/javascript" src="js/cep-search-work.js"></script>
                                    <!-- ESTADO -->

                                    <div class="col-md-6">
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-check"></i>
                                            </div>
                                            <select class="form-control select2" name="estado-work"
                                                    id="estado-work"></select>
                                        </div>
                                        <br/>
                                    </div>

                                    <!--CIDADE-->
                                    <div class="col-md-6">
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-street-view"></i>
                                            </div>
                                            <select class="form-control select2" name="city-work" id="city-work"
                                                    data-placeholder="Cidade"></select>
                                        </div>
                                        <br/>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-user"></i>
                                            </div>
                                            <input class="form-control" name="end-work-bairro" id="end-work-bairro"
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
                                            <input class="form-control" name="end-work-rua" id="end-work-rua"
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
                                </div>

                            </div><!-- /.box-body -->
                            <div id="loading-work"></div>
                        </div><!-- /.box -->
                    </div><!-- /.col -->
                </div>

                <input type="text" id="cpf_real" name="cpf_real" hidden/>
                <input type="text" id="rg_real" name="rg_real" hidden/>
                <input type="text" id="ctps_real" name="ctps_real" hidden/>
                <input type="text" id="cert_nasc_real" name="cert_nasc_real" hidden/>

                <script>
                    function cpf_real(valor) {
                        $("#cpf_real").val(""+valor);
                    }
                    function rg_real(valor) {
                        $("#rg_real").val(""+valor);
                    }
                    function ctps_real(valor) {
                        $("#ctps_real").val(""+valor);
                    }
                    function cert_nasc_real(valor) {
                        $("#cert_nasc_real").val(""+valor);
                    }

                </script>
                
            </form>


            <!-- UPLOAD DE ARQUIVOS ---------------------------------------------------->
            <div class="row">
                <div class="col-md-12">
                    <div class="box box-primary box-solid">
                        <div class="box-header with-border">
                            <div align="center"> <h3 class="box-title">Documentação</h3></div>
                            <div class="box-tools pull-right">
                                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                            </div><!-- /.box-tools -->
                        </div><!-- /.box-header -->
                        <div class="box-body">
                            <?php include("pages/cadastro/pessoa/table_upload.php"); ?>
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
                            <div class="box-tools pull-right">
                                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                            </div><!-- /.box-tools -->
                        </div><!-- /.box-header -->
                        <div class="box-body">
                            <span class="input-group-btn">
                            <button type="submit" onclick="$('#form-cad').submit();" id="b_submit" name="Submit"
                                    class="btn btn-primary">Cadastrar Novo
                            </button>

                                <button type="submit" id="b_submit_editar" name="Submit_editar"
                                        class="btn btn-primary" style="display: none;">Salvar Cadastro
                                </button>

                            </span>
                            
                        </div><!-- /.box-body -->
                    </div><!-- /.box -->
                </div><!-- /.col -->
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
<script src="js/jquery.maskMoney.js"></script>
<script src="js/moment.min.js"></script>
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
    $("#cep-residencial").mask("00000-000");
    $("#cep-work").mask("00000-000");
    $("#valor-cpf").mask("000.000.000-00");
    $("#tel-residencial").mask("(00)0000-00009");
</script>
<script>
    $(function () {
        $(".select2").select2();
    });
</script>
<script>
    $(document).ready(function() { $("#estado-civil").select2(); });
    $(document).ready(function() { $("#escolaridade").select2(); });
    new dgCidadesEstados({
        cidade: document.getElementById('city-naturalidade'),
        estado: document.getElementById('estado-naturalidade'),
        estadoVal: 'PA',
        cidadeVal: 'Castanhal'
    });
    new dgCidadesEstados({
        cidade: document.getElementById('city-residencial'),
        estado: document.getElementById('estado-residencial'),
        estadoVal: 'PA',
        cidadeVal: 'Castanhal'
    });
    new dgCidadesEstados({
        cidade: document.getElementById('city-work'),
        estado: document.getElementById('estado-work'),
        estadoVal: 'PA',
        cidadeVal: 'Castanhal'
    });


    $(".js-data-example-ajax").select2({
        ajax: {
            url: "https://api.github.com/search/repositories",
            dataType: 'json',
            delay: 250,
            data: function (params) {
                return {
                    q: params.term, // search term
                    page: params.page
                };
            },
            processResults: function (data, params) {
                // parse the results into the format expected by Select2
                // since we are using custom formatting functions we do not need to
                // alter the remote JSON data, except to indicate that infinite
                // scrolling can be used
                params.page = params.page || 1;

                return {
                    results: data.items,
                    pagination: {
                        more: (params.page * 30) < data.total_count
                    }
                };
            },
            cache: true
        },
        escapeMarkup: function (markup) { return markup; }, // let our custom formatter work
        minimumInputLength: 1,
        templateResult: formatRepo, // omitted for brevity, see the source of this page
        templateSelection: formatRepoSelection // omitted for brevity, see the source of this page
    });




</script>

<script type="text/javascript">
    $(function(){
        $("#dinheiro").maskMoney();
    })
</script>
<script src="pages/cadastro/pessoa/upload/scripts/script-cpf-upload.js"></script>
<script src="pages/cadastro/pessoa/upload/scripts/script-rg-upload.js"></script>
<script src="pages/cadastro/pessoa/upload/scripts/script-ctps-upload.js"></script>
<script src="pages/cadastro/pessoa/upload/scripts/script-contracheque-upload.js"></script>
<script src="pages/cadastro/pessoa/upload/scripts/script-casamento-upload.js"></script>
<script src="pages/cadastro/pessoa/upload/scripts/script-nascimento-upload.js"></script>
<script src="pages/cadastro/pessoa/upload/scripts/script-residencia-upload.js"></script>
<script src="pages/cadastro/pessoa/upload/scripts/script-obito-upload.js"></script>


</body>
</html>

