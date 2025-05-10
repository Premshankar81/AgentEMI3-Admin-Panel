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
    <form id="add_form" method="post" name="add_form" >
    {{csrf_field()}}
    <div class="box-header"></div>
    <div class="box-body">
      <div class="col-md-6">
        
        <div class="form-horizontal">
          <div class="form-group">
            <label class="col-sm-4 control-label">Member's Name </label>
            <div class="col-sm-7">
               <select id="member_id" name="member_id" class="form-control" onchange="get_MemberIfno()">
                  <option value="">Select Members</option>
                  @foreach($Members as $key => $Member)
                      <option value="{{$Member['id']}}">{{$Member['name']}}</option>    
                  @endforeach
              </select>
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-4 control-label">Allotement Date </label>
            <div class="col-sm-7">
                <input class="form-control" id="transfer_date" name="transfer_date" type="date"  autocomplete="off">
              </div>
          </div>
          <div class="form-group">
            <label class="col-sm-4 control-label">Total Shares </label>
            <div class="col-sm-7">
            <input class="form-control"  id="total_shares" name="total_shares" type="text" autocomplete="off">
        </div>
          </div>
          <div class="form-group">
            <label class="col-sm-4 control-label">Share Nominal Value</label>
            <div class="col-sm-7">
              <input class="form-control" id="share_nominal_value" name="share_nominal_value" readonly="readonly" type="text" value="10.00" autocomplete="off">
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-4 control-label">Total Shares Value</label>
             <div class="col-sm-7">
              <input class="form-control" id="total_shares_value" name="total_shares_value" readonly="readonly" type="text" autocomplete="off">
            </div>
          </div>

          <div class="form-group">
                <label class="col-sm-4 control-label">Pay Mode <span class="requiredfield">*</span></label>
                <div class="col-sm-7">
                    <select class="form-control  required" id="pay_mode" name="pay_mode">
                      <option value="">Select Payment</option>
                      <option value="Cash">Cash</option>
                      <option value="Cheque">Cheque</option>
                      <option value="Online Transfer">Online Transfer</option>
                    </select>
                </div>
            </div>

        </div>

<p><strong>Share Certificate Bifuracation</strong></p>
        <div class="table-responsive">
     <table class="responsivetable" id="tableShareLotDetail">
        <thead>
           <tr>
              <th style="width:25%;text-align:center;">
                 No. of Certificates
              </th>
              <th style="width:30%;text-align:center;">
                 No. of Shares in a Certificates
              </th>
              <th style="width:30%;text-align:center;">
                 Total Shares
              </th>
              <th style="width:15%;text-align:center;">
                 Action
              </th>
           </tr>
        </thead>
        <tbody id="items_ui">
           <tr class="item-row">
              <td><input class="form-control" name="no_of_certificates[]" autocomplete="off"></td>
              <td><input class="form-control" name="no_of_shares_in_certificates[]" autocomplete="off"></td>
              <td><input class="form-control" name="total_certificates_shares[]" id="total_certificates_shares" readonly="readonly" type="text" autocomplete="off"></td>
              <td style="text-align:center;">
                 <a class="delete-row deleterow" href="javaScript:void(0)"><i class="fa fa-trash-o"></i></a>
              </td>
         </tr>
      </tbody>
   </table>
   <table class="table table-bordered">
      <tbody>
         <tr>
            <td style="width:55%;">
               <a id="addrow" onclick="addnewrow();" ref="javascript:void(0);" class="btn btn-default"><i class="fa fa-plus-circle"></i>&nbsp; New Certificate</a>
            </td>
            <td style="width:30%;">
               <input id="TotalNoOfShares" type="text" class="form-control text-right" readonly="readonly" autocomplete="off">
            </td>
            <td style="width:15%;"></td>
         </tr>
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
          <button type="submit" class="btn btn-flat btn-success">Transfer Shares</button>
          <a class="btn btn-flat btn-danger" href="{{route('admin.allocate_share_certificates.index')}}">Cancel</a>
        </div>
      </div>
    </div>
    </form>

  </div>
</section>