<?php

/**
 * Sistema de seguranï¿½a com acesso restrito
 *
 * Usado para restringir o acesso de certas pï¿½ginas do seu site
 *
 * @author Thiago Belem <contato@thiagobelem.net>
 * @link http://thiagobelem.net/
 *
 * @version 1.0
 * @package SistemaSeguranca
 */

//  Configuraï¿½ï¿½es do Script
// ==============================
$_SG['conectaServidor'] = true;    // Abre uma conexï¿½o com o servidor MySQL?
$_SG['abreSessao'] = true;         // Inicia a sessï¿½o com um session_start()?

$_SG['caseSensitive'] = false;     // Usar case-sensitive? Onde 'thiago' ï¿½ diferente de 'THIAGO'

$_SG['validaSempre'] = true;       // Deseja validar o usuï¿½rio e a senha a cada carregamento de pï¿½gina?
// Evita que, ao mudar os dados do usuï¿½rio no banco de dado o mesmo contiue logado.
$_SG['servidor'] = 'localhost';    // Servidor MySQL
$_SG['usuario'] = 'root';          // Usuï¿½rio MySQL
$_SG['senha'] = '';                // Senha MySQL
$_SG['banco'] = 'npj';            // Banco de dados MySQL
$_SG['paginaLogin'] = 'index.php'; // Pï¿½gina de login
$_SG['tabela'] = 'usuario';       // Nome da tabela onde os usuï¿½rios sï¿½o salvos
// ==============================



// ======================================
//   ~ Nï¿½o edite a partir deste ponto ~
// ======================================

// Verifica se precisa fazer a conexï¿½o com o MySQL

if ($_SG['conectaServidor'] == true) {
    $_SG['link'] = mysql_connect($_SG['servidor'], $_SG['usuario'], $_SG['senha']) or die("MySQL: Nï¿½o foi possï¿½vel conectar-se ao servidor [".$_SG['servidor']."].");
    mysql_select_db($_SG['banco'], $_SG['link']) or die("MySQL: Nï¿½o foi possï¿½vel conectar-se ao banco de dados [".$_SG['banco']."].");
}

// Verifica se precisa iniciar a sessï¿½o
if ($_SG['abreSessao'] == true)
    session_start();

/**
 * Funï¿½ï¿½o que valida um usuï¿½rio e senha
 *
 * @param string $login - O usuï¿½rio a ser validado
 * @param string $senha - A senha a ser validada
 *
 * @return bool - Se o usuï¿½rio foi validado ou nï¿½o (true/false)
 */
function validaUsuario($login, $senha) {
    global $_SG;

    $cS = ($_SG['caseSensitive']) ? 'BINARY' : '';

    // Usa a funï¿½ï¿½o addslashes para escapar as aspas
    $nlogin = addslashes($login);
    $nsenha = addslashes(MD5($senha));

    // Monta uma consulta SQL (query) para procurar um usuï¿½rio
    $sql = "SELECT * FROM `".$_SG['tabela']."` WHERE ".$cS." `login` = '".$nlogin."' AND ".$cS." `senha` = '".$nsenha."' LIMIT 1";
    $query = mysql_query($sql);
    $resultado = mysql_fetch_assoc($query);

    // Verifica se encontrou algum registro
    if (empty($resultado)) {
        // Nenhum registro foi encontrado => o usuï¿½rio ï¿½ invï¿½lido
        return false;
    } else {
        // Definimos dois valores na sessï¿½o com os dados do usuï¿½rio
        $_SESSION['usuarioID'] = $resultado['id_usuario']; // Pega o valor da coluna 'id do registro encontrado no MySQL
        $_SESSION['usuarioNome'] = $resultado['nome']; // Pega o valor da coluna 'nome' do registro encontrado no MySQL
        $_SESSION['permissaoUser'] = $resultado['permissao'];
		$_SESSION['imagem'] = $resultado['foto'];
		$_SESSION['email'] = $resultado['email'];
        // Verifica a opï¿½ï¿½o se sempre validar o login
        if ($_SG['validaSempre'] == true) {
            // Definimos dois valores na sessï¿½o com os dados do login
            $_SESSION['usuarioLogin'] = $login;
            $_SESSION['usuarioSenha'] = $senha;
        }

        return true;
    }
}

/**
 * Funï¿½ï¿½o que protege uma pï¿½gina
 */
function protegePagina() {
    global $_SG;

    if (!isset($_SESSION['usuarioID']) OR !isset($_SESSION['usuarioNome'])) {
        // Nï¿½o hï¿½ usuï¿½rio logado, manda pra pï¿½gina de login
         voltarLogin();
	
    } else {
        // Hï¿½ usuï¿½rio logado, verifica se precisa validar o login novamente
        if ($_SG['validaSempre'] == true) {
            // Verifica se os dados salvos na sessï¿½o batem com os dados do banco de dados
            if (!validaUsuario($_SESSION['usuarioLogin'], $_SESSION['usuarioSenha'])) {
                // Os dados nï¿½o batem, manda pra tela de login
         		voltarLogin();
            }
        }
    }
}

function voltarLogin(){
        global $_SG;

    // Remove as variï¿½veis da sessï¿½o (caso elas existam)
    unset($_SESSION['usuarioID'], $_SESSION['usuarioNome'], $_SESSION['usuarioLogin'], $_SESSION['usuarioSenha'], $_SESSION['permissaoUser']);
    // Manda pra tela de login
    header("Location: pages/login/index.php");
}


/**
 * Funï¿½ï¿½o para expulsar um visitante
 */
function expulsaVisitante() {
    global $_SG;

    // Remove as variï¿½veis da sessï¿½o (caso elas existam)
    unset($_SESSION['usuarioID'], $_SESSION['usuarioNome'], $_SESSION['usuarioLogin'], $_SESSION['usuarioSenha'], $_SESSION['permissaoUser']);
    // Manda pra tela de login
    header("Location: ".$_SG['paginaLogin']);
}