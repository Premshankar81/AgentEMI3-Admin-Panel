<section class="content-header">
      <h1> Dashboard <small>{{$data['page_title']}}</small>
      </h1>
      <ol class="breadcrumb">
        <li>
          <a href="#">
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
        <div class="col-xs-12">
          
          <div class="box">
            <div class="box-header" style="width:100%">
              <h3 class="box-title">{{$data['page_title']}} List 
              </h3>
            </div>

            <div class="box-body">
                <!-- Add a scrollable container -->
              <div style="overflow-x:auto;width:100%">
              <table id="dataTables_table_init" class="table table-bordered table-striped" style="width: 120%">
                <thead>
                  <tr>
                    <th>Sr. No.</th>
                    <th>Loan ID</th>
                    <th>Agent Name</th>
                    <th>Agent ID</th>
                    <th>Customer Name</th>
                    <th>Customer Mobile</th>
                    <th>Pending Amount</th>
                    <th>Late Fine</th>
                    <th>Emi Payout</th>
                    <th>Date</th>
                    <th>Address</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($data['totalPendingInstallment'] as $loan)
                  <tr>
                      <td>{{ $loop->iteration }}</td>
                      <td>{{ $loan->loan_id }}</td>
                      <td>{{ $loan->agent_name }}</td>
                      <td>{{ $loan->agent_id }}</td>
                      <td>{{ $loan->customer_name }}</td>
                      <td>{{ $loan->customer_mobile }}</td>
                      <td>{{ $loan->amount }}</td>
                      <td>{{ $loan->late_fine }}</td>
                      <td>{{ $loan->emi_payout }}</td>
                      <td>{{ $loan->date_time }}</td>
                      <td>{{ $loan->address }}</td>
                     
                  </tr>
                  @endforeach
                </tbody>
                
              </table>
            </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    