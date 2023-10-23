<?php

class ControladorFormularios
{

    /*==== Registros ====*/

    static public function ctrRegistro()
    {

        if (isset($_POST["nombre"]) && !empty($_POST["nombre"])) {

            $tabla = "gastos";

            $datos = array(
                "nombre" => $_POST["nombre"],
                "id_categoria" => $_POST["id_categoria"],
                "importe" => $_POST["importe"],
                "n_boleta" => $_POST["n_boleta"],
                "descripcion" => $_POST["descripcion"],
                "fecha" => $_POST["fecha"]
            );

            $respuesta = ModeloFormularios::mdlRegistro($tabla, $datos);

            return $respuesta;
        } else {
            $error = "error";
            return $error;
        }
    }


    /*==== Seleccionar Gastos ====*/

      static public function ctrSeleccionarGastos($item,$valor)
      {
        
        
          $tabla = "gastos";
  
          $respuesta = ModeloFormularios::mdlSeleccionarGastos($tabla,$item,$valor);
  
          return $respuesta;
      }



      /*==== Validar Gastos ====*/

      static public function ctrValidargastos($item,$valor,$item1,$valor1,$item2,$valor2)
      {
           
          $tabla = "gastos";
  
          $respuesta = ModeloFormularios::mdlValidarGastos($tabla,$item,$valor,$item1,$valor1,$item2,$valor2);
  
          return $respuesta;
      }




      
    /*===Seleccionar total $ ===*/

    static public function ctrGenerarTotal($id)
    {

        $tabla = "gastos";
        
        $totalImporte = ModeloFormularios::mdlObtenerTotalImporte($tabla,$id);

        return $totalImporte;
    }


    
    /*==== Seleccionar por Categoria ====*/
    
    static public function ctrSeleccionasXcategoria()
    {

        $tabla = "gastos";

        $categoria = $_GET['categoria'];

        $totalXcategoria = ModeloFormularios::mdlObtenerTotalXcategoria($tabla, $categoria);

        return $totalXcategoria;
    }


    

    /*===== Actualizar Gasto =====*/


    static public function ctrActualizarGasto()
    {

        if (isset($_POST["actualizarNombre"])) {
            

            $tabla = "gastos";

            $datos = array(
                "nombre" => $_POST["actualizarNombre"],
                "id_categoria" => $_POST["actualizarCategoria"],
                "importe" => $_POST["actualizarImporte"],
                "n_boleta" => $_POST["actualizar_n_boleta"],
                "descripcion" => $_POST["actualizarDescripcion"],
                "fecha" => $_POST["actualizarFecha"],
                "id" => $_POST["actualizarId"]
            );

          
            $respuesta = ModeloFormularios::mdlActializarGasto($tabla, $datos);

            return $respuesta;

            

            return $respuesta;
        } else {
            $error = "error";
            return $error;
        }
    }


    /*==== Eliminar Gastos ====*/

    static public function ctrEliminarGasto()
    {

        if (isset($_POST["eliminarGasto"])) {
            

            $tabla = "gastos";

            $valor = $_POST["eliminarGasto"];

          
            $respuesta = ModeloFormularios::mdlEliminarGasto($tabla, $valor);

            if($respuesta== "ok"){

                echo '<script>
                if(window.history.replaceState){
                    window.history.replaceState(null, null, window.location.href);
                }
                // Corregir window.Location a window.location
                window.location.href = "index.php?pagina=inicio";
            </script>';

            }

            return $respuesta;
        } else {
            $error = "error";
            return $error;
        }
    }


      

}
  


     

