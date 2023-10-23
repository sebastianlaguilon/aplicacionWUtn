<?php


$gasto_categoria = ControladorFormularios::ctrSeleccionasXcategoria();

if(isset($_GET["categoria"])){
   
  $id = $_GET["categoria"];

$categoria = ControladorCategoria::ctrSeleccionarCategoria($id);

$totalGastosXcategoria = ControladorFormularios::ctrGenerarTotal($id);

}

?>


<h1 class="text-center">Registros Categoria: <?= $categoria ?></h1>

<div class="container mt-5">
  <table class="table table-striped">
    <thead>
      <tr>
        <th>#</th>
        <th>Nombre</th>
        <th>Importe</th>
        <th>fecha</th>
        <th>Acciones</th>
      </tr>
    </thead>
    <tbody>

    <?php foreach ($gasto_categoria as $key => $gasto): ?>
      <tr>
        <td><?= $key + 1 ?></td>
        <td><?= $gasto['nombre'] ?></td>
        <td><?= $gasto['importe'] ?></td>
        <td><?=  date('d/m/Y', strtotime($gasto['fecha'])); ?></td>
        <td>
          <div class="btn-group">
            <a href="index.php?pagina=editar&id=<?=$gasto["id"]?>" class="btn btn-warning"><i class="fas fa-pencil-alt"></i></a>
            <a class="btn btn-danger"><i class="fas fa-trash-alt"></i></a>
            <a href="index.php?pagina=ver&id=<?= $gasto['id'] ?>&categoria=<?= $gasto['id_categoria'] ?>" class="btn btn-success" > <i class="fas fa-search fa-lg" style="color: blue;"></i></a>
      
          </div>
        </td>
      </tr>
    <?php endforeach; ?>
    <tr>
        <td colspan="3" align="right"><strong>Total Gastos:</strong></td>
        <td><?php echo $totalGastosXcategoria ?></td>
      </tr>
    </tbody>
  </table>
</div>
