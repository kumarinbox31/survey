<?php
$company_name = $display_name = $company_type_id = $contact_group_id =
    $person_name = $position = $email = $phone = $address = $country_id = $status = '';
if (isset($row) && $row->num_rows()) {
    $row = (array) $row->row();
    extract($row);
}
?>

<div class="form-group col-md-6">
    <label for="company_name" class="required text-black">Comapny Name</label>
    <input type="text" class="form-control bg-white text-dark 
              <?php echo form_error('company_name') ? 'is-invalid' : ''; ?>" id="company_name"
        placeholder="Company Name" name="company_name" value="<?= set_value('company_name', $company_name) ?>">
    <?php echo form_error('company_name') ?>
</div>
<div class="form-group col-md-6">
    <label for="display_name" class="text-black">Display Name</label>
    <input type="text" class="form-control bg-white text-dark" id="display_name" placeholder="Display Name"
        value="<?= set_value('display_name', $display_name) ?>" name="display_name">
</div>
<div class="form-group col-md-6">
    <label for="company_type_id" class="required text-black">Company type</label>
    <select class="form-control select2 <?php echo form_error('company_type_id') ? 'is-invalid' : ''; ?>"
        id="company_type_id" name="company_type_id">
        <?php
        $get = $this->CompanyType->get(['status' => '1']);
        foreach ($get->result() as $row) {
            $selected = $row->id == $company_type_id ? 'selected' : '';
            echo "<option value='$row->id' $selected>$row->name</option> ";
        }
        ?>
    </select>
    <?php echo form_error('company_type_id') ?>
</div>
<div class="form-group col-md-6">
    <label for="contact_group_id" class="required text-black">Contact Group</label>
    <select class="form-control select2" id="contact_group_id" name="contact_group_id">
        <?php
        $get = $this->ContactGroup->get(['status' => 1]);
        foreach ($get->result() as $row) {
            $selected = $row->id == $contact_group_id ? 'selected' : '';
            echo "<option value='$row->id' $selected>$row->name</option> ";
        }
        ?>
    </select>
    <?php echo form_error('contact_group_id') ?>
</div>
<div class="col-md-12">
    <u style="color:black;">
        <h3 class="text-black">Contact Details</h3>
    </u>
</div>
<div class="form-group col-md-6">
    <label for="person_name" class="required text-black">Person Name</label>
    <input type="text"
        class="form-control bg-white text-dark <?php echo form_error('person_name') ? 'is-invalid' : ''; ?>"
        id="person_name" placeholder="Person Name" name="person_name"
        value="<?php echo set_value('person_name', $person_name) ?>">
    <?php echo form_error('person_name') ?>
</div>
<div class="form-group col-md-6">
    <label for="position" class="required text-black">Title (Position)</label>
    <input type="text" class="form-control bg-white text-dark <?php echo form_error('position') ? 'is-invalid' : ''; ?>"
        id="position" placeholder="Title (Position)" name="position" value="<?php echo set_value('position',$position) ?>">
    <?php echo form_error('position') ?>
</div>
<div class="form-group col-md-6">
    <label for="email" class="required text-black">Email</label>
    <input type="text" class="form-control bg-white text-dark <?php echo form_error('email') ? 'is-invalid' : ''; ?>"
        name="email" id="email" placeholder="Email" value="<?php echo set_value('email', $email); ?>">
    <?php echo form_error('email') ?>
</div>
<div class="form-group col-md-6">
    <label for="phone" class="required text-black">Phone</label>
    <input type="text" class="form-control bg-white text-dark <?php echo form_error('phone') ? 'is-invalid' : ''; ?>"
        name="phone" id="phone" placeholder="Phone" value="<?php echo set_value('phone', $phone); ?>">
    <?php echo form_error('phone') ?>
</div>
<div class="form-group col-md-6">
    <label for="address" class="required text-black">Address</label>
    <textarea class="form-control bg-white text-dark <?php echo form_error('address') ? 'is-invalid' : ''; ?>"
        name="address" id="address" placeholder="Address"><?php echo set_value('address', $address) ?></textarea>
    <?php echo form_error('address') ?>
</div>
<div class="form-group col-md-6">
    <label for="country_id" class="required text-black">Country</label>
    <select class="form-control select2 " name="country_id" id="country_id">
        <?php
        $get = $this->country->get(['status' => 1]);
        foreach ($get->result() as $row) {
            echo "<option value='$row->id'>$row->name</option>";
        }
        ?>
    </select>
    <?php echo form_error('country_id') ?>
</div>
<div class="form-check col-md-12 form-check-flat form-check-primary">
    <input type="hidden" name="status" value="0">
    <label class="form-check-label">
        <input type="checkbox" class="form-check-input" name="status" value="1" <?php echo set_value('status', $status) == 1 ? 'checked' : ''; ?>> Active <i class="input-helper"></i>
    </label>
</div>
<div class="form-group col-md-12">
    <button type="submit" class="btn btn-primary mr-2">Submit</button>
    <button class="btn btn-dark">Cancel</button>
</div>