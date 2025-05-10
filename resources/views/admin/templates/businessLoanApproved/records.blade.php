 @foreach($rows as $index=>$row)
 <?php 
     $statusClass = 'danger';
     if($row['status'] == 'disburse') { 
        $statusClass = 'success'; 
     } 
 ?>
 <tr role="row">
    <td>{{@$row['application_mo']}}</td>
    <td>{{Helper::getFromDate($row['application_date'])}}</td>
    <td>{{@$row['customer']['name']}}</td>
    <td>{{@$row['customer']['customer_code']}}</td>
    <td>{{@$row['loan_amount_requested']}}</td>
    <td>{{@$row['Loanscheme']['name']}}</td>
    <td>{{@$row->agent->name}}</td>
   <td><small class="label label-{{$statusClass}}"><?= ucfirst($row['status']) ?></small></td>
   <td><a class="btn btn-warning btn-xs" href="{{route('admin.businessLoan.presantionLetter',array('id' => $row['uuid']))}}"><i class="fa fa-print" aria-hidden="true"></i>&nbsp;Pre-Sanction</a></td>
   <td class=" text-center">
      <a class="btn btn-success btn-xs" href="{{route('admin.businessLoan.disburse-manage',array('id' => $row['uuid']))}}"><i class="fa fa-check" aria-hidden="true"></i>&nbsp;Disburse</a>
   </td>
</tr>

@endforeach 