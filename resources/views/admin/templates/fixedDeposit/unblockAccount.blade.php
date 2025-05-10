<section class="content-header">
    <h1>
    Change Account Status
</h1>
<ol class="breadcrumb">
    <li><a href="{{route('admin.dashboard')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    <li><a href="{{route('admin.fixedDeposit.manage',array('id' => $row['uuid']))}}">FD Account -{{$row->account_no}}</a></li>
    <li class="active">Change Account Status</li>
</ol>
</section>

<form id="add_unblockAmount_form" method="POST" name="add_unblockAmount_form" autocomplete="off" >
{{csrf_field()}}

<input type="hidden" name="update_id" id="update_id" value="{{$row['uuid']}}" />

<section class="content padding-top-0">
<div class="row">
<div class="col-md-6">
    <div class="box box-solid">
        
        <div class="alert alert-dismissible margin-top-10 margin-bottom-0">
                <h4><i class="icon fa fa-info-circle"></i>Un-Block Account </h4>
                <p>Click on <strong>Un-Block Account</strong> to un-block this account.</p>
            </div>
<input class="form-control" id="back_url" name="back_url" type="hidden" value="{{route('admin.fixedDeposit.manage',array('id' => $row['uuid']))}}">
        <div class="box-footer">
            <div class="col-xs-12 text-center">
                <div class="form-group">
                    <button type="submit" class="btn btn-flat btn-success">Un-Block Account</button>
                    <a class="btn btn-flat btn-danger" href="{{route('admin.saving_account.manage',array('id' => $row['uuid']))}}">Cancel</a>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</section>
</form>