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
            <label class="col-sm-4 control-label">Member's Name From </label>
            <div class="col-sm-7">
               <select id="member_id_from" name="member_id_from" class="form-control" onchange="get_MemberIfno_from()">
                  <option value="">Select Members</option>
                  @foreach($Members as $key => $Member)
                      <option value="{{$Member['id']}}">{{$Member['name']}}</option>    
                  @endforeach
              </select>
            </div>
          </div>

          <div class="form-group">
            <label class="col-sm-4 control-label">Member's Name To</label>
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
            <label class="col-sm-4 control-label">Transfer Date </label>
            <div class="col-sm-7">
                <input class="form-control" id="transfer_date" name="transfer_date" type="date"  autocomplete="off">
              </div>
          </div>
          <div class="form-group">
            <label class="col-sm-4 control-label">No. of Shares <span class="requiredfield">*</span></label>
            <div class="col-sm-7">
            <input class="form-control"  id="no_of_share" name="no_of_share" type="text" autocomplete="off">
        </div>
          </div>
          <div class="form-group">
            <label class="col-sm-4 control-label">Face Value</label>
            <div class="col-sm-7">
              <input class="form-control" id="face_value" name="face_value" readonly="readonly" type="text" value="10.00" autocomplete="off">
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-4 control-label">Total Consideration</label>
             <div class="col-sm-7">
              <input class="form-control" id="total_consideration" name="total_consideration" readonly="readonly" type="text" autocomplete="off">
            </div>
          </div>
        </div>
        <div class="table-responsive">
          <table class="table table-bordered table-striped table-condensed table-hover no-footer" id="tableShareLotDetail">
            <thead>
              <tr>
                <th colspan="5" style="text-align:center;background-color:lightgray;"> Share Certificates Detail </th>
              </tr>
              <tr>
                <th style="width:15%;"> Lot Number </th>
                <th style="width:20%;"> Certificates Count </th>
                <th style="width:20%;"> No. Of Shares in a Certificates </th>
                <th style="width:20%;"> Total Shares </th>
                <th style="width:20%;"> Total Shares Value </th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <th style="width:15%;"> 5 </th>
                <th style="width:15%;"> 56 </th>
                <th style="width:15%;"> 1 </th>
                <th style="width:15%;"> 56 </th>
                <th style="width:15%;"> 560.00 </th>
              </tr>
              <tr>
                <th style="width:15%;"> 5 </th>
                <th style="width:15%;"> 37 </th>
                <th style="width:15%;"> 10 </th>
                <th style="width:15%;"> 370 </th>
                <th style="width:15%;"> 3700.00 </th>
              </tr>
              <tr>
                <th style="width:15%;"> 597 </th>
                <th style="width:15%;"> 100 </th>
                <th style="width:15%;"> 10 </th>
                <th style="width:15%;"> 1000 </th>
                <th style="width:15%;"> 100000.00 </th>
              </tr>
              <tr>
                <th style="width:15%;"> 5 </th>
                <th style="width:15%;"> 1 </th>
                <th style="width:15%;"> 3900 </th>
                <th style="width:15%;"> 3900 </th>
                <th style="width:15%;"> 39000.00 </th>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
      <div class="col-md-6">
        
        <div class="box box-warning box-solid">
          <div class="box-header with-border">
            <h3 class="box-title">Members's Detail From</h3>
            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse">
                <i class="fa fa-minus"></i>
              </button>
            </div>
          </div>
          <div class="box-body">
             <table class="table table-details" id="MemberIfno_info_from">
               
             </table>
          </div>
        </div>
        
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
        <!-- <div class="box box-warning box-solid">
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
                <tbody>
                  <tr>
                    <td class="ft-600">No of Share</td>
                    <td>21</td>
                  </tr>
                  <tr>
                    <td class="ft-600">Share Value</td>
                    <td>1110</td>
                  </tr>
                </tbody>
            </table>
          </div>
        </div> -->
      </div>
    </div>
    <div class="box-footer">
      <div class="col-xs-12 text-center">
        <div class="form-group">
          <button type="submit" class="btn btn-flat btn-success">Transfer Shares</button>
          <a class="btn btn-flat btn-danger" href="{{route('admin.transfer_share_certificates.index')}}">Cancel</a>
        </div>
      </div>
    </div>
    </form>

  </div>
</section>