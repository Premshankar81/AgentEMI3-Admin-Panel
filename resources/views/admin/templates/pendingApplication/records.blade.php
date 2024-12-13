 @foreach($Saving_rows as $index=>$row)
 <?php 
     $statusClass = 'danger';
     if($row['status'] == 'approved') { 
        $statusClass = 'success'; 
     } 
 ?>
 <tr role="row">
     <td>SAVING ACCOUNT</td>
    <td>{{@$row['application_mo']}}</td>
    <td>{{Helper::getFromDate(@$row['application_date'])}}</td>
    <td>{{@$row['customer']['name']}}</td>
    <td>{{@$row['customer']['customer_code']}}</td>
    <td>{{@$row['scheme']['name']}}</td>
    
   
    <td><small class="label label-{{$statusClass}}"><?= ucfirst($row['status']) ?></small></td>
    <td width="10%">
         <div class="d-flex gap-2">
            <div class="edit">
                 <a href="{{route('admin.saving_account.edit',array('id' => $row['uuid']))}}">
                <button type="button" class="btn btn-default btn-sm"><i class="fa fa-pencil"></i></button>
               </a>
            </div>
        </div>

    </td>
</tr>

@endforeach 


 @foreach($RD_rows as $index=>$RD_row)
 <?php 
     $statusClass = 'danger';
     if($RD_row['status'] == 'approved') { 
        $statusClass = 'success'; 
     } 
 ?>
 <tr role="row">
     <td>FD Account</td>
    <td>{{@$RD_row['application_mo']}}</td>
    <td>{{Helper::getFromDate($RD_row['application_date'])}}</td>
    <td>{{@$RD_row['customer']['name']}}</td>
    <td>{{@$RD_row['customer']['customer_code']}}</td>
    <td>{{@$RD_row['RDscheme']['name']}}</td>
    <td>{{@$RD_row['rd_amount']}}</td>
    <td><small class="label label-{{$statusClass}}"><?= ucfirst($RD_row['status']) ?></small></td>
    <td width="10%">
         <div class="d-flex gap-2">
            <div class="edit">
                <a href="{{route('admin.recurringDeposit.edit',array('id' => $RD_row['uuid']))}}">
                <button type="button" class="btn btn-default btn-sm"><i class="fa fa-pencil"></i></button>
               </a>
            </div>
        </div>

    </td>
</tr>

@endforeach 



