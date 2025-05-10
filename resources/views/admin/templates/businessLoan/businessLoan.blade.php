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
        
        @if(Request::route()->getName() == 'admin.businessLoan.index') 
            @include('admin.templates.businessLoan.list')
        @endif

        @if(Request::route()->getName() == 'admin.businessLoan.create') 
            @include('admin.templates.businessLoan.add')
        @endif

        @if(Request::route()->getName() == 'admin.businessLoan.edit') 
            @include('admin.templates.businessLoan.update')
        @endif

        @if(Request::route()->getName() == 'admin.businessLoan.emilist') 
            @include('admin.templates.businessLoan.emiChart')
        @endif

        @if(Request::route()->getName() == 'admin.businessLoan.view') 
            @include('admin.templates.businessLoan.manage')
        @endif

        @if(Request::route()->getName() == 'admin.businessLoan.approve-manage') 
            @include('admin.templates.businessLoan.apporval_request')
        @endif

        @if(Request::route()->getName() == 'admin.businessLoan.manage') 
            @include('admin.templates.businessLoan.manage')
        @endif

        @if(Request::route()->getName() == 'admin.businessLoan.deposit') 
            @include('admin.templates.businessLoan.deposit')
        @endif
        
        @if(Request::route()->getName() == 'admin.businessLoan.nominee') 
            @include('admin.templates.businessLoan.nominee')
        @endif
        
        @if(Request::route()->getName() == 'admin.businessLoan.update-agent') 
            @include('admin.templates.businessLoan.update_agent')
        @endif
        
        @if(Request::route()->getName() == 'admin.businessLoan.update-collector-agent') 
            @include('admin.templates.businessLoan.update_collector_agent')
        @endif
        
        @if(Request::route()->getName() == 'admin.fixedDeposit.welcomeletter') 
            @include('admin.templates.fixedDeposit.welcomeletter')
        @endif
        
        @if(Request::route()->getName() == 'admin.fixedDeposit.FDBond') 
            @include('admin.templates.fixedDeposit.FDBond')
        @endif
        
        @if(Request::route()->getName() == 'admin.businessLoan.transactions') 
            @include('admin.templates.businessLoan.transactions')
        @endif
        
        @if(Request::route()->getName() == 'admin.businessLoan.receipt') 
            @include('admin.templates.businessLoan.receipt')
        @endif
        
        @if(Request::route()->getName() == 'admin.businessLoan.statements') 
            @include('admin.templates.businessLoan.account_statement')
        @endif
        
        
        @if(Request::route()->getName() == 'admin.businessLoan.debit_crete_charges') 
            @include('admin.templates.businessLoan.debit_crete_charges')
        @endif

        @if(Request::route()->getName() == 'admin.businessLoan.link-saving') 
            @include('admin.templates.businessLoan.linkSavingAccount')
        @endif

        @if(Request::route()->getName() == 'admin.businessLoan.PartRelease')
            @include('admin.templates.businessLoan.partRelease')
        @endif

        @if(Request::route()->getName() == 'admin.fixedDeposit.preCloseAccount')
            @include('admin.templates.fixedDeposit.preCloseAccount')
        @endif

        @if(Request::route()->getName() == 'admin.fixedDeposit.jointaccount')
            @include('admin.templates.fixedDeposit.jointaccount')
        @endif

        @if(Request::route()->getName() == 'admin.businessLoan.blockAccount') 
            @include('admin.templates.businessLoan.blockAccount')
        @endif
        
        @if(Request::route()->getName() == 'admin.businessLoan.unblockAccount') 
            @include('admin.templates.businessLoan.unblockAccount')
        @endif

        @if(Request::route()->getName() == 'admin.acknowledgement.index') 
            @include('admin.templates.businessLoan.acknowledgement')
        @endif

        @if(Request::route()->getName() == 'admin.loanAgreement.index') 
            @include('admin.templates.businessLoan.loanAgreement')
        @endif

        @if(Request::route()->getName() == 'admin.loanAgreement.doc') 
            @include('admin.templates.businessLoan.loanAgreementDoc')
        @endif

        @if(Request::route()->getName() == 'admin.businessLoan.disburse-manage') 
            @include('admin.templates.businessLoan.disburseManage')
        @endif

        @if(Request::route()->getName() == 'admin.businessLoan.santionLetter') 
            @include('admin.templates.businessLoan.santionLetter')
        @endif
        
        @if(Request::route()->getName() == 'admin.businessLoan.presantionLetter') 
            @include('admin.templates.businessLoan.PreSantionLetter')
        @endif
        
        
        
        @if(Request::route()->getName() == 'admin.businessLoan.passbook') 
            @include('admin.templates.businessLoan.passbook')
        @endif
        
         @if(Request::route()->getName() == 'admin.businessLoan.passbook-fol1') 
            @include('admin.templates.businessLoan.passbook_fol1')
        @endif
        
         @if(Request::route()->getName() == 'admin.businessLoan.passbook-fol2') 
            @include('admin.templates.businessLoan.passbook_fol2')
        @endif
        
        @if(Request::route()->getName() == 'admin.businessLoan.closedAccount') 
            @include('admin.templates.businessLoan.admin.closedAccount')
        @endif
        
         @if(Request::route()->getName() == 'admin.businessLoan.ReConstruct') 
            @include('admin.templates.businessLoan.ReConstruct')
        @endif
        

