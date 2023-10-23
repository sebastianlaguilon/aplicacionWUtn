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

if(isset($_GET["id"])){
    
    $valor = $_GET["id"];
    

    $categoria = ControladorCategoria::ctrSeleccionarCategoria($valor);



}




?>

<div class="container mt-5">
   <div class="row">
      <div class="col-md-6 offset-md-3">

      

         <!-- Agrega un div con clases de borde y estilo de fondo -->
         <div class="border rounded p-3">

            <h1 class="text-center">Editar Categoria</h1>

            <div class="d-flex justify-content-center">
               <form action="" class="p-5 bg-light" method="post">

               <input type="hidden" name="actualizarId" value="<?= $valor ?>">

                  <div class="form-group">
                     <label for="categoria">Categoria:</label>
                     <div class="input-group">
                        <div class="input-group-prepend">
                           <span class="input-group-text"><i class="fas fa-folder"></i></i></span>
                        </div>
                        <input type="tex" class="form-control" placeholder="Ingrese la categoria" value="<?= $categoria  ?>" id="categoria" name="actualizarCategoria">
                     </div>
                  </div>
                  <div class="text-center">


                  <?php


            $editar = ControladorCategoria::ctrActualizarCategoria();


            if ($editar == "ok") {

                echo '<script>
                if(window.history.replaceState){
                    window.history.replaceState(null, null, window.location.href);
                }
            </script>';
             
                                 echo '<div class="alert alert-success">El Registro ha sido actualizado</div>
                
            <script>
                setTimeout(function(){
                    window.location = "index.php?pagina=categoria"; // Agrega la comilla simple y el punto y coma al final
                }, 3000);
            </script>';
         }

            ?>

                        <button type="submit" class="btn btn-primary mt-3">Actualizar</button>
                  </div>
               </form>
            </div>


         </div>
      </div>
   </div>
</div>