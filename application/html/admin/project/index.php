<div class="row">

    <div class="col-lg-12 stretch-card">
        <div class="card">
            <div class="card-header bg-primary text-white">
                <h4>Projects
                    <a href="<?=base_url('back/project/add');?>" class="btn btn-success" style="float:right;">New Survey</a>
                </h4>
            </div>
            <div class="card-body bg-white text-dark">
                <div class="table-responsive">
                    <table class="table table-bordered table-contextual datatable stripe hover">
                        <thead class="thead-dark">
                            <tr>
                                <th> Survey Id </th>
                                <th> Projct Name </th>
                                <th>Client Name</th>
                                <th>Contact Name</th>
                                <th>Sales Name</th>
                                <th>Manage Name</th>
                                <th>Complete</th>
                                <th> Status </th>
                                <th> Actions </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $i = 1;
                                foreach($result->result() as $row){
                                    $client = $this->contact->get(['id'=>$row->client]);
                                    $client_name = '';
                                    if($client->num_rows()){
                                        $client = $client->row();
                                        $client_name = $client->display_name != '' ? $client->display_name : $client->company_name;
                                    }
                                    
                                    $contact = $this->contact->get(['id'=>$row->contact]);
                                    $contact_name = '';
                                    if($contact->num_rows()){
                                        $contact = $contact->row();
                                        $contact_name = $contact->display_name != '' ? $contact->display_name : $contact->company_name;
                                    }

                                    $sales = $this->contact->get(['id'=>$row->sales]);
                                    $sales_name = '';
                                    if($sales->num_rows()){
                                        $sales = $sales->row();
                                        $sales_name = $sales->display_name != '' ? $sales->display_name : $sales->company_name;
                                    }

                                    $manager = $this->contact->get(['id'=>$row->manager_name]);
                                    $manager_name = '';
                                    if($manager->num_rows()){
                                        $manager = $manager->row();
                                        $manager_name = $manager->display_name != '' ? $manager->display_name : $manager->company_name;
                                    }
                                    $status_color = $status_title = '';
                                    $status = $this->ProjectStatus->get(['id'=>$row->project_status_id]);
                                    if($status->num_rows()){
                                        $status = $status->row();
                                        $status_color = $status->color;
                                        $status_title = $status->title;
                                    }
                                    echo "<tr class='table-info' id='row_$row->id'>
                                            <td> $row->id </td>
                                            <td> $row->project_name </td>
                                            <td> $client_name </td>
                                            <td> $contact_name </td>
                                            <td> $sales_name </td>
                                            <td> $manager_name </td>
                                            <td>  </td>
                                            <td> <span class='badge badge-$status_color'>$status_title</span> </td>
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