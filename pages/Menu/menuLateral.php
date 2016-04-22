
<!--####################### MENU PRINCIPAL - BARRA LATERAL ESQUERDA ############################-->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            
            
            
            
            
            <div class="pull-left image">
                <!-- IMAGEM DO USUÁRIO, CAMINHO PEGO DO BD  -->
                <img src="
								<?php
                echo "" . $_SESSION['imagem']
                ?>
                                " class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <!-- NOME DO USUARIO -->
                <p>
                    <?php
                    echo "" . $_SESSION['usuarioNome'];
                    ?>
                </p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>


        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Pesquisar...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
            </div>
        </form>
        <!-- /.search form -->


        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
            <li class="header"><h4 ALIGN="center">MENU PRINCIPAL</h4></li>
            <!-- MENU PARA PROFESSOR -->
            <li class="header">PROFESSOR</li>

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-edit "></i> <span>Correção</span> <i
                        class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="lista_pecas.php"><i class="fa fa-hand-o-right"></i>Peças do NPJ</a></li>
                    <li><a href="#"><i class="fa fa-hand-o-right"></i>Peças da Defensoria</a></li>
                </ul>
            </li>

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-database"></i> <span>Cadastro</span> <i
                        class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a id="novo_usuario" href="user_register.php"><i class="fa fa-hand-o-right"></i>Novo
                            Usuário</a>
                    </li>
                    <li><a href="new_subject.php"><i class="fa fa-hand-o-right"></i>Novo
                            Assunto/Ação</a></li>
                </ul>

            </li>

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-search-plus"></i> <span>Consulta</span> <i
                        class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a id="novo_usuario" href="see_user.php"><i class="fa fa-hand-o-right"></i>Consultar Usuário</a>
                    </li>
                    <li><a href="new_subject.php"><i class="fa fa-hand-o-right"></i>Consultar Assuntos</a></li>
                </ul>

            </li>

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-upload"></i> <span>Upload</span> <i
                        class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="upload_models.php"><i class="fa fa-hand-o-right"></i>Peças</a>
                    </li>
                </ul>

            </li>

            <!-- MENU PARA ALUNO -->
            <li class="header">Aluno</li>


            <li class="treeview">
                <a href="#">
                    <i class="fa fa-file-o"></i> <span> Coleta de Dados </span> <i
                        class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="atend_NPJ.php"><i class="fa fa-hand-o-right"></i> NPJ
                        </a>
                    </li>
                    <li><a href="atend_def_publica.php"><i
                                class="fa fa-hand-o-right"></i> DEFENSORIA PÚBLICA </a></li>


                </ul>
            </li>

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-bar-chart"></i> <span> Acompanhamento </span> <i
                        class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="acompanhamento.php"><i class="fa fa-hand-o-right"></i>
                            Mediação
                        </a></li>

                </ul>
            </li>


            <li class="header"></li>
        </ul>
        <br/><br/><br/>
        <img class="imagemFcat" align="center" src="imagens/fcat1.png">
    </section>
    <!-- /.sidebar -->
</aside>


<!--####################### FIM -  MENU PRINCIPAL - BARRA LATERAL ESQUERDA ############################-->