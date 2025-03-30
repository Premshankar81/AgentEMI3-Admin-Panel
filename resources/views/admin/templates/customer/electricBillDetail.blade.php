<section class="content-header">
  <h1> Electricity Bill Detail </h1>
  <ol class="breadcrumb">
    <li><a href="{{route('admin.dashboard')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    <li><a href="{{route('admin.customer.index')}}">Customer List</a></li>
    <li><a href="{{route('admin.customer.edit',array('id' => $memberId))}}">Customer View</a></li>
    <li class="active">Electricity Bill Detail</li>
  </ol>
  </section>
  <section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="nav-tabs-custom">
        <ul class="nav nav-tabs">
          <li class=""><a href="{{ route('admin.customer.edit.basicDetails',array('id' => $memberId)) }}">Basic Detail</a></li>
          <li class=""><a href="{{ route('admin.customer.address',array('id' => $memberId)) }}">Address</a></li>
          <li class=""><a href="{{ route('admin.customer.bankDetail',array('id' => $memberId)) }}">Bank Detail</a></li>
          <li class=""><a href="{{ route('admin.customer.professionDetail',array('id' => $memberId)) }}">Employement Detail</a></li>
          <li class="active"><a href="#">Electricity Bill Detail</a></li>
          <li class=""><a href="{{ route('admin.customer.mMemberNominee',array('id' => $memberId)) }}">Nominee </a></li>
          <li class="">
            <a href="#" style="color:lightgray;cursor:initial;">Upload Documents</a>
          </li>
        </ul>
        <form id="update_form_electricBillDetail" method="POST" name="update_form_electricBillDetail" action="{{ route('admin.customer.electricBillDetail_update') }}">
        {{csrf_field()}}
        <input type="hidden" name="member_id" id="member_id" value="{{$memberId}}" />
  
        <div class="tab-content">
          <div class="tab-pane active" id="memberinfo">
            <div class="box-body">
              <div class="form-horizontal">
                <div class="col-md-12">
                  <div class="form-group">
                    <label class="col-sm-4 control-label">Meter No</label>
                    <div class="col-sm-7">
                      <input class="form-control" id="electric_meterno" maxlength="30" name="electric_meterno" type="text" value="{{$electric->electric_meterno??""}}" required>
                      
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-4 control-label">Consumer Id</label>
                    <div class="col-sm-7">
                      <input class="form-control" id="electric_consumer_id" maxlength="30" name="electric_consumer_id" type="text" value="{{$electric->electric_consumer_id??""}}" required>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-4 control-label">Bill Owner Name</label>
                    <div class="col-sm-7">
                      <input class="form-control" id="electric_owner_name" maxlength="30" name="electric_owner_name" type="text" value="{{$electric->electric_owner_name??""}}" required> 
                    </div>
                  </div>
                 
                  <div class="form-group">
                    <label class="col-sm-4 control-label">Relation with Owner</label>
                    <div class="col-sm-7">
                      <select class="form-control" id="electric_relation" name="electric_relation" required>
                        <option value="">Select Relation with Owner</option>
                        <option value="brother" {{ old('electric_relation', $electric->electric_relation ?? '') == 'brother' ? 'selected' : '' }}>Brother</option>
                        <option value="daughter" {{ old('electric_relation', $electric->electric_relation ?? '') == 'daughter' ? 'selected' : '' }}>Daughter</option>
                        <option value="father" {{ old('electric_relation', $electric->electric_relation ?? '') == 'father' ? 'selected' : '' }}>Father</option>
                        <option value="landlord" {{ old('electric_relation', $electric->electric_relation ?? '') == 'landlord' ? 'selected' : '' }}>Landlord</option>
                        <option value="mother" {{ old('electric_relation', $electric->electric_relation ?? '') == 'mother' ? 'selected' : '' }}>Mother</option>
                        <option value="sister" {{ old('electric_relation', $electric->electric_relation ?? '') == 'sister' ? 'selected' : '' }}>Sister</option>
                        <option value="son" {{ old('electric_relation', $electric->electric_relation ?? '') == 'son' ? 'selected' : '' }}>Son</option>
                        <option value="spouse" {{ old('electric_relation', $electric->electric_relation ?? '') == 'spouse' ? 'selected' : '' }}>Spouse</option>
                    </select>
                    
                    </div>
                  </div>
                  
                  <div class="form-group">
                    <label class="col-sm-4 control-label">Bill Date <span class="requiredfield">*</span>
                    </label>
                    <div class="col-sm-7">
                        <input class="form-control" id="electric_last_bill_date" name="electric_last_bill_date" type="date"  autocomplete="off" required>
                    </div>
                  </div>
  
                </div>
              </div>
            </div>
            <div class="box-footer">
              <div class="col-xs-12 text-center ">
                <div class="form-group">
                  <input type="submit"  class="btn btn-flat btn-success" value="Save" />
                  <a class="btn btn-flat btn-danger" href="#">Cancel</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </form>
  
  
  
      </div>
    </div>
  </div>
  </section>