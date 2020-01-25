<?php
include("models/customer.php");
$result_customers = $CustomerModel->get_customers();

$count = 0;
?>

<div class="container">
    <div class="card">
        <div class="card-header">
            <span>Customer</span>
        </div>
        <div class="card-body">
            <a href="?page=add-customer&status=customer">
                <button class="btn btn-primary float-right mb-1"><strong>+</strong> Add</button>
            </a>
            <table class="table table-sm table-responsive-sm table-hover">
                <thead class="thead-dark">
                    <th width="5%">#</th>
                    <th width="15%">Name</th>
                    <th>Address</th>
                    <th width="15%">Contacts</th>
                    <th width="20%">Created</th>
                    <th width=""></th>
                </thead>

                <tbody class="">
                    <?php while ($item = mysqli_fetch_object($result_customers)) {
                        $count++;
                        $date = new DateTime($item->created);
                    ?>
                        <tr>
                            <td><?php echo $count ?></td>
                            <td><?php echo $item->last_name . ", " . $item->first_name ?></td>
                            <td><?php echo $item->address . ", " . $item->city ?><br><?php echo $item->country ?></td>
                            <td><?php echo $item->area_code . " " . $item->number ?></td>
                            <td><?php echo $date->format('m/d/Y h:m:s a') ?></td>
                            <td align="right">
                                <form style="display: inline-block" action="?page=add-customer&id=<?php echo $item->customer_id ?>&status=customer" method="post">
                                    <button class="btn btn-sm btn-success">
                                        <img src="assets/icons/feathericons/eye.svg" title="View" alt="">
                                    </button>
                                </form>
                                <form style="display: inline-block" action="?page=add-customer&id=<?php echo $item->customer_id ?>&status=customer" method="post">
                                    <button class="btn btn-sm btn-primary">
                                        <img src="assets/icons/feathericons/edit.svg" title="Edit" alt="">
                                    </button>
                                </form>
                                <form style="display: inline-block" action="" method="post">
                                    <button class="btn btn-sm btn-danger">
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