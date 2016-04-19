<!-- MODAL PARA UPLOAD -->
<div class="container">
    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title" id="TituloModal">Upload do Documento</h4>
                </div>
                <div class="modal-body">
                    <!-- IMAGEM -->

                    <div class="input-group input-group-sm">
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-image"></i>
                            </div>
                            <input class="form-control" name="foto" type="file" id="arquivo"/>
                        </div>
                                                <span class="input-group-btn">
                                                    <button type="button" onclick="submitForm();"
                                                            class="btn btn-info btn-flat">
                                                        Enviar Imagem
                                                    </button>
                                                </span>
                    </div>

                    <output id="result"></output>
                    <!-- FIM IMAGEM --><br/>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" onclick="limparUpload()"
                            data-dismiss="modal">Fechar
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- FIM - MODAL PARA UPLOAD -->