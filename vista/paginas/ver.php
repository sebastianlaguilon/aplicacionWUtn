<?php
if (isset($_GET["id"])) {

  $item = "id";
  $valor = $_GET["id"];

  $verGasto = ControladorFormularios::ctrSeleccionarGastos($item, $valor);
}

$id = $verGasto['id_categoria'];
$categoria = ControladorCategoria::ctrSeleccionarCategoria($id);

?>
<h1 class="text-center">Informe del Registro: <?= $verGasto['n_boleta'] ?></h1>


<div class="card">
  <div class="card-body">
    <h5 class="card-title">Gasto de : <?= $verGasto['nombre'] ?></h5>
    <p class="card-text">Categoria : <?= $categoria ?></p>
    <p class="card-text">Descripción: <?= $verGasto['descripcion'] ?></p>
    <p class="card-text">Importe: <?= $verGasto['importe'] ?></p>
    <p class="card-text">Fecha: <?= $verGasto["fecha"] ?></p>
  </div>
</div>