<?php


class Conexion {
    public static function conectar(){
        $link = new PDO("mysql:host=localhost;dbname=pdophp","root","");
        //var_dump($link);
        return $link;
    }
}
/*
$a = new Conexion();
$a -> conectar();
*/

