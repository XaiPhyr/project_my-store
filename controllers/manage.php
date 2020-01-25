<?php

class ManagePage
{
    function webpage($page)
    {
        include("views/header.php");
        include("views/manage/" . $page);
        include("views/footer.php");
    }

    function add_company()  { $this->webpage('add-company.php'); }
    function add_customer() { $this->webpage('add-customer.php'); }
    function add_product()  { $this->webpage('add-product.php'); }
    function add_stock()    { $this->webpage('add-stock.php'); }
    function add_user()     { $this->webpage('add-user.php'); }
}

$ManagePageController = new ManagePage;
