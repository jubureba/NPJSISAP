<?php
//variaveis
$imgUpOFF = "dist/img/upload-invalid-icon.png";
$imgUpON = "dist/img/upload-icon.ico";

?>

<style type='text/css'>
    .aumentaIMG span{display:none;}
    .aumentaIMG img:hover span{background:transparent; display:block; position:absolute; z-index:100; left: 65%; bottom: 1%}
    .aumentaIMG img:hover span img{background:blue;}
    .aumentaIMG img:hover em{z-index:1; display:none;}
    .aumentaIMG img{border:#000 1px solid;}
    .aumentaIMG img:hover img{border:#000 1px solid;}
    #image_preview:active{
        zoom: 500%

    }
    #image_preview:hover{

        -webkit-transform: scale(1.5);
        -moz-transform: scale(1.5);
        -ms-transform: scale(1.5);
        -o-transform: scale(1.5);
        transform: scale(1.5);
    }
    }
</style>



<div class="box-body">
    <table class="table table-bordered" id="example1">
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
                <div><input type="radio" name="radioCPF" id="radioCPF1" value="presente" onclick="uploadCPF('atv');"
                            class="radio"/><label for="radioCPF1">Presente</label>
                </div>
            </td>
            <td> <!-- Validação Ausente/Presente do Documento -->
                <div><input type="radio" name="radioCPF" id="radioCPF2" value="ausente" onclick="uploadCPF('dst');"
                            checked class="radio"/><label for="radioCPF2">Ausente</label>
                </div>
            </td>

            <td> <!-- Campo para digitar o Numero do Documento -->
                <div class="input-group">
                    <div class="input-group-addon">
                        <i class="fa fa-user"></i>
                    </div>
                    <input class="form-control" id="valor-cpf" onblur="validarCPF(this.value)" required name="valorCPF" type="text"
                           placeholder="CPF (Somente Números)" disabled>
                </div>
            </td>
            <td>
                <!--Mando a IMG do input file por um submit ajax, atraves do script da pasta scripts-->

                <form id="uploadForm1" method="post" enctype="multipart/form-data">
                    <div id="selectImage">
                        <div id="uploadFormLayer" align="center">
                    <span class="upload-wrapper">
                    <input class="upload-file" type="file" name="img-cpf" id="upload-cpf" required disabled/>
                    <img class="upload-button" name="file" alt="title=" id="img-cpf" style="height: 24px; width: 24px;"
                         src="<?php echo $imgUpOFF; ?>"/><br/>
                        <input id="upload-cpf-button" type="submit" value="Upload" class="upload-cpf-button" hidden/>
                    </span>
                        </div>
                    </div>
                </form>
            </td>

            <td>

                <div id="image_preview" align="center">
                    <div id="targetLayer1">
                        <img id="previewing1" style="width: 40px; height: 40px;" src="dist/img/defaultimg.gif"
                             data-zoom-image="dist/img/defaultimg.gif"/></div></div>
            </td>
        </tr>
        <script type="text/javascript">
            function uploadCPF(value) {

                if (value == 'dst') {
                    document.getElementById("valor-cpf").disabled = true;
                    document.getElementById("valor-cpf").required = false;
                    document.getElementById("upload-cpf").disabled = true;
                    document.getElementById("upload-cpf").required = false;
                    document.getElementById('img-cpf').src = "<?php echo $imgUpOFF;?>";

                } else {
                    document.getElementById("valor-cpf").disabled = false;
                    document.getElementById("valor-cpf").required = true;
                    document.getElementById("upload-cpf").disabled = false;
                    document.getElementById("upload-cpf").required = true;
                    document.getElementById('img-cpf').src = "<?php echo $imgUpON;?>";
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
                <form id="uploadForm2" action="" method="post" enctype="multipart/form-data">
                    <div id="selectImage">
                        <div align="center">
                    <span class="upload-wrapper">
                    <input class="upload-file" type="file" name="img-rg" id="upload-rg" required onchange="" disabled/>
                    <img class="upload-button" alt="title=" id="img-rg" style="height: 24px; width: 24px;"
                         src="<?php echo $imgUpOFF; ?>"/>
                        <input id="upload-rg-button" type="submit" value="Upload" class="upload-rg-button" hidden/>
                    </span>
                        </div>
                    </div>
                </form>
            </td>

            <td>
                <div id="image_preview" align="center">
                    <div id="targetLayer2">
                        <img id="previewing2" style="width: 40px; height: 40px;" src="dist/img/defaultimg.gif"
                             data-zoom-image="dist/img/defaultimg.gif"/></div></div>
            </td>
        </tr>
        <script type="text/javascript">
            function uploadRG(value) {

                if (value == 'dst') {
                    document.getElementById("valor-rg").disabled = true;
                    document.getElementById("valor-rg").required = false;
                    document.getElementById("upload-rg").disabled = true;
                    document.getElementById("upload-rg").required = false;
                    document.getElementById('img-rg').src = "<?php echo $imgUpOFF;?>";

                } else {
                    document.getElementById("valor-rg").disabled = false;
                    document.getElementById("valor-rg").required = true;
                    document.getElementById("upload-rg").disabled = false;
                    document.getElementById("upload-rg").required = true;
                    document.getElementById('img-rg').src = "<?php echo $imgUpON;?>";
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
                <form id="uploadForm3" action="" method="post" enctype="multipart/form-data">
                    <div id="selectImage">
                        <div align="center">
                <span class="upload-wrapper">
                    <input class="upload-file" type="file" name="img-ctps" id="upload-ctps"  disabled/>
                    <img class="upload-button" id="img-ctps" alt="title=" style="height: 24px; width: 24px;"
                         src="<?php echo $imgUpOFF; ?>"/>
                    <input id="upload-ctps-button" type="submit" value="Upload" class="upload-ctps-button" hidden/>
                </span>
                        </div>
                    </div>

                </form>




            </td>

            <td>
                <div id="image_preview" align="center">
                    <div id="targetLayer3">
                        <img id="previewing3" style="width: 40px; height: 40px;" src="dist/img/defaultimg.gif"
                             data-zoom-image="dist/img/defaultimg.gif"/></div></div>
            </td>
        </tr>

        <script type="text/javascript">
            function uploadCTPS(value) {

                if (value == 'dst') {
                    document.getElementById("valor-ctps").disabled = true;
                    document.getElementById("valor-ctps").required = false;
                    document.getElementById("upload-ctps").disabled = true;
                    document.getElementById("upload-ctps").required = false;
                    document.getElementById('img-ctps').src = "<?php echo $imgUpOFF;?>";

                } else {
                    document.getElementById("valor-ctps").disabled = false;
                    document.getElementById("valor-ctps").required = true;
                    document.getElementById("upload-ctps").disabled = false;
                    document.getElementById("upload-ctps").required = true;
                    document.getElementById('img-ctps').src = "<?php echo $imgUpON;?>";
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
                <form id="uploadForm4" action="" method="post" enctype="multipart/form-data">
                    <div id="selectImage">
                        <div align="center">
                 <span class="upload-wrapper">
                     <input class="upload-file" type="file" name="img-residencia" id="upload-residencia" required onchange=""
                            disabled/>
                     <img class="upload-button" id="img-residencia" alt="title=" style="height: 24px; width: 24px;"
                          src="<?php echo $imgUpOFF; ?>"/>
                     <input id="upload-residencia-button" type="submit" value="Upload" class="upload-residencia-button" hidden/>
                 </span>
                        </div>
                    </div>
                </form>
            </td>

            <td>
                <div id="image_preview" align="center">
                    <div id="targetLayer4">
                        <img id="previewing4" style="width: 40px; height: 40px;" src="dist/img/defaultimg.gif"
                             data-zoom-image="dist/img/defaultimg.gif"/></div></div>
            </td>
        </tr>
        <script type="text/javascript">
            function uploadRESIDENCIA(value) {

                if (value == 'dst') {
                    document.getElementById("upload-residencia").disabled = true;
                    document.getElementById("upload-residencia").required = false;
                    document.getElementById('img-residencia').src = "<?php echo $imgUpOFF;?>";

                } else {
                    document.getElementById("upload-residencia").disabled = false;
                    document.getElementById("upload-residencia").required = true;
                    document.getElementById('img-residencia').src = "<?php echo $imgUpON;?>";
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
                <form id="uploadForm5" action="" method="post" enctype="multipart/form-data">
                    <div id="selectImage" align="center">
                <span class="upload-wrapper">
                    <input class="upload-file" type="file" name="img-contracheque" id="upload-contracheque" required onchange=""
                           disabled/>
                    <img class="upload-button" id="img-contracheque" alt="title=" style="height: 24px; width: 24px;"
                         src="<?php echo $imgUpOFF; ?>"/>
                    <input id="upload-contracheque-button" type="submit" value="Upload" class="upload-contracheque-button" hidden/>
                </span>
                    </div>
                </form>
            </td>

            <td>
                <div id="image_preview" align="center">
                    <div id="targetLayer5">
                        <img id="previewing5" style="width: 40px; height: 40px;" src="dist/img/defaultimg.gif"
                             data-zoom-image="dist/img/defaultimg.gif"/></div></div>
            </td>
        </tr>
        <script type="text/javascript">
            function uploadCONTRACHEQUE(value) {

                if (value == 'dst') {
                    document.getElementById("upload-contracheque").disabled = true;
                    document.getElementById("upload-contracheque").required = false;
                    document.getElementById('img-contracheque').src = "<?php echo $imgUpOFF;?>";

                } else {
                    document.getElementById("upload-contracheque").disabled = false;
                    document.getElementById("upload-contracheque").required = true;
                    document.getElementById('img-contracheque').src = "<?php echo $imgUpON;?>";
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
                <form id="uploadForm6" action="" method="post" enctype="multipart/form-data">
                    <div id="selectImage" align="center">
                <span class="upload-wrapper">
                    <input class="upload-file" type="file" name="img-nascimento" id="upload-nascimento" required onchange=""
                           disabled/>
                    <img class="upload-button" id="img-nascimento" alt="title=" style="height: 24px; width: 24px;"
                         src="<?php echo $imgUpOFF; ?>"/>
                    <input id="upload-nascimento-button" type="submit" value="Upload" class="upload-nascimento-button" hidden/>
                </span>
                    </div>
                </form>
            </td>
            <td>
                <div id="image_preview" align="center">
                    <div id="targetLayer6">
                        <img id="previewing6" style="width: 40px; height: 40px;" src="dist/img/defaultimg.gif"
                             data-zoom-image="dist/img/defaultimg.gif"/></div></div>
            </td>
        </tr>
        <script type="text/javascript">
            function uploadNASCIMENTO(value) {

                if (value == 'dst') {
                    document.getElementById("valor-nascimento").disabled = true;
                    document.getElementById("valor-nascimento").required = false;
                    document.getElementById("upload-nascimento").disabled = true;
                    document.getElementById("upload-nascimento").required = false;
                    document.getElementById('img-nascimento').src = "<?php echo $imgUpOFF;?>";

                } else {
                    document.getElementById("valor-nascimento").disabled = false;
                    document.getElementById("valor-nascimento").required = true;
                    document.getElementById("upload-nascimento").disabled = false;
                    document.getElementById("upload-nascimento").required = true;
                    document.getElementById('img-nascimento').src = "<?php echo $imgUpON;?>";
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
                <form id="uploadForm7" action="" method="post" enctype="multipart/form-data">
                    <div id="selectImage" align="center">
                <span class="upload-wrapper">
                    <input class="upload-file" type="file" name="img-casamento" id="upload-casamento" required onchange=""
                           disabled/>
                    <img class="upload-button" id="img-casamento" alt="title=" style="height: 24px; width: 24px;"
                         src="<?php echo $imgUpOFF; ?>"/>
                    <input id="upload-casamento-button" type="submit" value="Upload" class="upload-casamento-button" hidden/>
                </span>
                    </div>
                </form>
            </td>
            <td>
                <div id="image_preview" align="center">
                    <div id="targetLayer7">
                        <img id="previewing7" style="width: 40px; height: 40px;" src="dist/img/defaultimg.gif"
                             data-zoom-image="dist/img/defaultimg.gif"/></div></div>
            </td>
        </tr>
        <script type="text/javascript">
            function uploadCASAMENTO(value) {

                if (value == 'dst') {
                    document.getElementById("upload-casamento").disabled = true;
                    document.getElementById("upload-casamento").required = false;
                    document.getElementById('img-casamento').src = "<?php echo $imgUpOFF;?>";

                } else {
                    document.getElementById("upload-casamento").disabled = false;
                    document.getElementById("upload-casamento").required = true;
                    document.getElementById('img-casamento').src = "<?php echo $imgUpON;?>";
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
                <form id="uploadForm8" action="" method="post" enctype="multipart/form-data">
                    <div id="selectImage" align="center">
                <span class="upload-wrapper">
                    <input class="upload-file" type="file" name="img-obito" id="upload-obito" required onchange="" disabled/>
                    <img class="upload-button" id="img-obito" alt="title=" style="height: 24px; width: 24px;"
                         src="<?php echo $imgUpOFF; ?>"/>
                    <input id="upload-obito-button" type="submit" value="Upload" class="upload-obito-button" hidden/>
                </span>
                    </div>
                </form>
            </td>
            <td>
                <div id="image_preview" align="center">
                    <div id="targetLayer8">
                        <img id="previewing8" style="width: 40px; height: 40px;" src="dist/img/defaultimg.gif"
                             data-zoom-image="dist/img/defaultimg.gif"/></div></div>
            </td>
        </tr>
        <script type="text/javascript">
            function uploadOBITO(value) {

                if (value == 'dst') {
                    document.getElementById("upload-obito").disabled = true;
                    document.getElementById("upload-obito").required = false;
                    document.getElementById('img-obito').src = "<?php echo $imgUpOFF;?>";

                } else {
                    document.getElementById("upload-obito").disabled = false;
                    document.getElementById("upload-obito").required = true;
                    document.getElementById('img-obito').src = "<?php echo $imgUpON;?>";
                }
            }
        </script>


        </tbody>
    </table>
</div><!-- /.box-body -->