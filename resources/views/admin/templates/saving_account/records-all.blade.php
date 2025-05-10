 @foreach($rows as $index=>$row)
 <?php 
     $statusClass = 'danger';
     if($row['status'] == 'approved') { 
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
               
               <a href="{{route('admin.saving_account.manage',array('id' => $row['uuid']))}}">
                <button type="button" class="btn btn-default btn-sm"><i class="fa fa-eye"></i></button>
               </a>
                 
            </div>
        </div>

    </td>
</tr>

@endforeach 