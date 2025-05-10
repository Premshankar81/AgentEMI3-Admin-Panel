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
              <table id="dataTables_table_init" class="table table-bordered table-striped" style="width: 150%;">
                <thead>
                  <tr>
                    <th style="width: 7%;">Sr. No.</th>
                    <th style="width: 7%;">Loan ID</th>
                    <th style="width: 9%;">Agent Name</th>
                    <th style="width: 9%;">Customer Name</th>
                    <th style="width: 9%;">Customer Mobile</th>
                    <th style="width: 9%;">Loan Amount</th>
                    <th style="width: 9%;">Demand Amount</th>
                    <th style="width: 10%;">Outstanding Amount</th>
                    <th style="width: 12%;">Address</th>
                    <th style="width: 12%;">EMI Payout</th>
                    <th style="width: 7%;">Action</th>
                  </tr>
                </thead>
                <tbody >
                  @foreach($data['demandSheet'] as $loan)
                  <tr>
                      <td>{{ $loop->iteration }}</td>
                      <td>{{ $loan->loan_id }}</td>
                      <td>{{ $loan->agent_name }}</td>
                      <td>{{ $loan->customer_name }}</td>
                      <td>{{ $loan->customer_mobile }}</td>
                      <td>{{ $loan->principal_amount }}</td>
                      <td>{{ $loan->installment_amount }}</td>
                      <td>{{ $loan->outstanding_balance }}</td>
                      <td>{{ $loan->customer_address }}</td>
                      <td>{{ $loan->emi_payout }}</td>
                     
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

    