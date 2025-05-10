 @foreach($rows as $index=>$row)
<?php 
    $Loan_Row = Helper::BusinessLoanDetails($row->loan_id)
?>
 <tr role="row">
    <td>{{@$Loan_Row->account_no}} - {{$row->loan_id}}</td>
    <td>{{@$Loan_Row->agent->name}}</td>
    <td>{{@$Loan_Row->customer->name}}</td>
    <td>{{@$Loan_Row->customer->mobile}}</td>
     <td>LOAN ACCOUNT</td>
     <td>{{@$row->total}}</td>
     <td>{{@$row->total_amount}}</td>
     <td>0</td>
     <td>{{@$row->total_amount}}</td>
    <td width="10%">
         <div class="d-flex gap-2">
            <div class="edit">
               <a class="btn btn-success btn-xs" href="{{route('admin.businessLoan.deposit',array('id' => $row->loan_id))}}">PAY</a>
                
               </a>
            </div>
        </div>

    </td>
</tr>

@endforeach 

