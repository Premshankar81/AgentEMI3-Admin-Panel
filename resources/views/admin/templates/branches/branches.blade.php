@extends('admin.layouts.master-layout')

@section('styles')

@endsection

    @section('content')
            
        @include('admin.templates.branches.list')


        @include('admin.templates.branches.add')
        @include('admin.templates.branches.update')

    @endsection

@section('scripts')



<script type="text/javascript">

selectPickerInitialize('country_id');
selectPickerInitialize('state_id');
selectPickerInitialize('city_id');

$().ready(function() {

    $("#add_form").validate({
        rules: {
            title: "required"
        },
        messages: {
            title: {
                required: "Please enter a title ",
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
  var API_URL = "{{ route('admin.branches.list') }}";
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

     //var form = $('#add_form')[0]; 
     var formData = new FormData(form);
     formData.append('category_image', $('input[type=file]')[0].files[0]);
     var API_URL = "{{ route('admin.branches.store') }}";

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
     var API_URL = "{{route('admin.branches.get')}}";
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

                 $('#update_country_id').val(data["data"]["country_id"]);

                 update_getStates_ByCountry(data["data"]["country_id"]);
                 update_getCity_ByState(data["data"]["state_id"]);
                 

                $('#update_state_id').val(data["data"]["state_id"]);
                $('#update_city_id').val(data["data"]["city_id"]);

                $('#update_branch_code').val(data["data"]["branch_code"]);    
                $('#update_pincode').val(data["data"]["pincode"]);    
                $('#update_tax_name').val(data["data"]["tax_name"]);    
                $('#update_tax_number').val(data["data"]["tax_number"]);    
                $('#update_cin').val(data["data"]["cin"]);    
                $('#update_website').val(data["data"]["website"]);    
                $('#update_currency_symbol').val(data["data"]["currency_symbol"]);    
                $('#update_time_zone').val(data["data"]["time_zone"]);    
                $('#update_opening_date').val(data["data"]["opening_date"]);    
                $('#update_address_first').val(data["data"]["address_first"]);    
                $('#update_address_second').val(data["data"]["address_second"]);    

                selectPickerInitialize('update_country_id');
                selectPickerInitialize('update_state_id');
                selectPickerInitialize('update_city_id');


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

         var API_URL = "{{ route('admin.branches.update') }}";
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
        var API_URL = "{{ route('admin.branches.delete') }}";
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
             selectPickerInitialize('state_id');
          },
          error: function (data) {
              alert('server unavailable');
          }
      });
}

function getCity_ByState()
{
   var state_id = $('#state_id').val();
   var API_URL = "{{ route('admin.get-city-fron-state') }}";
      $.ajax({
          url: API_URL,
          type: 'POST',
          data: {'state_id': state_id,'_token': '{!! csrf_token() !!}'},
          async: false,
          dataType: 'json',
          success: function (response) {
            $('#city_id').find('option:not(:first)').remove();
              $.each(response,function(index,data){
                 $('#city_id').append('<option value="'+data['id']+'">'+data['title']+'</option>');
             });
             selectPickerInitialize('city_id');
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
$('#update_state_id').change(function(){
     var update_state_id = $('#update_state_id').val();
     update_getCity_ByState(update_state_id);
});

function update_getCity_ByState(update_state_id)
{
    var API_URL = "<?php echo e(route('admin.get-city-fron-state')); ?>";
      $.ajax({
          url: API_URL,
          type: 'POST',
          data: {'state_id': update_state_id,'_token': '<?php echo csrf_token(); ?>'},
          async: false,
          dataType: 'json',
          success: function (response) {
            $('#update_city_id').find('option:not(:first)').remove();
              $.each(response,function(index,data){
                 $('#update_city_id').append('<option value="'+data['id']+'">'+data['title']+'</option>');
             });
             selectPickerInitialize('update_city_id');
          },
          error: function (data) {
              alert('server unavailable');
          }
      });
}
    
</script>


@endsection