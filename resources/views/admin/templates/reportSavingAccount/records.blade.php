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
    <td>{{@$row['agent']['agent_code']}}</td>
    <td>{{@$row['scheme']['interest_rate']}}</td>
    <td>{{@$row['available_balance']}}</td>
    <td>{{@$row['scheme']['name']}}</td>
    
    <td><small class="label label-{{$statusClass}}"><?= ucfirst($row['status']) ?></small></td>
   
</tr>

@endforeach 