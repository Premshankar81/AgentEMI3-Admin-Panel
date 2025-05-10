 @foreach($rows as $index=>$row)
 <?php 
     $statusClass = 'danger';
     if($row['status'] == 'active') { 
        $statusClass = 'success'; 
     } 
 ?>
 <tr role="row">
    <td>{{Helper::getFromDate($row['joining_date'])}}</td>
    <td>{{$row['name']}}</td>
    <td>{{$row['customer_code']}}</td>
    <td>{{$row['mobile']}}</td>
    <td>{{Helper::getFromDate($row['created_at'])}}</td>
    
    

    <td><small class="label label-{{$statusClass}}"><?= ucfirst($row['status']) ?></small></td>
    <td><a class="btn btn-default btn-xs" title="Add KYC details" href="{{ route('admin.customer.KYCManage',array('id' => $row['customer_id'])) }}"><i class="fa fa-file" aria-hidden="true"></i>&nbsp;KYC</a></td>
    
    <td width="10%">
         <div class="d-flex gap-2">
            <div class="edit">
                <a href="{{route('admin.customer.edit',array('id' => $row['customer_id']))}}">
                <button type="button" class="btn btn-success btn-sm"><i class="fa fa-eye"></i></button>
               </a>
                <button type="button" class="btn btn-danger btn-sm" onClick="delete_row({{$row['id']}})"><i class="fa fa-trash"></i></button>
                 
            </div>
        </div>

    </td>
    <td width="10%">
         <div class="d-flex gap-2">
            <div class="edit">
                <a href="{{route('admin.members.members-apporval',array('id' => $row['customer_id']))}}">
                <button type="button" class="btn btn-success btn-sm"><i class="fa fa-spinner"></i> Process</button>
               </a>
            </div>
        </div>

    </td>
</tr>

@endforeach 