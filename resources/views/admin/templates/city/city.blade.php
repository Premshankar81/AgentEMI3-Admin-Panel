@extends('admin.layouts.master-layout')

@section('styles')

@endsection

    @section('content')
            
        @include('admin.templates.city.list')

        @include('admin.templates.city.add')
        @include('admin.templates.city.update')

    @endsection

@section('scripts')



<script type="text/javascript">

selectPickerInitialize('country_id');
selectPickerInitialize('state_id');

$().ready(function() {

    $("#add_form").validate({
        rules: {
            title: "required",
            country_id: "required",
            state_id: "required"
        },
        messages: {
            title: {
                required: "Please enter a title ",
            },
            country_id: {
                required: "Please select Country ",
            },
            state_id: {
                required: "Please select State ",
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
  var API_URL = "{{ route('admin.city.list') }}";
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
     var API_URL = "{{ route('admin.city.store') }}";

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
     var API_URL = "{{route('admin.city.get')}}";
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
                 
                 $('#update_country_id').val(data["data"]["country_id"]);
                 update_getStates_ByCountry(data["data"]["country_id"]);
                 $('#update_state_id').val(data["data"]["state_id"]);
                 
                 selectPickerInitialize('update_country_id');
                 selectPickerInitialize('update_state_id');

                 $('#update_status').val(data["data"]["status"]);
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
         var API_URL = "{{ route('admin.city.update') }}";
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
            var API_URL = "{{ route('admin.city.delete') }}";
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

function getStates_ByCountry()
{
   var country_id = $('#country_id').val();
   var API_URL = "{{ route('admin.get-state-fron-country') }}";
      $.ajax({
          url: API_URL,
          type: 'POST',
          data: {'country_id': country_id,'_token': '{!! csrf_token() !!}'},
          async: false,
          dataType: 'json',
          success: function (response) {
            $('#state_id').find('option:not(:first)').remove();
              $.each(response,function(index,data){
                 $('#state_id').append('<option value="'+data['id']+'">'+data['title']+'</option>');
             });
             $('.selectpicker').select2();
             selectPickerInitialize('state_id');
          },
          error: function (data) {
              alert('server unavailable');
          }
      });
}

$('#update_country_id').change(function(){
     var update_country_id = $('#update_country_id').val();
     update_getStates_ByCountry(update_country_id)
}); 

function update_getStates_ByCountry(update_country_id)
{
    var API_URL = "{{ route('admin.get-state-fron-country') }}";
    $.ajax({
        url: API_URL,
        type: 'POST',
        data: {'country_id': update_country_id,'_token': '{!! csrf_token() !!}'},
        async: false,
        dataType: 'json',
        success: function (response) {
          $('#update_state_id').find('option:not(:first)').remove();
            $.each(response,function(index,data){
               $('#update_state_id').append('<option value="'+data['id']+'">'+data['title']+'</option>');
           });
           selectPickerInitialize('update_state_id');
        },
        error: function (data) {
            alert('server unavailable');
        }
    });
}
    
</script>


@endsection