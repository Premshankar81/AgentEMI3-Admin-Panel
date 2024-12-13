 @foreach($rows as $index=>$row)
 <?php 
     $statusClass = 'danger';
     if($row['status'] == 'active') { 
        $statusClass = 'success'; 
     } 
 ?>
 <tr role="row">
    <td width="10%">{{$index +1}} </td>
    <td>{{Helper::getFromDate(@$row['voucher_date'])}}</td>
    <td>{{@$row['voucher_number']}}</td>
    <td>{{Helper::get_ledgersName(@$row['vouchersdebitledger']['debit_ledger_account_id'])}}</td>
    <td>{{@$row['total_debit']}}</td>
    
    <td>{{Helper::getFromDate($row['created_at'])}}</td>
    <td>
        <div class="d-flex gap-2">
            <div class="edit">
                <!--<button type="button" class="btn btn-success btn-sm" onClick="get_row({{$row['id']}})"><i class="fa fa-pencil"></i></button>-->
                 
            </div>
        </div>
    </td>
</tr>

@endforeach