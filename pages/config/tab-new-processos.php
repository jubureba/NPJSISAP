
    <div class="col-md-6">
        <div class="box box-primary box-solid">
            <div class="box-header with-border">
                <div align="center"> <h3 class="box-title">
                        Todos os Processos - NPJ</h3></div>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                </div><!-- /.box-tools -->




            </div><!-- /.box-header -->
            <div class="box-body">
                <table id="tab_new_proc" class="table table-bordered table-hover">
                    <thead>
                    <tr>
                        <th style="width: 5%"></th>
                        <th style="width: 20%">Nome</th>
                        <th style="width: 5%">Editar</th>

                    </tr>
                    </thead>

                    <tbody>

                    <?php

                    $query=$conn->prepare("SELECT nome FROM cliente");//COLOCAR WHERE COM ID DO ALUNO
                    $query->execute();
                    while($query_tab_npj=$query->fetch(PDO::FETCH_ASSOC)){
                        ?>
                        <tr id="dados">
                            <td width="16px" align="center"><img src="dist/icons/png/512/new.gif"/> </td>
                            <td ><?php echo $query_tab_npj['nome']; ?></td>
                            <td width="16px" align="center"><img src="dist/icons/png/512/edit_property.png" height="16px" width="16px"/></td>

                        </tr>
                        <?php
                    }

                    ?>


                    </tbody>

                </table>
            </div><!-- /.box-body -->

            <div id="loading"></div>
            <!--loading
              <div class="overlay">
                <i class="fa fa-refresh fa-spin"></i>
              </div>
            -->
        </div><!-- /.box -->
    </div><!-- /.col -->

