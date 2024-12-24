 @foreach($Loan_rows as $index=>$Loan_row)
<?php 
    $LoanRow = Helper::BusinessLoanDetails($Loan_row->loan_id)
?>
 <tr role="row">
    <td>{{@$LoanRow->account_no}} - {{$Loan_row->loan_id}}</td>
    <td>{{@$LoanRow->agent->name}}</td>
    <td>{{@$LoanRow->customer->name}}</td>
    <td>{{@$LoanRow->customer->mobile}}</td>
     <td>LOAN ACCOUNT</td>
     <td>{{@$Loan_row->total}}</td>
     <td>{{@$Loan_row->total_amount}}</td>
     <td>0</td>
     <td>{{@$Loan_row->total_amount}}</td>
    <td width="10%">
         <div class="d-flex gap-2">
            <div class="edit">
               <a class="btn btn-success btn-xs" href="{{route('admin.businessLoan.deposit',array('id' => $Loan_row->loan_id))}}">PAY</a>
                
               </a>
            </div>
        </div>

    </td>
</tr>

@endforeach 

@foreach($RD_rows as $index=>$RD_row)
<?php 
    $RDRow = Helper::RecurringDepositDetails($RD_row->recurring_deposit_id)
?>
 <tr role="row">
    <td>{{$RDRow->account_no}}</td>
    <td>{{$RDRow->agent->name}}</td>
    <td>{{$RDRow->customer->name}}</td>
    <td>{{$RDRow->customer->mobile}}</td>
     <td>SAVING ACCOUNT</td>
     <td>{{@$RD_row->total}}</td>
     <td>{{@$RD_row->total_amount}}</td>
     <td>0</td>
     <td>{{@$RD_row->total_amount}}</td>
    <td width="10%">
         <div class="d-flex gap-2">
            <div class="edit">
                 <a class="btn btn-success btn-xs" href="{{route('admin.recurringDeposit.deposit',array('id' => $RDRow->uuid))}}">PAY</a>
               </a>
            </div>
        </div>

    </td>
</tr>

@endforeach 



