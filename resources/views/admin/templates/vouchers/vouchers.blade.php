@extends('admin.layouts.master-layout')

@section('styles')

@endsection

    @section('content')
            
        @include('admin.templates.vouchers.list')
        @include('admin.templates.vouchers.add')
        @include('admin.templates.vouchers.update')

    @endsection

@section('scripts')



<script type="text/javascript">

selectPickerInitialize_class('selectpicker');

$().ready(function() {

    $("#add_form").validate({
        rules: {
            voucher_number: "required",
            voucher_date: "required"
        },
        messages: {
            voucher_number: {
                required: "Please enter a title ",
            },
            voucher_date: {
                required: "Please enter a title ",
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
  var API_URL = "{{ route('admin.vouchers.list') }}";
    $.ajax({
     url: API_URL,
     method: 'get',
     data: {},
     dataType: 'json',
     success: function(response)
     {
        $('#dataTables_table_init').DataTable().destroy();
        $('#TableRecordList').html(response["html"]);
        
        $('#voucher_number').val(response["voucher_no"]);
        $('#unique_number').val(response["unique_no"]);
        
        
        

        $('#dataTables_table_init').DataTable();
     }
  });
}

function add_row(form)
{
    
    //
    //
    var credit_sum = 0;
    $('.credit_amount_class').each(function(){
        credit_sum += parseFloat(this.value);  // Or this.innerHTML, this.innerText
    })
    
    var debit_sum = 0;
    $('.debit_amount_class').each(function(){
        debit_sum += parseFloat(this.value);  // Or this.innerHTML, this.innerText
    })

    if(debit_sum != credit_sum){
        error_notification("Debit amount or Credit amount value not enqual Please check!")
        return false;
    }
    
     var formData = new FormData(form);
     var API_URL = "{{ route('admin.vouchers.store') }}";

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
                    setTimeout(function() {
						location.reload();
					},1500);
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
     var API_URL = "{{route('admin.vouchers.get')}}";
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
                $('#update_voucher_number').val(data["data"]["voucher_number"]);
                $('#update_voucher_date').val(data["data"]["voucher_date"]);

                
                $('#update_debit_vouchers_id').val(data["debit_data"]["id"]);
                $('#update_debit_transaction_type').val(data["debit_data"]["transaction_type"]);
                $('#update_debit_account_id').val(data["debit_data"]["ledger_account_id"]);
                $('#update_debit_account_close_balance').val(data["debit_data"]["ledger_account_close_balance"]);
                $('#update_debit_account_amount').val(data["debit_data"]["ledger_account_amount"]);

                
                $('#update_row_ajax').html('');
                 $('#update_row_ajax').append(data["credit_row"]);
                 selectPickerInitialize_class('selectpicker')
                
                selectPickerInitialize('update_debit_account_id');
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
         var API_URL = "{{ route('admin.vouchers.update') }}";
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
        var API_URL = "{{ route('admin.vouchers.delete') }}";
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
    $(this).closest("#forimagerow").remove();
});
 
function add_more_rows()
{
    var randno = Math.floor(Math.random() * 999999) + 000000;
    $('#add_row_ajax').append('<tr role="row" id="forimagerow">'+
        '<td>'+
        '<select id="ledger_account_id_'+randno+'" name="credit_ledger_account_id[]" class="form-control selectpicker" required onchange="get_closing_balanace('+randno+')" >'+
              '<option value="">Select Ledger  </option>'+
              <?php foreach($ledgers as $key => $ledger) { ?>
                  '<option data-closing_balance="<?=$ledger['closing_balance']?>" value="<?=$ledger['id']?>"><?=$ledger['title']?></option>'+
              <?php } ?>
          '</select>'+
          '<span class="text-danger" id="ledger_account_close_balance_ui_'+randno+'"></span>'+
          '<input type="hidden" id="ledger_account_close_balance_'+randno+'" name="credit_ledger_account_close_balance[]" class="form-control"/>'+
        '</td>'+
        '<td><input type="text" id="ledger_account_amount" name="credit_ledger_account_amount[]" class="form-control credit_amount_class" /></td>'+
        '<td><button type="button" class="margin-r-10 float-right btn btn-danger" id="closebuttonimage" ><i class="las la-minus-circle"></i>-</button></td>'+
    '</tr>');
    
    selectPickerInitialize('credit_ledger_id_'+randno);
}

function update_more_rows()
{
    var randno = Math.floor(Math.random() * 999999) + 000000;
    $('#update_row_ajax').append('<tr role="row" id="forimagerow">'+
        '<td>'+
        
        '<select id="update_new_credit_ledger_id_'+randno+'" name="update_new_ledger_account_id[]" class="form-control selectpicker" required >'+
              '<option value="">Select Ledger Group</option>'+
              <?php foreach($ledgers as $key => $ledger) { ?>
                  '<option value="<?=$ledger['id']?>"><?=$ledger['title']?></option>'+
              <?php } ?>
          '</select>'+
          
        '</td>'+
        '<td><input type="text" id="update_new_ledger_account_close_balance" name="update_new_ledger_account_close_balance[]" class="form-control"/></td>'+
        '<td><input type="text" id="update_new_ledger_account_amount" name="update_new_ledger_account_amount[]" class="form-control" /></td>'+
        '<td><button type="button" class="margin-r-10 float-right btn btn-danger" id="closebuttonimage" ><i class="las la-minus-circle"></i>-</button></td>'+
    '</tr>');
    
    selectPickerInitialize('update_new_credit_ledger_id_'+randno);
}


function delete_credit_row(update_id) {

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
        var API_URL = "{{ route('admin.vouchers.credit_row_delete') }}";
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
                    $('#row_'+update_id).remove();
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

function get_closing_balanace(randNO){
    var closing_balance = $('#ledger_account_id_'+randNO).find(':selected').attr('data-closing_balance');
   
    $('#ledger_account_close_balance_ui_'+randNO).html("Closing Balanace : "+closing_balance);
    
   
    $('#ledger_account_close_balance_'+randNO).val(closing_balance);
}
    
</script>


@endsection