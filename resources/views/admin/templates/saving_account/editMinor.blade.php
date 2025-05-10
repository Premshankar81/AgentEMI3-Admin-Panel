<section class="content-header">
        <h1>
            Saving Account
                <small>[ {{$row->account_no}} ]</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{route('admin.dashboard')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="{{route('admin.saving_account.manage',array('id' => $row['uuid']))}}">Saving Account -{{$row->account_no}}</a></li>
            <li class="active">Add/Edit Minor detail</li>
            
        </ol>
    </section>
    <form id="update_minor_form" method="post" name="update_minor_form" >
        {{csrf_field()}}
        <input type="hidden" name="update_id" id="update_id" value="{{$row['uuid']}}" />
    

        <section class="content padding-top-0">
            <div class="row">
                <div class="col-md-6">
                    <div class="box box-solid">
                        <div class="box-header">
                            <h3 class="box-title">Add/Edit Minor detail</h3>

                        </div>
                        <div class="box-body">
                            <div class="form-group">
                                <label class="col-sm-4 control-label">Minor detail (If any)</label>
                                <div class="col-sm-7">
                                    <select id="update_minor_id" name="update_minor_id" class="form-control selectpicker">
                                      <option value="">Select Minor detail</option>
                                      @foreach($Members as $key => $Member)
                                        <option <?php if($Member['id']==$row->minor_id) { echo "selected"; }  ?> data-closing_balance="{{$Member['closing_balance']}}"  value="{{$Member['id']}}">{{$Member['name']}}</option>    
                                      @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="box-footer">
                            <div class="col-xs-12 text-center">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-flat btn-success">SAVE</button>
                                    <a class="btn btn-flat btn-danger" href="{{route('admin.saving_account.manage',array('id' => $row['uuid']))}}">Cancel</a>
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
                                            <h4><i class="icon fa fa-info-circle"></i>Add/Edit Minor detail</h4>
                                            <div id="SetupRules">
                                                <p class="ft-16">
                                                    </p><ul>
                                                        <li>Choose Minor name to set as Minor account.</li>
                                                        <li>If want to convert Account type from Minor remove from list and save..</li>
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