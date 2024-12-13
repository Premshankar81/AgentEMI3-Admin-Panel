<section class="content-header">
<h1>
    Director/Promoters
</h1>
<ol class="breadcrumb">            
    <li><a href="{{route('admin.dashboard')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    <li><a href="{{route('admin.director_promoters.index')}}">Directors/Promoters</a></li>
    <li class="active">Director/Promoters</li>
    
</ol>
</section>

<section class="content padding-top-0">
        <div class="row">
            <div class="col-md-12" style="padding-bottom:10px;">
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">

                
                <a class="btn btn-warning" href="/DirectorPromoters/KYCManage/1278a624-6697-413a-a2c7-dedf705391fb">
                    <i class="fa fa-id-card"></i> KYC Documents
                </a>



            </div>
            <div class="clearfix margin-bottom-10"></div>
            <p></p>
            <div class="col-md-6">
                <div class="box box-solid">
                    <div class="box-header">
                        <h3 class="box-title">Basic Information</h3>
                        <div class="pull-right">

                            <a class="btn btn-default btn-xs" href="{{route('admin.director_promoters.edit',array('id' => $row['customer_id']))}}">
                                <i class="fa fa-pencil"></i>
                            </a>
                        </div>
                    </div>
                    <div class="box-body">
                        <table class="table table-hover">
                            <tbody>
                                <tr>
                                    <td style="width:30%;">Enrollment Date</td>
                                    <td style="width:70%;">{{Helper::getFromDate($row['inserted'])}}</td>
                                </tr>
                                <tr>
                                    <td>Member's Id</td>
                                    <td>{{$row['customer_code']}}</td>
                                </tr>
                                <tr>
                                    <td>Customer's Name</td>
                                    <td><?= ucfirst($row['prifix_name']) ?> {{@$row['name']}}</td>
                                </tr>
                                <tr>
                                    <td>Date of Birth</td>
                                    <td>{{Helper::getFromDate($row['dob'])}}</td>
                                </tr>
                                <tr>
                                    <td>Marital Status</td>
                                    <td><?= ucfirst($row['marital_status']) ?></td>
                                </tr>
                                <tr>
                                    <td>Mobile No</td>
                                    <td>{{$row['mobile']}}</td>
                                </tr>
                                <tr>
                                    <td>Mother's Name</td>
                                    <td>{{$row['mother_Name']}}</td>
                                </tr>
                                <tr>
                                    <td>Email Address</td>
                                    <td>{{$row['email']}}</td>
                                </tr>
                                <tr>
                                    <td>Religion</td>
                                    <td><?= ucfirst($row['religion']) ?></td>
                                </tr>
                                <tr>
                                    <td>Cast</td>
                                    <td><?= ucfirst($row['member_cast']) ?></td>
                                </tr>
                                <tr>
                                    <td>GPS Location</td>
                                    <td><strong>Longitude </strong>:  <strong>Latitude</strong>: </td>
                                </tr>
                                <tr>
                                    <td>AADHAR</td>
                                    <td>{{$row['aadharcard_no']}}</td>
                                </tr>
                                <tr>
                                    <td>PAN</td>
                                    <td>{{$row['pan']}}</td>
                                </tr>
                                <tr>
                                    <td>Voter Id</td>
                                    <td>{{$row['voter_id_no']}}</td>
                                </tr>
                                <tr>
                                    <td>Ration Card</td>
                                    <td>{{$row['ration_card_no']}}</td>
                                </tr>
                                <tr>
                                    <td>Driving License No</td>
                                    <td>{{$row['driving_license_no']}}</td>
                                </tr>
                                <tr>
                                    <td>Passport No</td>
                                    <td>{{$row['passport_no']}}</td>
                                </tr>
                                
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="box box-solid">
                    <div class="box-header">
                        <h3 class="box-title">Address detail</h3>
                        <div class="pull-right">
                            <a class="btn btn-default btn-xs" href="{{route('admin.director_promoters.address',array('id' => $row['customer_id']))}}">
                                <i class="fa fa-pencil"></i>
                            </a>
                        </div>
                    </div>
                    <div class="box-body">
                        <table class="table table-hover">
                            <tbody>
                                <tr>
                                    <td style="width:30%;">Present Address</td>
                                    <td style="width:70%;">
                                          {{$row['present_address1']}},{{$row['present_address2']}},{{$row['present_area']}},{{$row['present_pin_code']}}
                                        
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width:30%;">Permanent Address</td>
                                    <td style="width:70%;">
                                            {{$row['permanent_address1']}},{{$row['permanent_address2']}},{{$row['permanent_area']}},{{$row['permanent_pin_code']}}
                                        
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="box box-solid">
                    <div class="box-header">
                        <h3 class="box-title">Account Details</h3>
                    </div>
                    <div class="box-body">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Account No.</th>
                                    <th>Account Date</th>
                                    <th>Account Type</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>

                        </table>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="box box-solid">
                    <div class="box-header">
                        <h3 class="box-title">Settings</h3>
                    </div>
                    <div class="box-body">
                        <table class="table table-details">
                            <tbody>
                                <tr>
                                    <td class="ft-600 text-center va-middle">SMS</td>
                                        <td>
                                            <label class="switch">
                                                <input type="checkbox" checked="" onchange="togglesms('1278a624-6697-413a-a2c7-dedf705391fb');">
                                                <span class="slider round"></span>
                                            </label>
                                        </td>
                                </tr>

                                <tr>
                                    <td class="ft-600 text-center va-middle">NEFT/IMPS Transfer</td>
                                        <td>
                                            <label class="switch">
                                                <input type="checkbox" onchange="toggleNeftImps('1278a624-6697-413a-a2c7-dedf705391fb');">
                                                <span class="slider round"></span>
                                            </label>
                                        </td>
                                </tr>

                                <tr>
                                    <td class="ft-600 text-center va-middle">Within Nidhi Transfer</td>
                                        <td>
                                            <label class="switch">
                                                <input type="checkbox" onchange="toggleWithinNidhiTransfer('1278a624-6697-413a-a2c7-dedf705391fb');">
                                                <span class="slider round"></span>
                                            </label>
                                        </td>
                                </tr>


                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="box box-solid">
                    <div class="box-header">
                        <h3 class="box-title">User Settings</h3>
                    </div>
                    <div class="box-body">
                        <table class="table table-details">
                            <tbody>
                                    <tr>
                                        <td>Customer Id</td>
                                        <td><a href="{{route('admin.director_promoters.edit',array('id' => $row['customer_id']))}}">{{$row['customer_code']}}</a></td>
                                    </tr>

                             
                                    <tr>
                                        <td class="ft-600 text-center va-middle" colspan="2"><span style="color:green;">Customer Portal is : <a target="_blank" href="nidhi.softackle.in">nidhi.softackle.in</a></span></td>
                                    </tr>
                               
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="box box-solid">
                    <div class="box-header">
                        <h3 class="box-title">Bank Information</h3>
                        <div class="pull-right">
                            <a class="btn btn-default btn-xs" href="{{route('admin.director_promoters.bankDetail',array('id' => $row['customer_id']))}}">
                                <i class="fa fa-pencil"></i>
                            </a>
                        </div>
                    </div>
                    <div class="box-body">
                        <table class="table table-hover">
                            <tbody>
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
                                    <td>{{$row['account_type']}}</td>
                                </tr>
                                <tr>
                                    <td>Account No</td>
                                    <td>{{$row['account_no']}}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="box box-solid">
                    <div class="box-header">
                        <h3 class="box-title">Employement Detail</h3>
                        <div class="pull-right">
                            <a class="btn btn-default btn-xs" href="{{route('admin.director_promoters.profession_detail',array('id' => $row['customer_id']))}}">
                                <i class="fa fa-pencil"></i>
                            </a>
                        </div>
                    </div>
                    <div class="box-body">
                        <table class="table table-hover">
                            <tbody>
                                <tr>
                                    <td style="width:30%;">Employement Type</td>
                                    <td style="width:70%;">{{$row['cust_prof_type']}}</td>
                                </tr>
                                <tr>
                                    <td style="width:30%;">
                                    </td>
                                    <td style="width:70%;">
                                        
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width:30%;">Business Address</td>
                                    <td style="width:70%;">{{$row['cust_prof_business']}}
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width:30%;">Occupation</td>
                                    <td style="width:70%;">{{$row['cust_prof_occupation']}}
                                        
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width:30%;">Monthly Income</td>
                                    <td style="width:70%;">{{$row['cust_prof_monthly_income']}}
                                        
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="box box-solid hide">
                    <div class="box-header">
                        <h3 class="box-title">Minor Details</h3>
                        <div class="pull-right">
                            <a class="btn btn-success btn-xs" href="/DirectorPromoters/Minor/1278a624-6697-413a-a2c7-dedf705391fb">
                                <i class="fa fa-plus-circle"></i>
                            </a>
                        </div>
                    </div>
                    <div class="box-body">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Enrollment Date</th>
                                    <th>City</th>
                                    <th>Mobile No</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>

                        </table>
                    </div>
                </div>

                <div class="box box-solid">
                    <div class="box-header">
                        <h3 class="box-title">Member Nominee Details</h3>
                        <div class="pull-right">
                            <a class="btn btn-success btn-xs" href="{{route('admin.director_promoters.nominee',array('id' => $row['customer_id']))}}">
                                Add/Edit
                            </a>
                        </div>
                    </div>
                    <div class="box-body">
                        <table class="table table-hover">
                            <thead>
                                 
                                    <tr>
                                        <th>Name</th>
                                        <th>DOB</th>
                                        <th>Relation</th>
                                        <th>Mobile No</th>
                                        <th>Age</th>
                                    </tr>
                             


                            </thead>
                            <tbody>
                                 <?php if(json_decode($row['member_nominee'])  > 0 ){ ?>
                                    <?php foreach (json_decode($row['member_nominee']) as $key => $nominee): ?>
                                    <tr>
                                        <td><?= $nominee->nominee_name ?></td>
                                        <td><?= $nominee->nominee_dob ?></td>
                                        <td><?= $nominee->nominee_relation ?></td>
                                        <td><?= $nominee->nominee_mobile ?></td>
                                        <td><?= $nominee->nominee_age ?></td>
                                    </tr>
                                @endforeach
                                <?php } ?>

                            </tbody>

                        </table>
                    </div>
                </div>

                

            </div>

            <div class="col-md-12">
                <div class="box box-solid">
                    <div class="box-header">
                        <h3 class="box-title">Share Certificates Details</h3>
                        
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
                        <i class="fa fa-filter"></i>&nbsp;Add Filter
                    </a>
                    <a href="#" data-table="reset" class="btn btn-flat btn-default" data-toggle="dropdown" aria-expanded="true" style="display:none" data-placement="auto" data-original-title="Reset Conditional Filters>
                        <i class=" fa="" fa-filter"="">&nbsp;Remove Filter (Reset)
                    </a>
                    <a href="#" class="btn btn-flat btn-default" id="printGrid" data-toggle="dropdown" aria-expanded="true">
                        <i class="fa fa-print"></i>&nbsp;Print
                    </a>

                    <div class="btn-group">
                        <button type="button" style="width:150px;" class="btn btn-flat btn-default"> <i class="fa fa-gears"></i> OPTIONS</button>
                        <button type="button" class="btn btn-flat btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                            <span class="caret"></span>
                            <span class="sr-only">Toggle Dropdown</span>
                        </button>
                        <ul class="dropdown-menu nav-stacked" role="menu" style="max-height:400px;min-width:400px;float:left;">
                            
                            <li style="padding:5px;">
                                <a href="#" id="excellExport">
                                    <i class="fa fa-file-excel-o"></i>
                                    Excel Download
                                </a>
                            </li>
                            <li style="padding:5px;">
                                <a href="#" id="pdfExport">
                                    <i class="fa fa-file-pdf-o"></i>
                                    PDF Download
                                </a>
                            </li>
                            <li style="padding:5px;">
                                <a href="#" id="csvExport">
                                    <i class="fa fa-file-text-o"></i>
                                    CSV Download
                                </a>
                            </li>

                            <li style="padding:5px;">
                                <a href="#" id="analyticReport">
                                    <i class="fa fa-file-text-o"></i>
                                    Data Analytics
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer"><div class="dataTables_length" id="DataTables_Table_0_length"><label>Show <select name="DataTables_Table_0_length" aria-controls="DataTables_Table_0" class="form-control input-sm"><option value="10">10</option><option value="20">20</option><option value="50">50</option><option value="100">100</option><option value="200">200</option><option value="500">500</option></select> entries</label></div><div id="DataTables_Table_0_processing" class="dataTables_processing panel panel-default" style="display: none;">Processing...</div><table class="table table-hover table-header dataTable no-footer display responsive dtr-inline" data-table="grid" id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info">
                    <thead>
                    <tr role="row"><th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Transfer Date: activate to sort column ascending">Transfer Date</th><th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Share Holder's Name: activate to sort column ascending">Share Holder's Name</th><th class="text-right sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Share Cert. No: activate to sort column ascending">Share Cert. No</th><th class="text-right sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Shares Range: activate to sort column ascending">Shares Range</th><th class="text-right sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Total Share: activate to sort column ascending">Total Share</th><th class="text-right sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Face Value: activate to sort column ascending">Face Value</th><th class="text-right sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Total Shares Value: activate to sort column ascending">Total Shares Value</th><th class="text-center sorting_disabled" rowspan="1" colspan="1" aria-label="SH-1">SH-1</th><th class="text-center sorting_disabled" rowspan="1" colspan="1" aria-label="Receipt">Receipt</th><th class="text-center sorting_disabled" rowspan="1" colspan="1" aria-label="SH-4">SH-4</th></tr></thead>
                <tbody><tr class="odd"><td valign="top" colspan="10" class="dataTables_empty">No data available in table</td></tr></tbody></table><div class="dataTables_info" id="DataTables_Table_0_info" role="status" aria-live="polite">Showing 0 to 0 of 0 entries</div><div class="dataTables_paginate paging_full_numbers" id="DataTables_Table_0_paginate"><ul class="pagination"><li class="paginate_button first disabled" id="DataTables_Table_0_first"><a href="#" aria-controls="DataTables_Table_0" data-dt-idx="0" tabindex="0">First</a></li><li class="paginate_button previous disabled" id="DataTables_Table_0_previous"><a href="#" aria-controls="DataTables_Table_0" data-dt-idx="1" tabindex="0">Previous</a></li><li class="paginate_button next disabled" id="DataTables_Table_0_next"><a href="#" aria-controls="DataTables_Table_0" data-dt-idx="2" tabindex="0">Next</a></li><li class="paginate_button last disabled" id="DataTables_Table_0_last"><a href="#" aria-controls="DataTables_Table_0" data-dt-idx="3" tabindex="0">Last</a></li></ul></div></div>
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
                        <button type="button" class="close" aria-label="Close" data-table="close-filter"><span aria-hidden="true">×</span></button>
                        <h4 class="modal-title">Advance Filter</h4>
                    </div>
                    <div class="modal-body clearfix">
                        <div class="dvfilterBody-col" data-table="dvfilterBody" style="max-height:400px;overflow: auto;"><div class="form-group col-xs-12 "><label class="control-label" for="search_TransferDate">Transfer Date</label><div class="row"><div class="col-md-6 no-left-padd "><div class="input-group date">    <input data-table="filters" class="form-control datepicker" data-filter=">=" name="search.TransferDate" placeholder="From Date">    <span class="input-group-addon">        <span class="fa fa-calendar"></span>    </span></div></div><div class="col-md-6 no-left-padd "><div class="input-group date">    <input data-table="filters" class="form-control datepicker" data-filter="<=" name="search.TransferDate" placeholder="To Date">    <span class="input-group-addon">        <span class="fa fa-calendar"></span>    </span></div></div></div></div><div class="form-group col-xs-12 "><label class="control-label" for="search_PromoterName">Share Holder's Name</label><div class="row"><div class="col-md-3 no-left-padd" style="padding-right: 3px;"><select class="form-control col-md-3" data-table="expression" data-key="PromoterName"><option value="contains">Contains</option><option value="=">Equal</option></select></div><div class=" no-left-padd  col-md-9  "><input data-table="filters" class="no-right-padd form-control " name="search.PromoterName" type="text" value="" id="search_PromoterName"></div></div></div><div class="form-group col-xs-12 "><label class="control-label" for="search_ShareCertificateNumber">Share Cert. No</label><div class="row"><div class="col-md-3 no-left-padd" style="padding-right: 3px;"><select class="form-control col-md-3" data-table="expression" data-key="ShareCertificateNumber"><option value="=">Equal</option><option value="<">LessThan</option><option value="<=">LessThanOrEqual</option><option value=">">GreaterThan</option><option value=">=">GreaterThanOrEqual</option><option value="!=">NotEqual</option></select></div><div class=" no-left-padd  col-md-9  "><input data-table="filters" class="no-right-padd form-control numeric decimalvalues" name="search.ShareCertificateNumber" type="text" value="" id="search_ShareCertificateNumber"></div></div></div><div class="form-group col-xs-12 "><label class="control-label" for="search_ShareRange">Shares Range</label><div class="row"><div class="col-md-3 no-left-padd" style="padding-right: 3px;"><select class="form-control col-md-3" data-table="expression" data-key="ShareRange"><option value="contains">Contains</option><option value="=">Equal</option></select></div><div class=" no-left-padd  col-md-9  "><input data-table="filters" class="no-right-padd form-control " name="search.ShareRange" type="text" value="" id="search_ShareRange"></div></div></div><div class="form-group col-xs-12 "><label class="control-label" for="search_ShareNo">Total Share</label><div class="row"><div class="col-md-3 no-left-padd" style="padding-right: 3px;"><select class="form-control col-md-3" data-table="expression" data-key="ShareNo"><option value="=">Equal</option><option value="<">LessThan</option><option value="<=">LessThanOrEqual</option><option value=">">GreaterThan</option><option value=">=">GreaterThanOrEqual</option><option value="!=">NotEqual</option></select></div><div class=" no-left-padd  col-md-9  "><input data-table="filters" class="no-right-padd form-control numeric decimalvalues" name="search.ShareNo" type="text" value="" id="search_ShareNo"></div></div></div><div class="form-group col-xs-12 "><label class="control-label" for="search_FaceValue">Face Value</label><div class="row"><div class="col-md-3 no-left-padd" style="padding-right: 3px;"><select class="form-control col-md-3" data-table="expression" data-key="FaceValue"><option value="=">Equal</option><option value="<">LessThan</option><option value="<=">LessThanOrEqual</option><option value=">">GreaterThan</option><option value=">=">GreaterThanOrEqual</option><option value="!=">NotEqual</option></select></div><div class=" no-left-padd  col-md-9  "><input data-table="filters" class="no-right-padd form-control numeric decimalvalues" name="search.FaceValue" type="text" value="" id="search_FaceValue"></div></div></div><div class="form-group col-xs-12 "><label class="control-label" for="search_TotalShareValue">Total Shares Value</label><div class="row"><div class="col-md-3 no-left-padd" style="padding-right: 3px;"><select class="form-control col-md-3" data-table="expression" data-key="TotalShareValue"><option value="=">Equal</option><option value="<">LessThan</option><option value="<=">LessThanOrEqual</option><option value=">">GreaterThan</option><option value=">=">GreaterThanOrEqual</option><option value="!=">NotEqual</option></select></div><div class=" no-left-padd  col-md-9  "><input data-table="filters" class="no-right-padd form-control numeric decimalvalues" name="search.TotalShareValue" type="text" value="" id="search_TotalShareValue"></div></div></div></div>
                        <div class="" align="center" style="border:none;">
                            <button type="button" class="btn btn-flat btn-success" data-table="search" title="Search Record"><i class="fa fa-search" aria-hidden="true"></i> Search</button>
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
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                <h4 class="modal-title" id="loading">Loading.........</h4>
            </div>
        </div>
    </div>
</div>

<div id="myModal1" class="modal  fade bs-example-modal-lg" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content" id="myModalContent">
        </div>
    </div>
</div>

<div id="modal-FileuploadPopup">

</div>

<script>
    function ShowHideColumnView(controllername, actionname, returnurl) {
        $.ajax({
            url: '/Common/ShowHideColumns?ControllerName=' + controllername + '&ActionName=' + actionname + '&returnurl=' + returnurl,
            type: 'get',
            dataType: 'html',
            success: function (data) {
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