<?php


class ControladorAdmin
{

   /*===== Ingreso ====*/

   public function ctrIngreso()
   {

      if (isset($_POST["ingresoUsuario"])) {


         $tabla = "usuarios";
         $item = "nombre";
         $valor = $_POST["ingresoUsuario"];

         $respuesta = ModeloAdmin::mdiSeleccionarAdmin($tabla, $item, $valor);


         if (is_array($respuesta) && $respuesta["nombre"] == $_POST["ingresoUsuario"] && $respuesta["pass"] == $_POST["ingresoPass"]) {

            $_SESSION["administrador"] = "ok";

            echo '<script>

            if(window.history.replaceState){
               window.history.replaceState(null,null, window.location.href);
            }

            window.location = "index.php?pagina=inicio"

         </script>';
         } else {
            echo '<script>

            if(window.history.replaceState){
               window.history.replaceState(null,null, window.location.href);
            }

         </script>';

            echo '<div class= "alert alert-danger">Usuario No Registrado</div>';
         }

         return $respuesta;
      }
   }
}
