<div class="row">
    <div class="col-md-12">
        <div class="box box-primary box-solid">
            <div class="box-header with-border">
                <div align="center"> <h3 class="box-title">
                        Todos os Processos - DEFENSORIA PÚBLICA</h3></div>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                </div><!-- /.box-tools -->




            </div><!-- /.box-header -->
            <div class="box-body">
                <table id="example2" class="table table-bordered table-hover">
                    <thead>
                    <tr>
                        <th style="width: 5%">Protocolo</th>
                        <th style="width: 20%">Assistido</th>
                        <th style="width: 20%">Requerido</th>
                        <th style="width: 10%">Data | Hora</th>
                        <th style="width: 10%">Status</th>
                        <th style="width: 35%">Assunto</th>
                    </tr>
                    </thead>

                    <tbody>

                    <?php

                    $query_qtd1=$conn->prepare("
                                            SELECT DISTINCT
                                                atend_def_publica.data_atend, atend_def_publica.proc_num, atend_def_publica.id_status,  cliente.nome, situacao.status_atual, assuntos.assunto, 
                                                (SELECT nome FROM cliente c WHERE c.id_pessoas = cliente_def_publica.id_cliente_requer) as REQUERIDO 
                                                FROM 
                                                atend_def_publica, cliente, cliente_def_publica, situacao, assuntos 
                                                WHERE 
                                                cliente_def_publica.id_cliente_assist = cliente.id_pessoas 
                                                AND 
                                                cliente_def_publica.id_atend_def_publica = atend_def_publica.id_atend_def_publica 
                                                AND
                                                atend_def_publica.id_assunto = assuntos.id_assunto
                                                AND
                                                situacao.id_status = atend_def_publica.id_status
                                                ORDER BY 
                                                cliente_def_publica.id_cliente_def_publica");//COLOCAR WHERE COM ID DO ALUNO
                    $query_qtd1->execute();
                    while($query_tab=$query_qtd1->fetch(PDO::FETCH_ASSOC)){
                        ?>
                        <tr id="dados">
                            <td><?php echo $query_tab['proc_num'] ?></td>
                            <td><?php echo $query_tab['nome']; ?></td>
                            <td><?php echo $query_tab['REQUERIDO']; ?></td>
                            <td><?php echo date('d/m/Y - h:m:s', strtotime($query_tab['data_atend'])); ?></td>
                            <td>
                                <span id="stats" class="label label-primary"><?php echo $query_tab['status_atual']; ?></span>
                            </td>
                            <script type="text/javascript">

                                    var status = <?php echo $query_tab['id_status']; ?>;
                                    if (status == 1) {
                                        document.getElementById("stats").setAttribute("class", "label label-primary");
                                        document.getElementById("stats").setAttribute("id", "class1");
                                    }
                                    if (status == 4) {
                                        document.getElementById("stats").setAttribute("class", "label label-success");
                                        document.getElementById("stats").setAttribute("id", "class2");
                                    }
                                    if (status == 3) {
                                        document.getElementById("stats").setAttribute("class", "label label-danger");
                                        document.getElementById("stats").setAttribute("id", "class3");
                                    }
                                    if (status == 2) {
                                        document.getElementById("stats").setAttribute("class", "label label-warning");
                                        document.getElementById("stats").setAttribute("id", "class4");
                                    }
                                
                            </script>

                            <td>
                                <?php echo $query_tab['assunto']; ?>
                            </td>
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
</div>