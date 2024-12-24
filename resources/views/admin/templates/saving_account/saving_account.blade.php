@extends('admin.layouts.master-layout')

@section('styles')
<style type="text/css">
    .form-horizontal .control-label {
    padding-top: 7px;
    margin-bottom: 0;
    text-align: left;
}
.reporttable td, .reporttable th {
    border: 1px solid #ddd;
    padding: 8px;
}
.displaynone {
    display: none!important;
}
</style>
@endsection

    @section('content')
        
        @if(Request::route()->getName() == 'admin.saving_account.index') 
            @include('admin.templates.saving_account.list')
        @endif

        @if(Request::route()->getName() == 'admin.saving_account.index-pending') 
            @include('admin.templates.saving_account.list')
        @endif
        
        @if(Request::route()->getName() == 'admin.saving_account.index-all') 
            @include('admin.templates.saving_account.list-all')
        @endif
        
        

        @if(Request::route()->getName() == 'admin.saving_account.create') 
            @include('admin.templates.saving_account.add')
        @endif

        @if(Request::route()->getName() == 'admin.saving_account.edit') 
            @include('admin.templates.saving_account.update')
        @endif

        @if(Request::route()->getName() == 'admin.saving_account.approve-manage') 
            @include('admin.templates.saving_account.saving_account_approve_manage')
        @endif

        @if(Request::route()->getName() == 'admin.saving_account.manage') 
            @include('admin.templates.saving_account.manage')
        @endif

        @if(Request::route()->getName() == 'admin.saving_account.deposit') 
            @include('admin.templates.saving_account.deposit')
        @endif

        @if(Request::route()->getName() == 'admin.saving_account.withdraw') 
            @include('admin.templates.saving_account.withdraw')
        @endif

        @if(Request::route()->getName() == 'admin.saving_account.welcomeletter') 
            @include('admin.templates.saving_account.welcomeletter')
        @endif

        @if(Request::route()->getName() == 'admin.saving_account.UpgradeScheme') 
            @include('admin.templates.saving_account.upgradeScheme')
        @endif

        @if(Request::route()->getName() == 'admin.saving_account.nominee') 
            @include('admin.templates.saving_account.nominee')
        @endif

        @if(Request::route()->getName() == 'admin.saving_account.statements') 
            @include('admin.templates.saving_account.account_statement')
        @endif
        
        @if(Request::route()->getName() == 'admin.saving_account.neftImps') 
            @include('admin.templates.saving_account.neftImps')
        @endif
        
        @if(Request::route()->getName() == 'admin.saving_account.transactions') 
            @include('admin.templates.saving_account.transactions')
        @endif
        
        @if(Request::route()->getName() == 'admin.saving_account.receipt') 
            @include('admin.templates.saving_account.receipt')
        @endif
        
        @if(Request::route()->getName() == 'admin.saving_account.print-receipt') 
            @include('admin.templates.saving_account.print-receipt')
        @endif

        @if(Request::route()->getName() == 'admin.saving_account.update-agent') 
            @include('admin.templates.saving_account.update_agent')
        @endif

        @if(Request::route()->getName() == 'admin.saving_account.update-collector-agent') 
            @include('admin.templates.saving_account.update_collector_agent')
        @endif

        @if(Request::route()->getName() == 'admin.saving_account.jointaccount') 
            @include('admin.templates.saving_account.jointaccount')
        @endif

        @if(Request::route()->getName() == 'admin.saving_account.debit_crete_charges') 
            @include('admin.templates.saving_account.debit_crete_charges')
        @endif

        @if(Request::route()->getName() == 'admin.saving_account.agent-commission') 
            @include('admin.templates.saving_account.agentCommission')
        @endif

        @if(Request::route()->getName() == 'admin.saving_account.collection-charge') 
            @include('admin.templates.saving_account.collectionCharge')
        @endif

        @if(Request::route()->getName() == 'admin.saving_account.setLienAmount') 
            @include('admin.templates.saving_account.setLienAmount')
        @endif

        @if(Request::route()->getName() == 'admin.saving_account.setNEFTLimitAmount') 
            @include('admin.templates.saving_account.setNEFTLimitAmount')
        @endif

        @if(Request::route()->getName() == 'admin.saving_account.editMinor') 
            @include('admin.templates.saving_account.editMinor')
        @endif

        @if(Request::route()->getName() == 'admin.saving_account.closeAccount') 
            @include('admin.templates.saving_account.closeAccount')
        @endif
        
        @if(Request::route()->getName() == 'admin.saving_account.blockAccount') 
            @include('admin.templates.saving_account.blockAccount')
        @endif
        
        @if(Request::route()->getName() == 'admin.saving_account.unblockAccount') 
            @include('admin.templates.saving_account.unblockAccount')
        @endif
        
        @if(Request::route()->getName() == 'admin.saving_account.passbook') 
            @include('admin.templates.saving_account.passbook')
        @endif
        
        @if(Request::route()->getName() == 'admin.saving_account.passbook-fol1') 
            @include('admin.templates.saving_account.passbook_fol1')
        @endif
        @if(Request::route()->getName() == 'admin.saving_account.passbook-fol2') 
            @include('admin.templates.saving_account.passbook_fol2')
        @endif


