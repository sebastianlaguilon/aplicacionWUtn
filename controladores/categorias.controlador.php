<?php
class ControladorCategoria
{

    /*==== Registros ====*/

    static public function ctrRegistro()
    {

        if (isset($_POST["categoria"]) && !empty($_POST["categoria"])) {

            $tabla = "categorias";

            $datos = array(
                "categoria" => $_POST["categoria"],

            );

            $respuesta = ModeloCategorias::mdlRegistroC($tabla, $datos);

            return $respuesta;
        } else {
            $error = "error";
            return $error;
        }
    }


    /*==== Seleccionar todas ====*/


    static public function ctrSeleccionarCategorias()
    {

        $tabla = "categorias";

        $respuesta = ModeloCategorias::mdlSeleccionarCategorias($tabla);

        return $respuesta;
    }


    /*==== Seleccionar Una ====*/

    static public function ctrSeleccionarCategoria($valor)
    {

        $tabla = "categorias";

        $respuesta = ModeloCategorias::mdlSeleccionarCategoria($tabla, $valor);

        return $respuesta;
    }


    /*===== Actualizar Categoria =====*/


    static public function ctrActualizarCategoria()
    {

        if (isset($_POST["actualizarCategoria"])) {


            $tabla = "categorias";

            $datos = array(
                "categoria" => $_POST["actualizarCategoria"],
                "id" => $_POST["actualizarId"]
            );


            $respuesta = ModeloCategorias::mdlActualizarCategoria($tabla, $datos);

            return $respuesta;



            return $respuesta;
        } else {
            $error = "error";
            return $error;
        }
    }


    /*==== Eliminar Gastos ====*/

    static public function ctrEliminarCategoria()
    {

        if (isset($_POST["eliminarCategoria"])) {


            $tabla = "categorias";

            $valor = $_POST["eliminarCategoria"];


            $respuesta = ModeloCategorias::mdlEliminarCategoria($tabla, $valor);

            if ($respuesta == "ok") {

                echo '<script>
                 if(window.history.replaceState){
                     window.history.replaceState(null, null, window.location.href);
                 }
                 // Corregir window.Location a window.location
                 window.location.href = "index.php?pagina=categoria";
             </script>';
            }

            return $respuesta;
        } else {
            $error = "error";
            return $error;
        }
    }
}
