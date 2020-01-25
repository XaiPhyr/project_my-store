<?php
include("query-getter.php");

class UserModel extends QueryGetter
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

    /* user variables */
    public $firstname;
    public $lastname;
    public $dob;
    public $u_image;
    public $address;
    public $city;
    public $country;
    public $postal;
    public $area_code;
    public $number;

    /* GET ALL */
    function get_users()
    {
        $get = "SELECT * FROM
        accounts AS a, user_header AS uh, user_address AS ua, user_contacts AS uc WHERE
        uh.Id = ua.user_id AND uh.Id = uc.user_id AND uh.Id = a.user_id AND a.flag = 1 AND
        uh.flag = 1 AND ua.flag = 1 AND uc.flag = 1";

        return $this->ListRetrieveQuery('all', $get);
    }

    /* GET SINGLE */
    function get_single_user($id)
    {
        $get = "SELECT * FROM
        accounts AS a, user_header AS uh, user_address AS ua, user_contacts AS uc WHERE
        uh.Id = '" . $id . "' AND uh.Id = ua.user_id AND uh.Id = uc.user_id AND uh.Id = a.user_id AND a.flag = 1 AND
        uh.flag = 1 AND ua.flag = 1 AND uc.flag = 1";

        return $this->ListRetrieveQuery('single', $get);
    }

    /* POST, PUT, DELETE */
    function save_user_header()
    {
        $connect = $this->db_connect();
        if (empty($this->id) || $this->id == '') {
            $post = "INSERT INTO user_header SET
            first_name = '" . $this->cust_firstname . "',
            last_name = '" . $this->cust_lastname . "',
            dob = '" . $this->cust_dob . "',
            image = '', created = now(), flag = 1";

            mysqli_query($connect, $post);
            $this->last_id = $connect->insert_id;
        } else {
            $put = "UPDATE user_header SET
            first_name = '" . $this->cust_firstname . "',
            last_name = '" . $this->cust_lastname . "',
            dob = '" . $this->cust_dob . "',
            image = '', modified = now(), flag = 1 WHERE Id = '" . $this->id . "'";

            mysqli_query($connect, $put);
        }
    }

    function save_user_address()
    {
        if (empty($this->id) || $this->id == '') {
            $post = "INSERT INTO user_address SET
            user_id = '" . $this->last_id . "',
            address = '" . $this->cust_address . "',
            city = '" . $this->cust_city . "',
            country = '" . $this->cust_country . "',
            postal = '" . $this->cust_postal . "',
            created = now(), flag = 1";

            $this->PostPutDeleteQuery($post);
        } else {
            $put = "UPDATE user_address SET
            address = '" . $this->cust_address . "',
            city = '" . $this->cust_city . "',
            country = '" . $this->cust_country . "',
            postal = '" . $this->cust_postal . "',
            modified = now(), flag = 1 WHERE user_id = '" . $this->id . "'";

            $this->PostPutDeleteQuery($put);
        }
    }

    function save_user_contacts()
    {
        if (empty($this->id) || $this->id == '') {
            $post = "INSERT INTO user_contacts SET
            user_id = '" . $this->last_id . "',
            area_code = '" . $this->cust_area_code . "',
            number = '" . $this->cust_number . "',
            created = now(), flag = 1";

            $this->PostPutDeleteQuery($post);
        } else {
            $put = "UPDATE user_contacts SET
            area_code = '" . $this->cust_area_code . "',
            number = '" . $this->cust_number . "',
            modified = now(), flag = 1 WHERE user_id = '" . $this->id . "'";

            $this->PostPutDeleteQuery($put);
        }
    }

    function save_account()
    {
        if (empty($this->id) || $this->id == "") {
            $post = "INSERT INTO accounts SET
            username = '" . $this->username . "', 
            password = '" . $this->password . "',
            email = '" . $this->email . "',
            image = 'NULL',
            status = '" . $this->status . "',
            user_id = '" . $this->last_id . "',
            created = now(), flag = 1";

            $this->PostPutDeleteQuery($post);
        } else {
            $put = "UPDATE accounts SET
            username = '" . $this->username . "', 
            password = '" . $this->password . "',
            email = '" . $this->email . "',
            image = 'NULL',
            status = '" . $this->status . "',
            modified = now(), flag = 1 WHERE user_id = '" . $this->id . "'";

            $this->PostPutDeleteQuery($put);
        }
    }

    function remove_user($id)
    {
        $delete = "UPDATE user_header AS uh, user_address AS ua, user_contacts AS uc SET
        uh.flag = 0, ua.flag = 0, uc.flag = 0 WHERE uh.Id = '" . $id . "' AND uh.Id = ua.user_id AND uh.Id = uc.user_id";

        $this->PostPutDeleteQuery($delete);
    }
}

$UserModel = new UserModel;
