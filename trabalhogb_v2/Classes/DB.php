<?php
require_once 'Config.php';

class DB{

    private static $instancia;

    public static function getInstancia(){

        if (!isset(self::$instancia)){

            try{
                self::$instancia = new PDO("mysql:host=localhost;dbname=trabalhogb","admin","admin");
                self::$instancia->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                self::$instancia->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
            } catch (PDOException $ex){
                echo $ex->getMessage();
            }
        }

        return self::$instancia;
    }

    public static function prepare($sql){
        return self::getInstancia()->prepare($sql);
    }
}
