<section class="content-header">
    <h1>
    Change Account Status
</h1>
<ol class="breadcrumb">
    <li><a href="{{route('admin.dashboard')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    <li><a href="{{route('admin.saving_account.manage',array('id' => $row['uuid']))}}">Saving Account -{{$row->account_no}}</a></li>
    <li class="active">Change Account Status</li>
</ol>
</section>

<form id="add_blockAmount_form" method="POST" name="add_blockAmount_form" autocomplete="off" >
{{csrf_field()}}

<input type="hidden" name="update_id" id="update_id" value="{{$row['uuid']}}" />

<section class="content padding-top-0">
<div class="row">
<div class="col-md-6">
    <div class="box box-solid">
        
        <div class="box-body">
            <div class="row" data-toggle="collapse" href="#SetupRules" role="button" aria-expanded="true">
                <div class="col-md-12" style="padding-bottom:10px;">
                    <div class="alert alert-dismissible margin-top-10 margin-bottom-0">
                        <h4><i class="icon fa fa-info-circle"></i>Block Account </h4>
                        <div id="SetupRules" aria-expanded="true" class="collapse in" style="">
                            <p class="ft-16">
                                A blocked account generally refers to a financial account that has some limitations or restrictions placed upon it, temporarily or permanently, which can occur for various reasons and rationales.
                                </p><ul style="text-align:justify;">
                                    <li>
                                        Blocked accounts restrict account owners from use of their funds in that account.
                                    </li>
                                    <li>
                                        Accounts may be blocked or limited for a variety of reasons, including internal bank policies, external regulations, or via a court order or legal decision.
                                    </li>
                                    <li>An account that has become completely blocked is referred to as a frozen account.</li>

                                </ul>
                            <p></p>
                            <p>Click on <strong>Block Account</strong> to block this account.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label class="col-sm-4 control-label">Reason for blocking</label>
                    <div class="col-sm-8">
                        <input class="form-control" id="block_reason" name="block_reason" type="text"  autocomplete="off">
                        <input class="form-control" id="back_url" name="back_url" type="hidden" value="{{route('admin.saving_account.manage',array('id' => $row['uuid']))}}">
                        
                    </div>
                </div>
            </div>

        </div>
        <div class="box-footer">
            <div class="col-xs-12 text-center">
                <div class="form-group">
                    <button type="submit" class="btn btn-flat btn-success">Block Account</button>
                    <a class="btn btn-flat btn-danger" href="{{route('admin.saving_account.manage',array('id' => $row['uuid']))}}">Cancel</a>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</section>
</form>