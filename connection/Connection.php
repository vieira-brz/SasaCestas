<?php

    class Connection {

        public static function connect()
        {
            try 
            {
                $conn = new \PDO('mysql:host=127.0.0.1:3307;dbname=sasa;charset=utf8', 'root', '');
                return $conn;
            } 
            catch (\PDOException $e) 
            {
                echo 'ERROR: ' . $e->getMessage();
            }
        }
    }

?>