<?php
$project_name = $project_status_id = $client = $contact = $sales =
    $manager_name = $no_of_complete = $ir = $loi = $cpi_cpc = $project_type = $country =
    $survey_link = '';
if (isset($row) && $row->num_rows()) {
    $row = (array) $row->row();
    extract($row);
}
?>
<div class="form-group col-md-6">
    <label for="project_id" class="required text-black">Project Id</label>
    <input type="text" class="form-control bg-white text-dark" id="project_id" placeholder="Project Name"
        value="<?php echo $this->project->getProjectId(); ?>" readonly>
</div>

<div class="form-group col-md-6">
    <label for="project_name" class="required text-black">Project Name</label>
    <input type="text" class="form-control bg-white text-dark 
              <?php echo form_error('project_name') ? 'is-invalid' : ''; ?>" id="project_name"
        placeholder="Project Name" name="project_name" value="<?= set_value('project_name', $project_name) ?>">
    <?php echo form_error('project_name') ?>
</div>
<div class="form-group col-md-6">
    <label for="project_status_id" class="required text-black">Project Status</label>
    <select id="project_status_id" name="project_status_id"
        class="form-control select2 <?php echo form_error('project_status_id') ? 'is-invalid' : ''; ?>">
        <?php
        $get = $this->ProjectStatus->get();
        foreach ($get->result() as $row) {
            echo '<option value="' . $row->id . '">' . $row->title . '</option>';
        }
        ?>
    </select>
    <?php echo form_error('project_status_id') ?>
</div>
<div class="col-md-12">
    <h4><u>Client</u></h4>
</div>
<div class="form-group col-md-6">
    <label for="client" class="required text-black">Client Name</label>
    <select id="client" name="client"
        class="form-control select2 <?php echo form_error('client') ? 'is-invalid' : ''; ?>">
        <?php
        $get = $this->contact->get(['status' => '1', 'contact_group_id' => '1']);
        foreach ($get->result() as $row) {
            echo '<option value="' . $row->id . '" >' . $row->display_name . '</option>';
        }
        ?>
    </select>
    <?php echo form_error('client') ?>
</div>
<div class="form-group col-md-6">
    <label for="contact" class="required text-black">Client Contact</label>
    <select id="contact" name="contact"
        class="form-control select2 <?php echo form_error('contact') ? 'is-invalid' : ''; ?>">
        <?php
        $get = $this->contact->get(['status' => '1', 'contact_group_id' => '1']);
        foreach ($get->result() as $row) {
            echo '<option value="' . $row->id . '" >' . $row->display_name . '</option>';
        }
        ?>
    </select>
    <?php echo form_error('contact') ?>
</div>
<div class="col-md-12">
    <h4><u>Internal</u></h4>
</div>
<div class="form-group col-md-6">
    <label for="sales" class="required text-black">Sales Name</label>
    <select id="sales" name="sales" class="form-control select2 <?php echo form_error('sales') ? 'is-invalid' : ''; ?>">
        <?php
        $get = $this->login->get(['type' => 'sales', 'status' => '1']);
        foreach ($get->result() as $row) {
            echo '<option value="' . $row->id . '">' . $row->name . '</option>';
        }
        ?>
    </select>
    <?php echo form_error('sales') ?>
</div>
<div class="form-group col-md-6">
    <label for="manager_name" class="required text-black">Manager Name</label>
    <select id="manager_name" name="manager_name"
        class="form-control select2 <?php echo form_error('manager_name') ? 'is-invalid' : ''; ?>">
        <?php
        $get = $this->login->get(['type' => 'manager', 'status' => '1']);
        foreach ($get->result() as $row) {
            $selected = $sales == $row->id ? 'selected' : '';
            echo '<option value="' . $row->id . '" ' . $selected . '>' . $row->name . '</option>';
        }
        ?>
    </select>
    <?php echo form_error('manager_name') ?>
</div>
<div class="col-md-12">
    <hr style="border:1px solid">
    <h4>Details</h4>
</div>
<div class="col-md-4">
    <label class="required">No. of Completes</label>
    <input type="number" min="0" name="no_of_complete" class="form-control bg-white text-dark" required
        value="<?php echo set_value('no_of_complete', $no_of_complete) ?>">
    <?php echo form_error('no_of_complete') ?>
</div>
<div class="col-md-4">
    <label class="required">IR</label>
    <input type="number" name="ir" class="form-control bg-white text-dark" required
        value="<?php echo set_value('ir', $ir); ?>">
    <?php echo form_error('ir'); ?>
</div>
<div class="col-md-4">
    <label class="required">LOI</label>
    <input type="number" name="loi" class="form-control bg-white text-dark" required
        value="<?php echo set_value('loi', $loi); ?>">
    <?php echo form_error('loi') ?>
</div>
<div class="col-md-4">
    <label class="required">Country</label>
    <select class="form-control select2 " name="country" id="country">
        <?php
        $get = $this->country->get(['status' => 1]);
        foreach ($get->result() as $row) {
            echo "<option value='$row->id'>$row->name</option>";
        }
        ?>
    </select>
    <?php echo form_error('country'); ?>
</div>
<div class="col-md-4">
    <label class="required">CPI/CPC</label>
    <input type="text" name="cpi_cpc" value="<?php echo set_value('cpi_cpc', $cpi_cpc); ?>"
        class="form-control bg-white text-dark" required>
    <?php echo form_error('cpi_cpc'); ?>
</div>
<div class="col-md-4">
    <label class="required">Project Type</label>
    <input type="text" name="project_type" value="<?php echo set_value('project_type', $project_type); ?>"
        class="form-control bg-white text-dark" required>
    <?php echo form_error('project_type') ?>
</div>
<div class="col-md-12">
    <hr style="border:1px solid">
</div>
<div class="col-md-12">
    <label>Survey Link</label>
    <textarea name="survey_link" class="form-control bg-white text-dark" id="" cols="10"
        rows="5"><?php echo set_value('survey_link', $survey_link); ?></textarea>
    <?php echo form_error('survey_link') ?>
    <p>Use <strong>http://braininfotech.com/test-survey?id={{RESP_ID}}</strong> link for testing survey</p>
</div>
<div class="col-md-12 from-group">
    <label>Hand Quotes</label>
    <textarea name="quoates" class="form-control bg-white text-dark" rows="10"></textarea>
</div>
<!-- <div class="col-md-12 form-group mt-3">
    <label>Unique Links (CSV FILE)</label>
    <input type="file" name="unique_links" class="form-control bg-white text-dark" accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel">
</div>
<div class="col-md-12 form-group">
    <label>Keys (CSV FILE) </label>
    <input type="file" name="keys" class="form-control bg-white text-dark" accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel">
</div> -->

<div class="form-group col-md-12 mt-3">
    <button type="submit" class="btn btn-primary mr-2">Submit</button>
</div>