<?php
require_once "../controllers/controller.php";
require_once "../models/crud.php";

class Ajax{
    public $validar_usuario;
    public $validar_email;

    public function validarUsuarioAjax(){
        $datos = $this->validar_usuario;

        $respuesta = MvcController::validarUsuarioController($datos);
     
        echo $respuesta;

    }
    public function validarEmailAjax(){
        $datos = $this->validar_email;

        $respuesta = MvcController::validarEmailController($datos);
     
        echo $respuesta;

    }


}

if(isset ( $_POST["nombre"] ) ){
        
    $a = new Ajax();
    $a -> validar_usuario = $_POST["nombre"];
    $a -> validarUsuarioAjax();

}

if(isset ( $_POST["email"] ) ){
        
    $a = new Ajax();
    $a -> validar_email = $_POST["email"];
    $a -> validarEmailAjax();

}

if(isset ( $_FILES["file"] ) ){
    if( !empty ( $_FILES["file"] ) ){
        if( is_uploaded_file ( $_FILES["file"] ["tmp_name"]) ){
            $dir_destino = "../uploads/";
            $tamano =  $_FILES["file"] ["size"];
            $tipo = pathinfo( $_FILES ["file"] ["name"] , PATHINFO_EXTENSION );
            $nombre = time()."_".rand(1000000, 9999999).".".$tipo;
            $destino = $dir_destino.$nombre;

            if ( $tipo != "jpg"  && $tipo != "jpeg" && $tipo != "png" && $tipo != "gif") {
                echo "300";
            } elseif ( $tamano > 26214400  )   //bytes
             {
                echo "301";
            }else {
                move_uploaded_file( $_FILES["file"] ["tmp_name"], $destino);
                echo $nombre;
            }
        } //tercer if
        else {
            echo "302"; 
        }
    
    } //segundo if
    else {
        echo "303"; 
    }

    
} // primer if