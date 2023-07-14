<div class="row">

    <div class="col-lg-12 stretch-card">
        <div class="card">
            <div class="card-header bg-warning text-white">
                <h4>
                    Users
                    <a href="<?=base_url('back/user/add');?>" class="btn btn-success" style="float:right;">Add New Record</a>
                </h4>
            </div>
            <div class="card-body bg-white text-dark">
                <div class="table-responsive">
                    <table class="table table-bordered table-contextual datatable stripe hover">
                        <thead class="thead-dark">
                            <tr>
                                <th> # </th>
                                <th> Type </th>
                                <th> Name </th>
                                <th> Username </th>
                                <th> Password </th>
                                <th> Actions </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $i = 1;
                                foreach($result->result() as $row){
                                    echo "<tr class='table-info' id='row_$row->id'>
                                            <td> $i </td>
                                            <td> $row->type </td>
                                            <td> $row->name </td>
                                            <td> $row->username </td>
                                            <td> $row->password </td>
                                            <td> 
                                                <a class='btn btn-sm btn-warning' href='".base_url('back/user/edit/').$row->id."'><i class='mdi mdi-table-edit'></i></a>
                                                <a class='btn btn-sm btn-danger deleteRow' data-table='db_login' data-id='$row->id'><i class='mdi mdi-delete-forever'></i></a>
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