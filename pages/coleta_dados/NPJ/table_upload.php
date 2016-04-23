<script src="teste-up-img/jquery.min.js"></script>
<script src="teste-up-img/script.js"></script>
<tr>
    <td>Cadastro de Pessoas Físicas - CPF</td> <!-- Nome do Documento -->

    <td> <!-- Validação Ausente/Presente do Documento -->
        <div>
            <input type="radio" name="radioCPF" id="radioCPF1" value="presente" onclick="uploadCPF('atv');"
                   class="radio"/>
            <label for="radioCPF1">Presente</label>
        </div>
    </td>

    <td> <!-- Validação Ausente/Presente do Documento -->
        <div>
            <input type="radio" name="radioCPF" id="radioCPF2" value="ausente" onclick="uploadCPF('dst'); checked"
                   class="radio"/>
            <label for="radioCPF2">Ausente</label>
        </div>
    </td>

    <td> <!-- Campo para digitar o Numero do Documento -->
        <div class="input-group">
            <div class="input-group-addon">
                <i class="fa fa-user"></i>
            </div>
            <input class="form-control" id="valor-cpf" required name="valorCPF" type="NUMBER"
                   placeholder="CPF (Somente Números)" disabled>
        </div>
    </td>
    <td>
        <form id="uploadimage" action="" method="post" enctype="multipart/form-data">
            <div id="selectImage">
                <span class="upload-wrapper">
                    <input class="upload-file" type="file" name="file" id="upload-cpf" required onchange="" disabled/>
                    <img class="upload-button" alt="title=" id="img-cpf" style="height: 34px; width: 34px;"
                         src="imagens/upload_+_disabled.png"/>
                </span>
            </div>
        </form>
    </td>

    <td>
        <div id="image_preview" align="center"><img id="previewing" style="width: 40px; height: 40px;"
                                                    src="dist/img/defaultimg.gif"/></div>
        <div id="message"></div>
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
    <td>Registro Geral - RG</td> <!-- Nome do Documento -->

    <td> <!-- Validação Ausente/Presente do Documento -->
        <div>
            <input type="radio" name="radioCPF" id="radioCPF1" value="presente" onclick="uploadCPF('atv');"
                   class="radio"/>
            <label for="radioCPF1">Presente</label>
        </div>
    </td>

    <td> <!-- Validação Ausente/Presente do Documento -->
        <div>
            <input type="radio" name="radioCPF" id="radioCPF2" value="ausente" onclick="uploadCPF('dst'); checked"
                   class="radio"/>
            <label for="radioCPF2">Ausente</label>
        </div>
    </td>

    <td> <!-- Campo para digitar o Numero do Documento -->
        <div class="input-group">
            <div class="input-group-addon">
                <i class="fa fa-user"></i>
            </div>
            <input class="form-control" id="valor-cpf" required name="valorCPF" type="NUMBER"
                   placeholder="CPF (Somente Números)" disabled>
        </div>
    </td>
    <td>
        <form id="uploadimage" action="" method="post" enctype="multipart/form-data">
            <div id="selectImage">
                <span class="upload-wrapper">
                    <input class="upload-file" type="file" name="file" id="upload-cpf" required onchange="" disabled/>
                    <img class="upload-button" alt="title=" id="img-cpf" style="height: 34px; width: 34px;"
                         src="imagens/upload_+_disabled.png"/>
                </span>
            </div>
        </form>
    </td>

    <td>
        <div id="image_preview" align="center"><img id="previewing" style="width: 40px; height: 40px;"
                                                    src="dist/img/defaultimg.gif"/></div>
        <div id="message"></div>
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

<!-- CTPS -->

