<?php

namespace sistema\shared;

use PDO;
use PDOException;

class Conexao {

    private static $stancia;

    public static function getStancia(): PDO {
        if (empty(self::$stancia)) {
            try {
                self::$stancia = new PDO('mysql:host='.DB_HOST.';port='.DB_PORT.';dbname='.DB_NAME, DB_USER, DB_PASSWORD, [
                    PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE,
                    PDO::ATTR_CASE
                ]);
            } catch (PDOException $ex) {
                die("Erro de conexao" . $ex);
            }
        }
            return self::$stancia;
    }

}
