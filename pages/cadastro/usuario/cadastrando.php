<?php
error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);

require_once("../../../plugins/PHPMailer/class.phpmailer.php");
require_once("../../../plugins/PHPMailer/class.smtp.php");
require_once("../../config/conn_pdo.php");
session_start();
$conn = Conectar();
$mail = new PHPMailer;

    $nome=$_POST['nome'];
    $login=$_POST['login'];
    $email=$_POST['email'];
    $telefone=$_POST['telefone'];
    $foto=$_POST['foto'];
    $senha=$_POST['senha'];
    $turma =$_POST['turma'];
    $semestre=$_POST['semestre'];
    $turno=$_POST['turno'];
    $permissao=$_POST['permissao'];

    $ver_existencia = $conn->prepare("SELECT * FROM usuario WHERE login=?");
    $ver_existencia->execute(array($login));
    if( ($nome) && ($login) && ($email) && ($telefone) && ($senha) && ($turma) && $ver_existencia->rowCount()==0 ) {
            try {
                $stmt = $conn->prepare("INSERT INTO usuario(nome, login, email, telefone, foto, senha, turma, turno, semestre, permissao)
                 VALUES
                ('$nome','$login','$email','$telefone','dist/img/$foto', MD5('$senha'),'$turma','$turno','$semestre','$permissao')");
                /*
                 *
                 * ********************************
                 * // ENVIAR E-MAIL COM INFORMAÇÕES DO CADASTRADO - DENTRO DO TRY.
                 * ********************************
                 *
                 */
                $mail->isSMTP();
                $mail->Host = 'smtp.live.com';
                $mail->SMTPAuth = true;
                $mail->CharSet = 'UTF-8';
                $mail->Username = 'npj.teste@hotmail.com';
                $mail->Password = '1a2a3a4a';
                $mail->SMTPSecure = 'tls';
                $mail->Port = 587;
                $mail->IsHTML(true);
                // Define o remetente
                // =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
                $mail->From = 'npj.teste@hotmail.com';
                $mail->FromName = 'SISAP - NPJ | ESTACIO | FCAT';

                // Define os destinatário(s)
                // =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=

                //$mail->AddAttachment("c:/temp/documento.pdf", "novo_nome.pdf");  // Insere um anexo
                $mail->addAddress($email);
                $mail->Subject = 'Informações de Cadastro - NPJ - ESTÁCIO | FCAT';
                $mail->Body = "
                <div align='center'><img width='360' height='90' src='https://ap.imagensbrasil.org/images/5o8o7n.png' alt='NPJ-SISAP'/> </div>
                <p align='justify'>
                Olá, Bem-Vindo ao NPJ-SISAP! Somos um sistema desenvolvido em PHP por uma equipe da ESTÁCIO-FCAT. Turma ADSN2014.1. E estamos deixando de legado o SISAP. <br/>
                Esse é o Cadastro de Usuário, no qual você foi cadastrado como: $permissao. <br/>
                Guarde bem essas informações e esse e-mail, pois você precisará de seu Login e Senha para entrar no sistema.<br/>
                O sistema pode ser acessado através do Link: http://localhost/npjsisap.<br/>
                Segue suas Informações Pessoais:<br/>
                <hr><b>
                Nome: $nome <br/>
                Usuário: $login <br/>
                Senha: $senha <br/>
                E-mail: $email <br/>
                Telefone: $telefone <br/>
                Turma: $turma <br/>
                Turno: $turno <br/>
                Semestre: $semestre <br/>
                </b>
                <hr>
                <div align='center'>
                Esperamos que o NPJ-SISAP ajude-o no seu cotidiano no NPJ!<br/><br/>
                Abraçs – Equipe TecnoSoft – by Anderson Thiago</div>
                </p>
                ";
               $enviado = $mail->Send();

                $stmt->execute();
                print "<code>Cadastro de ".$login." Realizado com Sucesso!</code>";
            }catch (PDOException $e){
                print "<code>Usuário ". $login." já existe</code>";
            }

    }else{
        print "<code>Preencha todos os campos obrigatórios!</code>";
    }


/*
$sql = mysql_query("INSERT INTO usuario(nome, login, senha, semestre, turma, turno, telefone, permissao, foto, email) VALUES ('$nome','$login', '$senha', '$semestre','$turma', '$turno', '$telefone', '$permissao', 'dist/img/$foto', '$email' )");
echo "<script>loginsucessfully()</script>";
*/

?>