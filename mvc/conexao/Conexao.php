<?php
class Conexao {
    private static ?PDO $instance = null;

    private function __construct() {}

    public static function getConexao(): PDO {
        if (!self::$instance) { 
            self::$instance = new PDO(
                'mysql:host=localhost;port=3306;dbname=escola;charset=utf8',
                'root',
                'senac'
            );
            self::$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            self::$instance->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        }
        return self::$instance;
    }
}
