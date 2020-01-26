<?php
include("models/order.php");

$id = $_GET['id'];
$products = $OrderModel->get_products();
$customer = $OrderModel->get_single_customer($id);
$orders = $OrderModel->get_orders($id);
$count = 0;
$total = 0;
?>

<div class="container">
    <div class="card">
        <div class="card-header">
            <span>Cart</span>
        </div>

        <div class="card-body">
            <div class="row">
                <div class="col-6">
                    <div class="card">
                        <div class="card-header">
                            <span>Product List</span>
                        </div>
                        <div class="card-body">
                            <table class="table table-sm table-hover">
                                <thead class="thead-dark">
                                    <th width="5%"></th>
                                    <th width="10%">Name</th>
                                    <th width="10%">Price</th>
                                    <th width="10%" style="text-align: center">Quantity</th>
                                    <th width="15%"></th>
                                </thead>

                                <tbody>
                                    <?php while ($item = mysqli_fetch_object($products)) {
                                        $count++;
                                    ?>
                                        <form action="action.php" method="post">
                                            <tr>
                                                <th><?php echo $count ?></th>
                                                <td><?php echo $item->product_name ?></td>
                                                <td>$ <?php echo number_format($item->price, 2, '.', ','); ?></td>
                                                <td>
                                                    <input type="number" name="qty" id="" class="form-control col-12">
                                                </td>
                                                <td align="right">
                                                    <input type="hidden" name="customer_id" value="<?php echo $id ?>">
                                                    <input type="hidden" name="product_id" value="<?php echo $item->product_id ?>">
                                                    <input type="hidden" name="product_name" value="<?php echo $item->product_name ?>">
                                                    <input type="hidden" name="cost" value="<?php echo $item->price ?>">
                                                    <button class="btn btn-sm btn-primary" name="add_order" value="submit">
                                                        <img src="assets/icons/feathericons/shopping-cart.svg" title="View" alt="">
                                                        <span>Purchase</span>
                                                    </button>
                                                </td>
                                            </tr>
                                        </form>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="col-6">
                    <div class="card">
                        <div class="card-header">
                            <span><?php echo $customer->last_name . ", " . $customer->first_name ?></span>
                        </div>
                        <div class="card-body">
                            <table class="table table-hover table-borderless">
                                <thead>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                </thead>

                                <tbody>
                                    <?php while ($item = mysqli_fetch_object($orders)) {
                                        $total += $item->cost;
                                    ?>
                                        <tr>
                                            <td><?php echo $item->product_name ?></td>
                                            <td><?php echo $item->qty ?></td>
                                            <td><?php echo $item->cost ?></td>
                                            <td align="right">
                                                <form action="action.php" method="post">
                                                    <input type="hidden" name="order_id" value="<?php echo $item->order_id ?>">
                                                    <input type="hidden" name="customer_id" value="<?php echo $item->customer_id ?>">
                                                    <button class="btn btn-sm bg-transparent" name="remove_order" value="submit">
                                                        <img src="assets/icons/feathericons/x-circle.svg" alt="">
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                            <hr>
                            <?php if ($total > 0) { ?>
                                <div class="float-right">
                                    <span class="h4">Total: <strong>$ <?php echo number_format($total, 2, '.', ','); ?> </strong></span>
                                </div>
                                <form action="action.php" method="post">
                                    <input type="hidden" name="customer_id" value="<?php echo $id ?>">
                                    <input type="hidden" name="total" value="<?php echo $total ?>">
                                    <button class="btn btn-sm btn-primary" name="checkout" value="submit" type="submit">Checkout</button>
                                </form>

                                <div class="float-right">
                                    <input type="hidden" id="total" value="<?php echo $total ?>">
                                    <span>Cash: <input class="form-control" type="number" name="cash" id="cash" oninput="compute()"></span>
                                    <br>
                                    <span>Change: </span> <span class="h3 font-weight-bold float-right" id="change">$ </span>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mt-2">
                <div class="col-12">
                    <a href="?page=order">
                        <button class="btn btn-secondary float-right">Cancel</button>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    compute();
</script>