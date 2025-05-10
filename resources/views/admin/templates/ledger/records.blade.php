 @foreach($rows as $index=>$row)
 <?php 
     $statusClass = 'danger';
     if($row['status'] == 'active') { 
        $statusClass = 'success'; 
     } 
 ?>
 <tr role="row">
    <td width="5%">{{$index +1}} </td>
    <td width="15%">{{$row['title']}}</td>
    <td>{{$row['ledgerGroup']['title']}}</td>
    <td>{{$row['opening_balanace']}}</td>
    <td>{{$row['closing_balance']}}</td>
    <td width="12%">{{$row['ledgerTpye']['title']}}</td>
    <td >{{$row['ledger_transaction_type']}}</td>

    <td>
        <small class="label label-{{$statusClass}}"><?= ucfirst($row['status']) ?></small></td>

    <td>
        <div class="d-flex gap-2">
            <div class="edit">
                <button type="button" class="btn btn-success btn-sm" onClick="get_row({{$row['id']}})"><i class="fa fa-pencil"></i></button>
                <button type="button" class="btn btn-danger btn-sm" onClick="delete_row({{$row['id']}})"><i class="fa fa-trash"></i></button>
                 
            </div>
        </div>
    </td>
</tr>

@endforeach