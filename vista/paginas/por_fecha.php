<?php

$fechaInicio = $_GET['fechaInicio'];
$fechaFinal = $_GET['fechaFin'];

$fechaI = date('d/m/Y', strtotime($fechaInicio));

$fechaF = date('d/m/Y', strtotime($fechaFinal));

$porFecha = ControladorFecha::ctrSeleccionarFecha();

$gastoPorFecha = ControladorFecha::ctrSeleccionarGastoXFecha();

?>


<h1 class="text-center">Gasto por Fecha</h1>
<h3 class="text-center">Desde <?= $fechaI ?></h3>
<h3 class="text-center">Hasta <?= $fechaF ?></h3>

<div class="container mt-5">
  <table class="table table-striped">
    <thead>
      <tr>
        <th>#</th>
        <th>Nombre</th>
        <th>Importe</th>
        <th>fecha</th>
      </tr>
    </thead>
    <tbody>
    <?php foreach ($porFecha as $key => $gasto): ?>
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
        <td><?php echo $gastoPorFecha ?></td>
      </tr>
    </tbody>
  </table>
</div>