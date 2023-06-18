

<div class="row">

    <div class="col-lg-12 stretch-card">
        <div class="card">
            <div class="card-header bg-primary text-white">
                <h4>Contacts</h4>
            </div>
            <div class="card-body bg-white">
                <div class="table-responsive">
                    <table class="table table-bordered table-contextual datatable stripe hover">
                        <thead class="thead-dark">
                            <tr>
                                <th> # </th>
                                <th> Company Name </th>
                                <th> Display Name </th>
                                <th> C-Type </th>
                                <th> Actions </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $i = 1;
                                foreach($result->result() as $row){
                                    echo "<tr class='table-info' id='row_$row->id'>
                                            <td> $i </td>
                                            <td> $row->company_name </td>
                                            <td> $row->display_name </td>
                                            <td> $row->c_type </td>
                                            <td> 
                                                <a class='btn btn-sm btn-danger deleteRow' data-table='db_contact' data-id='$row->id'><i class='mdi mdi-delete-forever'></i></a>
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