<?php

/**
 * Empleada para la conexión con la base de datos empleando el patrón singleton.
 *
 * Class DbConnection
 */
class DbConnection
{
    private static $instance;

    public function __construct()
    {
    }

    /**
     * Devuelve un objeto PDO, con el cual realizaremos las peticiones/instrucciones a la base de datos.
     *
     * @return PDO
     */
    public static function getInstance()
    {
        if (!self::$instance instanceof self) {
            self::$instance=new PDO('mysql:host=localhost;dbname=loosetyping', 'root', '');
        }

        return self::$instance;
    }
}
