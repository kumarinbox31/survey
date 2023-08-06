<?php

$html  = 'Record not found.';
$get = $this->response->get(['project_vendor_id'=>$project_vendor_id,'status'=>$status]);
    $result = $get->result();
    $html = "
            <table  class='table table-bordered'>
            <thead>
                <tr>
                    <th>#</th>
                    <th>IP</th>
                    <th>PID</th>
                    <th>Status</th>
                    <th>Timestamp</th>
                </tr>
            </thead>
            <tbody>";
        $i = 1;
        foreach($result as $row){
            $html .= "<tr>
                        <td>$i</td>
                        <td>$row->ip_address</td>
                        <td>$row->panlist_id</td>
                        <td>$row->status</td>
                        <td>$row->created_at</td>
                    </tr>";
        $i++;}

        $html .=   "</tbody>
            </table>
        ";
echo $html;