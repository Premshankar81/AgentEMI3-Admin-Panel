 @foreach($rows as $index=>$row)
 <?php 
     $statusClass = 'danger';
     if($row['status'] == 'active') { 
        $statusClass = 'success'; 
     } 
 ?>
 <tr role="row">
   <td>{{$row['scheme_code']}}</td>
   <td>{{$row['name']}}</td>
   <td>{{$row['min_rd_amount']}}</td>
   <td>{{$row['rd_frequency']}}</td>
   <td>{{$row['interest_compounding']}}</td>
   <td>{{$row['interest_rate']}}</td>
   <td><small class="label label-{{$statusClass}}"><?= ucfirst($row['status']) ?></small></td>
    <td width="10%">
         <div class="d-flex gap-2">
            <div class="edit">
                  <a class="btn btn-default btn-xs" href="{{route('admin.recurringScheme.view',array('id' => $row['unique_code']))}}"><i class="fa fa-eye" aria-hidden="true"></i></a>
                <button type="button" class="btn btn-danger btn-sm" onClick="delete_row({{$row['id']}})"><i class="fa fa-trash"></i></button>
                 
            </div>
        </div>

    </td>
</tr>

@endforeach 
