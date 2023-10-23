<div class="container mt-5">
   <div class="row">
      <div class="col-md-6 offset-md-3">


         <!-- Agrega un div con clases de borde y estilo de fondo -->
         <div class="border rounded p-3">

            <h1 class="text-center">Login</h1>

            <div class="d-flex justify-content-center">
               <form action="" class="p-5 bg-light" method="post">

                  <div class="form-group">
                     <label for="email">Correo Electrónico:</label>
                     <div class="input-group">
                        <div class="input-group-prepend">
                           <span class="input-group-text"><i class="fas fa-user"></i></span>
                        </div>
                        <input type="tex" class="form-control" placeholder="Ingrese su Usuario" id="email" name="ingresoUsuario">
                     </div>
                  </div>
                  <div class="form-group">
                     <label for="pwd">Contraseña:</label>
                     <div class="input-group">
                        <div class="input-group-prepend">
                           <span class="input-group-text"><i class="fas fa-lock"></i></span>
                        </div>
                        <input type="password" class="form-control" placeholder="Enter password" id="pwd" name="ingresoPass">
                     </div>
                     <?php

                     $ingreso = new ControladorAdmin();
                     $ingreso ->ctrIngreso();

                     ?>

                     <div class="text-center">
                        <button type="submit" class="btn btn-primary mt-3">Ingresar</button>
                     </div>
               </form>
            </div>


         </div>
      </div>
   </div>
</div>



