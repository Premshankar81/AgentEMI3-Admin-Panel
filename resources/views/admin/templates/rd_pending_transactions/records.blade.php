 @foreach($rows as $index=>$row)
 <?php 
     $statusClass = 'danger';
     if($row['status'] == 'active') { 
        $statusClass = 'success'; 
     } 
     $Withdrawal = 0;
     $deposit = 0;
     if($row['type'] == 'withdrawal') { 
        $Withdrawal = $row['amount']; 
     } else{
        $deposit = $row['amount'];
     }

 ?>
 <tr role="row">
    <td width="10%">Recurring </td>
    <td>{{@$row['rd_account']['account_no']}}</td>
    <td>{{@$row['customer']['name']}}</td>
    <td>{{Helper::getFromDate($row['transation_date'])}}</td>
    <td>{{$deposit}}</td>
    <td>{{$Withdrawal}}</td>
    <td><?= ucfirst($row['payment_mode']) ?></td>
    <td>{{@$row['ledger']['title']}}</td>
    <td>
       <small class="label label-{{$statusClass}}"><?= ucfirst($row['status']) ?></small>
    </td>

    <td>
        <div class="d-flex gap-2">
            <div class="edit">
               
                <button type="button" class="btn btn-success btn-sm" onClick="get_row({{$row['id']}})"><i class="fa fa-eye"></i></button>
            </div>
        </div>
    </td>
</tr>

@endforeach