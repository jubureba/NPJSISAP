<?php
require_once("../../plugins/PHPMailer/class.phpmailer.php");
require_once("../../plugins/PHPMailer/class.smtp.php");

// Instância do objeto PHPMailer
$mail = new PHPMailer;
// Configura para envio de e-mails usando SMTP
$mail->isSMTP();
// Servidor SMTP
$mail->Host = 'smtp.live.com';
// Usar autenticação SMTP
$mail->SMTPAuth = true;
$mail->CharSet = 'UTF-8';
// Usuário da conta
$mail->Username = 'npj.teste@hotmail.com';
// Senha da conta
$mail->Password = '1a2a3a4a';
// Tipo de encriptação que será usado na conexão SMTP
$mail->SMTPSecure = 'tls';
// Porta do servidor SMTP
$mail->Port = 587;
// Informa se vamos enviar mensagens usando HTML
$mail->IsHTML(true);
// Email do Remetente
$mail->From = 'npj.teste@hotmail.com';
// Nome do Remetente
$mail->FromName = 'teste';
// Endereço do e-mail do destinatário
$mail->addAddress('eng.thiagolima@hotmail.com');
// Assunto do e-mail
$mail->Subject = 'E-mail PHPMailer';


// Mensagem que vai no corpo do e-mail
$mail->Body = '
<img src="../img/fcat-estacio-logo-341x94.png"/>
<p>Olá Aluno Estácio|Fcat, Bem-Vindo ao WIFI.<br/>
Guarde seus dados de acesso:<br/>
Usuario: <br/>
Senha: <br/>
Comece a Navegar Agora Mesmo!<br/><br/>
TI - Estacio | FCAT
</p>


';


// Envia o e-mail e captura o sucesso ou erro
if($mail->Send()):
    echo 'Enviado com sucesso !';
else:
    echo 'Erro ao enviar Email:' . $mail->ErrorInfo;
endif;

?>
