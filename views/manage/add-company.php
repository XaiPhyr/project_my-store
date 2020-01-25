<?php
include("models/company.php");

$id = $_GET['id'];
$status = $_GET['status'];
$data = $CompanyModel->get_single_company($id);
?>

<form action="action.php" method="post">
    <div class="container">
        <div class="card">
            <div class="card-header">
                <span>Add Company</span>
            </div>

            <div class="card-body">
                <legend>Information Detail</legend>
                <div class="row">
                    <div class="form-group col-6">
                        <label for="">Company Name</label>
                        <?php if (empty($id)) { ?>
                            <input type="text" name="company_name" id="" class="form-control">
                        <?php } else { ?>
                            <input type="text" name="company_name" value="<?php echo $data->company_name ?>" id="" class="form-control">
                        <?php } ?>
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
                    <input type="hidden" name="status" value="<?php echo $status ?>">
                    <button class="btn btn-primary" type="submit" name="add_company" value="submit">Save</button>
                    <button class="btn btn-secondary" type="submit" name="cancel" value="company">Cancel</button>
                </div>
            </div>
        </div>
    </div>
</form>