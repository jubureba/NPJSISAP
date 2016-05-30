<div class="row">
    <div class="col-md-12">
        <div class="box box-primary box-solid">
            <div class="box-header with-border">
                <div align="center"> <h3 class="box-title">
                        Todos os Processos - NPJ</h3></div>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                </div><!-- /.box-tools -->




            </div><!-- /.box-header -->
            <div class="box-body">
                <table id="example1" class="table table-bordered table-hover">
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

                    $query=$conn->prepare("
                                                                SELECT DISTINCT
                                                                    atend_npj.data_atend, atend_npj.id_status, atend_npj.proc_num, cliente.nome, situacao.status_atual, assuntos.assunto, 
                                                                    (SELECT nome FROM cliente c WHERE c.id_pessoas = cliente_npj.id_cliente_requer) as REQUERIDO 
                                                                    FROM 
                                                                    atend_npj, cliente, cliente_npj, situacao, assuntos 
                                                                    WHERE 
                                                                    cliente_npj.id_cliente_assist = cliente.id_pessoas 
                                                                    AND 
                                                                    cliente_npj.id_atend_npj = atend_npj.id_atend_npj 
                                                                    AND
                                                                    atend_npj.id_assunto = assuntos.id_assunto
                                                                    AND
                                                                    situacao.id_status = atend_npj.id_status
                                                                    ORDER BY 
                                                                    cliente_npj.id_cliente_npj");//COLOCAR WHERE COM ID DO ALUNO
                    $query->execute();
                    while($query_tab_npj=$query->fetch(PDO::FETCH_ASSOC)){
                        ?>
                        <tr id="dados">
                            <td onclick="Abrir_modal_npj(<?php echo $query_tab_npj['proc_num'] ?>);"><?php echo $query_tab_npj['proc_num'] ?></td>
                            <td onclick="Abrir_modal_npj(<?php echo $query_tab_npj['proc_num'] ?>);"><?php echo $query_tab_npj['nome']; ?></td>
                            <td onclick="Abrir_modal_npj(<?php echo $query_tab_npj['proc_num'] ?>);"><?php echo $query_tab_npj['REQUERIDO']; ?></td>
                            <td onclick="Abrir_modal_npj(<?php echo $query_tab_npj['proc_num'] ?>);"><?php echo date('d/m/Y - h:m:s', strtotime($query_tab_npj['data_atend'])); ?></td>
                            <td onclick="Abrir_modal_npj(<?php echo $query_tab_npj['proc_num'] ?>);">
                                <span id="stats" class="label label-primary"><?php echo $query_tab_npj['status_atual']; ?></span>
                            </td>
                            <script type="text/javascript">
                                var status = <?php echo $query_tab_npj['id_status'] ?>;
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
                            <td onclick="Abrir_modal_npj(<?php echo $query_tab_npj['proc_num'] ?>);">
                                <?php echo $query_tab_npj['assunto']; ?>
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




<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Modal Header</h4>
            </div>
            <div class="modal-body">

                <div class="row">

                    <div class="col-md-12">
                        <div class="box box-primary box-solid">
                            <div class="box-header with-border">
                                <div align="center"> <h3 class="box-title">
                                        INFORMAÇÕES DO PROCESSO</h3></div>
                                <div class="box-tools pull-right">
                                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                                </div><!-- /.box-tools -->
                            </div><!-- /.box-header -->
                            <div class="box-body" id="conteudo_modal_proc"></div><!-- /.box-body -->
                        </div><!-- /.box -->
                    </div><!-- /.col -->

                    <div class="col-md-6">
                        <div class="box box-primary box-solid">
                            <div class="box-header with-border">
                                <div align="center"> <h3 class="box-title">
                                        INFORMAÇÕES DO ASSISTIDO</h3></div>

                            </div><!-- /.box-header -->
                            <div class="box-body" id="conteudo_modal_assist"></div><!-- /.box-body -->
                        </div><!-- /.box -->
                    </div><!-- /.col -->

                    <div class="col-md-6">
                        <div class="box box-primary box-solid">
                            <div class="box-header with-border">
                                <div align="center"> <h3 class="box-title">
                                        INFORMAÇÕES DO REQUERIDO</h3></div>
                          
                            </div><!-- /.box-header -->
                            <div class="box-body" id="conteudo_modal_requer"></div><!-- /.box-body -->
                        </div><!-- /.box -->
                    </div><!-- /.col -->
                    <div id="calendario_mediacao"></div>
                </div>



            </div>
            <div class="modal-footer" >

                <button type="button" class="btn btn-facebook" data-dismiss="modal">Editar Dados</button>
                <button type="button" class="btn btn-facebook" data-dismiss="modal">Elaborar Peça</button>
                <button type="button" class="btn btn-facebook" data-dismiss="modal"></button>
                <button type="button" id="btn_agendar_mediacao" class="btn btn-facebook" onclick="Calendario_Mediacao();">Agendar Mediação</button>
                <button type="button" class="btn btn-google" data-dismiss="modal" onclick="Fechar_Calendario();">Cancelar</button>
            </div>

        </div>
    </div>
</div>

<script>
    function Calendario_Mediacao() {
        $('#calendario_mediacao').append('' +
            '<div id="calendario_mediacao"><div class="col-md-12" ><div class="box box-primary box-solid" ><div class="box-header with-border"><div align="center"> <h3 class="box-title">AGENDAR RETORNO</h3></div></div><div class="box-body" id="conteudo_modal_requer"><div align="center"> Data: <input type="date" id="calendario" /><br/></div><div class="modal-footer" ><button type="button" class="btn btn-facebook" onclick="">Salvar</button> <button type="button" class="btn btn-google" onclick="Fechar_Calendario();">Cancelar</button></div></div></div></div></div>');
        $('#btn_agendar_mediacao').prop("disabled", true);
    }
    function Fechar_Calendario() {
        $('#calendario_mediacao').html('<div id="calendario_mediacao"></div>');
        $('#btn_agendar_mediacao').prop("disabled", false);

    }





</script>
