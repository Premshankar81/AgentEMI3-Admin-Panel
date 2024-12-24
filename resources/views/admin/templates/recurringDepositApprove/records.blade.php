 @foreach($rows as $index=>$row)
 <?php 
     $statusClass = 'danger';
     if($row['status'] == 'approved') { 
        $statusClass = 'success'; 
     } 
 ?>
 <tr role="row">
    <td>{{@$row['application_mo']}}</td>
    <td>{{Helper::getFromDate($row['application_date'])}}</td>
    <td>{{@$row['customer']['name']}}</td>
    <td>{{@$row['customer']['customer_code']}}</td>
    <td>{{@$row['RDscheme']['name']}}</td>
    <td></td>
    <td>{{@$row['rd_amount']}}</td>
    <td><small class="label label-{{$statusClass}}"><?= ucfirst($row['status']) ?></small></td>
      <td class=" text-center"><a class="btn btn-success btn-xs" href="{{route('admin.recurringDeposit.approve-manage',array('id' => $row['uuid']))}}"><i class="fa fa-check" aria-hidden="true"></i>&nbsp;Approve</a></td>
</tr>

@endforeach 