<?php require_once('../header.php') ?>

<?php
$table = 'textos';
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
  $data = $database->get($table, '*', ['id'=>$id ]);

}


$delete_image = isset($_GET['delete-image']) ? $_GET['delete-image'] : null;
if($delete_image){
  try {
    $files = $database->select('files', '*', ['parent_id'=>$id ]); 
    if( $files ){
      foreach ($files as $key => $file) {
        $sizes = unserialize($file['files']);        
        @unlink($targetPath.$sizes['source']);
        @unlink($targetPath.$sizes['thumbnail']);
      }
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
      <input type="hidden" name="key" value="<?php echo isset($data['key']) ? $data['key'] : time() ?>" class="form-control" required/>


      <div class="mb-3">
        <label class="form-label">Texto</label>
        <textarea name="texto" rows="5" class="form-control ckeditor"><?php echo isset($data['texto']) ? $data['texto'] : '' ?></textarea>
      </div>

      <div>        
        <button type="submit" class="btn btn-primary"><?php echo isset($data['id']) ? 'Salvar' : 'Adicionar' ?></button>
      </div>

    </form>    

  </div>
</div>

<?php require_once('../footer.php') ?>