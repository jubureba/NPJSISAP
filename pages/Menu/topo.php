<header class="main-header">
    <a href="index.php" class="logo">
        <span class="logo-mini"><b><img width="36" height="36" src="imagens/fcat-estacio-logo-solo.png"/></b></span>
        <span class="logo-lg">
            <img width="36" height="36" src="imagens/fcat-estacio-logo-solo.png"/>
            <img width="100" height="36" src="imagens/estacio.png"/> | <b>NPJ</b>
        </span>
    </a>

    <nav class="navbar navbar-static-top" role="navigation">
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>

        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <!-- NOTIFICAÇÃO DE NOVO VINCULO -->
                <li class="dropdown notifications-menu">
                    <?php
                    $idUsuario = $_SESSION['usuarioID'];
                    $sql = mysql_query("SELECT * FROM atendimento_defensoria WHERE Usuario_idUsuario = $idUsuario");
                    $total = mysql_num_rows($sql);
                    ?>
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-bell-o"></i>
                        <span class="label label-danger"><?php echo $total ?> </span>
                    </a>

                    <ul class="dropdown-menu">
                        <li class="header"><?php echo "Voce tem " . $total . " Notificações" ?></li>
                        <li>
                            <!-- inner menu: contains the actual data -->
                            <ul class="menu">
                                <?php
                                while ($result = mysql_fetch_array($sql)) {
                                    ?>
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-users text-aqua"></i> <?php echo $result['descricaoAtendimentoDefensoria']; ?>
                                        </a>
                                    </li>
                                    <?php
                                }
                                ?>
                            </ul>
                        </li>
                        <li class="footer"><a href="#">Ver Todas</a></li>
                    </ul>
                </li>
                <!-- FIM - NOTIFICAÇÃO -->

                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <img src="<?php
                        echo "" . $_SESSION['imagem']
                        ?>" class="user-image" alt="User Image">
                            <span class="hidden-xs">
                                <?php
                                echo "Bem-Vindo, " . $_SESSION['usuarioNome'];
                                ?>

                            </span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- User image -->
                        <li class="user-header">
                            <img src="
                                <?php
                            echo "" . $_SESSION['imagem']
                            ?>
                                " class="img-circle" alt="User Image">

                            <p>
                                <?php
                                echo "Bem-Vindo, " . $_SESSION['usuarioNome'];
                                ?>
                                <small><!-- EMAIL -->
                                    <?php
                                    echo "" . $_SESSION['email'];
                                    ?>
                                </small>
                                <small><!-- PERMISSAO -->
                                    <?php
                                    echo "" . $_SESSION['permissaoUser'];
                                    ?>
                                </small>
                            </p>
                        </li>

                        <li class="user-footer">
                            <div class="pull-left">
                                <a href="pages/login/lockscreen.php" class="btn btn-default btn-flat">Bloquear</a>
                            </div>

                            <div class="pull-right">
                                <a href="#" onclick="ModalFechar()" class="btn btn-default btn-flat">Sair</a>
                            </div>
                            <script>
                                function ModalFechar() {
                                    $('#openModal').modal('show');
                                }
                            </script>
                        </li>
                    </ul>
                </li>
                <!-- Control Sidebar Toggle Button -->
                <li>
                    <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
                </li>
            </ul>
        </div>
    </nav>


</header>
<!-- Left side column. contains the logo and sidebar -->