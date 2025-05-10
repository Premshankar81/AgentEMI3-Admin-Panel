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
    <td>{{@$row['FDscheme']['name']}}</td>
    <td>{{@$row->agent->name}}</td>
    <td>{{@$row['fd_amount']}}</td>
    <td><small class="label label-{{$statusClass}}"><?= ucfirst($row['status']) ?></small></td>
      <td class=" text-center"><a class="btn btn-success btn-xs" href="{{route('admin.fixedDeposit.approve-manage',array('id' => $row['uuid']))}}"><i class="fa fa-check" aria-hidden="true"></i>&nbsp;Approve</a></td>
</tr>

@endforeach 