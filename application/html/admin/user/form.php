<?php
$type = $name = $username = $password = $status = '';
if (isset($row) && $row->num_rows()) {
    $row = (array) $row->row();
    extract($row);
}
?>
<div class="form-group col-md-6">
    <label>Type</label>
    <select name="type" class="form-control select2">
        <option value="sales" <?php echo $type == 'sales' ? 'selected' : '';?>>Sales</option>
        <option value="manager" <?php echo $type == 'manager' ? 'selected' : '';?>>Manager</option>
    </select>
    <?php echo form_error('type') ?>
</div>
<div class="form-group col-md-6">
    <label>Full Name </label>
    <input type="text" name="name" class="form-control bg-white text-dark" placeholder="Enter Name" value="<?php echo $name; ?>">
    <?php echo form_error('name') ?>
</div>
<div class="form-group col-md-6">
    <label>Username </label>
    <input type="text" name="username" class="form-control bg-white text-dark" placeholder="Enter Username" value="<?php echo $username; ?>">
    <?php echo form_error('username') ?>
</div>
<div class="form-group col-md-6">
    <label>Password </label>
    <input type="text" name="password" class="form-control bg-white text-dark" placeholder="Enter Password" value="<?php echo $password; ?>">
    <?php echo form_error('password') ?>
</div>
<div class="form-group col-md-6">
    <label>Status </label>
    <select class="form-control select2" name="status">
        <option value="1" <?php echo $status ? 'selected' : ''; ?>>Enable</option>
        <option value="0" <?php echo $status ? '' : 'selected'; ?>>Disable</option>
    </select>
    <?php echo form_error('status') ?>
</div>

<div class="form-group col-md-12 mt-3">
    <button type="submit" class="btn btn-primary mr-2">Submit</button>
</div>