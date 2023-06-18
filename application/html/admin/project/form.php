<?php
$project_name = $display_name = $company_type_id = $contact_group_id =
    $person_name = $position = $email = $phone = $address = $country_id = $status = '';
if (isset($row) && $row->num_rows()) {
    $row = (array) $row->row();
    extract($row);
}
?>

<div class="form-group col-md-6">
    <label for="project_name" class="required text-black">Project Name</label>
    <input type="text" class="form-control bg-white text-dark 
              <?php echo form_error('project_name') ? 'is-invalid' : ''; ?>" id="project_name"
        placeholder="Project Name" name="project_name" value="<?= set_value('project_name', $project_name) ?>">
    <?php echo form_error('project_name') ?>
</div>



<div class="form-group col-md-12">
    <button type="submit" class="btn btn-primary mr-2">Submit</button>
    <button class="btn btn-dark">Cancel</button>
</div>