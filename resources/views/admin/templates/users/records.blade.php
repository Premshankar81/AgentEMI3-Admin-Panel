 @foreach($rows as $index=>$row)
 <?php 
     $statusClass = 'danger';
     if($row['status'] == 'active') { 
        $statusClass = 'success'; 
     } 
 ?>
 <tr>
    <td class="customer_name">{{$index +1}} </td>
    <td class="customer_name">{{$row['name']}}</td>
    <td class="customer_name">{{$row['email']}}</td>
    <td class="customer_name">{{$row['mobile']}}</td>
    <td class="date">{{Helper::getFromDate($row['created_at'])}}</td>
    <td class="status"><span class="badge badge-soft-{{$statusClass}} text-uppercase">{{$row['status']}}</span></td>
    <td width="10%">
        <div class="d-flex gap-2">
            <div class="edit">
                <button class="btn btn-soft-success" onClick="get_row({{$row['id']}})"><i class="ri-edit-2-line"></i></button>
            </div>
            <div class="remove">
                <button class="btn btn-soft-danger " onClick="delete_row({{$row['id']}})"  data-bs-toggle="modal" data-bs-target="#deleteRecordModal"><i class="ri-delete-bin-2-line"></i></button>
            </div>
        </div>
    </td>
</tr>

@endforeach