<section class="content-header">
<h1> Electricity Bill Detail </h1>
<ol class="breadcrumb">
  <li><a href="{{route('admin.dashboard')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
  <li><a href="{{route('admin.customer.index')}}">Customer List</a></li>
  <li><a href="{{route('admin.customer.edit',array('id' => $row['customer_id']))}}">Customer View</a></li>
  <li class="active">Electricity Bill Detail</li>
</ol>
</section>
<section class="content">
<div class="row">
  <div class="col-md-12">
    <div class="nav-tabs-custom">
      <ul class="nav nav-tabs">
        <li class=""><a href="{{ route('admin.customer.manage',array('id' => $row['customer_id'])) }}">Basic Detail</a></li>
        <li class=""><a href="{{ route('admin.customer.address',array('id' => $row['customer_id'])) }}">Address</a></li>
        <li class=""><a href="{{ route('admin.customer.bankDetail',array('id' => $row['customer_id'])) }}">Bank Detail</a></li>
        <li class=""><a href="{{ route('admin.customer.professionDetail',array('id' => $row['customer_id'])) }}">Employement Detail</a></li>
        <li class=""><a href="#">Electricity Bill Detail</a></li>
        <li class=""><a href="{{ route('admin.customer.mMemberNominee',array('id' => $row['customer_id'])) }}">Nominee </a></li>
      </ul>
      <form id="update_form_electricBillDetail" method="post" name="update_form_electricBillDetail" >
      {{csrf_field()}}
      <input type="hidden" name="update_id" id="update_id" value="{{$row['customer_id']}}" />

      <div class="tab-content">
        <div class="tab-pane active" id="memberinfo">
          <div class="box-body">
            <div class="form-horizontal">
              <div class="col-md-12">
                <div class="form-group">
                  <label class="col-sm-4 control-label">Meter No</label>
                  <div class="col-sm-7">
                    <input class="form-control" id="electric_meterno" maxlength="30" name="electric_meterno" type="text" value="{{$row['electric_meterno']}}">
                    
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-4 control-label">Consumer Id</label>
                  <div class="col-sm-7">
                    <input class="form-control" id="electric_consumer_id" maxlength="30" name="electric_consumer_id" type="text" value="{{$row['electric_consumer_id']}}">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-4 control-label">Bill Owner Name</label>
                  <div class="col-sm-7">
                    <input class="form-control" id="electric_owner_name" maxlength="30" name="electric_owner_name" type="text" value="{{$row['electric_owner_name']}}"> 
                  </div>
                </div>
               
                <div class="form-group">
                  <label class="col-sm-4 control-label">Relation with Owner</label>
                  <div class="col-sm-7">
                    <select class="form-control " id="electric_relation" name="electric_relation">
                      <option value="">Select Relation with Owner </option>
                      <option <?php if($row['electric_relation'] == 'brother') { echo "selected"; } ?> value="brother">Brother</option>
                      <option <?php if($row['electric_relation'] == 'daughter') { echo "selected"; } ?> value="daughter">Daughter</option>
                      <option <?php if($row['electric_relation'] == 'father') { echo "selected"; } ?> value="father">Father</option>
                      <option <?php if($row['electric_relation'] == 'landlord') { echo "selected"; } ?> value="landlord">Landlord</option>
                      <option <?php if($row['electric_relation'] == 'mother') { echo "selected"; } ?> value="mother">Mother</option>
                      <option <?php if($row['electric_relation'] == 'sister') { echo "selected"; } ?> value="sister">Sister</option>
                      <option <?php if($row['electric_relation'] == 'son') { echo "selected"; } ?> value="son">Son</option>
                      <option <?php if($row['electric_relation'] == 'spouse') { echo "selected"; } ?> value="spouse">Spouse</option>
                    </select>
                  </div>
                </div>
                
                <div class="form-group">
                  <label class="col-sm-4 control-label">Bill Date <span class="requiredfield">*</span>
                  </label>
                  <div class="col-sm-7">
                      <input class="form-control" id="electric_last_bill_date" name="electric_last_bill_date" type="date" value="{{$row['electric_last_bill_date']}}" autocomplete="off">
                  </div>
                </div>

              </div>
            </div>
          </div>
          <div class="box-footer">
            <div class="col-xs-12 text-center ">
              <div class="form-group">
                <button type="button" onclick="update_electricBillDetail()" class="btn btn-flat btn-success">SAVE</button>
                <a class="btn btn-flat btn-danger" href="/Members/View/eca42d66-a7df-4570-b28a-2fa5c03cdb3e">Cancel</a>
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