<section class="content-header">
  <h1> Transfer Shares </h1>
  <ol class="breadcrumb">
    <li><a href="{{route('admin.dashboard')}}"><i class="fa fa-dashboard"></i> Dashboard </a></li>
    <li><a href="{{route('admin.transfer_share_certificates.index')}}">Shares List</a></li>
    <li class="active">Transfer Shares</li>
  </ol>
</section>
<section class="content">
  <div class="box box-solid">
    <form id="update_form" method="post" name="update_form" >
    {{csrf_field()}}
    <div class="box-header"></div>
     <input type="hidden" class="form-control" id="update_id" name="update_id"  value="{{$row->id}}">
    <div class="box-body">
      <div class="col-md-6">
        
        <div class="form-horizontal">
          <div class="form-group">
            <label class="col-sm-4 control-label">Member's Name </label>
            <div class="col-sm-7">
               <select id="member_id" name="member_id" class="form-control" onchange="get_MemberIfno()">
                  <option value="">Select Members</option>
                  @foreach($Members as $key => $Member)
                      <option <?php if($row->member_id == $Member['id']){ echo "selected"; } ?> value="{{$Member['id']}}">{{$Member['name']}}</option>    
                  @endforeach
              </select>
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-4 control-label">Allotement Date </label>
            <div class="col-sm-7">
                <input class="form-control" id="transfer_date" name="transfer_date" type="date"  autocomplete="off" value="{{$row->transfer_date}}">
              </div>
          </div>
          <div class="form-group">
            <label class="col-sm-4 control-label">Total Shares </label>
            <div class="col-sm-7">
            <input class="form-control"  id="total_shares" name="total_shares" type="text"  readonly="readonly"  autocomplete="off" value="{{$row->total_shares}}">
        </div>
          </div>
          <div class="form-group">
            <label class="col-sm-4 control-label">Share Nominal Value</label>
            <div class="col-sm-7">
              <input class="form-control" id="share_nominal_value" name="share_nominal_value" readonly="readonly"  type="text" value="{{$row->share_nominal_value}}" autocomplete="off">
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-4 control-label">Total Shares Value</label>
             <div class="col-sm-7">
              <input class="form-control" id="total_shares_value" name="total_shares_value" readonly="readonly" value="{{$row->total_shares_value}}"  type="text" autocomplete="off">
            </div>
          </div>

          <div class="form-group">
                <label class="col-sm-4 control-label">Pay Mode <span class="requiredfield">*</span></label>
                <div class="col-sm-7">
                    <select class="form-control  required" id="pay_mode" name="pay_mode">
                      <option value="">Select Payment</option>
                      <option <?php if($row->pay_mode == 'Cash'){ echo "selected"; } ?>  value="Cash">Cash</option>
                      <option <?php if($row->pay_mode == 'Cheque'){ echo "selected"; } ?>  value="Cheque">Cheque</option>
                      <option <?php if($row->pay_mode == 'Online_Transfer'){ echo "selected"; } ?>  value="Online_Transfer">Online Transfer</option>
                    </select>
                </div>
            </div>

        </div>

<p><strong>Share Certificate Bifuracation</strong></p>
        <div class="table-responsive">
     <table class="responsivetable" id="tableShareLotDetail">
        <thead>
           <tr>
              <th style="width:25%;text-align:center;">No. of Certificates</th>
              <th style="width:30%;text-align:center;">No. of Shares in a Certificates</th>
              <th style="width:30%;text-align:center;">Total Shares</th>
           </tr>
        </thead>
        <tbody id="items_ui">
          <?php if ($row->share_certificate_json != ''): ?>
            <?php foreach (json_decode($row->share_certificate_json) as $key => $value): ?>
            <tr class="item-row">
              <td><input  readonly="readonly" class="form-control" name="no_of_certificates[]" autocomplete="off" value="{{$value->no_of_certificates}}"></td>
              <td><input readonly="readonly" class="form-control" name="no_of_shares_in_certificates[]" value="{{$value->no_of_shares_in_certificates}}" autocomplete="off"></td>
              <td><input class="form-control" name="total_certificates_shares[]" value="{{$value->total_certificates_shares}}" id="total_certificates_shares" readonly="readonly" type="text" autocomplete="off"></td>
          </tr>
          <?php endforeach ?>
          <?php endif ?>


      </tbody>
   </table>
  
</div>

       

      </div>
      <div class="col-md-6">
        <div class="box box-warning box-solid">
          <div class="box-header with-border">
            <h3 class="box-title">Members's Detail</h3>
            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse">
                <i class="fa fa-minus"></i>
              </button>
            </div>
          </div>
          <div class="box-body">
             <table class="table table-details" id="MemberIfno_info">
               
             </table>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="box box-warning box-solid">
          <div class="box-header with-border">
            <h3 class="box-title">Share's Holding Detail</h3>
            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse">
                <i class="fa fa-minus"></i>
              </button>
            </div>
          </div>
          <div class="box-body">
            <table class="table table-details" id="shareInfo">
                <tbody><tr><td class="ft-600">No of Share</td><td>0</td></tr><tr><td class="ft-600">Share Value</td><td>0</td></tr></tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
    <div class="box-footer">
      <div class="col-xs-12 text-center">
        <div class="form-group">
          <button type="button" onclick="update_row()" class="btn btn-flat btn-success">Transfer Shares</button>
          <a class="btn btn-flat btn-danger" href="{{route('admin.allocate_share_certificates.index')}}">Cancel</a>
        </div>
      </div>
    </div>
    </form>

  </div>
</section>