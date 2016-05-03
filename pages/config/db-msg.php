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

                                        <!-- BOTÃO FECHAR POPOVER -->
                                        <a href="#" class="pull-right btn-box-tool" onclick="abrirPopover(<?php echo $mensagem->id; ?>)" id="popover-dismiss_<?php echo $mensagem->id; ?>" ><i class="fa fa-times"></i></a>
                                        <!-- CONTEUDO DO POPOVER -->

                                        <div id="ex02conteudo" style="display: none">
                                            <a href="#" id="content_popover" onclick="apagarMsg(this.id);">Excluir </a>
                                        </div>
                                        <!-- CONTEUDO DO POPOVER -->
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