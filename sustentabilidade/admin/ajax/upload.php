<?php
require_once '../../config.php';
require_once '../../vendor/connection.php';


function formatarString($string) {
	$string = iconv('UTF-8', 'ASCII//TRANSLIT', $string);    
	$string = strtolower(str_replace(' ', '-', $string));
	$string = preg_replace('/[^a-zA-Z0-9\-]/', '', $string);
	return $string;
}

print_r($_GET);

$type = isset($_GET['type']) ? $_GET['type'] : null;

if(isset($_FILES['myfile'])){

	$tmp_name = $_FILES['myfile']['tmp_name'];

	$file = pathinfo($_FILES['myfile']['name']);
	$extension = strtolower($file['extension']);

	$targetPath = '../../upload/img/';
	$nome_imagem = formatarString($file['filename']).'.'.$extension;

	$files = array();

	if (file_exists($targetPath . $nome_imagem)) {
		$contador = 1;
		$novo_nome_arquivo = pathinfo($nome_imagem, PATHINFO_FILENAME);
		$extensao_arquivo = pathinfo($nome_imagem, PATHINFO_EXTENSION);
		while (file_exists($targetPath . $novo_nome_arquivo . '-' . $contador . '.' . $extensao_arquivo)) {
			$contador++;
		}
		$nome_imagem = $novo_nome_arquivo . '-' . $contador . '.' . $extensao_arquivo;
	}

	if($extension == "png") {
		$source = imagecreatefrompng($tmp_name);
	}
	if($extension == "jpg" or $extension == "jpeg") {
		$source = imagecreatefromjpeg($tmp_name);
	}
	if($extension == "gif") {
		$source = imagecreatefromgif($tmp_name);
	}

	$sourceW  = imagesx($source);
	$sourceH = imagesy($source);

	/*----------------------------------------------------------------------------------------------------------PEQUENA----*/
	$thumbnail_size = 200;
	//$altura = ceil(($thumbnail_size * $sourceH) / $sourceW);

	// Calcula as novas dimensões mantendo a proporção da imagem
if ($sourceW > $sourceH) {
    $nova_largura = $thumbnail_size;
    $nova_altura = ($sourceH / $sourceW) * $thumbnail_size;
} else {
    $nova_altura = $thumbnail_size;
    $nova_largura = ($sourceW / $sourceH) * $thumbnail_size;
}

	$thumbnail = imagecreatetruecolor($nova_largura, $nova_altura);
	//imagecopyresampled($thumbnail, $source, 0, 0, 0, 0, $thumbnail_size, $altura, $sourceW, $sourceH);
	
	imagecopyresampled($thumbnail, $source, 0, 0, 0, 0, 200, 200, $sourceW, $sourceH);

	imagejpeg($thumbnail, $targetPath . $nome_imagem, 100);
	@imagedestroy($thumbnail);
	$files['thumbnail'] = $nome_imagem;

	/*----------------------------------------------------------------------------------------------------------PEQUENA----*/
	$medium_size = 500;
	$altura = ceil(($medium_size * $sourceH) / $sourceW);
	$medium = imagecreatetruecolor($medium_size, $altura);
	imagecopyresampled($medium, $source, 0, 0, 0, 0, $medium_size, $altura, $sourceW, $sourceH);
	imagejpeg($medium, $targetPath . $medium_size.'-'.$nome_imagem, 100);
	@imagedestroy($medium);
	$files['thumbnail'] = $medium_size.'-'.$nome_imagem;

	try {
		$database->insert('files', ['type' => $type, 'files' => $files]);
		$id = $database->id();
		echo "<div class='alert alert-success'>Inserido com sucesso!</div>";
	} catch (\Exception $e) {
		echo "<div class='alert alert-danger'>".$e->getMessage()."</div>";
	}

}else{
	echo 'no';
}