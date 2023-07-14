<div class="col-md-12 grid-margin stretch-card">
  <div class="card">
    <div class="card-header bg-success text-white">
      <h4>Add New Project
        <a href="<?= base_url('back/project'); ?>" class="btn btn-danger" style="float:right"><i
            class="mdi mdi-keyboard-backspace"></i>
          Back</a>
      </h4>
    </div>
    <div class="card-body bg-white text-dark">
      <form class="row" method="post">
        <input type="hidden" name="action" value="add">
        <?php include('form.php'); ?>
      </form>
    </div>
  </div>
</div>