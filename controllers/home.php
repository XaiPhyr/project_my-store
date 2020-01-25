<?php

class HomePage
{
    function webpage($page)
    {
        include("views/header.php");
        include("views/home/" . $page);
        include("views/footer.php");
    }

    function login() { include("views/login.php"); }

    function index()    { $this->webpage('index.php'); }
    function cart()     { $this->webpage('cart.php'); }
    function company()  { $this->webpage('companies.php'); }
    function customer() { $this->webpage('customers.php'); }
    function order()    { $this->webpage('order.php'); }
    function product()  { $this->webpage('products.php'); }
    function profile()  { $this->webpage('profile.php'); }
    function register() { $this->webpage('register.php'); }
    function user()     { $this->webpage('users.php'); }
}

$HomePageController = new HomePage;
