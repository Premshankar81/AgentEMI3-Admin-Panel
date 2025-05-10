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
    
    <?php if($row['tran_page_type'] == 'saving') { ?>
        <td>{{@$row['saving']['account_no']}}</td>
    <?php } else if($row['tran_page_type'] == 'loan') { ?>
            <td>{{@$row['loan_account']['account_no']}}</td>
    <?php } else if($row['tran_page_type'] == 'fixedDeposit') { ?>
            <td>{{@$row['fd_account']['account_no']}}</td>
    <?php } else if($row['tran_page_type'] == 'recurring') { ?>
            <td>{{@$row['rd_account']['account_no']}}</td>
    <?php }else{  ?>
            <td>-</td>
    <?php } ?>
    
    
    <td>{{@$row['tran_page_type']}}</td>
    <td>{{@$row['customer']['name']}}</td>
    <td>{{@$row['customer']['customer_code']}}</td>
    <td>{{@$row['createdBy']['name']}}</td>
    <td>{{Helper::getFromDate($row['transation_date'])}}</td>
    <td>{{$row['remarks']}}</td>
    <td><?= ucfirst($row['status']) ?></td>
    <td>{{$deposit}}</td>
    <td>{{$Withdrawal}}</td>
    <td>
        <button type="button" class="btn btn-danger btn-sm" onClick="transation_delete_row({{$row['id']}})"><i class="fa fa-trash"></i></button>
    </td>
    

</tr>
@endforeach

    <?php
        
    
        $total_debit_amount = 0;
        $total_credit_amount = 0;
        $opening_balance = $ledger_signle->opening_balanace;      
    ?>
    @foreach($TrialBalanaces as $key=>$TrialBalanace)
  
    <?php
    
        if($TrialBalanace->debit_ledger_account_id == $TrialBalanace->credit_ledger_account_id){ continue; }
        
        $debit_amount = '';
        $credit_amount = '';
        $Narration = '';
        
        if($ledger_signle->id != $TrialBalanace->debit_ledger_account_id){
            $debit_amount = $TrialBalanace->ledger_account_amount;
            $Narration = "By".$TrialBalanace->DebitledgerAccount->title;
            $total_debit_amount = $debit_amount;
        }
        if($ledger_signle->id != $TrialBalanace->credit_ledger_account_id){
            $credit_amount = $TrialBalanace->ledger_account_amount;
            $Narration = "To ".$TrialBalanace->CreditledgerAccount->title;
            $total_credit_amount = $credit_amount;
        }
    ?>

  <tr>
    <td>-</td>
    <td>-</td>
    <td>-</td>
    <td>-</td>
    <td>-</td>
    <td>-</td>
    
    
    <td>{{$Narration}}</td>
    <td>Completed</td>
    <td width="10%">{{$credit_amount}}</td>
    <td width="10%">{{$debit_amount}}</td>
  </tr>
  
@endforeach



















