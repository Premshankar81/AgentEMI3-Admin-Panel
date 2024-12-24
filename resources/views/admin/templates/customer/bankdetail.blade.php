<section class="content-header">
  <h1>Bank detail <small>[AMIT SARKAR]</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="{{route('admin.dashboard')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    <li><a href="{{route('admin.customer.index')}}">Customer List</a></li>
    <li><a href="{{route('admin.customer.edit',array('id' => $row['customer_id']))}}">Customer View</a></li>
    <li class="active">Bank detail</li>
  </ol>
</section>
<section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="nav-tabs-custom">
        <ul class="nav nav-tabs">
          <li class=""><a href="{{ route('admin.customer.manage',array('id' => $row['customer_id'])) }}">Basic Detail</a></li>
          <li class=""><a href="{{ route('admin.customer.address',array('id' => $row['customer_id'])) }}">Address</a></li>
          <li class="active"><a href="#" data-toggle="tab" aria-expanded="true">Bank Detail</a></li>
          <li class=""><a href="{{ route('admin.customer.professionDetail',array('id' => $row['customer_id'])) }}">Employement Detail</a></li>
          <li class=""><a href="{{ route('admin.customer.electricBillDetail',array('id' => $row['customer_id'])) }}">Electricity Bill Detail</a></li>
          <li class="">
            <a href="{{ route('admin.customer.mMemberNominee',array('id' => $row['customer_id'])) }}">Nominee </a>
          </li>
        </ul>
    <form id="update_form_bankdetails" method="post" name="update_form_bankdetails" >
    {{csrf_field()}}
    <input type="hidden" name="update_id" id="update_id" value="{{$row['customer_id']}}" />
        <div class="tab-content">
          <div class="tab-pane active" id="memberinfo">
            <div class="box-body">
              <div class="form-horizontal">
                <div class="col-md-12">
                  <div class="form-group">
                    <label class="col-sm-4 control-label">IFS Code</label>
                    <div class="col-sm-7">
                      <input class="form-control" id="ifsc_code" maxlength="40" name="ifsc_code" onkeyup="this.value = this.value.toUpperCase();" type="text"  autocomplete="off" value="{{$row['ifsc_code']}}">
                    </div>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label class="col-sm-4 control-label">Bank Name</label>
                    <div class="col-sm-7">
                      <input class="form-control" value="{{$row['bank_name']}}" id="bank_name" maxlength="40" name="bank_name" type="text"  autocomplete="off">
                    </div>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label class="col-sm-4 control-label">Address</label>
                    <div class="col-sm-7">
                      <input class="form-control" value="{{$row['bank_address']}}" id="bank_address" maxlength="250" name="bank_address" type="text"  autocomplete="off">
                    </div>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label class="col-sm-4 control-label">Account Type </label>
                    <div class="col-sm-7">
                      <select class="form-control" id="account_type" name="account_type">
                        <option value="">Select Account Type</option>
                        <option <?php if($row['account_type'] == 'saving') { echo "selected"; } ?> value="saving">Saving</option>
                        <option <?php if($row['account_type'] == 'current') { echo "selected"; } ?> value="current">Current</option>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label class="col-sm-4 control-label">Account No</label>
                    <div class="col-sm-7">
                      <input class="form-control" value="{{$row['account_no']}}" id="account_no" maxlength="20" name="account_no" type="text"  autocomplete="off">
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="box-footer">
              <div class="col-xs-12 text-center ">
                <div class="form-group">
                  <button type="button" onclick="update_bankdetail()"  class="btn btn-flat btn-success">SAVE</button>
                  <a class="btn btn-flat btn-danger" href="{{route('admin.customer.edit',array('id' => $row['customer_id']))}}">Cancel</a>
                </div>
              </div>
            </div>
          </div>
        </div>


      </div>
    </div>
  </div>
</section>