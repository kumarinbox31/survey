<div class="card">
    <div class="card-header bg-warning text-white">
        <h5>
            Add Project Vendor
            <a href="<?php echo base_url('back/project/edit/').$project->id; ?>" class="pull-right btn btn-sm btn-danger" style="float:right;">Back</a>
        </h5>
    </div>
    <style>
        .form-control,
        .form-control:active,
        .form-control:hover {
            background: white;
            color: black;
        }

        .required:after {
            content: ' *';
            color: red;
        }
    </style>

    <div class="card-body">
        <div class="container px-5 my-5">
            <form id="contactForm" method="POST" action="" class="row">
                <input type="hidden" name="project_id" value="<?php echo $project->id ?>" required>
                <div class="mb-3 col-md-6">
                    <label class="form-label required" for="vendor">Vendor</label>
                    <select name="vendor" id="vendor" class="form-control select2 bg-white text-black" required>
                        <?php
                        $get = $this->db->query("SELECT * FROM `db_contact` WHERE company_type_id LIKE '" . '%"2"%' . "' ");
                        foreach ($get->result() as $key => $row) {
                            echo "<option value='$row->id'>$row->display_name</option>";
                        }
                        ?>
                    </select>
                </div>
                <div class="mb-3 col-md-6">
                    <label class="form-label" for="vendor_contact">Vendor Contact</label>
                    <select name="vendor_contact" id="vendor_contact" class="form-control select2 bg-white text-black">
                        <?php
                        $get = $this->db->query("SELECT * FROM `db_contact` WHERE company_type_id LIKE '" . '%"2"%' . "' ");
                        foreach ($get->result() as $key => $row) {
                            echo "<option value='$row->id'>$row->display_name</option>";
                        }
                        ?>
                    </select>
                </div>
                <div class="mb-3 col-md-6">
                    <label class="form-label required" for="cpc_cpi">CPC/CPI</label>
                    <input class="form-control" id="cpc_cpi" type="number" name="cpc_cpi" required />
                </div>
                <div class="mb-3 col-md-6">
                    <label class="form-label required" for="reg">Reg.</label>
                    <input class="form-control" id="reg" type="text" name="req_complete" required />
                </div>
                <div class="mb-3 col-md-12">
                    <label class="form-label" for="surveyRedirects">Survey redirects:</label>
                    <textarea class="form-control" placeholder="Complete" id="note" name="complete_link"></textarea>
                </div>
                <div class="mb-3 col-md-12">
                    <!-- <label class="form-label" for="surveyRedirects">Survey redirects</label> -->
                    <textarea class="form-control" placeholder="Testminate" id="note" name="terminate_link"></textarea>
                </div>
                <div class="mb-3 col-md-12">
                    <!-- <label class="form-label" for="surveyRedirects">Survey redirects</label> -->
                    <textarea class="form-control" placeholder="Quotaful" id="note" name="quota_full_link"></textarea>
                </div>
                <div class="form-floating mb-3 col-md-3">
                    <label for="status">Status</label><br>
                    <select class="form-control select2" id="status" aria-label="status" name="status">
                        <option value="test">test</option>
                    </select>
                </div>
                <div class="mb-3 col-md-9">
                    <label class="form-label" for="note">Note:</label>
                    <textarea class="form-control" id="surveyRedirects" type="text" rows="4" name="note"></textarea>
                </div>

                <div class="d-grid" style="margin-left: 400px;">
                    <button class="btn btn-primary btn-lg" id="submitButton" type="submit">Submit</button>
                    <a href="" class="btn btn-danger btn-lg" id="submitCancel" type="submit">Cancel</a>
                </div>
            </form>
        </div>

    </div>
</div>