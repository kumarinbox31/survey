<div class="row">

    <div class="col-lg-12 stretch-card">
        <div class="card">
            <div class="card-header bg-primary text-white">
                <h4>Projects
                    <a href="<?=base_url('back/project/add');?>" class="btn btn-success" style="float:right;">Add New Record</a>
                </h4>
            </div>
            <div class="card-body bg-white text-dark">
                <div class="table-responsive">
                    <table class="table table-bordered table-contextual datatable stripe hover">
                        <thead class="thead-dark">
                            <tr>
                                <th> # </th>
                                <th> Projct Name </th>
                                <th> Status </th>
                                <th> Actions </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $i = 1;
                                foreach($result->result() as $row){
                                    echo "<tr class='table-info' id='row_$row->id'>
                                            <td> $i </td>
                                            <td> $row->project_name </td>
                                            <td> $row->project_status_id </td>
                                            <td> 
                                                <a class='btn btn-sm btn-warning' href='".base_url('back/project/edit/').$row->id."'><i class='mdi mdi-table-edit'></i></a>
                                                <a class='btn btn-sm btn-danger deleteRow' data-table='db_project' data-id='$row->id'><i class='mdi mdi-delete-forever'></i></a>

                                            </td>
                                        </tr>";
                                $i++;}
                            ?>
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</div>