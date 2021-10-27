<?php

    $diretorio = __DIR__;
    $diretorio = explode('\\models', $diretorio);
    $diretorio = $diretorio[0];

    include $diretorio .'\\connection\\Connection.php';

    class ModelConfiguration {

        protected $conn;
        protected $dbname;

        public function __construct()
        {
            $this->dbname = 'sasa';
            $this->conn = Connection::connect();
        }
    }
?>