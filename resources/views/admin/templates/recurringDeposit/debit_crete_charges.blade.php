<section class="content-header">
    <h1>
        Debit/Credit Account
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{route('admin.dashboard')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="{{route('admin.recurringDeposit.manage',array('id' => $row['uuid']))}}">RD Account -{{$row->account_no}}</a></li>
        <li class="active">Debit/Credit Account</li>
    </ol>
</section>
<section class="content">
<div class="row">
<div class="col-md-6">
<div class="box box-solid">
<div class="box-header">
</div>

<form id="add_debit_crete_form" method="POST" name="add_debit_crete_form" autocomplete="off" >
{{csrf_field()}}

  <input type="hidden" name="update_id" id="update_id" value="{{$row['uuid']}}" />
     <input type="hidden" name="customer_id" value="{{$row['customer_id']}}" />
     <input type="hidden" name="account_id" value="{{$row['id']}}" />

<div class="box-body">
    <div class="form-horizontal">
        <div class="col-md-12">
            <p style="color:red;"><strong>Note:</strong>&nbsp;Please do not use this option to record any cash/bank receipt or payment. For cash/bank transactions only use deposit/withdrawal amount option.</p>
            <div class="form-group">
                <label class="col-sm-4 control-label">Date <span class="requiredfield">*</span></label>
                <div class="col-sm-7">
                    <div class="input-group date">
                        <div class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                        </div>
                        <input class="form-control" data-val="true" id="transaction_date" name="transaction_date" type="date">
                    </div>
                    <span class="field-validation-valid" data-valmsg-for="TransactionDate" data-valmsg-replace="true"></span>
                </div>
            </div>
        </div>
       
        <div class="col-md-12">
            <div class="form-group">
                <label class="col-sm-4 control-label">Debit/Credit <span class="requiredfield">*</span></label>
                <div class="col-sm-7">
                    <select class="form-control required" id="transaction_type" name="transaction_type">
	                	<option value="">Select</option>
						<option value="debit">Debit</option>
						<option value="credit">Credit</option>
					</select>
                </div>
            </div>
        </div>

        <div class="col-md-12">
            <div class="form-group">
                <label class="col-sm-4 control-label">Ledger's Name <span class="requiredfield">*</span></label>
                <div class="col-sm-7">
                    <select class="form-control" id="bank_ledger_id" name="bank_ledger_id"> <option value="">--Select Ledger's Name--</option>
                      @foreach ($Ledgers as $key => $Ledger)
                      <option value="{{$Ledger->id}}">{{$Ledger->title}}</option>
                      @endforeach
                      </select>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <label class="col-sm-4 control-label">Amount <span class="requiredfield">*</span></label>
                <div class="col-sm-7">
                    <input class="form-control" id="bank_amount" name="bank_amount" type="text" value="" autocomplete="off">
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <label class="col-sm-4 control-label">Narration</label>
                <div class="col-sm-7">
                    <input maxlength="100" class="form-control"  name="narration" type="text" value="" autocomplete="off">
                </div>
            </div>
        </div>
    </div>
</div>

<div class="box-footer">
    <div class="col-xs-12 text-center">
        <div class="form-group">
            <button type="submit" class="btn btn-flat btn-success">SAVE</button>
            <a class="btn btn-flat btn-danger" href="{{route('admin.recurringDeposit.manage',array('id' => $row['uuid']))}}">Cancel</a>
        </div>
    </div>
</div>

</form>

</div>
</div>
</div>
</section>