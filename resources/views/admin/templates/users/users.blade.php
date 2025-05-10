@extends('admin.layouts.master-layout')

@section('styles')

@endsection

    @section('content')
            
        @include('admin.templates.users.list')


        @include('admin.templates.users.add')
        @include('admin.templates.users.update')

    @endsection

@section('scripts')



<script type="text/javascript">

$().ready(function() {

    $("#add_form").validate({
        rules: {
            name: "required",
            email: "required",
            mobile: "required",
            password: "required",
            c_password: "required",
            password: {
                   required: true,
                    minlength: 5,
                },
                c_password: {
                    required: true,
                    minlength: 5,
                    equalTo: "#password"
                }


        },
        messages: {
            name: {
                required: "Please enter a name ",
            },
            email: {
                required: "Please enter a Email ID ",
            },
            mobile: {
                required: "Please enter a Mobile ",
            },
            password: {
                required: "Please enter a password ",
                minlength: "Please enter a min 6 char password ",
            },
            c_password: {
                required: "Please enter a confirm password ",
                minlength: "Please enter a min 6 char password ",
                minlength: "Password & confirm password not Match ",
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
  var API_URL = "{{ route('admin.users.list') }}";
    $.ajax({
     url: API_URL,
     method: 'post',
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
     //var form = $('#add_form')[0]; 
     var formData = new FormData(form);
     formData.append('user_image', $('input[type=file]')[0].files[0]);
     var API_URL = "{{ route('admin.users.store') }}";

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
                    $('#add_row_modal').modal('hide');

                    success_notification(data['msg'])
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

    function get_row(id)
    {
     var API_URL = "{{route('admin.users.get')}}";
        $.ajax({
            url: API_URL,
            type: 'POST',
           data: {'id': id,'_token': '{!! csrf_token() !!}'},
            async: false,
            dataType: 'json',
            success: function(data) 
            {
              if (data["status"] == 1){
                 $('#update_id').val(data["data"]["id"]);
                 $('#update_title').val(data["data"]["title"]);

                 $('#update_name').val(data["data"]["name"]);
                 $('#update_email').val(data["data"]["email"]);
                 $('#update_mobile').val(data["data"]["mobile"]);

                 $('#update_status').val(data["data"]["status"]);
                 $('#GetTypeCheckBox').html(data["html"]);

                if(data["data"]["image_url"] != null){
                    update_readURLImage(data["data"]["image_url"],'update_image_preview') 
                } 

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
         formData.append('update_image', $('input[type=file]')[0].files[0]);

         var API_URL = "{{ route('admin.users.update') }}";
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
        var API_URL = "{{ route('admin.users.delete') }}";
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
    
</script>


@endsection