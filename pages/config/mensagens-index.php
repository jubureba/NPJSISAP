<div class="row">
    <div class="col-md-12">
        <div class="box box-primary box-solid">
            <div class="box-header with-border">
                <div align="center"> <h3 class="box-title">Central de Mensagens</h3></div>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                </div><!-- /.box-tools -->
            </div><!-- /.box-header -->
            <div class="box-body" id="msg-reload">
                <div class="tab-content">
                    <div class="active tab-pane" id="activity">
                        <div class="box-body">
                            <div class="timeline-body">
                                <div class="post">
                                    <div class="box box-solid">
                                        <div style="overflow: auto; height: 420px" id="msgs">
                                           
                                        </div>
                                    </div>
                                </div>
                                <!-- /.box-body -->
                            </div>
                            <!-- /.box -->
                        </div>
                    </div>
                </div>
                <div id="status"></div>
                <div class="box-comment" id="escrever">
                    <form class="form-horizontal" id="formulario"
                          action="#" method="post">
                        <div class="form-group margin-bottom-none">
                            <div class="col-sm-9">
                                <input name="mensagem" type="text" id="mensagem"
                                       class="form-control input-sm"
                                       placeholder="Digite sua Mensagem" required>
                            </div>
                            <div class="col-sm-3">
                                <button type="submit"
                                        class="btn btn-facebook pull-right btn-block btn-sm" id="button-enviando">
                                    Enviar Mensagem
                                </button>
                            </div>
                        </div>
                    </form>
                    <br/>
                </div>
            </div><!-- /.box-body -->
            <div id="loading-msg"></div>
        </div><!-- /.box -->
    </div><!-- /.col -->
</div>





