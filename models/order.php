<?php
include("query-getter.php");

class OrderModel extends QueryGetter
{
    public $id;
    public $last_id;
    public $keyword;

    public $customer_id;
    public $order_id;
    public $product_id;
    public $product_name;
    public $qty;
    public $total_cost;

    /* GET ALL */
    function get_products()
    {
        $get = "SELECT * FROM
        product_header AS ph, product_details AS pd WHERE
        ph.Id = pd.product_id AND ph.flag = 1 AND pd.flag = 1";

        return $this->ListRetrieveQuery('all', $get);
    }

    /* GET SINGLE */
    function get_single_customer($id)
    {
        $get = "SELECT * FROM customer_header AS ch WHERE Id = '" . $id . "'";

        return $this->ListRetrieveQuery('single', $get);
    }

    function get_orders($id)
    {
        $get = "SELECT * FROM orders AS o, sales AS s WHERE
        o.customer_id = '" . $id . "' AND o.Id = s.order_id AND o.flag = 1 AND s.flag = 1";

        return $this->ListRetrieveQuery('all', $get);
    }

    /* POST, PUT, DELETE */
    /**
     * checkout
     * 
     * @param string $id Id of customer
     * @param int $total the total value of customer's orders
     */
    function checkout($id, $total)
    {
        $post = "INSERT INTO checkout SET
        customer_id = '" . $id . "', total = '" . $total . "', checkout_date = now()";

        $this->PostPutDeleteQuery($post);
    }

    /**
     * checkout_item
     * 
     * function to remove all orders after checkout
     * @param string $id
     * 
     */
    function checkout_item($id)
    {
        $put = "UPDATE orders AS o, sales AS s SET
        o.flag = 0, s.flag = 0 WHERE o.customer_id = '" . $id . "' AND o.Id = s.order_id";

        $this->PostPutDeleteQuery($put);
    }

    function save_order()
    {
        $post = "INSERT INTO orders SET
        customer_id = '" . $this->customer_id . "',
        date_purchased = now(), flag = 1";

        $connect = $this->db_connect();
        mysqli_query($connect, $post);
        $this->last_id = $connect->insert_id;
    }

    function save_sales()
    {
        $post = "INSERT INTO sales SET
        order_id = '" . $this->last_id . "',
        product_id = '" . $this->product_id . "',
        product_name = '" . $this->product_name . "',
        qty = '" . $this->qty . "',
        cost = '" . $this->total_cost . "',
        date_purchased = now(), flag = 1";

        $this->PostPutDeleteQuery($post);
    }

    function remove_order($id)
    {
        $delete = "UPDATE orders AS o, sales AS s SET
        o.flag = 0, s.flag = 0 WHERE o.Id = s.order_id AND o.Id = '" . $id . "'";

        $this->PostPutDeleteQuery($delete);
    }
}

$OrderModel = new OrderModel;
