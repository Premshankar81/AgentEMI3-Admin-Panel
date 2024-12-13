@foreach($rows as $index=>$row)
 <tr role="row">
    <td>{{Helper::getFromDate($row['created_at'])}}</td>
    <td>{{$row['memberDetails']['customer_code']}}</td>
    <td>{{$row['memberDetails']['name']}}</td>
    <td>{{$row['lot_number']}}</td>
    <td>{{$row['share_range']}}</td>
    <td>{{$row['total_shares']}}</td>
    <td>{{$row['share_nominal_value']}}</td>
    <td>{{$row['total_shares_value']}}</td>
    <td>
        <div class="d-flex gap-2">
            <div class="edit">
                <a href="{{route('admin.allocate_share_certificates.edit',array('id' => $row['id']))}}">
                <button type="button" class="btn btn-success btn-sm"><i class="fa fa-pencil"></i></button>
               </a>
                <button type="button" class="btn btn-danger btn-sm" onClick="delete_row({{$row['id']}})"><i class="fa fa-trash"></i></button>
                 
            </div>
        </div>
    </td>
</tr>
@endforeach