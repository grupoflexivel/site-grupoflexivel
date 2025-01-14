<?php require_once('../header.php') ?>

<?php
$table = 'blog';
$id = isset($_GET['id']) ? $_GET['id'] : null;

if($_POST){

  $id = $_POST['id'];
  $action = $_POST['action'];

  

  unset($_POST['id'],$_POST['action']);

  if($action=='insert'){
    try {
      $database->insert($table, $_POST);
      $id = $database->id();
      echo "<div class='alert alert-success'>Inserido com sucesso!</div>";
    } catch (\Exception $e) {
      echo "<div class='alert alert-danger'>".$e->getMessage()."</div>";
    }

  }

  if($action=='update'){
    try {
      $database->update($table, $_POST, ['id' => $id]);
      echo "<div class='alert alert-success'>Atualizado com sucesso!</div>";
    } catch (\Exception $e) {
      echo "<div class='alert alert-danger'>".$e->getMessage()."</div>";
    }
  }

}

if($id){

  $targetPath = '../../upload/img/';

  if(isset($_FILES['files'])){
    if( !$_FILES['files']['error'] ){

      $files = array();
      $tmp_name = $_FILES['files']['tmp_name'];

      $file = pathinfo($_FILES['files']['name']);
      $extension = strtolower($file['extension']);

      $nome_imagem = slugify($file['filename']).'.'.$extension;

      echo $nome_imagem;

      $thumbnail_size = 380;

      if (file_exists($targetPath . $thumbnail_size.'-'.$nome_imagem)) {

        $contador = time();
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

    //----------------------------------------------------------------------------------------------------------PEQUENA----
      $thumbnail_size = 380;
      //$altura = ceil(($thumbnail_size * $sourceH) / $sourceW);

      // Calcula as novas dimensões mantendo a proporção da imagem
      if ($sourceW > $sourceH) {
        $nova_largura = $thumbnail_size;
        $nova_altura = ($sourceH / $sourceW) * $thumbnail_size;
      } else {
        $nova_altura = $thumbnail_size;
        $nova_largura = ($sourceW / $sourceH) * $thumbnail_size;
      }



      $altura = ceil(($thumbnail_size * $sourceH) / $sourceW);
      $medium = imagecreatetruecolor($thumbnail_size, $altura);
      imagecopyresampled($medium, $source, 0, 0, 0, 0, $thumbnail_size, $altura, $sourceW, $sourceH);
      imagejpeg($medium, $targetPath . $thumbnail_size.'-'.$nome_imagem, 100);
      @imagedestroy($medium);
      $files['thumbnail'] = $thumbnail_size.'-'.$nome_imagem;

      //----------------------------------------------------------------------------------------------------------PEQUENA----
      $medium_size = 600;
      $altura = ceil(($medium_size * $sourceH) / $sourceW);
      $medium = imagecreatetruecolor($medium_size, $altura);
      imagecopyresampled($medium, $source, 0, 0, 0, 0, $medium_size, $altura, $sourceW, $sourceH);
      imagejpeg($medium, $targetPath . $medium_size.'-'.$nome_imagem, 100);
      @imagedestroy($medium);
      $files['medium'] = $medium_size.'-'.$nome_imagem;

      try {
        $database->insert('files', ['parent_id' => $id, 'files' => $files]);
        
        echo "<div class='alert alert-success'>Inserido com sucesso!</div>";
      } catch (\Exception $e) {
        echo "<div class='alert alert-danger'>".$e->getMessage()."</div>";
      }
    }
  }

  $data = $database->get($table, '*', ['id'=>$id ]);

}


$delete_image = isset($_GET['delete-image']) ? $_GET['delete-image'] : null;
if($delete_image){
  try {
    $files_exclude = $database->select('files', '*', ['id'=>$delete_image ]); 

    if( $files_exclude ){
      $sizes = unserialize($files_exclude[0]['files']);
      @unlink($targetPath.$sizes['thumbnail']);
      @unlink($targetPath.$sizes['medium']);
    }
    $database->delete('files', ['id' => $delete_image]);
    echo "<div class='alert alert-success'>Imagem exluída com sucesso!</div>";
  } catch (\Exception $e) {
    echo "<div class='alert alert-danger'>".$e->getMessage()."</div>";
  }
}

?>              

<div class="card mb-4">
  <div class="card-body">
    <form method="POST" action="action.php" class="mb-4" enctype="multipart/form-data">

      <input type="hidden" name="id" value="<?php echo isset($data['id']) ? $data['id'] : null ?>">
      <input type="hidden" name="action" value="<?php echo isset($data['id']) ? 'update' : 'insert' ?>">

      <div class="mb-3">
        <label class="form-label">Nome</label>
        <input type="text" name="nome" value="<?php echo isset($data['nome']) ? $data['nome'] : '' ?>" class="form-control" required/>
      </div>
      
      <div class="mb-3">
        <label class="form-label">Link</label>
        <input type="text" name="link" value="<?php echo isset($data['link']) ? $data['link'] : '' ?>" class="form-control" required/>
      </div>
      


      <div class="mb-3">
        <label class="form-label">Descrição</label>
        <textarea name="descricao" rows="5" class="form-control ckeditor"><?php echo isset($data['descricao']) ? $data['descricao'] : '' ?></textarea>
      </div>

      <hr>
      <div class="mb-3">      
        Imagens        
        <?php $files = $database->select('files', '*', ['parent_id'=>$id ]);  ?>
        <?php if( $files ){ ?>
          <?php foreach ($files as $key => $file) {
            $sizes = unserialize($file['files']);
            ?>
            <div><img src="../../upload/img/<?php echo $sizes['thumbnail'] ?>" alt="<?php echo $sizes['thumbnail'] ?>"></div>
            <a href="action.php?id=<?php echo $id ?>&delete-image=<?php echo $file['id'] ?>" data-confirm="" class="btn btn-icon btn-danger" data-bs-toggle="tooltip" data-bs-offset="0,4" data-bs-original-title="Excluir"><span class="bx bx-trash"></span></a>
          <?php } ?>
        <?php } ?>

        <?php if( !$files ){ ?>
          <input type="file" name="files" class="d-block mb-4">
        <?php } ?>

      </div>
      <hr>

      <div>        
        <button type="submit" class="btn btn-primary"><?php echo isset($data['id']) ? 'Salvar' : 'Adicionar' ?></button>
      </div>

    </form>    

  </div>
</div>

<?php require_once('../footer.php') ?>