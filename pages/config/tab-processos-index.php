
<div class="row">
    <div class="col-md-12">
        <div class="box box-primary box-solid">
            <div class="box-header with-border">
                <div align="center"> <h3 class="box-title">
                        Barra de Ações do <?php echo "" . $_SESSION['permissaoUser'] . " chamado  " . $_SESSION['usuarioNome'] ?></h3></div>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                </div><!-- /.box-tools -->
            </div><!-- /.box-header -->
            <div class="box-body">
                <div class="box-body">
                    <table id="conteudo" class="table table-bordered"></table>
                </div><!-- /.box-body -->

                <div class="box-footer clearfix"><!--paginador -->
                    <ul id="paginador" class="pagination pagination-sm no-margin pull-right"></ul>
                </div>
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




