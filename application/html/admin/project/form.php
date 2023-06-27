<?php
$project_id = $project_name = $display_name = $company_type_id = $contact_group_id =
    $person_name = $position = $email = $phone = $address = $country_id = $status = $project_status = '';
if (isset($row) && $row->num_rows()) {
    $row = (array) $row->row();
    extract($row);
}
?>
<div class="form-group col-md-6">
    <label for="project_id" class="required text-black">Project Id</label>
    <input type="text" class="form-control bg-white text-dark" id="project_id" placeholder="Project Name"
        name="project_id" value="<?php echo $this->project->getProjectId(); ?>" readonly>
</div>

<div class="form-group col-md-6">
    <label for="project_name" class="required text-black">Project Name</label>
    <input type="text" class="form-control bg-white text-dark 
              <?php echo form_error('project_name') ? 'is-invalid' : ''; ?>" id="project_name"
        placeholder="Project Name" name="project_name" value="<?= set_value('project_name', $project_name) ?>">
    <?php echo form_error('project_name') ?>
</div>
<div class="form-group col-md-6">
    <label for="project_status" class="required text-black">Project Status</label>
    <select id="project_status" name="project_status"
        class="form-control select2 <?php echo form_error('project_status') ? 'is-invalid' : ''; ?>">
        <?php
        $get = $this->ProjectStatus->get();
        foreach ($get->result() as $row) {
            echo '<option value="' . $row->id . '">' . $row->title . '</option>';
        }
        ?>
    </select>
    <?php echo form_error('project_status') ?>
</div>
<div class="col-md-12">
    <h4>Client</h4>
</div>
<div class="form-group col-md-6">
    <label for="client" class="required text-black">Client Name</label>
    <select id="client" name="client"
        class="form-control select2 <?php echo form_error('client') ? 'is-invalid' : ''; ?>">
        
    </select>
    <?php echo form_error('client') ?>
</div>
<div class="form-group col-md-6">
    <label for="contact" class="required text-black">Client Contact</label>
    <select id="contact" name="contact"
        class="form-control select2 <?php echo form_error('contact') ? 'is-invalid' : ''; ?>">
        
    </select>
    <?php echo form_error('contact') ?>
</div>
<div class="col-md-12">
    <h4>Internal</h4>
</div>
<div class="form-group col-md-6">
    <label for="sales" class="required text-black">Sales Name</label>
    <select id="sales" name="sales"
        class="form-control select2 <?php echo form_error('sales') ? 'is-invalid' : ''; ?>">
        
    </select>
    <?php echo form_error('sales') ?>
</div>
<div class="form-group col-md-6">
    <label for="manager_name" class="required text-black">Manager Name</label>
    <select id="manager_name" name="manager_name"
        class="form-control select2 <?php echo form_error('manager_name') ? 'is-invalid' : ''; ?>">
        
    </select>
    <?php echo form_error('manager_name') ?>
</div>


<div class="form-group col-md-12">
    <button type="submit" class="btn btn-primary mr-2">Submit</button>
</div>