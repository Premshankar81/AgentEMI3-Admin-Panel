<section class="content-header">
  <h1> Dashboard <small>{{$data['page_title']}}</small>
  </h1>
  <ol class="breadcrumb">
    <li>
      <a href="{{route('admin.dashboard')}}">
        <i class="fa fa-dashboard"></i> Home </a>
    </li>
    <li>
      <a href="#">Dashboard</a>
    </li>
    <li class="active">{{$data['page_title']}}</li>
  </ol>
</section>
<style type="text/css">

</style>
<section class="content">
          <div class="row">
            <div class="col-md-3">
             

              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Option</h3>
                </div>
                <div class="box-body no-padding">
                    <ul class="nav nav-pills nav-stacked">
                        <li><a href="{{ route('admin.customer.welcomeLetter',array('id' => $row['customer_id']))}}"><i class="fa fa-file-o"></i>&nbsp;&nbsp;Welcome Letter</a></li>
                        <li><a href="{{ route('admin.customer.applicationForm',array('id' => $row['customer_id']))}}"><i class="fa fa-file-archive-o"></i>&nbsp;&nbsp;Membership form</a></li>
                        <li><a href="{{ route('admin.customer.KYCManage',array('id' => $row['customer_id'])) }}"><i class="fa fa-list"></i>&nbsp;&nbsp;KYC Documents </a></li>
                        <li><a href="javascript:void()"><i class="fa fa-cloud-upload"></i>&nbsp;&nbsp;Upload 15G/15H </a></li>
                        <li><a href="javascript:void()" data-toggle="modal" data-target="#modal-financialyear"><i class="fa fa-certificate"></i>&nbsp;&nbsp;Interest Certificate </a>
                        </li>
                        <li><a href="javascript:void()"><i class="fa fa-external-link-square"></i>&nbsp;&nbsp;Self Account</a></li>
                        <li><a href="javascript:void()"><i class="fa fa-link"></i>&nbsp;&nbsp;Account Associated </a></li>
                        <li><a href="{{ route('admin.customer.ShareCertificateDetails',array('id' => $row['customer_id']))}}"><i class="fa fa-share-square-o"></i>&nbsp;&nbsp;Share Certificate Details </a></li>
                        <li><a href="{{ route('admin.templates.customer.MemberShipFeeDetail',array('id' => $row['customer_id']))}}"><i class="fa fa-money"></i>&nbsp;&nbsp;Membership Fees Details </a></li>

                        
                    </ul>
                </div>
              </div>
            </div>
            <div class="col-md-9">
                <div class="box box-solid">
                    <div class="box-header">
                        <h3 class="box-title">Customer details</h3>
                        <div class="pull-right">
                            <a class="btn btn-default btn-xs" href="{{ route('admin.customer.manage',array('id' => $row['customer_id'])) }}">
                                <i class="fa fa-pencil"></i>
                            </a>
                        </div>
                    </div>
                    <div class="box-body">
                        <table class="table table-hover">
                            <tbody>
                                <tr>
                                    <td style="width:20%;">Enrollment Date</td>
                                    <td style="width:80%;" colspan="3">: {{Helper::getFromDate($row['joining_date'])}}</td>
                                </tr>

                                <tr>
                                    <td>Customer's Name</td>
                                    <td colspan="3">:<strong> {{$row['name']}} | {{$row['customer_code']}} 
                                        <!-- &nbsp;<a class="btn btn-default btn-xs" href="/Members/ChangeMemberCode/c15464d9-4fdc-4141-9b75-3f97e44fbf7a"><i class="fa fa-edit"></i></a></strong> -->
                                    </td>
                                </tr>
                               <tr>
                                    <td>Present Address</td>
                                    <td>
                                        :<span style="font-family:arial;font-size:12px;color:gray;">
                                            {{Helper::get_customer_address($row['id'],'present')}}
                                        </span> <br>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Permanent Address</td>
                                    <td>
                                        :<span style="font-family:arial;font-size:12px;color:gray;">
                                            {{Helper::get_customer_address($row['id'],'permanent')}}
                                        </span> <br>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Date of Birth</td>
                                    <td colspan="3">: {{$row['dob']}}</td>
                                </tr>
                                <tr>
                                    <td>Marital Status</td>
                                    <td colspan="3">: <?= ucfirst($row['marital_status']) ?></td>
                                </tr>
                                <tr>
                                    <td>Mobile No</td>
                                    <td colspan="3">: {{$row['mobile']}}</td>
                                </tr>
                                <tr>
                                    <td>Status</td>
                                    <td><span class="label label-success">Approved</span></td>
                                </tr>
                                    
                                <?php if($row['relative_relation'] != ''){ ?>
                                <tr>
                                    <td><?= ucfirst($row['relative_relation']) ?></td>
                                    <td colspan="3">: <?= ucfirst($row['relative_name']) ?></td>
                                </tr>
                                <?php } ?>

                                <tr>
                                    <td>Mother's Name</td>
                                    <td colspan="3">: <?= ucfirst($row['mother_name']) ?></td>
                                </tr>
                                <tr>
                                    <td>Email Address</td>
                                    <td colspan="2">: {{$row['email']}}</td>
                                </tr>

                                <tr>
                                    <td style="width:20%">Religion</td>
                                    <td style="width:30%">: {{$row['religion']}}</td>
                                    <td style="width:20%">Cast</td>
                                    <td style="width:30%">: {{$row['member_cast']}}</td>
                                </tr>

                                <tr>
                                    <td style="width:20%">Longitude</td>
                                    <td style="width:30%">: {{$row['latitude']}}</td>
                                    <td style="width:20%">Latitude</td>
                                    <td style="width:30%">: {{$row['longitude']}}</td>
                                </tr>

                                <tr>
                                    <td>AADHAR</td>
                                    <td>: {{$row['aadharcard_no']}} </td>
                                    <td>PAN</td>
                                    <td>: {{$row['pan']}} </td>
                                </tr>

                                <tr>
                                    <td>Voter Id</td>
                                    <td>: {{$row['voter_id_no']}} </td>
                                    <td>Ration Card</td>
                                    <td>: {{$row['ration_card_no']}} </td>
                                </tr>

                                <tr>
                                    <td>Driving License No</td>
                                    <td>: {{$row['driving_license_no']}} </td>
                                    <td>Passport No</td>
                                    <td>: {{$row['passport_no']}} </td>
                                </tr>
                                <tr>
                                    <td>Approver Name</td>
                                    <td colspan="3">: </td>                                    
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>


                <div class="box box-solid">
                    <div class="box-header">
                        <h3 class="box-title">Bank Information</h3>
                        <div class="pull-right">
                            <a class="btn btn-default btn-xs" href="{{ route('admin.customer.bankDetail',array('id' => $row['customer_id'])) }}">
                                <i class="fa fa-pencil"></i>
                            </a>
                        </div>
                    </div>
                    <div class="box-body">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Bank Name</th>
                                    <th>IFSC Code</th>
                                    <th>Account Type</th>
                                    <th>Account No</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>{{$row['bank_name']}}</td>
                                    <td>{{$row['ifsc_code']}}</td>
                                    <td><?= ucfirst($row['account_type']) ?></td>
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
                            <a class="btn btn-default btn-xs" href="{{ route('admin.customer.professionDetail',array('id' => $row['customer_id'])) }}">
                                <i class="fa fa-pencil"></i>
                            </a>
                        </div>
                    </div>
                    <div class="box-body">
                        <table class="table table-hover">
                            <tbody>
                                <tr>
                                    <td style="width:30%;">Employement Type</td>
                                    <td style="width:70%;">
                                        <?= ucfirst(str_replace('_',' ',$row['cust_prof_type'])) ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width:30%;"><span>Business Name</span></td>
                                    <td style="width:70%;">
                                        {{$row['cust_prof_business']}}
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width:30%;">Business Address</td>
                                    <td style="width:70%;">
                                    <span>{{$row['cust_prof_address1']}}</span>
                                    <br><span>{{$row['cust_prof_address2']}}</span>
                                    <br>                                </td>
                                </tr>
                                <tr>
                                    <td style="width:30%;">Occupation</td>
                                    <td style="width:70%;">
                                        <?= ucfirst($row['cust_prof_occupation']) ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width:30%;">Monthly Income</td>
                                    <td style="width:70%;">
                                        {{$row['cust_prof_monthly_income']}}
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
                            <a class="btn btn-success btn-xs" href="/Members/Minor/c15464d9-4fdc-4141-9b75-3f97e44fbf7a">
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

                <div class="box box-solid hide">
                    <div class="box-header">
                        <h3 class="box-title">Beneficiary Details</h3>
                        <div class="pull-right">
                            <a class="btn btn-success btn-xs" href="/Members/BeneficiaryManage/c15464d9-4fdc-4141-9b75-3f97e44fbf7a">
                                <i class="fa fa-plus-circle"></i>
                            </a>
                        </div>
                    </div>
                    <div class="box-body">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Account No</th>
                                    <th>IFSC Code</th>
                                    <th>Mobile No</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>

                        </table>
                    </div>
                </div>
            </div>
          </div>
        </section>

