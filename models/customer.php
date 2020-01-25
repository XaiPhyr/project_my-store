<?php
include("query-getter.php");

class CustomerModel extends QueryGetter
{
    public $id;
    public $last_id;
    public $keyword;

    /* customer variables */
    public $cust_firstname;
    public $cust_lastname;
    public $cust_dob;
    public $cust_image;
    public $cust_address;
    public $cust_city;
    public $cust_country;
    public $cust_postal;
    public $cust_area_code;
    public $cust_number;

    /* GET ALL */
    function get_customers()
    {
        $get = "SELECT * FROM
        customer_header AS ch, customer_address AS ca, customer_contacts AS cc WHERE
        ch.Id = ca.customer_id AND ch.Id = cc.customer_id AND ch.flag = 1 AND ca.flag = 1 AND cc.flag = 1";

        return $this->ListRetrieveQuery('all', $get);
    }

    function search_customer()
    {
        $get = "SELECT * FROM customer_header AS ch, customer_address AS ca, customer_contacts AS cc WHERE
        (ch.first_name LIKE '%" . $this->keyword . "%' OR ch.last_name LIKE '%" . $this->keyword . "%') AND
        ch.flag = 1 AND ca.flag = 1 AND cc.flag = 1 AND ch.Id = ca.customer_id AND ch.Id = cc.customer_id";

        return $this->ListRetrieveQuery('all', $get);
    }

    /* GET SINGLE */
    function get_single_customer($id)
    {
        $get = "SELECT * FROM
        customer_header AS ch, customer_address AS ca, customer_contacts AS cc WHERE
        ch.Id = '" . $id . "' AND ch.Id = ca.customer_id AND ch.Id = cc.customer_id AND ch.flag = 1 AND ca.flag = 1 AND cc.flag = 1";

        return $this->ListRetrieveQuery('single', $get);
    }

    /* POST, PUT, DELETE */
    function save_customer_header()
    {
        $connect = $this->db_connect();
        if (empty($this->id) || $this->id == '') {
            $post = "INSERT INTO customer_header SET
            first_name = '" . $this->cust_firstname . "',
            last_name = '" . $this->cust_lastname . "',
            dob = '" . $this->cust_dob . "',
            image = '', created = now(), flag = 1";

            mysqli_query($connect, $post);
            $this->last_id = $connect->insert_id;
        } else {
            $put = "UPDATE customer_header SET
            first_name = '" . $this->cust_firstname . "',
            last_name = '" . $this->cust_lastname . "',
            dob = '" . $this->cust_dob . "',
            image = '', modified = now(), flag = 1 WHERE Id = '" . $this->id . "'";

            mysqli_query($connect, $put);
        }
    }

    function save_customer_address()
    {
        if (empty($this->id) || $this->id == '') {
            $post = "INSERT INTO customer_address SET
            customer_id = '" . $this->last_id . "',
            address = '" . $this->cust_address . "',
            city = '" . $this->cust_city . "',
            country = '" . $this->cust_country . "',
            postal = '" . $this->cust_postal . "',
            created = now(), flag = 1";

            $this->PostPutDeleteQuery($post);
        } else {
            $put = "UPDATE customer_address SET
            address = '" . $this->cust_address . "',
            city = '" . $this->cust_city . "',
            country = '" . $this->cust_country . "',
            postal = '" . $this->cust_postal . "',
            modified = now(), flag = 1 WHERE customer_id = '" . $this->id . "'";

            $this->PostPutDeleteQuery($put);
        }
    }

    function save_customer_contacts()
    {
        if (empty($this->id) || $this->id == '') {
            $post = "INSERT INTO customer_contacts SET
            customer_id = '" . $this->last_id . "',
            area_code = '" . $this->cust_area_code . "',
            number = '" . $this->cust_number . "',
            created = now(), flag = 1";

            $this->PostPutDeleteQuery($post);
        } else {
            $put = "UPDATE customer_contacts SET
            area_code = '" . $this->cust_area_code . "',
            number = '" . $this->cust_number . "',
            modified = now(), flag = 1 WHERE customer_id = '" . $this->id . "'";

            $this->PostPutDeleteQuery($put);
        }
    }

    function remove_customer($id)
    {
        $delete = "UPDATE customer_header AS ch, customer_address AS ca, customer_contacts AS cc SET
        ch.flag = 0, ca.flag = 0, cc.flag = 0 WHERE ch.Id = '" . $id . "' AND ch.Id = ca.customer_id AND ch.Id = cc.customer_Id";

        $this->PostPutDeleteQuery($delete);
    }
}

$CustomerModel = new CustomerModel;
