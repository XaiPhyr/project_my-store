<?php

class database
{
    private $db_username;
    private $db_password;
    private $host;
    private $dbname;

    function __construct()
    {
        $this->db_username = 'root';
        $this->db_password = '';
        $this->host = 'localhost';
        $this->dbname = 'store';
    }

    public function db_connect()
    {
        return $connect = mysqli_connect($this->host, $this->db_username, $this->db_password, $this->dbname);
        if ($connect) die(mysqli_connect_error());
    }
}
