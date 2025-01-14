<?php
require_once '../../config.php';
require_once '../../vendor/connection.php';
try {
	$database->update($_POST['table'], [$_POST['boolean'] => $_POST['val']], ['id' => $_POST['id']]);
	echo "<div class='alert alert-success'>Atualizado com sucesso!</div>";
} catch (\Exception $e) {
	echo "<div class='alert alert-danger'>".$e->getMessage()."</div>";
}