<div class="box-body">
    <table class="table table-bordered">
        <tbody>
        <tr>
            <th style="width: 350px">Documento</th>
            <th style="width: 20px">Status</th>
            <th style="width: 20px">Status</th>
            <th style="width: 100px">Valor</th>
            <th style="width: 16px">Upload</th>
            <th style="width: 20px">preview</th>
        </tr>
        <tr>
            <td>CPF</td> <!-- Nome do Documento -->

            <td> <!-- Validação Ausente/Presente do Documento -->
                <div>
                    <input type="radio" name="radioCPF" id="radioCPF1" value="presente" onclick="uploadCPF('atv');"
                           class="radio"/>
                    <label for="radioCPF1">Presente</label>
                </div>
            </td>

            <td> <!-- Validação Ausente/Presente do Documento -->
                <div>
                    <input type="radio" name="radioCPF" id="radioCPF2" value="ausente" onclick="uploadCPF('dst');"
                           checked
                           class="radio"/>
                    <label for="radioCPF2">Ausente</label>
                </div>
            </td>

            <td> <!-- Campo para digitar o Numero do Documento -->
                <div class="input-group">
                    <div class="input-group-addon">
                        <i class="fa fa-user"></i>
                    </div>
                    <input class="form-control" id="valor-cpf" required name="valorCPF" type="text"
                           placeholder="CPF (Somente Números)" disabled>
                </div>
            </td>
            <td>

                <form id="uploadimage" action="" method="post" enctype="multipart/form-data">

                    <span class="upload-wrapper">
                    <input class="upload-file" type="file" name="file" id="upload-cpf" required onchange="" disabled/>

                    <img class="upload-button" alt="title=" id="img-cpf" style="height: 34px; width: 34px;"
                         src="imagens/upload_+_disabled.png"/>
                    </span>

                </form>
            </td>

            <td>

                <div id="image_preview" align="center">
                    <img id="previewing" style="width: 40px; height: 40px;" src="dist/img/defaultimg.gif"
                         data-zoom-image="dist/img/defaultimg.gif"/></div>
            </td>
        </tr>
        <script type="text/javascript">
            function uploadCPF(value) {

                if (value == 'dst') {
                    document.getElementById("valor-cpf").disabled = true;
                    document.getElementById("valor-cpf").required = false;
                    document.getElementById("upload-cpf").disabled = true;
                    document.getElementById("upload-cpf").required = false;
                    document.getElementById('img-cpf').src = "imagens/upload_+_disabled.png";

                } else {
                    document.getElementById("valor-cpf").disabled = false;
                    document.getElementById("valor-cpf").required = true;
                    document.getElementById("upload-cpf").disabled = false;
                    document.getElementById("upload-cpf").required = true;
                    document.getElementById('img-cpf').src = "imagens/upload_+.png";
                }
            }
        </script>


        <!-- RG  -->
        <tr>
            <td>RG</td> <!-- Nome do Documento -->

            <td> <!-- Validação Ausente/Presente do Documento -->
                <div>
                    <input type="radio" name="radioRG" id="radioRG1" value="presente" onclick="uploadRG('atv');"
                           class="radio"/>
                    <label for="radioRG1">Presente</label>
                </div>
            </td>

            <td> <!-- Validação Ausente/Presente do Documento -->
                <div>
                    <input type="radio" name="radioRG" id="radioRG2" value="ausente" onclick="uploadRG('dst');" checked
                           class="radio"/>
                    <label for="radioRG2">Ausente</label>
                </div>
            </td>

            <td> <!-- Campo para digitar o Numero do Documento -->
                <div class="input-group">
                    <div class="input-group-addon">
                        <i class="fa fa-user"></i>
                    </div>
                    <input class="form-control" id="valor-rg" required name="valorRG" type="text"
                           placeholder="Documento de identidade" disabled>
                </div>
            </td>
            <td>
                <form id="uploadimage" action="" method="post" enctype="multipart/form-data">
                    <div id="selectImage">
                <span class="upload-wrapper">
                    <input class="upload-file" type="file" name="file" id="upload-rg" required onchange="" disabled/>
                    <img class="upload-button" alt="title=" id="img-rg" style="height: 34px; width: 34px;"
                         src="imagens/upload_+_disabled.png"/>
                </span>
                    </div>
                </form>
            </td>

            <td>
                <div id="image_preview" align="center">
                    <img style="width: 40px; height: 40px;"
                         src="dist/img/defaultimg.gif"/></div>
            </td>
        </tr>
        <script type="text/javascript">
            function uploadRG(value) {

                if (value == 'dst') {
                    document.getElementById("valor-rg").disabled = true;
                    document.getElementById("valor-rg").required = false;
                    document.getElementById("upload-rg").disabled = true;
                    document.getElementById("upload-rg").required = false;
                    document.getElementById('img-rg').src = "imagens/upload_+_disabled.png";

                } else {
                    document.getElementById("valor-rg").disabled = false;
                    document.getElementById("valor-rg").required = true;
                    document.getElementById("upload-rg").disabled = false;
                    document.getElementById("upload-rg").required = true;
                    document.getElementById('img-rg').src = "imagens/upload_+.png";
                }
            }
        </script>

        <!-- CTPS -->

        <tr>
            <td>CTPS</td> <!-- Nome do Documento -->

            <td> <!-- Validação Ausente/Presente do Documento -->
                <div>
                    <input type="radio" name="radioCTPS" id="radioCTPS1" value="presente" onclick="uploadCTPS('atv');"
                           class="radio"/>
                    <label for="radioCTPS1">Presente</label>
                </div>
            </td>

            <td> <!-- Validação Ausente/Presente do Documento -->
                <div>
                    <input type="radio" name="radioCTPS" id="radioCTPS2" value="ausente" onclick="uploadCTPS('dst');"
                           checked
                           class="radio"/>
                    <label for="radioCTPS2">Ausente</label>
                </div>
            </td>

            <td> <!-- Campo para digitar o Numero do Documento -->
                <div class="input-group">
                    <div class="input-group-addon">
                        <i class="fa fa-user"></i>
                    </div>
                    <input class="form-control" id="valor-ctps" required name="valorCTPS" type="text"
                           placeholder="Carteira de Trabalho" disabled>
                </div>
            </td>
            <td>
                <form id="uploadimage" action="" method="post" enctype="multipart/form-data">
                    <div id="selectImage">
                <span class="upload-wrapper">
                    <input class="upload-file" type="file" name="file" id="upload-ctps" required onchange="" disabled/>
                    <img class="upload-button" id="img-ctps" alt="title=" style="height: 34px; width: 34px;"
                         src="imagens/upload_+_disabled.png"/>
                </span>
                    </div>
                </form>
            </td>

            <td>
                <div id="image_preview" align="center">
                    <img style="width: 40px; height: 40px;" src="dist/img/defaultimg.gif"/></div>
            </td>
        </tr>

        <script type="text/javascript">
            function uploadCTPS(value) {

                if (value == 'dst') {
                    document.getElementById("valor-ctps").disabled = true;
                    document.getElementById("valor-ctps").required = false;
                    document.getElementById("upload-ctps").disabled = true;
                    document.getElementById("upload-ctps").required = false;
                    document.getElementById('img-ctps').src = "imagens/upload_+_disabled.png";

                } else {
                    document.getElementById("valor-ctps").disabled = false;
                    document.getElementById("valor-ctps").required = true;
                    document.getElementById("upload-ctps").disabled = false;
                    document.getElementById("upload-ctps").required = true;
                    document.getElementById('img-ctps').src = "imagens/upload_+.png";
                }
            }
        </script>


        <!-- Comprovante de Residência -->

        <tr>
            <td>Comprovante de Residência</td> <!-- Nome do Documento -->

            <td> <!-- Validação Ausente/Presente do Documento -->
                <div>
                    <input type="radio" name="radioRESIDENCIA" id="radioRESIDENCIA1" value="presente"
                           onclick="uploadRESIDENCIA('atv');" class="radio"/>
                    <label for="radioRESIDENCIA1">Presente</label>
                </div>
            </td>

            <td> <!-- Validação Ausente/Presente do Documento -->
                <div>
                    <input type="radio" name="radioRESIDENCIA" id="radioRESIDENCIA2" value="ausente"
                           onclick="uploadRESIDENCIA('dst');" checked class="radio"
                    />
                    <label for="radioRESIDENCIA2">Ausente</label>
                </div>
            </td>

            <td> <!-- Campo para digitar o Numero do Documento -->

            </td>
            <td>
                <form id="uploadimage" action="" method="post" enctype="multipart/form-data">
                    <div id="selectImage">
                 <span class="upload-wrapper">
                     <input class="upload-file" type="file" name="file" id="upload-residencia" required onchange=""
                            disabled/>
                     <img class="upload-button" id="img-residencia" alt="title=" style="height: 34px; width: 34px;"
                          src="imagens/upload_+_disabled.png"/>
                 </span>
                    </div>
                </form>
            </td>

            <td>
                <div id="image_preview" align="center">
                    <img style="width: 40px; height: 40px;" src="dist/img/defaultimg.gif"/></div>
            </td>
        </tr>
        <script type="text/javascript">
            function uploadRESIDENCIA(value) {

                if (value == 'dst') {
                    document.getElementById("upload-residencia").disabled = true;
                    document.getElementById("upload-residencia").required = false;
                    document.getElementById('img-residencia').src = "imagens/upload_+_disabled.png";

                } else {
                    document.getElementById("upload-residencia").disabled = false;
                    document.getElementById("upload-residencia").required = true;
                    document.getElementById('img-residencia').src = "imagens/upload_+.png";
                }
            }
        </script>

        <!--Contracheque -->

        <tr>
            <td>Contracheque</td> <!-- Nome do Documento -->

            <td> <!-- Validação Ausente/Presente do Documento -->
                <div>
                    <input type="radio" name="radioCONTRACHEQUE" id="radioCONTRACHEQUE1" value="presente"
                           onclick="uploadCONTRACHEQUE('atv');" class="radio"/>
                    <label for="radioCONTRACHEQUE1">Presente</label>
                </div>
            </td>

            <td> <!-- Validação Ausente/Presente do Documento -->
                <div>
                    <input type="radio" name="radioCONTRACHEQUE" id="radioCONTRACHEQUE2" value="ausente"
                           onclick="uploadCONTRACHEQUE('dst');" checked class="radio"
                    />
                    <label for="radioCONTRACHEQUE2">Ausente</label>
                </div>
            </td>

            <td> <!-- Campo para digitar o Numero do Documento -->

            </td>

            <td>
                <form id="uploadimage" action="" method="post" enctype="multipart/form-data">
                    <div id="selectImage">
                <span class="upload-wrapper">
                    <input class="upload-file" type="file" name="file" id="upload-contracheque" required onchange=""
                           disabled/>
                    <img class="upload-button" id="img-contracheque" alt="title=" style="height: 34px; width: 34px;"
                         src="imagens/upload_+_disabled.png"/>
                </span>
                    </div>
                </form>
            </td>

            <td>
                <div id="image_preview" align="center">
                    <img style="width: 40px; height: 40px;" src="dist/img/defaultimg.gif"/></div>
            </td>
        </tr>
        <script type="text/javascript">
            function uploadCONTRACHEQUE(value) {

                if (value == 'dst') {
                    document.getElementById("upload-contracheque").disabled = true;
                    document.getElementById("upload-contracheque").required = false;
                    document.getElementById('img-contracheque').src = "imagens/upload_+_disabled.png";

                } else {
                    document.getElementById("upload-contracheque").disabled = false;
                    document.getElementById("upload-contracheque").required = true;
                    document.getElementById('img-contracheque').src = "imagens/upload_+.png";
                }
            }
        </script>

        <!-- Certidão de Nascimento -->

        <tr>
            <td>Certidão de Nascimento</td> <!-- Nome do Documento -->

            <td> <!-- Validação Ausente/Presente do Documento -->
                <div>
                    <input type="radio" name="radioNASCIMENTO" id="radioNASCIMENTO1" value="presente"
                           onclick="uploadNASCIMENTO('atv');" class="radio"/>
                    <label for="radioNASCIMENTO1">Presente</label>
                </div>
            </td>

            <td> <!-- Validação Ausente/Presente do Documento -->
                <div>
                    <input type="radio" name="radioNASCIMENTO" id="radioNASCIMENTO2" value="ausente"
                           onclick="uploadNASCIMENTO('dst');" class="radio"
                           checked/>
                    <label for="radioNASCIMENTO2">Ausente</label>
                </div>
            </td>

            <td> <!-- Campo para digitar o Numero do Documento -->
                <div class="input-group">
                    <div class="input-group-addon">
                        <i class="fa fa-user"></i>
                    </div>
                    <input class="form-control" id="valor-nascimento" required name="valorNASCIMENTO" type="text"
                           placeholder="Certidão de Nascimento" disabled>
                </div>
            </td>
            <td>
                <form id="uploadimage" action="" method="post" enctype="multipart/form-data">
                    <div id="selectImage">
                <span class="upload-wrapper">
                    <input class="upload-file" type="file" name="file" id="upload-nascimento" required onchange=""
                           disabled/>
                    <img class="upload-button" id="img-nascimento" alt="title=" style="height: 34px; width: 34px;"
                         src="imagens/upload_+_disabled.png"/>
                </span>
                    </div>
                </form>
            </td>
            <td>
                <div id="image_preview" align="center">
                    <img style="width: 40px; height: 40px;" src="dist/img/defaultimg.gif"/></div>
            </td>
        </tr>
        <script type="text/javascript">
            function uploadNASCIMENTO(value) {

                if (value == 'dst') {
                    document.getElementById("valor-nascimento").disabled = true;
                    document.getElementById("valor-nascimento").required = false;
                    document.getElementById("upload-nascimento").disabled = true;
                    document.getElementById("upload-nascimento").required = false;
                    document.getElementById('img-nascimento').src = "imagens/upload_+_disabled.png";

                } else {
                    document.getElementById("valor-nascimento").disabled = false;
                    document.getElementById("valor-nascimento").required = true;
                    document.getElementById("upload-nascimento").disabled = false;
                    document.getElementById("upload-nascimento").required = true;
                    document.getElementById('img-nascimento').src = "imagens/upload_+.png";
                }
            }
        </script>
        <!-- Certidão de Casamento-->

        <tr>
            <td>Certidão de Casamento</td> <!-- Nome do Documento -->

            <td> <!-- Validação Ausente/Presente do Documento -->
                <div>
                    <input type="radio" name="radioCASAMENTO" id="radioCASAMENTO1" value="presente"
                           onclick="uploadCASAMENTO('atv');" class="radio"/>
                    <label for="radioCASAMENTO1">Presente</label>
                </div>
            </td>

            <td> <!-- Validação Ausente/Presente do Documento -->
                <div>
                    <input type="radio" name="radioCASAMENTO" id="radioCASAMENTO2" value="ausente"
                           onclick="uploadCASAMENTO('dst');" class="radio"
                           checked/>
                    <label for="radioCASAMENTO2">Ausente</label>
                </div>
            </td>

            <td> <!-- Campo para digitar o Numero do Documento -->

            </td>
            <td>
                <form id="uploadimage" action="" method="post" enctype="multipart/form-data">
                    <div id="selectImage">
                <span class="upload-wrapper">
                    <input class="upload-file" type="file" name="file" id="upload-casamento" required onchange=""
                           disabled/>
                    <img class="upload-button" id="img-casamento" alt="title=" style="height: 34px; width: 34px;"
                         src="imagens/upload_+_disabled.png"/>
                </span>
                    </div>
                </form>
            </td>
            <td>
                <div id="image_preview" align="center">
                    <img style="width: 40px; height: 40px;" src="dist/img/defaultimg.gif"/></div>
            </td>
        </tr>
        <script type="text/javascript">
            function uploadCASAMENTO(value) {

                if (value == 'dst') {
                    document.getElementById("upload-casamento").disabled = true;
                    document.getElementById("upload-casamento").required = false;
                    document.getElementById('img-casamento').src = "imagens/upload_+_disabled.png";

                } else {
                    document.getElementById("upload-casamento").disabled = false;
                    document.getElementById("upload-casamento").required = true;
                    document.getElementById('img-casamento').src = "imagens/upload_+.png";
                }
            }
        </script>
        <!-- Certidão de óbito -->

        <tr>
            <td>Certidão de óbito</td> <!-- Nome do Documento -->

            <td> <!-- Validação Ausente/Presente do Documento -->
                <div>
                    <input type="radio" name="radioOBITO" id="radioOBITO1" value="presente"
                           onclick="uploadOBITO('atv');"
                           class="radio"/>
                    <label for="radioOBITO1">Presente</label>
                </div>
            </td>

            <td> <!-- Validação Ausente/Presente do Documento -->
                <div>
                    <input type="radio" name="radioOBITO" id="radioOBITO2" value="ausente" onclick="uploadOBITO('dst');"
                           class="radio"
                           checked/>
                    <label for="radioOBITO2">Ausente</label>
                </div>
            </td>

            <td> <!-- Campo para digitar o Numero do Documento -->

            </td>
            <td>
                <form id="uploadimage" action="" method="post" enctype="multipart/form-data">
                    <div id="selectImage">
                <span class="upload-wrapper">
                    <input class="upload-file" type="file" name="file" id="upload-obito" required onchange="" disabled/>
                    <img class="upload-button" id="img-obito" alt="title=" style="height: 34px; width: 34px;"
                         src="imagens/upload_+_disabled.png"/>
                </span>
                    </div>
                </form>
            </td>
            <td>
                <div id="image_preview" align="center">
                    <img style="width: 40px; height: 40px;" src="dist/img/defaultimg.gif"/></div>
            </td>
        </tr>
        <script type="text/javascript">
            function uploadOBITO(value) {

                if (value == 'dst') {
                    document.getElementById("upload-obito").disabled = true;
                    document.getElementById("upload-obito").required = false;
                    document.getElementById('img-obito').src = "imagens/upload_+_disabled.png";

                } else {
                    document.getElementById("upload-obito").disabled = false;
                    document.getElementById("upload-obito").required = true;
                    document.getElementById('img-obito').src = "imagens/upload_+.png";
                }
            }
        </script>


        </tbody>
    </table>
</div><!-- /.box-body -->