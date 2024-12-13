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
    <td>{{$row['interest_payout']}}</td>
    <td>{{$row['interest_rate']}}</td>
    <td><a class="btn btn-default btn-xs" href="/AccountScheme/Manage/bc58918d-cdc5-4ac1-b6c2-6487751b4adc"><i class="fa fa-gears" aria-hidden="true"></i>&nbsp; Commission Chart</a></td>
    <td><small class="label label-{{$statusClass}}"><?= ucfirst($row['status']) ?></small></td>
    <td width="10%">
         <div class="d-flex gap-2">
            <div class="edit">
                <a href="{{route('admin.scheme.edit',array('id' => $row['uuid']))}}">
                <button type="button" class="btn btn-default btn-sm"><i class="fa fa-eye"></i></button>
               </a>
                
                <a href="{{route('admin.scheme.edit',array('id' => $row['uuid']))}}">
                <button type="button" class="btn btn-success btn-sm"><i class="fa fa-pencil"></i></button>
               </a>
                <button type="button" class="btn btn-danger btn-sm" onClick="delete_row({{$row['id']}})"><i class="fa fa-trash"></i></button>
                 
            </div>
        </div>

    </td>
</tr>

@endforeach 