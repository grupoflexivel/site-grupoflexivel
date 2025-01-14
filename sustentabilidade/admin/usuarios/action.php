<?php require_once('../header.php') ?>

<?php

$table = 'usuarios';

$id = isset($_GET['id']) ? $_GET['id'] : null;

if($_POST){

  $id = $_POST['id'];
  $action = $_POST['action'];
  $password = $_POST['password'];                

  unset($_POST['id'],$_POST['action'],$_POST['password']);

  if( !empty($password) ){
    $_POST['password'] = md5($password);
  }

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
?>              

<div class="card mb-4">
  <div class="card-body">
    <form method="POST" action="">

      <input type="hidden" name="id" value="<?php echo isset($data['id']) ? $data['id'] : null ?>">
      <input type="hidden" name="action" value="<?php echo isset($data['id']) ? 'update' : 'insert' ?>">

      <div class="mb-3">
        <label class="form-label">Nome</label>
        <input type="text" name="nome" value="<?php echo isset($data['nome']) ? $data['nome'] : '' ?>" class="form-control" required/>
      </div>
      <div class="mb-3">
        <label class="form-label">E-mail</label>
        <input type="email" name="email" value="<?php echo isset($data['email']) ? $data['email'] : '' ?>" class="form-control" required/>
      </div>
      <div class="mb-3">
        <label class="form-label">Senha</label>
        <input type="password" name="password" value="" class="form-control" <?php echo isset($data['id']) ? '' : 'required' ?>/>
      </div>
      <button type="submit" class="btn btn-primary"><?php echo isset($data['id']) ? 'Salvar' : 'Adicionar' ?></button>
    </form>
  </div>
</div>

<?php require_once('../footer.php') ?>