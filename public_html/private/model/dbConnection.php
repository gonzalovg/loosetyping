<?php

class DbConnection
{
    private static $instance;

    private function __construct()
    {
        // $this->instance = new PDO('mysql:host=localhost;dbname=loosetyping', 'root', '');
    }

    public static function getInstance()
    {
        if (!self::$instance instanceof self) {
            self::$instance=new PDO('mysql:host=localhost;dbname=loosetyping', 'root', '');
        }

        return self::$instance;
    }


    // public function queryAll()
    // {
    //     $query="select * from usuarios;";

    //     return self::getInstance()->query($query);
    // }
}
