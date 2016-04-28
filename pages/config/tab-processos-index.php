
<div class="col-md-12">
    <!-- MENU DE STATUS - INICIO -->
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border" align="center">
                    Barra de Ações do <?php echo "" . $_SESSION['permissaoUser'] . " chamado  " . $_SESSION['usuarioNome'] ?>
                </div><!-- /.box-header -->
                <div class="box-body">
                    <table id="conteudo" class="table table-bordered"></table>
                </div><!-- /.box-body -->

                <div class="box-footer clearfix"><!--paginador -->
                    <ul id="paginador" class="pagination pagination-sm no-margin pull-right"></ul>
                </div>
            </div><!-- /.box -->
        </div>
    </div>



