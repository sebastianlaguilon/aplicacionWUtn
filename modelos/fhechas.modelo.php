<?php

require_once "conexion.php";

class ModeloFecha{

    static public function mdlfecha($tabla,$fechaInicio,$fechaFin){

        $fechaInicioFormateada = date('Y-m-d', strtotime($fechaInicio));
        $fechaFinFormateada = date('Y-m-d', strtotime($fechaFin));
    
        $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE DATE_FORMAT(fecha, '%Y-%m-%d') BETWEEN :fechaInicio AND :fechaFin  ORDER BY id DESC");
    
        $stmt->bindParam(':fechaInicio', $fechaInicioFormateada, PDO::PARAM_STR);
        $stmt->bindParam(':fechaFin', $fechaFinFormateada, PDO::PARAM_STR);
    
        $stmt->execute();
    
        return $stmt->fetchAll();

      
    }

    static public function mdlSumarGastosPorFecha($tabla, $fechaInicio, $fechaFin){
    $fechaInicioFormateada = date('Y-m-d', strtotime($fechaInicio));
    $fechaFinFormateada = date('Y-m-d', strtotime($fechaFin));

    $stmt = Conexion::conectar()->prepare("SELECT SUM(importe) AS total_importe FROM $tabla WHERE DATE_FORMAT(fecha, '%Y-%m-%d') BETWEEN :fechaInicio AND :fechaFin ");

    $stmt->bindParam(':fechaInicio', $fechaInicioFormateada, PDO::PARAM_STR);
    $stmt->bindParam(':fechaFin', $fechaFinFormateada, PDO::PARAM_STR);

    $stmt->execute();

    $resultado = $stmt->fetch();
    return $resultado['total_importe'];
}



}    