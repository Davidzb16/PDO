<?php
require_once "conexion.php";
class Datos extends Conexion {
    public static function registroUsuarioModel($datos, $tabla){
        $stmt= Conexion::conectar()->prepare("INSERT INTO $tabla (nombre,password,email) VALUES (:nombre, :password, :email)");
        $stmt -> bindParam(":nombre", $datos["nombre"],PDO::PARAM_STR);
        $stmt -> bindParam(":password", $datos["password"],PDO::PARAM_STR);
        $stmt -> bindParam(":email", $datos["email"],PDO::PARAM_STR);
        if ($stmt->execute()){
            return "success";
        }else{
            return $stmt->errorInfo();
        }
    }
    public static function vistaUsuariosModel($tabla){
        $stmt = Conexion::conectar()->prepare("SELECT id, nombre, email FROM $tabla");
        $stmt -> execute();
        return $stmt->fetchAll();
    }
    public static function borrarUsuarioModel($datos, $tabla){
        $stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id = :id");
        $stmt -> bindParam("id",$datos, PDO::PARAM_INT);
        if ($stmt -> execute()){
            return "success";
        }else{
            return $stmt -> errorInfo();
        }
    }
    public static function editarUsuarioModel($datos, $tabla){
        $stmt = Conexion::conectar()->prepare("SELECT id, nombre, email FROM $tabla where id = :id");
        $stmt -> bindParam(":id", $datos, PDO::PARAM_INT);
        $stmt -> execute();
        return $stmt->fetch();
    }
    public static function actualizarUsuarioModel($datos, $tabla){
        $stmt= Conexion::conectar()->prepare("UPDATE $tabla SET nombre = :nombre, password= :password, email = :email WHERE id= :id ");
        $stmt -> bindParam(":id", $datos["id"],PDO::PARAM_INT);
        $stmt -> bindParam(":nombre", $datos["nombre"],PDO::PARAM_STR);
        $stmt -> bindParam(":password", $datos["password"],PDO::PARAM_STR);
        $stmt -> bindParam(":email", $datos["email"],PDO::PARAM_STR);
        if ($stmt->execute()){
            return "success";
        }else{
    return $stmt->errorInfo();
}
}
    public static function ingresarUsuarioModel($datos, $tabla){
        $stmt = Conexion::conectar()->prepare("SELECT  nombre, password FROM $tabla where nombre = :nombre ");
        $stmt -> bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
        $stmt -> execute();
        return $stmt->fetch();
    }
//revisar count email
    public static function validarUsuarioModel($datos){
        $stmt = Conexion::conectar()->prepare("SELECT count(nombre) FROM usuarios WHERE nombre = :nombre");
        $stmt -> bindParam(":nombre", $datos, PDO::PARAM_STR);
        $stmt -> execute();
        return $stmt->fetch();
    }
    
    public static function validarEmailModel($datos){
        $stmt = Conexion::conectar()->prepare("SELECT count(email) FROM usuarios WHERE email = :email");
        $stmt -> bindParam("email", $datos, PDO::PARAM_STR);
        $stmt -> execute();
        return $stmt->fetch();
    }

// registra ventas
    public static function registroVentasModel($datos,$tabla) {
        $stnt= Conexion::conectar()->prepare("INSERT INTO $tabla(producto,precio,fecha )VALUES(:producto,:precio,:fecha)");
        $stnt->bindParam(":producto", $datos["producto"], PDO::PARAM_STR);
        $stnt->bindParam(":precio", $datos["precio"], PDO::PARAM_STR);
        $stnt->bindParam(":fecha", $datos["fecha"], PDO::PARAM_STR);
      

        if($stnt->execute()){
            return "success";
        }else{
            return $stnt->errorInfo();
        }
    }

    public static function vistaVentasModel($tabla) {
        $stnt = Conexion::conectar()->prepare("SELECT  id, producto, precio,fecha FROM $tabla ORDER BY fecha");
        $stnt ->execute();
        return $stnt->fetchAll();
    }
          
    public static function vistaRangoFechasModel($datos,$tabla) {
        $stnt = Conexion::conectar()->prepare("SELECT *FROM $tabla WHERE fecha BETWEEN :fecha1 AND :fecha2 ORDER BY fecha");
        $stnt->bindParam(":fecha1",$datos["fecha1"], PDO::PARAM_STR);
        $stnt->bindParam(":fecha2", $datos["fecha2"], PDO::PARAM_STR);
        $stnt ->execute();
        return $stnt->fetchAll();
       }
       
    public static function vista_Ultima_Ventas_Model($tabla) {

        $stnt = Conexion::conectar()->prepare("SELECT * FROM $tabla order by id DESC limit 1;  ");
        $stnt ->execute();
        return $stnt->fetchAll();

    
    }
        public static function borrarVentaModel($datos, $tabla) {
        $stnt= Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id = :id");
        $stnt->bindParam(":id", $datos, PDO::PARAM_INT);

        if($stnt->execute()){
            return "success";
        }else{
           $stnt->errorInfo();
        }
    }
    
    public static function editarventasModel($datos, $tabla) {
        $stnt= Conexion::conectar()->prepare("SELECT id, producto, precio,fecha FROM $tabla WHERE id= :id");
        $stnt->bindParam(":id", $datos, PDO::PARAM_INT);
        $stnt->execute();
        return $stnt->fetch();
    }
      
    public static function actulizarventasModel($datos, $tabla) {
        $stnt= Conexion::conectar()->prepare("UPDATE $tabla SET producto=:producto,precio=:precio,fecha=:fecha WHERE id = :id");
        $stnt->bindParam(":id", $datos["id"], PDO::PARAM_INT);
        $stnt->bindParam(":producto", $datos["producto"], PDO::PARAM_STR);
        $stnt->bindParam(":precio", $datos["precio"], PDO::PARAM_INT);
        $stnt->bindParam(":fecha", $datos["fecha"], PDO::PARAM_STR);
    
        if($stnt->execute()){
            return "success";
        }else{
            return $stnt->errorInfo();
        }
    }
    
    public static function IdventasModel($datos, $tabla) {
        $stnt= Conexion::conectar()->prepare("SELECT id, producto, precio,fecha FROM $tabla WHERE id = :id");
        $stnt->bindParam(":id", $datos["id"], PDO::PARAM_INT);
        $stnt->execute();
        return $stnt->fetchAll();
    }

       
       


}

