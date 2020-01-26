<?php
include("database.php");

// class database
// {
//     private $db_username;
//     private $db_password;
//     private $db_hostname;
//     private $dbname;

//     function __construct()
//     {
//         $this->db_username = 'root';
//         $this->db_password = '';
//         $this->db_hostname = 'localhost';
//         $this->dbname = 'store';
//     }

//     public function db_connect()
//     {
//         return $connect = mysqli_connect($this->db_hostname, $this->db_username, $this->db_password, $this->dbname);
//         if (!$connect) die(mysqli_connect_error());
//     }
// }

class QueryGetter extends database
{
    /* Query */
    /**
     * getLoginQuery
     * 
     * Use to initialize login
     * @param any $query data that is pass for account check
     */
    public function getLoginQuery($query)
    {
        $connect = $this->db_connect();

        if ($connect) {
            $qry = mysqli_query($connect, $query);
            if ($qry) {
                session_start();
                $_SESSION['token'] = mysqli_fetch_object($qry);
                if (!empty($_SESSION['token'])) return true;
            }
        }

        $connect->close();
    }

    /**
     * PostPutDeleteQuery
     *
     * Use to POST, PUT, DELETE for query
     * @param any $query input sql query post, put, delete
     *
     */
    public function PostPutDeleteQuery($query)
    {
        $connect = $this->db_connect();
        mysqli_query($connect, $query);
        $connect->close();
    }

    /**
     * ListRetrieveQuery
     *
     * Use to Retrieve lists from database
     * @param string $status use 'all' or 'single'
     * @param any $query input sql query
     * @return string returns query from database
     * 
     */
    public function ListRetrieveQuery($status, $query)
    {
        $connect = $this->db_connect();
        $qry = mysqli_query($connect, $query);

        if ($status == 'single') {
            return mysqli_fetch_object($qry);
        } else {
            return $qry;
        }

        $connect->close();
    }
}
