<?php
class ConexionPDO
{
    static private $cnn;
    public function __construct() {
        $pdo='mysql:host='.HOST.'port='.PORT.';dbname='.DATABASE.';charset='.CHARSET;
        $options=[PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION,PDO::ATTR_EMULATE_PREPARES=>false];
        try{
            self::$cnn=new PDO($pdo,USERNAME,PASSWORD,$options);
            }catch(PDOException $error)
            {
                die("ERROR ".$error->getMessage());
            }
    }
}