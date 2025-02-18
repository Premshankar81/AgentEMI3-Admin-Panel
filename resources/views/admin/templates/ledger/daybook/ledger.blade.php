@extends('admin.layouts.master-layout')

@section('styles')

@endsection

    @section('content')
    @if(Request::route()->getName() =='admin.ledger.daybook.index' || Request::route()->getName() =='admin.ledger.daybook.update') 
    @include('admin.templates.ledger.daybook.list')
    @include('admin.templates.ledger.daybook.add')
    @include('admin.templates.ledger.daybook.update')
    @endif    
        
        @if(Request::route()->getName() =='admin.ledger.cashbook.index') 
        @include('admin.templates.ledger.cashbook.list')
        @endif
       
    @endsection

@section('scripts')

<script type="text/javascript">

selectPickerInitialize('type');
selectPickerInitialize('ledger_group');
selectPickerInitialize('ledger_transaction_type');



$().ready(function() {

    $("#add_form").validate({
        rules: {
            title: "required",
            ledger_group: "required",
            opening_balanace: "required",
            type: "required"
        },
        messages: {
            title: {
                required: "Please enter a title ",
            },
            ledger_group: {
                required: "Please enter a title ",
            },
            opening_balanace: {
                required: "Please enter a title ",
            },
            type: {
                required: "Please select type ",
            },
        },
         submitHandler: function(form) {
            add_row(form);
        }
    });
});

get_records()
function get_records()
{
  var API_URL = "{{ route('admin.ledger.list') }}";
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
     var API_URL = "{{ route('admin.ledger.daybook.store') }}";

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
     var API_URL = "{{route('admin.ledger.get')}}";
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
                 $('#update_ledger_group').val(data["data"]["ledger_group"]);
                 $('#update_opening_balanace').val(data["data"]["opening_balanace"]);
                 $('#update_ledger_transaction_type').val(data["data"]["ledger_transaction_type"]);
                 $('#update_type').val(data["data"]["type"]);
                 $('#update_status').val(data["data"]["status"]);
                 selectPickerInitialize('update_type');
                 selectPickerInitialize('update_ledger_group');
                 selectPickerInitialize('update_ledger_transaction_type');

                 



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
         var id = $('#update_form').data('id'); // Assuming the form has a data-id attribute with the ID

    // Construct the API URL dynamically with the ID
    var API_URL = "{{ route('admin.ledger.daybook.update', ':id') }}".replace(':id', id);
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
                        $('#updte_form')[0].reset();
                        $('#update_row_modal').modal('hide');
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
            var API_URL = "{{ route('admin.ledger.delete') }}";
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