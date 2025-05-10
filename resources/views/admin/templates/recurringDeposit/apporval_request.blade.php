<section class="content-header">
    <h1>
        FD Account
            <small>[{{$row->application_no}}]</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{route('admin.dashboard')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="{{route('admin.recurringDeposit.index')}}">FD Account List</a></li>
        <li class="active">FD Account</li>
    </ol>
</section>
<section class="content padding-top-0">
<div class="row">
<form id="approved_recurringDeposit_form" method="post" name="approved_recurringDeposit_form" >
{{csrf_field()}}
<input type="hidden" name="update_id" id="update_id" value="{{$row['uuid']}}" />
<div class="col-md-6">
    <div class="box box-solid">
        <div class="box-header">
            <h3 class="box-title">Action</h3>
        </div>
        <div class="box-body">
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
        </div>
        <div class="box-footer">
            <div class="col-xs-12 text-center">
                <div class="form-group">
                    <button type="button" onclick="approved_recurringDeposit()" class="btn btn-flat btn-success">SUBMIT</button>
                    <a class="btn btn-danger" href="{{route('admin.recurringDeposit.index')}}" title="Cancel email setting">Cancel</a>
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
                        <td><a href="/Members/View/e342784e-e27e-4e65-a5b4-e5ba7e414c42" target="_blank"> {{@$row->customer->customer_code}} - {{@$row['customer']['name']}}</a></td>
                    </tr>
                    <tr>
                        <td>Scheme Name</td>
                        <td><a href="/SavingAccount/SchemeView/bcb412f5-df96-4110-a1af-000457c924c4" target="_blank"> {{@$row->RDscheme->scheme_code}} - {{@$row->RDscheme->name}} </a></td>
                    </tr>
                    
                    <tr>
                        <td>Associate's Name</td>
                        <td><a href="" target="_blank"> G00007 - aaaaa</a></td>
                    </tr>
                    <tr>
                        <td>RD Amount</td>
                        <td> {{@$row->rd_amount}}</td>
                    </tr>

                    <tr>
                        <td>Interest Rate</td>
                        <td>{{@$row->RDscheme->interest_rate}}</td>
                    </tr>

                    <tr>
                        <td>Interest Payout</td>
                        <td>Yearly</td>
                    </tr>


                    <tr>
                        <td>RD Frequency</td>
                        <td> {{@$row->rd_frequency}}</td>
                    </tr>
                    <tr>
                        <td>RD Tenure</td>
                        <td> {{@$row->rd_tenure}} Monthly</td>
                    </tr>

                    
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- <div class="col-md-12">
    <div class="box box-solid">
        <div class="box-header">
            <h3 class="box-title">Account Associated with this member</h3>
        </div>
        <div class="box-body">
            <table class="reporttable accountassociate">
                <thead>
                    <tr>
                        <th style="padding:5px;">
                            Branch Code
                        </th>
                        <th style="padding:5px;">
                            Application No
                        </th>
                        <th style="padding:5px;">
                            Account No
                        </th>
                        <th style="padding:5px;">
                            Account Date
                        </th>
                        <th style="padding:5px;">
                            Account Type
                        </th>

                        <th style="padding:5px;">
                            Member Role
                        </th>
                        <th style="padding:5px;text-align:right;">
                            Balance
                        </th>
                        <th style="padding:5px;">
                            Status
                        </th>
                    </tr>
                </thead>
                <tbody><tr><td style="padding:5px;">OMN00012</td><td style="padding:5px;">RSAA046169</td><td style="padding:5px;">9093034173738928</td><td style="padding:5px;">22/02/2023</td><td style="padding:5px;">Saving Account</td><td style="padding:5px;">Self</td><td style="padding:5px; text-align:right;">50933</td><td style="padding:5px;">Approved</td></tr><tr><td style="padding:5px;">OMN00012</td><td style="padding:5px;">RBLA046154</td><td style="padding:5px;">RBL73738870</td><td style="padding:5px;">22/02/2023</td><td style="padding:5px;">Business Loan</td><td style="padding:5px;">Self</td><td style="padding:5px; text-align:right;">-15057.69</td><td style="padding:5px;">Disbursed</td></tr><tr><td style="padding:5px;">OMN00012</td><td style="padding:5px;">RSAA046185</td><td style="padding:5px;">null</td><td style="padding:5px;"></td><td style="padding:5px;">Saving Account</td><td style="padding:5px;">Self</td><td style="padding:5px; text-align:right;">0</td><td style="padding:5px;">Pending</td></tr></tbody>
            </table>
        </div>
    </div>
</div> -->


            </div>
        </section>