@if(Request::route()->getName() == 'admin.businessLoan.manage' || Request::route()->getName() == 'admin.businessLoan.statements')  

<div class="modal fade" id="modal-daterange">
<div class="modal-dialog modal-dialog-centered">
  <div class="modal-content">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
        <h4 class="modal-title"><i class="fa fa-calendar"></i> Date Range</h4>
    </div>

    <?php
        $startDate=  date('Y-m-01');
        $EndDate=  date('Y-m-t');
        if(isset($_REQUEST['from_date']) && $_REQUEST['from_date'] != ''){
            $startDate =  $_REQUEST['from_date'];    
        }
        if(isset($_REQUEST['to_date']) && $_REQUEST['to_date'] != ''){
            $EndDate=  $_REQUEST['to_date'];    
        }
        
     ?>

    <form method="get" autocomplete="off" action="{{route('admin.businessLoan.statements',array('id' => @$row['uuid']))}}">
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
                                <input class="form-control" id="from_date" name="from_date" type="date" value="{{@$startDate}}" >
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
                                <input class="form-control"id="to_date" name="to_date" type="date" value="{{@$EndDate}}">
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
        
@endif  

@if(Request::route()->getName() == 'admin.businessLoan.deposit')
<div id="modal-SubPage">
<div class="modal fade in" id="modal_Due_EMI">
    <div class="modal-dialog" style="width:800px;">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                <h4 class="modal-title">Due EMIs detail</h4>
            </div>

            <div class="modal-body">
                <style>
                    .reporttable {
                        font-family: Calibri;
                        border-collapse: collapse;
                        font-weight: 400;
                        font-size: 16px;
                        line-height: 1.42857143;
                        color: #333;
                        width: 100%;
                    }

                        .reporttable td, .reporttable th {
                            border: 1px solid #ddd;
                            padding: 8px;
                        }

                        .reporttable th {
                            padding-top: 12px;
                            padding-bottom: 12px;
                            text-align: left;
                            background-color: #f2f2f2;
                        }
                </style>
                <table class="reporttable">
                    <thead>
                    <tr><th>SrNo</th>
                    <th>EMI</th>
                    <th>Due Date</th>
                    <th>No. of day</th>
                    </tr></thead>
                        <tbody>
                        <?php $totalEMI = count($EMI_rows) ?>
                         @foreach($EMI_rows as $index=>$row)
                        <tr>
                            <td>{{$index+1}}</td>
                            <td>{{@$row['emi']}}</td>
                            <td>{{Helper::getFromDate($row['due_date'])}}</td>
                            <td><?= $totalEMI ?></td>
                        </tr>
                        <?php $totalEMI--; ?>
                        @endforeach 
                      

                </tbody></table>
            </div>
        </div>
    </div>
</div>
</div>
 @endif       

        

    @endsection

@section('scripts')

<script type="text/javascript">

selectPickerInitialize('customer_id');
selectPickerInitialize('associate_customer_id');
selectPickerInitialize('state_id');
selectPickerInitialize('blood_group');
$('#emi_dataTables_table_init').DataTable();

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

$("#add_ReConstruct_form").validate({
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
        add_ReConstruct_form(form);
    }
});

$("#add_PartRelease_form").validate({
    rules: {
        DepositAmount: "required",
        PaymentMode: "required"
    },
    messages: {
        DepositAmount: {
            required: "Please enter amount",
        },
        PaymentMode: {
            required: "Please Select Payment mode ",
        }
    },
     submitHandler: function(form) {
        add_PartRelease_row(form);
    }
});

