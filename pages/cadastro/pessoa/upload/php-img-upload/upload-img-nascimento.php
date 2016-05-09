<?php
session_start();
error_reporting (E_ALL & ~ E_NOTICE & ~ E_DEPRECATED);
$nomePasta = $_SESSION['usuarioNome']; //NOME DA PASTA COM NOME DA SESSÃO
if(is_array($_FILES)) {
    if(is_uploaded_file($_FILES['img-nascimento']['tmp_name'])) {

        if(is_dir("../img-upload/".$nomePasta)) {
            $sourcePath = $_FILES['img-nascimento']['tmp_name'];
            $targetPath = "../img-upload/".$nomePasta."/".$_FILES['img-nascimento']['name'];
            if(move_uploaded_file($sourcePath,$targetPath)) {
                ?>
                <img src="pages/cadastro/pessoa/upload<?php echo $targetPath; ?>" width="40px" height="40px" />
                <?php
            }
        }else {
            umask(0); mkdir("../img-upload/".$nomePasta, 0777, true);
            $sourcePath = $_FILES['img-nascimento']['tmp_name'];
            $targetPath = "../img-upload/".$nomePasta."/".$_FILES['img-nascimento']['name'];
            if(move_uploaded_file($sourcePath,$targetPath)) {
                ?>
                <img src="pages/cadastro/pessoa/upload/<?php echo $targetPath; ?>" width="40px" height="40px" />
                <?php
            }
        }
        $_SESSION['img-nascimento']="pages/cadastro/pessoa/upload/".$targetPath;
        $_SESSION['nascimento']=$_POST['valor-nascimento'];
    }
}
?>