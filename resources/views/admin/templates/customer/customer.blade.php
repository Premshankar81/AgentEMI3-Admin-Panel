@extends('admin.layouts.master-layout')

@section('styles')
<style>
    .form-horizontal .control-label {
    padding-top: 7px;
    margin-bottom: 0;
    text-align: left;
}
.displaynone {
    display: none!important;
}
.reporttable {
    font-family: Calibri;
    border-collapse: collapse;
    font-weight: 400;
    font-size: 11px;
    line-height: 1.42857143;
    color: #333;
    width: 100%;
}

    .reporttable td, .reporttable th {
        border: 1px solid #ddd;
        padding: 2px;
    }

    .reporttable th {
        padding-top: 12px;
        padding-bottom: 12px;
        text-align: left;
        background-color: #f2f2f2;
    }
</style>

@endsection

    @section('content')
        @if(Request::route()->getName() == 'admin.customer.create') 
            @include('admin.templates.customer.add')
        @endif

        @if(Request::route()->getName() == 'admin.customer.index') 
            @include('admin.templates.customer.list')
        @endif

        @if(Request::route()->getName() == 'admin.customer.edit') 
            @include('admin.templates.customer.update')
        @endif

        @if(Request::route()->getName() == 'admin.customer.manage') 
            @include('admin.templates.customer.basic_info')
        @endif

        @if(Request::route()->getName() == 'admin.customer.address') 
            @include('admin.templates.customer.address')
        @endif

        @if(Request::route()->getName() == 'admin.customer.bankDetail') 
            @include('admin.templates.customer.bankdetail')
        @endif

        @if(Request::route()->getName() == 'admin.customer.professionDetail') 
            @include('admin.templates.customer.profession_detail')
        @endif
        
        @if(Request::route()->getName() == 'admin.customer.electricBillDetail') 
            @include('admin.templates.customer.electricBillDetail')
        @endif

        @if(Request::route()->getName() == 'admin.customer.mMemberNominee') 
            @include('admin.templates.customer.memberNominee')
        @endif

        @if(Request::route()->getName() == 'admin.customer.KYCManage') 
            @include('admin.templates.customer.KYCManage')
        @endif

        @if(Request::route()->getName() == 'admin.customer.welcomeLetter') 
            @include('admin.templates.customer.welcomeLetter')
        @endif

        @if(Request::route()->getName() == 'admin.customer.applicationForm') 
            @include('admin.templates.customer.applicationForm')
        @endif

        @if(Request::route()->getName() == 'admin.templates.customer.MemberShipFeeDetail') 
            @include('admin.templates.customer.MemberShipFeeDetail')
        @endif

        @if(Request::route()->getName() == 'admin.customer.MemberShipFee') 
            @include('admin.templates.customer.MemberShipFeeManage')
        @endif

        @if(Request::route()->getName() == 'admin.customer.ShareCertificateDetails') 
            @include('admin.templates.customer.ShareCertificateDetails')
        @endif

        
        

    @endsection

@section('scripts')



<script type="text/javascript">

selectPickerInitialize('present_state_id');
selectPickerInitialize('permanent_state_id');

selectPickerInitialize('cust_prof_state_id');
selectPickerInitialize('cust_prof_city_id');

selectPickerInitialize('class_id');

$().ready(function() {

    $("#add_form").validate({
        rules: {
            name: "required",
            mobile: "required"
        },
        messages: {
            name: {
                required: "Please enter a name ",
            },
            mobile: {
                required: "Please enter a Mobile ",
            }
        },
         submitHandler: function(form) {
            add_row(form);
        }
    });

    $("#add_member_ship").validate({
        rules: {
            transation_date: "required",
            amount: "required"
        },
        messages: {
            transation_date: {
                required: "Please select transation date ",
            },
            amount: {
                required: "Please enter a amount ",
            }
        },
         submitHandler: function(form) {
            add_member_ship(form);
        }
    });

});