<div class="modal modal-default fade" id="modal-currencydenomination" style="display: none;">
<div class="modal-dialog" style="width:500px;">
<div class="modal-content">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
        <h4 class="modal-title">Currency Denomination</h4>
    </div>

    <div class="modal-body">
        <table class="reporttable">
            <thead>
                <tr>
                    <th>Denomination</th>
                    <th>Count</th>
                    <th>Rupees</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Rs. 2000</td>
                    <td><input class="form-control numeric" data-val="true" data-val-number="The field Currency2000 must be a number." data-val-required="The Currency2000 field is required." id="Currency2000" name="Currency2000" type="text" value="0" autocomplete="off"></td>
                    <td><input class="form-control numeric" data-val="true" data-val-number="The field Currency2000Total must be a number." data-val-required="The Currency2000Total field is required." id="Currency2000Total" name="Currency2000Total" readonly="readonly" type="text" value="0" autocomplete="off"></td>
                </tr>
                <tr>
                    <td>Rs. 500</td>
                    <td><input class="form-control numeric" data-val="true" data-val-number="The field Currency500 must be a number." data-val-required="The Currency500 field is required." id="Currency500" name="Currency500" type="text" value="0" autocomplete="off"></td>
                    <td><input class="form-control numeric" data-val="true" data-val-number="The field Currency500Total must be a number." data-val-required="The Currency500Total field is required." id="Currency500Total" name="Currency500Total" readonly="readonly" type="text" value="0" autocomplete="off"></td>
                </tr>
                <tr>
                    <td>Rs. 200</td>
                    <td><input class="form-control numeric" data-val="true" data-val-number="The field Currency200 must be a number." data-val-required="The Currency200 field is required." id="Currency200" name="Currency200" type="text" value="0" autocomplete="off"></td>
                    <td><input class="form-control numeric" data-val="true" data-val-number="The field Currency200Total must be a number." data-val-required="The Currency200Total field is required." id="Currency200Total" name="Currency200Total" readonly="readonly" type="text" value="0" autocomplete="off"></td>
                </tr>
                <tr>
                    <td>Rs. 100</td>
                    <td><input class="form-control numeric" data-val="true" data-val-number="The field Currency100 must be a number." data-val-required="The Currency100 field is required." id="Currency100" name="Currency100" type="text" value="0" autocomplete="off"></td>
                    <td><input class="form-control numeric" data-val="true" data-val-number="The field Currency100Total must be a number." data-val-required="The Currency100Total field is required." id="Currency100Total" name="Currency100Total" readonly="readonly" type="text" value="0" autocomplete="off"></td>
                </tr>
                <tr>
                    <td>Rs. 50</td>
                    <td><input class="form-control numeric" data-val="true" data-val-number="The field Currency50 must be a number." data-val-required="The Currency50 field is required." id="Currency50" name="Currency50" type="text" value="0" autocomplete="off"></td>
                    <td><input class="form-control numeric" data-val="true" data-val-number="The field Currency50Total must be a number." data-val-required="The Currency50Total field is required." id="Currency50Total" name="Currency50Total" readonly="readonly" type="text" value="0" autocomplete="off"></td>
                </tr>
                <tr>
                    <td>Rs. 20</td>
                    <td><input class="form-control numeric" data-val="true" data-val-number="The field Currency20 must be a number." data-val-required="The Currency20 field is required." id="Currency20" name="Currency20" type="text" value="0" autocomplete="off"></td>
                    <td><input class="form-control numeric" data-val="true" data-val-number="The field Currency20Total must be a number." data-val-required="The Currency20Total field is required." id="Currency20Total" name="Currency20Total" readonly="readonly" type="text" value="0" autocomplete="off"></td>
                </tr>
                <tr>
                    <td>Rs. 10</td>
                    <td><input class="form-control numeric" data-val="true" data-val-number="The field Currency10 must be a number." data-val-required="The Currency10 field is required." id="Currency10" name="Currency10" type="text" value="0" autocomplete="off"></td>
                    <td><input class="form-control numeric" data-val="true" data-val-number="The field Currency10Total must be a number." data-val-required="The Currency10Total field is required." id="Currency10Total" name="Currency10Total" readonly="readonly" type="text" value="0" autocomplete="off"></td>
                </tr>
                <tr>
                    <td>Other Currency Amount</td>
                    <td></td>
                    <td><input class="form-control numeric" data-val="true" data-val-number="The field OtherCurrencyTotal must be a number." data-val-required="The OtherCurrencyTotal field is required." id="OtherCurrencyTotal" name="OtherCurrencyTotal" type="text" value="0" autocomplete="off"></td>
                </tr>
                <tr>
                    <td colspan="2">Total</td>                            
                    <td><input class="form-control numeric" data-val="true" data-val-number="The field CurrencyTotal must be a number." data-val-required="The CurrencyTotal field is required." id="CurrencyTotal" name="CurrencyTotal" readonly="readonly" type="text" value="0" autocomplete="off"></td>
                </tr>
            </tbody>
        </table>
    </div>

    <div class="box-footer">
        <button type="button" class="btn btn-success" data-dismiss="modal">OK</button>
    </div>
