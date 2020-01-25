<?php
include("models/product.php");
$result_products = $ProductModel->get_products();

$count = 0;
?>

<div class="container">
    <div class="card">
        <div class="card-header">
            <span>Products</span>
        </div>
        <div class="card-body">
            <a href="?page=add-product">
                <button class="btn btn-primary float-right mb-1"><strong>+</strong> Add</button>
            </a>
            <table class="table table-sm table-responsive-sm table-hover">
                <thead class="thead-dark">
                    <th width="5%">#</th>
                    <th width="15%">Name</th>
                    <th width="15%">Category</th>
                    <th width="10%">Stocks</th>
                    <th width="10%">Price</th>
                    <th>Created</th>
                    <th width="25%"></th>
                </thead>

                <tbody class="">
                    <?php while ($item = mysqli_fetch_object($result_products)) {
                        $count++;
                        $category = $ProductModel->get_single_category($item->category);
                        $date = new DateTime($item->created);
                    ?>
                        <tr>
                            <td><?php echo $count ?></td>
                            <td><?php echo $item->product_name ?></td>
                            <td><?php echo $category->category_name ?></td>
                            <td><?php echo $item->stocks ?></td>
                            <td><strong>$ <?php echo $item->price ?></strong></td>
                            <td><?php echo $date->format('m/d/Y h:m:s a') ?></td>
                            <td align="right">
                                <form style="display: inline-block" action="?page=add-stock&id=<?php echo $item->product_id ?>" method="post">
                                    <button class="btn btn-sm btn-secondary" title='Restock' type='submit' name=''>
                                        <span style="font-size: 12pt">
                                            <strong>&plus;</strong> Add Stock
                                        </span>
                                    </button>
                                </form>
                                <form style="display: inline-block" action="?page=add-product&id=<?php echo $item->product_id ?>" method="post">
                                    <button class="btn btn-sm btn-success">
                                        <img src="assets/icons/feathericons/eye.svg" title="View" alt="">
                                    </button>
                                </form>
                                <form style="display: inline-block" action="?page=add-product&id=<?php echo $item->product_id ?>" method="post">
                                    <button class="btn btn-sm btn-primary">
                                        <img src="assets/icons/feathericons/edit.svg" title="Edit" alt="">
                                    </button>
                                </form>
                                <form style="display: inline-block" action="action.php" method="post">
                                    <input type="hidden" name="id" value="<?php echo $item->product_id ?>">
                                    <button class="btn btn-sm btn-danger" name="remove" value="product">
                                        <img src="assets/icons/feathericons/trash-2.svg" title="Delete" alt="">
                                    </button>
                                </form>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>