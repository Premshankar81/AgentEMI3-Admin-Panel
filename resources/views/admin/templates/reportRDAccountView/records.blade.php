 @foreach($rows as $index=>$row)
 <?php 
     $statusClass = 'danger';
     if($row['status'] == 'approved') { 
        $statusClass = 'success'; 
     } 
 ?>
 <tr role="row">
    <td>{{@$row['account_no']}}</td>
    <td>{{Helper::getFromDate($row['application_date'])}}</td>
    <td>{{@$row['customer']['name']}}</td>
    <td>{{@$row['customer']['customer_code']}}</td>
    <td>{{@$row['customer']['mobile']}}</td>
    <td>{{@$row['agent']['name']}}</td>

    <td>{{@$row['RDscheme']['interest_rate']}}</td>
    <td>{{@$row['available_balance']}}</td>
    <td>{{@$row['RDscheme']['name']}}</td>
    <td>{{@$row['rd_amount']}}</td>
    <td>{{@$row['maturity_amount']}}</td>
    <td>{{Helper::getFromDate($row['maturity_date'])}}</td>
    
    <td><small class="label label-{{$statusClass}}"><?= ucfirst($row['status']) ?></small></td>
   
</tr>

@endforeach 