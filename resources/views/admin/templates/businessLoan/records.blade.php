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
    <td>{{@$row['loan_amount_requested']}}</td>
    <td>{{@$row['Loanscheme']['name']}}</td>
    <td>{{@$row->agent->name}}</td>
    <td><small class="label label-{{$statusClass}}"><?= ucfirst($row['status']) ?></small></td>
    <td width="10%">
         <div class="d-flex gap-2">
            <div class="edit">
                @if(@$row['status'] == 'pending')
                <a href="{{route('admin.businessLoan.edit',array('id' => $row['uuid']))}}">
                <button type="button" class="btn btn-default btn-sm"><i class="fa fa-pencil"></i></button>
               </a>
               @else
               <a href="{{route('admin.businessLoan.manage',array('id' => $row['uuid']))}}">
                <button type="button" class="btn btn-default btn-sm"><i class="fa fa-eye"></i></button>
               </a>
               @endif

                
                <button type="button" class="btn btn-danger btn-sm" onClick="delete_row({{$row['id']}})"><i class="fa fa-trash"></i></button>
                 
            </div>
        </div>

    </td>
</tr>

@endforeach 
