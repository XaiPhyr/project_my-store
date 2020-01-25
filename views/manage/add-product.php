<?php
include("models/product.php");
$id = $_GET['id'];
$result_category = $ProductModel->get_categories();
$data = $ProductModel->get_single_product($id);

$refnum = rand(0, 99999);
?>

<form action="action.php" method="post">
    <div class="container">
        <div class="card">
            <div class="card-header">
                <span class="h5">Item:
                    <strong>
                        <?php if (empty($id)) { ?>
                            <?php echo $refnum ?>
                        <?php } else { ?>
                            <?php echo $data->refnum ?>
                        <?php } ?>
                    </strong>
                </span>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="form-group col-3">
                        <label for="">Product Name: </label>
                        <?php if (empty($id)) { ?>
                            <input type="text" name="name" id="" class="form-control">
                        <?php } else { ?>
                            <input type="text" name="name" id="" value="<?php echo $data->product_name ?>" class="form-control">
                        <?php } ?>
                    </div>
                    <div class="form-group col-3">
                        <label for="">Category: </label>
                        <select name="category" id="" class="form-control">
                            <?php while ($item = mysqli_fetch_object($result_category)) { ?>
                                <option value="<?php echo $item->Id ?>"><?php echo $item->category_name ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group col-3">
                        <label for="">Stocks: </label>
                        <?php if (empty($id)) { ?>
                            <input type="number" name="stocks" id="" class="form-control">
                        <?php } else { ?>
                            <input type="number" name="stocks" id="" value="<?php echo $data->stocks ?>" class="form-control">
                        <?php } ?>
                    </div>
                    <div class="form-group col-3">
                        <label for="">Price: </label>
                        <?php if (empty($id)) { ?>
                            <input type="number" step="0.01" name="price" id="" class="form-control">
                        <?php } else { ?>
                            <input type="number" step="0.01" name="price" id="" value="<?php echo $data->price ?>" class="form-control">
                        <?php } ?>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-12">
                        <label for="">Description: </label>
                        <?php if (empty($id)) { ?>
                            <textarea name="description" id="" cols="15" rows="3" class="form-control"></textarea>
                        <?php } else { ?>
                            <textarea name="description" id="" cols="15" rows="3" class="form-control"><?php echo $data->product_desc ?></textarea>
                        <?php } ?>
                    </div>
                </div>

                <input type="hidden" name="user_id" value="">
                <input type="hidden" name="id" value="<?php echo $id?>">

                <?php if (empty($id)) { ?>
                    <input type="hidden" name="refnum" value="<?php echo $refnum ?>">
                <?php } else { ?>
                    <input type="hidden" name="refnum" value="<?php echo $data->refnum ?>">
                <?php } ?>

                <button name="add_product" value="add_product" type="submit" class="btn btn-info">Save</button>
                <button name="cancel" value="product" type="submit" class="btn btn-secondary">Cancel</button>
            </div>
        </div>
    </div>
</form>