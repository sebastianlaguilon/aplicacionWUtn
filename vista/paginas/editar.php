<?php

if (isset($_GET["id"])) {

   $item = "id";
   $valor = $_GET["id"];

   $gasto = ControladorFormularios::ctrSeleccionarGastos($item, $valor);

   $fecha = date('Y-m-d', strtotime(str_replace('/', '-', $gasto["fecha"])));
}

$categorias = ControladorCategoria::ctrSeleccionarCategorias();


?>

<a href="index.php?pagina=categoria" class="agrega_categoria">Agregar Nueva Categoria</a>

<div class="container mt-5">
   <div class="row">
      <div class="col-md-6 offset-md-3">


         <!-- Agrega un div con clases de borde y estilo de fondo -->
         <div class="border rounded p-3">

            <h1 class="text-center">Editar de Gastos</h1>

            <div class="d-flex justify-content-center">
               <form action="" class="p-5 bg-light" method="POST">

                  <input type="hidden" name="actualizarId" value="<?= $gasto["id"] ?>">

                  <div class="form-group">
                     <label for="nombre">Nombre:</label>
                     <div class="input-group">

                        <div class="input-group-prepend">
                           <span class="input-group-text"><i class="fas fa-barcode"></i></span>

                        </div>
                        <input type="text" class="form-control" value="<?= $gasto["nombre"] ?>" id="nombre" name="actualizarNombre">
                     </div>
                  </div>
                  <div class="form-group">
                     <label for="nombre">Importe:</label>
                     <div class="input-group">
                        <div class="input-group-prepend">
                           <span class="input-group-text"><i class="fas fa-dollar-sign"></i></span>
                        </div>
                        <input type="number" class="form-control" value="<?= $gasto["importe"] ?>" id="importe" name="actualizarImporte">
                     </div>
                  </div>
                  <div class="form-group">
                     <label for="nombre">N° de boleta:</label>
                     <div class="input-group">
                        <div class="input-group-prepend">
                           <span class="input-group-text"><i class="fas fa-barcode"></i></span>
                        </div>
                        <input type="text" class="form-control" value="<?= $gasto["n_boleta"] ?>" id="numero_b" name="actualizar_n_boleta">
                     </div>
                  </div>
                  <div class="form-group">
                     <label for="nombre">Seleccionar Categoria:</label>
                     <div class="input-group">
                        <div class="input-group-prepend">
                           <label class="input-group-text" for="categoria"><i class="fas fa-list"></i></label>
                        </div>
                        <select class="custom-select" id="categoria" name="actualizarCategoria">
                           <?php foreach ($categorias as $cat) : ?>
                              <option value="<?= $cat['id'] ?>"><?= $cat['categoria'] ?></option>
                           <?php endforeach; ?>
                        </select>
                     </div>
                     <div class="form-group">
                        <label for="descripcion">Descripción:</label>
                        <textarea class="form-control" id="descripcion" name="actualizarDescripcion" rows="4"><?= $gasto["descripcion"] ?></textarea>
                     </div>
                     <div class="form-group">
                        <label for="fecha">Fecha:</label>
                        <div class="input-group">
                           <div class="input-group-prepend">
                              <span class="input-group-text"><i class="far fa-calendar"></i></span>
                           </div>
                           <input type="date" class="form-control" value="<?= $fecha ?>" id="fecha" name="actualizarFecha">
                        </div>
                     </div>
                  </div>

                  <?php

                  $actualizar = ControladorFormularios::ctrActualizarGasto();

                  if ($actualizar == "ok") {

                                          echo '<script>
                         if(window.history.replaceState){
                             window.history.replaceState(null, null, window.location.href);
                         }
                     </script>';
                      
                                          echo '<div class="alert alert-success">El Registro ha sido actualizado</div>
                         
                     <script>
                         setTimeout(function(){
                             window.location = "index.php?pagina=inicio"; // Agrega la comilla simple y el punto y coma al final
                         }, 3000);
                     </script>';
                  }


                  ?>

                  <div class="text-center">
                     <button type="submit" class="btn btn-primary mt-3">Modificar</button>
                  </div>
               </form>
            </div>


         </div>
      </div>
   </div>
</div>

</html>