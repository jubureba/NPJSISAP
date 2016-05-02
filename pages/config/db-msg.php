<script>
    $('[data-toggle="popover"]').popover(

        {html: true , content: function(){return $('#ex02conteudo').html(); },animation: true, placement: "bottom"}


    );


    function apagarMsg(id) {
        document.getElementById("loading-msg").setAttribute("class", "overlay");
        document.getElementById("loading-msg").innerHTML="<i class='fa fa-refresh fa-spin'></i>";
        setTimeout(function() {
            $('#msgs').load("pages/chat/excluirMensagem.php?idMensagem="+id);
            $('#msgs').load('pages/config/db-msg.php');
            document.getElementById("loading-msg").setAttribute("class", "");
            document.getElementById("loading-msg").innerHTML="<i class=''></i>";
            document.getElementById("mensagem").value="";
        }, 500);

    }
</script>
    <!-- BARRA DE ROLAGEM -->
    <!-- VAI CRIAR UM CAMPO DE TEXTO NOVO PARA CADA MENSAGEM NO BANCO DE DADOS-->
    <!-- Daqui para baixo, eu não sei o que eu fiz, mas Funcionou -->

<?php

    session_start();
    require ("conn.php");
    $query = mysql_query("SELECT * FROM mensagens ORDER BY id DESC ");
    $sqlData = "SELECT date_format(dataHora, '%d/%m/%Y às %H:%i') AS dataHora FROM mensagens ORDER BY id DESC";
    $todosDados = "SELECT * FROM mensagens ORDER BY id DESC";
    $consultaData = mysql_query($sqlData) or die(mysql_error());
    $result = mysql_query($todosDados);
    while (($mensagem = mysql_fetch_object($query)) && ($row = mysql_fetch_array($consultaData)) && ($dados = mysql_fetch_array($result))) {
        ?>
        <ul class="timeline timeline-inverse">
            <li>
                <div class="timeline-item">
                    <h3 class="timeline-header"><a href="#">
                            <div class="user-block">
                                <img class="img-circle img-bordered-sm"
                                    src="<?php echo "" . $dados['foto'] ?> "
                                    alt="user image">
                                <span class="username">
                                    <a href="#"><?php echo "   " . $dados['nome'] . " " ?></a>
                                    <?php

                                    if ($dados['nome'] == $_SESSION['usuarioNome']) {
                                        ?>

                                        <div id="ex02conteudo" style="display: none">
                                           <a href="#" id="<?php echo $mensagem->id; ?>" onclick="apagarMsg(this.id);">Excluir</a>
                                        </div>

                                        <a href="#" class="pull-right btn-box-tool" role="button" data-toggle="popover" data-trigger="focus" id="popover-dismiss" ><i class="fa fa-times"></i></a>


               
                                   <!--     <a href="#" onclick="javascript: if (confirm('Você realmente deseja excluir esta mensagem?\n-> <?php echo $mensagem->mensagem ?> <-'))location.href='pages/chat/excluirMensagem.php?idMensagem=<?php echo $mensagem->id; ?>'
                                            " class="pull-right btn-box-tool"><i class="fa fa-times"></i></a> 0-->

                                    <?php } ?>
                                </span>

                                <span class="description">
								    <?php
                                    echo "Enviado em ";
                                    echo '' . $row['dataHora'];
                                    ?>
								</span>

                            </div>
                        </a></h3>


                    <div class="timeline-body">
                        <div
                            id="mensagens_<?php echo $mensagem->id; ?>"></div>
                        <?php echo "  " . $mensagem->mensagem . ""; ?>

                    </div>
                </div>
            </li>
            
        </ul>
    <?php } //FIM FOR - ?>
