<?php
include("query-getter.php");

class CompanyModel extends QueryGetter
{
    public $id;
    public $last_id;
    public $keyword;

    /* company variables */
    public $company_name;
    public $co_image;
    public $co_address;
    public $co_city;
    public $co_country;
    public $co_postal;
    public $co_area_code;
    public $co_number;

    /* GET ALL */
    function get_companies()
    {
        $get = "SELECT * FROM
        company_header AS ch, company_address AS ca, company_contacts AS cc WHERE
        ch.Id = ca.company_id AND ch.Id = cc.company_id AND ch.flag = 1 AND ca.flag = 1 AND cc.flag = 1";

        return $this->ListRetrieveQuery('all', $get);
    }

    /* GET SINGLE */
    function get_single_company($id)
    {
        $get = "SELECT * FROM
        company_header AS ch, company_address AS ca, company_contacts AS cc WHERE
        ch.Id = '" . $id . "' AND ch.Id = ca.company_id AND ch.Id = cc.company_id AND ch.flag = 1 AND ca.flag = 1 AND cc.flag = 1";

        return $this->ListRetrieveQuery('single', $get);
    }

    /* POST, PUT, DELETE */
    function save_company_header()
    {
        $connect = $this->db_connect();

        if (empty($this->id) || $this->id == '') {
            $post = "INSERT INTO company_header SET
            company_name = '" . $this->company_name . "',
            image = 'NULL', created = now(), flag = 1";

            mysqli_query($connect, $post);
            $this->last_id = $connect->insert_id;
        } else {
            $put = "UPDATE company_header SET
            company_name = '" . $this->company_name . "',
            image = 'NULL', modified = now(), flag = 1 WHERE Id = '" . $this->id . "'";

            mysqli_query($connect, $put);
        }
    }

    function save_company_address()
    {
        if (empty($this->id) || $this->id == '') {
            $post = "INSERT INTO company_address SET
            company_id = '" . $this->last_id . "',
            address = '" . $this->co_address . "',
            city = '" . $this->co_city . "',
            country = '" . $this->co_country . "',
            postal = '" . $this->co_postal . "',
            created = now(), flag = 1";

            $this->PostPutDeleteQuery($post);
        } else {
            $put = "UPDATE company_address SET
            address = '" . $this->co_address . "',
            city = '" . $this->co_city . "',
            country = '" . $this->co_country . "',
            postal = '" . $this->co_postal . "',
            modified = now(), flag = 1 WHERE company_id = '" . $this->id . "'";

            $this->PostPutDeleteQuery($put);
        }
    }

    function save_company_contacts()
    {
        if (empty($this->id) || $this->id == '') {
            $post = "INSERT INTO company_contacts SET
            company_id = '" . $this->last_id . "',
            area_code = '" . $this->co_area_code . "',
            number = '" . $this->co_number . "',
            created = now(), flag = 1";

            $this->PostPutDeleteQuery($post);
        } else {
            $put = "UPDATE company_contacts SET
            area_code = '" . $this->co_area_code . "',
            number = '" . $this->co_number . "',
            modified = now(), flag = 1 WHERE company_id = '" . $this->id . "'";

            $this->PostPutDeleteQuery($put);
        }
    }

    function remove_company($id)
    {
        $delete = "UPDATE company_header AS ch, company_address AS ca, company_contacts AS cc SET
        ch.flag = 0, ca.flag = 0, cc.flag = 0, ch.modified = now(), ca.modified = now(), cc.modified = now() WHERE
        ch.Id = '" . $id . "' AND ch.Id = ca.company_id AND ch.Id = cc.company_id";

        $this->PostPutDeleteQuery($delete);
    }
}

$CompanyModel = new CompanyModel;
