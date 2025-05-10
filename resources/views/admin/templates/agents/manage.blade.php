<section class="content-header">
  <h1> Agent/Advisor </h1>
  <ol class="breadcrumb">
    <li>
      <a href="{{route('admin.dashboard')}}">
        <i class="fa fa-dashboard"></i> Dashboard </a>
    </li>
    <li>
      <a href="{{route('admin.agents.index')}}">Agents/Advisors</a>
    </li>
    <li class="active">Agents/Advisor</li>
  </ol>
</section>
<section class="content padding-top-0">
  <div class="row">
    <div class="col-md-3">
      <div class="box box-solid">
        <div class="box-header with-border">
          <h3 class="box-title">Options</h3>
        </div>
        <div class="box-body no-padding">
          <ul class="nav nav-pills nav-stacked">
            <li>
              <a href="{{route('admin.agents.DownlineAgents',array('id' => $row['unique_code']))}}">
                <i class="fa fa-download"></i>&nbsp;&nbsp;Downline Agents </a>
            </li>
            <li>
              <a href="{{route('admin.agents.UplineAgents',array('id' => $row['unique_code']))}}">
                <i class="fa fa-upload"></i>&nbsp;&nbsp;Upline Agents </a>
            </li>
            <li>
              <a href="/Agents/AccountHolding/59bee977-f629-4528-ac0f-4c943aac48c3">
                <i class="fa fa-list"></i>&nbsp;&nbsp;Account Holding </a>
            </li>
          </ul>
        </div>
      </div>
     
      <div class="box box-solid">
        <div class="box-header">
          <h3 class="box-title">Agent Picture</h3>
        </div>
        <div class="box-body">
          <div style="margin: 0 auto;">

            @if($row['profile_img'] != '')
                   
                     <img src="{{config('constants.PROFILE_IMG').$row['profile_img']}}" style="width:150px;height:150px;" >
                @else
                     <img src="https://i.ibb.co/dmdwN6L/35326856-6de4-483d-a7d8-412ca31fc326.png" style="width:150px;height:150px;" >

                @endif

           
          </div>
        </div>
      </div> 

    </div>
    <div class="col-md-9">
      <div class="box box-solid">
        <div class="box-header">
          <h3 class="box-title">Basic Information</h3>
          <div class="pull-right">
            <a target="_blank" class="btn btn-warning btn-xs" target="_blank" href="{{route('admin.agents.IDCard',array('id' => $row['unique_code']))}}">
              <i class="fa fa-id-card"></i> ID Card </a>
            
            <a class="btn btn-default btn-xs" href="{{route('admin.agents.edit',array('id' => $row['unique_code']))}}">
              <i class="fa fa-pencil"></i>
            </a>
            <a class="btn btn-default btn-xs" href="{{route('admin.agents.print',array('id' => $row['unique_code']))}}">
              <i class="fa fa-print"></i>
            </a>
            <a class="btn btn-default btn-xs" href="/Agents/Delete/59bee977-f629-4528-ac0f-4c943aac48c3">
              <i class="fa fa-trash"></i>
            </a>
          </div>
        </div>
        <div class="box-body">
          <table class="table table-hover">
            <tbody>
              <tr>
                <td>Date of Joining</td>
                <td>{{Helper::getFromDate($row['join_date'])}}</td>
              </tr>
              <tr>
                <td>Gender</td>
                <td><?= ucfirst($row['gender']) ?></td>
              </tr>
              <tr>
                <td>Agent's Name</td>
                <td>
                  <strong><?= ucfirst($row['prifix_name']) ?> {{$row['name']}} | {{$row['agent_code']}}</strong>
                </td>
              </tr>
              <tr>
                <td>Address1</td>
                <td>
                  <span style="font-family:arial;font-size:12px;color:gray;">GUWAHATI KAMRUP 781022 Assam </span>
                  <br>
                  <span style="font-family:arial;font-size:12px;color:gray;">
                    <i class="fa fa-phone"></i>&nbsp; {{$row['mobile']}} </span>
                  <br>
                  <span style="font-family:arial;font-size:12px;color:gray;">
                    <i class="fa fa-envelope-o"></i>&nbsp; {{$row['email']}}  </span>
                </td>
              </tr>
              <tr>
                <td>Date of Birth</td>
                <td>{{Helper::getFromDate($row['dob'])}}</td>
              </tr>
              <tr>
                <td>Occupation</td>
                <td>{{$row['occupation']}}</td>
              </tr>
              <tr>
                <td>KYC Info</td>
                <td>AADHAR -{{$row['aadhar_no']}}  PAN - {{$row['pan']}}</td>
              </tr>
              <tr>
                <td>Father's Name</td>
                <td>{{$row['father_name']}}</td>
              </tr>
              <tr>
                <td>Spouse's Name</td>
                <td>{{$row['spouse_name']}}</td>
              </tr>
              <tr>
                <td>Upline Agent </td>
                <td></td>
              </tr>
              <tr>
                <td>Agent Rank </td>
                <td>{{@$row['agent_rank']['title']}}</td>
              </tr>
              <tr>
                <td>Associate Customer </td>
                <td>{{@$row['associate_customer']['name']}}</td>
              </tr>
              <tr>
                <td colspan="2">
                  <strong>Bank Details</strong>
                </td>

              </tr>
              <tr>
                <td>Bank Name</td>
               <td>{{$row['bank_name']}}</td>
              </tr>
              <tr>
                <td>IFSC Code</td>
                <td>{{$row['ifsc_code']}}</td>
              </tr>
              <tr>
                <td>Account Type</td>
                <td><?= ucfirst($row['account_type']) ?></td>
              </tr>
              <tr>
                <td>Account No</td>
                <td>{{$row['account_no']}}</td>
              </tr>
              <tr>
                <td>Status</td>
                <?php
                $statusClass = "danger";
                if($row['status'] == 'active'){
                  $statusClass = "success";
                }
                ?>
                <td>
                  <span class="label label-<?= $statusClass ?>"><?= ucfirst($row['status']) ?></span>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
    <div class="col-md-12">
      <div class="box box-solid">
        <div class="box-header">
          <h3 class="box-title">Agent Commission Payment</h3>
        </div>
        <div class="box-body">
          <script src="/Content/js/jquery.custom-datatable.js"></script>
          <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
          <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
          <link href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css" rel="stylesheet">
          <form action="/shared/ReportAnalytics" method="post" id="frmReportAnalytics" class="skip" target="_blank" novalidate="novalidate">
            <input type="hidden" name="uiParameters" value="">
          </form>
          <form action="/shared/ExporttoExcel" method="post" id="frmExportExcel" class="skip" novalidate="novalidate">
            <input type="hidden" name="uiParameters" value="">
          </form>
          <form action="/shared/ExporttoPDF" method="post" id="frmExportPdf" class="skip" novalidate="novalidate">
            <input type="hidden" name="uiParameters" value="">
          </form>
          <form action="/shared/ExporttoCSV" method="post" id="frmExportCsv" class="skip" novalidate="novalidate">
            <input type="hidden" name="uiParameters" value="">
          </form>
          <form action="/shared/GridReport" method="post" id="frmPrintGrid" class="skip" novalidate="novalidate">
            <input type="hidden" name="uiParameters" value="">
          </form>
          <div class="row">
            <div class="col-md-12">
              <div class="table-wrap-div dataTable-holder" data-scrolly="Model.ViewModel.DataTableGridModel">
                <div class="table-responsive">
                  <div class="navbar-custom-menu pull-right">
                    <a href="#" data-table="togglefilter" class="btn btn-flat btn-default" data-toggle="dropdown" aria-expanded="true" style="" data-placement="auto" data-original-title="Conditional Filters">
                      <i class="fa fa-filter"></i>&nbsp;Add Filter </a>
                    <a href="#" data-table="reset" class="btn btn-flat btn-default" data-toggle="dropdown" aria-expanded="true" style="display:none" data-placement="auto" data-original-title="Reset Conditional Filters>
                                                                                <i class=" fa="" fa-filter"="">&nbsp;Remove Filter (Reset) </a>
                    <a href="#" class="btn btn-flat btn-default" id="printGrid" data-toggle="dropdown" aria-expanded="true">
                      <i class="fa fa-print"></i>&nbsp;Print </a>
                    <div class="btn-group">
                      <button type="button" style="width:150px;" class="btn btn-flat btn-default">
                        <i class="fa fa-gears"></i> OPTIONS </button>
                      <button type="button" class="btn btn-flat btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                        <span class="caret"></span>
                        <span class="sr-only">Toggle Dropdown</span>
                      </button>
                      <ul class="dropdown-menu nav-stacked" role="menu" style="max-height:400px;min-width:400px;float:left;">
                        <li style="padding:5px;">
                          <a href="#" id="excellExport">
                            <i class="fa fa-file-excel-o"></i> Excel Download </a>
                        </li>
                        <li style="padding:5px;">
                          <a href="#" id="pdfExport">
                            <i class="fa fa-file-pdf-o"></i> PDF Download </a>
                        </li>
                        <li style="padding:5px;">
                          <a href="#" id="csvExport">
                            <i class="fa fa-file-text-o"></i> CSV Download </a>
                        </li>
                        <li style="padding:5px;">
                          <a href="#" id="analyticReport">
                            <i class="fa fa-file-text-o"></i> Data Analytics </a>
                        </li>
                      </ul>
                    </div>
                  </div>
                  <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer">
                    <div class="dataTables_length" id="DataTables_Table_0_length">
                      <label>Show <select name="DataTables_Table_0_length" aria-controls="DataTables_Table_0" class="form-control input-sm">
                          <option value="10">10</option>
                          <option value="20">20</option>
                          <option value="50">50</option>
                          <option value="100">100</option>
                          <option value="200">200</option>
                          <option value="500">500</option>
                        </select> entries </label>
                    </div>
                    <div id="DataTables_Table_0_processing" class="dataTables_processing panel panel-default" style="display: none;">Processing...</div>
                    <table class="table table-hover table-header dataTable no-footer display responsive dtr-inline" data-table="grid" id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info">
                      <thead>
                        <tr role="row">
                          <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Date: activate to sort column ascending">Date</th>
                          <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Amount: activate to sort column ascending">Amount</th>
                          <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="From Date: activate to sort column ascending">From Date</th>
                          <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Type: activate to sort column ascending">Type</th>
                          <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="To Date: activate to sort column ascending">To Date</th>
                          <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Mode: activate to sort column ascending">Mode</th>
                          <th class="text-center sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="IsAccounted: activate to sort column ascending">IsAccounted</th>
                          <th class="text-center sorting_disabled" rowspan="1" colspan="1" aria-label="Delete">Delete</th>
                          <th class="text-center sorting_disabled" rowspan="1" colspan="1" aria-label="Action">Action</th>
                        </tr>
                      </thead>
                      <tbody>
                       
                      </tbody>
                    </table>
                    
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="modal fade data-filter-modal" tabindex="-1" role="dialog" data-table="dvfilterBox">
            <div class="valign">
              <div>
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" aria-label="Close" data-table="close-filter">
                        <span aria-hidden="true">×</span>
                      </button>
                      <h4 class="modal-title">Advance Filter</h4>
                    </div>
                    <div class="modal-body clearfix">
                      <div class="dvfilterBody-col" data-table="dvfilterBody" style="max-height:400px;overflow: auto;">
                        <div class="form-group col-xs-12 ">
                          <label class="control-label" for="search_TransactionDate">Date</label>
                          <div class="row">
                            <div class="col-md-6 no-left-padd ">
                              <div class="input-group date">
                                <input data-table="filters" class="form-control datepicker" data-filter=">=" name="search.TransactionDate" placeholder="From Date">
                                <span class="input-group-addon">
                                  <span class="fa fa-calendar"></span>
                                </span>
                              </div>
                            </div>
                            <div class="col-md-6 no-left-padd ">
                              <div class="input-group date">
                                <input data-table="filters" class="form-control datepicker" data-filter="<=" name="search.TransactionDate" placeholder="To Date">
                                <span class="input-group-addon">
                                  <span class="fa fa-calendar"></span>
                                </span>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="form-group col-xs-12 ">
                          <label class="control-label" for="search_PayAmount">Amount</label>
                          <div class="row">
                            <div class="col-md-3 no-left-padd" style="padding-right: 3px;">
                              <select class="form-control col-md-3" data-table="expression" data-key="PayAmount">
                                <option value="=">Equal</option>
                                <option value="<">LessThan </option>
                                <option value="<=">LessThanOrEqual </option>
                                <option value=">">GreaterThan</option>
                                <option value=">=">GreaterThanOrEqual</option>
                                <option value="!=">NotEqual</option>
                              </select>
                            </div>
                            <div class=" no-left-padd  col-md-9  ">
                              <input data-table="filters" class="no-right-padd form-control numeric decimalvalues" name="search.PayAmount" type="text" value="" id="search_PayAmount">
                            </div>
                          </div>
                        </div>
                        <div class="form-group col-xs-12 ">
                          <label class="control-label" for="search_FromDate">From Date</label>
                          <div class="row">
                            <div class="col-md-6 no-left-padd ">
                              <div class="input-group date">
                                <input data-table="filters" class="form-control datepicker" data-filter=">=" name="search.FromDate" placeholder="From Date">
                                <span class="input-group-addon">
                                  <span class="fa fa-calendar"></span>
                                </span>
                              </div>
                            </div>
                            <div class="col-md-6 no-left-padd ">
                              <div class="input-group date">
                                <input data-table="filters" class="form-control datepicker" data-filter="<=" name="search.FromDate" placeholder="To Date">
                                <span class="input-group-addon">
                                  <span class="fa fa-calendar"></span>
                                </span>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="form-group col-xs-12 ">
                          <label class="control-label" for="search_vType">Type</label>
                          <div class="row">
                            <div class="col-md-3 no-left-padd" style="padding-right: 3px;">
                              <select class="form-control col-md-3" data-table="expression" data-key="vType">
                                <option value="contains">Contains</option>
                                <option value="=">Equal</option>
                              </select>
                            </div>
                            <div class=" no-left-padd  col-md-9  ">
                              <input data-table="filters" class="no-right-padd form-control " name="search.vType" type="text" value="" id="search_vType">
                            </div>
                          </div>
                        </div>
                        <div class="form-group col-xs-12 ">
                          <label class="control-label" for="search_ToDate">To Date</label>
                          <div class="row">
                            <div class="col-md-6 no-left-padd ">
                              <div class="input-group date">
                                <input data-table="filters" class="form-control datepicker" data-filter=">=" name="search.ToDate" placeholder="From Date">
                                <span class="input-group-addon">
                                  <span class="fa fa-calendar"></span>
                                </span>
                              </div>
                            </div>
                            <div class="col-md-6 no-left-padd ">
                              <div class="input-group date">
                                <input data-table="filters" class="form-control datepicker" data-filter="<=" name="search.ToDate" placeholder="To Date">
                                <span class="input-group-addon">
                                  <span class="fa fa-calendar"></span>
                                </span>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="form-group col-xs-12 ">
                          <label class="control-label" for="search_PaymentMode">Mode</label>
                          <div class="row">
                            <div class="col-md-3 no-left-padd" style="padding-right: 3px;">
                              <select class="form-control col-md-3" data-table="expression" data-key="PaymentMode">
                                <option value="contains">Contains</option>
                                <option value="=">Equal</option>
                              </select>
                            </div>
                            <div class=" no-left-padd  col-md-9  ">
                              <input data-table="filters" class="no-right-padd form-control " name="search.PaymentMode" type="text" value="" id="search_PaymentMode">
                            </div>
                          </div>
                        </div>
                        <div class="form-group col-xs-12 ">
                          <label class="control-label" for="search_IsAccounted">IsAccounted</label>
                          <div class="row">
                            <div class=" no-left-padd col-xs-12 ">
                              <div class="icheck-outer">
                                <input data-table="filters" class="iCheck" type="radio" name="IsAccounted" value="true"> &nbsp;Yes
                              </div>
                              <div class="icheck-outer">
                                <input data-table="filters" class="iCheck" type="radio" name="IsAccounted" value="false"> &nbsp;No
                              </div>
                              <div class="icheck-outer">
                                <input data-table="filters" class="iCheck" type="radio" data-default="" name="IsAccounted" value="" checked="checked"> &nbsp;Both
                              </div>
                              <input type="hidden" data-type="radio" name="search.IsAccounted" value="">
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="" align="center" style="border:none;">
                        <button type="button" class="btn btn-flat btn-success" data-table="search" title="Search Record">
                          <i class="fa fa-search" aria-hidden="true"></i> Search </button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="modal fade bs-example-modal-lg" data-table="pdfsetting" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-lg" role="document">
              <div class="modal-content" id="exportPdfModeldiv" style="min-height:150px;">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                  </button>
                  <h4 class="modal-title" id="loading">Loading.........</h4>
                </div>
              </div>
            </div>
          </div>
          <div id="myModal1" class="modal  fade bs-example-modal-lg" role="dialog">
            <div class="modal-dialog modal-lg">
              <div class="modal-content" id="myModalContent"></div>
            </div>
          </div>
          <div id="modal-FileuploadPopup"></div>
          <script>
            function ShowHideColumnView(controllername, actionname, returnurl) {
              $.ajax({
                url: '/Common/ShowHideColumns?ControllerName=' + controllername + '&ActionName=' + actionname + '&returnurl=' + returnurl,
                type: 'get',
                dataType: 'html',
                success: function(data) {
                  $('#modal-FileuploadPopup').html(data);
                  $('#modal-Fileupload').modal('show');
                }
              })
            }
          </script>
        </div>
      </div>
    </div>
  </div>
</section>