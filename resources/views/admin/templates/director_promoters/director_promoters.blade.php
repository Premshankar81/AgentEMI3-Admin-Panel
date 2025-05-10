@extends('admin.layouts.master-layout')

@section('styles')
<style>
    .displaynone {
    display: none!important;
}
</style>
@endsection

    @section('content')
        
        @if(Request::route()->getName() == 'admin.director_promoters.index') 
            @include('admin.templates.director_promoters.list')
        @endif
        

        @if(Request::route()->getName() == 'admin.director_promoters.create') 
            @include('admin.templates.director_promoters.add')
        @endif

        @if(Request::route()->getName() == 'admin.director_promoters.edit') 
            @include('admin.templates.director_promoters.update')
        @endif

        @if(Request::route()->getName() == 'admin.director_promoters.view') 
            @include('admin.templates.director_promoters.view')
        @endif

        @if(Request::route()->getName() == 'admin.director_promoters.address') 
            @include('admin.templates.director_promoters.address')
        @endif

        @if(Request::route()->getName() == 'admin.director_promoters.profession_detail') 
            @include('admin.templates.director_promoters.profession_detail')
        @endif

        @if(Request::route()->getName() == 'admin.director_promoters.bankDetail') 
            @include('admin.templates.director_promoters.bankdetail')
        @endif

        @if(Request::route()->getName() == 'admin.director_promoters.nominee') 
            @include('admin.templates.director_promoters.memberNominee')
        @endif
        

    @endsection

@section('scripts')

<script type="text/javascript">

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
});


function update_address()
{
    var form = $('#update_form_address')[0]; // You need to use standard javascript object here
    var formData = new FormData(form);
    var API_URL = "{{ route('admin.director_promoters.address-store') }}";
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


get_records()
function get_records()
{
  var API_URL = "{{ route('admin.director_promoters.list') }}";
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
     var API_URL = "{{ route('admin.director_promoters.store') }}";

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
         var API_URL = "{{ route('admin.director_promoters.update') }}";
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
            var API_URL = "{{ route('admin.director_promoters.delete') }}";
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
function update_professionDetail()
{
    var form = $('#update_form_professionDetail')[0]; // You need to use standard javascript object here
    var formData = new FormData(form);
    var API_URL = "{{ route('admin.director_promoters.profession_detail-store') }}";
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
        var API_URL = "{{ route('admin.director_promoters.bankDetail-store') }}";
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
        var API_URL = "{{ route('admin.director_promoters.nominee-store') }}";
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



$(function() {
$('#no_of_share').keyup(function() {
    var no_of_share = $('#no_of_share').val();
    var face_value = $('#face_value').val();
    var total_consideration = parseFloat(no_of_share) * parseFloat(face_value);
    $('#total_consideration').val(total_consideration);
}); 
}); 


        
</script>


@endsection