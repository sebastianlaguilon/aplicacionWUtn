<?php

require_once "conexion.php";

class ModeloCategorias{

    /*==== Registrar Categoria ====*/
    
    static public function mdlRegistroC($tabla, $datos)
    {

        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (categoria)
                                               VALUE (:categoria)");

        $stmt->bindParam(":categoria", $datos["categoria"], PDO::PARAM_STR);

        if ($stmt->execute()) {

            return "ok";
        } else {

            print_r(Conexion::conectar()->errorInfo());
        }

        $stmt->closeCursor();

        $stmt = null;
    }

    static public function mdlSeleccionarCategorias($tabla){

        $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");

        $stmt->execute();

        return $stmt -> fetchAll();

    }


    /*==== Seleccionar Categoria ====*/

        static public function mdlSeleccionarCategoria($tabla, $idCategoria){
            $stmt = Conexion::conectar()->prepare("SELECT categoria FROM $tabla WHERE id = :categoria LIMIT 1");
            
            $stmt->bindParam(':categoria', $idCategoria, PDO::PARAM_INT);
            $stmt->execute();
        
            return $stmt->fetchColumn();
        }
                    

        static public function mdlGastosTotalcategoria($tabla, $idCategoria){

            $stmt = Conexion::conectar()->prepare("SELECT SUM(importe) FROM $tabla WHERE id_categoria = :categoria");
    
            $stmt->bindParam(':categoria', $idCategoria, PDO::PARAM_INT);
            $stmt->execute();
        
            return $stmt->fetchColumn();



        }


           /*====Actualizar Categoria ====*/

           static public function mdlActualizarCategoria($tabla, $datos) {
            $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET categoria = :categoria WHERE id = :id");
        
            $stmt->bindParam(":categoria", $datos["categoria"], PDO::PARAM_STR);
            $stmt->bindParam(":id", $datos["id"], PDO::PARAM_INT);
        
            if ($stmt->execute()) {
                return "ok";
            } else {
                print_r($stmt->errorInfo()); // En lugar de Conexion::conectar()->errorInfo()
            }
        
            $stmt->closeCursor();
            $stmt = null;
        }


        
     /*====== Eliminar Categoria =======*/


     static public function mdlEliminarCategoria($tabla, $valor){

        $stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id=:id");

        $stmt->bindParam(":id",$valor,PDO::PARAM_INT);

        if($stmt->execute()){

            return "ok";

        }else{

            print_r(Conexion::conectar()->errorInfo());

        }

        $stmt->closeCursor();

        $stmt = null;
    }
         

}
