<section class="content-header">
<h1>
    Update Associate Information
        <small>[ {{$row->account_no}} ]</small>
</h1>
<ol class="breadcrumb">
    <li><a href="{{route('admin.dashboard')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    <li><a href="{{route('admin.saving_account.manage',array('id' => $row['uuid']))}}">Manage Account</a></li>
    <li class="active">Update Associate Information</li>
</ol>
</section>

<section class="content">
            <div class="row">
                <div class="col-md-12" style="padding-bottom:10px;">
                    <div class="alert alert-danger alert-dismissible margin-top-10 margin-bottom-0">
                        <h4><i class="icon fa fa-ban"></i> ALERT!</h4>
                        <p class="ft-16">Note :-System will calculate agent commission for newly assigend Associate.</p>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="box box-info">
                        <div class="box-header">
                            <h3 class="box-title">Current Associate Information</h3>
                            <div class="pull-right">

                            </div>
                        </div>
                        <div class="box-body">
                            <table class="table table-hover">
                                <tbody>
                                    <tr>
                                        <td>Account No.</td>
                                        <td>{{$row->account_no}}</td>
                                    </tr>
                                    <tr>
                                        <td>Account Date</td>
                                        <td>{{Helper::getFromDate($row['created_at'])}}</td>
                                    </tr>
                                    <tr>
                                        <td>Application No.</td>
                                        <td>{{$row->application_mo}}</td>
                                    </tr>
                                    <tr>
                                        <td>Application Date</td>
                                        <td> {{Helper::getFromDate($row['application_date'])}}</td>
                                    </tr>
                                    <tr>
                                        <td>Associate</td>
                                        <td><a href="/Agents/View/7dbc3ae0-756c-45a9-affa-377977e9859e" target="_blank">{{$row->agent->name}} ( {{$row->agent->agent_code}} )</a> </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="box box-info">
                        <div class="box-header">
                            <h3 class="box-title">New Associate Information</h3>
                            <div class="pull-right">
                                <a class="btn btn-warning btn-xs" data-toggle="modal" data-target="#modal-agenthistory"><i class="fa fa-list"> </i>&nbsp;View Updation History</a>
                            </div>
                        </div>
                       <form id="update_agent_form" method="post" name="update_agent_form" >
                        {{csrf_field()}}
                        <input type="hidden" name="update_id" id="update_id" value="{{$row['uuid']}}" />

                        <div class="box-body">
                            <table class="table table-bordered">
                                <tbody><tr>
                                    <td style="width:40%;">
                                        <label class="control-label">New Associate<span class="requiredfield">*</span></label>
                                    </td>
                                    <td>
                                        <select id="agent_id" name="agent_id" class="form-control selectpicker">
                                          <option value="">Select Associate </option>
                                          @foreach($agents as $key => $agent)
                                            <option value="{{$agent['id']}}">{{$agent['name']}}</option>
                                          @endforeach
                                      </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width:40%;">
                                        <label class="control-label">Update Note<span class="requiredfield">*</span></label>
                                    </td>
                                    <td>
                                        <textarea class="form-control required" cols="20"  id="update_note" name="update_note" rows="2"></textarea>

                                    </td>
                                </tr>
                            </tbody></table>

                            <div class="box-footer">
                                <div class="col-xs-12 text-center">
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-flat btn-success">UPDATE ASSOCIATE</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </form>

                    </div>
                </div>
            </div>

            <div class="modal fade" id="modal-agenthistory">
                <div class="modal-dialog" style="width:1000px;">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                            <h4 class="modal-title">Associate Updation History</h4>
                        </div>

                        <div class="modal-body">
                            <table class="table table-hover" id="agentCommissionDetailDiv">
                                <thead>
                                    <tr>
                                        <th>Agent Name</th>
                                        <th>Modified Agent Name</th>
                                        <th>Modified By</th>
                                        <th>Modified Date</th>
                                        <th>Note</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if ($row['agent_change_log'] != ''): ?>
                                    <?php foreach (json_decode($row['agent_change_log']) as $key => $value): ?>
                                        <tr>
                                            <td>{{$value->agent_name}}</td>
                                            <td>{{$value->modified_agent_name}}</td>
                                            <td>{{$value->modified_by}}</td>
                                            <td>{{Helper::getFromDate($value->modified_date)}}</td>
                                            <td>{{$value->note}}</td>
                                        </tr>
                                    <?php endforeach ?>
                                    <?php endif ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </section>