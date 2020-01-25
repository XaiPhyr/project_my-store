<?php

if ($_POST['login']) {
    include("models/login.php");

    if ($LoginModel->login()) {
    } else {
    }
}

if ($_POST['cancel']) {
    switch ($_POST['cancel']) {
        default:
            header("location: index.php");
            break;

        case 'product':
            header("location: index.php?page=product");
            exit();
            break;
        case 'order':
            header("location: index.php?page=order");
            exit();
            break;
        case 'customer':
            header("location: index.php?page=customer");
            exit();
            break;
        case 'company':
            header("location: index.php?page=company");
            exit();
            break;
        case 'user':
            header("location: index.php?page=user");
            exit();
            break;
    }
}

if ($_POST['remove']) {
    include("models/product.php");

    switch ($_POST['remove']) {
        case 'product':
            $id = $_POST['id'];
            $ProductModel->remove_product($id);
            header("location: index.php?page=product");
            exit();
            break;
    }
}

if ($_POST['add_product']) {
    include("models/product.php");

    $ProductModel->prod_name = $_POST['name'];
    $ProductModel->prod_category = $_POST['category'];
    $ProductModel->prod_stocks = $_POST['stocks'];
    $ProductModel->prod_price = $_POST['price'];
    $ProductModel->prod_desc = $_POST['description'];
    $ProductModel->prod_user_id = $_POST['user_id'];
    $ProductModel->prod_refnum = $_POST['refnum'];
    $ProductModel->id = $_POST['id'];

    $ProductModel->save_product_header();
    $ProductModel->save_product_detail();

    header("location: index.php?page=product");
    exit();
}

if ($_POST['add_customer']) {
    include("models/customer.php");

    $CustomerModel->cust_firstname = $_POST['firstname'];
    $CustomerModel->cust_lastname = $_POST['lastname'];
    $CustomerModel->cust_dob = $_POST['dob'];
    $CustomerModel->cust_address = $_POST['address'];
    $CustomerModel->cust_city = $_POST['city'];
    $CustomerModel->cust_country = $_POST['country'];
    $CustomerModel->cust_postal = $_POST['postal'];
    $CustomerModel->cust_area_code = $_POST['area_code'];
    $CustomerModel->cust_number = $_POST['number'];
    $CustomerModel->id = $_POST['id'];

    $CustomerModel->save_customer_header();
    $CustomerModel->save_customer_address();
    $CustomerModel->save_customer_contacts();

    switch ($_POST['add_customer']) {
        default:
            header("location: index.php?page=customer");
            exit();
            break;

        case 'order':
            header("location: index.php?page=order");
            exit();
            break;
    }
}

if ($_POST['add_user']) {
    include("models/user.php");

    $UserModel->firstname = $_POST['firstname'];
    $UserModel->lastname = $_POST['lastname'];
    $UserModel->dob = $_POST['dob'];
    $UserModel->address = $_POST['address'];
    $UserModel->city = $_POST['city'];
    $UserModel->country = $_POST['country'];
    $UserModel->area_code = $_POST['area_code'];
    $UserModel->number = $_POST['number'];
    $UserModel->postal = $_POST['postal'];
    $UserModel->id = $_POST['id'];

    $UserModel->username = $_POST['username'];
    $UserModel->password = $_POST['password'];
    $UserModel->email = $_POST['email'];
    $UserModel->status = $_POST['status'];

    $UserModel->save_user_header();
    $UserModel->save_user_address();
    $UserModel->save_user_contacts();
    $UserModel->save_account();

    header("location: index.php?page=user");
    exit();
}

if ($_POST['add_company']) {
    include("models/company.php");

    $CompanyModel->company_name = $_POST['company_name'];
    $CompanyModel->co_address = $_POST['address'];
    $CompanyModel->co_city = $_POST['city'];
    $CompanyModel->co_country = $_POST['country'];
    $CompanyModel->co_postal = $_POST['postal'];
    $CompanyModel->co_area_code = $_POST['area_code'];
    $CompanyModel->co_number = $_POST['number'];
    $CompanyModel->id = $_POST['id'];

    $CompanyModel->save_company_header();
    $CompanyModel->save_company_address();
    $CompanyModel->save_company_contacts();

    header("location: index.php?page=company");
    exit();
}

if ($_POST['restock']) {
    include("models/product.php");

    $ProductModel->stock_prod_id = $_POST['product_id'];
    $ProductModel->stock_co_id = $_POST['company_id'];
    $ProductModel->stock_qty = $_POST['stocks'];
    $ProductModel->stock_total = $_POST['current_stocks'] + $_POST['stocks'];

    $ProductModel->save_stocks();
    $ProductModel->update_prod_stocks('restock');
    header("location: index.php?page=product");
    exit();
}
