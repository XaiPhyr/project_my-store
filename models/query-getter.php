<?php
include("database.php");

class QueryGetter extends database
{
    /* Query */
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

    public function PostPutDeleteQuery($query)
    {
        $connect = $this->db_connect();
        mysqli_query($connect, $query);
        $connect->close();
    }

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
