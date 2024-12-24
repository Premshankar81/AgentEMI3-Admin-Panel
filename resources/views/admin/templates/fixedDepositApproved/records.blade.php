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
    <td>
       <a class="btn btn-warning btn-xs" href="/BusinessLoan/PreSantionLetter/dcc7a319-7af7-473e-a932-bd01b6db696d"><i class="fa fa-print" aria-hidden="true"></i>&nbsp;Pre-Sanction</a>
    </td>
   <td class=" text-center">
         <a href="{{route('admin.fixedDeposit.manage',array('id' => $row['uuid']))}}">
          <button type="button" class="btn btn-default btn-sm"><i class="fa fa-eye"></i></button>
         </a>
   </td>
</tr>

@endforeach 