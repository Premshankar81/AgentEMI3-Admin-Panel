<section class="content-header">
          <h1> Dashboard <small>Control panel</small>
          </h1>
          <ol class="breadcrumb">
            <li>
              <a href="#">
                <i class="fa fa-dashboard"></i> Home </a>
            </li>
            <li class="active">Dashboard</li>
          </ol>
        </section>
        
        
        <section class="content">
          <div class="row">
            <div class="col-lg-3 col-xs-6">
              <div class="small-box bg-aqua">
                <div class="inner">
                  <h3>{{$output['PendingApplications']}}</h3>
                  <p>Pending Applications</p>
                </div>
                <div class="icon">
                  <i class="ion ion-bag"></i>
                </div>
                <a href="javascript:void()" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i>
                </a>
              </div>
            </div>
            <div class="col-lg-3 col-xs-6">
              <div class="small-box bg-green">
                <div class="inner">
                  
                  <h3>{{$output['PendingTransactions']}}</h3>
                  </h3>
                  <p>Pending Transactions</p>
                </div>
                <div class="icon">
                  <i class="ion ion-stats-bars"></i>
                </div>
                <a href="javascript:void()" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i>
                </a>
              </div>
            </div>
            <div class="col-lg-3 col-xs-6">
              <div class="small-box bg-yellow">
                <div class="inner">
                  <h3>{{$output['PendingCustomers']}}</h3>
                  <p>Pending Customers</p>
                </div>
                <div class="icon">
                  <i class="ion ion-person-add"></i>
                </div>
                <a href="javascript:void()" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i>
                </a>
              </div>
            </div>
            <div class="col-lg-3 col-xs-6">
              <div class="small-box bg-red">
                <div class="inner">
                  <h3><?=  number_format($output['Pending_EMIS']) ?></h3>
                  <p>Pending EMI's</p>
                </div>
                <div class="icon">
                  <i class="ion ion-pie-graph"></i>
                </div>
                <a href="javascript:void()" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i>
                </a>
              </div>
            </div>
            
            <div class="col-lg-3 col-xs-6">
              <div class="small-box bg-red">
                <div class="inner">
                  <h3><?= $output['TotalCustomer'] ?></h3>
                  <p>No of Customer/Members's</p>
                </div>
                <div class="icon">
                  <i class="ion ion-pie-graph"></i>
                </div>
                <a href="javascript:void()" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i>
                </a>
              </div>
            </div>
            
            

            
            <div class="col-lg-3 col-xs-6">
              <div class="small-box bg-green">
                <div class="inner">
                  
                  <h3>{{$output['TotalReceivedAmount']}}</h3>
                  </h3>
                  <p>Received Amount (₹)</p>
                </div>
                <div class="icon">
                  <i class="ion ion-stats-bars"></i>
                </div>
                <a href="javascript:void()" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i>
                </a>
              </div>
            </div>
            <div class="col-lg-3 col-xs-6">
              <div class="small-box bg-yellow">
                <div class="inner">
                  <h3>{{$output['TotalPaidAmount']}}</h3>
                  <p>Paid Amount (₹)</p>
                </div>
                <div class="icon">
                  <i class="ion ion-person-add"></i>
                </div>
                <a href="javascript:void()" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i>
                </a>
              </div>
            </div>
            <div class="col-lg-3 col-xs-6">
              <div class="small-box bg-yellow">
                <div class="inner">
                  <h3>{{$output['TotalPaidAmount']}}</h3>
                  <p>Rejected Amount (₹)</p>
                </div>
                <div class="icon">
                  <i class="ion ion-person-add"></i>
                </div>
                <a href="javascript:void()" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i>
                </a>
              </div>
            </div>
             <div class="col-lg-3 col-xs-6">
              <div class="small-box bg-red">
                <div class="inner">
                  <h3>₹1,54,507</h3>
                  <p>Loan amount</p>
                </div>
                <div class="icon">
                  <i class="ion ion-pie-graph"></i>
                </div>
                <a href="javascript:void()" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i>
                </a>
              </div>
            </div>
            
            

            
            <div class="col-lg-3 col-xs-6">
              <div class="small-box bg-green">
                <div class="inner">
                  
                  <h3>₹11,18,019</h3>
                  </h3>
                  <p>Debit Amount (₹)</p>
                </div>
                <div class="icon">
                  <i class="ion ion-stats-bars"></i>
                </div>
                <a href="javascript:void()" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i>
                </a>
              </div>
            </div>
            <div class="col-lg-3 col-xs-6">
              <div class="small-box bg-yellow">
                <div class="inner">
                  <h3>₹55,70,119</h3>
                  <p>Credit Amount (₹)</p>
                </div>
                <div class="icon">
                  <i class="ion ion-person-add"></i>
                </div>
                <a href="javascript:void()" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i>
                </a>
              </div>
            </div>
            <div class="col-lg-3 col-xs-6">
              <div class="small-box bg-yellow">
                <div class="inner">
                  <h3>₹2,771</h3>
                  <p>Closing Amount (₹)</p>
                </div>
                <div class="icon">
                  <i class="ion ion-person-add"></i>
                </div>
                <a href="javascript:void()" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i>
                </a>
              </div>
            </div>
             <div class="col-lg-3 col-xs-6">
              <div class="small-box bg-aqua">
                <div class="inner">
                  <h3><?= $output['TotalCustomer'] ?></h3>
                  <p>Active Customer</p>
                </div>
                <div class="icon">
                  <i class="ion ion-bag"></i>
                </div>
                <a href="javascript:void()" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i>
                </a>
              </div>
            </div>
            <div class="col-lg-3 col-xs-6">
              <div class="small-box bg-green">
                <div class="inner">
                  
                  <h3>{{$output['PendingTransactions']}}</h3>
                  </h3>
                  <p>Rejected Transactions</p>
                </div>
                <div class="icon">
                  <i class="ion ion-stats-bars"></i>
                </div>
                <a href="javascript:void()" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i>
                </a>
              </div>
            </div>
            <div class="col-lg-3 col-xs-6">
              <div class="small-box bg-yellow">
                <div class="inner">
                  <h3>{{$output['PendingCustomers']}}</h3>
                  <p>Rejected Customers</p>
                </div>
                <div class="icon">
                  <i class="ion ion-person-add"></i>
                </div>
                <a href="javascript:void()" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i>
                </a>
              </div>
            </div>
            <div class="col-lg-3 col-xs-6">
              <div class="small-box bg-red">
                <div class="inner">
                  <h3>0</h3>
                  <p>Upcoming closing</p>
                </div>
                <div class="icon">
                  <i class="ion ion-pie-graph"></i>
                </div>
                <a href="javascript:void()" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i>
                </a>
              </div>
            </div>      
            
            
          </div>
          
        </section>