function add_member_ship(form)
{
     var formData = new FormData(form);
     var API_URL = "{{ route('admin.customer.MemberShipFee_add') }}";

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
                    $('#add_member_ship')[0].reset();
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


function add_row(form)
{
     var formData = new FormData(form);
     var API_URL = "{{ route('admin.customer.store') }}";

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

    get_records()
    function get_records()
    {
      var API_URL = "{{ route('admin.customer.list') }}";
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

            $('#customer_code').val(response["code"]['customer_code']);
            $('#folio_number').val(response["code"]['folio_code']);
         }
      });
    }


     function update_row()
     {
         var form = $('#update_form')[0]; // You need to use standard javascript object here
         var formData = new FormData(form);
         var API_URL = "{{ route('admin.customer.update') }}";
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

    function update_address()
    {
        var form = $('#update_form_address')[0]; // You need to use standard javascript object here
        var formData = new FormData(form);
        var API_URL = "{{ route('admin.customer.update_address') }}";
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
                    }else{
                        error_notification(data['msg'])
                    }
                },
                error: function (data) {
                    alert('server unavailable');
                }
            });
    }

    function update_bankdetail()
    {
        var form = $('#update_form_bankdetails')[0]; // You need to use standard javascript object here
        var formData = new FormData(form);
        var API_URL = "{{ route('admin.customer.update_bankDetail') }}";
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
                    }else{
                        error_notification(data['msg'])
                    }
                },
                error: function (data) {
                    alert('server unavailable');
                }
            });
    }

    function update_professionDetail()
    {
        var form = $('#update_form_professionDetail')[0]; // You need to use standard javascript object here
        var formData = new FormData(form);
        var API_URL = "{{ route('admin.customer.professionDetail_update') }}";
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
        var API_URL = "{{ route('admin.customer.mMemberNominee_update') }}";
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

    function update_electricBillDetail()
    {
        var form = $('#update_form_electricBillDetail')[0]; // You need to use standard javascript object here
        var formData = new FormData(form);
        var API_URL = "{{ route('admin.customer.electricBillDetail_update') }}";
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
                    }else{
                        error_notification(data['msg'])
                    }
                },
                error: function (data) {
                    alert('server unavailable');
                }
            });
    }

    function update_KYCManage()
    {
        var form = $('#update_form_KYCManage')[0]; // You need to use standard javascript object here
        var formData = new FormData(form);
        var API_URL = "{{ route('admin.customer.KYCManage_update') }}";
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
        var API_URL = "{{ route('admin.customer.delete') }}";
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

 function delete_MemberShipFee_row(update_id) {

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
                var API_URL = "{{ route('admin.MemberShipFee.delete') }}";
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

function present_getCity_ByState()
{
   var state_id = $('#present_state_id').val();
   var API_URL = "{{ route('admin.get-city-fron-state') }}";
      $.ajax({
          url: API_URL,
          type: 'POST',
          data: {'state_id': state_id,'_token': '{!! csrf_token() !!}'},
          async: false,
          dataType: 'json',
          success: function (response) {
            $('#present_city_id').find('option:not(:first)').remove();
              $.each(response,function(index,data){
                 $('#present_city_id').append('<option value="'+data['id']+'">'+data['title']+'</option>');
             });
             selectPickerInitialize('present_city_id');
          },
          error: function (data) {
              alert('server unavailable');
          }
      });
}


function permanent_getCity_ByState()
{
   var state_id = $('#permanent_state_id').val();
   var API_URL = "{{ route('admin.get-city-fron-state') }}";
      $.ajax({
          url: API_URL,
          type: 'POST',
          data: {'state_id': state_id,'_token': '{!! csrf_token() !!}'},
          async: false,
          dataType: 'json',
          success: function (response) {
            $('#permanent_city_id').find('option:not(:first)').remove();
              $.each(response,function(index,data){
                 $('#permanent_city_id').append('<option value="'+data['id']+'">'+data['title']+'</option>');
             });
             selectPickerInitialize('permanent_city_id');
          },
          error: function (data) {
              alert('server unavailable');
          }
      });
}

function cust_prof_getCity_ByState()
{
   var state_id = $('#cust_prof_state_id').val();
   var API_URL = "{{ route('admin.get-city-fron-state') }}";
      $.ajax({
          url: API_URL,
          type: 'POST',
          data: {'state_id': state_id,'_token': '{!! csrf_token() !!}'},
          async: false,
          dataType: 'json',
          success: function (response) {
            $('#cust_prof_city_id').find('option:not(:first)').remove();
              $.each(response,function(index,data){
                 $('#cust_prof_city_id').append('<option value="'+data['id']+'">'+data['title']+'</option>');
             });
             selectPickerInitialize('cust_prof_city_id');
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
    $('#items_ui').append('<div id="member_nominee_forimagerow" class="box-body item-row" style="border-bottom: solid 1px rgba(0, 0, 0, 0.2);">'+
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
                    '<div class="clearfix"></div>'+
                    '<h4>'+
                      '<strong>KYC Information:</strong>'+
                    '</h4>'+
                    '<div class="col-md-6">'+
                      '<div class="form-group">'+
                        '<label class="col-sm-4 control-label">AADHAR No</label>'+
                        '<div class="col-sm-7">'+
                          '<input class="form-control" id="nominee_aadhar_no" maxlength="12" name="nominee_aadhar_no[]" type="text" value="">'+
                        '</div>'+
                      '</div>'+
                    '</div>'+
                    '<div class="col-md-6">'+
                      '<div class="form-group">'+
                        '<label class="col-sm-4 control-label">PAN</label>'+
                        '<div class="col-sm-7">'+
                          '<input class="form-control" id="nominee_pan" maxlength="10" name="nominee_pan[]" onkeyup="this.value = this.value.toUpperCase();" type="text">'+
                          
                        '</div>'+
                      '</div>'+
                   '</div>'+
                    '<div class="col-md-6">'+
                      '<div class="form-group">'+
                        '<label class="col-sm-4 control-label">Voter ID No</label>'+
                        '<div class="col-sm-7">'+
                          '<input class="form-control" id="nominee_voter_id" maxlength="30" name="nominee_voter_id[]" type="text">'+
                        '</div>'+
                      '</div>'+
                    '</div>'+
                    '<div class="col-md-6">'+
                      '<div class="form-group">'+
                        '<label class="col-sm-4 control-label">Ration Card No</label>'+
                        '<div class="col-sm-7">'+
                          '<input class="form-control" id="nominee_ration_card" maxlength="30" name="nominee_ration_card[]" type="text">'+
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
</script>

<script>
    jQuery('#btnPrint').on("click", function () {
        print_page("printDiv")
    });

     function print_page(argument) {
            $("#printDiv").printThis({
                debug: false,
                importCSS: false,
                importStyle: false,
                printContainer: false,
                pageTitle: "",
                removeInline: false,
                printDelay: 333,
                header: null,
                footer: null,                
                formValues: true                
            });
        }
  function CopyAddress() {      
            $('#PermanentResidenceType').val($('#residense_type').val());
            $('#permanent_residence_type').val($('#present_residence_type').val());
            $('#permanent_address1').val($('#present_address1').val());
            $('#permanent_address2').val($('#present_address2').val());
            
            $('#permanent_area').val($('#present_area').val());
            $('#permanent_ward').val($('#present_ward').val());
            $('#permanent_pin_code').val($('#present_pin_code').val());
            
             var city = $('#present_city_id').val();            
            var state = $('#present_state_id').val();
            $("#permanent_state_id").val(state);
            permanent_getCity_ByState()
            selectPickerInitialize('permanent_state_id');
            $("#permanent_city_id").val(city);
            selectPickerInitialize('permanent_city_id');
            $("#cbpermanentstate").change();            
        }

      $(document).on("change", '#AllocateShareMemberCreation_PaymentMode', function () {
            if ($("#PaymentMode").val() != "") {
                if ($("#AllocateShareMemberCreation_PaymentMode").val() == "Cash") {
                    $("#AllocateShareMemberCreation_ChequeDetailDiv").addClass("displaynone");
                    $("#AllocateShareMemberCreation_OnlineDetailDiv").addClass("displaynone");
                    $("#AllocateShareMemberCreation_bankaccountdiv").addClass("displaynone");
                    $("#AllocateShareMemberCreation_CurrencyDenominationDiv").removeClass("displaynone");
                }
                else if ($("#AllocateShareMemberCreation_PaymentMode").val() == "Cheque") {
                    $("#AllocateShareMemberCreation_ChequeDetailDiv").removeClass("displaynone");
                    $("#AllocateShareMemberCreation_bankaccountdiv").removeClass("displaynone");
                    $("#AllocateShareMemberCreation_OnlineDetailDiv").addClass("displaynone");
                    $("#AllocateShareMemberCreation_CurrencyDenominationDiv").addClass("displaynone");
                }
                else if ($("#AllocateShareMemberCreation_PaymentMode").val() == "Online Transfer") {
                    $("#AllocateShareMemberCreation_OnlineDetailDiv").removeClass("displaynone");
                    $("#AllocateShareMemberCreation_bankaccountdiv").removeClass("displaynone");
                    $("#AllocateShareMemberCreation_ChequeDetailDiv").addClass("displaynone");
                    $("#AllocateShareMemberCreation_CurrencyDenominationDiv").addClass("displaynone");
                }
            }
        });

      $(document).on("change", '#MemberShipFees_PaymentMode', function () {
            if ($("#PaymentMode").val() != "") {
                if ($("#MemberShipFees_PaymentMode").val() == "Cash") {
                    $("#MemberShipFees_ChequeDetailDiv").addClass("displaynone");
                    $("#MemberShipFees_OnlineDetailDiv").addClass("displaynone");
                    $("#MemberShipFees_bankaccountdiv").addClass("displaynone");
                    $("#MemberShipFees_CurrencyDenominationDiv").removeClass("displaynone");
                }
                else if ($("#MemberShipFees_PaymentMode").val() == "Cheque") {
                    $("#MemberShipFees_ChequeDetailDiv").removeClass("displaynone");
                    $("#MemberShipFees_bankaccountdiv").removeClass("displaynone");
                    $("#MemberShipFees_OnlineDetailDiv").addClass("displaynone");
                    $("#MemberShipFees_CurrencyDenominationDiv").addClass("displaynone");
                }
                else if ($("#MemberShipFees_PaymentMode").val() == "Online Transfer") {
                    $("#MemberShipFees_OnlineDetailDiv").removeClass("displaynone");
                    $("#MemberShipFees_bankaccountdiv").removeClass("displaynone");
                    $("#MemberShipFees_ChequeDetailDiv").addClass("displaynone");
                    $("#MemberShipFees_CurrencyDenominationDiv").addClass("displaynone");
                }
            }
        });

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

</script>
@endsection