</div>
</div>
</div>
 @if(Request::route()->getName() == 'admin.saving_account.manage' || Request::route()->getName() == 'admin.saving_account.statements')  
<div class="modal fade" id="modal-daterange">
<div class="modal-dialog modal-dialog-centered">
  <div class="modal-content">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
        <h4 class="modal-title"><i class="fa fa-calendar"></i> Date Range</h4>
    </div>
    <form method="get" autocomplete="off" action="{{route('admin.saving_account.statements',array('id' => @$row['uuid']))}}">
    <div class="modal-body">
        <div class="box-body">
            <div class="form-horizontal">
                <div class="col-md-12">
                    <div class="form-group">
                        <label class="col-sm-4 control-label">From Date </label>
                        <div class="col-sm-7">
                            <div class="input-group date">
                                <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </div>
                                <input class="form-control" id="from_date" name="from_date" type="date" >
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="form-group">
                        <label class="col-sm-4 control-label">To Date </label>
                        <div class="col-sm-7">
                            <div class="input-group date">
                                <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </div>
                                <input class="form-control"id="to_date" name="to_date" type="date">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
      <input type="submit" value="Save" class="btn btn-primary"/>
    </div>
    </form>
  </div>
</div>
</div>




<div class="modal fade" id="modal-interetcalcpopup">
<div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
        <h4 class="modal-title"><i class="fa fa-calendar"></i> Date Range</h4>
    </div>
    <form name="calculate_interest_form" id="calculate_interest_form" method="post">
      {{csrf_field()}}   
    <div class="modal-body">
            <div class="box-body">
                <div class="form-horizontal">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="col-sm-4 control-label">Calculate interest till Date </label>
                            <div class="col-sm-7">
                                <div class="input-group date">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                    <input type="hidden" name="update_uuid" value="<?= @$row['uuid'] ?>">
                                    <input autocomplete="off" class="form-control datepicker required" id="interest_date" name="interest_date" type="date" max="<?= date('Y-m-d') ?>" value="<?= date('Y-m-d') ?>" />

                                </div>
                                <span class="field-validation-valid" data-valmsg-for="InterestDepositModel.InterestDate" data-valmsg-replace="true"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <div class="col-xs-12 text-center">
                <div class="form-group">
                    <button onclick="calculate_interest()" type="button" class="btn btn-flat btn-success">Submit</button>
                    <button type="button" class="btn btn-flat btn-warning" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
