@extends('admin.layouts.master-layout')

@section('styles')

@endsection

    @section('content')
        
        @if(Request::route()->getName() == 'admin.agents.index') 
            @include('admin.templates.agents.list')
        @endif

        @if(Request::route()->getName() == 'admin.agents.create') 
            @include('admin.templates.agents.add')
        @endif

        @if(Request::route()->getName() == 'admin.agents.view') 
            @include('admin.templates.agents.manage')
        @endif
        @if(Request::route()->getName() == 'admin.agents.edit') 
            @include('admin.templates.agents.update')
        @endif
        
        @if(Request::route()->getName() == 'admin.agents.IDCard') 
            @include('admin.templates.agents.IDCard')
        @endif

        @if(Request::route()->getName() == 'admin.agents.print') 
            @include('admin.templates.agents.printForm')
        @endif
        
        @if(Request::route()->getName() == 'admin.agents.UplineAgents') 
            @include('admin.templates.agents.UplineAgents')
        @endif
        @if(Request::route()->getName() == 'admin.agents.DownlineAgents') 
            @include('admin.templates.agents.Downline')
        @endif


    
        

    @endsection

@section('scripts')

<script type="text/javascript">

selectPickerInitialize('associate_customer_id');
selectPickerInitialize('state_id');
selectPickerInitialize('blood_group');


get_records()
function get_records()
{
  var API_URL = "{{ route('admin.agents.list') }}";
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

    $("#add_form").validate({
        rules: {
            agent_code: "required",
            associate_customer_id: "required",
            join_date: "required",
            gender: "required",
            name: "required",
            agent_rank: "required"
        },
        messages: {
            agent_code: {
                required: "Select Member",
            },
            associate_customer_id: {
                required: "Please Select Associate customer ",
            },
            join_date: {
                required: "Please select join date ",
            },
            gender: {
                required: "Please select join date ",
            },
            name: {
                required: "Please enter name ",
            },
            agent_rank: {
                required: "Please select agent rank ",
            }
        },
         submitHandler: function(form) {
            add_row(form);
        }
    });
});

function add_row(form)
{
     var formData = new FormData(form);
     var API_URL = "{{ route('admin.agents.store') }}";

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
               }else{
                    error_notification(data['msg'])
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
         var API_URL = "{{ route('admin.agents.update') }}";
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
            var API_URL = "{{ route('admin.agents.delete') }}";
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

function get_MemberInfo()
{
   var customer_id = $('#associate_customer_id').val();
   var API_URL = "{{ route('admin.get-member-spp-details') }}";
      $.ajax({
          url: API_URL,
          type: 'POST',
          data: {'customer_id': customer_id,'_token': '{!! csrf_token() !!}'},
          async: false,
          dataType: 'json',
          success: function (response) {
             if(response['status'] == 1){
                $('#state_id').val(response['rows']['state_id']);
             }

             
          },
          error: function (data) {
              alert('server unavailable');
          }
      });
}



</script>


@endsection