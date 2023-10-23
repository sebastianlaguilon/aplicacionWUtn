<?php
class ControladorFecha{


    static public function ctrSeleccionarFecha(){

        $tabla = "gastos";

        $fechaInicio = $_GET["fechaInicio"];

        $fechaFin = $_GET["fechaFin"];
    
        $respuesta = ModeloFecha::mdlfecha($tabla,$fechaInicio,$fechaFin);
        
        return $respuesta;
      
    }        


    static public function ctrSeleccionarGastoXFecha(){

        $tabla = "gastos";

        $fechaInicio = $_GET["fechaInicio"];

        $fechaFin = $_GET["fechaFin"];
    
        $respuesta = ModeloFecha::mdlSumarGastosPorFecha($tabla,$fechaInicio,$fechaFin);
        
        return $respuesta;
      
    }   


}  