</form>       
 </div>
    </div>

</div>



@endif
        

    @endsection

@section('scripts')

<script type="text/javascript">

selectPickerInitialize('customer_id');
selectPickerInitialize('joint_customer_id');
selectPickerInitialize('bank_account_ledger_id');
selectPickerInitialize('bank_id');
selectPickerInitialize('bank_ledger_id');

     $(document).on("change", '#PaymentMode', function () {
        if ($("#PaymentMode").val() != "") {
            if ($("#PaymentMode").val() == "cash") {
                $("#ChequeDetailDiv").addClass("displaynone");
                $("#OnlineDetailDiv").addClass("displaynone");
                $("#bankaccountdiv").addClass("displaynone");
                $("#CurrencyDenominationDiv").removeClass("displaynone");
            }
            else if ($("#PaymentMode").val() == "cheque") {
                $("#ChequeDetailDiv").removeClass("displaynone");
                $("#bankaccountdiv").removeClass("displaynone");
                $("#OnlineDetailDiv").addClass("displaynone");
                $("#CurrencyDenominationDiv").addClass("displaynone");
            }
            else if ($("#PaymentMode").val() == "online_transfer") {
                $("#OnlineDetailDiv").removeClass("displaynone");
                $("#bankaccountdiv").removeClass("displaynone");
                $("#ChequeDetailDiv").addClass("displaynone");
                $("#CurrencyDenominationDiv").addClass("displaynone");
            }
        }
    });

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

    $("#add_deposit_form").validate({
        rules: {
            transation_date: "required",
            amount: "required",
            PaymentMode: "required"
        },
        messages: {
            transation_date: {
                required: "Please Select Transfer date Date ",
            },
            amount: {
                required: "Please enter amount",
            },
            PaymentMode: {
                required: "Please Select Payment mode ",
            }
        },
         submitHandler: function(form) {
            add_deposit_row(form);
        }
    });

    $("#add_withdraw_form").validate({
        rules: {
            transation_date: "required",
            amount: "required",
            PaymentMode: "required"
        },
        messages: {
            transation_date: {
                required: "Please Select Transfer date Date ",
            },
            amount: {
                required: "Please enter amount",
            },
            PaymentMode: {
                required: "Please Select Payment mode ",
            }
        },
         submitHandler: function(form) {
            add_withdraw_row(form);
        }
    });

    $("#add_update_scheme_form").validate({
        rules: {
            update_scheme_date: "required",
            scheme_id: "required"
        },
        messages: {
            update_scheme_date: {
                required: "Please Select Transfer date Date ",
            },
            scheme_id: {
                required: "Please select Scheme",
            }
        },
         submitHandler: function(form) {
            add_update_scheme_row(form);
        }
    });

    $("#update_agent_form").validate({
        rules: {
            agent_id: "required",
            update_note: "required"
        },
        messages: {
            agent_id: {
                required: "Please New Associate ",
            },
            update_note: {
                required: "Update Note",
            }
        },
         submitHandler: function(form) {
            update_agent_row(form);
        }
    });

    $("#update_collector_agent_form").validate({
        rules: {
            collector_agent_id: "required",
            update_collector_note: "required"
        },
        messages: {
            collector_agent_id: {
                required: "Please New Associate ",
            },
            update_collector_note: {
                required: "Update Note",
            }
        },
         submitHandler: function(form) {
            update_collector_agent_row(form);
        }
    });
    $("#update_joint_account_form").validate({
        rules: {
            update_joint_customer_id: "required"
        },
        messages: {
            update_joint_customer_id: {
                required: "Please Joint Account ",
            }
        },
         submitHandler: function(form) {
            update_joint_account_row(form);
        }
    });

    $("#add_debit_crete_form").validate({
        rules: {
            transaction_date: "required",
            transaction_type: "required",
            bank_ledger_id: "required",
            bank_amount: "required"

        },
        messages: {
            transaction_date: {
                required: "Please select transation date ",
            },transaction_type: {
                required: "Please select transaction type",
            },bank_ledger_id: {
                required: "Please select Bank Ledger",
            },bank_amount: {
                required: "Please enter amount",
            }
        },
         submitHandler: function(form) {
            add_add_debit_crete_form_row(form);
        }
    });

    $("#update_lien_amount_form").validate({
        rules: {
            lien_amount: "required"
        },
        messages: {
            lien_amount: {
                required: "Please enter Account ",
            }
        },
         submitHandler: function(form) {
            update_lien_amount(form);
        }
    });

    $("#update_NEFTLimitAmount_form").validate({
        rules: {
            neft_limit_amount: "required",
            scan_pay_limit_amount: "required"
        },
        messages: {
            neft_limit_amount: {
                required: "Please enter Account ",
            },
            scan_pay_limit_amount: {
                required: "Please enter Account ",
            }
        },
         submitHandler: function(form) {
            update_NEFTLimitAmount(form);
        }
    });

    $("#update_minor_form").validate({
        rules: {
            update_minor_id: "required"
        },
        messages: {
            update_minor_id: {
                required: "Please select minor ",
            }
        },
         submitHandler: function(form) {
            update_minor(form);
        }
    });

     $("#add_closeAmount_form").validate({
        rules: {
            transation_date: "required",
            account_balance: "required",
            NetAmountRelease: "required"
        },
        messages: {
            transation_date: {
                required: "Please select close date ",
            },
            account_balance: {
                required: "Please enter account balance ",
            },
            NetAmountRelease: {
                required: "Please enter Net Amount Release ",
            }
            
        },
         submitHandler: function(form) {
            update_closeAmount_form(form);
        }
    });
    
     $("#add_blockAmount_form").validate({
        rules: {
            block_reason: "required"
        },
        messages: {
            block_reason: {
                required: "Please select minor ",
            }
        },
         submitHandler: function(form) {
            update_blockAmount(form);
        }
    });
    
    $("#add_unblockAmount_form").validate({
        rules: {
            update_id: "required"
        },
        messages: {
            update_id: {
                required: "Please select minor ",
            }
        },
         submitHandler: function(form) {
            update_unblockAmount(form);
        }
    });
    
});
 function add_add_debit_crete_form_row(form)
{
var formData = new FormData(form);
var API_URL = "{{ route('admin.saving_account.debit_crete_charges_store') }}";
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
            $('#add_debit_crete_form')[0].reset();
            success_notification(data['msg']);
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
function update_unblockAmount(form)
{
    var formData = new FormData(form);
    var API_URL = "{{ route('admin.saving_account.unblockAccount-store') }}";
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
                $('#add_unblockAmount_form')[0].reset();
                success_notification(data['msg']);
                window.location.href = data["back_url"];

           }else{
                error_notification(data['msg'])
           }
        },
        error: function (data) {
            alert('server unavailable');
        }
    });
  }

