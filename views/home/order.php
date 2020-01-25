<?php
include("models/customer.php");
$result_customers = $CustomerModel->get_customers();

$count = 0;

if ($_POST['keyword']) {
    $CustomerModel->keyword = $_POST['keyword'];
    $result_customers = $CustomerModel->search_customer();
}
?>

<div class="container col-5">
    <div class="card">
        <div class="card-header">
            <span>Order</span>
        </div>
        <div class="card-body">
            <a href="?page=add-customer&status=order">
                <button class="btn btn-primary float-right mb-1"><strong>+</strong> Add</button>
            </a>

            <form action="" method="post">
                <div class="float-right mr-2">
                    <div class="input-group">
                        <input type="text" class="form-control" name="keyword" placeholder="Search">
                        <div class="input-group-append">
                            <button class="btn btn-outline-success" type="submit">
                                <img style="width: 20px; height: 20px" src="assets/icons/feathericons/search.svg" alt="">
                            </button>
                        </div>
                    </div>
                </div>
            </form>

            <table class="table table-sm table-responsive-sm table-hover">
                <thead class="thead-dark">
                    <th width="1%">#</th>
                    <th width="3%">Name</th>
                    <th width="5%">Address</th>
                    <th width="1%"></th>
                </thead>

                <tbody class="">
                    <?php while ($item = mysqli_fetch_object($result_customers)) {
                        $count++;
                    ?>
                        <tr>
                            <td><?php echo $count ?></td>
                            <td><?php echo $item->last_name . ", " . $item->first_name ?></td>
                            <td><?php echo $item->address . ", " . $item->city ?></td>
                            <td align="right">
                                <form style="display: inline-block" action="?page=cart&id=<?php echo $item->customer_id ?>" method="post">
                                    <button class="btn btn-sm btn-primary" title='Restock' type='submit' name=''>
                                        <img src="assets/icons/feathericons/shopping-cart.svg" title="View" alt="">
                                        <span style="font-size: 12pt">
                                            Proceed
                                        </span>
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