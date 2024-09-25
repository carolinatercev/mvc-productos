<?php 
class DataBase{
    //Constantes de la base de datos 
    const SERVIDOR='localhost';
    const USUARIODB='root';
    const PASSDB='';
    const NOMBREDB='proyecto_mvc';

    //metodo para la conexion con la base de datos 
    //self::hace referencia a las constantes que estan en el mismo archivo
    public static function Conectar(){
        try{
            $con = new PDO("mysql:host=".self::SERVIDOR.";dbname=".self::NOMBREDB,self::USUARIODB,self::PASSDB);
            $con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            return $con;
        }catch(PDOException $e){
            die("Error: ". $e->getMessage());
        }

}}