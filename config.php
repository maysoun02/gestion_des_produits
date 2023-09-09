<?php

class config
{   private static $pdo=NULL;
    public static function getConnexion()
    { $dsn = 'mysql:dbname=prjet;host=127.0.0.1';
        $user = 'root';
        $password = '';
        try
        {
        if (!isset (self::$pdo))
        { self::$pdo=new PDO($dsn, $user,$password, [PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE=>PDO::FETCH_ASSOC]);}
        }
        catch(Exception $e){
            die('Erreur: '.$e->getMessage());// die c'est l'équivalent de exit
    }

return self::$pdo;
}}