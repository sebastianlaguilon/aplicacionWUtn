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

$valorPredeterminado = "";

?>
<a href="index.php?pagina=categoria" class="agrega_categoria">Agregar Nueva Categoria</a>

<div class="container mt-5">
   <div class="row">
      <div class="col-md-6 offset-md-3">


         <!-- Agrega un div con clases de borde y estilo de fondo -->
         <div class="border rounded p-3">

            <h1 class="text-center">Ingresos de Gastos</h1>

            <div class="d-flex justify-content-center">
               <form action="" class="p-5 bg-light" method="POST">
                  <div class="form-group">
                     <label for="nombre">Nombre:</label>
                     <div class="input-group">

                        <div class="input-group-prepend">
                           <span class="input-group-text"><i class="fas fa-barcode"></i></span>

                        </div>
                        <input type="text" class="form-control" placeholder="Ingrese Nombre" id="nombre" name="nombre">
                     </div>
                  </div>
                  <div class="form-group">
                     <label for="importe">Importe:</label>
                     <div class="input-group">
                        <div class="input-group-prepend">
                           <span class="input-group-text"><i class="fas fa-dollar-sign"></i></span>
                        </div>
                        <input type="number" class="form-control" placeholder="Ingrese el Importe" id="importe" name="importe">
                     </div>
                  </div>
                  <div class="form-group">
                     <label for="n_boleta">N° de boleta:</label>
                     <div class="input-group">
                        <div class="input-group-prepend">
                           <span class="input-group-text"><i class="fas fa-barcode"></i></span>
                        </div>
                        <input type="text" class="form-control" placeholder="n° de boleta" id="n_boleta" name="n_boleta">
                     </div>
                  </div>
                 
                  <div class="form-group">
                     <label for="selecionar_categoria">Seleccionar Categoria:</label>
                     <div class="input-group">
                        <div class="input-group-prepend">
                           <label class="input-group-text" for="categoria"><i class="fas fa-list"></i></label>
                        </div>
                        <select class="custom-select" id="id_categoria" name="id_categoria">
                           <option value="" disabled selected>Seleccione una categoría</option>
                           <?php foreach ($categorias as $cat) : ?>
                              <option value="<?= $cat['id'] ?>">
                                 <?= $cat['categoria'] ?>
                              </option>
                           <?php endforeach; ?>
                        </select>
                     </div>
                  </div>

                  <div class="form-group">
                     <label for="descripcion">Descripción:</label>
                     <textarea class="form-control" id="descripcion" name="descripcion" placeholder="Descripcion"></textarea>
                  </div>
                  <div class="form-group">
                     <label for="fecha">Fecha:</label>
                     <div class="input-group">
                        <div class="input-group-prepend">
                           <span class="input-group-text"><i class="far fa-calendar"></i></span>
                        </div>
                        <input type="date" class="form-control" id="fecha" name="fecha">
                     </div>
                  </div>
            </div>

            <?php


            $registro = ControladorFormularios::ctrRegistro();


            if ($registro == "ok") {

               echo '<script>

                           if(window.history.replaceState){
                              window.history.replaceState(null,null, window.location.href);
                           }

                        </script>';

               echo '<div class= "registro">La Boleta ha sido Registrada</div>';
            }

            if ($registro == "error") {

               echo '<script>

                           if(window.history.replaceState){
                              window.history.replaceState(null,null, window.location.href);
                           }

                        </script>';

               echo '<div class="error-message">todos los campos son obigatorio</div>';
            }

            ?>

            <div class="text-center">
               <button type="submit" class="btn btn-primary mt-3">Registrar</button>
            </div>
            </form>
         </div>


      </div>
   </div>
</div>
</div>

</html>