<?php
include("query-getter.php");

class ProductModel extends QueryGetter
{
    public $id;
    public $last_id;
    public $keyword;

    /* product variables */
    public $prod_name;
    public $prod_image;
    public $prod_desc;
    public $prod_refnum;
    public $prod_category;
    public $prod_stocks;
    public $prod_price;
    public $prod_user_id;

    /* stock variables */
    public $stock_co_id;
    public $stock_qty;
    public $stock_prod_id;
    public $stock_total;
    public $stock_left;

    /* GET ALL */
    function get_products()
    {
        $get = "SELECT * FROM
        product_header AS ph, product_details AS pd WHERE
        ph.Id = pd.product_id AND ph.flag = 1 AND pd.flag = 1";

        return $this->ListRetrieveQuery('all', $get);
    }

    function get_companies()
    {
        $get = "SELECT * FROM
        company_header AS ch, company_address AS ca, company_contacts AS cc WHERE
        ch.Id = ca.company_id AND ch.Id = cc.company_id AND ch.flag = 1 AND ca.flag = 1 AND cc.flag = 1 ORDER BY ch.created ASC";

        return $this->ListRetrieveQuery('all', $get);
    }

    function get_categories()
    {
        $get = "SELECT * FROM category WHERE flag = 1";

        return $this->ListRetrieveQuery('all', $get);
    }

    function get_orders()
    {
        $get = "SELECT * FROM orders AS o, sales AS s WHERE
        o.Id = s.order_id WHERE o.flag = 1 AND s.flag = 1";

        return $this->ListRetrieveQuery('all', $get);
    }

    function get_stocks()
    {
        $get = "SELECT * FROM stocks WHERE flag = 1";

        return $this->ListRetrieveQuery('all', $get);
    }

    /* GET SINGLE */
    function get_single_product($id)
    {
        $get = "SELECT * FROM
        product_header AS ph, product_details AS pd WHERE
        ph.Id = '" . $id . "' AND ph.Id = pd.product_id AND ph.flag = 1 AND pd.flag = 1";

        return $this->ListRetrieveQuery('single', $get);
    }

    function get_single_category($id)
    {
        $get = "SELECT * FROM
        category Where Id = '" . $id . "' AND flag = 1";

        return $this->ListRetrieveQuery('single', $get);
    }

    function get_single_order($id)
    {
        $get = " SELECT * FROM orders AS o, sales AS s WHERE
        product_id = '" . $id . "' AND o.Id = s.order_id";

        return $this->ListRetrieveQuery('single', $get);
    }

    /* POST, PUT, DELETE */
    function save_product_header()
    {
        $connect = $this->db_connect();

        if (empty($this->id) || $this->id == '') {
            $post = "INSERT INTO product_header SET
            product_name = '" . $this->prod_name . "',
            created = now(), flag = 1";

            mysqli_query($connect, $post);
            $this->last_id = $connect->insert_id;
        } else {
            $put = "UPDATE product_header SET
            product_name= '" . $this->prod_name . "',
            modified = now(), flag = 1 WHERE Id = '" . $this->id . "'";

            mysqli_query($connect, $put);
        }
    }

    function save_product_detail()
    {
        if (empty($this->id) || $this->id == '') {
            $post = "INSERT INTO product_details SET
            product_id = '" . $this->last_id . "',
            product_desc = '" . $this->prod_desc . "',
            refnum = '" . $this->prod_refnum . "',
            category = '" . $this->prod_category . "',
            stocks = '" . $this->prod_stocks . "',
            price = '" . $this->prod_price . "',
            user_id = '" . $this->prod_user_id . "',
            created = now(), flag = 1";

            $this->PostPutDeleteQuery($post);
        } else {
            $put = "UPDATE product_details SET
            product_desc = '" . $this->prod_desc . "',
            refnum = '" . $this->prod_refnum . "',
            category = '" . $this->prod_category . "',
            stocks = '" . $this->prod_stocks . "',
            price = '" . $this->prod_price . "',
            user_id = '" . $this->prod_user_id . "',
            modified = now(), flag = 1 WHERE product_id = '" . $this->id . "'";

            $this->PostPutDeleteQuery($put);
        }
    }

    function save_stocks()
    {
        $post = "INSERT INTO stocks SET
        product_id = '" . $this->stock_prod_id . "',
        company_id = '" . $this->stock_co_id . "',
        qty = '" . $this->stock_qty . "',
        created = now()";

        $this->PostPutDeleteQuery($post);
    }

    function update_prod_stocks($status)
    {
        if ($status == 'restock') {
            $put = "UPDATE product_details SET
            stocks = '" . $this->stock_total . "' WHERE
            product_id = '" . $this->stock_prod_id . "'";

            $this->PostPutDeleteQuery($put);
        } else {
            $put = "UPDATE product_details SET
            stocks = '" . $this->stock_left . "' WHERE
            product_id = '" . $this->stock_prod_id . "'";

            $this->PostPutDeleteQuery($put);
        }
    }

    function remove_product($id)
    {
        $delete = "UPDATE product_header as ph, product_details as pd SET
        ph.flag = 0, pd.flag = 0, ph.modified = now(), pd.modified = now() WHERE
        ph.Id = '" . $id . "' AND ph.Id = pd.product_id";

        $this->PostPutDeleteQuery($delete);
    }

    function remove_category($id)
    {
        $delete = "UPDATE category SET flag = 0, modified = now() WHERE Id = '" . $id . "'";

        $this->PostPutDeleteQuery($delete);
    }
}

$ProductModel = new ProductModel;
