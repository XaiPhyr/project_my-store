<?php
include("models/user.php");
$result_user = $UserModel->get_users();

$count = 0;
?>

<div class="container">
    <div class="card">
        <div class="card-header">
            <span>Users</span>
        </div>
        <div class="card-body">
            <a href="?page=add-user">
                <button class="btn btn-primary float-right mb-1"><strong>+</strong> Add</button>
            </a>
            <table class="table table-sm table-responsive-sm table-hover">
                <thead class="thead-dark">
                    <th width="5%">#</th>
                    <th width="25%">Name</th>
                    <th width="25%">Address</th>
                    <th width="15%">Contacts</th>
                    <th width="10%">Status</th>
                    <th width="15%"></th>
                </thead>

                <tbody class="tbody">
                    <?php while ($item = mysqli_fetch_object($result_user)) {
                        $count++;
                    ?>
                        <tr>
                            <td><?php echo $count ?></td>
                            <td><?php echo $item->last_name . ", " . $item->first_name ?></td>
                            <td><?php echo $item->address . ", " . $item->city ?></td>
                            <td><?php echo $item->area_code . " " . $item->number ?></td>
                            <td>
                                <?php switch ($item->status) {
                                    case 'Admin':
                                        echo '<div class="badge badge-pill badge-primary">' . $item->status . '</div>';
                                        break;
                                    default:
                                        echo '<div class="badge badge-pill badge-secondary">' . $item->status . '</div>';
                                        break;
                                } ?>
                            </td>
                            <td align="right">
                                <form style="display: inline-block" action="?page=add-user&id=<?php echo $item->user_id ?>" method="post">
                                    <button class="btn btn-sm btn-success" title="View">
                                        <img src="assets/icons/feathericons/eye.svg" title="Edit" alt="">
                                    </button>
                                </form>
                                <form style="display: inline-block" action="?page=add-user&id=<?php echo $item->user_id ?>" method="post">
                                    <button class="btn btn-sm btn-primary" title="Edit">
                                        <img src="assets/icons/feathericons/edit.svg" title="Edit" alt="">
                                    </button>
                                </form>
                                <form style="display: inline-block" action="" method="post">
                                    <button class="btn btn-sm btn-danger" title="Delete">
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