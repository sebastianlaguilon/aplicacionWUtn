<?php

if (isset($_SESSION["administrador"])) {

  if ($_SESSION["administrador"] != "ok") {

    echo '<script>window.location = "index.php?pagina=ingreso"</script>';

    return;
  }
} else {

  echo '<script>window.location = "index.php?pagina=ingreso"</script>';

  return;
}


$gastos = ControladorFormularios::ctrSeleccionarGastos(null, null);

$totalGastos = ControladorFormularios::ctrGenerarTotal(null);

$categorias = ControladorCategoria::ctrSeleccionarCategorias();

?>

<div class="container mt-5">
  <div class="card">
    <div class="card-body">
      <div class="row">
        <!-- Formulario de selección por fecha -->
        <div class="col-md-6">
          <h3>Filtrar Por Fecha</h3>
          <form method="get" action="index.php">
            <input type="hidden" name="pagina" value="por_fecha">
            <div class="form-group">
              <label for="fechaInicio">Fecha de Inicio:</label>
              <input type="date" class="form-control" id="fechaInicio" name="fechaInicio">
            </div>
            <div class="form-group">
              <label for="fechaFin">Fecha de Fin:</label>
              <input type="date" class="form-control" id="fechaFin" name="fechaFin">
            </div>
            <button type="submit" class="btn btn-primary">Filtrar</button>
          </form>
        </div>
        <!-- Formulario de selección por categoría -->
        <div class="col-md-6">
          <h3>Filtrar Por Categoría</h3>
          <form method="get" action="index.php">
            <input type="hidden" name="pagina" value="por_categoria">
            <div class="form-group">
              <label for="categoria">Categoría:</label>

              <select class="form-control" id="categoria" name="categoria">
                <?php foreach ($categorias as $cat) : ?>
                  <option value="<?= $cat['id'] ?>"><?= $cat['categoria'] ?></option>
                <?php endforeach; ?>
              </select>
            </div>
            <button type="submit" class="btn btn-primary">Filtrar</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>





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

      <?php foreach ($gastos as $key => $gasto) : ?>
        <tr>
          <td><?= ($key + 1) ?></td>
          <td><?= $gasto["nombre"] ?> </td>
          <td><?= $gasto["importe"] ?></td>
          <td><?= $gasto["fecha"] ?></td>
          <td>
            <div class="btn-group">
              <div class="px-1">
                <a href="index.php?pagina=editar&id=<?= $gasto["id"]; ?>" class="btn btn-warning"><i class="fas fa-pencil-alt"></i></a>
              </div>
              <div>

                <form method="post" onsubmit="return confirm('¿Estás seguro de que deseas eliminar este registro?');">

                  <input type="hidden" value="<?= $gasto["id"];  ?>" name="eliminarGasto">
                  <button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
                  <?php
                  $eliminar = new ControladorFormularios;
                  $eliminar->ctrEliminarGasto();
                  ?>
                </form>
              </div>
              <div class="px-1">
                <a href="index.php?pagina=ver&id=<?= $gasto['id'] ?>&categoria=<?= $gasto['id_categoria'] ?>" class="btn btn-success"> <i class="fas fa-search fa-lg" style="color: blue;"></i></a>
              </div>
            </div>

        </td>

        <?php endforeach ?>
        
        <tr>
          <td colspan="3" align="right"><strong>Total Gastos:</strong></td>
          <td><?php echo $totalGastos ?></td>
        </tr>
    </tbody>
  </table>
</div>