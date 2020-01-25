<?php
include("query-getter.php");

class LoginModel extends QueryGetter
{
    public $id;
    public $last_id;
    public $keyword;

    /* accounts variables */
    public $username;
    public $password;
    public $email;
    public $image;
    public $status;

    function login()
    {
        $get = "SELECT * FROM accounts WHERE
        username = '" . $this->username . "' AND
        password = '" . hash("sha256", $this->password) . "' AND
        flag = 1";

        return $this->getLoginQuery($get);
    }
}

$LoginModel = new LoginModel;
