 @foreach($rows as $index=>$row)
 <?php 
     $statusClass = 'danger';
     if($row['status'] == 'active') { 
        $statusClass = 'success'; 
     } 
 ?>
 <tr >
    <td width="10%">{{$index +1}} </td>
    <td>{{$row['name']}}</td>
    <td>{{$row['email']}}</td>
    <td>{{$row['mobile']}}</td>
    <td>{{Helper::getFromDate($row['created_at'])}}</td>
    <td>
        <small class="label label-{{$statusClass}}"><?= ucfirst($row['status']) ?></small></td>
    <td>
        <div class="d-flex gap-2">
            <div class="edit">
                <button type="button" class="btn btn-success btn-sm" onClick="get_row({{$row['id']}})"><i class="fa fa-pencil"></i></button>
                <button type="button" class="btn btn-danger btn-sm" onClick="delete_row({{$row['id']}})"><i class="fa fa-trash"></i></button>
                 
            </div>
        </div>
    </td>
</tr>

@endforeach