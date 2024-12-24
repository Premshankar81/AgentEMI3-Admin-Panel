<section class="content-header">
    <h1>
        Loan Agreement
    </h1>
    <ol class="breadcrumb">
        <li><a href="\{{route('admin.dashboard')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="{{route('admin.businessLoan.manage',array('id' => $row['uuid']))}}">Business Loan List</a></li>
        <li class="active">Loan Agreement</li>
    </ol>
</section>
 <form id="update_form_loanAgreemento" method="post" name="update_form_loanAgreemento" >
  {{csrf_field()}}
  <input type="hidden" name="update_id" id="update_id" value="{{$row['uuid']}}" />

<section class="content">
    <div class="box box-solid">
        <div class="box-header">
        </div>
        <div class="box-body">
            <div class="form-horizontal">
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="col-sm-4 control-label">Insurance Charge </label>
                        <div class="col-sm-7">
                            <input class="form-control"  id="insurance_charge" name="insurance_charge" type="text" value="{{$row['insurance_charge']}}" autocomplete="off">
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="col-sm-4 control-label">Credit Shield</label>
                        <div class="col-sm-7">
                            <input class="form-control numeric"id="credit_shield" name="credit_shield" type="text" value="{{$row['credit_shield']}}" autocomplete="off">
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="col-sm-4 control-label">Other Charge </label>
                        <div class="col-sm-7">
                            <input class="form-control" id="other_charge" name="other_charge" type="text" value="{{$row['other_charge']}}" autocomplete="off">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="box-footer">
            <div class="col-xs-12 text-center">
                <div class="form-group">
                    <button type="button" onclick="update_loanAgreement()" class="btn btn-flat btn-success">SAVE</button>
                    <a class="btn btn-flat btn-danger" href="{{route('admin.loanAgreement.doc',array('id' => $row['uuid']))}}">Loan Agreement</a>
                    <a class="btn btn-flat btn-danger" href="{{route('admin.businessLoan.manage',array('id' => $row['uuid']))}}">Cancel</a>
                </div>
            </div>
        </div>
    </div>
</section>
 </form> 