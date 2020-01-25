<?php
include("models/user.php");
$results = $UserModel->get_users();
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
                    <th>1</th>
                    <th>2</th>
                    <th>3</th>
                    <th>4</th>
                    <th>5</th>
                </thead>

                <tbody class="tbody">
                    <tr>
                        <td>1</td>
                        <td>2</td>
                        <td>3</td>
                        <td>4</td>
                        <td>
                            <button class="btn btn-sm btn-primary">
                                <img src="assets/icons/feathericons/edit.svg" title="Edit" alt="">
                            </button>
                            <button class="btn btn-sm btn-danger">
                                <img src="assets/icons/feathericons/trash-2.svg" title="Delete" alt="">
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>