<tr>
    <td>CTPS</td> <!-- Nome do Documento -->

    <td> <!-- Validação Ausente/Presente do Documento -->
        <div>
            <input type="radio" name="radioCPF" id="radio1" value="presente" onclick="uploadCPF('atv');" class="radio"/>
            <label for="radio1">Presente</label>
        </div>
    </td>

    <td> <!-- Validação Ausente/Presente do Documento -->
        <div>
            <input type="radio" name="radioCPF" id="radio2" value="ausente" onclick="uploadCPF('dst');" class="radio"
                   checked/>
            <label for="radio2">Ausente</label>
        </div>
    </td>

    <td> <!-- Campo para digitar o Numero do Documento -->
        <div class="input-group">
            <div class="input-group-addon">
                <i class="fa fa-user"></i>
            </div>
            <input class="form-control" id="upCPFname" required name="valorCPF" type="NUMBER"
                   placeholder="CPF (Somente Números)" disabled>
        </div>
    </td>
    <td>
        <form id="uploadimage" action="" method="post" enctype="multipart/form-data">
            <div id="selectImage">
                <span class="upload-wrapper">
                    <input class="upload-file" type="file" name="file" id="file" required onchange=””/>
                    <img class="upload-button" alt="title=" style="height: 34px; width: 34px;"
                         src="imagens/upload_+.png"/>
                </span>
            </div>
        </form>
    </td>
</tr>


<!-- Comprovante de Residência -->

<tr>
    <td>Comprovante de Residência</td> <!-- Nome do Documento -->

    <td> <!-- Validação Ausente/Presente do Documento -->
        <div>
            <input type="radio" name="radioCPF" id="radio1" value="presente" onclick="uploadCPF('atv');" class="radio"/>
            <label for="radio1">Presente</label>
        </div>
    </td>

    <td> <!-- Validação Ausente/Presente do Documento -->
        <div>
            <input type="radio" name="radioCPF" id="radio2" value="ausente" onclick="uploadCPF('dst');" class="radio"
                   checked/>
            <label for="radio2">Ausente</label>
        </div>
    </td>

    <td> <!-- Campo para digitar o Numero do Documento -->
        <div class="input-group">
            <div class="input-group-addon">
                <i class="fa fa-user"></i>
            </div>
            <input class="form-control" id="upCPFname" required name="valorCPF" type="NUMBER"
                   placeholder="CPF (Somente Números)" disabled>
        </div>
    </td>
    <td>
        <form id="uploadimage" action="" method="post" enctype="multipart/form-data">
            <div id="selectImage">
                <span class="upload-wrapper">
                    <input class="upload-file" type="file" name="file" id="file" required onchange=””/>
                    <img class="upload-button" alt="title=" style="height: 34px; width: 34px;"
                         src="imagens/upload_+.png"/>
                </span>
            </div>
        </form>
    </td>
</tr>

<!--Contracheque -->

<tr>
    <td>Contracheque</td> <!-- Nome do Documento -->

    <td> <!-- Validação Ausente/Presente do Documento -->
        <div>
            <input type="radio" name="radioCPF" id="radio1" value="presente" onclick="uploadCPF('atv');" class="radio"/>
            <label for="radio1">Presente</label>
        </div>
    </td>

    <td> <!-- Validação Ausente/Presente do Documento -->
        <div>
            <input type="radio" name="radioCPF" id="radio2" value="ausente" onclick="uploadCPF('dst');" class="radio"
                   checked/>
            <label for="radio2">Ausente</label>
        </div>
    </td>

    <td> <!-- Campo para digitar o Numero do Documento -->
        <div class="input-group">
            <div class="input-group-addon">
                <i class="fa fa-user"></i>
            </div>
            <input class="form-control" id="upCPFname" required name="valorCPF" type="NUMBER"
                   placeholder="CPF (Somente Números)" disabled>
        </div>
    </td>
    <td>
        <form id="uploadimage" action="" method="post" enctype="multipart/form-data">
            <div id="selectImage">
                <span class="upload-wrapper">
                    <input class="upload-file" type="file" name="file" id="file" required onchange=””/>
                    <img class="upload-button" alt="title=" style="height: 34px; width: 34px;"
                         src="imagens/upload_+.png"/>
                </span>
            </div>
        </form>
    </td>
</tr>

<!-- Certidão de Nascimento -->

