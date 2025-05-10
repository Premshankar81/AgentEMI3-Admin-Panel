@extends('admin.layouts.master-layout')

@section('styles')

@endsection

    @section('content')
            
        @include('admin.templates.CollectionAccountWiseTran.list')
        
        <div class="modal fade" id="modal-daterange-reportsProfitnLoss">
<div class="modal-dialog modal-dialog-centered">
  <div class="modal-content">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
        <h4 class="modal-title"><i class="fa fa-calendar"></i>Cashbook Filter</h4>
    </div>

    <?php
        $startDate =  '';
        $EndDate =  '';
        $branche_id =  '';
        if(isset($_REQUEST['branche_id']) && $_REQUEST['branche_id'] != ''){
            $branche_id =  $_REQUEST['branche_id'];    
        }
        if(isset($_REQUEST['from_date']) && $_REQUEST['from_date'] != ''){
            $startDate =  $_REQUEST['from_date'];    
        }
        if(isset($_REQUEST['to_date']) && $_REQUEST['to_date'] != ''){
            $EndDate=  $_REQUEST['to_date'];    
        }
        
     ?>

    <form method="get" autocomplete="off" action="{{route('admin.CollectionActWiseTran.index',array('tran_type' => $_REQUEST['tran_type']))}}">
    <div class="modal-body">
        <div class="box-body">
            <div class="form-horizontal">
                
                <input type="hidden" name="tran_type" value="<?= $_REQUEST['tran_type'] ?>">
               
               @if(Auth::guard('admin')->user()->user_type == 'admin')
               <div class="col-md-12">
                    <div class="form-group">
                        <label class="col-sm-4 control-label">Branch </label> 
                        <div class="col-sm-7">
                            <select id="branche_id" name="branche_id" class="form-control"  onchange="get_MemberInfo()">
                                <option value="">Select Branches</option>
                                @foreach($branches as $key => $branche)
                                    <option <?php if($branche_id == $branche['id']){ echo "selected"; } ?> value="{{$branche['id']}}">{{$branche['name']}}</option>    
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div> 
                @endif
               
                <div class="col-md-12">
                    <div class="form-group">
                        <label class="col-sm-4 control-label">From Date </label>
                        <div class="col-sm-7">
                            <input class="form-control" id="from_date" name="from_date" type="date" value="{{@$startDate}}" >
                        </div>
                    </div>
                </div> 

                <div class="col-md-12">
                    <div class="form-group">
                        <label class="col-sm-4 control-label">To Date </label>
                        <div class="col-sm-7">
                            <input class="form-control"id="to_date" name="to_date" type="date" value="{{@$EndDate}}">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
      <input type="submit" value="Save" class="btn btn-primary"/>
    </div>
    </form>
  </div>
</div>
</div>

    @endsection

@section('scripts')



<script type="text/javascript">

selectPickerInitialize('branche_id');

//get_records()
function get_records()
{
  var API_URL = "{{ route('admin.cashbook.list') }}";
    $.ajax({
     url: API_URL,
     method: 'get',
     data: {},
     dataType: 'json',
     success: function(response)
     {
        $('#dataTables_table_init').DataTable().destroy();
        $('#TableRecordList').html(response["html"]);
        $('#dataTables_table_init').DataTable();
     }
  });
}

function transation_delete_row(update_id) {

      Swal.fire({
        title: "Are you sure?",
        text: "You won't be able to revert this!",
        icon: "warning",
        showCancelButton: !0,
        confirmButtonClass: "btn btn-primary w-xs me-2 mt-2",
        cancelButtonClass: "btn btn-danger w-xs mt-2",
        confirmButtonText: "Yes, delete it!",
        buttonsStyling: !1,
        }).then(function(t) {
        if(t.value == true){ 
            var API_URL = "{{ route('admin.fixedDeposit.transation-delete') }}";
            $.ajax({
                type: "POST",
                url: API_URL,
                data: {'update_id': update_id,'_token': '{!! csrf_token() !!}'},
                dataType: 'json',
                success: function(data) {
                if (data["status"] == 1){
                    Swal.fire({
                        title: "Deleted!",
                        text: "Your file has been deleted.",
                        icon: "success",
                        confirmButtonClass: "btn btn-primary w-xs mt-2",
                        buttonsStyling: !1
                    }).then(function() {
                        location.reload();
                    });
                }
                    
                },
                error: function() {
                    alert('error');
                }
            })
    }

})
            
}

   
   
</script>


@endsection