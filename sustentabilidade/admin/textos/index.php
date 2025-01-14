<?php require_once('../header.php') ?>

<?php
$table = 'textos';
$delete = isset($_GET['delete']) ? $_GET['delete'] : null;
if( !empty($delete) ){
  try {
    $database->delete($table, ['id' => $delete]);
    echo "<div class='alert alert-success'>Exluído com sucesso!</div>";
  } catch (\Exception $e) {
    echo "<div class='alert alert-danger'>".$e->getMessage()."</div>";
  }
}


$busca = array_filter(
    $_POST,
    function ($valor) {
        return $valor !== '' && !is_null($valor) && $valor !== false && $valor !== [];
    }
);
?>

<div class="card p-3 mb-4">
  <form action="" method="POST">

    <div class="d-flex gap-3">

      <div>
        Texto      
        <input type="text" name="texto" class="form-control">
      </div>

      <div>
        <span class="d-block">&nbsp;</span>
        <button type="submit" class="btn btn-primary">Buscar</button>
      </div>

    </div>
    
  </form>
</div>


<div class="d-flex justify-content-between align-items-center">
  <div>
    <h4 class="py-3 mb-4">Textos</h4>                  
  </div>
  <?php /*
  <div>
    <a href="action.php" class="btn btn-primary">Adicionar</a>                  
  </div>
  */ ?>
</div>

<div class="card">                
  <div class="table-responsive">
    <table class="table">
      <thead>
        <tr>
          <th>Chave</th>
          <th>Texto</th>
          <?php /*
          <th>Status</th>
          */ ?>
          <th class="text-end">Ações</th>
        </tr>
      </thead>
      <tbody class="table-border-bottom-0">
        <?php
        if(isset($_POST['texto'])){
          $data = $database->select($table, '*', ["texto[~]" => $_POST['texto']] );
        }else{
          $data = $database->select($table, '*' );
        }

        $total_nun_vagas=$total_nun_agendados=$total_nun_espera=0;
        foreach ($data as $key => $value) { ?>
          <tr>
            <td><?php echo $value['key'] ?></td>
            <td><?php echo $value['texto'] ?></td>
            <?php /*
            <td>
              <div class="form-switch"><input class="form-check-input" type="checkbox" <?php echo $value['active'] ? 'checked' : '' ?> data-boolean="<?php echo $table.'|active|'.$value['id'] ?>"></div>
            </td>
            */ ?>
            <td class="d-flex gap-2 justify-content-end">
              <a href="action.php?id=<?php echo $value['id'] ?>" class="btn btn-icon btn-warning" data-bs-toggle="tooltip" data-bs-offset="0,4" data-bs-original-title="Editar"><span class="bx bx-edit"></span></a>
              <?php /*
              <a href="?delete=<?php echo $value['id'] ?>" data-confirm="" class="btn btn-icon btn-danger" data-bs-toggle="tooltip" data-bs-offset="0,4" data-bs-original-title="Excluir"><span class="bx bx-trash"></span></a>
              */ ?>
              <?php /*
              */ ?>
            </td>
          </tr>
        <?php } ?>
      </tbody>
    </table>
  </div>
</div>

<?php require_once('../footer.php') ?>