<tr>
    <td>Certidão de Nascimento</td> <!-- Nome do Documento -->

    <td> <!-- Validação Ausente/Presente do Documento -->
        <div>
            <input type="radio" name="radioCPF" id="radio1" value="presente" onclick="uploadCPF('atv');" class="radio"/>
            <label for="radio1">Presente</label>
        </div>
    </td>

    <td> <!-- Validação Ausente/Presente do Documento -->
        <div>
            <input type="radio" name="radioCPF" id="radio2" value="ausente" onclick="uploadCPF('dst');" class="radio"
                   checked/>
            <label for="radio2">Ausente</label>
        </div>
    </td>

    <td> <!-- Campo para digitar o Numero do Documento -->
        <div class="input-group">
            <div class="input-group-addon">
                <i class="fa fa-user"></i>
            </div>
            <input class="form-control" id="upCPFname" required name="valorCPF" type="NUMBER"
                   placeholder="CPF (Somente Números)" disabled>
        </div>
    </td>
    <td>
        <form id="uploadimage" action="" method="post" enctype="multipart/form-data">
            <div id="selectImage">
                <span class="upload-wrapper">
                    <input class="upload-file" type="file" name="file" id="file" required onchange=””/>
                    <img class="upload-button" alt="title=" style="height: 34px; width: 34px;"
                         src="imagens/upload_+.png"/>
                </span>
            </div>
        </form>
    </td>
</tr>

<!-- Certidão de Casamento-->

<tr>
    <td>Certidão de Casamento</td> <!-- Nome do Documento -->

    <td> <!-- Validação Ausente/Presente do Documento -->
        <div>
            <input type="radio" name="radioCPF" id="radio1" value="presente" onclick="uploadCPF('atv');" class="radio"/>
            <label for="radio1">Presente</label>
        </div>
    </td>

    <td> <!-- Validação Ausente/Presente do Documento -->
        <div>
            <input type="radio" name="radioCPF" id="radio2" value="ausente" onclick="uploadCPF('dst');" class="radio"
                   checked/>
            <label for="radio2">Ausente</label>
        </div>
    </td>

    <td> <!-- Campo para digitar o Numero do Documento -->
        <div class="input-group">
            <div class="input-group-addon">
                <i class="fa fa-user"></i>
            </div>
            <input class="form-control" id="upCPFname" required name="valorCPF" type="NUMBER"
                   placeholder="CPF (Somente Números)" disabled>
        </div>
    </td>
    <td>
        <form id="uploadimage" action="" method="post" enctype="multipart/form-data">
            <div id="selectImage">
                <span class="upload-wrapper">
                    <input class="upload-file" type="file" name="file" id="file" required onchange=””/>
                    <img class="upload-button" alt="title=" style="height: 34px; width: 34px;"
                         src="imagens/upload_+.png"/>
                </span>
            </div>
        </form>
    </td>
</tr>

<!-- Certidão de óbito -->

<tr>
    <td>Certidão de óbito</td> <!-- Nome do Documento -->

    <td> <!-- Validação Ausente/Presente do Documento -->
        <div>
            <input type="radio" name="radioCPF" id="radio1" value="presente" onclick="uploadCPF('atv');" class="radio"/>
            <label for="radio1">Presente</label>
        </div>
    </td>

    <td> <!-- Validação Ausente/Presente do Documento -->
        <div>
            <input type="radio" name="radioCPF" id="radio2" value="ausente" onclick="uploadCPF('dst');" class="radio"
                   checked/>
            <label for="radio2">Ausente</label>
        </div>
    </td>

    <td> <!-- Campo para digitar o Numero do Documento -->
        <div class="input-group">
            <div class="input-group-addon">
                <i class="fa fa-user"></i>
            </div>
            <input class="form-control" id="upCPFname" required name="valorCPF" type="NUMBER"
                   placeholder="CPF (Somente Números)" disabled>
        </div>
    </td>
    <td>
        <form id="uploadimage" action="" method="post" enctype="multipart/form-data">
            <div id="selectImage">
                <span class="upload-wrapper">
                    <input class="upload-file" type="file" name="file" id="file" required onchange=””/>
                    <img class="upload-button" alt="title=" style="height: 34px; width: 34px;"
                         src="imagens/upload_+.png"/>
                </span>
            </div>
        </form>
    </td>
</tr>




