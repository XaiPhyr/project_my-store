<?php
include("models/product.php");
// include("models/company.php");

$id = $_GET['id'];
$data = $ProductModel->get_single_product($id);
$category = $ProductModel->get_single_category($data->category);
// $company = $CompanyModel->get_companies();
$company = $ProductModel->get_companies();
?>

<form action="action.php" method="post">
    <div class="container col-6">
        <div class="card">
            <div class="card-header">
                <span class="h3">
                    <strong><?php echo $data->product_name ?> (Reference No. <?php echo $data->refnum ?>)</strong>
                </span>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="form-group col-6">
                        <label for="">Product Description</label>
                        <br>
                        <?php echo $data->product_desc ?>
                    </div>
                    <div class="form-group col-2">
                        <label for="">Current Stocks</label>
                        <br>
                        <strong><?php echo $data->stocks ?></strong>
                    </div>
                    <div class="form-group col-2">
                        <label for="">Price</label>
                        <br>
                        <strong><?php echo $data->price ?></strong>
                    </div>
                    <div class="form-group col-2">
                        <label for="">Category</label>
                        <br>
                        <strong><?php echo $category->category_name ?></strong>
                    </div>
                </div>

                <hr>

                <div class="row justify-content-center">
                    <div class="form-group col-3">
                        <label for="">Restock</label>
                        <input type="number" name="stocks" id="" class="form-control">
                    </div>
                    <div class="form-group col-4">
                        <label for="">Supplier</label>
                        <select name="company_id" id="" class="form-control">
                            <?php while ($item = mysqli_fetch_object($company)) { ?>
                                <option value="<?php echo $item->Id ?>"><?php echo $item->company_name ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>

                <input type="hidden" name="current_stocks" value="<?php echo $data->stocks ?>">
                <input type="hidden" name="product_id" value="<?php echo $id ?>">
                <div class="float-right">
                    <button class="btn btn-primary" name="restock" type="submit" value="submit">Save</button>
                    <button class="btn btn-secondary" name="cancel" type="submit" value="product">Cancel</button>
                </div>
            </div>
        </div>
    </div>
</form>