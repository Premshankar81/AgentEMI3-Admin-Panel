@extends('admin.layouts.master-layout')

@section('styles')

@endsection

    @section('content')
        
        @if(Request::route()->getName() == 'admin.pending-members.index-pending') 
            @include('admin.templates.pendingMembers.list')
        @endif

        @if(Request::route()->getName() == 'admin.members.members-apporval') 
            @include('admin.templates.pendingMembers.memberApproval')
        @endif
        

    @endsection

@section('scripts')

<script type="text/javascript">

get_records()
function get_records()
{
  var API_URL = "{{ route('admin.pending-members.list-pending') }}";
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

$().ready(function() {

    $("#MemberStatusForm").validate({
        rules: {
            memberstatus: "required"
        },
        messages: {
            memberstatus: {
                required: "Please select status ",
            }
        },
        submitHandler: function(form) {
            add_MemberStatusForm(form);
        }
    });

});

function add_MemberStatusForm(form)
{
     var formData = new FormData(form);
     var API_URL = "{{ route('admin.members-apporval-manager.update') }}";

        $.ajax({
            url: API_URL,
             type: 'POST',
             data: formData,
             async: false,
             dataType: 'json',
             contentType: false, 
             processData: false, 
             success: function (data)
             {
               if (data["status"] == 1){
                    $('#MemberStatusForm')[0].reset();
                    success_notification(data['msg'])
                    setTimeout(function() {
                        window.location.href = "{{ route('admin.pending-members.index-pending') }}";
                    },1000);
                    
                    
               }else{
                    error_notification(data['msg'])
               }
            },
            error: function (data) {
                alert('server unavailable');
            }
        });
  }



</script>


@endsection