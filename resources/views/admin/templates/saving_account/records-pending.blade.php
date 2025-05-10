 @foreach($rows as $index=>$row)
 <?php 
     $statusClass = 'danger';
     if($row['status'] == 'active') { 
        $statusClass = 'success'; 
     } 
 ?>
 <tr role="row">
    <td>{{@$row['application_mo']}}</td>
    <td>{{Helper::getFromDate($row['application_date'])}}</td>
    <td>{{@$row['customer']['name']}}</td>
    <td>{{@$row['customer']['customer_code']}}</td>
    <td>{{@$row['scheme']['name']}}</td>
    
   
    <td><small class="label label-{{$statusClass}}"><?= ucfirst($row['status']) ?></small></td>
    <td width="10%">
         <div class="d-flex gap-2">
            <div class="edit">
               
               <a class="btn btn-success btn-xs" href="{{route('admin.saving_account.approve-manage',array('id' => $row['uuid']))}}"><i class="fa fa-check" aria-hidden="true"></i>Approve
               </a>
                 
            </div>
        </div>

    </td>
</tr>

@endforeach 