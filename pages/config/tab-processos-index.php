
<div class="row">
    <div class="col-md-12">
        <div class="box box-primary box-solid">
            <div class="box-header with-border">
                <div align="center"> <h3 class="box-title">
                       Processos de<?php echo " " . $_SESSION['usuarioNome'] ?></h3></div>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                </div><!-- /.box-tools -->


                <!-- /.search form -->
                <div class="input-group input-group-sm" style="width: 150px; position: absolute; top: 13%;">
                    <input id="pesquisar-tab" type="text" name="table_search" class="form-control pull-right" placeholder="Pesquisar">
                    <div class="input-group-btn">
                        <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                    </div>
                </div>

            </div><!-- /.box-header -->
            <div class="box-body">
                <div class="box-body">
                    <table id="conteudo"  class="table table-bordered"></table>
                </div><!-- /.box-body -->

                <div class="col-md-6 no-margin pull-right">
                    <div class="box-footer clearfix"><!--paginador -->
                        <ul id="paginador" class="pagination pagination-sm no-margin pull-right"></ul>
                    </div>
                </div>

                <div class="col-md-6">
                    <select class="form-control select2" style="width: 140px" id="tab-qtd" onchange="getitens(1,this.value);" data-placeholder="itens por página" >
                        <option selected disabled>itens por página</option>
                        <option value="3">3</option>
                        <option value="5">5</option>
                        <option value="10">10</option>
                        <option value="20">20</option>
                    </select>
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




