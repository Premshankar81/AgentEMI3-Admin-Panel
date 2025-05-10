 @foreach($rows as $index=>$row)
 <?php 
     $statusClass = 'danger';
     if($row['status'] == 'active') { 
        $statusClass = 'success'; 
     } 
 ?>
 <tr role="row">
   <td>{{$row['agent_code']}}</td>
   <td>{{$row['name']}}</td>
   <td>{{@$row['city']['title']}}</td>
   <td>{{$row['pan']}}</td>
   <td>{{$row['mobile']}}</td>
   <td>Rank</td>
    <td width="15%">
         <div class="d-flex gap-2">
            <div class="edit">
                <a class="btn btn-default btn-xs" href="{{route('admin.agents.view',array('id' => $row['unique_code']))}}"><i class="fa fa-eye" aria-hidden="true"></i></a>
                <button type="button" class="btn btn-danger btn-sm" onClick="delete_row({{$row['id']}})"><i class="fa fa-trash"></i></button>
                
                <a target="_blank" class="btn btn-default btn-xs" href="{{route('admin.agent-commission-payment.index')}}?agentId={{ $row['id']}}"><i class="fa fa-inr" aria-hidden="true"></i>collection</a>
                 
            </div>
        </div>

    </td>
</tr>

@endforeach 