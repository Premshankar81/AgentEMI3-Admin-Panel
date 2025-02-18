<section class="content-header">
      <h1> {{$data['page_title']}}
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
              <h3 class="box-title">{{$data['page_title']}} List </h3>
            </div>

            <div class="box-body">
                <!-- Add a scrollable container -->
                <div style="overflow-x:auto;width:100%">
              <table id="dataTables_table_init" class="table table-bordered table-striped" style="width: 200%">
                <thead>
                  <tr>
                    <th>Sr. No.</th>
                    <th>Loan ID</th>
                    <th >Agent Name</th>
                    <th>Agent ID</th>
                    <th>Customer Name</th>
                    <th>Customer Mobile</th>
                    <th>Principal Amount </th>
                    <th>Disbursed Amount</th>
                    <th>Interest Rate</th>
                    <th>Outstanding Balance</th>
                    <th>Installment Amount</th>
                    <th>EMI Payout</th>
                    <th>Repayment terms</th>
                    <th>Extra Amount</th>
                    <th>Next due date</th>
                    <th> Customer Address</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                  
                  </tr>
                </thead>
                <tbody >
                  @foreach($data['activeLoans'] as $loan)
                  <tr>
                      <td>{{ $loop->iteration }}</td>
                      <td>{{ $loan->loan_id }}</td>
                      <td>{{ $loan->agent_name }}</td>
                      <td>{{ $loan->agent_id }}</td>
                      <td>{{ $loan->customer_name }}</td>
                      <td>{{ $loan->customer_mobile }}</td>
                      <td>{{ $loan->principal_amount }}</td>
                      <td>{{ $loan->disbursed_amount }}</td>
                      <td>{{ $loan->interest_rate }}</td>
                      <td>{{ $loan->outstanding_balance }}</td>
                      <td>{{ $loan->installment_amount }}</td>
                      <td>{{ $loan->emi_payout }}</td>
                      <td>{{ $loan->repayment_terms }}</td>
                      <td>{{ $loan->extra_payment}}</td>
                      <td>{{ $loan->next_due_date }}</td>
                      <td>{{ $loan->customer_address }}</td>
                      <td>{{ $loan->start_date }}</td>
                      <td>{{ $loan->end_date }}</td>
                    
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

    