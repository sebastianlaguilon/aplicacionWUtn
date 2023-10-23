<?php

require_once "conexion.php";

class ModeloFormularios
{

    /*==== Ingreso ====*/

    static public function mdlRegistro($tabla, $datos)
    {

        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (nombre,id_categoria,importe,n_boleta,descripcion,fecha)
                                               VALUE (:nombre,:id_categoria,:importe,:n_boleta,:descripcion,:fecha)");

        $stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
        $stmt->bindParam(":id_categoria", $datos["id_categoria"], PDO::PARAM_INT);
        $stmt->bindParam(":importe", $datos["importe"], PDO::PARAM_STR);
        $stmt->bindParam(":n_boleta", $datos["n_boleta"], PDO::PARAM_STR);
        $stmt->bindParam(":descripcion", $datos["descripcion"], PDO::PARAM_STR);
        $stmt->bindParam(":fecha", $datos["fecha"], PDO::PARAM_STR);

        if ($stmt->execute()) {

            return "ok";
        } else {

            print_r(Conexion::conectar()->errorInfo());
        }

        $stmt->closeCursor();

        $stmt = null;
    }


    /*==== Seleccion Gastos ====*/


    static public function mdlSeleccionarGastos($tabla, $item, $valor)
{
    if ($item == null && $valor == null ) {
        $stmt = Conexion::conectar()->prepare("SELECT *, DATE_FORMAT(fecha, '%d/%m/%Y') AS fecha FROM $tabla ORDER BY id DESC");
        $stmt->execute();
        return $stmt->fetchAll();

        $stmt->closeCursor();

    } else {
            // Manejar el caso donde solo se proporciona uno de los criterios
            $stmt = Conexion::conectar()->prepare("SELECT *, DATE_FORMAT(fecha, '%d/%m/%Y') AS fecha FROM $tabla WHERE $item = :$item ORDER BY id DESC");
            $stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);
            $stmt->execute();
            return $stmt->fetch();

            $stmt->closeCursor();
        }

        $stmt = null;
    }
    

   
    /*==== Validar Gastos ====*/
   

static public function mdlValidarGastos($tabla, $item, $valor, $item1, $valor1,$item2,$valor2)
{
 
        if ($item != null && $valor != null && $item1 != null && $valor1 != null) {

            
            $stmt = Conexion::conectar()->prepare("SELECT *, DATE_FORMAT(fecha, '%d/%m/%Y') AS fecha FROM $tabla WHERE $item = :$item AND $item1 = :$item1 
                                                   AND $item2 = :$item2  ORDER BY id DESC");
            $stmt->bindParam(":" . $item, $valor, PDO::PARAM_INT);
            $stmt->bindParam(":" . $item1, $valor1, PDO::PARAM_STR);
            $stmt->bindParam(":" . $item2, $valor2, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetch();
        }
        
        return false;
          

        
    }



    /*==== Seleccionar Total de $====*/

    static public function mdlObtenerTotalImporte($tabla,$id)
    {
         if($id == ""){
            $stmt = Conexion::conectar()->prepare("SELECT SUM(importe) AS total_importe FROM $tabla ORDER BY id DESC");
            $stmt->execute();
            $resultado = $stmt->fetch();
    
            return $resultado['total_importe'];
         }else{ 
        $stmt = Conexion::conectar()->prepare("SELECT SUM(importe) AS total_importe FROM $tabla WHERE id_categoria = $id ORDER BY id DESC");
        $stmt->execute();
        $resultado = $stmt->fetch();

        return $resultado['total_importe'];
         }
    }



     /*=====Seleccionar categoria por id =======*/

     static public function mdlObtenerTotalXcategoria($tabla, $categoria){

        $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE id_categoria = :categoria  ORDER BY id DESC" );
    
        $stmt->bindParam(':categoria', $categoria, PDO::PARAM_INT);
        $stmt->execute();
    
        return $stmt->fetchAll();
    }



    
    /*====Actualizar Gasto ====*/

    static public function mdlActializarGasto($tabla, $datos){

        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET  nombre=:nombre,id_categoria=:id_categoria,importe=:importe,n_boleta=:n_boleta,descripcion=:descripcion,fecha=:fecha WHERE id=:id");

        $stmt->bindParam(":nombre",$datos["nombre"],PDO::PARAM_STR);
        $stmt->bindParam(":id_categoria",$datos["id_categoria"],PDO::PARAM_INT);
        $stmt->bindParam(":importe",$datos["importe"],PDO::PARAM_STR);
        $stmt->bindParam(":n_boleta",$datos["n_boleta"],PDO::PARAM_STR);
       
        $stmt->bindParam(":descripcion",$datos["descripcion"],PDO::PARAM_STR);
        $stmt->bindParam(":fecha",$datos["fecha"],PDO::PARAM_STR);
        $stmt->bindParam(":id",$datos["id"],PDO::PARAM_INT);

       

        if($stmt->execute()){

            return "ok";

        }else{

            print_r(Conexion::conectar()->errorInfo());

        }

        $stmt->closeCursor();

        $stmt = null;
    }


     /*====== Eliminar Gasto =======*/


     static public function mdlEliminarGasto($tabla, $valor){

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
