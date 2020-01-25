<?php
include("models/user.php");

$id = $_GET['id'];
$data = $UserModel->get_single_user($id);
?>

<form action="action.php" method="post">
    <div class="container">
        <div class="card">
            <div class="card-header">
                <span>Add Customer</span>
            </div>

            <div class="card-body">
                <legend>Account Detail</legend>
                <div class="row">
                    <div class="form-group col-3">
                        <label for="">Username</label>
                        <?php if (empty($id)) { ?>
                            <input type="text" name="username" id="" class="form-control">
                        <?php } else { ?>
                            <input type="text" name="username" id="" value="<?php echo $data->username ?>" class="form-control">
                        <?php } ?>
                    </div>
                    <?php if (empty($id)) { ?>
                        <div class="form-group col-3">
                            <label for="">Password</label>
                            <input type="password" name="password" id="" class="form-control">
                        </div>
                    <?php } ?>
                    <div class="form-group col-3">
                        <label for="">Email</label>
                        <?php if (empty($id)) { ?>
                            <input type="text" name="email" id="" class="form-control">
                        <?php } else { ?>
                            <input type="text" name="email" id="" value="<?php echo $data->email ?>" class="form-control">
                        <?php } ?>
                    </div>
                    <div class="form-group col-3">
                        <label for="">Status</label>
                        <select name="status" id="" class="form-control">
                            <option value="Admin">Admin</option>
                            <option value="User">User</option>
                        </select>
                    </div>
                </div>

                <legend>Information Detail</legend>
                <div class="row">
                    <div class="form-group col-4">
                        <label for="">Lastname</label>
                        <?php if (empty($id)) { ?>
                            <input type="text" name="lastname" id="" class="form-control">
                        <?php } else { ?>
                            <input type="text" name="lastname" value="<?php echo $data->last_name ?>" id="" class="form-control">
                        <?php } ?>
                    </div>
                    <div class="form-group col-4">
                        <label for="">Firstname</label>
                        <?php if (empty($id)) { ?>
                            <input type="text" name="firstname" id="" class="form-control">
                        <?php } else { ?>
                            <input type="text" name="firstname" value="<?php echo $data->first_name ?>" id="" class="form-control">
                        <?php } ?>
                    </div>
                    <div class="form-group col-4">
                        <label for="">Date of Birth</label>
                        <input type="date" name="dob" id="" class="form-control">
                    </div>
                </div>

                <legend>Address Detail</legend>
                <div class="row">
                    <div class="form-group col-4">
                        <label for="">Address</label>
                        <?php if (empty($id)) { ?>
                            <input type="text" name="address" id="" class="form-control">
                        <?php } else { ?>
                            <input type="text" name="address" value="<?php echo $data->address ?>" id="" class="form-control">
                        <?php } ?>
                    </div>
                    <div class="form-group col-3">
                        <label for="">City</label>
                        <?php if (empty($id)) { ?>
                            <input type="text" name="city" id="" class="form-control">
                        <?php } else { ?>
                            <input type="text" name="city" value="<?php echo $data->city ?>" id="" class="form-control">
                        <?php } ?>
                    </div>
                    <div class="form-group col-3">
                        <label for="">Country</label>
                        <?php if (empty($id)) { ?>
                            <input type="text" name="country" id="" class="form-control">
                        <?php } else { ?>
                            <input type="text" name="country" value="<?php echo $data->country ?>" id="" class="form-control">
                        <?php } ?>
                    </div>
                    <div class="form-group col-2">
                        <label for="">Postal</label>
                        <?php if (empty($id)) { ?>
                            <input type="number" name="postal" id="" class="form-control">
                        <?php } else { ?>
                            <input type="number" name="postal" value="<?php echo $data->postal ?>" id="" class="form-control">
                        <?php } ?>
                    </div>
                </div>

                <legend>Contact Detail</legend>
                <div class="row">
                    <div class="form-group col-3">
                        <label for="">Area Code</label>
                        <?php if (empty($id)) { ?>
                            <input type="number" name="area_code" id="" class="form-control">
                        <?php } else { ?>
                            <input type="number" name="area_code" value="<?php echo $data->area_code ?>" id="" class="form-control">
                        <?php } ?>
                    </div>
                    <div class="form-group col-5">
                        <label for="">Number</label>
                        <?php if (empty($id)) { ?>
                            <input type="number" name="number" id="" class="form-control">
                        <?php } else { ?>
                            <input type="number" name="number" value="<?php echo $data->number ?>" id="" class="form-control">
                        <?php } ?>
                    </div>
                </div>

                <div class="float-right">
                    <input type="hidden" name="id" value="<?php echo $id ?>">
                    <button class="btn btn-primary" type="submit" name="add_user" value="submit">Save</button>
                    <button class="btn btn-secondary" type="submit" name="cancel" value="user">Cancel</button>
                </div>
            </div>
        </div>
    </div>
</form>