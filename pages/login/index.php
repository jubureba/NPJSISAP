<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>NPJ | Tela de Login</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../../dist/css/AdminLTE.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="../../plugins/iCheck/square/blue.css">
    <style>
      #teste {
        pointer-events: none;

      }
    </style>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body class="hold-transition login-page">
    <div class="login-box">

      <div class="login-logo">

        <a href="#"><b>NPJ</b> | System</a>
      </div><!-- /.login-logo -->
      <div class="login-box-body">
        <p class="login-box-msg">Faça Login para Iniciar a Sessão</p>
        <form action="valida.php" method="post">
          <div class="form-group has-feedback">
            <input name="usuario" type="text" class="form-control" placeholder="Usuário">

            <span class="glyphicon glyphicon-user form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input name="senha" type="password" class="form-control" placeholder="Senha">
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
          <div class="row">
            <div class="col-xs-8">
              <div class="checkbox icheck">
                <label>
                  <input type="checkbox"> Mantenha-me conectado
                </label>
              </div>
            </div><!-- /.col -->
            <div class="col-xs-4">
              <button type="submit" class="btn btn-primary btn-block btn-flat">Entrar</button>
            </div><!-- /.col -->
          </div>
        </form>


        <a href="recuperarSenha.php">Esqueceu sua senha?</a><br>
        <div class="social-auth-links text-center">

          <img width="250" height="150" id="imgFCAT" src="../../imagens/fcat.png" onmousemove="imagemFCAT(1)" onmouseout="imagemFCAT(2)" usemap="#meuMapa"/>
          <map name="meuMapa">
            <area shape="circle" coords="126, 38, 22" href="http://www.fcat.edu.br" />
          </map>

        </div>
      </div><!-- /.login-box-body -->
    </div><!-- /.login-box -->


    <!-- jQuery 2.1.4 -->
    <script src="../../plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="../../bootstrap/js/bootstrap.min.js"></script>
    <!-- iCheck -->
    <script src="../../plugins/iCheck/icheck.min.js"></script>
    <script>
      $(function () {
        $('input').iCheck({
          checkboxClass: 'icheckbox_square-blue',
          radioClass: 'iradio_square-blue',
          increaseArea: '20%' // optional
        });
      });
    </script>

  <script>
    function imagemFCAT(tipo) {
      if(tipo == 1) {
         arquivo = "../../imagens/fcat_original.png";
      }
      if(tipo == 2) {
        arquivo = "../../imagens/fcat.png";

      }
      document.getElementById("imgFCAT").src = arquivo;
    }

  </script>

  </body>
</html>
