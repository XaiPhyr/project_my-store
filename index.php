<?php

switch ($_GET['page']) {
        /* Home Controller */
    default:
        include("controllers/home.php");
        $HomePageController->index();
        break;
    case 'cart':
        include("controllers/home.php");
        $HomePageController->cart();
        break;
    case 'company':
        include("controllers/home.php");
        $HomePageController->company();
        break;
    case 'customer':
        include("controllers/home.php");
        $HomePageController->customer();
        break;
    case 'order':
        include("controllers/home.php");
        $HomePageController->order();
        break;
    case 'product':
        include("controllers/home.php");
        $HomePageController->product();
        break;
    case 'profile':
        include("controllers/home.php");
        $HomePageController->profile();
        break;
    case 'register':
        include("controllers/home.php");
        $HomePageController->register();
        break;
    case 'user':
        include("controllers/home.php");
        $HomePageController->user();
        break;

    case 'login':
        include("controllers/home.php");
        $HomePageController->login();
        break;
    case 'logout':
        session_start();
        session_destroy();
        header("location: index.php?page=login");
        break;

        /* Manage Controller */
    case 'add-company':
        include("controllers/manage.php");
        $ManagePageController->add_company();
        break;
    case 'add-customer':
        include("controllers/manage.php");
        $ManagePageController->add_customer();
        break;
    case 'add-product':
        include("controllers/manage.php");
        $ManagePageController->add_product();
        break;
    case 'add-stock':
        include("controllers/manage.php");
        $ManagePageController->add_stock();
        break;
    case 'add-user':
        include("controllers/manage.php");
        $ManagePageController->add_user();
        break;
}
