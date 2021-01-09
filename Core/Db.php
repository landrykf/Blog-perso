<?php
namespace App\Core;

use PDO;
use PDOException;

class Db extends PDO
{
    // Instance unique de la classe 

    private static $instance;

    // Information de conexion

    private const DBHOST = 'localhost';
    private const DBUSER = 'root';
    private const DBPASS = '';
    private const DBNAME = 'monblogperso';


    private function __construct()
    {
        //DSN de connexion

        $_dsn = 'mysql:dbname='. self::DBNAME . ';host=' . self::DBHOST;

        //On appelle le constructeur de la classe PDO

        try{
            parent::__construct($_dsn, self::DBUSER, self::DBPASS);

            $this->setAttribute(PDO::MYSQL_ATTR_INIT_COMMAND, 'SET NAMES UTF8');
            $this->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
            $this->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $e){
            die($e->getMessage());
        }


    }

    public static function getInstance():self{
        if(self::$instance == null){
            self::$instance = new self();
        }
        return self::$instance;
    }
}