$("#add_preCloseAccount_form").validate({
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
        add_preCloseAccount_row(form);
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

     $("#update_link_saving_account_form").validate({
        rules: {
            link_saving_account_id: "required"
        },
        messages: {
            link_saving_account_id: {
                required: "Please select Saving Account ",
            }
        },
         submitHandler: function(form) {
            update_link_saving_account(form);
        }
    });

      $("#add_PartRelease_form").validate({
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
            add_PartRelease(form);
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




function update_unblockAmount(form)
{
    var formData = new FormData(form);
    var API_URL = "{{ route('admin.businessLoan.unblockAccount-store') }}";
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
var API_URL = "{{ route('admin.businessLoan.blockAccount-store') }}";
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

function update_joint_account_row(form)
{
    var formData = new FormData(form);
    var API_URL = "{{ route('admin.fixedDeposit.jointaccount-store') }}";
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

function add_PartRelease(form)
{
    var formData = new FormData(form);
    var API_URL = "{{ route('admin.fixedDeposit.PartRelease-store') }}";
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
                $('#add_PartRelease_form')[0].reset();
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


function update_link_saving_account(form)
{
    var formData = new FormData(form);
    var API_URL = "{{ route('admin.businessLoan.link-saving_store') }}";
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
                $('#update_link_saving_account_form')[0].reset();
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
    
    function add_add_debit_crete_form_row(form)
    {
    var formData = new FormData(form);
    var API_URL = "{{ route('admin.businessLoan.debit_crete_charges_store') }}";
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
    
    
function update_agent_row(form)
{
    var formData = new FormData(form);
    var API_URL = "{{ route('admin.businessLoan.update-agent-store') }}";
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

function add_preCloseAccount_row(form)
{
    var formData = new FormData(form);
    var API_URL = "{{ route('admin.fixedDeposit.preCloseAccount-store') }}";
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
                $('#add_preCloseAccount_form')[0].reset();
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
  

function add_PartRelease_row(form)
{
    var formData = new FormData(form);
    var API_URL = "{{ route('admin.businessLoan.PartRelease-store') }}";
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
                $('#add_PartRelease_form')[0].reset();
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
    var API_URL = "{{ route('admin.businessLoan.deposit-store') }}";
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
                window.location.href = data['back_url'];
           }else{
                error_notification(data['msg'])
           }
        },
        error: function (data) {
            alert('server unavailable');
        }
    });
  }
  
  function add_ReConstruct_form(form)
{
    var formData = new FormData(form);
    var API_URL = "{{ route('admin.businessLoan.ReConstruct-store') }}";
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
                $('#add_ReConstruct_form')[0].reset();
                success_notification(data['msg'])
                window.location.href = data['back_url'];
           }else{
                error_notification(data['msg'])
           }
        },
        error: function (data) {
            alert('server unavailable');
        }
    });
  }
  
  

get_records()
function get_records()
{
  var API_URL = "{{ route('admin.businessLoan.list') }}";
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
    
    
});

function update_collector_agent_row(form)
{
    var formData = new FormData(form);
    var API_URL = "{{ route('admin.businessLoan.update-collector-agent-store') }}";
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

function add_row(form)
{
     var formData = new FormData(form);
     var API_URL = "{{ route('admin.businessLoan.store') }}";

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


     function update_row()
     {
         var form = $('#update_form')[0]; // You need to use standard javascript object here
         var formData = new FormData(form);
         var API_URL = "{{ route('admin.businessLoan.update') }}";
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
            var API_URL = "{{ route('admin.businessLoan.delete') }}";
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
            var API_URL = "{{ route('admin.businessLoan.tranastion-delete') }}";
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

function approved_businessLoan()
{
    var form = $('#approved_businessLoan_form')[0]; // You need to use standard javascript object here
    var formData = new FormData(form);
    var API_URL = "{{ route('admin.businessLoan.status') }}";
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
                success_notification(data['msg']);
                 window.location.href = '{{route("admin.businessLoan.index")}}';
           }else{
                error_notification(data['msg'])
           }

        },
        error: function (data) {
            alert('server unavailable');
        }
    });
}

$(document).on("change", '#PaymentMode', function () {
    if($("#PaymentMode").val() != "") {
        if ($("#PaymentMode").val() == "cash") {
            $("#ChequeDetailDiv").addClass("displaynone");
            $("#OnlineDetailDiv").addClass("displaynone");
            $("#bankaccountdiv").addClass("displaynone");
            $("#CurrencyDenominationDiv").removeClass("displaynone");
            $("#SavingAccountlDiv").addClass("displaynone");
        }
        else if ($("#PaymentMode").val() == "cheque") {
            $("#ChequeDetailDiv").removeClass("displaynone");
            $("#bankaccountdiv").removeClass("displaynone");
            $("#OnlineDetailDiv").addClass("displaynone");
            $("#CurrencyDenominationDiv").addClass("displaynone");
            $("#SavingAccountlDiv").addClass("displaynone");
        }
        else if ($("#PaymentMode").val() == "online_transfer") {
            $("#OnlineDetailDiv").removeClass("displaynone");
            $("#bankaccountdiv").removeClass("displaynone");
            $("#ChequeDetailDiv").addClass("displaynone");
            $("#CurrencyDenominationDiv").addClass("displaynone");
            $("#SavingAccountlDiv").addClass("displaynone");
        }
        else if ($("#PaymentMode").val() == "by_saving_account") {
            $("#OnlineDetailDiv").addClass("displaynone");
            $("#ChequeDetailDiv").addClass("displaynone");
            $("#SavingAccountlDiv").removeClass("displaynone");
            $('#SavingAccountId').addClass("loadinginternal");
            $("#bankaccountdiv").addClass("displaynone");
            $("#CurrencyDenominationDiv").addClass("displaynone");
        }
    }
});

@if(Request::route()->getName() == 'admin.businessLoan.edit') 
    get_schemeDetails()
    get_MemberInfo()
@endif

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





    function get_schemeDetails()
    {
       var scheme_id = $('#scheme_id').val();
       var API_URL = "{{ route('admin.get-loan-scheme-details') }}";
          $.ajax({
              url: API_URL,
              type: 'POST',
              data: {'scheme_id': scheme_id,'_token': '{!! csrf_token() !!}'},
              async: false,
              dataType: 'json',
              success: function (response) {
                 if(response['status'] == 1){ 
                    
var schemedetail = "<span style='font-family:arial;font-size:12px;font-weight:bold;'><a href='" + "/SavingAccount/SchemeView/" + $('#cmbschemeid').val() + "' target='_blank'>" + response['rows']['name'] + " [" + response['rows']['scheme_code'] + "]</a></span><br />" +
        "<span style = 'font-family:arial;font-size:12px;color:gray;'> Maximum Loan :" + response['rows']['min_amount'] + "</span > <br />" +
        "<span style = 'font-family:arial;font-size:12px;color:gray;'> Minimum Loan :" + response['rows']['max_amount'] + "</span > <br />" +
        "<span style='font-family:arial;font-size:12px;color:gray;'> Annual Interest Rate : " + response['rows']['interest_rate'] + "%</span> <br />"+
        "<span style='font-family:arial;font-size:12px;color:gray;'> EMI Type :" + response['rows']['emi_type'] + "Months</span> <br />";
    $('#schemedetail').html(schemedetail);      
    $('#annual_interest_rate').val(response['rows']['interest_rate']);

                 }else{
                    $('#schemedetail').html(''); 
                    $('#annual_interest_rate').val('');      
                 }

                 
              },
              error: function (data) {
                  alert('server unavailable');
              }
          });
    }

    $(document).on("change", '#AmountDeposit,#CollectionCharge,#PenaltyCharge,#PenaltyChargeWaveoff', function () {
        doTotal();
    });
    $(document).on("change", '#AmountDeposit', function () {
        if ($('#AmountDeposit').val() == undefined || $('#AmountDeposit').val().length <= 0 || isNaN($('#AmountDeposit').val())) {
            $('#AmountDeposit').val('0.00');
        }
        if ($('#CollectionChargeMode').val() == "(%)") {
            $('#CollectionCharge').val(Math.round($('#AmountDeposit').val() * $('#SchemeCollectionCharge').val()) / 100, 2);
        }
        doTotal();
    });
    function doTotal() {

        if ($('#AmountDeposit').val() == undefined || $('#AmountDeposit').val().length <= 0 || isNaN($('#AmountDeposit').val())) {
            $('#AmountDeposit').val('0.00');
        }
        if ($('#CollectionCharge').val() == undefined || $('#CollectionCharge').val().length <= 0 || isNaN($('#CollectionCharge').val())) {
            $('#CollectionCharge').val('0.00');
        }
        if ($('#PenaltyCharge').val() == undefined || $('#PenaltyCharge').val().length <= 0 || isNaN($('#PenaltyCharge').val())) {
            $('#PenaltyCharge').val('0.00');
        }
        if ($('#PenaltyChargeWaveoff').val() == undefined || $('#PenaltyChargeWaveoff').val().length <= 0 || isNaN($('#PenaltyChargeWaveoff').val())) {
            $('#PenaltyChargeWaveoff').val('0.00');
        }
        $('#TotalDeposit').val(parseFloat($('#AmountDeposit').val()) + parseFloat($('#CollectionCharge').val()) + (parseFloat($('#PenaltyCharge').val()) - parseFloat($('#PenaltyChargeWaveoff').val())) );
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

    function update_memberNominee()
    {
        var form = $('#update_form_memberinfo')[0]; // You need to use standard javascript object here
        var formData = new FormData(form);
        var API_URL = "{{ route('admin.businessLoan.nominee-store') }}";
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

    function update_disbursement()
    {
        var form = $('#update_form_disbursement')[0]; // You need to use standard javascript object here
        var formData = new FormData(form);
        var API_URL = "{{ route('admin.businessLoan.disburse-manage-store') }}";
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
    
    function update_loanAgreement()
    {
        var form = $('#update_form_loanAgreemento')[0]; // You need to use standard javascript object here
        var formData = new FormData(form);
        var API_URL = "{{ route('admin.loanAgreement.store') }}";
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
    

    function statement_modal() {
         $('#modal-daterange').modal('show');
    }



    $(document).on("change", '#PenaltyCharges,#PenaltyWaveOff,#DebitOtherCharge,#InterestOccured', function () {
            PreClosedoTotal();
        });

         function PreClosedoTotal() {
            if ($('#InterestOccured').val() == undefined || $('#InterestOccured').val().length <= 0 || isNaN($('#InterestOccured').val())) {
                $('#InterestOccured').val('0.00');
            }

            if ($('#AccountBalance').val() == undefined || $('#AccountBalance').val().length <= 0 || isNaN($('#AccountBalance').val())) {
                $('#AccountBalance').val('0.00');
            }
            if ($('#DebitOtherCharge').val() == undefined || $('#DebitOtherCharge').val().length <= 0 || isNaN($('#DebitOtherCharge').val())) {
                $('#DebitOtherCharge').val('0.00');
            }
            
            $('#NetAmountRelease').val(parseFloat($('#AccountBalance').val()) + parseFloat($('#InterestOccured').val()) - parseFloat($('#DebitOtherCharge').val())) ;
        }         


        $(document).on("change", '#DisburseDate,#EMIPayout,#TenureMonth', function () {
            ShowEMIInfo();
        });

        $(document).on("change", '#PreEMIInterest,#ProcessingFees,#StampDuty,#PreEMIInterestSeprately,#ProcessingFeesSeprately,#StampDutySeprately,#AdvanceAmount', function () {
            NetDisburseAmount();
        });

        function NetDisburseAmount() {
            var vPreEMIInterest = 0;
            var vProcessingFees = 0;
            var vProcessingFeesTotal = 0;
            var vStampDuty = 0;
            var vStampDutyTotal = 0;
            var vAdvanceAmount = 0;

            if ($('#PreEMIInterest').val() == "")
                $('#PreEMIInterest').val(0);

            if ($('#ProcessingFees').val() == "")
                $('#ProcessingFees').val(0);


            if ($('#IsGSTOnProcessingFees').val() == 'True') {
                $('#ProcessingFeesCGST').val(parseFloat($('#ProcessingFees').val()) * parseFloat($('#GSTRate').val()));
                $('#ProcessingFeesSGST').val(parseFloat($('#ProcessingFees').val()) * parseFloat($('#GSTRate').val()));
                $('#ProcessingFeesTotal').val(parseFloat($('#ProcessingFees').val()) + parseFloat($('#ProcessingFeesSGST').val()) + parseFloat($('#ProcessingFeesCGST').val()))
            }
            else {
                $('#ProcessingFeesTotal').val(parseFloat($('#ProcessingFees').val()));
            }
            if ($('#ProcessingFeesTotal').val() == "")
                $('#ProcessingFeesTotal').val(0);

            if ($('#StampDuty').val() == "")
                $('#StampDuty').val(0);

            if ($('#IsGSTOnStampDuty').val() == 'True') {
                $('#StampDutyCGST').val(parseFloat($('#StampDuty').val()) * parseFloat($('#GSTRate').val()));
                $('#StampDutySGST').val(parseFloat($('#StampDuty').val()) * parseFloat($('#GSTRate').val()));
                $('#StampDutyTotal').val(parseFloat($('#StampDuty').val()) + parseFloat($('#StampDutyCGST').val()) + parseFloat($('#StampDutySGST').val()))
            }
            else {
                $('#StampDutyTotal').val(parseFloat($('#StampDuty').val()));
            }

            if ($('#StampDutyTotal').val() == "")
                $('#StampDutyTotal').val(0);

            if ($('#AdvanceAmount').val() == "")
                $('#AdvanceAmount').val(0);

            vPreEMIInterest = $('#PreEMIInterest').val();
            vProcessingFees = $('#ProcessingFees').val();

            vProcessingFeesTotal = $('#ProcessingFeesTotal').val();
            vStampDuty = $('#StampDuty').val();
            vStampDutyTotal = $('#StampDutyTotal').val();

            if ($('#PreEMIInterestSeprately').is(":checked")) {
                vPreEMIInterest = 0;
            }

            if ($('#ProcessingFeesSeprately').is(":checked")) {
                vProcessingFeesTotal = 0;
            }

            if ($('#StampDutySeprately').is(":checked")) {
                vStampDutyTotal = 0;
            }

            vAdvanceAmount = $('#AdvanceAmount').val();

            $('#DisbursesAmount').val(parseFloat($('#ApprvedAmount').val()) - (+ parseFloat(vPreEMIInterest) + parseFloat(vProcessingFeesTotal) + parseFloat(vStampDutyTotal) + parseFloat(vAdvanceAmount)))
            $('#DisbursesAmount1').val(parseFloat($('#ApprvedAmount').val()) - (+ parseFloat(vPreEMIInterest) + parseFloat(vProcessingFeesTotal) + parseFloat(vStampDutyTotal) + parseFloat(vAdvanceAmount)))
        }


        $(document).on("change", '#Tenure,#DepositAmount', function () {
            Partpayment_doTotal();
        });


        function Partpayment_doTotal() {
            if ($('#DepositAmount').val() == undefined || $('#DepositAmount').val().length <= 0 || isNaN($('#DepositAmount').val())) {
                $('#DepositAmount').val('0.00');
            }
            if ($('#InterestNotCredited').val() == undefined || $('#InterestNotCredited').val().length <= 0 || isNaN($('#InterestNotCredited').val())) {
                $('#InterestNotCredited').val('0.00');
            }

            if ($('#OutStandingAmount').val() == undefined || $('#OutStandingAmount').val().length <= 0 || isNaN($('#OutStandingAmount').val())) {
                $('#OutStandingAmount').val('0.00');
            }
            $('#TotalAmount').val(Math.round( parseFloat($('#OutStandingAmount').val()) + parseFloat($('#InterestNotCredited').val()) - parseFloat($('#DepositAmount').val())),2);
        }
        
         $(document).on("change", '#InterestOccured,#PenaltyCharge,#PenaltyChargeWaveoff', function () {
            reConstruct_doTotal();
        });

        function reConstruct_doTotal() {
            if ($('#DueAmount').val() == undefined || $('#DueAmount').val().length <= 0 || isNaN($('#DueAmount').val())) {
                $('#DueAmount').val('0.00');
            }
            if ($('#InterestOccured').val() == undefined || $('#InterestOccured').val().length <= 0 || isNaN($('#InterestOccured').val())) {
                $('#InterestOccured').val('0.00');
            }
            if ($('#PenaltyCharge').val() == undefined || $('#PenaltyCharge').val().length <= 0 || isNaN($('#PenaltyCharge').val())) {
                $('#PenaltyCharge').val('0.00');
            }
            if ($('#PenaltyChargeWaveoff').val() == undefined || $('#PenaltyChargeWaveoff').val().length <= 0 || isNaN($('#PenaltyChargeWaveoff').val())) {
                $('#PenaltyChargeWaveoff').val('0.00');
            }

            $('#TotalAmount').val(parseFloat($('#DueAmount').val()) + parseFloat($('#InterestOccured').val()) + (parseFloat($('#PenaltyCharge').val()) - parseFloat($('#PenaltyChargeWaveoff').val())));
        }

</script>


@endsection