function update_blockAmount(form)
{
    var formData = new FormData(form);
    var API_URL = "{{ route('admin.saving_account.blockAccount-store') }}";
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
                $('#add_blockAmount_form')[0].reset();
                success_notification(data['msg']);
                window.location.href = data["back_url"];


           }else{
                error_notification(data['msg'])
           }
        },
        error: function (data) {
            alert('server unavailable');
        }
    });
  }

function update_closeAmount_form(form)
{
    var formData = new FormData(form);
    var API_URL = "{{ route('admin.saving_account.closeAccount-store') }}";
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
                $('#add_closeAmount_form')[0].reset();
                success_notification(data['msg']);
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

function update_minor(form)
{
    var formData = new FormData(form);
    var API_URL = "{{ route('admin.saving_account.editMinor-store') }}";
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
                $('#update_minor_form')[0].reset();
                success_notification(data['msg']);
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

function update_NEFTLimitAmount(form)
{
    var formData = new FormData(form);
    var API_URL = "{{ route('admin.saving_account.NEFTLimitAmountStore-store') }}";
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
                $('#update_NEFTLimitAmount_form')[0].reset();
                success_notification(data['msg']);
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

function update_lien_amount(form)
{
    var formData = new FormData(form);
    var API_URL = "{{ route('admin.saving_account.LienAmount-store') }}";
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
                $('#update_lien_amount_form')[0].reset();
                success_notification(data['msg']);
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

function update_joint_account_row(form)
{
    var formData = new FormData(form);
    var API_URL = "{{ route('admin.saving_account.jointaccount-store') }}";
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
                $('#update_joint_account_form')[0].reset();
                success_notification(data['msg']);
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

function update_collector_agent_row(form)
{
    var formData = new FormData(form);
    var API_URL = "{{ route('admin.saving_account.update-collector-agent-store') }}";
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
                $('#update_collector_agent_form')[0].reset();
                success_notification(data['msg']);
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

function update_agent_row(form)
{
    var formData = new FormData(form);
    var API_URL = "{{ route('admin.saving_account.update-agent-store') }}";
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
                $('#update_agent_form')[0].reset();
                success_notification(data['msg']);
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

function add_update_scheme_row(form)
{
    var formData = new FormData(form);
    var API_URL = "{{ route('admin.saving_account.UpgradeScheme-store') }}";
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
                $('#add_update_scheme_form')[0].reset();
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

function add_withdraw_row(form)
{
    var formData = new FormData(form);
    var API_URL = "{{ route('admin.saving_account.withdraw-store') }}";
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
                $('#add_withdraw_form')[0].reset();
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

function add_deposit_row(form)
{
    var formData = new FormData(form);
    var API_URL = "{{ route('admin.saving_account.deposit-store') }}";
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
                $('#add_deposit_form')[0].reset();
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


function add_row(form)
{
     var formData = new FormData(form);
     var API_URL = "{{ route('admin.saving_account.store') }}";

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
                    get_records();
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

   function update_memberNominee()
    {
        var form = $('#update_form_memberinfo')[0]; // You need to use standard javascript object here
        var formData = new FormData(form);
        var API_URL = "{{ route('admin.saving_account.nominee-store') }}";
            $.ajax({
                url: API_URL,
                type: 'POST',
                data: formData,
                async: false,
                dataType: 'json',
                contentType: false, // NEEDED, DON'T OMIT THIS (requires jQuery 1.6+)
                processData: false, // NEEDED, DON'T OMIT THIS
                success: function (data){
                    if (data["status"] == 1){
                        success_notification(data['msg'])
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



@if(Request::route()->getName() == 'admin.saving_account.index')
  get_records()
@else
  get_records_pending()
@endif


function get_records()
{
  var API_URL = "{{ route('admin.saving_account.list') }}";
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

function get_records_pending()
{
  var API_URL = "{{ route('admin.saving_account.list-pending') }}";
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

@if(Request::route()->getName() == 'admin.saving_account.index-all')
    get_records_all()
@endif

function get_records_all()
{
  var API_URL = "{{ route('admin.saving_account.list-all') }}";
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



     function update_row()
     {
         var form = $('#update_form')[0]; // You need to use standard javascript object here
         var formData = new FormData(form);
         var API_URL = "{{ route('admin.saving_account.update') }}";
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

      function approved_saving_account()
     {
         var form = $('#approved_saving_account_form')[0]; // You need to use standard javascript object here
         var formData = new FormData(form);
         var API_URL = "{{ route('admin.saving_account.status') }}";
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
                        document.location.href="{!! route('admin.saving_account.index'); !!}";

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
            var API_URL = "{{ route('admin.saving_account.delete') }}";
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

function transation_delete_row(update_id) {

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
                var API_URL = "{{ route('admin.saving_account.transation-delete') }}";
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
 <script>
        
        $(document).on("change", '#Currency2000', function () {            
            $('#Currency2000Total').val($('#Currency2000').val() * 2000);
            dototal();
        });

        $(document).on("change", '#Currency500', function () {
            $('#Currency500Total').val($('#Currency500').val() * 500);
            dototal();
        });

        $(document).on("change", '#Currency200', function () {
            $('#Currency200Total').val($('#Currency200').val() * 200);
            dototal();
        });

        $(document).on("change", '#Currency100', function () {
            $('#Currency100Total').val($('#Currency100').val() * 100);
            dototal();
        });

        $(document).on("change", '#Currency50', function () {
            $('#Currency50Total').val($('#Currency50').val() * 50);
            dototal();
        });

        $(document).on("change", '#Currency20', function () {
            $('#Currency20Total').val($('#Currency20').val() * 20);
            dototal();
        });

        $(document).on("change", '#Currency10', function () {
            $('#Currency10Total').val($('#Currency10').val() * 10);
            dototal();
        });
        $(document).on("change", '#OtherCurrencyTotal', function () {           
            dototal();
        });
        
        function dototal() {
            var total = parseFloat($('#Currency2000Total').val()) + parseFloat($('#Currency500Total').val()) + parseFloat($('#Currency200Total').val())
                + parseFloat($('#Currency100Total').val()) + parseFloat($('#Currency50Total').val())
                + parseFloat($('#Currency20Total').val()) + parseFloat($('#Currency10Total').val()) + parseFloat($('#OtherCurrencyTotal').val());
            $('#CurrencyTotal').val(total);            
        }

      @if(Request::route()->getName() == 'admin.saving_account.edit') 
          get_schemeDetails()
          get_MemberInfo()
      @endif

    function get_schemeDetails()
    {
       var scheme_id = $('#scheme_id').val();
       var API_URL = "{{ route('admin.get-scheme-details') }}";
          $.ajax({
              url: API_URL,
              type: 'POST',
              data: {'scheme_id': scheme_id,'_token': '{!! csrf_token() !!}'},
              async: false,
              dataType: 'json',
              success: function (response) {
                 if(response['status'] == 1){
                    
                    var schemedetail = "<span style='font-family:arial;font-size:12px;font-weight:bold;'><a href='" + "/SavingAccount/SchemeView/" + $('#cmbschemeid').val() + "' target='_blank'>" + response['rows']['name'] + " [" + response['rows']['scheme_code'] + "]</a></span><br />" +
                            "<span style='font-family:arial;font-size:12px;color:gray;'> Annual Interest Rate: " + response['rows']['interest_rate'] + "%</span> <br />" +
                            "<span style = 'font-family:arial;font-size:12px;color:gray;'> Interest Compounding :" + response['rows']['interest_payout'] + "</span > <br />" +
                            "<span style='font-family:arial;font-size:12px;color:gray;'> Minimum Balance :" + response['rows']['minimum_balance'] + "</span> <br />";
                        $('#schemedetail').html(schemedetail);      

                 }else{
                    $('#schemedetail').html('');      
                 }

                 
              },
              error: function (data) {
                  alert('server unavailable');
              }
          });
    }

    function get_MemberInfo()
    {
       var customer_id = $('#customer_id').val();
       var API_URL = "{{ route('admin.get-member-spp-details') }}";
          $.ajax({
              url: API_URL,
              type: 'POST',
              data: {'customer_id': customer_id,'_token': '{!! csrf_token() !!}'},
              async: false,
              dataType: 'json',
              success: function (response) {
                 if(response['status'] == 1){
                    console.log(response['rows']['name']);
                    var address = "<span style='font-family:arial;font-size:12px;font-weight:bold;'><a href='" + "/Members/View/" + $('#cmbmember').val() + "' target='_blank'>" + response['rows']['name'] + " [" + response['rows']['customer_code'] + "]</a></span><br />" +
                            "<span style = 'font-family:arial;font-size:12px;color:gray;'> " + response['rows']['present_address1'] + "</span > <br />" +
                            "<span style='font-family:arial;font-size:12px;color:gray;'>" + response['rows']['present_address2'] + ' ' + response['rows']['state']['title'] + '-' + response['rows']['present_pin_code'] + ',' + response['rows']['state']['title'] + "</span> <br />" +
                            "<span style='font-family:arial;font-size:12px;color:gray;'><i class='fa fa-phone'></i>&nbsp; " + response['rows']['mobile'] + "</span> <br />" +
                            "<span style='font-family:arial;font-size:12px;color:gray;'><i class='fa fa-envelope-o'></i>&nbsp; " + response['rows']['email'] + "</span> <br />";
                        $('#memberdetail').html(address);      

                 }else{
                    $('#memberdetail').html('');      
                 }

                 
              },
              error: function (data) {
                  alert('server unavailable');
              }
          });
    }

$(document).on('click','#warrantyclosebuttonimage',function() {
    $(this).closest("#member_nominee_forimagerow").remove();
});
 
function add_more_member_nominee()
{
    $('#items_ui').append('<div id="member_nominee_forimagerow" class="box-body item-row" style="border-bottom: solid 1px;box-shadow: 0px 0px 3px 0px;margin-bottom: 2%;">'+
      '<div class="form-horizontal">'+
        '<div class="col-md-6">'+
          '<div class="form-group">'+
            '<label class="col-sm-4 control-label">Name <span class="requiredfield">*</span>'+
            '</label>'+
            '<div class="col-sm-7">'+
              '<input class="form-control required"  id="nominee_name" name="nominee_name[]" type="text">'+
            '</div>'+
          '</div>'+
        '</div>'+
        '<div class="col-md-6">'+
          '<div class="form-group">'+
            '<label class="col-sm-4 control-label">Relation <span class="requiredfield">*</span>'+
            '</label>'+
            '<div class="col-sm-7">'+
              '<select class="form-control required" id="nominee_relation" name="nominee_relation[]">'+
                '<option value="">Select Relation</option>'+
                '<option value="brother">Brother</option>'+
                '<option value="brother_in_law">Brother in Law</option>'+
                '<option value="brother_wife">Brother wife</option>'+
                '<option value="daughter">Daughter</option>'+
                '<option value="father">Father</option>'+
                '<option value="grand_son">Grand Son</option>'+
                '<option value="grand_daughter">Grand Daughter</option>'+
                '<option value="husband">Husband</option>'+
                '<option value="mother">Mother</option>'+
                '<option value="niece">Niece</option>'+
                '<option value="nephew">Nephew</option>'+
                '<option value="sister">Sister</option>'+
                '<option value="sister_in_law">Sister in Law</option>'+
                '<option value="son">Son</option>'+
                '<option value="spouse">Spouse</option>'+
                '<option value="wife">Wife</option>'+
              '</select>'+
            '</div>'+
          '</div>'+
        '</div>'+
        '<div class="col-md-6">'+
          '<div class="form-group">'+
            '<label class="col-sm-4 control-label">D.O.B. </label>'+
            '<div class="col-sm-7">'+
               
                '<input class="form-control" name="nominee_dob[]" type="date" value="">'+
            '</div>'+
          '</div>'+
        '</div>'+
        '<div class="col-md-6">'+
          '<div class="form-group">'+
            '<label class="col-sm-4 control-label">Age</label>'+
            '<div class="col-sm-7">'+
              '<input class="form-control age" id="nominee_dob" maxlength="20" name="nominee_age[]" type="text">'+
            '</div>'+
          '</div>'+
        '</div>'+
        '<div class="col-md-6">'+
          '<div class="form-group">'+
            '<label class="col-sm-4 control-label">Mobile No</label>'+
            '<div class="col-sm-7">'+
              '<input class="form-control" id="nominee_mobile" maxlength="10" name="nominee_mobile[]" type="text">'+
            '</div>'+
          '</div>'+
        '</div>'+
        '<div class="col-md-6">'+
          '<div class="form-group">'+
            '<label class="col-sm-4 control-label">Address <span class="requiredfield">*</span>'+
            '</label>'+
            '<div class="col-sm-7">'+
              '<input class="form-control required" id="nominee_address" maxlength="150" name="nominee_address[]" type="text">'+
            '</div>'+
          '</div>'+
        '</div>'+
        
        '<div class="col-md-6">'+
          '<a class="delete-row deleterow" id="warrantyclosebuttonimage" href="javaScript:void(0)">'+
            '<i class="fa fa-trash-o"></i> Remove Nominee </a>'+
        '</div>'+
      '</div>'+
    '</div>');
}

         
    function statement_modal() {
         $('#modal-daterange').modal('show');
    }

     $(document).on("change", '#InterestOccured', function () {
            doTotal();
        });

        function doTotal() {

            if ($('#InterestOccured').val() == undefined || $('#InterestOccured').val().length <= 0 || isNaN($('#InterestOccured').val())) {
                $('#InterestOccured').val('0');
            }
            var TotalAmount = parseFloat($('#AccountBalance').val()) + parseFloat($('#InterestOccured').val()) ;
            $('#NetAmountRelease').val(TotalAmount);
        }
        
        
        function calculate_interest()
    {
         var form = $('#calculate_interest_form')[0]; // You need to use standard javascript object here
         var formData = new FormData(form);
         var API_URL = "{{ route('admin.saving_account.cal_interest') }}";
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

    </script>




@endsection