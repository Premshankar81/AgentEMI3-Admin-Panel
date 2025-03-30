<section class="content-header">
  <h1>Bank detail <small>[AMIT SARKAR]</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="{{route('admin.dashboard')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    <li><a href="{{route('admin.customer.index')}}">Customer List</a></li>
    <li><a href="{{route('admin.customer.edit',array('id' => $memberId))}}">Customer View</a></li>
    <li class="active">Bank detail</li>
  </ol>
</section>

<section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="nav-tabs-custom">
        <ul class="nav nav-tabs">
          <li class=""><a href="{{ route('admin.customer.edit.basicDetails',array('id' => $memberId)) }}">Basic Detail</a></li>
          <li class=""><a href="{{ route('admin.customer.address',array('id' => $memberId)) }}">Address</a></li>
          <li class="active"><a href="#" data-toggle="tab" aria-expanded="true">Bank Detail</a></li>
          <li class=""><a href="{{ route('admin.customer.professionDetail',array('id' => $memberId)) }}">Employement Detail</a></li>
          <li class=""><a href="{{ route('admin.customer.electricBillDetail',array('id' => $memberId)) }}">Electricity Bill Detail</a></li>
          <li class="">
            <a href="{{ route('admin.customer.mMemberNominee',array('id' => $memberId)) }}">Nominee </a>
          </li>
          <li class="">
            <a href="#" style="color:lightgray;cursor:initial;">Upload Documents</a>
          </li>
        </ul>
    <form id="update_form_bankdetails" method="post" name="update_form_bankdetails" action="{{ route('admin.customer.update_bankDetail') }}">
    {{csrf_field()}}
    <input type="hidden" name="member_id" id="member_id" value="{{$memberId}}" />
        <div class="tab-content">
          <div class="tab-pane active" id="memberinfo">
            <div class="box-body">
              <div class="form-horizontal">
                <div class="col-md-12">
                  <div class="form-group">
                    <label class="col-sm-4 control-label">IFSC Code</label>
                    <div class="col-sm-7">
                      <input class="form-control" id="ifsc_code" maxlength="40" name="ifsc_code" onkeyup="this.value = this.value.toUpperCase();" type="text"  autocomplete="off" value="{{ $bankDetail->ifsc_code ?? '' }}" required>
                    </div>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label class="col-sm-4 control-label">Bank Name</label>
                    <div class="col-sm-7">
                      <input class="form-control" value="{{ $bankDetail->bank_name ?? '' }}" id="bank_name" maxlength="40" name="bank_name" type="text"  autocomplete="off" required>
                    </div>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label class="col-sm-4 control-label">Address</label>
                    <div class="col-sm-7">
                      <input class="form-control" value="{{ $bankDetail->bank_address ?? '' }}" id="bank_address" maxlength="250" name="bank_address" type="text"  autocomplete="off" required>
                    </div>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label class="col-sm-4 control-label">Account Type </label>
                    <div class="col-sm-7">
                      <select class="form-control" id="account_type" name="account_type" required>
                        <option value="">Select Account Type</option>
                        <option value="saving" {{ (old('account_type', $bankDetail->account_type ?? '') == 'saving') ? 'selected' : '' }}>Saving</option>
                        <option value="current" {{ (old('account_type', $bankDetail->account_type ?? '') == 'current') ? 'selected' : '' }}>Current</option>
                    </select>
                    
                    </div>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label class="col-sm-4 control-label">Account No</label>
                    <div class="col-sm-7">
                      <input class="form-control"  id="account_no" maxlength="20" name="account_no" type="number"  autocomplete="off" value="{{ $bankDetail->account_no ?? '' }}" required>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="box-footer">
              <div class="col-xs-12 text-center ">
                <div class="form-group">
                  <input type="submit"  class="btn btn-flat btn-success" value="Save"/>
                  <a class="btn btn-flat btn-danger" href="{{route('admin.customer.edit',array('id' => $memberId))}}">Cancel</a>
                </div>
              </div>
            </div>
          </div>
        </div>


      </div>
    </div>
  </div>
</section>