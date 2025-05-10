 @foreach($rows as $index=>$row)
<?php 
    $RD_Row = Helper::RecurringDepositDetails($row->recurring_deposit_id)
?>
 <tr role="row">
    <td>{{$RD_Row->account_no}}</td>
    <td>{{$RD_Row->agent->name}}</td>
    <td>{{$RD_Row->customer->name}}</td>
    <td>{{$RD_Row->customer->mobile}}</td>
     <td>SAVING ACCOUNT</td>
     <td>{{@$row->total}}</td>
     <td>{{@$row->total_amount}}</td>
     <td>0</td>
     <td>{{@$row->total_amount}}</td>
    <td width="10%">
         <div class="d-flex gap-2">
            <div class="edit">
                
                 <a class="btn btn-success btn-xs" href="{{route('admin.recurringDeposit.deposit',array('id' => $RD_Row->uuid))}}">PAY</a>
               </a>
            </div>
        </div>

    </td>
</tr>

@endforeach 

