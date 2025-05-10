<section class="content-header">
  <h1> {{$data['page_title']}}-[{{$row['account_no']}} ] <input id="returnUrl" name="returnUrl" type="hidden" value="" autocomplete="off">
  </h1>
  <ol class="breadcrumb">
    <li><a href="{{route('admin.dashboard')}}"><i class="fa fa-dashboard"></i> Dashboard </a></li>
    <li><a href="{{route('admin.recurringDeposit.manage',array('id' => $row['uuid']))}}">RD Account</a></li>
    <li class="active">{{$data['page_title']}}</li>
  </ol>
</section>
<form id="update_link_saving_account_form" method="post" name="update_link_saving_account_form" >
{{csrf_field()}}
<input type="hidden" name="update_id" id="update_id" value="{{$row['uuid']}}" />


<section class="content padding-top-0">
<div class="row">
<div class="col-md-6">
    <div class="box box-solid">
        <div class="box-header">
            <h3 class="box-title">Link Saving Account</h3>

        </div>
        <div class="box-body">
            <div class="form-group">
                <label class="col-sm-4 control-label">Saving Account (If any)</label>
                <div class="col-sm-7">
                    <select id="link_saving_account_id" name="link_saving_account_id" class="form-control selectpicker">
                      <option value="">Select Saving Account</option>
                      @foreach($SavingAccounts as $key => $SavingAccount)
                        <option <?php if($SavingAccount['id']==$row->link_saving_account_id) { echo "selected"; }  ?>  value="{{$SavingAccount['id']}}">{{$SavingAccount['account_no']}}</option>    
                      @endforeach
                    </select>
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
    </div>
</div>

<div class="col-md-6">
        <div class="box box-solid">
            <div class="box box-solid">
                <div class="box-header">
                    <div class="row" data-toggle="collapse" href="#SetupRules" role="button" aria-expanded="false">
                        <div class="col-md-12" style="padding-bottom:10px;">
                            <div class="alert alert-dismissible margin-top-10 margin-bottom-0">
                                <h4><i class="icon fa fa-info-circle"></i>Link Saving Account </h4>
                                <div id="SetupRules">
                                    <p class="ft-16">                                                   
                                        </p><ul>
                                            <li>Choose Saving Account by which you want to auto debit EMIs.</li>
                                            <li>Once you choose this feature whenever EMIs due in this account, will be auto deduct from selected saving account.</li>
                                            <li>If you want to remove linked saving account remove from here and save.</li>
                                        </ul>
                                    <p></p>                                               
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</section>
</form>