<section class="content-header">
    <h1>
        {{$data['page_title']}}
            <small>[{{$row->application_mo}}]</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{route('admin.dashboard')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="{{route('admin.recurringDeposit.index')}}">{{$data['page_title']}} List</a></li>
        <li class="active">{{$data['page_title']}}</li>
    </ol>
</section>
<section class="content padding-top-0">
<div class="row">
<form id="approved_businessLoan_form" method="post" name="approved_businessLoan_form" >
{{csrf_field()}}
<input type="hidden" name="update_id" id="update_id" value="{{$row['uuid']}}" />
<div class="col-md-6">
    <div class="box box-solid">
        <div class="box-header">
            <h3 class="box-title">Action</h3>
        </div>
        <div class="box-body">

 <div class="form-horizontal">
     
       <div class="form-group">
            <label class="col-sm-4 control-label">First EMI Date <span class="requiredfield">*</span></label>
            <div class="col-sm-7">
                <input  class="form-control" name="first_emi_date" id="first_emi_date" type="date" value="<?= date('Y-m-d') ?>" >
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-4 control-label">Requested Amount <span class="requiredfield">*</span></label>
            <div class="col-sm-7">
                <input class="form-control" readonly="readonly" type="text" value="{{$row->loan_amount_requested}}">
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-4 control-label">Approved Amount <span class="requiredfield">*</span></label>
            <div class="col-sm-7">
                <input class="form-control" id="approved_amount" name="approved_amount" type="text">
            </div>
        </div>

         <div class="form-group">
            <label class="col-sm-4 control-label">Status <span class="requiredfield">*</span></label>
                <div class="col-sm-7">
                    <select class="form-control  required" id="status" name="status"><option value=""></option>
                        <option <?php if($row->status =='pending') { echo "selected"; } ?> value="pending">Pending</option>
                        <option <?php if($row->status =='approved') { echo "selected"; } ?> value="approved">Approved</option>
                        <option <?php if($row->status =='reject') { echo "selected"; } ?> value="reject">Not Approved</option>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-4 control-label">Remarks</label>
                <div class="col-sm-7">
                    <input class="form-control " id="approval_remarks" name="approval_remarks" type="text">
                </div>
            </div>

        </div>


        </div>
        <div class="box-footer">
            <div class="col-xs-12 text-center">
                <div class="form-group">
                    <button type="button" onclick="approved_businessLoan()" class="btn btn-flat btn-success">SUBMIT</button>
                    <a class="btn btn-danger" href="{{route('admin.businessLoan.index')}}" title="Cancel email setting">Cancel</a>
                </div>
            </div>
        </div>
    </div>
</div>
</form>

<div class="col-md-6">
    <div class="box box-solid">
        <div class="box-header">
            <h3 class="box-title">Account details</h3>
        </div>
        <div class="box-body">
            <table class="table table-hover">
                <tbody>
                    <tr>
                        <td>Application No.</td>
                        <td>[{{$row->application_mo}}]</td>
                    </tr>
                    <tr>
                        <td>Application Date</td>
                        <td> {{Helper::getFromDate($row->application_date)}}</td>
                    </tr>
                    <tr>
                        <td>Customer's Name</td>
                        <td><a href="{{route('admin.customer.edit',array('id' => @$row['customer']['customer_id']))}}" target="_blank"> {{@$row->customer->customer_code}} - {{@$row['customer']['name']}}</a></td>
                    </tr>
                    <tr>
                        <td>Scheme Name</td>
                        <td><a href="{{route('admin.loanScheme.view',array('id' => $row->Loanscheme->unique_code))}}" target="_blank"> {{@$row->Loanscheme->scheme_code}} - {{@$row->Loanscheme->name}} </a></td>
                    </tr>
                   
                    <tr>
                        <td>Loan Amount Request</td>
                        <td> {{@$row->loan_amount_requested}}</td>
                    </tr>
                    <tr>
                        <td>Nature of Business</td>
                        <td> {{@$row->nature_of_business}}</td>
                    </tr>
                    <tr>
                        <td>Purpose Of Loan</td>
                        <td> {{@$row->purpose_of_loan}}</td>
                    </tr>



                    
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="col-md-12">
    <div class="box box-solid">
        <div class="box-header">
            <h3 class="box-title">Account Associated with this member</h3>
        </div>
        <div class="box-body">
            <table class="reporttable accountassociate table">
                <thead>
                    <tr>
                        <th style="padding:5px;">Branch Code</th>
                        <th style="padding:5px;">Application No</th>
                        <th style="padding:5px;">Account No</th>
                        <th style="padding:5px;">Account Date</th>
                        <th style="padding:5px;">Account Type</th>
                        <th style="padding:5px;">Member Role</th>
                        <th style="padding:5px;text-align:right;">Balance</th>
                        <th style="padding:5px;">Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($AccountAssociatedRows as $key => $AccountAssociatedRow): ?>
                        <tr>
                        <td>{{$AccountAssociatedRow['branch_code']}}</td>
                        <td>{{$AccountAssociatedRow['application_no']}}</td>
                        <td>{{$AccountAssociatedRow['account_no']}}</td>
                        <td>{{$AccountAssociatedRow['account_date']}}</td>
                        <td>{{$AccountAssociatedRow['account_type']}}</td>
                        <td>{{$AccountAssociatedRow['member_role']}}</td>
                        <td>{{$AccountAssociatedRow['balance']}}</td>
                        <td>{{$AccountAssociatedRow['status']}}</td>
                    </tr>    
                    <?php endforeach ?>
                    
                </tbody>
            </table>
        </div>
    </div>
</div>

    </div>
</section>