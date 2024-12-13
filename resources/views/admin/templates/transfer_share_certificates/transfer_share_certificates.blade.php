@extends('admin.layouts.master-layout')

@section('styles')

@endsection

    @section('content')
        
        @if(Request::route()->getName() == 'admin.transfer_share_certificates.index') 
            @include('admin.templates.transfer_share_certificates.list')
        @endif

        @if(Request::route()->getName() == 'admin.transfer_share_certificates.create') 
            @include('admin.templates.transfer_share_certificates.add')
        @endif

        @if(Request::route()->getName() == 'admin.customer.Transfer_ShareCertificates') 
            @include('admin.templates.transfer_share_certificates.TransferShareCertificates')
        @endif

        @if(Request::route()->getName() == 'admin.customer.Transfer_ShareCertificates_sh4') 
            @include('admin.templates.transfer_share_certificates.TransferShareCertificatesSH4')
        @endif


    @endsection

@section('scripts')

<script type="text/javascript">

selectPickerInitialize('member_id_from');
selectPickerInitialize('member_id');

$().ready(function() {

    $("#add_form").validate({
        rules: {
            member_id: "required",
            transfer_date: "required",
            face_value: "required"
        },
        messages: {
            member_id: {
                required: "Select Member",
            },
            transfer_date: {
                required: "Please Select Transfer_date Date ",
            },
            face_value: {
                required: "Please enter a Face value ",
            }
        },
         submitHandler: function(form) {
            add_row(form);
        }
    });
});

get_records()
function get_records()
{
  var API_URL = "{{ route('admin.transfer_share_certificates.list') }}";
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

function add_row(form)
{
     var formData = new FormData(form);
     var API_URL = "{{ route('admin.transfer_share_certificates.store') }}";

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
                    $('#add_form')[0].reset();
                    success_notification(data['msg'])
                    setTimeout(function() {
                        location.reload();
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

    function get_MemberIfno()
    {
       var member_id = $('#member_id').val();
       var API_URL = "{{ route('admin.get-member-details') }}";
          $.ajax({
              url: API_URL,
              type: 'POST',
              data: {'member_id': member_id,'_token': '{!! csrf_token() !!}'},
              async: false,
              dataType: 'json',
              success: function (response) {
                $('#MemberIfno_info').html(response['html']);
              },
              error: function (data) {
                  alert('server unavailable');
              }
          });
    }

    function get_MemberIfno_from()
    {
       var member_id = $('#member_id_from').val();
       var API_URL = "{{ route('admin.get-member-details') }}";
          $.ajax({
              url: API_URL,
              type: 'POST',
              data: {'member_id': member_id,'_token': '{!! csrf_token() !!}'},
              async: false,
              dataType: 'json',
              success: function (response) {
                $('#MemberIfno_info_from').html(response['html']);
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
         var API_URL = "{{ route('admin.transfer_share_certificates.update') }}";
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
                        get_records();
                   }else{
                        error_notification(data['msg'])
                   }

                },
                error: function (data) {
                    alert('server unavailable');
                }
            });
      }

      function delete_row(update_id) {

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
            var API_URL = "{{ route('admin.transfer_share_certificates.delete') }}";
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
                        get_records();
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



$(function() {
$('#no_of_share').keyup(function() {
    var no_of_share = $('#no_of_share').val();
    var face_value = $('#face_value').val();
    var total_consideration = parseFloat(no_of_share) * parseFloat(face_value);
    $('#total_consideration').val(total_consideration);
}); 
}); 
</script>


@endsection