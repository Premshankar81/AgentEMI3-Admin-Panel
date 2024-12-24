@extends('admin.layouts.master-layout')

@section('styles')

@endsection

    @section('content')
        
        @if(Request::route()->getName() == 'admin.fixedDepositScheme.index') 
            @include('admin.templates.fixedDepositScheme.list')
        @endif

        @if(Request::route()->getName() == 'admin.fixedDepositScheme.create') 
            @include('admin.templates.fixedDepositScheme.add')
        @endif

        @if(Request::route()->getName() == 'admin.fixedDepositScheme.edit') 
            @include('admin.templates.fixedDepositScheme.update')
        @endif

        @if(Request::route()->getName() == 'admin.fixedDepositScheme.view') 
            @include('admin.templates.fixedDepositScheme.manage')
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
  var API_URL = "{{ route('admin.fixedDepositScheme.list') }}";
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
            scheme_code: "required",
            min_rd_amount: "required",
            rd_frequency: "required",
            name: "required"
        },
        messages: {
            scheme_code: {
                required: "Please enter code",
            },
            min_rd_amount: {
                required: "Please enter Min. RD Amount ",
            },
            rd_frequency: {
                required: "Please select RD Frequency ",
            },
            name: {
                required: "Please enter name ",
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
     var API_URL = "{{ route('admin.fixedDepositScheme.store') }}";

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
         var API_URL = "{{ route('admin.fixedDepositScheme.update') }}";
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
            var API_URL = "{{ route('admin.fixedDepositScheme.delete') }}";
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



$(document).on('click','#closebuttonimage',function() {
    $(this).closest("#penalty_rules_forimagerow").remove();
});
 
function addPenaltyRow()
{
    $('#items_ui').append('<tr class="item-row" id="penalty_rules_forimagerow">'+
         '<td><input class="form-control" name="number[]" readonly="readonly" type="text"></td>'+
         '<td><input class="form-control" id="from_days" name="from_days[]" type="text"></td>'+
         '<td><input class="form-control" id="to_days" name="to_days[]" type="text"></td>'+
         '<td>'+
            '<select class="form-control" id="calculation_type" name="calculation_type[]">'+
               '<option value="">Select Calculation type</option>'+
               '<option value="flat_amount">Flat Amount</option>'+
               '<option value="flat_amountper_day">Flat Amount Per Day</option>'+
               '<option value="interest_rate_annual">Interest Rate Annual</option>'+
               '<option value="interest_rate_flat">Interest Rate Flat</option>'+
            '</select>'+
         '</td>'+
         '<td><input class="form-control" id="parameter" name="parameter[]" type="text"></td>'+
         '<td valign="middle">'+
            '<a class="delete-row" id="closebuttonimage" href="javaScript:void(0)"><i class="fa fa-trash-o"></i></a>'+
         '</td>'+
      '</tr>');
}

</script>


@endsection