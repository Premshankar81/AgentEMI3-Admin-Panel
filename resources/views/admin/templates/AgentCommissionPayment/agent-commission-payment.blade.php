@extends('admin.layouts.master-layout')

@section('styles')

@endsection

    @section('content')
            
        @include('admin.templates.AgentCommissionPayment.list')
        @include('admin.templates.AgentCommissionPayment.update')

    @endsection

@section('scripts')



<script type="text/javascript">


function get_records()
{
  var API_URL = "{{ route('admin.agent-commission-payment.list') }}";
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
    function get_row(id)
    {
     var API_URL = "{{route('admin.agent-commission-payment.get')}}";
        $.ajax({
            url: API_URL,
            type: 'POST',
            data: {'id': id,'_token': '{!! csrf_token() !!}'},
            async: false,
            dataType: 'json',
            success: function(data) 
            {
              if (data["status"] == 1){
                $('#update_id').val(id);
                 $('#transation_pending_ui').html(data["html_row"]);
                 $('#update_row_modal').modal("show");
               }
            },
            error: function (data) {
                alert('server unavailable');
            }
        });
    }

    function update_row()
     {
         var form = $('#update_form')[0]; // You need to use standard javascript object here
         var formData = new FormData(form);
         var API_URL = "{{ route('admin.agent-commission-payment.update') }}";
            $.ajax({
                url: API_URL,
                 type: 'POST',
                 data: formData,
                 async: false,
                 dataType: 'json',
                 contentType: false, // NEEDED, DON'T OMIT THIS (requires jQuery 1.6+)
                 processData: false, // NEEDED, DON'T OMIT THIS
                success: function (data)
                {
                    if (data["status"] == 1){
                        success_notification(data['msg'])
                        $('#update_row_modal').modal("hide");
                         location.reload();
                   }else{
                        error_notification(data['msg'])
                   }

                },
                error: function (data) {
                    alert('server unavailable');
                }
            });
      }
      
       function bulk_update_status(agent_id) {

      Swal.fire({
        title: "Are you sure?",
        text: "You won't be able to revert this!",
        icon: "warning",
        showCancelButton: !0,
        confirmButtonClass: "btn btn-primary w-xs me-2 mt-2",
        cancelButtonClass: "btn btn-danger w-xs mt-2",
        confirmButtonText: "Yes, Udpate it!",
        buttonsStyling: !1,
    }).then(function(t) {
        if(t.value == true){ 
            var API_URL = "{{ route('admin.agent-commission-payment.bulk') }}";
            $.ajax({
                type: "POST",
                url: API_URL,
                data: {'agent_id': agent_id,'_token': '{!! csrf_token() !!}'},
                dataType: 'json',
                success: function(data) {
                    if (data["status"] == 1){
                        Swal.fire({
                            title: "Udpate!",
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