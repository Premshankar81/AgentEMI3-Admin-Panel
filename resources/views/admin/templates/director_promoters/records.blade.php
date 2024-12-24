 @foreach($rows as $index=>$row)
 <?php 
     $statusClass = 'danger';
     if($row['status'] == 'active') { 
        $statusClass = 'success'; 
     } 
 ?>
 <tr role="row">
   <td>
      <a href="{{route('admin.director_promoters.view',array('id' => $row['customer_id']))}}">
         {{$row['customer_code']}}
      </a>
   </td>
   <td>{{$row['name']}}</td>
   <td>{{$row['folio_code']}}</td>
   <td>{{$row['din']}}</td>
   <td>{{$row['mobile']}}</td>
   <td>{{Helper::getFromDate($row['appointment_date'])}}</td>
   <td><?php if($row['is_director'] == 'yes') { echo "Yes"; }else{ echo "No"; } ?> </td>
   <td><?php if($row['is_promoters'] == 'yes') { echo "Yes"; }else{ echo "No"; }  ?> </td>
    

    <td><small class="label label-{{$statusClass}}"><?= ucfirst($row['status']) ?></small></td>
    
    <td width="10%">
         <div class="d-flex gap-2">
            <div class="edit">
                <a href="{{route('admin.director_promoters.edit',array('id' => $row['customer_id']))}}">
                <button type="button" class="btn btn-success btn-sm"><i class="fa fa-pencil"></i></button>
               </a>
                <button type="button" class="btn btn-danger btn-sm" onClick="delete_row({{$row['id']}})"><i class="fa fa-trash"></i></button>
                 
            </div>
        </div>

    </td>
</tr>

@endforeach 