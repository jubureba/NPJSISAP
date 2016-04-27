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
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="shortcut icon" href="imagens/logoSisAp.ico" type="image/x-icon"/>
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
    <link rel="stylesheet" href="dist/css/form_Style.css">
    <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
    <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
    <link rel="stylesheet" type="text/css" href="dist/css/m2br.dialog.css"/>

    <script language="JavaScript" type="text/javascript" src="js/cidades-estados-1.4-utf8.js"></script> <!--cidades e estados -->
    <script src="js/html5shiv.min.js"></script>
    <script src="js/respond.min.js"></script>
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="script.js"></script>
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

    <!--    <section class="content-header">
            <h1>
                NPJ | System
                <small>#</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            </ol>
        </section> -->

        <!-- Main content -->
        <section class="content">

            <!-- /.box -->

            <!-- PERFIL DA TELA INICIAL -->
            <!-- Main content -->
            <section class="content">


                <div class="row">
                    <div class="col-md-3">
                        <!-- Profile Image -->

                        <!-- /.box -->

                        <!-- About Me Box -->
                        <div class="box box-primary">

                            <div class="box-body box-profile">
                                <figure class="foto-legenda">
                                    <img
                                        src="<?php echo "" . $_SESSION['imagem'] ?>"
                                        alt="Perfil de <?php echo $_SESSION['usuarioNome'] ?>"
                                        title="Perfil de <?php echo $_SESSION['usuarioNome'] ?>">
                                    <figcaption id="foto-legenda">
                                        <a href="#" onclick="TrocarFoto()" class="pull-right btn-box-tool">Trocar <i
                                                title="Editar" class="fa fa-pencil-square-o"></i></a>
                                    </figcaption>
                                </figure>

                                <script>
                                    function TrocarFoto() {
                                        $('#myModal').modal('show');
                                    }
                                </script>
                                <h3 class="profile-username text-center"><?php echo "" . $_SESSION['usuarioNome'] ?></h3>

                                <div class="text-muted text-center"><?php echo "" . $_SESSION['email'] ?></div>
                                <p class="text-muted text-center"><?php echo "" . $_SESSION['permissaoUser'] ?></p>

                            </div>


                            <div class="box-header with-border">
                                <h3 class="box-title">Sobre</h3>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <!-- EDUCAÇÃO -->
                                <strong><i id="Titulo" class="fa fa-book margin-r-5"></i>Educação</strong>
                                <a href="#" class="pull-right btn-box-tool"><i title="Editar" id="Editar-css"
                                                                               onclick="novaEducacao(1)"
                                                                               class="fa fa-pencil-square-o"></i></a><br/>


                                <!-- NOVO CADASTRO DE EDUCAÇÃO-->
                                <form id="formCad" style="display: none"
                                      action="pages/cadastro/usuario/nova_Educacao.php" method="post">

                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-user-plus"></i>
                                        </div>
                                        <input class="form-control" name="instituicao" required type="text"
                                               placeholder="Instituição"/>
                                    </div>
                                    <div class="input-group">

                                        <div class="input-group-addon">
                                            <i class="fa fa-user-plus"></i>
                                        </div>
                                        <input class="form-control" name="curso" type="text" required
                                               placeholder="Curso"/>
                                    </div>
                                 <span class="input-group-btn ">
                                        <button onclick="cadastrarEducacao()" class="btn btn-block btn-primary btn-xs">
                                            Cadastrar
                                        </button>
                                        <button type="button" onclick="novaEducacao(2)"
                                                class="btn btn-block btn-danger btn-xs">Cancelar
                                        </button>
                                 </span>
                                    <br/>
                                </form>
                                <div id="msgPerfil"></div>

                                <?php
                                $educacaoID = $_SESSION['usuarioID'];
                                $sql = "SELECT * FROM educacao_usuario WHERE idUsuario_educacao = $educacaoID ";
                                $stmt = mysql_query($sql);
                                while ($resultado = mysql_fetch_array($stmt)) {
                                    ?>
                                    <p class="text-muted">
                                        <a id="ExcluirPerfil" onclick="
                                            javascript: if (confirm('Deseja Realmente Excluir esse item?'))location.href='pages/cadastro/usuario/excluir_Educacao.php?idUsuarioEducacao=<?php echo $resultado['idEducacao']; ?>'
                                            "
                                           class="pull-right btn-box-tool"><i
                                                class="fa fa-times"></i></a>


                                        <blockquote>
                                         <p class="text-muted">



                                        <?php echo "Estuda ".$resultado['curso']." em ". $resultado['instituicao']; ?> <br/>
                                        </p>
                                        <small> <?php echo "Frequentando de 2014 a 2017" ?></small>

                                        </blockquote>
                                    </p>
                                    <hr>
                                    <?php
                                }
                                ?>
                                <!-- LOCALIDADE -->
                                <strong><i class="fa fa-map-marker margin-r-5"></i>Localização</strong><br/><br/>

                                <blockquote>
                                    <p class="text-muted"><?php echo "" . $_SESSION['cidade'] . ", " . $_SESSION['estado'] ?></p>
                                </blockquote>
                                <hr>

                                <!-- HABILIDADES -->
                                <strong><i class="fa fa-pencil margin-r-5"></i>Habilidades</strong>
                                <a href="#" class="pull-right btn-box-tool"><i title="Editar" id="Editar-css"
                                                                               onclick="novaHabilidade(1)"
                                                                               class="fa fa-pencil-square-o"></i></a><br/><br/>

                                <!-- NOVO CADASTRO DE HABILIDADE-->
                                <form id="formHab" style="display: none" method="post"
                                      action="pages/cadastro/usuario/nova_Habilidade.php">

                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-user-plus"></i>
                                        </div>
                                        <input class="form-control" name="habilidade" type="text"
                                               placeholder="Habilidade"/>
                                    </div>
                                    <div class="input-group center-block text-center ">
                                        <br/>
                                        <input type="radio" name="qualidade" value="Excelente" checked>
                                        <text color="#008054">Excelente</text>
                                        <input type="radio" name="qualidade" value="Bom">Bom
                                        <input type="radio" name="qualidade" value="Médio">Médio
                                        <input type="radio" name="qualidade" value="Ruim">Ruim

                                        <hr>
                                    </div>
                                    <span class="input-group-btn ">
                                        <button onclick="cadastrarHabilidade()"
                                                class="btn btn-block btn-primary btn-xs">
                                            Cadastrar
                                        </button>
                                        <button type="button" onclick="novaHabilidade(2)"
                                                class="btn btn-block btn-danger btn-xs">Cancelar
                                        </button>
                                    </span>
                                    <hr>
                                    <br/>
                                </form>
                                <div id="msgHabilidade"></div>

                                <?php
                                $habilidadeID = $_SESSION['usuarioID'];
                                $sql = "SELECT * FROM habilidades_usuario WHERE idUsuario_Habilidade = '$habilidadeID' ";
                                $stmt = mysql_query($sql);
                                $somador <= 1;
                                while ($resultado = mysql_fetch_array($stmt)) {
                                    $somador <= $somador + 1;
                                    ?>


                                    <span id="habilidade"
                                          class="label label-success"><?php echo "" . $resultado['habilidade'] ?>
                                    </span>

                                    <!-- ESSE SCRIPT TEM QUE FICAR DEPOIS DO SPAN PQ ELE MUDA O NOME DA CLASS -->
                                    <script type="text/javascript">
                                        var status1 = "<?php echo $resultado['qualidade']; ?>";
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

                                <strong><i class="fa fa-file-text-o margin-r-5"></i> Notas</strong>
                                <a href="#" class="pull-right btn-box-tool"><i onclick="novaNota(1)" title="Editar" id="Editar-css"
                                                                               class="fa fa-pencil-square-o"></i></a><br/><br/>

                                <!-- NOVO CADASTRO DE EDUCAÇÃO-->

                                <form id="formNota" style="display: none"
                                      action="pages/cadastro/usuario/nova_nota.php" method="post">
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-user-plus"></i>
                                        </div>

                                        <input class="form-control" name="Nota" required type="text"
                                               placeholder="Nova Nota"/>
                                    </div>

                                 <span class="input-group-btn ">
                                        <button onclick="cadastrarNota()" class="btn btn-block btn-primary btn-xs">
                                            Cadastrar
                                        </button>
                                        <button type="button" onclick="novaNota(2)"
                                                class="btn btn-block btn-danger btn-xs">Cancelar
                                        </button>
                                 </span>
                                    <br/>
                                </form>
                                <div id="msgNota"></div>


                                <?php
                                $sql = "SELECT * FROM usuario WHERE idUsuario = '$habilidadeID' ";
                                $stmt = mysql_query($sql);
                                while ($resultado = mysql_fetch_array($stmt)) { ?>
                                    <blockquote>
                                        <p class="text-muted">
                                            <?php echo "" . $resultado['Nota']; ?>
                                        </p>
                                        <small> <?php echo $resultado['autorNota']; ?></small>

                                    </blockquote>
                                <?php } ?>
                            </div>
                            <!-- /.box-body -->
                        </div>
                        <!-- /.box -->
                    </div>
                    <!-- /.col -->
                    <div class="col-md-9">
                        <!-- MENU DE STATUS - INICIO -->

                        <div class="row">
                            <div class="col-md-12">
                                <div class="box box-primary">
                                    <div class="box-header">
                                        <h3 class="box-title">Status de Ações
                                            do <?php echo "" . $_SESSION['permissaoUser'] . " " . $_SESSION['usuarioNome'] ?></h3>

                                        <div class="box-tools">
                                            <div class="input-group input-group-sm" style="width: 150px;">
                                                <input type="SEARCH" name="table_search" class="form-control pull-right"
                                                       placeholder="Search">

                                                <div class="input-group-btn">
                                                    <button type="submit" class="btn btn-default"><i
                                                            class="fa fa-search"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.box-header -->
                                    <div style="overflow: auto; height: 250px"
                                         class="box-body table-responsive no-padding">
                                        <table class="table table-hover">
                                            <tbody>
                                            <tr>

                                                <th>Protocolo</th>
                                                <th>Assistido</th>
                                                <th>Requerido</th>
                                                <th>Data</th>
                                                <th>Status</th>

                                                <th>Observação</th>
                                            </tr>
                                            <?php
                                            $nomeID = $_SESSION['usuarioID'];
                                            $sql = "SELECT * FROM atendimento_defensoria WHERE Usuario_idUsuario = '$nomeID' ";
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

                                                <tr>
                                                    <td><?php echo "" . $resultado['idAtendimento_Defensoria'] ?></td>
                                                    <td><?php echo "" . $assistido['nomeAssistidoDefensoria'] ?></td>
                                                    <td><?php echo "" . $requerido['nomeRequerido'] ?></td>
                                                    <td><?php echo date('d/m/Y', strtotime("" . $resultado['data'])) ?></td>


                                                    <td><span id="stats"
                                                              class="label label-success"><?php echo "" . $resultado['status_atendimento'] ?></span>
                                                    </td>


                                                    <script type="text/javascript">
                                                        var status = "<?php echo "".$resultado['status_atendimento'] ?>";
                                                        if (status == "aberto") {
                                                            document.getElementById("stats").setAttribute("class", "label label-primary");
                                                            document.getElementById("stats").setAttribute("id", "class1");
                                                        }
                                                        if (status == "concluído") {
                                                            document.getElementById("stats").setAttribute("class", "label label-success");
                                                            document.getElementById("stats").setAttribute("id", "class2");
                                                        }
                                                        if (status == "Não Aprovado") {
                                                            document.getElementById("stats").setAttribute("class", "label label-danger");
                                                            document.getElementById("stats").setAttribute("id", "class3");
                                                        }
                                                        if (status == "esperando aprovacao") {
                                                            document.getElementById("stats").setAttribute("class", "label label-warning");
                                                            document.getElementById("stats").setAttribute("id", "class4");
                                                        }
                                                    </script>

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
                        </div>

                        <!-- FIM - MENU DE STATUS -->


                        <div class="nav-tabs-custom">
                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#activity" data-toggle="tab">Centro de Mensagens</a></li>
                            </ul>

                            <!--######################## TELA DE MENSAGENS ################################################### -->

                            <div class="tab-content">
                                <div class="active tab-pane" id="activity">
                                    <div class="box-body">

                                        <div class="timeline-body">
                                            <div class="post">
                                                <div class="box box-solid">
                                                    <div style="overflow: auto; height: 420px" id="msgs">
                                                        <!-- BARRA DE ROLAGEM -->
                                                        <!-- VAI CRIAR UM CAMPO DE TEXTO NOVO PARA CADA MENSAGEM NO BANCO DE DADOS-->
                                                        <!-- Daqui para baixo, eu não sei o que eu fiz, mas Funcionou -->
                                                        <?php
                                                        $query = mysql_query("SELECT * FROM mensagens ORDER BY id DESC ");
                                                        $sqlData = "SELECT date_format(dataHora, '%d/%m/%Y às %H:%i') AS dataHora FROM mensagens ORDER BY id DESC";
                                                        $todosDados = "SELECT * FROM mensagens ORDER BY id DESC";
                                                        $consultaData = mysql_query($sqlData) or die(mysql_error());
                                                        $result = mysql_query($todosDados);
                                                        while (($mensagem = mysql_fetch_object($query)) && ($row = mysql_fetch_array($consultaData)) && ($dados = mysql_fetch_array($result))) {
                                                            ?>
                                                            <ul class="timeline timeline-inverse">
                                                                <li>
                                                                    <div class="timeline-item">
                                                                        <h3 class="timeline-header"><a href="#">
                                                                                <div class="user-block">
                                                                                    <img
                                                                                        class="img-circle img-bordered-sm"
                                                                                        src="<?php echo "" . $dados['foto'] ?> "
                                                                                        alt="user image">
                                                            					<span class="username">
                                                                					<a href="#"><?php echo "   " . $dados['nome'] . " " ?></a>
                                                                                    <?php

                                                                                    if ($dados['nome'] == $_SESSION['usuarioNome']) {
                                                                                        ?>


                                                                                        <a href="#" onclick="
                                                                                            javascript: if (confirm('Você realmente deseja excluir esta mensagem?\n-> <?php echo $mensagem->mensagem ?> <-'))location.href='pages/chat/excluirMensagem.php?idMensagem=<?php echo $mensagem->id; ?>'
                                                                                            "
                                                                                           class="pull-right btn-box-tool"><i
                                                                                                class="fa fa-times"></i></a>

                                                                                        <?php
                                                                                    }
                                                                                    ?>

                                                            					</span>
                                                            					<span class="description">
																					<?php
                                                                                    echo "Enviado em ";
                                                                                    echo '' . $row['dataHora'];
                                                                                    ?>
																				</span>
                                                                                </div>
                                                                            </a></h3>
                                                                        <div class="timeline-body">
                                                                            <div
                                                                                id="mensagens_<?php echo $mensagem->id; ?>"></div>
                                                                            <?php echo "  " . $mensagem->mensagem . ""; ?>

                                                                        </div>
                                                                    </div>
                                                                </li>
                                                            </ul>


                                                        <?php } //FIM FOR - ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- /.box-body -->
                                        </div>
                                        <!-- /.box -->

                                        <div id="status"></div>

                                        <div class="box-comment" id="escrever">
                                            <form class="form-horizontal" id="formulario"
                                                  action="pages/chat/gravaMensagem.php" method="post">
                                                <div class="form-group margin-bottom-none">
                                                    <div class="col-sm-9">
                                                        <input name="mensagem" type="text" id="mensagem"
                                                               class="form-control input-sm"
                                                               placeholder="Digite sua Mensagem">
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <button type="submit"
                                                                class="btn btn-facebook pull-right btn-block btn-sm">
                                                            Enviar Mensagem
                                                        </button>
                                                    </div>
                                                </div>
                                            </form>
                                            <br/>
                                        </div>
                                    </div>
                                    <!-- /.post -->
                                </div>
                                <!-- /.tab-pane -->

                            </div>
                            <!-- /.tab-content -->
                        </div>
                        <!-- /.nav-tabs-custom -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->


            </section>
        </section>
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



</body>
</html>