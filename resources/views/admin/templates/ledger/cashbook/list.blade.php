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

              <a class="float-right btn btn-warning " href="{{route('admin.ledger.daybook.export')}}"><i
                 class="mdi mdi-file-export "></i> Export</a>  
                
            </h3>
          </div>

          <div class="box-body">
            <table  class="table table-bordered table-striped">
              <thead>
                  <tr>
                      <th>No</th>
                      <th>Date</th>
                      <th>Description</th>
                      <th>Transaction Type</th>
                      <th>Debit (₹)</th>
                      <th>Credit (₹)</th>
                      <th>Balance (₹)</th>
                
                  </tr>
              </thead>
              <tbody id="TableRecordList">
                  @foreach ($data['daybook'] as $key => $entry)
                      <tr>
                          <td>{{ $key + 1 }}</td> <!-- Serial Number -->
                          <td>{{ \Carbon\Carbon::parse($entry['date'])->format('d-m-Y') }}</td> <!-- Formatted Date -->
                          <td>{{ $entry['description'] }}</td> <!-- Description -->
                          <td>{{ $entry['transaction_type'] ?: '-' }}</td> <!-- Transaction Type -->
                          <td>{{ $entry['debit_amount'] ? '₹ ' . number_format($entry['debit_amount'], 2) : '-' }}</td> <!-- Debit Amount -->
                          <td>{{ $entry['credit_amount'] ? '₹ ' . number_format($entry['credit_amount'], 2) : '-' }}</td> <!-- Credit Amount -->
                          <td>{{ '₹ ' . number_format($entry['balance'], 2) }}</td> <!-- Balance -->    
                      </tr>
                  @endforeach
              </tbody>
          </table>
          
          </div>
        </div>
      </div>
    </div>
  </section>

  