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
        <input type="file" id="upload-cpf" disabled>
    </td>
</tr>
<script type="text/javascript">
    function uploadCPF(value) {

        if (value == 'dst') {
            document.getElementById("valor-cpf").disabled = true;
            document.getElementById("valor-cpf").required = false;
            document.getElementById("upload-cpf").disabled = true;
            document.getElementById("upload-cpf").required = false;

        } else {
            document.getElementById("valor-cpf").disabled = false;
            document.getElementById("valor-cpf").required = true;
            document.getElementById("upload-cpf").disabled = false;
            document.getElementById("upload-cpf").required = true;
        }
    }
</script>


<!-- RG  -->

<tr>
    <td>RG</td> <!-- Nome do Documento -->

    <td> <!-- Validação Ausente/Presente do Documento -->
        <div>
            <input type="radio" name="radioRG" id="radiorg1" value="presente" onclick="uploadRG('atv');" class="radio"/>
            <label for="radiorg1">Presente</label>
        </div>
    </td>

    <td> <!-- Validação Ausente/Presente do Documento -->
        <div>
            <input type="radio" name="radioRG" id="radiorg2" value="ausente" onclick="uploadRG('dst');" class="radio"/>
            <label for="radiorg2">Ausente</label>
        </div>
    </td>

    <td> <!-- Campo para digitar o Numero do Documento -->
        <div class="input-group">
            <div class="input-group-addon">
                <i class="fa fa-user"></i>
            </div>
            <input class="form-control" id="valor-rg" required name="valorRG" type="NUMBER"
                   placeholder="RG (Somente Números)" disabled>
        </div>
    </td>
    <td>
        <input type="file" id="upload-rg" disabled>
    </td>
</tr>

<script type="text/javascript">
    function uploadRG(value) {

        if (value == 'dst') {
            document.getElementById("valor-rg").disabled = true;
            document.getElementById("valor-rg").required = false;
            document.getElementById("upload-rg").disabled = true;
            document.getElementById("upload-rg").required = false;

        } else {
            document.getElementById("valor-rg").disabled = false;
            document.getElementById("valor-rg").required = true;
            document.getElementById("upload-rg").disabled = false;
            document.getElementById("upload-rg").required = true;
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
            <input type="radio" name="radioCPF" id="radio2" value="ausente" onclick="uploadCPF('dst');" class="radio"/>
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
        <input type="file" id="upCPF" disabled>
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
            <input type="radio" name="radioCPF" id="radio2" value="ausente" onclick="uploadCPF('dst');" class="radio"/>
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
        <input type="file" id="upCPF" disabled>
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
            <input type="radio" name="radioCPF" id="radio2" value="ausente" onclick="uploadCPF('dst');" class="radio"/>
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
        <input type="file" id="upCPF" disabled>
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
            <input type="radio" name="radioCPF" id="radio2" value="ausente" onclick="uploadCPF('dst');" class="radio"/>
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
        <input type="file" id="upCPF" disabled>
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
            <input type="radio" name="radioCPF" id="radio2" value="ausente" onclick="uploadCPF('dst');" class="radio"/>
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
        <input type="file" id="upCPF" disabled>
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
            <input type="radio" name="radioCPF" id="radio2" value="ausente" onclick="uploadCPF('dst');" class="radio"/>
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
        <input type="file" id="upCPF" disabled>
    </td>
</tr>




