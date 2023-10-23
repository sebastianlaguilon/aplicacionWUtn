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


$categorias = ControladorCategoria::ctrSeleccionarCategorias();

?>

<div class="container mt-5">
  <div class="row">
    <div class="col-md-6 offset-md-3">


      <!-- Agrega un div con clases de borde y estilo de fondo -->
      <div class="border rounded p-3">

        <h1 class="text-center">Nueva Categoria</h1>

        <div class="d-flex justify-content-center">
          <form action="" class="p-5 bg-light" method="post">

            <div class="form-group">
              <label for="categoria">Categoria:</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fas fa-folder"></i></i></span>
                </div>
                <input type="tex" class="form-control" placeholder="Ingrese la categoria" id="email" name="categoria">
              </div>
            </div>
            <div class="text-center">


              <?php


              $registro = ControladorCategoria::ctrRegistro();


              if ($registro == "ok") {

                echo '<script>

                           if(window.history.replaceState){
                              window.history.replaceState(null,null, window.location.href);
                           }

                        </script>';

                echo '<div class= "registro">La Boleta ha sido Registrada</div>';
              }

              ?>

              <button type="submit" class="btn btn-primary mt-3">Ingresar</button>
            </div>
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
        <th>Categoria</th>

      </tr>
    </thead>
    <tbody>

      <?php foreach ($categorias as $key => $categoria) : ?>
        <tr>
          <td><?= ($key + 1) ?></td>
          <td><?= $categoria["categoria"] ?> </td>
          <td>
            <div class="btn-group">
              <div class="px-1">
                <a href="index.php?pagina=editar_categoria&id=<?= $categoria["id"]; ?>" class="btn btn-warning"><i class="fas fa-pencil-alt"></i></a>
              </div>
              <div>

                <form method="post" onsubmit="return confirm('¿Estás seguro de que deseas eliminar este registro?');">

                  <input type="hidden" value="<?= $categoria["id"];  ?>" name="eliminarCategoria">
                  <button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
                  <?php
                  $eliminar = new ControladorCategoria;
                  $eliminar->ctrEliminarCategoria();

                  ?>
                </form>
              </div>
            </div>

          </td>

        <?php endforeach ?>

    </tbody>
  </table>
</div>