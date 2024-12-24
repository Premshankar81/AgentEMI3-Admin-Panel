@foreach($rows as $index=>$row)
 <tr role="row">
    <td>{{Helper::getFromDate($row['created_at'])}}</td>
    <td>{{$row['memberDetails']['customer_code']}}</td>
    <td>{{$row['memberDetails']['name']}}</td>
    <td>{{$row['lot_number']}}</td>
    <td>{{$row['share_range']}}</td>
    <td>{{$row['no_of_share']}}</td>
    <td>{{$row['face_value']}}</td>
    <td>{{$row['total_consideration']}}</td>
    <td>{{$row['memberFromDetails']['name']}}</td>
    <td>
          <a target="_blank" class="btn btn-default btn-xs" href="{{route('admin.customer.Transfer_ShareCertificates',array('id' => $row['id']))}}"><i class="fa fa-print" aria-hidden="true"></i>&nbsp;SH-1</a>
      </td>
    <td>
          <a target="_blank" class="btn btn-default btn-xs" href="{{route('admin.customer.Transfer_ShareCertificates_sh4',array('id' => $row['id']))}}"><i class="fa fa-print" aria-hidden="true"></i>&nbsp;SH-4</a>
      </td>
    <td>
        <div class="d-flex gap-2">
            <div class="edit">
                <button type="button" class="btn btn-danger btn-sm" onClick="delete_row({{$row['id']}})"><i class="fa fa-trash"></i></button>
                 
            </div>
        </div>
    </td>
</tr>
@endforeach