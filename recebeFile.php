<?php
session_start();

 if(!isset($_FILES['arquivo']['name']))
 exit(header('Location: ../recorte_de_imagens/'));
 else{
 sleep(1);
 $fileName = $_FILES['arquivo']['name'];
 $fileTMP = $_FILES['arquivo']['tmp_name'];
 $fileType = $_FILES['arquivo']['type'];
 $fileError = $_FILES['arquivo']['error'];
 $fileEXT = explode('.', $fileName);
 $newName = ($fileName);
 $permitido = array('image/png','image/jpeg');
 define('OUTPUT', 'dist/img/' . $newName);
 if(in_array($fileType, $permitido) == false)
 echo 'Por favor selecione um arquivo do tipo JPEG ou PNG.';
 elseif($fileError == 4)
 echo 'Desculpe, mas o arquivo não foi enviado, por favor, tente novamente,';
 elseif($fileError == 3)
 echo 'Desculpe, o envio do arquivo não foi completado com sucesso, por favor, tente novamente.';
 elseif($fileError == 2)
 echo 'Esta imagem é muito grande, por favor, selecione uma imagem de até 2MB de tamanho!';
 elseif($fileError == 1)
 echo 'Esta imagem é muito grande, por favor, selecione uma imagem de até 2MB de tamanho!';
 else{
 if($fileType == 'image/png')
 $img = imagecreatefrompng($fileTMP);
 else
 $img = imagecreatefromjpeg($fileTMP);
 $imgWidth = imagesx($img);
 $imgHeight = imagesy($img);
 if($imgWidth > 160){
 $x = 160;
 $y = 160;
 }else{
 $x = 160;
 $y = 160;
 }
 if($y > 160){
 $y2 = 160;
 $x = ceil(($x / $y) * $y2);
 $y = $y2;
 }
 $newImage = imagecreatetruecolor($x,$y);
 imagecopyresampled($newImage, $img, 0, 0, 0, 0, $x, $y, $imgWidth, $imgHeight);
 if($fileType == 'image/png')
 $finalImage = imagepng($newImage, OUTPUT);
 else
 $finalImage = imagejpeg($newImage, OUTPUT);
 if($finalImage)
 echo 'Imagem carregada com sucesso<br /><img onload="getCoords();" id="toCrop" src="'. OUTPUT .'" /><input type="hidden" id="imgType" value="' . $fileType.'"/><input type="hidden" id="imgName" value="'. $newName .'"/>';
 else
 echo 'Ocorreu um erro ao tentar criar a nova imagem';
 }
 }
 ?>